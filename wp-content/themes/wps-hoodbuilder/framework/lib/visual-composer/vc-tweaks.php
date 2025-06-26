<?php
/**
 *	VC Tweaks
 *
 *	WPSailor
 *	www.wpsailor.com
 */


# ! VC_ROW
$attributes = array(
	array(
		'type'        => 'checkbox',
		'heading'     => __( 'Wrap with a Container', 'lab_composer' ),
		'param_name'  => 'container_wrap',
		'description' => __( 'When using fullwidth page this setting will help you center the content with a container.', 'lab_composer' ),
		'value'       => array( __( 'Yes', 'lab_composer' ) => 'yes' ),
		'weight'	  => 1
	),
);

vc_add_params('vc_row', $attributes);


