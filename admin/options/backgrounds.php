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
    'desc'      => __('<p class="description"></p><style>.pattern_chooser + span.tiles { margin-bottom:10px;} .background_image_chooser + span.tiles { background-size: cover; margin-bottom:10px; width:60px !important;height:45px;}</style>', 'redux-framework-demo'),

    'fields'    => array(
        array (
            'id' => 'background_body_options',
            'type' => 'button_set',
            'title' =>  __('Body Background Options', 'redux-framework-demo'),
            'subtitle'  => __('Choose options for body background', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
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
                'title'   => __('Body Background Options','redux-framework-demo'),
                'content' => __('Body Background Options','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_body_color',
            'type'      => 'color',
            'title'     => __('Body Background Color','redux-framework-demo'),
            'subtitle'  => __('Body Background Color', 'redux-framework-demo'),
            'desc' => __('Body Background Color.', 'redux-framework-demo'),
            'transparent' => false,
            //'alpha'     => .5,
            //'selector'  => 'body',
            //'mode'      => 'background-color',
            //'output'      => '',
            //'required'      => array('background_body_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false,
            'hint' => array(
            'title'   => __('Body Background Color','redux-framework-demo'),
             'content' => __('Body Background Color','redux-framework-demo'),
)
        ),
        array(
            'id'        => 'background_body_color_alpha',
            'type'      => 'slider',
            'title'     => __('Body Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Body Background Color Alpha', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_body_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
            'hint' => array(
            'title'   => __('Body Background Color Alpha','redux-framework-demo'),
            'content' => __('Body Background Color Alpha','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_body_gradient',
            'title'     => __('Body Background Gradient','redux-framework-demo'),
            'subtitle'  => __('Body Background Gradient', 'redux-framework-demo'),
            'desc' => __('Body Background Gradient.', 'redux-framework-demo'),
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_body_options','equals','gradient'),
            'alpha'     => .5,
            'selector'  => 'body',
            'mode'      => 'background-color',
            'important' => false,
            'hint' => array(
    'title'   => __('Body Background Gradient','redux-framework-demo'),
    'content' => __('Body Background Gradient','redux-framework-demo'),
)
        ),
        array(
            'id'        => 'background_body_image',
            'title'     => __('Body Background Image','redux-framework-demo'),
            'subtitle'  => __('Body Background Image', 'redux-framework-demo'),
            'desc' => __('Body Background Image.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_body_options','equals','image'),
            'selector'  => 'body',
            'mode'      => 'background-image',
            'class'     => 'background_image_chooser',
            'options' => getImageFiles('backgrounds', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Body Background Image','redux-framework-demo'),
                'content' => __('Body Background Image','redux-framework-demo'),
            )
        ),
        array (
            'id'        => 'background_body',
            'title'     =>__( 'Body Background Custom Image','redux-framework-demo'),
            'subtitle'  => __('Body Background Custom Image', 'redux-framework-demo'),
            'desc' => __('Body Background Custom Image.', 'redux-framework-demo'),
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
            'hint' => array(
                'title'   => __('Body Background Custom Image','redux-framework-demo'),
                'content' => __('Body Background Custom Image','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_body_pattern1',
            'title'     =>__( 'Body Background Pattern 1','redux-framework-demo'),
            'subtitle'  => __('Body Background Pattern 1', 'redux-framework-demo'),
            'desc' => __('Body Background Pattern 1.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_body_options','equals','pattern1'),
            'selector'  => 'body',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns1', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Body Background Pattern 1','redux-framework-demo'),
                'content' => __('Body Background Pattern 1','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_body_pattern2',
            'title'     =>__( 'Body Background Pattern 2','redux-framework-demo'),
            'subtitle'  => __('Body Background Pattern 2', 'redux-framework-demo'),
            'desc' => __('Body Background Pattern 2.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_body_options','equals','pattern2'),
            'selector'  => 'body',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser', 'options' => getImageFiles('patterns2', true),
            'default' => '', 
             
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Body Background Pattern 2','redux-framework-demo'),
                'content' => __('Body Background Pattern 2','redux-framework-demo'),
            )
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
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
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
                'title'   => __('Header background Options','redux-framework-demo'),
                'content' => __('Header background Options','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_header_color',
            'title'     =>__( 'Header Background Color','redux-framework-demo'),
            'subtitle'  => __('Header Background Color', 'redux-framework-demo'),
            'desc' => __('Header Background Color.', 'redux-framework-demo'),
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            'selector'  => 'header',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_header_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false,
            'hint' => array(
    'title'   => __('Header Background Color','redux-framework-demo'),
    'content' => __('Header Background Color','redux-framework-demo'),
)
        ),
        array(
            'id'        => 'background_header_color_alpha',
            'type'      => 'slider',
            'title'     => __('Header Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Header Background Color Alpha', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_header_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
            'hint' => array(
    'title'   => __('Header Background Color Alpha','redux-framework-demo'),
    'content' => __('Header Background Color Alpha','redux-framework-demo'),
)
        ),
        array(
            'id'        => 'background_header_gradient',
            'title'     =>__( 'Header Background Gradient','redux-framework-demo'),
            'subtitle'  => __('Header Background Gradient', 'redux-framework-demo'),
            'desc' => __('Header Background Gradient.', 'redux-framework-demo'),
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_header_options','equals','gradient'),
            'alpha'     => .5,
            'selector'  => 'header',
            'mode'      => 'background-color',
            'important' => false,
            'hint' => array(
                'title'   => __('Header Background Gradient','redux-framework-demo'),
                'content' => __('Header Background Gradient','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_header_image',
            'title'     =>__( 'Header Background Image','redux-framework-demo'),
            'subtitle'  => __('Header Background Image', 'redux-framework-demo'),
            'desc' => __('Header Background Image.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_header_options','equals','image'),
            'selector'  => 'header',
            'mode'      => 'background-image',
            'class'     => 'background_image_chooser',
            'options' => getImageFiles('backgrounds', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Header Background Image','redux-framework-demo'),
                'content' => __('Header Background Image','redux-framework-demo'),
            )
        ),
        array (
            'id'        => 'background_header',
            'title'     =>__( 'Header Background Custom Image','redux-framework-demo'),
            'subtitle'  => __('Header Background Custom Image', 'redux-framework-demo'),
            'desc' => __('Header Background Custom Image.', 'redux-framework-demo'),
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
            'hint' => array(
                'title'   => __('Header  Background Custom Image','redux-framework-demo'),
                'content' => __('Header  Background Custom Image','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_header_pattern1',
            'title'     =>__( 'Header Background Pattern 1','redux-framework-demo'),
            'subtitle'  => __('Header Background Pattern 1', 'redux-framework-demo'),
            'desc' => __('Header Background Pattern 1.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_header_options','equals','pattern1'),
            'selector'  => 'header',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns1', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Header Background Pattern 1','redux-framework-demo'),
                'content' => __('Header Background Pattern 1','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_header_pattern2',
            'title'     =>__( 'Header Background Pattern 2','redux-framework-demo'),
            'subtitle'  => __('Header Background Pattern 2', 'redux-framework-demo'),
            'desc' => __('Header Background Pattern 2.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_header_options','equals','pattern2'),
            'selector'  => 'header',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns2', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Header Background Pattern 2','redux-framework-demo'),
                'content' => __('Header Background Pattern 2','redux-framework-demo'),
            )
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
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'multi'    => true,
            'options' => array (
                'color' => 'Color',
                'gradient' => 'Gradient',
                'image' => 'Image',
                'custom' => 'Custom Image',
                'pattern1' => 'Pattern1',
                'pattern2' => 'Pattern2',
            ),
            'default'   => array('color','gradient','pattern1'),
            'hint' => array(
                'title'   => __('Topbar background Options','redux-framework-demo'),
                'content' => __('Topbar background Options','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_topbar_color',
            'title'     =>__( 'Topbar Background Color','redux-framework-demo'),
            'subtitle'  => __('Topbar Background Color', 'redux-framework-demo'),
            'desc' => __('Topbar Background Color.', 'redux-framework-demo'),
            'type'      => 'color',
            'transparent' => false,
            //'alpha'     => .5,
            'selector'  => 'topbar',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_topbar_options','equals','color'),
            'default'      => '#168dc5',
            'important' => false,
            'hint' => array(
                'title'   => __('Topbar Background Color','redux-framework-demo'),
                'content' => __('Topbar Background Color','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_topbar_color_alpha',
            'type'      => 'slider',
            'title'     => __('Topbar Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Topbar Background Color Alpha', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_topbar_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
            'hint' => array(
                'title'   => __('Topbar Background Color Alpha','redux-framework-demo'),
                'content' => __('Topbar Background Color Alpha','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_topbar_gradient',
            'title'     =>__( 'Topbar Background Gradient','redux-framework-demo'),
            'subtitle'  => __('Topbar Background Gradient', 'redux-framework-demo'),
            'desc' => __('Topbar Background Gradient.', 'redux-framework-demo'),
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_topbar_options','equals','gradient'),
            //'alpha'     => .5,
            'selector'  => 'topbar',
            'mode'      => 'background-color',
            'important' => false,
            'hint' => array(
                'title'   => __('Topbar Background Gradient','redux-framework-demo'),
                'content' => __('Topbar Background Gradient','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_topbar_image',
            'title'     =>__( 'Topbar Background Image','redux-framework-demo'),
            'subtitle'  => __('Topbar Background Image', 'redux-framework-demo'),
            'desc' => __('Topbar Background Image.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_topbar_options','equals','image'),
            'selector'  => 'topbar',
            'mode'      => 'background-image',
            'class'     => 'background_image_chooser',
            'options' => getImageFiles('backgrounds', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Topbar Background Image','redux-framework-demo'),
                'content' => __('Topbar Background Image','redux-framework-demo'),
            )
        ),
        array (
            'id'        => 'background_topbar',
            'title'     =>__( 'Topbar Background Custom Image','redux-framework-demo'),
            'subtitle'  => __('Topbar Background Custom Image', 'redux-framework-demo'),
            'desc' => __('Topbar Background Custom Image.', 'redux-framework-demo'),
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
            'hint' => array(
                'title'   => __('Topbar Background Custom Image','redux-framework-demo'),
                'content' => __('Topbar Background Custom Image','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_topbar_pattern1',
            'title'     =>__( 'Topbar Background Pattern 1','redux-framework-demo'),
            'subtitle'  => __('Topbar Background Pattern 1', 'redux-framework-demo'),
            'desc' => __('Topbar Background Pattern 1.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_topbar_options','equals','pattern1'),
            'selector'  => 'topbar',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser', 
            'options' => getImageFiles('patterns1', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Topbar Background Pattern 1','redux-framework-demo'),
                'content' => __('Topbar Background Pattern 1','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_topbar_pattern2',
            'title'     =>__( 'Topbar Background Pattern 2','redux-framework-demo'),
            'subtitle'  => __('Topbar Background Pattern 2', 'redux-framework-demo'),
            'desc' => __('Topbar Background Pattern 2.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_topbar_options','equals','pattern2'),
            'selector'  => 'topbar',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns2', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Topbar Background Pattern 2','redux-framework-demo'),
                'content' => __('Topbar Background Pattern 2','redux-framework-demo'),
            )
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
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
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
                'title'   => __('Main Menu background Options','redux-framework-demo'),
                'content' => __('Main Menu background Options','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_nav_color',
            'title'     =>__( 'Main Menu Background Color','redux-framework-demo'),
            'subtitle'  => __('Main Menu Background Color', 'redux-framework-demo'),
            'desc' => __('Main Menu Background Color.', 'redux-framework-demo'),
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            'selector'  => 'nav',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_nav_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false,
            'hint' => array(
                'title'   => __('Main Menu Background Color','redux-framework-demo'),
                'content' => __('Main Menu Background Color','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_nav_color_alpha',
            'type'      => 'slider',
            'title'     => __('Main Menu Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Main Menu Background Color Alpha', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_nav_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
            'hint' => array(
                'title'   => __('Main Menu Background Color Alpha','redux-framework-demo'),
                'content' => __('Main Menu Background Color Alpha','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_nav_gradient',
            'title'     =>__( 'Main Menu Background Gradient','redux-framework-demo'),
            'subtitle'  => __('Main Menu Background Gradient', 'redux-framework-demo'),
            'desc' => __('Main Menu Background Gradient.', 'redux-framework-demo'),
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_nav_options','equals','gradient'),
            'alpha'     => .5,
            'selector'  => 'nav',
            'mode'      => 'background-color',
            'important' => false,
            'hint' => array(
                'title'   => __('Main Menu Background Gradient','redux-framework-demo'),
                'content' => __('Main Menu Background Gradient','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_nav_image',
            'title'     =>__( 'Main Menu Background Image','redux-framework-demo'),
            'subtitle'  => __('Main Menu Background Image', 'redux-framework-demo'),
            'desc' => __('Main Menu Background Image.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_nav_options','equals','image'),
            'selector'  => 'nav',
            'mode'      => 'background-image',
            'class'     => 'background_image_chooser',
            'options' => getImageFiles('backgrounds', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Main Menu Background Image','redux-framework-demo'),
                'content' => __('Main Menu Background Image','redux-framework-demo'),
            )
        ),
        array (
            'id'        => 'background_nav',
            'title'     =>__( 'Main Menu Background Custom Image','redux-framework-demo'),
            'subtitle'  => __('Main Menu Background Custom Image', 'redux-framework-demo'),
            'desc' => __('Main Menu Background Custom Image.', 'redux-framework-demo'),
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
            'hint' => array(
                'title'   => __('Main Menu Background Custom Image','redux-framework-demo'),
                'content' => __('Main Menu Background Custom Image','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_nav_pattern1',
            'title'     =>__( 'Main Menu Background Pattern 1','redux-framework-demo'),
            'subtitle'  => __('Main Menu Background Pattern 1', 'redux-framework-demo'),
            'desc' => __('Main Menu Background Pattern 1.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_nav_options','equals','pattern1'),
            'selector'  => 'nav',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns1', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Main Menu Background Pattern 1','redux-framework-demo'),
                'content' => __('Main Menu Background Pattern 1','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_nav_pattern2',
            'title'     =>__( 'Main Menu Background Pattern 2','redux-framework-demo'),
            'subtitle'  => __('Main Menu Background Pattern 2', 'redux-framework-demo'),
            'desc' => __('Main Menu Background Pattern 2.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_nav_options','equals','pattern2'),
            'selector'  => 'nav',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns2', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Main Menu Background Pattern 2','redux-framework-demo'),
                'content' => __('Main Menu Background Pattern 2','redux-framework-demo'),
            )
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
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
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
                'title'   => __('Page Title background Options','redux-framework-demo'),
                'content' => __('Page Title background Options','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_pagetitle_color',
            'title'     =>__( 'Page Title Background Color','redux-framework-demo'),
            'subtitle'  => __('Page Title Background Color', 'redux-framework-demo'),
            'desc' => __('Page Title Background Color.', 'redux-framework-demo'),
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_pagetitle_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false,
            'hint' => array(
                'title'   => __('Page Title Background Color','redux-framework-demo'),
                'content' => __('Page Title Background Color','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_pagetitle_color_alpha',
            'type'      => 'slider',
            'title'     => __('Page Title Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Page Title Background Color Alpha', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_pagetitle_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
            'hint' => array(
                'title'   => __('Page Title Background Color Alpha','redux-framework-demo'),
                'content' => __('Page Title Background Color Alpha','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_pagetitle_gradient',
            'title'     =>__( 'Page Title Background Gradient','redux-framework-demo'),
            'subtitle'  => __('Page Title Background Gradient', 'redux-framework-demo'),
            'desc' => __('Page Title Background Gradient.', 'redux-framework-demo'),
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_pagetitle_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false,
            'hint' => array(
                'title'   => __('Page Title Background Gradient','redux-framework-demo'),
                'content' => __('Page Title Background Gradient','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_pagetitle_image',
            'title'     =>__( 'Page Title Background Image','redux-framework-demo'),
            'subtitle'  => __('Page Title Background Image', 'redux-framework-demo'),
            'desc' => __('Page Title Background Image.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_pagetitle_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'background_image_chooser',
            'options' => getImageFiles('backgrounds', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Page Title Background Image','redux-framework-demo'),
                'content' => __('Page Title Background Image','redux-framework-demo'),
            )
        ),
        array (
            'id'        => 'background_pagetitle',
            'title'     =>__( 'Page Title Background Custom Image','redux-framework-demo'),
            'subtitle'  => __('Page Title Background Custom Image', 'redux-framework-demo'),
            'desc' => __('Page Title Background Custom Image.', 'redux-framework-demo'),
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
            'hint' => array(
                'title'   => __('Page Title Background Custom Image','redux-framework-demo'),
                'content' => __('Page Title Background Custom Image','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_pagetitle_pattern1',
            'title'     =>__( 'Page Title Background Pattern 1','redux-framework-demo'),
            'subtitle'  => __('Page Title Background Pattern 1', 'redux-framework-demo'),
            'desc' => __('Page Title Background Pattern 1.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_pagetitle_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns1', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Page Title Background Pattern 1','redux-framework-demo'),
                'content' => __('Page Title Background Pattern 1','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_pagetitle_pattern2',
            'title'     =>__( 'Page Title Background Pattern 2','redux-framework-demo'),
            'subtitle'  => __('Page Title Background Pattern 2', 'redux-framework-demo'),
            'desc' => __('Page Title Background Pattern 2.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_pagetitle_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns2', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Page Title Background Pattern 2','redux-framework-demo'),
                'content' => __('Page Title Background Pattern 2','redux-framework-demo'),
            )
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
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
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
                'title'   => __('Page background Options','redux-framework-demo'),
                'content' => __('Page background Options','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_main_color',
            'title'     =>__( 'Page Background Color','redux-framework-demo'),
            'subtitle'  => __('Page Background Color', 'redux-framework-demo'),
            'desc' => __('Page Background Color.', 'redux-framework-demo'),
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_main_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false,
            'hint' => array(
                'title'   => __('Page Background Color','redux-framework-demo'),
                'content' => __('Page Background Color','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_main_color_alpha',
            'type'      => 'slider',
            'title'     => __('Page Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Page Background Color Alpha', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_main_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
            'hint' => array(
                'title'   => __('Page Background Color Alpha','redux-framework-demo'),
                'content' => __('Page Background Color Alpha','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_main_gradient',
            'title'     =>__( 'Page Background Gradient','redux-framework-demo'),
            'subtitle'  => __('Page Background Gradient', 'redux-framework-demo'),
            'desc' => __('Page Background Gradient.', 'redux-framework-demo'),
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_main_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false,
            'hint' => array(
                'title'   => __('Page Background Gradient','redux-framework-demo'),
                'content' => __('Page Background Gradient','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_main_image',
            'title'     =>__( 'Page Background Image','redux-framework-demo'),
            'subtitle'  => __('Page Background Image', 'redux-framework-demo'),
            'desc' => __('Page Background Image.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_main_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'background_image_chooser',
            'options' => getImageFiles('backgrounds', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Page Background Image','redux-framework-demo'),
                'content' => __('Page Background Image','redux-framework-demo'),
            )
        ),
        array (
            'id'        => 'background_main',
            'title'     =>__( 'Page Background Custom Image','redux-framework-demo'),
            'subtitle'  => __('Page Background Custom Image', 'redux-framework-demo'),
            'desc' => __('Page Background Custom Image.', 'redux-framework-demo'),
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
            'hint' => array(
                'title'   => __('Page Background Custom Image','redux-framework-demo'),
                'content' => __('Page Background Custom Image','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_main_pattern1',
            'title'     =>__( 'Page Background Pattern 1','redux-framework-demo'),
            'subtitle'  => __('Page Background Pattern 1', 'redux-framework-demo'),
            'desc' => __('Page Background Pattern 1.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_main_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns1', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Page Background Pattern 1','redux-framework-demo'),
                'content' => __('Page Background Pattern 1','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_main_pattern2',
            'title'     =>__( 'Page Background Pattern 2','redux-framework-demo'),
            'subtitle'  => __('Page Background Pattern 2', 'redux-framework-demo'),
            'desc' => __('Page Background Pattern 2.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_main_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns2', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Page Background Pattern 2','redux-framework-demo'),
                'content' => __('Page Background Pattern 2','redux-framework-demo'),
            )
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
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
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
                'title'   => __('Content background Options','redux-framework-demo'),
                'content' => __('Content background Options','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_content_color',
            'title'     =>__( 'Content Background Color','redux-framework-demo'),
            'subtitle'  => __('Content Background Color', 'redux-framework-demo'),
            'desc' => __('Content Background Color.', 'redux-framework-demo'),
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_content_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false,
            'hint' => array(
                'title'   => __('Content Background Color','redux-framework-demo'),
                'content' => __('Content Background Color','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_content_color_alpha',
            'type'      => 'slider',
            'title'     => __('Content Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Content Background Color Alpha', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_content_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
            'hint' => array(
                'title'   => __('Content Background Color Alpha','redux-framework-demo'),
                'content' => __('Content Background Color Alpha','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_content_gradient',
            'title'     =>__( 'Content Background Gradient','redux-framework-demo'),
            'subtitle'  => __('Content Background Gradient', 'redux-framework-demo'),
            'desc' => __('Content Background Custom Gradient.', 'redux-framework-demo'),
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_content_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false,
            'hint' => array(
                'title'   => __('Content Background Gradient','redux-framework-demo'),
                'content' => __('Content Background Gradient','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_content_image',
            'title'     =>__( 'Content Background Image','redux-framework-demo'),
            'subtitle'  => __('Content Background Image', 'redux-framework-demo'),
            'desc' => __('Content Background Image.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_content_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'background_image_chooser',
            'options' => getImageFiles('backgrounds', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Content Background Image','redux-framework-demo'),
                'content' => __('Content Background Image','redux-framework-demo'),
            )
        ),
        array (
            'id'        => 'background_content',
            'title'     =>__( 'Content Background Custom Image','redux-framework-demo'),
            'subtitle'  => __('Content Background Custom Image', 'redux-framework-demo'),
            'desc' => __('Content Background Custom Image.', 'redux-framework-demo'),
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
            'hint' => array(
                'title'   => __('Content Background Custom Image','redux-framework-demo'),
                'content' => __('Content Background Custom Image','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_content_pattern1',
            'title'     =>__( 'Content Background Pattern 1','redux-framework-demo'),
            'subtitle'  => __('Content Background Pattern 1', 'redux-framework-demo'),
            'desc' => __('Content Background Pattern 1.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_content_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns1', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Content Background Pattern 1','redux-framework-demo'),
                'content' => __('Content Background Pattern 1','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_content_pattern2',
            'title'     =>__( 'Content Background Pattern 2','redux-framework-demo'),
            'subtitle'  => __('Content Background Pattern 2', 'redux-framework-demo'),
            'desc' => __('Content Background Pattern 2.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_content_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns2', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Content Background Pattern 2','redux-framework-demo'),
                'content' => __('Content Background Pattern 2','redux-framework-demo'),
            )
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
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
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
                'title'   => __('Left Sidebar background Options','redux-framework-demo'),
                'content' => __('Left Sidebar background Options','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_left_sidebar_color',
            'title'     =>__( 'Left Sidebar Background Color','redux-framework-demo'),
            'subtitle'  => __('Left Sidebar Background Color', 'redux-framework-demo'),
            'desc' => __('Left Sidebar Background Color.', 'redux-framework-demo'),
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_left_sidebar_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false,
            'hint' => array(
                'title'   => __('Left Sidebar Background Color','redux-framework-demo'),
                'content' => __('Left Sidebar Background Color','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_left_sidebar_color_alpha',
            'type'      => 'slider',
            'title'     => __('Left Sidebar Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Left Sidebar Background Color Alpha', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_left_sidebar_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
            'hint' => array(
                'title'   => __('Left Sidebar Background Color Alpha','redux-framework-demo'),
                'content' => __('Left Sidebar Background Color Alpha','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_left_sidebar_gradient',
            'title'     =>__( 'Left Sidebar Background Gradient','redux-framework-demo'),
            'subtitle'  => __('Left Sidebar Background Gradient', 'redux-framework-demo'),
            'desc' => __('Left Sidebar Background Gradient.', 'redux-framework-demo'),
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_left_sidebar_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false,
            'hint' => array(
                'title'   => __('Left Sidebar Background Gradient','redux-framework-demo'),
                'content' => __('Left Sidebar Background Gradient','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_left_sidebar_image',
            'title'     =>__( 'Left Sidebar Background Image','redux-framework-demo'),
            'subtitle'  => __('Left Sidebar Background Image', 'redux-framework-demo'),
            'desc' => __('Left Sidebar Background Image.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_left_sidebar_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'background_image_chooser',
            'options' => getImageFiles('backgrounds', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Left Sidebar Background Image','redux-framework-demo'),
                'content' => __('Left Sidebar Background Image','redux-framework-demo'),
            )
        ),
        array (
            'id'        => 'background_left_sidebar',
            'title'     =>__( 'Left Sidebar Background Custom Image','redux-framework-demo'),
            'subtitle'  => __('Left Sidebar Background Custom Image', 'redux-framework-demo'),
            'desc' => __('Left Sidebar Background Custom Image.', 'redux-framework-demo'),
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
            'hint' => array(
                'title'   => __('Left Sidebar Background Custom Image','redux-framework-demo'),
                'content' => __('Left Sidebar Background Custom Image','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_left_sidebar_pattern1',
            'title'     =>__( 'Left Sidebar Background Pattern 1','redux-framework-demo'),
            'subtitle'  => __('Left Sidebar Background Pattern 1', 'redux-framework-demo'),
            'desc' => __('Left Sidebar Background Pattern 1.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_left_sidebar_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns1', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Left Sidebar Background Pattern 1','redux-framework-demo'),
                'content' => __('Left Sidebar Background Pattern 1','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_left_sidebar_pattern2',
            'title'     =>__( 'Left Sidebar Background Pattern 2','redux-framework-demo'),
            'subtitle'  => __('Left Sidebar Background Pattern 2', 'redux-framework-demo'),
            'desc' => __('Left Sidebar Background Pattern 2.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_left_sidebar_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns2', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Left Sidebar Background Pattern 2','redux-framework-demo'),
                'content' => __('Left Sidebar Background Pattern 2','redux-framework-demo'),
            )
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
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
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
                'title'   => __('Right Sidebar background Options','redux-framework-demo'),
                'content' => __('Right Sidebar background Options','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_right_sidebar_color',
            'title'     =>__( 'Right Sidebar Background Color','redux-framework-demo'),
            'subtitle'  => __('Right Sidebar Background Color', 'redux-framework-demo'),
            'desc' => __('Right Sidebar Background Color.', 'redux-framework-demo'),
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_right_sidebar_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false,
            'hint' => array(
                'title'   => __('Right Sidebar Background Color','redux-framework-demo'),
                'content' => __('Right Sidebar Background Color','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_right_sidebar_color_alpha',
            'type'      => 'slider',
            'title'     => __('Right Sidebar Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Right Sidebar Background Color Alpha', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_right_sidebar_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
            'hint' => array(
                'title'   => __('Right Sidebar Background Color Alpha','redux-framework-demo'),
                'content' => __('Right Sidebar Background Color Alpha','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_right_sidebar_gradient',
            'title'     =>__( 'Right Sidebar Background Gradient','redux-framework-demo'),
            'subtitle'  => __('Right Sidebar Background Gradient', 'redux-framework-demo'),
            'desc' => __('Right Sidebar Background Gradient.', 'redux-framework-demo'),
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_right_sidebar_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false,
            'hint' => array(
                'title'   => __('Right Sidebar Background Gradient','redux-framework-demo'),
                'content' => __('Right Sidebar Background Gradient','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_right_sidebar_image',
            'title'     =>__( 'Right Sidebar Background Image','redux-framework-demo'),
            'subtitle'  => __('Right Sidebar Background Image', 'redux-framework-demo'),
            'desc' => __('Right Sidebar Background Image.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_right_sidebar_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'background_image_chooser',
            'options' => getImageFiles('backgrounds', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Right Sidebar Background Image','redux-framework-demo'),
                'content' => __('Right Sidebar Background Image','redux-framework-demo'),
            )
        ),
        array (
            'id'        => 'background_right_sidebar',
            'title'     =>__( 'Right Sidebar Background Custom Image','redux-framework-demo'),
            'subtitle'  => __('Right Sidebar Background Custom Image', 'redux-framework-demo'),
            'desc' => __('Right Sidebar Background Custom Image.', 'redux-framework-demo'),
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
            'hint' => array(
                'title'   => __('Right Sidebar Background Custom Image','redux-framework-demo'),
                'content' => __('Right Sidebar Background Custom Image','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_right_sidebar_pattern1',
            'title'     =>__( 'Right Sidebar Background Pattern 1','redux-framework-demo'),
            'subtitle'  => __('Right Sidebar Background Pattern 1', 'redux-framework-demo'),
            'desc' => __('Right Sidebar Background Pattern 1.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_right_sidebar_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns1', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Right Sidebar Background Pattern 1','redux-framework-demo'),
                'content' => __('Right Sidebar Background Pattern 1','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_right_sidebar_pattern2',
            'title'     =>__( 'Right Sidebar Background Pattern 2','redux-framework-demo'),
            'subtitle'  => __('Right Sidebar Background Pattern 2', 'redux-framework-demo'),
            'desc' => __('Right Sidebar Background Pattern 2.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_right_sidebar_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns2', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Right Sidebar Background Pattern 2','redux-framework-demo'),
                'content' => __('Right Sidebar Background Pattern 2','redux-framework-demo'),
            )
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
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
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
                'title'   => __('Footer background Options','redux-framework-demo'),
                'content' => __('Footer background Options','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_footer_color',
            'title'     =>__( 'Footer Background Color','redux-framework-demo'),
            'subtitle'  => __('Footer Background Color', 'redux-framework-demo'),
            'desc' => __('Footer Background Color.', 'redux-framework-demo'),
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_footer_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false,
            'hint' => array(
                'title'   => __('Footer Background Color','redux-framework-demo'),
                'content' => __('Footer Background Color','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_footer_color_alpha',
            'type'      => 'slider',
            'title'     => __('Footer Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Footer Background Color Alpha', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_footer_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
            'hint' => array(
                'title'   => __('Footer Background Color Alpha','redux-framework-demo'),
                'content' => __('Footer Background Color Alpha','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_footer_gradient',
            'title'     =>__( 'Footer Background Gradient','redux-framework-demo'),
            'subtitle'  => __('Footer Background Gradient', 'redux-framework-demo'),
            'desc' => __('Footer Background Gradient.', 'redux-framework-demo'),
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_footer_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false,
            'hint' => array(
                'title'   => __('Footer Background Gradient','redux-framework-demo'),
                'content' => __('Footer Background Gradient','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_footer_image',
            'title'     =>__( 'Footer Background Image','redux-framework-demo'),
            'subtitle'  => __('Footer Background Image', 'redux-framework-demo'),
            'desc' => __('Footer Background Image.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_footer_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'background_image_chooser',
            'options' => getImageFiles('backgrounds', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Footer Background Image','redux-framework-demo'),
                'content' => __('Footer Background Image','redux-framework-demo'),
            )
        ),
        array (
            'id'        => 'background_footer',
            'title'     =>__( 'Footer Background Custom Image','redux-framework-demo'),
            'subtitle'  => __('Footer Background Custom Image', 'redux-framework-demo'),
            'desc' => __('Footer Background Custom Image.', 'redux-framework-demo'),
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
            'hint' => array(
                'title'   => __('Footer Background Custom Image','redux-framework-demo'),
                'content' => __('Footer Background Custom Image','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_footer_pattern1',
            'title'     =>__( 'Footer Background Pattern 1','redux-framework-demo'),
            'subtitle'  => __('Footer Background Pattern 1', 'redux-framework-demo'),
            'desc' => __('Footer Background Pattern 1.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_footer_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns1', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Footer Background Pattern 1','redux-framework-demo'),
                'content' => __('Footer Background Pattern 1','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_footer_pattern2',
            'title'     =>__( 'Footer Background Pattern 2','redux-framework-demo'),
            'subtitle'  => __('Footer Background Pattern 2', 'redux-framework-demo'),
            'desc' => __('Footer Background Pattern 2.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_footer_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns2', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Footer Background Pattern 2','redux-framework-demo'),
                'content' => __('Footer Background Pattern 2','redux-framework-demo'),
            )
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
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
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
                'title'   => __('Copyright Area background Options','redux-framework-demo'),
                'content' => __('Copyright Area background Options','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_copyright_color',
            'title'     =>__( 'Copyright Area Background Color','redux-framework-demo'),
            'subtitle'  => __('Copyright Area Background Color', 'redux-framework-demo'),
            'desc' => __('Copyright Area Background Color.', 'redux-framework-demo'),
            'type'      => 'color',
            'transparent' => false,
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'output'      => '',
            //'required'      => array('background_copyright_options','equals','color'),
            'default'      => '#d5d5d5',
            'important' => false,
            'hint' => array(
                'title'   => __('Copyright Area Background Color','redux-framework-demo'),
                'content' => __('Copyright Area Background Color','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_copyright_color_alpha',
            'type'      => 'slider',
            'title'     => __('Copyright Area Background Color Alpha', 'redux-framework-demo'),
            'subtitle'  => __('Copyright Area Background Color Alpha', 'redux-framework-demo'),
            'desc'      => __('Set Min: 1, max: 100, step: 1, default value: 100', 'redux-framework-demo'),
            //'required'      => array('background_copyright_options','equals','color'),
            "default"   => 100,
            "min"       => 0,
            "step"      => 1,
            "max"       => 100,
            'display_value' => 'label',
            'hint' => array(
                'title'   => __('Copyright Area Background Color Alpha','redux-framework-demo'),
                'content' => __('Copyright Area Background Color Alpha','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_copyright_gradient',
            'title'     =>__( 'Copyright Area Background Gradient','redux-framework-demo'),
            'subtitle'  => __('Copyright Area Background Gradient', 'redux-framework-demo'),
            'desc' => __('Copyright Area Background Gradient.', 'redux-framework-demo'),
            'type'      => 'color_gradient',
            'transparent' => false,
            //'required'      => array('background_copyright_options','equals','gradient'),
            'alpha'     => .5,
            //'selector'  => 'page-title',
            'mode'      => 'background-color',
            'important' => false,
            'hint' => array(
                'title'   => __('Copyright Area Background Gradient','redux-framework-demo'),
                'content' => __('Copyright Area Background Gradient','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_copyright_image',
            'title'     =>__( 'Copyright Area Background Image','redux-framework-demo'),
            'subtitle'  => __('Copyright Area Background Image', 'redux-framework-demo'),
            'desc' => __('Copyright Area Background Image.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_copyright_options','equals','image'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'background_image_chooser',
            'options' => getImageFiles('backgrounds', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Copyright Area Background Image','redux-framework-demo'),
                'content' => __('Copyright Area Background Image','redux-framework-demo'),
            )
        ),
        array (
            'id'        => 'background_copyright',
            'title'     =>__( 'Copyright Area Background Custom Image','redux-framework-demo'),
            'subtitle'  => __('Copyright Area Background Custom Image', 'redux-framework-demo'),
            'desc' => __('Copyright Area Background Custom Image.', 'redux-framework-demo'),
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
            'hint' => array(
                'title'   => __('Copyright Area Background Custom Image','redux-framework-demo'),
                'content' => __('Copyright Area Background Custom Image','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_copyright_pattern1',
            'title'     =>__( 'Copyright Area Background Pattern 1','redux-framework-demo'),
            'subtitle'  => __('Copyright Area Background Pattern 1', 'redux-framework-demo'),
            'desc' => __('Copyright Area Background Pattern 1.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_copyright_options','equals','pattern1'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns1', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Copyright Area Background Pattern 1','redux-framework-demo'),
                'content' => __('Copyright Area Background Pattern 1','redux-framework-demo'),
            )
        ),
        array(
            'id'        => 'background_copyright_pattern2',
            'title'     =>__( 'Copyright Area Background Pattern 2','redux-framework-demo'),
            'subtitle'  => __('Copyright Area Background Pattern 2', 'redux-framework-demo'),
            'desc' => __('Copyright Area Background Pattern 2.', 'redux-framework-demo'),
            'type'      => 'image_select',
            //'required'      => array('background_copyright_options','equals','pattern2'),
            //'selector'  => 'page-title',
            'mode'      => 'background-image',
            'class'     => 'pattern_chooser',
            'options' => getImageFiles('patterns2', true),
            'default' => '',
            'tiles' => true,
            'presets' => false,
            'hint' => array(
                'title'   => __('Copyright Area Background Pattern 2','redux-framework-demo'),
                'content' => __('Copyright Area Background Pattern 2','redux-framework-demo'),
            )
        ),
    )

);

?>