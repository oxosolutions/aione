<div id="aione_header_logo" class="aione-header-item">
	<!-- <img src="" class="aione-topbar-logo-item"> -->
	<?php
		the_custom_logo();
	?> 
</div>
<div id="aione_header_title " class="display-inline-block p-5">
	<?php if ( is_front_page() && is_home() ) : ?>
		<h2 class="site-title aione-align-left font-size-28 m-0 font-weight-200"><?php bloginfo( 'name' ); ?></h2>
	<?php else : ?>
		<p class="site-title aione-align-left font-size-28 m-0 font-weight-200"><?php bloginfo( 'name' ); ?></p>
	<?php endif; 
	$description = get_bloginfo( 'description', 'display' );
	if ( $description || is_customize_preview() ) : 
	?>
	<span class="site-description aione-align-left font-size-14">
		<?php echo $description; /* WPCS: xss ok. */ ?>
	</span>
	<?php
	endif; ?>

</div>