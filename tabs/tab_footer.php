<?php

$this->select(
	'footer_widgets',
	__( 'Footer Widgets', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Footer Widgets', 'aione' )
);
$this->select(
	'footer_100_width',
	__( '100% Footer Width', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( '100% Footer Width', 'aione' )
);
$this->select(
	'footer_copyright',
	__( 'Copyright Bar', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Copyright Bar', 'aione' )
);
$this->select(
	'footer_copyright_100_width',
	__( '100% Copyright Bar Width', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes' 	  => __( 'Yes', 'aione' ),
		'no'  	  => __( 'No', 'aione' )
	),
	__( '100% Copyright Bar Width', 'aione' )
);


// Omit closing PHP tag to avoid "Headers already sent" issues.
