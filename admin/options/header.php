<?php
/*********************************************************************************************
 *
 *  Header settings
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-cogs',
    'title'     => __('Header Settings', 'redux-framework-demo'),
    //'desc' => __('Header Settings', 'redux-framework-demo'),
    'fields'    => array(
        array (
            'id' => 'header_show_sliding_bar',
            'type' => 'switch',
            'title' =>  __('Show Sliding Bar', 'redux-framework-demo'),
            'subtitle'  => __('Enable the top sliding bar.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'hint' => array(
                'title'   => 'Show Sliding Bar',
                'content' => 'Sliding Bar is the area hidden at the top of website which can be slides down on clicking on <strong>+(Plus)</strong> button on right corner. Choose <strong>YES</strong> to show sliding bar, Choose <strong>NO</strong> to hide it. Default value is <strong>YES</strong>.'
            )
        ),
        array (
            'id' => 'header_show_top_bar',
            'type' => 'switch',
            'title' =>  __('Show Top Bar', 'redux-framework-demo'),
            'subtitle'  => __('Enable the top bar on header.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'compiler' => array('header_show_top_bar_class'),
            //'output' => array('body'),
            'hint' => array(
                'title'   => 'Show Top Bar',
                'content' => 'Top Bar is an area in header(above logo) you can use to show menu,date,contact no.,email,login/register buttons etc. Choose <strong>YES</strong> to show top bar on the header, Choose <strong>NO</strong> to remove it. Default value is <strong>YES</strong>.'
            )
        ),
        array (
            'id' => 'header_show_logo',
            'type' => 'switch',
            'title' =>  __('Show Logo', 'redux-framework-demo'),
            'subtitle'  => __('Enable the logo on header.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'hint' => array(
                'title'   => 'Show Logo',
                'content' => 'Logo is your company or brand logo or the your photo you want to show on your website header. Choose <strong>YES</strong> to show Logo on the header, Choose <strong>NO</strong> to remove it. Default value is <strong>YES</strong>.'
            )
        ),
        array (
            'id' => 'header_show_site_title',
            'type' => 'switch',
            'title' =>  __('Show Site Title', 'redux-framework-demo'),
            'subtitle'  => __('Enable the site title on header.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'hint' => array(
                'title'   => 'Show Site Title',
                'content' => 'Site Title is the Name of your website representing your business/brand or any other title you want to show on your website header. Choose <strong>YES</strong> to show Site Title on the header, Choose <strong>NO</strong> to remove it. Default value is <strong>YES</strong>.'
            )
        ),
        array (
            'id' => 'header_show_tagline',
            'type' => 'switch',
            'title' =>  __('Show Tagline', 'redux-framework-demo'),
            'subtitle'  => __('Enable the Tagline on header.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'hint' => array(
                'title'   => 'Show Tagline',
                'content' => 'Tagline is a slogan for your business/brand or any other sub-title you want to show on your website header. Choose <strong>YES</strong> to show Tagline on the header, Choose <strong>NO</strong> to remove it. Default value is <strong>YES</strong>.'
            )
        ),
        array (
            'id' => 'header_show_navigation',
            'type' => 'switch',
            'title' =>  __('Show Navigation', 'redux-framework-demo'),
            'subtitle'  => __('Enable Navigation on header.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'hint' => array(
                'title'   => 'Show Navigation',
                'content' => 'Navigation is the main/primary menu on your website header. Choose <strong>YES</strong> to show Navigation on the header, Choose <strong>NO</strong> to remove it. Default value is <strong>YES</strong>.'
            )
        ),
        /*
         array(
            'id'        => 'opt-layout',
            'type'      => 'image_select',
            'compiler'  => true,
            'title'     => __('Main Layout', 'redux-framework-demo'),
            'subtitle'  => __('Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.', 'redux-framework-demo'),
            'options'   => array(
                '1' => array('alt' => '1 Column',       'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
                '2' => array('alt' => '2 Column Left',  'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
                '3' => array('alt' => '2 Column Right', 'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
                '4' => array('alt' => '3 Column Middle','img' => ReduxFramework::$_url . 'assets/img/3cm.png'),
                '5' => array('alt' => '3 Column Left',  'img' => ReduxFramework::$_url . 'assets/img/3cl.png'),
                '6' => array('alt' => '3 Column Right', 'img' => ReduxFramework::$_url . 'assets/img/3cr.png')
            ),
            'default'   => '2',
            'hint' => array(
                'title'   => 'Hint Title',
                'content' => 'This is the content of the tool-tip'
            )
        ),
        */
        array (
            'id' => 'header_layout',
            'type' => 'image_select',
            'options' => array (
                'v1' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header1.jpg',
                'v2' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header2.jpg',
                'v3' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header3.jpg',
                'v4' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header4.jpg',
                'v5' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header5.jpg',
            ),
            'title' => 'Select a Header Layout',
            'default' => 'v4',
        ),
        array (
            'id' => 'header_transparent',
            'type' => 'switch',
            'title' =>  __('Transparent Header', 'redux-framework-demo'),
            'subtitle'  => __('Enable transparent header.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>NO</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'hint' => array(
                'title'   => 'Transparent Header',
                'content' => 'Choose <strong>YES</strong> to enable a transparent header that will display your slider behind it, Choose <strong>NO</strong> to show header inline. Default value is <strong>NO</strong>.'
            )
        ),

        array (
            'desc' => 'Select which content displays in the right area of Header 4.',
            'id' => 'header_v4_content',
            'type' => 'select',
            'options' => array (
                'Tagline' => 'Tagline',
                'Search' => 'Search',
                'TaglineAndSearch' => 'Tagline + Search',
                'Banner' => 'Banner',
            ),
            'title' => 'Header Content Area For Header #4',
            'default' => 'Tagline + Search',
        ),
        array (
            'desc' => 'Add HTML banner code for Header #4. The banner or image will display in Header 4 as long as you have Banner selected for the Header Content Area For Header #4 option above.',
            'id' => 'header_banner_code',
            'type' => 'textarea',
            'title' => 'Banner Code For Header #4',
        ),
        array (
            'desc' => 'Tagline will display on Header 4 as long as you have Tagline selected for the Header Content Area For Header #4 option above.',
            'id' => 'header_tagline',
            'type' => 'text',
            'title' => 'Header Tagline',
            'default' => 'Insert Any Headline Or Link You Want Here',
        ),
        array (
            'desc' => 'In pixels, ex: 10px',
            'id' => 'margin_header_top',
            'type' => 'text',
            'title' => 'Header Top Padding',
            'default' => '0px',
        ),
        array (
            'desc' => 'In pixels, ex: 10px',
            'id' => 'margin_header_bottom',
            'type' => 'text',
            'title' => 'Header Bottom Padding',
            'default' => '0px',
        )



    )
);

/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-credit-card',
    'title'     => __('Topbar', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'desc' => 'Select which content displays in the top left area of the header.',
            'id' => 'topbar_left_content',
            'type'      => 'sortable',
            'mode'      => 'checkbox',
            'options' => array (
                'date' => 'Date',
                'time' => 'Time',
                'email' => 'Email',
                'phone' => 'Phone',
                'social' => 'Social Links',
                'navigation' => 'Navigation',
                'custom' => 'Custom',
            ),
            'title' => 'Topbar Left Content',
            'default' => Array(
                'date' => true,
                'time' => true,
                'email' => false,
                'phone' => false,
                'social' => false,
                'navigation' => false,
                'custom' => false,
            ),
        ),
        array (
            'desc' => 'Select which content displays in the top left area of the header.',
            'id' => 'topbar_right_content',
            'type'      => 'sortable',
            'mode'      => 'checkbox',
            'options' => array (
                'date' => 'Date',
                'time' => 'Time',
                'email' => 'Email',
                'phone' => 'Phone',
                'social' => 'Social Links',
                'navigation' => 'Navigation',
                'custom' => 'Custom',
            ),
            'title' => 'Topbar Right Content',
            'default' => Array(
                'date' => false,
                'time' => false,
                'phone' => true,
                'email' => true,
                'social' => false,
                'navigation' => false,
                'custom' => false,
            ),
        ),
        array (
            'desc' => 'Phone number will display in the Contact Info section of your topbar.',
            'id' => 'topbar_number',
            'type' => 'text',
            'title' => 'Topbar Phone Number',
            'default' => '+91-987654321',
        ),
        array (
            'desc' => 'Email address will display in the Contact Info section of your top header.',
            'id' => 'topbar_email',
            'type' => 'text',
            'title' => 'Topbar Email Address',
            'default' => get_option( 'admin_email' ),
        ),
        array (
            'desc' => 'Email address will display in the Contact Info section of your top header.',
            'id' => 'topbar_custom',
            'type' => 'text',
            'title' => 'Topbar Custom Text',
            'default' => '',
        ),

    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-website',
    'title'     => __('Slider Options', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'desc' => 'Select if the slider shows below or above the header. This only works for the slider assigned in page options, not with shortcodes.',
            'id' => 'slider_position',
            'type' => 'select',
            'options' => array (
                'Below' => 'Below',
                'Above' => 'Above',
            ),
            'title' => 'Slider Position',
            'default' => 'Below',
        )

    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-twitter',
    'title'     => __('Social Icons', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(

        array (
            'desc' => 'Select a custom social icon color.',
            'id' => 'header_social_links_icon_color',
            'type' => 'color',
            'title' => 'Header Social Icons Custom Color',
            'default' => '#bebdbd',
        ),
        array (
            'desc' => 'Controls the color of the social icons in the footer.',
            'id' => 'header_social_links_boxed',
            'type' => 'select',
            'options' => array (
                'No' => 'No',
                'Yes' => 'Yes',
            ),
            'title' => 'Header Social Icons Boxed',
            'default' => 'No',
        ),
        array (
            'desc' => 'Select a custom social icon box color.',
            'id' => 'header_social_links_box_color',
            'type' => 'color',
            'title' => 'Header Social Icons Custom Box Color',
            'default' => '#e8e8e8',
        ),
        array (
            'desc' => 'Boxradius for the social icons. In pixels, ex: 4px.',
            'id' => 'header_social_links_boxed_radius',
            'type' => 'text',
            'title' => 'Header Social Icons Boxed Radius',
            'default' => '4px',
        ),
        array (
            'desc' => 'Controls the tooltip position of the social icons in the footer.',
            'id' => 'header_social_links_tooltip_placement',
            'type' => 'select',
            'options' => array (
                'Top' => 'Top',
                'Right' => 'Right',
                'Bottom' => 'Bottom',
                'Left' => 'Left',
                'None' => 'None',
            ),
            'title' => 'Header Social Icons Tooltip Position',
            'default' => 'Bottom',
        )


    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-website-alt',
    'title'     => __('Sticky Header Options', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'desc' => 'Check to enable a fixed header when scrolling, uncheck to disable.',
            'id' => 'header_sticky',
            'type' => 'checkbox',
            'title' => 'Enable Sticky Header',
            'default' => 1,
        ),
        array (
            'desc' => 'Check to enable a fixed header when scrolling on tablets, uncheck to disable.',
            'id' => 'header_sticky_tablet',
            'type' => 'checkbox',
            'title' => 'Enable Sticky Header on Tablets',
        ),
        array (
            'desc' => 'Check to enable a fixed header when scrolling on mobiles, uncheck to disable.',
            'id' => 'header_sticky_mobile',
            'type' => 'checkbox',
            'title' => 'Enable Sticky Header on Mobiles',
        ),array (
            'desc' => 'Header v2 - v5 only. Set the opacity of background, <br />0.1 (lowest) to 1 (highest).',
            'id' => 'header_sticky_opacity',
            'type' => 'text',
            'title' => 'Sticky Header Opacity',
            'default' => '0.97',
        ),
        array (
            'desc' => 'Controls the space between each menu item in the sticky header. Use a number without \'px\', default is 35. ex: 35',
            'id' => 'header_sticky_nav_padding',
            'type' => 'text',
            'title' => 'Sticky Header Menu Item Padding',
        ),
        array (
            'desc' => 'Controls the font size of the menu items in the sticky header. Use a number without \'px\', default is 14. ex: 14',
            'id' => 'header_sticky_nav_font_size',
            'type' => 'text',
            'title' => 'Sticky Header Navigation Font Size',
        ),
        array (
            'desc' => 'Controls the max-width of the sticky header logo. If your logo is too large and does not allow the menu to fit on one line, then use this option and insert a smaller width for your logo. ex: 120',
            'id' => 'header_sticky_logo_max_width',
            'type' => 'text',
            'title' => 'Sticky Header Logo Width',
        )

    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-star',
    'title'     => __('Logo', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'desc' => 'Select an image file for your logo.',
            'id' => 'logo',
            'type' => 'media',
            'title' => 'Logo',
            'default' => array (
                'url' => 'http://localhost/darlic/wp-content/themes/aione/images/logo.png',
            ),
            'url' => true,
        ),
        array (
            'desc' => 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.',
            'id' => 'logo_retina',
            'type' => 'media',
            'title' => 'Logo (Retina Version @2x)',
            'url' => true,
        ),
        array (
            'desc' => 'If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width.',
            'id' => 'retina_logo_width',
            'type' => 'text',
            'title' => 'Standard Logo Width for Retina Logo',
        ),
        array (
            'desc' => 'If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height.',
            'id' => 'retina_logo_height',
            'type' => 'text',
            'title' => 'Standard Logo Height for Retina Logo',
        ),
        array (
            'desc' => 'Note: center only works on Header 5.',
            'id' => 'logo_alignment',
            'type' => 'select',
            'options' => array (
                'Left' => 'Left',
                'Center' => 'Center',
                'Right' => 'Right',
            ),
            'title' => 'Logo Alignment',
            'default' => 'Left',
        ),
        array (
            'desc' => 'In pixels, ex: 10px',
            'id' => 'margin_logo_left',
            'type' => 'text',
            'title' => 'Logo Left Margin',
            'default' => '0px',
        ),
        array (
            'desc' => 'In pixels, ex: 10px',
            'id' => 'margin_logo_right',
            'type' => 'text',
            'title' => 'Logo Right Margin',
            'default' => '0px',
        ),
        array (
            'desc' => 'In pixels, ex: 10px',
            'id' => 'margin_logo_top',
            'type' => 'text',
            'title' => 'Logo Top Margin',
            'default' => '10px',
        ),
        array (
            'desc' => 'In pixels, ex: 10px',
            'id' => 'margin_logo_bottom',
            'type' => 'text',
            'title' => 'Logo Bottom Margin',
            'default' => '10px',
        ),
        array (
            'id' => 'favicons',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Favicon Options</h3>',
        ),
        array (
            'desc' => 'Favicon for your website (16px x 16px).',
            'id' => 'favicon',
            'type' => 'media',
            'title' => 'Favicon',
            'url' => true,
        ),
        array (
            'desc' => 'Favicon for Apple iPhone (57px x 57px).',
            'id' => 'iphone_icon',
            'type' => 'media',
            'title' => 'Apple iPhone Icon Upload',
            'url' => true,
        ),
        array (
            'desc' => 'Favicon for Apple iPhone Retina Version (114px x 114px).',
            'id' => 'iphone_icon_retina',
            'type' => 'media',
            'title' => 'Apple iPhone Retina Icon Upload',
            'url' => true,
        ),
        array (
            'desc' => 'Favicon for Apple iPad (72px x 72px).',
            'id' => 'ipad_icon',
            'type' => 'media',
            'title' => 'Apple iPad Icon Upload',
            'url' => true,
        ),
        array (
            'desc' => 'Favicon for Apple iPad Retina Version (144px x 144px).',
            'id' => 'ipad_icon_retina',
            'type' => 'media',
            'title' => 'Apple iPad Retina Icon Upload',
            'url' => true,
        )

    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-hand-up',
    'title'     => __('Menu', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'main_nav_show_home_icon',
            'type' => 'switch',
            'title' =>  __('Show Home Icon', 'redux-framework-demo'),
            'subtitle'  => __('Enable home icon on main menu.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'compiler' => array('main_nav_show_home_icon'),
            //'output' => array('main_nav_show_home_icon'),
            'hint' => array(
                'title'   => 'Show Home Icon',
                'content' => 'This option Enables/Disables <strong>Home Icon</strong> on main menu. Choose <strong>YES</strong> to home icon on main menu, Choose <strong>NO</strong> to remove it. Default value is <strong>YES</strong>.'
            )
        ),
        array (
            'id' => 'main_nav_show_home_link',
            'type' => 'switch',
            'title' =>  __('Show Home Link', 'redux-framework-demo'),
            'subtitle'  => __('Enable home link on main menu.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'compiler' => array('main_nav_show_home_link'),
            //'output' => array('main_nav_show_home_icon'),
            'hint' => array(
                'title'   => 'Show Home Link',
                'content' => 'This option Enables/Disables <strong>Home Link</strong> on main menu. Choose <strong>YES</strong> to show home icon on main menu, Choose <strong>NO</strong> to remove it. Default value is <strong>YES</strong>.'
            )
        ),
        array (
            'id' => 'main_nav_show_description',
            'type' => 'switch',
            'title' =>  __('Show Menu Description', 'redux-framework-demo'),
            'subtitle'  => __('Enable Menu Description on main menu.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>NO</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => false,
            'compiler' => array('main_nav_show_description'),
            //'output' => array('main_nav_show_home_icon'),
            'hint' => array(
                'title'   => 'Show Menu Description',
                'content' => 'This option Enables/Disables <strong>Description</strong> on main menu. Choose <strong>YES</strong> to show description on main menu, Choose <strong>NO</strong> to remove it. Default value is <strong>NO</strong>.'
            )
        ),
        array (
            'id' => 'main_nav_search_icon',
            'type' => 'switch',
            'title' =>  __('Show Search Icon in Main Menu', 'redux-framework-demo'),
            'subtitle'  => __('Enable Search on main menu.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'compiler' => array('main_nav_show_description'),
            //'output' => array('main_nav_show_home_icon'),
            'hint' => array(
                'title'   => 'Show Search Icon in Main Menu',
                'content' => 'This option Enables/Disables <strong>Search Icon</strong> on main menu. Choose <strong>YES</strong> to show Search Icon on main menu, Choose <strong>NO</strong> to remove it. Default value is <strong>YES</strong>.'
            ),
        ),
        array (
            'id' => 'main_nav_icon_circle',
            'type' => 'switch',
            'title' =>  __('Show Circle on Search Icon', 'redux-framework-demo'),
            'subtitle'  => __('Enable Search on main menu.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'compiler' => array('main_nav_icon_circle'),
            //'output' => array('main_nav_show_home_icon'),
            'hint' => array(
                'title'   => 'Show Circle on Search Icon',
                'content' => 'This option Enables/Disables <strong>Show Circle</strong> on Search Icon. Choose <strong>YES</strong> to show Circle on Search Icon, Choose <strong>NO</strong> to remove it. Default value is <strong>YES</strong>.'
            ),
        ),


        array (
            'desc' => 'Check to enable a circle border on the main menu cart and search icons.',
            'id' => 'main_nav_icon_circle',
            'type' => 'switch',
            'title' => 'Enable Circle Border On Menu Icons',
        ),
        array (
            'desc' => 'Check to group submenu to slideout elements on mobile menu.',
            'id' => 'mobile_nav_submenu_slideout',
            'type' => 'switch',
            'title' => 'Mobile Menu Submenu Slide Outs',
        ),



        array (
            'desc' => 'Use a number without \'px\', default is 83. ex: 83',
            'id' => 'main_nav_height',
            'type' => 'text',
            'title' => 'Main Nav Height',
            'default' => '40',

        ),
        array (
            'desc' => 'Use a number without \'px\', default is 35. ex: 35',
            'id' => 'main_nav_padding',
            'type' => 'text',
            'title' => 'Menu Item Padding',
            'default' => '35',
        ),
        array (
            'desc' => 'In pixels, ex: 170px',
            'id' => 'dropdown_menu_width',
            'type' => 'text',
            'title' => 'Main Menu Dropdown Width',
            'default' => '170px',
        ),
        array (
            'desc' => 'In pixels, ex: 100px',
            'id' => 'topmenu_dropwdown_width',
            'type' => 'text',
            'title' => 'Top Menu Dropdown Width',
            'default' => '100px',
        ),
        array(
            'id'        => 'nav-exclude-pages',
            'type'      => 'select',
            'multi'     => true,
            'data'      => 'pages',
            'title'     => __('Exclude Pages from Main Menu', 'redux-framework-demo'),
            'subtitle'  => __('Select pages you dont want to show on menu', 'redux-framework-demo'),
            'desc'      => __('The selected pages will be excluded from main menu if no menu is assigned to this this menu position..', 'redux-framework-demo'),
        ),
        array (
            'desc' => 'Choose Main Menu Animation',
            'id' => 'main_nav_animation',
            'type' => 'select',
            'title' => 'Menu Animation',
            'default' => 'slide',
            'options' => array (
                'slide' => 'Slide',
                'underline' => 'Underline',
                'topline' => 'Top Line',
                'rotate' => '3D Rotate',
            ),
        ),

        array (
            'desc' => 'Choose Main Menu Animation Direction',
            'id' => 'main_nav_animation_direction',
            'type' => 'select',
            'title' => 'Menu Animation Direction',
            'required' => array('main_nav_animation', "=", array( 'slide', 'underline', 'topline','rotate' )),
            'default' => 'up',
            'options' => array (
                'up' => 'Up',
                'down' => 'Down',
                'left' => 'Left',
                'right' => 'Right',
            ),
        ),


        array (
            'desc' => 'Set the font size for mega menu column titles (menu 2nd level labels). In pixels, ex: 18px',
            'id' => 'megamenu_title_size',
            'type' => 'text',
            'title' => 'Mega Menu Column Title Size',
            'default' => '18px',
        )

    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-plus',
    'title'     => __('Sliding Bar', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(

        array (
            'desc' => 'Check to enable the top Sliding Bar.',
            'id' => 'slidingbar_widgets',
            'type' => 'checkbox',
            'title' => 'Enable Sliding Bar',
        ),
        array (
            'desc' => 'Check to disable the top Sliding Bar on mobile devices.',
            'id' => 'mobile_slidingbar_widgets',
            'type' => 'checkbox',
            'title' => 'Disable Sliding Bar On Mobile',
        ),
        array (
            'desc' => 'Check to enable a top border on the Sliding Bar.',
            'id' => 'slidingbar_top_border',
            'type' => 'checkbox',
            'title' => 'Enable Top Border on Sliding Bar',
        ),
        array (
            'desc' => 'Check the box to enable transparency on the Sliding Bar.',
            'id' => 'slidingbar_bg_color_transparency',
            'type' => 'checkbox',
            'title' => 'Enable Transparency on the Sliding Bar',
        ),
        array (
            'desc' => 'Check the box to have the sliding bar open when the page loads.',
            'id' => 'slidingbar_open_on_load',
            'type' => 'checkbox',
            'title' => 'Sliding Bar Open On Page Load',
        ),
        array (
            'desc' => 'Select the number of columns to display in the Sliding Bar.',
            'id' => 'slidingbar_widgets_columns',
            'options' => array (
                1 => '1',
                2 => '2',
                3 => '3',
                4 => '4',
            ),
            'type' => 'select',
            'title' => 'Number of Sliding Bar Columns',
            'default' => '4',
        )

    )
);
?>