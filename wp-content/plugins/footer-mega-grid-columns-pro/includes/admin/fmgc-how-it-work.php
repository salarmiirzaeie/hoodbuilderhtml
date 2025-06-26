<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Action to add menu
add_action('admin_menu', 'fmgc_pro_register_design_page',25);

/**
 * Register plugin design page in admin menu
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_register_design_page() {
	add_submenu_page( 'fmgc-pro-settings', __('How it works, our plugins and offers', 'footer-mega-grid-columns'), __('How It Works', 'footer-mega-grid-columns'), 'manage_options', 'fmgc-pro-designs', 'fmgc_pro_designs_page' );
}

/**
 * Function to display plugin design HTML
 * 
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_designs_page() {

	$wpos_feed_tabs = fmgc_pro_help_tabs();
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'how-it-work';
?>
		
	<div class="wrap wpbawh-wrap">

		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpos_feed_tabs as $tab_key => $tab_val) {
				$tab_name	= $tab_val['name'];
				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array( 'page' => 'fmgc-designs', 'tab' => $tab_key), admin_url('admin.php') );
			?>

			<a class="nav-tab <?php echo $active_cls; ?>" href="<?php  echo $tab_link; ?>"><?php echo $tab_name; ?></a>

			<?php } ?>
		</h2>
		
		<div class="wpbawh-tab-cnt-wrp">
		<?php
			if( isset($active_tab) && $active_tab == 'how-it-work' ) {
				fmgc_pro_howitwork_page();
			}
			else if( isset($active_tab) && $active_tab == 'plugins-feed' ) {
				echo fgmc_pro_get_plugin_design( 'plugins-feed' );
			} else {
				echo fgmc_pro_get_plugin_design( 'offers-feed' );
			}
		?>
		</div><!-- end .wpbawh-tab-cnt-wrp -->

	</div><!-- end .wpbawh-wrap -->

<?php
}

/**
 * Gets the plugin design part feed
 *
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fgmc_pro_get_plugin_design( $feed_type = '' ) {
	
	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : '';
	
	// If tab is not set then return
	if( empty($active_tab) ) {
		return false;
	}

	// Taking some variables
	$wpos_feed_tabs = fmgc_pro_help_tabs();
	$transient_key 	= isset($wpos_feed_tabs[$active_tab]['transient_key']) 	? $wpos_feed_tabs[$active_tab]['transient_key'] 	: 'wpbawh_' . $active_tab;
	$url 			= isset($wpos_feed_tabs[$active_tab]['url']) 			? $wpos_feed_tabs[$active_tab]['url'] 				: '';
	$transient_time = isset($wpos_feed_tabs[$active_tab]['transient_time']) ? $wpos_feed_tabs[$active_tab]['transient_time'] 	: 172800;
	$cache 			= get_transient( $transient_key );
	
	if ( false === $cache ) {
		
		$feed 			= wp_remote_get( esc_url_raw( $url ), array( 'timeout' => 120, 'sslverify' => false ) );
		$response_code 	= wp_remote_retrieve_response_code( $feed );
		
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$cache = wp_remote_retrieve_body( $feed );
				set_transient( $transient_key, $cache, $transient_time );
			}
		} else {
			$cache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'footer-mega-grid-columns' ) . '</div>';
		}
	}
	return $cache;	
}

/**
 * Function to get plugin feed tabs
 *
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_help_tabs() {
	$wpos_feed_tabs = array(
						'how-it-work' 	=> array(
													'name' => __('How It Works', 'footer-mega-grid-columns'),
												),
						'plugins-feed' 	=> array(
													'name' 				=> __('Our Plugins', 'footer-mega-grid-columns'),
													'url'				=> 'http://wponlinesupport.com/plugin-data-api/plugins-data.php',
													'transient_key'		=> 'wpos_plugins_feed',
													'transient_time'	=> 172800
												),
						'offers-feed' 	=> array(
													'name'				=> __('WPOS Offers', 'footer-mega-grid-columns'),
													'url'				=> 'http://wponlinesupport.com/plugin-data-api/wpos-offers.php',
													'transient_key'		=> 'wpos_offers_feed',
													'transient_time'	=> 86400,
												)
					);
	return $wpos_feed_tabs;
}

/**
 * Function to get 'How It Works' HTML
 *
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */
function fmgc_pro_howitwork_page() { ?>
	
	<style type="text/css">
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box .postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.wpbawh-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.wpbawh-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
	</style>

	<div class="post-box-container">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
			
				<!--How it workd HTML -->
				<div id="post-body-content">
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
								
								<h3 class="hndle">
									<span><?php _e( 'How It Works - Display and shortcode', 'footer-mega-grid-columns' ); ?></span>
								</h3>
								
								<div class="inside">
									<table class="form-table">
										<tbody>
											<tr>
												<th>
													<label><?php _e('Getting Started with Footer Mega Grid Columns Pro', 'footer-mega-grid-columns'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1: This plugin create a "Settings - FMGC Pro" menu tab in WordPress menu and sidebar widget area in Appearance -> Widgets with  name Footer Mega Grid Columns PRO.', 'footer-mega-grid-columns'); ?></li>
														<li><?php _e('Step-2: Go to "Appearance -> Widgets".', 'footer-mega-grid-columns'); ?></li>
														<li><?php _e('Step-3: Add any type of widget in Footer Mega Grid Columns PRO Sidebar.', 'footer-mega-grid-columns'); ?></li>
													</ul>
												</td>
											</tr>

											<tr>
												<th>
													<label><?php _e('How Shortcode Works', 'footer-mega-grid-columns'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Paste below code in footer.php file of your active wordpress theme.', 'footer-mega-grid-columns'); ?></li>
														<li><pre><code> <?php echo "&lt;?php if( function_exists('fmgc_pro_display_widgets') ) { echo fmgc_pro_display_widgets(); } ?&gt;"; ?></code></pre></li>
													</ul>
												</td>
											</tr>
										</tbody>
									</table>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-body-content -->
				
				<!--Upgrad to Pro HTML -->
				<div id="postbox-container-1" class="postbox-container">
					<div class="metabox-holder wpos-pro-box">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox" style="">
									
								<h3 class="hndle">
									<span><?php _e('Need Support?', 'footer-mega-grid-columns'); ?></span>
								</h3>
								<div class="inside">
									<p><?php _e('Check plugin document for shortcode parameters and demo for designs.', 'footer-mega-grid-columns'); ?></p>
									<a class="button button-primary wpos-button-full" href="https://www.wponlinesupport.com/pro-plugin-document/document-footer-mega-grid-columns-pro/?utm_source=hp&event=doc" target="_blank"><?php _e('Documentation', 'footer-mega-grid-columns'); ?></a>
									<p><a class="button button-primary wpos-button-full" href="http://demo.wponlinesupport.com/prodemo/footer-mega-grid-columns/?utm_source=hp&event=pro_demo" target="_blank"><?php _e('View PRO Designs', 'footer-mega-grid-columns'); ?></a></p>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->

					<!-- Help to improve this plugin! -->
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
									<h3 class="hndle">
										<span><?php _e( 'Help to improve this plugin!', 'footer-mega-grid-columns' ); ?></span>
									</h3>
									<div class="inside">
										<p><?php _e('Enjoyed this plugin? You can help by rate this plugin', 'footer-mega-grid-columns'); ?> <a href="https://www.wponlinesupport.com/your-feedback/?utm_source=hp" target="_blank">5 stars!</a></p>
									</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-container-1 -->

			</div><!-- #post-body -->
		</div><!-- #poststuff -->
	</div><!-- #post-box-container -->
<?php }