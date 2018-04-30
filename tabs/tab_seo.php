<?php 
printf( '<h3>%s</h3>', __( 'Search Engine Listing:', 'Aione' ) );

$this->text(
	'title_tag',
	__( ' Title Tag', 'Aione' ),
	__( 'You’ve entered 0 characters. Most search engines use up to 70.', 'Aione' )
);

$this->textarea(
	'meta_description',
	__( 'Meta Description', 'Aione' ),
	__( 'You have to enter 40 characters. Most search engines use up to 140.', 'Aione' )
);

$this->textarea(
	'meta_keywords',
	__( 'Meta Keywords', 'Aione' ),
	__( 'Enter a series of keywords relevant to the page.', 'Aione' )
);

printf( '<h3>%s</h3>', __( 'Social Networks Listing:', 'Aione' ) );

$this->text(
	'og_title',
	__( 'Title', 'Aione' ),
	__( '', 'Aione' )
);

$this->textarea(
	'og_description',
	__( 'Description', 'Aione' ),
	__( '', 'Aione' )
);

$this->upload(
	'og_image',
	__( 'Image', 'Aione' ),
	__( 'Select an image.', 'Aione' )
);
$this->text(
	'og_url',
	__( 'URL', 'Aione' ),
	__( '', 'Aione' )
);

/*printf( '<h3>%s</h3>', __( 'Links:', 'Aione' ) );

$this->textarea(
	'inbound_autolink_anchors',
	__( 'Inbound Autolink Anchors', 'Aione' ),
	__( '(one per line)', 'Aione' )
);

$this->select(
	'autolink_exclusion',
	__( 'Autolink Exclusion', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( 'Don’t add autolinks to anchor texts found in this post.', 'Aione' )
);

$this->select(
	'nofollow',
	__( 'Nofollow', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( 'When displaying page lists, nofollow links to this page.', 'Aione' )
);

printf( '<h3>%s</h3>', __( 'Meta Robots Tag:', 'Aione' ) );

$this->select(
	'noindex',
	__( 'Noindex', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( 'Tell search engines not to index this webpage.', 'Aione' )
);

$this->select(
	'nofollow',
	__( 'Nofollow', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( ' Tell search engines not to spider links on this webpage.', 'Aione' )
);*/

?>