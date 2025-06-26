<?php
/**
 *    Team Member
 *
 *    WPSailor
 *    www.wpsailor.com
 */

global $team_member_index;

if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );

if ( strpos( $description, '#E-' ) !== false ) {
	$description = vc_value_from_safe( $description );
	$description = nl2br( $description );
}

//$description = vc_value_from_safe( $description );
//$description = nl2br( $description );

// Element Class
$class     = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );

// If no image return empty
if ( ! $image ) {
	return;
}

$section_image = wps_vc_image( $image );

// Item Class
$item_class = array();

// Member Details
ob_start();
?>
    <div class="member-details">
        <h5>
			<?php echo esc_html( $name ); ?>
        </h5>
		<?php if ( $sub_title ) : ?>
            <p class="job-title"><?php echo esc_html( $sub_title ); ?></p>
		<?php endif; ?>
		<?php if ( $description ) : ?>
            <div class="member-description"><?php echo esc_html( $description ); ?></div>
		<?php endif; ?>
    </div>
<?php

$member_details = ob_get_clean();

?>
    <div class="col-md-6">

        <div class="<?php echo implode( ' ', $item_class ); ?>">

            <div class="member <?php echo esc_attr( $css_class ); ?>">
                <div class="member-thumb">
                    <img src="<?php echo $section_image; ?>" alt="">
                </div>
				<?php echo $member_details; ?>
            </div>

        </div>
    </div>
<?php


# End of File
$team_member_index ++;