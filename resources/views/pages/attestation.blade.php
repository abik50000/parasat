@extends('layouts.page')

@section('breadcrumb', __('page.attestation.breadcrumb'))
@section('title', __('page.attestation.title'))
@section('page-desc', __('pages.attestation.intro'))

@section('page-content')

<style>
    .att-lead-row {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 24px;
        margin-bottom: 40px;
    }
    .att-lead { margin-bottom: 0; }
    .att-disk-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        flex-shrink: 0;
        padding: 10px 18px;
        background: #f4f7fb;
        border: 1px solid #e8edf5;
        border-radius: 10px;
        color: #012c68;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        white-space: nowrap;
        transition: background .15s, border-color .15s;
    }
    .att-disk-link:hover { background: #eef2f8; border-color: #cdd8e8; }
    .att-disk-link__ico { width: 18px; height: 18px; flex-shrink: 0; display: block; }

    /* ── Grid of links ── */
    .att-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 14px;
    }

    .att-card {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 16px;
        background: #fff;
        border: 1px solid #e8edf5;
        border-radius: 13px;
        text-decoration: none;
        min-width: 0;
        transition: border-color .18s, box-shadow .18s, transform .18s;
    }
    .att-card:hover {
        border-color: #cdd8e8;
        box-shadow: 0 10px 26px rgba(1, 44, 104, .10);
        transform: translateY(-2px);
    }

    .att-ico {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        flex-shrink: 0;
        background: #fca206;
    }
    .att-ico svg { width: 23px; height: 23px; display: block; }

    .att-card__title {
        flex: 1;
        min-width: 0;
        color: #012c68;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.4;
        overflow-wrap: anywhere;
    }
    .att-card__go {
        display: grid;
        place-items: center;
        flex-shrink: 0;
        color: #b6c2d2;
        transition: color .15s, transform .15s;
    }
    .att-card__go svg { width: 18px; height: 18px; display: block; }
    .att-card:hover .att-card__go { color: #012c68; transform: translate(2px, -2px); }

    .att-empty {
        text-align: center;
        padding: 52px 24px;
        background: #f7f9fc;
        border-radius: 14px;
        color: #7a869a;
        font-size: 15px;
    }

    .att-note {
        margin-top: 44px;
        padding: 16px 20px;
        background: #f7f9fc;
        border-left: 4px solid #fca206;
        border-radius: 8px;
        color: #7a869a;
        font-size: 13px;
        line-height: 1.7;
    }

    @media (max-width: 520px) {
        .att-grid { grid-template-columns: 1fr; }
        .att-lead-row { flex-direction: column; align-items: flex-start; }
    }
</style>

<div class="att-lead-row" data-anim="fade-up">
    <p class="page-body-text att-lead">{{ __('pages.attestation.lead') }}</p>
    <a href="https://drive.google.com/drive/u/1/folders/14wKl49prn17NU9nzWG9TfLFffqJlpce8?hl=ru" target="_blank" rel="noopener noreferrer" class="att-disk-link">
        <svg class="att-disk-link__ico" viewBox="0 0 87.3 78" aria-hidden="true">
            <path d="m6.6 66.85 3.85 6.65c.8 1.4 1.95 2.5 3.3 3.3l13.75-23.8h-27.5c0 1.55.4 3.1 1.2 4.5z" fill="#0066da"/>
            <path d="m43.65 25-13.75-23.8c-1.35.8-2.5 1.9-3.3 3.3l-25.4 44a9.06 9.06 0 0 0 -1.2 4.5h27.5z" fill="#00ac47"/>
            <path d="m73.55 76.8c1.35-.8 2.5-1.9 3.3-3.3l1.6-2.75 7.65-13.25c.8-1.4 1.2-2.95 1.2-4.5h-27.502l5.852 11.5z" fill="#ea4335"/>
            <path d="m43.65 25 13.75-23.8c-1.35-.8-2.9-1.2-4.5-1.2h-18.5c-1.6 0-3.15.45-4.5 1.2z" fill="#00832d"/>
            <path d="m59.8 53h-32.3l-13.75 23.8c1.35.8 2.9 1.2 4.5 1.2h50.8c1.6 0 3.15-.45 4.5-1.2z" fill="#2684fc"/>
            <path d="m73.4 26.5-12.7-22c-.8-1.4-1.95-2.5-3.3-3.3l-13.75 23.8 16.15 28h27.45c0-1.55-.4-3.1-1.2-4.5z" fill="#ffba00"/>
        </svg>
        <span>{{ __('pages.attestation.disk_link') }}</span>
    </a>
</div>

@if($links->isNotEmpty())
    <div class="att-grid" data-anim="fade-up">
        @foreach($links as $link)
            <a class="att-card" href="{{ $link->url }}" target="_blank" rel="noopener noreferrer"
               aria-label="{{ __('pages.attestation.open') }}: {{ $link->title() }}">
                <span class="att-ico">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M4 7a2 2 0 0 1 2-2h4l2 2h6a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z"/>
                    </svg>
                </span>
                <span class="att-card__title">{{ $link->title() }}</span>
                <span class="att-card__go">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M7 17 17 7M8 7h9v9"/>
                    </svg>
                </span>
            </a>
        @endforeach
    </div>
@else
    <div class="att-empty" data-anim="fade-up">{{ __('pages.attestation.empty') }}</div>
@endif

<p class="att-note" data-anim="fade-up">{{ __('pages.attestation.note') }}</p>

@endsection
