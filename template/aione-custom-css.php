<?php 
global $theme_options; 
global $post;

$pyre_custom_css = get_aione_page_settings( $post->ID,'aione_per_page_setting','pyre_custom_css' );

echo "<style>";


if( $theme_options['color_primary'] ) {
	echo '
	/******* Global Custom CSS ************/
	.primary{
		color:'.esc_html($theme_options['color_primary']).';
	}
	.secondary{
		color:'.esc_html($theme_options['color_secondary']).';
	}
	.highlight{
		color:'.esc_html($theme_options['color_highlight']).';
	}
	.hover-primary:hover{
		color:'.esc_html($theme_options['color_primary']).';
	}
	.hover-secondary:hover{
		color:'.esc_html($theme_options['color_secondary']).';
	}
	.hover-highlight:hover{
		color:'.esc_html($theme_options['color_highlight']).';
	}
	.bg-primary{
		background-color:'.esc_html($theme_options['bg_color_primary']).';
	}
	.bg-secondary{
		background-color:'.esc_html($theme_options['bg_color_secondary']).';
	}
	.bg-highlight{
		background-color:'.esc_html($theme_options['bg_color_highlight']).';
	}
	.hover-bg-primary:hover{
		background-color:'.esc_html($theme_options['bg_color_primary']).';
	}
	.hover-bg-secondary:hover{
		background-color:'.esc_html($theme_options['bg_color_secondary']).';
	}
	.hover-bg-highlight:hover{
		background-color:'.esc_html($theme_options['bg_color_highlight']).';
	}

	input[type=button], 
	input[type=reset], 
	input[type=submit] {
	    border: '.esc_html($theme_options['color_primary']).';;
	    background-color: '.esc_html($theme_options['color_primary']).';;
	}

	input[type=button]:hover, 
	input[type=reset]:hover, 
	input[type=submit]:hover {
	    border: '.esc_html($theme_options['color_highlight']).';;
	    background-color: '.esc_html($theme_options['color_highlight']).';;
	}
	'; 
}

echo '
html{
	font-size:'.esc_html($theme_options['font']['font-size']).';
}
';



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
		body,
		.font-primary{
			/**
			DO NOT ESC HTML; Breaks Font
			Google Font
			**/
			font-family: "'.$theme_options['font']['font-family'].'";
			font-weight: '.esc_html($theme_options['font']['font-weight']).';
		}';

} else {
	echo '
		body,
		.font-primary{
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
		h6,
		.font-heading{
			/**
			DO NOT ESC HTML; Breaks Font
			Google Font
			**/
			font-family: '.$theme_options['font_heading']['font-family'].';
			font-weight: '.esc_html($theme_options['font_heading']['font-weight']).';
			/*
			color:'.esc_html($theme_options['font_heading']['color']).';
			*/
		}
		';

} else {
	echo '
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		.font-heading{
			/**
			DO NOT ESC HTML; Breaks Font
			Normal Font
			**/
			font-family: '.$theme_options['font_heading']['font-family'].';
			font-weight: '.esc_html($theme_options['font_heading']['font-weight']).';
			/*
			color:'.esc_html($theme_options['font_heading']['color']).';
			*/
		}
		';
}


if( $theme_options['font_other']['google'] == 'true'){
	echo '
		.font-secondry{
			/**
			DO NOT ESC HTML; Breaks Font
			Google Font
			**/
			font-family: '.$theme_options['font_other']['font-family'].';
			font-weight: '.esc_html($theme_options['font_other']['font-weight']).';
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

	.header-wrapper{
		background-color: '.esc_html($theme_options['header_background_color']).';
	}
	.aione-header{
		background-color: '.esc_html($theme_options['header_background_color']).';
		color: '.esc_html($theme_options['header_text_color']).';
	}
	.aione-header-title .site-title{
		color: '.esc_html($theme_options['header_text_color']).';
	}
	.aione-header-title .site-description{
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
if( $theme_options['logo_height'] ) { 
	echo '
		.aione-header-logo > a > img{
			height: '.esc_html( $theme_options['logo_height'] ).'px
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
		padding: 0 '.esc_html($theme_options['main_nav_padding']).'px;
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
	.primary-nav .aione-nav > ul > li.current-menu-parent > a:hover,
	.primary-nav .aione-nav > ul > li.current-page-ancestor > a,
	.primary-nav .aione-nav > ul > li.current-page-ancestor > a:hover{
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
	.primary-nav .aione-nav > ul > li > ul.sub-menu > li.current-menu-parent > a:hover,
	.primary-nav .aione-nav > ul > li > ul.sub-menu > li.current-page-ancestor > a,
	.primary-nav .aione-nav > ul > li > ul.sub-menu > li.current-page-ancestor > a:hover{
		color: '.esc_html($theme_options['submenu_link_hover_color']).';	
		background-color: '.esc_html($theme_options['submenu_link_background_hover_color']).';
	}

	.primary-nav .aione-nav > ul > li ul.sub-menu > li > a {
		color: '.esc_html($theme_options['submenu_link_color']).';	
	}
	.primary-nav .aione-nav > ul > li ul.sub-menu > li > a:hover,
	.primary-nav .aione-nav > ul > li ul.sub-menu > li.current-menu-item > a,
	.primary-nav .aione-nav > ul > li ul.sub-menu > li.current-menu-item > a:hover,
	.primary-nav .aione-nav > ul > li ul.sub-menu > li.current-menu-parent > a,
	.primary-nav .aione-nav > ul > li ul.sub-menu > li.current-menu-parent > a:hover,
	.primary-nav .aione-nav > ul > li ul.sub-menu > li.current-page-ancestor > a,
	.primary-nav .aione-nav > ul > li ul.sub-menu > li.current-page-ancestor > a:hover{
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
		color: '.esc_html($theme_options['page_title_bar_text_color']).';
	}
	.aione-pagetitle .title{
		color: '.esc_html($theme_options['page_title_bar_heading_color']).';
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
	.aione-main,.aione-pagetop, .aione-pagebottom  {
		background-color: '.esc_html($theme_options['page_background_color']).';
	}
	.aione-page-content{
		background-color: '.esc_html($theme_options['content_background_color']).';
		color: '.esc_html($theme_options['page_text_color']).';
	}
	h1,
	h2,
	h3,
	h4,
	h5,
	h6{
		color: '.esc_html($theme_options['page_heading_color']).';
	}
	a{
		color: '.esc_html($theme_options['page_link_color']).';
	}
	a:hover{
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
/****** Poweredby*****/
if( $theme_options['footer_poweredby'] ) {
	echo '
		.aione-powered-by {
			background-color: '.esc_html($theme_options['footer_poweredby_background_color']).';
			color: '.esc_html($theme_options['footer_poweredby_text_color']).';
		}
		.aione-powered-by a{
			color: '.esc_html($theme_options['footer_poweredby_link_color']).';
		}
		.aione-powered-by a:hover{
			color: '.esc_html($theme_options['footer_poweredby_link_hover_color']).';
		}
	'; 
}
/****** Poweredby END*****/

?>
<?php
if( $theme_options['custom_css'] != "" ):
	// do not use filter esc_html; It breaks css
	// do not add wp_kses_post; it converts > to &gt;
	echo $theme_options['custom_css'];
endif;
?>
/******* Page Custom CSS ************/
<?php

if($pyre_custom_css != ""):
	// do not use filter esc_html; It breaks css
	// do not use filter wp_kses_post; it converts > to &gt;
	echo $pyre_custom_css;
endif;

echo "</style>";

?>