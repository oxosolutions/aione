<?php

global $theme_options;
if(  $theme_options['main_nav_show_description'] ){
	add_filter( 'walker_nav_menu_start_el', 'aione_nav_description', 10, 4 );
	function aione_nav_description( $item_output, $item, $depth, $args ) {
	    if ( !empty( $item->description ) ) {
	        $item_output = str_replace( '</a>', '<span class="menu-item-description">' . $item->description . '</span>' . '</a>', $item_output );
	    }
	 
	    return $item_output;
	}
}
