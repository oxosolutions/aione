<?php

/*********************************************************************************************
 *
 *  Footer settings
 *
 *********************************************************************************************/

$this->sections[] = array(
    'icon'      => 'el-icon-fork',
    'title'     => __('Footer', 'redux-framework-demo'),
    'fields'    => array(
        array (
            'id' => 'footer_widgets',
            'type' => 'switch',
            'title' => __('Footer Widgets','redux-framework-demo'),
            'subtitle'  => __('Footer Widgets.', 'redux-framework-demo'),
            'desc' => __('YES to display footer widgets.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'hint' => array(
                'title'   => __('Footer Widgets','redux-framework-demo'),
                'content' => __('Footer Widgets.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_widgets_columns',
            'options' => array (
                1 => '1',
                2 => '2',
                3 => '3',
                4 => '4',
            ),
            'type' => 'select',
            'title' => __('Number of Footer Columns','redux-framework-demo'),
            'subtitle'  => __('Number of Footer Columns.', 'redux-framework-demo'),
            'desc' => __('Select the number of columns to display in the footer.','redux-framework-demo'),
            'default' => '4',
            'hint' => array(
                'title'   => __('Number of Footer Columns','redux-framework-demo'),
                'content' => __('Number of Footer Columns.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_area_top_padding',
            'type' => 'text',
            'title' => __('Footer Top Padding','redux-framework-demo'),
            'subtitle'  => __('Footer Top Padding.', 'redux-framework-demo'),
            'desc' => __('In pixels, ex: 20px','redux-framework-demo'),
            'default' => '43px',
            'hint' => array(
                'title'   => __('Footer Top Padding','redux-framework-demo'),
                'content' => __('Footer Top Padding.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_area_bottom_padding',
            'type' => 'text',
            'title' => __('Footer Bottom Padding','redux-framework-demo'),
            'subtitle'  => __('Footer Bottom Padding.', 'redux-framework-demo'),
            'desc' => __('In pixels, ex: 20px','redux-framework-demo'),
            'default' => '40px',
            'hint' => array(
                'title'   => __('Footer Bottom Padding','redux-framework-demo'),
                'content' => __('Footer Bottom Padding.','redux-framework-demo'),
            )
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
            'id' => 'icons_footer',
            'type' => 'switch',
            'title' => __('Display Social Icons on Footer of the Page','redux-framework-demo'),
            'subtitle'  => __('Display Social Icons on Footer of the Page.', 'redux-framework-demo'),
            'desc' => __('YES to show social media icons on the footer of the page.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'hint' => array(
                'title'   => __('Display Social Icons on Footer of the Page','redux-framework-demo'),
                'content' => __('Display Social Icons on Footer of the Page.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_social_links_icon_color',
            'type' => 'color',
            'title' => __('Footer Social Icons Custom Color','redux-framework-demo'),
            'subtitle'  => __('Footer Social Icons Custom Color.', 'redux-framework-demo'),
            'desc' => __('Select a custom social icon color.','redux-framework-demo'),
            'default' => '#46494a',
            'hint' => array(
                'title'   => __('Footer Social Icons Custom Color','redux-framework-demo'),
                'content' => __('Footer Social Icons Custom Color.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_social_links_boxed',
            'type' => 'select',
            'options' => array (
                'No' => 'No',
                'Yes' => 'Yes',
            ),
            'title' => __('Footer Social Icons Boxed','redux-framework-demo'),
            'subtitle'  => __('Footer Social Icons Boxed.', 'redux-framework-demo'),
            'desc' => __('Controls the color of the social icons in the footer.','redux-framework-demo'),
            'default' => 'No',
            'hint' => array(
                'title'   => __('Footer Social Icons Boxed','redux-framework-demo'),
                'content' => __('Footer Social Icons Boxed.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_social_links_box_color',
            'type' => 'color',
            'title' => __('Footer Social Icons Custom Box Color','redux-framework-demo'),
            'subtitle'  => __('Footer Social Icons Custom Box Color.', 'redux-framework-demo'),
            'desc' => __('Select a custom social icon box color.','redux-framework-demo'),
            'default' => '#222222',
            'hint' => array(
                'title'   => __('Footer Social Icons Custom Box Color','redux-framework-demo'),
                'content' => __('Footer Social Icons Custom Box Color.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_social_links_boxed_radius',
            'type' => 'text',
            'title' => __('Footer Social Icons Boxed Radius','redux-framework-demo'),
            'subtitle'  => __('Footer Social Icons Boxed Radius.', 'redux-framework-demo'),
            'desc' => __('Boxradius for the social icons. In pixels, ex: 4px.','redux-framework-demo'),
            'default' => '4px',
            'hint' => array(
                'title'   => __('Footer Social Icons Boxed Radius','redux-framework-demo'),
                'content' => __('Footer Social Icons Boxed Radius.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_social_links_tooltip_placement',
            'type' => 'select',
            'options' => array (
                'Top' => 'Top',
                'Right' => 'Right',
                'Bottom' => 'Bottom',
                'Left' => 'Left',
                'None' => 'None',
            ),
            'title' => __('Footer Social Icons Tooltip Position','redux-framework-demo'),
            'subtitle'  => __('Footer Social Icons Tooltip Position.', 'redux-framework-demo'),
            'desc' => __('Controls the tooltip position of the social icons in the footer.','redux-framework-demo'),
            'default' => 'Top',
            'hint' => array(
                'title'   => __('Footer Social Icons Tooltip Position','redux-framework-demo'),
                'content' => __('Footer Social Icons Tooltip Position.','redux-framework-demo'),
            )
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
            'id' => 'footer_copyright',
            'type' => 'switch',
            'title' => __('Copyright Bar','redux-framework-demo'),
            'subtitle'  => __('Copyright Bar.', 'redux-framework-demo'),
            'desc' => __('YES to display the copyright bar.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => true,
            'hint' => array(
                'title'   => __('Copyright Bar','redux-framework-demo'),
                'content' => __('Copyright Bar.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_text',
            'type' => 'textarea',
            'title' => __('Copyright Text','redux-framework-demo'),
            'subtitle'  => __('Copyright Text.', 'redux-framework-demo'),
            'desc' => __('Enter the text that displays in the copyright bar. HTML markup can be used.','redux-framework-demo'),
            'default' => 'Copyright 2012 aione | All Rights Reserved | Powered by <a href="http://wordpress.org">WordPress</a>	|	<a href="http://oxosolutions.com">Theme Aione</a>',
            'hint' => array(
                'title'   => __('Copyright Text','redux-framework-demo'),
                'content' => __('Copyright Text.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'copyright_top_padding',
            'type' => 'text',
            'title' => __('Copyright Top Padding','redux-framework-demo'),
            'subtitle'  => __('Copyright Top Padding.', 'redux-framework-demo'),
            'desc' => __('In pixels, ex: 18px','redux-framework-demo'),
            'default' => '18px',
            'hint' => array(
                'title'   => __('Copyright Top Padding','redux-framework-demo'),
                'content' => __('Copyright Top Padding.','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'copyright_bottom_padding',
            'type' => 'text',
            'title' => __('Copyright Bottom Padding','redux-framework-demo'),
            'subtitle'  => __('Copyright Bottom Padding.', 'redux-framework-demo'),
            'desc' => __('In pixels, ex: 18px','redux-framework-demo'),
            'default' => '16px',
        'hint' => array(
            'title'   => __('Copyright Bottom Padding','redux-framework-demo'),
            'content' => __('Copyright Bottom Padding.','redux-framework-demo'),
        )
        )
    )
);


?>