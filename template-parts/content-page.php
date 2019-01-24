<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gutenbergtheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!--_to_be_deleted-->
	<!--
	<header class="entry-header">
		<?php //the_title( '<h2 class="entry-title aione-align-center m-0">', '</h2>' ); ?>
	</header> -->
	<!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aione' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php 
	/*
	if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							// translators: %s: Name of current post. Only visible to screen readers 
							__( 'Edit <span class="screen-reader-text">%s</span>', 'aione' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php 
endif;*/
 ?>
	<!--_to_be_deleted-->
</article><!-- #post-<?php the_ID(); ?> -->

