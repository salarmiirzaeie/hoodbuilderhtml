<?php
/**
 *    Featured Text Content
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


$wrap_class = $content_type;

$section_image = wps_vc_image( $image );


if($content_type == 'style1') {
	//include(locate_template('template-featured-content-style1.php'));
	//get_template_part('template-featured-content-style1');
	include_once( WPS_THEME_DIR .'/vc_templates/template-featured-content-style1.php' );
} else if($content_type == 'style2') {
	include_once( WPS_THEME_DIR .'/vc_templates/template-featured-content-style2.php' );
} else if($content_type == 'style3') {
	include_once( WPS_THEME_DIR .'/vc_templates/template-featured-content-style3.php' );
}

?>



