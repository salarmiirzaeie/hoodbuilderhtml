<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package Footer Mega Grid Columns Pro
 * @since 1.1.1
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Fmgc_Pro_Admin {

	function __construct() {
		
		// Action to register admin menu
		add_action( 'admin_menu', array($this, 'fmgc_pro_register_menu') );

		// Action to register plugin settings
		add_action ( 'admin_init', array($this,'fmgc_pro_register_settings') );

		// Register widget sidebar area
		add_action( 'widgets_init', array($this , 'fmgc_pro_widgets_init' ) );

		// Add an extra fields in widget
		add_filter('in_widget_form', array($this, 'fmgc_pro_add_grid_option' ), 10, 3 );

		// saving widget fields
		add_filter( 'widget_update_callback', array($this, 'fmgc_pro_save_widget_options' ), 10, 4 );

		// Add dynamic grid calss in widget
		add_filter('dynamic_sidebar_params', array($this, 'fmgc_pro_add_dynamic_classes_to_widget'), 10);

		// Filter to add plugin links
		add_filter( 'plugin_row_meta', array( $this, 'fmgc_pro_plugin_row_meta' ), 10, 2 );
	}

	/**
	 * Function to register admin menus
	 * 
	 * @package Footer Mega Grid Columns Pro
	 * @since 1.0.0
	 */
	function fmgc_pro_register_menu() {
		add_menu_page(  __('Footer Mega Grid Columns - Pro Settings', 'footer-mega-grid-columns'), __('Footer Mega Grid Columns - Pro', 'footer-mega-grid-columns'), 'manage_options', 'fmgc-pro-settings', array($this, 'fmgc_pro_settings_page'), 'dashicons-align-left' );
	}

	/**
	 * Function to handle the setting page html
	 * 
	 * @package Footer Mega Grid Columns Pro
	 * @since 1.0.0
	 */
	function fmgc_pro_settings_page() {
		include_once( FMGC_PRO_DIR . '/includes/admin/settings/fmgc-settings.php' );
	}

	/**
	 * Function register setings
	 * 
	 * @package Footer Mega Grid Columns Pro
	 * @since 1.0.0
	 */
	function fmgc_pro_register_settings() {
		register_setting( 'fmgc_pro_plugin_options', 'fmgc_pro_options', array($this, 'fmgc_pro_validate_options') );
	}

	/**
	 * Validate Settings Options
	 * 
	 * @package Footer Mega Grid Columns Pro
	 * @since 1.0.0
	 */
	function fmgc_pro_validate_options( $input ) {
		
		$input['fmgc_background_color'] 	= isset($input['fmgc_background_color']) 		? fmgc_pro_slashes_deep($input['fmgc_background_color']) 		: '';
		$input['fmgc_widget_title_color'] 	= isset($input['fmgc_widget_title_color']) 		? fmgc_pro_slashes_deep($input['fmgc_widget_title_color']) 		: '';
		$input['fmgc_widget_anchor_color'] 	= isset($input['fmgc_widget_anchor_color']) 	? fmgc_pro_slashes_deep($input['fmgc_widget_anchor_color']) 	: '';
		$input['fmgc_widget_content_color'] = isset($input['fmgc_widget_content_color']) 	? fmgc_pro_slashes_deep($input['fmgc_widget_content_color']) 	: '';
		$input['footer_width'] 				= isset($input['footer_width']) 				? fmgc_pro_slashes_deep($input['footer_width']) 				: '';
		$input['custom_css'] 				= isset($input['custom_css']) 					? fmgc_pro_slashes_deep($input['custom_css'], true) 			: '';
		
		return $input;
	}

	/**
	* Function to register widget sidebar area
	* 
	* @package Footer Mega Grid Columns Pro
	* @since 1.0.0
	*/
	function fmgc_pro_widgets_init() {

		// Some element to filter
		$fmgc_pro_widgets_args = apply_filters('fmgc_pro_options_default_values', array(
										'before_widget' => '<aside id="%1$s" class="widget fmgcp-columns %2$s">',
										'after_widget' 	=> '</aside>',
										'before_title' 	=> '<h4 class="widget-title">',
										'after_title' 	=> '</h4>',
									));

		// Default args
		$fmgc_pro_widgets_default_args = array(
										'name' 			=> __( 'Footer Mega Grid Columns PRO', 'footer-mega-grid-columns' ),
										'id' 			=> 'fmgc-footer-widget-pro',
										'description' 	=> __( 'Footer Mega Grid Columns Pro - Register a widget area for your theme and allow you to add and display widgets in grid view.', 'footer-mega-grid-columns' ),
										'before_widget' => '<aside id="%1$s" class="widget fmgcp-columns %2$s">',
										'after_widget' 	=> '</aside>',
										'before_title' 	=> '<h4 class="widget-title">',
										'after_title' 	=> '</h4>',
									);
		$fmgc_pro_widgets_args = wp_parse_args( $fmgc_pro_widgets_args, $fmgc_pro_widgets_default_args );
		
		register_sidebar( $fmgc_pro_widgets_args ); // Register widget
	}

	/**
	* Adding extra field in every widget
	* 
	* @package Footer Mega Grid Columns Pro
	* @since 1.0.0
	*/
	function fmgc_pro_add_grid_option( $widget, $return, $instance ) {

        // Display the description option.
        $grid 		= isset( $instance['widget_grid'] ) 		? $instance['widget_grid'] 		: 'grid-4';
        $css_class 	= isset( $instance['widget_css_class'] ) 	? $instance['widget_css_class'] : '';
    ?>
    	<div class="fmgc-pro-widget-opts-wrp">
	        <hr>
	        <strong><?php _e('Footer Mega Grid Columns Settings', 'footer-mega-grid-columns'); ?>:</strong>
			<p>
		        <label for='<?php echo $widget->get_field_id('widget-grid'); ?>'><?php _e('Select the Grid', 'footer-mega-grid-columns'); ?>:
				    <select id='<?php echo $widget->get_field_id('widget-grid'); ?>' class='widefat' name='<?php echo $widget->get_field_name('widget_grid'); ?>'>
						<option value='grid-1' <?php selected($grid, 'grid-1' ); ?>><?php _e('Grid 1', 'footer-mega-grid-columns'); ?></option>
						<option value='grid-2' <?php selected($grid, 'grid-2' ); ?>><?php _e('Grid 2', 'footer-mega-grid-columns'); ?></option>
						<option value='grid-3' <?php selected($grid, 'grid-3' ); ?>><?php _e('Grid 3', 'footer-mega-grid-columns'); ?></option>
						<option value='grid-4' <?php selected($grid, 'grid-4' ); ?>><?php _e('Grid 4', 'footer-mega-grid-columns'); ?></option>
						<option value='grid-5' <?php selected($grid, 'grid-5' ); ?>><?php _e('Grid 5', 'footer-mega-grid-columns'); ?></option>
						<option value='grid-6' <?php selected($grid, 'grid-6' ); ?>><?php _e('Grid 6', 'footer-mega-grid-columns'); ?></option>
						<option value='grid-7' <?php selected($grid, 'grid-7' ); ?>><?php _e('Grid 7', 'footer-mega-grid-columns'); ?></option>
						<option value='grid-8' <?php selected($grid, 'grid-8' ); ?>><?php _e('Grid 8', 'footer-mega-grid-columns'); ?></option>
						<option value='grid-9' <?php selected($grid, 'grid-9' ); ?>><?php _e('Grid 9', 'footer-mega-grid-columns'); ?></option>
						<option value='grid-10' <?php selected($grid, 'grid-10' ); ?>><?php _e('Grid 10', 'footer-mega-grid-columns'); ?></option>
						<option value='grid-11' <?php selected($grid, 'grid-11' ); ?>><?php _e('Grid 11', 'footer-mega-grid-columns'); ?></option>
						<option value='grid-12' <?php selected($grid, 'grid-12' ); ?>><?php _e('Grid 12', 'footer-mega-grid-columns'); ?></option>
					</select>
				</label>
            </p>
            <p>
		        <label for='<?php echo $widget->get_field_id('widget-css-class'); ?>'><?php _e('CSS Class', 'footer-mega-grid-columns') ?>:
				    <input type="text" id='<?php echo $widget->get_field_id('widget-css-class'); ?>' class='widefat' name='<?php echo $widget->get_field_name('widget_css_class'); ?>' value="<?php echo fmgc_pro_esc_attr($css_class); ?>" />
				</label>
            </p>
	    </div><!-- end .fmgc-pro-widget-opts-wrp -->
	<?php
	}

	/**
	* Saving extra widget field
	* 
	* @package Footer Mega Grid Columns Pro
	* @since 1.1.1
	*/
	function fmgc_pro_save_widget_options( $instance, $new_instance, $old_instance, $widget_instance ) {
	
	    // Is the instance a nav menu and are descriptions enabled?
	    $instance['widget_grid'] 		= $new_instance['widget_grid'];
	    $instance['widget_css_class'] 	= fmgc_pro_slashes_deep($new_instance['widget_css_class']);

	    return $instance;
	}

	/**
	* Function to dynamic grid class
	* 
	* @package Footer Mega Grid Columns Pro
	* @since 1.0.0
	*/
	function fmgc_pro_add_dynamic_classes_to_widget($params) {

	    if ( isset($params[0]['id']) && $params[0]['id'] == "fmgc-footer-widget-pro") {
	  		
	  		$widgets_options_explode 	= explode('-', $params[0]['widget_id']);
			$widgets_options_sliced 	= array_slice($widgets_options_explode, 0, -1);
			$widgets_options_string 	= implode("-", $widgets_options_sliced);

			if( !empty($widgets_options_explode) ) {
				$widgets_options = get_option( 'widget_'.$widgets_options_string );

				$widgets_options 			= $widgets_options[end($widgets_options_explode)];
		        $widgets_grid_options 		= !empty($widgets_options['widget_grid']) ? $widgets_options['widget_grid'] : 'grid-4';
		        $widgets_css_class 			= fmgc_pro_esc_attr($widgets_options['widget_css_class']);

		        $classe_to_add 				= 'class="fmgcp-'.$widgets_grid_options.' '.$widgets_css_class.' ';
		        $params[0]['before_widget'] = str_replace('class="',$classe_to_add,$params[0]['before_widget']);
			}
	    }
	   	return $params;
	}

	/**
	 * Function to unique number value
	 * 
	 * @package Footer Mega Grid Columns Pro
	 * @since 1.0.0
	 */
	function fmgc_pro_plugin_row_meta( $links, $file ) {
		
		if ( $file == FMGC_PRO_PLUGIN_BASENAME ) {
			
			$row_meta = array(
				'docs'    => '<a href="' . esc_url('https://www.wponlinesupport.com/pro-plugin-document/document-footer-mega-grid-columns-pro/') . '" title="' . esc_attr( __( 'View Documentation', 'footer-mega-grid-columns' ) ) . '" target="_blank">' . __( 'Docs', 'footer-mega-grid-columns' ) . '</a>',
				'support' => '<a href="' . esc_url('https://www.wponlinesupport.com/welcome-wp-online-support-forum/') . '" title="' . esc_attr( __( 'Visit Customer Support Forum', 'footer-mega-grid-columns' ) ) . '" target="_blank">' . __( 'Support', 'footer-mega-grid-columns' ) . '</a>',
			);
			return array_merge( $links, $row_meta );
		}
		return (array) $links;
	}
}

$fmgc_pro_admin = new Fmgc_Pro_Admin();