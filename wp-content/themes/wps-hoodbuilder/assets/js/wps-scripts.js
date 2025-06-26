var publicVars = publicVars || {};

;(function ($, window, undefined) {
    "use strict";

    $(document).ready(function () {

        // responsive menu
        if (typeof($.fn.dlmenu) == 'function') {
            $('#dl-menu').each(function () {
                $(this).find('.dl-submenu').each(function () {
                    if ($(this).siblings('a').attr('href') && $(this).siblings('a').attr('href') != '#') {
                        var parent_nav = $('<li class="menu-item gdlr-parent-menu"></li>');
                        parent_nav.append($(this).siblings('a').clone());

                        $(this).prepend(parent_nav);
                    }
                });
                $(this).dlmenu({
                    animationClasses: {classin: 'dl-animate-in-4', classout: 'dl-animate-out-4'}
                });
            });
        }

            $('#mobile-nav-icon').click(function(){
            $(this).toggleClass('open');
        });

        $('.header-navigation ul.sf-menu').superfish({
            delay:       500,                            // one second delay on mouseout
            animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
            speed:       'fast',                          // faster animation speed
            autoArrows:  false,                            // disable generation of arrow mark-up
            cssArrows: true,
            disableHI: true
        });

        $('.equal-height').matchHeight({
            byRow: true,
            property: 'height',
            remove: false
        });

        $('.equal-height-map').matchHeight({
            byRow: true,
            property: 'height',
            remove: false
        });

        $('.related-articles-item-container').matchHeight({
            byRow: true,
            property: 'height',
            remove: false
        });

        $('.testimonial-popup').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,

            fixedContentPos: false
        });

        //$('.page-title-container-style3 .page-title-holder').flexVerticalCenter({cssAttribute: 'padding-top', parentSelector: '.page-title-container-style3'});

        $('.sidebar-widget-button-details p').flexVerticalCenter({cssAttribute: 'padding-top', parentSelector: '.sidebar-widget-button-details'});

        $('.homepage-services-slide-item .service-icon').flexVerticalCenter({cssAttribute: 'padding-top', parentSelector: '.homepage-services-slide-item'});

        // Smooth scrolling using jQuery easing
        $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: (target.offset().top - 70)
                    }, 1000, "easeInOutExpo");
                    return false;
                }
            }
        });
    });


    // Can also be used with $(document).ready()
    $(window).load(function () {


        $('.wps-page-header-slider .slides').css('height', $('.wps-page-header-slider-container').height() + 'px');

        if ( $(window).width() > 991) {

            $('.page-title-container-style3 .page-title-holder').flexVerticalCenter({cssAttribute: 'padding-top', parentSelector: '.page-title-container-style3'});

            //Add your javascript for large screens here
            // $('.equal-height-page-header').matchHeight({
            //     byRow: true,
            //     property: 'height',
            //     remove: false
            // });

        }
        else {
            //Add your javascript for small screens here

            console.log('low');


        }

        //$('.equal-height-page-header').matchHeight({ remove: true });

        var owl_home_slider = $(".homepage-services-slider-container");

        owl_home_slider.owlCarousel({
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            rewind: true,
            margin: 10,
            //nav: false,
            //autoHeight: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                760: {
                    items: 2,
                    nav: true
                },
                1024: {
                    items: 3,
                    nav: true,
                    loop: false
                },
                1353: {
                    items: 4,
                    nav: true,
                    loop: false
                }
            },
            //dots: true,
            // dotsEach: true,
            // slideBy: 'number',
            // navText: [
            //     "<i class='fa fa-chevron-left'></i>",
            //     "<i class='fa fa-chevron-right'></i>"
            // ],
            loop:false
        });

        var owl_testimonial_homepage = $(".wps-testimonial-slider-homepage");

        owl_testimonial_homepage.owlCarousel({
            autoplay:true,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            rewind: true,
            margin: 15,
            items:1,
            nav: false,
            autoHeight: true,
            //dots: true,
            // dotsEach: true,
            // slideBy: 'number',
            // navText: [
            //     "<i class='fa fa-chevron-left'></i>",
            //     "<i class='fa fa-chevron-right'></i>"
            // ],
            loop:true
        });


        var owl_testimonial_insidepage = $(".wps-testimonial-slider");

        owl_testimonial_insidepage.owlCarousel({
            autoplay:true,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            rewind: true,
            margin: 15,
            items:1,
            nav: false,
            autoHeight: true,
            //dots: true,
            // dotsEach: true,
            // slideBy: 'number',
            // navText: [
            //     "<i class='fa fa-chevron-left'></i>",
            //     "<i class='fa fa-chevron-right'></i>"
            // ],
            loop:true
        });

        $(".nav-bar-wrap").sticky({topSpacing: 0});


        $('.page-title-wrap.style2 .page-title-container').flexVerticalCenter({cssAttribute: 'padding-top', parentSelector: '.page-title-wrap'});



        $('.wps-page-header-slider').flexslider({
            animation: "slide",
            directionNav:  false
        });

        $('.wps-testimonials-isotope').isotope({
            // options
            itemSelector: '.grid-item',
            layoutMode: 'masonry'
        });


        $('.wps-blog-isotope').isotope({
            // options
            itemSelector: '.wps-isotope-post-item',
            layoutMode: 'fitRows',
            masonry: {
                gutterWidth: 10
            }
        });


    });


    $(window).resize(function () {

        $('.equal-height').matchHeight({
            byRow: true,
            property: 'height',
            remove: false
        });

        $('.equal-height-map').matchHeight({
            byRow: true,
            property: 'height',
            remove: false
        });

        $('.related-articles-item-container').matchHeight({
            byRow: true,
            property: 'height',
            remove: false
        });

        $('.page-title-wrap.style2 .page-title-container').flexVerticalCenter({cssAttribute: 'padding-top', parentSelector: '.page-title-wrap'});


        if ( $(window).width() > 991) {

            $('.page-title-container-style3 .page-title-holder').flexVerticalCenter({cssAttribute: 'padding-top', parentSelector: '.page-title-container-style3'});

            //Add your javascript for large screens here
            // $('.equal-height-page-header').matchHeight({
            //     byRow: true,
            //     property: 'height',
            //     remove: false
            // });

        }
        else {
            //Add your javascript for small screens here

            console.log('low');
            // $('.equal-height-page-header').matchHeight({
            //     remove: true
            // });


        }



    });



})(jQuery, window);
