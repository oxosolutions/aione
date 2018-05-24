<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gutenbergtheme
 */
get_header(); ?>
	<?php
		global $theme_options;
	?>
	<main id="aione_main" class="aione-main ">
	<?php
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
		if ( have_posts() ) :		
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ;
				/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/	
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
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
