        <style>
            .footer-content-wrap {
                grid-template-columns: 1fr 1fr 1fr 1fr auto !important;
            }
            .footer-menu-title,
            a.footer-menu-title { display: block;  text-decoration: none; color: #fca206; }
            a.footer-menu-title:hover { color: #fca206; }
            .footer-contact-list { display: flex; flex-direction: column; gap: 14px; margin-top: 4px; }
            .footer-contact-list a,
            .footer-contact-list span {
                color: hsla(0, 0%, 100%, 0.8);
                font-size: 16px;
                line-height: 1.5;
                text-decoration: none;
                transition: color .2s;
            }
            .footer-contact-list a:hover { color: #fca206; }
            @media (max-width: 767px) {
                .footer-content-wrap {
                    grid-template-columns: 1fr 1fr !important;
                    grid-column-gap: 24px;
                    padding-bottom: 48px;
                }
                .footer-content-wrap .footer-nav:last-child {
                    grid-column: 1 / -1;
                    display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    gap: 12px;
                    align-items: center;
                }
                .footer-content-wrap .footer-nav:last-child .nav-ink-2 {
                    flex: 1 1 calc(50% - 6px);
                    min-width: 120px;
                }
                .copyright-content {
                    flex-direction: column;
                    gap: 20px;
                    text-align: center;
                    padding-top: 24px;
                    padding-bottom: 24px;
                }
                .footer-logo {
                    justify-content: center;
                }
                .social {
                    justify-content: center;
                }
                .copyright-text {
                    font-size: 12px;
                    line-height: 1.6;
                }
            }
            @media (max-width: 480px) {
                .footer-content-wrap {
                    grid-template-columns: 1fr !important;
                    padding-bottom: 40px;
                }
                .footer-content-wrap .footer-nav:last-child {
                    grid-column: auto;
                }
                .footer-area {
                    padding-top: 60px;
                }
            }
        </style>
        @php
            $footerCols = [
                [
                    'title' => __('nav.about'),
                    'url'   => route('about'),
                    'links' => [
                        [__('nav.mission'),            route('mission')],
                        [__('nav.administration'),     route('administration')],
                        [__('nav.teachers'),           route('teachers')],
                        [__('nav.self_assessment'),    route('self-assessment')],
                        [__('nav.attestation'),        route('attestation')],
                    ],
                ],
                [
                    'title' => __('nav.education'),
                    'url'   => route('education'),
                    'links' => [
                        [__('nav.curriculum'), route('curriculum')],
                        [__('nav.schedule'),   route('schedule')],
                        [__('nav.clil'),       route('clil')],
                        [__('nav.clubs'),      route('clubs')],
                    ],
                ],
                [
                    'title' => __('footer.info'),
                    'url'   => null,
                    'links' => [
                        [__('nav.news'),      route('news')],
                        [__('nav.gallery'),   route('gallery')],
                        [__('nav.cafeteria'), route('cafeteria')],
                        [__('nav.faq'),       route('faq')],
                    ],
                ],
            ];
        @endphp
        <div class="footer-area wf-section">
            <div class="container">
                <div class="footer-content-wrap">
                    @foreach($footerCols as $col)
                    <div data-anim="fade-up" class="footer-nav">
                        @if($col['url'])
                            <a href="{{ $col['url'] }}" class="footer-menu-title">{{ $col['title'] }}</a>
                        @else
                            <h2 class="footer-menu-title">{{ $col['title'] }}</h2>
                        @endif
                        <div class="nav mod--footer">
                            @foreach($col['links'] as [$label, $url])
                            <div class="overflow-hidden">
                                <a data-btn="" href="{{ $url }}" class="nav-ink anim-scroll-up w-inline-block">
                                    <div class="overflow-hidden"><div class="overflow-anim mod--btn-text">
                                        <div class="btn__text">{{ $label }}</div>
                                        <div class="btn__text mod--absolute">{{ $label }}</div>
                                    </div></div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    <div data-anim="fade-up" class="footer-nav">
                        <a href="{{ route('contacts') }}" class="footer-menu-title">{{ __('nav.contacts') }}</a>
                        <div class="footer-contact-list">
                            <a href="tel:+77711353033">+7 771 135 30 33</a>
                            <a href="mailto:parasataj@gmail.com">parasataj@gmail.com</a>
                            <span>{{ __('footer.hours') }}</span>
                            <span>{{ __('footer.address') }}</span>
                        </div>
                    </div>
                    <div class="footer-nav">
                        <a data-anim-btn="" href="{{ route('contacts') }}" class="nav-ink-2 mod--register mb-20 w-inline-block">
                            <div class="footer-button-text">{{ __('footer.cta_enroll') }}</div>
                            <div class="btn-shape"></div>
                        </a>
                        <a data-anim-btn="" href="{{ route('vacancies') }}" class="nav-ink-2 mod--register mb-20 w-inline-block">
                            <div class="footer-button-text">{{ __('nav.vacancies') }}</div>
                            <div class="btn-shape"></div>
                        </a>
                        <a data-anim-btn="" href="mailto:parasataj@gmail.com" class="nav-ink-2 mod--register w-inline-block">
                            <div class="footer-button-text">{{ __('footer.cta_contact') }}</div>
                            <div class="btn-shape"></div>
                        </a>
                    </div>
                </div>
                <div class="copyright-content">
                    <div class="footer-logo">
                        <a href="{{ route('home') }}">
                            <img src="/images/parasat/parasat-logo.png" loading="lazy" alt="Parasat Ақжайық" class="image-11"/>
                        </a>
                    </div>
                    <p class="copyright-text">© {{ date('Y') }} Parasat Ақжайық &nbsp;|&nbsp; {{ __('footer.rights') }}</p>
                    <div class="social anim-scroll-up">
                        <a data-btn-social="" href="https://www.facebook.com/" target="_blank" rel="noopener" class="social-link w-inline-block">
                            <img src="/images/63cf51299bfd707664bcc8d3_ico_soc-fb.svg" loading="eager" alt="Facebook" class="social-ico"/>
                            <div class="social-bg"></div>
                        </a>
                        <a data-btn-social="" href="https://www.instagram.com/" target="_blank" rel="noopener" class="social-link w-inline-block">
                            <img src="/images/63cf51299bfd701687bcc8d1_ico_soc-inst.svg" loading="eager" alt="Instagram" class="social-ico"/>
                            <div class="social-bg"></div>
                        </a>
                        <a data-btn-social="" href="https://www.youtube.com/" target="_blank" rel="noopener" class="social-link w-inline-block">
                            <img src="/images/63cf51299bfd70b299bcc8d2_ico_soc-in.svg" loading="eager" alt="YouTube" class="social-ico"/>
                            <div class="social-bg"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="courser-area clickable-off">
                <div class="courser-wrap">
                    <div class="cursor-text">{{ __('footer.drag') }}</div>
                </div>
            </div>
        </div>
