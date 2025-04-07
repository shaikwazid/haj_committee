$(function () {
    'use strict'

    // slider area
    $('.slider-area').owlCarousel({
        loop: true,
        margin: 0,
        responsiveClass: true,
        navigation: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        nav: true,
        items: 1,
        smartSpeed: 1000,
        dots: false,
        autoplay: false,
        autoplayTimeout: 4000,
        center: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            480: {
                items: 1,
                nav: false
            },
            760: {
                items: 1
            }
        }
    });

    //notifications-slider
    $('.notifications-slider').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 450,
        nav: true,
        navText: ['', ''],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            991: {
                items: 2
            },
            1200: {
                items: 2
            },
            1920: {
                items: 4
            }
        }
    });
//Publication-slider
    $('.publication-slider').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 450,
        nav: true,
        navText: ['', ''],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            991: {
                items: 3
            },
            1200: {
                items: 6
            },
            1920: {
                items: 6
            }
        }
    });
    //emergency-slider
    $('.emergency-slider').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 450,
        nav: true,
        navText: ['', ''],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            991: {
                items: 3
            },
            1200: {
                items: 4
            },
            1920: {
                items: 4
            }
        }
    });

    
    //gallery-slider
    $('.gallery-slider').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 450,
        nav: true,
        navText: ['', ''],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            991: {
                items: 3
            },
            1200: {
                items: 4
            },
            1920: {
                items:4
            }
        }
    });

});