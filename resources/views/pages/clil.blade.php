@extends('layouts.page')

@section('breadcrumb', __('page.clil.breadcrumb'))
@section('title', __('page.clil.title'))

@section('page-content')

<div class="section-cotent-wrap grid-item mb-100" style="margin-bottom:56px;">
    <div class="grid-one">
        <p class="section-paragraph red" data-anim="fade-right">{{ __('pages.clil.section_label') }}</p>
    </div>
    <div class="grid-two">
        <h2 class="section-title dark" data-anim="fade-up">{{ __('pages.clil.heading1') }}</h2>
        <h2 class="section-title dark" data-anim="fade-up" data-anim-delay="80">{{ __('pages.clil.heading2') }}</h2>
        <p class="banner-paragraph dark" data-anim="fade-up" data-anim-delay="160" style="margin-top:24px;">
            {{ __('pages.clil.intro') }}
        </p>
    </div>
</div>

@php $benefits = trans('pages.clil.benefits'); @endphp

<div class="tab-content-wrap" data-anim-stagger="scale-in" data-anim-stagger-gap="80" style="margin-bottom:60px;">
    @foreach($benefits as $b)
    <div class="tab-content-item" data-tilt>
        <div class="ripple-div-two"></div>
        <div class="tab-content" style="width:100%;">
            <h3 class="tab-content-title">{{ $b['title'] }}</h3>
            <p style="color:#555;font-size:14px;line-height:1.6;margin-bottom:24px;">{{ $b['desc'] }}</p>
            <div class="tab-bottom-content">
                <a href="#" class="category-button w-button">/CLIL</a>
                <div class="tab-icon">
                    <img loading="lazy" src="/images/63ba665ae3ca2addb4de3b39_arrow-right.svg" alt="" class="image-icon"/>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="page-cta" data-anim="fade-up">
    <h3>{{ __('pages.clil.cta_title') }}</h3>
    <p>{{ __('pages.clil.cta_desc') }}</p>
    <a href="{{ route('contacts') }}" class="page-cta-link">{{ __('pages.clil.cta_btn') }}</a>
</div>

@endsection
