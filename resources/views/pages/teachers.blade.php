@extends('layouts.page')

@section('breadcrumb', __('page.teachers.breadcrumb'))
@section('title', __('page.teachers.title'))

@section('page-content')

<div class="section-cotent-wrap grid-item mb-100" style="margin-bottom:56px;">
    <div class="grid-one">
        <p class="section-paragraph red" data-anim="fade-right">{{ __('pages.teachers.section_label') }}</p>
    </div>
    <div class="grid-two">
        <h2 class="section-title dark" data-anim="fade-up">{{ __('pages.teachers.heading') }}</h2>
        <p class="banner-paragraph dark" data-anim="fade-up" data-anim-delay="100" style="margin-top:24px;">
            {{ __('pages.teachers.intro') }}
        </p>
    </div>
</div>

@php $subjects = trans('pages.teachers.subjects'); @endphp

<div class="tab-content-wrap" data-anim-stagger="fade-up" data-anim-stagger-gap="60">
    @foreach($subjects as $subject)
    <div class="tab-content-item" data-tilt>
        <div class="ripple-div-two"></div>
        <div class="tab-content" style="width:100%;">
            <h3 class="tab-content-title">{{ $subject }}</h3>
            <div class="tab-bottom-content">
                <a href="#" class="category-button w-button">{{ __('pages.teachers.cat_label') }}</a>
                <div class="tab-icon">
                    <img loading="lazy" src="/images/63ba665ae3ca2addb4de3b39_arrow-right.svg" alt="" class="image-icon"/>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
