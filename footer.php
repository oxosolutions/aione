<?php
global $post, $theme_options; 

$global_js = $theme_options['custom_js'];
$custom_js = get_aione_page_option( $post->ID, 'pyre_custom_js' );
$pyre_custom_css = get_aione_page_option( $post->ID,'pyre_custom_css' );

?>
		<?php get_template_part( 'template/aione-pagebottom' );  ?>
		<?php get_template_part( 'template/aione-footer' );  ?>
		<?php get_template_part( 'template/aione-copyright' );  ?>
		<?php get_template_part( 'template/aione-powered-by' );  ?>

		<?php if( $theme_options['header_position'] != 'top' ) { 
			echo '</div>';
		} ?>

		<a href="#aione_wrapper" class="scrolltop" title="Scroll to top of the page"></a>
		
		</div><!-- .wrapper -->
	</div><!-- .aione-wrapper -->

	<?php 
	wp_footer();
	//Custom CSS 
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
		max-width: '.esc_html($theme_options['site_width']).';
	}
	/*
 	.aione-header.fixed,
 	.aione-footer.fixed{
 		width: '.esc_html($theme_options['site_width']).';
 	}
	*/
	';
	if( $theme_options['font']['google'] == 'true'){
		echo '
			body{
				/**
				DO NOT ESC HTML; Breaks Font
				Google Font
				**/
				font-family: "'.$theme_options['font']['font-family'].'";
				font-weight: '.esc_html($theme_options['font']['font-weight']).';
			}';

	} else {
		echo '
			body{
				/**
				DO NOT ESC HTML; Breaks Font
				Normal Font
				**/
				font-family: '.$theme_options['font']['font-family'].';
				font-weight: '.esc_html($theme_options['font']['font-weight']).';
			}';
	}

	if( $theme_options['font_heading']['google'] == 'true'){
		echo '
			h1,
			h2,
			h3,
			h4,
			h5,
			h6{
				/**
				DO NOT ESC HTML; Breaks Font
				Google Font
				**/
				font-family: '.$theme_options['font_heading']['font-family'].';
				font-weight: '.esc_html($theme_options['font_heading']['font-weight']).';
				color:'.esc_html($theme_options['font_heading']['color']).';
			}
			';

	} else {
		echo '
			h1,
			h2,
			h3,
			h4,
			h5,
			h6{
				/**
				DO NOT ESC HTML; Breaks Font
				Normal Font
				**/
				font-family: '.$theme_options['font_heading']['font-family'].';
				font-weight: '.esc_html($theme_options['font_heading']['font-weight']).';
				color:'.esc_html($theme_options['font_heading']['color']).';
			}
			';
	}
 
	/****** Top Bar *****/
	if( $theme_options['top_bar_customize_enable'] ) { 
		echo '
		.aione-topbar{
			background-color: '.esc_html($theme_options['top_bar_background_color']).';
			color: '.esc_html($theme_options['top_bar_text_color']).';
		}
		.aione-topbar a{
			color: '.esc_html($theme_options['top_bar_link_color']).';	
		}
		.aione-topbar a:hover{
			color: '.esc_html($theme_options['top_bar_link_hover_color']).';				
		}
		';
	}
	/****** Top Bar END*****/
	/****** Header *****/
	if( $theme_options['header_customize_enable'] ) { 
		echo '
		.aione-header{
			background-color: '.esc_html($theme_options['header_background_color']).';
			color: '.esc_html($theme_options['header_text_color']).';
		}
		.aione-header a{
			color: '.esc_html($theme_options['header_link_color']).';	
		}
		.aione-header a:hover{
			color: '.esc_html($theme_options['header_link_hover_color']).';				
		}
		';
	}
	/****** Header END*****/
	/****** Menu *****/ 
	echo '
		.aione-wrapper.layout-header-top .primary-nav{
			height: '.esc_html($theme_options['main_nav_height']).'px;
		}
		.primary-nav .aione-nav > ul > li > a {
			line-height: '.esc_html($theme_options['main_nav_height']).'px;
		}
		';
	
	if( $theme_options['main_nav_customize_enable'] ) { 
		echo '
		.primary-nav{
			background-color: '.esc_html($theme_options['main_nav_background_color']).';
		}
		.primary-nav .aione-nav > ul > li > a {
			color: '.esc_html($theme_options['main_nav_link_color']).';	
		}
		.primary-nav .aione-nav > ul > li > a:hover,
		.primary-nav .aione-nav > ul > li.current-menu-item > a,
		.primary-nav .aione-nav > ul > li.current-menu-item > a:hover,
		.primary-nav .aione-nav > ul > li.current-menu-parent > a,
		.primary-nav .aione-nav > ul > li.current-menu-parent > a:hover{
			color: '.esc_html($theme_options['main_nav_link_hover_color']).';	
			background-color: '.esc_html($theme_options['main_nav_link_hover_background_color']).';
		}
		.primary-nav .aione-nav > ul > li > ul.sub-menu {
			background-color: '.esc_html($theme_options['submenu_background_color']).';	
		}
		.primary-nav .aione-nav > ul > li > ul.sub-menu > li > a {
			color: '.esc_html($theme_options['submenu_link_color']).';	
		}
		.primary-nav .aione-nav > ul > li > ul.sub-menu > li > a:hover,
		.primary-nav .aione-nav > ul > li > ul.sub-menu > li.current-menu-item > a,
		.primary-nav .aione-nav > ul > li > ul.sub-menu > li.current-menu-item > a:hover,
		.primary-nav .aione-nav > ul > li > ul.sub-menu > li.current-menu-parent > a,
		.primary-nav .aione-nav > ul > li > ul.sub-menu > li.current-menu-parent > a:hover{
			color: '.esc_html($theme_options['submenu_link_hover_color']).';	
			background-color: '.esc_html($theme_options['submenu_link_background_hover_color']).';
		}
		'; 
	}
	
	/****** Menu END*****/
	/****** Page Title Bar*****/
	if( $theme_options['page_title_bar_customize_enable'] ) {
		echo '
		.aione-pagetitle {
			background-color: '.esc_html($theme_options['page_title_bar_background_color']).';
		}
		.aione-pagetitle .title{
			color: '.esc_html($theme_options['page_title_bar_text_color']).';
		}
		.aione-pagetitle .description{
			color: '.esc_html($theme_options['page_title_bar_text_color']).';
		}
		.aione-pagetitle a{
			color: '.esc_html($theme_options['page_title_bar_link_color']).';
		}
		.aione-pagetitle a:hover{
			color: '.esc_html($theme_options['page_title_bar_link_hover_color']).';
		}
		'; 
	}
	/****** Page Title Bar END*****/
	/****** Page Top Area END*****/
	if( $theme_options['page_top_area_customize_enable'] ) {
		echo '
			.aione-pagetop{
				background-color: '.esc_html($theme_options['page_top_area_background_color']).';
				color: '.esc_html($theme_options['page_top_area_text_color']).';
			}
			.aione-pagetop .widgettitle,
			.aione-pagetop h1,
			.aione-pagetop h2,
			.aione-pagetop h3,
			.aione-pagetop h4,
			.aione-pagetop h5,
			.aione-pagetop h6{
				color: '.esc_html($theme_options['page_top_area_heading_color']).';
			}
			.aione-pagetop a{
				color: '.esc_html($theme_options['page_top_area_link_color']).';
			}
			.aione-pagetop a:hover{
				color: '.esc_html($theme_options['page_top_area_link_hover_color']).';
			}
		'; 
	}
	/****** Page Top Area END*****/
	/****** SIDEBAR END*****/
	if( $theme_options['sidebar_customize_enable'] ) {
		echo '
			.aione-sidebar{
				background-color: '.esc_html($theme_options['sidebar_background_color']).';
				color: '.esc_html($theme_options['sidebar_text_color']).';
			}
			.aione-sidebar .widgettitle{
				color: '.esc_html($theme_options['sidebar_heading_color']).';
			}
			.aione-sidebar .widget_nav_menu ul > li > a{
				color: '.esc_html($theme_options['sidebar_link_color']).';				
			}
			.aione-sidebar .widget_nav_menu ul > li > a:hover{
				color: '.esc_html($theme_options['sidebar_link_hover_color']).';				
			}
		'; 
	}
	/****** SIDEBAR END*****/
	/****** PAGE END*****/
	if( $theme_options['page_customize_enable'] ) {
		echo '
		.aione-page-content{
			background-color: '.esc_html($theme_options['page_background_color']).';
			color: '.esc_html($theme_options['page_text_color']).';
		}
		.aione-page-content h1,
		.aione-page-content h2,
		.aione-page-content h3,
		.aione-page-content h4,
		.aione-page-content h5,
		.aione-page-content h6{
			color: '.esc_html($theme_options['page_heading_color']).';
		}
		.aione-page-content a{
			color: '.esc_html($theme_options['page_link_color']).';
		}
		.aione-page-content a:hover{
			color: '.esc_html($theme_options['page_link_hover_color']).';
		}
		'; 
	}
	/****** PAGE END*****/
	/****** Page Bottom Area END*****/
	if( $theme_options['page_bottom_area_customize_enable'] ) {
		echo '
			.aione-pagebottom{
				background-color: '.esc_html($theme_options['page_bottom_area_background_color']).';
				color: '.esc_html($theme_options['page_bottom_area_text_color']).';
			}

			.aione-pagebottom .widgettitle,
			.aione-pagebottom h1,
			.aione-pagebottom h2,
			.aione-pagebottom h3,
			.aione-pagebottom h4,
			.aione-pagebottom h5,		
			.aione-pagebottom h6{
				color: '.esc_html($theme_options['page_bottom_area_heading_color']).';
				
			
			}
			.aione-pagebottom a{
				color: '.esc_html($theme_options['page_bottom_area_link_color']).';
			}
			.aione-pagebottom a:hover{
				color: '.esc_html($theme_options['page_bottom_area_link_hover_color']).';
			}
		'; 
	}
	/****** Page Bottom Area END*****/
	/****** Footer*****/
	if( $theme_options['footer_customize_enable'] ) {
		echo '
			.aione-footer { 
				background-color: '.esc_html($theme_options['footer_background_color']).';
			}
			.aione-footer .widget,
			.aione-footer .textwidget {
				color: '.esc_html($theme_options['footer_text_color']).';
			}
			.aione-footer .widget .widgettitle{
				color: '.esc_html($theme_options['footer_heading_color']).';
			}
			.aione-footer .widget ul li a,
			.aione-footer a{
				color: '.esc_html($theme_options['footer_link_color']).';
			}
			.aione-footer .widget ul li a:hover,
			.aione-footer a:hover{
				color: '.esc_html($theme_options['footer_link_hover_color']).';
			}
		'; 
	}
	/****** Footer END*****/
	/****** Copyright*****/
	if( $theme_options['footer_copyright_customize_enable'] ) {
		echo '
			.aione-copyright {
				background-color: '.esc_html($theme_options['footer_copyright_background_color']).';
				color: '.esc_html($theme_options['footer_copyright_text_color']).';
			}
			.aione-copyright a{
				color: '.esc_html($theme_options['footer_copyright_link_color']).';
			}
			.aione-copyright a:hover{
				color: '.esc_html($theme_options['footer_copyright_link_hover_color']).';
			}
		'; 
	}
	/****** Copyright END*****/
	?>
	<?php
	if( $theme_options['custom_css'] != "" ) {
		// do not use filter esc_html; It breaks css
		// do not add wp_kses_post; it converts > to &gt;
		echo $theme_options['custom_css'];
	}
	if( $pyre_custom_css != "" ) :
		// do not use filter esc_html; It breaks css
		// do not use filter wp_kses_post; it converts > to &gt;
		echo $pyre_custom_css;
	endif;
	?>
	</style>
	<!-- CUSTOM CSS END -->
	<?php

	$upload = wp_upload_dir();
    $upload_url = $upload['baseurl'];
	$upload_path = $upload['basedir'];

	/*
	_to_be_deleted

    if( is_ssl() ){
      	$upload_url = str_replace( 'http://', 'https://', $upload_url );
    } else {
      	$upload_url = str_replace( 'https://', 'http://', $upload_url );
    }*/
    $serviceworker_url = $upload_url.'/pwa/serviceworker.js';
    $serviceworker_path = $upload_path.'/pwa/serviceworker.js';

    $serviceworker = '';

    if( file_exists( $serviceworker_path ) ) {
		$serviceworker = "
			if ('serviceWorker' in navigator) {
				//navigator.serviceWorker.register('/serviceworker.js', { scope: '/' }).then(function(reg) {
				var serviceworkerPath = '".$serviceworker_url."';
				navigator.serviceWorker.register(serviceworkerPath).then(function(reg) {

				if(reg.installing) {
					console.log('Service worker installing');
				} else if(reg.waiting) {
					console.log('Service worker installed');
				} else if(reg.active) {
					console.log('Service worker active');
				}
				console.log('ServiceWorker registration successful with scope: ', reg.scope);

				}).catch(function(error) {
					console.log('Registration failed with ' + error);
				});
			}
		";
    }
    ?>
	<script>
		var ajaxurl = "<?php echo esc_url(admin_url( 'admin-ajax.php' )); ?>";
		
	<?php
	if( !empty( $global_js ) || !empty( $custom_js ) || !empty( $serviceworker ) ) {

		if( !empty( $global_js ) ) {
			echo wp_kses_post($global_js);
		}

		if( !empty( $custom_js ) ) {
			echo wp_kses_post($custom_js);
		}

		if( !empty( $serviceworker ) ) {
			echo wp_kses_post($serviceworker);
		}

	}
	?>
	</script>
	</body>
</html>
