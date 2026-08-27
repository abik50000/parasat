@extends('layouts.page')

@section('breadcrumb', __('page.mission.breadcrumb'))
@section('title', __('page.mission.title'))
@section('page-desc', __('pages.mission.intro'))

@section('page-content')

<div class="page-two-col" style="margin-bottom:64px;">
    <div class="page-cta" data-anim="fade-right" style="text-align:left;">
        <h3 style="font-size:15px;text-transform:uppercase;letter-spacing:1px;opacity:.7;">{{ __('pages.mission.mission_title') }}</h3>
        <p style="font-size:18px;line-height:1.7;opacity:1;color:#fff;margin:0;">{{ __('pages.mission.mission_text') }}</p>
    </div>
    <div class="page-cta page-cta--light" data-anim="fade-left" style="text-align:left;">
        <h3 style="font-size:15px;text-transform:uppercase;letter-spacing:1px;">{{ __('pages.mission.vision_title') }}</h3>
        <p style="font-size:18px;line-height:1.7;margin:0;">{{ __('pages.mission.vision_text') }}</p>
    </div>
</div>

@php $values = trans('pages.mission.values'); @endphp

<div class="page-section">
    <h2 class="page-section-title" data-anim="fade-up">{{ __('pages.mission.values_title') }}</h2>
    <div class="page-grid-3" data-anim-stagger="fade-up" data-anim-stagger-gap="70">
        @foreach($values as $value)
        <div class="page-card">
            <div class="page-icon-box gold" style="margin-bottom:16px;">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2l2.4 7.4H22l-6 4.4 2.3 7.2L12 16.6 5.7 21l2.3-7.2-6-4.4h7.6z"/></svg>
            </div>
            <h3 style="color:#012c68;font-size:18px;font-weight:700;margin:0 0 8px;">{{ $value['title'] }}</h3>
            <p style="color:#555;font-size:14px;line-height:1.65;margin:0;">{{ $value['text'] }}</p>
        </div>
        @endforeach
    </div>
</div>

<div class="page-cta" data-anim="fade-up" style="margin-top:32px;">
    <h3>{{ __('pages.mission.cta_title') }}</h3>
    <p>{{ __('pages.mission.cta_desc') }}</p>
    <a href="{{ route('contacts') }}" class="page-cta-link">{{ __('pages.mission.cta_btn') }}</a>
</div>

@endsection
