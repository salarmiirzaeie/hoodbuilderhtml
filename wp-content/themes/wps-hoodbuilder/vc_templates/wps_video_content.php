<?php
/**
 *    Video Content
 */

# Atts
$defaults = array(
    'title' => '',
    'video_type' => '',
    'video_url' => '',
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


$output = '';

// Single Video in iFrame
if (($video_type == "youtube")) {
    $video_path = TS_VCSC_VideoID_Youtube($video_url);

    // $output .= $overlay_start;
    $output .= '<div class="video-content ' . esc_attr($css_class) . vc_shortcode_custom_css_class($css, ' ') .'">';

    $output .= '<div class="fluid-width-video-wrapper">';
    $output .= '<div class="video-container">';
    $output .= '<iframe class="ts-video-iframe" width="100%" height="auto" src="https://www.youtube.com/embed/' . $video_path . '?rel=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
    $output .= '</div>';
    $output .= '</div>';
    if(!empty($title)) {
        $output .= '<h4>' . esc_attr($title) . '</h4>';
    }
    $output .= '</div>';
}

if (($video_type == "vimeo")) {
    $video_path = TS_VCSC_VideoID_Vimeo($video_url);

    $output .= '<div class="video-content ' . esc_attr($css_class) . vc_shortcode_custom_css_class($css, ' ') .'">';

    $output .= '<div class="fluid-width-video-wrapper">';
    $output .= '<div class="video-container">';
    $output .= '<iframe class="ts-video-iframe" src="https://player.vimeo.com/video/' . $video_path . '" width="100%" height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
    $output .= '</div>';
    $output .= '</div>';
    if(!empty($title)) {
        $output .= '<h4>' . esc_attr($title) . '</h4>';
    }
    $output .= '</div>';
}

echo $output;

?>

