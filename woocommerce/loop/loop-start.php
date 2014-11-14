<?php
/**
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version	 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce_loop, $theme_options;

// Store column count for displaying the grid
if( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 1 );
}

// Reset according to sidebar or fullwidth pages
if( is_shop() || is_product_category() || is_product_tag() ) {
	
	if( is_shop() ) {
		$woocommerce_loop['columns'] = $theme_options['woocommerce_shop_page_columns'];
	}

	if( is_product_category() || 
		is_product_tag()
	) {
		$woocommerce_loop['columns'] = $theme_options['woocommerce_archive_page_columns'];
	}

}
?>
<ul class="products clearfix products-<?php echo $woocommerce_loop['columns']; ?>">