<?php

$this->select(
	'show_top_bar',
	__( 'Show Top Bar', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Choose to show or hide the topbar.', 'gutenbergtheme' )
);
$this->select(
	'top_bar_100_width',
	__( '100% Top bar width', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Set Yes to set the top bar to 100% of the browser width. Only works with wide layout mode.', 'gutenbergtheme' )
);
$this->select(
	'header_enable',
	__( 'Show header', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Select Yes to show Header' , 'gutenbergtheme' )
);
$this->select(
	'header_100_width',
	__( '100% Header Width', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Set Yes to set the header to 100% of the browser width. Only works with wide layout mode.' , 'gutenbergtheme' )
);
$this->select(
	'header_show_logo',
	__( 'Show Logo', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable the logo on header.' , 'gutenbergtheme' )
);
$this->select(
	'header_show_site_title',
	__( 'Show Site Title', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable the site title on header.' , 'gutenbergtheme' )
);
$this->select(
	'header_show_tagline',
	__( 'Show Tagline', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable the Tagline on header.' , 'gutenbergtheme' )
);
$this->select(
	'header_show_navigation',
	__( 'Show Naviagtion', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable Navigation on header' , 'gutenbergtheme' )
);
$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
$menu_select['default'] = 'Default Menu';

foreach ( $menus as $menu ) {
	$menu_select[$menu->term_id] = $menu->name;
}

$this->select(
	'displayed_menu',
	__( 'Main Navigation Menu', 'gutenbergtheme' ),
	$menu_select,
	__( 'Select which menu displays on this page.', 'gutenbergtheme' )
);
$this->select(
	'main_nav_show_home_icon',
	__( 'Show Home Icon', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable home icon on main menu' , 'gutenbergtheme' )
);
$this->select(
	'main_nav_show_home_link',
	__( 'Show Home Link', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable home link on main menu' , 'gutenbergtheme' )
);
$this->select(
	'main_nav_show_description',
	__( 'Show Menu Description', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable menu description on main menu' , 'gutenbergtheme' )
);
$this->select(
	'main_nav_search_icon',
	__( 'Show Search Icon in Main Menu', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable Search on main menu' , 'gutenbergtheme' )
);
$this->select(
	'menu_display_dropdown_indicator',
	__( 'Dropdown Menu Indicator', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable arrow indicators next to parent level menu items' , 'gutenbergtheme' )
);
$this->select(
	'header_show_banner',
	__( 'Show Banner', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable Banner on header' , 'gutenbergtheme' )
);
$this->select(
	'slidingbar_widgets',
	__( 'Show Sliding Bar', 'gutenbergtheme' ),
	array(
		'default' => __( 'Default', 'gutenbergtheme' ),
		'yes' => __( 'Yes', 'gutenbergtheme' ),
		'no'  => __( 'No', 'gutenbergtheme' )
	),
	__( 'Enable the top sliding bar.' , 'gutenbergtheme' )
);

// Omit closing PHP tag to avoid "Headers already sent" issues.
