<?php
/**
 *	Testimonial Isotope
 *	
 *	WPSailor
 *	www.wpsailor.com
 */


// Element Information
$wps_vc_element_path    = dirname( __FILE__ ) . '/';
$wps_vc_element_url     = site_url( str_replace( ABSPATH, '', $wps_vc_element_path ) );
$wps_vc_element_icon    = $wps_vc_element_url . 'testimonials.png';

// Service Box (parent of icon box content and vc icon)
vc_map( array(
	"base"                     => "wps_testimonials_isotope",
	"name"                     => "Testimonials Isotope",
	"description"    		   => "",
	"category"                 => 'WPSailor',
	"content_element"          => true,
	"show_settings_on_create"  => false,
	"icon"                     => $wps_vc_element_icon,
	"as_parent"                => array('only' => 'wps_testimonials_isotope_content'),
	"params"                   => array(
        array(
            'type'           => 'textfield',
            'heading'        => 'Section Title',
            'param_name'     => 'section_title',
            'admin_label'	 => true,
            'description'    => 'Title of the section.',
        ),
		array(
			"type"           => "textfield",
			"heading"        => "Extra class name",
			"param_name"     => "el_class",
			"description"    => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
		),
		array(
            'type' => 'css_editor',
            'heading' => 'Css',
            'param_name' => 'css',
            'group' => 'Design options',
        ),
	),
	"js_view" => 'VcColumnView'
) );


# Box Content (child of Service Box)
vc_map( array(
	"base"             => "wps_testimonials_isotope_content",
	"name"             => "Testimonial IsotopeContent",
	"description"      => "Add testimonial content",
	"category"         => 'WPSailor',
	"content_element"  => true,
	"icon"			   => $wps_vc_element_icon,
	"as_child"         => array('only' => 'wps_testimonials_isotope'),
	"params"           => array(
        array(
            'type'           => 'attach_image',
            'heading'        => 'Image',
            'param_name'     => 'image',
            'value'          => '',
            'description'    => 'Add team member image here.'
        ),
		array(
			'type'           => 'textfield',
			'heading'        => 'Client Name',
			'param_name'     => 'client_name',
			'admin_label'	 => true,
			'description'    => 'Name of the client',
		),
        array(
            'type'           => 'textfield',
            'heading'        => 'Sub Title',
            'param_name'     => 'sub_title',
            'description'    => 'Position or title of the client.',
        ),
		array(
			'type'           => 'textarea',
			'heading'        => 'Testimonial Description',
			'param_name'     => 'testimonial_content',
			'description'    => 'Testimonial content here.',
		),
		array(
			"type"           => "textfield",
			"heading"        => "Extra class name",
			"param_name"     => "el_class",
			"description"    => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."
		),
	)
) );


class WPBakeryShortCode_wps_testimonials_isotope extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_wps_testimonials_isotope_content extends WPBakeryShortCode {}