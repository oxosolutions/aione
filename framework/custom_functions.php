<?php
function get_related_posts($post_id, $number_posts = -1) {
	$query = new WP_Query();

	$args = '';

	if($number_posts == 0) {
		return $query;
	}

	$args = wp_parse_args($args, array(
		'posts_per_page' => $number_posts,
		'post__not_in' => array($post_id),
		'ignore_sticky_posts' => 0,
		'meta_key' => '_thumbnail_id',
		'category__in' => wp_get_post_categories($post_id)
	));

	$query = new WP_Query($args);

  	return $query;
}

function get_related_projects($post_id, $number_posts = 8) {
	$query = new WP_Query();

	$args = '';

	if($number_posts == 0) {
		return $query;
	}

	$item_cats = get_the_terms($post_id, 'portfolio_category');
	if($item_cats):
	foreach($item_cats as $item_cat) {
		$item_array[] = $item_cat->term_id;
	}
	endif;

	$args = wp_parse_args($args, array(
		'posts_per_page' => $number_posts,
		'post__not_in' => array($post_id),
		'ignore_sticky_posts' => 0,
		'meta_key' => '_thumbnail_id',
		'post_type' => 'aione_portfolio',
		'tax_query' => array(
			array(
				'taxonomy' => 'portfolio_category',
				'field' => 'id',
				'terms' => $item_array
			)
		)
	));

	$query = new WP_Query($args);

	return $query;
}

/**
 * Function to apply attributes to HTML tags.
 * Devs can override attr in a child theme by using the correct slug
 *
 *
 * @param  string $slug	   Slug to refer to the HTML tag
 * @param  array  $attributes Attributes for HTML tag
 * @return [type]			 [description]
 */
function aione_attr( $slug, $attributes = array() ) {

	$out = '';
	$attr = apply_filters( "aione_attr_{$slug}", $attributes );

	if ( empty( $attr ) ) {
		$attr['class'] = $slug;
	}

	foreach ( $attr as $name => $value ) {
		$out .= !empty( $value ) ? sprintf( ' %s="%s"', esc_html( $name ), esc_attr( $value ) ) : esc_html( " {$name}" );
	}

	return trim( $out );

} // end attr()

if(!function_exists('themeaione_pagination')):
function themeaione_pagination($pages = '', $range = 2, $current_query = '')
{
	global $theme_options;

	$showitems = ($range * 2)+1;

	if( $current_query == '' ) {
		global $paged;
		if( empty( $paged ) ) $paged = 1;
	} else {
		$paged = $current_query->query_vars['paged'];
	}

	if( $pages == '' ) {
		if( $current_query == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages) {
				 $pages = 1;
			}
		} else {
			$pages = $current_query->max_num_pages;
		}
	}

	 if(1 != $pages)
	 {
	 	if ( ( $theme_options['blog_pagination_type'] == 'Infinite Scroll' && is_home() ) || ( $theme_options['grid_pagination_type'] == 'Infinite Scroll' && is_page_template('portfolio-grid.php') ) ) {
			echo "<div class='pagination infinite-scroll clearfix'>";
		} else {
			echo "<div class='pagination clearfix'>";
		}
		 //if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'><span class='arrows'>&laquo;</span> First</a>";
		 if($paged > 1) echo "<a class='pagination-prev' href='".get_pagenum_link($paged - 1)."'><span class='page-prev'></span>".__('Previous', 'Aione')."</a>";

		 for ($i=1; $i <= $pages; $i++)
		 {
			 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			 {
				 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
			 }
		 }

		 if ($paged < $pages) echo "<a class='pagination-next' href='".get_pagenum_link($paged + 1)."'>".__('Next', 'Aione')."<span class='page-next'></span></a>";
		 //if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last <span class='arrows'>&raquo;</span></a>";
		 echo "</div>\n";
	 }
}
endif;

function string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));

	if(count($words) > $word_limit) {
		array_pop($words);
	}

	return implode(' ', $words);
}

if(!function_exists('themeaione_breadcrumb')):
function themeaione_breadcrumb() {
		global $theme_options,$post;
		echo '<ul class="breadcrumbs">';

		 if ( !is_front_page() ) {
		echo '<li>'.$theme_options['breacrumb_prefix'].' <a href="';
		echo home_url();
		echo '">'.__('Home', 'Aione');
		echo "</a></li>";
		}

		$params['link_none'] = '';
		$separator = '';

		if (is_category() && !is_singular('aione_portfolio')) {
			$category = get_the_category();
			$ID = $category[0]->cat_ID;
			echo is_wp_error( $cat_parents = get_category_parents($ID, TRUE, '', FALSE ) ) ? '' : '<li>'.$cat_parents.'</li>';
		}

		if(is_singular('aione_portfolio')) {
			echo get_the_term_list($post->ID, 'portfolio_category', '<li>', '&nbsp;/&nbsp;&nbsp;', '</li>');
			echo '<li>'.get_the_title().'</li>';
		}

		if(is_singular('event')) {
			$terms = get_the_term_list($post->ID, 'event-categories', '<li>', '&nbsp;/&nbsp;&nbsp;', '</li>');
			if( ! is_wp_error( $terms ) ) {
				echo get_the_term_list($post->ID, 'event-categories', '<li>', '&nbsp;/&nbsp;&nbsp;', '</li>');
			}
			echo '<li>'.get_the_title().'</li>';
		}

		if (is_tax()) {
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			echo '<li>'.$term->name.'</li>';
		}

		if(is_home()) { echo '<li>'.$theme_options['blog_title'].'</li>'; }
		if(is_page() && !is_front_page()) {
			$parents = array();
			$parent_id = $post->post_parent;
			while ( $parent_id ) :
				$page = get_page( $parent_id );
				if ( $params["link_none"] )
					$parents[]  = get_the_title( $page->ID );
				else
					$parents[]  = '<li><a href="' . get_permalink( $page->ID ) . '" title="' . get_the_title( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>' . $separator;
				$parent_id  = $page->post_parent;
			endwhile;
			$parents = array_reverse( $parents );
			echo join( '', $parents );
			echo '<li>'.get_the_title().'</li>';
		}
		
		if(is_single() && !is_singular('aione_portfolio')  && ! is_singular('tribe_events') && !is_singular('event') && !is_singular('wpfc_sermon')) {
			$categories_1 = get_the_category($post->ID);
			if($categories_1):
				foreach($categories_1 as $cat_1):
					$cat_1_ids[] = $cat_1->term_id;
				endforeach;
				$cat_1_line = implode(',', $cat_1_ids);
			endif;
			if( $cat_1_line ) {
				$categories = get_categories(array(
					'include' => $cat_1_line,
					'orderby' => 'id'
				));
				if ( $categories ) :
					foreach ( $categories as $cat ) :
						$cats[] = '<li><a href="' . get_category_link( $cat->term_id ) . '" title="' . $cat->name . '">' . $cat->name . '</a></li>';
					endforeach;
					echo join( '', $cats );
				endif;
			}
			echo '<li>'.get_the_title().'</li>';
		}
		if( is_tag() ){ echo '<li>'."Tag: ".single_tag_title('',FALSE).'</li>'; }
		if( is_search() ){ echo '<li>'.__("Search", 'Aione').'</li>'; }
		if( is_year() ){ echo '<li>'.get_the_time('Y').'</li>'; }
		
		if( is_404() ) { 
			if( class_exists( 'TribeEvents' ) && 
				tribe_is_event() || is_events_archive()
			) { 
				echo '<li>'. tribe_get_events_title() .'</li>';
			} else {		
				echo '<li>'.__("404 - Page not Found", 'Aione').'</li>';
			}
		}		
		
  		if( class_exists( 'TribeEvents' ) &&
			tribe_is_event() && 
  			! is_404() 
  		) {
  			if( is_singular('tribe_events') ) {
				echo sprintf( '<li><a href="%s" title="%s">%s</a></li>', tribe_get_events_link(), tribe_get_events_title(), tribe_get_events_title() );
  			  			
  				echo '<li>'. get_the_title() .'</li>';
  			} else {  		
	  			echo '<li>'. tribe_get_events_title() .'</li>';
	  		}
		}		

		echo "</ul>";
}
endif;

function tf_checkIfMenuIsSetByLocation($menu_location = '') {
	if(has_nav_menu($menu_location)) {
		return true;
	}

	return false;
}

// Custom RSS Link
add_filter('feed_link','pyre_feed_link', 1, 2);
function pyre_feed_link($output, $feed) {
	if( isset( $theme_options['rss_link'] ) && $theme_options['rss_link'] ) {
		$feed_url = $theme_options['rss_link'];

		$feed_array = array('rss' => $feed_url, 'rss2' => $feed_url, 'atom' => $feed_url, 'rdf' => $feed_url, 'comments_rss2' => '');
		$feed_array[$feed] = $feed_url;
		$output = $feed_array[$feed];
	}

	return $output;
}

function tf_addURLParameter($url, $paramName, $paramValue) {
	 $url_data = parse_url($url);
	 if(!isset($url_data["query"]))
		 $url_data["query"]="";

	 $params = array();
	 parse_str($url_data['query'], $params);
	 $params[$paramName] = $paramValue;

	 if( $paramName == 'product_count' ) {
	 	$params['paged'] = '1';
	 }

	 $url_data['query'] = http_build_query($params);
	 return tf_build_url($url_data);
}


 function tf_build_url($url_data) {
	 $url="";
	 if(isset($url_data['host']))
	 {
		 $url .= $url_data['scheme'] . '://';
		 if (isset($url_data['user'])) {
			 $url .= $url_data['user'];
				 if (isset($url_data['pass'])) {
					 $url .= ':' . $url_data['pass'];
				 }
			 $url .= '@';
		 }
		 $url .= $url_data['host'];
		 if (isset($url_data['port'])) {
			 $url .= ':' . $url_data['port'];
		 }
	 }
	 if (isset($url_data['path'])) {
	 	$url .= $url_data['path'];
	 }
	 if (isset($url_data['query'])) {
		 $url .= '?' . $url_data['query'];
	 }
	 if (isset($url_data['fragment'])) {
		 $url .= '#' . $url_data['fragment'];
	 }
	 return $url;
 }

function getClassAlign($post_count)
{
	if(($post_count % 2)>0)
		return " align-left ";
	else
		return " align-right ";
}

function aione_hex2rgb( $hex ) {
	if ( strpos( $hex,'rgb' ) !== false ) {

		$rgb_part = strstr( $hex, '(' );
		$rgb_part = trim($rgb_part, '(' );
		$rgb_part = rtrim($rgb_part, ')' );
		$rgb_part = explode( ',', $rgb_part );

	 	$rgb = array($rgb_part[0], $rgb_part[1], $rgb_part[2], $rgb_part[3]);

	} elseif( $hex == 'transparent' ) {
		$rgb = array( '255', '255', '255', '0' );
	} else {

		$hex = str_replace( '#', '', $hex );

		if( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = array( $r, $g, $b );
	}

	return $rgb; // returns an array with the rgb values
}

function aione_rgb2hsl( $hex_color ) {

	$hex_color	= str_replace( '#', '', $hex_color );

	if( strlen( $hex_color ) < 3 ) {
		str_pad( $hex_color, 3 - strlen( $hex_color ), '0' );
	}

	$add		 = strlen( $hex_color ) == 6 ? 2 : 1;
	$aa		  = 0;
	$add_on	  = $add == 1 ? ( $aa = 16 - 1 ) + 1 : 1;

	$red		 = round( ( hexdec( substr( $hex_color, 0, $add ) ) * $add_on + $aa ) / 255, 6 );
	$green	   = round( ( hexdec( substr( $hex_color, $add, $add ) ) * $add_on + $aa ) / 255, 6 );
	$blue		= round( ( hexdec( substr( $hex_color, ( $add + $add ) , $add ) ) * $add_on + $aa ) / 255, 6 );

	$hsl_color	= array( 'hue' => 0, 'sat' => 0, 'lum' => 0 );

	$minimum	 = min( $red, $green, $blue );
	$maximum	 = max( $red, $green, $blue );

	$chroma	  = $maximum - $minimum;

	$hsl_color['lum'] = ( $minimum + $maximum ) / 2;

	if( $chroma == 0 ) {
		$hsl_color['lum'] = round( $hsl_color['lum'] * 100, 0 );

		return $hsl_color;
	}

	$range = $chroma * 6;

	$hsl_color['sat'] = $hsl_color['lum'] <= 0.5 ? $chroma / ( $hsl_color['lum'] * 2 ) : $chroma / ( 2 - ( $hsl_color['lum'] * 2 ) );

	if( $red <= 0.004 || 
		$green <= 0.004 || 
		$blue <= 0.004 
	) {
		$hsl_color['sat'] = 1;
	}

	if( $maximum == $red ) {
		$hsl_color['hue'] = round( ( $blue > $green ? 1 - ( abs( $green - $blue ) / $range ) : ( $green - $blue ) / $range ) * 255, 0 );
	} else if( $maximum == $green ) {
		$hsl_color['hue'] = round( ( $red > $blue ? abs( 1 - ( 4 / 3 ) + ( abs ( $blue - $red ) / $range ) ) : ( 1 / 3 ) + ( $blue - $red ) / $range ) * 255, 0 );
	} else {
		$hsl_color['hue'] = round( ( $green < $red ? 1 - 2 / 3 + abs( $red - $green ) / $range : 2 / 3 + ( $red - $green ) / $range ) * 255, 0 );
	}

	$hsl_color['sat'] = round( $hsl_color['sat'] * 100, 0 );
	$hsl_color['lum']  = round( $hsl_color['lum'] * 100, 0 );

	return $hsl_color;
}


add_action('wp_head', 'aione_set_post_views');
function aione_set_post_views() {
	global $post;

	if('post' == get_post_type() && is_single()) {
		$postID = $post->ID;

		if(!empty($postID)) {
			$count_key = 'aione_post_views_count';
			$count = get_post_meta($postID, $count_key, true);

			if($count == '') {
				$count = 0;
				delete_post_meta($postID, $count_key);
				add_post_meta($postID, $count_key, '0');
			} else {
				$count++;
				update_post_meta($postID, $count_key, $count);
			}
		}
	}
}

add_filter( 'bbp_get_forum_pagination_links', 'tf_get_forum_pagination_links', 1 );
function tf_get_forum_pagination_links() {
	$bbp = bbpress();

	$pagination_links = $bbp->topic_query->pagination_links;

	$pagination_links = str_replace( 'page-numbers current', 'current', $pagination_links );
	$pagination_links = str_replace( 'page-numbers', 'inactive', $pagination_links );
	$pagination_links = str_replace( 'prev inactive', 'pagination-prev', $pagination_links );
	$pagination_links = str_replace( 'next inactive', 'pagination-next', $pagination_links );

	$pagination_links = str_replace( '&larr;', __('Previous', 'Aione').'<span class="page-prev"></span>', $pagination_links );
	$pagination_links = str_replace( '&rarr;', __('Next', 'Aione').'<span class="page-next"></span>', $pagination_links );

	return $pagination_links;
}

add_filter( 'bbp_get_topic_pagination_links', 'tf_get_topic_pagination_links', 1 );
function tf_get_topic_pagination_links() {
	$bbp = bbpress();

	$pagination_links = $bbp->reply_query->pagination_links;
	$permalink		= get_permalink( $bbp->current_topic_id );
	$max_num_pages	= $bbp->reply_query->max_num_pages;
	$paged			= $bbp->reply_query->paged;

	$pagination_links = str_replace( 'page-numbers current', 'current', $pagination_links );
	$pagination_links = str_replace( 'page-numbers', 'inactive', $pagination_links );
	$pagination_links = str_replace( 'prev inactive', 'pagination-prev', $pagination_links );
	$pagination_links = str_replace( 'next inactive', 'pagination-next', $pagination_links );

	$pagination_links = str_replace( '&larr;', __('Previous', 'Aione').'<span class="page-prev"></span>', $pagination_links );
	$pagination_links = str_replace( '&rarr;', __('Next', 'Aione').'<span class="page-next"></span>', $pagination_links );

	return $pagination_links;
}

add_filter( 'bbp_get_search_pagination_links', 'tf_get_search_pagination_links', 1 );
function tf_get_search_pagination_links() {
	$bbp = bbpress();

	$pagination_links = $bbp->search_query->pagination_links;

	$pagination_links = str_replace( 'page-numbers current', 'current', $pagination_links );
	$pagination_links = str_replace( 'page-numbers', 'inactive', $pagination_links );
	$pagination_links = str_replace( 'prev inactive', 'pagination-prev', $pagination_links );
	$pagination_links = str_replace( 'next inactive', 'pagination-next', $pagination_links );

	$pagination_links = str_replace( '&larr;', __('Previous', 'Aione').'<span class="page-prev"></span>', $pagination_links );
	$pagination_links = str_replace( '&rarr;', __('Next', 'Aione').'<span class="page-next"></span>', $pagination_links );

	return $pagination_links;
}

function aione_slider_name( $name ) {
	$type = '';
	
	switch( $name ) {
		case 'layer':
			$type = 'slider';
			break;
		case 'flex':
			$type = 'wooslider';
			break;
		case 'rev':
			$type = 'revslider';
			break;
		case 'elastic':
			$type = 'elasticslider';
			break;
	}

	return $type;
}

function aione_get_slider_type( $post_id ) {
	$get_slider_type = get_post_meta($post_id, 'pyre_slider_type', true);

	return $get_slider_type;
}

function aione_get_slider( $post_id, $type ) {
	$type = aione_slider_name( $type );

	if( $type ) {
		$get_slider = get_post_meta( $post_id, 'pyre_' . $type, true );

		return $get_slider;
	} else {
		return false;
	}
}

function aione_slider( $post_id ) {
	$slider_type = aione_get_slider_type( $post_id );
	$slider = aione_get_slider( $post_id, $slider_type );

	if( $slider ) {
		$slider_name = aione_slider_name( $slider_type );

		if( $slider_name == 'slider' ) {
			$slider_name = 'layerslider';
		}

		$function = 'aione_' . $slider_name;

		$function( $slider );
	}
}

function aione_revslider( $name ) {
	if( function_exists('putRevSlider') ) {
	   putRevSlider( $name );
	}
}

function aione_layerslider( $id ) {
	global $wpdb;

	// Get slider
	$ls_table_name = $wpdb->prefix . "layerslider";
	$ls_slider = $wpdb->get_row("SELECT * FROM $ls_table_name WHERE id = " . (int) $id . " ORDER BY date_c DESC LIMIT 1" , ARRAY_A);
	$ls_slider = json_decode($ls_slider['data'], true);
	?>
	<style type="text/css">
		#layerslider-container{max-width:<?php echo $ls_slider['properties']['width'] ?>;}
	</style>
	<div id="layerslider-container">
		<div id="layerslider-wrapper">
			<?php if($ls_slider['properties']['skin'] == 'aione'): ?>
				<div class="ls-shadow-top"></div>
			<?php endif; ?>
			<?php echo do_shortcode('[layerslider id="' . $id . '"]'); ?>
			<?php if($ls_slider['properties']['skin'] == 'aione'): ?>
				<div class="ls-shadow-bottom"></div>
			<?php endif; ?>
		</div>
	</div>
<?php
}

function aione_elasticslider( $term ) {
	global $theme_options;

	if( ! $theme_options['status_eslider'] ) {
		$args				= array(
			'post_type'		=> 'themeaione_elastic',
			'posts_per_page'   => - 1,
			'suppress_filters' => 0
		);
		$args['tax_query'][] = array(
			'taxonomy' => 'themeaione_es_groups',
			'field'	=> 'slug',
			'terms'	=> $term
		);
		$query			   = new WP_Query( $args );
		$count			   = 1;
		if ( $query->have_posts() ) {
		?>
			<div id="ei-slider" class="ei-slider">
				<ul class="ei-slider-large">
					<?php while ( $query->have_posts() ): $query->the_post(); ?>
						<li style="<?php echo ( $count > 0 ) ? 'opacity: 0;' : ''; ?>">
							<?php the_post_thumbnail( 'full', array( 'title' => '', 'alt' => get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) ) ); ?>
							<div class="ei-title">
								<?php if ( get_post_meta( get_the_ID(), 'pyre_caption_1', true ) ): ?>
									<h2><?php echo get_post_meta( get_the_ID(), 'pyre_caption_1', true ); ?></h2>
								<?php endif; ?>
								<?php if ( get_post_meta( get_the_ID(), 'pyre_caption_2', true ) ): ?>
									<h3><?php echo get_post_meta( get_the_ID(), 'pyre_caption_2', true ); ?></h3>
								<?php endif; ?>
							</div>
						</li>
						<?php $count ++; endwhile; ?>
				</ul>
				<ul class="ei-slider-thumbs" style="display: none;">
					<li class="ei-slider-element">Current</li>
					<?php while ( $query->have_posts() ): $query->the_post(); ?>
						<li>
							<a href="#"><?php the_title(); ?></a>
							<?php the_post_thumbnail( 'full', array( 'title' => '', 'alt' => get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) ) ); ?>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php
			wp_reset_postdata();
		}
		wp_reset_query();
	}
}

function aione_wooslider( $term ) {
	global $theme_options;

	if( ! $theme_options['status_aione_slider'] ) {
		$term_details = get_term_by( 'slug', $term, 'slide-page' );

		$slider_settings = get_option( 'taxonomy_' . $term_details->term_id );
		$slider_data = '';
		
		if( $slider_settings ) {
			foreach( $slider_settings as $slider_setting => $slider_setting_value ) {
				$slider_data .= 'data-' . $slider_setting . '="' . $slider_setting_value . '" ';
			}
		}

		$slider_class = '';

		if( $slider_settings['slider_width'] == '100%' && ! $slider_settings['full_screen'] ) {
			$slider_class .= ' full-width-slider';
		}

		if( $slider_settings['slider_width'] != '100%' && ! $slider_settings['full_screen'] ) {
			$slider_class .= ' fixed-width-slider';
		}

		$args				= array(
			'post_type'		=> 'slide',
			'posts_per_page'   => -1,
			'suppress_filters' => 0
		);
		$args['tax_query'][] = array(
			'taxonomy' => 'slide-page',
			'field'	=> 'slug',
			'terms'	=> $term
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
		?>
			<div class="aione-slider-container <?php echo $slider_class; ?>-container" style="height:<?php echo $slider_settings['slider_height']; ?>;max-width:<?php echo $slider_settings['slider_width']; ?>;">
				<div class="tfs-slider flexslider main-flex<?php echo $slider_class; ?>" style="max-width:<?php echo $slider_settings['slider_width']; ?>;" <?php echo $slider_data; ?>>
					<ul class="slides" style="width:<?php echo $slider_settings['slider_width']; ?>;">
						<?php
						while( $query->have_posts() ): $query->the_post();
							$metadata = get_metadata( 'post', get_the_ID() );
							
							$background_image = '';
							$background_class = '';

							$img_width = '';

							if( isset( $metadata['pyre_type'][0] ) && $metadata['pyre_type'][0] == 'image' && has_post_thumbnail() ) {
								$image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src( $image_id, 'full', true );
								$background_image = 'background-image: url(' . $image_url[0] . ');';
								$background_class = 'background-image';
								$img_width = $image_url[1];
							}

							$video_attributes = '';
							$youtube_attributes = '';
							$vimeo_attributes = '';
							$data_mute = 'no';
							$data_loop = 'no';
							$data_autoplay = 'no';

							if( isset( $metadata['pyre_mute_video'][0] ) && $metadata['pyre_mute_video'][0] == 'yes' ) {
								$video_attributes = 'muted';
								$data_mute = 'yes';
							}

							if( isset( $metadata['pyre_autoplay_video'][0] ) && $metadata['pyre_autoplay_video'][0] == 'yes' ) {
								$video_attributes .= ' autoplay';
								$youtube_attributes .= '&amp;autoplay=0';
								$vimeo_attributes .= '&amp;autoplay=0';
								$data_autoplay = 'yes';
							}

							if( isset( $metadata['pyre_loop_video'][0] ) && $metadata['pyre_loop_video'][0] == 'yes' ) {
								$video_attributes .= ' loop';
								$youtube_attributes .= '&amp;loop=1&amp;playlist=' . $metadata['pyre_youtube_id'][0];
								$vimeo_attributes .= '&amp;loop=1';
								$data_loop = 'yes';
							}

							if( isset ( $metadata['pyre_hide_video_controls'][0] ) && $metadata['pyre_hide_video_controls'][0] == 'no' ) {
								$video_attributes .= ' controls';
								$youtube_attributes .= '&amp;controls=1';
								$video_zindex = 'z-index: 1;';
							} else {
								$youtube_attributes .= '&amp;controls=0';
								$video_zindex = 'z-index: -99;';
							}

							$heading_color = '';

							if( isset ( $metadata['pyre_heading_color'][0] ) && $metadata['pyre_heading_color'][0] ) {
								$heading_color = 'color:' . $metadata['pyre_heading_color'][0] . ';';
							}

							$heading_bg = '';

							if( isset ( $metadata['pyre_heading_bg'][0] ) && $metadata['pyre_heading_bg'][0] == 'yes' ) {
								$heading_bg = 'background-color: rgba(0,0,0, 0.4);';
							}

							$caption_color = '';

							if( isset ( $metadata['pyre_caption_color'][0] ) && $metadata['pyre_caption_color'][0] ) {
								$caption_color = 'color:' . $metadata['pyre_caption_color'][0] . ';';
							}

							$caption_bg = '';

							if( isset ( $metadata['pyre_caption_bg'][0] ) && $metadata['pyre_caption_bg'][0] == 'yes' ) {
								$caption_bg = 'background-color: rgba(0, 0, 0, 0.4);';
							}

							$video_bg_color = '';

							if( isset ( $metadata['pyre_video_bg_color'][0] ) && $metadata['pyre_video_bg_color'][0] ) {
								$video_bg_color_hex = aione_hex2rgb( $metadata['pyre_video_bg_color'][0]  );
								$video_bg_color = 'background-color: rgba(' . $video_bg_color_hex[0] . ', ' . $video_bg_color_hex[1] . ', ' . $video_bg_color_hex[2] . ', 0.4);';
							}

							$video = false;

							if( isset( $metadata['pyre_type'][0] ) ) {
								if( isset( $metadata['pyre_type'][0] ) && $metadata['pyre_type'][0] == 'self-hosted-video' || $metadata['pyre_type'][0] == 'youtube' || $metadata['pyre_type'][0] == 'vimeo' ) {
									$video = true;
								}
							}

							if( isset ( $metadata['pyre_type'][0] ) &&  $metadata['pyre_type'][0] == 'self-hosted-video' ) {
								$background_class = 'self-hosted-video-bg';
							}

							$heading_font_size = 'font-size:60px;line-height:80px;';
							if( isset ( $metadata['pyre_heading_font_size'][0] ) && $metadata['pyre_heading_font_size'][0] ) {
								$line_height = $metadata['pyre_heading_font_size'][0] * 1.4;
								$heading_font_size = 'font-size:' . $metadata['pyre_heading_font_size'][0] . 'px;line-height:' . $line_height . 'px;';
							}

							$caption_font_size = 'font-size: 24px;line-height:38px;';
							if( isset ( $metadata['pyre_caption_font_size'][0] ) && $metadata['pyre_caption_font_size'][0] ) {
								$line_height = $metadata['pyre_caption_font_size'][0] * 1.4;
								$caption_font_size = 'font-size:' . $metadata['pyre_caption_font_size'][0] . 'px;line-height:' . $line_height . 'px;';
							}
						?>
						<li data-mute="<?php echo $data_mute; ?>" data-loop="<?php echo $data_loop; ?>" data-autoplay="<?php echo $data_autoplay; ?>">
							<div class="slide-content-container slide-content-<?php if ( isset( $metadata['pyre_content_alignment'][0] ) && $metadata['pyre_content_alignment'][0] ) { echo $metadata['pyre_content_alignment'][0]; } ?>" style="display: none;">
								<div class="slide-content">
									<?php if( isset ( $metadata['pyre_heading'][0] ) && $metadata['pyre_heading'][0] ): ?>
									<div class="heading <?php if($heading_bg): echo 'with-bg'; endif; ?>"><h2 style="<?php echo $heading_bg; ?><?php echo $heading_color; ?><?php echo $heading_font_size; ?>"><?php echo $metadata['pyre_heading'][0]; ?></h2></div>
									<?php endif; ?>
									<?php if( isset ( $metadata['pyre_caption'][0] ) && $metadata['pyre_caption'][0] ): ?>
									<div class="caption <?php if($caption_bg): echo 'with-bg'; endif; ?>"><h3 style="<?php echo $caption_bg; ?><?php echo $caption_color; ?><?php echo $caption_font_size; ?>"><?php echo $metadata['pyre_caption'][0]; ?></h3></div>
									<?php endif; ?>
									<?php if( isset ( $metadata['pyre_link_type'][0] ) && $metadata['pyre_link_type'][0] == 'button' ): ?>
									<div class="buttons" >
										<?php
										if( isset ( $metadata['pyre_button_1'][0] ) && $metadata['pyre_button_1'][0] ) {
											echo '<div class="tfs-button-1">' . do_shortcode( $metadata['pyre_button_1'][0] ) . '</div>';
										}
										if( isset ( $metadata['pyre_button_2'][0] ) && $metadata['pyre_button_2'][0] ) {
											echo '<div class="tfs-button-2">' . do_shortcode( $metadata['pyre_button_2'][0] ) . '</div>';
										}
										?>
									</div>
									<?php endif; ?>
								</div>
							</div>
							<?php if( isset( $metadata['pyre_link_type'][0] ) && $metadata['pyre_link_type'][0] == 'full' && isset( $metadata['pyre_slide_link'][0] ) && $metadata['pyre_slide_link'][0] ): ?>
							<a href="<?php echo $metadata['pyre_slide_link'][0]; ?>" class="overlay-link"></a>
							<?php endif; ?>
							<?php if( isset ( $metadata['pyre_preview_image'][0] ) && $metadata['pyre_preview_image'][0] ): ?>
							<div class="mobile_video_image" style="background-image: url(<?php echo $metadata['pyre_preview_image'][0]; ?>);"></div>
							<?php elseif( isset( $metadata['pyre_type'][0] ) && $metadata['pyre_type'][0] == 'self-hosted-video' ): ?>
							<div class="mobile_video_image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/video_preview.jpg);"></div>
							<?php endif; ?>
							<?php if( $video_bg_color && $video == true ): ?>
							<div class="overlay" style="<?php echo $video_bg_color; ?>"></div>
							<?php endif; ?>
							<div class="background <?php echo $background_class; ?>" style="<?php echo $background_image; ?>width:<?php echo $slider_settings['slider_width']; ?>;height:<?php echo $slider_settings['slider_height']; ?>;" data-imgwidth="<?php echo $img_width; ?>">
								<?php if( isset( $metadata['pyre_type'][0] ) ): if( $metadata['pyre_type'][0] == 'self-hosted-video' && ( $metadata['pyre_webm'][0] || $metadata['pyre_mp4'][0] || $metadata['pyre_ogg'][0] ) ): ?>
								<video width="1800" height="700" <?php echo $video_attributes; ?> preload="auto">
									<?php if( array_key_exists( 'pyre_mp4', $metadata ) && $metadata['pyre_mp4'][0] ): ?>
									<source src="<?php echo $metadata['pyre_mp4'][0]; ?>" type="video/mp4">
									<?php endif; ?>
									<?php if( array_key_exists( 'pyre_ogg', $metadata ) && $metadata['pyre_ogg'][0] ): ?>
									<source src="<?php echo $metadata['pyre_ogg'][0]; ?>" type="video/ogg">
									<?php endif; ?>
									<?php if( array_key_exists( 'pyre_webm', $metadata ) && $metadata['pyre_webm'][0] ): ?>
									<source src="<?php echo $metadata['pyre_webm'][0]; ?>" type="video/webm">
									<?php endif; ?>
								</video>
								<?php endif; endif; ?>
								<?php if( isset( $metadata['pyre_type'][0] ) && isset( $metadata['pyre_youtube_id'][0] ) && $metadata['pyre_type'][0] == 'youtube' && $metadata['pyre_youtube_id'][0] ): ?>
								<div style="position: absolute; top: 0; left: 0; <?php echo $video_zindex; ?> width: 100%; height: 100%">
									<iframe frameborder="0" height="100%" width="100%" src="http<?php echo (is_ssl())? 's' : ''; ?>://www.youtube.com/embed/<?php echo $metadata['pyre_youtube_id'][0]; ?>?modestbranding=1&amp;showinfo=0&amp;autohide=1&amp;enablejsapi=1&amp;rel=0<?php echo $youtube_attributes; ?>"></iframe>
								</div>
								<?php endif; ?>
								 <?php if( isset( $metadata['pyre_type'][0] ) && isset( $metadata['pyre_vimeo_id'][0] ) &&  $metadata['pyre_type'][0] == 'vimeo' && $metadata['pyre_vimeo_id'][0] ): ?>
								 <div style="position: absolute; top: 0; left: 0; <?php echo $video_zindex; ?> width: 100%; height: 100%">
									<iframe src="http<?php echo (is_ssl())? 's' : ''; ?>://player.vimeo.com/video/<?php echo $metadata['pyre_vimeo_id'][0]; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;badge=0&amp;title=0<?php echo $vimeo_attributes; ?>" height="100%" width="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								</div>
								<?php endif; ?>
							</div>
						</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		<?php
		}

		wp_reset_query();
	}
}

function aione_page_title_bar( $title, $subtitle, $secondary_content ) {
?>
	<div class="page-title-container">
		<div class="page-title">
			<div class="page-title-wrapper">
				<div class="page-title-captions">
					<?php if( $title ): ?>
						<h1 class="entry-title"><?php echo $title; ?></h1>
						<?php if( $subtitle ): ?>
						<h3><?php echo $subtitle; ?></h3>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<?php echo $secondary_content; ?>
			</div>
		</div>
	</div>
<?php }

function aione_current_page_title_bar( $post_id ) {
	global $theme_options;

	ob_start();
	if( $theme_options['breadcrumb'] ) {
		if ( $theme_options['page_title_bar_bs'] == 'Breadcrumbs' ) {
			if( ( class_exists( 'Woocommerce' ) && is_woocommerce() ) || ( is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) ) {
				woocommerce_breadcrumb(array(
					'wrap_before' => '<ul class="breadcrumbs">',
					'wrap_after' => '</ul>',
					'before' => '<li>',
					'after' => '</li>',
					'delimiter' => ''
				));
			} else if( class_exists( 'bbPress' ) && is_bbpress() ) {
				bbp_breadcrumb( array ( 'before' => '<ul class="breadcrumbs">', 'after' => '</ul>', 'sep' => ' ', 'crumb_before' => '<li>', 'crumb_after' => '</li>', 'home_text' => __('Home', 'Aione')) );
			} else {
				themeaione_breadcrumb();
			}
		} else {
			get_search_form();
		}
	}
	$secondary_content = ob_get_contents();
	ob_get_clean();

	$title = '';
	$subtitle = '';
	
	if( get_post_meta( $post_id, 'pyre_page_title_custom_text', true ) != '' ) {
		$title = get_post_meta( $post_id, 'pyre_page_title_custom_text', true );
	}

	if( get_post_meta( $post_id, 'pyre_page_title_custom_subheader', true ) != '' ) {
		$subtitle = get_post_meta( $post_id, 'pyre_page_title_custom_subheader', true );
	}

	if( ! $title ) {
		$title = get_the_title();

		if( is_home() ) {
			$title = $theme_options['blog_title'];
		}

		if( is_search() ) {
			$title = __('Search results for:', 'Aione') . get_search_query();
		}

		if( is_404() ) {
			$title = __('Error 404 Page', 'Aione');
		}

		if( ( class_exists( 'TribeEvents' ) && tribe_is_event() && ! is_single() ) ||
			( class_exists( 'TribeEvents' ) && is_events_archive() && is_404() )
		) { 
			$title = tribe_get_events_title();
		}

		if( is_archive() && 
			! is_bbpress()
		) {
			if ( is_day() ) {
				$title = __( 'Daily Archives:', 'Aione' ) . '<span> ' . get_the_date() . '</span>';
			} else if ( is_month() ) {
				$title = __( 'Monthly Archives:', 'Aione' ) . '<span> ' . get_the_date( _x( 'F Y', 'monthly archives date format', 'Aione' ) ) . '</span>';
			} elseif ( is_year() ) {
				$title = __( 'Yearly Archives:', 'Aione' ) . '<span> ' . get_the_date( _x( 'Y', 'yearly archives date format', 'Aione' ) ) . '</span>';
			} elseif ( is_author() ) {
				$curauth = get_user_by( 'id', get_query_var( 'author' ) );
				$title = $curauth->nickname;
			} else {
				$title = single_cat_title( '', false );
			}
		}

		if( class_exists( 'Woocommerce' ) && is_woocommerce() && ( is_product() || is_shop() ) && ! is_search() ) {
			if( ! is_product() ) {
				$title = woocommerce_page_title( false );
			}
		}
	}

	if ( ! $subtitle ) {
		if( is_home() ) {
			$subtitle = $theme_options['blog_subtitle'];
		}
	}
	
	if( ! is_archive() && ! is_search() && ! ( is_home() && ! is_front_page() ) ) {
		if( get_post_meta( $post_id, 'pyre_page_title', true ) == 'yes' ||
			( $theme_options['page_title_bar'] && get_post_meta( $post_id, 'pyre_page_title', true ) != 'no' )
		) {		

			if( get_post_meta( $post_id, 'pyre_page_title_text', true ) == 'no' ) {
				$title = '';
				$subtitle = '';
			}
			
			if( is_home() && is_front_page() && ! $theme_options['blog_show_page_title_bar'] ) {
				// do nothing
			} else {
				aione_page_title_bar( $title, $subtitle, $secondary_content );
			}
		}
	} else {
	
		if( is_home() && ! $theme_options['blog_show_page_title_bar'] ) {
			// do nothing
		} else {

			if( $theme_options['page_title_bar'] ) {
				aione_page_title_bar( $title, $subtitle, $secondary_content );
			}
		}
	}
}

if( ! function_exists( 'aione_post_date_and_format_box' ) ) {
	function aione_post_date_and_format_box() {
		global $theme_options;
		
		switch( get_post_format() ) {
			case 'gallery':
				$format_class = 'images';
				break;
			case 'link':
				$format_class = 'link';
				break;
			case 'image':
				$format_class = 'image';
				break;
			case 'quote':
				$format_class = 'quotes-left';
				break;
			case 'video':
				$format_class = 'film';
				break;
			case 'audio':
				$format_class = 'headphones';
				break;
			case 'chat':
				$format_class = 'bubbles';
				break;
			default:
				$format_class = 'pen';
				break;
		}
		
		$html = sprintf( '<div class="date-and-formats"><div class="date-box"><span class="date">%s</span><span class="month-year">%s</span></div><div class="format-box"><i class="aioneicon-%s"></i></div></div>',
						 get_the_time( $theme_options['alternate_date_format_day'] ), get_the_time( $theme_options['alternate_date_format_month_year'] ), $format_class );
		
		return $html;
	}
}

if( ! function_exists( 'aione_backend_check_new_bbpress_post' ) ) {
	function aione_backend_check_new_bbpress_post() {
		global $pagenow, $post_type;
		
		if( in_array( $pagenow, array( 'post-new.php' ) ) &&
			$post_type == 'forum' || $post_type == 'topic' | $post_type == 'reply'
		) {
			return true;
		}
		
		return false;
	}
}

if( ! function_exists( 'aione_render_rich_snippets_for_pages' ) ) {
	function aione_render_rich_snippets_for_pages() {
		global $theme_options;
		
		$html = '';
		
		if( ! is_404() ) {
			$html = '<span class="entry-title" style="display: none;">' . get_the_title() . '</span>';
		}
		ob_start();
		the_author_posts_link();
		$author_post_link = ob_get_clean();
		$html .= '<span class="vcard" style="display: none;"><span class="fn">' . $author_post_link . '</span></span>';
		if( ! $theme_options['disable_date_rich_snippet_pages'] ) {
			$html .= '<span class="updated" style="display:none;">' . get_the_modified_time( 'c' ) . '</span>';
		}
		
		return $html;
	}
}

if( ! function_exists( 'aione_set_portfolio_image_size' ) ) {
	function aione_set_portfolio_image_size( $current_page_id ) {
		global $theme_options;
		
		if( is_page_template( 'portfolio-one-column-text.php' ) ) {
			$custom_image_size = 'portfolio-full';
		} else if( is_page_template( 'portfolio-one-column.php' ) ) {
			$custom_image_size = 'portfolio-one';
		} else if( is_page_template( 'portfolio-two-column.php' ) ||
				   is_page_template( 'portfolio-two-column-text.php' ) 
		) {
			$custom_image_size = 'portfolio-two';
		} else if( is_page_template( 'portfolio-three-column.php' ) || 
				   is_page_template( 'portfolio-three-column-text.php' ) 
		) {
			$custom_image_size = 'portfolio-three';
		} else if( is_page_template( 'portfolio-four-column.php' ) || 
				   is_page_template( 'portfolio-four-column-text.php' ) 
		) {
			$custom_image_size = 'portfolio-four';
		} else if( is_page_template( 'portfolio-five-column.php' ) || 
				   is_page_template( 'portfolio-five-column-text.php' ) 
		) {
			$custom_image_size = 'portfolio-five';
		} else if( is_page_template( 'portfolio-six-column.php' ) || 
				   is_page_template( 'portfolio-six-column-text.php' ) 
		) {
			$custom_image_size = 'portfolio-six';
		} else {
			$custom_image_size = 'full';
		}
		
		if( get_post_meta($current_page_id, 'pyre_portfolio_featured_image_size', true) == 'default' || 
			! get_post_meta($current_page_id, 'pyre_portfolio_featured_image_size', true)
		) {
			if( $theme_options['portfolio_featured_image_size'] == 'full' ) {
				$featured_image_size = 'full';
			} else {
				$featured_image_size = $custom_image_size;
			}
		} else if( get_post_meta($current_page_id, 'pyre_portfolio_featured_image_size', true) == 'full' ) {
			$featured_image_size = 'full';
		} else {
			$featured_image_size = $custom_image_size;
		}
		
		if( is_page_template( 'portfolio-grid.php' ) ) {
			$featured_image_size = 'full';
		}
		
		return $featured_image_size;
	}
}

if( ! function_exists( 'aione_display_sidenav' ) ) {
	function aione_display_sidenav( $post_id ) {
	
		$html = '<ul class="side-nav">';

		$post_ancestors = get_ancestors( $post_id, 'page' );
		$post_parent = end( $post_ancestors );
	
		$html .= '<li';
		if( is_page( $post_parent ) ) {
			$html .= ' class="current_page_item"';
		}

		if( $post_parent ) {
			$html .= sprintf( '><a href="%s" title="%s">%s</a></li>', get_permalink( $post_parent ), __( 'Back to Parent Page', 'Aione' ), get_the_title( $post_parent ) );
		} else {
			$html .= sprintf( '><a href="%s" title="%s">%s</a></li>', get_permalink( $post_id ), __( 'Back to Parent Page', 'Aione' ), get_the_title( $post_id ) );
		}

		if( $post_parent ) {
			$children = wp_list_pages( sprintf( 'title_li=&child_of=%s&echo=0&sort_column=menu_order,post_title', $post_parent ) );
		} else {
			$children = wp_list_pages( sprintf( 'title_li=&child_of=%s&echo=0&sort_column=menu_order,post_title', $post_id ) );
		}
		if ( $children ) {
			$html .= $children;
		}
		
		$html .= '</ul>';
		
		return $html;
	}
}

class Aione_GoogleMap {

	private $map_id;

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

		add_filter( 'aione_attr_aione-google-map-shortcode', array( $this, 'attr' ) );
		add_shortcode( 'aione_map', array( $this, 'render' ) );

	}

	/**
	 * Function to get the default shortcode param values applied.
	 *
	 * @param  array  $args  Array with user set param values
	 * @return array  $defaults  Array with default param values
	 */
	public static function set_shortcode_defaults( $defaults, $args ) {
		
		if( ! $args ) {
			$$args = array();
		}
	
		$args = shortcode_atts( $defaults, $args );	 
	
		foreach( $args as $key => $value ) {
			if( $value == '' ) {
				$args[$key] = $defaults[$key];
			}
		}

		return $args;
	
	}

	public static function calc_color_brightness( $color ) {
	
		if( strtolower( $color ) == 'black' ||
			strtolower( $color ) == 'navy' ||
			strtolower( $color ) == 'purple' ||
			strtolower( $color ) == 'maroon' ||
			strtolower( $color ) == 'indigo' ||
			strtolower( $color ) == 'darkslategray' ||
			strtolower( $color ) == 'darkslateblue' ||
			strtolower( $color ) == 'darkolivegreen' ||
			strtolower( $color ) == 'darkgreen' ||
			strtolower( $color ) == 'darkblue' 
		) {
			$brightness_level = 0;
		} elseif( strpos( $color, '#' ) === 0 ) {
			$color = aione_hex2rgb( $color );

			$brightness_level = sqrt( pow( $color[0], 2) * 0.299 + pow( $color[1], 2) * 0.587 + pow( $color[2], 2) * 0.114 );		   
		} else {
			$brightness_level = 150;
		}

		return $brightness_level;
	}   

	/**
	 * Function to apply attributes to HTML tags.
	 * Devs can override attributes in a child theme by using the correct slug
	 *
	 *
	 * @param  string $slug	   Slug to refer to the HTML tag
	 * @param  array  $attributes Attributes for HTML tag
	 * @return [type]			 [description]
	 */
	public static function attributes( $slug, $attributes = array() ) {

		$out = '';
		$attr = apply_filters( "aione_attr_{$slug}", $attributes );

		if ( empty( $attr ) ) {
			$attr['class'] = $slug;
		}

		foreach ( $attr as $name => $value ) {
			$out .= !empty( $value ) ? sprintf( ' %s="%s"', esc_html( $name ), esc_attr( $value ) ) : esc_html( " {$name}" );
		}

		return trim( $out );

	} // end attr()

	/**
	 * Render the shortcode
	 * @param  array $args	 Shortcode paramters
	 * @param  string $content Content between shortcode
	 * @return string		  HTML output
	 */
	function render( $args, $content = '' ) {
		global $theme_options;

		$defaults = $this->set_shortcode_defaults(
			array(
				'class'					 => '',
				'id'						=> '',
				'animation'				 => 'no',
				'address'				   => '',
				'address_pin'			   => 'yes',
				'height'					=> '300px',			 
				'icon'					  => '',
				'infobox'				   => '',
				'infobox_background_color'  => '',
				'infobox_content'		   => '',
				'infobox_text_color'		=> '',
				'map_style'				 => '',
				'overlay_color'			 => '',
				'popup'					 => 'yes',
				'scale'					 => 'yes',			   
				'scrollwheel'			   => 'yes',			   
				'type'					  => 'roadmap',
				'width'					 => '100%',
				'zoom'					  => '14',
				'zoom_pancontrol'		   => 'yes',
			), $args
		);

		extract( $defaults );

		self::$args = $defaults;

		$html = '';

		if( $address ) {
			$addresses = explode( '|', $address );

			if( $infobox_content ) {
				$infobox_content_array = explode( '|', $infobox_content );
			} else {
				$infobox_content_array = '';
			}
			
			if( $icon ) {
				$icon_array = explode( '|', $icon );
			} else {
				$icon_array = '';
			}	   

			if( $addresses ) {
				self::$args['address'] = $addresses;
			}
			
			$num_of_addresses = count( $addresses );
			
			if( $icon &&
				strpos( $icon, '|' ) === false ) {
				for( $i = 0; $i < $num_of_addresses; $i++ ) {
					$icon_array[$i] = $icon;				
				}
			}
		
			if( $map_style == 'theme' ) {
				$map_style = 'custom';
				$icon = 'theme';
				$animation = 'yes';
				$infobox = 'custom';
				$infobox_background_color = aione_hex2rgb( $theme_options['primary_color'] );
				$infobox_background_color = 'rgba(' . $infobox_background_color[0] . ', ' . $infobox_background_color[1] . ', ' . $infobox_background_color[2] . ', 0.8)';
				$overlay_color = $theme_options['primary_color'];
				$brightness_level = $this->calc_color_brightness( $theme_options['primary_color'] );

				if( $brightness_level > 140 ) {
					$infobox_text_color = '#fff';
				} else {
					$infobox_text_color = '#747474';
				}			   
			}

			if( $map_style == 'custom' ) {
				$animation = 'yes';
			}
			
			if( $icon == 'theme' && $map_style == 'custom' ) {
				for( $i = 0; $i < $num_of_addresses; $i++ ) {
					$icon_array[$i] = get_template_directory_uri() . '/images/aione_map_marker.png';
				}
			}		   

			wp_print_scripts( 'google-maps-api' );
			wp_print_scripts( 'google-maps-infobox' );

			foreach( self::$args['address'] as $add ) {

				$coordinates[] = $this->get_coordinates( $add );
			}

			if( ! is_array( $coordinates ) ) {
				return;
			}
			
			for( $i = 0; $i < $num_of_addresses; $i++ ) {
				if( strpos( self::$args['address'][$i], 'latlng=' ) === 0 ) {
					self::$args['address'][$i] = $coordinates[$i]['address'];
				}
			}
			
			if( is_array( $infobox_content_array ) && 
				! empty( $infobox_content_array ) 
			) {
				for( $i = 0; $i < $num_of_addresses; $i++ ) {
					if( ! array_key_exists( $i, $infobox_content_array ) ) {
						$infobox_content_array[$i] = self::$args['address'][$i];
					}
				}
				self::$args['infobox_content'] = $infobox_content_array;
			} else {
				self::$args['infobox_content'] = self::$args['address'];
			}			

			$map_id = uniqid( 'aione_map_' ); // generate a unique ID for this map
			$this->map_id = $map_id;

			ob_start(); ?>
			<script type="text/javascript">
				var map_<?php echo $map_id; ?>;
				var markers = [];
				var counter = 0;
				function aione_run_map_<?php echo $map_id ; ?>() {
					var location = new google.maps.LatLng(<?php echo $coordinates[0]['lat']; ?>, <?php echo $coordinates[0]['lng']; ?>);
					var map_options = {
						zoom: <?php echo $zoom; ?>,
						center: location,
						mapTypeId: google.maps.MapTypeId.<?php echo strtoupper($type); ?>,
						scrollwheel: <?php echo ($scrollwheel == 'yes') ? 'true' : 'false'; ?>,
						scaleControl: <?php echo ($scale == 'yes') ? 'true' : 'false'; ?>,
						panControl: <?php echo ($zoom_pancontrol == 'yes') ? 'true' : 'false'; ?>,
						zoomControl: <?php echo ($zoom_pancontrol == 'yes') ? 'true' : 'false'; ?>
						
					};
					map_<?php echo $map_id ; ?> = new google.maps.Map(document.getElementById("<?php echo esc_attr( $map_id ); ?>"), map_options);
					<?php $i = 0; ?>
					<?php
					foreach( $coordinates as $key => $coordinate ):
						$infobox_content = trim( self::$args['infobox_content'][$key] );
						$infobox_content_arr = explode( "\n", $infobox_content );
						$infobox_content_arr = array_filter( $infobox_content_arr, 'trim' );
						$infobox_content = implode( '<br/>', $infobox_content_arr );
						$infobox_content = str_replace( "\r", '', $infobox_content );
						$infobox_content = str_replace( "\n", '', $infobox_content );
					?>
					
					var content_string = "<div class='info-window'><?php echo $infobox_content; ?></div>";
					
					<?php if( $overlay_color && $map_style == 'custom' ) { 
					$hsl = aione_rgb2hsl( $overlay_color );
					?>
					var styles = [
					  {
						stylers: [
						  { hue: '<?php echo $overlay_color; ?>' },
						  <?php if( self::$args['map_style'] == 'custom' ): ?>
						  { saturation: '<?php echo $hsl['sat'] * 2 - 100; ?>' },
						  { lightness: '<?php echo $hsl['lum'] * 2 - 100; ?>' }
						  <?php elseif( self::$args['map_style'] == 'theme' ): ?>
						  { saturation: '-20' },
						  <?php endif; ?>
						]
					  },{
						featureType: "road",
						elementType: "geometry",
						stylers: [
						  { visibility: "simplified" },

						]
					  },{
						featureType: "road",
						elementType: "labels",
					  }
					];

					map_<?php echo $map_id ; ?>.setOptions({styles: styles});
					
					<?php } ?>

					map_<?php echo $map_id ; ?>_args = {
						position: new google.maps.LatLng("<?php echo $coordinate['lat']; ?>", "<?php echo $coordinate['lng']; ?>"),
						map: map_<?php echo $map_id ; ?>
					};

					<?php if( $address_pin == 'yes' ): ?>
					<?php if ( $animation == 'yes' ) { ?>
					map_<?php echo $map_id ; ?>_args.animation = google.maps.Animation.DROP;
					<?php } ?>
					<?php if( $icon == 'theme' && isset( $icon_array[$i] ) && $icon_array[$i] && $map_style == 'custom' ) { ?>
					map_<?php echo $map_id ; ?>_args.icon = new google.maps.MarkerImage( '<?php echo $icon_array[$i]; ?>', null, null, null, new google.maps.Size( 37, 55 ) );
					<?php } else if( isset( $icon_array[$i] ) && $icon_array[$i] && $map_style == 'custom' ) { ?>
					map_<?php echo $map_id ; ?>_args.icon = '<?php echo $icon_array[$i]; ?>';
					<?php } ?>
					<?php $i++; ?>

					markers[counter] = new google.maps.Marker(map_<?php echo $map_id ; ?>_args);
					<?php endif; ?>
					
					<?php if ( $infobox == 'custom' && $map_style == 'custom' && $address_pin == 'yes' ) { ?>
					
						var info_box_div = document.createElement('div');
						info_box_div.className = 'aione-info-box';
						info_box_div.style.cssText = 'background-color:<?php echo $infobox_background_color; ?>;color:<?php echo $infobox_text_color; ?>;';

						info_box_div.innerHTML = content_string;

						var info_box_options = {
							 content: info_box_div
							,disableAutoPan: false
							,maxWidth: 150
							,pixelOffset: new google.maps.Size(-125, 10)
							,zIndex: null
							,boxStyle: { 
							  background: 'none'
							  ,opacity: 1
							  ,width: "250px"
							 }
							,closeBoxMargin: "2px 2px 2px 2px"
							,closeBoxURL: "<?php echo is_ssl() ? 'https' : 'http';?>://www.google.com/intl/en_us/mapfiles/close.gif"
							,infoBoxClearance: new google.maps.Size(1, 1)

						};

						markers[counter]['infowindow'] = new InfoBox(info_box_options);
						markers[counter]['infowindow'].open(map_<?php echo $map_id ; ?>, markers[counter]);
						<?php if( $popup != 'yes' ) { ?>
							markers[counter]['infowindow'].setVisible( false );
						<?php } ?>
						google.maps.event.addListener(markers[counter], 'click', function() {
							if( this['infowindow'].getVisible() ) {
								this['infowindow'].setVisible( false );
							} else {
								this['infowindow'].setVisible( true );
							}
						});					 
						
					<?php } else { ?>
						
						<?php if( $address_pin == 'yes' ): ?>
						markers[counter]['infowindow'] = new google.maps.InfoWindow({
							content: content_string
						});				 
						
						<?php if( $popup == 'yes' ) { ?>
							markers[counter]['infowindow'].show = true;
							markers[counter]['infowindow'].open(map_<?php echo $map_id ; ?>, markers[counter]);
						<?php } ?>					  

						google.maps.event.addListener(markers[counter], 'click', function() {
							if(this['infowindow'].show) {
								this['infowindow'].close(map_<?php echo $map_id ; ?>, this);
								this['infowindow'].show = false;
							} else {
								this['infowindow'].open(map_<?php echo $map_id ; ?>, this);
								this['infowindow'].show = true;
							}
						});

						<?php endif; ?>
					
					<?php } ?>
					
					counter++;
					<?php endforeach; ?>

				}

				google.maps.event.addDomListener(window, 'load', aione_run_map_<?php echo $map_id ; ?>);

			</script>
			<?php
			if( $defaults['id'] ) {
				$html = ob_get_clean() . sprintf( '<div id="%s"><div %s></div></div>', $defaults['id'], $this->attributes( 'aione-google-map-shortcode' ) );
			} else {
				$html = ob_get_clean() . sprintf( '<div %s></div>', $this->attributes( 'aione-google-map-shortcode' ) );
			}

		}

		return $html;

	}

	function attr() {
	
		$attr['class'] = 'shortcode-map aione-google-map aione-google-map';

		if( self::$args['class'] ) {
			$attr['class'] .= ' ' . self::$args['class'];
		}

		$attr['id'] = $this->map_id;
		
		$attr['style'] = sprintf('height:%s;width:%s;',  self::$args['height'], self::$args['width'] );

		return $attr;

	}

	function get_coordinates( $address, $force_refresh = false ) {
		global $theme_options;

		$key = $theme_options['google_console_api_key'];

		$address_hash = md5( $address );

		$coordinates = get_transient( $address_hash );

		if ( $force_refresh || 
			 $coordinates === false
		) {
			
			if( strpos( $address, 'latlng=' ) === 0 ) {
				$args = array( 'latlng' => urlencode( substr( $address, 7 ) ), 'sensor' => 'false' );
			}else {
				$args = array( 'address' => urlencode( $address ), 'sensor' => 'false' );
			}
			$url = 'http://maps.googleapis.com/maps/api/geocode/json';
			if( $key ) {
				$args['key'] = $key;
				$url = 'https://maps.googleapis.com/maps/api/geocode/json';
			}
			$url		= add_query_arg( $args, $url );
			$response   = wp_remote_get( $url );

			if( is_wp_error( $response ) )
				return;

			$data = wp_remote_retrieve_body( $response );

			if( is_wp_error( $data ) )
				return;

			if ( $response['response']['code'] == 200 ) {

				$data = json_decode( $data );

				if ( $data->status === 'OK' ) {

					$coordinates = $data->results[0]->geometry->location;

					$cache_value['lat']	 = $coordinates->lat;
					$cache_value['lng']	 = $coordinates->lng;
					$cache_value['address'] = (string) $data->results[0]->formatted_address;

					// cache coordinates for 3 months
					set_transient($address_hash, $cache_value, 3600*24*30*3);
					$data = $cache_value;

				} elseif ( $data->status === 'ZERO_RESULTS' ) {
					return __( 'No location found for the entered address.', 'Aione' );
				} elseif( $data->status === 'INVALID_REQUEST' ) {
					return __( 'Invalid request. Did you enter an address?', 'Aione' );
				} else {
					return __( 'Something went wrong while retrieving your map, please ensure you have entered the short code correctly.', 'Aione' );
				}

			} else {
				return __( 'Unable to contact Google API service.', 'Aione' );
			}

		} else {
		   // return cached results
		   $data = $coordinates;
		}

		return $data;

	}

}

new Aione_GoogleMap();