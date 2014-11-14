<?php


            // ACTUAL DECLARATION OF SECTIONS
			$this->sections[] = array(
                'icon'      => 'el-icon-cogs',
                'title'     => __('Header Settings', 'redux-framework-demo'),
                //'desc' => __('Header Settings', 'redux-framework-demo'),
                'fields'    => array(

                    /*
                     *
                     array (
                        'id' => 'custom_field_test',
                        'type' => 'custom_field',
                        'title' =>  __('custom field', 'redux-framework-demo'),
                        'subtitle'  => __('custom_field.', 'redux-framework-demo'),
                        'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo')

                    ),
                    */
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

                  //////////////////////////////////////////////////////////////////////////////////////


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
                        'default' => 'v1',
                    ),
                    array (
                        'desc' => 'Check this box to enable a transparent header that will display your slider behind it.',
                        'id' => 'header_transparent',
                        'type' => 'checkbox',
                        'title' => 'Transparent Header',
                    ),

                    array (
                        'desc' => 'Select which content displays in the top left area of the header.',
                        'id' => 'header_left_content',
                        'type' => 'select',
                        'options' => array (
                            'Contact Info' => 'Contact Info',
                            'Social Links' => 'Social Links',
                            'Navigation' => 'Navigation',
                            'Leave Empty' => 'Leave Empty',
                        ),
                        'title' => 'Header Top Left Content',
                        'default' => 'Contact Info',
                    ),
                    array (
                        'desc' => 'Select which content displays in the top right area of the header.',
                        'id' => 'header_right_content',
                        'type' => 'select',
                        'options' => array (
                            'Contact Info' => 'Contact Info',
                            'Social Links' => 'Social Links',
                            'Navigation' => 'Navigation',
                            'Leave Empty' => 'Leave Empty',
                        ),
                        'title' => 'Header Top Right Content',
                        'default' => 'Navigation',
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
                        'desc' => 'Phone number will display in the Contact Info section of your top header.',
                        'id' => 'header_number',
                        'type' => 'text',
                        'title' => 'Header Phone Number',
                        'default' => 'Call Us Today! 1.555.555.555',
                    ),
                    array (
                        'desc' => 'Email address will display in the Contact Info section of your top header.',
                        'id' => 'header_email',
                        'type' => 'text',
                        'title' => 'Header Email Address',
                        'default' => 'info@yourdomain.com',
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

            ////////////////////////////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-credit-card',
                'title'     => __('Topbar', 'redux-framework-demo'),
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
            ////////////////////////////////////////////////////////////////////////////////////////////
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

////////////////////////////////////////////////////////////////////////////////////////////
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

            ////////////////////////////////////////////////////////////////////////////////////////////
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

    ////////////////////////////////////////////////////////////////////////////////////////////
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
                        'default' => '31px',
                    ),
                    array (
                        'desc' => 'In pixels, ex: 10px',
                        'id' => 'margin_logo_bottom',
                        'type' => 'text',
                        'title' => 'Logo Bottom Margin',
                        'default' => '31px',
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


            ////////////////////////////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-hand-up',
                'title'     => __('Menu', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Use a number without \'px\', default is 83. ex: 83',
                        'id' => 'nav_height',
                        'type' => 'text',
                        'title' => 'Main Nav Height',
                        'default' => '83',

                    ),
                    array (
                        'desc' => 'Use a number without \'px\', default is 35. ex: 35',
                        'id' => 'nav_padding',
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
                    array (
                        'desc' => 'Set the font size for mega menu column titles (menu 2nd level labels). In pixels, ex: 18px',
                        'id' => 'megamenu_title_size',
                        'type' => 'text',
                        'title' => 'Mega Menu Column Title Size',
                        'default' => '18px',
                    ),
                    array (
                        'desc' => 'Check to enable the search icon in the menu, uncheck to disable.',
                        'id' => 'main_nav_search_icon',
                        'type' => 'checkbox',
                        'title' => 'Show Search Icon in Main Nav?',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check to enable a circle border on the main menu cart and search icons.',
                        'id' => 'main_nav_icon_circle',
                        'type' => 'checkbox',
                        'title' => 'Enable Circle Border On Menu Icons',
                    ),
                    array (
                        'desc' => 'Check to group submenu to slideout elements on mobile menu.',
                        'id' => 'mobile_nav_submenu_slideout',
                        'type' => 'checkbox',
                        'title' => 'Mobile Menu Submenu Slide Outs',
                    )

                )
            );

////////////////////////////////////////////////////////////////////////////////////////////
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


/*
*
 *
 *
 * New Tab
 *
 *
 * */

//////////////////////////////////////////////////////////////////////



            $this->sections[] = array(
                'icon'      => 'el-icon-fork',
                'title'     => __('Footer', 'redux-framework-demo'),
                'fields'    => array(
                    array (
                        'desc' => 'Check the box to display footer widgets.',
                        'id' => 'footer_widgets',
                        'type' => 'checkbox',
                        'title' => 'Footer Widgets',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Select the number of columns to display in the footer.',
                        'id' => 'footer_widgets_columns',
                        'options' => array (
                            1 => '1',
                            2 => '2',
                            3 => '3',
                            4 => '4',
                        ),
                        'type' => 'select',
                        'title' => 'Number of Footer Columns',
                        'default' => '4',
                    ),
                    array (
                        'desc' => 'In pixels, ex: 20px',
                        'id' => 'footer_area_top_padding',
                        'type' => 'text',
                        'title' => 'Footer Top Padding',
                        'default' => '43px',
                    ),
                    array (
                        'desc' => 'In pixels, ex: 20px',
                        'id' => 'footer_area_bottom_padding',
                        'type' => 'text',
                        'title' => 'Footer Bottom Padding',
                        'default' => '40px',
                    )

                )
            );
////////////////////////////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-skype',
                'title'     => __('Social Icon Options', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Select the checkbox to show social media icons on the footer of the page.',
                        'id' => 'icons_footer',
                        'type' => 'checkbox',
                        'title' => 'Display Social Icons on Footer of the Page',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Select a custom social icon color.',
                        'id' => 'footer_social_links_icon_color',
                        'type' => 'color',
                        'title' => 'Footer Social Icons Custom Color',
                        'default' => '#46494a',
                    ),
                    array (
                        'desc' => 'Controls the color of the social icons in the footer.',
                        'id' => 'footer_social_links_boxed',
                        'type' => 'select',
                        'options' => array (
                            'No' => 'No',
                            'Yes' => 'Yes',
                        ),
                        'title' => 'Footer Social Icons Boxed',
                        'default' => 'No',
                    ),
                    array (
                        'desc' => 'Select a custom social icon box color.',
                        'id' => 'footer_social_links_box_color',
                        'type' => 'color',
                        'title' => 'Footer Social Icons Custom Box Color',
                        'default' => '#222222',
                    ),
                    array (
                        'desc' => 'Boxradius for the social icons. In pixels, ex: 4px.',
                        'id' => 'footer_social_links_boxed_radius',
                        'type' => 'text',
                        'title' => 'Footer Social Icons Boxed Radius',
                        'default' => '4px',
                    ),
                    array (
                        'desc' => 'Controls the tooltip position of the social icons in the footer.',
                        'id' => 'footer_social_links_tooltip_placement',
                        'type' => 'select',
                        'options' => array (
                            'Top' => 'Top',
                            'Right' => 'Right',
                            'Bottom' => 'Bottom',
                            'Left' => 'Left',
                            'None' => 'None',
                        ),
                        'title' => 'Footer Social Icons Tooltip Position',
                        'default' => 'Top',
                    )
                )
            );
////////////////////////////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-asterisk',
                'title'     => __('Copyright Options', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Check the box to display the copyright bar.',
                        'id' => 'footer_copyright',
                        'type' => 'checkbox',
                        'title' => 'Copyright Bar',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Enter the text that displays in the copyright bar. HTML markup can be used.',
                        'id' => 'footer_text',
                        'type' => 'textarea',
                        'title' => 'Copyright Text',
                        'default' => 'Copyright 2012 aione | All Rights Reserved | Powered by <a href="http://wordpress.org">WordPress</a>	|	<a href="http://oxosolutions.com">Theme Aione</a>',
                    ),
                    array (
                        'desc' => 'In pixels, ex: 18px',
                        'id' => 'copyright_top_padding',
                        'type' => 'text',
                        'title' => 'Copyright Top Padding',
                        'default' => '18px',
                    ),
                    array (
                        'desc' => 'In pixels, ex: 18px',
                        'id' => 'copyright_bottom_padding',
                        'type' => 'text',
                        'title' => 'Copyright Bottom Padding',
                        'default' => '16px',
                    )
                )
            );

            /*
            *
             *
             *
             * New Tab
             *
             *
             * */

//////////////////////////////////////////////////////////////////////



            $this->sections[] = array(
                'icon'      => 'el-icon-bold',
                'title'     => __('Blog', 'redux-framework-demo'),
                'fields'    => array(
                    array (
                        'desc' => 'This text will display in the page title bar of the assigned blog page.',
                        'id' => 'blog_title',
                        'type' => 'text',
                        'title' => 'Blog Page Title',
                        'default' => 'Blog',
                    ),
                    array (
                        'desc' => 'This text will display as subheading in the page title bar of the assigned blog page.',
                        'id' => 'blog_subtitle',
                        'type' => 'text',
                        'title' => 'Blog Page Subtitle',
                    ),
                    array (
                        'desc' => 'Select the layout for the assigned blog page in settings > reading.',
                        'id' => 'blog_layout',
                        'type' => 'select',
                        'options' => array (
                            'Large' => 'Large',
                            'Medium' => 'Medium',
                            'Large Alternate' => 'Large Alternate',
                            'Medium Alternate' => 'Medium Alternate',
                            'Grid' => 'Grid',
                            'Timeline' => 'Timeline',
                        ),
                        'title' => 'Blog Layout',
                        'default' => 'Large',
                    ),
                    array (
                        'desc' => 'Select the sidebar position for the blog pages.',
                        'id' => 'blog_sidebar_position',
                        'type' => 'select',
                        'options' => array (
                            'Right' => 'Right',
                            'Left' => 'Left',
                        ),
                        'title' => 'Blog Sidebar Position',
                        'default' => 'Right',
                    ),
                    array (
                        'desc' => 'Select the layout for the blog archive/category pages.',
                        'id' => 'blog_archive_layout',
                        'type' => 'select',
                        'options' => array (
                            'Large' => 'Large',
                            'Medium' => 'Medium',
                            'Large Alternate' => 'Large Alternate',
                            'Medium Alternate' => 'Medium Alternate',
                            'Grid' => 'Grid',
                            'Timeline' => 'Timeline',
                        ),
                        'title' => 'Blog Archive/Category Layout',
                        'default' => 'Large',
                    ),
                    array (
                        'desc' => 'Select the sidebar that will display on the archive/category pages.',
                        'id' => 'blog_archive_sidebar',
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
                        'title' => 'Blog Archive/Author/Category Sidebar',
                        'default' => 'None',
                    ),
                    array (
                        'desc' => 'Select the pagination type for the assigned blog page in settings > reading.',
                        'id' => 'blog_pagination_type',
                        'type' => 'select',
                        'options' => array (
                            'Pagination' => 'Pagination',
                            'Infinite Scroll' => 'Infinite Scroll',
                        ),
                        'title' => 'Pagination Type',
                        'default' => 'pagination',
                    ),
                    array (
                        'desc' => 'Select whether to display the grid layout in 2, 3 or 4 columns.',
                        'id' => 'blog_grid_columns',
                        'type' => 'select',
                        'options' => array (
                            2 => '2',
                            3 => '3',
                            4 => '4',
                        ),
                        'title' => 'Grid Layout # of Columns',
                        'default' => '3',
                    ),
                    array (
                        'desc' => 'Choose to display an excerpt or full content on blog pages.',
                        'id' => 'content_length',
                        'type' => 'select',
                        'options' => array (
                            'Excerpt' => 'Excerpt',
                            'Full Content' => 'Full Content',
                        ),
                        'title' => 'Excerpt or Full Blog Content',
                        'default' => 'Excerpt',
                    ),
                    array (
                        'desc' => 'Insert the number of words you want to show in the post excerpts.',
                        'id' => 'excerpt_length_blog',
                        'type' => 'text',
                        'title' => 'Excerpt Length',
                        'default' => '55',
                    ),
                    array (
                        'desc' => 'Check the box if you want to strip HTML from the excerpt content only.',
                        'id' => 'strip_html_excerpt',
                        'type' => 'checkbox',
                        'title' => 'Strip HTML from Excerpt',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to turn the blog into full width with no sidebar.',
                        'id' => 'blog_full_width',
                        'type' => 'checkbox',
                        'title' => 'Full Width',
                    ),
                    array (
                        'desc' => 'Check the box to turn all single post items to full width with no sidebar.',
                        'id' => 'single_post_full_width',
                        'type' => 'checkbox',
                        'title' => 'Set All Post Items Full Width',
                    ),
                    array (
                        'desc' => 'Check the box to display featured images on blog archive page.',
                        'id' => 'featured_images',
                        'type' => 'checkbox',
                        'title' => 'Featured Image On Blog Archive Page',
                        'default' => 1,
                    ),
                    array (
                        'desc' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>',
                        'id' => 'alternate_date_format_month_year',
                        'type' => 'text',
                        'title' => 'Blog Alternate Date Format - Month and Year',
                        'default' => 'm, Y',
                    ),
                    array (
                        'desc' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>',
                        'id' => 'alternate_date_format_day',
                        'type' => 'text',
                        'title' => 'Blog Alternate Date Format - Day',
                        'default' => 'j',
                    ),
                    array (
                        'desc' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date</a>',
                        'id' => 'timeline_date_format',
                        'type' => 'text',
                        'title' => 'Blog Timeline Date Format - Timeline Labels',
                        'default' => 'F Y',
                    )


                )
            );


////////////////////////////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-file',
                'title'     => __('Blog Single Page Post Options', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Check the box to display featured images and videos on single post pages.',
                        'id' => 'featured_images_single',
                        'type' => 'checkbox',
                        'title' => 'Featured Image / Video on Single Post Page',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to disable previous/next pagination.',
                        'id' => 'blog_pn_nav',
                        'type' => 'checkbox',
                        'title' => 'Disable Previous/Next Pagination',
                    ),
                    array (
                        'desc' => 'Check the box to display the post title that goes below the featured images.',
                        'id' => 'blog_post_title',
                        'type' => 'checkbox',
                        'title' => 'Post Title',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to display the author info box below posts.',
                        'id' => 'author_info',
                        'type' => 'checkbox',
                        'title' => 'Author Info Box',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to display the social sharing box.',
                        'id' => 'social_sharing_box',
                        'type' => 'checkbox',
                        'title' => 'Social Sharing Box',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to display related posts.',
                        'id' => 'related_posts',
                        'type' => 'checkbox',
                        'title' => 'Related Posts',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to display comments.',
                        'id' => 'blog_comments',
                        'type' => 'checkbox',
                        'title' => 'Comments',
                        'default' => 1,
                    )
                )
            );
////////////////////////////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-inbox-box',
                'title'     => __('Blog Meta Options', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Check the box to display post meta on blog posts.',
                        'id' => 'post_meta',
                        'type' => 'checkbox',
                        'title' => 'Post Meta',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to hide the author name from post meta.',
                        'id' => 'post_meta_author',
                        'type' => 'checkbox',
                        'title' => 'Disable Post Meta Author',
                    ),
                    array (
                        'desc' => 'Check the box to hide the date from post meta.',
                        'id' => 'post_meta_date',
                        'type' => 'checkbox',
                        'title' => 'Disable Post Meta Date',
                    ),
                    array (
                        'desc' => 'Check the box to hide the categories from post meta.',
                        'id' => 'post_meta_cats',
                        'type' => 'checkbox',
                        'title' => 'Disable Post Meta Categories',
                    ),
                    array (
                        'desc' => 'Check the box to hide the comments from post meta.',
                        'id' => 'post_meta_comments',
                        'type' => 'checkbox',
                        'title' => 'Disable Post Meta Comments',
                    ),
                    array (
                        'desc' => 'Check the box to hide the read more link from post meta.',
                        'id' => 'post_meta_read',
                        'type' => 'checkbox',
                        'title' => 'Disable Post Meta Read More Link',
                    ),
                    array (
                        'desc' => 'Check the box to hide the tags from post meta.',
                        'id' => 'post_meta_tags',
                        'type' => 'checkbox',
                        'title' => 'Disable Post Meta Tags',
                        'default' => 1,
                    ),
                    array (
                        'desc' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>',
                        'id' => 'date_format',
                        'type' => 'text',
                        'title' => 'Date Format',
                        'default' => 'F jS, Y',
                    )                )
            );


            /*
            *
             *
             *
             * New Tab
             *
             *
             * */


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
            /*
             *
              *
              *
              * New Tab
              *
              *
              * */


            /*********************************************************************************************
             *
             *  Security
             *


            /*********************************************************************************************/
            $this->sections[] = array(
                'icon'      => 'el-icon-key',
                'title'     => __('Copy Protection', 'redux-framework-demo'),
                //'desc' => __('Copy Protection', 'redux-framework-demo'),
                'fields'    => array(

                    array (
                        'id' => 'disable_right_click',
                        'type' => 'switch',
                        'title' =>  __('Disable Right Click', 'redux-framework-demo'),
                        //'subtitle'  => __('Enable the top sliding bar.', 'redux-framework-demo'),
                        'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
                        'on' => __('YES', 'redux-framework-demo'),
                        'off' => __('NO ', 'redux-framework-demo'),
                        'default'   => true,
                        'hint' => array(
                            'title'   => 'Disable Right Click',
                            'content' => 'If this setting is toggled <strong>YES</strong>, Right Click will be disabled throughout the website. This helps to protect your content from being copied.If this option is <strong>NO</strong>, Right click will be working as normal. Default value is <strong>YES</strong>.'
                        )
                    ),
                    array (
                        'id' => 'disable_text_selection',
                        'type' => 'switch',
                        'title' =>  __('Disable Text Selection', 'redux-framework-demo'),
                       // 'subtitle'  => __('Disable Text Selection.', 'redux-framework-demo'),
                        'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
                        'on' => __('YES', 'redux-framework-demo'),
                        'off' => __('NO ', 'redux-framework-demo'),
                        'default'   => true,
                        'hint' => array(
                            'title'   => 'Disable Text Selection',
                            'content' => ' If this setting is toggled <strong>YES</strong>, Selecting the text will be disabled throughout the website. It helps to minimize the copying of your website content.    If this option is <strong>NO</strong>, Text selection will be working as normal. Default value is <strong>YES</strong>.'
                        )
                    ),
                    array (
                        'id' => 'disable_drag_drop_images',
                        'type' => 'switch',
                        'title' =>  __('Disable Drag and Drop of Images', 'redux-framework-demo'),
                        // 'subtitle'  => __('Disable Text Selection.', 'redux-framework-demo'),
                        'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
                        'on' => __('YES', 'redux-framework-demo'),
                        'off' => __('NO ', 'redux-framework-demo'),
                        'default'   => true,
                        'hint' => array(
                            'title'   => 'Disable Drag and Drop of Images',
                            'content' => ' If this setting is toggled <strong>YES</strong>, Drag and Drop of images from your website will be disabled. This helps to protect your website images from being copied.    If this option is <strong>NO</strong>, Right click will be working. Default value is <strong>YES</strong>.'
                        )
                    ),
                    array (
                        'id' => 'disable_iframe_inclusion',
                        'type' => 'switch',
                        'title' =>  __('Disable iframe Inclusion', 'redux-framework-demo'),
                        // 'subtitle'  => __('Disable Text Selection.', 'redux-framework-demo'),
                        'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
                        'on' => __('YES', 'redux-framework-demo'),
                        'off' => __('NO ', 'redux-framework-demo'),
                        'default'   => true,
                        'hint' => array(
                            'title'   => 'Disable iframe Inclusion',
                            'content' => ' If this setting is toggled <strong>YES</strong>,  your website can not be embedded into some other web page using iframe. This helps to protect your website from being enbedded into other websites/web pages.    If this option is <strong>NO</strong>, your website can be embedded using iframe. Default value is <strong>YES</strong>.'
                        )
                    )
                )
            );



            /*
            *
             *
             *
             * New Tab
             *
             *
             * */


            /*********************************************************************************************
             *
             *  pages settings
             *
             *********************************************************************************************/



            $this->sections[] = array(
                'icon'      => 'el-icon-shopping-cart',
                'title'     => __('Woocommerce ', 'redux-framework-demo'),
                'fields'    => array(

                    array (
                        'desc' => 'Insert the number of posts to display per page.',
                        'id' => 'woo_items',
                        'type' => 'text',
                        'title' => 'Number of Products per Page',
                        'default' => '12',
                    ),
                    array (
                        'desc' => 'Select the sidebar that will be added to the archive/category pages.',
                        'id' => 'woocommerce_archive_sidebar',
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
                        'title' => 'Woocommerce Archive/Category Sidebar',
                        'default' => 'None',
                    ),
                    array (
                        'desc' => 'Check the box to disable the ordering boxes displayed on the shop page.',
                        'id' => 'woocommerce_aione_ordering',
                        'type' => 'checkbox',
                        'title' => 'Disable Woocommerce Shop Page Ordering Boxes',
                    ),
                    array (
                        'desc' => 'Check the box to use aione\'s one page checkout template.',
                        'id' => 'woocommerce_one_page_checkout',
                        'type' => 'checkbox',
                        'title' => 'Use Woocommerce One Page Checkout',
                    ),
                    array (
                        'desc' => 'Check the box to show the order notes on the checkout page..',
                        'id' => 'woocommerce_enable_order_notes',
                        'type' => 'checkbox',
                        'title' => 'Show Woocommerce Order Notes on Checkout',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show My Account link, uncheck to disable. Please note this will not show with Ubermenu.',
                        'id' => 'woocommerce_acc_link_top_nav',
                        'type' => 'checkbox',
                        'title' => 'Show Woocommerce My Account Link in Secondary Menu',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show the Cart icon, uncheck to disable. Please note this will not show with Ubermenu.',
                        'id' => 'woocommerce_cart_link_top_nav',
                        'type' => 'checkbox',
                        'title' => 'Show Woocommerce Cart Icon in Secondary Menu',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show My Account link, uncheck to disable. Please note these will not show with Ubermenu.',
                        'id' => 'woocommerce_acc_link_main_nav',
                        'type' => 'checkbox',
                        'title' => 'Show Woocommerce My Account Link in Main Menu',
                    ),
                    array (
                        'desc' => 'Check the box to show the Cart icon, uncheck to disable. Please note these will not show with Ubermenu.',
                        'id' => 'woocommerce_cart_link_main_nav',
                        'type' => 'checkbox',
                        'title' => 'Show Woocommerce Cart Link in Main Menu',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show the social icons on product pages, uncheck to disable.',
                        'id' => 'woocommerce_social_links',
                        'type' => 'checkbox',
                        'title' => 'Show Woocommerce Social Icons',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Insert your text and it will appear in the first message box on the acount page.',
                        'id' => 'woo_acc_msg_1',
                        'type' => 'textarea',
                        'title' => 'Account Area Message 1',
                        'default' => 'Need Assistance? Call customer service at 888-555-5555.',
                    ),
                    array (
                        'desc' => 'Insert your text and it will appear in the second message box on the acount page.',
                        'id' => 'woo_acc_msg_2',
                        'type' => 'textarea',
                        'title' => 'Account Area Message 2',
                        'default' => 'E-mail them at info@yourshop.com',
                    )

                )
            );

            /*
            *
             *
             *
             * New Tab
             *
             *
             * */

//////////////////////////////////////////////////////////////////////



            $this->sections[] = array(
                'icon'      => 'el-icon-path',
                'title'     => __('Portfolio ', 'redux-framework-demo'),
                'fields'    => array(

                    array (
                        'id' => 'blog_single_post',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>General Portfolio Options</h3>',
                    ),
                    array (
                        'desc' => 'Insert the number of posts to display per page.',
                        'id' => 'portfolio_items',
                        'type' => 'text',
                        'title' => 'Number of Portfolio Items Per Page',
                        'default' => '10',
                    ),
                    array (
                        'desc' => 'Select the layout for only the archive/category pages.',
                        'id' => 'portfolio_archive_layout',
                        'type' => 'select',
                        'options' => array (
                            'Portfolio One Column' => 'Portfolio One Column',
                            'Portfolio Two Column' => 'Portfolio Two Column',
                            'Portfolio Three Column' => 'Portfolio Three Column',
                            'Portfolio Four Column' => 'Portfolio Four Column',
                            'Portfolio One Column Text' => 'Portfolio One Column Text',
                            'Portfolio Two Column Text' => 'Portfolio Two Column Text',
                            'Portfolio Three Column Text' => 'Portfolio Three Column Text',
                            'Portfolio Four Column Text' => 'Portfolio Four Column Text',
                            'Portfolio Grid' => 'Portfolio Grid',
                        ),
                        'title' => 'Portfolio Archive/Category Layout',
                        'default' => 'Portfolio One Column',
                    ),
                    array (
                        'desc' => 'Select the sidebar that will be added to the archive/category pages.',
                        'id' => 'portfolio_archive_sidebar',
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
                        'title' => 'Portfolio Archive/Category Sidebar',
                        'default' => 'None',
                    ),
                    array (
                        'desc' => 'Choose to display an excerpt or full portfolio content on archive / portfolio pages. Note: The "Full Content" option will override the page excerpt settings.',
                        'id' => 'portfolio_content_length',
                        'type' => 'select',
                        'options' => array (
                            'Excerpt' => 'Excerpt',
                            'Full Content' => 'Full Content',
                        ),
                        'title' => 'Excerpt or Full Portfolio Content',
                        'default' => 'Excerpt',
                    ),
                    array (
                        'desc' => 'Insert the number of words you want to show in the post excerpts.',
                        'id' => 'excerpt_length_portfolio',
                        'type' => 'text',
                        'title' => 'Excerpt Length',
                        'default' => '55',
                    ),
                    array (
                        'desc' => 'Select the pagination type for Portfolio Grid layouts.',
                        'id' => 'grid_pagination_type',
                        'type' => 'select',
                        'options' => array (
                            'Pagination' => 'Pagination',
                            'Infinite Scroll' => 'Infinite Scroll',
                        ),
                        'title' => 'Grid Pagination Type',
                        'default' => 'pagination',
                    ),
                    array (
                        'desc' => 'Change/Rewrite the permalink when you use the permalink type as %postname%. <strong>Make sure to regenerate permalinks.</strong>',
                        'id' => 'portfolio_slug',
                        'type' => 'text',
                        'title' => 'Portfolio Slug',
                        'default' => 'portfolio-items',
                    ),
                    array (
                        'id' => 'blog_single_post',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Portfolio Single Post Page Options</h3>',
                    ),
                    array (
                        'desc' => 'Check the box to display featured images and videos on single post pages.',
                        'id' => 'portfolio_featured_images',
                        'type' => 'checkbox',
                        'title' => 'Featured Image / Video on Single Post Page',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to disable previous/next pagination.',
                        'id' => 'portfolio_pn_nav',
                        'type' => 'checkbox',
                        'title' => 'Disable Previous/Next Pagination',
                    ),
                    array (
                        'desc' => 'Check the box to enable comments on portfolio items.',
                        'id' => 'portfolio_comments',
                        'type' => 'checkbox',
                        'title' => 'Show Comments',
                    ),
                    array (
                        'desc' => 'Check the box to enable Author on portfolio items.',
                        'id' => 'portfolio_author',
                        'type' => 'checkbox',
                        'title' => 'Show Author',
                    ),
                    array (
                        'desc' => 'Check the box to display the social sharing box.',
                        'id' => 'portfolio_social_sharing_box',
                        'type' => 'checkbox',
                        'title' => 'Social Sharing Box',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to display related posts.',
                        'id' => 'portfolio_related_posts',
                        'type' => 'checkbox',
                        'title' => 'Related Posts',
                        'default' => 1,
                    )
                )
            );
            /*
             *
              *
              *
              * New Tab SOCIAL SHARE BOX
              *
              *
              * */

//////////////////////////////////////////////////////////////////////



            $this->sections[] = array(
                'icon'      => 'el-icon-group',
                'title'     => __('Social Share Box ', 'redux-framework-demo'),
                'fields'    => array(
                    array (
                        'id' => 'social_share_box_icon_options_title',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Social Share Box Icon Options</h3>',
                    ),
                    array (
                        'desc' => 'Controls the background color of the social share box.',
                        'id' => 'social_bg_color',
                        'type' => 'color',
                        'title' => 'Social Share Box Background Color',
                        'default' => '#f6f6f6',
                    ),
                    array (
                        'desc' => 'Select a custom social icon color.',
                        'id' => 'sharing_social_links_icon_color',
                        'type' => 'color',
                        'title' => 'Social Sharing Box Custom Icons Color',
                        'default' => '#bebdbd',
                    ),
                    array (
                        'desc' => 'Controls the color of the social icons in the sharing box.',
                        'id' => 'sharing_social_links_boxed',
                        'type' => 'select',
                        'options' => array (
                            'No' => 'No',
                            'Yes' => 'Yes',
                        ),
                        'title' => 'Social Sharing Box Icons Boxed',
                        'default' => 'No',
                    ),
                    array (
                        'desc' => 'Select a custom social icon box color.',
                        'id' => 'sharing_social_links_box_color',
                        'type' => 'color',
                        'title' => 'Social Sharing Box Icons Custom Box Color',
                        'default' => '#e8e8e8',
                    ),
                    array (
                        'desc' => 'Boxradius for the social icons. In pixels, ex: 4px.',
                        'id' => 'sharing_social_links_boxed_radius',
                        'type' => 'text',
                        'title' => 'Social Sharing Box Icons Boxed Radius',
                        'default' => '4px',
                    ),
                    array (
                        'desc' => 'Controls the tooltip position of the social icons in the sharing box.',
                        'id' => 'sharing_social_links_tooltip_placement',
                        'type' => 'select',
                        'options' => array (
                            'Top' => 'Top',
                            'Right' => 'Right',
                            'Bottom' => 'Bottom',
                            'Left' => 'Left',
                            'None' => 'None',
                        ),
                        'title' => 'Social Sharing Box Icons Tooltip Position',
                        'default' => 'Top',
                    ),
                    array (
                        'id' => 'social_share_box_links_title',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Social Share Box Links</h3>',
                    ),
                    array (
                        'desc' => 'Check the box to show the facebook sharing icon in blog posts.',
                        'id' => 'sharing_facebook',
                        'type' => 'checkbox',
                        'title' => 'Facebook',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show the twitter sharing icon in blog posts.',
                        'id' => 'sharing_twitter',
                        'type' => 'checkbox',
                        'title' => 'Twitter',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show the reddit sharing icon in blog posts.',
                        'id' => 'sharing_reddit',
                        'type' => 'checkbox',
                        'title' => 'Reddit',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show the linkedin sharing icon in blog posts.',
                        'id' => 'sharing_linkedin',
                        'type' => 'checkbox',
                        'title' => 'LinkedIn',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show the g+ sharing icon in blog posts.',
                        'id' => 'sharing_google',
                        'type' => 'checkbox',
                        'title' => 'Google Plus',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show the tumblr sharing icon in blog posts.',
                        'id' => 'sharing_tumblr',
                        'type' => 'checkbox',
                        'title' => 'Tumblr',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show the pinterest sharing icon in blog posts.',
                        'id' => 'sharing_pinterest',
                        'type' => 'checkbox',
                        'title' => 'Pinterest',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show the email sharing icon in blog posts.',
                        'id' => 'sharing_email',
                        'type' => 'checkbox',
                        'title' => 'Email',
                        'default' => 1,
                    ),
                )


            );



            /*
             *
              *
              *
              * New Tab Page Title Bar
              *
              *
              * */

            //////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-hourglass',
                'title'     => __('Page Title Bar', 'redux-framework-demo'),
                'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
                'fields'    => array(
                    array (
                        'id' => 'header_info',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Page Title Bar Options</h3>',
                    ),
                    array (
                        'desc' => 'Check the box to show the page title bar. This is a global option for every page or post, and this can be overridden by individual page/post options.',
                        'id' => 'page_title_bar',
                        'type' => 'checkbox',
                        'title' => 'Page Title Bar',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'In pixels, ex: 10px',
                        'id' => 'page_title_height',
                        'type' => 'text',
                        'title' => 'Page Title Bar Height',
                        'default' => '87px',
                    ),
                    array (
                        'desc' => 'Select an image or insert an image url to use for the page title bar background.',
                        'id' => 'page_title_bg',
                        'type' => 'media',
                        'title' => 'Page Title Bar Background',
                        'default' => array (
                            'url' => 'http://localhost/darlic/wp-content/themes/aione/images/page_title_bg.png',
                        ),
                        'url' => true,
                    ),
                    array (
                        'desc' => 'Select an image or insert an image url to use for the retina page title bar background.',
                        'id' => 'page_title_bg_retina',
                        'type' => 'media',
                        'title' => 'Page Title Bar Background (Retina Version @2x)',
                        'url' => true,
                    ),
                    array (
                        'desc' => 'Check this box to have the page title bar background image display at 100% in width and height and scale according to the browser size.',
                        'id' => 'page_title_bg_full',
                        'type' => 'checkbox',
                        'title' => '100% Background Image',
                    ),
                    array (
                        'desc' => 'Check to enable parallax background image when scrolling.',
                        'id' => 'page_title_bg_parallax',
                        'type' => 'checkbox',
                        'title' => 'Parallax Background Image',
                    ),
                    array (
                        'id' => 'header_info',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Breadcrumb Options</h3>',
                    ),
                    array (
                        'desc' => 'Check to display the breadcrumbs or search bar in general. Uncheck to hide them.',
                        'id' => 'breadcrumb',
                        'type' => 'checkbox',
                        'title' => 'Display Breadcrumbs/Search Bar',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Choose to display breadcrumbs or search box in the page title bar.',
                        'id' => 'page_title_bar_bs',
                        'options' => array (
                            'Breadcrumbs' => 'Breadcrumbs',
                            'Search Box' => 'Search Box',
                        ),
                        'type' => 'select',
                        'title' => 'Breadcrumbs or Search Box?',
                        'default' => 'Breadcrumbs',
                    ),
                    array (
                        'desc' => 'Check to display breadcrumbs on mobile devices.',
                        'id' => 'breadcrumb_mobile',
                        'type' => 'checkbox',
                        'title' => 'Breadcrumbs on Mobile Devices',
                    ),
                    array (
                        'desc' => 'The text before the breadcrumb menu.',
                        'id' => 'breacrumb_prefix',
                        'type' => 'text',
                        'title' => 'Breadcrumb Menu Prefix',
                    )
            )

            );

            /*
             *
              *
              *
              * New Tab Slideshows
              *
              *
              * */

            //////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-screenshot',
                'title'     => __('Slideshows', 'redux-framework-demo'),
                'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
                'fields'    => array(
                    array (
                        'desc' => 'This option controls the number of featured image boxes for blog/portfolio slideshows.',
                        'id' => 'posts_slideshow_number',
                        'type' => 'text',
                        'title' => 'Posts Slideshow Images',
                        'default' => '5',
                    ),
                    array (
                        'desc' => 'Check the box to autoplay the slideshow.',
                        'id' => 'slideshow_autoplay',
                        'type' => 'checkbox',
                        'title' => 'Autoplay',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to enable smooth height on slideshows when using images with different heights. Please note, smooth height is disabled on blog grid layout.',
                        'id' => 'slideshow_smooth_height',
                        'type' => 'checkbox',
                        'title' => 'Enable Smooth Height',
                    ),
                    array (
                        'desc' => 'Controls the speed of slideshows for the [slider] shortcode and sliders within posts. ex: 1000 = 1 second.',
                        'id' => 'slideshow_speed',
                        'type' => 'text',
                        'title' => 'Slideshow speed',
                        'default' => '7000',
                    ),
                    array (
                        'desc' => 'Check the box if you want to show pagination circles below a video slide for the slider shortcode. Leave it unchecked to hide them on video slides.',
                        'id' => 'pagination_video_slide',
                        'type' => 'checkbox',
                        'title' => 'Pagination circles below video slides',
                    ),
                    array (
                        'desc' => 'Check the box to enable posts slideshow in legacy mode. Only recommended for v.1 users, this option will disable the multiple featured image method.<strong>This option will be removed in next update.</strong>',
                        'id' => 'legacy_posts_slideshow',
                        'type' => 'checkbox',
                        'title' => '<strong>Deprecated</strong>: Legacy Posts Slideshow',
                    ),
                    array (
                        'desc' => 'Check the box to show post slideshows in blog/portfolio pages. <strong>This option will be removed in next update.</strong>',
                        'id' => 'posts_slideshow',
                        'type' => 'checkbox',
                        'title' => 'Deprecated: Posts Slideshow',
                        'default' => 1,
                    ),


                )

            );

            /*
             *
              *
              *
              * New Tab Elastic Slider
              *
              *
              * */

            //////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-star',
                'title'     => __('Elastic Slider', 'redux-framework-demo'),
                'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
                'fields'    => array(
                    array (
                        'desc' => 'In pixels or percentage, ex: 100% or 100.',
                        'id' => 'tfes_slider_width',
                        'type' => 'text',
                        'title' => 'Slider Width',
                        'default' => '100%',
                    ),
                    array (
                        'desc' => 'In pixels, ex: 100px.',
                        'id' => 'tfes_slider_height',
                        'type' => 'text',
                        'title' => 'Slider Height',
                        'default' => '400px',
                    ),
                    array (
                        'desc' => 'Slides animate from sides or center.',
                        'id' => 'tfes_animation',
                        'options' => array (
                            'sides' => 'sides',
                            'center' => 'center',
                        ),
                        'type' => 'select',
                        'title' => 'Animation',
                        'default' => 'sides',
                    ),
                    array (
                        'desc' => 'Check the box to autoplay the slides.',
                        'id' => 'tfes_autoplay',
                        'type' => 'checkbox',
                        'title' => 'Autoplay',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Select the slideshow speed, 1000 = 1 second.',
                        'id' => 'tfes_interval',
                        'type' => 'text',
                        'title' => 'Slideshow Interval',
                        'default' => '3000',
                    ),
                    array (
                        'desc' => 'Select the animation speed, 1000 = 1 second.',
                        'id' => 'tfes_speed',
                        'type' => 'text',
                        'title' => 'Sliding Speed',
                        'default' => '800',
                    ),
                    array (
                        'desc' => 'Enter the width for thumbnail without \'px\' ex: 100.',
                        'id' => 'tfes_width',
                        'type' => 'text',
                        'title' => 'Thumbnail Width',
                        'default' => '150',
                    ),
                    array (
                        'desc' => 'Default is 42',
                        'id' => 'es_title_font_size',
                        'type' => 'select',
                        'options' => array (
                            10 => '10',
                            11 => '11',
                            12 => '12',
                            13 => '13',
                            14 => '14',
                            15 => '15',
                            16 => '16',
                            17 => '17',
                            18 => '18',
                            19 => '19',
                            20 => '20',
                            21 => '21',
                            22 => '22',
                            23 => '23',
                            24 => '24',
                            25 => '25',
                            26 => '26',
                            27 => '27',
                            28 => '28',
                            29 => '29',
                            30 => '30',
                            31 => '31',
                            32 => '32',
                            33 => '33',
                            34 => '34',
                            35 => '35',
                            36 => '36',
                            37 => '37',
                            38 => '38',
                            39 => '39',
                            40 => '40',
                            41 => '41',
                            42 => '42',
                            43 => '43',
                            44 => '44',
                            45 => '45',
                            46 => '46',
                            47 => '47',
                            48 => '48',
                            49 => '49',
                            50 => '50',
                        ),
                        'title' => 'Title Font Size (px)',
                        'default' => '42',
                    ),
                    array (
                        'desc' => 'Default is 20',
                        'id' => 'es_caption_font_size',
                        'type' => 'select',
                        'options' => array (
                            10 => '10',
                            11 => '11',
                            12 => '12',
                            13 => '13',
                            14 => '14',
                            15 => '15',
                            16 => '16',
                            17 => '17',
                            18 => '18',
                            19 => '19',
                            20 => '20',
                            21 => '21',
                            22 => '22',
                            23 => '23',
                            24 => '24',
                            25 => '25',
                            26 => '26',
                            27 => '27',
                            28 => '28',
                            29 => '29',
                            30 => '30',
                            31 => '31',
                            32 => '32',
                            33 => '33',
                            34 => '34',
                            35 => '35',
                            36 => '36',
                            37 => '37',
                            38 => '38',
                            39 => '39',
                            40 => '40',
                            41 => '41',
                            42 => '42',
                            43 => '43',
                            44 => '44',
                            45 => '45',
                            46 => '46',
                            47 => '47',
                            48 => '48',
                            49 => '49',
                            50 => '50',
                        ),
                        'title' => 'Caption Font Size (px)',
                        'default' => '20',
                    ),
                    array (
                        'desc' => 'Controls the text color of the title font.',
                        'id' => 'es_title_color',
                        'type' => 'color',
                        'title' => 'Title Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the text color of the caption font.',
                        'id' => 'es_caption_color',
                        'type' => 'color',
                        'title' => 'Caption Color',
                        'default' => '#747474',
                    ),

                )

            );
            /*
             *
              *
              *
              * New Tab Elastic Slider
              *
              *
              * */

            //////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-wrench',
                'title'     => __('Lightbox', 'redux-framework-demo'),
                'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
                'fields'    => array(
                    array (
                        'desc' => 'Set the speed of the animation.',
                        'id' => 'lightbox_animation_speed',
                        'type' => 'select',
                        'options' => array (
                            'Fast' => 'Fast',
                            'Slow' => 'Slow',
                            'Normal' => 'Normal',
                        ),
                        'title' => 'Animation Speed',
                        'default' => 'fast',
                    ),
                    array (
                        'desc' => 'Check the box to show the gallery.',
                        'id' => 'lightbox_gallery',
                        'type' => 'checkbox',
                        'title' => 'Show gallery',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to autoplay the lightbox gallery.',
                        'id' => 'lightbox_autoplay',
                        'type' => 'checkbox',
                        'title' => 'Autoplay the Lightbox Gallery',
                    ),
                    array (
                        'desc' => 'If autoplay is enabled, set the slideshow speed, 1000 = 1 second.',
                        'id' => 'lightbox_slideshow_speed',
                        'type' => 'text',
                        'title' => 'Slideshow Speed',
                        'default' => '5000',
                    ),
                    array (
                        'desc' => 'Set the opacity of background, <br />0.1 (lowest) to 1 (highest).',
                        'id' => 'lightbox_opacity',
                        'type' => 'text',
                        'title' => 'Background Opacity',
                        'default' => '0.8',
                    ),
                    array (
                        'desc' => 'Check the box to show the image caption.',
                        'id' => 'lightbox_title',
                        'type' => 'checkbox',
                        'title' => 'Show Caption',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show the image description. The Alternative text field is used for the description.',
                        'id' => 'lightbox_desc',
                        'type' => 'checkbox',
                        'title' => 'Show Description',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show social sharing buttons on lightbox.',
                        'id' => 'lightbox_social',
                        'type' => 'checkbox',
                        'title' => 'Social Sharing',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to show post images that are inside the post content area in the lightbox.',
                        'id' => 'lightbox_post_images',
                        'type' => 'checkbox',
                        'title' => 'Show Post Images in Lightbox',
                    ),

                )

            );

            /*
             *
              *
              *
              * New Tab Sidebar
              *
              *
              * */

            //////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-lines',
                'title'     => __('Sidebar', 'redux-framework-demo'),
                'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
                'fields'    => array(

                    array (
                        'desc' => 'Enter a value (based on percentage) without % sign, ex: 71.',
                        'id' => 'content_width',
                        'type' => 'text',
                        'title' => 'Content Area Width',
                        'default' => '71.1702128',
                    ),
                    array (
                        'desc' => 'Enter a value (based on percentage) without % sign, ex: 23.',
                        'id' => 'sidebar_width',
                        'type' => 'text',
                        'title' => 'Sidebar Width',
                        'default' => '23.4042553',
                    ),
                    array (
                        'desc' => 'Enter a value (based on percentage) without % sign, ex: 0.',
                        'id' => 'sidebar_padding',
                        'type' => 'text',
                        'title' => 'Sidebar Padding',
                    ),
                    array (
                        'id' => 'sidebar_info',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin-top:0;\'>Important Instructions For These Options:</h3><b>1.  100% </b>- Your values added up cannot go over 100% or your sidebar will not show.<br /></br />
    <b>2. PADDING </b>-  Is always multiplied by 2 because it adds left and right padding. So a padding value of 5, actually equals 10.  And you should only use padding if you are using a background color that is different than your main background color.<br /></br />

    <b>3.  UNSEEN SPACE</b> - You need to factor in the space between the Content Width & Sidebar Width. This space does not have a field.<br /></br />

    <b>EXAMPLE 1:</b> Content Width = 65 + Sidebar Width = 30  + Padding = 0
    * this example adds up to 95% which leaves you 5% in between the content and sidebar sections. This is good to use if your sidebar background is the same color as your main background<br /></br />

    <b>EXAMPLE 2:</b> Content Width = 60 + Sidebar Width = 30  + Padding = 2.5
    * this example adds up to 95% which leaves you 5% in between the content and sidebar sections. This is good to use if your sidebar background is a different color than your main background',
                    ),

                )

            );

            /*
             *
              *
              *
              * New Tab Extra
              *
              *
              * */

            //////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-scissors',
                'title'     => __('Extra', 'redux-framework-demo'),
                'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
                'fields'    => array(
                    array (
                        'id' => 'misc_options',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Miscellaneous Options</h3>',
                    ),
                    array (
                        'desc' => 'Select the default position of the sidebar. This will take effect for new pages/posts.',
                        'id' => 'default_sidebar_pos',
                        'options' => array (
                            'Right' => 'Right',
                            'Left' => 'Left',
                        ),
                        'type' => 'select',
                        'title' => 'Default Sidebar Position',
                        'default' => 'right',
                    ),
                    array (
                        'desc' => 'Controls the side navigation animation for child pages, on click or hover.',
                        'id' => 'sidenav_behavior',
                        'options' => array (
                            'Hover' => 'Hover',
                            'Click' => 'Click',
                        ),
                        'type' => 'select',
                        'title' => 'Sidenav Behavior',
                        'default' => 'hover',
                    ),
                    array (
                        'desc' => 'This option controls the amount of related projects / posts that show up on each single portfolio and blog post. ex: 5',
                        'id' => 'number_related_posts',
                        'type' => 'text',
                        'title' => 'Number of Related Posts / Projects',
                        'default' => '5',
                    ),
                    array (
                        'desc' => 'Choose if the excerpt length should be based on words or characters.',
                        'id' => 'excerpt_base',
                        'options' => array (
                            'Words' => 'Words',
                            'Characters' => 'Characters',
                        ),
                        'type' => 'select',
                        'title' => 'Basis for Excerpt Length',
                        'default' => 'words',
                    ),
                    array (
                        'desc' => 'Check the box to disable the read more sign [...] on excerpts throughout the site.',
                        'id' => 'disable_excerpts',
                        'type' => 'checkbox',
                        'title' => 'Disable [...] on Excerpts',
                    ),
                    array (
                        'desc' => 'Check the box to have the read more sign [...] on excerpts link to single post page.',
                        'id' => 'link_read_more',
                        'type' => 'checkbox',
                        'title' => 'Make [...] Link to Single Post Page',
                    ),
                    array (
                        'desc' => 'Check the box to allow comments on regular pages.',
                        'id' => 'comments_pages',
                        'type' => 'checkbox',
                        'title' => 'Allow Comments on Pages',
                    ),
                    array (
                        'desc' => 'Check the box to disable featured images on regular pages.',
                        'id' => 'featured_images_pages',
                        'type' => 'checkbox',
                        'title' => 'Featured Images on Pages',
                    ),
                    array (
                        'desc' => 'Check the box to show featured images on FAQ archive page.',
                        'id' => 'faq_featured_image',
                        'type' => 'checkbox',
                        'title' => 'FAQ Featured Images',
                    ),
                    array (
                        'desc' => 'Check the box to add rel="nofollow" attribute to all social links.',
                        'id' => 'nofollow_social_links',
                        'type' => 'checkbox',
                        'title' => 'Add rel="nofollow" to social links',
                    ),
                    array (
                        'desc' => 'Select the checkbox to allow social icons to open in a new window.',
                        'id' => 'social_icons_new',
                        'type' => 'checkbox',
                        'title' => 'Open Social Icons in a New Window',
                        'default' => 1,
                    ),

                    array (
                        'id' => 'rollovers',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Image Rollover Options</h3>',
                    ),
                    array (
                        'desc' => 'Check the box to show the rollover box on images.',
                        'id' => 'image_rollover',
                        'type' => 'checkbox',
                        'title' => 'Image Rollover',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to disable the link icon from image rollovers. Note: This option will override the post settings.',
                        'id' => 'link_image_rollover',
                        'type' => 'checkbox',
                        'title' => 'Disable Link Icon From Image Rollover',
                    ),
                    array (
                        'desc' => 'Check the box to disable the image icon from image rollovers. Note: This option will override the post settings.',
                        'id' => 'zoom_image_rollover',
                        'type' => 'checkbox',
                        'title' => 'Disable Image Icon From Image Rollover',
                    ),
                    array (
                        'desc' => 'Check the box to disable the title from image rollovers.',
                        'id' => 'title_image_rollover',
                        'type' => 'checkbox',
                        'title' => 'Disable Title From Image Rollover',
                    ),
                    array (
                        'desc' => 'Check the box to disable the categories from image rollovers.',
                        'id' => 'cats_image_rollover',
                        'type' => 'checkbox',
                        'title' => 'Disable Categories From Image Rollover',
                    ),
                    array (
                        'desc' => 'Select the opacity of the rollover. <br />0.1 (lowest) to 1 (highest).',
                        'id' => 'image_rollover_opacity',
                        'type' => 'text',
                        'title' => 'Image Rollover Opacity',
                        'default' => '1',
                    ),
                    array (
                        'id' => 'bbpress_only',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>BBPress Options</h3>',
                    ),
                    array (
                        'desc' => 'Check the box if you want to use one global sidebar on all forum pages.',
                        'id' => 'bbpress_global_sidebar',
                        'type' => 'checkbox',
                        'title' => 'BBPress Use Global Sidebar',
                    ),
                    array (
                        'desc' => 'Select the sidebar that will display on forum pages globally.',
                        'id' => 'ppbress_sidebar',
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
                        'title' => 'BBPress Global Sidebar',
                        'default' => 'None',
                    ),


                )

            );
            /*
             *
              *
              *
              * New Tab Advanced
              *
              *
              * */

            //////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-idea',
                'title'     => __('Advanced', 'redux-framework-demo'),
                'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
                'fields'    => array(
                    array (
                        'id' => 'enable_disable_heading',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Enable / Disable Theme Features & Plugin Support</h3>',
                    ),
                    array (
                        'desc' => 'Check to disable the theme\'s mega menu.',
                        'id' => 'disable_megamenu',
                        'type' => 'checkbox',
                        'title' => 'Disable Mega Menu',
                    ),
                    array (
                        'desc' => 'Check the box to disable the aione styles and use the default Revolution Slider styles.',
                        'id' => 'aione_rev_styles',
                        'type' => 'checkbox',
                        'title' => 'Disable aione Styles For Revolution Slider',
                    ),
                    array (
                        'desc' => 'Check the box if you are are using UberMenu, this option adds UberMenu support without editing any code.',
                        'id' => 'ubermenu',
                        'type' => 'checkbox',
                        'title' => 'UberMenu Plugin Support',
                    ),
                    array (
                        'desc' => 'Check the box to disable CSS animations on shortcode items.',
                        'id' => 'use_animate_css',
                        'type' => 'checkbox',
                        'title' => 'Disable CSS Animations',
                    ),
                    array (
                        'desc' => 'Check the box to disable CSS animations on mobiles only.',
                        'id' => 'disable_mobile_animate_css',
                        'type' => 'checkbox',
                        'title' => 'Disable CSS Animations on Mobiles Only',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Check the box to disable Lightbox.',
                        'id' => 'status_lightbox',
                        'type' => 'checkbox',
                        'title' => 'Disable Lightbox',
                    ),
                    array (
                        'desc' => 'Check the box to disable Lightbox only on single posts and portfolio pages..',
                        'id' => 'status_lightbox_single',
                        'type' => 'checkbox',
                        'title' => 'Disable Lightbox On Single Posts Pages Only',
                    ),
                    array (
                        'desc' => 'Check the box to disable Youtube API scripts.',
                        'id' => 'status_yt',
                        'type' => 'checkbox',
                        'title' => 'Disable Youtube API Scripts',
                    ),
                    array (
                        'desc' => 'Check the box to disable Vimeo API scripts.',
                        'id' => 'status_vimeo',
                        'type' => 'checkbox',
                        'title' => 'Disable Vimeo API Scripts',
                    ),
                    array (
                        'desc' => 'Check the box to disable google map.',
                        'id' => 'status_gmap',
                        'type' => 'checkbox',
                        'title' => 'Disable Google Map Scripts',
                    ),
                    array (
                        'desc' => 'Check the box to disable the ToTop script which adds the scrolling to top functionality.',
                        'id' => 'status_totop',
                        'type' => 'checkbox',
                        'title' => 'Disable ToTop Script',
                    ),
                    array (
                        'desc' => 'Check the box to enable the ToTop script on mobile devices.',
                        'id' => 'status_totop_mobile',
                        'type' => 'checkbox',
                        'title' => 'Enable ToTop Script on mobile',
                    ),
                    array (
                        'desc' => 'Check the box to disable aione slider.',
                        'id' => 'status_aione_slider',
                        'type' => 'checkbox',
                        'title' => 'Disable Aione Slider',
                    ),
                    array (
                        'desc' => 'Check the box to disable elastic slider.',
                        'id' => 'status_eslider',
                        'type' => 'checkbox',
                        'title' => 'Disable Elastic Slider',
                    ),
                    array (
                        'desc' => 'Check the box to disable font awesome.',
                        'id' => 'status_fontawesome',
                        'type' => 'checkbox',
                        'title' => 'Disable FontAwesome',
                    ),


                )

            );

            /*********************************************************************************************/

            /*
            *
             *
             *
             * New Tab Background
             *
             *
             * */

   //////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'icon'      => 'el-icon-screen',
                'title'     => __('Background', 'redux-framework-demo'),
                'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
                'fields'    => array(
                    array (
                        'desc' => 'Select boxed or wide layout.',
                        'id' => 'layout',
                        'type' => 'select',
                        'options' => array (
                            'Boxed' => 'Boxed',
                            'Wide' => 'Wide',
                        ),
                        'title' => 'Layout',
                        'default' => 'Wide',
                    ),
                    array (
                        'id' => 'boxed_mode_only',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Background options below only work in boxed mode</h3>',
                    ),
                    array (
                        'desc' => 'Select an image or insert an image url to use for the backgroud.',
                        'id' => 'bg_image',
                        'type' => 'media',
                        'title' => 'Background Image For Outer Areas In Boxed Mode',
                        'url' => true,
                    ),
                    array (
                        'desc' => 'Check this box to have the background image display at 100% in width and height and scale according to the browser size.',
                        'id' => 'bg_full',
                        'type' => 'checkbox',
                        'title' => '100% Background Image',
                    ),
                    array (
                        'desc' => 'Select how the background image repeats.',
                        'id' => 'bg_repeat',
                        'type' => 'select',
                        'options' => array (
                            'repeat' => 'repeat',
                            'repeat-x' => 'repeat-x',
                            'repeat-y' => 'repeat-y',
                            'no-repeat' => 'no-repeat',
                        ),
                        'title' => 'Background Repeat',
                    ),
                    array (
                        'desc' => 'Select a background color.',
                        'id' => 'bg_color',
                        'type' => 'color',
                        'title' => 'Background Color For Outer Areas In Boxed Mode',
                        'default' => '#d7d6d6',
                    ),
                    array (
                        'desc' => 'Check the box to display a pattern in the background. If checked, select the pattern from below.',
                        'id' => 'bg_pattern_option',
                        'type' => 'checkbox',
                        'title' => 'Background Pattern',
                    ),
                    array (
                        'id' => 'bg_pattern',
                        'type' => 'image_select',
                        'options' => array (
                            'pattern1' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern1.png',
                            'pattern2' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern2.png',
                            'pattern3' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern3.png',
                            'pattern4' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern4.png',
                            'pattern5' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern5.png',
                            'pattern6' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern6.png',
                            'pattern7' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern7.png',
                            'pattern8' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern8.png',
                            'pattern9' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern9.png',
                            'pattern10' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern10.png',
                        ),
                        'title' => 'Select a Background Pattern',
                        'default' => 'pattern1',
                        'tiles' => true,
                    ),
                )
                );

            /*********************************************************************************************/
            $this->sections[] = array(
                'icon'      => 'el-icon-slideshare',
                'title'     => __('Header Background', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Select an image or insert an image url to use for the header background.',
                        'id' => 'header_bg_image',
                        'type' => 'media',
                        'title' => 'Background Image For Header Area',
                        'url' => true,
                    ),
                    array (
                        'desc' => 'Check this box to have the header background image display at 100% in width and height and scale according to the browser size.',
                        'id' => 'header_bg_full',
                        'type' => 'checkbox',
                        'title' => '100% Background Image',
                    ),
                    array (
                        'desc' => 'Check this box to enable parallax background image when scrolling.',
                        'id' => 'header_bg_parallax',
                        'type' => 'checkbox',
                        'title' => 'Parallax Background Image',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Select how the background image repeats.',
                        'id' => 'header_bg_repeat',
                        'type' => 'select',
                        'options' => array (
                            'repeat' => 'repeat',
                            'repeat-x' => 'repeat-x',
                            'repeat-y' => 'repeat-y',
                            'no-repeat' => 'no-repeat',
                        ),
                        'title' => 'Background Repeat',
                    )
                )

            );

            /*********************************************************************************************/
            $this->sections[] = array(
                'icon'      => 'el-icon-adjust-alt',
                'title'     => __('Footer Background', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(

                    array (
                        'desc' => 'Select an image or insert an image url to use for the footer widget area backgroud.',
                        'id' => 'footerw_bg_image',
                        'type' => 'media',
                        'title' => 'Background Image For Footer Area',
                        'url' => true,
                    ),
                    array (
                        'desc' => 'Check this box to have the footer background image display at 100% in width and height and scale according to the browser size.',
                        'id' => 'footerw_bg_full',
                        'type' => 'checkbox',
                        'title' => '100% Background Image',
                    ),
                    array (
                        'desc' => 'Check to enable parallax background image when scrolling.',
                        'id' => 'footer_area_bg_parallax',
                        'type' => 'checkbox',
                        'title' => 'Parallax Background Image',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Select how the background image repeats.',
                        'id' => 'footerw_bg_repeat',
                        'type' => 'select',
                        'options' => array (
                            'repeat' => 'repeat',
                            'repeat-x' => 'repeat-x',
                            'repeat-y' => 'repeat-y',
                            'no-repeat' => 'no-repeat',
                        ),
                        'title' => 'Background Repeat',
                    ),
                    array (
                        'desc' => 'Select the position from where background image starts.',
                        'id' => 'footerw_bg_pos',
                        'type' => 'select',
                        'options' => array (
                            0 => 'top left',
                            1 => 'top center',
                            2 => 'top right',
                            3 => 'center left',
                            4 => 'center center',
                            5 => 'center right',
                            6 => 'bottom left',
                            7 => 'bottom center',
                            8 => 'bottom right',
                        ),
                        'title' => 'Background Position',
                        'default' => 'center center',
                    )
                )

            );
            /*********************************************************************************************/
            $this->sections[] = array(
                'icon'      => 'el-icon-adjust',
                'title'     => __('Main Content Area Background', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(

                    array (
                        'id' => 'both_modes_only',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Background Options Below Work For Boxed & Wide Mode</h3>',

                    ),
                    array (
                        'desc' => 'Select an image or insert an image url to use for the main content area backgroud.',
                        'id' => 'content_bg_image',
                        'type' => 'media',
                        'title' => 'Background Image For Main Content Area',
                        'url' => true,
                    ),
                    array (
                        'desc' => 'Check this box to have the background image display at 100% in width and height and scale according to the browser size.',
                        'id' => 'content_bg_full',
                        'type' => 'checkbox',
                        'title' => '100% Background Image',
                    ),
                    array (
                        'desc' => 'Select how the background image repeats.',
                        'id' => 'content_bg_repeat',
                        'type' => 'select',
                        'options' => array (
                            'repeat' => 'repeat',
                            'repeat-x' => 'repeat-x',
                            'repeat-y' => 'repeat-y',
                            'no-repeat' => 'no-repeat',
                        ),
                        'title' => 'Background Repeat',
                    )
                )

            );

            /*
           *
            *
            *
            * New Tab Layout Options
            *
            *
            * */
//////////////////////////////////////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'title' => 'Layout Options',
                'icon'      => 'el-icon-tint',
                'fields' => array (
                    array (
                        'desc' => '(in pixels ex: 20px)',
                        'id' => 'main_top_padding',
                        'type' => 'text',
                        'title' => 'Page Content Top Padding',
                        'default' => '55px',
                    ),
                    array (
                        'desc' => '(in pixels ex: 20px)',
                        'id' => 'main_bottom_padding',
                        'type' => 'text',
                        'title' => 'Page Content Bottom Padding',
                        'default' => '40px',
                    ),
                    array (
                        'desc' => 'Select the left and right padding for the 100% width template main content area. Enter value in px. ex: 20px',
                        'id' => 'hundredp_padding',
                        'type' => 'text',
                        'title' => '100% Width Template Left/Right Padding',
                        'default' => '20px',
                    ),
                    array (
                        'desc' => 'Check to disable the text shadow in the Sliding Bar.',
                        'id' => 'slidingbar_text_shadow',
                        'type' => 'checkbox',
                        'title' => 'Disable Sliding Bar Text Shadow',
                    ),
                    array (
                        'desc' => 'Check to disable the text shadow in the footer.',
                        'id' => 'footer_text_shadow',
                        'type' => 'checkbox',
                        'title' => 'Disable Footer Text Shadow',
                    ),
                )
            );


                /*
                *
                 *
                 *
                 * New Tab Color
                 *
                 *
                 * */
//////////////////////////////////////////////////////////////////////////////////////////////////////
            $this->sections[] = array(
                'title' => 'Color',
                'icon'      => 'el-icon-magic',
                'fields' => array (
                    array (
                        'desc' => 'Select a skin, all color options will automatically change to the defined skin.',
                        'id' => 'scheme_type',
                        'type' => 'select',
                        'options' => array (
                            'Light' => 'Light',
                            'Dark' => 'Dark',
                        ),
                        'title' => 'Select Theme Skin',
                        'default' => 'Light',
                    ),
                    array (
                        'desc' => 'Select a scheme, all color options will automatically change to the defined scheme.',
                        'id' => 'color_scheme',
                        'type' => 'select',
                        'options' => array (
                            'Red' => 'Red',
                            'Light Red' => 'Light Red',
                            'Blue' => 'Blue',
                            'Light Blue' => 'Light Blue',
                            'Green' => 'Green',
                            'Dark Green' => 'Dark Green',
                            'Orange' => 'Orange',
                            'Pink' => 'Pink',
                            'Brown' => 'Brown',
                            'Light Grey' => 'Light Grey',
                        ),
                        'title' => 'Predefined Color Scheme',
                        'default' => 'Green',
                    )
                )
            );

            /*********************************************************************************************/
            $this->sections[] = array(
                'icon'      => 'el-icon-livejournal',
                'title'     => __('Background Color', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Controls several items, ex: link hovers, highlights, and more.',
                        'id' => 'primary_color',
                        'type' => 'color',
                        'title' => 'Primary Color',
                        'default' => '#a0ce4e',
                    ),
                    array (
                        'desc' => 'Controls the color of the top sliding bar.',
                        'id' => 'slidingbar_bg_color',
                        'type' => 'color',
                        'title' => 'Sliding Bar Background Color',
                        'default' => '#363839',
                    ),
                    array (
                        'desc' => 'Controls the background color for the sticky header.',
                        'id' => 'header_sticky_bg_color',
                        'type' => 'color',
                        'title' => 'Sticky Header Background Color',
                        'default' => '#ffffff',
                    ),
                    array (
                        'desc' => 'Controls the background color for the header.',
                        'id' => 'header_bg_color',
                        'type' => 'color',
                        'title' => 'Header Background Color',
                        'default' => '#ffffff',
                    ),
                    array (
                        'desc' => 'Controls the border colors for the header.',
                        'id' => 'header_border_color',
                        'type' => 'color',
                        'title' => 'Header Border Color',
                        'default' => '#e5e5e5',
                    ),
                    array (
                        'desc' => 'Controls the background color of the top header section used in Headers 2-5.',
                        'id' => 'header_top_bg_color',
                        'type' => 'color',
                        'title' => 'Header Top Background Color',
                        'default' => '#a0ce4e',
                    ),
                    array (
                        'desc' => 'Select a color for the page title bar background.',
                        'id' => 'page_title_bg_color',
                        'type' => 'color',
                        'title' => 'Page Title Bar Background Color',
                        'default' => '#F6F6F6',
                    ),
                    array (
                        'desc' => 'Select a color for the page title bar borders.',
                        'id' => 'page_title_border_color',
                        'type' => 'color',
                        'title' => 'Page Title Bar Borders Color',
                        'default' => '#d2d3d4',
                    ),
                    array (
                        'desc' => 'Controls the background color of the main content area.',
                        'id' => 'content_bg_color',
                        'type' => 'color',
                        'title' => 'Content Background Color',
                        'default' => '#ffffff',
                    ),
                    array (
                        'desc' => 'Controls the background color of the footer.',
                        'id' => 'footer_bg_color',
                        'type' => 'color',
                        'title' => 'Footer Background Color',
                        'default' => '#363839',
                    ),
                    array (
                        'desc' => 'Controls the border colors for the footer.',
                        'id' => 'footer_border_color',
                        'type' => 'color',
                        'title' => 'Footer Border Color',
                        'default' => '#e9eaee',
                    ),
                    array (
                        'desc' => 'Controls the background color of the footer copyright.',
                        'id' => 'copyright_bg_color',
                        'type' => 'color',
                        'title' => 'Copyright Background Color',
                        'default' => '#282a2b',
                    ),
                    array (
                        'desc' => 'Controls the border colors for the footer copyright.',
                        'id' => 'copyright_border_color',
                        'type' => 'color',
                        'title' => 'Copyright Border Color',
                        'default' => '#4b4c4d',
                    ),

                )

            );

            /*********************************************************************************************/
            $this->sections[] = array(
                'icon'      => 'el-icon-leaf',
                'title'     => __('Element Color', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Controls the top color of the image rollover gradients.',
                        'id' => 'image_gradient_top_color',
                        'type' => 'color',
                        'title' => 'Rollover Image Gradient Top Color',
                        'default' => '#D1E990',
                    ),
                    array (
                        'desc' => 'Controls the bottom color of the image rollover gradients.',
                        'id' => 'image_gradient_bottom_color',
                        'type' => 'color',
                        'title' => 'Rollover Image Gradient Bottom Color',
                        'default' => '#AAD75B',
                    ),
                    array (
                        'desc' => 'This option controls the color of image rollover text and the icon circle backgrounds.',
                        'id' => 'image_rollover_text_color',
                        'type' => 'color',
                        'title' => 'Rollover Image Element Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the divider color in the sliding bar.',
                        'id' => 'slidingbar_divider_color',
                        'type' => 'color',
                        'title' => 'Sliding Bar Item Divider Color',
                        'default' => '#282A2B',
                    ),
                    array (
                        'desc' => 'Controls the divider color in the footer.',

                        'id' => 'footer_divider_color',
                        'type' => 'color',
                        'title' => 'Footer Widget Divider Color',
                        'default' => '#505152',
                    ),
                    array (
                        'desc' => 'Controls the background color of form fields.',
                        'id' => 'form_bg_color',
                        'type' => 'color',
                        'title' => 'Form Background Color',
                        'default' => '#ffffff',
                    ),
                    array (
                        'desc' => 'Controls the text color for forms.',
                        'id' => 'form_text_color',
                        'type' => 'color',
                        'title' => 'Form Text Color',
                        'default' => '#aaa9a9',
                    ),
                    array (
                        'desc' => 'Controls the border color of form fields.',
                        'id' => 'form_border_color',
                        'type' => 'color',
                        'title' => 'Form Border Color',
                        'default' => '#d2d2d2',
                    ),
                    array (
                        'desc' => 'Controls blog grid, timeline and WooCommerce post box background color.',
                        'id' => 'timeline_bg_color',
                        'type' => 'color',
                        'title' => 'Grid Box Color',
                        'default' => 'transparent',
                    ),
                    array (
                        'desc' => 'Controls blog grid, timeline and WooCommerce post box border, divider lines, date box and border, timeline dots, timeline icon, timeline arrow.',
                        'id' => 'timeline_color',
                        'type' => 'color',
                        'title' => 'Grid Element Color',
                        'default' => '#ebeaea',
                    ),
                    array (
                        'desc' => 'Controls the background color of the woocommerce quantity box.',
                        'id' => 'qty_bg_color',
                        'type' => 'color',
                        'title' => 'Woo Quantity Box Background Color',
                        'default' => '#fbfaf9',
                    ),
                    array (
                        'desc' => 'Controls the hover color of the woocommerce quantity box.',
                        'id' => 'qty_bg_hover_color',
                        'type' => 'color',
                        'title' => 'Woo Quantity Box Hover Background Color',
                        'default' => '#ffffff',
                    ),
                    array (
                        'desc' => 'Controls the background color for forum header rows.',
                        'id' => 'bbp_forum_header_bg',
                        'type' => 'color',
                        'title' => 'bbPress Forum Header Background Color',
                        'default' => '#ebeaea',
                    ),
                    array (
                        'desc' => 'Controls the border color for all forum surrounding borders.',
                        'id' => 'bbp_forum_border_color',
                        'type' => 'color',
                        'title' => 'bbPress Forum Border Color',
                        'default' => '#ebeaea',
                    ),

                )

            );

            /*********************************************************************************************/
            $this->sections[] = array(
                'icon'      => 'el-icon-font',
                'title'     => __('Font Color', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Controls the text color of the header tagline font.',
                        'id' => 'tagline_font_color',
                        'type' => 'color',
                        'title' => 'Header Tagline Font Color',
                        'default' => '#747474',
                    ),
                    array (
                        'desc' => 'Controls the text color of the page title font.',
                        'id' => 'page_title_color',
                        'type' => 'color',
                        'title' => 'Page Title Font Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the text color of H1 headings.',
                        'id' => 'h1_color',
                        'type' => 'color',
                        'title' => 'Heading 1 (H1) Font Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the text color of H2 headings.',
                        'id' => 'h2_color',
                        'type' => 'color',
                        'title' => 'Heading 2 (H2) Font Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the text color of H3 headings.',
                        'id' => 'h3_color',
                        'type' => 'color',
                        'title' => 'Heading 3 (H3) Font Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the text color of H4 headings.',
                        'id' => 'h4_color',
                        'type' => 'color',
                        'title' => 'Heading 4 (H4) Font Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the text color of H5 headings.',
                        'id' => 'h5_color',
                        'type' => 'color',
                        'title' => 'Heading 5 (H5) Font Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the text color of H6 headings.',
                        'id' => 'h6_color',
                        'type' => 'color',
                        'title' => 'Heading 6 (H6) Font Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the text color of body font.',
                        'id' => 'body_text_color',
                        'type' => 'color',
                        'title' => 'Body Text Color',
                        'default' => '#747474',
                    ),
                    array (
                        'desc' => 'Controls the color of all text links as well as the \'>\' in certain areas.',
                        'id' => 'link_color',
                        'type' => 'color',
                        'title' => 'Link Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the text color of the breadcrumb font.',
                        'id' => 'breadcrumbs_text_color',
                        'type' => 'color',
                        'title' => 'Breadcrumbs Text Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the text color of the sliding bar heading font.',
                        'id' => 'slidingbar_headings_color',
                        'type' => 'color',
                        'title' => 'Sliding Bar Headings Color',
                        'default' => '#DDDDDD',
                    ),
                    array (
                        'desc' => 'Controls the font color of the sliding bar font.',
                        'id' => 'slidingbar_text_color',
                        'type' => 'color',
                        'title' => 'Sliding Bar Font Color',
                        'default' => '#8C8989',
                    ),
                    array (
                        'desc' => 'Controls the text color of the sliding bar link font.',
                        'id' => 'slidingbar_link_color',
                        'type' => 'color',
                        'title' => 'Sliding Bar Link Color',
                        'default' => '#BFBFBF',
                    ),
                    array (
                        'desc' => 'Controls the text color of the sidebar widget headings.',
                        'id' => 'sidebar_heading_color',
                        'type' => 'color',
                        'title' => 'Sidebar Widget Headings Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the text color of the footer heading font.',
                        'id' => 'footer_headings_color',
                        'type' => 'color',
                        'title' => 'Footer Headings Color',
                        'default' => '#DDDDDD',
                    ),
                    array (
                        'desc' => 'Controls the text color of the footer font.',
                        'id' => 'footer_text_color',
                        'type' => 'color',
                        'title' => 'Footer Font Color',
                        'default' => '#8C8989',
                    ),
                    array (
                        'desc' => 'Controls the text color of the footer link font.',
                        'id' => 'footer_link_color',
                        'type' => 'color',
                        'title' => 'Footer Link Color',
                        'default' => '#BFBFBF',
                    ),

                )

            );
            /*********************************************************************************************/
            $this->sections[] = array(
                'icon'      => 'el-icon-move',
                'title'     => __('Main Menu Color', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Controls the background color of the menu when using header 4 or 5.',
                        'id' => 'menu_h45_bg_color',
                        'type' => 'color',
                        'title' => 'Main Menu Background Color For Header 4 & 5',
                        'default' => '#FFFFFF',
                    ),
                    array (
                        'desc' => 'Controls the text color of first level menu items.',
                        'id' => 'menu_first_color',
                        'type' => 'color',
                        'title' => 'Main Menu Font Color - First Level',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the main menu hover, hover border & dropdown border color.',
                        'id' => 'menu_hover_first_color',
                        'type' => 'color',
                        'title' => 'Main Menu Font Hover Color - First Level',
                        'default' => '#a0ce4e',
                    ),
                    array (
                        'desc' => 'Controls the color of the menu sublevel background.',
                        'id' => 'menu_sub_bg_color',
                        'type' => 'color',
                        'title' => 'Main Menu Background Color - Sublevels',
                        'default' => '#f2efef',
                    ),
                    array (
                        'desc' => 'Controls the hover color of the menu sublevel background.',
                        'id' => 'menu_bg_hover_color',
                        'type' => 'color',
                        'title' => 'Main Menu Background Hover Color - Sublevels',
                        'default' => '#f8f8f8',
                    ),
                    array (
                        'desc' => 'Controls the color of the menu font sublevels.',
                        'id' => 'menu_sub_color',
                        'type' => 'color',
                        'title' => 'Main Menu Font Color - Sublevels',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the color of the menu separator sublevels.',
                        'id' => 'menu_sub_sep_color',
                        'type' => 'color',
                        'title' => 'Main Menu Separator - Sublevels',
                        'default' => '#dcdadb',
                    ),
                    array (
                        'desc' => 'Controls the bottom section background color of the woocommerce cart dropdown.',
                        'id' => 'woo_cart_bg_color',
                        'type' => 'color',
                        'title' => 'Woo Cart Menu Background Color',
                        'default' => '#fafafa',
                    ),

                )

            );
            /*********************************************************************************************/
            $this->sections[] = array(
                'icon'      => 'el-icon-star',
                'title'     => __('Secondry Menu Color', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Controls the color of the secondary menu first level and contact info font.',
                        'id' => 'snav_color',
                        'type' => 'color',
                        'title' => 'Secondary Menu Font Color - First Level & Top Contact Info',
                        'default' => '#747474',
                    ),
                    array (
                        'desc' => 'Controls the divider color of the first level secondary menu.',
                        'id' => 'header_top_first_border_color',
                        'type' => 'color',
                        'title' => 'Secondary Menu Divider Color - First Level',
                        'default' => '#e5e5e5',
                    ),
                    array (
                        'desc' => 'Controls the background color of the secondary menu sublevels.',
                        'id' => 'header_top_sub_bg_color',
                        'type' => 'color',
                        'title' => 'Secondary Menu Background Color - Sublevels',
                        'default' => '#ffffff',
                    ),
                    array (
                        'desc' => 'Controls the text color of the secondary menu font sublevels.',
                        'id' => 'header_top_menu_sub_color',
                        'type' => 'color',
                        'title' => 'Secondary Menu Font Color - Sublevels',
                        'default' => '#747474',
                    ),
                    array (
                        'desc' => 'Controls the hover color of the secondary menu background sublevels.',
                        'id' => 'header_top_menu_bg_hover_color',
                        'type' => 'color',
                        'title' => 'Secondary Menu Hover Background Color - Sublevels',
                        'default' => '#fafafa',
                    ),
                    array (
                        'desc' => 'Controls the hover text color of the secondary menu font sublevels.',
                        'id' => 'header_top_menu_sub_hover_color',
                        'type' => 'color',
                        'title' => 'Secondary Menu Hover Font Color - Sublevels',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the border color of the secondary menu sublevels.',
                        'id' => 'header_top_menu_sub_sep_color',
                        'type' => 'color',
                        'title' => 'Secondary Menu Border	- Sublevels',
                        'default' => '#e5e5e5',
                    ),

                )

            );
            /*********************************************************************************************/
            $this->sections[] = array(
                'icon'      => 'el-icon-th-large',
                'title'     => __('Mobile Menu Color', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Controls the background color of the mobile menu box and dropdown.',
                        'id' => 'mobile_menu_background_color',
                        'type' => 'color',
                        'title' => 'Mobile Menu Background Color',
                        'default' => '#f9f9f9',
                    ),
                    array (
                        'desc' => 'Controls the border, divider and icon colors of the mobile menu.',
                        'id' => 'mobile_menu_border_color',
                        'type' => 'color',
                        'title' => 'Mobile Menu Border Color',
                        'default' => '#dadada',
                    ),
                    array (
                        'desc' => 'Controls the hover color of the mobile menu items.',
                        'id' => 'mobile_menu_hover_color',
                        'type' => 'color',
                        'title' => 'Mobile Menu Hover Color',
                        'default' => '#f6f6f6',
                    ),

                )

            );
            /*********************************************************************************************/
            $this->sections[] = array(
                'icon'      => 'el-icon-quotes',
                'title'     => __('Sidebar Color', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'desc' => 'Controls the background color of the sidebar.',
                        'id' => 'sidebar_bg_color',
                        'type' => 'color',
                        'title' => 'Sidebar Background Color',
                        'default' => 'transparent',
                    )

                )

            );
            /*********************************************************************************************/
            $this->sections[] = array(
                'icon'      => 'el-icon-puzzle',
                'title'     => __('Shortcode Color', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array (
                        'id' => 'accordion_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Accordion Shortcode</h3>',


                    ),
                    array (
                        'desc' => 'Controls the color of the inactive boxes behind the \'+\' icons.',
                        'id' => 'accordian_inactive_color',
                        'type' => 'color',
                        'title' => 'Accordion Inactive Box Color',
                        'default' => '#333333',
                    ),

                    array (
                        'id' => 'blog_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Blog Shortcode</h3>',
                    ),
                    array (
                        'desc' => 'Controls the color of the date box in blog alternate and recent posts layouts.',
                        'id' => 'dates_box_color',
                        'type' => 'color',
                        'title' => 'Blog Date Box Color',
                        'default' => '#eef0f2',
                    ),

                    array (
                        'id' => 'button_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Button Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Select the default button size.',
                        'id' => 'button_size',
                        'type' => 'select',
                        'options' => array (
                            'Small' => 'Small',
                            'Medium' => 'Medium',
                            'Large' => 'Large',
                            'XLarge' => 'XLarge',
                        ),
                        'title' => 'Button Size',
                        'default' => 'Large',
                    ),
                    array (
                        'desc' => 'Select the default shape for buttons.',
                        'id' => 'button_shape',
                        'type' => 'select',
                        'options' => array (
                            'Square' => 'Square',
                            'Round' => 'Round',
                            'Pill' => 'Pill',
                        ),
                        'title' => 'Button Shape',
                        'default' => 'Round',
                    ),
                    array (
                        'desc' => 'Select the default button type.',
                        'id' => 'button_type',
                        'type' => 'select',
                        'options' => array (
                            'Flat' => 'Flat',
                            '3d' => '3d',
                        ),
                        'title' => 'Button Type',
                        'default' => 'Flat',
                    ),
                    array (
                        'desc' => 'Set the top color of the button background.',
                        'id' => 'button_gradient_top_color',
                        'type' => 'color',
                        'title' => 'Button Gradient Top Color',
                        'default' => '#D1E990',
                    ),
                    array (
                        'desc' => 'Set the bottom color of the button background or leave empty for solid color.',
                        'id' => 'button_gradient_bottom_color',
                        'type' => 'color',
                        'title' => 'Button Gradient Bottom Color',
                        'default' => '#AAD75B',
                    ),
                    array (
                        'desc' => 'Set the top hover color of the button background.',
                        'id' => 'button_gradient_top_color_hover',
                        'type' => 'color',
                        'title' => 'Button Gradient Top Hover Color',
                        'default' => '#AAD75B',
                    ),
                    array (
                        'desc' => 'Set the bottom hover color of the button background or leave empty for solid color. ',
                        'id' => 'button_gradient_bottom_color_hover',
                        'type' => 'color',
                        'title' => 'Button Gradient Bottom Hover Color',
                        'default' => '#D1E990',
                    ),
                    array (
                        'desc' => 'This option controls the color of the button border, divider, text and icon.',
                        'id' => 'button_accent_color',
                        'type' => 'color',
                        'title' => 'Button Accent Color',
                        'default' => '#6e9a1f',
                    ),
                    array (
                        'desc' => 'This option controls the hover color of the button border, divider, text and icon.',
                        'id' => 'button_accent_hover_color',
                        'type' => 'color',
                        'title' => 'Button Accent Hover Color',
                        'default' => '#638e1a',
                    ),
                    array (
                        'desc' => 'Controls the default bevel color of the buttons.',
                        'id' => 'button_bevel_color',
                        'type' => 'color',
                        'title' => 'Button Bevel Color (3D Mode only)',
                        'default' => '#54770F',
                    ),
                    array (
                        'desc' => 'Select the border width for buttons. Enter value in px. ex: 1px',
                        'id' => 'button_border_width',
                        'type' => 'text',
                        'title' => 'Button Border Width',
                        'default' => '1px',
                    ),
                    array (
                        'desc' => 'Select the box to disable the bottom button shadow and text shadow.',
                        'id' => 'button_text_shadow',
                        'type' => 'checkbox',
                        'title' => 'Button Shadow',
                    ),


                    array (
                        'id' => 'carousel_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Carousel Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the color of the default navigation box for carousel sliders.',
                        'id' => 'carousel_nav_color',
                        'type' => 'color',
                        'title' => 'Carousel Default Nav Box Color',
                        'default' => '#999999',
                    ),
                    array (
                        'desc' => 'Controls the color of the hover navigation box for carousel sliders.',
                        'id' => 'carousel_hover_color',
                        'type' => 'color',
                        'title' => 'Carousel Hover Nav Box Color',
                        'default' => '#808080',
                    ),

                    array (
                        'id' => 'cb_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Content Box Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the color of the background for content boxes. Only use for \'icon-boxed\' style. Leave transparent for other styles.',
                        'id' => 'content_box_bg_color',
                        'type' => 'color',
                        'title' => 'Content Box Background Color',
                        'default' => 'transparent',
                    ),

                    array (
                        'id' => 'checklist_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Checklist Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Check the box if you want to use circles on checklists.',
                        'id' => 'checklist_circle',
                        'type' => 'checkbox',
                        'title' => 'Checklist Circle',
                        'default' => 1,
                    ),
                    array (
                        'desc' => 'Controls the color of the checklist circle.',
                        'id' => 'checklist_circle_color',
                        'type' => 'color',
                        'title' => 'Checklist Circle Color',
                        'default' => '#a0ce4e',
                    ),
                    array (
                        'desc' => 'Controls the color of the checklist icon.',
                        'id' => 'checklist_icons_color',
                        'type' => 'color',
                        'title' => 'Checklist Icon Color',
                        'default' => '#ffffff',
                    ),

                    array (
                        'id' => 'cc_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Counter Circles Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the color of the counter text and icon.',
                        'id' => 'counter_filled_color',
                        'type' => 'color',
                        'title' => 'Counter Circle Filled Color',
                        'default' => '#a0ce4e',
                    ),
                    array (
                        'desc' => 'Controls the color of the counter text and icon.',
                        'id' => 'counter_unfilled_color',
                        'type' => 'color',
                        'title' => 'Counter Circle Unfilled Color',
                        'default' => '#f6f6f6',
                    ),

                    array (
                        'id' => 'counterb_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Counter Boxes Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the color of the counter text and icon.',
                        'id' => 'counter_box_color',
                        'type' => 'color',
                        'title' => 'Counter Box Text Color',
                        'default' => '#a0ce4e',
                    ),

                    array (
                        'id' => 'dropcap_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Dropcap Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the color of the dropcap text, or the dropcap box is a box is used.',
                        'id' => 'dropcap_color',
                        'type' => 'color',
                        'title' => 'Dropcap Color',
                        'default' => '#a0ce4e',
                    ),

                    array (
                        'id' => 'flipb_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Flip Boxes Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the color of frontside background color.',
                        'id' => 'flip_boxes_front_bg',
                        'type' => 'color',
                        'title' => 'Flip Box Background Color Frontside',
                        'default' => '#f6f6f6',
                    ),
                    array (
                        'desc' => 'Controls the color of frontside heading color.',
                        'id' => 'flip_boxes_front_heading',
                        'type' => 'color',
                        'title' => 'Flip Box Heading Color Frontside',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the color of frontside text color.',
                        'id' => 'flip_boxes_front_text',
                        'type' => 'color',
                        'title' => 'Flip Box Text Color Frontside',
                        'default' => '#747474',
                    ),
                    array (
                        'desc' => 'Controls the color of backside background color.',
                        'id' => 'flip_boxes_back_bg',
                        'type' => 'color',
                        'title' => 'Flip Box Background Color Backside',
                        'default' => '#a0ce4e',
                    ),
                    array (
                        'desc' => 'Controls the color of backside heading color.',
                        'id' => 'flip_boxes_back_heading',
                        'type' => 'color',
                        'title' => 'Flip Box Heading Color Backside',
                        'default' => '#eeeded',
                    ),
                    array (
                        'desc' => 'Controls the color of backside text color.',
                        'id' => 'flip_boxes_back_text',
                        'type' => 'color',
                        'title' => 'Flip Box Text Color Backside',
                        'default' => '#ffffff',
                    ),
                    array (
                        'desc' => 'Controls the border size of flip boxes.',
                        'id' => 'flip_boxes_border_size',
                        'type' => 'text',
                        'title' => 'Flip Box Border Size',
                        'default' => '1px',
                    ),
                    array (
                        'desc' => 'Controls the border color of flip boxes.',
                        'id' => 'flip_boxes_border_color',
                        'type' => 'color',
                        'title' => 'Flip Box Border Color',
                        'default' => 'transparent',
                    ),
                    array (
                        'desc' => 'Controls the border radius (roundness) of flip boxes.',
                        'id' => 'flip_boxes_border_radius',
                        'type' => 'text',
                        'title' => 'Flip Box Border Radius',
                        'default' => '4px',
                    ),

                    array (
                        'id' => 'fullwidth_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Full Width Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the background color of the full width section.',
                        'id' => 'full_width_bg_color',
                        'type' => 'color',
                        'title' => 'Full Width Background Color',
                        'default' => '#ffffff',
                    ),
                    array (
                        'desc' => 'Controls the border size of the full width section.',
                        'id' => 'full_width_border_size',
                        'type' => 'text',
                        'title' => 'Full Width Border Size',
                        'default' => '0px',
                    ),
                    array (
                        'desc' => 'Controls the border color of the full width section.',
                        'id' => 'full_width_border_color',
                        'type' => 'color',
                        'title' => 'Full Width Border Color',
                        'default' => '#eae9e9',
                    ),

                    array (
                        'id' => 'icon_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Icon Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the color of the circle when used with icons.',
                        'id' => 'icon_circle_color',
                        'type' => 'color',
                        'title' => 'Icon Circle Background Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the color of the circle border when used with icons.',
                        'id' => 'icon_border_color',
                        'type' => 'color',
                        'title' => 'Icon Circle Border Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the color of the icons.',
                        'id' => 'icon_color',
                        'type' => 'color',
                        'title' => 'Icon Color',
                        'default' => '#ffffff',
                    ),

                    array (
                        'id' => 'imgf_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Image Frame Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the border color of the image frame.',
                        'id' => 'imgframe_border_color',
                        'type' => 'color',
                        'title' => 'Image Frame Border Color',
                        'default' => '#f6f6f6',
                    ),
                    array (
                        'desc' => 'Controls the border size of the image.',
                        'id' => 'imageframe_border_size',
                        'type' => 'text',
                        'title' => 'Image Frame Border Size',
                    ),
                    array (
                        'desc' => 'Controls the style color of the image frame. Only works for glow and dropshadow style.',
                        'id' => 'imgframe_style_color',
                        'type' => 'color',
                        'title' => 'Image Frame Style Color',
                        'default' => '#000000',
                    ),

                    array (
                        'id' => 'modal_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Modal Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the background color of the modal popup box',
                        'id' => 'modal_bg_color',
                        'type' => 'color',
                        'title' => 'Modal Background Color',
                        'default' => '#f6f6f6',
                    ),
                    array (
                        'desc' => 'Controls the border color of the modal popup box',
                        'id' => 'modal_border_color',
                        'type' => 'color',
                        'title' => 'Modal Border Color',
                        'default' => '#ebebeb',
                    ),

                    array (
                        'id' => 'person_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Person Shortcode</h3>',
                    ),

                    array (
                        'desc' => 'Controls the border size of the image.',
                        'id' => 'person_border_size',
                        'type' => 'text',
                        'title' => 'Person Border Size',
                    ),
                    array (
                        'desc' => 'Controls the border color of the of the image.',
                        'id' => 'person_border_color',
                        'type' => 'color',
                        'title' => 'Person Border Color',
                        'default' => '#f6f6f6',
                    ),
                    array (
                        'desc' => 'For all style types except border. Controls the style color. ',
                        'id' => 'person_style_color',
                        'type' => 'color',
                        'title' => 'Person Style Color',
                        'default' => '#000000',
                    ),

                    array (
                        'id' => 'popover_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Popover Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the background color of popover heading area.',
                        'id' => 'popover_heading_bg_color',
                        'type' => 'color',
                        'title' => 'Popover Heading Background Color',
                        'default' => '#f6f6f6',
                    ),
                    array (
                        'desc' => 'Controls the background color of popover content area.',
                        'id' => 'popover_content_bg_color',
                        'type' => 'color',
                        'title' => 'Popover Content Background Color',
                        'default' => '#ffffff',
                    ),
                    array (
                        'desc' => 'Controls the border color of popover box.',
                        'id' => 'popover_border_color',
                        'type' => 'color',
                        'title' => 'Popover Border Color',
                        'default' => '#ebebeb',
                    ),
                    array (
                        'desc' => 'Controls the text color inside the popover box. ',
                        'id' => 'popover_text_color',
                        'type' => 'color',
                        'title' => 'Popover Text Color',
                        'default' => '#747474',
                    ),
                    array (
                        'desc' => 'Controls the position of the popover in reference to the triggering text.',
                        'id' => 'popover_placement',
                        'type' => 'select',
                        'options' => array (
                            'Top' => 'Top',
                            'Right' => 'Right',
                            'Bottom' => 'Bottom',
                            'Left' => 'Left',
                        ),
                        'title' => 'Popover Position',
                        'default' => 'Top',
                    ),

                    array (
                        'id' => 'pricingtable_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Pricing Table Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the heading color of full boxed pricing tables.',
                        'id' => 'full_boxed_pricing_box_heading_color',
                        'type' => 'color',
                        'title' => 'Pricing Box Style 1 Heading Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the heading color of separate pricing boxes.',
                        'id' => 'sep_pricing_box_heading_color',
                        'type' => 'color',
                        'title' => 'Pricing Box Style 2 Heading Color',
                        'default' => '#333333',
                    ),
                    array (
                        'desc' => 'Controls the color portions of pricing boxes.',
                        'id' => 'pricing_box_color',
                        'type' => 'color',
                        'title' => 'Pricing Box Color',
                        'default' => '#a0ce4e',
                    ),
                    array (
                        'desc' => 'Controls the color of main background and title background.',
                        'id' => 'pricing_bg_color',
                        'type' => 'color',
                        'title' => 'Pricing Box Bg Color',
                        'default' => '#ffffff',
                    ),
                    array (
                        'desc' => 'Controls the color of the outer border, pricing row and footer row backgrounds.',
                        'id' => 'pricing_border_color',
                        'type' => 'color',
                        'title' => 'Pricing Box Border Color',
                        'default' => '#f8f8f8',
                    ),
                    array (
                        'desc' => 'Controls the color of the dividers in-between pricing rows.',
                        'id' => 'pricing_divider_color',
                        'type' => 'color',
                        'title' => 'Pricing Box Divider Color',
                        'default' => '#ededed',
                    ),

                    array (
                        'id' => 'progressbar_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Progress Bar Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the color of the filled area in progress bars.',
                        'id' => 'progressbar_filled_color',
                        'type' => 'color',
                        'title' => 'Progress Bar Filled Color',
                        'default' => '#a0ce4e',
                    ),
                    array (
                        'desc' => 'Controls the color of the unfilled area in progress bars.',
                        'id' => 'progressbar_unfilled_color',
                        'type' => 'color',
                        'title' => 'Progress Bar Unfilled Color',
                        'default' => '#f6f6f6',
                    ),
                    array (
                        'desc' => 'Controls the color of the text in progress bars.',
                        'id' => 'progressbar_text_color',
                        'type' => 'color',
                        'title' => 'Progress Bar Text Color',
                        'default' => '#ffffff',
                    ),

                    array (
                        'id' => 'separator_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Seprator Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the color of all separators, divider lines and borders for meta, previous & next, filters, category page, boxes around number pagination, sidebar widgets, accordion divider lines, counter boxes and more.',
                        'id' => 'sep_color',
                        'type' => 'color',
                        'title' => 'Separators Color',
                        'default' => '#e0dede',
                    ),

                    array (
                        'id' => 'sectionseparator_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Section Seprator Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the border size of the section separator.',
                        'id' => 'section_sep_border_size',
                        'type' => 'text',
                        'title' => 'Section Separator Border Size',
                        'default' => '1px',
                    ),
                    array (
                        'desc' => 'Controls the background color of the divider candy.',
                        'id' => 'section_sep_bg',
                        'type' => 'color',
                        'title' => 'Section Separator Background Color of Divider Candy',
                        'default' => '#f6f6f6',
                    ),
                    array (
                        'desc' => 'Controls the border color of the separator.',
                        'id' => 'section_sep_border_color',
                        'type' => 'color',
                        'title' => 'Section Separator Border Color',
                        'default' => '#f6f6f6',
                    ),

                    array (
                        'id' => 'sharingbox_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Sharing Box Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the background color of the sharing box.',
                        'id' => 'sharing_box_bg_color',
                        'type' => 'color',
                        'title' => 'Sharing Box Background Color',
                        'default' => '#f6f6f6',
                    ),
                    array (
                        'desc' => 'Controls the text color of the tagline text.',
                        'id' => 'sharing_box_tagline_text_color',
                        'type' => 'color',
                        'title' => 'Sharing Box Tagline Text Color',
                        'default' => '#333333',
                    ),

                    array (
                        'id' => 'sociallinks_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Social Links Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Select a custom social icon color.',
                        'id' => 'social_links_icon_color',
                        'type' => 'color',
                        'title' => 'Social Links Custom Icons Color',
                        'default' => '#bebdbd',
                    ),
                    array (
                        'desc' => 'Controls the color of the social icons in the sharing box.',
                        'id' => 'social_links_boxed',
                        'type' => 'select',
                        'options' => array (
                            'No' => 'No',
                            'Yes' => 'Yes',
                        ),
                        'title' => 'Social Links Icons Boxed',
                        'default' => 'No',
                    ),
                    array (
                        'desc' => 'Select a custom social icon box color.',
                        'id' => 'social_links_box_color',
                        'type' => 'color',
                        'title' => 'Social Links Icons Custom Box Color',
                        'default' => '#e8e8e8',
                    ),
                    array (
                        'desc' => 'Boxradius for the social icons. In pixels, ex: 4px.',
                        'id' => 'social_links_boxed_radius',
                        'type' => 'text',
                        'title' => 'Social Links Icons Boxed Radius',
                        'default' => '4px',
                    ),
                    array (
                        'desc' => 'Controls the tooltip position of the social icons in the sharing box.',
                        'id' => 'social_links_tooltip_placement',
                        'type' => 'select',
                        'options' => array (
                            'Top' => 'Top',
                            'Right' => 'Right',
                            'Bottom' => 'Bottom',
                            'Left' => 'Left',
                            'None' => 'None',
                        ),
                        'title' => 'Social Links Icons Tooltip Position',
                        'default' => 'Top',
                    ),

                    array (
                        'id' => 'tabs_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Tabs Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the color of the active tab, content background color and tab hover.',
                        'id' => 'tabs_bg_color',
                        'type' => 'color',
                        'title' => 'Tabs Background Color + Hover Color',
                        'default' => '#ffffff',
                    ),
                    array (
                        'desc' => 'Controls the color of the inactive tabs and the outer tab border.',
                        'id' => 'tabs_inactive_color',
                        'type' => 'color',
                        'title' => 'Tabs Inactive Color',
                        'default' => '#ebeaea',
                    ),

                    array (
                        'id' => 'tagline_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Tagline Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the background color of the tagline box.',
                        'id' => 'tagline_bg',
                        'type' => 'color',
                        'title' => 'Tagline Box Background Color',
                        'default' => '#f6f6f6',
                    ),
                    array (
                        'desc' => 'Controls the border color of the tagline box.',
                        'id' => 'tagline_border_color',
                        'type' => 'color',
                        'title' => 'Tagline Box Border Color',
                        'default' => '#f6f6f6',
                    ),

                    array (
                        'id' => 'testimonials_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Testimonials Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the background color of the testimonial.',
                        'id' => 'testimonial_bg_color',
                        'type' => 'color',
                        'title' => 'Testimonial Background Color',
                        'default' => '#f6f6f6',
                    ),
                    array (
                        'desc' => 'Controls the text color of the testimonial font.',
                        'id' => 'testimonial_text_color',
                        'type' => 'color',
                        'title' => 'Testimonial Text Color',
                        'default' => '#747474',
                    ),
                    array (
                        'desc' => 'Select the slideshow speed, 1000 = 1 second.',
                        'id' => 'testimonials_speed',
                        'type' => 'text',
                        'title' => 'Testimonials Speed',
                        'default' => '4000',
                    ),

                    array (
                        'id' => 'title_shortcode',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style=\'margin: 0;\'>Title Shortcode</h3>',

                    ),
                    array (
                        'desc' => 'Controls the color of the title separators',
                        'id' => 'title_border_color',
                        'type' => 'color',
                        'title' => 'Title Separator Color',
                        'default' => '#e0dede',
                    ),

                ),
                'icon' => 'el-icon-puzzle',



        );
            /*
               *
                *
                *
                * New Tab
                *
                *
                * */
//////////////////////////////////////////////////////////////////////////////////////////////////////
	
            
            $this->sections[] = array(
                'icon'      => 'el-icon-list-alt',
                'title'     => __('Select Fields', 'redux-framework-demo'),
                'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
                'fields'    => array(
                    array(
                        'id'        => 'opt-select',
                        'type'      => 'select',
                        'title'     => __('Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                        
                        //Must provide key => value pairs for select options
                        'options'   => array(
                            '1' => 'Opt 1', 
                            '2' => 'Opt 2', 
                            '3' => 'Opt 3'
                        ),
                        'default'   => '2'
                    ),
                    array(
                        'id'        => 'opt-multi-select',
                        'type'      => 'select',
                        'multi'     => true,
                        'title'     => __('Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                        
                        //Must provide key => value pairs for radio options
                        'options'   => array(
                            '1' => 'Opt 1', 
                            '2' => 'Opt 2', 
                            '3' => 'Opt 3'
                        ), 
                        'required'  => array('select', 'equals', array('1', '3')),
                        'default'   => array('2', '3')
                    ),
                    array(
                        'id'        => 'opt-select-image',
                        'type'      => 'select_image',
                        'title'     => __('Select Image', 'redux-framework-demo'),
                        'subtitle'  => __('A preview of the selected image will appear underneath the select box.', 'redux-framework-demo'),
                        'options'   => $sample_patterns,
                        // Alternatively
                        //'options'   => Array(
                        //                'img_name' => 'img_path'
                        //             )
                        'default' => 'tree_bark.png',
                    ),
                    array(
                        'id'    => 'opt-info',
                        'type'  => 'info',
                        'desc'  => __('You can easily add a variety of data from WordPress.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-categories',
                        'type'      => 'select',
                        'data'      => 'categories',
                        'title'     => __('Categories Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-categories-multi',
                        'type'      => 'select',
                        'data'      => 'categories',
                        'multi'     => true,
                        'title'     => __('Categories Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-pages',
                        'type'      => 'select',
                        'data'      => 'pages',
                        'title'     => __('Pages Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-multi-select-pages',
                        'type'      => 'select',
                        'data'      => 'pages',
                        'multi'     => true,
                        'title'     => __('Pages Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-tags',
                        'type'      => 'select',
                        'data'      => 'tags',
                        'title'     => __('Tags Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-multi-select-tags',
                        'type'      => 'select',
                        'data'      => 'tags',
                        'multi'     => true,
                        'title'     => __('Tags Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-menus',
                        'type'      => 'select',
                        'data'      => 'menus',
                        'title'     => __('Menus Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-multi-select-menus',
                        'type'      => 'select',
                        'data'      => 'menu',
                        'multi'     => true,
                        'title'     => __('Menus Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-post-type',
                        'type'      => 'select',
                        'data'      => 'post_type',
                        'title'     => __('Post Type Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-multi-select-post-type',
                        'type'      => 'select',
                        'data'      => 'post_type',
                        'multi'     => true,
                        'title'     => __('Post Type Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-multi-select-sortable',
                        'type'      => 'select',
                        'data'      => 'post_type',
                        'multi'     => true,
                        'sortable'  => true,
                        'title'     => __('Post Type Multi Select Option + Sortable', 'redux-framework-demo'),
                        'subtitle'  => __('This field also has sortable enabled!', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-posts',
                        'type'      => 'select',
                        'data'      => 'post',
                        'title'     => __('Posts Select Option2', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-multi-select-posts',
                        'type'      => 'select',
                        'data'      => 'post',
                        'multi'     => true,
                        'title'     => __('Posts Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-roles',
                        'type'      => 'select',
                        'data'      => 'roles',
                        'title'     => __('User Role Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-capabilities',
                        'type'      => 'select',
                        'data'      => 'capabilities',
                        'multi'     => true,
                        'title'     => __('Capabilities Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-elusive',
                        'type'      => 'select',
                        'data'      => 'elusive-icons',
                        'title'     => __('Elusive Icons Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('Here\'s a list of all the elusive icons by name and icon.', 'redux-framework-demo'),
                    ),
                )
            );

            $theme_info  = '<div class="redux-framework-section-desc">';
            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', 'redux-framework-demo') . '<a href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __('<strong>Author:</strong> ', 'redux-framework-demo') . $this->theme->get('Author') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __('<strong>Version:</strong> ', 'redux-framework-demo') . $this->theme->get('Version') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';
            $tabs = $this->theme->get('Tags');
            if (!empty($tabs)) {
                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', 'redux-framework-demo') . implode(', ', $tabs) . '</p>';
            }
            $theme_info .= '</div>';

            if (file_exists(dirname(__FILE__) . '/../README.md')) {
                $this->sections['theme_docs'] = array(
                    'icon'      => 'el-icon-list-alt',
                    'title'     => __('Documentation', 'redux-framework-demo'),
                    'fields'    => array(
                        array(
                            'id'        => '17',
                            'type'      => 'raw',
                            'markdown'  => true,
                            'content'   => file_get_contents(dirname(__FILE__) . '/../README.md')
                        ),
                    ),
                );
            }
