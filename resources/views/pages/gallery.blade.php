@extends('layouts.page')

@section('breadcrumb', __('page.gallery.breadcrumb'))
@section('title', __('page.gallery.title'))
@section('page-desc', __('pages.gallery.intro'))

@section('page-content')

<style>
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 16px;
    }
    .gallery-item {
        position: relative;
        border-radius: 14px;
        overflow: hidden;
        cursor: pointer;
        aspect-ratio: 4 / 3;
        background: #eef2f8;
    }
    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .4s ease;
    }
    .gallery-item:hover img { transform: scale(1.06); }
    .gallery-item figcaption {
        position: absolute;
        left: 0; right: 0; bottom: 0;
        padding: 28px 16px 12px;
        color: #fff;
        font-size: 13px;
        background: linear-gradient(transparent, rgba(1, 26, 64, .82));
        opacity: 0;
        transition: opacity .25s;
    }
    .gallery-item:hover figcaption { opacity: 1; }
    .gallery-item.is-hidden { display: none; }

    .gallery-lightbox {
        position: fixed;
        inset: 0;
        background: rgba(1, 20, 48, .92);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 32px;
        z-index: 10000;
    }
    .gallery-lightbox.is-open { display: flex; }
    .gallery-lightbox img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 10px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, .5);
    }
    .gallery-lightbox-close {
        position: absolute;
        top: 20px; right: 28px;
        color: #fff;
        font-size: 34px;
        line-height: 1;
        background: none;
        border: none;
        cursor: pointer;
        font-family: inherit;
    }
</style>

@php
    $filters = trans('pages.gallery.filters');
    $items   = trans('pages.gallery.items');
@endphp

<div class="page-filters" data-anim="fade-up">
    @foreach($filters as $key => $label)
    <button class="page-filter-btn {{ $loop->first ? 'active' : '' }}" data-filter="{{ $key }}">{{ $label }}</button>
    @endforeach
</div>

<div class="gallery-grid" data-anim-stagger="fade-up" data-anim-stagger-gap="40">
    @foreach($items as $item)
    <figure class="gallery-item" data-cat="{{ $item['cat'] }}" data-full="{{ asset('images/parasat/'.$item['img']) }}">
        <img src="{{ asset('images/parasat/'.$item['img']) }}" alt="{{ $item['alt'] }}" loading="lazy">
        <figcaption>{{ $item['alt'] }}</figcaption>
    </figure>
    @endforeach
</div>

<div class="gallery-lightbox" id="galleryLightbox">
    <button class="gallery-lightbox-close" aria-label="Close">&times;</button>
    <img src="" alt="">
</div>

<script>
(function () {
    var grid    = document.querySelector('.gallery-grid');
    var buttons = document.querySelectorAll('.page-filter-btn');
    var box     = document.getElementById('galleryLightbox');
    var boxImg  = box.querySelector('img');

    buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            buttons.forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');
            var f = btn.getAttribute('data-filter');
            grid.querySelectorAll('.gallery-item').forEach(function (item) {
                var show = f === 'all' || item.getAttribute('data-cat') === f;
                item.classList.toggle('is-hidden', !show);
            });
        });
    });

    grid.querySelectorAll('.gallery-item').forEach(function (item) {
        item.addEventListener('click', function () {
            boxImg.src = item.getAttribute('data-full');
            boxImg.alt = item.querySelector('img').alt;
            box.classList.add('is-open');
        });
    });

    function closeBox() { box.classList.remove('is-open'); boxImg.src = ''; }
    box.addEventListener('click', function (e) {
        if (e.target === box || e.target.classList.contains('gallery-lightbox-close')) closeBox();
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeBox();
    });
})();
</script>

@endsection
