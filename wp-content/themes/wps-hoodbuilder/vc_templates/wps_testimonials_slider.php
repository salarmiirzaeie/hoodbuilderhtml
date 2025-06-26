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
<div class="wps-testimonials-container <?php echo esc_attr($css_class) . vc_shortcode_custom_css_class($css, ' '); ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-heading"><?php echo $section_title; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="wps-testimonial-slider owl-carousel owl-theme">
                    <?php echo wpb_js_remove_wpautop($content); ?>
                </div>
            </div>
	        <?php if ( $testimonial_page_link ): ?>

            <div class="col-md-12">
                    <div class="testimonial-btn">
                    <a class="btn-default blue" href="<?php echo $testimonial_page_link; ?>">View All Testimonials</a>
                    </div>
            </div>
	        <?php endif; ?>

        </div>
    </div>
</div>