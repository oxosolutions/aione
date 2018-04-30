<?php

$this->select(
	'display_footer',
	__( 'Display Footer Widget Area', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( 'Choose to show or hide the footer.', 'Aione' )
);

$this->select(
	'display_copyright',
	__( 'Display Copyright Area', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( 'Choose to show or hide the copyright area.', 'Aione' )
);

$this->select(
	'footer_100_width',
	__( '100% Footer Width', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( 'Choose to set footer width to 100% of the browser width. Select "No" for site width.', 'Aione' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
