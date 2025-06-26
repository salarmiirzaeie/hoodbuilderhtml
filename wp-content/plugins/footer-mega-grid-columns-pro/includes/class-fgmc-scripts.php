<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Fmgc_Pro_Script {
	
	function __construct() {
		
		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'fmgc_pro_front_style') );
		
		// Action to add script at admin side
		add_action( 'admin_enqueue_scripts', array($this, 'fmgc_pro_admin_style') );

		// Action to add script at admin side
		add_action( 'admin_enqueue_scripts', array($this, 'fmgc_pro_admin_script') );
		
		// Action to add custom css in head
		add_action( 'wp_head', array($this, 'fmgc_pro_add_custom_css'), 20 );
	}

	/**
	 * Function to add style at front side
	 * 
	 * @package Footer Mega Grid Columns Pro
	 * @since 1.0.0
	 */
	function fmgc_pro_front_style() {
		
		// Registring and enqueing public css
		wp_register_style( 'fmgc-pro-public-style', FMGC_PRO_URL.'assets/css/fmgc-pro-public.css', array(), FMGC_PRO_VERSION );
		wp_enqueue_style( 'fmgc-pro-public-style' );
	}

	/**
	 * Enqueue admin script
	 * 
	 * @package Footer Mega Grid Columns Pro
	 * @since 1.0.0
	 */
	function fmgc_pro_admin_style( $hook ) {

		global $pagenow;

		$pages_arr = array('toplevel_page_fmgc-pro-settings');

		// If page is plugin setting page then enqueue script
		if( in_array($hook, $pages_arr) ) {

			// Enqueu built-in script for color picker
			wp_enqueue_style( 'wp-color-picker' );
		}

		if( $hook == 'widgets.php' ) {
			// Registring and enqueing admin css
			wp_register_style( 'fmgc-pro-admin-style', FMGC_PRO_URL.'assets/css/fmgc-pro-admin.css', array(), FMGC_PRO_VERSION );
			wp_enqueue_style( 'fmgc-pro-admin-style' );
		}
	}

	/**
	 * Enqueue admin script
	 * 
	 * @package Footer Mega Grid Columns Pro
	 * @since 1.0.0
	 */
	function fmgc_pro_admin_script( $hook ) {

		$pages_arr = array('toplevel_page_fmgc-pro-settings');

		// If page is plugin setting page then enqueue script
		if( in_array($hook, $pages_arr) ) {

			// Enqueu built-in script for color picker
			wp_enqueue_script( 'wp-color-picker' );

			wp_register_script( 'fmgc-admin-js', FMGC_PRO_URL.'assets/js/fmgc-admin-script.js', array('jquery'), FMGC_PRO_VERSION, true );			
			wp_enqueue_script( 'fmgc-admin-js' );
		}
	}

	/**
	 * Add custom css to head
	 * 
	 * @package Footer Mega Grid Columns Pro
	 * @since 1.0.0
	 */
	function fmgc_pro_add_custom_css() {

		$custom_css 	= fmgc_pro_get_option('custom_css');
		$sidebar_bg 	= fmgc_pro_get_option('fmgc_background_color');
		$title_color 	= fmgc_pro_get_option('fmgc_widget_title_color');
		$anchor_color 	= fmgc_pro_get_option('fmgc_widget_anchor_color');
		$content_color 	= fmgc_pro_get_option('fmgc_widget_content_color');
		$footer_width 	= fmgc_pro_get_option('footer_width');
		
		$css  = '<style type="text/css">' . "\n";
		if( !empty($sidebar_bg) ) {
			$css .= '.footer-mega-col{background:'.$sidebar_bg.'}';
		}
		if( !empty($footer_width) ) {
			$css .= '.footer-mega-col-wrap{max-width:'.$footer_width.'px}';
		}
		if( !empty($title_color) ) {
			$css .= '.footer-mega-col .widget-title{color:'.$title_color.';}';
		}
		if( !empty($anchor_color) ) {
			$css .= '.footer-mega-col a{color:'.$anchor_color.' !important;}';
		}
		if( !empty($content_color) ) {
			$css .= '.footer-mega-col .textwidget{color:'.$content_color.';}';
			$css .= '.footer-mega-col p{color:'.$content_color.';}';
			$css .= '.footer-mega-col .widget{color:'.$content_color.';}';
		}
		$css .= $custom_css;
		$css .= "\n" . '</style>' . "\n";
		echo $css;
	}
}

$fmgc_pro_script = new Fmgc_Pro_Script();