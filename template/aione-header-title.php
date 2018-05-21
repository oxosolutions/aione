<?php 
global $theme_options; 
global $post;
$draw = false;
?>
<?php if ( is_front_page() && is_home() ) : ?>
	<h2 class="site-title aione-align-left font-size-28 m-0 font-weight-200"><?php bloginfo( 'name' ); ?></h2>
<?php else : ?>
	<p class="site-title aione-align-left font-size-28 m-0 font-weight-200"><?php bloginfo( 'name' ); ?></p>
<?php endif; 
$description = get_bloginfo( 'description', 'display' );
$pyre_header_show_tagline = get_aione_page_option($post->ID,'pyre_header_show_tagline');
$draw = $pyre_header_show_tagline == 'yes' ? true 
		: ( $pyre_header_show_tagline == 'no' ? false 
				: (($theme_options['header_show_tagline'] == 1)
					? true
					: false
				)
		);
if($draw == true):
	if ( $description || is_customize_preview() ) : 
	?>
	<span class="site-description">
		<?php echo $description; /* WPCS: xss ok. */ ?>
	</span>
	<?php
	endif; 
endif;