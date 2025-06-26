<?php
/**
 *    Treatment Section
 */

# Atts
$defaults = array(
	'image' => '',
	'link' => '',
	'title' => '',
	'content' => '',
	'el_class' => '',
	'css' => '',
);

#$atts = vc_shortcode_attribute_parse( $defaults, $atts );
if (function_exists('vc_map_get_attributes')) {
	$atts = vc_map_get_attributes($this->getShortcode(), $atts);
}

extract($atts);

# Element Class
$class = $this->getExtraClass($el_class);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts);

# Link
$link = $button_link;

$section_image = wps_vc_image($image);

$unique_id = 'wps-sidebar-btn-' . mt_rand( 100000, 999999 );
generate_custom_style( "#{$unique_id}", "background-image: url(\"{$section_image}\");", '',true );

?>
<div
        class="sidebar-widget-button-wrap <?php echo esc_attr($css_class) . vc_shortcode_custom_css_class($css, ' '); ?>">
    <div class="sidebar-widget-button">
        <a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($title); ?>">

            <div id="<?php echo $unique_id; ?>" class="sidebar-widget-button-details">
                <div class="sidebar-widget-button-text">
                    <p><?php echo esc_attr($title); ?></p>
                </div>
                <div class="sidebar-widget-arrow">
                    <img src="<?php echo WPS_THEME_URI; ?>/assets/images/icon-arrow-sidebar-services.svg" alt="">
                </div>
            </div>
        </a>
    </div>
</div>
