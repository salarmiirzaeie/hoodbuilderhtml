<?php
/**
 *    Visual Composer Init
 *
 *    WPSailor
 *    www.wpsailor.com
 */

// If its not active disable these functions
$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );

if ( is_array( $active_plugins ) && ! in_array( 'js_composer/js_composer.php', $active_plugins ) && function_exists( 'vc_map' ) == false ) {
	return;
} else if ( function_exists( 'vc_map' ) == false ) {
	return;
}


// Set Visual Composer As Theme Mode
add_action( 'vc_before_init', 'wps_visual_composer_init' );

function wps_visual_composer_init() {
	vc_set_as_theme();
}


// Support for Shortcodes
$wps_vc_shortcodes_path = WPS_THEME_DIR . '/framework/lib/visual-composer/shortcodes/';

$wps_vc_shortcodes = array(
	'wps_clients_logo_homepage',
	'wps_clients_logo',
	'wps_get_a_free_quote',
	'wps_featured_text_content',
	'wps_testimonials_slider',
	'wps_testimonials_slider_homepage',
	'wps_testimonials_isotope',
	'wps_sidebar_related_links',
	'wps_sidebar_button',
	'wps_contact_address'
);


foreach ( $wps_vc_shortcodes as $shortcode_template ) {
	include_once $wps_vc_shortcodes_path . $shortcode_template . '/init.php';
}

$wps_vc_curr_path = WPS_THEME_DIR . '/framework/lib/visual-composer/';

// Customizations
//require_once $wps_vc_curr_path . 'vc-tweaks.php';
require_once $wps_vc_curr_path . 'custom-rows.php';


// Admin Styles
//add_action( 'admin_enqueue_scripts', 'wps_vc_styles' );

function wps_vc_styles() {

	$wps_vc_style = WPS_THEME_DIR . 'framework/lib/visual-composer/assets/wps_vc_main.css';

	wp_enqueue_style( 'wps_vc_main', $wps_vc_style );
}

