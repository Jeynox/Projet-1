// The Wild Tour — menu mobile, sous-menu, animations au scroll

document.documentElement.classList.add('js');

document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.site-header');
    const navbar = document.querySelector('.navbar');
    const toggle = document.querySelector('.navbar__toggle');
    const dropdownItem = document.querySelector('.has-dropdown');
    const dropdownToggle = document.querySelector('.dropdown__toggle');

    // Menu burger (mobile)
    if (navbar && toggle) {
        const setMenu = (open) => {
            navbar.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', String(open));
            toggle.setAttribute('aria-label', open ? 'Fermer le menu' : 'Ouvrir le menu');
        };

        toggle.addEventListener('click', () => setMenu(!navbar.classList.contains('is-open')));

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                setMenu(false);
                setDropdown(false);
            }
        });

        document.addEventListener('click', (event) => {
            if (!navbar.contains(event.target)) {
                setMenu(false);
                setDropdown(false);
            }
        });
    }

    // Sous-menu "Découvertes"
    function setDropdown(open) {
        if (!dropdownItem || !dropdownToggle) return;
        dropdownItem.classList.toggle('is-open', open);
        dropdownToggle.setAttribute('aria-expanded', String(open));
    }

    if (dropdownToggle) {
        dropdownToggle.addEventListener('click', () => setDropdown(!dropdownItem.classList.contains('is-open')));
    }

    // Lien actif dans le sous-menu
    const currentPage = location.pathname.split('/').pop();
    document.querySelectorAll('.navbar__menu a').forEach((link) => {
        if (link.getAttribute('href') === currentPage && !link.hasAttribute('aria-current')) {
            link.setAttribute('aria-current', 'page');
        }
    });

    // Navbar plus opaque après défilement
    if (header) {
        const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 40);
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    // Apparition des éléments au scroll
    const revealed = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        revealed.forEach((element) => observer.observe(element));
    } else {
        revealed.forEach((element) => element.classList.add('is-visible'));
    }

    // Année du footer
    document.querySelectorAll('[data-year]').forEach((element) => {
        element.textContent = new Date().getFullYear();
    });
});
