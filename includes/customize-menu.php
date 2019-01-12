<?php
// add_filter('nav_menu_css_class','arg_menu_classes',110,3);
function arg_menu_classes($classes, $item, $args) {
	if($args->menu_id == 'primary-menu') { // name need menu
        $classes[] = ''; // add classes
    }
    return $classes;
}



?>