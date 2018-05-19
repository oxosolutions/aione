<?php
//TBD: Check ENABLED Check Global and pagewise Settings

$page_title = get_the_title();
$page_description = '';


if( is_post_type_archive() || is_archive()){
	$page_title = get_the_archive_title();
	$page_description = get_the_archive_description();
	if(is_author()){
		$page_title = get_the_author();
	}
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
	$page_description = '';
}

if(is_search()){
	$page_title = "Search";
	$page_description = "";
}

/*if(is_archive()){
	if (is_category()) {
		$page_title = single_cat_title('Category: ', false);
		$page_description = category_description();
	}
	if (is_author()) {
		$page_title = get_the_author();
		$page_description = "";
	}
	if (is_tag()) {
		$page_title = single_tag_title('Tag: ', false);
		$page_description = tag_description();
	}
	if (is_year()) {
		$page_title =   get_the_archive_title();
		$page_description = get_the_archive_description();
	}
}*/


global $theme_options;
if($theme_options['page_title_bar'] == 1): ?>
	<div id="aione_pagetitle" class="aione-pagetitle bg-red pv-30">
		<div class="wrapper">
			<?php if($theme_options['page_title_bar_enable_title'] == 1): ?>
				<h1 class="title">
					<?php echo $page_title; ?>
				</h1>
			<?php endif; ?>
			<?php if($theme_options['page_title_bar_enable_description'] == 1): ?>
				<h2 class="description">
					<?php echo $page_description;?>				
				</h2>
			<?php endif; ?>
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-pagetitle -->
<?php
endif;