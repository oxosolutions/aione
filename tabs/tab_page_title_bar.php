<?php

$this->select(
	'page_title_bar',
	__( 'Enable Page Title Bar', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable Page Title Bar', 'gutenbergtheme' )
);
$this->select(
	'page_title_100_width',
	__( '100% Page Title Width', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( '100% Page Title Width', 'gutenbergtheme' )
);
$this->select(
	'page_title_bar_enable_title',
	__( 'Show Title on Page Title Bar', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Show Title on Page Title Bar', 'gutenbergtheme' )
);
$this->select(
	'page_title_bar_enable_description',
	__( 'Show Description on Page Title Bar', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Show Description on Page Title Bar', 'gutenbergtheme' )
);


// Omit closing PHP tag to avoid "Headers already sent" issues.
