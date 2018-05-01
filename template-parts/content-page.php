<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gutenbergtheme
 */
global $theme_options;
if($theme_options['sidebar_left_enable'] == 1):
?>
<section id="aione_sidebar_left" class="aione-sidebar-left">
	<div id="" class="aione-sidebar">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-sidebar-left' ) ):
				dynamic_sidebar( 'aione-sidebar-left' );
			endif;
			?>
		</div>
	</div>
</section>
<?php
endif;

if($theme_options['content_top_area_enable'] == 1):
?>
<section id="aione_contenttop" class="aione-contenttop">
	<div id="" class="aione-content-top">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-contenttop-content' ) ):
				dynamic_sidebar( 'aione-contenttop-content' );
			endif;
			?>
		</div>
	</div>
</section>
<?php
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title aione-align-center m-0">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gutenbergtheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'gutenbergtheme' ),
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
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php
if($theme_options['content_bottom_area_enable'] == 1):
?>
<section id="aione_contentbottom" class="aione-contentbottom">
	<div id="" class="aione-content-bottom">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-contentbottom-content' ) ):
				dynamic_sidebar( 'aione-contentbottom-content' );
			endif;
			?>
		</div>
	</div>
</section>
<?php
endif;


if($theme_options['sidebar_right_enable'] == 1):
?>
<section id="aione_sidebar_right" class="aione-sidebar-right">
	<div id="" class="aione-sidebar">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-sidebar-right' ) ):
				dynamic_sidebar( 'aione-sidebar-right' );
			endif;
			?>
		</div>
	</div>
</section>
<?php
endif;
?>
<div class="aione-clear"></div><!-- .aione-clear -->
