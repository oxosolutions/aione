<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	global $post;
	$pyre_custom_css = get_aione_page_option($post->ID,'pyre_custom_css');
	$pyre_meta_description = get_aione_page_option($post->ID,'pyre_meta_description');
	$pyre_meta_keywords = get_aione_page_option($post->ID,'pyre_meta_keywords');
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
	if($pyre_meta_description != "") :
		echo '<meta name="description" content="'.sanitize_textarea_field($pyre_meta_description).'">';
	endif;
	?>
	<?php
	if($pyre_meta_keywords != "") :
		echo '<meta name="keywords" content="'.sanitize_textarea_field($pyre_meta_keywords).'">';
	endif;
	?>
<!-- Schema.org markup for Google+ -->	
<!-- <meta itemprop="name" content="The Name or Title Here">
<meta itemprop="description" content="This is the page description">
<meta itemprop="image" content="http://www.example.com/image.jpg"> -->
<!-- Twitter Card data -->
<!-- <meta name="twitter:card" content="product">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="Page Title">
<meta name="twitter:description" content="Page description less than 200 characters">
<meta name="twitter:creator" content="@author_handle">
<meta name="twitter:image" content="http://www.example.com/image.jpg">
<meta name="twitter:data1" content="$3">
<meta name="twitter:label1" content="Price">
<meta name="twitter:data2" content="Black">
<meta name="twitter:label2" content="Color"> -->
<!-- Open Graph data -->
<!-- <meta property="og:title" content="Title Here" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://www.example.com/" />
<meta property="og:image" content="http://example.com/image.jpg" />
<meta property="og:description" content="Description Here" />
<meta property="og:site_name" content="Site Name, i.e. Moz" />
<meta property="og:price:amount" content="15.00" />
<meta property="og:price:currency" content="USD" /> -->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
	<?php
	if($pyre_custom_css != "") :
		echo "<style>".$pyre_custom_css."</style>";
	endif;
	?>
	
</head>
<body <?php body_class(); ?>>
<div id="aione_wrapper" class="aione-wrapper layout-header-top aione-layout-wide">
	<div class="wrapper">
		<?php get_template_part('template/aione-topbar');  ?>
		<?php get_template_part('template/aione-header');  ?>
		<?php get_template_part('template/aione-slider');  ?>
		<?php get_template_part('template/aione-pagetitle');  ?>
		<?php get_template_part('template/aione-pagetop');  ?>





