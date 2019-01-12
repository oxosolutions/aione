<?php

$this->select(
	'footer_widgets',
	__( 'Footer Widgets', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes'     => __( 'Yes', 'gutenbergtheme' ),
		'no'      => __( 'No', 'gutenbergtheme' )
	),
	__( 'Footer Widgets', 'gutenbergtheme' )
);
$this->select(
	'footer_100_width',
	__( '100% Footer Width', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes'     => __( 'Yes', 'gutenbergtheme' ),
		'no'      => __( 'No', 'gutenbergtheme' )
	),
	__( '100% Footer Width', 'gutenbergtheme' )
);
$this->select(
	'footer_copyright',
	__( 'Copyright Bar', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes'     => __( 'Yes', 'gutenbergtheme' ),
		'no'      => __( 'No', 'gutenbergtheme' )
	),
	__( 'Copyright Bar', 'gutenbergtheme' )
);
$this->select(
	'footer_copyright_100_width',
	__( '100% Copyright Bar Width', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' 	  => __( 'Yes', 'gutenbergtheme' ),
		'no'  	  => __( 'No', 'gutenbergtheme' )
	),
	__( '100% Copyright Bar Width', 'gutenbergtheme' )
);


// Omit closing PHP tag to avoid "Headers already sent" issues.
