<?php global $theme_options; ?>
<?php 
if($theme_options['header_enable'] == 1):
	?>
	<header id="aione_header" class="aione-header">
		<div class="wrapper">
			<?php 
			if($theme_options['header_show_logo'] == 1):
			?>
				<div id="aione_header_logo" class="aione-header-logo">
					<?php get_template_part('template/aione-header-logo');  ?>
				</div>
			<?php
			endif;
			if($theme_options['header_show_site_title'] == 1):
			?>	
				<div id="aione_header_title" class="aione-header-title">
					<?php get_template_part('template/aione-header-title');  ?>
				</div>
			<?php
			endif;
			if($theme_options['header_show_navigation'] == 1):
			?>	
				<div id="aione_header_menu" class="aione-header-menu">
					<?php get_template_part('template/aione-header-menu');  ?>
				</div>
			<?php
			endif;
			if($theme_options['header_show_banner'] == 1):
			?>
				<div id="aione_header_banner" class="aione-header-banner">
					<?php get_template_part('template/aione-header-banner');  ?>
				</div>
			<?php
			endif;
			?>	
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</header><!-- .aione-header -->
<?php
endif;