<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <title>Parasat Ақжайық — Жеке меншік орта мектебі</title>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <link rel="manifest" href="/site.webmanifest" />
        <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <meta name="apple-mobile-web-app-title" content="Parasat" />
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
        <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300;400;500;600;700;800&family=Carlito:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet"/>
        <style>
            h1, h2, h3, h4, h5, h6 { font-family: 'Carlito', sans-serif !important; }

            /* Ripple / event-bg скрыты по умолчанию, появляются на hover */
            .ripple-div,
            .ripple-div-two,
            .event-bg-color { transform: scale(0); transition: transform 0.5s cubic-bezier(0, 0.37, 0.27, 0.995); }

            .tab-content-item:hover   .ripple-div-two { transform: scale(1); }
            .event-tab-content-item:hover .event-bg-color { transform: scale(1); }
            .primary-button:hover     .ripple-div     { transform: scale(1); }

            /* Текст белый при hover */
            .tab-content-item:hover *,
            .event-tab-content-item:hover * { color: #fff !important; border-color: #fff !important; }
            .tab-content-item:hover img,
            .event-tab-content-item:hover img { filter: invert(1) !important; }

            /* ── Выпадающее меню ── */
            .nav-dropdown { position: relative; }
            .nav-dropdown-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 50%;
                transform: translateX(-50%);
                background: #fff;
                min-width: 220px;
                box-shadow: 0 12px 32px rgba(1,44,104,.15);
                border-radius: 6px;
                padding: 12px 0 8px;
                z-index: 1000;
            }
            .nav-dropdown:hover .nav-dropdown-menu { display: block; }
            .nav-dropdown-menu a {
                display: block;
                padding: 10px 20px;
                color: #012c68 !important;
                font-size: 13px;
                text-decoration: none;
                line-height: 1.4;
                letter-spacing: 0.5px;
                transition: background 150ms;
            }
            .nav-dropdown-menu a:hover { background: #f0f4ff; color: #fca206 !important; }
            .nav-dropdown-arrow { font-size: 14px; margin-left: 5px; opacity: 0.85; vertical-align: middle; line-height: 1; display: inline-block; }

            /* Мобильное подменю */
            @media screen and (max-width: 991px) {
                .nav-link {
                    text-align:left;
                }
                .nav-dropdown-menu {
                    display: block;
                    position: static;
                    transform: none;
                    box-shadow: none;
                    border-radius: 0;
                    background: #012c68;
                    padding: 0 0 4px 12px;
                }
                .nav-dropdown-menu a { text-align:left; color: #fff !important; font-size: 13px; padding: 7px 16px; }
            }

            /* ── Плавный переход баннер → О школе ── */
            .about-section {
                background-color: #fff !important;
                border-radius: 48px 48px 0 0;
                margin-top: -48px;
                position: relative;
                z-index: 2;
                padding-top: 80px !important;
            }
            /* Текст в about-section меняем на тёмный */
            .about-section .section-paragraph { color: #fca206 !important; }
            .about-section .section-title { color: #012c68 !important; }
            .about-section .uv-thumbnail-title { color: #fff !important; }
        </style>
        <!--[if lt IE 9]><script src="/js/html5shiv.min.js" type="text/javascript"></script><![endif]-->
        <script>if('ontouchstart'in window)document.documentElement.classList.add('w-mod-touch')</script>
        <link href="{{ asset('images/63c8e36f975f813627d14e24_Frame%2037.png') }}" rel="shortcut icon" type="image/x-icon"/>
        <link href="{{ asset('images/63c8d06525c83608dae4874e_musemind-loog.png') }}" rel="apple-touch-icon"/>
        <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}"/>
        @yield('styles')
    </head>
    <body class="body">
        @yield('content')

        <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
        <script type="text/javascript">

            document.addEventListener("DOMContentLoaded", function() {

                var mySwiper = new Swiper('.research-slider-container',{

                    slidesPerView: 'auto',
                    spaceBetween: 50,
                    freeMode: true,
                    freeModeSticky: true,
                    navigation: {
                        loop: true,
                    },
                    breakpoints: {
                        1200: {
                            slidesPerView: 'auto',
                        },
                        1024: {
                            spaceBetween: 30,
                        },
                        768: {
                            spaceBetween: 30,
                            slidesPerView: 2
                        },
                        500: {
                            spaceBetween: 15,
                            slidesPerView: 2
                        },
                        360: {
                            slidesPerView: 1
                        }

                    }

                });

                var mySwiper = new Swiper('.swiper-container',{

                    slidesPerView: 'auto',
                    spaceBetween: 50,
                    freeMode: true,
                    freeModeSticky: true,
                    navigation: {
                        loop: true,
                    },
                    breakpoints: {
                        1200: {
                            slidesPerView: 'auto',
                        },
                        1024: {
                            spaceBetween: 30,
                        },
                        768: {
                            spaceBetween: 30,
                            slidesPerView: 2
                        },
                        500: {
                            spaceBetween: 15,
                            slidesPerView: 2
                        },
                        360: {
                            slidesPerView: 1
                        }

                    }

                });

            });
        </script>
            <script src="{{ asset('js/animate.js') }}"></script>
        <script>
            /* Tab switcher */
            document.querySelectorAll('.w-tab-link').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var tabGroup = this.closest('.w-tabs');
                    var tabId = this.getAttribute('data-w-tab');
                    tabGroup.querySelectorAll('.w-tab-link').forEach(function(l) { l.classList.remove('w--current'); });
                    this.classList.add('w--current');
                    tabGroup.querySelectorAll('.w-tab-pane').forEach(function(p) { p.classList.remove('w--tab-active'); });
                    var pane = tabGroup.querySelector('.w-tab-pane[data-w-tab="' + tabId + '"]');
                    if (pane) pane.classList.add('w--tab-active');
                });
            });
        </script>
    </body>
</html>
