<?php
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


?>