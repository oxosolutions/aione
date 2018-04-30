<?php

$this->select(
	'slider_position',
	__( 'Slider Position', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'below'   => __( 'Below', 'Aione' ),
		'above'   => __( 'Above', 'Aione' )
	),
	__( 'Select if the slider shows below or above the header. Only works for top header position.', 'Aione' )
);

$this->select(
	'slider_type',
	__( 'Slider Type', 'Aione' ),
	array(
		'no'      => __( 'No Slider', 'Aione' ),
		'layer'   => 'LayerSlider',
		'flex'    => 'Oxo Slider',
		'rev'     => 'Revolution Slider',
		'elastic' => 'Elastic Slider'
	),
	__( 'Select the type of slider that displays.', 'Aione' )
);

global $wpdb;
$slides_array[0] = __( 'Select a slider', 'Aione' );
if ( class_exists( 'LS_Sliders' ) ) {

	// Table name
	$table_name = $wpdb->prefix . 'layerslider';

	// Get sliders
	$sliders = $wpdb->get_results( "SELECT * FROM $table_name WHERE flag_hidden = '0' AND flag_deleted = '0' ORDER BY date_c ASC" );

	if ( ! empty( $sliders ) ) {
		foreach ( $sliders as $key => $item ) {
			$slides[$item->id] = $item->name;
		}
	}

	if ( isset( $slides ) && $slides ) {
		foreach ( $slides as $key => $val ) {
			$slides_array[$key] = $val;
		}
	}
}

$this->select(
	'slider',
	__( 'Select LayerSlider', 'Aione' ),
	$slides_array,
	__( 'Select the unique name of the slider.', 'Aione' )
);

$slides_array    = array();
$slides          = array();
$slides_array[0] = __( 'Select a slider', 'Aione' );
$slides          = get_terms( 'slide-page' );
if ( $slides && ! isset( $slides->errors ) ) {
	$slides = maybe_unserialize( $slides );
	foreach( $slides as $key => $val ) {
		$slides_array[$val->slug] = $val->name;
	}
}
$this->select(
	'wooslider',
	__( 'Select Oxo Slider', 'Aione' ) ,
	$slides_array,
	__( 'Select the unique name of the slider.', 'Aione' )
);

global $wpdb;
$revsliders[0] = __( 'Select a slider', 'Aione' );

if ( function_exists( 'rev_slider_shortcode' ) ) {
	$get_sliders = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'revslider_sliders' );
	if ( $get_sliders ) {
		foreach ( $get_sliders as $slider ) {
			if( $slider->type != 'template' ) {
				$revsliders[$slider->alias] = $slider->title;
			}
		}
	}
}

$this->select(
	'revslider',
	__( 'Select Revolution Slider', 'Aione' ),
	$revsliders,
	__( 'Select the unique name of the slider.', 'Aione' )
);

$slides_array    = array();
$slides_array[0] = __( 'Select a slider', 'Aione' );
$slides          = get_terms( 'themeoxo_es_groups' );
if ( $slides && ! isset( $slides->errors ) ) {
	$slides = maybe_unserialize( $slides );
	foreach ( $slides as $key => $val ) {
		$slides_array[$val->slug] = $val->name;
	}
}
$this->select(
	'elasticslider',
	__( 'Select Elastic Slider', 'Aione' ),
	$slides_array,
	__( 'Select the unique name of the slider.', 'Aione' )
);

$this->upload(
	'fallback',
	__( 'Slider Fallback Image', 'Aione' ),
	__( 'This image will override the slider on mobile devices.', 'Aione' )
);

$this->select(
	'aione_rev_styles',
	__( 'Disable Aione Styles For Revolution Slider', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( 'Choose to enable or disable Aione styles for Revolution Slider.', 'Aione' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
