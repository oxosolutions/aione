<?php
namespace AioneBlocks;

defined('ABSPATH') or die('Code is poetry !');


/**
 * Initialize all the needed classes
 *
 * @author Amritdeep
 * @version 1.0.0
 * @since 1.0.0
 */
class AioneBlocks {

	public function __construct(){
		$this->path = get_template_directory_uri().'/blocks/dist/';
		$this->realPath = get_template_directory().'/blocks/dist/';
	}

  	public function run() {
		//add_action( 'enqueue_block_assets', array( $this, 'blocks_assets' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'editor_assets' ) );
		add_filter( 'block_categories', array( $this, 'aione_block_category' ),10,2);
		
		add_action('wp_ajax_aione_map_block_save_key', array($this, 'save_key'));
        add_action('wp_ajax_nopriv_aione_map_block_save_key', array($this, 'save_key'));

		require_once get_template_directory(). '/blocks/block.php';
		
  	}
  	public function blocks_assets() {
		wp_enqueue_style(
			'aione-blocks-frontend',
			$this->path.'blocks.frontend.build.css',
			array( 'wp-blocks' ), // Dependency to include the CSS after it.
			filemtime( $this->realPath. 'blocks.frontend.build.css' ) // filemtime — Gets file modification time.
		);
		
	}
	public function editor_assets() {

		// Custom blocks
		wp_enqueue_script(
			'aione-blocks',
			$this->path.'blocks.build.js',
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' , 'wp-components' ),
			filemtime( $this->realPath. 'blocks.build.js' ) // filemtime — Gets file modification time.
		);

		$api_key = get_option('aione-map-block-key')?get_option('aione-map-block-key'):'AIzaSyAjyDspiPfzEfjRSS5fQzm-3jHFjHxeXB4';

		$aione_blocks = array(
	      'api_key' => $api_key
	    );

		wp_localize_script( 'aione-blocks', 'aione_blocks', $aione_blocks );

    	wp_enqueue_script('aione-blocks');

		// Styles.
		/*wp_enqueue_style(
			'aione-blocks-editor', // Handle.
			$this->path.'blocks.editor.build.css', // Block editor CSS.
			array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
			filemtime( $this->realPath. 'blocks.editor.build.css' ) // filemtime — Gets file modification time.
		);*/
	}

	function aione_block_category( $categories, $post ) {	
		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'aione-blocks',
					'title' => __( 'Aione Blocks', 'aione' ),
				),
			)
		);

	}

}

$AioneBlocks = new AioneBlocks();
$AioneBlocks->run();
?>