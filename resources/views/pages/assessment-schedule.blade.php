@extends('layouts.page')

@section('breadcrumb', __('page.assessment.breadcrumb'))
@section('title', __('page.assessment.title'))

@section('page-content')

<div class="section-cotent-wrap grid-item mb-100" style="margin-bottom:56px;">
    <div class="grid-one">
        <p class="section-paragraph red" data-anim="fade-right">{{ __('pages.assessment.section_label') }}</p>
    </div>
    <div class="grid-two">
        <h2 class="section-title dark" data-anim="fade-up">{{ __('pages.assessment.heading') }}</h2>
        <p class="banner-paragraph dark" data-anim="fade-up" data-anim-delay="100" style="margin-top:24px;">
            {{ __('pages.assessment.intro') }}
        </p>
    </div>
</div>

<div class="page-grid-2" style="margin-bottom:48px;" data-anim-stagger="fade-up" data-anim-stagger-gap="100">
    <div class="page-card">
        <h3 class="page-admin-name" style="margin-bottom:8px;">{{ __('pages.assessment.bjb_title') }}</h3>
        <p class="banner-paragraph dark" style="font-size:14px;max-width:none;">
            {{ __('pages.assessment.bjb_desc') }}
        </p>
    </div>
    <div class="page-card" style="border-left:4px solid #fca206;">
        <h3 class="page-admin-name" style="margin-bottom:8px;">{{ __('pages.assessment.tjb_title') }}</h3>
        <p class="banner-paragraph dark" style="font-size:14px;max-width:none;">
            {{ __('pages.assessment.tjb_desc') }}
        </p>
    </div>
</div>

@php $quarters = trans('pages.assessment.quarters'); @endphp

<div class="page-table-wrap" data-anim="fade-up">
    <table class="page-table">
        <thead>
            <tr>
                <th>{{ __('pages.assessment.col_quarter') }}</th>
                <th>{{ __('pages.assessment.col_start') }}</th>
                <th>{{ __('pages.assessment.col_end') }}</th>
                <th>БЖБ</th>
                <th>ТЖБ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quarters as $q)
            <tr>
                <td class="strong">{{ $q['label'] }}</td>
                <td>{{ $q['start'] }}</td>
                <td>{{ $q['end'] }}</td>
                <td><span class="page-badge page-badge--blue">{{ $q['bjb'] }}</span></td>
                <td><span class="page-badge page-badge--gold">{{ $q['tjb'] }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
