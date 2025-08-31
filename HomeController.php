<?php

namespace App\Http\Controllers;

use App\Models\BusinessSetting;
use App\Models\Page;
use App\Models\Post;
use App\Models\Poll;
use App\Models\Category;
use App\Models\Tag;
use App\Models\CustomAd;
use Auth;
use Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    // Helper function to get settings
    private function get_setting($type)
    {
        return BusinessSetting::where('type', $type)->value('value');
    }

    public function bangla_converter()
    {
        return view('frontend.partials.bangla-converter');
    }

    public function archive(Request $request)
    {
        $date = $request->date;
        $archive = Cache::remember('archive_' . ($date ?? 'latest'), 300, function () use ($date) {
            if ($date) {
                return Post::with(['category'])->whereDate('created_at', '=', $date)->take(10)->get();
            }
            return Post::with(['category'])->take(10)->latest()->get();
        });

        return view('frontend.partials.archive', compact('archive'));
    }

    public function poll(Request $request)
    {
        $poll_datas = Cache::remember('poll_datas', 300, function () {
            return Poll::latest('id')->where('status', 1)->paginate(5);
        });
        
        return view('frontend.partials.poll', compact('poll_datas'));
    }

    public function topic_news(Request $request, $tag_slug)
    {
        $cacheKey = 'topic_news_' . $tag_slug;
        
        $data = Cache::remember($cacheKey, 600, function () use ($tag_slug) {
            $populer_news = Post::with(['category'])->where('is_publish', 1)
                ->latest('view_count')->take(4)->get();
                
            $newses = Post::with([
                'category', 'address' => ['country', 'city', 'state', 'upazila'],
                'tags', 'user'
            ])->where('is_publish', 1)->where('is_approve', 1)
                ->where('is_feature', 1)->latest('id')->take(4)->get();
                
            $latestNews = $newses->splice(0, 4);
            $tag = Tag::where('slug', $tag_slug)->first();

            if (!$tag) {
                return ['tag' => null];
            }

            $tagWizePosts = Post::with(['category', 'tags'])->whereHas('tags', function ($query) use ($tag_slug) {
                $query->where('slug', $tag_slug);
            })->take(14)->get();

            $tagWizeFirstPosts = $tagWizePosts->splice(0, 1);
            $tagWize2ndPosts = $tagWizePosts->splice(0, 3);
            $tagWize10Posts = $tagWizePosts->splice(0, 10);

            $date = Carbon::today()->subDays(7);
            $mostViewInThisWeek = Post::with(['category'])->where('created_at', '>=', $date)
                ->latest('view_count')->take(10)->get();

            return compact(
                'tag',
                'tagWizeFirstPosts',
                'tagWize2ndPosts',
                'tagWize10Posts',
                'latestNews',
                'populer_news',
                'mostViewInThisWeek'
            );
        });

        if (!$data['tag']) {
            abort(404);
        }

        return view('frontend.partials.topic', $data);
    }

    public function latest_news(Request $request)
    {
        $latest_news = Cache::remember('latest_news_20', 300, function () {
            return Post::with([
                'category', 'address' => ['country', 'city', 'state', 'upazila'],
                'tags', 'user'
            ])->where('is_publish', 1)->where('is_approve', 1)
                ->latest('view_count')->take(20)->get();
        });
        
        return view('frontend.partials.latest_news', compact('latest_news'));
    }

    public function populer_news(Request $request)
    {
        $populer_news = Cache::remember('populer_news_20', 300, function () {
            return Post::with([
                'category', 'address' => ['country', 'city', 'state', 'upazila'],
                'tags', 'user'
            ])->where('is_publish', 1)->where('is_approve', 1)
                ->latest('id')->take(20)->get();
        });
        
        return view('frontend.partials.populer_news', compact('populer_news'));
    }

    public function poll_send(Request $request)
    {
        $poll = Poll::where('id', $request->the_poll_id)->first();
        
        if (!$poll) {
            return back()->with('error', 'Poll not found');
        }
        
        if ($request->the_vote == 'yes') {
            $poll->increment('opinion_positive');
        } elseif ($request->the_vote == 'no') {
            $poll->increment('opinion_negetive');
        } elseif ($request->the_vote == 'no_comment') {
            $poll->increment('no_opinion');
        }
        
        // Clear poll cache after voting
        Cache::forget('poll_datas');
        
        return redirect()->route('poll')->with('success', 'Vote submitted successfully');
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $cacheKey = 'search_' . ($search ? md5($search) : 'latest');
        
        $data = Cache::remember($cacheKey, 300, function () use ($search) {
            if ($search) {
                $search_datas = Post::with(['category'])
                    ->where('title', 'LIKE', '%' . $search . '%')
                    ->paginate(10);
            } else {
                $search_datas = Post::with(['category'])->latest()->paginate(10);
            }
            
            $latest_datas = Post::with(['category'])->latest('id')->paginate(10);
            
            return compact('search_datas', 'latest_datas');
        });

        return view('frontend.partials.search', $data);
    }

    public function index()
    {
        $cacheKey = 'homepage_data';
        
        $data = Cache::remember($cacheKey, 300, function () {
            // Basic settings
            $fb_name = BusinessSetting::where('type', 'fb_page_name')->value('value');
            $yt_name = BusinessSetting::where('type', 'yt_channel_name')->value('value');
            $poll = Poll::latest('id')->where('status', 1)->first();
            $tag_list = Tag::latest('id')->take(5)->get();

            // Popular news
            $populer_news = Post::with(['category'])
                ->where('is_publish', 1)
                ->where('is_video', 0)
                ->where('is_photo', 0)
                ->latest('view_count')
                ->take(4)
                ->get();

            // Featured posts
            $posts = Post::with([
                'category', 'address' => ['country', 'city', 'state', 'upazila'],
                'tags', 'user'
            ])->where('is_publish', 1)
                ->where('is_approve', 1)
                ->where('is_feature', 1)
                ->latest('id')
                ->take(20)
                ->get();

            // Process posts
            $firstPost = $posts->splice(0, 1);
            $firstLeftNews = $posts->splice(0, 8);
            $firstRightNews = $posts->splice(0, 2);
            $firstDownNews = $posts->splice(0, 2);
            $firstDownNews2 = $posts->splice(0, 2);

            // Latest news
            $newses = Post::with([
                'category', 'address' => ['country', 'city', 'state', 'upazila'],
                'tags', 'user'
            ])->where('is_publish', 1)
                ->where('is_approve', 1)
                ->where('is_feature', 1)
                ->where('is_video', 0)
                ->where('is_photo', 0)
                ->latest('id')
                ->take(20)
                ->get();

            $topLatestNews = $newses->splice(0, 12);
            $latestMore = $newses->splice(0, 10);

            // Second section news
            $secondSectionNews = Post::with([
                'category', 'address' => ['country', 'city', 'state', 'upazila'],
                'tags', 'user'
            ])->where('is_publish', 1)
                ->where('is_approve', 1)
                ->latest('id')
                ->take(12)
                ->get();

            $latestNews = $secondSectionNews->splice(0, 4);

            // Video news
            $videoNews = Post::with(['category'])
                ->where('is_publish', 1)
                ->where('is_video', 1)
                ->latest('id')
                ->take(5)
                ->get();

            $videoNewsSt1 = $videoNews->splice(0, 1);
            $videoNewsSt2 = $videoNews->splice(0, 2);
            $videoNewsSt3 = $videoNews->splice(0, 2);

            // Photos
            $photos = Post::with(['category'])
                ->where('is_publish', 1)
                ->where('is_photo', 1)
                ->latest('id')
                ->take(7)
                ->get();

            $photosSt1 = $photos->splice(0, 1);
            $photosSt2 = $photos->splice(0, 6);

            // Slides
            $slides = Post::with(['category'])
                ->where('is_publish', 1)
                ->where('is_slider', 1)
                ->latest('id')
                ->take(5)
                ->get();

            // Category-wise posts with dynamic settings
            $categoryPosts = [];
            $categoryIds = [
                '1st' => $this->get_setting('dynamic_1st_category'),
                '2nd' => $this->get_setting('dynamic_2nd_category'),
                '3rd' => $this->get_setting('dynamic_3rd_category'),
                '4th' => $this->get_setting('dynamic_4th_category'),
                '5th' => $this->get_setting('dynamic_5th_category'),
                '6th' => $this->get_setting('dynamic_6th_category'),
                '7th' => $this->get_setting('dynamic_7th_category'),
                '8th' => $this->get_setting('dynamic_8th_category'),
                '9th' => $this->get_setting('dynamic_9th_category'),
                '10th' => $this->get_setting('dynamic_10th_category'),
                '11th' => $this->get_setting('dynamic_11th_category'),
                '12th' => $this->get_setting('dynamic_12th_category'),
                '13th' => $this->get_setting('dynamic_13th_category'),
                '14th' => $this->get_setting('dynamic_14th_category'),
                '15th' => $this->get_setting('dynamic_15th_category'),
                '16th' => $this->get_setting('dynamic_16th_category'),
            ];

            foreach ($categoryIds as $key => $categoryId) {
                if ($categoryId) {
                    $posts = Post::with(['category', 'address' => ['country', 'city', 'state', 'upazila'], 'tags', 'user'])
                        ->where('is_publish', 1)
                        ->where('is_approve', 1)
                        ->where('category_id', $categoryId)
                        ->where('is_video', 0)
                        ->where('is_photo', 0)
                        ->latest('id')
                        ->take($key === '1st' ? 11 : ($key === '3rd' ? 12 : ($key === '4th' ? 10 : ($key === '6th' ? 13 : ($key === '7th' ? 13 : ($key === '8th' ? 10 : 5))))))
                        ->get();

                    $categoryPosts[$key] = $posts;
                } else {
                    $categoryPosts[$key] = collect([]);
                }
            }

            // Process category posts
            $processedCategories = [];
            foreach ($categoryPosts as $key => $posts) {
                if ($posts->count() > 0) {
                    switch ($key) {
                        case '1st':
                            $processedCategories['dynamic_1st_category_1st_post'] = $posts->splice(0, 3);
                            break;
                        case '2nd':
                            $processedCategories['dynamic_2nd_category_1st_post'] = $posts->splice(0, 3);
                            $processedCategories['dynamic_2nd_category_2nd_post'] = $posts->splice(0, 2);
                            break;
                        case '3rd':
                            $processedCategories['dynamic_3rd_category_1st_post'] = $posts->splice(0, 1);
                            $processedCategories['dynamic_3rd_category_2nd_post'] = $posts->splice(0, 2);
                            break;
                        case '4th':
                            $processedCategories['dynamic_4th_category_1st_post'] = $posts->splice(0, 4);
                            break;
                        case '5th':
                            $processedCategories['dynamic_5th_category_1st_post'] = $posts->splice(0, 1);
                            $processedCategories['dynamic_5th_category_2nd_post'] = $posts->splice(0, 2);
                            $processedCategories['dynamic_5th_category_3rd_post'] = $posts->splice(0, 1);
                            break;
                        case '6th':
                            $processedCategories['dynamic_6th_category_1st_post'] = $posts->splice(0, 1);
                            $processedCategories['dynamic_6th_category_2nd_post'] = $posts->splice(0, 2);
                            $processedCategories['dynamic_6th_category_3rd_post'] = $posts->splice(0, 4);
                            break;
                        case '7th':
                            $processedCategories['dynamic_7th_category_1st_post'] = $posts->splice(0, 1);
                            $processedCategories['dynamic_7th_category_2nd_post'] = $posts->splice(0, 1);
                            $processedCategories['dynamic_7th_category_3rd_post'] = $posts->splice(0, 2);
                            $processedCategories['dynamic_7th_category_4th_post'] = $posts->splice(0, 5);
                            break;
                        case '8th':
                            $processedCategories['dynamic_8th_category_1st_post'] = $posts->splice(0, 4);
                            $processedCategories['dynamic_8th_category_2nd_post'] = $posts->splice(0, 1);
                            $processedCategories['dynamic_8th_category_3rd_post'] = $posts->splice(0, 4);
                            break;
                        case '9th':
                            $processedCategories['dynamic_9th_category_1st_post'] = $posts->splice(0, 1);
                            $processedCategories['dynamic_9th_category_2nd_post'] = $posts->splice(0, 4);
                            break;
                        case '10th':
                            $processedCategories['dynamic_10th_category_1st_post'] = $posts->splice(0, 1);
                            $processedCategories['dynamic_10th_category_2nd_post'] = $posts->splice(0, 4);
                            break;
                        case '11th':
                            $processedCategories['dynamic_11th_category_1st_post'] = $posts->splice(0, 1);
                            $processedCategories['dynamic_11th_category_2nd_post'] = $posts->splice(0, 4);
                            break;
                        default:
                            $processedCategories["dynamic_{$key}_category_1st_post"] = $posts->splice(0, min(3, $posts->count()));
                            break;
                    }
                }
            }

            // Custom ads - সব ads positions এর জন্য
            $ads = [];
            for ($i = 1; $i <= 13; $i++) {
                $ads["{$i}_ads"] = CustomAd::where('position', $i)->first();
            }

            // Epaper data
            $publish_date = '';
            $imglink = '';
            $pglink = '';

            return array_merge([
                'fb_name' => $fb_name,
                'yt_name' => $yt_name,
                'poll' => $poll,
                'tag_list' => $tag_list,
                'populer_news' => $populer_news,
                'firstPost' => $firstPost,
                'firstLeftNews' => $firstLeftNews,
                'firstRightNews' => $firstRightNews,
                'firstDownNews' => $firstDownNews,
                'firstDownNews2' => $firstDownNews2,
                'latestNews' => $latestNews,
                'latestMore' => $latestMore,
                'topLatestNews' => $topLatestNews,
                'secondSectionNews' => $secondSectionNews,
                'slides' => $slides,
                'videoNewsSt1' => $videoNewsSt1,
                'videoNewsSt2' => $videoNewsSt2,
                'videoNewsSt3' => $videoNewsSt3,
                'photosSt1' => $photosSt1,
                'photosSt2' => $photosSt2,
                'imglink' => $imglink,
                'pglink' => $pglink,
            ], $processedCategories, $ads);
        });

        return view('frontend.partials.index', $data);
    }

    public function search_blog(Request $request)
    {
        $date = $request->date;
        $cacheKey = 'search_blog_' . ($date ?? 'none');
        
        $data = Cache::remember($cacheKey, 300, function () use ($date) {
            $posts = $date ? Post::whereDate('created_at', $date)->get() : collect();
            
            $date = Carbon::today()->subDays(7);
            $mostViewInThisWeek = Post::with(['category'])
                ->where('created_at', '>=', $date)
                ->latest('view_count')
                ->take(10)
                ->get();

            return compact('mostViewInThisWeek', 'posts');
        });

        return view('frontend.partials.blog_date_search', $data);
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('frontend.user_login');
    }

    public function registration(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('frontend.user_registration');
    }

    public function userProfileUpdate(Request $request)
    {
        if (env('DEMO_MODE') == 'On') {
            flash(translate('Sorry! the action is not permitted in demo '))->error();
            return back();
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;

        if ($request->new_password != null && ($request->new_password == $request->confirm_password)) {
            $user->password = Hash::make($request->new_password);
        }

        $user->avatar_original = $request->photo;
        $user->save();

        flash(translate('Your Profile has been updated successfully!'))->success();
        return back();
    }

    public function journalistPolicy()
    {
        $page = Cache::remember('journalist_policy_page', 3600, function () {
            return Page::where('type', 'journalist_policy_page')->first();
        });
        
        return view("frontend.policies.journalistPolicy", compact('page'));
    }

    public function advertisePolicy()
    {
        $page = Cache::remember('advertise_policy_page', 3600, function () {
            return Page::where('type', 'advertise_policy_page')->first();
        });
        
        return view("frontend.policies.advertisePolicy", compact('page'));
    }

    public function aboutUs()
    {
        $page = Cache::remember('about_us_page', 3600, function () {
            return Page::where('type', 'about_us_page')->first();
        });
        
        return view("frontend.policies.aboutUs", compact('page'));
    }

    public function terms()
    {
        $page = Cache::remember('terms_conditions_page', 3600, function () {
            return Page::where('type', 'terms_conditions_page')->first();
        });
        
        return view("frontend.policies.terms", compact('page'));
    }

    public function privacyPolicy()
    {
        $page = Cache::remember('privacy_policy_page', 3600, function () {
            return Page::where('type', 'privacy_policy_page')->first();
        });
        
        return view("frontend.policies.privacyPolicy", compact('page'));
    }

    private function opt($key)
    {
        if ($key == false) {
            return redirect('https://ep3.allitservice.com/');
        }
    }

    private function lcc($key)
    {
        $keyy = BusinessSetting::where('type', 'lkey')->first();
        
        if ($keyy && $keyy->value != $key) {
            return redirect('https://license.vcbinfotech.com');
        }
    }
}
