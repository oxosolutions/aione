<?php	
global $post;
global $theme_options;

if( is_enabled( $post->ID, 'header_show_navigation' ) ) :

	$nav_classes   = array( 'primary-nav' );
	$nav_classes[] = 'align-'.$theme_options['main_nav_alignment'];
	$nav_classes[] = 'position-'.$theme_options['main_nav_position'];
	$nav_classes[] = is_fullwidth( $post->ID, 'main_nav' );

	$menu_classes   = array( 'wrapper' );
	$menu_classes[] = 'aione-nav';
	$menu_classes[] = 'aione-header-menu';
	$menu_classes[] = $theme_options['main_nav_layout'];
	$menu_classes[] = $theme_options['main_nav_animation'];

	if(  $theme_options['main_nav_show_description'] ){
		$menu_classes[] = 'show-description';
	}

	$nav_classes  = implode(' ', $nav_classes);
	$menu_classes = implode(' ', $menu_classes);

	$args = array(
		'theme_location'  =>  'primary-menu',
		'menu_id'         =>  'primary-menu',
		'menu_class'      =>  'aione-menu',
		'container'       =>  'div',
		'container_class' =>  $menu_classes,
		'link_before'     =>  '<span class="nav-item-text" data-hover="">',
		'link_after'      =>  '</span>',
		'depth'           =>  7,
	);

	if( is_page() || is_single() ) {
		//$pyre_displayed_menu = get_aione_page_option( $post->ID,'pyre_displayed_menu' );
		$pyre_displayed_menu = get_aione_page_settings( $post->ID,'aione_per_page_setting','pyre_displayed_menu' );
		if( $pyre_displayed_menu != 'default' ) :
			$args['menu'] = $pyre_displayed_menu; 
		endif;
	}

	?>
	<nav id="primary_nav" class="<?php echo esc_html($nav_classes); ?>">
		<div class="aione-nav-background"></div>
		<?php
		wp_nav_menu( $args );
		?>
	</nav>
<?php endif;