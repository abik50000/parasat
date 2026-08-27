@extends('layouts.page')

@section('breadcrumb', __('page.curriculum.breadcrumb'))
@section('title', __('page.curriculum.title'))

@section('page-content')

<div class="section-cotent-wrap grid-item mb-100" style="margin-bottom:56px;">
    <div class="grid-one">
        <p class="section-paragraph red" data-anim="fade-right">{{ __('pages.curriculum.section_label') }}</p>
    </div>
    <div class="grid-two">
        <h2 class="section-title dark" data-anim="fade-up">{{ __('pages.curriculum.heading') }}</h2>
        <p class="banner-paragraph dark" data-anim="fade-up" data-anim-delay="100" style="margin-top:24px;">
            {{ __('pages.curriculum.intro') }}
        </p>
    </div>
</div>

<figure class="page-figure" data-anim="fade-up">
    <img src="{{ asset('images/parasat/lesson3.jpg') }}" alt="{{ __('pages.curriculum.heading') }}" loading="lazy">
</figure>

@php $grades = trans('pages.curriculum.grades'); @endphp

@foreach($grades as $grade => $subjects)
<div class="page-section" data-anim="fade-up">
    <h2 class="page-grade-title">{{ $grade }}</h2>
    <div style="display:flex;flex-wrap:wrap;gap:10px;" data-anim-stagger="scale-in" data-anim-stagger-gap="40">
        @foreach($subjects as $subject)
        <span class="page-tag">{{ $subject }}</span>
        @endforeach
    </div>
</div>
@endforeach

@endsection
