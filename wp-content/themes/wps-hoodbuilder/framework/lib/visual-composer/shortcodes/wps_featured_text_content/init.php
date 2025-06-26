<?php
/**
 *	Clients Logo Shortcode
 *	
 *	WPSailor
 *	www.wpsailor.com
 */


// Element Information
$wps_vc_element_path    = dirname( __FILE__ ) . '/';
$wps_vc_element_url     = site_url( str_replace( ABSPATH, '', $wps_vc_element_path ) );
$wps_vc_element_icon    = $wps_vc_element_url . 'clients.png';

vc_map( array(
	"base"                     => "wps_featured_text_content",
	"name"                     => "Featured Text Content",
	"description"    		   => "",
	"category"                 => 'WPSailor',
	"content_element"          => true,
	"show_settings_on_create"  => true,
	"icon"                     => $wps_vc_element_icon,
	"params"                   => array(
		array(
			'type'           => 'dropdown',
			'heading'        => 'Type',
			'param_name'     => 'content_type',
			'std'            => 'style1',
			'value'          => array(
				'Style1'     => 'style1',
				'Style2'     => 'style2',
				'Style3'     => 'style3',
			),
			'description' => ''
		),
		array(
			'type'           => 'attach_image',
			'heading'        => 'Image',
			'param_name'     => 'image',
			'value'          => '',
			'description'    => 'Add image here.',
			'dependency' => array( 'element' => 'content_type', 'value' => array( 'style2','style3' ) )
		),
		array(
			'type'           => 'textfield',
			'heading'        => 'Button Text',
			'param_name'     => 'section_button_text',
			//'admin_label'	 => false,
			'description'    => '',
			'dependency' => array( 'element' => 'content_type', 'value' => array( 'style2' ) )
		),
		array(
			'type'           => 'textfield',
			'heading'        => 'Button Link',
			'param_name'     => 'section_button_link',
			//'admin_label'	 => true,
			'description'    => '',
			'dependency' => array( 'element' => 'content_type', 'value' => array( 'style2' ) )
		),

		array(
			'type'           => 'textfield',
			'heading'        => 'Title',
			'param_name'     => 'section_title',
			'admin_label'	 => true,
			'description'    => ''
		),

		array(
			'type'           => 'textarea_html',
			'heading'        => 'Description',
			'param_name'     => 'content',
			'description'    => 'Description about the service or the item you provide.',
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



class WPBakeryShortCode_wps_featured_text_content extends WPBakeryShortCode {}
