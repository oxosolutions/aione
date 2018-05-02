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
		add_action( 'admin_head', array( $this, 'admin_css' ) );
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

		}

	}
	/**
     * Add admin CSS
     */
    public function admin_css() {

        $theme_info = wp_get_theme();
        echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/assets/css/perpageoptions.css?vesion=' . $theme_info->get( 'Version' ) . '">';
        echo '<style type="text/css">.widget input { border-color: #DFDFDF !important; }</style>';

    }

	public function add_meta_boxes() {

		$post_types = get_post_types( array( 'public' => true ) );

		$disallowed = array( 'page', 'post', 'attachment', 'aione-slider' );

		foreach ( $post_types as $post_type ) {
			if ( in_array( $post_type, $disallowed ) ) {
				continue;
			}
			$this->add_meta_box('post_options', 'Aione Options', $post_type);
		}

		$this->add_meta_box( 'post_options', 'Page Options', 'post' );
		$this->add_meta_box( 'page_options', 'Page Options', 'page' );

	}

	public function add_meta_box( $id, $label, $post_type ) {
		add_meta_box( 'pyre_' . $id, $label, array( $this, $id ), $post_type );
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

	public function page_options() {
		$this->render_option_tabs( array( 'sliders', 'page', 'header', 'footer', 'sidebars', 'background', 'portfolio_page',
		'pagetitlebar','custom_code', 'seo', 'security' ) );
	}

	public function post_options() {
		$this->render_option_tabs( array( 'post', 'page', 'sliders', 'header', 'footer', 'sidebars', 'background',
		'pagetitlebar', 'custom_code', 'seo', 'security' ) );
	}

	public function render_option_tabs( $requested_tabs, $post_type = 'default' ) {

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

?>