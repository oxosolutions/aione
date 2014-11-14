<?php global $theme_options; ?>
<div class="header-v4">
	<?php if($theme_options['header_left_content'] != 'Leave Empty' || $theme_options['header_right_content'] != 'Leave Empty'): ?>
	<div class="header-social">
		<div class="aione-row">
			<div class="alignleft">
				<?php
				if($theme_options['header_left_content'] == 'Contact Info') {
					get_template_part('framework/headers/header-info');
				} elseif($theme_options['header_left_content'] == 'Social Links') {
					get_template_part('framework/headers/header-social');
				} elseif($theme_options['header_left_content'] == 'Navigation') {
					get_template_part('framework/headers/header-menu');
				}
				?>
			</div>
			<div class="alignright">
				<?php
				if($theme_options['header_right_content'] == 'Contact Info') {
					get_template_part('framework/headers/header-info');
				} elseif($theme_options['header_right_content'] == 'Social Links') {
					get_template_part('framework/headers/header-social');
				} elseif($theme_options['header_right_content'] == 'Navigation') {
					get_template_part('framework/headers/header-menu');
				}
				?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<header id="header">
		<div class="aione-row" style="padding-top:<?php echo $theme_options['margin_header_top']; ?>;padding-bottom:<?php echo $theme_options['margin_header_bottom']; ?>;">
			<div class="logo-container">
				<div class="logo" data-margin-right="<?php echo $theme_options['margin_logo_right']; ?>" data-margin-left="<?php echo $theme_options['margin_logo_left']; ?>" data-margin-top="<?php echo $theme_options['margin_logo_top']; ?>" data-margin-bottom="<?php echo $theme_options['margin_logo_bottom']; ?>" style="margin-right:<?php echo $theme_options['margin_logo_right']; ?>;margin-top:<?php echo $theme_options['margin_logo_top']; ?>;margin-left:<?php echo $theme_options['margin_logo_left']; ?>;margin-bottom:<?php echo $theme_options['margin_logo_bottom']; ?>;">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo $theme_options['logo']; ?>" alt="<?php bloginfo('name'); ?>" class="normal_logo" />
						<?php if($theme_options['logo_retina'] && $theme_options['retina_logo_width'] && $theme_options['retina_logo_height']): ?>
						<?php
						$pixels ="";
						if(is_numeric($theme_options['retina_logo_width']) && is_numeric($theme_options['retina_logo_height'])):
						$pixels ="px";
						endif; ?>
						<img src="<?php echo $theme_options["logo_retina"]; ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo $theme_options["retina_logo_width"].$pixels; ?>;max-height:<?php echo $theme_options["retina_logo_height"].$pixels; ?>; height: auto !important" class="retina_logo" />
						<?php endif; ?>
					</a>
				</div>

				<?php if( $theme_options['header_v4_content'] == 'Tagline And Search' ): ?>
				<?php if( ( $theme_options['logo_alignment'] == 'Left' || $theme_options['logo_alignment'] == 'Center' ) && $theme_options['mobile_menu_design'] == 'modern' ): ?>
					<form role="search" id="searchform" class="search" method="get" action="<?php echo home_url( '/' ); ?>">
						<div class="search-table">
							<div class="search-field">
								<input type="text" placeholder="<?php echo _e( 'Search...', 'Aione' ); ?>" value="" name="s" id="s" />
							</div>
							<div class="search-button">
								<input type="submit" id="searchsubmit" value="&#xf002;" />
							</div>
						</div>
					</form>
					<?php if($theme_options['header_tagline']): ?>
					<h3 class="tagline"><?php echo $theme_options['header_tagline']; ?></h3>
					<?php endif; ?>
				<?php elseif( $theme_options['logo_alignment'] == 'Right' && $theme_options['mobile_menu_design'] == 'modern' ): ?>
					<?php if($theme_options['header_tagline']): ?>
					<h3 class="tagline"><?php echo $theme_options['header_tagline']; ?></h3>
					<?php endif; ?>
					<form role="search" id="searchform" class="search" method="get" action="<?php echo home_url( '/' ); ?>">
						<div class="search-table">
							<div class="search-field">
								<input type="text" placeholder="<?php echo _e( 'Search...', 'Aione' ); ?>" value="" name="s" id="s" />
							</div>
							<div class="search-button">
								<input type="submit" id="searchsubmit" value="&#xf002;" />
							</div>
						</div>
					</form>
				<?php else: ?>
					<form role="search" id="searchform" class="search" method="get" action="<?php echo home_url( '/' ); ?>">
						<div class="search-table">
							<div class="search-field">
								<input type="text" placeholder="<?php echo _e( 'Search...', 'Aione' ); ?>" value="" name="s" id="s" />
							</div>
							<div class="search-button">
								<input type="submit" id="searchsubmit" value="&#xf002;" />
							</div>
						</div>
					</form>
					<?php if($theme_options['header_tagline']): ?>
					<h3 class="tagline"><?php echo $theme_options['header_tagline']; ?></h3>
					<?php endif; ?>
				<?php endif; ?>
				<?php elseif($theme_options['header_v4_content'] == 'Tagline'): ?>
				<?php if($theme_options['header_tagline']): ?>
				<h3 class="tagline"><?php echo $theme_options['header_tagline']; ?></h3>
				<?php endif; ?>
				<?php elseif($theme_options['header_v4_content'] == 'Search'): ?>
				<form role="search" id="searchform" class="search" method="get" action="<?php echo home_url( '/' ); ?>">
					<div class="search-table">
						<div class="search-field">
							<input type="text" placeholder="<?php echo _e( 'Search...', 'Aione' ); ?>" value="" name="s" id="s" />
						</div>
						<div class="search-button">
							<input type="submit" id="searchsubmit" value="&#xf002;" />
						</div>
					</div>
				</form>
				<?php endif; ?>


			</div>

			<?php if($theme_options['mobile_menu_design'] == 'modern' && ! $theme_options['ubermenu']): ?>
			<div class="mobile-menu-icons">
				<a href="#" class="aioneicon aioneicon-bars"></a>
				<?php if( $theme_options['header_v4_content'] == 'Search' || $theme_options['header_v4_content'] == 'Tagline And Search'): ?>
				<a href="#" class="aioneicon aioneicon-search"></a>
				<?php endif; ?>
				<?php if( class_exists('Woocommerce') && $theme_options['woocommerce_cart_link_main_nav'] ): ?>
				<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" class="aioneicon aioneicon-shopping-cart"></a>
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<?php if($theme_options['header_v4_content'] == 'Banner'): ?>
			<div id="header-banner">
			<?php echo $theme_options['header_banner_code']; ?>
			</div>
			<?php endif; ?>
		</div>
	</header>
	<div id="small-nav">
		<div class="aione-row">
			<?php if($theme_options['ubermenu']): ?>
			<nav id="nav-uber">
			<?php else: ?>
			<nav id="nav" class="nav-holder">
			<?php endif; ?>
				<?php get_template_part('framework/headers/header-main-menu'); ?>
			</nav>
			<?php if(tf_checkIfMenuIsSetByLocation('main_navigation') && $theme_options['mobile_menu_design'] == 'classic' && ! $theme_options['ubermenu']): ?>
			<div class="mobile-nav-holder main-menu"></div>
			<?php endif; ?>
		</div>
	</div>
	<?php if(tf_checkIfMenuIsSetByLocation('main_navigation') && $theme_options['mobile_menu_design'] == 'modern' && ! $theme_options['ubermenu']): ?>
	<div class="mobile-nav-holder main-menu"></div>
	<?php endif; ?>
	<?php if( ( $theme_options['header_v4_content'] == 'Search' || $theme_options['header_v4_content'] == 'Tagline And Search' ) && $theme_options['mobile_menu_design'] == 'modern' && ! $theme_options['ubermenu'] ): ?>
	<form role="search" id="searchform" class="search mobile-header-search" method="get" action="<?php echo home_url( '/' ); ?>">
		<div class="search-table">
			<div class="search-field">
				<input type="text" placeholder="<?php echo _e( 'Search...', 'Aione' ); ?>" value="" name="s" id="s" />
			</div>
			<div class="search-button">
				<input type="submit" id="searchsubmit" value="&#xf002;" />
			</div>
		</div>
	</form>
	<?php endif; ?>
</div>