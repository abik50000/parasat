@extends('layouts.master')

@section('content')
@php
    $dirs        = trans('pages.index.dirs');
    $news1Items  = trans('pages.index.news1_items');
    $reviews     = trans('pages.index.reviews');
    $eventsTabs  = trans('pages.index.events_tabs');
    $news2Items  = trans('pages.index.news2_items');
    $advItems    = trans('pages.index.adv_items');
@endphp
<style>
.hr {    filter: hue-rotate(241deg); overflow:initial}

@media screen and (min-width: 1200px) {
    .banner-title {
        font-size: 80px;
          line-height: 80px;
    }
}
@media screen and (min-width: 1440px) {
    .section-title.smaller {
        font-size: 70px;

    }
}

/* ── Banner slogan / tagline ── */
.banner-slogan {
    margin: 0 0 18px;
    color: #fca206;
    font-size: 22px;
    font-weight: 600;
    letter-spacing: 0.02em;
}
.banner-tagline {
    max-width: 600px;
    margin: 20px 0 0;
    color: rgba(255, 255, 255, 0.72);
    font-size: 16px;
    font-style: italic;
    line-height: 1.6;
}
@media screen and (max-width: 767px) {
    .banner-slogan { font-size: 16px; margin-bottom: 12px; }
    .banner-tagline { font-size: 13px; }
}

/* ── About block: lead paragraph + tile captions ── */
.about-lead {
    max-width: 720px;
    margin: 28px 0 0;
    color: #4a5568;
    font-size: 18px;
    line-height: 1.75;
}
.uv-thumbnail-desc {
    margin: 16px 0 0;
    color: #4a5568;
    font-size: 15px;
    line-height: 1.6;
}

/* ── Tile photos: keep the white caption readable ── */
.uv-thumbnail-wrap { position: relative; }
.uv-thumbnail-wrap img {
    width: 100%;
    height: 340px;
    object-fit: cover;
    display: block;
}
.uv-thumbnail-wrap::after {
    content: '';
    position: absolute;
    left: 0; right: 0; bottom: 0;
    height: 55%;
    background: linear-gradient(to top, rgba(1, 26, 64, 0.82), rgba(1, 26, 64, 0));
    pointer-events: none;
}
.uv-thumbnail-title { z-index: 1; }
@media screen and (max-width: 767px) {
    .uv-thumbnail-wrap img { height: 260px; }
}
</style>
<x-header />
        <div data-anim="zoom-in" class="banner-area wf-section">
            <div class="container banner">
                <div class="banner-inner">
                    <div class="banner-thumbnail-wrap">
                        <img data-anim="scale-in" src="/images/parasat/school_outside3.jpg" loading="lazy" alt="Школа Парасат Ақжайық" class="banner-thumb"/>
                    </div>
                    <div class="banner-content">
                        <h1 data-anim="fade-up" class="banner-title">
                            {!! nl2br(e(__('pages.index.banner_title'))) !!}
                        </h1>
                        <p data-anim="fade-up" class="banner-slogan">{{ __('pages.index.banner_slogan') }}</p>
                        <p data-anim="fade-up" class="banner-paragraph">{{ __('pages.index.banner_paragraph') }}</p>
                        <p data-anim="fade-up" class="banner-tagline">{{ __('pages.index.banner_tagline') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-section wf-section">
            <div class="about-image hr"><img src="/images/63bbdf709d5ae71012ae178e_spiral.svg" loading="lazy" alt=""></div>
            <div class="container">
                <div class="section-cotent-wrap grid-item mb-100">
                    <div class="grid-one">
                        <p class="section-paragraph">{{ __('pages.index.about_label') }}</p>
                    </div>
                    <div class="grid-two">
                        <h2 data-anim="fade-up" class="section-title smaller">
                            {!! nl2br(e(__('pages.index.about_heading'))) !!}
                        </h2>
                        <p data-anim="fade-up" class="about-lead">{{ __('pages.index.about_paragraph') }}</p>
                    </div>
                </div>
                <div class="uv-single-item-wrap" data-scroll-zoom-wave>
                    <div class="uv-single-item d-none"></div>
                    <div class="uv-single-item">
                        <div class="uv-thumbnail-wrap">
                            <img src="/images/parasat/junior_class.jpg" loading="lazy" alt="{{ __('pages.index.thumb_classes') }}"/>
                            <h3 class="uv-thumbnail-title">{{ __('pages.index.thumb_classes') }}</h3>
                        </div>
                        <p class="uv-thumbnail-desc">{{ __('pages.index.thumb_classes_desc') }}</p>
                    </div>
                    <div data-anim="fade-right" class="uv-single-item">
                        <div class="uv-thumbnail-wrap">
                            <img src="/images/parasat/school_outside3.jpg" loading="lazy" alt="{{ __('pages.index.thumb_campus') }}"/>
                            <h3 class="uv-thumbnail-title">{{ __('pages.index.thumb_campus') }}</h3>
                        </div>
                        <p class="uv-thumbnail-desc">{{ __('pages.index.thumb_campus_desc') }}</p>
                    </div>
                    <div data-anim="fade-left" class="uv-single-item">
                        <div class="uv-thumbnail-wrap">
                            <img src="/images/parasat/library1.jpg" loading="lazy" alt="{{ __('pages.index.thumb_library') }}"/>
                            <h3 class="uv-thumbnail-title">{{ __('pages.index.thumb_library') }}</h3>
                        </div>
                        <p class="uv-thumbnail-desc">{{ __('pages.index.thumb_library_desc') }}</p>
                    </div>
                    <div class="uv-single-item">
                        <div class="uv-thumbnail-wrap">
                            <img src="/images/parasat/steam1.jpg" loading="lazy" alt="{{ __('pages.index.thumb_steam') }}"/>
                            <h3 class="uv-thumbnail-title">{{ __('pages.index.thumb_steam') }}</h3>
                        </div>
                        <p class="uv-thumbnail-desc">{{ __('pages.index.thumb_steam_desc') }}</p>
                    </div>
                    <div id="w-node-_4c5894b9-2514-f8a8-50ee-a0cde03ac028-6dbd672b" class="uv-single-item d-none"><div class="uv-thumbnail-wrap hr"><img src="/images/63b55ce64a8708b6ad30204b_Frame.png" loading="lazy" alt=""></div></div>
                </div>
            </div>
        </div>
        <div class="academic-programs-area wf-section">
            <div class="container">
                <div class="section-cotent-wrap">
                    <h2 class="section-title dark mb-30">{{ __('pages.index.dirs_heading') }}</h2>
                    <p data-anim="fade-up" class="banner-paragraph dark">{{ __('pages.index.dirs_paragraph') }}</p>
                </div>
                <div class="academic-tabs-item-wrap">
                    <div data-current="{{ array_key_first($dirs) }}" class="w-tabs">
                        <div class="tabs-menu w-tab-menu">
                            @foreach($dirs as $key => $dir)
                            <a data-anim="fade-right" data-w-tab="{{ $key }}" class="tab-link w-inline-block w-tab-link {{ $loop->first ? 'w--current' : '' }}">
                                <div class="tab-menu">{{ $dir['tab'] }}</div>
                            </a>
                            @endforeach
                        </div>
                        <div class="w-tab-content">
                            @foreach($dirs as $key => $dir)
                            <div data-w-tab="{{ $key }}" class="w-tab-pane {{ $loop->first ? 'w--tab-active' : '' }}">
                                <div class="tab-content-wrap">
                                    @foreach($dir['items'] as $item)
                                    <div data-anim="fade-right" class="tab-content-item" data-tilt>
                                        <div class="ripple-div-two"></div>
                                        <div class="tab-content">
                                            <h3 class="tab-content-title">{{ $item }}</h3>
                                            <div class="tab-bottom-content">
                                                <a href="#" class="category-button w-button">{{ $dir['label'] }}</a>
                                                <div class="tab-icon"><img loading="lazy" src="/images/63ba665ae3ca2addb4de3b39_arrow-right.svg" alt="" class="image-icon"/></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="faculty-area" data-scroll-reveal>
            <div class="container">
                <div class="section-cotent-wrap grid-item mb-100">
                    <div class="grid-one">
                        <p data-anim="fade-left" class="section-paragraph white">{{ __('pages.index.faculty_label') }}</p>
                    </div>
                    <div class="grid-two">
                        <h2 data-anim="fade-up" class="section-title">{{ __('pages.index.faculty_h1') }}</h2>
                        <h2 data-anim="fade-up" class="section-title">{{ __('pages.index.faculty_h2') }}</h2>
                        <h2 data-anim="fade-up" class="section-title">{{ __('pages.index.faculty_h3') }}</h2>
                    </div>
                </div>
                <div class="faculty-grid">
                    <div id="w-node-eb4a36dd-0359-a222-3fb3-f5d2a5e49d62-6dbd672b" class="grid-one">
                        <img data-anim="fade-right" src="/images/parasat/junior_class.jpg"  loading="lazy" alt="{{ __('pages.index.faculty1_title') }}" class="image"/>
                    </div>
                    <div id="w-node-_32847369-ac01-3bf6-7c08-28ede9c2a608-6dbd672b" class="grid-one">
                        <div data-anim="fade-left" class="faculty-single-item">
                            <div class="faculty-category">
                                <h3 class="faculty-cat-title">{{ __('pages.index.faculty1_cat') }}</h3>
                            </div>
                            <h2 class="faculty-item-title">{{ __('pages.index.faculty1_title') }}</h2>
                            <p class="faculty-paragraph">{{ __('pages.index.faculty1_para') }}</p>
                        </div>
                    </div>
                </div>
                <div class="faculty-grid-two">
                    <div id="w-node-_2906dee6-6614-4329-7d66-89c0d97ab13b-6dbd672b" class="grid-one">
                        <div data-anim="fade-right" class="faculty-single-item">
                            <div class="faculty-category">
                                <h3 class="faculty-cat-title">{{ __('pages.index.faculty2_cat') }}</h3>
                            </div>
                            <h2 class="faculty-item-title">{{ __('pages.index.faculty2_title') }}</h2>
                            <p class="faculty-paragraph">{{ __('pages.index.faculty2_para') }}</p>
                        </div>
                    </div>
                    <div id="w-node-_2906dee6-6614-4329-7d66-89c0d97ab13d-6dbd672b" class="grid-one text-right">
                        <img data-anim="fade-left" src="/images/parasat/lesson6.jpg" loading="lazy" alt="{{ __('pages.index.faculty2_title') }}" class="image"/>
                    </div>
                </div>
                <div class="faculty-grid" style="margin-top:30px;">
                    <div id="w-node-faculty3-img" class="grid-one">
                        <img data-anim="fade-right" src="/images/parasat/lesson.jpg" loading="lazy" alt="{{ __('pages.index.faculty3_title') }}" class="image"/>
                    </div>
                    <div id="w-node-faculty3-text" class="grid-one">
                        <div data-anim="fade-left" class="faculty-single-item">
                            <div class="faculty-category">
                                <h3 class="faculty-cat-title">{{ __('pages.index.faculty3_cat') }}</h3>
                            </div>
                            <h2 class="faculty-item-title">{{ __('pages.index.faculty3_title') }}</h2>
                            <p class="faculty-paragraph">{{ __('pages.index.faculty3_para') }}</p>
                        </div>
                    </div>
                </div>
                <div class="btn-wrapper">
                    <a href="#" class="primary-button m-top-55 w-inline-block">
                        <div data-anim="scale-in" class="ripple-div"></div>
                        <div class="button-content">
                            <div class="primary-button-text">{{ __('pages.index.all_teachers_btn') }}</div>
                            <img src="/images/63ba7e6bf28c5064304a8304_Icon.svg" loading="lazy" alt="" class="image-6"/>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="counter-area wf-section">
            <div class="container">
                <div class="counter-single-item-wrap">
                    <div data-anim="fade-up" class="counter-single-item">
                        <div class="count-number">
                            <h3 class="count-number-title">{{ __('pages.index.counter1_num') }}</h3>
                            <h1 class="count-title">{{ __('pages.index.counter1_title') }}</h1>
                        </div>
                        <p class="count-paragraph">{{ __('pages.index.counter1_para') }}</p>
                        <div class="line"></div>
                    </div>
                    <div data-anim="fade-up" data-anim-delay="150" class="counter-single-item ml-left">
                        <div class="count-number">
                            <h3 class="count-number-title">{{ __('pages.index.counter2_num') }}</h3>
                            <h1 class="count-title">{{ __('pages.index.counter2_title') }}</h1>
                        </div>
                        <p class="count-paragraph">{{ __('pages.index.counter2_para') }}</p>
                    </div>
                    <div data-anim="fade-up" data-anim-delay="300" class="counter-single-item pl-left">
                        <div class="line-two"></div>
                        <div class="count-number">
                            <h3 class="count-number-title">{{ __('pages.index.counter3_num') }}</h3>
                            <h1 class="count-title">{{ __('pages.index.counter3_title') }}</h1>
                        </div>
                        <p class="count-paragraph">{{ __('pages.index.counter3_para') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="campus-life-area wf-section">
            <div class="container">
                <div class="section-cotent-wrap grid-item">
                    <div class="grid-one">
                        <p data-anim="fade-up" class="section-paragraph white">{{ __('pages.index.campus_label') }}</p>
                        <svg class="section-image" width="480" height="480" viewBox="0 0 480 480" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <circle cx="240" cy="240" r="60"  stroke="rgba(255,255,255,0.14)" stroke-width="1.5"/>
                            <circle cx="240" cy="240" r="110" stroke="rgba(255,255,255,0.11)" stroke-width="1.5"/>
                            <circle cx="240" cy="240" r="160" stroke="rgba(255,255,255,0.08)" stroke-width="1.5"/>
                            <circle cx="240" cy="240" r="210" stroke="rgba(255,255,255,0.05)" stroke-width="1.5"/>
                            <circle cx="240" cy="240" r="235" stroke="rgba(252,162,6,0.18)"   stroke-width="1.5"/>
                            <circle cx="240" cy="240" r="12"  fill="rgba(252,162,6,0.6)"/>
                            <circle cx="240" cy="240" r="5"   fill="#fca206"/>
                        </svg>
                    </div>
                    <div class="grid-two mb-100">
                        <h2 data-anim="fade-up" class="section-title">{{ __('pages.index.campus_h1') }}</h2>
                        <h2 data-anim="fade-up" class="section-title">{{ __('pages.index.campus_h2') }}</h2>
                        <h2 data-anim="fade-up" class="section-title mb-30">{{ __('pages.index.campus_h3') }}</h2>
                        <p data-anim="fade-up" class="section-paragraph white small">{{ __('pages.index.campus_para') }}</p>
                    </div>
                </div>
            </div>
            <div class="campus-thumb-wrap">
                <img data-scroll-zoom src="/images/parasat/library3.jpg" alt="{{ __('pages.index.campus_label') }}" class="image-8"/>
            </div>
        </div>
        <div class="research-area wf-section">
            <div class="container overflow-visible">
                <div class="section-cotent-wrap grid-item mb-20">
                    <div class="grid-one mb-20">
                        <h2 data-anim="fade-up" class="section-title dark">{{ __('pages.index.news1_h1') }}</h2>
                        <h2 data-anim="fade-up" class="section-title dark">{{ __('pages.index.news1_h2') }}</h2>
                    </div>
                    <div class="grid-two">
                          <div class="grid-two">
                        <p data-anim="fade-up" class="banner-paragraph dark" style="margin-left:50px; margin-top:18px;">{{ __('pages.index.news1_para') }}</p>
                    </div>
                    </div>
                </div>
                <div class="section-cotent-wrap grid-item mb-100">
                    <div class="grid-one"></div>
                  
                </div>
                <div class="research-slider-container">
                    <div class="swiper-wrapper research-slider-wrapper">
                        @php
                            $researchThumbs = [
                                '/images/parasat/library2.jpg',
                                '/images/parasat/auditorium2.jpg',
                                '/images/parasat/steam3.jpg',
                                '/images/parasat/lobby_reception.jpg',
                            ];
                        @endphp
                        @foreach($news1Items as $i => $item)
                        <div data-anim="fade-right" class="research-post-item swiper-slide">
                            <div class="research-thumbnail-wrap">
                                <img src="{{ $researchThumbs[$i % count($researchThumbs)] }}" loading="lazy" sizes="(max-width: 620px) 100vw, 620px" alt="" class="image-12"/>
                            </div>
                            <div class="research-content">
                                <h2 class="researc-item-title">{{ $item['title'] }}</h2>
                                <p class="research-item-paragraph">{{ $item['para'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- ══ Strategy ══ -->
        <div class="faculty-area wf-section" data-scroll-reveal>
            <div class="container">
                <div class="section-cotent-wrap grid-item mb-100">
                    <div class="grid-one">
                        <p data-anim="fade-left" class="section-paragraph white">{{ __('pages.index.strategy_label') }}</p>
                    </div>
                    <div class="grid-two">
                        <h2 data-anim="fade-up" class="section-title">{{ __('pages.index.strategy_h1') }}</h2>
                        <h2 data-anim="fade-up" class="section-title">{{ __('pages.index.strategy_h2') }}</h2>
                        <h2 data-anim="fade-up" class="section-title">{{ __('pages.index.strategy_h3') }}</h2>
                    </div>
                </div>
                <div class="faculty-grid">
                    <div id="w-node-strategy-img" class="grid-one">
                        <img data-anim="fade-right"
                             src="/images/parasat/steam_startup.jpg"
                             loading="lazy"
                             alt="{{ __('pages.index.strategy_title') }}" class="image"/>
                    </div>
                    <div id="w-node-strategy-text" class="grid-one">
                        <div data-anim="fade-left" class="faculty-single-item">
                            <div class="faculty-category">
                                <h3 class="faculty-cat-title">{{ __('pages.index.strategy_cat') }}</h3>
                            </div>
                            <h2 class="faculty-item-title">{{ __('pages.index.strategy_title') }}</h2>
                            <p class="faculty-paragraph">{{ __('pages.index.strategy_para1') }}</p>
                            @foreach(trans('pages.index.strategy_points') as $point)
                            <p class="faculty-paragraph" style="margin-top:14px;"><strong>{{ $point['title'] }}</strong> — {{ $point['text'] }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="btn-wrapper">
                    <a href="#" class="primary-button m-top-55 w-inline-block">
                        <div data-anim="scale-in" class="ripple-div"></div>
                        <div class="button-content">
                            <div class="primary-button-text">{{ __('pages.index.strategy_btn') }}</div>
                            <img src="/images/63ba7e6bf28c5064304a8304_Icon.svg" loading="lazy" alt="" class="image-6"/>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- ══ Reviews ══ -->
        <div class="testimonial-area wf-section" data-scroll-reveal>
            <div class="container">
                <div class="columns">
                    <div class="col top">
                        <div class="section-title-wrap">
                            <p data-anim="fade-up" class="section-paragraph red">{{ __('pages.index.reviews_label') }}</p>
                            <h2 data-anim="fade-up" class="section-title style-01">
                                <span class="text-span">{{ __('pages.index.reviews_heading') }}</span>
                                <span class="text-span-2">{{ __('pages.index.reviews_heading_alt') }}</span>
                            </h2>
                        </div>
                    </div>
                    <div class="col">
                        <div class="testimonial-single-item-wrap">
                            @php
                                $reviewThumbs = [
                                    '/images/63bb8d81cfc08455057d3904_Ellipse%202.png',
                                    '/images/63bba6add99068467737e002_Ellipse%202-1.png',
                                    '/images/63bba6add99068467737e002_Ellipse%202-1.png',
                                ];
                            @endphp
                            <div data-anim="fade-up" data-anim-delay="0" class="testimonial-wrap-div-one">
                                <div class="testimonial-single-item dark"></div>
                                <div data-anim="fade-up" data-anim-delay="100" class="testimonial-single-item">
                                    <div class="testimonial-content">
                                        <p class="testimonial-author-quote">{{ $reviews[0]['quote'] }}</p>
                                    </div>
                                    <div class="testimonial-author-meta">
                                        <div class="testimonial-author-thumb">
                                            <img src="{{ $reviewThumbs[0] }}" loading="lazy" alt=""/>
                                        </div>
                                        <div class="testimonial-meta-content">
                                            <h4 class="testimonial-author-name">{{ $reviews[0]['name'] }}</h4>
                                            <p class="paragraph-3">{{ $reviews[0]['role'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-single-item dark"></div>
                            </div>
                            <div data-anim="fade-up" data-anim-delay="200" class="testimonial-wrap-div-two">
                                <div class="testimonial-single-item dark"></div>
                                <div data-anim="fade-up" data-anim-delay="300" class="testimonial-single-item">
                                    <div class="testimonial-content">
                                        <p class="testimonial-author-quote">{{ $reviews[1]['quote'] }}</p>
                                    </div>
                                    <div class="testimonial-author-meta">
                                        <div class="testimonial-author-thumb">
                                            <img src="{{ $reviewThumbs[1] }}" loading="lazy" alt=""/>
                                        </div>
                                        <div class="testimonial-meta-content">
                                            <h4 class="testimonial-author-name">{{ $reviews[1]['name'] }}</h4>
                                            <p class="paragraph-3">{{ $reviews[1]['role'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div data-anim="fade-up" data-anim-delay="400" class="testimonial-single-item">
                                    <div class="testimonial-content">
                                        <p class="testimonial-author-quote">{{ $reviews[2]['quote'] }}</p>
                                    </div>
                                    <div class="testimonial-author-meta">
                                        <div class="testimonial-author-thumb">
                                            <img src="{{ $reviewThumbs[2] }}" loading="lazy" alt=""/>
                                        </div>
                                        <div class="testimonial-meta-content">
                                            <h4 class="testimonial-author-name">{{ $reviews[2]['name'] }}</h4>
                                            <p class="paragraph-3">{{ $reviews[2]['role'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-single-item dark"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ══ Events / Clubs ══ -->
        <div class="event-area wf-section">
            <div class="container">
                <div class="section-cotent-wrap grid-item mb-100">
                    <div class="grid-one">
                        <p data-anim="fade-left" class="section-paragraph">{{ __('pages.index.events_label') }}</p>
                    </div>
                    <div class="grid-two">
                        <h2 data-anim="fade-up" class="section-title dark">{{ __('pages.index.events_h1') }}</h2>
                        <h2 data-anim="fade-up" class="section-title dark">{{ __('pages.index.events_h2') }}</h2>
                    </div>
                </div>
                <div class="event-tabs">
                    <div class="event-tabs-item-wrap">
                        <div data-current="{{ array_key_first($eventsTabs) }}" class="events-tab w-tabs">
                            <div class="event-tabs-menu w-tab-menu">
                                @foreach($eventsTabs as $tabKey => $tabData)
                                <a data-anim="fade-up" data-w-tab="{{ $tabKey }}" class="events-tab-link w-inline-block w-tab-link {{ $loop->first ? 'w--current' : '' }}">
                                    <div class="tab-menu">{{ $tabData['tab'] }}</div>
                                </a>
                                @endforeach
                            </div>
                            <div class="tabs-content w-tab-content">
                                @foreach($eventsTabs as $tabKey => $tabData)
                                <div data-w-tab="{{ $tabKey }}" class="w-tab-pane {{ $loop->first ? 'w--tab-active' : '' }}">
                                    <div class="event-tab-content-wrap">
                                        @foreach($tabData['items'] as $item)
                                        <div data-anim="scale-in" class="event-tab-content-item">
                                            <div class="event-tab-header-content">
                                                <p class="event-date">{{ __('pages.index.events_time') }}</p>
                                                <a href="#" class="event-category-button w-button">{{ $tabData['tab'] }}</a>
                                            </div>
                                            <h3 class="event-tab-content-title">{{ $item['title'] }}</h3>
                                            <p class="paragraph-4">{{ $item['para'] }}</p>
                                            <div class="tab-bottom-content">
                                                <div class="tab-icon">
                                                    <img loading="lazy" src="/images/63ba665ae3ca2addb4de3b39_arrow-right.svg" alt="" class="event-icon"/>
                                                </div>
                                            </div>
                                            <div class="event-bg-color"></div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-image hr">
                <img src="/images/63bbae2c7fceb06f9c64977a_Frame.png" loading="lazy" alt=""/>
            </div>
        </div>
        <!-- ══ News & Articles ══ -->
        <div class="research-area wf-section">
            <div class="container overflow-visible">
                <div class="section-cotent-wrap">
                    <h2 class="section-title dark m-bottom mb-30">{!! __('pages.index.news2_heading') !!}</h2>
                    <p data-anim="fade-up" class="banner-paragraph dark">{{ __('pages.index.news2_para') }}</p>
                </div>
                <div class="swiper-container">
                    <div class="news-post-wrap swiper-wrapper">
                        @foreach($news2Items as $title)
                        <div data-anim="fade-right" class="news-single-item swiper-slide">
                            <div class="tab-bottom-content">
                                <a href="#" class="category-button w-button">{{ __('pages.index.news2_badge') }}</a>
                                <div class="tab-icon">
                                    <img src="/images/63bbb866b73c8bdd202094fc_arrow-right.svg" loading="lazy" alt=""/>
                                </div>
                            </div>
                            <h3 class="tab-content-title style-01">{{ $title }}</h3>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- ══ Advantages ══ -->
        <div class="academic-programs-area wf-section">
            <div class="container">
                <div class="section-cotent-wrap grid-item mb-100">
                    <div class="grid-one">
                        <p class="section-paragraph" style="color:#fca206;">{{ __('pages.index.adv_label') }}</p>
                    </div>
                    <div class="grid-two">
                        <h2 data-anim="fade-up" class="section-title dark">{{ __('pages.index.adv_h1') }}</h2>
                        <h2 data-anim="fade-up" class="section-title dark">{{ __('pages.index.adv_h2') }}</h2>
                    </div>
                </div>
                <div class="tab-content-wrap">
                    @foreach($advItems as $adv)
                    <div data-anim="fade-right" class="tab-content-item" data-tilt>
                        <div class="ripple-div-two"></div>
                        <div class="tab-content">
                            <h3 class="tab-content-title">{{ $adv['title'] }}</h3>
                            <div class="tab-bottom-content">
                                <a href="#" class="category-button w-button">{{ $adv['label'] }}</a>
                                <div class="tab-icon">
                                    <img loading="lazy" src="/images/63ba665ae3ca2addb4de3b39_arrow-right.svg" alt="" class="image-icon"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
<x-footer />
@endsection
