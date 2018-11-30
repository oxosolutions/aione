<?php

$this->select(
	'page_100_width',
	__( '100% Page width', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( '100% Page width', 'gutenbergtheme' )
);
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
	'page_top_area_100_width',
	__( '100% Page Top Area width', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( '100% Page Top Area width', 'gutenbergtheme' )
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
	'page_bottom_area_100_width',
	__( '100% Page bottom Area width', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( '100% Page bottom Area width', 'gutenbergtheme' )
);
$this->select(
	'page_padding_enable',
	__( 'Enable Page Padding', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable Page Padding', 'gutenbergtheme' )
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

$sidebars = array();
$sidebars['default'] = __( 'Default', 'gutenbergtheme' );
foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
	$sidebar_id = $sidebar['id'];
	$sidebars[$sidebar_id] = ucwords( $sidebar['name']);
}

$this->select(
	'sidebar_left',
	__( 'Select Left Sidebar', 'gutenbergtheme' ),
	$sidebars,
	__( 'Select Left Sidebar', 'gutenbergtheme' )
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
	'sidebar_right',
	__( 'Select Right Sidebar', 'gutenbergtheme' ),
	$sidebars,
	__( 'Select Right Sidebar', 'gutenbergtheme' )
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
$this->select(
	'page_content_padding_enable',
	__( 'Enable Page Content Padding', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable Page Content Padding', 'gutenbergtheme' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
