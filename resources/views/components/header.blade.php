        <div class="w-embed">
            <style>
                /* ── Мобильная навигация ── */
                @media screen and (max-width: 991px) {
                    .w-nav-menu.w--open {
                        display: block !important;
                        position: fixed;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background: #012c68;
                        z-index: 9999;
                        padding: 90px 32px 40px;
                        overflow-y: auto;
                    }
                    .w-nav-menu.w--open .nav-menu {
                        display: flex;
                        flex-direction: column;
                        gap: 0;
                        align-items: flex-start;
                    }
                    .w-nav-menu.w--open .nav-menu li {
                        border-bottom: 1px solid rgba(255,255,255,0.1);
                    }
                    .w-nav-menu.w--open .nav-link {
                        display: block;
                        padding: 18px 0;
                        color: #fff !important;
                        font-size: 22px;
                        line-height: 1.2;
                        text-decoration: none;
                        transition: color 0.2s;
                    }
                    .w-nav-menu.w--open .nav-link:hover {
                        color: #fca206 !important;
                    }
                    .w-nav-menu.w--open .nav-dropdown-menu {
                        padding: 0 0 12px 16px;
                        display: flex;
                        flex-direction: column;
                        gap: 4px;
                    }
                    .w-nav-menu.w--open .nav-dropdown-menu a {
                        color: #fff;
                        font-size: 16px;
                        padding: 8px 0;
                        text-decoration: none;
                        transition: color 0.2s;
                    }
                    .w-nav-menu.w--open .nav-dropdown-menu a:hover {
                        color: #fca206;
                    }
                    .w-nav-menu.w--open .lang-switcher-mobile {
                        margin-top: 32px;
                        display: flex;
                        gap: 8px;
                    }
                }

                /* Snippet prevents all click and hover interaction with an element */
                .clickable-off {
                    pointer-events: none;
                }

                /* Snippet enables all click and hover interaction with an element */
                .clickable-on {
                    pointer-events: auto;
                }

                .cursor-off {
                    cursor: none;
                }

                [data-btn]:hover .overflow-anim.mod--btn-text {
                    top: 3em;
                }

                [data-btn]:hover .img.mod--nav {
                    transform: scale(1);
                }

                .marquee_track {
                    white-space: nowrap;
                    will-change: transform;
                    animation: marquee 17s linear infinite;
                }

                @keyframes marquee {
                    from {
                        transform: translateX(0);
                    }

                    to {
                        transform: translateX(-50%);
                    }
                }

                .social-link:hover img {
                    filter: invert(0) brightness(1);
                }

                .social-link:hover .social-bg {
                    transform: scale(1);
                }

                @media only screen and (min-device-width: 1024px) and (max-device-width: 1024px) and (orientation: portrait) and (-webkit-min-device-pixel-ratio: 2) {
                    .banner-title {
                        font-size: 70px;
                        line-height: 80px;
                    }

                    .section-title {
                        font-size: 48px;
                        line-height: 58px;
                    }

                    .desktop-logo {
                        max-width: 60%;
                    }

                    .nav-link {
                        font-size: 16px;
                        line-height: 26px;
                    }

                    .menu-icon-box {
                        width: 40px;
                        height: 40px;
                    }

                    .tab-content-title {
                        font-size: 24px;
                        padding-bottom: 90px;
                    }

                    .tab-content-item-wrap {
                        padding: 30px 20px;
                    }

                    .tab-icon {
                        width: 45px;
                        height: 45px;
                    }

                    img.event-icon {
                        width: 25px;
                    }

                    .tabs-menu {
                        padding-bottom: 50px;
                    }

                    .academic-tabs-item-wrap {
                        margin-top: 50px;
                    }

                    .count-paragraph {
                        font-size: 16px;
                    }

                    .count-number-title {
                        font-size: 50px;
                    }

                    .count-title {
                        font-size: 32px;
                    }

                    .event-tab-content-item {
                        padding: 30px;
                    }

                    .tab-content-title.style-01 {
                        width: 350px;
                    }

                    .news-single-item {
                        margin-right: 30px;
                    }

                    .category-button {
                        padding: 10px 28px;
                        font-size: 24px;
                    }

                    .event-category-button {
                        padding: 10px 28px;
                        font-size: 24px;
                    }

                    .tab-link {
                        font-size: 40px;
                    }

                    .image-icon {
                        width: 25px;
                    }

                    .speaker-slide-mask {
                        overflow: visible;
                        width: 480px
                    }

                    .news-single-item, .research-post-item {
                        max-width: 450px;
                    }

                    .researc-item-title {
                        font-size: 34px;
                    }

                    .btn__text {
                        font-size: 16px;
                    }

                    .nav-ink-2.mod--register {
                        width: 200px;
                        height: 55px;
                    }

                    .footer-content-wrap {
                        grid-column-gap: 40px;
                    }

                    .footer-button-text {
                        font-size: 16px;
                    }

                    .primary-button {
                        padding: 20px 40px;
                    }

                    .primary-button-text {
                        font-size: 16px;
                    }

                    .testimonial-wrap-div-two {
                        margin-top: -470px;
                    }

                    .section-title-wrap {
                        margin-bottom: 30px;
                    }

                    .testimonial-single-item.dark {
                        min-height: 335px;
                        min-width: 340px;
                    }

                    .testimonial-single-item {
                        padding: 30px;
                    }

                    .testimonial-area {
                        max-height: 1060px;
                    }

                    .section-title.style-01 {
                        max-width: 350px;
                    }

                    .tab-content-title.style-01 {
                        padding-top: 120px;
                    }

                    .paragraph-4 {
                        margin-bottom: 40px;
                    }

                    .testimonial-author-quote {
                        font-size: 18px;
                        margin-bottom: 120px;
                        max-width: 280px;
                    }
                }
                .nav-dropdown-arrow {
                    position: relative;
                    top: -4px;
                }

                @media screen and (max-width: 991px) {
                    .menu-button.w-nav-button {
                        position: relative;
                        z-index: 10000;
                        color: #fff;
                    }
                    .w-icon-nav-menu {
                        color: #fff;
                    }
                }
            </style>
        </div>
        <div class="navbar-no-shadow wf-section">
            <div role="banner" class="navbar-no-shadow-container w-nav" data-collapse="medium">
                <div class="container-regular">
                    <div class="navbar-wrapper">
                        <a href="/" class="navbar-brand w-nav-brand">
                            <img data-anim="fade-right" src="/images/parasat/parasat-logo.png" loading="lazy" alt="" class="desktop-logo"/>
                            <img src="/images/parasat/parasat-logo.png" loading="lazy" alt="" class="mobile-logo"/>
                        </a>
                        <nav data-anim="fade-downs" role="navigation" class="nav-menu-wrapper w-nav-menu">
                            <ul role="list" class="nav-menu w-list-unstyled">
                                <li>
                                    <a href="{{ route('home') }}" class="nav-link">{{ __('nav.home') }}</a>
                                </li>
                                <li class="nav-dropdown">
                                    <a href="{{ route('about') }}" class="nav-link">{{ __('nav.about') }} <span class="nav-dropdown-arrow">▾</span></a>
                                    <div class="nav-dropdown-menu">
                                        <a href="{{ route('administration') }}">{{ __('nav.administration') }}</a>
                                        <a href="{{ route('teachers') }}">{{ __('nav.teachers') }}</a>
                                        <a href="{{ route('contacts') }}">{{ __('nav.contacts') }}</a>
                                    </div>
                                </li>
                                <li class="nav-dropdown">
                                    <a href="{{ route('education') }}" class="nav-link">{{ __('nav.education') }} <span class="nav-dropdown-arrow">▾</span></a>
                                    <div class="nav-dropdown-menu">
                                        <a href="{{ route('curriculum') }}">{{ __('nav.curriculum') }}</a>
                                        <a href="{{ route('schedule') }}">{{ __('nav.schedule') }}</a>
                                        <a href="{{ route('clil') }}">{{ __('nav.clil') }}</a>
                                        <a href="{{ route('clubs') }}">{{ __('nav.clubs') }}</a>
                                        <a href="{{ route('assessment-schedule') }}">{{ __('nav.assessment') }}</a>
                                        <a href="{{ route('ent-results') }}">{{ __('nav.ent') }}</a>
                                        <a href="{{ route('cafeteria') }}">{{ __('nav.cafeteria') }}</a>
                                        <a href="{{ route('vacancies') }}" class="lg:hidden">{{ __('nav.vacancies') }}</a>
                                        <a href="{{ route('faq') }}" class="lg:hidden">{{ __('nav.faq') }}</a>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{ route('news') }}" class="nav-link">{{ __('nav.news') }}</a>
                                </li>
                               
                                <li>
                                    <a href="{{ route('vacancies') }}" class="nav-link max-lg:hidden">{{ __('nav.vacancies') }}</a>
                                </li>
                                <li class="list-item-6">
                                    <a href="{{ route('faq') }}" class="nav-link max-lg:hidden">{{ __('nav.faq') }}</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="lang-switcher" data-anim="fade-left" style="display:flex;align-items:center;gap:2px;margin-left:16px;">
                            @foreach(['kz' => 'ҚАЗ', 'ru' => 'РУС', 'en' => 'ENG'] as $code => $label)
                            <a href="{{ route('lang.switch', $code) }}"
                               style="padding:6px 10px;border-radius:6px;font-size:12px;font-weight:600;letter-spacing:0.5px;text-decoration:none;transition:background .15s,color .15s;
                                      {{ app()->getLocale() === $code
                                          ? 'background:#fca206;color:#fff;'
                                          : 'background:transparent;color:#fff;' }}">
                                {{ $label }}
                            </a>
                            @endforeach
                        </div>

                        <div class="menu-button w-nav-button">
                            <div class="w-icon-nav-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
