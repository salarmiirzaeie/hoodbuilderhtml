<?php
/**
 * Settings Page
 *
 * @package Footer Mega Grid Columns Pro
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>

<div class="wrap fmgc-pro-settings">

<h2><?php _e( 'Footer Mega Grid Columns Pro Settings', 'footer-mega-grid-columns' ); ?></h2><br />

<?php
// Success message
if( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) {
	echo '<div id="message" class="updated notice notice-success is-dismissible">
			<p>'.__("Your changes saved successfully.", "footer-mega-grid-columns").'</p>
		  </div>';
}
?>

<form action="options.php" method="POST" id="fmgc-pro-settings-form" class="fmgc-pro-settings-form">

	<?php
	    settings_fields( 'fmgc_pro_plugin_options' );
	    global $fmgc_pro_options;
	?>

	<!-- General Settings Starts -->
	<div id="fmgc-pro-general-sett" class="post-box-container fmgc-pro-general-sett">
		<div class="metabox-holder">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox">

					<button class="handlediv button-link" type="button"><span class="toggle-indicator"></span></button>

						<!-- Settings box title -->
						<h3 class="hndle">
							<span><?php _e( 'General Settings', 'footer-mega-grid-columns' ); ?></span>
						</h3>
						
						<div class="inside">
						
						<table class="form-table fmgc-pro-general-sett-tbl">
							<tbody>
								
								<tr>
									<th scope="row">
										<label for="fmgc-footer-background"><?php _e('Footer Background Color', 'footer-mega-grid-columns'); ?></label>
									</th>
									<td>
										<input type="text" name="fmgc_pro_options[fmgc_background_color]" class="fmgc-footer-background fmgc-color-box" id="fmgc-footer-background" value="<?php echo fmgc_pro_esc_attr(fmgc_pro_get_option('fmgc_background_color')); ?>" ><br/>
										<span class="description"><?php _e('Select footer background color.', 'footer-mega-grid-columns'); ?></span>
									</td>
								</tr>

								<tr>
									<th scope="row">
										<label for="fmgc-widget-title"><?php _e('Widget Title Color', 'footer-mega-grid-columns'); ?></label>
									</th>
									<td>
										<input type="text" name="fmgc_pro_options[fmgc_widget_title_color]" class="fmgc-color-box fmgc-widget-title" id="fmgc-widget-title" value="<?php echo fmgc_pro_esc_attr(fmgc_pro_get_option('fmgc_widget_title_color')); ?>" ><br/>
										<span class="description"><?php _e('Select color for widget title.', 'footer-mega-grid-columns'); ?></span>
									</td>
								</tr>
								
								<tr>
									<th scope="row">
										<label for="fmgc-anchor-tag-color"><?php _e('Widget Anchor Tag Color', 'footer-mega-grid-columns'); ?></label>
									</th>
									<td>
										<input type="text" name="fmgc_pro_options[fmgc_widget_anchor_color]" class="fmgc-color-box fmgc-anchor-tag-color" id="fmgc-anchor-tag-color" value="<?php echo fmgc_pro_esc_attr(fmgc_pro_get_option('fmgc_widget_anchor_color')); ?>" ><br/>
										<span class="description"><?php _e('Select color for widget link.', 'footer-mega-grid-columns'); ?></span>
									</td>
								</tr>
								
								<tr>
									<th scope="row">
										<label for="fmgc-widget-content-color"><?php _e('Widget Content Color', 'footer-mega-grid-columns'); ?></label>
									</th>
									<td>
										<input type="text" name="fmgc_pro_options[fmgc_widget_content_color]" class="fmgc-color-box fmgc-widget-content-color" id="fmgc-widget-content-color" value="<?php echo fmgc_pro_esc_attr(fmgc_pro_get_option('fmgc_widget_content_color')); ?>" ><br/>
										<span class="description"><?php _e('Select color for widget content.', 'footer-mega-grid-columns'); ?></span>
									</td>
								</tr>
								<tr>
									<th scope="row">
										<label for="fmgc-footer-width"><?php _e('Footer inner Wrap width', 'footer-mega-grid-columns'); ?></label>
									</th>
									<td>
										<input type="number" value="<?php echo fmgc_pro_esc_attr(fmgc_pro_get_option('footer_width')); ?>" name="fmgc_pro_options[footer_width]" class="medium-text fmgc-footer-width" id="fmgc-footer-width" /> px<br/>
										<span class="description"><?php _e('Enter inner Wrap width of footer in PX. For example : 1200. By default value is 100%', 'footer-mega-grid-columns'); ?></span>
									</td>
								</tr>
								<tr>
									<th scope="row">
										<label for="fmgc-custom-css"><?php _e('Custom CSS', 'footer-mega-grid-columns'); ?></label>
									</th>
									<td>
										<textarea name="fmgc_pro_options[custom_css]" class="large-text fmgc-custom-css" id="fmgc-custom-css" rows="15"><?php echo fmgc_pro_esc_attr(fmgc_pro_get_option('custom_css')); ?></textarea><br/>
										<span class="description"><?php _e('Enter custom CSS to override plugin CSS.', 'footer-mega-grid-columns'); ?></span>
									</td>
								</tr>
								<tr>
									<td colspan="2" valign="top" scope="row">
										<input type="submit" id="fmgc-settings-submit" name="fmgc-settings-submit" class="button button-primary right" value="<?php _e('Save Changes','footer-mega-grid-columns'); ?>" />
									</td>
								</tr>
							</tbody>
						 </table>

					</div><!-- .inside -->
				</div><!-- #custom-css -->
			</div><!-- .meta-box-sortables ui-sortable -->
		</div><!-- .metabox-holder -->
	</div><!-- #fmgc-pro-general-sett -->
	<!-- General Settings Ends -->

</form><!-- end .fmgc-pro-settings-form -->

</div><!-- end .fmgc-pro-settings -->