<?php


if ( !function_exists( 'aione_pagination' ) ) {

	function aione_pagination( $wp_query = null ) {

		global $wp;
		global $theme_options;
		if ($wp_query == null) {
			global $wp_query;
		}

		

		/*echo "<br>QUERY = ";
		echo "<pre>";
		print_r( $wp_query );
		echo "</pre>";*/
		

	    $big = 999999999; // need an unlikely integer
	    //$current_page = get_query_var('paged');
	    $current_page = $wp_query->query_vars['paged'];
	    $total_pages = $wp_query->max_num_pages;

	    if ($total_pages == 1) {
	    	return '';
	    }

	    if($theme_options['advanced_ajax_content']) {
	    	if($current_page == 0) {
	    		$base = str_replace($big, '%#%', ''.$_SERVER['HTTP_REFERER'].'page/%#%/');
	    	}
	    	else {
	    		$referrer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], 'page'));
	    		$base = str_replace($big, '%#%', ''.$referrer.'page/%#%/');
	    	}
	    }
	    else {
	    	$base = str_replace($big, '%#%', esc_url(get_pagenum_link($big)));
	    }

	    // echo $base;

	    $args = array(
	    	'base' => $base,
	    	'format' => '?paged=%#%',
	    	'total' => $total_pages,
	    	'current' => max(1, $current_page),
	    	'show_all' => false,
	    	'end_size' => 2,
	    	'mid_size' => 2,
	    	'prev_next' => false,
	    	'prev_text' => '<ion-icon name="chevron-back-sharp"></ion-icon>',
	    	'next_text' => '<ion-icon name="chevron-forward-sharp"></ion-icon>',
	    	'type' => 'array',
	    	'add_args' => false,
	    	'add_fragment' => '',
	    	'before_page_number' => '',
	    	'after_page_number' => '',
	    );

	    $pages = paginate_links($args);

	    $output = '';

	    $output .= '<ul class="pagination">';

	    if ($current_page == 1 || $current_page == 0) {
	    	$output .= '<li class="page first disabled"><span><ion-icon name="chevron-back-sharp"></ion-icon><ion-icon name="chevron-back-sharp"></ion-icon></span></li>';
	    	$output .= '<li class="page prev disabled"><span><ion-icon name="chevron-back-sharp"></ion-icon></span></li>';
	    } else {
	    	$prev_page = $current_page - 1;
	    	$output .= '<li class="page first"><a href="' . esc_url(get_pagenum_link(1)) . '"><span><ion-icon name="chevron-back-sharp"></ion-icon><ion-icon name="chevron-back-sharp"></ion-icon></span></a></li>';
	    	$output .= '<li class="page prev"><a href="' . esc_url(get_pagenum_link($prev_page)) . '"><span><ion-icon name="chevron-back-sharp"></ion-icon></span></a></li>';
	    }

	    if (is_array($pages)) {
	    	foreach ($pages as $key => $page) {

	    		$classes = array();
	    		$classes[] = 'page';

	    		$page_number = strip_tags($page);

	    		if ($current_page > 0 && $current_page == $page_number) {
	    			$classes[] = 'active';
	    		}
	    		if ($current_page == 0 && 1 == $page_number) {
	    			$classes[] = 'active';
	    		}
	    		$classes = implode(' ', $classes);
	    		$output .= '<li class="' . $classes . '">' . $page . '</li>';
	    	}
	    }

	    if ($current_page == $total_pages) {
	    	$output .= '<li class="page next disabled"><span><ion-icon name="chevron-forward-sharp"></ion-icon></span></li>';
	    	$output .= '<li class="page last disabled"><span><ion-icon name="chevron-forward-sharp"></ion-icon><ion-icon name="chevron-forward-sharp"></ion-icon></span></li>';
	    } else {
	    	if ($current_page == 1 || $current_page == 0) {
	    		$next_page = 2;
	    	} else {
	    		$next_page = $current_page + 1;
	    	}
	    	$output .= '<li class="page next"><a href="' . esc_url(get_pagenum_link($next_page)) . '"><span><ion-icon name="chevron-forward-sharp"></ion-icon></span></a></li>';
	    	$output .= '<li class="page last"><a href="' . esc_url(get_pagenum_link($total_pages)) . '"><span><ion-icon name="chevron-forward-sharp"></ion-icon><ion-icon name="chevron-forward-sharp"></ion-icon></span></a></li>';
	    }

	    $output .= '</ul>';

	    

	    return $output;
	}

}

if ( !function_exists( 'aione_get_sidebar' ) ) {

	function aione_get_sidebar( $sidebar_position ) {

		global $post;

		$post_id = $post->ID;

	    // get Post Type e.g.'movie'
		$post_type = get_post_type( $post_id );

	    // Fetch 'compponents' from options
		$aione_components = get_option( 'aione-components' );

	    // Filter perticular 'component' from 'components'
		$aione_component = $aione_components[ $post_type ];

	    // get 'templete' slug for Single/Page
		$template_slug_single = $aione_component['single_template'];

	    // get 'templete' slug for Blog/Archive
		$template_slug_archive = $aione_component['archive_template'];

	    // Fetch 'templates' from options
		$aione_templates = get_option( 'aione-templates' );

	    // get 'templete' for Single/Page
		$aione_template_single = $aione_templates[$template_slug_single];
	    // get 'templete' for Blog/Archive
		$aione_template_archive = $aione_templates[$template_slug_archive];

	    // sidebar single
		$sidebar_single = strtolower( $aione_template_single['template_sidebar_' . $sidebar_position] );

	    // sidebar  archive
		$sidebar_archive = strtolower( $aione_template_archive['template_sidebar_' . $sidebar_position] );

	    // Global Options
		$sidebar = 'aione-sidebar-' . $sidebar_position;

		if ( is_archive() ) {

	        //Template Options Left Sidebar
			if ( ! empty( $sidebar_archive ) && $sidebar_archive != 'default' ) {
				$sidebar = $sidebar_archive;
			}
		}

		if ( is_single() ) {

	        //Template Options Left Sidebar
			if ( ! empty( $sidebar_single ) && $sidebar_single != 'default' ) {
				$sidebar = $sidebar_single;
			}

	        //Per page Options Left Sidebar
			$sidebar_custom = get_aione_page_settings( $post_id, 'aione_per_page_setting','pyre_sidebar_' . $sidebar_position );

			if ( ! empty( $sidebar_custom ) && $sidebar_custom != 'default' ) {

				$sidebar = $sidebar_custom;

			}
		}

		if ( is_attachment() ) {

	        //Template Options Left Sidebar
			if ( ! empty( $sidebar_single ) && $sidebar_single != 'default' ) {

				$sidebar = $sidebar_single;

			}

	        //Per page Options Left Sidebar
			$sidebar_custom = get_aione_page_settings( $post_id, 'aione_per_page_setting','pyre_sidebar_' . $sidebar_position);

			if ( ! empty( $sidebar_custom ) && $sidebar_custom != 'default' ) {

				$sidebar = $sidebar_custom;

			}
		}

		if ( is_page() ) {

			$sidebar_custom = get_aione_page_settings( $post_id, 'aione_per_page_setting','pyre_sidebar_' . $sidebar_position);

			if ( ! empty( $sidebar_custom ) && $sidebar_custom != 'default' ) {

				$sidebar = $sidebar_custom;

			}
		}

		return $sidebar;
	}

}


if ( !function_exists( 'is_enabled_sidebar' ) ) {

	function is_enabled_sidebar( $sidebar_position ) {

		global $theme_options;
		global $post;

		$post_id = $post->ID;

	    // get Post Type e.g.'movie'
		$post_type = get_post_type(	$post_id );

	    // Fetch 'compponents' from options
		$aione_components = get_option( 'aione-components' );

	    // Filter perticular 'component' from 'components'
		$aione_component = $aione_components[$post_type];

	    // get 'templete' slug for Single/Page
		$template_slug_single = $aione_component['single_template'];

	    // get 'templete' slug for Blog/Archive
		$template_slug_archive = $aione_component['archive_template'];

	    // Fetch 'templates' from options
		$aione_templates = get_option( 'aione-templates' );

	    // get 'templete' for Single/Page
		$aione_template_single = $aione_templates[$template_slug_single];
	    // get 'templete' for Blog/Archive
		$aione_template_archive = $aione_templates[$template_slug_archive];

	    // sidebar single
		$is_enabled_single = $aione_template_single['template_sidebar_' . $sidebar_position . '_enable'];

	    // sidebar  archive
		$is_enabled_archive = $aione_template_archive['template_sidebar_' . $sidebar_position . '_enable'];

	    // Global Options
		$is_enabled = $theme_options['sidebar_' . $sidebar_position . '_enable'];


		if ( is_archive() ) {

			if( $post_type == 'post' ){
				
				$theme_options_name = 'blog_archive_' . $sidebar_position . '_sidebar_enable';
				$theme_options_value = $theme_options[$theme_options_name];
				
				if( $theme_options_value ) {
					$is_enabled = 1;
				} else{
					$is_enabled = 0;
				}

			}

			if ( isset( $template_slug_archive ) ) {

				if ( $is_enabled_archive == 'no' ) {
					$is_enabled = 0;
				}

				if ( $is_enabled_archive == 'yes' ) {
					$is_enabled = 1;
				}

			}

		}

		if ( is_home() ) {

			if( $post_type == 'post' ){
				
				$theme_options_name = 'blog_archive_' . $sidebar_position . '_sidebar_enable';
				$theme_options_value = $theme_options[$theme_options_name];
				
				if( $theme_options_value ) {
					$is_enabled = 1;
				} else{
					$is_enabled = 0;
				}

			}

			if ( isset( $template_slug_archive ) ) {

				if ( $is_enabled_archive == 'no' ) {
					$is_enabled = 0;
				}

				if ( $is_enabled_archive == 'yes' ) {
					$is_enabled = 1;
				}

			}

		}

		if ( is_single() ) {

			if( $post_type == 'post' ){
				
				$theme_options_name = 'blog_single_' . $sidebar_position . '_sidebar_enable';
				$theme_options_value = $theme_options[$theme_options_name];
				
				if( $theme_options_value ) {
					$is_enabled = 1;
				} else{
					$is_enabled = 0;
				}

			}

	        //Template Options Enable
			if ( isset( $template_slug_single ) ) {

				if ( $is_enabled_single == 'no' ) {
					$is_enabled = 0;
				}

				if ( $is_enabled_single == 'yes' ) {
					$is_enabled = 1;
				}

			}

	        //Per page Options Enable
			$is_enabled_custom = get_aione_page_settings( $post_id, 'aione_per_page_setting','pyre_sidebar_' . $sidebar_position . '_enable' );

			if ( $is_enabled_custom == 'no' ) {

				$is_enabled = 0;

			}

			if ( $is_enabled_custom == 'yes' ) {

				$is_enabled = 1;

			}
		}
		
		if ( is_page() ) {

			$is_enabled = is_enabled( $post_id, 'sidebar_' . $sidebar_position . '_enable' );

		}

		return $is_enabled;
	}

}




if ( !function_exists( 'get_aione_page_option' ) ) {

	function get_aione_page_option( $post_id, $meta_key ) {

		$meta_value = trim( get_post_meta($post_id, $meta_key, true) );

		return $meta_value;
	}

}

if ( !function_exists( 'get_aione_page_settings' ) ) {

	function get_aione_page_settings( $post_id, $meta_key,$setting_name = '') {		
		$meta_value =  get_post_meta($post_id, $meta_key, true );		
		if($meta_value){
			if($setting_name == ''){
				return $meta_value;
			} else {			
				return $meta_value[$setting_name];
			}
		} else {
			return $meta_value;
		}
	}
}


if ( !function_exists( 'is_fullwidth' ) ) {

	function is_fullwidth( $id, $component ) {

		global $theme_options;
		global $post;
		$fullwidth = false;

		//$page_option = trim( get_aione_page_option( $id, 'pyre_' . $component . '_100_width' ) );
		$page_option = trim( get_aione_page_settings( $id, 'aione_per_page_setting','pyre_' . $component . '_100_width' ) );

		if ( $page_option == 'default' || empty($page_option ) ) {

			if ( $theme_options[$component . '_100_width']) {

				$fullwidth = true;

			}

		} else {

			if ($page_option == 'yes') {

				$fullwidth = true;

			}
		}

		if ($fullwidth) {

			$fullwidth_class = "fullwidth";

		} else {

			$fullwidth_class = "";

		}

		return $fullwidth_class;
	}

}



if ( !function_exists( 'get_page_id' ) ) {

	function get_page_id(){

		$blog = false;
		global $post;

		if (is_front_page() && is_home()) {

			$blog = false;

		} elseif ( is_front_page() ) {

			$blog = false;

		} elseif ( is_home() ) {

			$blog = true;

		} else {

			$blog = false;

		}

		if ( $blog == true ) {

		    return get_option( 'page_for_posts' ); // Returns blog page ID

		} else {

			return $post->ID;

		}
	}

}


if ( !function_exists( 'is_enabled' ) ) {

	function is_enabled( $id, $component ){

		global $theme_options;
		$is_enabled = false;

		//$page_option = get_aione_page_option($id, 'pyre_' . $component );
		$page_option = get_aione_page_settings($id,'aione_per_page_setting', 'pyre_' . $component );

	    /*
	    if( $component == 'slider_enable' ){
	        // echo "<br>ID ==".$post->ID;
	        echo "<br>ID: ".$id;
	        echo "<br>Element: ".$component;
	        echo "<br>Global: ".$theme_options[$component];
	        echo "<br>Local: ".$page_option;
	    }
	    */
	    

	    if( $page_option == "default" || empty( $page_option ) ) {

	        if(   $theme_options[$component]  ) {

	            $is_enabled = true;

	        }

	    } else {

	        if( $page_option == "yes" ) {

	        	$is_enabled = true;

	        }

	    }

	    return $is_enabled;
	}

}

if ( !function_exists( 'empty_sidebar_message' ) ) {

	function empty_sidebar_message(){

		$output = '';
		$output .= 'Empty Widget Area';

		return $output;
	}

}

/*function aione_filters($wp_query = null){
	$output = "";
	global $post;
	if ($wp_query == null) {
		global $wp_query;
	}

	if( isset( $_POST["aione_filters_searchsubmit"]) && isset($_POST["search"]) && $_POST["search"] == "aione_filters_search"){
		$search_category = $_POST["filter_cat"];
	} else {
		$search_category = "-1";
	} 
	$output .= '<div class="filters">';
		//if($category == "true"){
			$output .= '<form method="post" id="aione_filters_searchform" role="search" action="">';
			$output .= '<input type="hidden" name="search" value="aione_filters_search">';
			$output .= '<label for="category" class="">Category</label>';
			$args = array(
				'show_option_all'    => '',
				'show_option_none'   => __( 'Select category', 'aione-app-builder' ),
				'option_none_value'  => '-1',
				'orderby'            => 'name',
				'order'              => 'ASC',
				'show_count'         => 1,
				'hide_empty'         => 1,
				'child_of'           => 0,
				'exclude'            => '',
				'include'            => '',
				'echo'               => 1,
				'selected'           => $search_category,
				'hierarchical'       => 1,
				'name'               => 'filter_cat',
				'id'                 => '',
				'class'              => '',
				'depth'              => 0,
				'tab_index'          => 0,
				'taxonomy'           => 'category',
				'hide_if_empty'      => false,
				'value_field'	     => 'term_id',
			);
		    $output .= wp_dropdown_categories( $args );
		//}
		$output .= '<input type="submit" name = "aione_filters_searchsubmit" id="searchsubmit" value="Search" />';
		$output .= '</form>';
	$output .= '</div>';

	return $output;
}*/
