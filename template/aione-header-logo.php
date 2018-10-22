<div id="aione_header_logo" class="aione-header-logo">
	<?php
	global $theme_options;
	$logo = $theme_options['header_logo'];
	/*
	echo "<pre>";
	print_r($logo);
	echo "</pre>";
	*/
	?>
	<a href="<?php echo get_bloginfo( 'url'); ?>">
	<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" width="<?php echo $logo['width']; ?>" height="<?php echo $logo['height']; ?>">
	</a>
</div>