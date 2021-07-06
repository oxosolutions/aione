<?php get_header(); 
global $theme_options;
global $post;

$main_classes = array();

if ( is_home() ) {
	$main_classes[] = 'blog-'.$theme_options['blog_archive_layout'];
}


if ( is_enabled( $post->ID, 'page_padding_enable' ) ) { 
	$main_classes[] = 'page-padding';
}

if ( is_enabled( $post->ID, 'page_content_padding_enable' ) ) { 
	$main_classes[] = 'page-content-padding';
}

$main_classes[] = is_fullwidth( $post->ID, 'page' );

$main_classes   = implode(" ", $main_classes);

?>
<main id="aione_main" class="aione-main <?php echo esc_html($main_classes); ?>">
	<div class="wrapper ar">

		<?php get_template_part( 'template/aione-sidebar-left' ); ?>

		<div id="aione_content" class="aione-page-content">
			<div class="wrapper">
				<?php get_template_part( 'template/aione-content-top' ); ?>
				
				<div id="content" class="content">

					<?php if( $theme_options['advanced_ajax_content'] ) {
						//get_template_part( 'template/aione-content' ); 
					} 
					else {
						get_template_part( 'template/aione-content' ); 
					} ?>

				</div> <!-- .wrapper -->

				<?php get_template_part( 'template/aione-content-bottom' ); ?>

			</div> <!-- .wrapper -->
		</div> <!-- .aione-page-content -->
		
		<?php get_template_part( 'template/aione-sidebar-right' ); ?>

		<div class="clear"></div> <!-- .clear -->
	</div> <!-- .wrapper -->
</main> <!-- .aione-main -->
<?php
get_footer();