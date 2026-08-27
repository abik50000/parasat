@extends('layouts.page')

@section('breadcrumb', __('page.clubs.breadcrumb'))
@section('title', __('page.clubs.title'))

@section('page-content')

<div class="section-cotent-wrap grid-item mb-100" style="margin-bottom:56px;">
    <div class="grid-one">
        <p class="section-paragraph red" data-anim="fade-right">{{ __('pages.clubs.section_label') }}</p>
    </div>
    <div class="grid-two">
        <h2 class="section-title dark" data-anim="fade-up">{{ __('pages.clubs.heading') }}</h2>
        <p class="banner-paragraph dark" data-anim="fade-up" data-anim-delay="100" style="margin-top:24px;">
            {{ __('pages.clubs.intro') }}
        </p>
    </div>
</div>

@php
$bgImages = [
    'images/parasat/junior_class.jpg',
    'images/parasat/lesson2.jpg',
    'images/parasat/library3.jpg',
    'images/parasat/steam1.jpg',
    'images/parasat/steam3.jpg',
    'images/parasat/auditorium.jpg',
    'images/parasat/lesson5.jpg',
    'images/parasat/lesson4.jpg',
    'images/parasat/library1.jpg',
    'images/parasat/steam_startup.jpg',
    'images/parasat/lesson3.jpg',
];
$bgCount    = count($bgImages);
$cardIndex  = 0;
$categories = trans('pages.clubs.categories');
@endphp

@foreach($categories as $category => $clubs)
<div class="page-section">
    <h2 class="page-section-title" data-anim="fade-up">{{ $category }}</h2>
    <div class="event-tab-content-wrap" data-anim-stagger="fade-up" data-anim-stagger-gap="80">
        @foreach($clubs as [$name, $time, $label])
        @php $img = asset($bgImages[$cardIndex % $bgCount]); $cardIndex++; @endphp
        <div class="event-tab-content-item">
            <div class="event-tab-header-content">
                <p class="event-date">{{ $time }}</p>
                <a href="#" class="event-category-button w-button">{{ $label }}</a>
            </div>
            <h3 class="event-tab-content-title">{{ $name }}</h3>
            <div class="tab-bottom-content">
                <div class="tab-icon">
                    <img loading="lazy" src="/images/63ba665ae3ca2addb4de3b39_arrow-right.svg" alt="" class="event-icon"/>
                </div>
            </div>
            <div class="event-bg-color" style="background-image: linear-gradient(rgba(3,44,104,0.72), rgba(3,44,104,0.72)), url('{{ $img }}'); background-size: cover; background-position: center;"></div>
        </div>
        @endforeach
    </div>
</div>
@endforeach

@endsection
