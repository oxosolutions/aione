<?php

$this->select(
	'page_title',
	__( 'Page Title Bar', 'Aione' ),
	array(
		'default'         => __( 'Default', 'Aione' ),
		'yes'             => __( 'Show Bar and Content', 'Aione' ),
		'yes_without_bar' => __( 'Show Content Only', 'Aione' ),
		'no'              => __( 'Hide', 'Aione' )
	),
	__( 'Choose to show or hide the page title bar.', 'Aione' )
);

$this->select(
	'page_title_text',
	__( 'Page Title Bar Text', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Show', 'Aione' ),
		'no'      => __( 'Hide', 'Aione' )
	),
	__( 'Choose to show or hide the page title bar text.', 'Aione' )
);

$this->select(
	'page_title_text_alignment',
	__( 'Page Title Bar Text Alignment', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'left'    => __( 'Left', 'Aione' ),
		'center'  => __( 'Center', 'Aione' ),
		'right'   => __( 'Right', 'Aione' )
	),
	__( 'Choose the title and subhead text alignment', 'Aione' )
);

$this->select(
	'page_title_100_width',
	__( '100% Page Title Width', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( 'Choose to set the page title content to 100% of the browser width. Select "No" for site width. Only works with wide layout mode.', 'Aione' )
);

$this->textarea(
	'page_title_custom_text',
	__( 'Page Title Bar Custom Text', 'Aione' ),
	__( 'Insert custom text for the page title bar.', 'Aione' )
);

$this->text(
	'page_title_text_size',
	__( 'Page Title Bar Text Size', 'Aione' ),
	__( 'In pixels, default is 18px.', 'Aione' )
);

$this->textarea(
	'page_title_custom_subheader',
	__( 'Page Title Bar Custom Subheader Text', 'Aione' ),
	__( 'Insert custom subhead text for the page title bar.', 'Aione' )
);

$this->text(
	'page_title_custom_subheader_text_size',
	__( 'Page Title Bar Subhead Text Size', 'Aione' ),
	__( 'In pixels, default is 10px.', 'Aione' )
);

$this->text(
	'page_title_font_color',
	__( 'Page Title Font Color', 'Aione' ),
	__( 'Controls the text color of the page title fonts.', 'Aione' )
);

$this->text(
	'page_title_height',
	__( 'Page Title Bar Height', 'Aione' ),
	__( 'Set the height of the page title bar. In pixels ex: 100px.', 'Aione' )
);

$this->text(
	'page_title_mobile_height',
	__( 'Page Title Bar Mobile Height', 'Aione' ),
	__( 'Set the height of the page title bar on mobile. In pixels ex: 100px.', 'Aione' )
);

$this->upload(
	'page_title_bar_bg',
	__( 'Page Title Bar Background', 'Aione' ),
	__( 'Select an image to use for the page title bar background.', 'Aione' )
);

$this->upload(
	'page_title_bar_bg_retina',
	__( 'Page Title Bar Background Retina', 'Aione' ),
	__( 'Select an image to use for retina devices.', 'Aione' )
);

$this->text(
	'page_title_bar_bg_color',
	__( 'Page Title Bar Background Color', 'Aione' ),
	__( 'Controls the background color of the page title bar. Hex code, ex: #000', 'Aione' )
);

$this->text(
	'page_title_bar_borders_color',
	__( 'Page Title Bar Borders Color', 'Aione' ),
	__( 'Controls the border color of the page title bar. Hex code, ex: #000', 'Aione' )
);

$this->select(
	'page_title_bar_bg_full',
	__( '100% Background Image', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'no'      => __( 'No', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' )
	),
	__( 'Choose to have the background image display at 100%.', 'Aione' )
);

$this->select(
	'page_title_bg_parallax',
	__( 'Parallax Background Image', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'no'      => __( 'No', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' )
	),
	__( 'Choose a parallax scrolling effect for the background image.', 'Aione' )
);

$this->select(
	'page_title_breadcrumbs_search_bar',
	__( 'Breadcrumbs/Search Bar', 'Aione' ),
	array(
		'default'     => __( 'Default', 'Aione' ),
		'breadcrumbs' => __( 'Breadcrumbs', 'Aione' ),
		'searchbar'   => __( 'Search Bar', 'Aione' ),
		'none'        => __( 'None', 'Aione' )
	),
	__( 'Choose to display the breadcrumbs, search bar or none.', 'Aione' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
