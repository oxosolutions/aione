<?php

$this->select(
	'display_header',
	__( 'Display Header', 'Aione' ),
	array(
		'yes' => __( 'Yes', 'Aione' ),
		'no'  => __( 'No', 'Aione' )
	),
	__( 'Choose to show or hide the header.', 'Aione' )
);

$this->select(
	'header_100_width',
	__( '100% Header Width', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( 'Choose to set header width to 100% of the browser width. Select "No" for site width.', 'Aione' )
);

$this->upload(
	'header_bg',
	__( 'Background Image', 'Aione' ),
	__( 'Select an image to use for the header background.', 'Aione' )
);

$this->text(
	'header_bg_color',
	__( 'Background Color', 'Aione' ),
	__( 'Controls the background color of the header. Hex code, ex: #000', 'Aione' )
);

$this->text(
	'header_bg_opacity',
	__( 'Background Opacity', 'Aione' ),
	__( 'Controls the opacity of the header background color when using the top position. Ranges between 0 (transparent) and 1 (opaque). ex: .4', 'Aione' )
);

$this->select(
	'header_bg_full',
	__( '100% Background Image', 'Aione' ),
	array(
		'no'  => __( 'No', 'Aione' ),
		'yes' => __( 'Yes', 'Aione' )
	),
	__( 'Choose to have the background image display at 100%.', 'Aione' )
);

$this->select(
	'header_bg_repeat',
	__( 'Background Repeat', 'Aione' ),
	array(
		'repeat'    => __( 'Tile', 'Aione' ),
		'repeat-x'  => __( 'Tile Horizontally', 'Aione' ),
		'repeat-y'  => __( 'Tile Vertically', 'Aione' ),
		'no-repeat' => __( 'No Repeat', 'Aione' )
	),
	__( 'Select how the background image repeats.', 'Aione' )
);

$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
$menu_select['default'] = 'Default Menu';

foreach ( $menus as $menu ) {
	$menu_select[$menu->term_id] = $menu->name;
}

$this->select(
	'displayed_menu',
	__( 'Main Navigation Menu', 'Aione' ),
	$menu_select,
	__( 'Select which menu displays on this page.', 'Aione' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
