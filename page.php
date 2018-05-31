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

	<main id="aione_main" class="site-main aione-main">

	<?php
	global $theme_options;
	global $post;
	$draw = false;
	$pyre_sidebar_left_enable = get_aione_page_option($post->ID,'pyre_sidebar_left_enable');
	$draw = $pyre_sidebar_left_enable == 'yes' ? true 
			: ( $pyre_sidebar_left_enable == 'no' ? false 
					: (($theme_options['sidebar_left_enable'] == 1)
						? true
						: false
					)
			);
	if($draw == true):
	?>
	<section id="aione_sidebar_left" class="aione-sidebar-left">
		<div  class="aione-sidebar">
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
	$pyre_content_top_area_enable = get_aione_page_option($post->ID,'pyre_content_top_area_enable');
	$draw = $pyre_content_top_area_enable == 'yes' ? true 
			: ( $pyre_content_top_area_enable == 'no' ? false 
					: (($theme_options['content_top_area_enable'] == 1)
						? true
						: false
					)
			);
	if($draw == true):
	?>
	<section id="aione_contenttop" class="aione-contenttop">
		<div  class="aione-content-top">
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
	$pyre_content_bottom_area_enable = get_aione_page_option($post->ID,'pyre_content_bottom_area_enable');
	$draw = $pyre_content_bottom_area_enable == 'yes' ? true 
			: ( $pyre_content_bottom_area_enable == 'no' ? false 
					: (($theme_options['content_bottom_area_enable'] == 1)
						? true
						: false
					)
			);
	if($draw == true):
	?>
	<section id="aione_contentbottom" class="aione-contentbottom">
		<div  class="aione-content-bottom">
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
	$pyre_sidebar_right_enable = get_aione_page_option($post->ID,'pyre_sidebar_right_enable');
	$draw = $pyre_sidebar_right_enable == 'yes' ? true 
			: ( $pyre_sidebar_right_enable == 'no' ? false 
					: (($theme_options['sidebar_right_enable'] == 1)
						? true
						: false
					)
			);
	if($draw == true):
	?>
	<section id="aione_sidebar_right" class="aione-sidebar-right">
		<div  class="aione-sidebar">
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
