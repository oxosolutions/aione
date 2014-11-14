<?php global $theme_options; ?>
<div class="header-v4">
    <?php get_template_part('framework/header/topbar'); ?>
	<header id="header">
		<div class="aione-row" style="padding-top:<?php echo $theme_options['margin_header_top']; ?>;padding-bottom:<?php echo $theme_options['margin_header_bottom']; ?>;">
            <?php get_template_part('framework/header/logo'); ?>

			<?php if($theme_options['header_v4_content'] == 'TaglineAndSearch'): ?>
			<?php if($theme_options['logo_alignment'] == 'Left' || $theme_options['logo_alignment'] == 'Center'): ?>
				<form role="search" id="searchform" class="search" method="get" action="<?php echo home_url( '/' ); ?>">
					<div class="search-table">
						<div class="search-field">
							<input type="text" placeholder="<?php echo _e( 'Search...', 'aione' ); ?>" value="" name="s" id="s" />
						</div>
						<div class="search-button">
							<input type="submit" id="searchsubmit" value="&#xf002;" />
						</div>
					</div>
				</form>
				<?php if($theme_options['header_tagline']): ?>
				<h3 class="tagline"><?php echo $theme_options['header_tagline']; ?></h3>
				<?php endif; ?>
			<?php elseif($theme_options['logo_alignment'] == 'Right'): ?>
				<?php if($theme_options['header_tagline']): ?>
				<h3 class="tagline"><?php echo $theme_options['header_tagline']; ?></h3>
				<?php endif; ?>
				<form role="search" id="searchform" class="search" method="get" action="<?php echo home_url( '/' ); ?>">
					<div class="search-table">
						<div class="search-field">
							<input type="text" placeholder="<?php echo _e( 'Search...', 'aione' ); ?>" value="" name="s" id="s" />
						</div>
						<div class="search-button">
							<input type="submit" id="searchsubmit" value="&#xf002;" />
						</div>
					</div>
				</form>
			<?php endif; ?>
			<?php elseif($theme_options['header_v4_content'] == 'Tagline'): ?>
			<?php if($theme_options['header_tagline']): ?>
			<h3 class="tagline"><?php echo $theme_options['header_tagline']; ?></h3>
			<?php endif; ?>
			<?php elseif($theme_options['header_v4_content'] == 'Search'): ?>
			<form role="search" id="searchform" class="search" method="get" action="<?php echo home_url( '/' ); ?>">
				<div class="search-table">
					<div class="search-field">
						<input type="text" placeholder="<?php echo _e( 'Search...', 'aione' ); ?>" value="" name="s" id="s" />
					</div>
					<div class="search-button">
						<input type="submit" id="searchsubmit" value="&#xf002;" />
					</div>
				</div>
			</form>
			<?php elseif($theme_options['header_v4_content'] == 'Banner'): ?>
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
			<?php if(tf_checkIfMenuIsSetByLocation('main_navigation')): ?>
			<div class="mobile-nav-holder main-menu"></div>
			<?php endif; ?>
		</div>
	</div>
</div>