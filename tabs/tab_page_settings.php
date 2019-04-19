<?php

$sidebars = array();
$sidebars['default'] = __( 'Default', 'aione' );
foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
	$sidebar_id = $sidebar['id'];
	$sidebars[$sidebar_id] = ucwords( $sidebar['name']);
}

$this->select(
	'page_100_width',
	__( '100% Page width', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( '100% Page width', 'aione' )
);
$this->select(
	'page_top_area_enable',
	__( 'Enable Page Top Area', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable Page Top Area', 'aione' )
);
$this->select(
	'page_top_area_100_width',
	__( '100% Page Top Area width', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( '100% Page Top Area width', 'aione' )
);
$this->select(
	'sidebar_pagetop',
	__( 'Select Pagetop Widget Area', 'aione' ),
	$sidebars,
	__( 'Select Pagetop Widget Area', 'aione' )
);
$this->select(
	'page_bottom_area_enable',
	__( 'Enable Page Bottom Area', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable Page Bottom Area', 'aione' )
);
$this->select(
	'page_bottom_area_100_width',
	__( '100% Page bottom Area width', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( '100% Page bottom Area width', 'aione' )
);
$this->select(
	'sidebar_pagebottom',
	__( 'Select Pagebottom Widget Area', 'aione' ),
	$sidebars,
	__( 'Select Pagebottom Widget Area', 'aione' )
);
$this->select(
	'page_padding_enable',
	__( 'Enable Page Padding', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable Page Padding', 'aione' )
);
$this->select(
	'sidebar_left_enable',
	__( 'Enable Left Sidebar', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable Left Sidebar', 'aione' )
);
$this->select(
	'sidebar_left',
	__( 'Select Left Sidebar', 'aione' ),
	$sidebars,
	__( 'Select Left Sidebar', 'aione' )
);
$this->select(
	'sidebar_right_enable',
	__( 'Enable Right Sidebar', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable Right Sidebar', 'aione' )
);
$this->select(
	'sidebar_right',
	__( 'Select Right Sidebar', 'aione' ),
	$sidebars,
	__( 'Select Right Sidebar', 'aione' )
);
$this->select(
	'content_top_area_enable',
	__( 'Enable Content Top Area', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable Content Top Area', 'aione' )
); 
$this->select(
	'sidebar_contenttop',
	__( 'Select Content Top Widget Area', 'aione' ),
	$sidebars,
	__( 'Select Content Top Widget Area', 'aione' )
);
$this->select(
	'content_bottom_area_enable',
	__( 'Enable Content Bottom Area', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable Content Bottom Area', 'aione' )
); 
$this->select(
	'sidebar_contentbottom',
	__( 'Select Content Bottom Widget Area', 'aione' ),
	$sidebars,
	__( 'Select Content Bottom Widget Area', 'aione' )
);
$this->select(
	'page_content_padding_enable',
	__( 'Enable Page Content Padding', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable Page Content Padding', 'aione' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
