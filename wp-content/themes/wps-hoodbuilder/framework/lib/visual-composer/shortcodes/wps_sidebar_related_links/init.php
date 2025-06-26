<?php
/**
 *	Sidebar Our Treatments Links
 *	
 *	WPSailor
 *	www.wpsailor.com
 */


// Element Information
$wps_vc_element_path    = dirname( __FILE__ ) . '/';
$wps_vc_element_url     = site_url( str_replace( ABSPATH, '', $wps_vc_element_path ) );
$wps_vc_element_icon    = $wps_vc_element_url . 'clients.png';


$reg_menu_list = array();

if( is_admin() ) {

	$reg_menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );

	foreach ( $reg_menus as $reg_menu ) {
		$reg_menu_list[ $reg_menu->name ] = $reg_menu->slug;
	}
}

vc_map( array(
	"base"                     => "wps_sidebar_related_links",
	"name"                     => "Sidebar Related Links",
	"description"    		   => "",
	"category"                 => 'WPSailor',
	"content_element"          => true,
	"show_settings_on_create"  => true,
	"icon"                     => $wps_vc_element_icon,
	"params"                   => array(
		array(
			'type'           => 'textfield',
			'heading'        => 'Title',
			'param_name'     => 'title',
			'admin_label'	 => true,
			'description'    => ''
		),
		array(
			'type'           => 'dropdown',
			'heading'        => 'Sidebar Related Link Menu',
			'admin_label'    => true,
			'param_name'     => 'sidebar_related_link',
			'value'          => $reg_menu_list,
			'description' => 'Select the menu for sidebar'
		),
		array(
			"type"           => "textfield",
			"heading"        => "Extra class name",
			"param_name"     => "el_class",
			"description"    => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
		),
	),
) );



class WPBakeryShortCode_WPS_Sidebar_Related_Links extends WPBakeryShortCode {}
