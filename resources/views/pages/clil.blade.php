@extends('layouts.page')

@section('breadcrumb', __('page.clil.breadcrumb'))
@section('title', __('page.clil.title'))
@section('page-desc', __('pages.clil.intro'))

@section('page-content')

<figure class="page-figure" data-anim="fade-up">
    <img src="{{ asset('images/parasat/lesson6.jpg') }}" alt="{{ __('pages.clil.heading1') }}" loading="lazy">
</figure>

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
