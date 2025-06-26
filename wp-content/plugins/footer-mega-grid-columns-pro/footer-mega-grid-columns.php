<?php
/**
* Plugin Name: Footer Mega Grid Columns Pro
* Plugin URI: https://www.wponlinesupport.com
* Description: Footer Mega Grid Columns - Register a widget area for your theme and allow you to add and display widgets in grid view with multiple columns.
* Author: WP Online Support
* Author URI: https://www.wponlinesupport.com
* Text Domain: footer-mega-grid-columns
* Domain Path: languages
* Version: 1.1.1
*
* @package Footer Mega Grid Columns Pro
* @author WP Online Support
*/

/**
 * Basic plugin definitions
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
if( !defined( 'FMGC_PRO_VERSION' ) ) {
	define( 'FMGC_PRO_VERSION', '1.1.1' ); // Version of plugin
}
if( !defined( 'FMGC_PRO_DIR' ) ) {
    define( 'FMGC_PRO_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'FMGC_PRO_URL' ) ) {
    define( 'FMGC_PRO_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'FMGC_PRO_PLUGIN_BASENAME' ) ) {
	define( 'FMGC_PRO_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); // plugin base name
}


/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_load_textdomain() {

    global $wp_version;

    // Set filter for plugin's languages directory
    $fmgc_pro_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
    $fmgc_pro_lang_dir = apply_filters( 'fmgc_pro_languages_directory', $fmgc_pro_lang_dir );
    
    // Traditional WordPress plugin locale filter.
    $get_locale = get_locale();

    if ( $wp_version >= 4.7 ) {
        $get_locale = get_user_locale();
    }

    // Traditional WordPress plugin locale filter
    $locale = apply_filters( 'plugin_locale',  $get_locale, 'footer-mega-grid-columns' );
    $mofile = sprintf( '%1$s-%2$s.mo', 'footer-mega-grid-columns', $locale );

    // Setup paths to current locale file
    $mofile_global  = WP_LANG_DIR . '/plugins/' . basename( FMGC_PRO_DIR ) . '/' . $mofile;

    if ( file_exists( $mofile_global ) ) { // Look in global /wp-content/languages/plugin-name folder
        load_textdomain( 'footer-mega-grid-columns', $mofile_global );
    } else { // Load the default language files
        load_plugin_textdomain( 'footer-mega-grid-columns', false, $fmgc_pro_lang_dir );
    }
}
add_action('plugins_loaded', 'fmgc_pro_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'fmgc_pro_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'fmgc_pro_uninstall');

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * stest default values for the plugin options.
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_install() {

	// Set default settings
    fmgc_pro_default_settings();
    
	// Deactivate free version
	if( is_plugin_active('footer-mega-grid-columns/footer-mega-grid-columns.php') ){
		add_action('update_option_active_plugins', 'fmgc_pro_deactivate_free_version');
	}
}

/**
 * Plugin Setup (On Deactivation)
 * 
 * Delete  plugin options.
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_uninstall() {
}

/**
 * Deactivate free plugin
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_deactivate_free_version() {
	deactivate_plugins('footer-mega-grid-columns/footer-mega-grid-columns.php', true);
}

/**
 * Function to display admin notice of activated plugin.
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_admin_notice() {
    
    $dir = WP_PLUGIN_DIR . '/footer-mega-grid-columns/footer-mega-grid-columns.php';
    
    // If PRO plugin is active and free plugin exist
    if( is_plugin_active( 'footer-mega-grid-columns-pro/footer-mega-grid-columns.php' ) && file_exists($dir) ) {
        
        global $pagenow;

        if( $pagenow == 'plugins.php' && current_user_can('install_plugins') ) {
			echo '<div id="message" class="updated notice is-dismissible"><p><strong>Thank you for activating  Footer Mega Grid Columns Pro</strong>.<br /> It looks like you had FREE version <strong>(<em> Footer Mega Grid Columns</em>)</strong> of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it. </p></div>';
        }
    }
}
add_action( 'admin_notices', 'fmgc_pro_admin_notice');

/***** Updater Code Starts *****/
define( 'EDD_FMGC_PRO_STORE_URL', 'https://www.wponlinesupport.com' );
define( 'EDD_FMGC_PRO_ITEM_NAME', 'Footer Mega Grid Columns Pro' );

// Plugin Updator Class 
if( !class_exists( 'EDD_SL_Plugin_Updater' ) ) {    
    include( dirname( __FILE__ ) . '/EDD_SL_Plugin_Updater.php' );
}

/**
 * Updater Function
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_plugin_updater() {
    
    $license_key = trim( get_option( 'fmgc_pro_plugin_license_key' ) );

    $edd_updater = new EDD_SL_Plugin_Updater( EDD_FMGC_PRO_STORE_URL, __FILE__, array(
                'version'   => FMGC_PRO_VERSION,            // current version number
                'license'   => $license_key,                // license key (used get_option above to retrieve from DB)
                'item_name' => EDD_FMGC_PRO_ITEM_NAME,      // name of this plugin
                'author'    => 'WP Online Support'          // author of this plugin
            )
    );
}
add_action( 'admin_init', 'fmgc_pro_plugin_updater', 0 );
include( dirname( __FILE__ ) . '/fmgc-plugin-updater.php' );
/***** Updater Code Ends *****/

// Taking some globals
global $fmgc_pro_options;

// Functions File
require_once( FMGC_PRO_DIR . '/includes/fmgc-functions.php' );
$fmgc_pro_options = fmgc_pro_get_settings();

// Script Class File
require_once( FMGC_PRO_DIR . '/includes/class-fgmc-scripts.php' );

// Admin Class File
require_once( FMGC_PRO_DIR . '/includes/admin/class-fmgcp-admin.php' );

// Load admin files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
    
    // Plugin design file
    require_once( FMGC_PRO_DIR . '/includes/admin/fmgc-how-it-work.php' );
}