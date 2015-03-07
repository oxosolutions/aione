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
            'id'            => 'typography_body',
            'type'          => 'typography',
            'title'         => __('Body Font styles', 'redux-framework-demo'),
            'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => false,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false,    // Select a backup non-google font in addition to a google font
            'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets'       => false, // Only appears if google is true and subsets not set to false
            'font-size'     => true,
            'line-height'   => true,
            'word-spacing'  => false,  // Defaults to false
            'letter-spacing'=> false,  // Defaults to false
            'color'         => false,
            'text-align'     => false,
            'font-weight'     => false,
            'preview'       => true, // Disable the previewer
            'all_styles'    => false,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('body'), // An array of CSS selectors to apply this font style to dynamically
            //'compiler'      => array('body'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Typography options for body.', 'redux-framework-demo'),
            'desc' =>  __('Body Font styles.','redux-framework-demo'),
            'default'       => array(
                'font-family'   => 'Arial, Helvetica, sans-serif',
                'google'        => true,
                'font-size'     => '13px',
                'line-height'   => '20px'),
            'hint' => array(
                'title'   => __('Body Font styles','redux-framework-demo'),
                'content' => __('Body Font styles','redux-framework-demo'),
            )
        ),
        /*
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
                */
    ),
);
/*********************************************************************************************/

$this->sections[] = array(
    'icon'      => 'el-icon-skype',
    'title'     => __('Header', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array(
            'id'            => 'typography_topbar',
            'type'          => 'typography',
            'title'         => __('Topbar', 'redux-framework-demo'),
            'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false,    // Select a backup non-google font in addition to a google font
            'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets'       => false, // Only appears if google is true and subsets not set to false
            'font-size'     => true,
            'line-height'   => true,
            'word-spacing'  => false,  // Defaults to false
            'letter-spacing'=> false,  // Defaults to false
            'color'         => false,
            'text-align'     => false,
            'font-weight'     => true,
            'preview'       => true, // Disable the previewer
            'all_styles'    => false,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('#topbar'), // An array of CSS selectors to apply this font style to dynamically
            //'compiler'      => array('#main h1'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Font options for Topbar.', 'redux-framework-demo'),
            'desc' =>  __('Topbar.','redux-framework-demo'),
            'default'       => array(
                'font-family'   => 'Arial, Helvetica, sans-serif',
                'google'        => true,
                'font-size'     => '13px',
                'line-height'   => '20px'),
            'hint' => array(
                'title'   => __('Topbar','redux-framework-demo'),
                'content' => __('Topbar','redux-framework-demo'),
            )
        ),
        array(
            'id'            => 'typography_header',
            'type'          => 'typography',
            'title'         => __('Typography Header', 'redux-framework-demo'),
            'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false,    // Select a backup non-google font in addition to a google font
            'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets'       => false, // Only appears if google is true and subsets not set to false
            'font-size'     => true,
            'line-height'   => true,
            'word-spacing'  => false,  // Defaults to false
            'letter-spacing'=> false,  // Defaults to false
            'color'         => false,
            'text-align'     => false,
            'font-weight'     => false,
            'preview'       => true, // Disable the previewer
            'all_styles'    => false,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('#header'), // An array of CSS selectors to apply this font style to dynamically
            //'compiler'      => array('h1,h2,h3'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Font options for Header.', 'redux-framework-demo'),
            'desc' =>  __('Typography Header.','redux-framework-demo'),
            'default'       => array(
                'font-style'    => '700',
                'font-family'   => 'Arial, Helvetica, sans-serif',
                'google'        => true,
                'font-size'     => '18px',
                'line-height'   => '22px'),
            'hint' => array(
                'title'   => __('Typography Header','redux-framework-demo'),
                'content' => __('Typography Header','redux-framework-demo'),
            )
        ),
        array(
            'id'            => 'typography_header_site_title',
            'type'          => 'typography',
            'title'         => __('Site Title', 'redux-framework-demo'),
            'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false,    // Select a backup non-google font in addition to a google font
            'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets'       => false, // Only appears if google is true and subsets not set to false
            'font-size'     => true,
            'line-height'   => true,
            'word-spacing'  => false,  // Defaults to false
            'letter-spacing'=> false,  // Defaults to false
            'color'         => false,
            'text-align'     => false,
            'font-weight'     => false,
            'preview'       => true, // Disable the previewer
            'all_styles'    => false,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('#site_title a'), // An array of CSS selectors to apply this font style to dynamically
            'compiler'      => array('#site_title a'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Font options for site title.', 'redux-framework-demo'),
            'desc' =>  __('Site Title.','redux-framework-demo'),
            'default'       => array(
                'font-style'    => '700',
                'font-family'   => 'Arial, Helvetica, sans-serif',
                'google'        => true,
                'font-size'     => '54px',
                'line-height'   => '70px'),
            'hint' => array(
                'title'   => __('Site Title','redux-framework-demo'),
                'content' => __('Site Title','redux-framework-demo'),
            )
        ),
        array(
            'id'            => 'typography_header_tagline',
            'type'          => 'typography',
            'title'         => __('Tagline', 'redux-framework-demo'),
            'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false,    // Select a backup non-google font in addition to a google font
            'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets'       => false, // Only appears if google is true and subsets not set to false
            'font-size'     => true,
            'line-height'   => true,
            'word-spacing'  => false,  // Defaults to false
            'letter-spacing'=> false,  // Defaults to false
            'color'         => false,
            'text-align'     => false,
            'font-weight'     => false,
            'preview'       => true, // Disable the previewer
            'all_styles'    => false,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('#site_description'), // An array of CSS selectors to apply this font style to dynamically
            //'compiler'      => array('#site_description'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Font options for site tagline.', 'redux-framework-demo'),
            'desc' =>  __('Tagline.','redux-framework-demo'),
            'default'       => array(
                'font-style'    => '300',
                'font-family'   => 'Arial, Helvetica, sans-serif',
                'google'        => true,
                'font-size'     => '18px',
                'line-height'   => '22px'),
            'hint' => array(
                'title'   => __('Tagline','redux-framework-demo'),
                'content' => __('Tagline','redux-framework-demo'),
            )
        ),
        
    )
);

/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-skype',
    'title'     => __('Page', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array(
            'id'            => 'typography_h1',
            'type'          => 'typography',
            'title'         => __('Heading H1', 'redux-framework-demo'),
            'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false,    // Select a backup non-google font in addition to a google font
            'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets'       => false, // Only appears if google is true and subsets not set to false
            'font-size'     => true,
            'line-height'   => true,
            'word-spacing'  => false,  // Defaults to false
            'letter-spacing'=> false,  // Defaults to false
            'color'         => false,
            'text-align'     => false,
            'font-weight'     => true,
            'preview'       => true, // Disable the previewer
            'all_styles'    => false,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('#main h1'), // An array of CSS selectors to apply this font style to dynamically
            //'compiler'      => array('#main h1'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Font style for H1.', 'redux-framework-demo'),
            'desc' =>  __('Heading H1.','redux-framework-demo'),
            'default'       => array(
                'font-family'   => 'Arial, Helvetica, sans-serif',
                'google'        => true,
                'font-size'     => '46px',
                'line-height'   => '40px'),
            'hint' => array(
                'title'   => __('Heading H1','redux-framework-demo'),
                'content' => __('Heading H1','redux-framework-demo'),
            )
        ),
        array(
            'id'            => 'typography_h2',
            'type'          => 'typography',
            'title'         => __('Heading H2', 'redux-framework-demo'),
            'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false,    // Select a backup non-google font in addition to a google font
            'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets'       => false, // Only appears if google is true and subsets not set to false
            'font-size'     => true,
            'line-height'   => true,
            'word-spacing'  => false,  // Defaults to false
            'letter-spacing'=> false,  // Defaults to false
            'color'         => false,
            'text-align'     => false,
            'font-weight'     => false,
            'preview'       => true, // Disable the previewer
            'all_styles'    => false,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('#main h2'), // An array of CSS selectors to apply this font style to dynamically
            'compiler'      => array('#main h2'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Font style for H2.', 'redux-framework-demo'),
            'desc' =>  __('Heading H2.','redux-framework-demo'),
            'default'       => array(
                'font-family'   => 'Arial, Helvetica, sans-serif',
                'google'        => true,
                'font-size'     => '33px',
                'line-height'   => '30px'),
            'hint' => array(
                'title'   => __('Heading H2','redux-framework-demo'),
                'content' => __('Heading H2','redux-framework-demo'),
            )
        ),
        array(
            'id'            => 'typography_h3',
            'type'          => 'typography',
            'title'         => __('Heading H3', 'redux-framework-demo'),
            'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false,    // Select a backup non-google font in addition to a google font
            'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets'       => false, // Only appears if google is true and subsets not set to false
            'font-size'     => true,
            'line-height'   => true,
            'word-spacing'  => false,  // Defaults to false
            'letter-spacing'=> false,  // Defaults to false
            'color'         => false,
            'text-align'     => false,
            'font-weight'     => false,
            'preview'       => true, // Disable the previewer
            'all_styles'    => false,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('#main h3'), // An array of CSS selectors to apply this font style to dynamically
            'compiler'      => array('#main h3'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Font style for H3.', 'redux-framework-demo'),
            'desc' =>  __('Heading H3.','redux-framework-demo'),
            'default'       => array(
                'font-family'   => 'Arial, Helvetica, sans-serif',
                'google'        => true,
                'font-size'     => '22px',
                'line-height'   => '28px'),
            'hint' => array(
                'title'   => __('Heading H3','redux-framework-demo'),
                'content' => __('Heading H3','redux-framework-demo'),
            )
        ),
    )
);



/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-skype',
    'title'     => __('Footer', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array(
            'id'            => 'typography_footer_title',
            'type'          => 'typography',
            'title'         => __('Heading H1', 'redux-framework-demo'),
            'compiler'      => true,  // Use if you want to hook in your own CSS compiler
            'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false,    // Select a backup non-google font in addition to a google font
            'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets'       => false, // Only appears if google is true and subsets not set to false
            'font-size'     => true,
            'line-height'   => true,
            'word-spacing'  => false,  // Defaults to false
            'letter-spacing'=> false,  // Defaults to false
            'color'         => false,
            'text-align'     => false,
            'font-weight'     => true,
            'preview'       => true, // Disable the previewer
            'all_styles'    => false,    // Enable all Google Font style/weight variations to be added to the page
            'output'        => array('#main h1'), // An array of CSS selectors to apply this font style to dynamically
            //'compiler'      => array('#main h1'), // An array of CSS selectors to apply this font style to dynamically
            'units'         => 'px', // Defaults to px
            'subtitle'      => __('Font style for H1.', 'redux-framework-demo'),
            'desc' =>  __('Heading H1.','redux-framework-demo'),
            'default'       => array(
                'font-family'   => 'Arial, Helvetica, sans-serif',
                'google'        => true,
                'font-size'     => '46px',
                'line-height'   => '40px'),
            'hint' => array(
                'title'   => __('Heading H1','redux-framework-demo'),
                'content' => __('Heading H1','redux-framework-demo'),
            )
        ),

    )
);


?>