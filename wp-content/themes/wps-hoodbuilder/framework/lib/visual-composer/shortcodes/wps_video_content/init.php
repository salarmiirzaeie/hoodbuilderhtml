<?php
/**
 *	Video Content
 */


# Element Information
$wps_vc_element_path    = dirname( __FILE__ ) . '/';
$wps_vc_element_url     = site_url(str_replace(ABSPATH, '', $wps_vc_element_path));
$wps_vc_element_icon    = $wps_vc_element_url . 'services.png';

# Service Box (parent of icon box content and vc icon)
vc_map( array(
	"base"                     => "wps_video_content",
	"name"                     => __("Video Content", "wps"),
	"description"    		   => __("", "wps"),
	"category"                 => __('WPSailor', 'wps'),
	//"content_element"          => true,
	//"show_settings_on_create"  => true,
	"icon"                     => $wps_vc_element_icon,
	//"as_parent"                => array('only' => 'vc_icon,lab_service_box_content'),
	"params"=> array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Type', 'lab_composer' ),
			'param_name' => 'video_type',
			'admin_label' => true,
			'std' => 'text',
			'value' => array(
				__( 'Youtube', 'lab_composer' )           => 'youtube',
				__( 'Vimeo', 'lab_composer' )    => 'vimeo',
			),
			'description' => __( '', 'lab_composer' )
		),
		array(
			'type'           => 'textfield',
			'heading'        => __( 'Title', 'lab_composer' ),
			'param_name'     => 'title',
			'admin_label'    => true,
			'value'          => ''
		),
		array(
			'type'       => 'textarea',
			'heading'    => __( 'Video Url', 'lab_composer' ),
			'param_name' => 'video_url',
			'value'      => ''
		),
		array(
			"type"           => "textfield",
			"heading"        => __("Extra class name", "wps"),
			"param_name"     => "el_class",
			"description"    => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "wps")
		),
		array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'wps' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'wps' ),
        ),
	),
	//"js_view" => 'VcColumnView'
) );


class WPBakeryShortCode_wps_video_content extends WPBakeryShortCode {}