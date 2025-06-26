<?php
/**
 *	Clients Logo Shortcode
 *
 *	WPSailor
 *	www.wpsailor.com
 */

global $client_logo_index;

if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );

//if ( strpos( $description, '#E-' ) !== false ) {
//	$description = vc_value_from_safe( $description );
//	$description = nl2br( $description );
//}

// Element Class
$class = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );

// If no image return empty
if( ! $image){
	return;
}

$section_image = wps_vc_image($image);


?>

	<li class="client-logo-homepage-item <?php echo esc_attr( $css_class ); ?>">
        <img src="<?php echo $section_image; ?>" alt="">
	</li>

<?php


# End of File
$client_logo_index++;