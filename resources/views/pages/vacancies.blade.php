@extends('layouts.page')

@section('breadcrumb', __('page.vacancies.breadcrumb'))
@section('title', __('page.vacancies.title'))

@section('page-content')

<div class="section-cotent-wrap grid-item mb-100" style="margin-bottom:56px;">
    <div class="grid-one">
        <p class="section-paragraph red" data-anim="fade-right">{{ __('pages.vacancies.section_label') }}</p>
    </div>
    <div class="grid-two">
        <h2 class="section-title dark" data-anim="fade-up">{{ __('pages.vacancies.heading1') }}</h2>
        <h2 class="section-title dark" data-anim="fade-up" data-anim-delay="80">{{ __('pages.vacancies.heading2') }}</h2>
        <p class="banner-paragraph dark" data-anim="fade-up" data-anim-delay="160" style="margin-top:24px;">
            {{ __('pages.vacancies.intro') }}
        </p>
    </div>
</div>

<figure class="page-figure" data-anim="fade-up">
    <img src="{{ asset('images/parasat/school_outside2.jpg') }}" alt="{{ __('pages.vacancies.heading1') }}" loading="lazy">
</figure>

@php $vacancies = trans('pages.vacancies.items'); @endphp

<div style="margin-bottom:56px;" data-anim-stagger="fade-up" data-anim-stagger-gap="80">
    @foreach($vacancies as $v)
    <div class="page-vacancy-row">
        <div style="flex:1;">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:10px;">
                <h3 style="color:#012c68;font-size:17px;font-weight:600;margin:0;">{{ $v['title'] }}</h3>
                @if($v['urgent'])
                <span class="page-badge page-badge--red">{{ __('pages.vacancies.badge_urgent') }}</span>
                @endif
            </div>
            <div style="display:flex;gap:20px;flex-wrap:wrap;">
                <span class="banner-paragraph dark" style="font-size:13px;max-width:none;">
                    <span style="opacity:.6;margin-right:4px;">{{ __('pages.vacancies.lbl_employment') }}</span>{{ $v['type'] }}
                </span>
                <span class="banner-paragraph dark" style="font-size:13px;max-width:none;">
                    <span style="opacity:.6;margin-right:4px;">{{ __('pages.vacancies.lbl_edu') }}</span>{{ $v['edu'] }}
                </span>
                <span class="banner-paragraph dark" style="font-size:13px;max-width:none;">
                    <span style="opacity:.6;margin-right:4px;">{{ __('pages.vacancies.lbl_salary') }}</span>{{ $v['salary'] }}
                </span>
            </div>
        </div>
        <a href="{{ route('contacts') }}" class="page-action-link">{{ __('pages.vacancies.apply_btn') }}</a>
    </div>
    @endforeach
</div>

<div class="page-cta" data-anim="fade-up">
    <h3>{{ __('pages.vacancies.cta_title') }}</h3>
    <p>{{ __('pages.vacancies.cta_desc') }}</p>
    <a href="{{ route('contacts') }}" class="page-cta-link">{{ __('pages.vacancies.cta_btn') }}</a>
</div>

@endsection
