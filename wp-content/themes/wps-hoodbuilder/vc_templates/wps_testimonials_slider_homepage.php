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

$section_image = wps_vc_image($video_image);

?>
<div class="wps-testimonials-homepage-wrap <?php echo esc_attr($css_class) . vc_shortcode_custom_css_class($css, ' '); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="testimonial-video-popup">
                    <a class="testimonial-popup" href="<?php echo $video_url; ?>"><img src="<?php echo $section_image; ?>" alt=""></a>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="section-heading"><?php echo $section_title; ?></h2>
                <div class="wps-testimonial-slider-homepage owl-carousel owl-theme">
                    <?php echo wpb_js_remove_wpautop($content); ?>
                </div>
            </div>
        </div>
    </div>
</div>