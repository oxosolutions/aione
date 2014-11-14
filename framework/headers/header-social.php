<?php global $theme_options, $social_icons; ?>
<div class="aione-social-links-header">
<?php 
$header_soical_icon_options = array (
	'position'			=> 'header',
	'icon_colors' 		=> $theme_options['header_social_links_icon_color'],
	'box_colors' 		=> $theme_options['header_social_links_box_color'],
	'icon_boxed' 		=> $theme_options['header_social_links_boxed'],
	'icon_boxed_radius' => $theme_options['header_social_links_boxed_radius'],
	'tooltip_placement'	=> $theme_options['header_social_links_tooltip_placement'],
	'linktarget'		=> $theme_options['social_icons_new']
);

echo $social_icons->render_social_icons( $header_soical_icon_options );
?>
</div>
