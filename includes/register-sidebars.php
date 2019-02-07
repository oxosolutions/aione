<?php

$aione_sidebar_left = array(
	'name'          => __( 'Sidebar Left', 'aione' ),
	'id'            => 'aione-sidebar-left',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>' 
);

$aione_sidebar_right = array(
	'name'          => __( 'Sidebar Right', 'aione' ),
	'id'            => 'aione-sidebar-right',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>' 
);

$aione_topbar_left_args = array(
	'name'          => __( 'Topbar Left', 'aione' ),
	'id'            => 'aione-topbar-left',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="aione-topbar-item widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);

$aione_topbar_right_args = array(
	'name'          => __( 'Topbar Right', 'aione' ),
	'id'            => 'aione-topbar-right',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);

$aione_header_banner_args = array(
	'name'          => __( 'Header Banner', 'aione' ),
	'id'            => 'aione-header-banner',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);

$aione_footer_column_args = array(
	/* translators: %1$s is replaced with "string" */
	'name'          => __( 'Footer Column %1$s', 'aione' ),
	'id'            => 'footer-column',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>' 
);

$aione_copyright_left_args = array(
	'name'          => __( 'Copyright Left', 'aione' ),
	'id'            => 'aione-copyright-left',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);

$aione_copyright_right_args = array(
	'name'          => __( 'Copyright Right', 'aione' ),
	'id'            => 'aione-copyright-right',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);

$aione_pagetop_content_args = array(
	'name'          => __( 'Page Top Area', 'aione' ),
	'id'            => 'aione-pagetop-content',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);

$aione_pagebottom_content_args = array(
	'name'          => __( 'Page Bottom Area', 'aione' ),
	'id'            => 'aione-pagebottom-content',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);

$aione_contenttop_content_args = array(
	'name'          => __( 'Content Top Area', 'aione' ),
	'id'            => 'aione-contenttop-content',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
);

$aione_contentbottom_content_args = array(
	'name'          => __( 'Content Bottom Area', 'aione' ),
	'id'            => 'aione-contentbottom-content',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<span class="widgettitle">',
	'after_title'   => '</span>' 
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