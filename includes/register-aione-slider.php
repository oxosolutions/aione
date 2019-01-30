<?php
/**
* Register Aione Slider custom Post Type
* 
*/
add_action( 'init', 'register_aione_slider' );
if ( ! function_exists( 'register_aione_slider' ) ){
	function register_aione_slider() {
		register_post_type( 'aione-slider',
			array(
			   	'labels'             => array(
					'name'               => 'Slider',
					'singular_name'      => 'Slider',
					'add_new'            => 'Add New',
					'add_new_item'       => 'Add New Slider',
					'edit'               => 'Edit',
					'edit_item'          => 'Edit Slider',
					'new_item'           => 'New Slider',
					'view'               => 'View',
					'view_item'          => 'View Slider',
					'search_items'       => 'Search Slider',
					'not_found'          => 'No Slider found',
					'not_found_in_trash' => 'No Slider found in Trash',
					'parent'             => ''
				),
				'public'              => true,
				'menu_position'       => 15,
				'menu_icon'           => 'dashicons-laptop',
				'capability_type'     => 'slider',
				'capabilities'        => array(
					'publish_posts'       => 'publish_slider',
					'edit_posts'          => 'edit_slider',
					'edit_others_posts'   => 'edit_others_slider',
					'delete_posts'        => 'delete_slider',
					'delete_others_posts' => 'delete_others_slider',
					'read_private_posts'  => 'read_private_slider',
					'edit_post'           => 'edit_slider',
					'delete_post'         => 'delete_slider',
					'read_post'           => 'read_slider',
				),
			    'supports'             => array( 'title'), 
				'taxonomies'           => array( '' ),
				'has_archive'          => false,
				'register_meta_box_cb' => 'aione_slider_metaboxes',
			)
		);
	}
}

/**
* Add Meta Boxes to Aione Slider
* 
*/
function aione_slider_metaboxes() {
	add_meta_box(
		'aione_slider_type',
		'Slider Type',
		'aione_slider_type_callback',
		'aione-slider',
		'advanced',
		'high'
	);
	add_meta_box(
		'aione_slider_settings',
		'Settings',
		'aione_slider_settings_callback',
		'aione-slider',
		'normal',
		'default'
	);
	add_meta_box(
		'aione_slider_docs',
		'Slider Shortcode',
		'aione_slider_docs_callback',
		'aione-slider',
		'side',
		'default'
	);
}
function aione_slider_type_callback($post){
	wp_nonce_field( 'aione_slider_type_form_metabox_nonce', 'aione_slider_type_form_nonce' );
	echo esc_html( aione_slider_type_form( $post ) );

}
function aione_slider_type_form($post){
	$slider_type_meta = get_post_meta( $post->ID, 'aione-slider-type', true );
	$aione_slider_type = array();
	?>	
	<form name="" class="" id="" method="post" action="" enctype="multipart/form-data">
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="aione_slider_type">Slider Type</label></th>
					<td><select name="aione_slider_type[type]" id="aione_slider_type">
						<option value="image" <?php if($slider_type_meta['type'] == 'image') {echo "selected = selected";} ?>>Image Slider</option>
						<option value="post" <?php if($slider_type_meta['type'] == 'post') {echo "selected = selected";} ?>>Post Type</option>
						<option value="testimonial" <?php if($slider_type_meta['type'] == 'testimonial') {echo "selected = selected";} ?>>Testimonial</option>
						<option value="text" <?php if($slider_type_meta['type'] == 'text') {echo "selected = selected";} ?>>Text Slider</option>
					</select></td>
				</tr>
			</tbody>
		</table>
	</form>
	<?php
}
function aione_slider_settings_callback($post){
	wp_nonce_field( 'aione_slider_settings_form_metabox_nonce', 'aione_slider_settings_form_nonce' ); 
	echo esc_html( aione_slider_settings_form( $post ) );
}
add_action('save_post', 'aione_slider_settings_save_meta');
function aione_slider_settings_save_meta($post_id ){ 
	if( !isset( $_POST['aione_slider_settings_form_nonce'] ) || !wp_verify_nonce( $_POST['aione_slider_settings_form_nonce'],'aione_slider_settings_form_metabox_nonce') ) 
		return;
	if ( !current_user_can( 'edit_post', $post_id ))
		return;
	update_post_meta( $post_id, 'aione-slider-type',  $_POST['aione_slider_type'] );
	update_post_meta( $post_id, 'aione-slider-settings',  $_POST['aione_slider_settings'] );

}

function aione_slider_settings_form($post){ 
	$settings = get_post_meta( $post->ID, 'aione-slider-settings', true );
	$aione_slider_settings = array();
	//echo "<pre>";print_r($settings);echo "</pre>";
	?>	
	<!-- <form name="" class="" id="" method="post" action="" enctype="multipart/form-data"> -->
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="aione_slider_items">Items</label></th>
					<td><input name="aione_slider_settings[items]" type="number" id="aione_slider_items" value="<?php echo isset( $settings['items'] ) ? esc_html( $settings['items'] ) : '3' ?>" class=""><p class="description">The number of items you want to see on the screen.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_theme">Theme</label></th>
					<td><select name="aione_slider_settings[theme]" id="aione_slider_theme">
						<option value="aione" <?php if( $settings['theme'] == 'aione' ) { echo "selected = selected"; } ?> >Aione</option>
						<option value="darlic" <?php if( $settings['theme'] == 'darlic' ) { echo "selected = selected"; } ?>>Darlic</option>
						<option value="oxo" <?php if( $settings['theme'] == 'oxo' ) { echo "selected = selected"; } ?> >OXO</option>
					</select></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_margin">Margin</label></th>
					<td><input name="aione_slider_settings[margin]" type="text" id="aione_slider_margin" value="<?php echo isset( $settings['margin'] ) ? esc_html( $settings['margin'] ) : '0' ?>" class=""><p class="description">margin-right(px) on item.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_loop">Loop</label></th>
					<td><select name="aione_slider_settings[loop]" id="aione_slider_loop">				
						<option value="false" <?php if( $settings['loop'] == 'false' ) { echo "selected = selected"; } ?> >False</option>
						<option value="true" <?php if( $settings['loop'] == 'true' ) { echo "selected = selected"; } ?> >True</option>
					</select><p class="description">Infinity loop. Duplicate last and first items to get loop illusion.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_center">Center</label></th>
					<td><select name="aione_slider_settings[center]" id="aione_slider_center">			
						<option value="false" <?php if( $settings['center'] == 'false' ) { echo "selected = selected"; } ?> >False</option>
						<option value="true" <?php if( $settings['center'] == 'true' ) { echo "selected = selected"; } ?> >True</option>
					</select><p class="description">Center item. Works well with even an odd number of items.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_caption">Image Caption</label></th>
					<td><input name="aione_slider_settings[caption]" type="radio" id="aione_slider_caption" value="1" class="" <?php if( $settings['caption'] == '1' ) { echo "checked = checked"; } ?> >ON<br/><input name="aione_slider_settings[caption]" type="radio" id="aione_slider_caption" value="0" class="" <?php if( $settings['caption'] == '0' || $settings['caption'] == '') { echo "checked = checked"; } ?> >OFF</td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_caption_title">Image Caption Title</label></th>
					<td><input name="aione_slider_settings[caption_title]" type="radio" id="aione_slider_caption_title" value="1" class="" <?php if( $settings['caption_title'] == '1' ) { echo "checked = checked"; } ?> >ON<br/><input name="aione_slider_settings[caption_title]" type="radio" id="aione_slider_caption_title" value="0" class="" <?php if( $settings['caption_title'] == '0' || $settings['caption_title'] == '' ) {echo "checked = checked"; } ?> >OFF</td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_caption_description">Image Caption Description</label></th>
					<td><input name="aione_slider_settings[caption_description]" type="radio" id="aione_slider_caption_description" value="1" class="" <?php if( $settings['caption_description'] == '1' ) { echo "checked = checked"; } ?> >ON<br/><input name="aione_slider_settings[caption_description]" type="radio" id="aione_slider_caption_description" value="0" class="" <?php if( $settings['caption_description'] == '0' || $settings['caption_description'] == '') { echo "checked = checked";} ?> >OFF</td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_caption_link">Image Caption Link</label></th>
					<td><input name="aione_slider_settings[caption_link]" type="radio" id="aione_slider_caption_link" value="1" class="" <?php if( $settings['caption_link'] == '1' ) { echo "checked = checked"; } ?> >ON<br/><input name="aione_slider_settings[caption_link]" type="radio" id="aione_slider_caption_link" value="0" class="" <?php if( $settings['caption_link'] == '0' || $settings['caption_link'] == '' ) {echo "checked = checked"; } ?> >OFF</td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_mouseDrag">mouseDrag</label></th>
					<td><select name="aione_slider_settings[mouseDrag]" id="aione_slider_mouseDrag">	
						<option value="true" <?php if( $settings['mouseDrag'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
						<option value="false" <?php if( $settings['mouseDrag'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
					</select><p class="description">Mouse drag enabled.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_touchDrag">touchDrag</label></th>
					<td><select name="aione_slider_settings[touchDrag]" id="aione_slider_touchDrag">					
						<option value="true" <?php if( $settings['touchDrag'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
						<option value="false" <?php if( $settings['touchDrag'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
					</select><p class="description">Touch drag enabled.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_pullDrag">pullDrag</label></th>
					<td><select name="aione_slider_settings[pullDrag]" id="aione_slider_pullDrag">					
						<option value="true" <?php if( $settings['pullDrag'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
						<option value="false" <?php if( $settings['pullDrag'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
					</select><p class="description">Stage pull to edge.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_freeDrag">freeDrag</label></th>
					<td><select name="aione_slider_settings[freeDrag]" id="aione_slider_freeDrag">					
						<option value="false" <?php if( $settings['freeDrag'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
						<option value="true" <?php if( $settings['freeDrag'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
					</select><p class="description">Item pull to edge.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_stagePadding">stagePadding</label></th>
					<td><input name="aione_slider_settings[stagePadding]" type="number" id="aione_slider_stagePadding" value="<?php echo isset($settings['stagePadding'])? esc_html( $settings['stagePadding'] ) : '0' ?>" class=""><p class="description">Padding left and right on stage (can see neighbours).</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_merge">Merge</label></th>
					<td><select name="aione_slider_settings[merge]" id="aione_slider_merge">						
						<option value="false" <?php if( $settings['merge'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
						<option value="true" <?php if( $settings['merge'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
					</select><p class="description">Merge items. Looking for data-merge="{number}" inside item..</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_mergeFit">mergeFit</label></th>
					<td><select name="aione_slider_settings[mergeFit]" id="aione_slider_mergeFit">					
						<option value="true" <?php if( $settings['mergeFit'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
						<option value="false" <?php if( $settings['mergeFit'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
					</select><p class="description">Fit merged items if screen is smaller than items value.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_autoWidth">autoWidth</label></th>
					<td><select name="aione_slider_settings[autoWidth]" id="aione_slider_autoWidth">					
						<option value="false" <?php if( $settings['autoWidth'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
						<option value="true" <?php if( $settings['autoWidth'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
					</select><p class="description">Set non grid content. Try using width style on divs.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_autoHight">autoHight</label></th>
					<td><select name="aione_slider_settings[autoHight]" id="aione_slider_autoHight">					
						<option value="false" <?php if( $settings['autoHight'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
						<option value="true" <?php if( $settings['autoHight'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
					</select></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_startPosition">startPosition</label></th>
					<td><input name="aione_slider_settings[startPosition]" type="text" id="aione_slider_startPosition" value="<?php echo isset( $settings['startPosition'] ) ? esc_html( $settings['startPosition'] ) : '0' ?>" class=""><p class="description">Start position or URL Hash string like "#id".</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_URLhashListener">URLhashListener</label></th>
					<td><select name="aione_slider_settings[URLhashListener]" id="aione_slider_URLhashListener">		
						<option value="false" <?php if( $settings['URLhashListener'] == 'false' ) { echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if( $settings['URLhashListener'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
					</select><p class="description">Listen to url hash changes. data-hash on items is required.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_nav">Nav</label></th>
					<td><select name="aione_slider_settings[nav]" id="aione_slider_nav">					
						<option value="false" <?php if( $settings['nav'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
						<option value="true" <?php if( $settings['nav'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
					</select><p class="description">Show next/prev buttons.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_rewind">Rewind</label></th>
					<td><select name="aione_slider_settings[rewind]" id="aione_slider_rewind">						
						<option value="true" <?php if( $settings['rewind'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
						<option value="false" <?php if( $settings['rewind'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
					</select><p class="description">Go backwards when the boundary has reached.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_navText">navText</label></th>
					<td><input name="aione_slider_settings[navText]" type="text" id="aione_slider_navText" value="<?php echo isset($settings['navText']) ? esc_html( $settings['navText'] ) : '' ?>" class=""><p class="description">HTML allowed.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_navElement">navElement</label></th>
					<td><input name="aione_slider_settings[navElement]" type="text" id="aione_slider_navElement" value="<?php echo isset( $settings['navElement'] ) ? esc_html( $settings['navElement'] ) : 'div' ?>" class=""><p class="description">DOM element type for a single directional navigation link.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_slideBy">slideBy</label></th>
					<td><input name="aione_slider_settings[slideBy]" type="text" id="aione_slider_slideBy" value="<?php echo isset( $settings['slideBy'] ) ? esc_html( $settings['slideBy'] ) : '1' ?>" class=""><p class="description">Navigation slide by x. "page" string can be set to slide by page.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_slideTransition">slideTransition</label></th>
					<td><input name="aione_slider_settings[slideTransition]" type="text" id="aione_slider_slideTransition" value="<?php echo isset( $settings['slideTransition'] ) ? esc_html( $settings['slideTransition'] ) : '' ?>" class=""><p class="description">You can define the transition for the stage you want to use eg. linear.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_dots">Dots</label></th>
					<td><select name="aione_slider_settings[dots]" id="aione_slider_dots">						
						<option value="true" <?php if( $settings['dots'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
						<option value="false" <?php if( $settings['dots'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
					</select><p class="description">Show dots navigation.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_dotsEach">dotsEach</label></th>
					<td><input name="aione_slider_settings[dotsEach]" type="text" id="aione_slider_dotsEach" value="<?php echo isset( $settings['dotsEach'] ) ? esc_html( $settings['dotsEach'] ) : 'false' ?>" class=""><p class="description">Show dots each x item.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_dotsData">dotsData</label></th>
					<td><select name="aione_slider_settings[dotsData]" id="aione_slider_dotsData">					
						<option value="false" <?php if( $settings['dotsData'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
						<option value="true" <?php if( $settings['dotsData'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
					</select><p class="description">Used by data-dot content.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_lazyLoad">lazyLoad</label></th>
					<td><select name="aione_slider_settings[lazyLoad]" id="aione_slider_lazyLoad">					
						<option value="false" <?php if( $settings['lazyLoad'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
						<option value="true" <?php if( $settings['lazyLoad'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
					</select><p class="description">Lazy load images. data-src and data-src-retina for highres. Also load images into background inline style if element is not <img></p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_lazyLoadEager">lazyLoadEager</label></th>
					<td><input name="aione_slider_settings[lazyLoadEager]" type="number" id="aione_slider_lazyLoadEager" value="<?php echo isset( $settings['lazyLoadEager'] ) ? esc_html( $settings['lazyLoadEager'] ) : '0' ?>" class=""><p class="description">Eagerly pre-loads images to the right (and left when loop is enabled) based on how many items you want to preload.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_autoplay">autoplay</label></th>
					<td><select name="aione_slider_settings[autoplay]" id="aione_slider_autoplay">					
						<option value="false" <?php if( $settings['autoplay'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
						<option value="true" <?php if( $settings['autoplay'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
					</select><p class="description">Autoplay.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_autoplayTimeout">autoplayTimeout</label></th>
					<td><input name="aione_slider_settings[autoplayTimeout]" type="number" id="aione_slider_autoplayTimeout" value="<?php echo isset( $settings['autoplayTimeout'] ) ? esc_html( $settings['autoplayTimeout'] ) : '5000' ?>" class=""><p class="description">Autoplay interval timeout.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_autoplayHoverPause">autoplayHoverPause</label></th>
					<td><select name="aione_slider_settings[autoplayHoverPause]" id="aione_slider_autoplayHoverPause">
						<option value="false" <?php if( $settings['autoplayHoverPause'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
						<option value="true" <?php if( $settings['autoplayHoverPause'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
					</select><p class="description">Pause on mouse hover.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_smartSpeed">smartSpeed</label></th>
					<td><input name="aione_slider_settings[smartSpeed]" type="number" id="aione_slider_smartSpeed" value="<?php echo isset( $settings['smartSpeed'] ) ? esc_html( $settings['smartSpeed'] ) : '250' ?>" class=""><p class="description">Speed Calculate. More info to come..</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_autoplaySpeed">autoplaySpeed</label></th>
					<td><input name="aione_slider_settings[autoplaySpeed]" type="text" id="aione_slider_autoplaySpeed" value="<?php echo isset( $settings['autoplaySpeed'] ) ? esc_html( $settings['autoplaySpeed'] ) : 'false' ?>" class=""><p class="description">autoplay speed.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_navSpeed">navSpeed</label></th>
					<td><input name="aione_slider_settings[navSpeed]" type="text" id="aione_slider_navSpeed" value="<?php echo isset( $settings['navSpeed'] ) ? esc_html( $settings['navSpeed'] ) : 'false' ?>" class=""><p class="description">Navigation speed.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_dotsSpeed">dotsSpeed</label></th>
					<td><input name="aione_slider_settings[dotsSpeed]" type="text" id="aione_slider_dotsSpeed" value="<?php echo isset( $settings['dotsSpeed'] ) ? esc_html( $settings['dotsSpeed'] ) : 'false' ?>" class=""><p class="description">Pagination speed.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_dragEndSpeed">dragEndSpeed</label></th>
					<td><input name="aione_slider_settings[dragEndSpeed]" type="text" id="aione_slider_dragEndSpeed" value="<?php echo isset( $settings['dragEndSpeed'] ) ? esc_html( $settings['dragEndSpeed'] ) : 'false' ?>" class=""><p class="description">Drag end speed.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_callbacks">Callbacks</label></th>
					<td><select name="aione_slider_settings[callbacks]" id="aione_slider_callbacks">			
						<option value="true" <?php if( $settings['callbacks'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
						<option value="false" <?php if( $settings['callbacks'] == 'false' ) { echo "selected = selected"; } ?>>False</option>						
					</select><p class="description">Enable callback events.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_video">Video</label></th>
					<td><select name="aione_slider_settings[video]" id="aione_slider_video">			
						<option value="false" <?php if( $settings['video'] == 'false' ) { echo "selected = selected"; } ?>>False</option>
						<option value="true" <?php if( $settings['video'] == 'true' ) { echo "selected = selected"; } ?>>True</option>												
					</select><p class="description">Enable fetching YouTube/Vimeo/Vzaar videos.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_videoHeight">videoHeight</label></th>
					<td><input name="aione_slider_settings[videoHeight]" type="text" id="aione_slider_videoHeight" value="<?php echo isset( $settings['videoHeight'] ) ? esc_html( $settings['videoHeight'] ) : 'false' ?>" class=""><p class="description">Set height for videos.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_videoWidth">videoWidth</label></th>
					<td><input name="aione_slider_settings[videoWidth]" type="text" id="aione_slider_videoWidth" value="<?php echo isset( $settings['videoWidth'] ) ? esc_html( $settings['videoWidth'] ) : 'false' ?>" class=""><p class="description">Set width for videos.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_animateOut">animateOut</label></th>
					<td><input name="aione_slider_settings[animateOut]" type="text" id="aione_slider_animateOut" value="<?php echo isset( $settings['animateOut'] ) ? esc_html( $settings['animateOut'] ) : 'false' ?>" class=""><p class="description">Class for CSS3 animation out.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_animateIn">animateIn</label></th>
					<td><input name="aione_slider_settings[animateIn]" type="text" id="aione_slider_animateIn" value="<?php echo isset( $settings['animateIn'] ) ? esc_html( $settings['animateIn'] ) : 'false' ?>" class=""><p class="description">Class for CSS3 animation in.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_fallbackEasing">fallbackEasing</label></th>
					<td><input name="aione_slider_settings[fallbackEasing]" type="text" id="aione_slider_fallbackEasing" value="<?php echo isset( $settings['fallbackEasing'] ) ? esc_html( $settings['fallbackEasing'] ) : 'swing' ?>" class=""><p class="description">Easing for CSS2 $.animate.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_itemElement">itemElement</label></th>
					<td><input name="aione_slider_settings[itemElement]" type="text" id="aione_slider_itemElement" value="<?php echo isset( $settings['itemElement'] ) ? esc_html( $settings['itemElement'] ) : 'div' ?>" class=""><p class="description">DOM element type for aione-slider-item.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_stageElement">stageElement</label></th>
					<td><input name="aione_slider_settings[stageElement]" type="text" id="aione_slider_stageElement" value="<?php echo isset( $settings['stageElement'] ) ? esc_html( $settings['stageElement'] ) : 'div' ?>" class=""><p class="description">DOM element type for aione-slider-stage.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_navContainer">navContainer</label></th>
					<td><input name="aione_slider_settings[navContainer]" type="text" id="aione_slider_navContainer" value="<?php echo isset( $settings['navContainer'] ) ? esc_html( $settings['navContainer'] ) : 'false' ?>" class=""><p class="description">Set your own container for nav.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_dotsContainer">dotsContainer</label></th>
					<td><input name="aione_slider_settings[dotsContainer]" type="text" id="aione_slider_dotsContainer" value="<?php echo isset( $settings['dotsContainer'] ) ? esc_html( $settings['dotsContainer'] ) : 'false' ?>" class=""><p class="description">Set your own container for nav.</p></td>
				</tr>
				<tr>
					<th scope="row"><label for="aione_slider_checkVisible">checkVisible</label></th>
					<td><select name="aione_slider_settings[checkVisible]" id="aione_slider_checkVisible">			
						<option value="true" <?php if( $settings['checkVisible'] == 'true' ) { echo "selected = selected"; } ?>>True</option>
						<option value="false" <?php if( $settings['checkVisible'] == 'false' ) { echo "selected = selected"; } ?>>False</option>												
					</select><p class="description">If you know the carousel will always be visible you can set `checkVisibility` to `false` to prevent the expensive browser layout forced reflow the $element.is(":visible") does.</p></td>
				</tr>


			</tbody>
		</table>
		<!-- <p class="submit"><input type="submit" id="submit_button" name="app_setting_save" class="button button-primary" value="Save Settings"></p> -->
	<!-- </form> -->
	<?php
}