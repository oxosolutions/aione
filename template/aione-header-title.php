<?php 
global $theme_options; 
global $post;

if( is_enabled( $post->ID, 'header_show_site_title' ) || is_enabled( $post->ID, 'header_show_tagline' ) ) : 

	$description = get_bloginfo( 'description', 'display' );

$description_class = '';

if( !is_enabled( $post->ID, 'header_show_tagline' ) || empty( $description ) ) :	
	$description_class = 'no-tagline';
endif;

?>
<div id="aione_header_title" class="aione-header-title <?php echo esc_html( $description_class ); ?>">
	<a href="<?php echo esc_url( home_url() ); ?>">
		
		<?php if( is_enabled( $post->ID, 'header_show_site_title' ) ) : ?>
			<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
		<?php endif; ?>

		<?php if( is_enabled( $post->ID, 'header_show_tagline' ) ) :
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<h2 class="site-description">
					<?php echo esc_html( $description ); ?>
				</h2>
			<?php endif; ?>
		<?php endif; ?>
		
	</a>
</div>
<?php endif; ?>