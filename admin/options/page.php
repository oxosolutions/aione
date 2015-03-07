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
            'id' => 'search_layout',
            'type' => 'select',
            'title' => __('Search Results Layout','redux-framework-demo'),
            'subtitle'  => __('Search Results Layout.', 'redux-framework-demo'),
            'desc' => __('Select the layout for the search results page.','redux-framework-demo'),
            'options' => array (
                'Large' => 'Large',
                'Medium' => 'Medium',
                'Large Alternate' => 'Large Alternate',
                'Medium Alternate' => 'Medium Alternate',
                'Grid' => 'Grid',
                'Timeline' => 'Timeline',
            ),
            'default' => 'Large',
            'hint' => array(
                'title'   => __('Search Results Layout','redux-framework-demo'),
                'content' => __('Search Results Layout','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'search_sidebar',
            'type' => 'select',
            'title' => __('Search Page Sidebar','redux-framework-demo'),
            'subtitle'  => __('Search Page Sidebar.', 'redux-framework-demo'),
            'desc' => __('Select the sidebar that will display on the search page.','redux-framework-demo'),
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
            'default' => 'None',
            'hint' => array(
                'title'   => __('Search Page Sidebar','redux-framework-demo'),
                'content' => __('Search Page Sidebar','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'search_sidebar_position',
            'type' => 'select',
            'title' => __('Search Sidebar Position','redux-framework-demo'),
            'subtitle'  => __('Search Sidebar Position.', 'redux-framework-demo'),
            'desc' => __('Select the sidebar position for the search page.','redux-framework-demo'),
            'options' => array (
                'Right' => 'Right',
                'Left' => 'Left',
            ),
            'default' => 'Right',
            'hint' => array(
                'title'   => __('Search Sidebar Position','redux-framework-demo'),
                'content' => __('Search Sidebar Position','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'search_content',
            'type' => 'select',
            'title' => __('Search Results Content','redux-framework-demo'),
            'subtitle'  => __('Search Results Content.', 'redux-framework-demo'),
            'desc' => __('Select the type of content to display in search results.','redux-framework-demo'),
            'options' => array (
                'Posts and Pages' => 'Posts and Pages',
                'Only Posts' => 'Only Posts',
                'Only Pages' => 'Only Pages',
            ),
            'default' => 'Posts and Pages',
            'hint' => array(
                'title'   => __('Search Results Content','redux-framework-demo'),
                'content' => __('Search  Results Content','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'search_excerpt',
            'type' => 'switch',
            'title' => __('Hide Search Results Excerpt','redux-framework-demo'),
            'subtitle'  => __('Hide Search Results Excerpt.', 'redux-framework-demo'),
            'desc' => __('Select YES if you want to hide excerpt for search results.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => false,
            'hint' => array(
                'title'   => __('Hide Search Results Excerpt','redux-framework-demo'),
                'content' => __('Hide Search Results Excerpt','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'search_results_per_page',
            'type' => 'text',
            'title' => __('Number of Search Results Per Page','redux-framework-demo'),
            'subtitle'  => __('Number of Search Results Per Page.', 'redux-framework-demo'),
            'desc' => __('Set the number of search results per page.','redux-framework-demo'),
            'default' => '10',
            'hint' => array(
                'title'   => __('Number of Search Results Per Page','redux-framework-demo'),
                'content' => __('Number of Search Results Per Page','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'search_featured_images',
            'type' => 'switch',
            'title' => __('Hide Featured Images from Search Results','redux-framework-demo'),
            'subtitle'  => __('Hide Featured Images from Search Results.', 'redux-framework-demo'),
            'desc' => __('Select YES if you want to hide featured images for search results.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => false,
            'hint' => array(
                'title'   => __('Hide Featured Images from Search Results','redux-framework-demo'),
                'content' => __('Hide Featured Images from Search Results','redux-framework-demo'),
            )
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
            'id' => 'gmap_type',
            'type' => 'select',
            'title' => __('Google Map Type','redux-framework-demo'),
            'subtitle'  => __('Google Map Type.', 'redux-framework-demo'),
            'desc' => __('Select the type of google map to show on the contact page.','redux-framework-demo'),
            'options' => array (
                'roadmap' => 'roadmap',
                'satellite' => 'satellite',
                'hybrid' => 'hybrid',
                'terrain' => 'terrain',
            ),
            'default' => 'roadmap',
            'hint' => array(
                'title'   => __('Google Map Type','redux-framework-demo'),
                'content' => __('Google Map Type.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'gmap_width',
            'type' => 'text',
            'title' => __('Google Map Width','redux-framework-demo'),
            'subtitle'  => __('Google Map Width.', 'redux-framework-demo'),
            'desc' => __('In pixels or percentage, ex: 100% or 100px..','redux-framework-demo'),
            'default' => '100%',
            'hint' => array(
                'title'   => __('Google Map Width','redux-framework-demo'),
                'content' => __('Google Map Width.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'gmap_height',
            'type' => 'text',
            'title' => __('Google Map Height','redux-framework-demo'),
            'subtitle'  => __('Google Map Height.', 'redux-framework-demo'),
            'desc' => __('In pixels, ex: 100px.','redux-framework-demo'),
            'default' => '415px',
            'hint' => array(
                'title'   => __('Google Map Height','redux-framework-demo'),
                'content' => __('Google Map Height.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'gmap_topmargin',
            'type' => 'text',
            'title' => __('Google Map Top Margin','redux-framework-demo'),
            'subtitle'  => __('Google Map Top Margin.', 'redux-framework-demo'),
            'desc' => __('This will only be applied to maps that are not 100% width. It controls the distance to menu/page title. In pixels, ex: 100px.','redux-framework-demo'),
            'default' => '55px',
            'hint' => array(
                'title'   => __('Google Map Top Margin','redux-framework-demo'),
                'content' => __('Google Map Top Margin.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'gmap_address',
            'type' => 'textarea',
            'title' => __('Google Map Address','redux-framework-demo'),
            'subtitle'  => __('Google Map Address.', 'redux-framework-demo'),
            'desc' => __('Single address ex: 775 New York Ave, Brooklyn, Kings, New York 11203. <br />For multiple markers, separate the addresses with the | symbol.<br /> ex: Address 1|Address 2|Address 3.','redux-framework-demo'),
            'default' => '775 New York Ave, Brooklyn, Kings, New York 11203',
            'hint' => array(
                'title'   => __('Google Map Address','redux-framework-demo'),
                'content' => __('Google Map Address.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'email_address',
            'type' => 'text',
            'title' => __('Email Address','redux-framework-demo'),
            'subtitle'  => __('Email Address.', 'redux-framework-demo'),
            'desc' => __('Enter the email adress the form will be sent to.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Email Address','redux-framework-demo'),
                'content' => __(' Email Address.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'map_zoom_level',
            'type' => 'text',
            'title' => __('Map Zoom Level','redux-framework-demo'),
            'subtitle'  => __('Map Zoom Level.', 'redux-framework-demo'),
            'desc' => __('Higher number will be more zoomed in.','redux-framework-demo'),
            'default' => '8',
            'hint' => array(
                'title'   => __('Map Zoom Level','redux-framework-demo'),
                'content' => __('Map Zoom Level.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'map_pin',
            'type' => 'switch',
            'title' => __('Hide Address Pin','redux-framework-demo'),
            'subtitle'  => __('Hide Address Pin.', 'redux-framework-demo'),
            'desc' => __('Hide the address pin.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => false,
            'hint' => array(
                'title'   => __('Hide Address Pin','redux-framework-demo'),
                'content' => __('Hide Address Pin.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'map_popup',
            'type' => 'switch',
            'title' => __('Show Map Popup On Click','redux-framework-demo'),
            'subtitle'  => __('Show Map Popup On Click.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => false,
            'desc' => __('YES to keep the popup graphic with address info hidden when the google map loads. It will only show when the pin on the map is clicked.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Show Map Popup On Click','redux-framework-demo'),
                'content' => __('Show Map Popup On Click.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'map_scrollwheel',
            'type' => 'switch',
            'title' => __('Disable Map Scrollwheel','redux-framework-demo'),
            'subtitle'  => __('Disable Map Scrollwheel.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => false,
            'desc' => __('YES to disable scrollwheel on google maps.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Map Scrollwheel','redux-framework-demo'),
                'content' => __('Disable Map Scrollwheel.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'map_scale',
            'type' => 'switch',
            'title' => __('Disable Map Scale','redux-framework-demo'),
            'subtitle'  => __('Disable Map Scale.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => false,
            'desc' => __('YES to disable scale on google maps.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Map Scale','redux-framework-demo'),
                'content' => __('Disable Map Scale.','redux-framework-demo'),
            )
        ),
        array (

            'id' => 'map_zoomcontrol',
            'type' => 'switch',
            'title' => __('Disable Map Zoom & Pan Control Icons','redux-framework-demo'),
            'subtitle'  => __('Disable Map Zoom & Pan Control Icons.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => false,
            'desc' => __('YES to disable zoom control icon and pan control icon on google maps.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Map Zoom & Pan Control Icons','redux-framework-demo'),
                'content' => __('Disable Map Zoom & Pan Control Icons.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'google_map',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Google Map Design Styling</h3>',
        ),
        array (
            'id' => 'map_styling',
            'options' => array (
                'default' => 'Default Styling',
                'theme' => 'Theme Styling',
                'custom' => 'Custom Styling',
            ),
            'type' => 'select',
            'title' =>  __('Select the Map Styling','redux-framework-demo'),
            'subtitle'  => __('Select the Map Styling.', 'redux-framework-demo'),
            'desc' =>  __('Choose default styling for classic google map styles. Choose theme styling for our custom style. Choose custom styling to make your own with the advanced options below.','redux-framework-demo'),
            'default' => 'default',
            'hint' => array(
                'title'   => __('Select the Map Styling','redux-framework-demo'),
                'content' => __('Select the Map Styling.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'map_overlay_color',
            'type' => 'color',
            'title' => __('Map Overlay Color','redux-framework-demo'),
            'subtitle'  => __('Map Overlay Color.', 'redux-framework-demo'),
            'desc' => __('Custom styling setting only. Pick an overlaying color for the map. Works best with "roadmap" type.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Map Overlay Color','redux-framework-demo'),
                'content' => __('Map Overlay Color.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'map_infobox_styling',
            'options' => array (
                'default' => 'Default Infobox',
                'custom' => 'Custom Infobox',
            ),
            'type' => 'select',
            'title' => __('Info Box Styling','redux-framework-demo'),
            'subtitle'  => __('Info Box Styling.', 'redux-framework-demo'),
            'desc' => __('Custom styling setting only. Choose between default or custom info box.','redux-framework-demo'),
            'default' => 'default',
            'hint' => array(
                'title'   => __('Info Box Styling','redux-framework-demo'),
                'content' => __('Info Box Styling.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'map_infobox_content',
            'type' => 'textarea',
            'title' => __('Info Box Content','redux-framework-demo'),
            'subtitle'  => __('Info Box Content.', 'redux-framework-demo'),
            'desc' => __('Custom styling setting only. Type in custom info box content to replace address string. For multiple addresses, separate info box contents by using the | symbol. ex: InfoBox 1|InfoBox 2|InfoBox 3','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Info Box Content','redux-framework-demo'),
                'content' => __('Info Box Content.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'map_infobox_bg_color',
            'type' => 'color',
            'title' => __('Info Box Background Color','redux-framework-demo'),
            'subtitle'  => __('Info Box Background Color.', 'redux-framework-demo'),
            'desc' => __('Custom styling setting only. Pick a color for the info box background.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Info Box Background Color','redux-framework-demo'),
                'content' => __('Info Box Background Color.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'map_infobox_text_color',
            'type' => 'color',
            'title' => __('Info Box Text Color','redux-framework-demo'),
            'subtitle'  => __('Info Box Text Color.', 'redux-framework-demo'),
            'desc' => __('Custom styling setting only. Pick a color for the info box text.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Info Box Text Color','redux-framework-demo'),
                'content' => __('Info Box Text Color.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'map_custom_marker_icon',
            'type' => 'textarea',
            'title' => __('Custom Marker Icon','redux-framework-demo'),
            'subtitle'  => __('Custom Marker Icon.', 'redux-framework-demo'),
            'desc' => __('Custom styling setting only. Use full image urls for custom marker icons or input "theme" for our custom marker. For multiple addresses, separate icons by using the | symbol or use one for all. ex: Icon 1|Icon 2|Icon 3','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Custom Marker Icon','redux-framework-demo'),
                'content' => __('Custom Marker Icon.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'recaptcha',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>ReCaptcha Spam Options</h3>',
        ),
        array (
            'id' => 'recaptcha_public',
            'type' => 'text',
            'title' => __('ReCaptcha Public Key','redux-framework-demo'),
            'subtitle'  => __('ReCaptcha Public Key.', 'redux-framework-demo'),
            'desc' => __('Follow the steps in <a href=\'http://oxosolutions.com/aione-doc/pages/setting-up-contact-page/\'> our docs</a> to get key.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('ReCaptcha Public Key','redux-framework-demo'),
                'content' => __('ReCaptcha Public Key.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'recaptcha_private',
            'type' => 'text',
            'title' => __('ReCaptcha Private Key','redux-framework-demo'),
            'subtitle'  => __('ReCaptcha Private Key.', 'redux-framework-demo'),
            'desc' => __('Follow the steps in <a href=\'http://oxosolutions.com/aione-doc/pages/setting-up-contact-page/\'> our docs</a> to get key.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('ReCaptcha Private Key','redux-framework-demo'),
                'content' => __('ReCaptcha Private Key.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'recaptcha_color_scheme',
            'type' => 'select',
            'options' => array (
                'red' => 'red',
                'blackglass' => 'blackglass',
                'clean' => 'clean',
                'white' => 'white',
            ),
            'title' => __('ReCaptcha Color Scheme','redux-framework-demo'),
            'subtitle'  => __('ReCaptcha Color Scheme.', 'redux-framework-demo'),
            'desc' => __('Select the recaptcha color scheme.','redux-framework-demo'),
            'default' => 'Clean',
            'hint' => array(
                'title'   => __('ReCaptcha Color Scheme','redux-framework-demo'),
                'content' => __('ReCaptcha Color Scheme.','redux-framework-demo'),
            )
        ),
    )
);
?>