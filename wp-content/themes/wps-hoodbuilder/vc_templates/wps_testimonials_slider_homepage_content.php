<?php
/**
 *	Box Content for Icon Box
 *	
 *	Laborator.co
 *	www.laborator.co 
 */

# Atts
$defaults = array(
	'testimonial_content'            => '',
	'client_name'      => '',
	'sub_title'             => '',
	'el_class'         => '',
	'css'              => ''
);

#$atts = vc_shortcode_attribute_parse($defaults, $atts);
if( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );

// If no image return empty
if( ! $image){
    return;
}

$section_image = wps_vc_image($image);

# Element Class
$class = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );

//$css_class = "icon-box-content text-alignment-{$text_alignment} " . $css_class;

?>
<div class="testimonial-slider-item <?php echo esc_attr($css_class) . vc_shortcode_custom_css_class($css, ' '); ?>">
	<div class="testimonial-content">
		<?php echo wpautop($testimonial_content); ?>
	</div>
    <div class="testimonial-thumb">
        <img src="<?php echo $section_image; ?>" alt="">
    </div>
    <div class="testimonial-client-details">
        <p class="client-name">
            <?php echo esc_html( $client_name ); ?>
            <?php if ( $sub_title ) : ?>
        <span class="client-title"><?php echo esc_html( $sub_title ); ?></span>
	    <?php endif; ?>
        </p>

    </div>
</div>
<?php
