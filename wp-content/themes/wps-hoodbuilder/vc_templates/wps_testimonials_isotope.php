<?php
/**
 *    Icon Box
 *
 *    WPSailor
 *    www.wpsailor.com
 */

# Atts
$defaults = array(
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

?>
<div class="wps-testimonials-isotope-wrap <?php echo esc_attr($css_class) . vc_shortcode_custom_css_class($css, ' '); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12">
                <div class="wps-testimonials-isotope">
                    <?php echo wpb_js_remove_wpautop($content); ?>
                </div>
            </div>
        </div>
    </div>
</div>