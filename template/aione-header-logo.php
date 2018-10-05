<div id="aione_header_logo" class="aione-header-logo">
	<?php
	//the_custom_logo();
	//$logo = get_custom_logo();
	//print_r($logo);
	global $theme_options;
	$logo = $theme_options['header_logo'];
	//print_r($logo);
	echo '<img src="'.$logo['url'].'" alt="" width="" height="">';
?>
</div>