<?php
    if( ! defined( 'ABSPATH' ) ) {
        die;
    }

    if(!$theme_options['disable_megamenu']) {
        require_once( get_template_directory() . '/framework/class-mega-nav.php' );
    } else {
        // Dont duplicate me!
        if( ! class_exists( 'Main_Navigation_Menu' ) ) {
            class Main_Navigation_Menu extends Walker_Nav_Menu {

                function start_lvl(&$output, $depth=0, $args=array()) {
                    $indent = str_repeat( "\t", $depth );

                    if( $depth === 0) {
                        $output .= "\n$indent<ul class=\"sub-menu \">\n";
                    } elseif( $depth >= 2 ) {
                        $output .= "\n$indent<ul class=\"sub-menu deep-level  \">\n";
                    } else {
                        $output .= "\n$indent<ul class=\"sub-menu\">\n";
                    }
                }

                // Displays end of a level. E.g '</ul>'
                // @see Walker::end_lvl()
                function end_lvl(&$output, $depth=0, $args=array()) {
                    $indent = str_repeat( "\t", $depth );
                    $output .= "$indent</ul>\n";
                }

                public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
                    global $theme_options;

                    $item_output = $class_columns = '';
                    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

                    $atts = array();
                    $atts['title']  = ! empty( $item->attr_title )	? 'title="'  . esc_attr( $item->attr_title ) .'"' : '';
                    $atts['target'] = ! empty( $item->target )	    ? 'target="' . esc_attr( $item->target     ) .'"' : '';
                    $atts['rel']    = ! empty( $item->xfn )		    ? 'rel="'    . esc_attr( $item->xfn        ) .'"' : '';
                    $atts['url']    = ! empty( $item->url )         ? 'href="'   . esc_attr( $item->url        ) .'"' : '';

                    $attributes = implode( ' ', $atts );

                    $item_output .= $args->before;
                    $item_output .= '<a '. $attributes .'>';

                    $item_output .= '<span class="menu-item-text" data-hover="' . esc_attr( $item->title ) .'">';

                    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

                    if( $depth === 0 && $args->has_children ) {
                        $item_output .= ' <span class="caret"></span>';
                    }
                    $item_output .= '</span>';
                    if($theme_options['main_nav_show_description']){
                        $item_output .= '<span class="menu-item-description">'.esc_attr( $item->description).'</span>';
                    }
                    $item_output .= '</a>';
                    $item_output .= $args->after;


                    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

                    $class_names = $value = '';
                    $classes = empty( $item->classes ) ? array() : ( array ) $item->classes;
                    $classes[] = 'menu-item-' . $item->ID;
                    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

                    if( $depth === 0 && $args->has_children ) {
                        $class_names .= ' aione-dropdown-menu';
                    }

                    if ( $depth === 1 ) {
                        $class_names .= ' aione-dropdown-submenu';
                    }

                    $class_names = $class_names ? ' class="' . esc_attr( $class_names ). $class_columns . '"' : '';

                    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
                    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

                    $output .= $indent . '<li' . $id . $value . $class_names .'>';

                    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

                }

                function end_el( &$output, $item, $depth = 0, $args = array() ) {
                    $output .= "</li>\n";
                }

                public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
                    if ( ! $element )
                        return;

                    $id_field = $this->db_fields['id'];

                    // Display this element.
                    if ( is_object( $args[0] ) )
                        $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

                    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
                }
            }
        }
    }



    /*********************************************************************************************
     *  Class: Main Navigation Menu Fallback Class
     *  Menu Location: Main Navigation(Primary Menu)
     *  Since: 1.8
     *********************************************************************************************/
    // Dont duplicate me!
    if( ! class_exists( 'Main_Navigation_Fallback_Walker_Page' ) ) {
        class Main_Navigation_Fallback_Walker_Page extends Walker_Page {

            function start_lvl(&$output, $depth=0, $args=array()) {
                $indent = str_repeat( "\t", $depth );

                if( $depth === 0) {
                    $output .= "\n$indent<ul class=\"sub-menu \">\n";
                } elseif( $depth >= 2 ) {
                    $output .= "\n$indent<ul class=\"sub-menu deep-level  \">\n";
                } else {
                    $output .= "\n$indent<ul class=\"sub-menu\">\n";
                }
            }

            function end_lvl(&$output, $depth=0, $args=array()) {
                $indent = str_repeat( "\t", $depth );
                $output .= "$indent</ul>\n";
            }


            function start_el(&$output, $page, $depth, $args, $current_page) {
                if ( $depth )
                    $indent = str_repeat("\t", $depth);
                else
                    $indent = '';

                extract($args, EXTR_SKIP);

                $output .= $indent .'<li>';
                $output .= '<a href="'.get_page_link($page->ID).'" title="'.esc_attr( wp_strip_all_tags( apply_filters( 'the_title', $page->post_title, $page->ID ) ) ) . '">';
                $output .= '<span class="menu-item-text" data-hover="' . esc_attr( wp_strip_all_tags( apply_filters( 'the_title', $page->post_title, $page->ID ) ) ) .'">';
                $output .= apply_filters( 'the_title', $page->post_title, $page->ID );
                $output .= '</span></a>';
            }
            function end_el( &$output, $item, $depth = 0, $args = array() ) {
                $output .= "</li>\n";
            }
        }
    }
