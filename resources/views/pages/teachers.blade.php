@extends('layouts.page')

@section('breadcrumb', __('page.teachers.breadcrumb'))
@section('title', __('page.teachers.title'))
@section('page-desc', __('pages.teachers.intro'))

@section('page-content')

<figure class="page-figure" data-anim="fade-up">
    <img src="{{ asset('images/parasat/teachers.jpg') }}" alt="{{ __('pages.teachers.heading') }}" loading="lazy">
</figure>

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
