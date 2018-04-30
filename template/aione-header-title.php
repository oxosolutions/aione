<?php global $theme_options; ?>
<?php if ( is_front_page() && is_home() ) : ?>
	<h2 class="site-title aione-align-left font-size-28 m-0 font-weight-200"><?php bloginfo( 'name' ); ?></h2>
<?php else : ?>
	<p class="site-title aione-align-left font-size-28 m-0 font-weight-200"><?php bloginfo( 'name' ); ?></p>
<?php endif; 
$description = get_bloginfo( 'description', 'display' );
if($theme_options['header_show_tagline'] == 1){
	if ( $description || is_customize_preview() ) : 
	?>
	<span class="site-description">
		<?php echo $description; /* WPCS: xss ok. */ ?>
	</span>
	<?php
	endif; 
}
?>