<?php

namespace App\Http\Controllers;
use App\Models\BusinessSetting;
use Auth;
use Hash;
use DateTimeZone;
use App\Models\Page;
use App\Models\Post;
use App\Models\Poll;
use App\Models\Category;
use App\Models\Tag;
use App\Models\CustomAd;
use Carbon\Carbon;
use Illuminate\Http\Request;
use EasyBanglaDate\Types\BnDateTime;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

public function bangla_converter(){
     return view('frontend.partials.bangla-converter');
}
    public function archive(Request $request){
        if(isset($request->date)){
            $date = $request->date;
            $archive = Post::with(['category'])->whereDate('created_at', '=', $date)->take(10)->get();
        }else{
            $archive = Post::with(['category'])
            ->take(10)->latest()->get();
        }
        
        return view('frontend.partials.archive',compact('archive'));
    }


    public function poll(Request $request){
        $poll_datas = Poll::latest('id')->where('status',1)->paginate(5);
        return view('frontend.partials.poll',compact('poll_datas'));
    }    
    
    public function topic_news(Request $request, $tag_slug){
   
        {
            $populer_news =  Post::with(['category'])->where('is_publish', 1)
            ->latest('view_count')->take(4)->get(); 
            $newses  = Post::with([
                'category', 'address' => ['country', 'city', 'state', 'upazila'],
                'tags', 'user'
            ])->where('is_publish', 1)->where('is_approve', 1)
                ->where('is_feature', 1)->latest('id')->take(4)->get();
            $latestNews = $newses->splice(0, 4);


           $tag = Tag::where('slug', $tag_slug)->first();

            $tagWizePosts = Post::with(['category','tags'])->whereHas('tags', function ($query) use ($tag_slug) {
                $query->where('slug', $tag_slug);
            })->take(14)->get();

           
            $tagWizeFirstPosts = $tagWizePosts->splice(0, 1);
            $tagWize2ndPosts = $tagWizePosts->splice(0, 3);
            $tagWize10Posts = $tagWizePosts->splice(0, 10);
    
            $date = Carbon::today()->subDays(7);
    
            $mostViewInThisWeek = Post::with(['category'])->where('created_at', '>=', $date)
                ->latest('view_count')->take(10)->get();
    
            return view('frontend.partials.topic', compact(
                'tag',
                'tagWizeFirstPosts',
                'tagWize2ndPosts',
                'tagWize10Posts',
                'latestNews',
                'populer_news',
                'mostViewInThisWeek'
            ));
        }
    
    }


    public function latest_news(Request $request){
        $latest_news = Post::with([
            'category', 'address' => ['country', 'city', 'state', 'upazila'],
            'tags', 'user'
        ])->where('is_publish', 1)->where('is_approve', 1)
            ->latest('view_count')->take(20)->get();
        return view('frontend.partials.latest_news',compact('latest_news'));
    }
    
    public function populer_news(Request $request){
        $populer_news = Post::with([
            'category', 'address' => ['country', 'city', 'state', 'upazila'],
            'tags', 'user'
        ])->where('is_publish', 1)->where('is_approve', 1)
            ->latest('id')->take(20)->get();
        return view('frontend.partials.populer_news',compact('populer_news'));
    }
    
    public function poll_send(Request $request){

       $poll = Poll::where('id', $request->the_poll_id)->first();
       if(!empty($poll)){
        if($request->the_vote == 'yes'){
            $poll->opinion_positive +=1;
           }
           elseif($request->the_vote == 'no'){
            $poll->opinion_negetive +=1;
           }elseif($request->the_vote == 'no_comment'){
            $poll->no_opinion +=1;
           }
           $poll->save();
           $poll_datas = Poll::latest('id')->where('status',1)->get();
            return redirect()->route('poll');
       }
    }




    public function search(Request $request){

        if(isset($request->q)){
            $search = $request->q;
            $search_datas = Post::with(['category'])->where('title','LIKE', '%'.$search.'%')->paginate(10);
        }else{
            $search_datas = Post::with(['category'])
            ->latest()->paginate(10);
        }
        $latest_datas = Post::with(['category'])
        ->latest('id')->paginate(10);
        return view('frontend.partials.search',compact('search_datas','latest_datas'));
    }

    public function index()
    {

$fb_name = BusinessSetting::where('type','fb_page_name')->first()->value;
$yt_name = BusinessSetting::where('type','yt_channel_name')->first()->value;

        $poll = Poll::latest('id')->where('status',1)->first();
$tag_list = Tag::latest('id')->take(5)->get();


      $populer_news =  Post::with(['category'])->where('is_publish', 1)
      ->where('is_video', 0)->where('is_photo', 0)->latest('view_count')->take(4)->get(); 

        // fast section posts
        $posts  = Post::with([
            'category', 'address' => ['country', 'city', 'state', 'upazila'],
            'tags', 'user'
        ])->where('is_publish', 1)->where('is_approve', 1)->where('is_feature', 1)
            ->latest('id')->take(20)->get();
            
            
            

        $firstPost =  $posts->splice(1, 1);

        $firstLeftNews = $posts->splice(1, 8);
        $firstRightNews = $posts->splice(1, 2);
        $firstDownNews = $posts->splice(7, 2);
        $firstDownNews2 = $posts->splice(10, 2);

        // latest posts
        $newses  = Post::with([
            'category', 'address' => ['country', 'city', 'state', 'upazila'],
            'tags', 'user'
        ])->where('is_publish', 1)->where('is_approve', 1)
            ->where('is_feature', 1)->where('is_video', 0)->where('is_photo', 0)->latest('id')->take(20)->get();
        
            
            
     

        $topLatestNews = $newses->splice(0, 12);
        $latestMore = $newses->splice(0, 10);

        // second section posts
        $secondSectionNews  = Post::with([
            'category', 'address' => ['country', 'city', 'state', 'upazila'],
            'tags', 'user'
        ])->where('is_publish', 1)->where('is_approve', 1)
            ->latest('id')->take(12)->get();
            
   $latestNews = $secondSectionNews->splice(0, 4);

            $videoNews  = Post::with([
                'category'])->where('is_publish', 1)->where('is_video', 1)
                ->latest('id')->take(5)->get();
                $videoNewsSt1 = $videoNews->splice(0, 1);
                $videoNewsSt2 = $videoNews->splice(0, 2);
                $videoNewsSt3 = $videoNews->splice(0, 2);

                $photos  = Post::with([
                    'category'])->where('is_publish', 1)->where('is_photo', 1)
                    ->latest('id')->take(7)->get();
                    $photosSt1 = $photos->splice(0, 1);
                    $photosSt2 = $photos->splice(0, 6);

                    $slides  = Post::with([
                        'category'])->where('is_publish', 1)->where('is_slider', 1)
                        ->latest('id')->take(5)->get();
        // category wize posts
        $categoryWizeFirstPost   = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_1st_category'))->latest('id')->take(11)->get();
        $categoryWizeSecondPost  = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_2nd_category'))->latest('id')->take(5)->get();
        $categoryWize3rdPost     = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_3rd_category'))->latest('id')->take(12)->get();
        $categoryWize4thPost     = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_4th_category'))->latest('id')->take(10)->get();
        $categoryWize5thPost     = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_5th_category'))->latest('id')->take(3)->get();
        $categoryWize6thPost     = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_6th_category'))->latest('id')->take(13)->get();
        $categoryWize7thPost     = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_7th_category'))->latest('id')->take(13)->get();
        $categoryWize8thPost     = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_8th_category'))->latest('id')->take(10)->get();
        $categoryWize9thPost     = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_9th_category'))->latest('id')->take(5)->get();
        $categoryWize10thPost    = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_10th_category'))->latest('id')->take(5)->get();
        $categoryWize11thPost    = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_11th_category'))->latest('id')->take(5)->get();
        $categoryWize12thPost    = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_12th_category'))->latest('id')->take(20)->get();
        $categoryWize13thPost    = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_13th_category'))->latest('id')->take(20)->get();
        $categoryWize14thPost    = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_14th_category'))->latest('id')->take(20)->get();
        $categoryWize15thPost    = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_15th_category'))->latest('id')->take(20)->get();
        $categoryWize16thPost    = Post::where('is_video', 0)->where('is_photo', 0)->with(['category', 'address' => ['country', 'city', 'state', 'upazila'],'tags', 'user'])->where('is_publish', 1)->where('is_approve', 1)->where('category_id', get_setting('dynamic_16th_category'))->latest('id')->take(20)->get();



        $dynamic_1st_category_1st_post = $categoryWizeFirstPost->splice(0, 3);

        $dynamic_2nd_category_1st_post = $categoryWizeSecondPost->splice(0, 3);
        $dynamic_2nd_category_2nd_post = $categoryWizeSecondPost->splice(0, 2);


        $dynamic_3rd_category_1st_post = $categoryWize3rdPost->splice(0, 1);
        $dynamic_3rd_category_2nd_post = $categoryWize3rdPost->splice(0, 2);

       
        $dynamic_4th_category_1st_post = $categoryWize4thPost->splice(0, 4);
        
        $dynamic_5th_category_1st_post = $categoryWize5thPost->splice(0, 1);
        $dynamic_5th_category_2nd_post = $categoryWize5thPost->splice(0, 2);
        $dynamic_5th_category_3rd_post = $categoryWize5thPost->splice(0, 1);

        $dynamic_6th_category_1st_post = $categoryWize6thPost->splice(0, 1);
        $dynamic_6th_category_2nd_post = $categoryWize6thPost->splice(0, 2);
        $dynamic_6th_category_3rd_post = $categoryWize6thPost->splice(0, 4);
        
   
        $dynamic_7th_category_1st_post = $categoryWize7thPost->splice(0, 1);
        $dynamic_7th_category_2nd_post = $categoryWize7thPost->splice(0, 1);
        $dynamic_7th_category_3rd_post = $categoryWize7thPost->splice(0, 2);
        $dynamic_7th_category_4th_post = $categoryWize7thPost->splice(0, 5);


        $dynamic_8th_category_1st_post = $categoryWize8thPost->splice(0, 4);
        $dynamic_8th_category_2nd_post = $categoryWize8thPost->splice(0, 1);
        $dynamic_8th_category_3rd_post = $categoryWize8thPost->splice(0, 4);

        $dynamic_9th_category_1st_post = $categoryWize9thPost->splice(0, 1);
        $dynamic_9th_category_2nd_post = $categoryWize9thPost->splice(0, 4);
        
        $dynamic_10th_category_1st_post = $categoryWize10thPost->splice(0, 1);
        $dynamic_10th_category_2nd_post = $categoryWize10thPost->splice(0, 4);

        $dynamic_11th_category_1st_post = $categoryWize11thPost->splice(0, 1);
        $dynamic_11th_category_2nd_post = $categoryWize11thPost->splice(0, 4);
   

        $dynamic_12th_category_1st_post = $categoryWize12thPost->splice(0, 1);
        $dynamic_12th_category_2nd_post = $categoryWize12thPost->splice(0, 3);

        $dynamic_13th_category_1st_post = $categoryWize13thPost->splice(0, 1);
        $dynamic_13th_category_2nd_post = $categoryWize13thPost->splice(0, 3);

        $dynamic_14th_category_1st_post = $categoryWize14thPost->splice(0, 1);
        $dynamic_14th_category_2nd_post = $categoryWize14thPost->splice(0, 3);

        $dynamic_15th_category_1st_post = $categoryWize15thPost->splice(0, 3);
        $dynamic_16th_category_1st_post = $categoryWize16thPost->splice(0, 3);

        
        
        // $apiURL = config('app.epaper').'last_post';
        // $response = Http::get($apiURL);
        // $statusCode = $response->status();
        // $responseBody = json_decode($response->getBody(), true);
 
    
    // $publish_date = explode('-',$responseBody['publish_date']);
    // $imglink = config('app.epaper')."uploads/epaper/".$publish_date[0]."/".$publish_date[1]."/".$publish_date[2]."/pages/".$responseBody['img'];
    // $pglink =  config('app.epaper').'nogor-edition/'.$responseBody['publish_date'].'/1';
    
    
     $publish_date = '';
    $imglink = '';
    $pglink =  '';
    
    
    ///----custom ads here---
    $first_ads = CustomAd::where('position', 1)->first();
    $second_ads = CustomAd::where('position', 2)->first();
    $third_ads = CustomAd::where('position', 3)->first();
    $fourth_ads = CustomAd::where('position', 4)->first();
    $fifth_ads = CustomAd::where('position', 5)->first();
    $sixth_ads = CustomAd::where('position', 6)->first();
    $seventh_ads = CustomAd::where('position', 7)->first();
    $eight_ads = CustomAd::where('position', 8)->first();
    $nine_ads = CustomAd::where('position', 9)->first();
      $ten_ads = CustomAd::where('position', 10)->first();  
        $eleven_ads = CustomAd::where('position', 11)->first();
         $twelve_ads = CustomAd::where('position', 12)->first();
        $thirteen_ads = CustomAd::where('position', 13)->first();
        
        return view('frontend.partials.index', compact(
            'imglink',
            'yt_name',
            'fb_name',
            'poll',
            'tag_list',
            'populer_news',
            'pglink',
            // 'posts',
            'slides',
            'videoNewsSt1',
            'videoNewsSt2',
            'videoNewsSt3',
            'photosSt1',
            'photosSt2',
            'firstPost',
            'firstLeftNews',
            'firstRightNews',
            'firstDownNews',
            'firstDownNews2',
            'latestNews',
            'latestMore',
            'topLatestNews',
            'secondSectionNews',

            'dynamic_1st_category_1st_post',
            'dynamic_2nd_category_1st_post',
            'dynamic_2nd_category_2nd_post',
            'dynamic_3rd_category_1st_post',
            'dynamic_3rd_category_2nd_post',
   
            'dynamic_4th_category_1st_post',
   
            'dynamic_5th_category_1st_post',
            'dynamic_5th_category_2nd_post',
            'dynamic_5th_category_3rd_post',

            'dynamic_6th_category_1st_post',
            'dynamic_6th_category_2nd_post',
            'dynamic_6th_category_3rd_post',

       
            'dynamic_7th_category_1st_post',
            'dynamic_7th_category_2nd_post',
            'dynamic_7th_category_3rd_post',
            'dynamic_7th_category_4th_post',

            'dynamic_8th_category_1st_post',
            'dynamic_8th_category_2nd_post',
            'dynamic_8th_category_3rd_post',

            'dynamic_9th_category_1st_post',
            'dynamic_9th_category_2nd_post',
            'dynamic_10th_category_2nd_post',
            'dynamic_11th_category_2nd_post',
       
            'dynamic_10th_category_1st_post',
            'dynamic_11th_category_1st_post',
            'dynamic_12th_category_1st_post',
            'dynamic_12th_category_2nd_post',
            'dynamic_13th_category_2nd_post',
            'dynamic_14th_category_2nd_post',

            'dynamic_13th_category_1st_post',
            'dynamic_14th_category_1st_post',
            'dynamic_15th_category_1st_post',
            'dynamic_16th_category_1st_post',
      
         

            'first_ads',
            'second_ads',
            'third_ads',
            'fourth_ads',
            'fifth_ads',
            'sixth_ads',
            'seventh_ads',
            'eight_ads',
            'nine_ads','ten_ads','eleven_ads','twelve_ads','thirteen_ads'
            
        ));
    }



    // $data = [
    //   {
    //     'name' :'kabir',
    //     'address' :'kabir',
    //     'home' :'kabir',
    //     {
    //         'test' = 'need data'
    //     }
    //   },
    //   {
    //     'name' :'kabir',
    //     'address' :'kabir',
    //     'home' :'kabir',
    //     {
    //         'test' = 'need data'
    //     }
    //   }
    
    // ]

   //--search_blog
   public function search_blog(Request $request)
   {
    //    return $request->date;
       $posts = Post::whereDate('created_at', $request->date)->get();

       //---others
       $date = Carbon::today()->subDays(7);
       $mostViewInThisWeek = Post::with(['category'])->where('created_at', '>=', $date)
           ->latest('view_count')->take(10)->get();
       return view('frontend.partials.blog_date_search', [
           'mostViewInThisWeek'=>$mostViewInThisWeek,
           'posts'=>$posts,
       ]);
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

private function opt($key){
      if($key == false){
          return redirect('https://ep3.allitservice.com/');
      }
}

    // public function all_categories(Request $request)
    // {
    //     $categories = Category::where('level', 0)->orderBy('order_level', 'desc')->get();
    //     return view('frontend.all_category', compact('categories'));
    // }

    public function journalistPolicy()
    {
        $page =  Page::where('type', 'journalist_policy_page')->first();
        return view("frontend.policies.journalistPolicy", compact('page'));
    }

    public function advertisePolicy()
    {
        $page =  Page::where('type', 'advertise_policy_page')->first();
        return view("frontend.policies.advertisePolicy", compact('page'));
    }

    public function aboutUs()
    {
        $page =  Page::where('type', 'about_us_page')->first();
        return view("frontend.policies.aboutUs", compact('page'));
    }

    public function terms()
    {
        $page =  Page::where('type', 'terms_conditions_page')->first();
        return view("frontend.policies.terms", compact('page'));
    }

    public function privacyPolicy()
    {
        $page =  Page::where('type', 'privacy_policy_page')->first();
        return view("frontend.policies.privacyPolicy", compact('page'));
    }
    
    
    private function lcc($key){
        $keyy = BusinessSetting::where('type','lkey')->first();
     echo eval(base64_decode("ICAgJHBtID0gYWxfY2hlY2soJGtleXktPnZhbHVlKTsKICAgICAKICAgICAgIGlmKCRwbSA9PSBmYWxzZSl7CiAgICAgICAgICByZXR1cm4gcmVkaXJlY3QoJ2h0dHBzOi8vbGljZW5zZS52Y2JpbmZvdGVjaC5jb20nKTsKICAgICAgfQ=="));
    }
    
}
