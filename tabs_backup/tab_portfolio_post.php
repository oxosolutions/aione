<?php

$this->select(
	'width',
	__( 'Width (Content Columns for Featured Image)', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'full'    => __( 'Full Width', 'Aione' ),
		'half'    => __( 'Half Width', 'Aione' )
	),
	__( 'Choose if the featured image is full or half width.', 'Aione' )
);

$this->select(
	'portfolio_width_100',
	__( 'Use 100% Width Page', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'no'      => __( 'No', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' )
	),
	__( 'Choose to set this post to 100% browser width.', 'Aione' )
);

$this->select(
	'project_desc_title',
	__( 'Show Project Description Title', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( 'Choose to show or hide the project description title.', 'Aione' )
);

$this->select(
	'project_details',
	__( 'Show Project Details', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' ),
		'no'      => __( 'No', 'Aione' )
	),
	__( 'Choose to show or hide the project details text.', 'Aione' )
);

$this->select(
	'show_first_featured_image',
	__( 'Disable First Featured Image', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'no'      => __( 'No', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' )
	),
	__( 'Disable the 1st featured image on single post pages.', 'Aione' )
);

$this->textarea(
	'video',
	__( 'Video Embed Code', 'Aione' ),
	__( 'Insert Youtube or Vimeo embed code.', 'Aione' )
);

$this->text(
	'video_url',
	__( 'Youtube/Vimeo Video URL for Lightbox', 'Aione' ),
	__( 'Insert the video URL that will show in the lightbox.', 'Aione' )
);

$this->text(
	'project_url',
	__( 'Project URL', 'Aione' ),
	__( 'The URL the project text links to.', 'Aione' )
);

$this->text(
	'project_url_text',
	__( 'Project URL Text', 'Aione' ),
	__( 'The custom project text that will link.', 'Aione' )
);

$this->text(
	'copy_url',
	__( 'Copyright URL', 'Aione' ),
	__( 'The URL the copyright text links to.', 'Aione' )
);

$this->text(
	'copy_url_text',
	__( 'Copyright URL Text', 'Aione' ),
	__( 'The custom copyright text that will link.', 'Aione' )
);

$this->text(
	'fimg_width',
	__( 'Featured Image Width', 'Aione' ),
	__( 'In pixels or percentage, ex: 100% or 100px. Or Use "auto" for automatic resizing if you added either width or height.', 'Aione' )
);

$this->text(
	'fimg_height',
	__( 'Featured Image Height', 'Aione' ),
	__( 'In pixels or percentage, ex: 100% or 100px. Or Use "auto" for automatic resizing if you added either width or height.', 'Aione' )
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
	'link_icon_target',
	__( 'Open Post Links In New Window', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'no'      => __( 'No', 'Aione' ),
		'yes'     => __( 'Yes', 'Aione' )
	),
	__( 'Choose to open the single post page, project url and copyright url links in a new window.', 'Aione' )
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

// Omit closing PHP tag to avoid "Headers already sent" issues.
