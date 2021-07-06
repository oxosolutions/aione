<?php 
global $post, $theme_options;

$blog_archive_layout = $theme_options['blog_archive_layout'];
$blog_archive_grid_columns = $theme_options['blog_archive_grid_columns'];

$post_type 				= get_post_type( $post->ID );



$column_class = "l50";

if( $blog_archive_layout == 'list' ){
	$column_class = "l100";
}

if( $blog_archive_layout == 'grid' ){

	if( $blog_archive_grid_columns == '1' ){
		$column_class = "l100";
	}
	if( $blog_archive_grid_columns == '3' ){
		$column_class = "l33";
	}
	if( $blog_archive_grid_columns == '4' ){
		$column_class = "l25";
	}
	if( $blog_archive_grid_columns == '5' ){
		$column_class = "l20";
	}
}

?>

<div class="ac <?php echo $column_class;?> m100 s100 mb-24">
	<div class="aione-wrapper p-12 shadow bg-white">


		<article id="post_<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="blog-image">
				<?php if ( has_post_thumbnail( get_the_ID() ) && $theme_options['blog_archive_featured_image_enable'] == 1 ) { ?>
					<div class="featured-image rounded">
						<?php the_post_thumbnail( 'medium' ); ?>	
					</div>
				<?php } ?>
			</div>
			<div class="blog-content">
				<header class="entry-header">
					<?php if ( $theme_options['blog_archive_title_enable'] == 1 ) { 
						$title_start = '';
						$title_end = '';
						$title_start .= '<h1 class="entry-title">';
						if ( $theme_options['blog_archive_title_link_enable'] == 1 ) {
							$title_start .= '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
							$title_end .= '</a>';
						}
						$title_end .= '</h1>';
						the_title( $title_start, $title_end );
					} ?>
					<div class="entry-meta">
						<?php gutenbergtheme_posted_on(); ?>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->

				<div class="entry-content"> 
					<?php if( $theme_options['blog_archive_excerpt'] == 1 ) {
						echo esc_html( wp_trim_words( get_the_content(), $theme_options['blog_archive_excerpt_length'], '...' ) );
					} else {
						echo esc_html( wp_trim_words( get_the_content() ) );
					}
					?>
				</div><!-- .entry-content -->

				<footer>
					<?php if( $theme_options['blog_archive_read_more_enable'] == 1 ) { ?>
						<a class="read-more-link" href="<?php echo esc_url( get_permalink() ); ?>">
							<?php if( $theme_options['blog_archive_read_more_text'] ) {
								echo $theme_options['blog_archive_read_more_text'];
							} 
							else { ?>
								Read more..
							<?php } ?>
						</a>
					<?php } ?>
				</footer><!-- .entry-footer -->
			</div>

		</article><!-- #post-<?php the_ID(); ?> -->


	</div>
</div>
