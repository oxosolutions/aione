<?php

$this->select(
	'page_title_bar',
	__( 'Enable Page Title Bar', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable Page Title Bar', 'aione' )
);
$this->select(
	'page_title_100_width',
	__( '100% Page Title Width', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( '100% Page Title Width', 'aione' )
);
$this->select(
	'page_title_bar_enable_title',
	__( 'Show Title on Page Title Bar', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Show Title on Page Title Bar', 'aione' )
);
$this->select(
	'page_title_bar_enable_description',
	__( 'Show Description on Page Title Bar', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Show Description on Page Title Bar', 'aione' )
);
$this->textarea(
	'page_title_bar_description_text',
	__( 'Description text on Page Title Bar', 'aione' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
