<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); global $theme_options;?>>
<div id="aione_wrapper" class="aione-wrapper layout-header-top aione-layout-wide">
	<div class="wrapper">
		<?php get_template_part('template/aione-topbar');  ?>
		<?php get_template_part('template/aione-header');  ?>
		<?php get_template_part('template/aione-slider');  ?>
		<?php get_template_part('template/aione-pagetitle');  ?>





