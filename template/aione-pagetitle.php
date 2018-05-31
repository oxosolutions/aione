<?php
//TBD: Check ENABLED Check Global and pagewise Settings

$page_title = get_the_title();
$page_description = '';


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
	$page_description = '';
}

if(is_search()){
	$page_title = "Search";
	$page_description = "";
}

global $theme_options;
global $post;
$draw = false;
$pyre_page_title_bar = get_aione_page_option($post->ID,'pyre_page_title_bar');
$draw = $pyre_page_title_bar == 'yes' ? true 
		: ( $pyre_page_title_bar == 'no' ? false 
				: (($theme_options['page_title_bar'] == 1)
					? true
					: false
				)
		);
if($draw == true): ?>
	<div id="aione_pagetitle" class="aione-pagetitle bg-red pv-30">
		<div class="wrapper">
			<?php 
			$pyre_page_title_bar_enable_title = get_aione_page_option($post->ID,'pyre_page_title_bar_enable_title');
			$draw = $pyre_page_title_bar_enable_title == 'yes' ? true 
					: ( $pyre_page_title_bar_enable_title == 'no' ? false 
							: (($theme_options['page_title_bar_enable_title'] == 1)
								? true
								: false
							)
					);
			if($draw == true): 
			?>
				<h1 class="title">
					<?php echo $page_title; ?>
				</h1>
			<?php endif; ?>
			<?php 
			$pyre_page_title_bar_enable_description = get_aione_page_option($post->ID,'pyre_page_title_bar_enable_description');
			$draw = $pyre_page_title_bar_enable_description == 'yes' ? true 
					: ( $pyre_page_title_bar_enable_description == 'no' ? false 
							: (($theme_options['page_title_bar_enable_description'] == 1)
								? true
								: false
							)
					);
			if($draw == true):
				if(!empty($page_description)):
			?>

				<h2 class="description">
					<?php echo $page_description;?>				
				</h2>
			<?php endif;
			endif; ?>
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-pagetitle -->
<?php
endif;