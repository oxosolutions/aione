<?php
/*global $post;
$pyre_displayed_menu = get_aione_page_option($post->ID,'pyre_displayed_menu');
if($pyre_displayed_menu != 'default'):
	// Conditionally change menus
	add_filter( 'wp_nav_menu_args', 'aione_per_page_menu' );
endif;
function aione_per_page_menu( $pyre_displayed_menu ) {
	// change the menu in the Header menu position
	if( $args['theme_location'] == 'menu-1' && is_page($post->ID) ) { 
		$args['menu'] = $pyre_displayed_menu; 
	}
	return $args;
}*/	
global $post;
global $theme_options;
$args = array(
	'theme_location' => 'menu-1',
	'menu_id'        => 'primary-menu',
	'menu_class'     => 'aione-menu',
	'depth'          => 3,
	//'walker' => new CSS_Menu_Maker_Walker()
);
if(is_page() || is_single()){
	$pyre_displayed_menu = get_aione_page_option($post->ID,'pyre_displayed_menu');
	if($pyre_displayed_menu != 'default'):
		$args['menu'] = $pyre_displayed_menu; 
	endif;
}

?>
<nav id="aione_nav" class="aione-nav horizontal light">
    <div class="aione-nav-background"></div>
	<div class="aione-header-menu">
		<?php
			wp_nav_menu( $args );
		?>
	</div>
</nav>