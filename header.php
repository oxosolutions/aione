<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	global $theme_options;
	global $post;

	$post_content_excerpt = strip_tags( wp_kses_no_null( wp_trim_words( $post->post_content, $num_words = 30, $more = null ) ) );

	//Custom CSS 
	$pyre_custom_css = get_aione_page_option( $post->ID,'pyre_custom_css' );

	//Meta description 
	$pyre_meta_description = get_aione_page_option( $post->ID,'pyre_meta_description' );
	
	//Show content/title if empty meta description 
	if( empty( $pyre_meta_description ) ) {
		$pyre_meta_description = $post_content_excerpt;
	}
	if( empty( $pyre_meta_description ) ) {
		$pyre_meta_description = get_the_title( $post->ID );
	}

	//Meta keywords
	$pyre_meta_keywords = get_aione_page_option( $post->ID,'pyre_meta_keywords' );

	//Open Graph title
	$pyre_og_title = get_aione_page_option( $post->ID,'pyre_og_title' );
	if( empty( $pyre_og_title ) ) {
		$pyre_og_title = get_the_title( $post->ID );
	}

	//Open Graph description
	$pyre_og_description = get_aione_page_option( $post->ID,'pyre_og_description' );

	//Show content/title if empty meta description 
	if( empty( $pyre_og_description ) ) {
		$pyre_og_description = $pyre_meta_description;
	}
	
	//Open Graph URL
	$pyre_og_url = get_aione_page_option( $post->ID,'pyre_og_url' );
	if( empty( $pyre_og_url ) ){
		$pyre_og_url = get_the_permalink();
	}

	//Open Graph image
	$pyre_og_image = get_aione_page_option( $post->ID,'pyre_og_image' );

	//Show featured image if image is empty 
	if( empty( $pyre_og_image ) ) {
		$pyre_og_image = get_the_post_thumbnail_url( $post->ID, 'medium' );
	}
	//Show logo if image is empty 
	if( empty( $pyre_og_image ) ) {
		$pyre_og_image = $theme_options['header_logo']['url'];
	}
	
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo sanitize_textarea_field( $pyre_meta_description ); ?>" />
	<meta name="keywords" content="<?php echo sanitize_textarea_field( $pyre_meta_keywords );?>" />

	<meta property="og:title" content="<?php echo sanitize_text_field( $pyre_og_title );?>" />
	<meta property="og:description" content="<?php echo sanitize_textarea_field( $pyre_og_description ); ?>" />
	<meta property="og:url" content="<?php echo sanitize_text_field( $pyre_og_url ); ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo(); ?>" />
	<meta property="og:image" content="<?php echo sanitize_text_field( $pyre_og_image ); ?>" />

	<meta name="twitter:title" content="<?php echo sanitize_text_field( $pyre_og_title );?>" />
	<meta name="twitter:description" content="<?php echo sanitize_textarea_field( $pyre_og_description );?>" />
	<meta name="twitter:url" content="<?php echo sanitize_text_field( $pyre_og_url ); ?>" />
	<meta name="twitter:site" content="<?php echo get_bloginfo(); ?>" />
	<meta name="twitter:image" content="<?php echo sanitize_text_field( $pyre_og_image ); ?>" />

	<meta name="theme-color" content="#168dc5"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<!-- Headstart -->
	<?php wp_head(); ?>
	<!-- Headend -->
	<?php

	$upload = wp_upload_dir();
    $upload_url = $upload['baseurl'];
	$upload_path = $upload['basedir'];


    if( is_ssl() ) {
      	$upload_url = str_replace( 'http://', 'https://', $upload_url );
    } else {
      	$upload_url = str_replace( 'https://', 'http://', $upload_url );
    }

    $manifest_url = $upload_url.'/pwa/manifest.json';
    $manifest_path = $upload_path.'/pwa/manifest.json';
    
    if( file_exists( $manifest_path ) ) {
    	echo '<link rel="manifest" href="'.$manifest_url.'">';
    } 
    ?>
    
	<!-- DESIGN SETTINGS CSS START -->
	<style>
	<?php
	
	echo '
	.aione-layout-wide .aione-topbar > .wrapper, 
	.aione-layout-wide .aione-header > .wrapper, 
	.aione-layout-wide .primary-nav > .wrapper, 
	.aione-layout-wide .aione-slider > .wrapper, 
	.aione-layout-wide .aione-pagetitle > .wrapper, 
	.aione-layout-wide .aione-pagetop > .wrapper, 
	.aione-layout-wide .aione-pagebottom > .wrapper, 
	.aione-layout-wide .aione-main > .wrapper, 
	.aione-layout-wide .aione-footer > .wrapper, 
	.aione-layout-wide .aione-copyright > .wrapper,
	.aione-layout-wide .aione-powered-by > .wrapper,
	.aione-layout-wide .aione-section > .wrapper,
	.aione-layout-boxed > .wrapper{
		max-width: '.$theme_options['site_width'].';
	}
	/*
 	.aione-header.fixed,
 	.aione-footer.fixed{
 		width: '.$theme_options['site_width'].';
 	}
	*/
	';
 
	/****** Top Bar *****/
	if( $theme_options['top_bar_customize_enable'] ) { 
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
	if( $theme_options['header_customize_enable'] ) { 
		echo '
		.aione-header{
			background-color: '.$theme_options['header_background_color'].';
			color: '.$theme_options['header_text_color'].';
		}
		.aione-header a{
			color: '.$theme_options['header_link_color'].';	
		}
		.aione-header a:hover{
			color: '.$theme_options['header_link_hover_color'].';				
		}
		';
	}
	/****** Header END*****/
	/****** Menu *****/ 
	echo '
		.aione-wrapper.layout-header-top .primary-nav{
			height: '.$theme_options['main_nav_height'].'px;
		}
		.primary-nav .aione-nav > ul > li > a {
			line-height: '.$theme_options['main_nav_height'].'px;
		}
		';
	
	if( $theme_options['main_nav_customize_enable'] ) { 
		echo '
		.primary-nav{
			background-color: '.$theme_options['main_nav_background_color'].';
		}
		.primary-nav .aione-nav > ul > li > a {
			color: '.$theme_options['main_nav_link_color'].';	
		}
		.primary-nav .aione-nav > ul > li > a:hover,
		.primary-nav .aione-nav > ul > li.current-menu-item > a,
		.primary-nav .aione-nav > ul > li.current-menu-item > a:hover,
		.primary-nav .aione-nav > ul > li.current-menu-parent > a,
		.primary-nav .aione-nav > ul > li.current-menu-parent > a:hover{
			color: '.$theme_options['main_nav_link_hover_color'].';	
			background-color: '.$theme_options['main_nav_link_hover_background_color'].';
		}
		.primary-nav .aione-nav > ul > li > ul.sub-menu {
			background-color: '.$theme_options['submenu_background_color'].';	
		}
		.primary-nav .aione-nav > ul > li > ul.sub-menu > li > a {
			color: '.$theme_options['submenu_link_color'].';	
		}
		.primary-nav .aione-nav > ul > li > ul.sub-menu > li > a:hover,
		.primary-nav .aione-nav > ul > li > ul.sub-menu > li.current-menu-item > a,
		.primary-nav .aione-nav > ul > li > ul.sub-menu > li.current-menu-item > a:hover,
		.primary-nav .aione-nav > ul > li > ul.sub-menu > li.current-menu-parent > a,
		.primary-nav .aione-nav > ul > li > ul.sub-menu > li.current-menu-parent > a:hover{
			color: '.$theme_options['submenu_link_hover_color'].';	
			background-color: '.$theme_options['submenu_link_background_hover_color'].';
		}
		'; 
	}
	
	/****** Menu END*****/
	/****** Page Title Bar*****/
	if( $theme_options['page_title_bar_customize_enable'] ) {
		echo '
		.aione-pagetitle {
			background-color: '.$theme_options['page_title_bar_background_color'].';
		}
		.aione-pagetitle .title{
			color: '.$theme_options['page_title_bar_text_color'].';
		}
		.aione-pagetitle .description{
			color: '.$theme_options['page_title_bar_text_color'].';
		}
		.aione-pagetitle a{
			color: '.$theme_options['page_title_bar_link_color'].';
		}
		.aione-pagetitle a:hover{
			color: '.$theme_options['page_title_bar_link_hover_color'].';
		}
		'; 
	}
	/****** Page Title Bar END*****/
	/****** Page Top Area END*****/
	if( $theme_options['page_top_area_customize_enable'] ) {
		echo '
			.aione-pagetop{
				background-color: '.$theme_options['page_top_area_background_color'].';
				color: '.$theme_options['page_top_area_text_color'].';
			}
			.aione-pagetop .widgettitle,
			.aione-pagetop h1,
			.aione-pagetop h2,
			.aione-pagetop h3,
			.aione-pagetop h4,
			.aione-pagetop h5,
			.aione-pagetop h6{
				color: '.$theme_options['page_top_area_heading_color'].';
			}
			.aione-pagetop a{
				color: '.$theme_options['page_top_area_link_color'].';
			}
			.aione-pagetop a:hover{
				color: '.$theme_options['page_top_area_link_hover_color'].';
			}
		'; 
	}
	/****** Page Top Area END*****/
	/****** SIDEBAR END*****/
	if( $theme_options['sidebar_customize_enable'] ) {
		echo '
			.aione-sidebar{
				background-color: '.$theme_options['sidebar_background_color'].';
				color: '.$theme_options['sidebar_text_color'].';
			}
			.aione-sidebar .widgettitle{
				color: '.$theme_options['sidebar_heading_color'].';
			}
			.aione-sidebar .widget_nav_menu ul > li > a{
				color: '.$theme_options['sidebar_link_color'].';				
			}
			.aione-sidebar .widget_nav_menu ul > li > a:hover{
				color: '.$theme_options['sidebar_link_hover_color'].';				
			}
		'; 
	}
	/****** SIDEBAR END*****/
	/****** PAGE END*****/
	if( $theme_options['page_customize_enable'] ) {
		echo '
		.aione-page-content{
			background-color: '.$theme_options['page_background_color'].';
			color: '.$theme_options['page_text_color'].';
		}
		.aione-page-content h1,
		.aione-page-content h2,
		.aione-page-content h3,
		.aione-page-content h4,
		.aione-page-content h5,
		.aione-page-content h6{
			color: '.$theme_options['page_heading_color'].';
		}
		.aione-page-content a{
			color: '.$theme_options['page_link_color'].';
		}
		.aione-page-content a:hover{
			color: '.$theme_options['page_link_hover_color'].';
		}
		'; 
	}
	/****** PAGE END*****/
	/****** Page Bottom Area END*****/
	if( $theme_options['page_bottom_area_customize_enable'] ) {
		echo '
			.aione-pagebottom{
				background-color: '.$theme_options['page_bottom_area_background_color'].';
				color: '.$theme_options['page_bottom_area_text_color'].';
			}

			.aione-pagebottom .widgettitle,
			.aione-pagebottom h1,
			.aione-pagebottom h2,
			.aione-pagebottom h3,
			.aione-pagebottom h4,
			.aione-pagebottom h5,		
			.aione-pagebottom h6{
				color: '.$theme_options['page_bottom_area_heading_color'].';
				
			
			}
			.aione-pagebottom a{
				color: '.$theme_options['page_bottom_area_link_color'].';
			}
			.aione-pagebottom a:hover{
				color: '.$theme_options['page_bottom_area_link_hover_color'].';
			}
		'; 
	}
	/****** Page Bottom Area END*****/
	/****** Footer*****/
	if( $theme_options['footer_customize_enable'] ) {
		echo '
			.aione-footer { 
				background-color: '.$theme_options['footer_background_color'].';
			}
			.aione-footer .widget,
			.aione-footer .textwidget {
				color: '.$theme_options['footer_text_color'].';
			}
			.aione-footer .widget .widgettitle{
				color: '.$theme_options['footer_heading_color'].';
			}
			.aione-footer .widget ul li a,
			.aione-footer a{
				color: '.$theme_options['footer_link_color'].';
			}
			.aione-footer .widget ul li a:hover,
			.aione-footer a:hover{
				color: '.$theme_options['footer_link_hover_color'].';
			}
		'; 
	}
	/****** Footer END*****/
	/****** Copyright*****/
	if( $theme_options['footer_copyright_customize_enable'] ) {
		echo '
			.aione-copyright {
				background-color: '.$theme_options['footer_copyright_background_color'].';
				color: '.$theme_options['footer_copyright_text_color'].';
			}
			.aione-copyright a{
				color: '.$theme_options['footer_copyright_link_color'].';
			}
			.aione-copyright a:hover{
				color: '.$theme_options['footer_copyright_link_hover_color'].';
			}
		'; 
	}
	/****** Copyright END*****/
	?>
	</style>
	<!-- DESIGN SETTING CSS START END -->
	<!-- CUSTOM CSS START -->
	<?php
	if( $theme_options['custom_css'] != "" ) {
		echo "<style>".$theme_options['custom_css']."</style>";
	}
	if( $pyre_custom_css != "" ) :
		echo "<style>".$pyre_custom_css."</style>";
	endif;
	?>
	<!-- CUSTOM CSS END -->
	<script>
	    var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
	</script>

	<!-- Common Structured Data -->
	<?php
	if ( has_custom_logo() ) { 
        $logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
    }
    ?>
	<script type="application/ld+json">
        {
			"@context": "http://schema.org",
			"@type": "Organization",
			"name": "<?php echo get_bloginfo(); ?>",
			"url": "<?php echo home_url(); ?>",
			"logo": "<?php echo $logo[0]; ?>",
         	"contactPoint": [
         		{ 
         			"@type": "ContactPoint",
         			"telephone": "+91-183-2401000",
         			"contactType": "customer service"
         		}
         	],
         	"potentialAction": {
         		"@type": "SearchAction",
         		"target": "<?php echo home_url('/'); ?>?q={search}",
         		"query-input": "required name=search"
         	}
        }         
      </script>
	<!-- Common Structured Data End -->
	<?php
	$post_type = get_post_type();
	$aione_components = get_option( 'aione-components' );
	$aione_component = @$aione_components[$post_type];
	$template_single_slug = @$aione_component['single_template'];

	$aione_templates = get_option( 'aione-templates' );
	$aione_single_structured_data = @$aione_templates[$template_single_slug]['structured_data'];
	
	if($template_single_slug != 'single'){
		echo '<script type="application/ld+json">';
		$aione_single_structured_data_string = do_shortcode($aione_single_structured_data);
		$aione_single_structured_data_text = strip_tags($aione_single_structured_data_string);

		echo $aione_single_structured_data_text;
		echo "</script>";
	} 

	$wrapper_classes = array( 'aione-wrapper' );
	$wrapper_classes[] = 'layout-header-'.$theme_options[ 'header_position' ];
	$wrapper_classes[] = 'aione-layout-'.$theme_options[ 'site_layout' ];

	if( is_enabled_sidebar( 'left' ) ){ $wrapper_classes[] = 'sidebar-left'; }
	if( is_enabled_sidebar( 'right') ){ $wrapper_classes[] = 'sidebar-right'; }


	$wrapper_classes[] = 'color-scheme-'.$theme_options['color_scheme'];
	$wrapper_classes = implode(" ",$wrapper_classes);

	$body_classes = array();
	if( is_user_logged_in() ){
		$user = wp_get_current_user();
		$user_roles = $user->roles;
		if( is_array( $user_roles ) ) {
			foreach ($user_roles as $key => $user_role) {
				$body_classes[] = "user-role-".$user_role;
			}
		}
	}
	$body_classes = implode( " ", $body_classes );
	
	?>
</head>
<body <?php body_class( $body_classes ); ?>> 
<div id="aione_wrapper" class="<?php echo @$wrapper_classes; ?>">
	<div class="wrapper">
		<?php get_template_part('template/aione-header');  ?>
		<?php if( @$theme_options['header_position'] != 'top') { 
			echo '<div class="content-wrapper">';
		} ?>
		<?php get_template_part( 'template/aione-slider' );  ?>
		<?php get_template_part( 'template/aione-pagetitle' );  ?>
		<?php get_template_part( 'template/aione-pagetop' );  ?>
		<?php get_template_part( 'template/aione-test' );  ?>