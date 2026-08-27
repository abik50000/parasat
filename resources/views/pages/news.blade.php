@extends('layouts.page')

@section('breadcrumb', __('page.news.breadcrumb'))
@section('title', __('page.news.title'))

@section('page-content')

<div class="section-cotent-wrap grid-item mb-100" style="margin-bottom:56px;">
    <div class="grid-one">
        <p class="section-paragraph red" data-anim="fade-right">{{ __('pages.news.section_label') }}</p>
    </div>
    <div class="grid-two">
        <h2 class="section-title dark" data-anim="fade-up">{{ __('pages.news.heading1') }}</h2>
        @if(__('pages.news.heading2'))
        <h2 class="section-title dark" data-anim="fade-up" data-anim-delay="80">{{ __('pages.news.heading2') }}</h2>
        @endif
        <p class="banner-paragraph dark" data-anim="fade-up" data-anim-delay="160" style="margin-top:24px;">
            {{ __('pages.news.intro') }}
        </p>
    </div>
</div>

<div class="page-filters" data-anim="fade-up">
    @foreach(trans('pages.news.filters') as $i => $cat)
    <button class="page-filter-btn {{ $i === 0 ? 'active' : '' }}">{{ $cat }}</button>
    @endforeach
</div>

@php $news = trans('pages.news.items'); @endphp

<div class="page-grid-news" data-anim-stagger="fade-up" data-anim-stagger-gap="80">
    @foreach($news as $item)
    <article class="page-news-card">
        <div class="page-news-thumb">
            <img src="{{ asset($item['photo']) }}" alt="{{ $item['title'] }}">
        </div>
        <div class="page-news-body">
            <div class="page-news-meta">
                <span class="page-badge page-badge--cat">{{ $item['cat'] }}</span>
                <span class="page-news-date">{{ $item['date'] }}</span>
            </div>
            <h3 class="page-news-title">{{ $item['title'] }}</h3>
            <p class="page-news-excerpt">{{ $item['excerpt'] }}</p>
            <a href="#" class="page-news-link">{{ __('pages.news.read_more') }}</a>
        </div>
    </article>
    @endforeach
</div>

@endsection
