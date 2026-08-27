@extends('layouts.master')

@section('styles')
<style>
    /* ── Shared inner-page styles ── */

    /* Hero */
    .page-hero-area {
        background: linear-gradient(135deg, #012c68 0%, #01409a 100%);
        padding: 132px 0 52px;
    }
    .page-crumbs {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 9px;
        font-size: 12px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 22px;
        opacity: 0;
        animation: heroFadeDown 0.6s cubic-bezier(0, 0.37, 0.27, 0.995) 0.1s forwards;
    }
    .page-crumbs a,
    .page-crumbs span { color: rgba(255, 255, 255, 0.6); text-decoration: none; transition: color .15s; }
    .page-crumbs a:hover { color: #fff; }
    .page-crumbs .sep { color: rgba(255, 255, 255, 0.3); }
    .page-crumbs .current { color: #fca206; }
    .page-hero-main {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 48px;
        flex-wrap: wrap;
    }
    .page-hero-title {
        font-size: 52px;
        font-weight: 700;
        margin: 0;
        line-height: 1.15;
        color: #fff;
        flex: 1 1 auto;
        opacity: 0;
        animation: heroFadeUp 0.7s cubic-bezier(0, 0.37, 0.27, 0.995) 0.18s forwards;
    }
    .page-hero-desc {
        flex: 0 1 440px;
        max-width: 440px;
        margin: 0 0 8px;
        color: rgba(255, 255, 255, 0.78);
        font-size: 15px;
        line-height: 1.7;
        opacity: 0;
        animation: heroFadeUp 0.7s cubic-bezier(0, 0.37, 0.27, 0.995) 0.28s forwards;
    }
    @keyframes heroFadeDown {
        from { transform: translateY(-30px); opacity: 0; }
        to   { transform: translateY(0);     opacity: 1; }
    }
    @keyframes heroFadeUp {
        from { transform: translateY(40px); opacity: 0; }
        to   { transform: translateY(0);    opacity: 1; }
    }
    @media (max-width: 900px) {
        .page-hero-main { gap: 20px; }
        .page-hero-desc { flex-basis: 100%; max-width: 640px; }
    }
    @media (max-width: 768px) {
        .page-hero-area { padding: 104px 0 40px; }
        .page-hero-title { font-size: 30px; }
        .page-crumbs { margin-bottom: 16px; }
    }

    /* Content wrapper */
    .page-content-area {
        background: #fff;
        padding: 80px 0 100px;
    }

    /* Override tab-content-title padding for inner pages */
    .page-content-area .tab-content-title {
        padding-bottom: 32px;
        font-size: 22px;
    }

    /* Section heading with orange bar */
    .page-section-title {
        color: #012c68;
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .page-section-title::before {
        content: '';
        display: inline-block;
        width: 6px;
        height: 28px;
        background: #fca206;
        border-radius: 3px;
        flex-shrink: 0;
    }

    /* Grade / sub-section heading underlined */
    .page-grade-title {
        color: #012c68;
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 20px;
        padding-bottom: 12px;
        border-bottom: 3px solid #fca206;
        display: inline-block;
    }

    /* Body text */
    .page-body-text {
        font-size: 17px;
        color: #555;
        line-height: 1.8;
        margin-bottom: 48px;
        max-width: 860px;
    }

    /* ── Card grids ── */
    .page-grid-2  { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
    .page-grid-3  { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
    .page-grid-4  { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
    .page-grid-auto { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; }
    .page-grid-news { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 28px; }

    /* ── Simple card ── */
    .page-card {
        background: #f7f9fc;
        border-radius: 16px;
        padding: 28px 24px;
        transition: box-shadow 0.2s;
        height: 100%;
        box-sizing: border-box;
    }
    .page-card:hover { box-shadow: 0 8px 24px rgba(1,44,104,.12); }

    /* Card with left accent border */
    .page-item-card {
        background: #f7f9fc;
        border-radius: 12px;
        padding: 20px;
        border-left: 4px solid #fca206;
    }

    /* ── Icon box ── */
    .page-icon-box {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        background: #012c68;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
        flex-shrink: 0;
    }
    .page-icon-box svg { width: 24px; height: 24px; fill: #fff; }
    .page-icon-box.gold  { background: #fca206; }
    .page-icon-box.sm    { width: 44px; height: 44px; border-radius: 10px; }

    /* ── Two-column split ── */
    .page-two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; }

    /* ── Info rows ── */
    .page-info-item { display: flex; gap: 16px; align-items: flex-start; margin-bottom: 24px; }
    .page-info-label { color: #012c68; font-weight: 600; margin: 0 0 4px; font-size: 15px; }
    .page-info-text  { color: #555; font-size: 14px; line-height: 1.6; margin: 0; }

    /* ── Contact form ── */
    .page-form { display: flex; flex-direction: column; gap: 16px; }
    .page-form input,
    .page-form textarea,
    .page-form select {
        padding: 14px 18px;
        border: 2px solid #e8edf5;
        border-radius: 10px;
        font-size: 15px;
        outline: none;
        font-family: inherit;
        transition: border-color .2s;
        width: 100%;
        box-sizing: border-box;
        color: #333;
    }
    .page-form input:focus,
    .page-form textarea:focus { border-color: #012c68; }
    .page-form textarea { resize: vertical; }
    .page-form-submit {
        background: #012c68;
        color: #fff;
        border: none;
        padding: 16px 32px;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        font-family: inherit;
        transition: background .2s;
    }
    .page-form-submit:hover { background: #01409a; }

    /* ── Table ── */
    .page-table-wrap { overflow-x: auto; }
    .page-table { width: 100%; border-collapse: collapse; font-size: 14px; }
    .page-table th {
        background: #012c68;
        color: #fff;
        padding: 14px 20px;
        text-align: left;
        font-weight: 600;
    }
    .page-table th:first-child { border-radius: 10px 0 0 0; }
    .page-table th:last-child  { border-radius: 0 10px 0 0; }
    .page-table td { padding: 14px 20px; border-bottom: 1px solid #eee; color: #555; }
    .page-table tr:nth-child(even) td { background: #f7f9fc; }
    .page-table td.strong { color: #012c68; font-weight: 700; }

    /* ── Badges ── */
    .page-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }
    .page-badge--blue   { background: #e8f0fe; color: #012c68; }
    .page-badge--gold   { background: #fff3cd; color: #856404; }
    .page-badge--green  { background: #d4edda; color: #155724; }
    .page-badge--red    { background: #fee2e2; color: #dc2626; }
    .page-badge--cat    { background: #e8edf5; color: #012c68; font-size: 11px; text-transform: uppercase; letter-spacing: .5px; }

    /* ── Subject tag ── */
    .page-tag {
        display: inline-block;
        background: #f0f4ff;
        color: #012c68;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
    }

    /* ── Stat card ── */
    .page-stat-card { border-radius: 16px; padding: 28px; text-align: center; }
    .page-stat-card--blue  { background: #012c68; color: #fff; }
    .page-stat-card--gold  { background: #fca206; color: #fff; }
    .page-stat-card--light { background: #f7f9fc; }
    .page-stat-number { font-size: 48px; font-weight: 700; margin-bottom: 6px; display: block; }
    .page-stat-label  { opacity: .8; font-size: 13px; padding-top: 15px;margin-bottom:0 }

    /* ── CTA blocks ── */
    .page-cta {
        background: linear-gradient(135deg, #012c68, #01409a);
        border-radius: 20px;
        padding: 40px;
        color: #fff;
        text-align: center;
    }
    .page-cta h3 { margin: 0 0 12px; font-size: 20px; color: #fff; }
    .page-cta p  { opacity: .8; margin: 0 0 24px; font-size: 15px; }
    .page-cta--light { background: #f0f4ff; }
    .page-cta--light h3,
    .page-cta--light p { color: #012c68; opacity: 1; }

    .page-cta-link {
        display: inline-block;
        background: #fca206;
        color: #fff;
        padding: 14px 32px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        font-size: 15px;
        transition: opacity .2s;
    }
    .page-cta-link:hover { opacity: .88; }
    .page-cta-link.dark { background: #012c68; }

    /* ── Action link (small button) ── */
    .page-action-link {
        display: inline-block;
        background: #012c68;
        color: #fff;
        padding: 12px 24px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
        flex-shrink: 0;
        transition: background .2s;
    }
    .page-action-link:hover  { background: #01409a; }
    .page-action-link.gold   { background: #fca206; }

    /* ── Vacancy row ── */
    .page-vacancy-row {
        background: #fff;
        border-radius: 16px;
        padding: 28px 32px;
        box-shadow: 0 2px 12px rgba(0,0,0,.06);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 24px;
        margin-bottom: 20px;
        transition: box-shadow .2s;
    }
    .page-vacancy-row:hover { box-shadow: 0 8px 24px rgba(1,44,104,.12); }

    /* ── FAQ accordion ── */
    .page-faq-item {
        background: #f7f9fc;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 12px;
    }
    .page-faq-item summary {
        padding: 20px 24px;
        cursor: pointer;
        color: #012c68;
        font-weight: 600;
        font-size: 15px;
        list-style: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .page-faq-item summary::-webkit-details-marker { display: none; }
    .page-faq-icon {
        color: #fca206;
        font-size: 22px;
        flex-shrink: 0;
        margin-left: 16px;
        font-style: normal;
        transition: transform .2s;
    }
    .page-faq-item[open] .page-faq-icon { transform: rotate(45deg); }
    .page-faq-body { padding: 0 24px 20px; color: #555; font-size: 14px; line-height: 1.8; }

    /* ── Filter buttons ── */
    .page-filters { display: flex; gap: 12px; margin-bottom: 40px; flex-wrap: wrap; }
    .page-filter-btn {
        padding: 10px 22px;
        border-radius: 8px;
        border: 2px solid #e8edf5;
        background: #fff;
        color: #555;
        font-size: 14px;
        cursor: pointer;
        font-family: inherit;
        transition: background .15s, color .15s, border-color .15s;
    }
    .page-filter-btn.active,
    .page-filter-btn:hover { border-color: #012c68; background: #012c68; color: #fff; }

    /* ── Class selector ── */
    .page-class-btn {
        padding: 10px 20px;
        border-radius: 8px;
        border: 2px solid #012c68;
        background: #fff;
        color: #012c68;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        font-family: inherit;
        transition: background .15s, color .15s;
    }
    .page-class-btn.active { background: #012c68; color: #fff; }

    /* ── News card ── */
    .page-news-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,.06);
        transition: box-shadow .2s;
    }
    .page-news-card:hover { box-shadow: 0 8px 32px rgba(1,44,104,.12); }
    .page-news-thumb {
        height: 200px;
        overflow: hidden;
    }
    .page-news-thumb img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .4s ease; }
    .page-news-card:hover .page-news-thumb img { transform: scale(1.05); }
    .page-news-body  { padding: 24px; }
    .page-news-meta  { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
    .page-news-date  { color: #999; font-size: 12px; }
    .page-news-title { color: #012c68; font-size: 16px; font-weight: 600; margin: 0 0 10px; line-height: 1.4; }
    .page-news-excerpt { color: #666; font-size: 13px; margin: 0 0 16px; line-height: 1.6; }
    .page-news-link { color: #fca206; font-size: 13px; font-weight: 600; text-decoration: none; }

    /* ── Admin card ── */
    .page-admin-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    @media (min-width: 768px) {
        .page-admin-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 1024px) {
        .page-admin-grid { grid-template-columns: repeat(3, 1fr); }
    }
    .page-admin-card { background: #f7f9fc; border-radius: 16px; padding: 32px 24px; text-align: center; }
    .page-admin-avatar {
        width: 260px; height: 260px;
        background: #e8edf5;
        border-radius: 20px;
        overflow: hidden;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 16px;
    }
    .page-admin-avatar svg { width: 36px; height: 36px; fill: #94a3b8; }
    .page-admin-name { color: #012c68; font-size: 17px; margin: 0 0 6px; font-weight: 600; }
    .page-admin-role { color: #fca206; font-size: 12px; margin: 0; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }

    /* ── Cafeteria ── */
    .page-cafe-row {
        display: flex; gap: 12px; align-items: center;
        padding: 12px 16px; background: #f7f9fc;
        border-radius: 10px; margin-bottom: 10px;
    }
    .page-cafe-label { color: #555; font-size: 14px; flex: 1; }
    .page-cafe-value { color: #012c68; font-weight: 600; font-size: 14px; }
    .page-menu-day   { margin-bottom: 16px; border-left: 3px solid #fca206; padding-left: 16px; }
    .page-menu-day-name { color: #012c68; font-weight: 600; font-size: 14px; margin: 0 0 6px; }
    .page-menu-dish  { color: #666; font-size: 13px; margin: 0 0 3px; }

    /* ── CLIL benefit card ── */
    .page-benefit-card {
        background: #fff;
        border-radius: 16px;
        padding: 28px;
        border: 2px solid #e8edf5;
        transition: border-color .2s;
    }
    .page-benefit-card:hover { border-color: #012c68; }

    /* ── Map ── */
    .page-map {
        display: block;
        width: 100%;
        height: 400px;
        border-radius: 16px;
        overflow: hidden;
        margin-top: 64px;
        border: none;
    }
    @media (max-width: 768px) {
        .page-map { height: 260px; margin-top: 40px; border-radius: 10px; }
    }

    /* ── Load more ── */
    .page-load-more {
        display: block; margin: 48px auto 0;
        padding: 14px 40px;
        border: 2px solid #012c68; border-radius: 10px;
        background: #fff; color: #012c68;
        font-size: 15px; font-weight: 600;
        cursor: pointer; font-family: inherit;
        transition: background .15s, color .15s;
    }
    .page-load-more:hover { background: #012c68; color: #fff; }

    /* ── Section spacing ── */
    .page-section { margin-bottom: 64px; }

    /* ── Full-width figure ── */
    .page-figure {
        margin: 0 0 56px;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(1,44,104,.12);
        background: #f0f4ff;
    }
    .page-figure img {
        display: block;
        width: 100%;
        height: 100%;
        max-height: 440px;
        object-fit: cover;
    }
    .page-figure figcaption {
        padding: 12px 20px;
        font-size: 13px;
        color: #7a869a;
        background: #f7f9fc;
    }
    @media (max-width: 768px) {
        .page-figure { margin-bottom: 40px; border-radius: 10px; }
        .page-figure img { max-height: 260px; }
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
        .page-hero-title { font-size: 32px; }
        .page-grid-2, .page-grid-3, .page-grid-4 { grid-template-columns: 1fr; }
        .page-two-col { grid-template-columns: 1fr; gap: 32px; }
        .page-vacancy-row { flex-direction: column; align-items: flex-start; }
    }
</style>
@endsection

@section('content')
<x-header />

@php
    $crumbSegments = array_values(array_filter(array_map(
        'trim',
        preg_split('#[→/›»|]#u', trim($__env->yieldContent('breadcrumb', '')))
    )));
@endphp
<div class="page-hero-area">
    <div class="container">
        <nav class="page-crumbs" aria-label="breadcrumb">
            <a href="{{ route('home') }}">{{ __('nav.home') }}</a>
            @foreach($crumbSegments as $seg)
                <span class="sep">/</span>
                <span class="{{ $loop->last ? 'current' : '' }}">{{ $seg }}</span>
            @endforeach
        </nav>
        <div class="page-hero-main">
            <h1 class="page-hero-title">@yield('title')</h1>
            @hasSection('page-desc')
                <p class="page-hero-desc">@yield('page-desc')</p>
            @endif
        </div>
    </div>
</div>

<div class="page-content-area">
    <div class="container">
        @yield('page-content')
    </div>
</div>

<x-footer />
@endsection
