<?php

$this->select(
	'show_top_bar',
	__( 'Show Top Bar', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Choose to show or hide the topbar.', 'aione' )
);
$this->select(
	'top_bar_100_width',
	__( '100% Top bar width', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Set Yes to set the top bar to 100% of the browser width. Only works with wide layout mode.', 'aione' )
);
$this->select(
	'header_enable',
	__( 'Show header', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Select Yes to show Header' , 'aione' )
);
$this->select(
	'header_100_width',
	__( '100% Header Width', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes' 	  => __( 'Yes', 'aione' ),
		'no'  	  => __( 'No', 'aione' )
	),
	__( 'Set Yes to set the header to 100% of the browser width. Only works with wide layout mode.' , 'aione' )
);
$this->select(
	'header_show_logo',
	__( 'Show Logo', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable the logo on header.' , 'aione' )
);
$this->select(
	'header_show_site_title',
	__( 'Show Site Title', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable the site title on header.' , 'aione' )
);
$this->select(
	'header_show_tagline',
	__( 'Show Tagline', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable the Tagline on header.' , 'aione' )
);
$this->select(
	'header_show_navigation',
	__( 'Show Naviagtion', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable Navigation on header' , 'aione' )
);
$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
$menu_select['default'] = 'Default Menu';

foreach ( $menus as $menu ) {
	$menu_select[$menu->term_id] = $menu->name;
}

$this->select(
	'displayed_menu',
	__( 'Main Navigation Menu', 'aione' ),
	$menu_select,
	__( 'Select which menu displays on this page.', 'aione' )
);
$this->select(
	'main_nav_show_home_icon',
	__( 'Show Home Icon', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable home icon on main menu' , 'aione' )
);
$this->select(
	'main_nav_show_home_link',
	__( 'Show Home Link', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable home link on main menu' , 'aione' )
);
$this->select(
	'main_nav_show_description',
	__( 'Show Menu Description', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable menu description on main menu' , 'aione' )
);
$this->select(
	'main_nav_search_icon',
	__( 'Show Search Icon in Main Menu', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable Search on main menu' , 'aione' )
);
$this->select(
	'menu_display_dropdown_indicator',
	__( 'Dropdown Menu Indicator', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable arrow indicators next to parent level menu items' , 'aione' )
);
$this->select(
	'header_show_banner',
	__( 'Show Banner', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable Banner on header' , 'aione' )
);
$this->select(
	'slidingbar_widgets',
	__( 'Show Sliding Bar', 'aione' ),
	array(
		'default' => __( 'Default', 'aione' ),
		'yes'     => __( 'Yes', 'aione' ),
		'no'      => __( 'No', 'aione' )
	),
	__( 'Enable the top sliding bar.' , 'aione' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
