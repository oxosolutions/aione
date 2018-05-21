<?php

$this->select(
	'show_pagetop_content',
	__( 'Disable Pagetop Content', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'no'  => __( 'No', 'Aione' ),
		'yes' => __( 'Yes', 'Aione' )
		
	),
	__( 'Disable Pagetop Content On Page .', 'Aione' )
);

$this->select(
	'show_pagebottom_content',
	__( 'Disable Pagebottom Content', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'no'  => __( 'No', 'Aione' ),
		'yes' => __( 'Yes', 'Aione' )
		
	),
	__( 'Disable Pagebottom Content On Page.', 'Aione' )
);

$this->select(
	'show_content_top',
	__( 'Disable Content Top', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'no'  => __( 'No', 'Aione' ),
		'yes' => __( 'Yes', 'Aione' )
		
	),
	__( 'Disable Content Top on Page.', 'Aione' )
);

$this->select(
	'show_content_bottom',
	__( 'Disable Content Bottom', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'no'  => __( 'No', 'Aione' ),
		'yes' => __( 'Yes', 'Aione' )
		
	),
	__( 'Disable Content Bottom.', 'Aione' )
);
	
$this->text(
	'main_top_padding',
	__( 'Page Content Top Padding', 'Aione' ),
	__( 'In pixels ex: 20px. Leave empty for default value.', 'Aione' )
);

$this->text(
	'main_bottom_padding',
	__( 'Page Content Bottom Padding', 'Aione' ),
	__( 'In pixels ex: 20px. Leave empty for default value.', 'Aione' )
);

$this->text(
	'hundredp_padding',
	__( '100% Width Left/Right Padding', 'Aione' ),
	__( 'This option controls the left/right padding for page content when using 100% site width or 100% width page template.  Enter value in px. ex: 20px.', 'Aione' )
);

$screen = get_current_screen();

if ( 'page' == $screen->post_type ) {
	$this->select(
		'show_first_featured_image',
		__( 'Disable First Featured Image', 'Aione' ),
		array(
			'no'  => __( 'No', 'Aione' ),
			'yes' => __( 'Yes', 'Aione' )
		),
		__( 'Disable the 1st featured image on page.', 'Aione' )
	);
}

if ( 'tribe_events' == $screen->post_type ) {
	$this->select(
		'share_box',
		__( 'Show Social Share Box', 'Aione' ),
		array(
			'default' => __( 'Default', 'Aione' ),
			'yes'     => __( 'Show', 'Aione' ),
			'no'      => __( 'Hide', 'Aione' )
		),
		__( 'Choose to show or hide the social share box', 'Aione' )
	);
}

// Omit closing PHP tag to avoid "Headers already sent" issues.
