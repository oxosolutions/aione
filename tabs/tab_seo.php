<?php 
printf( '<h3>%s</h3>', __( 'Search Engine Listing:', 'gutenbergtheme' ) );

$this->text(
	'title_tag',
	__( ' Title Tag', 'gutenbergtheme' ),
	__( 'You’ve entered 0 characters. Most search engines use up to 70.', 'gutenbergtheme' )
);

$this->textarea(
	'meta_description',
	__( 'Meta Description', 'gutenbergtheme' ),
	__( 'You have to enter 40 characters. Most search engines use up to 140.', 'gutenbergtheme' )
);

$this->textarea(
	'meta_keywords',
	__( 'Meta Keywords', 'gutenbergtheme' ),
	__( 'Enter a series of keywords relevant to the page with comma sepration.<br/>For eg: Wordpress, Theme, Page, Post', 'gutenbergtheme' )
);

printf( '<h3>%s</h3>', __( 'Social Networks Listing:', 'gutenbergtheme' ) );

$this->text(
	'og_title',
	__( 'Title', 'gutenbergtheme' ),
	__( '', 'gutenbergtheme' )
);

$this->textarea(
	'og_description',
	__( 'Description', 'gutenbergtheme' ),
	__( '', 'gutenbergtheme' )
);

$this->upload(
	'og_image',
	__( 'Image', 'gutenbergtheme' ),
	__( 'Select an image.', 'gutenbergtheme' )
);
$this->text(
	'og_url',
	__( 'URL', 'gutenbergtheme' ),
	__( '', 'gutenbergtheme' )
);

