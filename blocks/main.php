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

	protected static $instance = null;

	public function __construct(){
		$this->direcpath = get_template_directory_uri().'/blocks/';
		$this->path = get_template_directory_uri().'/blocks/dist/';
		$this->realPath = get_template_directory().'/blocks/dist/';

	}

  	public function run() {
		//add_action( 'enqueue_block_assets', array( $this, 'blocks_assets' ) );
		//add_filter( 'block_categories', array( $this, 'aione_block_category' ),10,2);
        //add_action( 'wp_enqueue_scripts', array($this,'ub_tabbed_content_add_frontend_assets' ));

		add_action( 'enqueue_block_editor_assets', array( $this, 'editor_assets' ) );
		add_filter( 'block_categories_all', array( $this, 'aione_block_category' ),10,2);

		add_action('wp_ajax_aione_map_block_save_key', array($this, 'save_key'));
        add_action('wp_ajax_nopriv_aione_map_block_save_key', array($this, 'save_key'));

		

		require_once get_template_directory(). '/blocks/src/SocialShare/block.php';
		
  	}
  	public function blocks_assets() {
		wp_enqueue_style(
			'aione-blocks-frontend',
			$this->path.'blocks.frontend.build.css',
			array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
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
		wp_enqueue_style(
			'aione-blocks-editor', // Handle.
			$this->path.'blocks.editor.build.css', // Block editor CSS.
			array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
			filemtime( $this->realPath. 'blocks.editor.build.css' ) // filemtime — Gets file modification time.
		);
	}

	function aione_block_category( $categories, $post ) {	
		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'aione-blocks',
					'title' => __( 'Aione Blocks', 'aione-blocks' ),
				),
			)
		);

	}

	function ub_tabbed_content_add_frontend_assets() {
		$presentBlocks = $this->ub_getPresentBlocks();
		foreach( $presentBlocks as $block ){
		    if($block['blockName'] === 'aione-blocks/aione-tabs' || $block['blockName'] === 'aione-blocks/aione-tabs-block'){
		    	wp_enqueue_script(
		                'aione_blocks-tabs-content-front-script',
		                $this->direcpath.'src/Tabs/front.build.js',
		                array(),
		                filemtime( $this->realPath. 'front.build.js' ),
		                true
		            );
		    }
		}
	}

	function ub_checkInnerBlocks( $block ) {
        static $currentBlocks = [];
        
        $current = $block;
    
        if( $block['blockName'] == 'core/block' ) { //reusable block
            $current = parse_blocks( get_post_field( 'post_content', $block['attrs']['ref'] ) )[0];
        }
    
        if( $current['blockName'] != '' ) {
            array_push( $currentBlocks, $current );
            if( count( $current['innerBlocks'] ) > 0 ){
                foreach( $current['innerBlocks'] as $innerBlock ) {
                    $this->ub_checkInnerBlocks( $innerBlock );
                }
            }
        }
        return $currentBlocks;
    }
	
	function ub_getPresentBlocks(){
        $presentBlocks = [];

        $posts_array = get_post();
        if($posts_array){
            foreach(parse_blocks( $posts_array->post_content ) as $block){
                $presentBlocks = $this->ub_checkInnerBlocks($block);
            }
        }

        return $presentBlocks;
    }
	

}	

$AioneBlocks = new AioneBlocks();
$AioneBlocks->run();

// Tabbed Content Block.
require_once plugin_dir_path( __FILE__ ) . 'src/Tabs/block.php';

?>