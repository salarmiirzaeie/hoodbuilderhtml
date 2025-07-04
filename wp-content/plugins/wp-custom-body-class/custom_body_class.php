<?php
/*
Plugin Name: Custom Body Class
Plugin URI:  https://a.lup.dev
Description: A plugin which allows you to add a custom CSS class the HTML body tag
Version: 0.7.4
Author: Andrei Lupu
Author URI: https://a.lup.dev
Author Email: euthelup@gmail.com
Text Domain: wp-custom-body-class
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Domain Path: /lang
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// ensure EXT is defined
if ( ! defined( 'EXT' ) ) {
	define( 'EXT', '.php' );
}

require 'core/bootstrap' . EXT;

$config = include 'plugin-config' . EXT;

// set textdomain
custom_body_class::settextdomain( $config['textdomain'] );

$defaults = include 'plugin-defaults' . EXT;

$current_data = get_option( $config['settings-key'] );

if ( $current_data === false ) {
	add_option( $config['settings-key'], $defaults );
} else if ( count( array_diff_key( $defaults, $current_data ) ) != 0 ) {
	$plugindata = array_merge( $defaults, $current_data );
	update_option( $config['settings-key'], $plugindata );
}
# else: data is available; do nothing

// Load Callbacks
// --------------

$basepath     = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;
$callbackpath = $basepath . 'callbacks' . DIRECTORY_SEPARATOR;
custom_body_class::require_all( $callbackpath );

require_once( plugin_dir_path( __FILE__ ) . 'class-custom_body_class.php' );

if ( ! function_exists( 'init_custom_body_class_plugin' ) ) {
	function init_custom_body_class_plugin () {
		global $custom_body_class_plugin;
		$custom_body_class_plugin = CustomBodyClassPlugin::get_instance();
	}
}

add_action('init', 'init_custom_body_class_plugin');
