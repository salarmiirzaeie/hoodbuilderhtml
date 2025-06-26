<?php
/**
 *	Sidebar Related Links 
 *	
 *	WPSailor
 *	www.wpsailor.com
 */


# Atts
$defaults = array(
    'el_class'         => '',
    'css'              => '',
);

#$atts = vc_shortcode_attribute_parse( $defaults, $atts );
if( function_exists( 'vc_map_get_attributes' ) ) {
    $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
}

extract( $atts );

$sidebar_menu = $sidebar_related_link;

echo $sidebar_menu;
?>

<div class="wps-sidebar-related-links">
    <h4><?php echo $title; ?></h4>
    <?php

    wp_nav_menu(
	    array(
		    'theme_location' => $sidebar_menu,
		    'container' => 'false',
		    'menu_class' => 'sidebar-menu',
            'depth'          => 1,
	    ));

    ?>
</div>


