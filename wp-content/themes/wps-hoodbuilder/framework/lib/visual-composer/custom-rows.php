<?php
/**
 *	Custom Row for this theme
 *
 *	WPSailor
 *	www.wpsailor.com
 */


function wps_vc_row_full_width()  {

    # Full Width Param
    $param = WPBMap::getParam( 'vc_row', 'full_width' );

    $param['weight'] = 2;
    $param['value'][ 'Full width (WPSailor)' ] = 'wps-full-width';

    vc_update_shortcode_param( 'vc_row', $param );
}

add_action( 'vc_after_init', 'wps_vc_row_full_width' );

function wps_vc_row_container_wrap() {

    vc_add_param( 'vc_row', array(
        'type'           => 'checkbox',
        'heading'        => 'Wrap within container',
        'param_name'     => 'container_wrap',
        'value'          => array( 'Yes' => 'yes' ),
        'description'    => 'Check this box if you want to wrap contents of this row within default container.',
        'dependency' => array(
            'element'   => 'full_width',
            'value'     => array( 'wps-full-width' )
        ),
        'weight' => 1
    ) );
}

add_action( 'vc_after_init', 'wps_vc_row_container_wrap' );

