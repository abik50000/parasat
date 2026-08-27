@extends('layouts.page')

@section('breadcrumb', __('page.self-assessment.breadcrumb'))
@section('title', __('page.self-assessment.title'))
@section('page-desc', __('pages.self_assessment.intro'))

@section('page-content')

@php $areas = trans('pages.self_assessment.areas'); @endphp

<div class="page-section">
    <h2 class="page-section-title" data-anim="fade-up">{{ __('pages.self_assessment.areas_title') }}</h2>
    <div class="page-grid-2" data-anim-stagger="fade-up" data-anim-stagger-gap="60">
        @foreach($areas as $i => $area)
        <div class="page-item-card">
            <p style="color:#012c68;font-weight:700;font-size:15px;margin:0 0 6px;">{{ sprintf('%02d', $i + 1) }} · {{ $area['title'] }}</p>
            <p style="color:#555;font-size:14px;line-height:1.65;margin:0;">{{ $area['desc'] }}</p>
        </div>
        @endforeach
    </div>
</div>

<div class="page-section" data-anim="fade-up">
    <h2 class="page-section-title">{{ __('pages.self_assessment.docs_title') }}</h2>
    <p class="page-body-text" style="margin-bottom:24px;">{{ __('pages.self_assessment.docs_note') }}</p>
    <a href="{{ route('contacts') }}" class="page-action-link gold">{{ __('pages.self_assessment.docs_btn') }}</a>
</div>

@endsection
