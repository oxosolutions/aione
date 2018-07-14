<?php get_header(); ?>

<main id="aione_main" class="aione-main <?php echo is_fullwidth('page');?>">
	<div class="wrapper">

		<?php get_template_part( 'template/aione-sidebar-left'); ?>

		<div id="aione_content" class="aione-page-content">
			<div class="wrapper">
				<?php get_template_part( 'template/aione-content-top'); ?>

				<?php get_template_part( 'template/aione-content'); ?>

				<?php get_template_part( 'template/aione-content-bottom'); ?>
			</div> <!-- .wrapper -->
		</div> <!-- .aione-page-content -->
		
		<?php get_template_part( 'template/aione-sidebar-right'); ?>

		<div class="aione-clear"></div> <!-- .aione-clear -->
	</div> <!-- .wrapper -->
</main> <!-- .aione-main -->
<?php
get_footer();