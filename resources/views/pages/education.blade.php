@extends('layouts.page')

@section('breadcrumb', __('page.education.breadcrumb'))
@section('title', __('page.education.title'))

@section('page-content')

<div class="section-cotent-wrap grid-item mb-100" style="margin-bottom:56px;">
    <div class="grid-one">
        <p class="section-paragraph red" data-anim="fade-right">{{ __('pages.education.section_label') }}</p>
    </div>
    <div class="grid-two">
        <h2 class="section-title dark" data-anim="fade-up">{{ __('pages.education.heading1') }}</h2>
        <h2 class="section-title dark" data-anim="fade-up" data-anim-delay="80">{{ __('pages.education.heading2') }}</h2>
        <p class="banner-paragraph dark" data-anim="fade-up" data-anim-delay="160" style="margin-top:24px;">
            {{ __('pages.education.intro') }}
        </p>
    </div>
</div>

<figure class="page-figure" data-anim="fade-up">
    <img src="{{ asset('images/parasat/steam.jpg') }}" alt="{{ __('pages.education.heading1') }}" loading="lazy">
</figure>

@php $sections = trans('pages.education.sections'); @endphp

<div class="tab-content-wrap" data-anim-stagger="scale-in" data-anim-stagger-gap="80">
    @foreach($sections as $s)
    <a href="{{ route($s['route']) }}" class="tab-content-item" style="text-decoration:none;" data-tilt>
        <div class="ripple-div-two"></div>
        <div class="tab-content" style="width:100%;">
            <h3 class="tab-content-title">{{ $s['title'] }}</h3>
            <p style="color:#555;font-size:14px;margin-bottom:24px;">{{ $s['desc'] }}</p>
            <div class="tab-bottom-content">
                <span class="category-button" style="border:1px solid #000;border-radius:100px;padding:10px 20px;font-size:14px;color:#000;display:inline-block;">{{ $s['label'] }}</span>
                <div class="tab-icon">
                    <img loading="lazy" src="/images/63ba665ae3ca2addb4de3b39_arrow-right.svg" alt="" class="image-icon"/>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>

@endsection
