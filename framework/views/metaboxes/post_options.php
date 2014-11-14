<ul class="pyre_metabox_tabs">
	<li class="active"><a href="post">Post</a></li>
	<li><a href="sliders">Sliders</a></li>
	<li><a href="header">Header</a></li>
	<li><a href="footer">Footer</a></li>
	<li><a href="sidebars">Sidebars</a></li>
	<li><a href="background">Background</a></li>
	<li><a href="pagetitlebar">Page Title Bar</a></li>
</ul>
<div class='pyre_metabox'>
	<div class="pyre_metabox_tab active" id="pyre_tab_post">
		<?php
		$this->textarea('video',
						'Video Embed Code',
						'Insert Youtube or Vimeo embed code.'
					);
		?>
		<?php
		$this->text(	'fimg_width',
						'Featured Image Width',
						'In pixels or percentage, ex: 100% or 100px. Or Use "auto" for automatic resizing if you added either width or height.'
					);
		?>
		<?php
		$this->text(	'fimg_height',
						'Featured Image Height',
						'In pixels or percentage, ex: 100% or 100px. Or Use "auto" for automatic resizing if you added either width or height.'
					);
		?>
		<?php
		$this->select(	'image_rollover_icons',
						'Image Rollover Icons',
						array('linkzoom' => 'Link + Zoom', 'link' => 'Link', 'zoom' => 'Zoom', 'no' => 'No Icons'),
						'Choose which icons display on this post.'
					);
		?>
		<?php
		$this->text(	'link_icon_url',
						'Link Icon URL',
						'Leave blank for post URL.'
					);
		?>
		<?php
		$this->select(	'related_posts',
						'Show Related Posts',
						array('default' => 'Default', 'yes' => 'Show', 'no' => 'Hide'),
						'Choose to show or hide related posts on this post.'
					);
		?>
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_sliders">
		<?php
		$this->select(	'slider_position',
						'Slider Position',
						array('default' => 'Default', 'below' => 'Below', 'above' => 'Above'),
						'Select if the slider shows below or above the header. This only works for the slider assigned in page options, not with shortcodes.'
					);
		?>
		<?php
		$this->select(	'slider_type',
						'Slider Type',
						array('no' => 'No Slider', 'layer' => 'LayerSlider', 'flex' => 'AIONE Slider', 'rev' => 'Revolution Slider', 'elastic' => 'Elastic Slider'),
						'Select the type of slider that displays.'
					);
		?>
		<?php
		global $wpdb;
		$slides_array[0] = 'Select a slider';
		// Table name
		$table_name = $wpdb->prefix . "layerslider";

		// Get sliders
		$sliders = $wpdb->get_results( "SELECT * FROM $table_name
											WHERE flag_hidden = '0' AND flag_deleted = '0'
											ORDER BY date_c ASC" );

		if(!empty($sliders)):
		foreach($sliders as $key => $item):
			$slides[$item->id] = '';
		endforeach;
		endif;

		if(isset($slides) && $slides){
		foreach($slides as $key => $val){
			$slides_array[$key] = 'LayerSlider #'.($key);
		}
		}
		$this->select(	'slider',
						'Select LayerSlider',
						$slides_array,
						'Select the unique name of the slider.
'
					);
		?>
		<?php
		$slides_array = array();
		$slides = array();
		$slides_array[0] = 'Select a slider';
		$slides = get_terms('slide-page');
		if($slides && !isset($slides->errors)){
		$slides = is_array($slides) ? $slides : unserialize($slides);
		foreach($slides as $key => $val){
			$slides_array[$val->slug] = $val->name;
		}
		}
		$this->select(	'wooslider',
						'Select AIONE Slider',
						$slides_array,
						'Select the unique name of the slider.
'
					);
		?>
		<?php
		global $wpdb;
		$revsliders[0] = 'Select a slider';
		if(function_exists('rev_slider_shortcode')) {
			$get_sliders = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'revslider_sliders');
			if($get_sliders) {
				foreach($get_sliders as $slider) {
					$revsliders[$slider->alias] = $slider->title;
				}
			}
		}
		$this->select(	'revslider',
						'Select Revolution Slider',
						$revsliders,
						'Select the unique name of the slider.
'
					);
		?>
		<?php
		$slides_array = array();
		$slides_array[0] = 'Select a slider';
		$slides = get_terms('themeaione_es_groups');
		if($slides && !isset($slides->errors)){
		$slides = is_array($slides) ? $slides : unserialize($slides);
		foreach($slides as $key => $val){
			$slides_array[$val->slug] = $val->name;
		}
		}
		$this->select(	'elasticslider',
						'Select Elastic Slider',
						$slides_array,
						'Select the unique name of the slider.
'
					);
		?>
		<?php
		$this->upload(	'fallback', 
						'Slider Fallback Image',
						'This image will override the slider on mobile devices.'
					); 
		?>
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_header">
		<?php
		$this->select(	'display_header',
						'Display Header',
						array('yes' => 'Yes', 'no' => 'No'),
						'Choose to show or hide the header.'
					);
		?>
		<?php 
		$this->upload(	'header_bg', 
						'Background Image',
						'Select an image to use for the header background.'
					); 
		?>
		<?php
		$this->text(	'header_bg_color',
						'Background Color (Hex Code)',
						'Controls the background color of the header.'
					);
		?>
		<?php
		$this->select(	'header_bg_full',
						'100% Background Image',
						array('no' => 'No', 'yes' => 'Yes'),
						'Choose to have the background image display at 100%.'
					);
		?>
		<?php
		$this->select(	'header_bg_repeat',
						'Background Repeat',
						array('repeat' => 'Tile', 'repeat-x' => 'Tile Horizontally', 'repeat-y' => 'Tile Vertically', 'no-repeat' => 'No Repeat'),
						'Select how the background image repeats.'
					);
		?>		
		<?php
		$this->select(	'transparent_header',
						'Transparent Header',
						array('default' => 'Default', 'yes' => 'Yes', 'no' => 'No'),
						'Choose a transparent header that displays your slider behind it.'
					);
		?>	
		<?php
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
		$menu_select['default'] = 'Default Menu';
		foreach ( $menus as $menu ) {
			$menu_select[$menu->term_id] = $menu->name;
		}
		$this->select(	'displayed_menu',
						'Main Navigation Menu',
						$menu_select,
						'Select which menu displays on this page.'
					);
		?>
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_footer">
		<?php
		$this->select(	'display_footer',
						'Display Footer Widget Area',
						array('default' => 'Default', 'yes' => 'Yes', 'no' => 'No'),
						'Choose to show or hide the footer.'
					);
		?>
		<?php
		$this->select(	'display_copyright',
						'Display Copyright Area',
						array('default' => 'Default', 'yes' => 'Yes', 'no' => 'No'),
						'Choose to show or hide the copyright area.'
					);
		?>
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_sidebars">
		<?php
		sidebar_generator::edit_form();
		?>
		<?php
		$this->select(	'sidebar_position',
						'Sidebar 1 Position',
						array('default' => 'Default', 'right' => 'Right', 'left' => 'Left'),
						'Select the sidebar 1 position. If sidebar 2 is selected, it will display on the opposite side.'
					);
		?>
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_background">
		<?php
		$this->select(	'page_bg_layout',
						'Layout',
						array('default' => 'Default', 'wide' => 'Wide', 'boxed' => 'Boxed'),
						'Select boxed or wide layout.'
					);
		?>
		<h3>Following options only work in boxed mode:</h3>
		<?php 
		$this->upload(	'page_bg', 
						'Background Image for Outer Area',
						'Select an image to use for the outer background.'
					); 
		?>
		<?php
		$this->text(	'page_bg_color',
						'Background Color (Hex Code)',
						'Controls the background color of the header.'
					);
		?>
		<?php
		$this->select(	'page_bg_full',
						'100% Background Image',
						array('no' => 'No', 'yes' => 'Yes'),
						'Choose to have the background image display at 100%.'
					);
		?>
		<?php
		$this->select(	'page_bg_repeat',
						'Background Repeat',
						array('repeat' => 'Tile', 'repeat-x' => 'Tile Horizontally', 'repeat-y' => 'Tile Vertically', 'no-repeat' => 'No Repeat'),
						'Select how the background image repeats.'
					);
		?>
		<h3>Following options work in boxed and wide mode:</h3>
		<?php 
		$this->upload(	'wide_page_bg',
						'Background Image for Main Content Area',
						'Select an image to use for the main content area.'
					); 
		?>
		<?php
		$this->text(	'wide_page_bg_color',
						'Background Color (Hex Code)',
						'Controls the background color of the header.'
					);
		?>
		<?php
		$this->select(	'wide_page_bg_full',
						'100% Background Image',
						array('no' => 'No', 'yes' => 'Yes'),
						'Choose to have the background image display at 100%.'
					);
		?>
		<?php
		$this->select(	'wide_page_bg_repeat',
						'Background Repeat',
						array('repeat' => 'Tile', 'repeat-x' => 'Tile Horizontally', 'repeat-y' => 'Tile Vertically', 'no-repeat' => 'No Repeat'),
						'Select how the background image repeats.'
					);
		?>
	</div>
	<div class="pyre_metabox_tab" id="pyre_tab_pagetitlebar">
		<?php
		$this->select(	'page_title',
						'Page Title Bar',
						array('default' => 'Default', 'yes' => 'Show', 'no' => 'Hide'),
						'Choose to show or hide the page title bar.'
					);
		?>
		<?php
		$this->select(	'page_title_text',
						'Page Title Bar Text',
						array('yes' => 'Show', 'no' => 'Hide'),
						'Choose to show or hide the page title bar text.'
					);
		?>
		<?php
		$this->text(	'page_title_custom_text',
						'Page Title Bar Custom Text',
						'Insert custom text for the page title bar.'
					);
		?>
		<?php
		$this->text(	'page_title_custom_subheader',
						'Page Title Bar Custom Subheader Text',
						'Insert custom subhead text for the page title bar.'
					);
		?>
		<?php
		$this->text(	'page_title_height',
						'Page Title Bar Height',
						'Set the height of the page title bar. In pixels ex: 100px.'
					);
		?>

		<?php 
		$this->upload(	'page_title_bar_bg', 
						'Page Title Bar Background',
						'Select an image to use for the page title bar background.'
					); 
		?>
		<?php 
		$this->upload(	'page_title_bar_bg_retina', 
						'Page Title Bar Background Retina',
						'Select an image to use for retina devices.'
					); 
		?>
		<?php
		$this->text(	'page_title_bar_bg_color',
						'Page Title Bar Background Color (Hex Code)',
						'Controls the background color of the page title bar.'
					);
		?>
		<?php
		$this->select(	'page_title_bar_bg_full',
						'100% Background Image',
						array('default' => 'Default', 'no' => 'No', 'yes' => 'Yes'),
						'Choose to have the background image display at 100%.'
					);
		?>
		<?php
		$this->select(	'page_title_bg_parallax',
						'Parallax Background Image',
						array('default' => 'Default', 'no' => 'No', 'yes' => 'Yes'),
						'Choose a parallax scrolling effect for the background image.'
					);
		?>
	</div>
</div>
<div class="clear"></div>