@extends('layouts.page')

@section('breadcrumb', __('page.ent.breadcrumb'))
@section('title', __('page.ent.title'))

@section('page-content')

<div class="section-cotent-wrap grid-item mb-100" style="margin-bottom:56px;">
    <div class="grid-one">
        <p class="section-paragraph red" data-anim="fade-right">{{ __('pages.ent.section_label') }}</p>
    </div>
    <div class="grid-two">
        <h2 class="section-title dark" data-anim="fade-up">{{ __('pages.ent.heading') }}</h2>
        <p class="banner-paragraph dark" data-anim="fade-up" data-anim-delay="100" style="margin-top:24px;">
            {{ __('pages.ent.intro') }}
        </p>
    </div>
</div>

<figure class="page-figure" data-anim="fade-up">
    <img src="{{ asset('images/parasat/lesson5.jpg') }}" alt="{{ __('pages.ent.heading') }}" loading="lazy">
</figure>

@php
$years = [
    ['year' => '2024', 'graduates' => 28, 'avg' => 112, 'max' => 136, 'grants' => 8],
    ['year' => '2023', 'graduates' => 25, 'avg' => 108, 'max' => 130, 'grants' => 6],
    ['year' => '2022', 'graduates' => 22, 'avg' => 104, 'max' => 128, 'grants' => 5],
    ['year' => '2021', 'graduates' => 20, 'avg' => 99,  'max' => 124, 'grants' => 4],
];
@endphp

<div class="page-grid-4" style="margin-bottom:60px;" data-anim-stagger="scale-in" data-anim-stagger-gap="80">
    <div class="page-stat-card page-stat-card--blue">
        <span class="page-stat-number">{{ $years[0]['avg'] }}</span>
        <p class="page-stat-label">{{ __('pages.ent.stat_avg') }}</p>
    </div>
    <div class="page-stat-card page-stat-card--gold">
        <span class="page-stat-number">{{ $years[0]['max'] }}</span>
        <p class="page-stat-label">{{ __('pages.ent.stat_max') }}</p>
    </div>
    <div class="page-stat-card page-stat-card--blue">
        <span class="page-stat-number">{{ $years[0]['grants'] }}</span>
        <p class="page-stat-label">{{ __('pages.ent.stat_grants') }}</p>
    </div>
    <div class="page-stat-card page-stat-card--light">
        <span class="page-stat-number" style="color:#012c68;">{{ $years[0]['graduates'] }}</span>
        <p class="page-stat-label" style="color:#777;">{{ __('pages.ent.stat_grads') }}</p>
    </div>
</div>

<h2 class="page-section-title" data-anim="fade-up">{{ __('pages.ent.table_title') }}</h2>
<div class="page-table-wrap" data-anim="fade-up" data-anim-delay="80">
    <table class="page-table">
        <thead>
            <tr>
                <th>{{ __('pages.ent.col_year') }}</th>
                <th style="text-align:center;">{{ __('pages.ent.col_grads') }}</th>
                <th style="text-align:center;">{{ __('pages.ent.col_avg') }}</th>
                <th style="text-align:center;">{{ __('pages.ent.col_max') }}</th>
                <th style="text-align:center;">{{ __('pages.ent.col_grants') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($years as $y)
            <tr>
                <td class="strong">{{ $y['year'] }}</td>
                <td style="text-align:center;">{{ $y['graduates'] }}</td>
                <td style="text-align:center;"><span class="page-badge page-badge--blue">{{ $y['avg'] }}</span></td>
                <td style="text-align:center;"><span class="page-badge page-badge--gold">{{ $y['max'] }}</span></td>
                <td style="text-align:center;"><span class="page-badge page-badge--green">{{ $y['grants'] }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
