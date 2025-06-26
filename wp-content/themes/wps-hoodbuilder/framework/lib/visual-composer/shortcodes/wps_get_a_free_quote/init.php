<?php
/**
 *	Get a free quote
 *	
 *	WPSailor
 *	www.wpsailor.com
 */


// Element Information
$wps_vc_element_path    = dirname( __FILE__ ) . '/';
$wps_vc_element_url     = site_url( str_replace( ABSPATH, '', $wps_vc_element_path ) );
$wps_vc_element_icon    = $wps_vc_element_url . 'clients.png';

// Service Box (parent of icon box content and vc icon)
vc_map( array(
	"base"                     => "wps_get_a_free_quote",
	"name"                     => "Get a Free Quote",
	"description"    		   => "",
	"category"                 => 'WPSailor',
	"content_element"          => true,
	"show_settings_on_create"  => false,
	"icon"                     => $wps_vc_element_icon,
	"params"                   => array(
        array(
            'type'           => 'textfield',
            'heading'        => 'Section Title',
            'param_name'     => 'section_title',
            'admin_label'	 => true,
            'description'    => ''
        ),
		array(
			'type'           => 'textarea_html',
			'heading'        => 'Description',
			'param_name'     => 'content',
			'description'    => 'Include a small description for the doctor, this text area supports HTML too.',
		)
	),
	//"js_view" => 'VcColumnView'
) );



class WPBakeryShortCode_wps_get_a_free_quote extends WPBakeryShortCode {}