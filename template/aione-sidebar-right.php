<?php 

global $theme_options;
global $post;

$post_type = @get_post_type($post->ID);
$aione_components = @get_option('aione-components');
$aione_component = @$aione_components[$post_type];
$single_template_slug = @$aione_component['single_template'];
$archive_template_slug = @$aione_component['archive_template'];

$aione_templates = @get_option('aione-templates');

$aione_template_single_sidebar_right_enable = @$aione_templates[$single_template_slug]['template_sidebar_right_enable'];
$aione_template_archive_sidebar_right_enable = @$aione_templates[$archive_template_slug]['template_sidebar_right_enable'];

$aione_template_single_sidebar_right = @$aione_templates[$single_template_slug]['template_sidebar_right'];
$aione_template_archive_sidebar_right = @$aione_templates[$archive_template_slug]['template_sidebar_right'];



// Global Options
$is_enabled = $theme_options['sidebar_right_enable'];
$right_sidebar = 'aione-sidebar-right';


if ( is_archive() ) { 
	//Template Options Enable
	if( isset( $archive_template_slug ) && $archive_template_slug != 'archive' ) { 
		if( $aione_template_archive_sidebar_right_enable == 'no' ) {
			$is_enabled = 0;
		}
		if( $aione_template_archive_sidebar_right_enable == 'yes' ) {
			$is_enabled = 1;
		}
	}

	//Template Options Left Sidebar
	if( !empty( $aione_template_single_sidebar_right ) && $aione_template_single_sidebar_right != 'default' ){
		$right_sidebar = $aione_template_single_sidebar_right;
	}

} elseif( is_single() ) { 

	//Template Options Enable
	if( isset( $single_template_slug ) && $single_template_slug == 'single' ) {
		if( $aione_template_single_sidebar_right_enable == 'no' ) {
			$is_enabled = 0;
		}
		if( $aione_template_single_sidebar_right_enable == 'yes' ) {
			$is_enabled = 1;
		}
	}

	//Per page Options Enable
	$right_sidebar_enable_single = get_aione_page_option( get_page_id(), 'pyre_sidebar_right_enable' );
	if( $right_sidebar_enable_single == 'no' ) {
		$is_enabled = 0;
	}
	if( $right_sidebar_enable_single == 'yes' ) {
		$is_enabled = 1;
	}

	//Template Options Left Sidebar
	if( !empty( $aione_template_single_sidebar_right ) && $aione_template_single_sidebar_right != 'default' ){
		$right_sidebar = $aione_template_single_sidebar_right;
	}

	//Per page Options Left Sidebar
	$right_sidebar_custom = get_aione_page_option( get_page_id(), 'pyre_sidebar_right' );
	if( $right_sidebar_custom != 'default') {
		$right_sidebar = $right_sidebar_custom;
	}
} elseif( is_page() ) { 
	$is_enabled = is_enabled( get_page_id(), 'sidebar_right_enable');
	$right_sidebar_custom = get_aione_page_option( get_page_id(), 'pyre_sidebar_right' );
	if( $right_sidebar_custom != 'default') {
		$right_sidebar = $right_sidebar_custom;
	}
}

/*
echo "<div class='aione-border m-30'>RIGHT";
echo "</br>";
echo "<br>Global == ".$theme_options['sidebar_right_enable'];
echo "<br>Template == ".$aione_template_single_sidebar_right_enable;
echo "<br>Single == ".get_aione_page_option( $post->ID, 'pyre_sidebar_right_enable' );

echo "<br>Enabled == ".$is_enabled;
echo "<br>Left Sidebar == ".$right_sidebar;
echo "</br>";
echo "</div>";
*/
if( $is_enabled ): ?>
	<aside id="aione_sidebar_right" class="aione-sidebar aione-sidebar-right">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( $right_sidebar ) ){
				dynamic_sidebar( $right_sidebar );
			} else {
				echo empty_sidebar_message();
			}
			?>
		</div> <!-- .wrapper -->
	</aside> <!-- .aione-sidebar-right -->
<?php endif;