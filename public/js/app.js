// Shared-hosting friendly custom JavaScript lives here. No npm or Vite required.

// The catalog originally used temporary external image URLs. Keep broken remote
// images from rendering as empty cards by falling back to stable local assets.
document.addEventListener('DOMContentLoaded', () => {
    const fallbackByProduct = [
        { match: 'milk tea double cup', src: '/images/products/milk-tea-carriers-card.jpg' },
        { match: 'rolled black trash', src: '/images/products/rolled-trash-bags.png' },
        { match: 'food grade heavy duty ice', src: '/images/products/icebag.png' },
        { match: 'white polyethylene sando', src: '/images/products/sando-bags.png' },
        { match: 'industrial polyethylene pe', src: '/images/products/pe-packaging-rolls.png' },
        { match: 'printed plastic film', src: '/images/products/roto-printing-banners.png' },
        { match: 'seedling grow bags', src: '/images/products/seedling-grow-bags.png' },
        { match: 'courier shipping mailer', src: '/images/products/courier-pouches.png' },
        { match: 'holiday food grade', src: '/images/flexible-packaging/products/laminated-ham-pouch.jpg' },
        { match: 'uv stabilized agricultural black plastic seedling', src: '/images/products/seedling-grow-bags.png' },
        { match: 'tamper-evident poly courier', src: '/images/products/courier-pouches.png' },
        { match: 'premium holiday food grade stand-up ham', src: '/images/flexible-packaging/products/laminated-ham-pouch.jpg' },
        { match: 'industrial printing press', src: '/images/machines/rotogravure-printing.jpg' },
    ];

    document.querySelectorAll('#productShowroomGrid img').forEach((image) => {
        const alt = (image.getAttribute('alt') || '').toLowerCase();
        const fallback = fallbackByProduct.find((item) => alt.includes(item.match));

        if (!fallback) {
            return;
        }

        const useFallback = () => {
            if (image.dataset.fallbackApplied === 'true') {
                return;
            }

            image.dataset.fallbackApplied = 'true';
            image.src = fallback.src;
        };

        image.addEventListener('error', useFallback, { once: true });
        useFallback();
        image.classList.remove('object-cover');
        image.classList.add('object-contain', 'bg-white', 'p-3');
    });

    document.querySelectorAll('a').forEach((link) => {
        if (link.textContent.trim().toLowerCase().includes('request factory quotation')) {
            link.href = '/newest-in-dsam';
            link.dataset.path = 'newest-in-dsam';
            const label = link.querySelector('span');

            if (label) {
                label.textContent = 'NEWEST IN DSAM';
            }
        }
    });

    document.querySelectorAll('[data-carousel-interval]').forEach((carousel) => {
        const slides = Array.from(carousel.querySelectorAll('[data-carousel-slide]'));
        const dots = Array.from(carousel.querySelectorAll('[data-carousel-dot]'));

        if (slides.length < 2) {
            return;
        }

        let activeIndex = 0;
        const showSlide = (index) => {
            activeIndex = index % slides.length;
            slides.forEach((slide, slideIndex) => slide.classList.toggle('hidden', slideIndex !== activeIndex));
            dots.forEach((dot, dotIndex) => {
                dot.classList.toggle('bg-tertiary-fixed', dotIndex === activeIndex);
                dot.classList.toggle('bg-white/40', dotIndex !== activeIndex);
            });
        };

        window.setInterval(() => showSlide(activeIndex + 1), Number(carousel.dataset.carouselInterval) || 3000);
    });

    document.querySelectorAll('span').forEach((label) => {
        if (label.textContent.trim().toLowerCase().startsWith('pillar ')) {
            const card = label.closest('.group');
            if (card) {
                card.style.backgroundColor = '#e6e8eb';
            }
        }
    });

    document.querySelectorAll('img[alt*="high capacity blown film"], img[alt*="rotogravure printing machine"]').forEach((image) => {
        const imageFrame = image.parentElement;
        imageFrame?.querySelectorAll(':scope > .absolute').forEach((overlay) => overlay.remove());
    });

    document.querySelectorAll('footer').forEach((footer) => {
        const capabilitiesHeading = Array.from(footer.querySelectorAll('h4')).find((heading) =>
            heading.textContent.trim().toLowerCase().includes('company & capabilities')
        );
        const capabilitiesNav = capabilitiesHeading?.parentElement?.querySelector('nav, ul');

        if (capabilitiesNav) {
            Array.from(capabilitiesNav.querySelectorAll('a')).forEach((link) => {
                const label = link.textContent.trim().toLowerCase();
                const item = link.closest('li') || link;

                if (label.includes('blown-film extrusion') || label.includes('6-color rotogravure printing') || label.includes('automated cutting & converting') || label.includes('custom resin formulations')) {
                    item.remove();
                    return;
                }

                if (label.includes('about dsam & plant facility')) {
                    link.href = '/manufacturing';
                }
            });

            if (!Array.from(capabilitiesNav.querySelectorAll('a')).some((link) => link.textContent.trim().toLowerCase().includes('newest in dsam'))) {
                const item = document.createElement('li');
                item.innerHTML = '<a class="text-surface-subtle hover:text-on-primary transition-colors flex items-center gap-1.5" href="/newest-in-dsam"><span class="material-symbols-outlined text-[14px] text-tertiary-fixed-dim">new_releases</span>Newest in DSAM</a>';
                capabilitiesNav.appendChild(item);
            }
        }

        const procurementHeading = Array.from(footer.querySelectorAll('h4')).find((heading) =>
            heading.textContent.trim().toLowerCase().includes('direct b2b procurement')
        );
        const procurementPanel = procurementHeading?.parentElement;
        const actionList = procurementPanel?.querySelector(':scope > div:last-child');

        if (!actionList) {
            return;
        }

        Array.from(actionList.children).forEach((action) => {
            const label = action.textContent.trim().toLowerCase();

            if (label.includes('submit packaging specs') || label.includes('download product catalog')) {
                action.remove();
                return;
            }

            if (label.includes('request a formal quote')) {
                const quoteLink = action.matches('a') ? action : action.querySelector('a');
                if (quoteLink) {
                    quoteLink.href = '/request-a-quote';
                }
            }

            if (label.includes('speak with an estimator')) {
                action.replaceWith(createSalesContactBlock());
            }
        });
    });

    function createSalesContactBlock() {
        const block = document.createElement('div');
        block.className = 'p-3 bg-surface-dark border border-white/15 rounded-lg space-y-1.5';
        block.innerHTML = `
            <div class="flex items-center gap-2 text-white font-semibold">
                <span class="material-symbols-outlined text-tertiary-fixed-dim text-sm">support_agent</span>
                <span>Sales &amp; RFQ</span>
            </div>
            <a class="block text-surface-subtle hover:text-tertiary-fixed-dim transition-colors text-xs break-all" href="mailto:generaldirector@dsammanufacturing.com">generaldirector@dsammanufacturing.com</a>
            <a class="block text-surface-subtle hover:text-tertiary-fixed-dim transition-colors text-xs break-all" href="mailto:production.staff@dsammanufacturing.com">production.staff@dsammanufacturing.com</a>
            <a class="block text-surface-subtle hover:text-tertiary-fixed-dim transition-colors text-xs" href="tel:09178339142">0917 833 9142</a>
        `;
        return block;
    }
});
