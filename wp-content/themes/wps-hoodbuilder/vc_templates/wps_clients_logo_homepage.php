<?php
/**
 *    Client Logos Shortcode
 *
 *    WPSailor
 *    www.wpsailor.com
 */

global $client_logo_index;

if ( function_exists( 'vc_map_get_attributes' ) ) {
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );

$element_id = 'team-members-' . mt_rand( 100000, 999999 );


// Element Class
$class     = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );


// Show Team Members
$team_member_index = 0;


?>
    <div class="wps-clients-logos-homepage-wrap <?php echo esc_attr( $el_class ); ?>">
        <div class="wps-clients-logos-homepage-container">
			<?php if ( $client_page_link ): ?>
            <a href="<?php echo $client_page_link; ?>">
				<?php endif; ?>
                <ul>
					<?php echo wpb_js_remove_wpautop( $content ); ?>
                </ul>
				<?php if ( $client_page_link ): ?>
            </a>
		<?php endif; ?>

        </div>
    </div>
<?php
