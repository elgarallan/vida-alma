/* Vida Alma — site interactions */
(function () {
    'use strict';

    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- Header shadow on scroll ---------- */
    const header = document.querySelector('[data-header]');
    if (header) {
        const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 8);
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    /* ---------- Mobile navigation ---------- */
    const toggle = document.querySelector('[data-nav-toggle]');
    const nav = document.querySelector('[data-nav]');
    if (toggle && nav) {
        const setOpen = (open) => {
            toggle.setAttribute('aria-expanded', String(open));
            nav.classList.toggle('is-open', open);
        };
        toggle.addEventListener('click', () => setOpen(toggle.getAttribute('aria-expanded') !== 'true'));
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && nav.classList.contains('is-open')) {
                setOpen(false);
                toggle.focus();
            }
        });
        document.addEventListener('click', (e) => {
            if (nav.classList.contains('is-open') && !nav.contains(e.target) && !toggle.contains(e.target)) {
                setOpen(false);
            }
        });
        window.matchMedia('(min-width: 961px)').addEventListener('change', (e) => e.matches && setOpen(false));
    }

    /* ---------- Reveal on scroll + number count-up ---------- */
    const animateCount = (el) => {
        const target = parseInt(el.dataset.count, 10) || 0;
        const suffix = el.dataset.suffix || '';
        const format = (n) => n.toLocaleString('en-US') + suffix;
        if (reduceMotion) { el.textContent = format(target); return; }
        const duration = 1600;
        const start = performance.now();
        const tick = (now) => {
            const t = Math.min(1, (now - start) / duration);
            const eased = 1 - Math.pow(1 - t, 3);
            el.textContent = format(Math.round(target * eased));
            if (t < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
    };

    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                entry.target.querySelectorAll('[data-count]').forEach(animateCount);
                io.unobserve(entry.target);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll('.reveal').forEach((el, i) => {
            // Stagger siblings slightly for a softer entrance.
            const siblings = el.parentElement ? Array.from(el.parentElement.children).filter((c) => c.classList.contains('reveal')) : [];
            const index = siblings.indexOf(el);
            if (index > 0) el.style.transitionDelay = Math.min(index * 90, 360) + 'ms';
            io.observe(el);
        });
    } else {
        document.querySelectorAll('.reveal').forEach((el) => el.classList.add('is-visible'));
    }

    /* ---------- Our Work: highlight the current area in the jump nav ---------- */
    const pillarLinks = document.querySelectorAll('.pillar-nav__link');
    if (pillarLinks.length && 'IntersectionObserver' in window) {
        const byId = new Map(Array.from(pillarLinks).map((a) => [a.getAttribute('href').slice(1), a]));
        const spy = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                pillarLinks.forEach((a) => a.classList.remove('is-active'));
                const link = byId.get(entry.target.id);
                if (link) link.classList.add('is-active');
            });
        }, { rootMargin: '-45% 0px -50% 0px' });
        byId.forEach((_, id) => {
            const section = document.getElementById(id);
            if (section) spy.observe(section);
        });
    }

    /* ---------- Updates: filter cards without reloading ---------- */
    const grid = document.querySelector('[data-filter-grid]');
    const filters = document.querySelectorAll('[data-filter]');
    if (grid && filters.length) {
        const emptyNote = document.querySelector('[data-filter-empty]');
        filters.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                // Only intercept if every card is on the page (i.e. we started on "All").
                if (grid.dataset.complete === 'false') return;
                e.preventDefault();
                const value = btn.dataset.filter;
                filters.forEach((f) => {
                    const on = f === btn;
                    f.classList.toggle('is-active', on);
                    f.setAttribute('aria-pressed', String(on));
                });
                let shown = 0;
                grid.querySelectorAll('.card').forEach((card) => {
                    const match = !value || card.dataset.category === value;
                    card.hidden = !match;
                    if (match) { shown++; card.classList.add('is-visible'); }
                });
                if (emptyNote) emptyNote.hidden = shown > 0;
                const url = value ? '?category=' + encodeURIComponent(value) : location.pathname;
                history.replaceState(null, '', url);
            });
        });
        // If the page loaded already filtered, let links reload so all cards are fetched.
        grid.dataset.complete = new URLSearchParams(location.search).has('category') ? 'false' : 'true';
    }

})();
