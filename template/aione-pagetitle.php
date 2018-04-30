<?php
//TBD: Check ENABLED Check Global and pagewise Settings
global $theme_options;
if($theme_options['page_title_bar'] == 1){ ?>
	<div id="aione_pagetitle" class="aione-pagetitle">
		<div class="wrapper">
			<?php if($theme_options['page_title_bar_enable_title'] == 1){ ?>
			<h1 class="title">
			<?php the_title();?>
			</h1>
			<?php } ?>
			<?php if($theme_options['page_title_bar_enable_description'] == 1){ ?>
			<h2 class="description"></h2>
			<?php } ?>
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-pagetitle -->
<?php
}
?>