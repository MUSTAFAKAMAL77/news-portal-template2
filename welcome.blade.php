@extends('frontend.layouts.app')

@section('meta_title')
    {{ $post->meta_title }}
@stop

@section('meta_description')
    {{ $post->meta_description }}
@stop

@section('meta')
    <!-- Schema.org markup -->
    <meta itemprop="name" content="{{ $post->meta_title }}" />
    <meta itemprop="description" content="{{ $post->meta_description }}" />
    <meta itemprop="image" content="{{ uploaded_asset_w($post->meta_img) }}" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product" />
    <meta name="twitter:site" content="@publisher_handle" />
    <meta name="twitter:title" content="{{ $post->meta_title }}" />
    <meta name="twitter:description" content="{{ $post->meta_description }}" />
    <meta name="twitter:creator" content="@author_handle" />
    <meta name="twitter:image" content="{{ uploaded_asset_w($post->meta_img) }}" />

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $post->meta_title }}" />
    <meta property="og:image" content="{{ uploaded_asset_w($post->meta_img) }}" />
    <meta property="og:description" content="{{ $post->meta_description }}" />
    <meta property="og:site_name" content="{{ get_setting('meta_title') }}" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}" />
@endsection

@section('content')
<div class="container">
    <h1 class="title mb10">{{ $post->getTranslation('title') }}</h1>

    <div class="meta-info">
        <span>{{ translate('Reporter') }} : {{ $post->reporter_name }}</span> |
        <span>প্রকাশ : {{ $postTime }}</span>
    </div>

    <div class="featured_image">
        @if ($post->video_link != null)
            <iframe class="w-100 lazyload" height="409" src="{{ $post->video_link }}"></iframe>
        @else
            <img class="lazyload" src="{{ $placeholder }}" data-src="{{ uploaded_asset($post->image) }}"
                 alt="{{ $post->getTranslation('title') }}">
        @endif
    </div>

    <article class="content">
        {!! $post->description !!}
    </article>

    <!-- ট্যাগ -->
    @if ($post->tags && count($post->tags) > 0)
        <div class="content_tags">
            <h4>বিষয়:</h4>
            <div class="topic_list">
                @foreach ($post->tags as $tag)
                    <a href="{{ $domain_url }}topic/{{ $tag->slug }}">
                        <strong>{{ $tag->name }}</strong>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    <!-- সম্পর্কিত পোস্ট -->
    @if ($readMore && count($readMore) > 0)
        <div class="related-posts">
            <h4>এ সম্পর্কিত আরও পড়ুন</h4>
            <div class="row">
                @foreach ($readMore as $relatedPost)
                    <div class="col">
                        <a href="{{ route('post.details', [$relatedPost->category->slug, $relatedPost->id]) }}">
                            <img class="lazyload" src="{{ $placeholder }}" 
                                 data-src="{{ uploaded_asset($relatedPost->image) }}" 
                                 alt="{{ $relatedPost->getTranslation('title') }}">
                            <p>{{ $relatedPost->getTranslation('title') }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if ($fromMoreNews && count($fromMoreNews) > 0)
        <div class="more-news">
            <h4>এ সম্পর্কিত আরও পড়ুন</h4>
            <div class="row">
                @foreach ($fromMoreNews as $morePost)
                    <div class="col">
                        <a href="{{ route('post.details', [$morePost->category->slug, $morePost->id]) }}">
                            <img class="lazyload" src="{{ $placeholder }}" 
                                 data-src="{{ uploaded_asset($morePost->image) }}" 
                                 alt="{{ $morePost->getTranslation('title') }}">
                            <p>{{ $morePost->getTranslation('title') }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
