@extends('layouts.page')

@section('breadcrumb', __('page.news.title') . ' / ' . \Illuminate\Support\Str::limit(str_replace(['«', '»'], '', $news->title()), 48))
@section('title', $news->title())

@section('page-content')

<div style="max-width:860px;">
    <div class="page-news-meta" data-anim="fade-up" style="margin-bottom:20px;">
        @if($news->categoryLabel())
        <span class="page-badge page-badge--cat">{{ $news->categoryLabel() }}</span>
        @endif
        <span class="page-news-date">{{ optional($news->published_at)->format('d.m.Y') }}</span>
    </div>

    <figure class="page-figure" data-anim="fade-up">
        <img src="{{ $news->imageUrl() }}" alt="{{ $news->title() }}">
    </figure>

    <div class="page-body-text" data-anim="fade-up">
        {!! nl2br(e($news->body() ?: $news->excerpt())) !!}
    </div>

    <a href="{{ route('news') }}" class="page-action-link" data-anim="fade-up">← {{ __('page.news.title') }}</a>
</div>

@endsection
