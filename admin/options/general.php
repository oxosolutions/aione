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
            'desc' => 'Check this box to use the responsive design features. If left unchecked then the fixed layout is used.',
            'id' => 'responsive',
            'type' => 'checkbox',
            'title' => 'Responsive Design',
            'default' => 1,
        ),
        array (
            'desc' => 'Check this box to use the fixed layout for the iPad in portrait view.',
            'id' => 'ipad_potrait',
            'type' => 'checkbox',
            'title' => 'Use Fixed Layout for iPad Portrait',
            'default' => 1,
        ),
        array (
            'id' => 'code',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Tracking / Space Before Head / Space Before Body Code</h3>',
        ),
        array (
            'desc' => 'Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme. Please put code inside script tags.',
            'id' => 'google_analytics',
            'type' => 'textarea',
            'title' => 'Tracking Code',
        ),
        array (
            'desc' => 'Add code before the </head> tag.',
            'id' => 'space_head',
            'type' => 'textarea',
            'title' => 'Space before </head>',
        ),
        array (
            'desc' => 'Add code before the </body> tag.',
            'id' => 'space_body',
            'type' => 'textarea',
            'title' => 'Space before </body>',
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
            'validate'  => 'css',
            'theme'     => 'monokai',
            //'desc'      => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
            'default'   => "#header{\n\tmargin: 0 auto;\n}"
        ),
        array(
            'id'        => 'custom_js',
            'type'      => 'ace_editor',
            'title'     => __('Custom JS Code', 'redux-framework-demo'),
            'subtitle'  => __('Write your Custom Javascript code here.', 'redux-framework-demo'),
            'mode'      => 'js',
            'validate'  => 'js',
            'theme'     => 'monokai',
            //'desc'      => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
            'default'   => "#header{\nmargin: 0 auto;\n}"
        )

    )
);

?>