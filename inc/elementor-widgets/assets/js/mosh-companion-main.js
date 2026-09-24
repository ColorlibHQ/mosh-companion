/**
 * Mosh Companion widgets, front end, without jQuery: carousels, skill bars,
 * the filterable portfolio, scroll-to-top, counters, YouTube backgrounds and
 * the Mailchimp field map. The plugins come from the theme's ColorlibUI
 * (drop-in Owl Carousel, Barfiller, Isotope, imagesLoaded, ScrollUp and
 * YouTube background with the same options and markup).
 */
(function () {
    'use strict';

    function run() {
        var UI = window.ColorlibUI;
        if (!UI) return;

        // This plugin shipped Owl Carousel 2.2.1, whose arrows and dots are <div>s.
        if (UI.owl && UI.owl.defaults) UI.owl.defaults.markup = '2.2';

        UI.owl('.hero-slides', {
            items: 1,
            loop: true,
            autoplay: true,
            smartSpeed: 800,
            margin: 0,
            dots: false,
            nav: true,
            navText: ['<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>', '<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>']
        });

        UI.owl('.mosh-service-slides', {
            items: 3,
            loop: true,
            autoplay: true,
            smartSpeed: 800,
            margin: 30,
            center: true,
            dots: false,
            nav: true,
            startPosition: 1,
            navText: ['<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>', '<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                }
            }
        });

        UI.owl('.mosh-workflow-slides', {
            items: 3,
            loop: true,
            autoplay: true,
            smartSpeed: 800,
            margin: 30,
            center: true,
            dots: true,
            startPosition: 1,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                }
            }
        });

        UI.owl('.mosh-team-slides', {
            items: 3,
            loop: true,
            autoplay: true,
            smartSpeed: 800,
            margin: 50,
            center: true,
            nav: true,
            navText: ['<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>', '<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                }
            }
        });

        UI.owl('.testimonials-slides', {
            items: 3,
            loop: true,
            autoplay: true,
            smartSpeed: 1500,
            margin: 0,
            center: true,
            nav: true,
            navText: ['<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>', '<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                }
            }
        });

        UI.toElements('.bar').forEach(function (bar) {
            // As $this.data('color'): undefined (the default colour) when absent.
            var color = bar.hasAttribute('data-color') ? bar.getAttribute('data-color') : undefined;

            UI.barfiller(bar, {
                tooltip: true,
                duration: 1000,
                barColor: color,
                animateOnResize: true
            });
        });

        // Only where there is a portfolio: UI.imagesLoaded and UI.isotope need
        // WordPress core imagesLoaded / Masonry and warn when they are missing.
        if (document.querySelector('.mosh-portfolio')) {
            UI.imagesLoaded('.mosh-portfolio', function () {
                // init Isotope
                var grids = UI.isotope('.mosh-portfolio', {
                    itemSelector: '.single_gallery_item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.single_gallery_item'
                    }
                });
                // filter items on button click
                UI.toElements('.portfolio-menu').forEach(function (menu) {
                    menu.addEventListener('click', function (e) {
                        var item = e.target.closest('p');
                        if (!item || !menu.contains(item)) return;
                        var filterValue = item.getAttribute('data-filter');
                        grids.forEach(function (grid) {
                            grid.arrange({
                                filter: filterValue
                            });
                        });
                    });
                });
            });
        }

        UI.toElements('.portfolio-menu button.btn').forEach(function (button) {
            button.addEventListener('click', function () {
                UI.toElements('.portfolio-menu button.btn').forEach(function (b) {
                    b.classList.remove('active');
                });
                button.classList.add('active');
            });
        });

        UI.scrollUp({
            scrollSpeed: 1500,
            scrollText: '<i class="fa-solid fa-angle-up"></i>'
        });

        UI.counter('.counter', { time: 2000 });

        // Background video
        UI.toElements('[data-videoid]').forEach(function (el) {
            UI.youtubeBackground(el, {
                fitToBackground: true,
                videoId: el.getAttribute('data-videoid')
            });
        });

        // MC Scripts
        if (document.querySelector('.mosh-subscribe-newsletter-area')) {
            window.fnames = new Array();
            window.ftypes = new Array();
            fnames[0] = 'EMAIL';
            ftypes[0] = 'email';
            fnames[1] = 'FNAME';
            ftypes[1] = 'text';
            fnames[2] = 'LNAME';
            ftypes[2] = 'text';
            fnames[3] = 'ADDRESS';
            ftypes[3] = 'address';
            fnames[4] = 'PHONE';
            ftypes[4] = 'phone';
            fnames[5] = 'BIRTHDAY';
            ftypes[5] = 'birthday';
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', run);
    } else {
        run();
    }
}());
