@extends('layouts.page')

@section('breadcrumb', __('page.documents.breadcrumb'))
@section('title', __('page.documents.title'))
@section('page-desc', __('pages.documents.intro'))

@section('page-content')

<style>
    .doc-lead { margin-bottom: 56px; }

    .doc-group { margin-bottom: 56px; }
    .doc-group:last-of-type { margin-bottom: 0; }

    .doc-count {
        font-size: 12px;
        font-weight: 700;
        color: #8a95a5;
        background: #f0f3f8;
        min-width: 24px;
        text-align: center;
        padding: 2px 9px;
        border-radius: 20px;
        flex-shrink: 0;
    }

    .doc-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 16px;
    }

    .doc-card {
        position: relative;
        display: flex;
        background: #fff;
        border: 1px solid #e8edf5;
        border-radius: 14px;
        transition: border-color .18s, box-shadow .18s, transform .18s;
    }
    .doc-card:hover {
        border-color: #cdd8e8;
        box-shadow: 0 10px 28px rgba(1, 44, 104, .10);
        transform: translateY(-2px);
    }

    .doc-card__open {
        flex: 1;
        display: flex;
        align-items: flex-start;
        gap: 16px;
        padding: 18px 46px 18px 18px;
        text-decoration: none;
    }

    .doc-ico {
        width: 50px;
        height: 50px;
        border-radius: 13px;
        display: grid;
        place-items: center;
        flex-shrink: 0;
        background: #5a6b7d;
    }
    .doc-ico svg { width: 24px; height: 24px; display: block; }
    .doc-card[data-type="pdf"]        .doc-ico { background: #e0564e; }
    .doc-card[data-type="word"]       .doc-ico { background: #2b6cb0; }
    .doc-card[data-type="excel"]      .doc-ico { background: #1e874b; }
    .doc-card[data-type="powerpoint"] .doc-ico { background: #c05621; }
    .doc-card[data-type="image"]      .doc-ico { background: #6b46c1; }
    .doc-card[data-type="archive"]    .doc-ico { background: #b7791f; }

    .doc-card__text { min-width: 0; align-self: stretch; display: flex; flex-direction: column; gap: 4px; }
    .doc-card__title {
        color: #012c68;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.4;
    }
    .doc-card__file {
        color: #98a2b2;
        font-size: 12px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .doc-card__meta {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-top: auto;
        padding-top: 8px;
        font-size: 12px;
        color: #7a869a;
    }
    .doc-ext {
        font-weight: 700;
        letter-spacing: .5px;
        font-size: 11px;
        color: #012c68;
        background: #eef2f8;
        padding: 2px 7px;
        border-radius: 5px;
    }

    .doc-card__dl {
        position: absolute;
        top: 14px;
        right: 14px;
        width: 32px;
        height: 32px;
        border-radius: 9px;
        display: grid;
        place-items: center;
        background: #f4f7fb;
        color: #012c68;
        transition: background .15s, color .15s;
    }
    .doc-card__dl svg { width: 17px; height: 17px; display: block; }
    .doc-card__dl:hover { background: #012c68; color: #fff; }

    .doc-empty {
        text-align: center;
        padding: 56px 24px;
        background: #f7f9fc;
        border-radius: 16px;
        color: #7a869a;
        font-size: 15px;
    }

    .doc-note {
        margin-top: 48px;
        padding: 16px 20px;
        background: #f7f9fc;
        border-left: 4px solid #fca206;
        border-radius: 8px;
        color: #7a869a;
        font-size: 13px;
        line-height: 1.7;
    }

    @media (max-width: 520px) {
        .doc-grid { grid-template-columns: 1fr; }
    }
</style>

@php
    $iconDoc = '<path d="M13 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9z"/><path d="M13 3v6h6"/><path d="M9 13.5h6M9 17h6"/>';
    $iconSheet = '<path d="M13 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9z"/><path d="M13 3v6h6"/><path d="M8.5 13h7M8.5 17h7M12 11.5v7"/>';
    $iconSlides = '<path d="M13 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9z"/><path d="M13 3v6h6"/><rect x="8.5" y="12.5" width="7" height="5" rx="1"/>';
    $iconImage = '<rect x="4" y="5" width="16" height="14" rx="2"/><circle cx="9" cy="10" r="1.4"/><path d="m5 16.5 4-3.5 3 2.5 3-3.5 4 4.5"/>';
    $iconArchive = '<path d="M13 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9z"/><path d="M13 3v6h6"/><path d="M10.5 6h1.4M10.5 9h1.4"/><rect x="9.3" y="12.5" width="4" height="5" rx="1"/>';

    $glyphFor = fn (string $type) => match ($type) {
        'excel' => $iconSheet,
        'powerpoint' => $iconSlides,
        'image' => $iconImage,
        'archive' => $iconArchive,
        default => $iconDoc,
    };
@endphp

<p class="page-body-text doc-lead" data-anim="fade-up">{{ __('pages.documents.lead') }}</p>

@forelse($categories as $category)
    <section class="doc-group" data-anim="fade-up">
        <h2 class="page-section-title">
            {{ $category->title() }}
            <span class="doc-count">{{ $category->publishedDocuments->count() }}</span>
        </h2>

        <div class="doc-grid" data-anim-stagger="fade-up" data-anim-stagger-gap="40">
            @foreach($category->publishedDocuments as $doc)
                <div class="doc-card" data-type="{{ $doc->iconType() }}">
                    <a class="doc-card__open" href="{{ $doc->url() }}" target="_blank" rel="noopener"
                       aria-label="{{ __('pages.documents.open') }}: {{ $doc->title() }}">
                        <span class="doc-ico">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.7"
                                 stroke-linecap="round" stroke-linejoin="round">{!! $glyphFor($doc->iconType()) !!}</svg>
                        </span>
                        <span class="doc-card__text">
                            <span class="doc-card__title">{{ $doc->title() }}</span>
                            <span class="doc-card__file">{{ $doc->fileName() }}</span>
                            <span class="doc-card__meta">
                                <span class="doc-ext">{{ strtoupper($doc->extension()) ?: 'FILE' }}</span>
                                @if($doc->humanSize())<span>·</span><span>{{ $doc->humanSize() }}</span>@endif
                            </span>
                        </span>
                    </a>
                    <a class="doc-card__dl" href="{{ $doc->url() }}" download
                       aria-label="{{ __('pages.documents.download') }}: {{ $doc->title() }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3v12m0 0 4-4m-4 4-4-4M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@empty
    <div class="doc-empty" data-anim="fade-up">{{ __('pages.documents.empty') }}</div>
@endforelse

@if($categories->isNotEmpty())
    <p class="doc-note" data-anim="fade-up">{{ __('pages.documents.note') }}</p>
@endif

@endsection
