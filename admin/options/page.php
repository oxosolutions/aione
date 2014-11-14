<?php
/*********************************************************************************************
 *
 *  pages settings
 *
 *********************************************************************************************/

$this->sections[] = array(
    'icon'      => 'el-icon-file',
    'title'     => __('Pages Settings', 'redux-framework-demo'),
    'fields'    => array(


    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-home',
    'title'     => __('Home Page Settings', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(

    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-tumblr',
    'title'     => __('Testimonials Settings', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(

    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-question',
    'title'     => __('FAQ Page Settings', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(

    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-search',
    'title'     => __('Search Page Settings', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'search',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Search Options</h3>',
        ),
        array (
            'desc' => 'Select the layout for the search results page.',
            'id' => 'search_layout',
            'type' => 'select',
            'options' => array (
                'Large' => 'Large',
                'Medium' => 'Medium',
                'Large Alternate' => 'Large Alternate',
                'Medium Alternate' => 'Medium Alternate',
                'Grid' => 'Grid',
                'Timeline' => 'Timeline',
            ),
            'title' => 'Search Results Layout',
            'default' => 'Large',
        ),
        array (
            'desc' => 'Select the sidebar that will display on the search page.',
            'id' => 'search_sidebar',
            'type' => 'select',
            'options' => array (
                0 => 'None',
                1 => 'Blog Sidebar',
                2 => 'Footer Widget 1',
                3 => 'Footer Widget 2',
                4 => 'Footer Widget 3',
                5 => 'Footer Widget 4',
                6 => 'SlidingBar Widget 1',
                7 => 'SlidingBar Widget 2',
                8 => 'SlidingBar Widget 3',
                9 => 'SlidingBar Widget 4',
            ),
            'title' => 'Search Page Sidebar',
            'default' => 'None',
        ),
        array (
            'desc' => 'Select the sidebar position for the search page.',
            'id' => 'search_sidebar_position',
            'type' => 'select',
            'options' => array (
                'Right' => 'Right',
                'Left' => 'Left',
            ),
            'title' => 'Search Sidebar Position',
            'default' => 'Right',
        ),
        array (
            'desc' => 'Select the type of content to display in search results.',
            'id' => 'search_content',
            'type' => 'select',
            'options' => array (
                'Posts and Pages' => 'Posts and Pages',
                'Only Posts' => 'Only Posts',
                'Only Pages' => 'Only Pages',
            ),
            'title' => 'Search Results Content',
            'default' => 'Posts and Pages',
        ),
        array (
            'desc' => 'Check the box if you want to hide excerpt for search results.',
            'id' => 'search_excerpt',
            'type' => 'checkbox',
            'title' => 'Hide Search Results Excerpt',
        ),
        array (
            'desc' => 'Set the number of search results per page.',
            'id' => 'search_results_per_page',
            'type' => 'text',
            'title' => 'Number of Search Results Per Page',
            'default' => '10',
        ),
        array (
            'desc' => 'Check the box if you want to hide featured images for search results.',
            'id' => 'search_featured_images',
            'type' => 'checkbox',
            'title' => 'Hide Featured Images from Search Results',
        ),

    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-phone',
    'title'     => __('Contact Page Settings', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'google_map',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Google Map Options</h3>',
        ),
        array (
            'desc' => 'Select the type of google map to show on the contact page.',
            'id' => 'gmap_type',
            'options' => array (
                'roadmap' => 'roadmap',
                'satellite' => 'satellite',
                'hybrid' => 'hybrid',
                'terrain' => 'terrain',
            ),
            'type' => 'select',
            'title' => 'Google Map Type',
            'default' => 'roadmap',
        ),
        array (
            'desc' => 'In pixels or percentage, ex: 100% or 100px.',
            'id' => 'gmap_width',
            'type' => 'text',
            'title' => 'Google Map Width',
            'default' => '100%',
        ),
        array (
            'desc' => 'In pixels, ex: 100px.',
            'id' => 'gmap_height',
            'type' => 'text',
            'title' => 'Google Map Height',
            'default' => '415px',
        ),
        array (
            'desc' => 'This will only be applied to maps that are not 100% width. It controls the distance to menu/page title. In pixels, ex: 100px.',
            'id' => 'gmap_topmargin',
            'type' => 'text',
            'title' => 'Google Map Top Margin',
            'default' => '55px',
        ),
        array (
            'desc' => 'Single address ex: 775 New York Ave, Brooklyn, Kings, New York 11203. <br />For multiple markers, separate the addresses with the | symbol.<br /> ex: Address 1|Address 2|Address 3.',
            'id' => 'gmap_address',
            'type' => 'textarea',
            'title' => 'Google Map Address',
            'default' => '775 New York Ave, Brooklyn, Kings, New York 11203',
        ),
        array (
            'desc' => 'Enter the email adress the form will be sent to.',
            'id' => 'email_address',
            'type' => 'text',
            'title' => 'Email Address',
        ),
        array (
            'desc' => 'Higher number will be more zoomed in.',
            'id' => 'map_zoom_level',
            'type' => 'text',
            'title' => 'Map Zoom Level',
            'default' => '8',
        ),
        array (
            'desc' => 'Check the box to hide the address pin.',
            'id' => 'map_pin',
            'type' => 'checkbox',
            'title' => 'Hide Address Pin',
        ),
        array (
            'desc' => 'Check the box to keep the popup graphic with address info hidden when the google map loads. It will only show when the pin on the map is clicked.',
            'id' => 'map_popup',
            'type' => 'checkbox',
            'title' => 'Show Map Popup On Click',
        ),
        array (
            'desc' => 'Check the box to disable scrollwheel on google maps.',
            'id' => 'map_scrollwheel',
            'type' => 'checkbox',
            'title' => 'Disable Map Scrollwheel',
        ),
        array (
            'desc' => 'Check the box to disable scale on google maps.',
            'id' => 'map_scale',
            'type' => 'checkbox',
            'title' => 'Disable Map Scale',
        ),
        array (
            'desc' => 'Check the box to disable zoom control icon and pan control icon on google maps.',
            'id' => 'map_zoomcontrol',
            'type' => 'checkbox',
            'title' => 'Disable Map Zoom & Pan Control Icons',
        ),
        array (
            'id' => 'google_map',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Google Map Design Styling</h3>',
        ),
        array (
            'desc' => 'Choose default styling for classic google map styles. Choose theme styling for our custom style. Choose custom styling to make your own with the advanced options below.',
            'id' => 'map_styling',
            'options' => array (
                'default' => 'Default Styling',
                'theme' => 'Theme Styling',
                'custom' => 'Custom Styling',
            ),
            'type' => 'select',
            'title' => 'Select the Map Styling',
            'default' => 'default',
        ),
        array (
            'desc' => 'Custom styling setting only. Pick an overlaying color for the map. Works best with "roadmap" type.',
            'id' => 'map_overlay_color',
            'type' => 'color',
            'title' => 'Map Overlay Color',
        ),
        array (
            'desc' => 'Custom styling setting only. Choose between default or custom info box.',
            'id' => 'map_infobox_styling',
            'options' => array (
                'default' => 'Default Infobox',
                'custom' => 'Custom Infobox',
            ),
            'type' => 'select',
            'title' => 'Info Box Styling',
            'default' => 'default',
        ),
        array (
            'desc' => 'Custom styling setting only. Type in custom info box content to replace address string. For multiple addresses, separate info box contents by using the | symbol. ex: InfoBox 1|InfoBox 2|InfoBox 3',
            'id' => 'map_infobox_content',
            'type' => 'textarea',
            'title' => 'Info Box Content',
        ),
        array (
            'desc' => 'Custom styling setting only. Pick a color for the info box background.',
            'id' => 'map_infobox_bg_color',
            'type' => 'color',
            'title' => 'Info Box Background Color',
        ),
        array (
            'desc' => 'Custom styling setting only. Pick a color for the info box text.',
            'id' => 'map_infobox_text_color',
            'type' => 'color',
            'title' => 'Info Box Text Color',
        ),
        array (
            'desc' => 'Custom styling setting only. Use full image urls for custom marker icons or input "theme" for our custom marker. For multiple addresses, separate icons by using the | symbol or use one for all. ex: Icon 1|Icon 2|Icon 3',
            'id' => 'map_custom_marker_icon',
            'type' => 'textarea',
            'title' => 'Custom Marker Icon',
        ),
        array (
            'id' => 'recaptcha',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>ReCaptcha Spam Options</h3>',
        ),
        array (
            'desc' => 'Follow the steps in <a href=\'http://oxosolutions.com/aione-doc/pages/setting-up-contact-page/\'> our docs</a> to get key.',
            'id' => 'recaptcha_public',
            'type' => 'text',
            'title' => 'ReCaptcha Public Key',
        ),
        array (
            'desc' => 'Follow the steps in <a href=\'http://oxosolutions.com/aione-doc/pages/setting-up-contact-page/\'> our docs</a> to get key.',
            'id' => 'recaptcha_private',
            'type' => 'text',
            'title' => 'ReCaptcha Private Key',
        ),
        array (
            'desc' => 'Select the recaptcha color scheme.',
            'id' => 'recaptcha_color_scheme',
            'type' => 'select',
            'options' => array (
                'red' => 'red',
                'blackglass' => 'blackglass',
                'clean' => 'clean',
                'white' => 'white',
            ),
            'title' => 'ReCaptcha Color Scheme',
            'default' => 'Clean',
        ),
    )
);
?>