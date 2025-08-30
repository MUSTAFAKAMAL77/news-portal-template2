@extends('frontend.layouts.app')
@push('metalogo')
  <meta property="og:image" content="https://dmcnews24.com/frontend/sqlogo.jpg" />
  @endpush
@section('content')
<style>
    .trending_topic {
        text-align: center;
    }
.cmt10{
    margin-top: 10px;
}

    .trending_topic ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .trending_topic ul li {
        display: inline-block;
    }
    .trending_topic ul li a {
        display: block;
        padding: 0 5px;
        margin: 0 1px;
        font-size: 17px;
        color: #000;
        background-color: #e5e5e5;
    }
    @media only screen and (max-width: 800px) {
        /* .trending_topic ul li a {
            font-size: 17px;
            margin: 4px 2px;
        } */
    }
    
div#div_330 {
    margin-top: 61px;
}

                                * {box-sizing: border-box;}
                                body {font-family: Verdana, sans-serif;}
                                .mySlides {display: none;}
                                .mySlides a {
                                max-width: 100%;
                                width: 100%;
                                height:330px;
                                } 
                                .mySlides img {vertical-align: middle;
                                max-width: 100%;
                                width: 100%;
                                height: 440px;
                                } 
                                
                                .ep_wrapper img {vertical-align: middle;
                                max-width: 100%;
                                width: 100%;
                                height: 100%;
                                }
                                
                                /* Slideshow container */
                                .slideshow-container {
                                  max-width: 1000px;
                                  position: relative;
                                  margin: auto;
                                }
                                
                               .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 109px;
    width: 100%;
    text-align: center;
    background: black;
}                       .numbertext {
                                    color: #f2f2f2;
                                    font-size: 12px;
                                    padding: 8px 12px;
                                    position: absolute;
                                    top: 80px;
                                }
                                                                
                                /* The dots/bullets/indicators */
                                .dot {
                                  height: 15px;
                                  width: 15px;
                                  margin: 0 2px;
                                  background-color: #bbb;
                                  border-radius: 50%;
                                  display: inline-block;
                                  transition: background-color 0.6s ease;
                                }
                                
                               .slider_mark .active {
                                  background-color: #717171;
                                }
                                .pd2{
                                    padding:10px;
                                }
                                /* Fading animation */
                                .fade {
                                  animation-name: fade;
                                  animation-duration: 1.5s;
                                }
                                .col-8 {
                                    flex: 66.66666666666667%;
                                    width: 66.66666666666667%;
                                }
                                .col-4 {
                                        flex: 33.33333333333333%;
                                        width: 33.33333333333333%;
                                    }
                                    .col-3 {
                                        flex: 25%;
                                        width: 25%;
                                    } 
                                @keyframes fade {
                                  from {opacity: .4} 
                                  to {opacity: 1}
                                }
                                
                                /* On smaller screens, decrease text size */
                                @media only screen and (max-width: 300px) {
                                  .text {font-size: 11px}
                                }
                                @media only screen and (max-width: 767px) {
                                  .mdv {  flex: 100%;
                                    width: 100%;}
                                }
                                   @media only screen and (min-width: 768px) {
                                                               
                                div#div_944 {
    margin-top: 59px;
}
                                }
   
                                

                    .mySlides.fade {
    width: 100%;
    height: 451px !important;
}

.ss_summery {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
    background: #212932;
    height: 100px;
}

.emb2 {
    margin-bottom: 13px;
    border: 1px solid #b3b2b2;
    padding: 13px;
    background: #fdfdfd;
} 

.ads_place {
    text-align: center;
    margin: auto;
    margin-top: 10px;
}
    </style>
          
<div class="trending_topic cmt10 mb10">
    <ul>
    <li><span>ট্রেন্ডিং:</span></li>
    @foreach ($tag_list as $tag)
        
 
    <li>
    <a href="{{ $domain_url }}topic/{{ $tag->slug}}">{{ $tag->slug }}{{ $tag->name}}</a>
    </li>
    @endforeach
    </ul>
    </div>
    <div class="whole_outer">
        <div class="whole_outer_inner">
            <div class="pagemaker">
                <div id="div_1" class="p _col">
                    <div class="inner">
                      
                 
                        
                        <div id="wrapper_286" class="wrapper special_30_70 bbash container_top_padding jw_progressive_load">
                            <div class="inner">
                                <div id="div_287" class="p_d _col">
                                    <div class="inner">
                                        <div id="wrapper_290" class="wrapper special_33_3_66_7">
                                            <div class="hf_wrap">
                                                <div class="color_theme_">
                                                    <div class="headbar"><a href="#">লিড নিউজ</a></div>
                                                </div>
                                            </div>
                                            <div class="inner">
                                                <div id="div_291" class="p_d_d brash _col">
                                                    <div class="inner">
                                                        <div id="widget_293" class="widget_color_ widget_wrap">
                                                            <div class="contents_listing widget">
                                                                <div id="contents_293_ajax_container" class="contents summery_view big_content_title">
                                                                    <div class="row">
                                                                        @foreach ($firstPost as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_ m_show_image_as_top">
                                                                                <!--image-->
                                                                                @if ($post->video_link != null)
                                                                                @else
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                                            alt="{{ $post->getTranslation('title') }}"
                                                                                            class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                                        />
                                                                                    </span>

                                                                                    <span class="content_type"></span>
                                                                                </div>
                                                                                @endif
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                    class="link_overlay"
                                                                                                    title="{{ $post->getTranslation('title') }}"
                                                                                                    href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                                >
                                                                                                {{ $post->getTranslation('title') }}
                                                                                                </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="summery">
                                                                                      
                                                                                        {!! Str::limit(strip_tags($post->getTranslation('description')), $limit = 150, $end = '...') !!}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="div_292" class="p_d_c brash _col">
                                                    <div class="inner">
                                                        <div id="widget_294" class="widget_color_ widget_wrap">
                                                            <div class="contents_listing widget">
                                                                <div id="contents_294_ajax_container" class="contents summery_view ash_bb">
                                                                    <div class="row">
                                                                        @foreach ($firstRightNews as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_ m_show_image_as_top">
                                                                                <!--image-->
                                                                                @if ($post->video_link != null)
                                                                                @else
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                                            alt=" {{ $post->getTranslation('title') }}"
                                                                                            class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                                        />
                                                                                    </span>

                                                                                    <span class="content_type"></span>
                                                                                </div>
@endif
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                    class="link_overlay"
                                                                                                    title=" {{ $post->getTranslation('title') }}"
                                                                                                    href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                                >
                                                                                                {{ $post->getTranslation('title') }}
                                                                                                </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="div_288" class="p_c _col">
                                    <div class="inner">
                                        <div id="widget_296" class="widget_color_ widget_wrap">
                                            <div class="contents_tabbed widget">
                                                <div id="ticker_widget_296" class="tabbed_conents right_image show_image show_number">
                                                    <div class="tabs">
                                                        <span class="button oppened" style="width: 50%;" id="latest_button" onclick="lastAndPopuler(1)"><span>সর্বশেষ</span></span>

                                                        <span class="button" style="width: 50%;" id="populer_button" onclick="lastAndPopuler(0)"><span>পঠিত</span></span>
                                                    </div>

                                                    <div class="tabs_content">
                                                        <div class="each_tab tab_latest oh db" id="latest_news_part" style="display: block;">
                                                            <ul>
                                                                @foreach ($latestNews as $key => $post)
                                                                <li>
                                                                    <span class="number">{{dceb($key +1) }}</span>
                                                                    <a
                                                                        href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                    >
                                                                        <span class="image">
                                                                            <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                <img
                                                                                    alt="{{ $post->getTranslation('title') }}"
                                                                                    class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                                />
                                                                            </span>
                                                                        </span>
                                                                        <span class="tab_list_title">{{ $post->getTranslation('title') }}</span>
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="view_all_wrap"><a class="view_all all_latest" href="{{ route('latest_news') }}">আরও </a></div>
                                                        </div>
                                                        <div class="each_tab tab_view_count oh db" id="populer_news_part" style="display: none;">
                                                            <ul>
                                                                @foreach ($populer_news as $key => $post)
                                                                <li>
                                                                    <span class="number">{{ dceb($key +1) }}</span>
                                                                    <a
                                                                        href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                    >
                                                                       

                                                                        <span class="image">
                                                                            <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                <img
                                                                                alt="{{ $post->getTranslation('title') }}"
                                                                                class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                            />
                                                                            </span>
                                                                        </span>
                                                                        <span class="tab_list_title">{{ $post->getTranslation('title') }}</span>
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="view_all_wrap"><a class="view_all all_view_count" href="{{ route('populer_news') }}">আরও </a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                              <script>

                                                function lastAndPopuler(command){
                                                    if(command == 1){
                
                                                    document.getElementById('latest_button').classList.add('opened');
                                                    document.getElementById('populer_button').classList.remove('opened');
                                                    document.getElementById('populer_news_part').style.display="none";
                                                    document.getElementById('latest_news_part').style.display="block";
                                                    
                                                }else{
                                                    document.getElementById('latest_button').classList.remove('opened');
                                                    document.getElementById('populer_button').classList.add('opened');
                                                    document.getElementById('populer_news_part').style.display="block";
                                                    document.getElementById('latest_news_part').style.display="none";
                                                
                                                }
                                             }
                                            </script>
                                            </div>
                                        </div>
                                        
                                     <iframe width="560" height="315" src="{{$yt_name}}" frameborder="0" allowfullscreen></iframe>

                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="ads_place">
                                     @if(isset($ads['4_ads']) && $ads['4_ads'])
    <div class="advertisment w-100 bg-danger text-white mt-3">
        <a class="ads-link" target="_blank" href="{{ $ads['4_ads']->link }}">
            <img src="{{ asset('uploads/CustomAds/' . $ads['4_ads']->image) }}" alt="">
        </a>
    </div>
@endif
                        </div>
                                                    
            
                       
                        
                        <div id="wrapper_297" class="wrapper container_top_padding jw_progressive_load">
                            <div class="inner">
                                <div id="div_298" class="p_p bbash _col">
                                    <div class="hf_wrap">
                                        <div class="color_theme_">
                                            <div class="headbar"><a href="{{ route('posts.category', $dynamic_4th_category_1st_post[0]->category->slug) }}">{{ $dynamic_4th_category_1st_post[0]->category->name }}</a></div>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <div id="widget_299" class="widget_color_ widget_wrap">
                                            <div class="contents_listing widget">
                                                <div id="contents_299_ajax_container" class="contents summery_view col_articles ash_br column_view ncol_4">
                                                    <div class="row">
                                                        @foreach ($dynamic_4th_category_1st_post as $post)
                                                        <div class="col col4">
                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_ m_show_image_as_top">
                                                                <!--image-->
                                                                @if ($post->video_link != null)
                                                                @else
                                                                <div class="image">
                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                        <img
                                                                            alt="{{ $post->getTranslation('title') }}"
                                                                            class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                        />
                                                                    </span>

                                                                    <span class="content_type"></span>
                                                                </div>
@endif
                                                                <div class="info">
                                                                    <div class="title_holder">
                                                                        <div class="tag_title_holder">
                                                                            <h2 class="title">
                                                                                <!--overlay anchor-->
                                                                                <a
                                                                                    class="link_overlay"
                                                                                    title="{{ $post->getTranslation('title') }}"
                                                                                    href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                >
                                                                                {{ $post->getTranslation('title') }}
                                                                                </a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>

                                                                 
                                                                </div>
                                                            </div>
                                                        </div>
                                                  
                                                        @endforeach
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="ads_place">
                                              @if(isset($ads['5_ads']) && $ads['5_ads'])
    <div class="advertisment w-100 bg-danger text-white mt-3">
        <a class="ads-link" target="_blank" href="{{ $ads['5_ads']->link }}">
            <img src="{{ asset('uploads/CustomAds/' . $ads['5_ads']->image) }}" alt="">
        </a>
    </div>
@endif
                        </div>
                       
                  
                        <div id="wrapper_309" class="wrapper special_25_as_300 bbash btash container_top_padding jw_progressive_load">
                            <div class="hf_wrap">
                                <div class="color_theme_">
                                    <div class="headbar"><a href="{{ route('posts.category', $dynamic_5th_category_1st_post[0]->category->slug) }}">{{ $dynamic_5th_category_1st_post[0]->category->name }}</a></div>
                                </div>
                            </div>
                            <div class="inner">
                                <div id="div_310" class="p_d brash _col">
                                    <div class="inner">
                                        <div id="wrapper_312" class="wrapper special_33_3_66_7 bbash container_bottom_padding">
                                            <div class="inner">
                                                <div id="div_313" class="p_d_d brash _col">
                                                    <div class="inner">
                                                        <div id="widget_315" class="widget_color_ widget_wrap">
                                                            <div class="contents_listing widget">
                                                                <div id="contents_315_ajax_container" class="contents summery_view m_hide_excerpt">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_5th_category_1st_post as $post)
                                                                        
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_ m_show_image_as_top">
                                                                                <!--image-->
                                                                                @if ($post->video_link != null)
                                                                                @else
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                                        />
                                                                                    </span>

                                                                                    <span class="content_type"></span>
                                                                                </div>
@endif
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                    class="link_overlay"
                                                                                                    title="{{ $post->getTranslation('title') }}"
                                                                                                    href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                                >
                                                                                                {{ $post->getTranslation('title') }}
                                                                                                </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="summery">
                                                                                        {!! Str::limit(strip_tags($post->getTranslation('description')), $limit = 150, $end = '...') !!}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="div_314" class="p_d_c _col">
                                                    <div class="inner">
                                                        <div id="widget_316" class="widget_color_ widget_wrap">
                                                            <div class="contents_listing widget">
                                                                <div id="contents_316_ajax_container" class="contents summery_view ash_bb">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_5th_category_2nd_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                @if ($post->video_link != null)
                                                                                @else
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                                        />
                                                                                    </span>

                                                                                    <span class="content_type"></span>
                                                                                </div>
@endif
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                            {{ $post->getTranslation('title') }}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="widget_317" class="widget_color_ widget_wrap">
                                            <div class="contents_listing widget">
                                                <div id="contents_317_ajax_container" class="contents summery_view col_articles column_view ncol_3">
                                                    <div class="row">
                                                        @foreach ($dynamic_5th_category_3rd_post as $post)
                                                        <div class="col col3">
                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_">
                                                                <!--image-->
                                                                @if ($post->video_link != null)
                                                                @else
                                                                <div class="image">
                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                        />
                                                                    </span>

                                                                    <span class="content_type"></span>
                                                                </div>
                                                                @endif
                                                                <div class="info">
                                                                    <div class="title_holder">
                                                                        <div class="tag_title_holder">
                                                                            <h2 class="title">
                                                                                <!--overlay anchor-->
                                                                                <a
                                                                                class="link_overlay"
                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                            >
                                                                            {{ $post->getTranslation('title') }}
                                                                            </a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="div_311" class="p_c _col">
                                    <div class="inner">
                                        @include('frontend.partials.search_address_wise_post')
                                        <div style="background: #b99409; border: 2px solid #6a560b;" id="widget_436" class="widget_color_ widget_wrap">
                                            <div class="section_header widget">
                                                <div style="font-size: 26px;" class="titlebar">
                                                    <span style="color: #fff; padding-left: 10px;">অনলাইন জরিপ </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="border: 2px solid #6a560b;" id="widget_435" class="widget_color_ widget_wrap">
                                            <div class="poll_widget widget">
                                                <div class="poll_container">
                                                    <div class="poll_top_part mb10 pb10">
                                                        <div style="font-size: 17px; line-height: 25px;" class="poll_question">
                                                            {{ $poll->poll_content }}
                                                        </div>
                                                    </div>
                                                    <div id="jwPollAjaxWorking" class="mb10" style="display: none;"></div>

                                                    <div id="jwPollVoteFormContainer" class="mb10">
                                                        <form class="mb10" action="{{ route('poll_send') }}" method="post" name="vote_the_poll" id="vote_the_poll">
                                                        <div class="poll_bottom">
                                                          
                                                               @csrf
                                                                <input type="hidden" name="the_poll_id" value="{{ $poll->id}}" />
                                                                <label><input type="radio" class="jPollY" name="the_vote" value="yes" />হ্যাঁ</label>
                                                                <label><input type="radio" class="jPollN" name="the_vote" value="no" />না</label>
                                                                <label><input type="radio" class="jPollNC" name="the_vote" value="no_comment" />মন্তব্য নেই</label>
                                                                <br>
                                                         
                                                            
                                                        <div class="poll_button">
                                                            <div style="width: 35%;" id="submit_the_poll" class="result_button fl">
                                                                <button style="    background: #b99409; color: #fff; padding: 0px 10px; font-size: 15px;" type="submit" id="vote_provide">ভোট দিন</button></div>
                                                            <div style="background: #b99409;" class="old_result nomarg"><a style="color:#fff;" href="/poll">পুরোনো ফলাফল</a></div>
                                                        </div>
                                                    </form>
                                                        <div class="total_vote_container">ভোট দিয়েছেন <span class="total_vote">{{ $poll->user_count}}</span> জন <br /></div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="FB_page mt-3 pt-3">
                                        
                                        <!--fbbbbbbbbbb-->
                                  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F{{$fb_name}}&tabs=timeline&width=320&height=150&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="320" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                     
                                      <!--fbbbbbbbbbbb-->
                                      
                                      
                                      </div>
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
 <div class="ads_place">
                                   @if(isset($ads['6_ads']) && $ads['6_ads'])
    <div class="advertisment w-100 bg-danger text-white mt-3">
        <a class="ads-link" target="_blank" href="{{ $ads['6_ads']->link }}">
            <img src="{{ asset('uploads/CustomAds/' . $ads['6_ads']->image) }}" alt="">
        </a>
    </div>
@endif     
                        </div>

            
                        <div id="wrapper_347" class="wrapper special_33_3_66_7 bbash btash container_top_padding container_bottom_padding jw_progressive_load">
                            <div class="hf_wrap">
                                <div class="color_theme_">
                                    <div class="headbar"><a href="{{ route('posts.category', $dynamic_6th_category_1st_post[0]->category->slug) }}">{{ $dynamic_6th_category_1st_post[0]->category->name }}</a></div>
                                </div>
                            </div>
                            <div class="inner">
                                <div id="div_348" class="p_d _col">
                                    <div class="inner">
                                        <div id="wrapper_412" class="wrapper special_30_70">
                                            <div class="inner">
                                                <div id="div_413" class="p_d_d brash _col">
                                                    <div class="inner">
                                                        <div id="widget_415" class="widget_color_ widget_wrap">
                                                            <div class="contents_listing widget">
                                                                <div id="contents_415_ajax_container" class="contents summery_view">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_6th_category_1st_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                @if ($post->video_link != null)
                                                                                @else
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                        />
                                                                                    </span>

                                                                                    <span class="content_type"></span>
                                                                                </div>
@endif
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                            {{ $post->getTranslation('title') }}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="summery">
                                                                                        {!! Str::limit(strip_tags($post->getTranslation('description')), $limit = 150, $end = '...') !!}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="div_414" class="p_d_c brash _col">
                                                    <div class="inner">
                                                        <div id="widget_416" class="widget_color_ widget_wrap">
                                                            <div class="contents_listing widget">
                                                                <div id="contents_416_ajax_container" class="contents summery_view">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_6th_category_2nd_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                @if ($post->video_link != null)
                                                                                @else
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                        />
                                                                                    </span>

                                                                                    <span class="content_type"></span>
                                                                                </div>
@endif
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                       
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                            {{ $post->getTranslation('title') }}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="div_349" class="p_c _col">
                                    <div class="inner">
                                        <div id="widget_355" class="widget_color_ widget_wrap">
                                            <div class="contents_listing widget">
                                                <div id="contents_355_ajax_container" class="contents summery_view ash_bb">
                                                    <div class="row">
                                                        @foreach ($dynamic_6th_category_3rd_post as $post)
                                                        <div class="col col1">
                                                            <div class="each col_in has_image image_left content_capability_blog content_type_news responsive_image_hide_">
                                                                <!--image-->
                                                                @if ($post->video_link != null)
                                                                @else
                                                                <div class="image">
                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                        />
                                                                    </span>

                                                                    <span class="content_type"></span>
                                                                </div>
                                                                @endif
                                                                <div class="info">
                                                                    <div class="title_holder">
                                                                        <div class="tag_title_holder">
                                                                            <h2 class="title">
                                                                                <!--overlay anchor-->
                                                                                <a
                                                                                class="link_overlay"
                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                            >
                                                                            {{ $post->getTranslation('title') }}
                                                                            </a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="ads_place">
                            @if(isset($ads['7_ads']) && $ads['7_ads'])
    <div class="advertisment w-100 bg-danger text-white mt-3">
        <a class="ads-link" target="_blank" href="{{ $ads['7_ads']->link }}">
            <img src="{{ asset('uploads/CustomAds/' . $ads['7_ads']->image) }}" alt="">
        </a>
    </div>
@endif
                        </div>
                           
                        
                        <div id="wrapper_328" class="wrapper special_33_3_66_7 bbash container_top_padding jw_progressive_load">
                            <div class="inner">
                                <div id="div_329" class="p_d _col">
                                    <div class="inner">
                                        <div id="wrapper_331" class="wrapper">
                                            <div class="hf_wrap">
                                                <div class="color_theme_">
                                                    <div class="headbar"><a href="{{ route('posts.category', $dynamic_7th_category_1st_post[0]->category->slug) }}">{{ $dynamic_7th_category_1st_post[0]->category->name }}</a></div>
                                                </div>
                                            </div>
                                            <div class="inner">
                                                <div id="div_332" class="p_d_a brash _col">
                                                    <div class="inner">
                                                        <div id="widget_334" class="widget_color_ widget_wrap">
                                                            <div class="contents_listing widget">
                                                                <div id="contents_334_ajax_container" class="contents summery_view ash_bb m_hide_excerpt">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_7th_category_1st_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_ m_show_image_as_top">
                                                                                <!--image-->
                                                                                @if ($post->video_link != null)
                                                                                @else
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                        />
                                                                                    </span>

                                                                                    <span class="content_type"></span>
                                                                                </div>
@endif
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                            {!! Str::limit(strip_tags($post->getTranslation('title')), $limit = 20, $end = '...') !!}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="summery">
                                                                                        {!! Str::limit(strip_tags($post->getTranslation('description')), $limit = 150, $end = '...') !!}
                                                                                        <!--<span class="excerpt_more" title="বিস্তারিত"><span>বিস্তারিত</span></span>-->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="widget_335" class="widget_color_ widget_wrap">
                                                            <div class="contents_listing widget">
                                                                <div id="contents_335_ajax_container" class="contents summery_view m_hide_excerpt">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_7th_category_2nd_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_left content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                @if ($post->video_link != null)
                                                                                @else
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                        />
                                                                                    </span>

                                                                                    <span class="content_type"></span>
                                                                                </div>
@endif
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                              {!! Str::limit(strip_tags($post->getTranslation('title')), $limit = 40, $end = '...') !!}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="summery">
                                                                                        {!! Str::limit(strip_tags($post->getTranslation('description')), $limit = 100, $end = '...') !!}
                                                                                        <!--<span class="excerpt_more" title="বিস্তারিত"><span>বিস্তারিত</span></span>-->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="div_333" class="p_d_a brash _col">
                                                    <div class="inner">
                                                        <div id="widget_336" class="widget_color_ widget_wrap">
                                                            <div class="contents_listing widget">
                                                                <div id="contents_336_ajax_container" class="contents summery_view ash_bb m_hide_excerpt">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_7th_category_3rd_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_left content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                @if ($post->video_link != null)
                                                                                @else
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                        />
                                                                                    </span>

                                                                                    <span class="content_type"></span>
                                                                                </div>
@endif
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                             {!! Str::limit(strip_tags($post->getTranslation('title')), $limit = 30, $end = '...') !!}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="summery">
                                                                                        {!! Str::limit(strip_tags($post->getTranslation('description')), $limit = 250, $end = '...') !!}
                                                                                        <!--<span class="excerpt_more" title="বিস্তারিত"><span>বিস্তারিত</span></span>-->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="div_330" class="p_c _col">
                                    <div class="inner">
                                       
                                        <div id="widget_438" class="widget_color_ widget_wrap">
                                            <div class="contents_listing widget">
                                                <div id="contents_438_ajax_container" class="contents summery_view">
                                                    <div class="row">
                                                        @foreach ($dynamic_7th_category_4th_post as $post)
                                                        <div class="col col1">
                                                            <div class="each col_in has_image image_left content_capability_blog content_type_news responsive_image_hide_">
                                                                <!--image-->
                                                                @if ($post->video_link != null)
                                                                                @else
                                                                <div class="image">
                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                        />
                                                                    </span>

                                                                    <span class="content_type"></span>
                                                                </div>
@endif
                                                                <div class="info">
                                                                    <div class="title_holder">
                                                                        <div class="tag_title_holder">
                                                                            <h2 class="title">
                                                                                <!--overlay anchor-->
                                                                                <a
                                                                                class="link_overlay"
                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                            >
                                                                            {!! Str::limit(strip_tags($post->getTranslation('title')), $limit = 20, $end = '...') !!}
                                                                            </a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="widget_722" class="widget_color_ widget_wrap">
                                            <div class="contents_listing hide_this_desktop widget">
                                                <div id="contents_722_ajax_container" class="contents summery_view">
                                                    @if(isset($ads['3_ads']) && $ads['3_ads'])
    <div class="advertisment w-100 bg-danger text-white mt-3">
        <a class="ads-link" target="_blank" href="{{ $ads['3_ads']->link }}">
            <img src="{{ asset('uploads/CustomAds/' . $ads['3_ads']->image) }}" alt="">
        </a>
    </div>
@endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                         <div class="ads_place">
                                 @if(isset($ads['8_ads']) && $ads['8_ads'])
    <div class="advertisment w-100 bg-danger text-white mt-3">
        <a class="ads-link" target="_blank" href="{{ $ads['8_ads']->link }}">
            <img src="{{ asset('uploads/CustomAds/' . $ads['8_ads']->image) }}" alt="">
        </a>
    </div>
@endif
                        </div>
                    
                        
                        <div id="wrapper_338" class="wrapper special_33_3_66_7 bbash container_top_padding jw_progressive_load">
                            <div class="hf_wrap">
                                <div class="color_theme_">
                                    <div class="headbar"><a href="{{ route('posts.category', $dynamic_8th_category_1st_post[0]->category->slug) }}">{{ $dynamic_8th_category_1st_post[0]->category->name }}</a></div>
                                </div>
                            </div>
                            <div class="inner">
                                <div id="div_339" class="p_d _col">
                                    <div class="inner">
                                        <div id="wrapper_341" class="wrapper">
                                            <div class="inner">
                                                <div id="div_342" class="p_d_a brash _col">
                                                    <div class="inner">
                                                        <div id="widget_344" class="widget_color_ widget_wrap">
                                                            <div class="contents_listing widget">
                                                                <div id="contents_344_ajax_container" class="contents summery_view ash_bb">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_8th_category_1st_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_left content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                @if ($post->video_link != null)
                                                                                @else
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                        />
                                                                                    </span>

                                                                                    <span class="content_type"></span>
                                                                                </div>
@endif
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                                    {!! Str::limit(strip_tags($post->getTranslation('title')), $limit = 50, $end = '...') !!}
                                                                                     
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="div_343" class="p_d_a brash _col">
                                                    <div class="inner">
                                                        <div id="widget_345" class="widget_color_ widget_wrap">
                                                            <div class="contents_listing widget">
                                                                <div id="contents_345_ajax_container" class="contents summery_view 300x250_image">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_8th_category_2nd_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                @if ($post->video_link != null)
                                                                                @else
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 58.333333%;">
                                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                        />
                                                                                    </span>

                                                                                    <span class="content_type"></span>
                                                                                </div>
@endif
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                             {!! Str::limit(strip_tags($post->getTranslation('title')), $limit = 20, $end = '...') !!}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="summery">
                                                                                        {!! Str::limit(strip_tags($post->getTranslation('description')), $limit = 200, $end = '...') !!}
                                                                                        <!--<span class="excerpt_more" title="বিস্তারিত"><span>বিস্তারিত</span></span>-->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="div_340" class="p_c _col">
                                    <div class="inner">
                                        <div id="widget_346" class="widget_color_ widget_wrap">
                                            <div class="contents_listing widget">
                                                <div id="contents_346_ajax_container" class="contents summery_view ash_bb">
                                                    <div class="row">
                                                        @foreach ($dynamic_8th_category_3rd_post as $post)
                                                        <div class="col col1">
                                                            <div class="each col_in has_image image_left content_capability_blog content_type_news responsive_image_hide_">
                                                                <!--image-->
                                                                @if ($post->video_link != null)
                                                                @else
                                                                <div class="image">
                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                        />
                                                                    </span>

                                                                    <span class="content_type"></span>
                                                                </div>
@endif
                                                                <div class="info">
                                                                    <div class="title_holder">
                                                                        <div class="tag_title_holder">
                                                                            <h2 class="title">
                                                                                <!--overlay anchor-->
                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                            {!! Str::limit(strip_tags($post->getTranslation('title')), $limit = 50, $end = '...') !!}
                                                                                            </a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ads_place">
                              @if(isset($ads['9_ads']) && $ads['9_ads'])
    <div class="advertisment w-100 bg-danger text-white mt-3">
        <a class="ads-link" target="_blank" href="{{ $ads['9_ads']->link }}">
            <img src="{{ asset('uploads/CustomAds/' . $ads['9_ads']->image) }}" alt="">
        </a>
    </div>
@endif
                        </div>
                       
                        <div id="wrapper_417" class="wrapper bbash container_top_padding jw_progressive_load">
                            <div class="inner">
                                <div id="div_418" class="p_b brash _col">
                                    <div class="hf_wrap">
                                        <div class="color_theme_">
                                            <div class="headbar"><a href="{{ route('posts.category', $dynamic_9th_category_1st_post[0]->category->slug) }}">{{ $dynamic_9th_category_1st_post[0]->category->name}}</a></div>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <div id="widget_421" class="widget_color_ widget_wrap">
                                            <div class="contents_listing widget">
                                                <div id="contents_421_ajax_container" class="contents summery_with_list_view">
                                                    <div class="row">
                                                        @foreach ($dynamic_9th_category_1st_post as $post)
                                                        <div class="col col1">
                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_">
                                                                <!--image-->
                                                                @if ($post->video_link != null) @else
                                                                <div class="image">
                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                        <img alt="{{ $post->getTranslation('title') }}" class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}" />
                                                                    </span>
                        
                                                                    <span class="content_type"></span>
                                                                </div>
                                                                @endif
                                                                <div class="info">
                                                                    <div class="title_holder">
                                                                        <div class="tag_title_holder">
                                                                            <h2 class="title">
                                                                                <!--overlay anchor-->
                                                                                <a class="link_overlay" title="{{ $post->getTranslation('title') }}" href="{{ route('post.details', [$post->category->slug, $post->id]) }}">
                                                                                    {{ $post->getTranslation('title') }}
                                                                                </a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <div class="col col1">
                                                            <div class="col_in">
                                                                <div class="listing">
                                                                    @foreach ($dynamic_9th_category_2nd_post as $post)
                                                                    <div class="each col_in has_image image_left content_capability_blog content_type_news responsive_image_hide_">
                                                                        <div class="image">
                                                                            <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                <img alt="{{ $post->getTranslation('title') }}" class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}" />
                                                                            </span>
                                                                            <span class="content_type"></span>
                                                                        </div>
                                                                        <div class="info">
                                                                            <div class="title_holder">
                                                                                <div class="tag_title_holder">
                                                                                    <h2 class="title">
                                                                                        <!--overlay anchor-->
                                                                                        <a class="link_overlay" title="{{ $post->getTranslation('title') }}" href="{{ route('post.details', [$post->category->slug, $post->id]) }}">
                                                                                            {{ $post->getTranslation('title') }}
                                                                                        </a>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="div_419" class="p_b brash _col">
                                    <div class="hf_wrap">
                                        <div class="color_theme_">
                                            <div class="headbar"><a href="{{ route('posts.category', $dynamic_10th_category_1st_post[0]->category->slug) }}">{{ $dynamic_10th_category_1st_post[0]->category->name}}</a></div>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <div id="widget_422" class="widget_color_ widget_wrap">
                                            <div class="contents_listing widget">
                                                <div id="contents_422_ajax_container" class="contents summery_with_list_view">
                                                    <div class="row">
                                                        @foreach ($dynamic_10th_category_1st_post as $post)
                                                        <div class="col col1">
                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_">
                                                                <!--image-->
                                                                @if ($post->video_link != null) @else
                                                                <div class="image">
                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                        <img alt="{{ $post->getTranslation('title') }}" class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}" />
                                                                    </span>
                        
                                                                    <span class="content_type"></span>
                                                                </div>
                                                                @endif
                                                                <div class="info">
                                                                    <div class="title_holder">
                                                                        <div class="tag_title_holder">
                                                                            <h2 class="title">
                                                                                <!--overlay anchor-->
                                                                                <a class="link_overlay" title="{{ $post->getTranslation('title') }}" href="{{ route('post.details', [$post->category->slug, $post->id]) }}">
                                                                                    {{ $post->getTranslation('title') }}
                                                                                </a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <div class="col col1">
                                                            <div class="col_in">
                                                                <div class="listing">
                                                                    @foreach ($dynamic_10th_category_2nd_post as $post)
                                                                    <div class="each col_in has_image image_left content_capability_blog content_type_news responsive_image_hide_">
                                                                        <div class="image">
                                                                            <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                <img alt="{{ $post->getTranslation('title') }}" class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}" />
                                                                            </span>
                                                                            <span class="content_type"></span>
                                                                        </div>
                                                                        <div class="info">
                                                                            <div class="title_holder">
                                                                                <div class="tag_title_holder">
                                                                                    <h2 class="title">
                                                                                        <!--overlay anchor-->
                                                                                        <a class="link_overlay" title="{{ $post->getTranslation('title') }}" href="{{ route('post.details', [$post->category->slug, $post->id]) }}">
                                                                                            {{ $post->getTranslation('title') }}
                                                                                        </a>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(is_array($dynamic_11th_category_1st_post))
                                <div id="div_420" class="p_b _col">
                                    <div class="hf_wrap">
                                        <div class="color_theme_">
                                            <div class="headbar"><a href="{{ route('posts.category', $dynamic_11th_category_1st_post[0]->category->slug) }}">{{ $dynamic_11th_category_1st_post[0]->category->name}}</a></div>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <div id="widget_423" class="widget_color_ widget_wrap">
                                            <div class="contents_listing widget">
                                                <div id="contents_423_ajax_container" class="contents summery_with_list_view">
                                                    <div class="row">
                                                        @foreach ($dynamic_11th_category_1st_post as $post)
                                                        <div class="col col1">
                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_">
                                                                <!--image-->
                                                                @if ($post->video_link != null) @else
                                                                <div class="image">
                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                        <img alt="{{ $post->getTranslation('title') }}" class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}" />
                                                                    </span>
                        
                                                                    <span class="content_type"></span>
                                                                </div>
                                                                @endif
                                                                <div class="info">
                                                                    <div class="title_holder">
                                                                        <div class="tag_title_holder">
                                                                            <h2 class="title">
                                                                                <!--overlay anchor-->
                                                                                <a class="link_overlay" title="{{ $post->getTranslation('title') }}" href="{{ route('post.details', [$post->category->slug, $post->id]) }}">
                                                                                    {{ $post->getTranslation('title') }}
                                                                                </a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <div class="col col1">
                                                            <div class="col_in">
                                                                <div class="listing">
                                                                    @foreach ($dynamic_11th_category_2nd_post as $post)
                                                                    <div class="each col_in has_image image_left content_capability_blog content_type_news responsive_image_hide_">
                                                                        <div class="image">
                                                                            <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                <img alt="{{ $post->getTranslation('title') }}" class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}" />
                                                                            </span>
                                                                            <span class="content_type"></span>
                                                                        </div>
                                                                        <div class="info">
                                                                            <div class="title_holder">
                                                                                <div class="tag_title_holder">
                                                                                    <h2 class="title">
                                                                                        <!--overlay anchor-->
                                                                                        <a class="link_overlay" title="{{ $post->getTranslation('title') }}" href="{{ route('post.details', [$post->category->slug, $post->id]) }}">
                                                                                            {{ $post->getTranslation('title') }}
                                                                                        </a>
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  @endif
                            </div>
                        </div>
                                 <div class="ads_place">
                      @if ($ten_ads)
                                                        <div class="advertisment w-100 bg-danger text-white mt-3">
                                                            <a class="ads-link" target="_blank" href="{{$ten_ads->link}}">
                                                                <img src="{{ asset('uploads/CustomAds/' . $ten_ads->image) }}" alt="">
                                                            </a>
                                                        </div>
                                                    @endif
                        
                        </div>
                        {{-- st --}}
                        <div id="wrapper_323" class="wrapper special_33_3_66_7 bbash container_top_padding jw_progressive_load">
                            <div class="inner">
                                <div id="widget_326" class="widget_color_ widget_wrap">
                                    <div class="contents_pagetab widget">
                                        <div id="page_tabs_326" class="page_content_tabs">
                                            <div class="tabheadings">
                                                <div class="each_heading active" data-index="1">{{ $dynamic_12th_category_1st_post[0]->category->name}}</div>
                                                <div class="each_heading" data-index="2">{{ $dynamic_13th_category_1st_post[0]->category->name}}</div>
                                                @if(is_array($dynamic_14th_category_1st_post))
                                                <div class="each_heading" data-index="3">{{ $dynamic_14th_category_1st_post[0]->category->name}}</div>
                                                @endif
                                            </div>
                                            <div class="tabitems">
                                                <div class="each_block datatab-1 active">
                                                    <div class="row">
                                                        <div class="col col2">
                                                            <div class="col_in">
                                                                <div class="contents summery_view big_content_title">
                                                                    <div class="row">

                                                                        @foreach ($dynamic_12th_category_1st_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                <div class="image">
                                                                                    <span >
                                                                                        <img
                                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                                        />
                                                                                    </span>
                        
                                                                                    <span class="content_type"></span>
                                                                                </div>
                        
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                            {{ $post->getTranslation('title') }}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col col2">
                                                            <div class="col_in">
                                                                <div class="contents summery_view ash_bb">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_12th_category_2nd_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_left content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                                        />
                                                                                    </span>
                        
                                                                                    <span class="content_type"></span>
                                                                                </div>
                        
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                            {{ $post->getTranslation('title') }}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="each_block datatab-2">
                                                    <div class="row">
                                                        <div class="col col2">
                                                            <div class="col_in">
                                                                <div class="contents summery_view ash_bb big_content_title">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_13th_category_1st_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 83.333333333333%;">
                                                                                        <img
                                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                                        />
                                                                                    </span>
                        
                                                                                    <span class="content_type"></span>
                                                                                </div>
                        
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                            {{ $post->getTranslation('title') }}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col col2">
                                                            <div class="col_in">
                                                                <div class="contents summery_view ash_bb">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_13th_category_2nd_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_left content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                                        />
                                                                                    </span>
                        
                                                                                    <span class="content_type"></span>
                                                                                </div>
                        
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                            {{ $post->getTranslation('title') }}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(is_array($dynamic_14th_category_1st_post))
                                                <div class="each_block datatab-3">
                                                    <div class="row">
                                                        <div class="col col2">
                                                            <div class="col_in">
                                                                <div class="contents summery_view ash_bb big_content_title">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_14th_category_1st_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_top content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 83.333333333333%;">
                                                                                        <img
                                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                                        />
                                                                                    </span>
                        
                                                                                    <span class="content_type"></span>
                                                                                </div>
                        
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                            {{ $post->getTranslation('title') }}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col col2">
                                                            <div class="col_in">
                                                                <div class="contents summery_view ash_bb">
                                                                    <div class="row">
                                                                        @foreach ($dynamic_14th_category_2nd_post as $post)
                                                                        <div class="col col1">
                                                                            <div class="each col_in has_image image_left content_capability_blog content_type_news responsive_image_hide_">
                                                                                <!--image-->
                                                                                <div class="image">
                                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                                        <img
                                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                                        />
                                                                                    </span>
                        
                                                                                    <span class="content_type"></span>
                                                                                </div>
                        
                                                                                <div class="info">
                                                                                    <div class="title_holder">
                                                                                        <div class="tag_title_holder">
                                                                                            <h2 class="title">
                                                                                                <!--overlay anchor-->
                                                                                                <a
                                                                                                class="link_overlay"
                                                                                                title="{{ $post->getTranslation('title') }}"
                                                                                                href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                            >
                                                                                            {{ $post->getTranslation('title') }}
                                                                                            </a>
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                             @endif   
                                            </div>
                                        </div>
                        
                                        <script>
                                            $("#page_tabs_326 .each_heading").click(function (e) {
                                                $(this).parent().find(".each_heading").removeClass("active");
                                                $(this).parent().parent().find(".each_block").removeClass("active");
                                                var i = $(this).addClass("active").data("index");
                                                $(this)
                                                    .parent()
                                                    .parent()
                                                    .find(".datatab-" + i)
                                                    .addClass("active");
                        
                                                if (
                                                    !$(this)
                                                        .parent()
                                                        .parent()
                                                        .find(".datatab-" + i)
                                                        .data("fetched")
                                                ) {
                                                    $(this)
                                                        .parent()
                                                        .parent()
                                                        .find(".datatab-" + i)
                                                        .find("[data-ari]")
                                                        .each(function () {
                                                            jwARI.fetch($(this));
                                                        });
                                                    $(this)
                                                        .parent()
                                                        .parent()
                                                        .find(".datatab-" + i)
                                                        .data("fetched", true);
                                                }
                                            });
                        
                                            $("#page_tabs_326 .each_block.active [data-ari]").each(function () {
                                                jwARI.fetch($(this));
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- end --}}
                               <div class="ads_place">
                      @if ($eleven_ads)
                                                        <div class="advertisment w-100 bg-danger text-white mt-3">
                                                            <a class="ads-link" target="_blank" href="{{$eleven_ads->link}}">
                                                                <img src="{{ asset('uploads/CustomAds/' . $eleven_ads->image) }}" alt="">
                                                            </a>
                                                        </div>
                                                    @endif
                        
                        </div>
                        
                        <div id="wrapper_480" class="wrapper special_40_60 bbash container_ash_bg container_100 container_top_padding jw_progressive_load">
                            <div class="hf_wrap">
                                <div class="color_theme_">
                                    <div class="headbar"><a href="#">ভিডিও</a></div>
                                </div>
                            </div>
                            <div class="inner">
                                <div id="div_481" class="p_d _col">
                                    <div class="inner">
                                        <div id="widget_483" class="widget_color_ widget_wrap">
                                            <div class="contents_listing widget">
                                                <div id="contents_483_ajax_container" class="contents summery_view">
                                                    <div class="row">
                                                        @foreach ($videoNewsSt1 as $post)
                                                        <div class="col col1">
                                                            <div class="each col_in has_image image_top content_capability_gallery content_type_watch responsive_image_hide_">
                                                                <!--image-->
                                                                <div class="image">
                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                        <img
                                                                                alt="{{ $post->getTranslation('title') }}"
                                                                                class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                            />
                                                                    </span>

                                                                    <span class="content_type"></span>
                                                                </div>

                                                                <div class="info">
                                                                    <div class="title_holder">
                                                                        <div class="tag_title_holder">
                                                                            <h2 class="title">
                                                                                <!--overlay anchor-->
                                                                                <a
                                                                                        class="link_overlay"
                                                                                        title="{{ $post->getTranslation('title') }}"
                                                                                        href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                    >
                                                                                    {{ $post->getTranslation('title') }}
                                                                                    </a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="div_482" class="p_c _col">
                                    <div class="inner">
                                        <div id="widget_484" class="widget_color_ widget_wrap">
                                            <div class="contents_listing widget">
                                                <div id="contents_484_ajax_container" class="contents summery_view col_articles column_view ncol_2">
                                                    <div class="row">
                                                        @foreach ($videoNewsSt2 as $post)
                                                        <div class="col col2">
                                                            <div class="each col_in has_image image_top content_capability_gallery content_type_watch responsive_image_hide_">
                                                                <!--image-->
                                                                <div class="image">
                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                        <img
                                                                                alt="{{ $post->getTranslation('title') }}"
                                                                                class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                            />
                                                                    </span>

                                                                    <span class="content_type"></span>
                                                                </div>

                                                                <div class="info">
                                                                    <div class="title_holder">
                                                                        <div class="tag_title_holder">
                                                                            <h2 class="title">
                                                                                <!--overlay anchor-->
                                                                                <a
                                                                                        class="link_overlay"
                                                                                        title="{{ $post->getTranslation('title') }}"
                                                                                        href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                    >
                                                                                    {{ $post->getTranslation('title') }}
                                                                                    </a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="row">
                                                        @foreach ($videoNewsSt3 as $post)
                                                        <div class="col col2">
                                                            <div class="each col_in has_image image_top content_capability_gallery content_type_watch responsive_image_hide_">
                                                                <!--image-->
                                                                <div class="image">
                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                    />
                                                                    </span>

                                                                    <span class="content_type"></span>
                                                                </div>

                                                                <div class="info">
                                                                    <div class="title_holder">
                                                                        <div class="tag_title_holder">
                                                                            <h2 class="title">
                                                                                <!--overlay anchor-->
                                                                                <a
                                                                                        class="link_overlay"
                                                                                        title="{{ $post->getTranslation('title') }}"
                                                                                        href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                    >
                                                                                    {{ $post->getTranslation('title') }}
                                                                                    </a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <div class="ads_place">
                      @if ($twelve_ads)
                                                        <div class="advertisment w-100 bg-danger text-white mt-3">
                                                            <a class="ads-link" target="_blank" href="{{$twelve_ads->link}}">
                                                                <img src="{{ asset('uploads/CustomAds/' . $twelve_ads->image) }}" alt="">
                                                            </a>
                                                        </div>
                                                    @endif
                        
                        </div>
                        
                        
                        <div id="wrapper_485" class="wrapper special_40_60 bbash container_top_padding jw_progressive_load">
                            <div class="hf_wrap">
                                <div class="color_theme_">
                                    <div class="headbar"><a href="#">ছবি</a></div>
                                </div>
                            </div>
                            <div class="inner">
                                <div id="div_486" class="p_d _col">
                                    <div class="inner">
                                        <div id="widget_489" class="widget_color_ widget_wrap">
                                            <div class="contents_listing widget">
                                                <div id="contents_489_ajax_container" class="contents summery_view">
                                                    <div class="row">
                                                        @foreach ($photosSt1 as $post)
                                                            
                                                        
                                                        <div class="col col1">
                                                            <div class="each col_in has_image image_featured content_capability_gallery content_type_gallery responsive_image_hide_">
                                                                <!--image-->
                                                                <div class="image">
                                                                    <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                        <img
                                                                        alt="{{ $post->getTranslation('title') }}"
                                                                        class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                    />
                                                                    </span>

                                                                    <span class="content_type"></span>
                                                                </div>

                                                                <div class="info">
                                                                    <div class="title_holder">
                                                                        <div class="tag_title_holder">
                                                                            <h2 class="title">
                                                                                <!--overlay anchor-->
                                                                                <a
                                                                                        class="link_overlay"
                                                                                        title="{{ $post->getTranslation('title') }}"
                                                                                        href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                                    >
                                                                                    {{ $post->getTranslation('title') }}
                                                                                    </a>
                                                                            </h2>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>
                                </div>
                                <div class="p_c">
                                    <div id="widget_490" class="widget_color_ widget_wrap">
                                        <div class="contents_listing widget">
                                            <div id="contents_490_ajax_container" class="contents summery_view col_articles column_view ncol_2">
                                                <div class="row">
                                                    @foreach ($photosSt2 as $post)
                                                    <div class="col col2">
                                                        <div class="each col_in has_image image_featured content_capability_gallery content_type_gallery responsive_image_hide_">
                                                            <!--image-->
                                                            <div class="image">
                                                                <span class="jwImgWrap" style="padding-bottom: 56.25%;">
                                                                    <img
                                                                    alt="{{ $post->getTranslation('title') }}"
                                                                    class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                />
                                                                </span>
    
                                                                <span class="content_type"></span>
                                                            </div>
    
                                                            <div class="info">
                                                                <div class="title_holder">
                                                                    <div class="tag_title_holder">
                                                                        <h2 class="title">
                                                                            <!--overlay anchor-->
                                                                            <a
                                                                            class="link_overlay"
                                                                            title="{{ $post->getTranslation('title') }}"
                                                                            href="{{ route('post.details', [$post->category->slug, $post->id]) }}"
                                                                        >
                                                                        {{ $post->getTranslation('title') }}
                                                                        </a>
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                        </div>
                        
                                <div class="ads_place">
                      @if ($thirteen_ads)
                                                        <div class="advertisment w-100 bg-danger text-white mt-3">
                                                            <a class="ads-link" target="_blank" href="{{$thirteen_ads->link}}">
                                                                <img src="{{ asset('uploads/CustomAds/' . $thirteen_ads->image) }}" alt="">
                                                            </a>
                                                        </div>
                                                    @endif
                        
                        </div>
                        
                        <div class="row">
                        <div class="col-8 pd2 mdv">
                            <div class="slideshow-container">
                              @foreach ($slides as $post)
                       
                  
                            <div class="mySlides fade">
                                <a href="{{ route('post.details', [$post->category->slug, $post->id]) }}">
                            
                            <img alt="{{ $post->getTranslation('title') }}" class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                                                                                        />
                            <div class="text">
                            {!! Str::limit(strip_tags($post->getTranslation('title')), $limit = 100, $end = '...') !!}</div>
                            
                             <div class="ss_summery">
                                 {!! Str::limit(strip_tags($post->getTranslation('description')), $limit = 220, $end = '...') !!}
                              </div>
                                </a>
                            </div>
                            
                            @endforeach
                            </div>
                            <div class="slider_mark" style="text-align:center">
                                @foreach ($slides as $post)
                                <span class="dot"></span> 
                                
                                @endforeach
                            </div>
                            </div>
                            <div class="col-4 pd2 mdv">
                                <div style="border: 2px solid #836d1e;" class="ep_wrapper">
                                    <h3 style="    background: #b99409;color: #fff;text-align: center;" class="emb2">ই-পেপার </h3>
                                    <a href="{{ $pglink }}"><img src="{{ $imglink}}" class="img-fluid"></a>
                                </div>
                                
                            </div>
                      
                        </div>
                        <script>
                                let slideIndex = 0;
                               
                                function showSlides() {
                                  let i;
                                  let slides = document.getElementsByClassName("mySlides");
                                  let dots = document.getElementsByClassName("dot");
                                  for (i = 0; i < slides.length; i++) {
                                    slides[i].style.display = "none";  
                                  }
                                  slideIndex++;
                                  if (slideIndex > slides.length) {slideIndex = 1}    
                                  for (i = 0; i < dots.length; i++) {
                                    dots[i].className = dots[i].className.replace(" active", "");
                                  }
                                  slides[slideIndex-1].style.display = "block";  
                                  dots[slideIndex-1].className += " active";
                                  setTimeout(showSlides, 5000); // Change image every 2 seconds
                                }
                                showSlides();
                        </script>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        @endsection