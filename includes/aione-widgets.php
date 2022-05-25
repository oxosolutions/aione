<?php

/**
* Register Aione Widgets
*/
add_action('widgets_init', function () {

	register_widget( 'Aione_DesignBy_Widget' );
	register_widget( 'Aione_Copyright_Widget' );
	//register_widget( 'Aione_Fontsize_Widget' );
	register_widget( 'Aione_Breadcrumbs_Widget' );
	register_widget( 'Aione_Navigation_Menu_Widget' );

});

class Aione_Navigation_Menu_Widget extends WP_Widget {
	public function __construct() {
        $widget_ops = array(
            'description'                 => __( 'Add a navigation menu to your sidebar.' ),
            'customize_selective_refresh' => true,
            'show_instance_in_rest'       => true,
        );
        parent::__construct( 'widget_aione_nav_menu', __( 'Aione Navigation Menu' ), $widget_ops );
    }

    public function widget( $args, $instance ) {
        // Get menu.
      	$widget_settings = get_option('widget_aione_nav_menu');
 
        $aione_nav_menu = ! empty( $instance['widget_aione_nav_menu'] ) ? wp_get_nav_menu_object( $instance['widget_aione_nav_menu'] ) : false;
 
        if ( ! $aione_nav_menu ) {
            return;
        }
 
        $default_title = __( 'Menu' );
        $title         = ! empty( $instance['title'] ) ? $instance['title'] : '';
 
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
 
        echo $args['before_widget'];
 
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
 
        $format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';
 
       
        $format = apply_filters( 'navigation_widgets_format', $format );
 
        if ( 'html5' === $format ) {
            // The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
            $title      = trim( strip_tags( $title ) );
            $aria_label = $title ? $title : $default_title;
 
            $nav_menu_args = array(
                'fallback_cb'          => '',
                'menu'                 => $aione_nav_menu,
                'container'            => 'nav',
                'container_aria_label' => $aria_label,
                'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            );
        } else {
            $nav_menu_args = array(
                'fallback_cb' => '',
                'menu'        => $aione_nav_menu,
            );
        }
 
  		wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $aione_nav_menu, $args, $instance ) );
        //wp_nav_menu($nav_menu_args);
 
        echo $args['after_widget'];
    }
   
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        if ( ! empty( $new_instance['title'] ) ) {
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
        }
        if ( ! empty( $new_instance['widget_aione_nav_menu'] ) ) {
            $instance['widget_aione_nav_menu'] = (int) $new_instance['widget_aione_nav_menu'];
        }
       

        $instance['show_description'] = isset( $new_instance['show_description'] ) ? 'true' : 'false';
        return $instance;
    }

    public function form( $instance ) {
        global $wp_customize;
        $title    = isset( $instance['title'] ) ? $instance['title'] : '';
        $aione_nav_menu = isset( $instance['widget_aione_nav_menu'] ) ? $instance['widget_aione_nav_menu'] : '';
        $instance['show_description'] = isset( $new_instance['show_description'] ) ? 'true' : 'false';
 
        // Get menus.
        $menus = wp_get_nav_menus();
 
        $empty_menus_style     = '';
        $not_empty_menus_style = '';
        if ( empty( $menus ) ) {
            $empty_menus_style = ' style="display:none" ';
        } else {
            $not_empty_menus_style = ' style="display:none" ';
        }
 
        $nav_menu_style = '';
        if ( ! $aione_nav_menu ) {
            $nav_menu_style = 'display: none;';
        }
 
        // If no menus exists, direct the user to go and create some.
        ?>
        <p class="nav-menu-widget-no-menus-message" <?php echo $not_empty_menus_style; ?>>
            <?php
            if ( $wp_customize instanceof WP_Customize_Manager ) {
                $url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
            } else {
                $url = admin_url( 'nav-menus.php' );
            }
 
            /* translators: %s: URL to create a new menu. */
            printf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) );
            ?>
        </p>
        <div class="nav-menu-widget-form-controls" <?php echo $empty_menus_style; ?>>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'widget_aione_nav_menu' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
                <select id="<?php echo $this->get_field_id( 'widget_aione_nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'widget_aione_nav_menu' ); ?>">
                    <option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
                    <?php foreach ( $menus as $menu ) : ?>
                        <option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $aione_nav_menu, $menu->term_id ); ?>>
                            <?php echo esc_html( $menu->name ); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'show_description' ); ?>"><?php _e( 'Show Description:' ); ?></label>
                <input type="checkbox" class="widefat" id="<?php echo $this->get_field_id( 'show_description' ); ?>" name="<?php echo $this->get_field_name( 'show_description' ); ?>" <?php checked( 'true', $instance['show_description'], $echo, 'checked' ); ?>>
            </p>
            <?php if ( $wp_customize instanceof WP_Customize_Manager ) : ?>
                <p class="edit-selected-nav-menu" style="<?php echo $nav_menu_style; ?>">
                    <button type="button" class="button"><?php _e( 'Edit Menu' ); ?></button>
                </p>
            <?php endif; ?>
        </div>
        <?php
    }
}


class Aione_DesignBy_Widget extends WP_Widget {
	public function __construct() {

		$widget_options = array(
			'classname'   => 'aione_designedby_widget',
			'description' => '',
		);
		parent::__construct('aione_designedby_widget', 'Aione Designed by', $widget_options);
		
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$aione_company_name 	= $instance['company_name'];
		$aione_company_website 	= $instance['company_website'];
		$aione_tooltip 			= $instance['tooltip'];
		$aione_tooltip_class 	= !empty( $instance['tooltip'] ) ? 'aione-tooltip' : '';

		$html = '<p>Designed by <a class="' . $aione_tooltip_class . '" title="' . $aione_tooltip . '" href="' . $aione_company_website . '" target="_blank" rel="noopener">' . $aione_company_name . '</a></p>';

		echo $html;
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$company_name 	 = !empty( $instance['company_name'] ) ? $instance['company_name'] : '';
		$company_website = !empty( $instance['company_website'] ) ? $instance['company_website'] : '';
		$tooltip 		 = !empty( $instance['tooltip'] ) ? $instance['tooltip'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'company_name' ) ); ?>">
				<?php esc_attr_e( 'Company Name', 'aione' ); ?>
			</label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'company_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'company_name' ) ); ?>"
			type="text" value="<?php echo esc_attr( $company_name ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'company_website' ) ); ?>">
				<?php esc_attr_e( 'Company Website', 'aione' );?>
			</label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'company_website' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'company_website' ) ); ?>"
			type="text" value="<?php echo esc_attr( $company_website ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tooltip') ); ?>">
				<?php esc_attr_e( 'Tooltip', 'aione' );?>
			</label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tooltip' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tooltip' ) ); ?>"
			type="text" value="<?php echo esc_attr( $tooltip ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['company_name'] 	 = $new_instance['company_name'];
		$instance['company_website'] = $new_instance['company_website'];
		$instance['tooltip'] 		 = $new_instance['tooltip'];
		
		return $instance;
	}
}



class Aione_Copyright_Widget extends WP_Widget {
	
	public function __construct() {
		
		$widget_options = array(
			'classname'   => 'aione_copyright_widget',
			'description' => '',
		);
		parent::__construct( 'aione_copyright_widget', 'Aione Copyright', $widget_options );
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$html = '<p>©' . date('Y') . ' <a href="' . home_url() . '">' . get_bloginfo( 'name' ) . '</a>. All rights reserved.</p>';
		echo $html;

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		
	}

	public function update( $new_instance, $old_instance ) {
		$old_instance = $new_instance;
		$instance = $old_instance;
		return $instance;
	}
}



/**
 * Aione Fontsize Widget
 *
 */
class Aione_Fontsize_Widget extends WP_Widget {
	
	public function __construct() {
		$widget_options = array(
			'classname'   => 'aione_fontsize_widget',
			'description' => 'Display screen font size controller',
		);
		parent::__construct( 'aione_fontsize_widget', 'Aione Font size', $widget_options );
	}

	public function widget( $args, $instance ) {
		
		echo $args['before_widget'];

		do_shortcode('[aione-fontsize]');

		echo $args['after_widget'];
	}

	public function form( $instance ) {

	}

	public function update( $new_instance, $old_instance ) {

	}
}

add_shortcode('aione-fontsize', 'aione_fontsize_callback');

function aione_fontsize_callback() {

	$html  = "";
	$html .= '<ul class="aione-fontsize">';
	$html .= '<li class="aione-fontsize-decrease"><a href="#">A</a></li>';
	$html .= '<li class="aione-fontsize-reset"><a href="#">A</a></li>';
	$html .= '<li class="aione-fontsize-increase"><a href="#">A</a></li>';
	$html .= '</ul>';

	echo $html;
}






/**
 * Aione Breadcrumbs Widget
 *
 */

class Aione_Breadcrumbs_Widget extends WP_Widget {
	
	public function __construct() {
		$widget_options = array(
			'classname'   => 'aione_breadcrumbs_widget',
			'description' => 'Settings',
		);
		parent::__construct('aione_breadcrumbs_widget', 'Aione Breadcrumbs', $widget_options);
	}

	public function widget( $args, $instance ) {
		
		echo $args['before_widget'];

		do_shortcode('[aione-breadcrumbs]');

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		
		$breadcrumb_separator = !empty( $instance['breadcrumb_separator'] ) ? $instance['breadcrumb_separator'] : '';
		?>
		<div class="option-box">
			<p class="option-title">
				<?php echo _e('Breadcrumb Separator.', 'aione'); ?>
			</p>
			<input type="text" placeholder="»" name="<?php echo $this->get_field_name('breadcrumb_separator'); ?>" value="<?php echo esc_attr( $breadcrumb_separator ); ?>" />
		</div>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['breadcrumb_separator'] = strip_tags($new_instance['breadcrumb_separator']);
		$breadcrumb_separator = sanitize_text_field($instance['breadcrumb_separator']);
		update_option('aione_breadcrumb_separator', $breadcrumb_separator);
		return $instance;
	}
}

function breadcrumb_shorten_string( $string, $shorten_style = 'word', $wordcount = 4, $ending = '...' ) {

	if ( empty( $wordcount ) ) {
		$wordcount = 4;
	}
	if ( $shorten_style == 'word' ) {
        $retval = $string; //    Just in case of a problem
        $array  = explode(" ", $string);

        if ( count( $array ) <= $wordcount) {
        	$retval = $string;
        } else {
        	array_splice( $array, $wordcount );
        	$retval = implode(" ", $array) . $ending;
        }

        return $retval;

    } else if ( $shorten_style == 'character' ) {
    	if ( strlen( $string ) > $wordcount ) {
    		$stringCut = substr( $string, 0, $wordcount );
    		$string = substr( $stringCut, 0, strrpos( $stringCut, ' ') );

    		return $string . $ending;
    	} else {
    		return $string;
    	}
    }
}

function breadcrumb_get_page_childs( $breadcrumb_separator ) {
	
	global $post;
	$home = get_page( get_option( 'page_on_front' ) );

	$html = '';

	for ( $i = count($post->ancestors) - 1; $i >= 0; $i-- ) {
		if ( ( $home->ID ) != ( $post->ancestors[$i] ) ) {
			$html .= '<li>';
			$html .= '<a href="';
			$html .= get_permalink( $post->ancestors[$i] );
			$html .= '">';
			$html .= get_the_title( $post->ancestors[$i] );
			$html .= '</a>';
			$html .= '</li>';
		}
	}

	$html .= '<li><a title="' . get_the_title() . '" href="#">' . breadcrumb_shorten_string( get_the_title() ) . '</a></li>';

	return $html;
}

add_shortcode( 'aione-breadcrumbs', 'aione_breadcrumbs_callback' );

function aione_breadcrumbs_callback() {
	global $post;
	$breadcrumb_separator = get_option( 'aione_breadcrumb_separator' );
	$html = "";
	$html .= '<ul class="aione-breadcrumbs">';
	if ( is_front_page() && is_home() ) {

		$html .= '<li><a title="' . get_bloginfo('name') . '" href="#"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';
	} elseif ( is_front_page() ) {

		$html .= '<li><a title="' . get_bloginfo('name') . '" href="#"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';
	} elseif ( is_home() ) {

		$html .= '<li><a title="' . get_bloginfo('name') . '" href="#"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';
		$html .= '<li><a title="' . get_the_title() . '" href="#">' . get_page(get_option('page_for_posts'))->post_title . '<span></span></a></li>';

	} else if ( is_attachment() ) {

		$current_attachment_id   = get_query_var('attachment_id');
		$current_attachment_link = get_attachment_link( $current_attachment_id );

		$html .= '<li><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><span><ion-icon name="home"></ion-icon></span></a></li>';
		$html .= '<li><a href="' . $current_attachment_link . '">' . get_the_title() . '<span></span></a></li>';

	} else if ( is_singular() ) {

		$post_parent_id      = wp_get_post_parent_id( get_the_ID() );
		$parent_title        = get_the_title( $post_parent_id );
		$paren_get_permalink = get_permalink( $post_parent_id );

		$html .= '<li><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';

		if ( is_page() ) {

			if ( $post->post_parent ) {

				$html .= breadcrumb_get_page_childs( $breadcrumb_separator );

			} else {

				$html .= '<li><a title="' . get_the_title() . '" href="#">' . breadcrumb_shorten_string( get_the_title() ) . '<span></span></a></li>';
			}
		} else {
			
			$permalink_structure = get_option( 'permalink_structure', true );
			$permalink_structure = str_replace( '%postname%', '', $permalink_structure );
			$permalink_structure = str_replace( '%post_id%', '', $permalink_structure );

			$permalink_items = array_filter( explode( '/', $permalink_structure ) );

			global $post;
			$author_id 		  = $post->post_author;
			$author_posts_url = get_author_posts_url( $author_id );
			$author_name 	  = get_the_author_meta( 'display_name', $author_id );

			$post_date_year  = get_the_time('Y');
			$post_date_month = get_the_time('m');
			$post_date_day   = get_the_time('d');

			$get_month_link = get_month_link( $post_date_year, $post_date_month );
			$get_year_link 	= get_year_link( $post_date_year );
			$get_day_link 	= get_day_link( $post_date_year, $post_date_month, $post_date_day );

			$html_permalink = '';

			if ( !empty( $permalink_structure ) && get_post_type() == 'post' ) {

				if ( in_array( '%year%', $permalink_items ) ) {

					$html_permalink .= '<li><a title="' . get_the_title() . '" href="' . $get_year_link . '">' . breadcrumb_shorten_string($post_date_year) . '<span></span></a></li>';
				}

				if ( in_array( '%monthnum%', $permalink_items ) ) {

					$html_permalink .= '<li><a title="' . get_the_title() . '" href="' . $get_month_link . '">' . breadcrumb_shorten_string( $post_date_month ) . '<span></span></a></li>';
				}

				if ( in_array( '%author%', $permalink_items ) ) {

					$html_permalink .= '<li><a title="' . get_the_title() . '" href="' . $author_posts_url . '">' . breadcrumb_shorten_string( $author_name ) . '<span></span></a></li>';
				}

				if ( in_array( '%day%', $permalink_items ) ) {

					$html_permalink .= '<li><a itemprop="item" title="' . get_the_title() . '" href="' . $get_day_link . '">' . breadcrumb_shorten_string( $post_date_day ) . '<span></span></a></li>';
				}

				if ( in_array( '%category%', $permalink_items ) ) {

					$post_categories = get_the_category();

					if ( !empty( $post_categories ) ) {

						$parent_cat_links = get_category_parents( $post_categories[0]->term_id, true, ',' );

						$parent_cat_links = array_filter( explode( ",", $parent_cat_links ) );

						foreach ( $parent_cat_links as $link ) {
							$html_permalink .= '<li>' . $link . '</li>';
						}
					}
				}
				$html .= $html_permalink;
			}

			$html .= '<li><a href="#">' . ucwords( get_post_type( get_the_ID() ) ) . '<span></span></a></li>';
			$html .= '<li><a title="' . get_the_title() . '" href="#">' . breadcrumb_shorten_string( get_the_title() ) . '<span></span></a></li>';

		}

	} else if ( is_category() ) {

		$current_cat_id   = get_query_var( 'cat' );
		$parent_cat_links = get_category_parents( $current_cat_id, true, ',' );
		$parent_cat_links = explode( ",", $parent_cat_links );
		$html .= '<li><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';
		$html .= '<li><a href="#">Category<span></span></a></li>';
		foreach ( $parent_cat_links as $link ) {
			if ( $link ) {
				$html .= '<li>' . $link . '</li>';
			}
		}

	} else if ( is_tag() ) {

		$current_tag_id   = get_query_var( 'tag_id' );
		$current_tag      = get_tag( $current_tag_id );
		$current_tag_name = $current_tag->name;

		$current_tag_link = get_tag_link( $current_tag_id );

		$html .= '<li><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';
		$html .= '<li><a href="#">Tag<span></span></a></li>';
		$html .= '<li><a title="' . get_bloginfo('name') . '" href="' . $current_tag_link . '">' . $current_tag_name . '<span></span></a></li>';

	} else if ( is_author() ) {

		$html .= '<li><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';
		$html .= '<li><a href="#">Author<span></span></a></li>';
		$html .= '<li><a href="' . esc_url( get_author_posts_url( get_the_author_meta("ID") ) ) . '">' . get_the_author() . '<span></span></a></li>';

	} else if ( is_search() ) {

		$current_query = sanitize_text_field( get_query_var('s') );

		$html .= '<li><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';

		if ( empty($current_query) ) {

			$current_query = __('Search:', 'aione');

		} else {

			$current_query = __('Search:', 'aione') . ' ' . $current_query;

		}

		$html .= '<li><a href="#">' . $current_query . '<span></span></a></li>';

	} else if ( is_year() ) {

		$html .= '<li><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';
		$html .= '<li><a href="#">' . get_the_date( 'Y' ) . '<span></span></a></li>';

	} else if ( is_month() ) {

		$html .= '<li><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';
		$html .= '<li><a href="#">' . get_the_date( 'F' ) . '<span></span></a></li>';

	} else if ( is_date() ) {

		$html .= '<li><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';
		$html .= '<li><a href="#">' . get_the_date() . '<span></span></a></li>';

	} elseif ( is_404() ) {

		$html .= '<li><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';
		$html .= '<li><a href="#">404<span></span></a></li>';

	} elseif ( is_archive() ) {

		if ( is_post_type_archive() ) {

			$html .= '<li><a title="' . get_bloginfo('name') . '" href="' . get_bloginfo('url') . '"><span class="aione-icon"><ion-icon name="home"></ion-icon></span></a></li>';
			$html .= '<li><a href="#">' . str_replace( 'Archives:', '', get_the_archive_title() ) . '<span></span></a></li>';

		}

	} else {
		$html .= '';
	}

	$html .= '</ul>';

	echo $html;
}




