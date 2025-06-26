<?php
/**
 *    Get a Free Quote
 *
 *    WPSailor
 *    www.wpsailor.com
 */


# Atts
$defaults = array(
	'el_class' => '',
	'css'      => '',
);

#$atts = vc_shortcode_attribute_parse( $defaults, $atts );
if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );




?>

<div class="wps-homepage-get-free-quote-wrap">
    <div class="meet-the-doctor-details">
        <div class="h2tospan">
            <span><?php echo esc_html( $section_title ); ?></span>
        </div>
        <div class="section-description">
			<?php echo apply_filters( 'the_content', $content ); ?>
        </div>
    </div>
</div>




