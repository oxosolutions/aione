<div id="aione_header_logo" class="aione-header-logo">
	<?php
	global $theme_options;

	$logo = $theme_options['header_logo'];
	$logo_alt = $logo['alt'];

	if( empty( $logo_alt ) ) {
		$logo_alt = get_bloginfo( 'name' );
	}
	
	?>
	<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo get_bloginfo( 'name' ); ?> Logo">
		<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo_alt; ?>" width="<?php echo $logo['width']; ?>" height="<?php echo $logo['height']; ?>">
	</a>
</div>