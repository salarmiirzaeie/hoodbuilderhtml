<?php
/**
 * Theme Functions
 *
 * @package WPS_Base
 * @author Seyed
 * @link http://wpsailor.com
 */


/* ---------------------------------------------------------------------------
 * Load Required Files
 * --------------------------------------------------------------------------- */
require_once( WPS_THEME_DIR .'/framework/theme-support.php' );
require_once( WPS_THEME_DIR .'/framework/enqueue-scripts.php' );
require_once( WPS_THEME_DIR .'/framework/core/WPSThemeHelper.php' );
require_once( WPS_THEME_DIR .'/framework/core/post-views.php' );
require_once( WPS_THEME_DIR .'/framework/core/popular-post.php' );
require_once( WPS_THEME_DIR .'/framework/wps-functions.php' );
require_once( WPS_THEME_DIR .'/framework/sidebar-register.php' );
require_once( WPS_THEME_DIR .'/framework/lib/visual-composer/init.php' );


/**
 * ReduxFramework Theme Options
 */


if (!class_exists('ReduxFramework') && file_exists(dirname(__FILE__) . '/lib/redux-framework/ReduxCore/framework.php')) {
	require_once(dirname(__FILE__) . '/lib/redux-framework/ReduxCore/framework.php');
}
if (!isset($redux_demo) && file_exists(dirname(__FILE__) . '/lib/redux-framework/config/config.php')) {
	require_once(dirname(__FILE__) . '/lib/redux-framework/config/config.php');
}





