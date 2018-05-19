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

	
	echo "<pre>";
	print_r($aione_template);
	echo "</pre>";
	


	/*
	echo "<pre>";
	echo "<br> post_type = ".$post_type;
	//echo "<br> aione_components = ".$aione_components;
	//print_r($aione_components);
	//echo "<br> aione_component = ".$aione_component;
	print_r($aione_templates);
	echo "<br> template_id = ".$template_id;
	//echo "<br> template_id = ".$aione_templates;
	echo "<br> =";
	echo "<br> = ";

	echo "</pre>";


	if(is_archive()){
		echo "<br> is_archive";
	}
	if(is_post_type_archive(array('page','openings'))){
		echo "<br> is_post_type_archive";
	}

	$options = get_option('aione-components');

	echo "<pre>";
	print_r($options);
	echo "</pre>";

	$options = wp_load_alloptions();
	foreach ($options as $key => $option) {
		echo "<br>".$key;
	}

	// echo "<pre>";
	// print_r($options);
	// echo "</pre>";
*/
	if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			/*
				* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				echo do_shortcode($aione_template);
			//get_template_part( 'template-parts/content', get_post_format() );

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

	</main><!-- #primary -->

<?php
get_footer();
