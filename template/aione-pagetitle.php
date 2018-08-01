<?php global $post; ?>
<?php if( is_enabled('page_title_bar') ): ?>

	<?php
	$page_title = get_the_title();
	$page_description = get_aione_page_option($post->ID,'pyre_page_title_bar_description_text');

	if( is_post_type_archive() || is_archive()){
		$page_title = get_the_archive_title();
		$page_description = get_the_archive_description();
	}

	if(is_404()){
		$page_title = "Error 404";
		$page_description = "Page Not Found";
	}

	if ( is_home() ){
		if(is_front_page()){
			$page_title = 'Home';
		} else {
			$page_title = single_post_title('',false);
		}	
	}

	if(is_search()){
		$page_title = "Search";
	}
	?>
	<div id="aione_pagetitle" class="aione-pagetitle <?php echo is_fullwidth('page_title');?>">
		<div class="wrapper">
			<?php 
			if( is_enabled('page_title_bar_enable_title')  && !empty($page_title)): ?>
				<h1 class="title">
					<?php echo $page_title; ?>
				</h1>
			<?php endif;
			if( is_enabled('page_title_bar_enable_description') && !empty($page_description)): ?>
				<h2 class="description">
					<?php echo $page_description;?>				
				</h2>
			<?php endif; ?>
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-pagetitle -->
<?php endif;