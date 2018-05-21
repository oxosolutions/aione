<?php
/**
 * Gutenbergtheme custom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gutenbergtheme
 */


class PerPageOptionsMetaboxes {
	public function __construct() {

		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_meta_boxes' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_script_loader' ) );
	}

	/**
	 * Load backend scripts
	 */
	function admin_script_loader() {

		global $pagenow;

		if ( is_admin() && ( in_array( $pagenow, array( 'post-new.php', 'post.php' ) ) ) ) {

			$theme_info = wp_get_theme();

			wp_enqueue_script( 'jquery.biscuit', get_template_directory_uri() . '/assets/js/jquery.biscuit.js', array( 'jquery' ), $theme_info->get( 'Version' ) );

			wp_register_script( 'per-page-options-js', get_template_directory_uri() . '/assets/js/perpageoptions.js', array( 'jquery' ), $theme_info->get( 'Version' ) );
			wp_enqueue_script( 'jquery.biscuit' );
			wp_enqueue_script( 'per-page-options-js' );
			wp_enqueue_script( 'thickbox' );
	   		wp_enqueue_style( 'thickbox' );

	   		wp_register_style( 'per-page-options-css', get_template_directory_uri() . '/assets/css/perpageoptions.css' );
	   		wp_enqueue_style( 'per-page-options-css' );

		}

	}
	

	public function add_meta_boxes() {

		$post_types = get_post_types( array( 'public' => true ) );

		/*$disallowed = array( 'page', 'post', 'attachment', 'aione-slider' );

		foreach ( $post_types as $post_type ) {
			if ( in_array( $post_type, $disallowed ) ) {
				continue;
			}
			$this->add_meta_box('post_options', 'Aione Options', $post_type);
		}

		$this->add_meta_box( 'post_options', 'Page Options', 'post' );
		$this->add_meta_box( 'page_options', 'Page Options', 'page' );*/

		$disallowed = array( 'attachment', 'aione-slider' );
		foreach ( $post_types as $post_type ) {
			if ( in_array( $post_type, $disallowed ) ) {
				continue;
			}
			$this->add_meta_box('aione_design_options', 'Aione Design Options', $post_type);
		}

	}

	public function add_meta_box( $id, $label, $post_type ) {
		add_meta_box( 'pyre_' . $id, $label, array( $this, $id ), $post_type, 'advanced', 'default',array('post_type' => $post_type) );
	}

	public function aione_design_options( ) {
		$this->render_aione_design_options( array('header','slider','page_title_bar','page_settings','footer') );
	}

	public function render_aione_design_options( $requested_tabs, $post_type = 'default' ) {

		$tabs_names = array(
			'header'         => __( 'Header', 'gutenbergtheme' ),
			'slider'         => __( 'Slider', 'gutenbergtheme' ),
			'page_title_bar'         => __( 'Page Title Bar', 'gutenbergtheme' ),
			'page_settings'         => __( 'Page Settings', 'gutenbergtheme' ),
			'footer'         => __( 'Footer', 'gutenbergtheme' ),
			
		);
		?>

		<ul class="pyre_metabox_tabs">

			<?php foreach( $requested_tabs as $key => $tab_name ) : ?>
				<?php $class = ( $key === 0 ) ? "active" : ""; ?>
				<li class="<?php echo $class; ?>"><a href="<?php echo $tab_name; ?>"><?php echo $tabs_names[$tab_name]; ?></a></li>
			
			<?php endforeach; ?>

		</ul>

		<div class="pyre_metabox">

			<?php foreach ( $requested_tabs as $key => $tab_name ) : ?>
				<div class="pyre_metabox_tab" id="pyre_tab_<?php echo $tab_name; ?>">
					<?php require_once( 'tabs/tab_' . $tab_name . '.php' ); ?>
				</div>
			<?php endforeach; ?>

		</div>
		<div class="clear"></div>
		<?php

	}

	public function save_meta_boxes( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		foreach ( $_POST as $key => $value ) {
			if ( strstr( $key, 'pyre_') ) {
				update_post_meta( $post_id, $key, $value );
			}
		}

	}

	/*public function page_options() {
		$this->render_option_tabs( array( 'sliders', 'page', 'header', 'footer', 'sidebars', 'background', 'portfolio_page',
		'pagetitlebar','custom_code', 'seo', 'security' ) );
	}

	public function post_options() {
		$this->render_option_tabs( array( 'post', 'page', 'sliders', 'header', 'footer', 'sidebars', 'background',
		'pagetitlebar', 'custom_code', 'seo', 'security' ) );
	}*/

	/*public function render_option_tabs( $requested_tabs, $post_type = 'default' ) {

		$tabs_names = array(
			'sliders'        => __( 'Sliders', 'Aione' ),
			'page'           => __( 'Page', 'Aione' ),
			'post'           => __( 'Post', 'Aione' ),
			'header'         => __( 'Header', 'Aione' ),
			'footer'         => __( 'Footer', 'Aione' ),
			'sidebars'       => __( 'Sidebars', 'Aione' ),
			'background'     => __( 'Background', 'Aione' ),
			'portfolio'      => __( 'Portfolio', 'Aione' ),
			'pagetitlebar'   => __( 'Page Title Bar', 'Aione' ),
			'portfolio_page' => __( 'Portfolio', 'Aione' ),
			'portfolio_post' => __( 'Portfolio', 'Aione' ),
			'product'        => __( 'Product', 'Aione' ),
			'custom_code'     => __( 'Custom Code', 'Aione' ),
			'seo'			 => __( 'SEO', 'Aione' ),
			'security'       => __( 'Security', 'Aione' ),
			
		);
		?>

		<ul class="pyre_metabox_tabs">

			<?php foreach( $requested_tabs as $key => $tab_name ) : ?>
				<?php $class = ( $key === 0 ) ? "active" : ""; ?>
				<li class="<?php echo $class; ?>"><a href="<?php echo $tab_name; ?>"><?php echo $tabs_names[$tab_name]; ?></a></li>
			
			<?php endforeach; ?>

		</ul>

		<div class="pyre_metabox">

			<?php foreach ( $requested_tabs as $key => $tab_name ) : ?>
				<div class="pyre_metabox_tab" id="pyre_tab_<?php echo $tab_name; ?>">
					<?php require_once( 'tabs/tab_' . $tab_name . '.php' ); ?>
				</div>
			<?php endforeach; ?>

		</div>
		<div class="clear"></div>
		<?php

	}*/

	public function text( $id, $label, $desc = '' ) {

		global $post;
		?>

		<div class="pyre_metabox_field">
			<div class="pyre_desc">
				<label for="pyre_<?php echo $id; ?>"><?php echo $label; ?></label>
				<?php if ( $desc ) : ?>
					<p><?php echo $desc; ?></p>
				<?php endif; ?>
			</div>
			<div class="pyre_field">
				<input type="text" id="pyre_<?php echo $id; ?>" name="pyre_<?php echo $id; ?>" value="<?php echo get_post_meta( $post->ID, 'pyre_' . $id, true ); ?>" />
			</div>
		</div>
		<?php

	}

	public function select( $id, $label, $options, $desc = '' ) {
		global $post;
		?>

		<div class="pyre_metabox_field">
			<div class="pyre_desc">
				<label for="pyre_<?php echo $id; ?>"><?php echo $label; ?></label>
				<?php if ( $desc ) : ?>
					<p><?php echo $desc; ?></p>
				<?php endif; ?>
			</div>
			<div class="pyre_field">
				<div class="oxo-shortcodes-arrow">&#xf107;</div>
				<select id="pyre_<?php echo $id; ?>" name="pyre_<?php echo $id; ?>">
					<?php foreach( $options as $key => $option ) : ?> 
						<?php $selected = ( $key == get_post_meta( $post->ID, 'pyre_' . $id, true ) ) ? 'selected="selected"' : ''; ?>
						<option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $option; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<?php

	}

	public function multiple( $id, $label, $options, $desc = '' ) {
		global $post;
		?>

		<div class="pyre_metabox_field">
			<div class="pyre_desc">
				<label for="pyre_<?php echo $id; ?>"><?php echo $label; ?></label>
				<?php if ( $desc ) : ?>
					<p><?php echo $desc; ?></p>
				<?php endif; ?>
			</div>
			<div class="pyre_field">
				<select multiple="multiple" id="pyre_<?php echo $id; ?>" name="pyre_<?php echo $id; ?>[]">
					<?php foreach ( $options as $key => $option ) : ?>
						<?php $selected = ( is_array( get_post_meta( $post->ID, 'pyre_' . $id, true ) ) && in_array( $key, get_post_meta( $post->ID, 'pyre_' . $id, true ) ) ) ? 'selected="selected"' : ''; ?>
						<option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $option; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<?php

	}

	public function textarea( $id, $label, $desc = '', $default = '' ) {
		global $post;
		$db_value = get_post_meta( $post->ID, 'pyre_' . $id, true );
		$value = ( metadata_exists( 'post', $post->ID, 'pyre_'. $id ) ) ? $db_value : $default;
		$rows = 10;
		if ( $id == 'heading' || $id == 'caption' ) {
			$rows = 5;
		} else if ( 'page_title_custom_text' == $id || 'page_title_custom_subheader' == $id ) {
			$rows = 1;
		}
		?>

		<div class="pyre_metabox_field">
			<div class="pyre_desc">
				<label for="pyre_<?php echo $id; ?>"><?php echo $label; ?></label>
				<?php if ( $desc ) : ?>
					<p><?php echo $desc; ?></p>
				<?php endif; ?>
			</div>
			<div class="pyre_field">
				<textarea cols="120" rows="<?php echo $rows; ?>" id="pyre_<?php echo $id; ?>" name="pyre_<?php echo $id; ?>"><?php echo $value; ?></textarea>
			</div>
		</div>
		<?php

	}

	public function upload( $id, $label, $desc = '' ) {
		global $post;
		?>

		<div class="pyre_metabox_field">
			<div class="pyre_desc">
				<label for="pyre_<?php echo $id; ?>"><?php echo $label; ?></label>
				<?php if ( $desc ) : ?>
					<p><?php echo $desc; ?></p>
				<?php endif; ?>
			</div>
			<div class="pyre_field">
				<div class="pyre_upload">
					<div><input name="pyre_<?php echo $id; ?>" class="upload_field" id="pyre_<?php echo $id; ?>" type="text" value="<?php echo get_post_meta( $post->ID, 'pyre_' . $id, true ); ?>" /></div>
					<div class="oxo_upload_button_container"><input class="oxo_upload_button" type="button" value="<?php _e( 'Browse', 'Aione' ); ?>" /></div>
				</div>
			</div>
		</div>
		<?php

	}

}
$metaboxes = new PerPageOptionsMetaboxes;


/**
* Register Aione Slider custom Post Type
* 
*/
add_action( 'init', 'register_aione_slider' );
if ( ! function_exists( 'register_aione_slider' ) ){
    function register_aione_slider() {
        register_post_type( 'aione-slider',
            array(
                'labels' => array(
                    'name' => 'Slider',
                    'singular_name' => 'Slider',
                    'add_new' => 'Add New',
                    'add_new_item' => 'Add New Slider',
                    'edit' => 'Edit',
                    'edit_item' => 'Edit Slider',
                    'new_item' => 'New Slider',
                    'view' => 'View',
                    'view_item' => 'View Slider',
                    'search_items' => 'Search Slider',
                    'not_found' => 'No Slider found',
                    'not_found_in_trash' => 'No Slider found in Trash',
                    'parent' => ''
                ),
                'public' => true,
                'menu_position' => 15,
                'menu_icon' => 'dashicons-laptop',
                'supports' => array( 'title'), 
                'taxonomies' => array( '' ),
                'has_archive' => false,
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
		'aione_slider_settings',
		'Settings',
		'aione_slider_settings_callback',
		'aione-slider',
		'side',
		'default'
	);
	add_meta_box(
		'aione_slider_docs',
		'Slider shortcode',
		'aione_slider_docs_callback',
		'aione-slider',
		'side',
		'default'
	);
}

function aione_slider_settings_callback($post){
	wp_nonce_field( 'aione_slider_settings_form_metabox_nonce', 'aione_slider_settings_form_nonce' ); 
	echo aione_slider_settings_form($post);
}
add_action('save_post', 'aione_slider_settings_save_meta');
function aione_slider_settings_save_meta($post_id ){
	if( !isset( $_POST['aione_slider_settings_form_nonce'] ) || !wp_verify_nonce( $_POST['aione_slider_settings_form_nonce'],'aione_slider_settings_form_metabox_nonce') ) 
    return;
	if ( !current_user_can( 'edit_post', $post_id ))
	    return;

	update_post_meta( $post_id, 'aione-slider-settings', $_POST['aione_slider_settings']);

}

function aione_slider_settings_form($post){
	$settings   = get_post_meta( $post->ID, 'aione-slider-settings', true );
	//echo "<pre>";print_r($settings);echo "</pre>";
	$aione_slider_settings = array();
	?>	
		<form name="" class="" id="" method="post" action="" enctype="multipart/form-data">
			<table class="form-table">
				<tbody>
					<tr>
					<th scope="row"><label for="aione_slider_items">Items</label></th>
					<td><input name="aione_slider_settings[items]" type="number" id="aione_slider_items" value="<?php echo isset($settings['items'])? $settings['items'] : '3' ?>" class=""><p class="description">The number of items you want to see on the screen.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_margin">Margin</label></th>
					<td><input name="aione_slider_settings[margin]" type="number" id="aione_slider_margin" value="<?php echo isset($settings['margin'])? $settings['margin'] : '0' ?>" class=""><p class="description">margin-right(px) on item.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_loop">Loop</label></th>
					<td><select name="aione_slider_settings[loop]" id="aione_slider_loop">				
						<option value="false" <?php if($settings['loop'] == 'false') {echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if($settings['loop'] == 'true') {echo "selected = selected";} ?>>True</option>
						</select><p class="description">Infinity loop. Duplicate last and first items to get loop illusion.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_center">Center</label></th>
					<td><select name="aione_slider_settings[center]" id="aione_slider_center">			
						<option value="false" <?php if($settings['center'] == 'false') {echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if($settings['center'] == 'true') {echo "selected = selected";} ?>>True</option>
						</select><p class="description">Center item. Works well with even an odd number of items.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_mouseDrag">mouseDrag</label></th>
					<td><select name="aione_slider_settings[mouseDrag]" id="aione_slider_mouseDrag">	
						<option value="true" <?php if($settings['mouseDrag'] == 'true') {echo "selected = selected";} ?>>True</option>
						<option value="false" <?php if($settings['mouseDrag'] == 'false') {echo "selected = selected";} ?>>False</option>
						</select><p class="description">Mouse drag enabled.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_touchDrag">touchDrag</label></th>
					<td><select name="aaione_slider_settings[touchDrag]" id="aione_slider_touchDrag">					
						<option value="true" <?php if($settings['touchDrag'] == 'true') {echo "selected = selected";} ?>>True</option>
						<option value="false" <?php if($settings['touchDrag'] == 'false') {echo "selected = selected";} ?>>False</option>
						</select><p class="description">Touch drag enabled.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_pullDrag">pullDrag</label></th>
					<td><select name="aione_slider_settings[pullDrag]" id="aione_slider_pullDrag">					
						<option value="true" <?php if($settings['pullDrag'] == 'true') {echo "selected = selected";} ?>>True</option>
						<option value="false" <?php if($settings['pullDrag'] == 'false') {echo "selected = selected";} ?>>False</option>
						</select><p class="description">Stage pull to edge.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_freeDrag">freeDrag</label></th>
					<td><select name="aione_slider_settings[freeDrag]" id="aione_slider_freeDrag">					
						<option value="false" <?php if($settings['freeDrag'] == 'false') {echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if($settings['freeDrag'] == 'true') {echo "selected = selected";} ?>>True</option>
						</select><p class="description">Item pull to edge.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_stagePadding">stagePadding</label></th>
					<td><input name="aione_slider_settings[stagePadding]" type="number" id="aione_slider_stagePadding" value="<?php echo isset($settings['stagePadding'])? $settings['items'] : '0' ?>" class=""><p class="description">Padding left and right on stage (can see neighbours).</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_merge">Merge</label></th>
					<td><select name="aione_slider_settings[merge]" id="aione_slider_merge">						
						<option value="false" <?php if($settings['merge'] == 'false') {echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if($settings['merge'] == 'true') {echo "selected = selected";} ?>>True</option>
						</select><p class="description">Merge items. Looking for data-merge="{number}" inside item..</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_mergeFit">mergeFit</label></th>
					<td><select name="aione_slider_settings[mergeFit]" id="aione_slider_mergeFit">					
						<option value="true" <?php if($settings['mergeFit'] == 'true') {echo "selected = selected";} ?>>True</option>
						<option value="false" <?php if($settings['mergeFit'] == 'false') {echo "selected = selected";} ?>>False</option>
						</select><p class="description">Fit merged items if screen is smaller than items value.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_autoWidth">autoWidth</label></th>
					<td><select name="aione_slider_settings[autoWidth]" id="aione_slider_autoWidth">					
						<option value="false" <?php if($settings['autoWidth'] == 'false') {echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if($settings['autoWidth'] == 'true') {echo "selected = selected";} ?>>True</option>
						</select><p class="description">Set non grid content. Try using width style on divs.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_startPosition">startPosition</label></th>
					<td><input name="aione_slider_settings[startPosition]" type="text" id="aione_slider_startPosition" value="<?php echo isset($settings['startPosition'])? $settings['startPosition'] : '0' ?>" class=""><p class="description">Start position or URL Hash string like "#id".</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_URLhashListener">URLhashListener</label></th>
					<td><select name="aione_slider_settings[URLhashListener]" id="aione_slider_URLhashListener">		
						<option value="false" <?php if($settings['URLhashListener'] == 'false') {echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if($settings['URLhashListener'] == 'true') {echo "selected = selected";} ?>>True</option>
						</select><p class="description">Listen to url hash changes. data-hash on items is required.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_nav">Nav</label></th>
					<td><select name="aione_slider_settings[nav]" id="aione_slider_nav">					
						<option value="false" <?php if($settings['nav'] == 'false') {echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if($settings['nav'] == 'true') {echo "selected = selected";} ?>>True</option>
						</select><p class="description">Show next/prev buttons.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_rewind">Rewind</label></th>
					<td><select name="aione_slider_settings[rewind]" id="aione_slider_rewind">						
						<option value="true" <?php if($settings['rewind'] == 'true') {echo "selected = selected";} ?>>True</option>
						<option value="false" <?php if($settings['rewind'] == 'false') {echo "selected = selected";} ?>>False</option>
						</select><p class="description">Go backwards when the boundary has reached.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_navText">navText</label></th>
					<td><input name="aione_slider_settings[navText]" type="text" id="aione_slider_navText" value="<?php echo isset($settings['navText'])? $settings['navText'] : '[&#x27;next&#x27;,&#x27;prev&#x27;]' ?>" class=""><p class="description">HTML allowed.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_navElement">navElement</label></th>
					<td><input name="aione_slider_settings[navElement]" type="text" id="aione_slider_navElement" value="<?php echo isset($settings['navElement'])? $settings['navElement'] : 'div' ?>" class=""><p class="description">DOM element type for a single directional navigation link.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_slideBy">slideBy</label></th>
					<td><input name="aione_slider_settings[slideBy]" type="text" id="aione_slider_slideBy" value="<?php echo isset($settings['slideBy'])? $settings['slideBy'] : '1' ?>" class=""><p class="description">Navigation slide by x. "page" string can be set to slide by page.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_slideTransition">slideTransition</label></th>
					<td><input name="aione_slider_settings[slideTransition]" type="text" id="aione_slider_slideTransition" value="<?php echo isset($settings['slideTransition'])? $settings['slideTransition'] : '' ?>" class=""><p class="description">You can define the transition for the stage you want to use eg. linear.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_dots">Dots</label></th>
					<td><select name="aione_slider_settings[dots]" id="aione_slider_dots">						
						<option value="true" <?php if($settings['dots'] == 'true') {echo "selected = selected";} ?>>True</option>
						<option value="false" <?php if($settings['dots'] == 'false') {echo "selected = selected";} ?>>False</option>
						</select><p class="description">Show dots navigation.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_dotsEach">dotsEach</label></th>
					<td><input name="aione_slider_settings[dotsEach]" type="text" id="aione_slider_dotsEach" value="<?php echo isset($settings['dotsEach'])? $settings['dotsEach'] : 'false' ?>" class=""><p class="description">Show dots each x item.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_dotsData">dotsData</label></th>
					<td><select name="aione_slider_settings[dotsData]" id="aione_slider_dotsData">					
						<option value="false" <?php if($settings['dotsData'] == 'false') {echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if($settings['dotsData'] == 'true') {echo "selected = selected";} ?>>True</option>
						</select><p class="description">Used by data-dot content.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_lazyLoad">lazyLoad</label></th>
					<td><select name="aione_slider_settings[lazyLoad]" id="aione_slider_lazyLoad">					
						<option value="false" <?php if($settings['lazyLoad'] == 'false') {echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if($settings['lazyLoad'] == 'true') {echo "selected = selected";} ?>>True</option>
						</select><p class="description">Lazy load images. data-src and data-src-retina for highres. Also load images into background inline style if element is not <img></p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_lazyLoadEager">lazyLoadEager</label></th>
					<td><input name="aione_slider_settings[lazyLoadEager]" type="number" id="aione_slider_lazyLoadEager" value="<?php echo isset($settings['lazyLoadEager'])? $settings['lazyLoadEager'] : '0' ?>" class=""><p class="description">Eagerly pre-loads images to the right (and left when loop is enabled) based on how many items you want to preload.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_autoplay">autoplay</label></th>
					<td><select name="aione_slider_settings[autoplay]" id="aione_slider_autoplay">					
						<option value="false" <?php if($settings['autoplay'] == 'false') {echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if($settings['autoplay'] == 'true') {echo "selected = selected";} ?>>True</option>
						</select><p class="description">Autoplay.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_autoplayTimeout">autoplayTimeout</label></th>
					<td><input name="aione_slider_settings[autoplayTimeout]" type="number" id="aione_slider_autoplayTimeout" value="<?php echo isset($settings['autoplayTimeout'])? $settings['autoplayTimeout'] : '5000' ?>" class=""><p class="description">Autoplay interval timeout.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_autoplayHoverPause">autoplayHoverPause</label></th>
					<td><select name="aione_slider_settings[autoplayHoverPause]" id="aione_slider_autoplayHoverPause">
						<option value="false" <?php if($settings['autoplayHoverPause'] == 'false') {echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if($settings['autoplayHoverPause'] == 'true') {echo "selected = selected";} ?>>True</option>
						</select><p class="description">Pause on mouse hover.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_smartSpeed">smartSpeed</label></th>
					<td><input name="aione_slider_settings[smartSpeed]" type="number" id="aione_slider_smartSpeed" value="<?php echo isset($settings['smartSpeed'])? $settings['smartSpeed'] : '250' ?>" class=""><p class="description">Speed Calculate. More info to come..</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_autoplaySpeed">autoplaySpeed</label></th>
					<td><input name="aione_slider_settings[autoplaySpeed]" type="text" id="aione_slider_autoplaySpeed" value="<?php echo isset($settings['autoplaySpeed'])? $settings['autoplaySpeed'] : 'false' ?>" class=""><p class="description">autoplay speed.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_navSpeed">navSpeed</label></th>
					<td><input name="aione_slider_settings[navSpeed]" type="text" id="aione_slider_navSpeed" value="<?php echo isset($settings['navSpeed'])? $settings['navSpeed'] : 'false' ?>" class=""><p class="description">Navigation speed.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_dotsSpeed">dotsSpeed</label></th>
					<td><input name="aione_slider_settings[dotsSpeed]" type="text" id="aione_slider_dotsSpeed" value="<?php echo isset($settings['dotsSpeed'])? $settings['dotsSpeed'] : 'false' ?>" class=""><p class="description">Pagination speed.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_dragEndSpeed">dragEndSpeed</label></th>
					<td><input name="aione_slider_settings[dragEndSpeed]" type="text" id="aione_slider_dragEndSpeed" value="<?php echo isset($settings['dragEndSpeed'])? $settings['dragEndSpeed'] : 'false' ?>" class=""><p class="description">Drag end speed.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_callbacks">Callbacks</label></th>
					<td><select name="aione_slider_settings[callbacks]" id="aione_slider_callbacks">			
						<option value="true" <?php if($settings['callbacks'] == 'true') {echo "selected = selected";} ?>>True</option>
						<option value="false" <?php if($settings['callbacks'] == 'false') {echo "selected = selected";} ?>>False</option>						
						</select><p class="description">Enable callback events.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_video">Video</label></th>
					<td><select name="aione_slider_settings[video]" id="aione_slider_video">			
						<option value="false" <?php if($settings['video'] == 'false') {echo "selected = selected";} ?>>False</option>
						<option value="true" <?php if($settings['video'] == 'true') {echo "selected = selected";} ?>>True</option>												
						</select><p class="description">Enable fetching YouTube/Vimeo/Vzaar videos.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_videoHeight">videoHeight</label></th>
					<td><input name="aione_slider_settings[videoHeight]" type="text" id="aione_slider_videoHeight" value="<?php echo isset($settings['videoHeight'])? $settings['videoHeight'] : 'false' ?>" class=""><p class="description">Set height for videos.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_videoWidth">videoWidth</label></th>
					<td><input name="aione_slider_settings[videoWidth]" type="text" id="aione_slider_videoWidth" value="<?php echo isset($settings['videoWidth'])? $settings['videoWidth'] : 'false' ?>" class=""><p class="description">Set width for videos.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_animateOut">animateOut</label></th>
					<td><input name="aione_slider_settings[animateOut]" type="text" id="aione_slider_animateOut" value="<?php echo isset($settings['animateOut'])? $settings['animateOut'] : 'false' ?>" class=""><p class="description">Class for CSS3 animation out.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_animateIn">animateIn</label></th>
					<td><input name="aione_slider_settings[animateIn]" type="text" id="aione_slider_animateIn" value="<?php echo isset($settings['animateIn'])? $settings['animateIn'] : 'false' ?>" class=""><p class="description">Class for CSS3 animation in.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_fallbackEasing">fallbackEasing</label></th>
					<td><input name="aione_slider_settings[fallbackEasing]" type="text" id="aione_slider_fallbackEasing" value="<?php echo isset($settings['fallbackEasing'])? $settings['fallbackEasing'] : 'swing' ?>" class=""><p class="description">Easing for CSS2 $.animate.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_itemElement">itemElement</label></th>
					<td><input name="aione_slider_settings[itemElement]" type="text" id="aione_slider_itemElement" value="<?php echo isset($settings['itemElement'])? $settings['itemElement'] : 'div' ?>" class=""><p class="description">DOM element type for aione-slider-item.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_stageElement">stageElement</label></th>
					<td><input name="aione_slider_settings[stageElement]" type="text" id="aione_slider_stageElement" value="<?php echo isset($settings['stageElement'])? $settings['stageElement'] : 'div' ?>" class=""><p class="description">DOM element type for aione-slider-stage.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_navContainer">navContainer</label></th>
					<td><input name="aione_slider_settings[navContainer]" type="text" id="aione_slider_navContainer" value="<?php echo isset($settings['navContainer'])? $settings['navContainer'] : 'false' ?>" class=""><p class="description">Set your own container for nav.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_dotsContainer">dotsContainer</label></th>
					<td><input name="aione_slider_settings[dotsContainer]" type="text" id="aione_slider_dotsContainer" value="<?php echo isset($settings['dotsContainer'])? $settings['dotsContainer'] : 'false' ?>" class=""><p class="description">Set your own container for nav.</p></td>
					</tr>
					<tr>
					<th scope="row"><label for="aione_slider_checkVisible">checkVisible</label></th>
					<td><select name="aione_slider_settings[checkVisible]" id="aione_slider_checkVisible">			
						<option value="true" <?php if($settings['checkVisible'] == 'true') {echo "selected = selected";} ?>>True</option>
						<option value="false" <?php if($settings['checkVisible'] == 'false') {echo "selected = selected";} ?>>False</option>												
						</select><p class="description">If you know the carousel will always be visible you can set `checkVisibility` to `false` to prevent the expensive browser layout forced reflow the $element.is(":visible") does.</p></td>
					</tr>


				</tbody>
			</table>
			<p class="submit"><input type="submit" id="submit_button" name="app_setting_save" class="button button-primary" value="Save Settings"></p>
		</form>
	<?php
}

function aione_slider_docs_callback(){
	$id = get_the_ID();
	echo '[aione-slider id="'.$id.'"]';
}
/**
* Aione Slider Shortcode Callback
* 
*/
add_shortcode( 'aione-slider', 'aione_slider_shortcode_callback' );
function aione_slider_shortcode_callback( $atts ) {
	$atts = shortcode_atts( array(
		'id' => '',
		'class' => '',
	), $atts, 'aione-slider' );

	$slides = get_field('images', $atts['id']);
	$output = '';
	$output .= '<div id="aione_slider" class="aione-slider">
			<div class="wrapper">';
				if(!empty($slides)):
					
					$output .=  '<div id="aione_slider_'.$atts['id'].'" class="slider owl-carousel owl-theme gallery aione-theme">';
					//echo '<div id="aione_slider_'.$slider_id.'" class="aione-carousel owl-carousel owl-theme gallery aione-theme">';
					foreach ($slides as $key => $slide) {
						$output .= '<div class="aione-item">';
							$output .= '<div class="aione-image">';
								$output .= '<img src="'.$slide['url'].'" alt="'.$slide['alt'].'" />';

							$output .= '</div>';
							$output .= '<div class="aione-description">';
								$output .= '<h2 class="title">'.$slide['title'].'</h2>';
								$output .= '<h4 class="description">'.$slide['caption'].'</h4>';
							$output .= '</div>';
						$output .= '</div>';
					}
					$output .= '</div>';

				endif;
			$output .='<div class="aione-clear"></div>
			</div>
		</div>
		';
	echo $output;

}

/**
* Register Aione Slider Custom Field "Gallery"
* 
*/
if(function_exists("register_field_group")){
	register_field_group(array (
		'id' => 'acf_slider',
		'title' => 'Slider',
		'fields' => array (
			array (
				'key' => 'field_5ae2b58c4b319',
				'label' => 'Images',
				'name' => 'images',
				'type' => 'gallery',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'aione-slider',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


/**
* Aione Slider Widget
* 
*/
add_action('widgets_init', create_function('', "register_widget('Aione_Slider_Widget');"));
class Aione_Slider_Widget extends WP_Widget {

    public function __construct() {
	    $widget_options = array( 
	      'classname' => 'aione_slider_widget',
	      'description' => 'List of Aione Sliders',
	    );
	    parent::__construct( 'aione_slider_widget', 'Aione slider', $widget_options );
	}
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		//echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; 
		echo $args['before_widget'] . $args['before_title'] . $args['after_title']; 
		
		do_shortcode('[aione-slider id="'.$instance[ 'slider' ].'"]');
      
        echo $args['after_widget'];
	}
	public function form( $instance ) {
		$args = array(
      	'post_type' => 'aione-slider',
      	'posts_per_page' => -1,
      	'post_status' => 'publish'
      );
      
      $custom_posts = new WP_Query($args);

	  $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
	  <p>
	    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
	    <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
	  </p>
	  <p>
	    <label for="<?php echo $this->get_field_id( 'slider' ); ?>">Select Slider:</label>
	    <select id="<?php echo $this->get_field_id( 'slider' ); ?>" name="<?php echo $this->get_field_name( 'slider' ); ?>">
	    	<?php 
	    	if ($custom_posts->have_posts() ) { 
				foreach($custom_posts->posts as $slider){ 
					$selected_html = '';
					if ($slider->post_name==$instance['slider']) {
						$selected_html = " selected='selected'";
					}
					echo "<option value='".$slider->ID."' ".$selected_html.">".$slider->post_title."</option>";
				
				} 
			}
	    	?>
	    </select>
	  </p>
	  <?php 
	}
	public function update( $new_instance, $old_instance ) {
	  $instance = $old_instance;
	  $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
	  $instance[ 'slider' ] = strip_tags( $new_instance[ 'slider' ] );
	  return $instance;
	}
}

/**********************/
/**
* Aione Social Icons Widget
* 
*/
add_action('widgets_init', create_function('', "register_widget('Aione_Social_Icons_Widget');"));
class Aione_Social_Icons_Widget extends WP_Widget {

    public function __construct() {
	    $widget_options = array( 
	      'classname' => 'aione_social_icons_widget',
	      'description' => 'Displays a list of social media website icons and a link to your profile.',
	    );
	    parent::__construct( 'aione_social_icons_widget', 'Aione Social Icons', $widget_options );

	    global $asiw_social_accounts;
		$asiw_social_accounts = array(
			'Email' => 'email',
			'Facebook' => 'facebook',
			'Flickr' => 'flickr',
			'GitHub' => 'github',
			'Google+' => 'googleplus',
			'Instagram' => 'instagram',
			'LinkedIn' => 'linkedin',
			'Pinterest' => 'pinterest',
			'RSS Feed' => 'rss',
			'Tumblr' => 'tumblr',
			'Twitter' => 'twitter',
			'Vimeo' => 'vimeo',
			'WordPress' => 'wordpress',
			'YouTube' => 'youtube'
		);

		if( has_filter('aione_social_icon_accounts') ) {
			$asiw_social_accounts = apply_filters('aione_social_icon_accounts', $asiw_social_accounts);
		}
	}
	public function widget( $args, $instance ) {
		global $asiw_social_accounts;
		extract($args);
		
		$asiw_title = empty($instance['title']) ? 'Follow Us' : apply_filters('widget_title', $instance['title']);
		$asiw_icon_size = $instance['icon_size'];
		$asiw_labels = $instance['labels'];
		
		echo $before_widget;
		
		echo $before_title;
		echo $asiw_title;
		echo $after_title;
		

		if($asiw_labels == 'show') { $ul_class = 'show-labels '; }
		else { $ul_class = ''; }
		$ul_class .= 'fa-'.$asiw_icon_size;
		

		echo apply_filters('social_icon_opening_tag', '<ul class="'.$ul_class.'">'); 

		foreach($asiw_social_accounts as $label => $id) : 
			 if($instance[$id] != '' && $instance[$id] != 'http://') :
				global $asiw_data;
				global $asiw_icon_output;

				
				$asiw_data['id'] = $id;
				$asiw_data['url'] = $instance[$id];
				

				if($asiw_labels != 'show') { $asiw_data['label'] = ''; }
				else { $asiw_data['label'] = '<span class="social-icon-label">'.$label.'</span>'; }

				$format = '<li class="%1$s"><a href="%2$s" target="_blank"><i class="fa fa-%1$s"></i>%3$s</a></li>';

				$asiw_icon_output = apply_filters('social_icon_output', $format);
				echo vsprintf($asiw_icon_output, $asiw_data);

				/*<li>
				<a class="facebook" href="https://www.facebook.com/oxosolutions" target="_blank">
				<i class="fa fa-facebook"></i>
				</a>
				</li>*/

			 endif; 
		 endforeach; 
		// echo "<pre>";print_r($asiw_social_accounts);echo "</pre>";
		// echo "<pre>";print_r($asiw_data);echo "</pre>";
		 echo apply_filters('social_icon_closing_tag', '</ul>'); 

		
		echo $after_widget;
		
	}
	public function form( $instance ) {
		global $asiw_social_accounts;

		foreach ($asiw_social_accounts as $site => $id) {
			if(!isset($instance[$id])) { $instance[$id] = ''; }
			elseif($instance[$id] == 'http://') { $instance[$id] = ''; }
		}

		if(!isset($instance['title'])) { $instance['title'] = ''; }
		if(!isset($instance['icon_size'])) { $instance['icon_size'] = 'lg'; }
		if(!isset($instance['labels'])) { $instance['labels'] = ''; }
		?>

		<div class="aione_social_icons_widget">

		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" /></p>

		<?php
		$asiw_sizes = array(
			'none' => 'none',
			'xs' => 'xs',
			'sm' => 'sm',
			'lg' => 'lg',
			'2x' => '2x',
			'3x' => '3x',
			'5x' => '5x',
			'7x' => '7x',
			'10x' => '10x',
		);
		?>

		<p class="icon_options"><label for="<?php echo $this->get_field_id('icon_size'); ?>">Icon Size:</label>
			<select id="<?php echo $this->get_field_id('icon_size'); ?>" name="<?php echo $this->get_field_name('icon_size'); ?>">
			<?php
			foreach($asiw_sizes as $option => $value) :

				if(esc_attr($instance['icon_size'] == $value)) { $selected = ' selected="selected"'; }
				else { $selected = ''; }
			?>
			
				<option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $option; ?></option>
			
			<?php endforeach; ?>
			</select>
		</p>

		<?php if(esc_attr($instance['labels'] == 'show')) { $checked = ' checked="checked"'; } else { $checked = ''; } ?>
		<p class="label_options"><input type="checkbox" id="<?php echo $this->get_field_id('labels'); ?>" name="<?php echo $this->get_field_name('labels'); ?>" value="show"<?php echo $checked; ?> /> <label for="<?php echo $this->get_field_id('labels'); ?>">Show Labels</label></p>

		<ul class="aione_social_accounts">
			<?php foreach ($asiw_social_accounts as $site => $id) : ?>
				<li><label for="<?php echo $this->get_field_id($id); ?>" class="<?php echo $id; ?>"><?php echo $site; ?>:</label>
					<input class="widefat" type="text" id="<?php echo $this->get_field_id($id); ?>" name="<?php echo $this->get_field_name($id); ?>" value="<?php echo esc_attr($instance[$id]); ?>" placeholder="http://" /></li>
			<?php endforeach; ?>
		</ul>

		</div>
		<?php
	}
	public function update( $new_instance, $old_instance ) {
	    global $asiw_social_accounts;
		$instance = array();

		foreach ($asiw_social_accounts as $site => $id) {
			$instance[$id] = $new_instance[$id];
		}

		$instance['title'] = $new_instance['title'];
		$instance['icon_size'] = $new_instance['icon_size'];
		$instance['labels'] = $new_instance['labels'];

		return $instance;
	}
}


/**********************/
/**
* Aione Social Share Widget
* 
*/
add_action('widgets_init', create_function('', "register_widget('Aione_Social_Share_Widget');"));
class Aione_Social_Share_Widget extends WP_Widget {

    public function __construct() {
	    $widget_options = array( 
	      'classname' => 'aione_social_share_widget',
	      'description' => 'Social Share Buttons',
	    );
	    parent::__construct( 'aione_social_share_widget', 'Aione Social Share', $widget_options );
	    global $aione_social_share_accounts;
		$aione_social_share_accounts = array(
			'<i class="ion-social-facebook"></i>' => 'facebook',
			'Flickr' => 'flickr',
			'<i class="ion-social-googleplus"></i>' => 'googleplus',
			'<i class="ion-social-linkedin"></i>' => 'linkedin',
			'<i class="ion-social-pinterest"></i>' => 'pinterest',
			'<i class="ion-social-rss"></i>' => 'rss',
			'<i class="ion-social-tumblr"></i>' => 'tumblr',
			'<i class="ion-social-twitter"></i>' => 'twitter',
			'<i class="ion-social-vimeo"></i>' => 'vimeo',
			'<i class="ion-social-wordpress"></i>' => 'wordpress',
			'<i class="ion-social-youtube"></i>' => 'youtube',
			'Blogger' => 'blogger',
			'Delicious' => 'delicious',
			'Google +' => 'plus',
			'<i class="ion-social-whatsapp"></i>' => 'whatsapp',
		);

	}
	public function widget( $args, $instance ) {
		global $aione_social_share_accounts;

		$share_title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		
		$title = get_the_title();
		$url = get_permalink();
		echo $before_widget;
		?>
		<script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('.share').ShareLink({
                    title: <?php echo '"'.$title.'"' ; ?>,
                    url: <?php echo '"'.$url.'"' ; ?>
                });
                jQuery('.counter').ShareCounter({
                    url: <?php echo '"'.$url.'"' ; ?>,
                    increment: true
                });

            });
        </script>
        <?php
		
		echo $before_title;
		echo $share_title;
		echo $after_title;
		
		foreach ($aione_social_share_accounts as $site => $id) {
			if($instance[$id] == 'enable'){
				?> 
				<button class='aione-button share s_<?php echo $id; ?>' type='button'>
                    <?php echo $site; ?> 
                </button>
                <?php
			}
		}
		echo $after_widget;
		
	}
	public function form( $instance ) { 
		global $aione_social_share_accounts;

		foreach ($aione_social_share_accounts as $site => $id) {
			if(!isset($instance[$id])) { $instance[$id] = ''; }
		}

		if(!isset($instance['title'])) { $instance['title'] = ''; }
		?>

		<div class="aione_social_share_widget">

		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" /></p>

		<?php foreach ($aione_social_share_accounts as $site => $id) : ?>
			<?php if(esc_attr($instance[$id] == 'enable')) { $checked = ' checked="checked"'; } else { $checked = ''; } ?>
			<p class="label_options"><input type="checkbox" id="<?php echo $this->get_field_id($id); ?>" name="<?php echo $this->get_field_name($id); ?>" value="enable"<?php echo $checked; ?> /> <label for="<?php echo $this->get_field_id($id); ?>"><?php echo $site; ?> Share</label></p>
		<?php endforeach; ?>

		</div>
		<?php
	}
	public function update( $new_instance, $old_instance ) {

		global $aione_social_share_accounts;
		$instance = array();

		foreach ($aione_social_share_accounts as $site => $id) {
			$instance[$id] = $new_instance[$id];
		}
	    
		$instance['title'] = $new_instance['title'];

		return $instance;
	}
}
function get_aione_page_option($post_id,$meta_key){
	$meta_value = get_post_meta( $post_id, $meta_key , true );
	return $meta_value;
}
?>