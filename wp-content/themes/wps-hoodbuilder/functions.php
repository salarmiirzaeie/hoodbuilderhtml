<?php
/**
 * Theme Functions
 *
 * @package WPS_Base
 * @author Seyed
 * @link http://wpsailor.com
 */

define( 'WPS_THEME_DIR', get_template_directory() );
define( 'WPS_THEME_URI', get_template_directory_uri() );
define( 'WPS_STYLESHEET_PATH', get_stylesheet_directory());
define( 'WPS_STYLESHEET_DIR', get_stylesheet_directory_uri());
define( 'WPS_CORE_PLUGIN', WP_PLUGIN_DIR.'/designthemes-core-features' );
define( 'WPS_SETTINGS', 'wps-base-opts' );


if (function_exists ('wp_get_theme')) :
	$themeData = wp_get_theme();
	define( 'THEME_NAME', $themeData->get('Name'));
	define( 'THEME_VERSION', $themeData->get('Version'));
endif;


/* ---------------------------------------------------------------------------
 * Loads the Options Panel
 * --------------------------------------------------------------------------- */
require_once( WPS_THEME_DIR .'/framework/init.php' );

add_filter( 'wpseo_json_ld_output', '__return_false' );