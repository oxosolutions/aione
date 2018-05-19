<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gutenbergtheme
 */

get_header(); ?>

	<main id="primary" class="site-main">

	<?php
	$post_type = get_post_type();
	$aione_components = get_option('aione-components');
	$aione_component = $aione_components[$post_type];
	$template_slug = $aione_component['archive_template'];

	$aione_templates = get_option('aione-templates');
	$aione_template = $aione_templates[$template_slug]['content'];
	

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
		<?php 
		/* Start the Loop */
		while ( have_posts() ) : the_post(); 
			if($template_slug == ""){
				get_template_part( 'template-parts/content', get_post_format() );
			} else if($template_slug != 'archive'){
				echo do_shortcode($aione_template);
			} else { 
				get_template_part( 'template-parts/content', get_post_format() );
			}

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
