<?php 

/*$this->textarea(
	'custom_css',
	__( 'Custom CSS', 'gutenbergtheme' ),
	__( 'Insert custom css for the page.', 'gutenbergtheme' )
);

$this->textarea(
	'custom_js',
	__( 'Custom JS', 'gutenbergtheme' ),
	__( 'Insert custom JS for the page.', 'gutenbergtheme' )
);
*/
$this->ace_editor(
	'custom_css',
	__( 'Custom CSS', 'gutenbergtheme' ),
	__( 'Insert custom css for the page.', 'gutenbergtheme' )
);
$this->ace_editor(
	'custom_js',
	__( 'Custom JS', 'gutenbergtheme' ),
	__( 'Insert custom JS for the page.', 'gutenbergtheme' )
);


?>