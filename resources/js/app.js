document.documentElement.classList.remove('no-js');

const header = document.querySelector('[data-site-header]');
const menuToggle = document.querySelector('[data-menu-toggle]');
const mobileMenu = document.querySelector('[data-mobile-menu]');

if (header) {
    const onScroll = () => header.toggleAttribute('data-scrolled', window.scrollY > 24);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
}

if (menuToggle && mobileMenu) {
    const setOpen = (open) => {
        menuToggle.setAttribute('aria-expanded', String(open));
        mobileMenu.toggleAttribute('hidden', !open);
        document.body.classList.toggle('overflow-hidden', open);
        header?.toggleAttribute('data-scrolled', open || window.scrollY > 24);
    };

    menuToggle.addEventListener('click', () => setOpen(menuToggle.getAttribute('aria-expanded') !== 'true'));
    mobileMenu.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => setOpen(false)));
    document.addEventListener('keydown', (event) => event.key === 'Escape' && setOpen(false));
    window.matchMedia('(min-width: 1024px)').addEventListener('change', (event) => event.matches && setOpen(false));
}

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const formatNumber = (value) => new Intl.NumberFormat('fr-FR').format(value);

const animateCounter = (element) => {
    const target = Number(element.dataset.counter);
    const suffix = element.dataset.suffix ?? '';

    if (reduceMotion) {
        element.textContent = formatNumber(target) + suffix;
        return;
    }

    const duration = 1800;
    const start = performance.now();

    const tick = (now) => {
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        element.textContent = formatNumber(Math.round(target * eased)) + suffix;
        if (progress < 1) requestAnimationFrame(tick);
    };

    requestAnimationFrame(tick);
};

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            if (entry.target.dataset.counter) animateCounter(entry.target);
            observer.unobserve(entry.target);
        });
    },
    { threshold: 0.08, rootMargin: '0px 0px -8% 0px' },
);

document.querySelectorAll('[data-reveal], [data-counter]').forEach((element) => observer.observe(element));

const hero = document.querySelector('[data-hero]');

if (hero) {
    const slides = [...hero.querySelectorAll('[data-hero-slide]')];
    const copies = [...hero.querySelectorAll('[data-hero-copy]')];
    const dots = [...hero.querySelectorAll('[data-hero-dot]')];
    const interval = Number(hero.dataset.heroInterval) || 6500;
    let index = 0;
    let timer;
    let busy = false;

    hero.style.setProperty('--hero-interval', `${interval}ms`);

    const setActive = (collection, next) => {
        collection.forEach((item, i) => item.classList.toggle('is-active', i === next));
    };

    const goTo = (next, direction = 'next') => {
        if (busy || next === index) return;

        const from = index;
        const to = (next + slides.length) % slides.length;
        busy = true;
        hero.dataset.dir = direction;
        hero.classList.add('is-wiping');

        slides[from].classList.remove('is-active');
        slides[from].classList.add('is-leaving');
        slides[to].classList.add('is-active');

        copies[from]?.classList.remove('is-active');
        copies[from]?.classList.add('is-leaving');
        copies[to]?.classList.add('is-active');
        dots.forEach((dot, i) => {
            dot.classList.toggle('is-active', i === to);
            dot.setAttribute('aria-selected', i === to ? 'true' : 'false');
        });

        window.setTimeout(() => {
            slides[from].classList.add('is-reset');
            slides[from].classList.remove('is-leaving');
            void slides[from].offsetWidth;
            slides[from].classList.remove('is-reset');
            copies[from]?.classList.remove('is-leaving');
            hero.classList.remove('is-wiping');
            index = to;
            busy = false;
        }, reduceMotion ? 420 : 1250);
    };

    const play = () => {
        stop();
        if (reduceMotion || slides.length < 2) return;
        timer = window.setInterval(() => goTo(index + 1, 'next'), interval);
    };

    const stop = () => {
        window.clearInterval(timer);
        timer = undefined;
    };

    hero.querySelector('[data-hero-prev]')?.addEventListener('click', () => {
        goTo(index - 1, 'prev');
        play();
    });
    hero.querySelector('[data-hero-next]')?.addEventListener('click', () => {
        goTo(index + 1, 'next');
        play();
    });
    dots.forEach((dot, i) =>
        dot.addEventListener('click', () => {
            goTo(i, i > index ? 'next' : 'prev');
            play();
        }),
    );

    hero.addEventListener('mouseenter', stop);
    hero.addEventListener('mouseleave', play);
    document.addEventListener('visibilitychange', () => (document.hidden ? stop() : play()));
    play();
}

if (!reduceMotion) {
    const layers = document.querySelectorAll('[data-parallax]');
    if (layers.length) {
        let ticking = false;
        const update = () => {
            layers.forEach((layer) => {
                const speed = Number(layer.dataset.parallax) || 0.12;
                const rect = layer.getBoundingClientRect();
                const offset = (window.innerHeight / 2 - (rect.top + rect.height / 2)) * speed;
                layer.style.transform = `translate3d(0, ${offset.toFixed(1)}px, 0)`;
            });
            ticking = false;
        };
        window.addEventListener(
            'scroll',
            () => {
                if (!ticking) {
                    requestAnimationFrame(update);
                    ticking = true;
                }
            },
            { passive: true },
        );
        update();
    }
}
