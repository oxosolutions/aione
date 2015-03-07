<?php
/*********************************************************************************************
 *
 *  Color settings
 *
 *********************************************************************************************/

$this->sections[] = array(
    'title' => __('Color','redux-framework-demo'),
    'icon'      => 'el-icon-magic',
    'desc'      => '
        <style>
            #theme_options-color_scheme .redux-image-select-preset-color_scheme_1 img{ background-color:#168DC5;}
            #theme_options-color_scheme .redux-image-select-preset-color_scheme_2 img{ background-color:#dd3333;}
            #theme_options-color_scheme .redux-image-select-preset-color_scheme_3 img{ background-color:#168DC5;}
            #theme_options-color_scheme .redux-image-select-preset-color_scheme_4 img{ background-color:#168DC5;}

        </style>',

    'fields' => array (
        array (
            'id' => 'scheme_type',
            'type' => 'select',
            'options' => array (
                'Light' => 'Light',
                'Dark' => 'Dark',
            ),
            'title' => __('Select Theme Skin','redux-framework-demo'),
            'subtitle'  => __('Select Theme Skin.', 'redux-framework-demo'),
            'desc' => __('Select a skin, all color options will automatically change to the defined skin.','redux-framework-demo'),
            'default' => 'Light',
            'hint' => array(
                'title'   => __('Select Theme Skin','redux-framework-demo'),
                'content' => __('Select Theme Skin','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'color_scheme',
            'type' => 'image_select',
            'title' => __('Predefined Color Scheme','redux-framework-demo'),
            'subtitle'  => __('Predefined Color Scheme.', 'redux-framework-demo'),
            'desc' => __('Select a scheme, all color options will automatically change to the defined scheme.','redux-framework-demo'),
            'options' => array (
                'Red' => array(
                    'alt'   => '1 Column',
                    'img'   => get_template_directory_uri(). '/images/transparent.png',
                    'presets'   => getColorPresets('#c23b34','#AB2822'),

                ),
                'blue' => array(
                    'alt'   => '1 Column',
                    'img'   => get_template_directory_uri(). '/images/transparent.png',
                    'presets'   => getColorPresets('#168DC5','#1570A6'),
                ),
                //'Blue' => get_template_directory_uri(). '/images/transparent.png',
                //'Light Blue' => get_template_directory_uri(). '/images/transparent.png',
                //'Green' =>  get_template_directory_uri(). '/images/transparent.png',
                //'Dark Green' => get_template_directory_uri(). '/images/transparent.png',
                //'Orange' => get_template_directory_uri(). '/images/transparent.png',
                //'Pink' => get_template_directory_uri(). '/images/transparent.png',
                //'Brown' => get_template_directory_uri(). '/images/transparent.png',
                //'Light Grey' => get_template_directory_uri(). '/images/transparent.png',
            ),
            //'default' => 'v4',
            'tiles' => false,
            'presets' => 'true',
            'width' => '60px',
            'height' => '60px',

            'class' => 'color-schemes',
            'hint' => array(
                'title'   => __('Predefined Color Scheme','redux-framework-demo'),
                'content' => __('Predefined Color Scheme','redux-framework-demo'),
            )
        )
    )
);

/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-livejournal',
    'title'     => __('Topbar Colors', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'topbar_text_color',
            'type' => 'color',
            'title' =>  __('Topbar Text Color', 'redux-framework-demo'),
            'subtitle'  => __('Choose color of text on topbar.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>#FFFFFF</strong>.', 'redux-framework-demo'),
            'validate' => 'color',
            //'class' => '',
            //'transparent' => 'false',
            'default'   => '#FFFFFF',
            'output' => '#topbar, .topbar-item',
            'hint' => array(
                'title'   => __('Topbar Text Color','redux-framework-demo'),
                'content' => __('Topbar Text Color','redux-framework-demo'),
            )

        ),
        array (
            'id' => 'topbar_link_color',
            'type' => 'link_color',
            'title' =>  __('Topbar Link Color', 'redux-framework-demo'),
            'subtitle'  => __('Choose color of links on topbar.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>#FFFFFF</strong>.', 'redux-framework-demo'),
            'validate' => 'color',
            //'class' => '',
            'regular'  => true,
            'hover'    => true,
            'active'   => true,
            'visited'  => true,
            'default'   => array(
                'regular'  => '#FFFFFF',
                'hover'    => '#FFFFFF',
                'active'   => '#FFFFFF',
                'visited'  => '#FFFFFF'
            ),
            'output' => '#topbar a',
            'hint' => array(
                'title'   => __('Topbar Link Color','redux-framework-demo'),
                'content' => __('Topbar Link Color','redux-framework-demo'),
            )
        ),



    )

);

/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-livejournal',
    'title'     => __('Background Color', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'primary_color',
            'type' => 'color',
            'title' => __('Primary Color','redux-framework-demo'),
            'subtitle'  => __('Primary Color.', 'redux-framework-demo'),
            'desc' => __('Controls several items, ex: link hovers, highlights, and more.','redux-framework-demo'),
            'default' => '#168DC5',
            'hint' => array(
                'title'   => __('Primary Color','redux-framework-demo'),
                'content' => __('Primary Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'slidingbar_bg_color',
            'type' => 'color',
            'title' => __('Sliding Bar Background Color','redux-framework-demo'),
            'subtitle'  => __('Sliding Bar Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the top sliding bar.','redux-framework-demo'),
            'default' => '#363839',
            'hint' => array(
                'title'   => __('Sliding Bar Background Color','redux-framework-demo'),
                'content' => __('Sliding Bar Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'header_sticky_bg_color',
            'type' => 'color',
            'title' => __('Sticky Header Background Color','redux-framework-demo'),
            'subtitle'  => __('Sticky Header Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color for the sticky header.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Sticky Header Background Color','redux-framework-demo'),
                'content' => __('Sticky Header Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'header_bg_color',
            'type' => 'color',
            'title' => __('Header Background Color','redux-framework-demo'),
            'subtitle'  => __('Header Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color for the header.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Header Background Color','redux-framework-demo'),
                'content' => __('Header Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'header_border_color',
            'type' => 'color',
            'title' => __('Header Border Color','redux-framework-demo'),
            'subtitle'  => __('Header Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border colors for the header.','redux-framework-demo'),
            'default' => '#e5e5e5',
            'hint' => array(
                'title'   => __('Header Border Color','redux-framework-demo'),
                'content' => __('Header Border Color','redux-framework-demo'),
            )
        ),
        /*

         array (
            'desc' => __('Controls the background color of the top header section used in Headers 2-5.',
            'id' => 'header_top_bg_color',
            'type' => 'color',
            'title' => __('Header Top Background Color',
            'default' => '#168DC5',
        ),
        */
        array (
            'id' => 'page_title_bg_color',
            'type' => 'color',
            'title' => __('Page Title Bar Background Color','redux-framework-demo'),
            'subtitle'  => __('Page Title Bar Background Color.', 'redux-framework-demo'),
            'desc' => __('Select a color for the page title bar background.','redux-framework-demo'),
            'default' => '#F6F6F6',
            'hint' => array(
                'title'   => __('Page Title Bar Background Color','redux-framework-demo'),
                'content' => __('Page Title Bar Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'page_title_border_color',
            'type' => 'color',
            'title' => __('Page Title Bar Borders Color','redux-framework-demo'),
            'subtitle'  => __('Page Title Bar Borders Color.', 'redux-framework-demo'),
            'desc' => __('Select a color for the page title bar borders.','redux-framework-demo'),
            'default' => '#d2d3d4',
            'hint' => array(
                'title'   => __('Page Title Bar Borders Color','redux-framework-demo'),
                'content' => __('Page Title Bar Borders Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'content_bg_color',
            'type' => 'color',
            'title' => __('Content Background Color','redux-framework-demo'),
            'subtitle'  => __('Content Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the main content area.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Content Background Color','redux-framework-demo'),
                'content' => __('Content Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_bg_color',
            'type' => 'color',
            'title' => __('Footer Background Color','redux-framework-demo'),
            'subtitle'  => __('Footer Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the footer.','redux-framework-demo'),
            'default' => '#363839',
            'hint' => array(
                'title'   => __('Footer Background Color','redux-framework-demo'),
                'content' => __('Footer Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_border_color',
            'type' => 'color',
            'title' => __('Footer Border Color','redux-framework-demo'),
            'subtitle'  => __('Footer Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border colors for the footer.','redux-framework-demo'),
            'default' => '#e9eaee',
            'hint' => array(
                'title'   => __('Footer Border Color','redux-framework-demo'),
                'content' => __('Footer Border Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'copyright_bg_color',
            'type' => 'color',
            'title' => __('Copyright Background Color','redux-framework-demo'),
            'subtitle'  => __('Copyright Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the footer copyright.','redux-framework-demo'),
            'default' => '#282a2b',
            'hint' => array(
                'title'   => __('Copyright Background Color','redux-framework-demo'),
                'content' => __('Copyright Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'copyright_border_color',
            'type' => 'color',
            'title' => __('Copyright Border Color','redux-framework-demo'),
            'subtitle'  => __('Copyright Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border colors for the footer copyright.','redux-framework-demo'),
            'default' => '#4b4c4d',
            'hint' => array(
                'title'   => __('Copyright Border Color','redux-framework-demo'),
                'content' => __('Copyright Border Color','redux-framework-demo'),
            )
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
            'id' => 'image_gradient_top_color',
            'type' => 'color',
            'title' => __('Rollover Image Gradient Top Color','redux-framework-demo'),
            'subtitle'  => __('Rollover Image Gradient Top Color.', 'redux-framework-demo'),
            'desc' => __('Controls the top color of the image rollover gradients.','redux-framework-demo'),
            'default' => '#2ba5df',
            'hint' => array(
                'title'   => __('Rollover Image Gradient Top Color','redux-framework-demo'),
                'content' => __('Rollover Image Gradient Top Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'image_gradient_bottom_color',
            'type' => 'color',
            'title' => __('Rollover Image Gradient Bottom Color','redux-framework-demo'),
            'subtitle'  => __('Rollover Image Gradient Bottom Color.', 'redux-framework-demo'),
            'desc' => __('Controls the bottom color of the image rollover gradients.','redux-framework-demo'),
            'default' => '#168DC5',
            'hint' => array(
                'title'   => __('Rollover Image Gradient Bottom Color','redux-framework-demo'),
                'content' => __('Rollover Image Gradient Bottom Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'image_rollover_text_color',
            'type' => 'color',
            'title' => __('Rollover Image Element Color','redux-framework-demo'),
            'subtitle'  => __('Rollover Image Element Color.', 'redux-framework-demo'),
            'desc' => __('This option controls the color of image rollover text and the icon circle backgrounds.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Rollover Image Element Color','redux-framework-demo'),
                'content' => __('Rollover Image Element Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'slidingbar_divider_color',
            'type' => 'color',
            'title' => __('Sliding Bar Item Divider Color','redux-framework-demo'),
            'subtitle'  => __('Sliding Bar Item Divider Color.', 'redux-framework-demo'),
            'desc' => __('Controls the divider color in the sliding bar.','redux-framework-demo'),
            'default' => '#282A2B',
            'hint' => array(
                'title'   => __('Sliding Bar Item Divider Color','redux-framework-demo'),
                'content' => __('Sliding Bar Item Divider Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_divider_color',
            'type' => 'color',
            'title' => __('Footer Widget Divider Color','redux-framework-demo'),
            'subtitle'  => __('Footer Widget Divider Color.', 'redux-framework-demo'),
            'desc' => __('Controls the divider color in the footer.','redux-framework-demo'),
            'default' => '#505152',
            'hint' => array(
                'title'   => __('Footer Widget Divider Color','redux-framework-demo'),
                'content' => __('Footer Widget Divider Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'form_bg_color',
            'type' => 'color',
            'title' => __('Form Background Color','redux-framework-demo'),
            'subtitle'  => __('Form Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of form fields.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Form Background Color','redux-framework-demo'),
                'content' => __('Form Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'form_text_color',
            'type' => 'color',
            'title' => __('Form Text Color','redux-framework-demo'),
            'subtitle'  => __('Form Text Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color for forms.','redux-framework-demo'),
            'default' => '#aaa9a9',
            'hint' => array(
                'title'   => __('Form Text Color','redux-framework-demo'),
                'content' => __('Form Text Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'form_border_color',
            'type' => 'color',
            'title' => __('Form Border Color','redux-framework-demo'),
            'subtitle'  => __('Form Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border color of form fields.','redux-framework-demo'),
            'default' => '#d2d2d2',
            'hint' => array(
                'title'   => __('Form Border Color','redux-framework-demo'),
                'content' => __('Form Border Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'timeline_bg_color',
            'type' => 'color',
            'title' => __('Grid Box Color','redux-framework-demo'),
            'subtitle'  => __('Grid Box Color.', 'redux-framework-demo'),
            'desc' => __('Controls blog grid, timeline and WooCommerce post box background color.','redux-framework-demo'),
            'default' => 'transparent',
            'hint' => array(
                'title'   => __('Grid Box Color','redux-framework-demo'),
                'content' => __('Grid Box Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'timeline_color',
            'type' => 'color',
            'title' => __('Grid Element Color','redux-framework-demo'),
            'subtitle'  => __('Grid Element Color.', 'redux-framework-demo'),
            'desc' => __('Controls blog grid, timeline and WooCommerce post box border, divider lines, date box and border, timeline dots, timeline icon, timeline arrow.','redux-framework-demo'),
            'default' => '#ebeaea',
            'hint' => array(
                'title'   => __('Grid Element Color','redux-framework-demo'),
                'content' => __('Grid Element Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'qty_bg_color',
            'type' => 'color',
            'title' => __('Woo Quantity Box Background Color','redux-framework-demo'),
            'subtitle'  => __('Woo Quantity Box Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the woocommerce quantity box.','redux-framework-demo'),
            'default' => '#fbfaf9',
            'hint' => array(
                'title'   => __('Woo Quantity Box Background Color','redux-framework-demo'),
                'content' => __('Woo Quantity Box Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'qty_bg_hover_color',
            'type' => 'color',
            'title' => __('Woo Quantity Box Hover Background Color','redux-framework-demo'),
            'subtitle'  => __('Woo Quantity Box Hover Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the hover color of the woocommerce quantity box.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Woo Quantity Box Hover Background Color','redux-framework-demo'),
                'content' => __('Woo Quantity Box Hover Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'bbp_forum_header_bg',
            'type' => 'color',
            'title' => __('bbPress Forum Header Background Color','redux-framework-demo'),
            'subtitle'  => __('bbPress Forum Header Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color for forum header rows.','redux-framework-demo'),
            'default' => '#ebeaea',
            'hint' => array(
                'title'   => __('bbPress Forum Header Background Color','redux-framework-demo'),
                'content' => __('bbPress Forum Header Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'bbp_forum_border_color',
            'type' => 'color',
            'title' => __('bbPress Forum Border Color','redux-framework-demo'),
            'subtitle'  => __('bbPress Forum Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border color for all forum surrounding borders.','redux-framework-demo'),
            'default' => '#ebeaea',
            'hint' => array(
                'title'   => __('bbPress Forum Border Color','redux-framework-demo'),
                'content' => __('bbPress Forum Border Color','redux-framework-demo'),
            )
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
            'id' => 'tagline_font_color',
            'type' => 'color',
            'title' => __('Header Tagline Font Color','redux-framework-demo'),
            'subtitle'  => __('Header Tagline Font Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the header tagline font.','redux-framework-demo'),
            'default' => '#747474',
            'hint' => array(
                'title'   => __('Header Tagline Font Color','redux-framework-demo'),
                'content' => __('Header Tagline Font Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'page_title_color',
            'type' => 'color',
            'title' => __('Page Title Font Color','redux-framework-demo'),
            'subtitle'  => __('Page Title Font Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the page title font.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Page Title Font Color','redux-framework-demo'),
                'content' => __('Page Title Font Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'h1_color',
            'type' => 'color',
            'title' => __('Heading 1 (H1) Font Color','redux-framework-demo'),
            'subtitle'  => __('Heading 1 (H1) Font Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of H1 headings.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Heading 1 (H1) Font Color','redux-framework-demo'),
                'content' => __('Heading 1 (H1) Font Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'h2_color',
            'type' => 'color',
            'title' => __('Heading 2 (H2) Font Color','redux-framework-demo'),
            'subtitle'  => __('Heading 2 (H2) Font Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of H2 headings.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Heading 2 (H2) Font Color','redux-framework-demo'),
                'content' => __('Heading 2 (H2) Font Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'h3_color',
            'type' => 'color',
            'title' => __('Heading 3 (H3) Font Color','redux-framework-demo'),
            'subtitle'  => __('Heading 3 (H3) Font Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of H3 headings.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Heading 3 (H3) Font Color','redux-framework-demo'),
                'content' => __('Heading 3 (H3) Font Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'h4_color',
            'type' => 'color',
            'title' => __('Heading 4 (H4) Font Color','redux-framework-demo'),
            'subtitle'  => __('Heading 4 (H4) Font Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of H4 headings.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Heading 4 (H4) Font Color','redux-framework-demo'),
                'content' => __('Heading 4 (H4) Font Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'h5_color',
            'type' => 'color',
            'title' => __('Heading 5 (H5) Font Color','redux-framework-demo'),
            'subtitle'  => __('Heading 5 (H5) Font Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of H5 headings.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Heading 5 (H5) Font Color','redux-framework-demo'),
                'content' => __('Heading 5 (H5) Font Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'h6_color',
            'type' => 'color',
            'title' => __('Heading 6 (H6) Font Color','redux-framework-demo'),
            'subtitle'  => __('Heading 6 (H6) Font Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of H6 headings.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Heading 6 (H6) Font Color','redux-framework-demo'),
                'content' => __('Heading 6 (H6) Font Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'body_text_color',
            'type' => 'color',
            'title' => __('Body Text Color','redux-framework-demo'),
            'subtitle'  => __('Body Text Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of body font.','redux-framework-demo'),
            'default' => '#747474',
            'hint' => array(
                'title'   => __('Body Text Color','redux-framework-demo'),
                'content' => __('Body Text Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'link_color',
            'type' => 'color',
            'title' => __('Link Color','redux-framework-demo'),
            'subtitle'  => __('Link Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of all text links as well as the \'>\' in certain areas.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Link Color','redux-framework-demo'),
                'content' => __('Link Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'breadcrumbs_text_color',
            'type' => 'color',
            'title' => __('Breadcrumbs Text Color','redux-framework-demo'),
            'subtitle'  => __('Breadcrumbs Text Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the breadcrumb font.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Breadcrumbs Text Color','redux-framework-demo'),
                'content' => __('Breadcrumbs Text Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'slidingbar_headings_color',
            'type' => 'color',
            'title' => __('Sliding Bar Headings Color','redux-framework-demo'),
            'subtitle'  => __('Sliding Bar Headings Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the sliding bar heading font.','redux-framework-demo'),
            'default' => '#DDDDDD',
            'hint' => array(
                'title'   => __('Sliding Bar Headings Color','redux-framework-demo'),
                'content' => __('Sliding Bar Headings Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'slidingbar_text_color',
            'type' => 'color',
            'title' => __('Sliding Bar Font Color','redux-framework-demo'),
            'subtitle'  => __('Sliding Bar Font Color.', 'redux-framework-demo'),
            'desc' => __('Controls the font color of the sliding bar font.','redux-framework-demo'),
            'default' => '#8C8989',
            'hint' => array(
                'title'   => __('Sliding Bar Font Color','redux-framework-demo'),
                'content' => __('Sliding Bar Font Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'slidingbar_link_color',
            'type' => 'color',
            'title' => __('Sliding Bar Link Color','redux-framework-demo'),
            'subtitle'  => __('Sliding Bar Link Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the sliding bar link font.','redux-framework-demo'),
            'default' => '#BFBFBF',
            'hint' => array(
                'title'   => __('Sliding Bar Link Color','redux-framework-demo'),
                'content' => __('Sliding Bar Link Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sidebar_heading_color',
            'type' => 'color',
            'title' => __('Sidebar Widget Headings Color','redux-framework-demo'),
            'subtitle'  => __('Sidebar Widget Headings Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the sidebar widget headings.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Sidebar Widget Headings Color','redux-framework-demo'),
                'content' => __('Sidebar Widget Headings Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_headings_color',
            'type' => 'color',
            'title' => __('Footer Headings Color','redux-framework-demo'),
            'subtitle'  => __('Footer Headings Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the footer heading font.','redux-framework-demo'),
            'default' => '#DDDDDD',
            'hint' => array(
                'title'   => __('Footer Headings Color','redux-framework-demo'),
                'content' => __('Footer Headings Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_text_color',
            'type' => 'color',
            'title' => __('Footer Font Color','redux-framework-demo'),
            'subtitle'  => __('Footer Font Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the footer font.','redux-framework-demo'),
            'default' => '#8C8989',
            'hint' => array(
                'title'   => __('Footer Font Color','redux-framework-demo'),
                'content' => __('Footer Font Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_link_color',
            'type' => 'color',
            'title' => __('Footer Link Color','redux-framework-demo'),
            'subtitle'  => __('Footer Link Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the footer link font.','redux-framework-demo'),
            'default' => '#BFBFBF',
            'hint' => array(
                'title'   => __('Footer Link Color','redux-framework-demo'),
                'content' => __('Footer Link Color','redux-framework-demo'),
            )
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
            'id' => 'menu_h45_bg_color',
            'type' => 'color',
            'title' => __('Main Menu Background Color For Header 4 & 5','redux-framework-demo'),
            'subtitle'  => __('Main Menu Background Color For Header 4 & 5.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the menu when using header 4 or 5.','redux-framework-demo'),
            'default' => '#FFFFFF',
            'hint' => array(
                'title'   => __('Main Menu Background Color For Header 4 & 5','redux-framework-demo'),
                'content' => __('Main Menu Background Color For Header 4 & 5','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'menu_first_color',
            'type' => 'color',
            'title' => __('Main Menu Font Color - First Level','redux-framework-demo'),
            'subtitle'  => __('Main Menu Font Color - First Level.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of first level menu items.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Main Menu Font Color - First Level','redux-framework-demo'),
                'content' => __('Main Menu Font Color - First Level','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'menu_hover_first_color',
            'type' => 'color',
            'title' => __('Main Menu Font Hover Color - First Level','redux-framework-demo'),
            'subtitle'  => __('Main Menu Font Hover Color - First Level.', 'redux-framework-demo'),
            'desc' => __('Controls the main menu hover, hover border & dropdown border color.','redux-framework-demo'),
            'default' => '#168DC5',
            'hint' => array(
                'title'   => __('Main Menu Font Hover Color - First Level','redux-framework-demo'),
                'content' => __('Main Menu Font Hover Color - First Level','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'menu_sub_bg_color',
            'type' => 'color',
            'title' => __('Main Menu Background Color - Sublevels','redux-framework-demo'),
            'subtitle'  => __('Main Menu Background Color - Sublevels.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the menu sublevel background.','redux-framework-demo'),
            'default' => '#f2efef',
            'hint' => array(
                'title'   => __('Main Menu Background Color - Sublevels','redux-framework-demo'),
                'content' => __('Main Menu Background Color - Sublevels','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'menu_bg_hover_color',
            'type' => 'color',
            'title' => __('Main Menu Background Hover Color - Sublevels','redux-framework-demo'),
            'subtitle'  => __('Main Menu Background Hover Color - Sublevels.', 'redux-framework-demo'),
            'desc' => __('Controls the hover color of the menu sublevel background.','redux-framework-demo'),
            'default' => '#f8f8f8',
            'hint' => array(
                'title'   => __('Main Menu Background Hover Color - Sublevels','redux-framework-demo'),
                'content' => __('Main Menu Background Hover Color - Sublevels','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'menu_sub_color',
            'type' => 'color',
            'title' => __('Main Menu Font Color - Sublevels','redux-framework-demo'),
            'subtitle'  => __('Main Menu Font Color - Sublevels.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the menu font sublevels.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Main Menu Font Color - Sublevels','redux-framework-demo'),
                'content' => __('Main Menu Font Color - Sublevels','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'menu_sub_sep_color',
            'type' => 'color',
            'title' => __('Main Menu Separator - Sublevels','redux-framework-demo'),
            'subtitle'  => __('Main Menu Separator - Sublevels.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the menu separator sublevels.','redux-framework-demo'),
            'default' => '#dcdadb',
            'hint' => array(
                'title'   => __('Main Menu Separator - Sublevels','redux-framework-demo'),
                'content' => __('Main Menu Separator - Sublevels','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'woo_cart_bg_color',
            'type' => 'color',
            'title' => __('Woo Cart Menu Background Color','redux-framework-demo'),
            'subtitle'  => __('Woo Cart Menu Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the bottom section background color of the woocommerce cart dropdown.','redux-framework-demo'),
            'default' => '#fafafa',
            'hint' => array(
                'title'   => __('Woo Cart Menu Background Color','redux-framework-demo'),
                'content' => __('Woo Cart Menu Background Color','redux-framework-demo'),
            )
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
            'id' => 'snav_color',
            'type' => 'color',
            'title' => __('Secondary Menu Font Color - First Level & Top Contact Info','redux-framework-demo'),
            'subtitle'  => __('Secondary Menu Font Color - First Level & Top Contact Info.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the secondary menu first level and contact info font.','redux-framework-demo'),
            'default' => '#747474',
            'hint' => array(
                'title'   => __('Secondary Menu Font Color - First Level & Top Contact Info','redux-framework-demo'),
                'content' => __('Secondary Menu Font Color - First Level & Top Contact Info','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'header_top_first_border_color',
            'type' => 'color',
            'title' => __('Secondary Menu Divider Color - First Level','redux-framework-demo'),
            'subtitle'  => __('Secondary Menu Divider Color - First Level.', 'redux-framework-demo'),
            'desc' => __('Controls the divider color of the first level secondary menu.','redux-framework-demo'),
            'default' => '#e5e5e5',
            'hint' => array(
                'title'   => __('Secondary Menu Divider Color - First Level','redux-framework-demo'),
                'content' => __('Secondary Menu Divider Color - First Level','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'header_top_sub_bg_color',
            'type' => 'color',
            'title' => __('Secondary Menu Background Color - Sublevels','redux-framework-demo'),
            'subtitle'  => __('Secondary Menu Background Color - Sublevels.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the secondary menu sublevels.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Secondary Menu Background Color - Sublevels','redux-framework-demo'),
                'content' => __('Secondary Menu Background Color - Sublevels','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'header_top_menu_sub_color',
            'type' => 'color',
            'title' => __('Secondary Menu Font Color - Sublevels','redux-framework-demo'),
            'subtitle'  => __('Secondary Menu Font Color - Sublevels.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the secondary menu font sublevels.','redux-framework-demo'),
            'default' => '#747474',
            'hint' => array(
                'title'   => __('Secondary Menu Font Color - Sublevels','redux-framework-demo'),
                'content' => __('Secondary Menu Font Color - Sublevels','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'header_top_menu_bg_hover_color',
            'type' => 'color',
            'title' => __('Secondary Menu Hover Background Color - Sublevels','redux-framework-demo'),
            'subtitle'  => __('Secondary Menu Hover Background Color - Sublevels.', 'redux-framework-demo'),
            'desc' => __('Controls the hover color of the secondary menu background sublevels.','redux-framework-demo'),
            'default' => '#fafafa',
            'hint' => array(
                'title'   => __('Secondary Menu Hover Background Color - Sublevels','redux-framework-demo'),
                'content' => __('Secondary Menu Hover Background Color - Sublevels','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'header_top_menu_sub_hover_color',
            'type' => 'color',
            'title' => __('Secondary Menu Hover Font Color - Sublevels','redux-framework-demo'),
            'subtitle'  => __('Secondary Menu Hover Font Color - Sublevels.', 'redux-framework-demo'),
            'desc' => __('Controls the hover text color of the secondary menu font sublevels.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Secondary Menu Hover Font Color - Sublevels','redux-framework-demo'),
                'content' => __('Secondary Menu Hover Font Color - Sublevels','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'header_top_menu_sub_sep_color',
            'type' => 'color',
            'title' => __('Secondary Menu Border	- Sublevels','redux-framework-demo'),
            'subtitle'  => __('Secondary Menu Border	- Sublevels.', 'redux-framework-demo'),
            'desc' => __('Controls the border color of the secondary menu sublevels.','redux-framework-demo'),
            'default' => '#e5e5e5',
            'hint' => array(
                'title'   => __('Secondary Menu Border	- Sublevels','redux-framework-demo'),
                'content' => __('Secondary Menu Border	- Sublevels','redux-framework-demo'),
            )
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
            'id' => 'mobile_menu_background_color',
            'type' => 'color',
            'title' => __('Mobile Menu Background Color','redux-framework-demo'),
            'subtitle'  => __('Mobile Menu Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the mobile menu box and dropdown.','redux-framework-demo'),
            'default' => '#f9f9f9',
            'hint' => array(
                'title'   => __('Mobile Menu Background Color','redux-framework-demo'),
                'content' => __('Mobile Menu Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'mobile_menu_border_color',
            'type' => 'color',
            'title' => __('Mobile Menu Border Color','redux-framework-demo'),
            'subtitle'  => __('Mobile Menu Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border, divider and icon colors of the mobile menu.','redux-framework-demo'),
            'default' => '#dadada',
            'hint' => array(
                'title'   => __('Mobile Menu Border Color','redux-framework-demo'),
                'content' => __('Mobile Menu Border Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'mobile_menu_hover_color',
            'type' => 'color',
            'title' => __('Mobile Menu Hover Color','redux-framework-demo'),
            'subtitle'  => __('Mobile Menu Hover Color.', 'redux-framework-demo'),
            'desc' => __('Controls the hover color of the mobile menu items.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Mobile Menu Hover Color','redux-framework-demo'),
                'content' => __('Mobile Menu Hover Color','redux-framework-demo'),
            )
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
            'id' => 'sidebar_bg_color',
            'type' => 'color',
            'title' => __('Sidebar Background Color','redux-framework-demo'),
            'subtitle'  => __('Sidebar Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the sidebar.','redux-framework-demo'),
            'default' => 'transparent',
            'hint' => array(
                'title'   => __('Sidebar Background Color','redux-framework-demo'),
                'content' => __('Sidebar Background Color','redux-framework-demo'),
            )
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
            'id' => 'accordian_inactive_color',
            'type' => 'color',
            'title' => __('Accordion Inactive Box Color','redux-framework-demo'),
            'subtitle'  => __('Accordion Inactive Box Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the inactive boxes behind the \'+\' icons.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Accordion Inactive Box Color','redux-framework-demo'),
                'content' => __('Accordion Inactive Box Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'blog_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Blog Shortcode</h3>',
        ),
        array (
            'id' => 'dates_box_color',
            'type' => 'color',
            'title' => __('Blog Date Box Color','redux-framework-demo'),
            'subtitle'  => __('Blog Date Box Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the date box in blog alternate and recent posts layouts.','redux-framework-demo'),
            'default' => '#eef0f2',
            'hint' => array(
                'title'   => __('Blog Date Box Color','redux-framework-demo'),
                'content' => __('Blog Date Box Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'button_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Button Shortcode</h3>',

        ),
        array (
            'id' => 'button_size',
            'type' => 'select',
            'options' => array (
                'Small' => 'Small',
                'Medium' => 'Medium',
                'Large' => 'Large',
                'XLarge' => 'XLarge',
            ),
            'title' => __('Button Size','redux-framework-demo'),
            'subtitle'  => __('Button Size.', 'redux-framework-demo'),
            'desc' => __('Select the default button size.','redux-framework-demo'),
            'default' => 'Large',
            'hint' => array(
                'title'   => __('Button Size','redux-framework-demo'),
                'content' => __('Button Size','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'button_shape',
            'type' => 'select',
            'options' => array (
                'Square' => 'Square',
                'Round' => 'Round',
                'Pill' => 'Pill',
            ),
            'title' => __('Button Shape','redux-framework-demo'),
            'subtitle'  => __('Button Shape.', 'redux-framework-demo'),
            'desc' => __('Select the default shape for buttons.','redux-framework-demo'),
            'default' => 'Round',
            'hint' => array(
                'title'   => __('Button Shape','redux-framework-demo'),
                'content' => __('Button Shape','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'button_type',
            'type' => 'select',
            'options' => array (
                'Flat' => 'Flat',
                '3d' => '3d',
            ),
            'title' => __('Button Type','redux-framework-demo'),
            'subtitle'  => __('Button Type.', 'redux-framework-demo'),
            'desc' => __('Select the default button type.','redux-framework-demo'),
            'default' => 'Flat',
            'hint' => array(
                'title'   => __('Button Type','redux-framework-demo'),
                'content' => __('Button Type','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'button_gradient_top_color',
            'type' => 'color',
            'title' => __('Button Gradient Top Color','redux-framework-demo'),
            'subtitle'  => __('Button Gradient Top Color.', 'redux-framework-demo'),
            'desc' => __('Set the top color of the button background.','redux-framework-demo'),
            'default' => '#2ba5df',
            'hint' => array(
                'title'   => __('Button Gradient Top Color','redux-framework-demo'),
                'content' => __('Button Gradient Top Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'button_gradient_bottom_color',
            'type' => 'color',
            'title' => __('Button Gradient Bottom Color','redux-framework-demo'),
            'subtitle'  => __('Button Gradient Bottom Color.', 'redux-framework-demo'),
            'desc' => __('Set the bottom color of the button background or leave empty for solid color.','redux-framework-demo'),
            'default' => '#168DC5',
            'hint' => array(
                'title'   => __('Button Gradient Bottom Color','redux-framework-demo'),
                'content' => __('Button Gradient Bottom Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'button_gradient_top_color_hover',
            'type' => 'color',
            'title' => __('Button Gradient Top Hover Color','redux-framework-demo'),
            'subtitle'  => __('Button Gradient Top Hover Color.', 'redux-framework-demo'),
            'desc' => __('Set the top hover color of the button background.','redux-framework-demo'),
            'default' => '#168DC5',
            'hint' => array(
                'title'   => __('Button Gradient Top Hover Color','redux-framework-demo'),
                'content' => __('Button Gradient Top Hover Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'button_gradient_bottom_color_hover',
            'type' => 'color',
            'title' => __('Button Gradient Bottom Hover Color','redux-framework-demo'),
            'subtitle'  => __('Button Gradient Bottom Hover Color.', 'redux-framework-demo'),
            'desc' => __('Set the bottom hover color of the button background or leave empty for solid color. ','redux-framework-demo'),
            'default' => '#2ba5df',
            'hint' => array(
                'title'   => __('Button Gradient Bottom Hover Color','redux-framework-demo'),
                'content' => __('Button Gradient Bottom Hover Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'button_accent_color',
            'type' => 'color',
            'title' => __('Button Accent Color','redux-framework-demo'),
            'subtitle'  => __('Button Accent Color.', 'redux-framework-demo'),
            'desc' => __('This option controls the color of the button border, divider, text and icon.','redux-framework-demo'),
            'default' => '#1570a6',
            'hint' => array(
                'title'   => __('Button Accent Color','redux-framework-demo'),
                'content' => __('Button Accent Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'button_accent_hover_color',
            'type' => 'color',
            'title' => __('Button Accent Hover Color','redux-framework-demo'),
            'subtitle'  => __('Button Accent Hover Color.', 'redux-framework-demo'),
            'desc' => __('This option controls the hover color of the button border, divider, text and icon.','redux-framework-demo'),
            'default' => '#1570a6',
            'hint' => array(
                'title'   => __('Button Accent Hover Color','redux-framework-demo'),
                'content' => __('Button Accent Hover Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'button_bevel_color',
            'type' => 'color',
            'title' => __('Button Bevel Color (3D Mode only)','redux-framework-demo'),
            'subtitle'  => __('Button Bevel Color (3D Mode only).', 'redux-framework-demo'),
            'desc' => __('Controls the default bevel color of the buttons.','redux-framework-demo'),
            'default' => '#1570a6',
            'hint' => array(
                'title'   => __('Button Bevel Color (3D Mode only)','redux-framework-demo'),
                'content' => __('Button Bevel Color (3D Mode only)','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'button_border_width',
            'type' => 'text',
            'title' => __('Button Border Width','redux-framework-demo'),
            'subtitle'  => __('Button Border Width.', 'redux-framework-demo'),
            'desc' => __('Select the border width for buttons. Enter value in px. ex: 1px','redux-framework-demo'),
            'default' => '1px',
            'hint' => array(
                'title'   => __('Button Border Width','redux-framework-demo'),
                'content' => __('Button Border Width','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'button_text_shadow',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Button Shadow','redux-framework-demo'),
            'subtitle'  => __('Button Shadow.', 'redux-framework-demo'),
            'desc' => __('YES to disable the bottom button shadow and text shadow.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Button Shadow','redux-framework-demo'),
                'content' => __('Button Shadow','redux-framework-demo'),
            )
        ),


        array (
            'id' => 'carousel_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Carousel Shortcode</h3>',

        ),
        array (
            'id' => 'carousel_nav_color',
            'type' => 'color',
            'title' => __('Carousel Default Nav Box Color','redux-framework-demo'),
            'subtitle'  => __('Carousel Default Nav Box Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the default navigation box for carousel sliders.','redux-framework-demo'),
            'default' => '#999999',
            'hint' => array(
                'title'   => __('Carousel Default Nav Box Color','redux-framework-demo'),
                'content' => __('Carousel Default Nav Box Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'carousel_hover_color',
            'type' => 'color',
            'title' => __('Carousel Hover Nav Box Color','redux-framework-demo'),
            'subtitle'  => __('Carousel Hover Nav Box Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the hover navigation box for carousel sliders.','redux-framework-demo'),
            'default' => '#808080',
            'hint' => array(
                'title'   => __('Carousel Hover Nav Box Color','redux-framework-demo'),
                'content' => __('Carousel Hover Nav Box Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'cb_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Content Box Shortcode</h3>',

        ),
        array (
            'id' => 'content_box_bg_color',
            'type' => 'color',
            'title' => __('Content Box Background Color','redux-framework-demo'),
            'subtitle'  => __('Content Box Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the background for content boxes. Only use for \'icon-boxed\' style. Leave transparent for other styles.','redux-framework-demo'),
            'default' => 'transparent',
            'hint' => array(
                'title'   => __('Content Box Background Color','redux-framework-demo'),
                'content' => __('Content Box Background Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'checklist_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Checklist Shortcode</h3>',

        ),
        array (
            'id' => 'checklist_circle',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Checklist Circle','redux-framework-demo'),
            'subtitle'  => __('Checklist Circle.', 'redux-framework-demo'),
            'desc' => __('YES if you want to use circles on checklists.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Checklist Circle','redux-framework-demo'),
                'content' => __('Checklist Circle','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'checklist_circle_color',
            'type' => 'color',
            'title' => __('Checklist Circle Color','redux-framework-demo'),
            'subtitle'  => __('Checklist Circle Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the checklist circle.','redux-framework-demo'),
            'default' => '#168DC5',
            'hint' => array(
                'title'   => __('Checklist Circle Color','redux-framework-demo'),
                'content' => __('Checklist Circle Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'checklist_icons_color',
            'type' => 'color',
            'title' => __('Checklist Icon Color','redux-framework-demo'),
            'subtitle'  => __('Checklist Icon Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the checklist icon.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Checklist Icon Color','redux-framework-demo'),
                'content' => __('Checklist Icon Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'cc_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Counter Circles Shortcode</h3>',

        ),
        array (
            'id' => 'counter_filled_color',
            'type' => 'color',
            'title' => __('Counter Circle Filled Color','redux-framework-demo'),
            'subtitle'  => __('Counter Circle Filled Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the counter text and icon.','redux-framework-demo'),
            'default' => '#168DC5',
            'hint' => array(
                'title'   => __('Counter Circle Filled Color','redux-framework-demo'),
                'content' => __('Counter Circle Filled Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'counter_unfilled_color',
            'type' => 'color',
            'title' => __('Counter Circle Unfilled Color','redux-framework-demo'),
            'subtitle'  => __('Counter Circle Unfilled Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the counter text and icon.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Counter Circle Unfilled Color','redux-framework-demo'),
                'content' => __('Counter Circle Unfilled Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'counterb_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Counter Boxes Shortcode</h3>',

        ),
        array (
            'id' => 'counter_box_color',
            'type' => 'color',
            'title' => __('Counter Box Text Color','redux-framework-demo'),
            'subtitle'  => __('Counter Box Text Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the counter text and icon.','redux-framework-demo'),
            'default' => '#168DC5',
            'hint' => array(
                'title'   => __('Counter Box Text Color','redux-framework-demo'),
                'content' => __('Counter Box Text Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'dropcap_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Dropcap Shortcode</h3>',

        ),
        array (
            'id' => 'dropcap_color',
            'type' => 'color',
            'title' => __('Dropcap Color','redux-framework-demo'),
            'subtitle'  => __('Dropcap Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the dropcap text, or the dropcap box is a box is used.','redux-framework-demo'),
            'default' => '#168DC5',
            'hint' => array(
                'title'   => __('Dropcap Color','redux-framework-demo'),
                'content' => __('Dropcap Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'flipb_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Flip Boxes Shortcode</h3>',

        ),
        array (
            'id' => 'flip_boxes_front_bg',
            'type' => 'color',
            'title' => __('Flip Box Background Color Frontside','redux-framework-demo'),
            'subtitle'  => __('Flip Box Background Color Frontside.', 'redux-framework-demo'),
            'desc' => __('Controls the color of frontside background color.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Flip Box Background Color Frontside','redux-framework-demo'),
                'content' => __('Flip Box Background Color Frontside','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'flip_boxes_front_heading',
            'type' => 'color',
            'title' => __('Flip Box Heading Color Frontside','redux-framework-demo'),
            'subtitle'  => __('Flip Box Heading Color Frontside.', 'redux-framework-demo'),
            'desc' => __('Controls the color of frontside heading color.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Flip Box Heading Color Frontside','redux-framework-demo'),
                'content' => __('Flip Box Heading Color Frontside','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'flip_boxes_front_text',
            'type' => 'color',
            'title' => __('Flip Box Text Color Frontside','redux-framework-demo'),
            'subtitle'  => __('Flip Box Text Color Frontside.', 'redux-framework-demo'),
            'desc' => __('Controls the color of frontside text color.','redux-framework-demo'),
            'default' => '#747474',
            'hint' => array(
                'title'   => __('Flip Box Text Color Frontside','redux-framework-demo'),
                'content' => __('Flip Box Text Color Frontside','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'flip_boxes_back_bg',
            'type' => 'color',
            'title' => __('Flip Box Background Color Backside','redux-framework-demo'),
            'subtitle'  => __('Flip Box Background Color Backside.', 'redux-framework-demo'),
            'desc' => __('Controls the color of backside background color.','redux-framework-demo'),
            'default' => '#168DC5',
            'hint' => array(
                'title'   => __('Flip Box Background Color Backside','redux-framework-demo'),
                'content' => __('Flip Box Background Color Backside','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'flip_boxes_back_heading',
            'type' => 'color',
            'title' => __('Flip Box Heading Color Backside','redux-framework-demo'),
            'subtitle'  => __('Flip Box Heading Color Backside.', 'redux-framework-demo'),
            'desc' => __('Controls the color of backside heading color.','redux-framework-demo'),
            'default' => '#eeeded',
            'hint' => array(
                'title'   => __('Flip Box Heading Color Backside','redux-framework-demo'),
                'content' => __('Flip Box Heading Color Backside','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'flip_boxes_back_text',
            'type' => 'color',
            'title' => __('Flip Box Text Color Backside','redux-framework-demo'),
            'subtitle'  => __('Flip Box Text Color Backside.', 'redux-framework-demo'),
            'desc' => __('Controls the color of backside text color.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Flip Box Text Color Backside','redux-framework-demo'),
                'content' => __('Flip Box Text Color Backside','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'flip_boxes_border_size',
            'type' => 'text',
            'title' => __('Flip Box Border Size','redux-framework-demo'),
            'subtitle'  => __('Flip Box Border Size.', 'redux-framework-demo'),
            'desc' => __('Controls the border size of flip boxes.','redux-framework-demo'),
            'default' => '1px',
            'hint' => array(
                'title'   => __('Flip Box Border Size','redux-framework-demo'),
                'content' => __('Flip Box Border Size','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'flip_boxes_border_color',
            'type' => 'color',
            'title' => __('Flip Box Border Color','redux-framework-demo'),
            'subtitle'  => __('Flip Box Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border color of flip boxes.','redux-framework-demo'),
            'default' => 'transparent',
            'hint' => array(
                'title'   => __('Flip Box Border Color','redux-framework-demo'),
                'content' => __('Flip Box Border Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'flip_boxes_border_radius',
            'type' => 'text',
            'title' => __('Flip Box Border Radius','redux-framework-demo'),
            'subtitle'  => __('Flip Box Border Radius.', 'redux-framework-demo'),
            'desc' => __('Controls the border radius (roundness) of flip boxes.','redux-framework-demo'),
            'default' => '4px',
            'hint' => array(
                'title'   => __('Flip Box Border Radius','redux-framework-demo'),
                'content' => __('Flip Box Border Radius','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'fullwidth_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Full Width Shortcode</h3>',

        ),
        array (
            'id' => 'full_width_bg_color',
            'type' => 'color',
            'title' => __('Full Width Background Color','redux-framework-demo'),
            'subtitle'  => __('Full Width Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the full width section.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Full Width Background Color','redux-framework-demo'),
                'content' => __('Full Width Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'full_width_border_size',
            'type' => 'text',
            'title' => __('Full Width Border Size','redux-framework-demo'),
            'subtitle'  => __('Full Width Border Size.', 'redux-framework-demo'),
            'desc' => __('Controls the border size of the full width section.','redux-framework-demo'),
            'default' => '0px',
            'hint' => array(
                'title'   => __('Full Width Border Size','redux-framework-demo'),
                'content' => __('Full Width Border Size','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'full_width_border_color',
            'type' => 'color',
            'title' => __('Full Width Border Color','redux-framework-demo'),
            'subtitle'  => __('Full Width Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border color of the full width section.','redux-framework-demo'),
            'default' => '#eae9e9',
            'hint' => array(
                'title'   => __('Full Width Border Color','redux-framework-demo'),
                'content' => __('Full Width Border Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'icon_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Icon Shortcode</h3>',

        ),
        array (
            'id' => 'icon_circle_color',
            'type' => 'color',
            'title' => __('Icon Circle Background Color','redux-framework-demo'),
            'subtitle'  => __('Icon Circle Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the circle when used with icons.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Icon Circle Background Color','redux-framework-demo'),
                'content' => __('Icon Circle Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'icon_border_color',
            'type' => 'color',
            'title' => __('Icon Circle Border Color','redux-framework-demo'),
            'subtitle'  => __('Icon Circle Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the circle border when used with icons.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Icon Circle Border Color','redux-framework-demo'),
                'content' => __('Icon Circle Border Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'icon_color',
            'type' => 'color',
            'title' => __('Icon Color','redux-framework-demo'),
            'subtitle'  => __('Icon Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the icons.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Icon Color','redux-framework-demo'),
                'content' => __('Icon Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'imgf_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Image Frame Shortcode</h3>',

        ),
        array (
            'id' => 'imgframe_border_color',
            'type' => 'color',
            'title' => __('Image Frame Border Color','redux-framework-demo'),
            'subtitle'  => __('Image Frame Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border color of the image frame.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Image Frame Border Color','redux-framework-demo'),
                'content' => __('Image Frame Border Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'imageframe_border_size',
            'type' => 'text',
            'title' => __('Image Frame Border Size','redux-framework-demo'),
            'subtitle'  => __('Image Frame Border Size.', 'redux-framework-demo'),
            'desc' => __('Controls the border size of the image.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Image Frame Border Size','redux-framework-demo'),
                'content' => __('Image Frame Border Size','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'imgframe_style_color',
            'type' => 'color',
            'title' => __('Image Frame Style Color','redux-framework-demo'),
            'subtitle'  => __('Image Frame Style Color.', 'redux-framework-demo'),
            'desc' => __('Controls the style color of the image frame. Only works for glow and dropshadow style.','redux-framework-demo'),
            'default' => '#000000',
            'hint' => array(
                'title'   => __('Image Frame Style Color','redux-framework-demo'),
                'content' => __('Image Frame Style Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'modal_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Modal Shortcode</h3>',

        ),
        array (
            'id' => 'modal_bg_color',
            'type' => 'color',
            'title' => __('Modal Background Color','redux-framework-demo'),
            'subtitle'  => __('Modal Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the modal popup box','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Modal Background Color','redux-framework-demo'),
                'content' => __('Modal Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'modal_border_color',
            'type' => 'color',
            'title' => __('Modal Border Color','redux-framework-demo'),
            'subtitle'  => __('Modal Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border color of the modal popup box','redux-framework-demo'),
            'default' => '#ebebeb',
            'hint' => array(
                'title'   => __('Modal Border Color','redux-framework-demo'),
                'content' => __('Modal Border Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'person_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Person Shortcode</h3>',
        ),

        array (
            'id' => 'person_border_size',
            'type' => 'text',
            'title' => __('Person Border Size','redux-framework-demo'),
            'subtitle'  => __('Person Border Size.', 'redux-framework-demo'),
            'desc' => __('Controls the border size of the image.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Person Border Size','redux-framework-demo'),
                'content' => __('Person Border Size','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'person_border_color',
            'type' => 'color',
            'title' => __('Person Border Color','redux-framework-demo'),
            'subtitle'  => __('Person Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border color of the of the image.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Person Border Color','redux-framework-demo'),
                'content' => __('Person Border Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'person_style_color',
            'type' => 'color',
            'title' => __('Person Style Color','redux-framework-demo'),
            'subtitle'  => __('Person Style Color.', 'redux-framework-demo'),
            'desc' => __('For all style types except border. Controls the style color. ','redux-framework-demo'),
            'default' => '#000000',
            'hint' => array(
                'title'   => __('Person Style Color','redux-framework-demo'),
                'content' => __('Person Style Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'popover_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Popover Shortcode</h3>',

        ),
        array (
            'id' => 'popover_heading_bg_color',
            'type' => 'color',
            'title' => __('Popover Heading Background Color','redux-framework-demo'),
            'subtitle'  => __('Popover Heading Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of popover heading area.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Popover Heading Background Color','redux-framework-demo'),
                'content' => __('Popover Heading Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'popover_content_bg_color',
            'type' => 'color',
            'title' => __('Popover Content Background Color','redux-framework-demo'),
            'subtitle'  => __('Popover Content Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of popover content area.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Popover Content Background Color','redux-framework-demo'),
                'content' => __('Popover Content Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'popover_border_color',
            'type' => 'color',
            'title' => __('Popover Border Color','redux-framework-demo'),
            'subtitle'  => __('Popover Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border color of popover box.','redux-framework-demo'),
            'default' => '#ebebeb',
            'hint' => array(
                'title'   => __('Popover Border Color','redux-framework-demo'),
                'content' => __('Popover Border Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'popover_text_color',
            'type' => 'color',
            'title' => __('Popover Text Color','redux-framework-demo'),
            'subtitle'  => __('Popover Text Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color inside the popover box. ','redux-framework-demo'),
            'default' => '#747474',
            'hint' => array(
                'title'   => __('Popover Text Color','redux-framework-demo'),
                'content' => __('Popover Text Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'popover_placement',
            'type' => 'select',
            'options' => array (
                'Top' => 'Top',
                'Right' => 'Right',
                'Bottom' => 'Bottom',
                'Left' => 'Left',
            ),
            'title' => __('Popover Position','redux-framework-demo'),
            'subtitle'  => __('Popover Position.', 'redux-framework-demo'),
            'desc' => __('Controls the position of the popover in reference to the triggering text.','redux-framework-demo'),
            'default' => 'Top',
            'hint' => array(
                'title'   => __('Popover Position','redux-framework-demo'),
                'content' => __('Popover Position','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'pricingtable_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Pricing Table Shortcode</h3>',

        ),
        array (
            'id' => 'full_boxed_pricing_box_heading_color',
            'type' => 'color',
            'title' => __('Pricing Box Style 1 Heading Color','redux-framework-demo'),
            'subtitle'  => __('Pricing Box Style 1 Heading Color.', 'redux-framework-demo'),
            'desc' => __('Controls the heading color of full boxed pricing tables.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Pricing Box Style 1 Heading Color','redux-framework-demo'),
                'content' => __('Pricing Box Style 1 Heading Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sep_pricing_box_heading_color',
            'type' => 'color',
            'title' => __('Pricing Box Style 2 Heading Color','redux-framework-demo'),
            'subtitle'  => __('Pricing Box Style 2 Heading Color.', 'redux-framework-demo'),
            'desc' => __('Controls the heading color of separate pricing boxes.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Pricing Box Style 2 Heading Color','redux-framework-demo'),
                'content' => __('Pricing Box Style 2 Heading Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'pricing_box_color',
            'type' => 'color',
            'title' => __('Pricing Box Color','redux-framework-demo'),
            'subtitle'  => __('Pricing Box Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color portions of pricing boxes.','redux-framework-demo'),
            'default' => '#168DC5',
            'hint' => array(
                'title'   => __('Pricing Box Color','redux-framework-demo'),
                'content' => __('Pricing Box Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'pricing_bg_color',
            'type' => 'color',
            'title' => __('Pricing Box Bg Color','redux-framework-demo'),
            'subtitle'  => __('Pricing Box Bg Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of main background and title background.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Pricing Box Bg Color','redux-framework-demo'),
                'content' => __('Pricing Box Bg Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'pricing_border_color',
            'type' => 'color',
            'title' => __('Pricing Box Border Color','redux-framework-demo'),
            'subtitle'  => __('Pricing Box Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the outer border, pricing row and footer row backgrounds.','redux-framework-demo'),
            'default' => '#f8f8f8',
            'hint' => array(
                'title'   => __('Pricing Box Border Color','redux-framework-demo'),
                'content' => __('Pricing Box Border Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'pricing_divider_color',
            'type' => 'color',
            'title' => __('Pricing Box Divider Color','redux-framework-demo'),
            'subtitle'  => __('Pricing Box Divider Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the dividers in-between pricing rows.','redux-framework-demo'),
            'default' => '#ededed',
            'hint' => array(
                'title'   => __('Pricing Box Divider Color','redux-framework-demo'),
                'content' => __('Pricing Box Divider Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'progressbar_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Progress Bar Shortcode</h3>',

        ),
        array (
            'id' => 'progressbar_filled_color',
            'type' => 'color',
            'title' => __('Progress Bar Filled Color','redux-framework-demo'),
            'subtitle'  => __('Progress Bar Filled Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the filled area in progress bars.','redux-framework-demo'),
            'default' => '#168DC5',
            'hint' => array(
                'title'   => __('Progress Bar Filled Color','redux-framework-demo'),
                'content' => __('Progress Bar Filled Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'progressbar_unfilled_color',
            'type' => 'color',
            'title' => __('Progress Bar Unfilled Color','redux-framework-demo'),
            'subtitle'  => __('Progress Bar Unfilled Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the unfilled area in progress bars.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Progress Bar Unfilled Color','redux-framework-demo'),
                'content' => __('Progress Bar Unfilled Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'progressbar_text_color',
            'type' => 'color',
            'title' => __('Progress Bar Text Color','redux-framework-demo'),
            'subtitle'  => __('Progress Bar Text Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the text in progress bars.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Progress Bar Text Color','redux-framework-demo'),
                'content' => __('Progress Bar Text Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'separator_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Seprator Shortcode</h3>',

        ),
        array (
            'id' => 'sep_color',
            'type' => 'color',
            'title' => __('Separators Color','redux-framework-demo'),
            'subtitle'  => __('Separators Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of all separators, divider lines and borders for meta, previous & next, filters, category page, boxes around number pagination, sidebar widgets, accordion divider lines, counter boxes and more.','redux-framework-demo'),
            'default' => '#e0dede',
            'hint' => array(
                'title'   => __('Separators Color','redux-framework-demo'),
                'content' => __('Separators Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'sectionseparator_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Section Seprator Shortcode</h3>',

        ),
        array (
            'id' => 'section_sep_border_size',
            'type' => 'text',
            'title' => __('Section Separator Border Size','redux-framework-demo'),
            'subtitle'  => __('Section Separator Border Size.', 'redux-framework-demo'),
            'desc' => __('Controls the border size of the section separator.','redux-framework-demo'),
            'default' => '1px',
            'hint' => array(
                'title'   => __('Section Separator Border Size','redux-framework-demo'),
                'content' => __('Section Separator Border Size','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'section_sep_bg',
            'type' => 'color',
            'title' => __('Section Separator Background Color of Divider Candy','redux-framework-demo'),
            'subtitle'  => __('Section Separator Background Color of Divider Candy.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the divider candy.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Section Separator Background Color of Divider Candy','redux-framework-demo'),
                'content' => __('Section Separator Background Color of Divider Candy','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'section_sep_border_color',
            'type' => 'color',
            'title' => __('Section Separator Border Color','redux-framework-demo'),
            'subtitle'  => __('Section Separator Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border color of the separator.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Section Separator Border Color','redux-framework-demo'),
                'content' => __('Section Separator Border Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'sharingbox_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Sharing Box Shortcode</h3>',

        ),
        array (
            'id' => 'sharing_box_bg_color',
            'type' => 'color',
            'title' => __('Sharing Box Background Color','redux-framework-demo'),
            'subtitle'  => __('Sharing Box Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the sharing box.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Sharing Box Background Color','redux-framework-demo'),
                'content' => __('Sharing Box Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_box_tagline_text_color',
            'type' => 'color',
            'title' => __('Sharing Box Tagline Text Color','redux-framework-demo'),
            'subtitle'  => __('Sharing Box Tagline Text Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the tagline text.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Sharing Box Tagline Text Color','redux-framework-demo'),
                'content' => __('Sharing Box Tagline Text Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'sociallinks_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Social Links Shortcode</h3>',

        ),
        array (
            'id' => 'social_links_icon_color',
            'type' => 'color',
            'title' => __('Social Links Custom Icons Color','redux-framework-demo'),
            'subtitle'  => __('Social Links Custom Icons Color.', 'redux-framework-demo'),
            'desc' => __('Select a custom social icon color.','redux-framework-demo'),
            'default' => '#bebdbd',
            'hint' => array(
                'title'   => __('Social Links Custom Icons Color','redux-framework-demo'),
                'content' => __('Social Links Custom Icons Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'social_links_boxed',
            'type' => 'select',
            'options' => array (
                'No' => 'No',
                'Yes' => 'Yes',
            ),
            'title' => __('Social Links Icons Boxed','redux-framework-demo'),
            'subtitle'  => __('Social Links Icons Boxed.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the social icons in the sharing box.','redux-framework-demo'),
            'default' => 'No',
            'hint' => array(
                'title'   => __('Social Links Icons Boxed','redux-framework-demo'),
                'content' => __('Social Links Icons Boxed','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'social_links_box_color',
            'type' => 'color',
            'title' => __('Social Links Icons Custom Box Color','redux-framework-demo'),
            'subtitle'  => __('Social Links Icons Custom Box Color.', 'redux-framework-demo'),
            'desc' => __('Select a custom social icon box color.','redux-framework-demo'),
            'default' => '#e8e8e8',
            'hint' => array(
                'title'   => __('Social Links Icons Custom Box Color','redux-framework-demo'),
                'content' => __('Social Links Icons Custom Box Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'social_links_boxed_radius',
            'type' => 'text',
            'title' => __('Social Links Icons Boxed Radius','redux-framework-demo'),
            'subtitle'  => __('Social Links Icons Boxed Radius.', 'redux-framework-demo'),
            'desc' => __('Boxradius for the social icons. In pixels, ex: 4px.','redux-framework-demo'),
            'default' => '4px',
            'hint' => array(
                'title'   => __('Social Links Icons Boxed Radius','redux-framework-demo'),
                'content' => __('Social Links Icons Boxed Radius','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'social_links_tooltip_placement',
            'type' => 'select',
            'options' => array (
                'Top' => 'Top',
                'Right' => 'Right',
                'Bottom' => 'Bottom',
                'Left' => 'Left',
                'None' => 'None',
            ),
            'title' => __('Social Links Icons Tooltip Position','redux-framework-demo'),
            'subtitle'  => __('Social Links Icons Tooltip Position.', 'redux-framework-demo'),
            'desc' => __('Controls the tooltip position of the social icons in the sharing box.','redux-framework-demo'),
            'default' => 'Top',
            'hint' => array(
                'title'   => __('Social Links Icons Tooltip Position','redux-framework-demo'),
                'content' => __('Social Links Icons Tooltip Position','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'tabs_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Tabs Shortcode</h3>',

        ),
        array (
            'id' => 'tabs_bg_color',
            'type' => 'color',
            'title' => __('Tabs Background Color + Hover Color','redux-framework-demo'),
            'subtitle'  => __('Tabs Background Color + Hover Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the active tab, content background color and tab hover.','redux-framework-demo'),
            'default' => '#ffffff',
            'hint' => array(
                'title'   => __('Tabs Background Color + Hover Color','redux-framework-demo'),
                'content' => __('Tabs Background Color + Hover Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'tabs_inactive_color',
            'type' => 'color',
            'title' => __('Tabs Inactive Color','redux-framework-demo'),
            'subtitle'  => __('Tabs Inactive Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the inactive tabs and the outer tab border.','redux-framework-demo'),
            'default' => '#ebeaea',
            'hint' => array(
                'title'   => __('Tabs Inactive Color','redux-framework-demo'),
                'content' => __('Tabs Inactive Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'tagline_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Tagline Shortcode</h3>',

        ),
        array (
            'id' => 'tagline_bg',
            'type' => 'color',
            'title' => __('Tagline Box Background Color','redux-framework-demo'),
            'subtitle'  => __('Tagline Box Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the tagline box.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Tagline Box Background Color','redux-framework-demo'),
                'content' => __('Tagline Box Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'tagline_border_color',
            'type' => 'color',
            'title' => __('Tagline Box Border Color','redux-framework-demo'),
            'subtitle'  => __('Tagline Box Border Color.', 'redux-framework-demo'),
            'desc' => __('Controls the border color of the tagline box.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Tagline Box Border Color','redux-framework-demo'),
                'content' => __('Tagline Box Border Color','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'testimonials_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Testimonials Shortcode</h3>',

        ),
        array (
            'id' => 'testimonial_bg_color',
            'type' => 'color',
            'title' => __('Testimonial Background Color','redux-framework-demo'),
            'subtitle'  => __('Testimonial Background Color.', 'redux-framework-demo'),
            'desc' => __('Controls the background color of the testimonial.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Testimonial Background Color','redux-framework-demo'),
                'content' => __('Testimonial Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'testimonial_text_color',
            'type' => 'color',
            'title' => __('Testimonial Text Color','redux-framework-demo'),
            'subtitle'  => __('Testimonial Text Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the testimonial font.','redux-framework-demo'),
            'default' => '#747474',
            'hint' => array(
                'title'   => __('Testimonial Text Color','redux-framework-demo'),
                'content' => __('Testimonial Text Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'testimonials_speed',
            'type' => 'text',
            'title' => __('Testimonials Speed','redux-framework-demo'),
            'subtitle'  => __('Testimonials Speed.', 'redux-framework-demo'),
            'desc' => __('Select the slideshow speed, 1000 = 1 second.','redux-framework-demo'),
            'default' => '4000',
            'hint' => array(
                'title'   => __('Testimonials Speed','redux-framework-demo'),
                'content' => __('Testimonials Speed','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'title_shortcode',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Title Shortcode</h3>',

        ),
        array (
            'id' => 'title_border_color',
            'type' => 'color',
            'title' => __('Title Separator Color','redux-framework-demo'),
            'subtitle'  => __('Title Separator Color.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the title separators','redux-framework-demo'),
            'default' => '#e0dede',
            'hint' => array(
                'title'   => __('Title Separator Color','redux-framework-demo'),
                'content' => __('Title Separator Color','redux-framework-demo'),
            )
        ),
    ),
    'icon' => 'el-icon-puzzle',
);

