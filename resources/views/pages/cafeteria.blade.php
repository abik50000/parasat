@extends('layouts.page')

@section('breadcrumb', __('page.cafeteria.breadcrumb'))
@section('title', __('page.cafeteria.title'))
@section('page-desc', __('pages.cafeteria.intro'))

@section('page-content')

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
