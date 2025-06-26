<?php

/* ================================================================================== */
/*      Enqueue Scripts
/* ================================================================================== */

add_action('wp_enqueue_scripts', 'wps_base_scripts');

function wps_base_scripts() {
    wp_enqueue_style('bootstrap', WPS_THEME_URI . '/assets/css/bootstrap.css', null, null);
    wp_enqueue_style('font-awesome', WPS_THEME_URI . '/assets/css/font-awesome.min.css', null, null);
    wp_enqueue_style('wps-google-font', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600,700|Montserrat:400,500,600,700|Lato:300', null, null);
    wp_enqueue_style('owl.carousel', WPS_THEME_URI . '/assets/css/owl-carousel/owl.carousel.css', null, null);
    wp_enqueue_style('flexslider', WPS_THEME_URI . '/assets/css/flexslider.css', null, null);
    wp_enqueue_style('dlmenu', WPS_THEME_URI . '/assets/css/dl-menu.css', null, null);
    wp_enqueue_style('owl.theme.default', WPS_THEME_URI . '/assets/css/owl-carousel/owl.theme.default.css', null, null);
	wp_enqueue_style('magnific-popup', WPS_THEME_URI . '/assets/css/magnific-popup.css', null, null);
    wp_register_style('jquery-superfish', WPS_THEME_URI . '/assets/css/superfish.css', null, null);
    wp_enqueue_style('jquery-superfish');
    wp_enqueue_style('wps-base-style', WPS_STYLESHEET_DIR . '/style.css');
    wp_enqueue_style('homepage_optimized_css', WPS_THEME_URI . '/assets/css/homepage_optimized_css.css', null, null);
    
    wp_enqueue_script('modernizr.custom', WPS_THEME_URI . '/assets/js/vendor/modernizr.custom.js', '', false, true);
    wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA3xT9ihY6kGxYs8dsZ4WZcFnJRilrs5kM', '', false, true);
    wp_enqueue_script('isotope.pkd', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js', '', false, true);
    wp_enqueue_script('jquery.easing', WPS_THEME_URI . '/assets/js/vendor/jquery.easing.js', '', false, true);
    wp_enqueue_script('classie', WPS_THEME_URI . '/assets/js/vendor/classie.js', '', false, true);
    wp_enqueue_script('owl.carousel.min', WPS_THEME_URI . '/assets/js/vendor/owl.carousel.min.js', '', false, true);
	wp_enqueue_script('magnific-popup', WPS_THEME_URI . '/assets/js/vendor/jquery.magnific-popup.min.js', '', '', true);
    wp_enqueue_script('jquery.matchHeight', WPS_THEME_URI . '/assets/js/vendor/jquery.matchHeight.js', '', false, true);
    wp_enqueue_script('jquery.flexverticalcenter', WPS_THEME_URI . '/assets/js/vendor/jquery.flexverticalcenter.js', '', false, true);
    wp_enqueue_script('jquery.dlmenu', WPS_THEME_URI . '/assets/js/vendor/jquery.dlmenu.js', '', false, true);
    wp_register_script('jquery.sf-hover-intent', WPS_THEME_URI . '/assets/js/vendor/hoverIntent.js', '',  array('jquery'),  true );
    wp_register_script('jquery.superfish', WPS_THEME_URI . '/assets/js/vendor/superfish.js', '',  array('jquery'),  true );
    wp_enqueue_script('jquery.flexslider', WPS_THEME_URI . '/assets/js/vendor/jquery.flexslider.js', '',  array('jquery'),  true );
	wp_enqueue_script('jquery.sticky', WPS_THEME_URI . '/assets/js/vendor/jquery.sticky.js', '', false, true);
	wp_enqueue_script('custom-file-input', WPS_THEME_URI . '/assets/js/vendor/custom-file-input.js', '', false, true);


	wp_enqueue_script('jquery.sf-hover-intent');
	wp_enqueue_script('jquery.superfish');

    wp_enqueue_script('wps-scripts', WPS_THEME_URI . '/assets/js/wps-scripts.js', array('jquery'), false, true);





    if (is_single() && comments_open()) {
        wp_enqueue_script('comment-reply');
    }
    // wp_register_script('lovely-owl-carousel', THEME_DIR . '/assets/js/owl-carousel.min.js');
    // wp_register_script('lovely-isotope', THEME_DIR . '/assets/js/jquery.waves-isotope.min.js');
    
    // if(lovely_option('sidebar_affix')==='on'){
    //     wp_enqueue_script('lovely-theiastickysidebar', THEME_DIR . '/assets/js/theiaStickySidebar.js', false, false, true);
    // }
    // wp_enqueue_script('lovely-script', THEME_DIR . '/assets/js/waves-script.js');
}


function add_isotope() {
    wp_register_script( 'wps-isotope', WPS_THEME_URI .'/assets/js/vendor/isotope.pkgd.js', array('jquery'),  true );
    wp_register_script( 'wps-isotope-packery', WPS_THEME_URI .'/assets/js/vendor/packery-mode.pkgd.js', array('jquery','wps-isotope'),  true );
    //wp_register_script( 'isotope2', 'https://unpkg.com/isotope-layout@3.0/dist/isotope.pkgd.js', array('jquery'),  true );
    //wp_register_script( 'isotope-init', WPS_THEME_URI .'/js/isotope.js', array('jquery', 'isotope'),  true );
    //wp_register_style( 'isotope-css2', WPS_THEME_URI . 'assets/css/isotope.css' );

    wp_enqueue_script('wps-isotope');
    wp_enqueue_script('wps-isotope-packery');
    //wp_enqueue_style('isotope-css2');
}

add_action( 'wp_enqueue_scripts', 'add_isotope' );