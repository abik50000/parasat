@extends('layouts.page')

@section('breadcrumb', __('page.about.breadcrumb'))
@section('title', __('page.about.title'))

@section('page-content')

<div class="section-cotent-wrap grid-item mb-100" style="margin-bottom:56px;">
    <div class="grid-one">
        <p class="section-paragraph red" data-anim="fade-right">{{ __('pages.about.section_label') }}</p>
    </div>
    <div class="grid-two">
        <h2 class="section-title dark" data-anim="fade-up">{{ __('pages.about.heading1') }}</h2>
        <h2 class="section-title dark" data-anim="fade-up" data-anim-delay="80">{{ __('pages.about.heading2') }}</h2>
        <p class="banner-paragraph dark" data-anim="fade-up" data-anim-delay="160" style="margin-top:24px;">
            {{ __('pages.about.intro') }}
        </p>
    </div>
</div>

<figure class="page-figure" data-anim="fade-up">
    <img src="{{ asset('images/parasat/lobby2.jpg') }}" alt="{{ __('pages.about.heading1') }}" loading="lazy">
</figure>

<div class="tab-content-wrap" data-anim-stagger="scale-in" data-anim-stagger-gap="80">
    <a href="{{ route('administration') }}" class="tab-content-item" style="text-decoration:none;" data-tilt>
        <div class="ripple-div-two"></div>
        <div class="tab-content" style="width:100%;">
            <div class="page-icon-box" style="margin-bottom:20px;">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 3L2 9h2v10h16V9h2L12 3zm0 2.18L18 9v10H6V9l6-3.82zM10 11h4v6h-4z"/></svg>
            </div>
            <h3 class="tab-content-title">{{ __('pages.about.admin_card') }}</h3>
            <div class="tab-bottom-content">
                <span class="category-button w-button">{{ __('pages.about.cat_about') }}</span>
                <div class="tab-icon">
                    <img loading="lazy" src="/images/63ba665ae3ca2addb4de3b39_arrow-right.svg" alt="" class="image-icon"/>
                </div>
            </div>
        </div>
    </a>

    <a href="{{ route('teachers') }}" class="tab-content-item" style="text-decoration:none;" data-tilt>
        <div class="ripple-div-two"></div>
        <div class="tab-content" style="width:100%;">
            <div class="page-icon-box gold" style="margin-bottom:20px;">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
            </div>
            <h3 class="tab-content-title">{{ __('pages.about.teachers_card') }}</h3>
            <div class="tab-bottom-content">
                <span class="category-button w-button">{{ __('pages.about.cat_about') }}</span>
                <div class="tab-icon">
                    <img loading="lazy" src="/images/63ba665ae3ca2addb4de3b39_arrow-right.svg" alt="" class="image-icon"/>
                </div>
            </div>
        </div>
    </a>

    <a href="{{ route('contacts') }}" class="tab-content-item" style="text-decoration:none;" data-tilt>
        <div class="ripple-div-two"></div>
        <div class="tab-content" style="width:100%;">
            <div class="page-icon-box" style="margin-bottom:20px;">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
            </div>
            <h3 class="tab-content-title">{{ __('pages.about.contacts_card') }}</h3>
            <div class="tab-bottom-content">
                <span class="category-button w-button">{{ __('pages.about.cat_about') }}</span>
                <div class="tab-icon">
                    <img loading="lazy" src="/images/63ba665ae3ca2addb4de3b39_arrow-right.svg" alt="" class="image-icon"/>
                </div>
            </div>
        </div>
    </a>
</div>

@endsection
