<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Gutenbergtheme
 */

get_header(); ?>

	<main id="primary" class="site-main">
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
	if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'gutenbergtheme' ), '<span>' . get_search_query() . '</span>' );
			?></h1>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'search' );

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
