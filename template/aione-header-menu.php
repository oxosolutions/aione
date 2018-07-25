<?php	
if( is_enabled('header_show_navigation') ):

	global $post;
	global $theme_options;

	$args = array(
		'theme_location' => 'primary-menu',
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

	$nav_classes = array('aione-nav');
	$nav_classes[] = @$theme_options['main_nav_layout'];
	$nav_classes[] = 'align-'.@$theme_options['main_nav_alignment'];
	$nav_classes[] = 'position-'.@$theme_options['main_nav_position'];

	$nav_classes = implode(' ', $nav_classes);

	?>
	<nav id="aione_nav" class="<?php echo $nav_classes; ?>">
	    <div class="aione-nav-background"></div>
		<div class="aione-header-menu">
			<?php
				wp_nav_menu( $args );
			?>
		</div>
	</nav>
<?php endif;