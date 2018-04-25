<nav id="aione_nav" class="aione-nav horizontal light">
    <div class="aione-nav-background"></div>
	<div class="aione-header-menu">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'menu_class'     => 'aione-menu',
				'depth'          => 3,
				//'walker' => new CSS_Menu_Maker_Walker()
			) );
		?>
	</div>
</nav>