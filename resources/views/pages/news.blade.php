@extends('layouts.page')

@section('breadcrumb', __('page.news.breadcrumb'))
@section('title', __('page.news.title'))
@section('page-desc', __('pages.news.intro'))

@section('page-content')

@php
    $activeCats = $news->pluck('category')->filter()->unique()->values();
@endphp

@if($activeCats->isNotEmpty())
<div class="page-filters" data-anim="fade-up">
    <button class="page-filter-btn active" data-cat="all">{{ trans('pages.news.filters')[0] }}</button>
    @foreach($activeCats as $cat)
    <button class="page-filter-btn" data-cat="{{ $cat }}">{{ __("pages.news.categories.$cat") }}</button>
    @endforeach
</div>
@endif

@if($news->isEmpty())
    <p class="page-body-text">{{ __('pages.news.empty') }}</p>
@else
<div class="page-grid-news" data-anim-stagger="fade-up" data-anim-stagger-gap="80">
    @foreach($news as $item)
    <article class="page-news-card" data-cat="{{ $item->category ?? '' }}">
        <a href="{{ route('news.show', $item) }}" class="page-news-thumb">
            <img src="{{ $item->imageUrl() }}" alt="{{ $item->title() }}">
        </a>
        <div class="page-news-body">
            <div class="page-news-meta">
                @if($item->categoryLabel())
                <span class="page-badge page-badge--cat">{{ $item->categoryLabel() }}</span>
                @endif
                <span class="page-news-date">{{ optional($item->published_at)->format('d.m.Y') }}</span>
            </div>
            <h3 class="page-news-title">{{ $item->title() }}</h3>
            <p class="page-news-excerpt">{{ $item->excerpt() }}</p>
            <a href="{{ route('news.show', $item) }}" class="page-news-link">{{ __('pages.news.read_more') }}</a>
        </div>
    </article>
    @endforeach
</div>
@endif

@if($activeCats->isNotEmpty())
<script>
    document.querySelectorAll('.page-filter-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var cat = this.dataset.cat;
            document.querySelectorAll('.page-filter-btn').forEach(function (b) { b.classList.remove('active'); });
            this.classList.add('active');
            document.querySelectorAll('.page-news-card').forEach(function (card) {
                card.style.display = (cat === 'all' || card.dataset.cat === cat) ? '' : 'none';
            });
        });
    });
</script>
@endif

@endsection
