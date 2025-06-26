<?php
/**
 *	Contact Address Shortcode
 *	
 *	WPSailor
 *	www.wpsailor.com
 */


// Element Information
$wps_vc_element_path    = dirname( __FILE__ ) . '/';
$wps_vc_element_url     = site_url( str_replace( ABSPATH, '', $wps_vc_element_path ) );
$wps_vc_element_icon    = $wps_vc_element_url . 'clients.png';

vc_map( array(
	"base"                     => "wps_contact_address",
	"name"                     => "Contact Address",
	"description"    		   => "",
	"category"                 => 'WPSailor',
	"content_element"          => true,
	"show_settings_on_create"  => true,
	"icon"                     => $wps_vc_element_icon,
	"params"                   => array(
		array(
			'type'           => 'textfield',
			'heading'        => 'Title',
			'param_name'     => 'contact_title',
			'admin_label'	 => true,
			'description'    => ''
		),
		array(
			'type'           => 'textfield',
			'heading'        => 'Contact Address',
			'param_name'     => 'contact_address',
			'admin_label'	 => true,
			'description'    => ''
		),
		array(
			'type'           => 'textfield',
			'heading'        => 'Contact Phone',
			'param_name'     => 'contact_phone',
			'admin_label'	 => true,
			'description'    => ''
		),
		array(
			'type'           => 'textfield',
			'heading'        => 'Contact Email',
			'param_name'     => 'contact_email',
			'admin_label'	 => true,
			'description'    => ''
		),
		array(
			"type"           => "textfield",
			"heading"        => "Extra class name",
			"param_name"     => "el_class",
			"description"    => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
		),
	),
//	"js_view" => 'VcColumnView'
) );



class WPBakeryShortCode_wps_contact_address extends WPBakeryShortCode {}
