@extends('layouts.page')

@section('breadcrumb', __('page.cafeteria.breadcrumb'))
@section('title', __('page.cafeteria.title'))

@section('page-content')

<div class="section-cotent-wrap grid-item mb-100" style="margin-bottom:56px;">
    <div class="grid-one">
        <p class="section-paragraph red" data-anim="fade-right">{{ __('pages.cafeteria.section_label') }}</p>
    </div>
    <div class="grid-two">
        <h2 class="section-title dark" data-anim="fade-up">{{ __('pages.cafeteria.heading') }}</h2>
        <p class="banner-paragraph dark" data-anim="fade-up" data-anim-delay="100" style="margin-top:24px;">
            {{ __('pages.cafeteria.intro') }}
        </p>
    </div>
</div>

@php
$schedule = trans('pages.cafeteria.schedule');
$menu     = trans('pages.cafeteria.menu');
@endphp

<div class="page-two-col" style="margin-bottom:64px;">
    <div data-anim="fade-right">
        <h2 class="page-section-title">{{ __('pages.cafeteria.schedule_title') }}</h2>
        @foreach($schedule as [$label, $value])
        <div class="page-cafe-row">
            <span class="page-cafe-label">{{ $label }}</span>
            <span class="page-cafe-value">{{ $value }}</span>
        </div>
        @endforeach
    </div>

    <div data-anim="fade-left">
        <h2 class="page-section-title">{{ __('pages.cafeteria.menu_title') }}</h2>
        @foreach($menu as $day => $dishes)
        <div class="page-menu-day">
            <p class="page-menu-day-name">{{ $day }}</p>
            @foreach($dishes as $dish)
            <p class="page-menu-dish">• {{ $dish }}</p>
            @endforeach
        </div>
        @endforeach
    </div>
</div>

<div class="page-cta" data-anim="fade-up">
    <h3>{{ __('pages.cafeteria.cta_title') }}</h3>
    <p>{{ __('pages.cafeteria.cta_desc') }}</p>
    <a href="{{ route('contacts') }}" class="page-cta-link">{{ __('pages.cafeteria.cta_btn') }}</a>
</div>

@endsection
