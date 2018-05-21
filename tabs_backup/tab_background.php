<?php

$this->select(
	'page_bg_layout',
	__('Layout', 'Aione'),
	array(
		'default' => __( 'Default', 'Aione' ),
		'wide'    => __( 'Wide', 'Aione' ),
		'boxed'   => __( 'Boxed', 'Aione' )
	),
	__( 'Select boxed or wide layout.', 'Aione' )
);

printf( '<h3>%s</h3>', __( 'Following options only work in boxed mode:', 'Aione' ) );

$this->upload(
	'page_bg',
	__( 'Background Image for Outer Area', 'Aione' ),
	__( 'Select an image to use for the outer background.', 'Aione' )
);

$this->text(
	'page_bg_color',
	__( 'Background Color', 'Aione' ),
	__( 'Controls the background color for the outer background. Hex code, ex: #000', 'Aione' )
);

$this->select(
	'page_bg_full',
	__( '100% Background Image', 'Aione' ),
	array(
		'no'  => __( 'No', 'Aione' ),
		'yes' => __( 'Yes', 'Aione' )
	),
	__( 'Choose to have the background image display at 100%.', 'Aione' )
);

$this->select(
	'page_bg_repeat',
	__( 'Background Repeat', 'Aione' ),
	array(
		'repeat'    => __( 'Tile', 'Aione' ),
		'repeat-x'  => __( 'Tile Horizontally', 'Aione' ),
		'repeat-y'  => __( 'Tile Vertically', 'Aione' ),
		'no-repeat' => __( 'No Repeat', 'Aione' )
	),
	__( 'Select how the background image repeats.', 'Aione' )
);

printf( '<h3>%s</h3>', __( 'Following options work in boxed and wide mode:', 'Aione' ) );

$this->upload(
	'wide_page_bg',
	__( 'Background Image for Main Content Area', 'Aione' ),
	__( 'Select an image to use for the main content area.', 'Aione' )
);

$this->text(
	'wide_page_bg_color',
	__( 'Background Color', 'Aione' ),
	__( 'Controls the background color for the main content area. Hex code, ex: #000', 'Aione' )
);

$this->select(
	'wide_page_bg_full',
	__( '100% Background Image', 'Aione' ),
	array(
		'no'  => __( 'No', 'Aione' ),
		'yes' => __( 'Yes', 'Aione' )
	),
	__( 'Choose to have the background image display at 100%.', 'Aione' )
);

$this->select(
	'wide_page_bg_repeat',
	__( 'Background Repeat', 'Aione' ),
	array(
		'repeat'    => __( 'Tile', 'Aione' ),
		'repeat-x'  => __( 'Tile Horizontally', 'Aione' ),
		'repeat-y'  => __( 'Tile Vertically', 'Aione' ),
		'no-repeat' => __( 'No Repeat', 'Aione' )
	),
	__( 'Select how the background image repeats.', 'Aione' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
