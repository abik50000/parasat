@extends('layouts.page')

@section('breadcrumb', __('page.faq.breadcrumb'))
@section('title', __('page.faq.title'))

@section('page-content')

<div class="section-cotent-wrap grid-item mb-100" style="margin-bottom:56px;">
    <div class="grid-one">
        <p class="section-paragraph red" data-anim="fade-right">{{ __('pages.faq.section_label') }}</p>
    </div>
    <div class="grid-two">
        <h2 class="section-title dark" data-anim="fade-up">{{ __('pages.faq.heading1') }}</h2>
        <h2 class="section-title dark" data-anim="fade-up" data-anim-delay="80">{{ __('pages.faq.heading2') }}</h2>
    </div>
</div>

<figure class="page-figure" data-anim="fade-up">
    <img src="{{ asset('images/parasat/faceid.jpg') }}" alt="{{ __('pages.faq.heading1') }}" loading="lazy">
</figure>

@php $faqs = trans('pages.faq.categories'); @endphp

@foreach($faqs as $category => $items)
<div class="page-section" data-anim="fade-up">
    <h2 class="page-section-title">{{ $category }}</h2>
    <div data-anim-stagger="fade-up" data-anim-stagger-gap="60">
        @foreach($items as [$q, $a])
        <details class="page-faq-item">
            <summary>
                {{ $q }}
                <i class="page-faq-icon">+</i>
            </summary>
            <div class="page-faq-body">{{ $a }}</div>
        </details>
        @endforeach
    </div>
</div>
@endforeach

<div class="page-cta page-cta--light" data-anim="fade-up" style="margin-top:32px;">
    <h3>{{ __('pages.faq.cta_title') }}</h3>
    <p>{{ __('pages.faq.cta_desc') }}</p>
    <a href="{{ route('contacts') }}" class="page-cta-link dark">{{ __('pages.faq.cta_btn') }}</a>
</div>

@endsection
