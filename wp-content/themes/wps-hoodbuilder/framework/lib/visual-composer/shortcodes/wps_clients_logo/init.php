<?php
/**
 *	Clients Logo
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
	"base"                     => "wps_clients_logo",
	"name"                     => "Clients Logo",
	"description"    		   => "Clients logo collection",
	"category"                 => 'WPSailor',
	"content_element"          => true,
	"show_settings_on_create"  => false,
	"icon"                     => $wps_vc_element_icon,
	"as_parent"                => array('only' => 'wps_clients_logo_content'),
	"params"                   => array(
		array(
			"type"           => "textfield",
			"heading"        => "Extra class name",
			"param_name"     => "el_class",
			"description"    => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
		),
	),
	"js_view" => 'VcColumnView'
) );


# Box Content (child of Service Box)
vc_map( array(
	"base"             => "wps_clients_logo_content",
	"name"             => "Clients Logo Item",
	"description"      => "Add  client logo",
	"category"         => 'WPSailor',
	"content_element"  => true,
	"icon"			   => $wps_vc_element_icon,
	"as_child"         => array('only' => 'wps_clients_logo'),
	"params"           => array(
        array(
            'type'           => 'attach_image',
            'heading'        => 'Image',
            'param_name'     => 'image',
            'value'          => '',
            'admin_label'	 => true,
            'description'    => 'Add team member image here.'
        ),
		array(
			'type'           => 'textfield',
			'heading'        => 'Client Name',
			'param_name'     => 'client_name',
			'admin_label'	 => true,
			'description'    => 'Name of the client'
		),
		array(
			"type"           => "textfield",
			"heading"        => "Extra class name",
			"param_name"     => "el_class",
			"description"    => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
		),
	)
) );


class WPBakeryShortCode_wps_clients_logo extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_wps_clients_logo_content extends WPBakeryShortCode {}