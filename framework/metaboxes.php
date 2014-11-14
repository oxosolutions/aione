<?php
class PyreThemeFrameworkMetaboxes {

	public function __construct()
	{
		global $theme_options;
		$this->data = $theme_options;

		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}

	// Load backend scripts
	function admin_script_loader() {
		global $pagenow;
		if (is_admin() && ($pagenow=='post-new.php' || $pagenow=='post.php')) {
			$theme_info = wp_get_theme();

			wp_enqueue_script('jquery.biscuit', get_template_directory_uri().'/js/jquery.biscuit.js', array('jquery'), $theme_info->get( 'Version' ));
			wp_register_script('aione_upload', get_template_directory_uri().'/js/upload.js', array('jquery'), $theme_info->get( 'Version' ));
			wp_enqueue_script('aione_upload');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
	   		wp_enqueue_style('thickbox');
		}
	}

	public function add_meta_boxes()
	{
		$post_types = get_post_types( array( 'public' => true ) );

		$disallowed = array( 'page', 'post', 'attachment', 'aione_portfolio', 'themeaione_elastic', 'product', 'wpsc-product', 'slide' );

		foreach ( $post_types as $post_type ) {
			if ( in_array( $post_type, $disallowed ) )
				continue;

			$this->add_meta_box('post_options', 'Aione Options', $post_type);
		}

		$this->add_meta_box('post_options', 'AIONE Options', 'post');

		$this->add_meta_box('page_options', 'AIONE Options', 'page');

		$this->add_meta_box('portfolio_options', 'AIONE Options', 'aione_portfolio');

		$this->add_meta_box('es_options', 'Elastic Slide Options', 'themeaione_elastic');

		$this->add_meta_box('woocommerce_options', 'AIONE Options', 'product');

		$this->add_meta_box('slide_options', 'Slide Options', 'slide');
	}

	public function add_meta_box($id, $label, $post_type)
	{
		add_meta_box(
			'pyre_' . $id,
			$label,
			array($this, $id),
			$post_type
		);
	}

	public function save_meta_boxes($post_id)
	{
		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		foreach($_POST as $key => $value) {
			if(strstr($key, 'pyre_')) {
				update_post_meta($post_id, $key, $value);
			}
		}
	}

	public function post_options()
	{
		$theme_options = $this->data;
		include 'views/metaboxes/post_options.php';
	}

	public function page_options()
	{
		include 'views/metaboxes/page_options.php';
	}

	public function portfolio_options()
	{
		include 'views/metaboxes/portfolio_options.php';
	}

	public function es_options()
	{
		include 'views/metaboxes/es_options.php';
	}

	public function woocommerce_options()
	{
		include 'views/metaboxes/style.php';
		include 'views/metaboxes/woocommerce_options.php';
	}

	public function slide_options()
	{
		include 'views/metaboxes/style.php';
		include 'views/metaboxes/slide_options.php';
	}

	public function text($id, $label, $desc = '')
	{
		global $post;

		$html = '';
		$html .= '<div class="pyre_metabox_field">';
			$html .= '<div class="pyre_desc">';
				$html .= '<label for="pyre_' . $id . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="pyre_field">';
				$html .= '<input type="text" id="pyre_' . $id . '" name="pyre_' . $id . '" value="' . get_post_meta($post->ID, 'pyre_' . $id, true) . '" />';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function select($id, $label, $options, $desc = '')
	{
		global $post;

		$html = '';
		$html .= '<div class="pyre_metabox_field">';
			$html .= '<div class="pyre_desc">';
				$html .= '<label for="pyre_' . $id . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="pyre_field">';
				$html .= '<div class="aione-shortcodes-arrow">&#xf107;</div>';
				$html .= '<select id="pyre_' . $id . '" name="pyre_' . $id . '">';
				foreach($options as $key => $option) {
					if(get_post_meta($post->ID, 'pyre_' . $id, true) == $key) {
						$selected = 'selected="selected"';
					} else {
						$selected = '';
					}

					$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
				}
				$html .= '</select>';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function multiple($id, $label, $options, $desc = '')
	{
		global $post;

		$html = '';
		$html .= '<div class="pyre_metabox_field">';
			$html .= '<div class="pyre_desc">';
				$html .= '<label for="pyre_' . $id . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="pyre_field">';
				$html .= '<select multiple="multiple" id="pyre_' . $id . '" name="pyre_' . $id . '[]">';
				foreach($options as $key => $option) {
					if(is_array(get_post_meta($post->ID, 'pyre_' . $id, true)) && in_array($key, get_post_meta($post->ID, 'pyre_' . $id, true))) {
						$selected = 'selected="selected"';
					} else {
						$selected = '';
					}

					$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
				}
				$html .= '</select>';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function textarea($id, $label, $desc = '', $default = '' )
	{
		global $post;

		$db_value = get_post_meta($post->ID, 'pyre_' . $id, true);

		if( metadata_exists( 'post', $post->ID, 'pyre_'. $id ) ) {
			$value = $db_value;
		} else {
			$value = $default;
		}

		$html = '';
		$html = '';
		$html .= '<div class="pyre_metabox_field">';
			$html .= '<div class="pyre_desc">';
				$html .= '<label for="pyre_' . $id . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="pyre_field">';
				$html .= '<textarea cols="120" rows="10" id="pyre_' . $id . '" name="pyre_' . $id . '">' . $value . '</textarea>';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function upload($id, $label, $desc = '')
	{
		global $post;

		$html = '';
		$html = '';
		$html .= '<div class="pyre_metabox_field">';
			$html .= '<div class="pyre_desc">';
				$html .= '<label for="pyre_' . $id . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="pyre_field">';
				$html .= '<div class="pyre_upload">';
					$html .= '<div><input name="pyre_' . $id . '" class="upload_field" id="pyre_' . $id . '" type="text" value="' . get_post_meta($post->ID, 'pyre_' . $id, true) . '" /></div>';
					$html .= '<div class="aione_upload_button_container"><input class="aione_upload_button" type="button" value="Browse" /></div>';
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

}

$metaboxes = new PyreThemeFrameworkMetaboxes;