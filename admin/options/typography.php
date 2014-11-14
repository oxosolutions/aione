<?php
/*********************************************************************************************
 *
 *  Typography
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-file',
    'title'     => __('Typography', 'redux-framework-demo'),
    'fields'    => array(
        array(
            'id'            => 'google_body',
            'type'          => 'typography',
            'title'         => __('Typography', 'redux-framework-demo'),
            'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false,    // Select a backup non-google font in addition to a google font
            'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets'       => false, // Only appears if google is true and subsets not set to false
            'font-size'     => true,
            'line-height'   => true,
            'word-spacing'  => false,  // Defaults to false
            'letter-spacing'=> false,  // Defaults to false
            'color'         => true,
            'text-align'     => false,
            'font-weight'     => false,
            'preview'       => true, // Disable the previewer
            'all_styles'    => false,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('#site_title a'), // An array of CSS selectors to apply this font style to dynamically
            'compiler'      => array('#site_title a'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
            'default'       => array(
                'color'         => '#333',
                'font-style'    => '700',
                'font-family'   => 'Abel',
                'google'        => true,
                'font-size'     => '33px',
                'line-height'   => '40px'),
        ),
        array(
            'id'            => 'google_nav',
            'type'          => 'typography',
            'title'         => __('Typography', 'redux-framework-demo'),
            //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => true,    // Select a backup non-google font in addition to a google font
            //'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            //'subsets'       => false, // Only appears if google is true and subsets not set to false
            //'font-size'     => false,
            //'line-height'   => false,
            //'word-spacing'  => true,  // Defaults to false
            //'letter-spacing'=> true,  // Defaults to false
            //'color'         => false,
            //'preview'       => false, // Disable the previewer
            'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('h2.site-description, .entry-title'), // An array of CSS selectors to apply this font style to dynamically
            'compiler'      => array('h2.site-description-compiler'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
            'default'       => array(
                'color'         => '#333',
                'font-style'    => '700',
                'font-family'   => 'Abel',
                'google'        => true,
                'font-size'     => '33px',
                'line-height'   => '40px'),
        ),
        array(
            'id'            => 'google_headings',
            'type'          => 'typography',
            'title'         => __('Typography', 'redux-framework-demo'),
            //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => true,    // Select a backup non-google font in addition to a google font
            //'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            //'subsets'       => false, // Only appears if google is true and subsets not set to false
            //'font-size'     => false,
            //'line-height'   => false,
            //'word-spacing'  => true,  // Defaults to false
            //'letter-spacing'=> true,  // Defaults to false
            //'color'         => false,
            //'preview'       => false, // Disable the previewer
            'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('h2.site-description, .entry-title'), // An array of CSS selectors to apply this font style to dynamically
            'compiler'      => array('h2.site-description-compiler'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
            'default'       => array(
                'color'         => '#333',
                'font-style'    => '700',
                'font-family'   => 'Abel',
                'google'        => true,
                'font-size'     => '33px',
                'line-height'   => '40px'),
        ),
        array(
            'id'            => 'google_footer_headings',
            'type'          => 'typography',
            'title'         => __('Typography', 'redux-framework-demo'),
            //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => true,    // Select a backup non-google font in addition to a google font
            //'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            //'subsets'       => false, // Only appears if google is true and subsets not set to false
            //'font-size'     => false,
            //'line-height'   => false,
            //'word-spacing'  => true,  // Defaults to false
            //'letter-spacing'=> true,  // Defaults to false
            //'color'         => false,
            //'preview'       => false, // Disable the previewer
            'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('h2.site-description, .entry-title'), // An array of CSS selectors to apply this font style to dynamically
            'compiler'      => array('h2.site-description-compiler'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
            'default'       => array(
                'color'         => '#333',
                'font-style'    => '700',
                'font-family'   => 'Abel',
                'google'        => true,
                'font-size'     => '33px',
                'line-height'   => '40px'),
        ),
    ),
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-skype',
    'title'     => __('Header', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array(

        )
    )
);


?>