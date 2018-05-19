<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gutenbergtheme
 */

get_header(); ?>

	<main id="primary" class="site-main">
	<div id="aione_page_content" class="aione-main aione-page-content">
	<div class="wrapper">

	<?php
	while ( have_posts() ) : the_post();

		?>

		
		<?php
		//get_template_part( 'template-parts/content', get_post_type() );
		$aione_post_types = get_option( AIONE_OPTION_NAME_COMPONENTS, array() );
		$current_post_type = get_post_type();
		$current_post_template = $aione_post_types[$current_post_type]['single_template'];

		if($current_post_template != 'single'){
			$custom_templates = get_option( AIONE_OPTION_NAME_TEMPLATES , array() );
			echo do_shortcode($custom_templates[$current_post_template]['content']);
		} else {
			?>
			<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
			<?php
		}
		?>
		
		<?php
		the_post_navigation( array(
			'prev_text' => '← %title',
			'next_text' => '%title →',
		) );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>
	</div>
	</div>
	</main><!-- #primary -->

<?php
get_footer();
