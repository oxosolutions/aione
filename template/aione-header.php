<?php 
global $theme_options;
global $post;
$draw = false;
?>
<?php 
$pyre_header_enable = get_aione_page_option($post->ID,'pyre_header_enable');
$draw = $pyre_header_enable == 'yes' ? true 
		: ( $pyre_header_enable == 'no' ? false 
				: (($theme_options['header_enable'] == 1)
					? true
					: false
				)
		);
if($draw == true):
	
	?>
	<header id="aione_header" class="aione-header">
		<div class="wrapper">
			<?php 
			$pyre_header_show_logo = get_aione_page_option($post->ID,'pyre_header_show_logo');
			$draw = $pyre_header_show_logo == 'yes' ? true 
					: ( $pyre_header_show_logo == 'no' ? false 
							: (($theme_options['header_show_logo'] == 1)
								? true
								: false
							)
					);
			if($draw == true):
			?>
				<div id="aione_header_logo" class="aione-header-logo">
					<?php get_template_part('template/aione-header-logo');  ?>
				</div>
			<?php
			endif;
			$pyre_header_show_site_title = get_aione_page_option($post->ID,'pyre_header_show_site_title');
			$draw = $pyre_header_show_site_title == 'yes' ? true 
					: ( $pyre_header_show_site_title == 'no' ? false 
							: (($theme_options['header_show_site_title'] == 1)
								? true
								: false
							)
					);
			if($draw == true):
			?>	
				<div id="aione_header_title" class="aione-header-title">
					<?php get_template_part('template/aione-header-title');  ?>
				</div>
			<?php
			endif;
			$pyre_header_show_banner = get_aione_page_option($post->ID,'pyre_header_show_banner');
			$draw = $pyre_header_show_banner == 'yes' ? true 
					: ( $pyre_header_show_banner == 'no' ? false 
							: (($theme_options['header_show_banner'] == 1)
								? true
								: false
							)
					);
			if($draw == true):
			?>
				<div id="aione_header_banner" class="aione-header-banner">
					<?php get_template_part('template/aione-header-banner');  ?>
				</div>
			<?php
			endif;
			?>	
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</header><!-- .aione-header -->
	<?php
		$pyre_header_show_navigation = get_aione_page_option($post->ID,'pyre_header_show_navigation');
		$draw = $pyre_header_show_navigation == 'yes' ? true 
				: ( $pyre_header_show_navigation == 'no' ? false 
						: (($theme_options['header_show_navigation'] == 1)
							? true
							: false
						)
				);
		if($draw == true):
			 get_template_part('template/aione-header-menu');  
		endif;
endif;
?>