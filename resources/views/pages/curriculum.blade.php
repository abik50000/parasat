@extends('layouts.page')

@section('breadcrumb', __('page.curriculum.breadcrumb'))
@section('title', __('page.curriculum.title'))
@section('page-desc', __('pages.curriculum.intro'))

@section('page-content')

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
