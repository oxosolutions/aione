<?php

$aione_sidebar_left = array(
	'name'          => __( 'Sidebar Left', 'aione_theme_locale' ),
	'id'            => 'aione-sideba-left',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
);
$aione_sidebar_right = array(
	'name'          => __( 'Sidebar Right', 'theme_text_domain' ),
	'id'            => 'aione-sideba-right',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
);

$aione_topbar_left_args = array(
	'name'          => __( 'Topbar Left', 'theme_text_domain' ),
	'id'            => 'aione-topbar-left',
	'description'   => '77777777',
	'class'         => 'ooooo',
	'before_widget' => '<div id="%1$s" class="aione-topbar-item widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);
$aione_topbar_right_args = array(
	'name'          => __( 'Topbar Right', 'theme_text_domain' ),
	'id'            => 'aione-topbar-right',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);

$aione_header_banner_args = array(
	'name'          => __( 'Header Banner', 'theme_text_domain' ),
	'id'            => 'aione-header-banner',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);

$aione_footer_column_args = array(
	'name'          => __( 'Footer Column %d', 'theme_text_domain' ),
	'id'            => 'footer-column',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>' 
);

$aione_copyright_left_args = array(
	'name'          => __( 'Copyright Left', 'theme_text_domain' ),
	'id'            => 'aione-copyright-left',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);
$aione_copyright_right_args = array(
	'name'          => __( 'Copyright Right', 'theme_text_domain' ),
	'id'            => 'aione-copyright-right',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);

$aione_pagetop_content_args = array(
	'name'          => __( 'Page Top Area', 'theme_text_domain' ),
	'id'            => 'aione-pagetop-content',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
);

$aione_pagebottom_content_args = array(
	'name'          => __( 'Page Bottom Area', 'theme_text_domain' ),
	'id'            => 'aione-pagebottom-content',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
);
$aione_contenttop_content_args = array(
	'name'          => __( 'Content Top Area', 'theme_text_domain' ),
	'id'            => 'aione-contenttop-content',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
);
$aione_contentbottom_content_args = array(
	'name'          => __( 'Content Bottom Area', 'theme_text_domain' ),
	'id'            => 'aione-contentbottom-content',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' 
);

register_sidebar( $aione_topbar_left_args ); 
register_sidebar( $aione_topbar_right_args ); 
register_sidebar( $aione_header_banner_args ); 

register_sidebar( $aione_sidebar_left ); 
register_sidebar( $aione_sidebar_right ); 

register_sidebar( $aione_pagetop_content_args ); 
register_sidebar( $aione_pagebottom_content_args );
register_sidebar( $aione_contenttop_content_args ); 
register_sidebar( $aione_contentbottom_content_args );

register_sidebars( 4, $aione_footer_column_args );
register_sidebar( $aione_copyright_left_args );
register_sidebar( $aione_copyright_right_args );