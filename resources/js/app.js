document.documentElement.classList.remove('no-js');

const header = document.querySelector('[data-site-header]');
const menuToggle = document.querySelector('[data-menu-toggle]');
const mobileMenu = document.querySelector('[data-mobile-menu]');

if (header) {
    const onScroll = () => header.toggleAttribute('data-scrolled', window.scrollY > 12);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
}

if (menuToggle && mobileMenu) {
    const setOpen = (open) => {
        menuToggle.setAttribute('aria-expanded', String(open));
        mobileMenu.toggleAttribute('hidden', !open);
        document.body.classList.toggle('overflow-hidden', open);
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
    { threshold: 0.15, rootMargin: '0px 0px -40px 0px' },
);

document.querySelectorAll('[data-reveal], [data-counter]').forEach((element) => observer.observe(element));
