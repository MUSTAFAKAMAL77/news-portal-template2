<!DOCTYPE html>
@if (\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
    <html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ getBaseURL() }}">
    <meta name="file-base-url" content="{{ getFileBaseURL() }}">

    <title>@yield('meta_title', get_setting('website_name') . ' | ' . get_setting('site_motto'))</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="@yield('meta_description', get_setting('meta_description'))" />
    <meta name="keywords" content="">
@stack('metalogo')
 <meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
    @yield('meta')

    @if (!isset($post))

        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{ get_setting('meta_title') }}">
        <meta itemprop="description" content="{{ get_setting('meta_description') }}">
        <meta itemprop="image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="{{ get_setting('meta_title') }}">
        <meta name="twitter:description" content="{{ get_setting('meta_description') }}">
        <meta name="twitter:creator"
            content="@author_handle">
        <meta name="twitter:image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

        <!-- Open Graph data -->
        <meta property="og:title" content="{{ get_setting('meta_title') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ route('home') }}" />
        <meta property="og:image" content="{{ uploaded_asset(get_setting('img_watermark')) }}" />
        <meta property="og:description" content="{{ get_setting('meta_description') }}" />
        <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
        <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">

    @endif
   <!-- font-awesome css -->
   <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
   <!-- font-awesome css -->
    <!-- Favicon -->
    <link rel="icon" href="{{ uploaded_asset(get_setting('site_icon')) }}">
    <!-- all css here -->
     <link rel="stylesheet" href="{{ asset('frontend/css/SolaimanLipi.css') }}">
 
    <link rel="stylesheet" href="{{ asset('frontend/css/final7e9c.css') }}">


    {{-- <link href="//cdn.ittefaq.com/contents/themes/public/style/print.css?v=1.0.293" media="print" rel="stylesheet" type="text/css"> --}}
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=61ec78ca6346030019493b64&product=inline-share-buttons" async="async">
    </script>
<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    @if (get_setting('google_analytics') == 1)
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('TRACKING_ID') }}"></script>

        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '{{ env('TRACKING_ID') }}');
        </script> @endif
<style>
    .breaking-news {
    margin-top: 10px;
}
    .mark_ul {
    display: flex;
    list-style: none;
}
.str {
 
    width: 10px;
    height: 10px;
    background: black;
    display:inline-block;
}
.border-bottom {
    border-bottom: 1px solid #dee2e6!important;
}
.mark_news_wrap_title {
    background: #0c2b57;
    padding: 6px;
    width: 138px;
    display: flex;
    align-items: center;
    justify-content: center;
    color:#fff;
}
.notice {
    margin-top: 4px;
}

.mark_news {
    display: flex;
   

}
marquee {
    display: flex;
    align-items: center;
}

marquee a{

    color: #323c46;
    text-decoration: none;


}

marquee a:hover {
    color: #108534;
    text-decoration: none;
   
}

@media only screen and (max-width:767px){
    .breaking-news {
    margin-top: 167px;
}
.whole_outer {
    padding-top: 0 !important;
}

.mt10 {
    margin-top: 23px;
}
.mark_news_wrap_title {
    background: #0c2b57;
    padding: 6px;
    width: 162px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
}

}

</style>
    @yield('css_style')
<script type="text/javascript">
	atOptions = {
		'key' : 'c6acf4f1275ccc8886e366225439c0a0',
		'format' : 'iframe',
		'height' : 60,
		'width' : 468,
		'params' : {}
	};
</head>
<body class="page_color_ jw_body_page_id_37 jw_body_content_id_ page_home_landing ">


     @include('frontend.inc.header')
     @include('frontend.inc.nav')
     @yield('content')
     @include('frontend.inc.footer')
     @yield('modal')

<script type="text/javascript">
	atOptions = {
		'key' : 'c6acf4f1275ccc8886e366225439c0a0',
		'format' : 'iframe',
		'height' : 60,
		'width' : 468,
		'params' : {}
	};
</script>

  
        
        
        <!-- Bootstrape js -->
        <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
        
 
        <script type="text/javascript" src="//cdn.ittefaq.com/contents/themes/public/js/core.js"></script>

        <script type="text/javascript" src="//cdn.ittefaq.com/contents/assets/jquery/js/jquery-jw.min.js"></script>
        {{-- <script type="text/javascript" src="//cdn.ittefaq.com/contents/assets/jadewits/jquery.jw.ari.js?v=1.0.293"></script> --}}
        <script type="text/javascript" src="//cdn.ittefaq.com/contents/themes/public/js/custom.min.js?v=1.0.293"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
                    const lazyImages = document.querySelectorAll('.lazyload');

                    const lazyLoadImage = function (image) {
                        image.setAttribute('src', image.getAttribute('data-src'));
                        image.onload = function () {
                        image.classList.remove('lazyload');
                        };
                    };

                    if ('IntersectionObserver' in window) {
                        const observer = new IntersectionObserver(function (entries) {
                        entries.forEach(function (entry) {
                            if (entry.isIntersecting) {
                            lazyLoadImage(entry.target);
                            observer.unobserve(entry.target);
                            }
                        });
                        });

                        lazyImages.forEach(function (image) {
                        observer.observe(image);
                        });
                    } else {
                        // Fallback for browsers that do not support IntersectionObserver
                        lazyImages.forEach(function (image) {
                        lazyLoadImage(image);
                        });
                    }
                    });
      </script>
        @include('frontend.inc.inline_styler')
            <!-- fontawsome js -->
        <script src="{{ asset('frontend/js/all.js') }}"></script>
        @yield('script')

    </div>
</body>

</html>
