<?php 
get_header();
global $theme_options;
global $post;
?>
INDEX.PHP
<main id="aione_main" class="aione-main <?php echo is_fullwidth( $post->ID, 'page');?>">
	<div class="wrapper">

		<?php get_template_part( 'template/aione-sidebar-left'); ?>

		<?php if ( is_home() ){ $blog_classes = 'blog-'.$theme_options['blog_archive_layout']; } ?>
		<div id="aione_content" class="aione-page-content <?php echo @$blog_classes;?>">
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