
<article id="post_<?php the_ID(); ?>" <?php post_class(); ?>> 
	<?php if ( the_post_thumbnail( get_the_ID() ) && $theme_options['blog_single_featured_image_enable'] == 1 ) { ?>
		<div class="featured-image rounded">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
	<?php } ?>
	<header class="entry-header">
		<?php 
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">','</h1>' );
		else :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;
		//_to_be_deleted
		//if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php gutenbergtheme_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		//endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aione' ),
				array(
					'span'  => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aione' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //gutenbergtheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<!--_to_be_deleted-->
</article><!-- #post-<?php the_ID(); ?> -->
