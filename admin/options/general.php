<?php

/*********************************************************************************************
 *
 *  General settings
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-file',
    'title'     => __('General settings', 'redux-framework-demo'),
    'fields'    => array(
        array (
            'id' => 'responsive',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Responsive Options</h3>',
        ),
        array (
            'id' => 'responsive',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' =>__('Responsive Design','redux-framework-demo'),
            'subtitle'  => __('Responsive Design.', 'redux-framework-demo'),
            'desc' =>__('YES to use the responsive design features. If left unchecked then the fixed layout is used.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Responsive Design','redux-framework-demo'),
                'content' => __('Responsive Design','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'ipad_potrait',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' =>__('Use Fixed Layout for iPad Portrait','redux-framework-demo'),
            'subtitle'  => __('Use Fixed Layout for iPad Portrait.', 'redux-framework-demo'),
            'desc' =>__('YES to use the fixed layout for the iPad in portrait view.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Use Fixed Layout for iPad Portrait','redux-framework-demo'),
                'content' => __('Use Fixed Layout for iPad Portrait','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'code',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Tracking / Space Before Head / Space Before Body Code</h3>',
        ),
        array (
            'id' => 'google_analytics',
            'type' => 'textarea',
            'title' =>__('Tracking Code','redux-framework-demo'),
            'subtitle'  => __('Tracking Code.', 'redux-framework-demo'),
            'desc' =>__('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme. Please put code inside script tags.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Tracking Code','redux-framework-demo'),
                'content' => __('Tracking Code','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'space_head',
            'type' => 'textarea',
            'title' =>__('Space before </head>','redux-framework-demo'),
            'subtitle'  => __('Space before </head>.', 'redux-framework-demo'),
            'desc' =>__('Add code before the </head> tag.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Space before </head>','redux-framework-demo'),
                'content' => __('Space before </head>','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'space_body',
            'type' => 'textarea',
            'title' =>__('Space before </body>','redux-framework-demo'),
            'subtitle'  => __('Space before </body>.', 'redux-framework-demo'),
            'desc' =>__('Add code before the </body> tag.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Space before </body>','redux-framework-demo'),
                'content' => __('Space before </body>','redux-framework-demo'),
            )
        ),
    ),
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-skype',
    'title'     => __('Custom Code', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array(
            'id'        => 'custom_css',
            'type'      => 'ace_editor',
            'title'     => __('Custom CSS Code', 'redux-framework-demo'),
            'subtitle'  => __('Write your Custom CSS code here.', 'redux-framework-demo'),
            'mode'      => 'css',
            //'validate'  => 'css',
            'theme'     => 'monokai',
            'desc'      => __('Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.','redux-framework-demo'),
            'default'   => "",
            'hint' => array(
            'title'   => __('Custom CSS Code','redux-framework-demo'),
             'content' => __('Custom CSS Code','redux-framework-demo'),
        )
        ),
        array(
            'id'        => 'custom_js',
            'type'      => 'ace_editor',
            'title'     => __('Custom JS Code', 'redux-framework-demo'),
            'subtitle'  => __('Write your Custom Javascript code here.', 'redux-framework-demo'),
            'mode'      => 'js',
            'validate'  => 'js',
            'theme'     => 'monokai',
            'desc'      => __('Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.','redux-framework-demo'),
            'default'   => "",
            'hint' => array(
            'title'   => __('Custom JS Code','redux-framework-demo'),
            'content' => __('Custom JS Code','redux-framework-demo'),
            )
        )

    )
);

/*********************************************************************************************
 *
 *  Layout settings
 *
 *********************************************************************************************/

$this->sections[] = array(
    'title' =>__('Layout Options','redux-framework-demo'),
    'icon'      => 'el-icon-tint',
    'subsection' => true,
    'fields' => array (
        array (
            'id' => 'layout',
            'type' => 'select',
            'options' => array (
                'Boxed' => 'Boxed',
                'Wide' => 'Wide',
            ),
            'title' =>__('Layout','redux-framework-demo'),
            'subtitle'  => __('Layout.', 'redux-framework-demo'),
            'desc' =>__('Select boxed or wide layout.','redux-framework-demo'),
            'default' => 'Wide',
            'hint' => array(
                'title'   => __('Layout','redux-framework-demo'),
                'content' => __('Layout','redux-framework-demo'),
            )
        ),
        array(
            'id'            => 'site_width',
            'type'          => 'text',
            'title'         => __( 'Site Width', 'redux-framework-demo' ),
            'subtitle'      => __( 'Padding of Main Navigation', 'redux-framework-demo' ),
            'desc'          => __( 'Controls the overall site width. In px or %, ex: 100% or 1170px. Default value is <strong>940px</strong>.', 'redux-framework-demo' ),
            'default'       => '940px',
            'hint' => array(
                'title'   => __( 'Site Width', 'redux-framework-demo' ),
                'content' => __( 'Controls the overall site width. In px or %, ex: 100% or 1170px. Default value is <strong>940px</strong>.', 'redux-framework-demo' ),
            ),
        ),
        array (
            'id' => 'page_layout',
            'type' => 'switch',
            'title' =>  __('Page Layout', 'redux-framework-demo'),
            'subtitle'  => __('Choose page layout.', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>One Sidebar</strong>.', 'redux-framework-demo'),
            'on' => __('One Sidebar', 'redux-framework-demo'),
            'off' => __('Two Sidebars', 'redux-framework-demo'),
            'default'   => true,
            'hint' => array(
                'title'   => __('Page Layout','redux-framework-demo'),
                'content' => __('Page Layout','redux-framework-demo'),
            )
        ),
        array(
            'id' => 'content_width',
            'type' => 'text',
            'title' =>  __('Content Width', 'redux-framework-demo'),
            'subtitle'  => __('width of content', 'redux-framework-demo'),
            'desc' => __('Controls the width of the content area. In px or %, ex: 100% or 1170px.', 'redux-framework-demo'),
            'required'      => array('page_layout','equals',true),
            'default'   => '77%',
            'hint' => array(
                'title'   => __('Content Width','redux-framework-demo'),
                'content' => __('Content Width','redux-framework-demo'),
            )

        ),
        array(
            'id' => 'sidebar_width',
            'type' => 'text',
            'title' =>  __('Sidebar Width', 'redux-framework-demo'),
            'subtitle'  => __('width of sidebar', 'redux-framework-demo'),
            'desc' => __('Controls the width of the sidebar. In px or %, ex: 100% or 1170px.', 'redux-framework-demo'),
            'required'      => array('page_layout','equals',true),
            'default'   => '23%',
            'hint' => array(
                'title'   => __('Sidebar Width','redux-framework-demo'),
                'content' => __('Sidebar Width','redux-framework-demo'),
            )

        ),
        array(
            'id' => 'content_width_2',
            'type' => 'text',
            'title' =>  __('Content Width', 'redux-framework-demo'),
            'subtitle'  => __('width of content', 'redux-framework-demo'),
            'desc' => __('Controls the width of the content area. In px or %, ex: 100% or 1170px.', 'redux-framework-demo'),
            'required'      => array('page_layout','equals',false),
            'default'   => '58%',
            'hint' => array(
                'title'   => __('Content Width','redux-framework-demo'),
                'content' => __('Content Width','redux-framework-demo'),
            )

        ),
        array(
            'id' => 'sidebar_2_1_width',
            'type' => 'text',
            'title' =>  __('Sidebar 1 Width', 'redux-framework-demo'),
            'subtitle'  => __('width of sidebar 1', 'redux-framework-demo'),
            'desc' => __('Controls the width of the sidebar. In px or %, ex: 100% or 1170px.', 'redux-framework-demo'),
            'required'      => array('page_layout','equals',false),
            'default'   => '21%',
            'hint' => array(
                'title'   => __('Sidebar 1 Width','redux-framework-demo'),
                'content' => __('Sidebar 1 Width','redux-framework-demo'),
            )

        ),
        array(
            'id' => 'sidebar_2_2_width',
            'type' => 'text',
            'title' =>  __('Sidebar 2 Width', 'redux-framework-demo'),
            'subtitle'  => __('width of sidebar 2', 'redux-framework-demo'),
            'desc' => __('Controls the width of the sidebar 2. In px or %, ex: 100% or 1170px.', 'redux-framework-demo'),
            'required'      => array('page_layout','equals',false),
            'default'   => '21%',
            'hint' => array(
                'title'   => __('Sidebar 2 Width','redux-framework-demo'),
                'content' => __('Sidebar 2 Width','redux-framework-demo'),
            )

        ),

        array (
            'id' => 'sidebar_padding',
            'type' => 'text',
            'title' =>__('Sidebar Padding','redux-framework-demo'),
            'subtitle'  => __('Sidebar Padding.', 'redux-framework-demo'),
            'desc' =>__('Enter a value (based on percentage) without % sign, ex: 0.','redux-framework-demo'),
            'default'   => '20px',
            'hint' => array(
                'title'   => __('Sidebar Padding','redux-framework-demo'),
                'content' => __('Sidebar Padding','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'main_top_padding',
            'type' => 'text',
            'title' =>__('Page Content Top Padding','redux-framework-demo'),
            'subtitle'  => __('Page Content Top Padding.', 'redux-framework-demo'),
            'desc' =>__('(in pixels ex: 20px)','redux-framework-demo'),
            'default' => '55px',
            'hint' => array(
                'title'   => __('Page Content Top Padding','redux-framework-demo'),
                'content' => __('Page Content Top Padding','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'main_bottom_padding',
            'type' => 'text',
            'title' =>__('Page Content Bottom Padding','redux-framework-demo'),
            'subtitle'  => __('Page Content Bottom Padding.', 'redux-framework-demo'),
            'desc' =>__('(in pixels ex: 20px)','redux-framework-demo'),
            'default' => '40px',
            'hint' => array(
                'title'   => __('Page Content Bottom Padding','redux-framework-demo'),
                'content' => __('Page Content Bottom Padding','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'hundredp_padding',
            'type' => 'text',
            'title' =>__('100% Width Template Left/Right Padding','redux-framework-demo'),
            'subtitle'  => __('100% Width Template Left/Right Padding.', 'redux-framework-demo'),
            'desc' =>__('Select the left and right padding for the 100% width template main content area. Enter value in px. ex: 20px','redux-framework-demo'),
            'default' => '20px',
            'hint' => array(
                'title'   => __('100% Width Template Left/Right Padding','redux-framework-demo'),
                'content' => __('100% Width Template Left/Right Padding','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'slidingbar_text_shadow',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' =>__('Disable Sliding Bar Text Shadow','redux-framework-demo'),
            'subtitle'  => __('Disable Sliding Bar Text Shadow.', 'redux-framework-demo'),
            'desc' =>__('YES to disable the text shadow in the Sliding Bar.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Sliding Bar Text Shadow','redux-framework-demo'),
                'content' => __('Disable Sliding Bar Text Shadow','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'footer_text_shadow',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' =>__('Disable Footer Text Shadow','redux-framework-demo'),
            'subtitle'  => __('.', 'redux-framework-demo'),
            'desc' =>__('YES to disable the text shadow in the footer.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Footer Text Shadow','redux-framework-demo'),
                'content' => __('Disable Footer Text Shadow','redux-framework-demo'),
            )
        ),
    )
);

?>