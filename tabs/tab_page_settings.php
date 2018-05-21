<?php

$this->select(
	'page_top_area_enable',
	__( 'Enable Page Top Area', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable Page Top Area', 'gutenbergtheme' )
);
$this->select(
	'page_bottom_area_enable',
	__( 'Enable Page Bottom Area', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable Page Bottom Area', 'gutenbergtheme' )
);
$this->select(
	'sidebar_left_enable',
	__( 'Enable Left Sidebar', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable Left Sidebar', 'gutenbergtheme' )
);
$this->select(
	'sidebar_right_enable',
	__( 'Enable Right Sidebar', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable Right Sidebar', 'gutenbergtheme' )
);
$this->select(
	'content_top_area_enable',
	__( 'Enable Content Top Area', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable Content Top Area', 'gutenbergtheme' )
); 
$this->select(
	'content_bottom_area_enable',
	__( 'Enable Content Bottom Area', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable Content Bottom Area', 'gutenbergtheme' )
); 


// Omit closing PHP tag to avoid "Headers already sent" issues.
