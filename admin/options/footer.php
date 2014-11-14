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


?>