<?php
/**
 * Plugin generic functions file
 *
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Update default settings
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_default_settings() {
	
	global $fmgc_pro_options;
	
	$fmgc_pro_options = array(
		'fmgc_background_color'		=> '',
		'fmgc_widget_title_color'	=> '',
		'fmgc_widget_anchor_color'	=> '',
		'fmgc_widget_content_color'	=> '',
		'footer_width'				=> '',
		'custom_css' 				=> '',
	);

	$default_options = apply_filters('fmgc_pro_options_default_values', $fmgc_pro_options );
	
	// Update default options
	update_option( 'fmgc_pro_options', $default_options );

	// Overwrite global variable when option is update
	$fmgc_pro_options = fmgc_pro_get_settings();
}

/**
 * Get Settings From Option Page
 * 
 * Handles to return all settings value
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_get_settings() {
	
	$options = get_option('fmgc_pro_options');
	
	$settings = is_array($options) 	? $options : array();
	
	return $settings;
}

/**
 * Get an option
 * Looks to see if the specified setting exists, returns default if not
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_get_option( $key = '', $default = false ) {
	global $fmgc_pro_options;

	$value = ! empty( $fmgc_pro_options[ $key ] ) ? $fmgc_pro_options[ $key ] : $default;
	$value = apply_filters( 'fmgc_pro_get_option', $value, $key, $default );
	return apply_filters( 'fmgc_pro_get_option_' . $key, $value, $key, $default );
}

/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_esc_attr($data) {
	return esc_attr( stripslashes($data) );
}

/**
 * Strip Slashes From Array
 *
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_slashes_deep($data = array(), $flag = false) {
	
	if($flag != true) {
		$data = fmgc_pro_nohtml_kses($data);
	}
	$data = stripslashes_deep($data);
	return $data;
}

/**
 * Strip Html Tags 
 * 
 * It will sanitize text input (strip html tags, and escape characters)
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_nohtml_kses($data = array()) {
	
	if ( is_array($data) ) {
		
		$data = array_map('fmgc_pro_nohtml_kses', $data);
		
	} elseif ( is_string( $data ) ) {
		$data = trim( $data );
		$data = wp_filter_nohtml_kses($data);
	}
	
	return $data;
}

/**
* Function to display widget area
* 
* @package Footer Mega Grid Columns Pro
* @since 1.0.0
*/
function fmgc_pro_display_widgets(){

	if ( is_active_sidebar( 'fmgc-footer-widget-pro' ) ) : ?>
		<div class="footer-mega-col">
			<div class="footer-mega-col-wrap">
	           <?php  dynamic_sidebar( 'fmgc-footer-widget-pro' ); ?>
			 </div>  
		</div>
	<?php endif;
}