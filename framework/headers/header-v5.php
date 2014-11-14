<?php global $theme_options; ?>
<div class="header-v5">
    <?php get_template_part('framework/header/topbar'); ?>
	<header id="header">
		<div class="aione-row" style="padding-top:<?php echo $theme_options['margin_header_top']; ?>;padding-bottom:<?php echo $theme_options['margin_header_bottom']; ?>; overflow:hidden;">
            <?php get_template_part('framework/header/logo'); ?>
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