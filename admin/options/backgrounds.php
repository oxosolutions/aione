<?php
/*********************************************************************************************
 *
 *  Background settings
 *  Body Background
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-screen',
    'title'     => __('Background', 'redux-framework-demo'),
    'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),

    'fields'    => array(
        array (
            'id' => 'background_body_options',
            'type' => 'button_set',
            'title' =>  __('Body Background Options', 'redux-framework-demo'),
            'subtitle'  => __('Choose options for body background', 'redux-framework-demo'),
            //'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'multi'    => true,
            'options' => array (
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
                'custom' => 'Custom Image',
                'pattern1' => 'Pattern1',
                'pattern2' => 'Pattern2',
            ),
            'default'   => array('image','custom','pattern1'),
            'hint' => array(
                'title'   => 'Body background Options',
                'content' => 'Choose options for body background'
            )
        ),
        array(
            'id'        => 'background_body_color',
            'type'      => 'color',
            'title'     => 'Body Background Color',
            'transparent' => false,
            //'alpha'     => .5,
            //'selector'  => 'body',
            //'mode'      => 'background-color',
            //'output'      => '',
            //'required'      => array('background_body_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false
        ),
        array(
            'id'        => 'background_body_color_alpha',
            'type'      => 'slider',
            'title'     => __('Body Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Visibility of Background Color', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_body_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label'
        ),
        array(
            'id'        => 'background_body_gradient',
            'title'     => 'Body Background Gradient',
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_body_options','equals','gradient'),
            'alpha'     => .5,
            'selector'  => 'body',
            'mode'      => 'background-color',
            'important' => false
        ),
        array(
            'id'        => 'background_body_image',
            'title'     => 'Body Background Image',
            'type'      => 'image_select',
            //'required'      => array('background_body_options','equals','image'),
            'selector'  => 'body',
            'mode'      => 'background-image',
            'options' => getImageFiles('backgrounds'),
            'default' => 'pattern1',
            'tiles' => true,
            'presets' => false,
        ),
        array (
            'id'        => 'background_body',
            'title'     => 'Body Background Custom Image',
            'type' => 'background',
            //'required'      => array('background_body_options','equals','custom'),
            'background-color' => false,
            'background-clip' => true,
            'background-origin' => true,
            'preview_media' => false,
            'default'   => array(
                'background-repeat' => 'no-repeat',
                'background-clip' => 'border-box',
                'background-origin' => 'border-box',
                'background-size' => 'cover',
                'background-attachment' => 'scroll',
                'background-position' => 'center top',
            ),
        ),
        array(
            'id'        => 'background_body_pattern1',
            'title'     => 'Body Background Pattern 1',
            'type'      => 'image_select',
            //'required'      => array('background_body_options','equals','pattern1'),
            'selector'  => 'body',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
        array(
            'id'        => 'background_body_pattern2',
            'title'     => 'Body Background Pattern 2',
            'type'      => 'image_select',
            //'required'      => array('background_body_options','equals','pattern2'),
            'selector'  => 'body',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
    )
);
/*********************************************************************************************
 *
 *  Header Background
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-screen',
    'title'     => __('Header Background', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'background_header_options',
            'type' => 'button_set',
            'title' =>  __('Header background Options', 'redux-framework-demo'),
            'subtitle'  => __('Choose options for header background', 'redux-framework-demo'),
            //'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'multi'    => true,
            'options' => array (
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
                'custom' => 'Custom Image',
                'pattern1' => 'Pattern1',
                'pattern2' => 'Pattern2',
            ),
            'default'   => array('image','custom','pattern1'),
            'hint' => array(
                'title'   => 'Show Sliding Bar',
                'content' => 'Sliding Bar is the area hidden at the top of website which can be slides down on clicking on <strong>+(Plus)</strong> button on right corner. Choose <strong>YES</strong> to show sliding bar, Choose <strong>NO</strong> to hide it. Default value is <strong>YES</strong>.'
            )
        ),
        array(
            'id'        => 'background_header_color',
            'title'     => 'Header Background Color',
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            'selector'  => 'header',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_header_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false
        ),
        array(
            'id'        => 'background_header_color_alpha',
            'type'      => 'slider',
            'title'     => __('Header Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Visibility of Background Color', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_header_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label'
        ),
        array(
            'id'        => 'background_header_gradient',
            'title'     => 'Header Background Gradient',
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_header_options','equals','gradient'),
            'alpha'     => .5,
            'selector'  => 'header',
            'mode'      => 'background-color',
            'important' => false
        ),
        array(
            'id'        => 'background_header_image',
            'title'     => 'Header Background Image',
            'type'      => 'image_select',
            //'required'      => array('background_header_options','equals','image'),
            'selector'  => 'header',
            'mode'      => 'background-image',
            'options' => getImageFiles('backgrounds'),
            'default' => 'pattern1',
            'tiles' => true,
            'presets' => false,
        ),
        array (
            'id'        => 'background_header',
            'title'     => 'Header Background Custom Image',
            'type' => 'background',
            //'required'      => array('background_header_options','equals','custom'),
            'background-color' => false,
            'background-clip' => true,
            'background-origin' => true,
            'preview_media' => false,
            'default'   => array(
                'background-repeat' => 'no-repeat',
                'background-clip' => 'border-box',
                'background-origin' => 'border-box',
                'background-size' => 'cover',
                'background-attachment' => 'scroll',
                'background-position' => 'center top',
            ),
        ),
        array(
            'id'        => 'background_header_pattern1',
            'title'     => 'Header Background Pattern 1',
            'type'      => 'image_select',
            //'required'      => array('background_header_options','equals','pattern1'),
            'selector'  => 'header',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
        array(
            'id'        => 'background_header_pattern2',
            'title'     => 'Header Background Pattern 2',
            'type'      => 'image_select',
            //'required'      => array('background_header_options','equals','pattern2'),
            'selector'  => 'header',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
    )

);
/*********************************************************************************************
 *
 *  Topbar Background
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-screen',
    'title'     => __('Topbar Background', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'background_topbar_options',
            'type' => 'button_set',
            'title' =>  __('Topbar background Options', 'redux-framework-demo'),
            'subtitle'  => __('Choose options for topbar background', 'redux-framework-demo'),
            //'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'multi'    => true,
            'options' => array (
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
                'custom' => 'Custom Image',
                'pattern1' => 'Pattern1',
                'pattern2' => 'Pattern2',
            ),
            'default'   => array('image','custom','pattern1'),
            'hint' => array(
                'title'   => 'Show Sliding Bar',
                'content' => 'Sliding Bar is the area hidden at the top of website which can be slides down on clicking on <strong>+(Plus)</strong> button on right corner. Choose <strong>YES</strong> to show sliding bar, Choose <strong>NO</strong> to hide it. Default value is <strong>YES</strong>.'
            )
        ),
        array(
            'id'        => 'background_topbar_color',
            'title'     => 'Topbar Background Color',
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            'selector'  => 'topbar',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_topbar_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false
        ),
        array(
            'id'        => 'background_topbar_color_alpha',
            'type'      => 'slider',
            'title'     => __('Topbar Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Visibility of Background Color', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_topbar_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label'
        ),
        array(
            'id'        => 'background_topbar_gradient',
            'title'     => 'Topbar Background Gradient',
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_topbar_options','equals','gradient'),
            'alpha'     => .5,
            'selector'  => 'topbar',
            'mode'      => 'background-color',
            'important' => false
        ),
        array(
            'id'        => 'background_topbar_image',
            'title'     => 'Topbar Background Image',
            'type'      => 'image_select',
            //'required'      => array('background_topbar_options','equals','image'),
            'selector'  => 'topbar',
            'mode'      => 'background-image',
            'options' => getImageFiles('backgrounds'),
            'default' => 'pattern1',
            'tiles' => true,
            'presets' => false,
        ),
        array (
            'id'        => 'background_topbar',
            'title'     => 'Topbar Background Custom Image',
            'type' => 'background',
            //'required'      => array('background_topbar_options','equals','custom'),
            'background-color' => false,
            'background-clip' => true,
            'background-origin' => true,
            'preview_media' => false,
            'default'   => array(
                'background-repeat' => 'no-repeat',
                'background-clip' => 'border-box',
                'background-origin' => 'border-box',
                'background-size' => 'cover',
                'background-attachment' => 'scroll',
                'background-position' => 'center top',
            ),
        ),
        array(
            'id'        => 'background_topbar_pattern1',
            'title'     => 'Topbar Background Pattern 1',
            'type'      => 'image_select',
            //'required'      => array('background_topbar_options','equals','pattern1'),
            'selector'  => 'topbar',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
        array(
            'id'        => 'background_topbar_pattern2',
            'title'     => 'Topbar Background Pattern 2',
            'type'      => 'image_select',
            //'required'      => array('background_topbar_options','equals','pattern2'),
            'selector'  => 'topbar',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
    )

);
/*********************************************************************************************
 *
 *  Navigation Background
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-screen',
    'title'     => __('Main Menu Background', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'background_nav_options',
            'type' => 'button_set',
            'title' =>  __('Main Menu background Options', 'redux-framework-demo'),
            'subtitle'  => __('Choose options for nav background', 'redux-framework-demo'),
            //'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'multi'    => true,
            'options' => array (
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
                'custom' => 'Custom Image',
                'pattern1' => 'Pattern1',
                'pattern2' => 'Pattern2',
            ),
            'default'   => array('image','custom','pattern1'),
            'hint' => array(
                'title'   => 'Show Sliding Bar',
                'content' => 'Sliding Bar is the area hidden at the top of website which can be slides down on clicking on <strong>+(Plus)</strong> button on right corner. Choose <strong>YES</strong> to show sliding bar, Choose <strong>NO</strong> to hide it. Default value is <strong>YES</strong>.'
            )
        ),
        array(
            'id'        => 'background_nav_color',
            'title'     => 'Main Menu Background Color',
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            'selector'  => 'nav',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_nav_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false
        ),
        array(
            'id'        => 'background_nav_color_alpha',
            'type'      => 'slider',
            'title'     => __('Main Menu Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Visibility of Background Color', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_nav_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label'
        ),
        array(
            'id'        => 'background_nav_gradient',
            'title'     => 'Main Menu Background Gradient',
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_nav_options','equals','gradient'),
            'alpha'     => .5,
            'selector'  => 'nav',
            'mode'      => 'background-color',
            'important' => false
        ),
        array(
            'id'        => 'background_nav_image',
            'title'     => 'Main Menu Background Image',
            'type'      => 'image_select',
            //'required'      => array('background_nav_options','equals','image'),
            'selector'  => 'nav',
            'mode'      => 'background-image',
            'options' => getImageFiles('backgrounds'),
            'default' => 'pattern1',
            'tiles' => true,
            'presets' => false,
        ),
        array (
            'id'        => 'background_nav',
            'title'     => 'Main Menu Background Custom Image',
            'type' => 'background',
            //'required'      => array('background_nav_options','equals','custom'),
            'background-color' => false,
            'background-clip' => true,
            'background-origin' => true,
            'preview_media' => false,
            'default'   => array(
                'background-repeat' => 'no-repeat',
                'background-clip' => 'border-box',
                'background-origin' => 'border-box',
                'background-size' => 'cover',
                'background-attachment' => 'scroll',
                'background-position' => 'center top',
            ),
        ),
        array(
            'id'        => 'background_nav_pattern1',
            'title'     => 'Main Menu Background Pattern 1',
            'type'      => 'image_select',
            //'required'      => array('background_nav_options','equals','pattern1'),
            'selector'  => 'nav',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
        array(
            'id'        => 'background_nav_pattern2',
            'title'     => 'Main Menu Background Pattern 2',
            'type'      => 'image_select',
            //'required'      => array('background_nav_options','equals','pattern2'),
            'selector'  => 'nav',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
    )

);

/*********************************************************************************************
 *
 *  Page Title Background
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-screen',
    'title'     => __('Page Title Background', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'background_pagetitle_options',
            'type' => 'button_set',
            'title' =>  __('Page Title background Options', 'redux-framework-demo'),
            'subtitle'  => __('Choose options for pagetitle background', 'redux-framework-demo'),
            //'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'multi'    => true,
            'options' => array (
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
                'custom' => 'Custom Image',
                'pattern1' => 'Pattern1',
                'pattern2' => 'Pattern2',
            ),
            'default'   => array('image','custom','pattern1'),
            'hint' => array(
                'title'   => 'Show Sliding Bar',
                'content' => 'Sliding Bar is the area hidden at the top of website which can be slides down on clicking on <strong>+(Plus)</strong> button on right corner. Choose <strong>YES</strong> to show sliding bar, Choose <strong>NO</strong> to hide it. Default value is <strong>YES</strong>.'
            )
        ),
        array(
            'id'        => 'background_pagetitle_color',
            'title'     => 'Page Title Background Color',
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_pagetitle_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false
        ),
        array(
            'id'        => 'background_pagetitle_color_alpha',
            'type'      => 'slider',
            'title'     => __('Page Title Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Visibility of Background Color', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_pagetitle_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label'
        ),
        array(
            'id'        => 'background_pagetitle_gradient',
            'title'     => 'Page Title Background Gradient',
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_pagetitle_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false
        ),
        array(
            'id'        => 'background_pagetitle_image',
            'title'     => 'Page Title Background Image',
            'type'      => 'image_select',
            //'required'      => array('background_pagetitle_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('backgrounds'),
            'default' => 'pattern1',
            'tiles' => true,
            'presets' => false,
        ),
        array (
            'id'        => 'background_pagetitle',
            'title'     => 'Page Title Background Custom Image',
            'type' => 'background',
            //'required'      => array('background_pagetitle_options','equals','custom'),
            'background-color' => false,
            'background-clip' => true,
            'background-origin' => true,
            'preview_media' => false,
            'default'   => array(
                'background-repeat' => 'no-repeat',
                'background-clip' => 'border-box',
                'background-origin' => 'border-box',
                'background-size' => 'cover',
                'background-attachment' => 'scroll',
                'background-position' => 'center top',
            ),
        ),
        array(
            'id'        => 'background_pagetitle_pattern1',
            'title'     => 'Page Title Background Pattern 1',
            'type'      => 'image_select',
            //'required'      => array('background_pagetitle_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
        array(
            'id'        => 'background_pagetitle_pattern2',
            'title'     => 'Page Title Background Pattern 2',
            'type'      => 'image_select',
            //'required'      => array('background_pagetitle_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
    )

);


/*********************************************************************************************
 *
 *  Page Background
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-screen',
    'title'     => __('Page Background', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'background_main_options',
            'type' => 'button_set',
            'title' =>  __('Page background Options', 'redux-framework-demo'),
            'subtitle'  => __('Choose options for main background', 'redux-framework-demo'),
            //'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'multi'    => true,
            'options' => array (
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
                'custom' => 'Custom Image',
                'pattern1' => 'Pattern1',
                'pattern2' => 'Pattern2',
            ),
            'default'   => array('image','custom','pattern1'),
            'hint' => array(
                'title'   => 'Show Sliding Bar',
                'content' => 'Sliding Bar is the area hidden at the top of website which can be slides down on clicking on <strong>+(Plus)</strong> button on right corner. Choose <strong>YES</strong> to show sliding bar, Choose <strong>NO</strong> to hide it. Default value is <strong>YES</strong>.'
            )
        ),
        array(
            'id'        => 'background_main_color',
            'title'     => 'Page Background Color',
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_main_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false
        ),
        array(
            'id'        => 'background_main_color_alpha',
            'type'      => 'slider',
            'title'     => __('Page Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Visibility of Background Color', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_main_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label'
        ),
        array(
            'id'        => 'background_main_gradient',
            'title'     => 'Page Background Gradient',
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_main_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false
        ),
        array(
            'id'        => 'background_main_image',
            'title'     => 'Page Background Image',
            'type'      => 'image_select',
            //'required'      => array('background_main_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('backgrounds'),
            'default' => 'pattern1',
            'tiles' => true,
            'presets' => false,
        ),
        array (
            'id'        => 'background_main',
            'title'     => 'Page Background Custom Image',
            'type' => 'background',
            //'required'      => array('background_main_options','equals','custom'),
            'background-color' => false,
            'background-clip' => true,
            'background-origin' => true,
            'preview_media' => false,
            'default'   => array(
                'background-repeat' => 'no-repeat',
                'background-clip' => 'border-box',
                'background-origin' => 'border-box',
                'background-size' => 'cover',
                'background-attachment' => 'scroll',
                'background-position' => 'center top',
            ),
        ),
        array(
            'id'        => 'background_main_pattern1',
            'title'     => 'Page Background Pattern 1',
            'type'      => 'image_select',
            //'required'      => array('background_main_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
        array(
            'id'        => 'background_main_pattern2',
            'title'     => 'Page Background Pattern 2',
            'type'      => 'image_select',
            //'required'      => array('background_main_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
    )

);


/*********************************************************************************************
 *
 *  Content Background
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-screen',
    'title'     => __('Content Background', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'background_content_options',
            'type' => 'button_set',
            'title' =>  __('Content background Options', 'redux-framework-demo'),
            'subtitle'  => __('Choose options for content background', 'redux-framework-demo'),
            //'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'multi'    => true,
            'options' => array (
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
                'custom' => 'Custom Image',
                'pattern1' => 'Pattern1',
                'pattern2' => 'Pattern2',
            ),
            'default'   => array('image','custom','pattern1'),
            'hint' => array(
                'title'   => 'Show Sliding Bar',
                'content' => 'Sliding Bar is the area hidden at the top of website which can be slides down on clicking on <strong>+(Plus)</strong> button on right corner. Choose <strong>YES</strong> to show sliding bar, Choose <strong>NO</strong> to hide it. Default value is <strong>YES</strong>.'
            )
        ),
        array(
            'id'        => 'background_content_color',
            'title'     => 'Content Background Color',
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_content_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false
        ),
        array(
            'id'        => 'background_content_color_alpha',
            'type'      => 'slider',
            'title'     => __('Content Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Visibility of Background Color', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_content_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label'
        ),
        array(
            'id'        => 'background_content_gradient',
            'title'     => 'Content Background Gradient',
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_content_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false
        ),
        array(
            'id'        => 'background_content_image',
            'title'     => 'Content Background Image',
            'type'      => 'image_select',
            //'required'      => array('background_content_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('backgrounds'),
            'default' => 'pattern1',
            'tiles' => true,
            'presets' => false,
        ),
        array (
            'id'        => 'background_content',
            'title'     => 'Content Background Custom Image',
            'type' => 'background',
            //'required'      => array('background_content_options','equals','custom'),
            'background-color' => false,
            'background-clip' => true,
            'background-origin' => true,
            'preview_media' => false,
            'default'   => array(
                'background-repeat' => 'no-repeat',
                'background-clip' => 'border-box',
                'background-origin' => 'border-box',
                'background-size' => 'cover',
                'background-attachment' => 'scroll',
                'background-position' => 'center top',
            ),
        ),
        array(
            'id'        => 'background_content_pattern1',
            'title'     => 'Content Background Pattern 1',
            'type'      => 'image_select',
            //'required'      => array('background_content_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
        array(
            'id'        => 'background_content_pattern2',
            'title'     => 'Content Background Pattern 2',
            'type'      => 'image_select',
            //'required'      => array('background_content_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
    )

);


/*********************************************************************************************
 *
 *  Sidebar Background
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-screen',
    'title'     => __('Sidebar Background', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'background_left_sidebar_options',
            'type' => 'button_set',
            'title' =>  __('Left Sidebar background Options', 'redux-framework-demo'),
            'subtitle'  => __('Choose options for left_sidebar background', 'redux-framework-demo'),
            //'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'multi'    => true,
            'options' => array (
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
                'custom' => 'Custom Image',
                'pattern1' => 'Pattern1',
                'pattern2' => 'Pattern2',
            ),
            'default'   => array('image','custom','pattern1'),
            'hint' => array(
                'title'   => 'Show Sliding Bar',
                'left_sidebar' => 'Sliding Bar is the area hidden at the top of website which can be slides down on clicking on <strong>+(Plus)</strong> button on right corner. Choose <strong>YES</strong> to show sliding bar, Choose <strong>NO</strong> to hide it. Default value is <strong>YES</strong>.'
            )
        ),
        array(
            'id'        => 'background_left_sidebar_color',
            'title'     => 'Left Sidebar Background Color',
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_left_sidebar_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false
        ),
        array(
            'id'        => 'background_left_sidebar_color_alpha',
            'type'      => 'slider',
            'title'     => __('Left Sidebar Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Visibility of Background Color', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_left_sidebar_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label'
        ),
        array(
            'id'        => 'background_left_sidebar_gradient',
            'title'     => 'Left Sidebar Background Gradient',
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_left_sidebar_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false
        ),
        array(
            'id'        => 'background_left_sidebar_image',
            'title'     => 'Left Sidebar Background Image',
            'type'      => 'image_select',
            //'required'      => array('background_left_sidebar_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('backgrounds'),
            'default' => 'pattern1',
            'tiles' => true,
            'presets' => false,
        ),
        array (
            'id'        => 'background_left_sidebar',
            'title'     => 'Left Sidebar Background Custom Image',
            'type' => 'background',
            //'required'      => array('background_left_sidebar_options','equals','custom'),
            'background-color' => false,
            'background-clip' => true,
            'background-origin' => true,
            'preview_media' => false,
            'default'   => array(
                'background-repeat' => 'no-repeat',
                'background-clip' => 'border-box',
                'background-origin' => 'border-box',
                'background-size' => 'cover',
                'background-attachment' => 'scroll',
                'background-position' => 'center top',
            ),
        ),
        array(
            'id'        => 'background_left_sidebar_pattern1',
            'title'     => 'Left Sidebar Background Pattern 1',
            'type'      => 'image_select',
            //'required'      => array('background_left_sidebar_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
        array(
            'id'        => 'background_left_sidebar_pattern2',
            'title'     => 'Left Sidebar Background Pattern 2',
            'type'      => 'image_select',
            //'required'      => array('background_left_sidebar_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
    )

);



/*********************************************************************************************
 *
 *  Sidebar2 Background
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-screen',
    'title'     => __('Sidebar2 Background', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'background_right_sidebar_options',
            'type' => 'button_set',
            'title' =>  __('Right Sidebar background Options', 'redux-framework-demo'),
            'subtitle'  => __('Choose options for right_sidebar background', 'redux-framework-demo'),
            //'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'multi'    => true,
            'options' => array (
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
                'custom' => 'Custom Image',
                'pattern1' => 'Pattern1',
                'pattern2' => 'Pattern2',
            ),
            'default'   => array('image','custom','pattern1'),
            'hint' => array(
                'title'   => 'Show Sliding Bar',
                'right_sidebar' => 'Sliding Bar is the area hidden at the top of website which can be slides down on clicking on <strong>+(Plus)</strong> button on right corner. Choose <strong>YES</strong> to show sliding bar, Choose <strong>NO</strong> to hide it. Default value is <strong>YES</strong>.'
            )
        ),
        array(
            'id'        => 'background_right_sidebar_color',
            'title'     => 'Right Sidebar Background Color',
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_right_sidebar_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false
        ),
        array(
            'id'        => 'background_right_sidebar_color_alpha',
            'type'      => 'slider',
            'title'     => __('Right Sidebar Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Visibility of Background Color', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_right_sidebar_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label'
        ),
        array(
            'id'        => 'background_right_sidebar_gradient',
            'title'     => 'Right Sidebar Background Gradient',
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_right_sidebar_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false
        ),
        array(
            'id'        => 'background_right_sidebar_image',
            'title'     => 'Right Sidebar Background Image',
            'type'      => 'image_select',
            //'required'      => array('background_right_sidebar_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('backgrounds'),
            'default' => 'pattern1',
            'tiles' => true,
            'presets' => false,
        ),
        array (
            'id'        => 'background_right_sidebar',
            'title'     => 'Right Sidebar Background Custom Image',
            'type' => 'background',
            //'required'      => array('background_right_sidebar_options','equals','custom'),
            'background-color' => false,
            'background-clip' => true,
            'background-origin' => true,
            'preview_media' => false,
            'default'   => array(
                'background-repeat' => 'no-repeat',
                'background-clip' => 'border-box',
                'background-origin' => 'border-box',
                'background-size' => 'cover',
                'background-attachment' => 'scroll',
                'background-position' => 'center top',
            ),
        ),
        array(
            'id'        => 'background_right_sidebar_pattern1',
            'title'     => 'Right Sidebar Background Pattern 1',
            'type'      => 'image_select',
            //'required'      => array('background_right_sidebar_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
        array(
            'id'        => 'background_right_sidebar_pattern2',
            'title'     => 'Right Sidebar Background Pattern 2',
            'type'      => 'image_select',
            //'required'      => array('background_right_sidebar_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
    )

);



/*********************************************************************************************
 *
 *  Footer Background
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-screen',
    'title'     => __('Footer Background', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'background_footer_options',
            'type' => 'button_set',
            'title' =>  __('Footer background Options', 'redux-framework-demo'),
            'subtitle'  => __('Choose options for footer background', 'redux-framework-demo'),
            //'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'multi'    => true,
            'options' => array (
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
                'custom' => 'Custom Image',
                'pattern1' => 'Pattern1',
                'pattern2' => 'Pattern2',
            ),
            'default'   => array('image','custom','pattern1'),
            'hint' => array(
                'title'   => 'Show Sliding Bar',
                'footer' => 'Sliding Bar is the area hidden at the top of website which can be slides down on clicking on <strong>+(Plus)</strong> button on right corner. Choose <strong>YES</strong> to show sliding bar, Choose <strong>NO</strong> to hide it. Default value is <strong>YES</strong>.'
            )
        ),
        array(
            'id'        => 'background_footer_color',
            'title'     => 'Footer Background Color',
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_footer_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false
        ),
        array(
            'id'        => 'background_footer_color_alpha',
            'type'      => 'slider',
            'title'     => __('Footer Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Visibility of Background Color', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_footer_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label'
        ),
        array(
            'id'        => 'background_footer_gradient',
            'title'     => 'Footer Background Gradient',
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_footer_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false
        ),
        array(
            'id'        => 'background_footer_image',
            'title'     => 'Footer Background Image',
            'type'      => 'image_select',
            //'required'      => array('background_footer_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('backgrounds'),
            'default' => 'pattern1',
            'tiles' => true,
            'presets' => false,
        ),
        array (
            'id'        => 'background_footer',
            'title'     => 'Footer Background Custom Image',
            'type' => 'background',
            //'required'      => array('background_footer_options','equals','custom'),
            'background-color' => false,
            'background-clip' => true,
            'background-origin' => true,
            'preview_media' => false,
            'default'   => array(
                'background-repeat' => 'no-repeat',
                'background-clip' => 'border-box',
                'background-origin' => 'border-box',
                'background-size' => 'cover',
                'background-attachment' => 'scroll',
                'background-position' => 'center top',
            ),
        ),
        array(
            'id'        => 'background_footer_pattern1',
            'title'     => 'Footer Background Pattern 1',
            'type'      => 'image_select',
            //'required'      => array('background_footer_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
        array(
            'id'        => 'background_footer_pattern2',
            'title'     => 'Footer Background Pattern 2',
            'type'      => 'image_select',
            //'required'      => array('background_footer_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
    )

);


/*********************************************************************************************
 *
 *  Copyright Background
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-screen',
    'title'     => __('Copyright Area Background', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'background_copyright_options',
            'type' => 'button_set',
            'title' =>  __('Copyright Area background Options', 'redux-framework-demo'),
            'subtitle'  => __('Choose options for copyright background', 'redux-framework-demo'),
            //'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'multi'    => true,
            'options' => array (
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
                'custom' => 'Custom Image',
                'pattern1' => 'Pattern1',
                'pattern2' => 'Pattern2',
            ),
            'default'   => array('image','custom','pattern1'),
            'hint' => array(
                'title'   => 'Show Sliding Bar',
                'copyright' => 'Sliding Bar is the area hidden at the top of website which can be slides down on clicking on <strong>+(Plus)</strong> button on right corner. Choose <strong>YES</strong> to show sliding bar, Choose <strong>NO</strong> to hide it. Default value is <strong>YES</strong>.'
            )
        ),
        array(
            'id'        => 'background_copyright_color',
            'title'     => 'Copyright Area Background Color',
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_copyright_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false
        ),
        array(
            'id'        => 'background_copyright_color_alpha',
            'type'      => 'slider',
            'title'     => __('Copyright Area Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Visibility of Background Color', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_copyright_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label'
        ),
        array(
            'id'        => 'background_copyright_gradient',
            'title'     => 'Copyright Area Background Gradient',
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_copyright_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false
        ),
        array(
            'id'        => 'background_copyright_image',
            'title'     => 'Copyright Area Background Image',
            'type'      => 'image_select',
            //'required'      => array('background_copyright_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('backgrounds'),
            'default' => 'pattern1',
            'tiles' => true,
            'presets' => false,
        ),
        array (
            'id'        => 'background_copyright',
            'title'     => 'Copyright Area Background Custom Image',
            'type' => 'background',
            //'required'      => array('background_copyright_options','equals','custom'),
            'background-color' => false,
            'background-clip' => true,
            'background-origin' => true,
            'preview_media' => false,
            'default'   => array(
                'background-repeat' => 'no-repeat',
                'background-clip' => 'border-box',
                'background-origin' => 'border-box',
                'background-size' => 'cover',
                'background-attachment' => 'scroll',
                'background-position' => 'center top',
            ),
        ),
        array(
            'id'        => 'background_copyright_pattern1',
            'title'     => 'Copyright Area Background Pattern 1',
            'type'      => 'image_select',
            //'required'      => array('background_copyright_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
        array(
            'id'        => 'background_copyright_pattern2',
            'title'     => 'Copyright Area Background Pattern 2',
            'type'      => 'image_select',
            //'required'      => array('background_copyright_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'options' => getImageFiles('patterns'),
            'default' => '',
            'tiles' => true,
            'presets' => false,
        ),
    )

);

?>