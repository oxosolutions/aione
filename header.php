<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	global $theme_options;
	global $post;
	//echo "<pre>";print_r($post);echo "</pre>";
	$pyre_custom_css = get_aione_page_option($post->ID,'pyre_custom_css');
	$pyre_meta_description = get_aione_page_option($post->ID,'pyre_meta_description');
	$pyre_meta_keywords = get_aione_page_option($post->ID,'pyre_meta_keywords');
	$pyre_og_title = get_aione_page_option($post->ID,'pyre_og_title');
	$pyre_og_description = get_aione_page_option($post->ID,'pyre_og_description');
	$pyre_og_url = get_aione_page_option($post->ID,'pyre_og_url');
	$pyre_og_image = get_aione_page_option($post->ID,'pyre_og_image');
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
	<?php
	if($pyre_og_title != ""){
		echo '<meta property="og:title" content="'.sanitize_text_field($pyre_og_title).'" />';
		echo '<meta name="twitter:title" content="'.sanitize_text_field($pyre_og_title).'" />';
	} else {
		echo '<meta property="og:title" content="'.get_the_title($post->ID).'" />';
		echo '<meta name="twitter:title" content="'.get_the_title($post->ID).'" />';
	}
	?>
	<?php
	if($pyre_og_description != ""){
		echo '<meta property="og:description" content="'.sanitize_textarea_field($pyre_og_description).'" />';
		echo '<meta name="twitter:description" content="'.sanitize_textarea_field($pyre_og_description).'" />';
	} else {
		//echo '<meta property="og:description" content="'.get_the_content($post->ID).'" />';
		//echo '<meta name="twitter:description" content="'.get_the_content($post->ID).'" />';
		$content = strip_tags( wp_kses_no_null( wp_trim_words( $post->post_content, $num_words = 30, $more = null ) ) );
		echo '<meta property="og:description" content="'.$content.'" />';
		echo '<meta name="twitter:description" content="'.$content.'" />';
	}
	?>
	<?php
	if($pyre_og_url != ""){
		echo '<meta property="og:url" content="'.sanitize_text_field($pyre_og_url).'" />';
		echo '<meta name="twitter:url" content="'.sanitize_text_field($pyre_og_url).'" />';
	} else {
		echo '<meta property="og:url" content="'.get_the_permalink($post->ID).'" />';
		echo '<meta name="twitter:url" content="'.get_the_permalink($post->ID).'" />';
	}
	?>
	<?php
		echo '<meta property="og:site_name" content="'.get_bloginfo().'" />';
		echo '<meta name="twitter:site" content="'.get_bloginfo().'" />';
	?>
	<?php 
	if($pyre_og_image != ""){
		echo '<meta property="og:image" content="'.sanitize_text_field($pyre_og_image).'" />';
		echo '<meta name="twitter:image" content="'.sanitize_text_field($pyre_og_image).'" />';
	}
	?>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
	<!-- DESIGN SETTING CSS START -->
	<style>
	<?php
	/****** Top Bar *****/
	if($theme_options['top_bar_customize_enable']) { 
		echo '
		.aione-topbar{
			background-color: '.$theme_options['top_bar_background_color'].';
			color: '.$theme_options['top_bar_text_color'].';
		}
		.aione-topbar a{
			color: '.$theme_options['top_bar_link_color'].';	
		}
		.aione-topbar a:hover{
			color: '.$theme_options['top_bar_link_hover_color'].';				
		}
		';
	}
	/****** Top Bar END*****/
	/****** Header *****/
	if($theme_options['header_customize_enable']) { 
		echo '
		.aione-header-banner{
			background-color: '.$theme_options['header_background_color'].';
			color: '.$theme_options['header_text_color'].';
		}
		.aione-header-banner a{
			color: '.$theme_options['header_link_color'].';	
		}
		.aione-header-banner a:hover{
			color: '.$theme_options['header_link_hover_color'].';				
		}
		';
	}
	/****** Header END*****/
	/****** Menu *****/
	if($theme_options['main_menu_customize_enable']) { 
		echo '
		.aione-header-banner{
			background-color: '.$theme_options['main_menu_background_color'].';
			color: '.$theme_options['header_text_color'].';
		}
		.aione-header-banner a{
			color: '.$theme_options['header_link_color'].';	
		}
		.aione-header-banner a:hover{
			color: '.$theme_options['header_link_hover_color'].';				
		}
		';
	}
	/****** Menu END*****/
	?>
	</style>
	<!-- DESIGN SETTING CSS START END -->
	<!-- CUSTOM CSS START -->
	<?php
	if($theme_options['custom_css'] != ""){
		echo "<style type='text/css'>".$theme_options['custom_css']."</style>";
	}
	if($pyre_custom_css != "") :
		echo "<style type='text/css'>".$pyre_custom_css."</style>";
	endif;
	?>
	<!-- CUSTOM CSS END -->
	<script>
	    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	</script>

	<!-- Common Structured Data -->
	<?php
	if ( has_custom_logo() ){ 
        $logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
    }
    ?>
	<script type="application/ld+json">
        {
			"@context": "http://schema.org",
			"@type": "Organization",
			"name": "<?php echo get_bloginfo();?>",
			"url": "<?php echo home_url() ;?>",
			"logo": "<?php echo $logo[0];?>",
         	"contactPoint": [
         		{ 
         			"@type": "ContactPoint",
         			"telephone": "+91-183-2401000",
         			"contactType": "customer service"
         		}
         	],
         	"potentialAction": {
         		"@type": "SearchAction",
         		"target": "<?php echo home_url('/');?>?q={search}",
         		"query-input": "required name=search"
         	}
        }         
      </script>
	<!-- Common Structured Data End -->
	<?php
	$post_type = get_post_type();
	$aione_components = get_option('aione-components');
	$aione_component = @$aione_components[$post_type];
	$template_single_slug = @$aione_component['single_template'];

	$aione_templates = get_option('aione-templates');
	$aione_single_structured_data = @$aione_templates[$template_single_slug]['structured_data'];

	if($template_single_slug != 'single'){
		echo '<script type="application/ld+json">';
		echo do_shortcode($aione_single_structured_data);
		echo "</script>";
	} 
	?>
	<style>
		.aione-layout-wide .aione-topbar > .wrapper, 
		.aione-layout-wide .aione-header > .wrapper, 
		.aione-layout-wide .aione-slider > .wrapper, 
		.aione-layout-wide .aione-pagetitle > .wrapper, 
		.aione-layout-wide .aione-main > .wrapper, 
		.aione-layout-wide .aione-footer > .wrapper, 
		.aione-layout-wide .aione-copyright > .wrapper{
			max-width:<?php echo $theme_options['site_width'].";"; ?>
		}
		.aione-layout-boxed > .wrapper{
			max-width:<?php echo $theme_options['site_width'].";"; ?>
		}
	</style>
	<?php
		$wrapper_classes = ['aione-wrapper'];
		$wrapper_classes[] = 'layout-header-'.$theme_options['header_position'];
		$wrapper_classes[] = 'aione-layout-'.$theme_options['site_layout'];
		if( is_enabled('sidebar_left_enable') ){ $wrapper_classes[] = 'sidebar-left'; }
		if( is_enabled('sidebar_right_enable') ){ $wrapper_classes[] = 'sidebar-right'; }
		$wrapper_classes[] = 'color-scheme-'.$theme_options['color_scheme'];
		$wrapper_classes = implode(" ",$wrapper_classes);
	?>
</head>
<body <?php body_class(); ?> > 
<div id="aione_wrapper" class="<?php echo @$wrapper_classes; ?>">
	<div class="wrapper">
		<?php get_template_part('template/aione-topbar');  ?>
		<?php get_template_part('template/aione-header');  ?>
		<?php get_template_part('template/aione-slider');  ?>
		<?php get_template_part('template/aione-pagetitle');  ?>
		<?php get_template_part('template/aione-pagetop');  ?>
		<?php get_template_part('template/aione-test');  ?>