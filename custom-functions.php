<?php

/**
 * Gutenbergtheme custom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gutenbergtheme
 */

class PerPageOptionsMetaboxes
{
	public function __construct()
	{
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
		add_action('edit_attachment', array($this, 'save_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}

    /**
     * Load backend scripts
     */
    public function admin_script_loader()
    {
    	global $pagenow;

    	if ( is_admin() && ( in_array( $pagenow, array( 'post-new.php', 'post.php' ) ) ) ) {

    		$theme_info = wp_get_theme();


    		wp_register_script('aione-admin-scripts', get_template_directory_uri() . '/assets/js/admin/admin-scripts.min.js', array('jquery'), $theme_info->get('Version'));
    		wp_register_script('ace-editor-js', 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.3.3/ace.js', array('jquery'), $theme_info->get('Version'));

    		wp_enqueue_script('aione-admin-scripts');
    		wp_enqueue_script('ace-editor-js');
    		wp_enqueue_script('media-upload');
    		wp_enqueue_script('thickbox');
    		wp_enqueue_style('thickbox');

    	}

    }

    public function add_meta_boxes()
    {

    	$post_types = get_post_types( array( 'public' => true) );

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
        $disallowed = array('aione-slider');
        foreach ( $post_types as $post_type ) {
        	if ( in_array( $post_type, $disallowed ) ) {
        		continue;
        	}
        	$this->add_meta_box('aione_design_options', 'Aione Design Options', $post_type);
        }

    }

    public function add_meta_box( $id, $label, $post_type )
    {
    	add_meta_box('pyre_' . $id, $label, array( $this, $id ), $post_type, 'advanced', 'default', array( 'post_type' => $post_type ) );
    }

    public function aione_design_options()
    {
    	$this->render_aione_design_options( array('header', 'slider', 'page_title_bar', 'page_settings', 'footer', 'custom_code', 'seo' ) );
    }

    public function render_aione_design_options( $requested_tabs, $post_type = 'default' )
    {

    	$tabs_names = array(
    		'header'          => __('Header', 'aione'),
    		'slider'          => __('Slider', 'aione'),
    		'page_title_bar'  => __('Page Title Bar', 'aione'),
    		'page_settings'   => __('Page Settings', 'aione'),
    		'footer'          => __('Footer', 'aione'),
    		'custom_code'     => __('Custom Code', 'aione'),
    		'seo'             => __('SEO', 'aione'),

    	);
    	?>

    	<ul class="pyre_metabox_tabs">

    		<?php foreach ( $requested_tabs as $key => $tab_name ): ?>
    			<?php $class = ( $key === 0 ) ? "active" : "";?>
    			<li class="<?php echo esc_html( $class ); ?>"><a href="<?php echo esc_html( $tab_name ); ?>">
    				<?php echo esc_html( $tabs_names[$tab_name] ); ?></a></li>

    			<?php endforeach;?>

    		</ul>

        <?php wp_nonce_field('pyre_metabox', '_pyre_metabox'); ?>
        
    		<div class="pyre_metabox">

    			<?php foreach ( $requested_tabs as $key => $tab_name ): ?>
    				<div class="pyre_metabox_tab" id="pyre_tab_<?php echo esc_html( $tab_name ); ?>">
    					<?php require_once 'tabs/tab_' . $tab_name . '.php';?>
    				</div>
    			<?php endforeach;?>

    		</div>
    		<div class="clear"></div>
    		<?php
    	}

    	public function save_meta_boxes( $post_id )
    	{

    		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    			return;
    		}

        if (!wp_verify_nonce( $_POST['_pyre_metabox'], 'pyre_metabox' )) { return ; }

        $setting_array = array();
    		foreach ( $_POST as $key => $value ) {
    			if ( strstr( $key, 'pyre_' ) ) {
            $setting_array[$key] = $value; 
    				//update_post_meta( $post_id, $key, $value );
    			}
    		}
        /*echo "<pre>";print_r($_POST);echo "</pre>";
        echo "<pre>";print_r($setting_array);echo "</pre>";*/
        update_post_meta( $post_id, 'aione_per_page_setting', $setting_array );
    	}

    	public function text( $id, $label, $desc = '' )
    	{

    		global $post;
    		?>

    		<div class="pyre_metabox_field">
    			<div class="pyre_desc">
    				<label for="pyre_<?php echo esc_html( $id ); ?>"><?php echo esc_html( $label ); ?></label>
                   <?php if ( $desc ): ?>
                      <p><?php echo $desc; ?></p>
                  <?php endif;?>
              </div>
              <div class="pyre_field">
              
               <input type="text" id="pyre_<?php echo esc_html( $id ); ?>" name="pyre_<?php echo esc_html( $id ); ?>" value="<?php echo esc_html( get_aione_page_settings( $post->ID, 'aione_per_page_setting','pyre_' . $id ) ); ?>" />
              
           </div>
       </div>
       <?php

   }

   public function select( $id, $label, $options, $desc = '' )
   {
     global $post;
     ?>

     <div class="pyre_metabox_field">
        <div class="pyre_desc">
           <label for="pyre_<?php echo esc_html( $id ); ?>"><?php echo esc_html( $label ); ?></label>
           <?php if ($desc): ?>
             <p><?php echo $desc; ?></p>
         <?php endif;?>
     </div>
     <div class="pyre_field">
      <div class="oxo-shortcodes-arrow">&#xf3d0;</div>
      <select id="pyre_<?php echo esc_html( $id ); ?>" name="pyre_<?php echo esc_html( $id ); ?>">
         <?php foreach ( $options as $key => $option ): ?>          
            <?php 
            //$selected = ( $key == get_post_meta( $post->ID, 'pyre_' . $id, true ) ) ? 'selected="selected"' : '';
            $selected = ( $key == get_aione_page_settings($post->ID, 'aione_per_page_setting','pyre_'.$id) ) ? 'selected="selected"' : '';

            ?>
            <option <?php echo esc_html( $selected ); ?> value="<?php echo esc_html( $key ); ?>"><?php echo esc_html( $option ); ?>
        </option>
    <?php endforeach;?>
</select>
</div>
</div>
<?php

}

public function multiple( $id, $label, $options, $desc = '' )
{
    global $post;
    ?>

    <div class="pyre_metabox_field">
       <div class="pyre_desc">
          <label for="pyre_<?php echo esc_html( $id ); ?>">
             <?php echo esc_html( $label ); ?></label>
             <?php if ( $desc ): ?>
                <p>
                   <?php echo $desc; ?>
               </p>
           <?php endif;?>
       </div>
       <div class="pyre_field">
         <select multiple="multiple" id="pyre_<?php echo esc_html( $id ); ?>" name="pyre_<?php echo esc_html( $id ); ?>[]">
            <?php foreach ($options as $key => $option): ?>
               <?php 
               //$selected = ( is_array( get_post_meta( $post->ID, 'pyre_' . $id, true ) ) && in_array( $key, get_post_meta( $post->ID, 'pyre_' . $id, true ) ) ) ? 'selected="selected"' : '';
               $selected = ( is_array( get_aione_page_settings($post->ID, 'aione_per_page_setting','pyre_'.$id) ) && in_array( $key, get_aione_page_settings($post->ID, 'aione_per_page_setting','pyre_'.$id) ) ) ? 'selected="selected"' : '';
               
               ?>
               <option <?php echo esc_html( $selected ); ?> value="<?php echo esc_html( $key ); ?>"><?php echo esc_html( $option ); ?>
           </option>
       <?php endforeach;?>
   </select>
</div>
</div>
<?php

}

public function ace_editor( $id, $label, $desc = '', $default = '' )
{
   global $post;
   //$db_value = get_post_meta( $post->ID, 'pyre_' . $id, true );
   $db_value = get_aione_page_settings($post->ID, 'aione_per_page_setting','pyre_'.$id);
   
   //$value = (metadata_exists( 'post', $post->ID, 'pyre_' . $id ) ) ? $db_value : $default;
   if($db_value == ''){
      $value = $default;
    } else {
      $value = $db_value;
    }
   ?>
   <div class="pyre_metabox_field">
      <div class="pyre_desc">
         <label for="pyre_<?php echo esc_html( $id ); ?>"><?php echo esc_html( $label ); ?></label>
         <?php if ( $desc ): ?>
           <p> <?php echo $desc; ?> </p>
       <?php endif;?>
   </div>
   <div class="pyre_field">
    <textarea style="display:none;" name="pyre_<?php echo esc_html( $id ); ?>"><?php echo esc_html( $value ); ?></textarea>
    <div id="pyre_<?php echo esc_html( $id ); ?>"></div>
</div>
</div>
<script>
 function cssEditor(){
    var csstempValue = jQuery('textarea[name="pyre_custom_css"]').val();
    var cssEditor = ace.edit("pyre_custom_css");
    cssEditor.setTheme("ace/theme/twilight");
    cssEditor.session.setMode("ace/mode/css");
    cssEditor.session.setValue(csstempValue);
    cssEditor.setOptions({
       autoScrollEditorIntoView: true,
       fontSize: "14px"
   });

    var cssinput = jQuery('textarea[name="pyre_custom_css"]');
    cssEditor.getSession().on("change", function () {
       cssinput.val(cssEditor.getSession().getValue());
   });
}
function jsEditor(){
    var jstempValue = jQuery('textarea[name="pyre_custom_js"]').val();
    var jsEditor = ace.edit("pyre_custom_js");
    jsEditor.setTheme("ace/theme/twilight");
    jsEditor.session.setMode("ace/mode/javascript");
    jsEditor.session.setValue(jstempValue);
    jsEditor.setOptions({
       autoScrollEditorIntoView: true
   });

    var jsinput = jQuery('textarea[name="pyre_custom_js"]');
    jsEditor.getSession().on("change", function () {
       jsinput.val(jsEditor.getSession().getValue());
   });
}
</script>
<?php
if ($id == "custom_css"):
 ?>
 <script> cssEditor();</script>
 <?php
endif;
if ($id == "custom_js"):
 ?>
 <script> jsEditor();</script>
 <?php
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

public function textarea( $id, $label, $desc = '', $default = '' )
{
   global $post;
   //$db_value = get_post_meta( $post->ID, 'pyre_' . $id, true );
   $db_value = get_aione_page_settings($post->ID, 'aione_per_page_setting','pyre_'.$id) ;
   //$value = ( metadata_exists( 'post', $post->ID, 'pyre_' . $id ) ) ? $db_value : $default;
    if($db_value == ''){
      $value = $default;
    } else {
      $value = $db_value;
    }
   $rows = 10;
   if ( $id == 'heading' || $id == 'caption' ) {
      $rows = 5;
  } else if ( 'page_title_custom_text' == $id || 'page_title_custom_subheader' == $id ) {
      $rows = 1;
  }
  ?>

  <div class="pyre_metabox_field">
      <div class="pyre_desc">
         <label for="pyre_<?php echo esc_html($id); ?>">
            <?php echo esc_html($label); ?></label>
            <?php if ($desc): ?>
               <p>
                  <?php echo $desc; ?>
              </p>
          <?php endif;?>
      </div>
      <div class="pyre_field">
        <textarea cols="120" rows="<?php echo esc_html($rows); ?>" id="pyre_<?php echo esc_html($id); ?>" name="pyre_<?php echo esc_html($id); ?>"><?php echo esc_html($value); ?></textarea>
    </div>
</div>
<?php

}

public function upload( $id, $label, $desc = '' )
{
  global $post;
  ?>

  <div class="pyre_metabox_field">
     <div class="pyre_desc">
        <label for="pyre_<?php echo esc_html( $id ); ?>">
           <?php echo esc_html( $label ); ?></label>
           <?php if ($desc): ?>
              <p>
                 <?php echo $desc; ?>
             </p>
         <?php endif;?>
     </div>
     <div class="pyre_field">
       <div class="pyre_upload">

          <?php 
          //$saved = get_post_meta( $post->ID, 'pyre_' . $id, true );
          $saved = get_aione_page_settings($post->ID, 'aione_per_page_setting','pyre_'.$id);
          ?>
          <input type="url" class="large-text" name="pyre_<?php echo esc_html($id); ?>" id="media_upload_btn" value="<?php echo esc_attr($saved); ?>"><br>

          <button type="button" class="button" id="media_upload_btn" data-media-uploader-target="#media_upload_btn">
             <?php esc_html_e('Upload Media', 'aione')?></button>
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

/*function aione_slider_docs_callback(){
$id = get_the_ID();
echo '[aione-slider id="'.esc_html($id).'"]';
}
 */

/**
 * Register Aione Slider Custom Field "Gallery"
 *
 */
/**
 * Enable ACF 5 early access
 * Requires at least version ACF 4.4.12 to work
 */
// define('ACF_EARLY_ACCESS', '5');

/*if(class_exists('acf')){
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

}*/

/*function aione_acf_admin_notice() {
?>
<div class="notice error my-acf-notice is-dismissible">
<p>
<?php _e( 'ACF Plugin is necessary for slider to work properly, install it now! <a href="https://wordpress.org/plugins/advanced-custom-fields/" target="_blank">Click Here!</a>', 'aione' ); ?>
</p>
</div>
<?php
}
function aione_gallery_admin_notice() {
?>
<div class="notice error my-acf-notice is-dismissible">
<p>
<?php _e( 'ACF Gallery AddOn is necessary for slider to work properly, install it now! <a href="https://wordpress.org/plugins/advanced-custom-fields/" target="_blank">Click Here!</a>', 'aione' ); ?>
</p>
</div>
<?php
}*/

/**
 * Aione Slider Widget
 *
 */
/* create_function is deprecated in php 7.2 */
//add_action('widgets_init', create_function('', "register_widget('Aione_Slider_Widget');"));
add_action('widgets_init', function () {
	register_widget('Aione_Slider_Widget');
});
class Aione_Slider_Widget extends WP_Widget
{

	public function __construct()
	{
		$widget_options = array(
			'classname'   => 'aione_slider_widget',
			'description' => 'List of Aione Sliders',
		);
		parent::__construct('aione_slider_widget', 'Aione slider', $widget_options);
	}
	public function widget($args, $instance)
	{
		$title = apply_filters('widget_title', $instance['title']);
        //echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];
		echo $args['before_widget'] . $args['before_title'] . $args['after_title'];

		do_shortcode('[aione-slider id="' . $instance['slider'] . '"]');

		echo $args['after_widget'];
	}
	public function form($instance)
	{
		$args = array(
			'post_type'       => 'aione-slider',
			'posts_per_page'  => -1,
			'post_status'     => 'publish',
		);

		$custom_posts = new WP_Query( $args );

		$title = !empty( $instance['title'] ) ? $instance['title'] : '';?>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id('title') ); ?>">Title:</label>
			<input type="text" id="<?php echo esc_html( $this->get_field_id('title') ); ?>" name="<?php echo esc_html( $this->get_field_name('title') ); ?>"
			value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id('slider') ); ?>">Select Slider:</label>
			<select id="<?php echo esc_html( $this->get_field_id('slider') ); ?>" name="<?php echo esc_html( $this->get_field_name('slider')); ?>">
				<?php
				if ( $custom_posts->have_posts() ) {
					foreach ( $custom_posts->posts as $slider ) {
						$selected_html = '';
						if ( $slider->post_name == $instance['slider'] ) {
							$selected_html = " selected='selected'";
						}
						echo "<option value='" . esc_html( $slider->ID ) . "' " . esc_html( $selected_html ) . ">" . esc_html( $slider->post_title ) . "</option>";

					}
				}
				?>
			</select>
		</p>
		<?php
	}
	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['slider'] = strip_tags($new_instance['slider']);
		return $instance;
	}
}

/**********************
 *
 * Aione Social Icons Widget
 *
 ***********************/

add_action('widgets_init', function () {
	register_widget('Aione_Social_Icons_Widget');
});

class Aione_Social_Icons_Widget extends WP_Widget
{

	public function __construct()
	{

		$widget_options = array(
			'classname'   => 'aione-social-icons-widget',
			'description' => 'Displays a list of social media website icons and a link to your profile.',
		);

		parent::__construct('aione_social_icons_widget', 'Aione Social Icons', $widget_options);

		global $asiw_social_accounts;

		$asiw_social_accounts = array(
			'Facebook'   => 'facebook',
			'Twitter'    => 'twitter',
			'YouTube'    => 'youtube',
			'Google+'    => 'googleplus',
			'LinkedIn'   => 'linkedin',
			'Instagram'  => 'instagram',
            'Email'     => 'email',
			'Flickr'     => 'flickr',
			'GitHub'     => 'github',
			'Pinterest'  => 'pinterest',
			'RSS Feed'   => 'rss',
			'Tumblr'     => 'tumblr',
			'Vimeo'      => 'vimeo',
			'WhatsApp'   => 'whatsapp',
            'Call'   => 'call',
		);

		if ( has_filter('aione_social_icon_accounts') ) {
			$asiw_social_accounts = apply_filters('aione_social_icon_accounts', $asiw_social_accounts);
		}
	}

	public function widget( $args, $instance )
	{
		global $asiw_social_accounts;
		extract( $args );

		$asiw_title           = empty($instance['title']) ? 'Follow Us' : apply_filters('widget_title', $instance['title']);
		$asiw_icon_size       = $instance['icon_size'];
		$asiw_icon_theme      = $instance['icon_theme'];
		$asiw_icon_style      = $instance['icon_style'];
		$asiw_icon_direction  = $instance['icon_direction'];
		$asiw_labels          = $instance['labels'];

		echo $before_widget;

		echo $before_title;
		echo $asiw_title;
		echo $after_title;

		$classes = array();

		$classes[] = 'aione-social-icons';
		
        if ( $asiw_labels == 'show' ) {
			$classes[] = 'labels';
		}
		if ( $asiw_icon_direction == 'vertical' ) {
			$classes[] = 'vertical';
		}

		$classes[] = $asiw_icon_size;
		$classes[] = $asiw_icon_theme;
		$classes[] = $asiw_icon_style;

		$classes = implode(" ", $classes);

		echo apply_filters( 'social_icon_opening_tag', '<ul class="' . $classes . '">' );

		foreach ( $asiw_social_accounts as $label => $id ):
			if ( $instance[$id] != '' && $instance[$id] != 'http://' ):
				global $asiw_data;
				global $asiw_icon_output;

				$asiw_data['id']    = $id;
				$asiw_data['url']   = $instance[$id];
				$asiw_data['title'] = $label;

				if ( $asiw_labels != 'show' ) {
					$asiw_data['label'] = '';
				} else {
					$asiw_data['label'] = $label;
				}

				$format = '<li class="%1$s"><a href="%2$s" target="_blank" rel="noopener" title="%3$s"><span class="icon"></span><span class="label">%4$s</span></a></li>';

				$asiw_icon_output = apply_filters( 'social_icon_output', $format );
				echo vsprintf( $asiw_icon_output, $asiw_data );
			endif;
		endforeach;
		echo apply_filters( 'social_icon_closing_tag', '</ul>' );
		echo $after_widget;
	}

	public function form( $instance )
	{
		global $asiw_social_accounts;

		foreach ( $asiw_social_accounts as $site => $id ) {
			if ( !isset( $instance[$id] ) ) {
				$instance[$id] = '';
			} elseif ( $instance[$id] == 'http://' ) {
				$instance[$id] = '';
			}
		}

		if ( !isset( $instance['title'] ) ) {
			$instance['title'] = '';
		}
		if ( !isset( $instance['icon_size'] ) ) {
			$instance['icon_size'] = 'lg';
		}
		if ( !isset( $instance['icon_theme'] ) ) {
			$instance['icon_theme'] = 'dark';
		}
		if ( !isset( $instance['icon_style'] ) ) {
			$instance['icon_style'] = 'square';
		}
		if ( !isset($instance['icon_direction'] ) ) {
			$instance['icon_direction'] = 'horizontal';
		}
		if ( !isset( $instance['labels'] ) ) {
			$instance['labels'] = '';
		}
		?>

		<div class="aione_social_icons_widget">

			<p><label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">Title:</label>
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>"
				value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>

				<?php
				$asiw_sizes = array(
					'none'         => 'none',
					'Small'        => 'small',
					'Medium'       => 'medium',
					'Large'        => 'large',
					'Extra Large'  => 'xlarge',
				);
				$asiw_theme = array(
					'Colored'       => 'colored',
					'Dark'          => 'dark',
					'Dark Solid'    => 'dark-solid',
					'Dark Outline'  => 'dark-outline',
					'Light'         => 'light',
					'Light Solid'   => 'light-solid',
					'Light Outline' => 'light-outline',
				);
				$asiw_style = array(
					'Square'  => 'square',
					'Rounded' => 'rounded',
					'Circle'  => 'circle',
				);
				$asiw_direction = array(
					'Horizontal' => 'horizontal',
					'Vertical'   => 'vertical',
				);
				?>

				<p class="icon_options"><label for="<?php echo esc_html( $this->get_field_id('icon_size') ); ?>">Icon Size:</label>
					<select id="<?php echo esc_html( $this->get_field_id('icon_size') ); ?>" name="<?php echo esc_html( $this->get_field_name('icon_size') ); ?>">
						<?php
						foreach ( $asiw_sizes as $option => $value ):

							if ( esc_attr( $instance['icon_size'] == $value ) ) {
								$selected = ' selected="selected"';
							} else {
								$selected = '';
							}
							?>

							<option value="<?php echo esc_html( $value ); ?>" <?php echo esc_attr( $selected ); ?>>
								<?php echo esc_html( $option ); ?>
							</option>

						<?php endforeach;?>
					</select>
				</p>

				<p class="icon_options"><label for="<?php echo esc_attr( $this->get_field_id('icon_theme') ); ?>">Icon Theme:</label>
					<select id="<?php echo esc_attr( $this->get_field_id('icon_theme') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_theme') ); ?>">
						<?php
						foreach ( $asiw_theme as $option => $value ):

							if ( esc_attr($instance['icon_theme'] == $value ) ) {
								$selected = ' selected="selected"';
							} else {
								$selected = '';
							}
							?>

							<option value="<?php echo esc_attr( $value ); ?>" <?php echo esc_attr( $selected ); ?>>
								<?php echo esc_html( $option ); ?>
							</option>

						<?php endforeach;?>
					</select>
				</p>

				<p class="icon_options"><label for="<?php echo esc_attr( $this->get_field_id('icon_style') ); ?>">Icon Style:</label>
					<select id="<?php echo esc_attr( $this->get_field_id('icon_style') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_style') ); ?>">
						<?php
						foreach ( $asiw_style as $option => $value ):

							if ( esc_attr( $instance['icon_style'] == $value ) ) {
								$selected = ' selected="selected"';
							} else {
								$selected = '';
							}
							?>

							<option value="<?php echo esc_attr( $value ); ?>" <?php echo esc_attr( $selected ); ?>>
								<?php echo esc_html( $option ); ?>
							</option>

						<?php endforeach;?>
					</select>
				</p>

				<p class="icon_options"><label for="<?php echo esc_attr( $this->get_field_id( 'icon_direction' ) ); ?>">Icon Direction:</label>
					<select id="<?php echo esc_attr( $this->get_field_id( 'icon_direction' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_direction' ) ); ?>">
						<?php
						foreach ( $asiw_direction as $option => $value ):

							if ( esc_attr($instance['icon_direction'] == $value ) ) {
								$selected = ' selected="selected"';
							} else {
								$selected = '';
							}
							?>

							<option value="<?php echo esc_attr( $value ); ?>" <?php echo esc_attr( $selected ); ?>>
								<?php echo esc_html( $option ); ?>
							</option>

						<?php endforeach;?>
					</select>
				</p>

				<?php if ( esc_attr( $instance['labels'] == 'show' ) ) {
					$checked = ' checked="checked"';
				} else {
					$checked = '';
				}?>
				<p class="label_options"><input type="checkbox" id="<?php echo esc_attr( $this->get_field_id('labels') ); ?>" name="<?php echo esc_attr( $this->get_field_name('labels') ); ?>"
					value="show" <?php echo esc_html( $checked ); ?> /> <label for="<?php echo esc_attr( $this->get_field_id('labels') ); ?>">Show Labels</label></p>

					<ul class="aione_social_accounts">
						<?php foreach ( $asiw_social_accounts as $site => $id ): ?>
							<li><label for="<?php echo esc_attr( $this->get_field_id( $id ) ); ?>" class="<?php echo esc_attr( $id ); ?>">
								<?php echo esc_attr( $site ); ?>:</label>
								<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( $id ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $id ) ); ?>"
								value="<?php echo esc_attr( $instance[$id] ); ?>" placeholder="http://" /></li>
							<?php endforeach;?>
						</ul>
					</div>
					<?php
				}

				public function update( $new_instance, $old_instance )
				{
					global $asiw_social_accounts;
					$instance = array();

					foreach ( $asiw_social_accounts as $site => $id ) {
						$instance[$id] = $new_instance[$id];
					}

					$instance['title']          = $new_instance['title'];
					$instance['icon_size']      = $new_instance['icon_size'];
					$instance['icon_theme']     = $new_instance['icon_theme'];
					$instance['icon_style']     = $new_instance['icon_style'];
					$instance['icon_direction'] = $new_instance['icon_direction'];
					$instance['labels']         = $new_instance['labels'];

					return $instance;
				}
			}

/**********************
 *
 * Aione Social Share Widget
 *
 ***********************/

add_action('widgets_init', function () {
	register_widget('Aione_Social_Share_Widget');
});

class Aione_Social_Share_Widget extends WP_Widget
{

	public function __construct()
	{

		$widget_options = array(
			'classname'   => 'aione_social_share_widget',
			'description' => 'Social Share Buttons',
		);

		parent::__construct('aione_social_share_widget', 'Aione Social Share', $widget_options);

		global $aione_social_share_accounts;

		$aione_social_share_accounts = array(
			'Facebook'    => 'facebook',
			'Flickr'      => 'flickr',
			'Google Plus' => 'googleplus',
			'LinkedIn'    => 'linkedin',
			'pinterest'   => 'pinterest',
			'RSS'         => 'rss',
			'tumblr'      => 'tumblr',
			'twitter'     => 'twitter',
			'vimeo'       => 'vimeo',
			'wordpress'   => 'wordpress',
			'youtube'     => 'youtube',
            // 'Blogger'         => 'blogger',
            // 'Delicious'     => 'delicious',
            // 'Google +'         => 'plus',
			'whatsapp'    => 'whatsapp',
		);

	}

	public function widget( $args, $instance )
	{

		extract($args);

		global $aione_social_share_accounts;

		$share_title          = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		$share_icon_size      = $instance['icon_size'];
		$share_icon_theme     = $instance['icon_theme'];
		$share_icon_style     = $instance['icon_style'];
		$share_icon_direction = $instance['icon_direction'];
		$share_labels         = $instance['labels'];

		echo $before_widget;

		echo $before_title;
		echo $share_title;
		echo $after_title;

		$title = get_the_title();
		$url  = get_permalink();
		?>
		<script>
			jQuery(document).ready(function(){
				jQuery('.share').ShareLink({
					title: <?php echo '"' . $title . '"'; ?>,
					url: <?php echo '"' . esc_url( $url ) . '"'; ?>
				});
				jQuery('.counter').ShareCounter({
					url: <?php echo '"' . esc_url( $url ) . '"'; ?>,
					increment: true
				});

			});
		</script>
		<?php

		$classes = array();
		$classes[] = 'aione-social-icons';
        // $classes[] = 'labels';
		if ( $share_labels == 'show' ) {
			$classes[] = 'labels';
		}
		if ( $share_icon_direction == 'vertical' ) {
			$classes[] = 'vertical';
		}
		$classes[] = $share_icon_size;
		$classes[] = $share_icon_theme;
		$classes[] = $share_icon_style;

		$classes = implode(" ", $classes);

		echo apply_filters('social_icon_opening_tag', '<ul class="' . $classes . '">');

		foreach ( $aione_social_share_accounts as $site => $id ) {
			if ( $instance[$id] == 'enable' ) {

				echo '<li class="share ' . esc_html( $id ) . ' s_' . esc_html( $id ) . '"><a title="' . esc_html( $site ) . '"><span class="icon"></span><span class="label">' . esc_html( $site ) . '</span></a></li>';
			}
		}

		echo apply_filters('social_icon_closing_tag', '</ul>');
		echo $after_widget;
	}

	public function form( $instance )
	{
		global $aione_social_share_accounts;

		foreach ( $aione_social_share_accounts as $site => $id ) {
			if ( !isset( $instance[$id] ) ) {
				$instance[$id] = '';
			}
		}

		if ( !isset( $instance['title'] ) ) {
			$instance['title'] = '';
		}
		if ( !isset( $instance['icon_size'] ) ) {
			$instance['icon_size'] = 'lg';
		}
		if ( !isset( $instance['icon_theme'] ) ) {
			$instance['icon_theme'] = 'dark';
		}
		if ( !isset($instance['icon_style'] ) ) {
			$instance['icon_style'] = 'square';
		}
		if ( !isset($instance['icon_direction'] ) ) {
			$instance['icon_direction'] = 'horizontal';
		}
		if ( !isset($instance['labels'] ) ) {
			$instance['labels'] = '';
		}
		?>

		<div class="aione_social_share_widget">

			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Title:</label>
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				value="<?php echo esc_attr( $instance['title'] ); ?>" /></p>

				<?php
				$share_sizes = array(
					'none'         => 'none',
					'Small'        => 'small',
					'Medium'       => 'medium',
					'Large'        => 'large',
					'Extra Large'  => 'xlarge',
				);
				$share_theme = array(
					'Colored'      => 'colored',
					'Dark'         => 'dark',
					'Dark Solid'   => 'dark-solid',
					'Dark Outline' => 'dark-outline',
					'Light'        => 'light',
					'Light Solid'  => 'light-solid',
					'Light Outline'=> 'light-outline',
				);
				$share_style = array(
					'Square'  => 'square',
					'Rounded' => 'rounded',
					'Circle'  => 'circle',
				);
				$share_direction = array(
					'Horizontal' => 'horizontal',
					'Vertical'   => 'vertical',
				);
				?>

				<p class="icon_options"><label for="<?php echo esc_attr( $this->get_field_id( 'icon_size' ) ); ?>">Icon Size:</label>
					<select id="<?php echo esc_attr( $this->get_field_id( 'icon_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_size' ) ); ?>">
						<?php
						foreach ( $share_sizes as $option => $value ):

							if ( esc_attr( $instance['icon_size'] == $value ) ) {
								$selected = ' selected="selected"';
							} else {
								$selected = '';
							}
							?>

							<option value="<?php echo esc_attr( $value ); ?>" <?php echo esc_attr( $selected ); ?>>
								<?php echo esc_html( $option ); ?>
							</option>

						<?php endforeach;?>
					</select>
				</p>

				<p class="icon_options"><label for="<?php echo esc_attr( $this->get_field_id( 'icon_theme' ) ); ?>">Icon Theme:</label>
					<select id="<?php echo esc_attr( $this->get_field_id( 'icon_theme' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_theme' ) ); ?>">
						<?php
						foreach ( $share_theme as $option => $value ):

							if ( esc_attr( $instance['icon_theme'] == $value ) ) {
								$selected = ' selected="selected"';
							} else {
								$selected = '';
							}
							?>

							<option value="<?php echo esc_html( $value ); ?>" <?php echo esc_attr( $selected ); ?>>
								<?php echo esc_html($option); ?>
							</option>

						<?php endforeach;?>
					</select>
				</p>

				<p class="icon_options"><label for="<?php echo esc_attr( $this->get_field_id('icon_style') ); ?>">Icon Style:</label>
					<select id="<?php echo esc_attr( $this->get_field_id('icon_style') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_style') ); ?>">
						<?php
						foreach ( $share_style as $option => $value ):

							if ( esc_attr( $instance['icon_style'] == $value ) ) {
								$selected = ' selected="selected"';
							} else {
								$selected = '';
							}
							?>

							<option value="<?php echo esc_html( $value ); ?>" <?php echo esc_attr( $selected ); ?>>
								<?php echo esc_html( $option ); ?>
							</option>

						<?php endforeach; ?>
					</select>
				</p>

				<p class="icon_options"><label for="<?php echo esc_attr( $this->get_field_id('icon_direction') ); ?>">Icon Direction:</label>
					<select id="<?php echo esc_attr( $this->get_field_id('icon_direction') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_direction' ) ); ?>">
						<?php
						foreach ($share_direction as $option => $value):

							if ( esc_attr($instance['icon_direction'] == $value ) ) {
								$selected = ' selected="selected"';
							} else {
								$selected = '';
							}
							?>

							<option value="<?php echo esc_attr( $value ); ?>" <?php echo esc_attr( $selected ); ?>>
								<?php echo esc_html( $option ); ?>
							</option>

						<?php endforeach; ?>
					</select>
				</p>

				<?php if ( esc_attr($instance['labels'] == 'show' ) ) {
					$checked = ' checked="checked"';
				} else {
					$checked = '';
				}?>
				<p class="label_options">
					<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'labels' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'labels' ) ); ?>"
					value="show" <?php echo esc_html( $checked ); ?> />
					<label for="<?php echo esc_attr( $this->get_field_id( 'labels' ) ); ?>">Show Labels</label>
				</p>

				<?php foreach ( $aione_social_share_accounts as $site => $id ): ?>
					<?php if ( esc_attr($instance[$id] == 'enable') ) {
						$checked = ' checked="checked"';
					} else {
						$checked = '';
					}?>
					<p class="label_options">
						<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( $id ) ); ?>" name="<?php echo esc_attr( $this->get_field_name($id) ); ?>"
						value="enable" <?php echo esc_html( $checked ); ?> />
						<label for="<?php echo esc_attr( $this->get_field_id( $id ) ); ?>">
							<?php echo esc_html( $site ); ?> Share</label>
						</p>
					<?php endforeach;?>

				</div>
				<?php
			}

			public function update( $new_instance, $old_instance )
			{

				global $aione_social_share_accounts;
				$instance = array();

				foreach ( $aione_social_share_accounts as $site => $id ) {
					$instance[$id] = $new_instance[$id];
				}

				$instance['title']          = $new_instance['title'];
				$instance['icon_size']      = $new_instance['icon_size'];
				$instance['icon_theme']     = $new_instance['icon_theme'];
				$instance['icon_style']     = $new_instance['icon_style'];
				$instance['icon_direction'] = $new_instance['icon_direction'];
				$instance['labels']         = $new_instance['labels'];

				return $instance;
			}
		}



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
if ( !class_exists('Aione_Admin') ) {
	add_action( 'admin_notices', 'aione_admin_notice' );
}
function aione_admin_notice()
{
	?>
	<div class="notice error aione-admin-notice is-dismissible">
		<p>
			<?php esc_html_e('For complete design setting "Aione Admin" plugin is necessary, install it now!
			', 'aione');?>
		</p>
	</div>
	<?php

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
