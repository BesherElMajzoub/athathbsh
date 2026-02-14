/**
 * Site JavaScript (safe)
 */
document.addEventListener('DOMContentLoaded', () => {
    // Mobile Navigation Toggle
    const navToggle = document.querySelector('.nav-toggle');
    const navMobile = document.querySelector('.nav-mobile');

    if (navToggle && navMobile) {
        navToggle.addEventListener('click', () => {
            const isExpanded = navToggle.getAttribute('aria-expanded') === 'true';
            navToggle.setAttribute('aria-expanded', String(!isExpanded));
            navMobile.hidden = isExpanded;
            document.body.style.overflow = isExpanded ? '' : 'hidden';
        });
    }

    // FAQ Accordion
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach((question) => {
        question.addEventListener('click', () => {
            const isExpanded = question.getAttribute('aria-expanded') === 'true';
            const answerId = question.getAttribute('aria-controls');
            const answer = answerId ? document.getElementById(answerId) : null;

            faqQuestions.forEach((q) => {
                if (q !== question) {
                    q.setAttribute('aria-expanded', 'false');
                    const otherId = q.getAttribute('aria-controls');
                    const otherAnswer = otherId ? document.getElementById(otherId) : null;
                    if (otherAnswer) otherAnswer.hidden = true;
                }
            });

            question.setAttribute('aria-expanded', String(!isExpanded));
            if (answer) answer.hidden = isExpanded;
        });
    });

    // Smooth scroll for anchor links (safe selector)
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (e) => {
            const href = anchor.getAttribute('href');
            if (!href || href === '#') return;

            // If href contains characters that break querySelector, fallback to getElementById
            const id = href.slice(1);
            const target = document.getElementById(id) || document.querySelector(href);

            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add page URL to tracking links (safe URL building)
    document.querySelectorAll('a[href*="/t/whatsapp"], a[href*="/t/call"]').forEach((link) => {
        try {
            const url = new URL(link.getAttribute('href'), window.location.origin);
            url.searchParams.set('page', window.location.pathname);
            link.setAttribute('href', url.toString());
        } catch (err) {
            // Ignore broken hrefs instead of breaking the whole script
            console.warn('Skipping invalid tracking link href:', link.getAttribute('href'));
        }
    });

    // Lazy load images (native lazy loading)
    if ('loading' in HTMLImageElement.prototype) {
        document.querySelectorAll('img[loading="lazy"]').forEach((img) => {
            if (img.dataset && img.dataset.src) img.src = img.dataset.src;
        });
    }
});

/* Lite YouTube Embed - Lightweight Class */
class LiteYTEmbed extends HTMLElement {
    connectedCallback() {
        this.videoId = this.getAttribute('videoid');
        let playBtnEl = this.querySelector('.lty-playbtn');
        this.playLabel = (playBtnEl && playBtnEl.textContent.trim()) || 'Play';

        if (!this.style.backgroundImage) {
            this.style.backgroundImage = `url("https://i.ytimg.com/vi/${this.videoId}/hqdefault.jpg")`;
        }

        if (!playBtnEl) {
            playBtnEl = document.createElement('button');
            playBtnEl.type = 'button';
            playBtnEl.classList.add('lty-playbtn');
            this.append(playBtnEl);
        }

        if (!playBtnEl.textContent) {
            const playBtnLabelEl = document.createElement('span');
            playBtnLabelEl.className = 'lyt-visually-hidden';
            playBtnLabelEl.textContent = this.playLabel;
            playBtnEl.append(playBtnLabelEl);
        }

        this.addEventListener('pointerover', LiteYTEmbed.warmConnections, {
            once: true
        });
        this.addEventListener('click', this.addIframe);
    }

    static warmConnections() {
        if (LiteYTEmbed.preconnected) return;
        LiteYTEmbed.preconnected = true;
        const link1 = document.createElement('link');
        link1.rel = 'preconnect';
        link1.href = 'https://www.youtube-nocookie.com';
        const link2 = document.createElement('link');
        link2.rel = 'preconnect';
        link2.href = 'https://www.google.com';
        document.head.append(link1, link2);
    }

    addIframe() {
        if (this.classList.contains('lyt-activated')) return;
        this.classList.add('lyt-activated');

        const iframe = document.createElement('iframe');
        iframe.width = 560;
        iframe.height = 315;
        iframe.title = this.playLabel;
        iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
        iframe.allowFullscreen = true;
        iframe.src = `https://www.youtube-nocookie.com/embed/${encodeURIComponent(this.videoId)}?autoplay=1`;
        this.append(iframe);
    }
}
customElements.define('lite-youtube', LiteYTEmbed);
