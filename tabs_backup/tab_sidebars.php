<?php

sidebar_generator::edit_form();

$this->select(
	'show_sidebar1_top_content',
	__( 'Disable Sidebar1 Top content', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'no'  => __( 'No', 'Aione' ),
		'yes' => __( 'Yes', 'Aione' )
		
	),
	__( 'Disable Sidebar1 Top content On Page .', 'Aione' )
);

$this->select(
	'show_sidebar2_top_content',
	__( 'Disable Sidebar2 Top content', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'no'  => __( 'No', 'Aione' ),
		'yes' => __( 'Yes', 'Aione' )
		
	),
	__( 'Disable Sidebar2 Top content On Page.', 'Aione' )
);

$this->select(
	'sidebar_position',
	__( 'Sidebar 1 Position', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'right'   => __( 'Right', 'Aione' ),
		'left'    => __( 'Left', 'Aione' )
	),
	__( 'Select the sidebar 1 position. If sidebar 2 is selected, it will display on the opposite side.', 'Aione' )
);

$this->text(
	'sidebar_bg_color',
	__( 'Sidebar Background Color', 'Aione' ),
	__( 'Controls the background color of the sidebar. Hex code, ex: #000', 'Aione' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
