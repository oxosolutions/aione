<?php get_header(); 
global $theme_options;
global $post;

$main_classes = array();

if ( is_home() ){ 
	$main_classes[] = 'blog-'.$theme_options['blog_archive_layout'];
}

if ( is_enabled( $post->ID, 'page_padding_enable' ) ){ 
	$main_classes[] = 'page-padding';
}

if ( is_enabled( $post->ID, 'page_content_padding_enable' ) ){ 
	$main_classes[] = 'page-content-padding';
}

$main_classes[] = is_fullwidth( $post->ID, 'page' );

$main_classes = implode(" ", $main_classes);
?>
<main id="aione_main" class="aione-main <?php echo @$main_classes;?>">
	<div class="wrapper">

		<?php get_template_part( 'template/aione-sidebar-left'); ?>

		<div id="aione_content" class="aione-page-content">
			<div class="wrapper">
				<?php get_template_part( 'template/aione-content-top'); ?>

				<?php get_template_part( 'template/aione-content'); ?>

				<?php get_template_part( 'template/aione-content-bottom'); ?>

				<?php 
				if( is_post_type_archive() || is_archive()){

					posts_nav_link();

					// posts_nav_link();
					/*
					$args = array(
						'base'               => '%_%',
						'format'             => '?paged=%#%',
						'total'              => 1,
						'current'            => 0,
						'show_all'           => false,
						'end_size'           => 1,
						'mid_size'           => 2,
						'prev_next'          => true,
						'prev_text'          => __('« Previous'),
						'next_text'          => __('Next »'),
						'type'               => 'plain',
						'add_args'           => false,
						'add_fragment'       => '',
						'before_page_number' => '',
						'after_page_number'  => ''
					);

					echo paginate_links( $args );

					*/
					global $wp_query;

					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages
					) );

				}
				?>
			</div> <!-- .wrapper -->
		</div> <!-- .aione-page-content -->
		
		<?php get_template_part( 'template/aione-sidebar-right'); ?>

		<div class="aione-clear"></div> <!-- .aione-clear -->
	</div> <!-- .wrapper -->
</main> <!-- .aione-main -->
<?php
get_footer();