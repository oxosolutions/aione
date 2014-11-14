<?php
/**
 * AIONE Framework
 *
 * WARNING: This file is part of the AIONE Core Framework.
 * Do not edit the core files.
 * Add any modifications necessary under a child theme.
 *
 * @package  AIONE/Template
 * @author   OXOSolutions
 * @link	 http://oxosolutions.com
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	die;
}

// Don't duplicate me!
if( ! class_exists( 'AIONETemplateWoo' ) ) {

	/**
	 * Class to apply woocommerce templates
	 *
	 * @since 4.0.0
	 */
	class AIONETemplateWoo {

		function __construct() {

			add_filter( 'woocommerce_show_page_title', array( $this, 'shop_title'), 10 );

			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
			add_action( 'woocommerce_before_main_content', array( $this, 'before_container' ), 10 );
			add_action( 'woocommerce_after_main_content', array( $this, 'after_container' ), 10 );

			remove_action( 'woocommerce_sidebar' , 'woocommerce_get_sidebar', 10 );
			add_action( 'woocommerce_sidebar', array( $this, 'add_sidebar' ), 10 );

			/**
			 * Products Loop
			 */
			add_action( 'woocommerce_after_shop_loop_item', array( $this, 'before_shop_item_buttons' ), 9 );
			add_action( 'woocommerce_after_shop_loop_item', array( $this, 'after_shop_item_buttons' ), 11 );

			/**
			 * Single Product Page
			 */
			add_action( 'woocommerce_single_product_summary', array( $this, 'add_product_border' ), 19 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 11 );

		} // end __construct();

		function before_container() {
			global $theme_options, $post;

			if(is_shop()) {
				$pageID = get_option('woocommerce_shop_page_id');
			} else {
				$pageID = $post->ID;
			}

			$custom_fields = get_post_custom_values('_wp_page_template', $pageID);
			if(is_array($custom_fields) && !empty($custom_fields)) {
				$page_template = $custom_fields[0];
			} else {
				$page_template = '';
			}

			$content_css = '';
			$sidebar_css = '';
			$sidebar_exists = true;
			$sidebar_left = '';

			$double_sidebars = false;
			$sidebar_1 = get_post_meta( $pageID, 'sbg_selected_sidebar_replacement', true );
			$sidebar_2 = get_post_meta( $pageID, 'sbg_selected_sidebar_2_replacement', true );
			
			if( ( is_array( $sidebar_1 ) && $sidebar_1[0] ) && ( is_array( $sidebar_2 ) && $sidebar_2[0] ) ) {
				$double_sidebars = true;
			}

			if( ( is_array( $sidebar_1 ) && $sidebar_1[0] ) || ( is_array( $sidebar_2 ) && $sidebar_2[0] ) ) {
				$sidebar_exists = true;
			} else {
				$sidebar_exists = false;
			}

			if( is_product_category() || is_product_tag() ) {
				$sidebar_1 = $theme_options['woocommerce_archive_sidebar'];
				$sidebar_2 = $theme_options['woocommerce_archive_sidebar_2'];
				if( $sidebar_1 != 'None' && $sidebar_2 != 'None' ) {
					$double_sidebars = true;
				}

				if( $sidebar_1 != 'None' || $sidebar_2 != 'None' ) {
					$sidebar_exists = true;
				} else {
					$sidebar_exists = false;
				}
			}

			if( $page_template == '100-width.php' ) {
				$content_css = 'width:100%';
				$sidebar_css = 'display:none';
			} elseif( ! $sidebar_exists ) {
				$content_css = 'width:100%';
				$sidebar_css = 'display:none';
				$sidebar_exists = false;
			} elseif(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'left') {
				$content_css = 'float:right;';
				$sidebar_css = 'float:left;';
				$sidebar_left = 1;
			} elseif(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'right') {
				$content_css = 'float:left;';
				$sidebar_css = 'float:right;';
			} elseif(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'default') {
				if($theme_options['default_sidebar_pos'] == 'Left') {
					$content_css = 'float:right;';
					$sidebar_css = 'float:left;';
					$sidebar_left = 1;
				} elseif($theme_options['default_sidebar_pos'] == 'Right') {
					$content_css = 'float:left;';
					$sidebar_css = 'float:right;';
					$sidebar_left = 2;
				}
			}

			if(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'right') {
				$sidebar_left = 2;
			}

			if($double_sidebars == true) {
				$content_css = 'float:left;';
				$sidebar_css = 'float:left;';
				$sidebar_2_css = 'float:left;';
			} else {
				$sidebar_left = 1;
			}

			echo '<div class="woocommerce-container"><div id="content" style="' . $content_css . '">';
		}

		function shop_title() {
			return false;
		}

		function after_container() {
			echo '</div></div>';
		}

		function add_sidebar() {
			global $theme_options, $post;

			if(is_shop()) {
				$pageID = get_option('woocommerce_shop_page_id');
			} else {
				$pageID = $post->ID;
			}

			$custom_fields = get_post_custom_values('_wp_page_template', $pageID);
			if(is_array($custom_fields) && !empty($custom_fields)) {
				$page_template = $custom_fields[0];
			} else {
				$page_template = '';
			};

			$content_css = '';
			$sidebar_css = '';
			$sidebar_2_css = '';
			$sidebar_exists = true;
			$sidebar_left = '';

			$double_sidebars = false;
			$sidebar_1 = get_post_meta( $pageID, 'sbg_selected_sidebar_replacement', true );
			$sidebar_2 = get_post_meta( $pageID, 'sbg_selected_sidebar_2_replacement', true );
			if( ( is_array( $sidebar_1 ) && $sidebar_1[0] ) && ( is_array( $sidebar_2 ) && $sidebar_2[0] ) ) {
				$double_sidebars = true;
			}

			if( ( is_array( $sidebar_1 ) && $sidebar_1[0] ) || ( is_array( $sidebar_2 ) && $sidebar_2[0] ) ) {
				$sidebar_exists = true;
			} else {
				$sidebar_exists = false;
			}

			if( is_product_category() || is_product_tag() ) {
				$sidebar_1 = $theme_options['woocommerce_archive_sidebar'];
				$sidebar_2 = $theme_options['woocommerce_archive_sidebar_2'];
				if( $sidebar_1 != 'None' && $sidebar_2 != 'None' ) {
					$double_sidebars = true;
				}

				if( $sidebar_1 != 'None' || $sidebar_2 != 'None' ) {
					$sidebar_exists = true;
				} else {
					$sidebar_exists = false;
				}
			}

			if( $page_template == '100-width.php' ) {
				$content_css = 'width:100%';
				$sidebar_css = 'display:none';
			} elseif( ! $sidebar_exists ) {
				$content_css = 'width:100%';
				$sidebar_css = 'display:none';
				$sidebar_exists = false;
			} elseif(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'left') {
				$content_css = 'float:right;';
				$sidebar_css = 'float:left;';
				$sidebar_left = 1;
			} elseif(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'right') {
				$content_css = 'float:left;';
				$sidebar_css = 'float:right;';
			} elseif(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'default') {
				if($theme_options['default_sidebar_pos'] == 'Left') {
					$content_css = 'float:right;';
					$sidebar_css = 'float:left;';
					$sidebar_left = 1;
				} elseif($theme_options['default_sidebar_pos'] == 'Right') {
					$content_css = 'float:left;';
					$sidebar_css = 'float:right;';
					$sidebar_left = 2;
				}
			}

			if(get_post_meta($pageID, 'pyre_sidebar_position', true) == 'right') {
				$sidebar_left = 2;
			}

			if($double_sidebars == true) {
				$content_css = 'float:left;';
				$sidebar_css = 'float:left;';
				$sidebar_2_css = 'float:left;';
			} else {
				$sidebar_left = 1;
			}

			if( $sidebar_exists == true ) {
				echo '<div id="sidebar" class="sidebar" style="' . $sidebar_css . '">';

				wp_reset_query();

				if( $sidebar_left == 1 ) {
					if(is_product()) {
						generated_dynamic_sidebar();
					} elseif(is_product_category() || is_product_tag()) {
						generated_dynamic_sidebar($theme_options['woocommerce_archive_sidebar']);
					} else {
						$shop_page_id = get_option('woocommerce_shop_page_id');
						$name = get_post_meta($shop_page_id, 'sbg_selected_sidebar_replacement', true);
						if($name) {
							generated_dynamic_sidebar($name[0]);
						}
					}
				}
				if( $sidebar_left == 2 ) {
					wp_reset_query();
					if(is_product()) {
						generated_dynamic_sidebar_2();
					} elseif(is_product_category() || is_product_tag()) {
						generated_dynamic_sidebar($theme_options['woocommerce_archive_sidebar_2']);
					} else {
						$shop_page_id = get_option('woocommerce_shop_page_id');
						$name = get_post_meta($shop_page_id, 'sbg_selected_sidebar_2_replacement', true);
						if($name) {
							generated_dynamic_sidebar($name[0]);
						}
					}
				}

				echo '</div>';

				if( $double_sidebars == true ) {

				echo '<div id="sidebar-2" class="sidebar" style="' . $sidebar_2_css . '">';

					if( $sidebar_left == 1 ) {
						wp_reset_query();
						if(is_product()) {
							generated_dynamic_sidebar_2();
						} elseif(is_product_category() || is_product_tag()) {
							generated_dynamic_sidebar($theme_options['woocommerce_archive_sidebar_2']);
						} else {
							$shop_page_id = get_option('woocommerce_shop_page_id');
							$name = get_post_meta($shop_page_id, 'sbg_selected_sidebar_2_replacement', true);
							if($name) {
								generated_dynamic_sidebar($name[0]);
							}
						}
					}
					if( $sidebar_left == 2 ) {
						if(is_product()) {
							generated_dynamic_sidebar();
						} elseif(is_product_category() || is_product_tag()) {
							generated_dynamic_sidebar($theme_options['woocommerce_archive_sidebar']);
						} else {
							$shop_page_id = get_option('woocommerce_shop_page_id');
							$name = get_post_meta($shop_page_id, 'sbg_selected_sidebar_replacement', true);
							if($name) {
								generated_dynamic_sidebar($name[0]);
							}
						}
					}
					
				}

				echo '</div>';
			}
		}

		function before_shop_item_buttons() {
			echo '<div class="product-buttons"><div class="product-buttons-container clearfix">';
		}

		function after_shop_item_buttons() {
			echo '<a href="' . get_permalink() . '" class="show_details_button">' . __( 'Details', 'Aione' ) . '</a></div></div>';
		}

		function add_product_border() {
			echo '<div class="product-border"></div>';
		}

	} // end AIONETemplateWoo() class

}
new AIONETemplateWoo();

global $theme_options;

add_filter( 'get_product_search_form' , 'aione_product_search_form' );

function aione_product_search_form( $form )
{
	$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '">
	<div>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search...', 'Aione' ) . '" />
	<input type="hidden" name="post_type" value="product" />
	</div>
	</form>';

	return $form;
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

if( ! $theme_options['woocommerce_aione_ordering'] ) {
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

	add_action('woocommerce_before_shop_loop', 'aione_woocommerce_catalog_ordering', 30);
}
function aione_woocommerce_catalog_ordering() {
	global $theme_options;

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {
		parse_str($_SERVER['QUERY_STRING'], $params);

		$query_string = '?'.$_SERVER['QUERY_STRING'];
	} else {
		$query_string = '';
	}

	// replace it with theme option
	if($theme_options['woo_items']) {
		$per_page = $theme_options['woo_items'];
	} else {
		$per_page = 12;
	}

	$pob = !empty($params['product_orderby']) ? $params['product_orderby'] : 'default';
	if( ! empty( $params['product_order'] ) ) {
		$po = $params['product_order'];
	} else {
		switch($pob) {
			case 'date':
				$po = 'desc';
			break;
			case 'price':
				$po = 'asc';
			break;
			case 'popularity':
				$po = 'asc';
			break;
			case 'rating':
				$po = 'desc';
			break;
			case 'name':
				$po = 'asc';
			break;
			case 'default':
				$po = 'asc';
			break;				
		}
	}
	
	
	$pc = !empty($params['product_count']) ? $params['product_count'] : $per_page;

	$html = '';
	$html .= '<div class="catalog-ordering clearfix">';

	$html .= '<div class="orderby-order-container">';

	$html .= '<ul class="orderby order-dropdown">';
	$html .= '<li>';
	$html .= '<span class="current-li"><span class="current-li-content"><a aria-haspopup="true">'.__('Sort by', 'Aione').' <strong>'.__('Default Order', 'Aione').'</strong></a></span></span>';
	$html .= '<ul>';
	$html .= '<li class="'.(($pob == 'default') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'default').'">'.__('Sort by', 'Aione').' <strong>'.__('Default Order', 'Aione').'</strong></a></li>';
	$html .= '<li class="'.(($pob == 'name') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'name').'">'.__('Sort by', 'Aione').' <strong>'.__('Name', 'Aione').'</strong></a></li>';
	$html .= '<li class="'.(($pob == 'price') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'price').'">'.__('Sort by', 'Aione').' <strong>'.__('Price', 'Aione').'</strong></a></li>';
	$html .= '<li class="'.(($pob == 'date') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'date').'">'.__('Sort by', 'Aione').' <strong>'.__('Date', 'Aione').'</strong></a></li>';
	$html .= '<li class="'.(($pob == 'popularity') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'popularity').'">'.__('Sort by', 'Aione').' <strong>'.__('Popularity', 'Aione').'</strong></a></li>';
	$html .= '<li class="'.(($pob == 'rating') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'rating').'">'.__('Sort by', 'Aione').' <strong>'.__('Rating', 'Aione').'</strong></a></li>';
	$html .= '</ul>';
	$html .= '</li>';
	$html .= '</ul>';


	$html .= '<ul class="order">';
	if($po == 'desc'):
	$html .= '<li class="desc"><a aria-haspopup="true" href="'.tf_addURLParameter($query_string, 'product_order', 'asc').'"><i class="aioneicon-arrow-down2 icomoon-up"></i></a></li>';
	endif;
	if($po == 'asc'):
	$html .= '<li class="asc"><a aria-haspopup="true" href="'.tf_addURLParameter($query_string, 'product_order', 'desc').'"><i class="aioneicon-arrow-down2"></i></a></li>';
	endif;
	$html .= '</ul>';

	$html .= '</div>';

	$html .= '<ul class="sort-count order-dropdown">';
	$html .= '<li>';
	$html .= '<span class="current-li"><a aria-haspopup="true">'.__('Show', 'Aione').' <strong>'.$per_page.' '.__(' Products', 'Aione').'</strong></a></span>';
	$html .= '<ul>';
	$html .= '<li class="'.(($pc == $per_page) ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_count', $per_page).'">'.__('Show', 'Aione').' <strong>'.$per_page.' '.__('Products', 'Aione').'</strong></a></li>';
	$html .= '<li class="'.(($pc == $per_page*2) ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_count', $per_page*2).'">'.__('Show', 'Aione').' <strong>'.($per_page*2).' '.__('Products', 'Aione').'</strong></a></li>';
	$html .= '<li class="'.(($pc == $per_page*3) ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_count', $per_page*3).'">'.__('Show', 'Aione').' <strong>'.($per_page*3).' '.__('Products', 'Aione').'</strong></a></li>';
	$html .= '</ul>';
	$html .= '</li>';
	$html .= '</ul>';
	$html .= '</div>';

	echo $html;
}

if( ! $theme_options['woocommerce_aione_ordering'] ) {
	add_action('woocommerce_get_catalog_ordering_args', 'aione_woocommerce_get_catalog_ordering_args', 20);
}
function aione_woocommerce_get_catalog_ordering_args($args)
{
	global $woocommerce;

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {
		parse_str($_SERVER['QUERY_STRING'], $params);
	}

	$pob = !empty($params['product_orderby']) ? $params['product_orderby'] : 'default';
	$po = !empty($params['product_order'])  ? $params['product_order'] : 'asc';

	switch($pob) {
		case 'date':
			$orderby = 'date';
			$order = 'desc';
			$meta_key = '';
		break;
		case 'price':
			$orderby = 'meta_value_num';
			$order = 'asc';
			$meta_key = '_price';
		break;
		case 'popularity':
			$orderby = 'meta_value_num';
			$order = 'asc';
			$meta_key = 'total_sales';
		break;
		case 'rating':
			$orderby = 'meta_value_num';
			$order = 'desc';
			$meta_key = 'average_rating';
		break;
		case 'name':
			$orderby = 'title';
			$order = 'asc';
			$meta_key = '';
		break;
		case 'default':
			return $args;
		break;
	}

	switch($po) {
		case 'desc':
			$order = 'desc';
		break;
		case 'asc':
			$order = 'asc';
		break;
		default:
			$order = 'asc';
		break;
	}

	$args['orderby'] = $orderby;
	$args['order'] = $order;
	$args['meta_key'] = $meta_key;

	if( $pob == 'rating' ) {
		$args['orderby']  = 'menu_order title';
		$args['order']	= $po == 'desc' ? 'desc' : 'asc';
		$args['order']	  = strtoupper( $args['order'] );
		$args['meta_key'] = '';

		add_filter( 'posts_clauses', 'aione_order_by_rating_post_clauses' );
	}

	return $args;
}

/**
 * aione_order_by_rating_post_clauses function.
 *
 * @access public
 * @param array $args
 * @return array
 */
function aione_order_by_rating_post_clauses( $args ) {
	global $wpdb;

	$args['fields'] .= ", AVG( $wpdb->commentmeta.meta_value ) as average_rating, SUM( $wpdb->comments.comment_approved ) as sum_of_comments_approved ";

	$args['where'] .= " AND ( $wpdb->commentmeta.meta_key = 'rating' OR $wpdb->commentmeta.meta_key IS null ) ";
	//$args['where'] .= " AND $wpdb->comments.comment_approved = 1";

	$args['join'] .= "
		LEFT OUTER JOIN $wpdb->comments ON($wpdb->posts.ID = $wpdb->comments.comment_post_ID)
		LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)
	";

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {
		parse_str($_SERVER['QUERY_STRING'], $params);
	}	
	$order = ! empty($params['product_order']) ? $params['product_order'] : 'desc';
	$order = strtoupper($order);

	$args['orderby'] = "sum_of_comments_approved DESC, average_rating {$order}, $wpdb->posts.post_date DESC";

	$args['groupby'] = "$wpdb->posts.ID";

	return $args;
}

add_filter('loop_shop_per_page', 'aione_loop_shop_per_page');
function aione_loop_shop_per_page()
{
	global $theme_options;

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {
		parse_str($_SERVER['QUERY_STRING'], $params);
	}	

	if($theme_options['woo_items']) {
		$per_page = $theme_options['woo_items'];
	} else {
		$per_page = 12;
	}

	$pc = !empty($params['product_count']) ? $params['product_count'] : $per_page;

	return $pc;
}

add_action('woocommerce_before_shop_loop_item_title', 'aione_woocommerce_thumbnail', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
function aione_woocommerce_thumbnail() {
	global $product, $woocommerce;

	$items_in_cart = array();

	if($woocommerce->cart->get_cart() && is_array($woocommerce->cart->get_cart())) {
		foreach($woocommerce->cart->get_cart() as $cart) {
			$items_in_cart[] = $cart['product_id'];
		}
	}

	$id = get_the_ID();
	$in_cart = in_array($id, $items_in_cart);
	$size = 'shop_catalog';

	$gallery = get_post_meta($id, '_product_image_gallery', true);
	$attachment_image = '';
	if(!empty($gallery)) {
		$gallery = explode(',', $gallery);
		$first_image_id = $gallery[0];
		$attachment_image = wp_get_attachment_image($first_image_id , $size, false, array('class' => 'hover-image'));
	}
	$thumb_image = get_the_post_thumbnail($id , $size);

	if($attachment_image) {
		$classes = 'crossfade-images';
	} else {
		$classes = '';
	}

	echo '<span class="'.$classes.'">';
	echo $attachment_image;
	echo $thumb_image;
	if($in_cart) {
		echo '<span class="cart-loading"><i class="aioneicon-check-square-o"></i></span>';
	} else {
		echo '<span class="cart-loading"><i class="aioneicon-spinner"></i></span>';
	}
	echo '</span>';
}
add_filter('add_to_cart_fragments', 'aione_woocommerce_header_add_to_cart_fragment');
function aione_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
	?>
	<li class="cart">
		<?php if(!$woocommerce->cart->cart_contents_count): ?>
		<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><span><?php _e('Cart', 'Aione'); ?></span></a>
		<?php else: ?>
		<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php echo $woocommerce->cart->cart_contents_count; ?> <?php _e('Item(s)', 'Aione'); ?><span class="amount-with-sep"> - <?php echo wc_price($woocommerce->cart->subtotal); ?></span></a>
		<div class="cart-contents">
			<?php foreach($woocommerce->cart->cart_contents as $cart_item): ?>
			<div class="cart-content">
				<a href="<?php echo get_permalink($cart_item['product_id']); ?>">
				<?php $thumbnail_id = ($cart_item['variation_id']) ? $cart_item['variation_id'] : $cart_item['product_id']; ?>
				<?php echo get_the_post_thumbnail($thumbnail_id, 'recent-works-thumbnail'); ?>
				<div class="cart-desc">
					<span class="cart-title"><?php echo $cart_item['data']->post->post_title; ?></span>
					<span class="product-quantity"><?php echo $cart_item['quantity']; ?> x <?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], 1); ?></span>
				</div>
				</a>
			</div>
			<?php endforeach; ?>
			<div class="cart-checkout">
				<div class="cart-link"><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'Aione'); ?></a></div>
				<div class="checkout-link"><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>"><?php _e('Checkout', 'Aione'); ?></a></div>
			</div>
		</div>
		<?php endif; ?>
	</li>
	<?php
	$fragments['.top-menu .cart'] = ob_get_clean();

	ob_start();
	?>
	<li class="cart">
		<?php if(!$woocommerce->cart->cart_contents_count): ?>
		<a class="my-cart-link" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"></a>
		<?php else: ?>
		<a class="my-cart-link my-cart-link-active" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"></a>
		<div class="cart-contents">
			<?php foreach($woocommerce->cart->cart_contents as $cart_item): ?>
			<div class="cart-content">
				<a href="<?php echo get_permalink($cart_item['product_id']); ?>">
				<?php $thumbnail_id = ($cart_item['variation_id']) ? $cart_item['variation_id'] : $cart_item['product_id']; ?>
				<?php echo get_the_post_thumbnail($thumbnail_id, 'recent-works-thumbnail'); ?>
				<div class="cart-desc">
					<span class="cart-title"><?php echo $cart_item['data']->post->post_title; ?></span>
					<span class="product-quantity"><?php echo $cart_item['quantity']; ?> x <?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], 1); ?></span>
				</div>
				</a>
			</div>
			<?php endforeach; ?>
			<div class="cart-checkout">
				<div class="cart-link"><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'Aione'); ?></a></div>
				<div class="checkout-link"><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>"><?php _e('Checkout', 'Aione'); ?></a></div>
			</div>
		</div>
		<?php endif; ?>
	</li>
	<?php
	$header_cart = ob_get_clean();
	$fragments['#header .cart'] = $header_cart;
	$fragments['#small-nav .cart'] = $header_cart;
	$fragments['#header-sticky .cart'] = str_replace( 'class="my-cart-link', 'style="height:63px;line-height:63px;" class="my-cart-link', $header_cart );

	return $fragments;

}

add_action( 'woocommerce_single_product_summary', 'aione_woocommerce_single_product_summary_open', 1 );
function aione_woocommerce_single_product_summary_open() {
	echo '<div class="summary-container">';
}

add_action( 'woocommerce_single_product_summary', 'aione_woocommerce_single_product_summary_close', 100 );
function aione_woocommerce_single_product_summary_close() {
	echo '</div>';
}

add_action('woocommerce_after_single_product_summary', 'aione_woocommerce_after_single_product_summary', 15);
function aione_woocommerce_after_single_product_summary()
{

	global $theme_options;

	$nofollow = '';
	if($theme_options['nofollow_social_links']) {
		$nofollow = ' rel="nofollow"';
	}
	$social = '<div style="clear:both;"></div>';
	if($theme_options['woocommerce_social_links']) {
		$social .= '<ul class="social-share">
			<li class="facebook">
				<a href="http://www.facebook.com/sharer.php?s=100&p&#91;url&#93;=' . get_permalink() . '&p&#91;title&#93;=' . get_the_title() .'" target="_blank"' . $nofollow .'>
					<i class="fontawesome-icon medium circle-yes aioneicon-facebook"></i>
					<span>' . __('Share On', 'Aione') .'</span>Facebook
				</a>
			</li>
			<li class="twitter">
				<a href="http://twitter.com/home?status=' . get_the_title() .' ' . get_permalink() . '" target="_blank"' . $nofollow .'>
					<i class="fontawesome-icon medium circle-yes aioneicon-twitter"></i>
					<span>' . __('Tweet This', 'Aione') . '</span>' . __('Product', 'Aione') . '
				</a>
			</li>
			<li class="pinterest">';
				$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				$social .= '<a href="http://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()) . '&amp;description=' . urlencode(get_the_title()) . '&amp;media=' . urlencode($full_image[0]) .'" target="_blank"' . $nofollow .'>
					<i class="fontawesome-icon medium circle-yes aioneicon-pinterest"></i>
					<span>' . __('Pin This', 'Aione') . '</span>' . __('Product', 'Aione') . '
				</a>
			</li>
			<li class="email">
				<a href="mailto:?subject=' . get_the_title() . '&amp;body=' . get_permalink() . '" target="_blank"' . $nofollow .'>
					<i class="fontawesome-icon medium circle-yes aioneicon-mail"></i>
					<span>' . __('Mail This', 'Aione') . '</span>' . __('Product', 'Aione') .'
				</a>
			</li>
		</ul>';

	echo $social;
	}
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action('woocommerce_after_single_product_summary', 'aione_woocommerce_output_related_products', 15);
function aione_woocommerce_output_related_products()
{
		global $post, $theme_options;
		
		if( get_post_meta($post->ID, 'pyre_number_of_related_products', true) == 'default' || 
			get_post_meta($post->ID, 'pyre_number_of_related_products', true) == ''  || 
			! get_post_meta($post->ID, 'pyre_number_of_related_products', true) 
		) {
			$number_of_columns = $theme_options['woocommerce_related_columns'];
		} else {
			$number_of_columns = get_post_meta($post->ID, 'pyre_number_of_related_products', true);
		}
		
		
		$args = array(
			'posts_per_page' => $number_of_columns,
			'columns' => $number_of_columns,
			'orderby' => 'rand'
		);

		woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
}


/* variations hooks */


/* end variations hooks */

/* cart hooks */
add_action('woocommerce_before_cart_table', 'aione_woocommerce_before_cart_table', 20);
function aione_woocommerce_before_cart_table( $args )
{
	global $woocommerce;

	$html = '<div class="woocommerce-content-box full-width clearfix">';

	$html .= '<h2>' . sprintf( __( 'You Have %d Items In Your Cart', 'Aione' ), $woocommerce->cart->cart_contents_count ) . '</h2>';

	echo $html;
}

add_action('woocommerce_after_cart_table', 'aione_woocommerce_after_cart_table', 20);
function aione_woocommerce_after_cart_table($args)
{
	$html = '</div>';

	echo $html;
}

function woocommerce_cross_sell_display( $posts_per_page = 3, $columns = 3, $orderby = 'rand' ) {
	wc_get_template( 'cart/cross-sells.php', array(
			'posts_per_page' => $posts_per_page,
			'orderby'		=> $orderby,
			'columns'		=> $columns
		) );
}

function cart_shipping_calc() {
	global $woocommerce;

	if ( get_option( 'woocommerce_enable_shipping_calc' ) === 'no' ||  ! WC()->cart->needs_shipping() ) {
		return;
	}
	?>

	<?php do_action( 'woocommerce_before_shipping_calculator' ); ?>

	<div class="shipping_calculator" action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

		<h2><a href="#" class="shipping-calculator-button"><?php _e( 'Calculate Shipping', 'woocommerce' ); ?></a></h2>

		<section class="aione-shipping-calculator-form">

			<p class="form-row form-row-wide">
				<select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state" rel="calc_shipping_state">
					<option value=""><?php _e( 'Select a country&hellip;', 'woocommerce' ); ?></option>
					<?php
						foreach( WC()->countries->get_shipping_countries() as $key => $value )
							echo '<option value="' . esc_attr( $key ) . '"' . selected( WC()->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
					?>
				</select>
			</p>

			<p class="aione-select-parent">
				<?php
					$current_cc = WC()->customer->get_shipping_country();
					$current_r  = WC()->customer->get_shipping_state();
					$states	 = WC()->countries->get_states( $current_cc );

					// Hidden Input
					if ( is_array( $states ) && empty( $states ) ) {

						?><input type="hidden" name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php _e( 'State / county', 'woocommerce' ); ?>" /><?php

					// Dropdown Input
					} elseif ( is_array( $states ) ) {

						?><span>
							<select name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php _e( 'State / county', 'woocommerce' ); ?>">
								<option value=""><?php _e( 'Select a state&hellip;', 'woocommerce' ); ?></option>
								<?php
									foreach ( $states as $ckey => $cvalue )
										echo '<option value="' . esc_attr( $ckey ) . '" ' . selected( $current_r, $ckey, false ) . '>' . __( esc_html( $cvalue ), 'woocommerce' ) .'</option>';
								?>
							</select>
						</span><?php

					// Standard Input
					} else {

						?><input type="text" class="input-text" value="<?php echo esc_attr( $current_r ); ?>" placeholder="<?php _e( 'State / county', 'woocommerce' ); ?>" name="calc_shipping_state" id="calc_shipping_state" /><?php

					}
				?>
			</p>

			<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_city', false ) ) : ?>

				<p class="form-row form-row-wide">
					<input type="text" class="input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_city() ); ?>" placeholder="<?php _e( 'City', 'woocommerce' ); ?>" name="calc_shipping_city" id="calc_shipping_city" />
				</p>

			<?php endif; ?>

			<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ) : ?>

				<p class="form-row form-row-wide">
					<input type="text" class="input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_postcode() ); ?>" placeholder="<?php _e( 'Postcode / Zip', 'woocommerce' ); ?>" name="calc_shipping_postcode" id="calc_shipping_postcode" />
				</p>

			<?php endif; ?>

			<p><button type="submit" name="calc_shipping" value="1" class="aione-button button-default button-small button default small"><?php _e( 'Update Totals', 'woocommerce' ); ?></button></p>

			<?php wp_nonce_field( 'woocommerce-cart' ); ?>
		</section>
	</div>

	<?php do_action( 'woocommerce_after_shipping_calculator' ); ?>

	<?php
}

add_action('woocommerce_cart_collaterals', 'aione_woocommerce_cart_collaterals');
function aione_woocommerce_cart_collaterals($args)
{
	global $woocommerce;
	?>

	<div class="shipping-coupon">

	<?php echo cart_shipping_calc();

	if ( WC()->cart->coupons_enabled() ) { ?>
		<div class="coupon">

			<h2><?php _e( 'Have A Promotional Code?', 'Aione'); ?></h2>

			<input name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" />
			<input type="submit" class="aione-button button-default button-small button default small" name="apply_coupon" value="<?php _e( 'Apply', 'Aione' ); ?>" />

			<?php do_action('woocommerce_cart_coupon'); ?>

		</div>
		<?php
	}
	?>
	</div>
	<?php
}

add_action('woocommerce_before_cart_totals', 'aione_woocommerce_before_cart_totals', 20);
function aione_woocommerce_before_cart_totals($args)
{
	global $woocommerce; ?>

	<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

	<?php
}

add_action('woocommerce_after_cart', 'aione_woocommerce_after_cart');
function aione_woocommerce_after_cart($args)
{
	?>

	</form>

	<?php
}

/* end cart hooks */

/* begin checkout hooks */
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_before_checkout_form', 'aione_woocommerce_checkout_coupon_form', 10 );
function aione_woocommerce_checkout_coupon_form($args)
{
	global $woocommerce;

	if ( ! WC()->cart->coupons_enabled() )
		return;
	?>

	<form class="woocommerce-content-box full-width checkout_coupon" method="post">

		<h2 class="promo-code-heading alignleft"><?php _e( 'Have A Promotional Code?', 'Aione'); ?></h2>

		<div class="coupon-contents alignright">
			<div class="form-row form-row-first alignleft coupon-input">
				<input type="text" name="coupon_code" class="input-text" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
			</div>

			<div class="form-row form-row-last alignleft coupon-button">
				<input type="submit" class="aione-button button-default button-small button default small" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />
			</div>

			<div class="clear"></div>
		</div>
	</form>
	<?php
}

if( ! $theme_options['woocommerce_one_page_checkout'] ) {
	add_action('woocommerce_before_checkout_form', 'aione_woocommerce_before_checkout_form');
}
function aione_woocommerce_before_checkout_form($args)
{
	global $woocommerce;
	?>

	<ul class="woocommerce-side-nav woocommerce-checkout-nav">
		<li class="active">
			<a data-name="col-1" href="#">
				<?php _e('Billing Address' , 'Aione'); ?>
			</a>
		</li>
		<?php if ( WC()->cart->needs_shipping() && ! WC()->cart->ship_to_billing_address_only() ) : ?>
		<li>
			<a data-name="col-2" href="#">
				<?php _e('Shipping Address' , 'Aione'); ?>
			</a>
		</li>
		<?php elseif( apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) ) :

		if ( ! WC()->cart->needs_shipping() || WC()->cart->ship_to_billing_address_only() ) : ?>

		<li>
			<a data-name="col-2" href="#">
				<?php _e('Additional Information' , 'Aione'); ?>
			</a>
		</li>
		<?php endif; ?>
		<?php endif; ?>

		<li>
			<a data-name="#order_review" href="#">
				<?php _e('Review &amp; Payment' , 'Aione'); ?>
			</a>
		</li>
	</ul>

	<div class="woocommerce-content-box aione-checkout">

	<?php

}

if( ! $theme_options['woocommerce_one_page_checkout'] ) {
	add_action('woocommerce_after_checkout_form', 'aione_woocommerce_after_checkout_form');
}
function aione_woocommerce_after_checkout_form($args)
{
	?>

	</div>

	<?php

}

if( $theme_options['woocommerce_one_page_checkout'] ) {
	add_action('woocommerce_checkout_before_customer_details', 'aione_woocommerce_checkout_before_customer_details');
}
function aione_woocommerce_checkout_before_customer_details($args)
{
	global $theme_options, $woocommerce;

	if ( WC()->cart->needs_shipping() && ! WC()->cart->ship_to_billing_address_only() ||
			   apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) && ( ! WC()->cart->needs_shipping() || WC()->cart->ship_to_billing_address_only() )
	) {
		return;
	} else {
	?>

	<div class="aione-checkout-no-shipping">

	<?php
	}

}

if( $theme_options['woocommerce_one_page_checkout'] ) {
	add_action('woocommerce_checkout_after_customer_details', 'aione_woocommerce_checkout_after_customer_details');
}
function aione_woocommerce_checkout_after_customer_details($args)
{
	global $theme_options, $woocommerce;

	if ( WC()->cart->needs_shipping() && ! WC()->cart->ship_to_billing_address_only() ||
			   apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) && ( ! WC()->cart->needs_shipping() || WC()->cart->ship_to_billing_address_only() )
	) {
	?>

	<div class="clearboth"></div>

	<?php } else { ?>

	<div class="clearboth"></div>
	</div>

	<?php } ?>

	<div class="woocommerce-content-box full-width">

	<?php
}


add_action('woocommerce_checkout_billing', 'aione_woocommerce_checkout_billing', 20);
function aione_woocommerce_checkout_billing($args)
{
	global $theme_options, $woocommerce;

	if ( WC()->cart->needs_shipping() && ! WC()->cart->ship_to_billing_address_only() ||
			   apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) && ( ! WC()->cart->needs_shipping() || WC()->cart->ship_to_billing_address_only() )
	) {
		$data_name = 'col-2';
	} else {
		$data_name = '#order_review';
	}

	if( ! $theme_options['woocommerce_one_page_checkout'] ) {
	?>

	<a data-name="<?php echo $data_name; ?>" href="#" class="aione-button button-default button-medium  button default medium continue-checkout"><?php _e('Continue', 'Aione'); ?></a>
	<div class="clearboth"></div>

	<?php
	}

}

add_action('woocommerce_checkout_shipping', 'aione_woocommerce_checkout_shipping', 20);
function aione_woocommerce_checkout_shipping($args)
{
	global $theme_options;

	if( ! $theme_options['woocommerce_one_page_checkout'] ) {
	?>

	<a data-name="#order_review" href="#" class="aione-button button-default button-medium continue-checkout button default medium"><?php _e('Continue', 'Aione'); ?></a>
	<div class="clearboth"></div>

	<?php
	}

}


add_filter('woocommerce_enable_order_notes_field', 'aione_enable_order_notes_field');
function aione_enable_order_notes_field() {
	global $theme_options;

	if( ! $theme_options['woocommerce_enable_order_notes'] ) {
		return 0;
	}

	return 1;

}

if( $theme_options['woocommerce_one_page_checkout'] ) {
	add_action('woocommerce_review_order_after_payment', 'aione_woocommerce_review_order_after_payment');
}
function aione_woocommerce_review_order_after_payment() {

	?>

	</div>

	<?php

}


//function under myaccount hooks
remove_action('woocommerce_thankyou', 'woocommerce_order_details_table', 10);
add_action('woocommerce_thankyou', 'aione_woocommerce_view_order', 10);
/* end checkout hooks */

/* begin my-account hooks */
add_action('woocommerce_before_customer_login_form', 'aione_woocommerce_before_customer_login_form');
function aione_woocommerce_before_customer_login_form()
{

	global $woocommerce;

	if ( get_option( 'woocommerce_enable_myaccount_registration' ) !== 'yes' ) :
	?>

	<div id="customer_login" class="woocommerce-content-box full-width">

	<?php
	endif;
}

add_action('woocommerce_after_customer_login_form', 'aione_woocommerce_after_customer_login_form');
function aione_woocommerce_after_customer_login_form()
{

	global $woocommerce;

	if ( get_option( 'woocommerce_enable_myaccount_registration' ) !== 'yes' ) :
	?>

	</div>

	<?php
	endif;
}

add_action('woocommerce_before_my_account', 'aione_woocommerce_before_my_account');
function aione_woocommerce_before_my_account( $order_count, $edit_address = false)
{
	global $theme_options, $woocommerce, $current_user;
	$edit_address = is_wc_endpoint_url('edit-address');
	?>
	<p class="aione_myaccount_user">
		<span class="myaccount_user_container">
			<span class="username">
			<?php
			printf(
				__( 'Hello, %s:', 'Aione' ),
				$current_user->display_name
			);
			?>
			</span>
			<?php if($theme_options['woo_acc_msg_1']): ?>
			<span class="msg">
				<?php echo $theme_options['woo_acc_msg_1']; ?>
			</span>
			<?php endif; ?>
			<?php if($theme_options['woo_acc_msg_2']): ?>
			<span class="msg">
				<?php echo $theme_options['woo_acc_msg_2']; ?>
			</span>
			<?php endif; ?>
			<span class="view-cart">
				<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'Aione' ); ?></a>
			</span>
		</span>
	</p>

	<ul class="woocommerce-side-nav aione-myaccount-nav">
		<?php if( $downloads = WC()->customer->get_downloadable_products() ) : ?>
		<li <?php if( ! $edit_address ) { echo 'class="active"'; } ?>>
			<a class="downloads" href="#">
				<?php _e('View Downloads' , 'Aione' ); ?>
			</a>
		</li>
		<?php endif;
		
		if( function_exists( 'wc_get_order_types' ) && function_exists( 'wc_get_order_statuses' ) ) {
			$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
				'numberposts' => $order_count,
				'meta_key'    => '_customer_user',
				'meta_value'  => get_current_user_id(),
				'post_type'   => wc_get_order_types( 'view-orders' ),
				'post_status' => array_keys( wc_get_order_statuses() )
			) ) );
		} else {
			$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
				'numberposts' => $order_count,
				'meta_key'	=> '_customer_user',
				'meta_value'  => get_current_user_id(),
				'post_type'   => 'shop_order',
				'post_status' => 'publish'
			) ) );
		}

		if ( $customer_orders ) : ?>
		<li <?php if( ! $edit_address && ! WC()->customer->get_downloadable_products() ) { echo 'class="active"'; } ?>>
			<a class="orders" href="#">
				<?php _e('View Orders' , 'Aione' ); ?>
			</a>
		</li>
		<?php endif; ?>
		<li <?php if( $edit_address || ! WC()->customer->get_downloadable_products() && ! $customer_orders ) { echo 'class="active"'; } ?>>
			<a class="address" href="#">
				<?php _e('Change Address' , 'Aione' ); ?>
			</a>
		</li>
		<li>
			<a class="account" href="#">
				<?php _e('Edit Account' , 'Aione' ); ?>
			</a>
		</li>
	</ul>

	<div class="woocommerce-content-box aione-myaccount-data">

	<?php
}

add_action('woocommerce_after_my_account', 'aione_woocommerce_after_my_account');
function aione_woocommerce_after_my_account($args)
{
	global $woocommerce, $wp;

	$user = wp_get_current_user();

	?>

	<h2 class="edit-account-heading"><?php _e( 'Edit Account', 'Aione' ); ?></h2>

	<form class="edit-account-form" action="" method="post">
		<p class="form-row form-row-first">
			<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="account_first_name" id="account_first_name" value="<?php esc_attr_e( $user->first_name ); ?>" />
		</p>
		<p class="form-row form-row-last">
			<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="account_last_name" id="account_last_name" value="<?php esc_attr_e( $user->last_name ); ?>" />
		</p>
		<p class="form-row form-row-wide">
			<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
			<input type="email" class="input-text" name="account_email" id="account_email" value="<?php esc_attr_e( $user->user_email ); ?>" />
		</p>
		<p class="form-row form-row-first">
			<label for="password_1"><?php _e( 'Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
			<input type="password" class="input-text" name="password_1" id="password_1" />
		</p>
		<p class="form-row form-row-last">
			<label for="password_2"><?php _e( 'Confirm new password', 'woocommerce' ); ?></label>
			<input type="password" class="input-text" name="password_2" id="password_2" />
		</p>
		<div class="clear"></div>

		<p><input type="submit" class="aione-button button-default button-medium button default medium alignright" name="save_account_details" value="<?php _e( 'Save changes', 'woocommerce' ); ?>" /></p>

		<?php wp_nonce_field( 'save_account_details' ); ?>
		<input type="hidden" name="action" value="save_account_details" />
		<div class="clearboth"></div>
	</form>

	</div>

	<?php

}
/* end my-account hooks */

/* begin order hooks */
remove_action('woocommerce_view_order', 'woocommerce_order_details_table', 10);
add_action('woocommerce_view_order', 'aione_woocommerce_view_order', 10);
function aione_woocommerce_view_order( $order_id  )
{
	global $woocommerce;

	$order = new WC_Order( $order_id );

	?>
	<div class="aione-order-details woocommerce-content-box full-width">
	<h2><?php _e( 'Order Details', 'woocommerce' ); ?></h2>
	<table class="shop_table order_details">
		<thead>
			<tr>
				<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
				<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
				<th class="product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
			</tr>
		</thead>
		<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) foreach ( $totals as $total ) :
				?>
				<tr>
					<td class="filler-td">&nbsp;</td>
					<th scope="row"><?php echo $total['label']; ?></th>
					<td class="product-total"><?php echo $total['value']; ?></td>
				</tr>
				<?php
			endforeach;
		?>
		</tfoot>
		<tbody>
			<?php
			if ( sizeof( $order->get_items() ) > 0 ) {

				foreach( $order->get_items() as $item ) {
					$_product	 = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
					$item_meta	= new WC_Order_Item_Meta( $item['item_meta'] );

					?>
					<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
						<td class="product-name">
							<span class="product-thumbnail">
								<?php
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image() );

									if ( ! $_product->is_visible() )
										echo $thumbnail;
									else
										printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
								?>
							</span>
							<div class="product-info">
							<?php
								if ( $_product && ! $_product->is_visible() )
									echo apply_filters( 'woocommerce_order_item_name', $item['name'], $item );
								else
									echo apply_filters( 'woocommerce_order_item_name', sprintf( '<a href="%s">%s</a>', get_permalink( $item['product_id'] ), $item['name'] ), $item );

								$item_meta->display();

								if ( $_product && $_product->exists() && $_product->is_downloadable() && $order->is_download_permitted() ) {

									$download_files = $order->get_item_downloads( $item );
									$i			  = 0;
									$links		  = array();

									foreach ( $download_files as $download_id => $file ) {
										$i++;

										$links[] = '<small><a href="' . esc_url( $file['download_url'] ) . '">' . sprintf( __( 'Download file%s', 'woocommerce' ), ( count( $download_files ) > 1 ? ' ' . $i . ': ' : ': ' ) ) . esc_html( $file['name'] ) . '</a></small>';
									}

									echo '<br/>' . implode( '<br/>', $links );
								}
							?>
							</div>
						</td>
						<td class="product-quantity">
							<?php echo apply_filters( 'woocommerce_order_item_quantity_html', $item['qty'], $item ); ?>
						</td>
						<td class="product-total">
							<?php echo $order->get_formatted_line_subtotal( $item ); ?>
						</td>
					</tr>
					<?php

					if ( in_array( $order->status, array( 'processing', 'completed' ) ) && ( $purchase_note = get_post_meta( $_product->id, '_purchase_note', true ) ) ) {
						?>
						<tr class="product-purchase-note">
							<td colspan="3"><?php echo apply_filters( 'the_content', $purchase_note ); ?></td>
						</tr>
						<?php
					}
				}
			}

			do_action( 'woocommerce_order_items_table', $order );
			?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
	</div>

	<div class="aione-customer-details woocommerce-content-box full-width">
	<header>
		<h2><?php _e( 'Customer details', 'woocommerce' ); ?></h2>
	</header>
	<dl class="customer_details">
	<?php
		if ( $order->billing_email ) echo '<dt>' . __( 'Email:', 'woocommerce' ) . '</dt> <dd>' . $order->billing_email . '</dd><br />';
		if ( $order->billing_phone ) echo '<dt>' . __( 'Telephone:', 'woocommerce' ) . '</dt> <dd>' . $order->billing_phone . '</dd>';

		// Additional customer details hook
		do_action( 'woocommerce_order_details_after_customer_details', $order );
	?>
	</dl>

	<?php if ( get_option( 'woocommerce_ship_to_billing_address_only' ) === 'no' && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>

	<div class="col2-set addresses">

		<div class="col-1">

	<?php endif; ?>

			<header class="title">
				<h3><?php _e( 'Billing Address', 'woocommerce' ); ?></h3>
			</header>
			<address><p>
				<?php
					if ( ! $order->get_formatted_billing_address() ) _e( 'N/A', 'woocommerce' ); else echo $order->get_formatted_billing_address();
				?>
			</p></address>

	<?php if ( get_option( 'woocommerce_ship_to_billing_address_only' ) === 'no' && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>

		</div><!-- /.col-1 -->

		<div class="col-2">

			<header class="title">
				<h3><?php _e( 'Shipping Address', 'woocommerce' ); ?></h3>
			</header>
			<address><p>
				<?php
					if ( ! $order->get_formatted_shipping_address() ) _e( 'N/A', 'woocommerce' ); else echo $order->get_formatted_shipping_address();
				?>
			</p></address>

		</div><!-- /.col-2 -->

	</div><!-- /.col2-set -->

	<?php endif; ?>

	<div class="clear"></div>

	</div>

	<?php
}
/* end order hooks */