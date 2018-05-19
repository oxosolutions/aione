<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gutenbergtheme
 */

get_header(); ?>

	<main id="primary aione_main" class="site-main aione-main">

	<?php
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
	?>

	<div id="aione_content" class="aione-content">
	<?php
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

		<?php 
		while ( have_posts() ) : the_post();
		   get_template_part( 'template-parts/content', 'page' ); 
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
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
	?>
	</div> <!-- #aione_content -->
	<?php
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
	
	</main><!-- #primary -->

<?php
get_footer();
