<?php

$this->select(
	'portfolio_width_100',
	__( 'Use 100% Width Page', 'Aione' ),
	array(
		'no'  => __( 'No', 'Aione' ),
		'yes' => __( 'Yes', 'Aione' )
	),
	__( 'Choose to set a portfolio template page to 100% browser width.', 'Aione' )
);

$this->select(
	'portfolio_content_length',
	__( 'Excerpt or Full Portfolio Content', 'Aione' ),
	array(
		'default'      => __( 'Default', 'Aione' ),
		'excerpt'      => __( 'Excerpt', 'Aione' ),
		'full_content' => __( 'Full Content', 'Aione' )
	),
	__( 'Choose to show a text excerpt or full content.', 'Aione' )
);

$this->text(
	'portfolio_excerpt',
	__( 'Excerpt Length', 'Aione' ),
	__( 'Insert the number of words you want to show in the post excerpts.', 'Aione' )
);

$types = get_terms( 'portfolio_category', 'hide_empty=0' );
$types_array[0] = __( 'All categories', 'Aione' );

if( $types ) {

	foreach( $types as $type ) {
		$types_array[$type->term_id] = $type->name;
	}

	$this->multiple(
		'portfolio_category',
		__( 'Portfolio Type', 'Aione' ),
		$types_array,
		__( 'Choose what portfolio category you want to display on this page. Leave blank for all categories.', 'Aione' )
	);

}

$this->select(
	'portfolio_filters',
	__( 'Show Portfolio Filters', 'Aione' ),
	array(
		'yes'             => __( 'Show', 'Aione' ),
		'yes_without_all' => __( 'Show without "All"', 'Aione' ),
		'no'              => __( 'Hide', 'Aione' )
	),
	__( 'Choose to show or hide the portfolio filters.', 'Aione' )
);

$this->select(
	'portfolio_text_layout',
	__( 'Portfolio Text Layout', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'boxed'   => __( 'Boxed', 'Aione' ),
		'unboxed' => __( 'Unboxed', 'Aione' )
	),
	__( 'Select if the portfolio text layouts are boxed or unboxed.', 'Aione' )
);

$this->select(
	'portfolio_featured_image_size',
	__( 'Portfolio Featured Image Size', 'Aione' ),
	array(
		'default' => __( 'Default', 'Aione' ),
		'cropped' => __( 'Fixed', 'Aione' ),
		'full'    => __( 'Auto', 'Aione' )
	),
	__( 'Choose if the featured images are fixed (cropped) or auto (full image ratio) for all portfolio column page templates. IMPORTANT: Fixed images work best with smaller site widths. Auto images work best with larger site widths.', 'Aione' )
);

$this->text(
	'portfolio_column_spacing',
	__( 'Column Spacing', 'Aione' ),
	__( 'Insert the amount of spacing between portfolio items. ex: 7px', 'Aione' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
