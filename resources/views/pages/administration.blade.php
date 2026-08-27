@extends('layouts.page')

@section('breadcrumb', __('page.administration.breadcrumb'))
@section('title', __('page.administration.title'))
@section('page-desc', __('pages.administration.intro'))

@section('page-content')

<figure class="page-figure" data-anim="fade-up">
    <img src="{{ asset('images/parasat/lobby.jpg') }}" alt="{{ __('pages.administration.heading') }}" loading="lazy">
</figure>

@php $staff = trans('pages.administration.staff'); @endphp

<div class="page-admin-grid" data-anim-stagger="fade-up" data-anim-stagger-gap="80">
    @foreach($staff as $person)
    <div class="page-admin-card">
        <div class="page-admin-avatar">
            <img src="{{ asset($person['photo']) }}" alt="{{ $person['name'] }}"
                 style="width:100%; height:100%; object-fit:cover; border-radius:inherit;">
        </div>
        <h3 class="page-admin-name">{{ $person['name'] }}</h3>
        <p class="page-admin-role">{{ $person['role'] }}</p>
    </div>
    @endforeach
</div>

@endsection
