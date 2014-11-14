<?php
/*********************************************************************************************
 *
 *  Color settings
 *
 *********************************************************************************************/

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

?>