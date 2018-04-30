<?php

$this->select(
	'show_first_featured_image',
	__( 'Disable First Featured Image', 'Aione' ),
	array(
		'no'  => __( 'No', 'Aione' ),
		'yes' => __( 'Yes', 'Aione' )
	),
	__( 'Disable the 1st featured image on single post pages.', 'Aione' )
);

$this->select(
	'portfolio_width_100',
	__( 'Use 100% Width Page', 'Aione' ),
	array(
		'default' 	=> __( 'Default', 'Aione' ),
		'no'  		=> __( 'No', 'Aione' ),
		'yes' 		=> __( 'Yes', 'Aione' )
	),
	__( 'Choose to set this post to 100% browser width.', 'Aione' )
);

$this->textarea(
	'video',
	__( 'Video Embed Code', 'Aione' ),
	__( 'Insert Youtube or Vimeo embed code.', 'Aione' )
);

$this->text(
	'fimg_width',
	__( 'Featured Image Width', 'Aione' ),
	__( 'In pixels or percentage, ex: 100% or 100px. Use "auto" if you set a fixed height, to make sure the image is resized respecting the aspect ratio. Value cannot exceed original image width.', 'Aione' )
);

$this->text(
	'fimg_height',
	__( 'Featured Image Height', 'Aione' ),
	__( 'In pixels or percentage, ex: 100% or 100px. Use "auto" if you set a fixed height, to make sure the image is resized respecting the aspect ratio. Value cannot exceed original image height.', 'Aione' )
);

$this->select(
	'image_rollover_icons',
	__( 'Image Rollover Icons', 'Aione' ),
	array(
		'default'  => __( 'Default', 'Aione' ),
		'linkzoom' => __( 'Link + Zoom', 'Aione' ),
		'link'     => __( 'Link', 'Aione' ),
		'zoom'     => __( 'Zoom', 'Aione' ),
		'no'       => __( 'No Icons', 'Aione' )
	),
	__( 'Choose which icons display on this post.', 'Aione' )
);

$this->text(
	'link_icon_url',
	__( 'Link Icon URL', 'Aione' ),
	__( 'Leave blank for post URL.', 'Aione' )
);

$this->select(
	'post_links_target',
	__( 'Open Post Links In New Window', 'Aione' ),
	array(
		'no'  => __( 'No', 'Aione' ),
		'yes' => __( 'Yes', 'Aione' )
	),
	__( 'Choose to open the single post page link in a new window.', 'Aione' )
);

$this->select(
	'related_posts',
	__( 'Show Related Posts', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Show', 'Aione' ),
		'no'      => __( 'Hide', 'Aione' )
	),
	__( 'Choose to show or hide related posts on this post.', 'Aione' )
);

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

$this->select(
	'post_pagination',
	__( 'Show Previous/Next Pagination', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Show', 'Aione' ),
		'no'      => __( 'Hide', 'Aione' )
	),
	__( 'Choose to show or hide the post navigation', 'Aione' )
);

$this->select(
	'author_info',
	__( 'Show Author Info Box', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Show', 'Aione' ),
		'no'      => __( 'Hide', 'Aione' )
	),
	__( 'Choose to show or hide the author info box', 'Aione' )
);

$this->select(
	'post_meta',
	__( 'Show Post Meta', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Show', 'Aione' ),
		'no'      => __( 'Hide', 'Aione' )
	),
	__( 'Choose to show or hide the post meta', 'Aione' )
);

$this->select(
	'post_comments',
	__( 'Show Comments', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Show', 'Aione' ),
		'no'      => __( 'Hide', 'Aione' )
	),
	__( 'Choose to show or hide comments area', 'Aione' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
