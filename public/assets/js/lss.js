(function () {
    'use strict';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var loader = document.getElementById('loader');
    if (loader && document.documentElement.classList.contains('lss-intro') && !reduced) {
        window.addEventListener('load', function () {
            setTimeout(function () {
                loader.classList.add('hide');
                setTimeout(function () { loader.remove(); }, 800);
            }, 1450);
        });
        setTimeout(function () {
            if (loader && !loader.classList.contains('hide')) loader.classList.add('hide');
        }, 4000);
    } else if (loader) {
        loader.remove();
    }

    var header = document.querySelector('.header');
    if (header) {
        var onScrollHeader = function () {
            header.classList.toggle('scrolled', window.scrollY > 10);
        };
        window.addEventListener('scroll', onScrollHeader, { passive: true });
        onScrollHeader();
    }

    var toggle = document.querySelector('.menu-toggle');
    if (toggle) {
        toggle.addEventListener('click', function () {
            document.body.classList.toggle('nav-open');
        });
        document.querySelectorAll('.mobile-nav a').forEach(function (a) {
            a.addEventListener('click', function () {
                document.body.classList.remove('nav-open');
            });
        });
    }

    var pt = document.getElementById('pageTransition');
    if (pt && !reduced) {
        document.addEventListener('click', function (e) {
            var link = e.target.closest('a[href]');
            if (!link) return;
            var href = link.getAttribute('href');
            if (!href || href.charAt(0) === '#' || href.indexOf('mailto') === 0 ||
                href.indexOf('http') === 0 || link.target === '_blank' ||
                e.metaKey || e.ctrlKey || e.shiftKey) return;
            e.preventDefault();
            var dest = link.href;
            pt.classList.add('exit');
            setTimeout(function () { window.location.href = dest; }, 460);
        });

        window.addEventListener('pageshow', function (e) {
            if (e.persisted) pt.classList.remove('exit');
        });
    }

    var revealEls = document.querySelectorAll('.reveal, .reveal-img, .reveal-line');
    if (reduced) {
        revealEls.forEach(function (el) { el.classList.add('visible'); });
    } else if ('IntersectionObserver' in window && revealEls.length) {
        var obs = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -4% 0px' });
        revealEls.forEach(function (el) { obs.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('visible'); });
    }

    var pEls = document.querySelectorAll('[data-parallax]');
    if (pEls.length && !reduced) {
        var ticking = false;
        var applyParallax = function () {
            var y = window.scrollY;
            pEls.forEach(function (el) {
                var f = parseFloat(el.dataset.parallax) || 0.3;
                el.style.transform = 'translate3d(0,' + (y * f) + 'px,0)';
            });
            ticking = false;
        };
        window.addEventListener('scroll', function () {
            if (!ticking) {
                requestAnimationFrame(applyParallax);
                ticking = true;
            }
        }, { passive: true });
    }
})();
