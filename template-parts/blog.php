<?php 
global $theme_options;
?>
<article id="post_<?php the_ID(); ?>" <?php post_class(); ?>> 
	<div class="ar list-blog">
		<div class="ac s100 m50 l40">
			<?php if ( has_post_thumbnail( get_the_ID() ) && $theme_options['blog_archive_featured_image_enable'] == 1 ) { ?>
				<div class="featured-image aione-rounded">
					<?php the_post_thumbnail( 'medium' ); ?>	
				</div>
			<?php } ?>
		</div>
		<div class="ac s100 m50 l60">
			<header class="entry-header">
				<?php 
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				?>
				<div class="entry-meta">
					<?php gutenbergtheme_posted_on(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

			<div class="entry-content"> 
				<?php if( $theme_options['blog_archive_content_length'] == 'Excerpt' ) {
					echo wp_trim_words( get_the_content(), $theme_options['blog_archive_excerpt_length'], '...' );
				} else {
					echo get_the_content();
				}
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<a class="read-more-link" href="<?php echo get_permalink(); ?>">Read more</a>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
