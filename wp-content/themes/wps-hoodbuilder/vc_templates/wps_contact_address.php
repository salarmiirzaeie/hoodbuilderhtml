<?php
/**
 *    Contact Address
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

<div class="wps-contact-address-wrap <?php echo $wrap_class; ?>">
    <div class="wps-contact-address">
        <div class="section-description">
            <h5><?php echo esc_html( $contact_title ); ?></h5>
            <p><?php echo esc_html( $contact_address ); ?><br>
            Ph: <?php echo esc_html( $contact_phone ); ?><br>
            <?php if($contact_email): ?>
            Email: <?php echo esc_html( $contact_email ); ?></p>
        <?php endif; ?>
        </div>
    </div>
</div>


