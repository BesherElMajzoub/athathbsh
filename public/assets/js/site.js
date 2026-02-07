/**
 * Site JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Mobile Navigation Toggle
    const navToggle = document.querySelector('.nav-toggle');
    const navMobile = document.querySelector('.nav-mobile');
    
    if (navToggle && navMobile) {
        navToggle.addEventListener('click', function() {
            const isExpanded = navToggle.getAttribute('aria-expanded') === 'true';
            navToggle.setAttribute('aria-expanded', !isExpanded);
            navMobile.hidden = isExpanded;
            document.body.style.overflow = isExpanded ? '' : 'hidden';
        });
    }

    // FAQ Accordion
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(function(question) {
        question.addEventListener('click', function() {
            const isExpanded = question.getAttribute('aria-expanded') === 'true';
            const answerId = question.getAttribute('aria-controls');
            const answer = document.getElementById(answerId);
            
            // Close other open FAQs (optional - remove for accordion that allows multiple open)
            faqQuestions.forEach(function(q) {
                if (q !== question) {
                    q.setAttribute('aria-expanded', 'false');
                    const otherId = q.getAttribute('aria-controls');
                    const otherAnswer = document.getElementById(otherId);
                    if (otherAnswer) {
                        otherAnswer.hidden = true;
                    }
                }
            });
            
            // Toggle current FAQ
            question.setAttribute('aria-expanded', !isExpanded);
            if (answer) {
                answer.hidden = isExpanded;
            }
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add page URL to tracking links
    document.querySelectorAll('a[href*="/t/whatsapp"], a[href*="/t/call"]').forEach(function(link) {
        const url = new URL(link.href);
        url.searchParams.set('page', window.location.pathname);
        link.href = url.toString();
    });

    // Lazy load images (if using native lazy loading)
    if ('loading' in HTMLImageElement.prototype) {
        document.querySelectorAll('img[loading="lazy"]').forEach(function(img) {
            img.src = img.dataset.src || img.src;
        });
    }
});
