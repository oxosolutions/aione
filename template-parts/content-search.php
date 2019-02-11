<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gutenbergtheme
 */

global $post;

$post_type 				= get_post_type( $post->ID );
$aione_components 		= get_option( 'aione-components' );
$aione_component 		= $aione_components[$post_type];
$single_template_slug 	= $aione_component['single_template'];
$archive_template_slug 	= $aione_component['archive_template'];

$aione_templates 		= get_option( 'aione-templates' );
$aione_template_single 	= $aione_templates[$single_template_slug]['content'];
$aione_template_archive = $aione_templates[$archive_template_slug]['content'];
?>

<?php  
if( isset( $archive_template_slug ) && $archive_template_slug != 'archive' ) { 
	echo do_shortcode( $aione_template_archive );
} else { 
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			
			<div class="entry-meta">
				<?php gutenbergtheme_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php //endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php gutenbergtheme_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		<!--_to_be_deleted-->
	</article><!-- #post-<?php the_ID(); ?> -->
<?php
}
?>