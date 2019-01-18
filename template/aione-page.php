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

$main_classes = implode(" ", $main_classes);

?>
<main id="aione_main" class="aione-main <?php echo esc_html($main_classes); ?>">
	<div class="wrapper ar">

		<?php get_template_part( 'template/aione-sidebar-left' ); ?>

		<div id="aione_content" class="aione-page-content">
			<div class="wrapper">
				<?php get_template_part( 'template/aione-content-top' ); ?>
				
				<?php get_template_part( 'template/aione-content' ); ?>

				<?php get_template_part( 'template/aione-content-bottom' ); ?>

				<?php 
				if( is_post_type_archive() || is_archive() || is_home() || is_search()) {
					echo wp_kses_post( aione_pagination() );
				}
				?>
			</div> <!-- .wrapper -->
		</div> <!-- .aione-page-content -->
		
		<?php get_template_part( 'template/aione-sidebar-right' ); ?>

		<div class="aione-clear"></div> <!-- .aione-clear -->
	</div> <!-- .wrapper -->
</main> <!-- .aione-main -->
<?php
get_footer();