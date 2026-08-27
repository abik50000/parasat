/**
 * animate.js — лёгкая замена Webflow.js
 *
 * Как использовать на любой странице:
 *
 *  Scroll-reveal:   data-anim="fade-up | fade-down | fade-left | fade-right | scale-in | zoom-in | slide-right"
 *                   data-anim-delay="200"      — задержка в мс (опционально)
 *                   data-anim-duration="800"   — длительность в мс (по умолчанию 700)
 *
 *  Stagger-анимация дочерних элементов:
 *                   data-anim-stagger="fade-up"  — на родителе, дети получат поочерёдную задержку
 *                   data-anim-stagger-gap="120"  — задержка между детьми в мс (по умолчанию 100)
 *
 *  Параллакс-тилт на карточках:
 *                   data-tilt  — добавить на карточку
 *                   data-tilt-strength="10"  — сила наклона в градусах (по умолчанию 8)
 *
 *  Табы:            добавить на .w-tabs, ссылки .w-tab-link[data-w-tab], панели .w-tab-pane[data-w-tab]
 *
 *  Nav бургер-меню: работает автоматически через .w-nav, .w-nav-button, .w-nav-menu
 */
(function () {
  var EASING = 'cubic-bezier(0, 0.37, 0.27, 0.995)';
  var DEFAULT_DUR = 700;

  var INIT_STYLES = {
    'fade-up':     { transform: 'translateY(60px)',  opacity: '0' },
    'fade-down':   { transform: 'translateY(-50px)', opacity: '0' },
    'fade-left':   { transform: 'translateX(-80px)', opacity: '0' },
    'fade-right':  { transform: 'translateX(80px)',  opacity: '0' },
    'scale-in':    { transform: 'scale(0.1)',        opacity: '0' },
    'zoom-in':     { transform: 'scale(0.9)',        opacity: '1' },
    'slide-right': { transform: 'translateX(120px)', opacity: '0' },
  };

  // ── Scroll reveal ──────────────────────────────────────────────────────────

  function applyInitial(el, type) {
    var s = INIT_STYLES[type];
    if (!s) return;
    el.style.transform = s.transform;
    el.style.opacity   = s.opacity;
    el.style.willChange = 'transform, opacity';
  }

  function reveal(el, dur, delay) {
    el.style.transition =
      'transform ' + dur + 'ms ' + EASING + ' ' + delay + 'ms, ' +
      'opacity '   + dur + 'ms ' + EASING + ' ' + delay + 'ms';
    el.style.transform = '';
    el.style.opacity   = '';
    el.addEventListener('transitionend', function () {
      el.style.willChange = '';
    }, { once: true });
  }

  function initScrollReveal() {
    // Распределить stagger-задержку на дочерние элементы
    document.querySelectorAll('[data-anim-stagger]').forEach(function (parent) {
      var type = parent.dataset.animStagger || 'fade-up';
      var gap  = parseInt(parent.dataset.animStaggerGap || 100);
      var baseDelay = parseInt(parent.dataset.animDelay || 0);
      Array.from(parent.children).forEach(function (child, i) {
        if (!child.dataset.anim) child.setAttribute('data-anim', type);
        var existing = parseInt(child.dataset.animDelay || 0);
        child.setAttribute('data-anim-delay', baseDelay + existing + i * gap);
      });
    });

    var els = document.querySelectorAll('[data-anim]');
    if (!els.length) return;

    els.forEach(function (el) {
      applyInitial(el, el.dataset.anim);
    });

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el  = entry.target;
        var dur = parseInt(el.dataset.animDuration || DEFAULT_DUR);
        var delay = parseInt(el.dataset.animDelay || 0);
        reveal(el, dur, delay);
        observer.unobserve(el);
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

    els.forEach(function (el) { observer.observe(el); });
  }

  // ── Tabs ───────────────────────────────────────────────────────────────────

  function initTabs() {
    document.querySelectorAll('.w-tabs').forEach(function (tabs) {
      // Only direct children panes — avoids picking up nested .w-tabs panes
      var content = tabs.querySelector('.w-tab-content');
      var links   = tabs.querySelectorAll('.w-tab-menu .w-tab-link');
      var panes   = content ? content.querySelectorAll(':scope > .w-tab-pane') : [];

      // Add fade transition to each pane
      Array.from(panes).forEach(function (p) {
        p.style.transition = 'opacity 0.25s ease';
      });

      function activate(name) {
        links.forEach(function (l) {
          l.classList.toggle('w--current', l.dataset.wTab === name);
        });
        Array.from(panes).forEach(function (p) {
          var match = p.dataset.wTab === name;
          if (match) {
            p.style.opacity = '0';
            p.classList.add('w--tab-active');
            // Force reflow so opacity 0 → 1 transition fires
            void p.offsetWidth;
            p.style.opacity = '1';
          } else {
            p.classList.remove('w--tab-active');
            p.style.opacity = '';
          }
        });
      }

      links.forEach(function (link) {
        link.addEventListener('click', function (e) {
          e.preventDefault();
          activate(link.dataset.wTab);
        });
      });
    });
  }

  // ── Nav бургер ────────────────────────────────────────────────────────────

  function initNav() {
    document.querySelectorAll('.w-nav').forEach(function (nav) {
      var btn  = nav.querySelector('.w-nav-button');
      var menu = nav.querySelector('.w-nav-menu');
      if (!btn || !menu) return;

      btn.addEventListener('click', function () {
        var open = btn.classList.toggle('w--open');
        menu.classList.toggle('w--open', open);
        nav.classList.toggle('w--open', open);
        btn.setAttribute('aria-expanded', open);
      });

      menu.querySelectorAll('a').forEach(function (a) {
        a.addEventListener('click', function () {
          btn.classList.remove('w--open');
          menu.classList.remove('w--open');
          nav.classList.remove('w--open');
          btn.setAttribute('aria-expanded', false);
        });
      });
    });
  }

  // ── Tilt-параллакс на карточках ───────────────────────────────────────────

  function initTilt() {
    document.querySelectorAll('[data-tilt]').forEach(function (el) {
      var strength = parseFloat(el.dataset.tiltStrength || 8);
      var raf;

      el.addEventListener('mousemove', function (e) {
        cancelAnimationFrame(raf);
        raf = requestAnimationFrame(function () {
          var rect = el.getBoundingClientRect();
          var rx = ((e.clientY - rect.top  - rect.height / 2) / (rect.height / 2)) * -strength;
          var ry = ((e.clientX - rect.left - rect.width  / 2) / (rect.width  / 2)) *  strength;
          el.style.transition = 'transform 0.1s linear';
          el.style.transform = 'perspective(700px) rotateX(' + rx + 'deg) rotateY(' + ry + 'deg)';
        });
      });

      el.addEventListener('mouseleave', function () {
        cancelAnimationFrame(raf);
        el.style.transition = 'transform 0.5s ease';
        el.style.transform  = '';
      });
    });
  }

  // ── Scroll-driven анимации (непрерывные при прокрутке) ───────────────────
  //
  //  data-scroll-zoom      — img: scale 1.3→1.0→1.3 пока секция в вьюпорте
  //  data-scroll-reveal    — секция: scale 0.9→1 + translateY 40→0 при входе
  //  data-scroll-zoom-wave — контейнер: img внутри scale 1→1.2→1 (16/50/77%)

  function lerp(a, b, t) { return a + (b - a) * Math.max(0, Math.min(1, t)); }

  function scrollProgress(el) {
    var rect = el.getBoundingClientRect();
    var vh   = window.innerHeight;
    return (vh - rect.top) / (vh + rect.height);
  }

  // Интерполяция по произвольным keyframe-ам [{p, v}, ...]
  function interpKF(kf, p) {
    if (p <= kf[0].p) return kf[0].v;
    if (p >= kf[kf.length - 1].p) return kf[kf.length - 1].v;
    for (var i = 0; i < kf.length - 1; i++) {
      if (p >= kf[i].p && p <= kf[i + 1].p) {
        var t = (p - kf[i].p) / (kf[i + 1].p - kf[i].p);
        return kf[i].v + (kf[i + 1].v - kf[i].v) * t;
      }
    }
    return kf[0].v;
  }

  // keyframes для uv-фото: 16%→1.0, 50%→1.2, 77%→1.0
  var UV_KF = [{ p: 0.16, v: 1.0 }, { p: 0.50, v: 1.2 }, { p: 0.77, v: 1.0 }];

  function initScrollDriven() {
    var zoomEls     = Array.from(document.querySelectorAll('[data-scroll-zoom]'));
    var revealEls   = Array.from(document.querySelectorAll('[data-scroll-reveal]'));
    var waveWraps   = Array.from(document.querySelectorAll('[data-scroll-zoom-wave]'));

    if (!zoomEls.length && !revealEls.length && !waveWraps.length) return;

    // Собрать пары [контейнер, [img...]] для wave-zoom
    var wavePairs = waveWraps.map(function (wrap) {
      return { wrap: wrap, imgs: Array.from(wrap.querySelectorAll('img')) };
    });

    // data-scroll-reveal: начальное состояние
    revealEls.forEach(function (el) {
      el.style.transform  = 'scale(0.9) translateY(40px)';
      el.style.opacity    = '0.3';
      el.style.willChange = 'transform, opacity';
    });

    var raf;
    function onScroll() {
      cancelAnimationFrame(raf);
      raf = requestAnimationFrame(function () {

        // campus-zoom: scale 1.3→1.0→1.3
        zoomEls.forEach(function (el) {
          var p = scrollProgress(el);
          var s = p < 0.5 ? lerp(1.3, 1.0, p * 2) : lerp(1.0, 1.3, (p - 0.5) * 2);
          el.style.transform = 'scale(' + s.toFixed(4) + ')';
        });

        // reveal-секция: scale 0.9→1, translateY 40→0, opacity 0.3→1
        revealEls.forEach(function (el) {
          var p = scrollProgress(el);
          var t = Math.max(0, Math.min(1, p / 0.45));
          var s = lerp(0.9, 1.0, t);
          var y = lerp(40, 0, t);
          var o = lerp(0.3, 1.0, t);
          el.style.transform = 'scale(' + s.toFixed(4) + ') translateY(' + y.toFixed(1) + 'px)';
          el.style.opacity   = o.toFixed(3);
        });

        // uv-фото wave-zoom: scale 1→1.2→1 по keyframes
        wavePairs.forEach(function (pair) {
          var p = scrollProgress(pair.wrap);
          var s = interpKF(UV_KF, p);
          pair.imgs.forEach(function (img) {
            img.style.transform = 'scale(' + s.toFixed(4) + ')';
          });
        });

      });
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  // ── Запуск ────────────────────────────────────────────────────────────────

  function init() {
    initScrollReveal();
    initTabs();
    initNav();
    initTilt();
    initScrollDriven();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
