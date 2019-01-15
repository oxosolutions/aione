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
		add_action( 'edit_attachment', array( $this, 'save_meta_boxes' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_script_loader' ) );
	}

	/**
	 * Load backend scripts
	 */
	function admin_script_loader() {

		global $pagenow;

		if ( is_admin() && ( in_array( $pagenow, array( 'post-new.php', 'post.php' ) ) ) ) {

			$theme_info = wp_get_theme();

			wp_register_script( 'jquery.biscuit', get_template_directory_uri() . '/assets/js/jquery.biscuit.js', array( 'jquery' ), $theme_info->get( 'Version' ) );

			wp_register_script( 'per-page-options-js', get_template_directory_uri() . '/assets/js/perpageoptions.js', array( 'jquery' ), $theme_info->get( 'Version' ) );
			wp_register_script( 'ace-editor-js', 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.3.3/ace.js', array( 'jquery' ), $theme_info->get( 'Version' ) );

			wp_enqueue_script( 'jquery.biscuit' );
			wp_enqueue_script( 'per-page-options-js' );
			wp_enqueue_script( 'ace-editor-js' );
			wp_enqueue_script('media-upload');
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

		//$disallowed = array( 'attachment', 'aione-slider' );
		$disallowed = array( 'aione-slider' );
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
		$this->render_aione_design_options( array('header','slider','page_title_bar','page_settings','footer','custom_code','seo') );
	}

	public function render_aione_design_options( $requested_tabs, $post_type = 'default' ) {

		$tabs_names = array(
			'header'         => __( 'Header', 'aione' ),
			'slider'         => __( 'Slider', 'aione' ),
			'page_title_bar'         => __( 'Page Title Bar', 'aione' ),
			'page_settings'         => __( 'Page Settings', 'aione' ),
			'footer'         => __( 'Footer', 'aione' ),
			'custom_code'         => __( 'Custom Code', 'aione' ),
			'seo'         => __( 'SEO', 'aione' ),
			
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
					<?php get_template_part( 'tabs/tab_' . $tab_name ); ?>
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
				<div class="oxo-shortcodes-arrow">&#xf3d0;</div>
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

	public function ace_editor ($id, $label, $desc = '',$default=''){
		global $post;
		$db_value = get_post_meta( $post->ID, 'pyre_' . $id, true );
		$value = ( metadata_exists( 'post', $post->ID, 'pyre_'. $id ) ) ? $db_value : $default;

		?>
		<div class="pyre_metabox_field">
			<div class="pyre_desc">
				<label for="pyre_<?php echo $id; ?>"><?php echo $label; ?></label>
				<?php if ( $desc ) : ?>
					<p><?php echo $desc; ?></p>
				<?php endif; ?>
			</div>
			<div class="pyre_field">
				<textarea style="display:none;" name="pyre_<?php echo $id; ?>"><?php echo $value;?></textarea>
				<div id="pyre_<?php echo $id; ?>"></div>
			</div>
		</div>
		<script>
			function cssEditor(){
				var csstempValue = $('textarea[name="pyre_custom_css"]').val(); 
				var cssEditor = ace.edit("pyre_custom_css");
				cssEditor.setTheme("ace/theme/twilight");
				cssEditor.session.setMode("ace/mode/css");
				cssEditor.session.setValue(csstempValue);
				cssEditor.setOptions({
					autoScrollEditorIntoView: true,
					fontSize: "14px"
				});			
				
				var cssinput = $('textarea[name="pyre_custom_css"]');
				cssEditor.getSession().on("change", function () {
					cssinput.val(cssEditor.getSession().getValue());
				});
			}
			function jsEditor(){
				var jstempValue = $('textarea[name="pyre_custom_js"]').val(); 
				var jsEditor = ace.edit("pyre_custom_js");
				jsEditor.setTheme("ace/theme/twilight");
				jsEditor.session.setMode("ace/mode/javascript");
				jsEditor.session.setValue(jstempValue);
				jsEditor.setOptions({
					autoScrollEditorIntoView: true
				});			
				
				var jsinput = $('textarea[name="pyre_custom_js"]');
				jsEditor.getSession().on("change", function () {
					jsinput.val(jsEditor.getSession().getValue());
				});
			}
		</script>
		<?php 
		if($id == "custom_css"):
			?><script> cssEditor();</script><?php
		endif;
		if($id == "custom_js"):
			?><script> jsEditor();</script><?php
		endif;	
		?>
		<style media="screen">
		.ace_editor {
			border: 1px solid lightgray;
			height: 200px;
		}
	</style>
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

				<?php $saved = get_post_meta( $post->ID, 'pyre_'.$id, true );?>
				<input type="url" class="large-text" name="pyre_<?php echo $id; ?>" id="media_upload_btn" value="<?php echo esc_attr( $saved ); ?>"><br>

				<button type="button" class="button" id="media_upload_btn" data-media-uploader-target="#media_upload_btn"><?php _e( 'Upload Media', 'Aione' )?></button>
			</div>
		</div>
	</div>
	<script>
		jQuery(document).ready(function($){
			'use strict';
			// Instantiates the variable that holds the media library frame.
			var metaImageFrame;
			// Runs when the media button is clicked.
			$( 'body' ).click(function(e) {
				// Get the btn
				var btn = e.target;
				// Check if it's the upload button
				if ( !btn || !$( btn ).attr( 'data-media-uploader-target' ) ) return;
				// Get the field target
				var field = $( btn ).data( 'media-uploader-target' );
				// Prevents the default action from occuring.
				e.preventDefault();
				// Sets up the media library frame
				metaImageFrame = wp.media.frames.metaImageFrame = wp.media({
					title: 'Choose or Upload Media',
					button: { text:  'Use this file' },
				});
				// Runs when an image is selected.
				metaImageFrame.on('select', function() {
					// Grabs the attachment selection and creates a JSON representation of the model.
					var media_attachment = metaImageFrame.state().get('selection').first().toJSON();
					// Sends the attachment URL to our custom image input field.
					$( field ).val(media_attachment.url);
				});

				// Opens the media library frame.
				metaImageFrame.open();

			});

		});
	</script>
	<?php

}

}
$metaboxes = new PerPageOptionsMetaboxes;




function aione_slider_docs_callback(){
	$id = get_the_ID();
	echo '[aione-slider id="'.$id.'"]';
}


/**
* Register Aione Slider Custom Field "Gallery"
* 
*/
/**
 * Enable ACF 5 early access
 * Requires at least version ACF 4.4.12 to work
 */
define('ACF_EARLY_ACCESS', '5');

if(class_exists('acf')){ 
	add_action( 'init', 'register_custom_acf_fields' );
} else { 
	add_action( 'admin_notices', 'aione_acf_admin_notice' );
}

function register_custom_acf_fields() { 
	if(class_exists('acf_field_gallery')){
		$acf_version = get_option('acf_version', false);
		if($acf_version < 5){
			if(function_exists("register_field_group")){
				register_field_group(array (
					'id' => 'acf_aione_gallery',
					'title' => 'Aione Gallery',
					'fields' => array (
						array (
							'key' => 'aione_slider_images',
							'label' => 'Images',
							'name' => 'aione_slider_images',
							'type' => 'gallery',
							'preview_size' => 'full',
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
						'style'   => 'seamless', // default
						'layout' => 'no_box',
						'hide_on_screen' => array (
						),
					),
					'menu_order' => 0,
				));
			} 
		} else {
			if ( function_exists( 'acf_add_local_field_group' ) ) {
				// ACF Group: Aione Gallery
				acf_add_local_field_group( array (
					'key'      => 'acf_aione_gallery',
					'title'    => 'Aione Gallery',
					'location' => array (
						array (
							array (
								'param'    => 'post_type',
								'operator' => '==',
								'value'    => 'aione-slider',
							),
						),
					),
					'menu_order'            => 0,
					'position'              => 'normal',
					'style'                 => 'seamless', // default
					'label_placement'       => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen'        => '',
				) );
				// Images
				acf_add_local_field( array(
					'key'          => 'aione_slider_images',
					'label'        => 'Images',
					'name'         => 'aione_slider_images',
					'parent'       => 'acf_aione_gallery',
					'type' => 'gallery',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				) );
			}
		}	
	} else {
		add_action( 'admin_notices', 'aione_gallery_admin_notice' );
	}
	
}

function aione_acf_admin_notice() {
	?>
	<div class="notice error my-acf-notice is-dismissible" >
		<p><?php _e( 'ACF Plugin is necessary for slider to work properly, install it now! <a href="https://wordpress.org/plugins/advanced-custom-fields/" target="_blank">Click Here!</a>', 'aione' ); ?></p>
	</div>
	<?php
}
function aione_gallery_admin_notice() {
	?>
	<div class="notice error my-acf-notice is-dismissible" >
		<p><?php _e( 'ACF Gallery AddOn is necessary for slider to work properly, install it now! <a href="https://wordpress.org/plugins/advanced-custom-fields/" target="_blank">Click Here!</a>', 'aione' ); ?></p>
	</div>
	<?php
}


/**
* Aione Slider Widget
* 
*/
/* create_function is deprecated in php 7.2 */
//add_action('widgets_init', create_function('', "register_widget('Aione_Slider_Widget');"));
add_action('widgets_init', function() {
	register_widget('Aione_Slider_Widget');
}
);
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

/**********************
*
* Aione Social Icons Widget
* 
***********************/

add_action('widgets_init', function() {
	register_widget('Aione_Social_Icons_Widget');
}
);

class Aione_Social_Icons_Widget extends WP_Widget {

	public function __construct() {

		$widget_options = array( 
			'classname' => 'aione-social-icons-widget',
			'description' => 'Displays a list of social media website icons and a link to your profile.',
		);

		parent::__construct( 'aione_social_icons_widget', 'Aione Social Icons', $widget_options );

		global $asiw_social_accounts;

		$asiw_social_accounts = array(
			'Facebook'	=>	'facebook',
			'Twitter'	=>	'twitter',
			'YouTube'	=>	'youtube',
			'Google+'	=>	'googleplus',
			'LinkedIn'	=>	'linkedin',
			'Instagram'	=>	'instagram',
			// 'Email'		=>	'email',
			'Flickr'	=>	'flickr',
			'GitHub'	=>	'github',
			'Pinterest'	=>	'pinterest',
			'RSS Feed'	=>	'rss',
			'Tumblr'	=>	'tumblr',
			'Vimeo'		=>	'vimeo',
			'WordPress'	=>	'wordpress',
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
		$asiw_icon_theme = $instance['icon_theme'];
		$asiw_icon_style = $instance['icon_style'];
		$asiw_icon_direction = $instance['icon_direction'];
		$asiw_labels = $instance['labels'];
		
		echo $before_widget;
		
		echo $before_title;
		echo $asiw_title;
		echo $after_title;

		$classes = array();
		$classes[] = 'aione-social-icons';
		if($asiw_labels == 'show') { $classes[] = 'labels'; }
		if($asiw_icon_direction == 'vertical') { $classes[] = 'vertical'; }
		$classes[] = $asiw_icon_size;
		$classes[] = $asiw_icon_theme;
		$classes[] = $asiw_icon_style;

		$classes = implode(" ",$classes);


		echo apply_filters('social_icon_opening_tag', '<ul class="'.$classes.'">'); 

		foreach($asiw_social_accounts as $label => $id) : 
			if($instance[$id] != '' && $instance[$id] != 'http://') :
				global $asiw_data;
				global $asiw_icon_output;
				
				$asiw_data['id'] = $id;
				$asiw_data['url'] = $instance[$id];
				$asiw_data['title'] = $label;
				
				if($asiw_labels != 'show') { $asiw_data['label'] = ''; }
				else { $asiw_data['label'] = $label; }

				$format = '<li class="%1$s"><a href="%2$s" target="_blank" rel="noopener" title="%3$s"><span class="icon"></span><span class="label">%4$s</span></a></li>';

				$asiw_icon_output = apply_filters('social_icon_output', $format);
				echo vsprintf($asiw_icon_output, $asiw_data);
			endif; 
		endforeach; 
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
	if(!isset($instance['icon_theme'])) { $instance['icon_theme'] = 'dark'; }
	if(!isset($instance['icon_style'])) { $instance['icon_style'] = 'square'; }
	if(!isset($instance['icon_direction'])) { $instance['icon_direction'] = 'horizontal'; }
	if(!isset($instance['labels'])) { $instance['labels'] = ''; }
	?>

	<div class="aione_social_icons_widget">

		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" /></p>

			<?php
			$asiw_sizes = array(
				'none' => 'none',
				'Small' => 'small',
				'Medium' => 'medium',
				'Large' => 'large',
				'Extra Large' => 'xlarge',
			);
			$asiw_theme = array(
				'Colored' => 'colored',
				'Dark' => 'dark',
				'Dark Solid' => 'dark-solid',
				'Dark Outline' => 'dark-outline',
				'Light' => 'light',
				'Light Solid' => 'light-solid',
				'Light Outline' => 'light-outline',
			);
			$asiw_style = array(
				'Square' => 'square',
				'Rounded' => 'rounded',
				'Circle' => 'circle',
			);
			$asiw_direction = array(
				'Horizontal' => 'horizontal',
				'Vertical' => 'vertical',
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

			<p class="icon_options"><label for="<?php echo $this->get_field_id('icon_theme'); ?>">Icon Theme:</label>
				<select id="<?php echo $this->get_field_id('icon_theme'); ?>" name="<?php echo $this->get_field_name('icon_theme'); ?>">
					<?php
					foreach($asiw_theme as $option => $value) :

						if(esc_attr($instance['icon_theme'] == $value)) { $selected = ' selected="selected"'; }
						else { $selected = ''; }
						?>

						<option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $option; ?></option>

					<?php endforeach; ?>
				</select>
			</p>

			<p class="icon_options"><label for="<?php echo $this->get_field_id('icon_style'); ?>">Icon Style:</label>
				<select id="<?php echo $this->get_field_id('icon_style'); ?>" name="<?php echo $this->get_field_name('icon_style'); ?>">
					<?php
					foreach($asiw_style as $option => $value) :

						if(esc_attr($instance['icon_style'] == $value)) { $selected = ' selected="selected"'; }
						else { $selected = ''; }
						?>

						<option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $option; ?></option>

					<?php endforeach; ?>
				</select>
			</p>

			<p class="icon_options"><label for="<?php echo $this->get_field_id('icon_direction'); ?>">Icon Direction:</label>
				<select id="<?php echo $this->get_field_id('icon_direction'); ?>" name="<?php echo $this->get_field_name('icon_direction'); ?>">
					<?php
					foreach($asiw_direction as $option => $value) :

						if(esc_attr($instance['icon_direction'] == $value)) { $selected = ' selected="selected"'; }
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
			$instance['icon_theme'] = $new_instance['icon_theme'];
			$instance['icon_style'] = $new_instance['icon_style'];
			$instance['icon_direction'] = $new_instance['icon_direction'];
			$instance['labels'] = $new_instance['labels'];

			return $instance;
		}
	}


/**********************
*
* Aione Social Share Widget
* 
***********************/

add_action( 'widgets_init' , function() {
	register_widget( 'Aione_Social_Share_Widget' );
}
);

class Aione_Social_Share_Widget extends WP_Widget {

	public function __construct() {

		$widget_options = array( 
			'classname'	=>	'aione_social_share_widget',
			'description'	=>	'Social Share Buttons',
		);

		parent::__construct( 'aione_social_share_widget', 'Aione Social Share', $widget_options );

		global $aione_social_share_accounts;

		$aione_social_share_accounts = array(
			'Facebook' 		=> 'facebook',
			'Flickr' 		=> 'flickr',
			'Google Plus' 	=> 'googleplus',
			'LinkedIn' 		=> 'linkedin',
			'pinterest' 	=> 'pinterest',
			'RSS' 			=> 'rss',
			'tumblr' 		=> 'tumblr',
			'twitter' 		=> 'twitter',
			'vimeo' 		=> 'vimeo',
			'wordpress' 	=> 'wordpress',
			'youtube' 		=> 'youtube',
			// 'Blogger' 		=> 'blogger',
			// 'Delicious' 	=> 'delicious',
			// 'Google +' 		=> 'plus',
			'whatsapp' 		=> 'whatsapp',
		);

	}
	
	public function widget( $args, $instance ) {

		extract($args);

		global $aione_social_share_accounts;

		$share_title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		$share_icon_size = $instance['icon_size'];
		$share_icon_theme = $instance['icon_theme'];
		$share_icon_style = $instance['icon_style'];
		$share_icon_direction = $instance['icon_direction'];
		$share_labels = $instance['labels'];
		
		echo $before_widget;
		
		echo $before_title;
		echo $share_title;
		echo $after_title;
		
		$title = get_the_title();
		$url = get_permalink();
		?>
		<script>
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

		$classes = array();
		$classes[] = 'aione-social-icons';
		// $classes[] = 'labels';
		if($share_labels == 'show') { $classes[] = 'labels'; }
		if($share_icon_direction == 'vertical') { $classes[] = 'vertical'; }
		$classes[] = $share_icon_size;
		$classes[] = $share_icon_theme;
		$classes[] = $share_icon_style;
		
		$classes = implode(" ",$classes);

		echo apply_filters('social_icon_opening_tag', '<ul class="'.$classes.'">');

		foreach ($aione_social_share_accounts as $site => $id) {
			if($instance[$id] == 'enable'){

				echo '<li class="share '.$id.' s_'.$id.'"><a title="'.$site.'"><span class="icon"></span><span class="label">'.$site.'</span></a></li>';
			}
		}
		
		echo apply_filters('social_icon_closing_tag', '</ul>'); 
		echo $after_widget;
		
	}


	public function form( $instance ) { 

		global $aione_social_share_accounts;

		foreach ($aione_social_share_accounts as $site => $id) {
			if(!isset($instance[$id])) { $instance[$id] = ''; }
		}

		if(!isset($instance['title'])) { $instance['title'] = ''; }
		if(!isset($instance['icon_size'])) { $instance['icon_size'] = 'lg'; }
		if(!isset($instance['icon_theme'])) { $instance['icon_theme'] = 'dark'; }
		if(!isset($instance['icon_style'])) { $instance['icon_style'] = 'square'; }
		if(!isset($instance['icon_direction'])) { $instance['icon_direction'] = 'horizontal'; }
		if(!isset($instance['labels'])) { $instance['labels'] = ''; }
		?>

		<div class="aione_social_share_widget">

			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" /></p>

				<?php
				$share_sizes = array(
					'none' => 'none',
					'Small' => 'small',
					'Medium' => 'medium',
					'Large' => 'large',
					'Extra Large' => 'xlarge',
				);
				$share_theme = array(
					'Colored' => 'colored',
					'Dark' => 'dark',
					'Dark Solid' => 'dark-solid',
					'Dark Outline' => 'dark-outline',
					'Light' => 'light',
					'Light Solid' => 'light-solid',
					'Light Outline' => 'light-outline',
				);
				$share_style = array(
					'Square' => 'square',
					'Rounded' => 'rounded',
					'Circle' => 'circle',
				);
				$share_direction = array(
					'Horizontal' => 'horizontal',
					'Vertical' => 'vertical',
				);
				?>

				<p class="icon_options"><label for="<?php echo $this->get_field_id('icon_size'); ?>">Icon Size:</label>
					<select id="<?php echo $this->get_field_id('icon_size'); ?>" name="<?php echo $this->get_field_name('icon_size'); ?>">
						<?php
						foreach($share_sizes as $option => $value) :

							if(esc_attr($instance['icon_size'] == $value)) { $selected = ' selected="selected"'; }
							else { $selected = ''; }
							?>
							
							<option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $option; ?></option>
							
						<?php endforeach; ?>
					</select>
				</p>

				<p class="icon_options"><label for="<?php echo $this->get_field_id('icon_theme'); ?>">Icon Theme:</label>
					<select id="<?php echo $this->get_field_id('icon_theme'); ?>" name="<?php echo $this->get_field_name('icon_theme'); ?>">
						<?php
						foreach($share_theme as $option => $value) :

							if(esc_attr($instance['icon_theme'] == $value)) { $selected = ' selected="selected"'; }
							else { $selected = ''; }
							?>

							<option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $option; ?></option>

						<?php endforeach; ?>
					</select>
				</p>

				<p class="icon_options"><label for="<?php echo $this->get_field_id('icon_style'); ?>">Icon Style:</label>
					<select id="<?php echo $this->get_field_id('icon_style'); ?>" name="<?php echo $this->get_field_name('icon_style'); ?>">
						<?php
						foreach($share_style as $option => $value) :

							if(esc_attr($instance['icon_style'] == $value)) { $selected = ' selected="selected"'; }
							else { $selected = ''; }
							?>

							<option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $option; ?></option>

						<?php endforeach; ?>
					</select>
				</p>

				<p class="icon_options"><label for="<?php echo $this->get_field_id('icon_direction'); ?>">Icon Direction:</label>
					<select id="<?php echo $this->get_field_id('icon_direction'); ?>" name="<?php echo $this->get_field_name('icon_direction'); ?>">
						<?php
						foreach($share_direction as $option => $value) :

							if(esc_attr($instance['icon_direction'] == $value)) { $selected = ' selected="selected"'; }
							else { $selected = ''; }
							?>

							<option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $option; ?></option>

						<?php endforeach; ?>
					</select>
				</p>

				<?php if(esc_attr($instance['labels'] == 'show')) { $checked = ' checked="checked"'; } else { $checked = ''; } ?>
				<p class="label_options">
					<input type="checkbox" id="<?php echo $this->get_field_id('labels'); ?>" name="<?php echo $this->get_field_name('labels'); ?>" value="show"<?php echo $checked; ?> /> 
					<label for="<?php echo $this->get_field_id('labels'); ?>">Show Labels</label>
				</p>

				<?php foreach ($aione_social_share_accounts as $site => $id) : ?>
					<?php if(esc_attr($instance[$id] == 'enable')) { $checked = ' checked="checked"'; } else { $checked = ''; } ?>
					<p class="label_options">
						<input type="checkbox" id="<?php echo $this->get_field_id($id); ?>" name="<?php echo $this->get_field_name($id); ?>" value="enable"<?php echo $checked; ?> />
						<label for="<?php echo $this->get_field_id($id); ?>"><?php echo $site; ?> Share</label>
					</p>
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
			$instance['icon_size'] = $new_instance['icon_size'];
			$instance['icon_theme'] = $new_instance['icon_theme'];
			$instance['icon_style'] = $new_instance['icon_style'];
			$instance['icon_direction'] = $new_instance['icon_direction'];
			$instance['labels'] = $new_instance['labels'];

			return $instance;
		}
	}
	function get_aione_page_option($post_id , $meta_key){
		$meta_value = get_post_meta( $post_id, $meta_key , true );
		return $meta_value;
	}

	function is_fullwidth($id,$component){
		global $theme_options;
		global $post;
		$fullwidth = false;

		$page_option = get_aione_page_option($id,'pyre_'.$component.'_100_width');


		if($page_option == 'default' || empty(@$page_option)){
			if($theme_options[$component.'_100_width']){
				$fullwidth = true;
			}
		} else{
			if($page_option == 'yes'){
				$fullwidth = true;
			}
		}


		if($fullwidth){
			$fullwidth_class = "fullwidth";
		} else {
			$fullwidth_class = "";
		}

		return $fullwidth_class;
	}

	function get_page_id(){
		$blog = false;
		global $post;
		if ( is_front_page() && is_home() ) {
			$blog = false;
		} elseif ( is_front_page() ) {
			$blog = false;
		} elseif ( is_home() ) {
			$blog = true; 
		} else {
			$blog = false;
		}

		if($blog == true){
    	return get_option( 'page_for_posts' ); // Returns blog page ID
    } else {
    	return $post->ID;
    }
}

function is_enabled( $id, $component ){
	global $theme_options;
	$is_enabled = false;

	$page_option = get_aione_page_option($id, 'pyre_'.$component);

	/*echo "<br>ID ==".$post->ID;
	echo "<br>ID ==".$id;
	echo "<br>component ==".$component;
	echo "<br>PAGE OPTIONS ==".$page_option;
	echo "<br>THEME OPTIONS ==".$theme_options[$component];*/

	if( $page_option == 'default' || empty(@$page_option) ){
		if( $theme_options[$component] ){
			$is_enabled = true;
		}
	} else{
		if( $page_option == 'yes' ){
			$is_enabled = true;
		}
	}
	
	return $is_enabled;
}

function empty_sidebar_message(){
	$output = '';
	$output .= '<h3>Empty Widget Area</h3>';

	return $output;
};

/**
* Shortcode [icon]
* 
*/
/*add_shortcode( 'aione-icon', 'aione_icon_shortcode' );
function aione_icon_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'class' => '',
	), $atts, 'aione-icon' );

	$output = '';
	$aione_icon = $atts['class'];

	if($aione_icon){
		$output = '<i class="'.$aione_icon.'"></i>';
	}
	return $output;
}*/

/*add_shortcode( 'date', 'aione_date_shortcode' );
function aione_date_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'format' => 'jS F Y',
	), $atts, 'aione-date' );

	$output = '';
	$output = date($atts['format']);
	return $output;
}*/

//https://developer.wordpress.org/reference/functions/get_bloginfo/
/*add_shortcode( 'info', 'aione_info_shortcode' );
function aione_info_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'show' => 'name',
	), $atts, 'aione-date' );

	$output = '';
	$output = get_bloginfo( $atts['show'], $filter );
	return $output;
}*/

/*
*
*
*/
if(!class_exists('Aione_Admin')){
	add_action( 'admin_notices', 'aione_admin_notice' );
}
function aione_admin_notice() {
	?>
	<div class="notice error aione-admin-notice is-dismissible" >
		<p><?php _e( 'For complete design setting "Aione Admin" plugin is necessary, install it now! 
		', 'aione' ); ?></p>
	</div>
	<?php
}


function clean_class($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   $string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
   $string = trim($string, '-'); // Remove first or last -
   $string = strtolower($string); // lowercase

   return $string;
}


function aione_data_table($headers, $data, $id='aione-',$class = 'compact'){  
	$columns = array();
	foreach ($headers as $key => $header){
		$columns[] = clean_class($header);
	}

	$output = "";
	$output .= '<div class="aione-search aione-table" >';
	$output .= '<div class="field">';
	$output .= '<input autofocus type="text" class="aione-search-input" data-search="'.implode(' ',$columns).'" placeholder="Search">';
	$output .= '</div>';
	$output .= '<div class="clear"></div>';
	$output .= '<table class="'.$class.'">';
	$output .= '<thead>';
	$output .= '<tr>';
	foreach ($headers as $key => $header){
		$output .= '<th class="aione-sort-button" data-sort="'.$columns[$key].'">'.$header.'</th>';
	}
	$output .= '</tr>';
	$output .= '</thead>';
	$output .= '<tbody class="aione-search-list">';
	if(!empty($data)){
		foreach ($data as $record_key => $record){
			$output .= '<tr>';
			foreach ($record as $key => $value){
				$output .= '<td class="'.$columns[$key].'">'.$value.'</td>';
			}
			$output .= '</tr>';
		}
	}
	$output .= '</tbody>';
	$output .= '</table>';
	$output .= '</div>';
	return $output;
}

/* 
To delete the created blocks 
Remove it after use
*/
/*add_action('init', 'g7g_modify_wp_block', 1111);
function g7g_modify_wp_block() {
	
	global $wp_post_types;
	
	$cpt = 'wp_block';
	
	if (empty($wp_post_types[$cpt]) || !is_object($wp_post_types[$cpt]) || empty($wp_post_types[$cpt]->labels)) return;
	
	$wp_post_types[$cpt]->show_ui      = true;
	$wp_post_types[$cpt]->show_in_menu = true;
	$wp_post_types[$cpt]->_edit_link   = 'post.php?post=%d';
	
}*/


function is_enabled_sidebar( $sidebar_position ){

	global $theme_options;
	global $post;

	// get Post Type e.g.'movie'
	$post_type = @get_post_type($post->ID);

	// Fetch 'compponents' from options
	$aione_components = @get_option('aione-components');

	// Filter perticular 'component' from 'components'
	$aione_component = @$aione_components[$post_type];


	// get 'templete' slug for Single/Page
	$template_slug_single = @$aione_component['single_template'];

	// get 'templete' slug for Blog/Archive
	$template_slug_archive = @$aione_component['archive_template'];


	// Fetch 'templates' from options
	$aione_templates = @get_option('aione-templates');

	// get 'templete' for Single/Page
	$aione_template_single =  @$aione_templates[$template_slug_single];
	// get 'templete' for Blog/Archive
	$aione_template_archive =  @$aione_templates[$template_slug_archive];

	// sidebar single
	$is_enabled_single = @$aione_template_single['template_sidebar_'.$sidebar_position.'_enable'];

	// sidebar  archive
	$is_enabled_archive = @$aione_template_archive['template_sidebar_'.$sidebar_position.'_enable'];

	// Global Options
	$is_enabled = $theme_options['sidebar_'.$sidebar_position.'_enable'];

	if ( is_archive() ) { 
		if( isset( $template_slug_archive ) ) { 
			if( $is_enabled_archive == 'no' ) {
				$is_enabled = 0;
			}
			if( $is_enabled_archive == 'yes' ) {
				$is_enabled = 1;
			}
		}
	}
	if( is_single() ) { 

		//Template Options Enable
		if( isset( $template_slug_single ) ) {
			if( $is_enabled_single == 'no' ) {
				$is_enabled = 0;
			}
			if( $is_enabled_single == 'yes' ) {
				$is_enabled = 1;
			}
		}

		//Per page Options Enable
		$is_enabled_custom = get_aione_page_option( get_page_id(), 'pyre_sidebar_'.$sidebar_position.'_enable' );
		if( $is_enabled_custom == 'no' ) {
			$is_enabled = 0;
		}
		if( $is_enabled_custom == 'yes' ) {
			$is_enabled = 1;
		}
	}
	if( is_page() ) {
		$is_enabled = is_enabled( get_page_id(), 'sidebar_'.$sidebar_position.'_enable');
	}

	return $is_enabled;

}

function aione_get_sidebar( $sidebar_position ){

	global $post;

	// get Post Type e.g.'movie'
	$post_type = @get_post_type($post->ID);

	// Fetch 'compponents' from options
	$aione_components = @get_option('aione-components');

	// Filter perticular 'component' from 'components'
	$aione_component = @$aione_components[$post_type];


	// get 'templete' slug for Single/Page
	$template_slug_single = @$aione_component['single_template'];

	// get 'templete' slug for Blog/Archive
	$template_slug_archive = @$aione_component['archive_template'];


	// Fetch 'templates' from options
	$aione_templates = @get_option('aione-templates');

	// get 'templete' for Single/Page
	$aione_template_single =  @$aione_templates[$template_slug_single];
	// get 'templete' for Blog/Archive
	$aione_template_archive =  @$aione_templates[$template_slug_archive];

	// sidebar single
	$sidebar_single = @$aione_template_single['template_sidebar_'.$sidebar_position];

	// sidebar  archive
	$sidebar_archive = @$aione_template_archive['template_sidebar_'.$sidebar_position];

	// Global Options
	$sidebar = 'aione-sidebar-'.$sidebar_position;


	if ( is_archive() ) { 

		//Template Options Left Sidebar
		if( !empty( $sidebar_archive ) && $sidebar_archive != 'default' ){
			$sidebar = $sidebar_archive;
		}
	} 

	if( is_single() ) { 

		//Template Options Left Sidebar
		if( !empty( $sidebar_single ) && $sidebar_single != 'default' ){
			$sidebar = $sidebar_single;
		}

		//Per page Options Left Sidebar
		$sidebar_custom = get_aione_page_option( get_page_id(), 'pyre_sidebar_'.$sidebar_position );
		if( !empty( $sidebar_custom ) && $sidebar_custom != 'default') {
			$sidebar = $sidebar_custom;
		}
	}

	if( is_attachment() ) { 

		//Template Options Left Sidebar
		if( !empty( $sidebar_single ) && $sidebar_single != 'default' ){
			$sidebar = $sidebar_single;
		}

		//Per page Options Left Sidebar
		$sidebar_custom = get_aione_page_option( get_page_id(), 'pyre_sidebar_'.$sidebar_position );
		if( !empty( $sidebar_custom ) && $sidebar_custom != 'default') {
			$sidebar = $sidebar_custom;
		}
	}

	if( is_page() ) {
		$sidebar_custom = get_aione_page_option( get_page_id(), 'pyre_sidebar_'.$sidebar_position );
		if( !empty( $sidebar_custom ) && $sidebar_custom != 'default') {
			$sidebar = $sidebar_custom;
		}
	}

	return $sidebar;
}

function aione_pagination($wp_query = null) {
	if($wp_query == null){
		global $wp_query;
	}
	$big = 999999999; // need an unlikely integer
	$current_page = get_query_var('paged');
	$total_pages = $wp_query->max_num_pages;

	if( $total_pages == 1 ){
		return '';
	}

	$args = array(
		'base' 				=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'			=> '?paged=%#%',
		'total'				=> $total_pages,
		'current'			=> max( 1, $current_page ),
		'show_all'			=> false,
		'end_size'			=> 2,
		'mid_size'			=> 2,
		'prev_next'			=> false,
		'prev_text'			=> '<i class="ion-ios-arrow-back"></i>',
		'next_text'			=> '<i class="ion-ios-arrow-forward"></i>',
		'type'				=> 'array',
		'add_args'			=> false,
		'add_fragment'		=> '',
		'before_page_number'=> '',
		'after_page_number'	=> ''
	);

	$pages =  paginate_links( $args ); 

	$output = '';

	$output .= '<ul class="pagination">';

	if( $current_page == 1 || $current_page == 0 ){
		$output .= '<li class="page first disabled"><span><i class="ion-ios-arrow-back"></i><i class="ion-ios-arrow-back"></i></span></li>';
		$output .= '<li class="page prev disabled"><span><i class="ion-ios-arrow-back"></i></span></li>';
	} else {
		$prev_page = $current_page - 1;
		$output .= '<li class="page first"><a href="'.esc_url( get_pagenum_link( 1 ) ).'"><span><i class="ion-ios-arrow-back"></i><i class="ion-ios-arrow-back"></i></span></a></li>';
		$output .= '<li class="page prev"><a href="'.esc_url( get_pagenum_link( $prev_page ) ).'"><span><i class="ion-ios-arrow-back"></i></span></a></li>';
	}

	if( is_array( $pages ) ){
		foreach ($pages as $key => $page) {

			$classes = array();
			$classes[] = 'page';

			$page_number = strip_tags($page);

			if( $current_page > 0 && $current_page == $page_number ){
				$classes[] = 'active';
			}
			if( $current_page == 0 && 1 == $page_number ){
				$classes[] = 'active';
			}
			$classes = implode(' ', $classes);
			$output .= '<li class="'.$classes.'">'.$page.'</li>';
		}
	}

	if( $current_page == $total_pages ){
		$output .= '<li class="page next disabled"><span><i class="ion-ios-arrow-forward"></i></span></li>';
		$output .= '<li class="page last disabled"><span><i class="ion-ios-arrow-forward"></i><i class="ion-ios-arrow-forward"></i></span></li>';
	} else {
		$next_page = $current_page + 1;
		$output .= '<li class="page next"><a href="'.esc_url( get_pagenum_link( $next_page ) ).'"><span><i class="ion-ios-arrow-forward"></i></span></a></li>';
		$output .= '<li class="page last"><a href="'.esc_url( get_pagenum_link( $total_pages ) ).'"><span><i class="ion-ios-arrow-forward"></i><i class="ion-ios-arrow-forward"></i></span></a></li>';
	}
	
	$output .= '</ul>';

	return $output;
}

