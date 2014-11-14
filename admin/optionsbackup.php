<?php

/**
ReduxFramework Sample Config File
For full documentation, please visit: https://docs.reduxframework.com
 * */

if (!class_exists('admin_folder_Redux_Framework_config')) {

    class admin_folder_Redux_Framework_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

            // Function to test the compiler hook and demo CSS output.
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2);

            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

            // Dynamically add a section. Can be also used to modify sections/fields
            //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

        This is a test function that will let you see when the compiler hook occurs.
        It only runs if a field	set with compiler=>true is changed.

         * */
        function compiler_action($options, $css) {
            //echo '<h1>The compiler hook has run!';
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
        }

        /**

        Custom function for filtering the sections array. Good for child themes to override or add to the sections.
        Simply include this function in the child themes functions.php file.

        NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
        so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'redux-framework-demo'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

        Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

        Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }

        public function setSections() {

            /**
            Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'redux-framework-demo'), $this->theme->display('Name'));

            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
                <?php if ($screenshot) : ?>
                    <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                    <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                <?php endif; ?>

                <h4><?php echo $this->theme->display('Name'); ?></h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'redux-framework-demo'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'redux-framework-demo'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'redux-framework-demo') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
                    <?php
                    if ($this->theme->parent()) {
                        printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'redux-framework-demo'), $this->theme->parent()->display('Name'));
                    }
                    ?>

                </div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }

            // ACTUAL DECLARATION OF SECTIONS
            $this->sections[] = array(
                'icon'      => 'el-icon-cogs',
                'title'     => __('Header Settings', 'redux-framework-demo'),
                'fields'    => array(
                    array(
                        'id'        => 'opt-layout',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => __('Main Layout', 'redux-framework-demo'),
                        'subtitle'  => __('Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.', 'redux-framework-demo'),
                        'options'   => array(
                            '1' => array('alt' => '1 Column',       'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
                            '2' => array('alt' => '2 Column Left',  'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
                            '3' => array('alt' => '2 Column Right', 'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
                            '4' => array('alt' => '3 Column Middle','img' => ReduxFramework::$_url . 'assets/img/3cm.png'),
                            '5' => array('alt' => '3 Column Left',  'img' => ReduxFramework::$_url . 'assets/img/3cl.png'),
                            '6' => array('alt' => '3 Column Right', 'img' => ReduxFramework::$_url . 'assets/img/3cr.png')
                        ),
                        'default'   => '2'
                    ),

                    //////////////////////////////////////////////////////////////////////////////////////


                    array (
                        'id' => 'header_layout',
                        'type' => 'image_select',
                        'options' => array (
                            'v1' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header1.jpg',
                            'v2' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header2.jpg',
                            'v3' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header3.jpg',
                            'v4' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header4.jpg',
                            'v5' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header5.jpg',
                        ),
                        'title' => 'Select a Header Layout',
                        'default' => 'v1',
                    ),
                    array (
                        'desc' => 'Check this box to enable a transparent header that will display your slider behind it.',
                        'id' => 'header_transparent',
                        'type' => 'checkbox',
                        'title' => 'Transparent Header',
                    ),
                    array (
                        'desc' => 'Select if the slider shows below or above the header. This only works for the slider assigned in page options, not with shortcodes.',
                        'id' => 'slider_position',
                        'type' => 'select',
                        'options' => array (
                            'Below' => 'Below',
                            'Above' => 'Above',
                        ),
                        'title' => 'Slider Position',
                        'default' => 'Below',
                    ),
                    array (
                        'desc' => 'Select which content displays in the top left area of the header.',
                        'id' => 'header_left_content',
                        'type' => 'select',
                        'options' => array (
                            'Contact Info' => 'Contact Info',
                            'Social Links' => 'Social Links',
                            'Navigation' => 'Navigation',
                            'Leave Empty' => 'Leave Empty',
                        ),
                        'title' => 'Header Top Left Content',
                        'default' => 'Contact Info',
                    ),
                    array (
                        'desc' => 'Select which content displays in the top right area of the header.',
                        'id' => 'header_right_content',
                        'type' => 'select',
                        'options' => array (
                            'Contact Info' => 'Contact Info',
                            'Social Links' => 'Social Links',
                            'Navigation' => 'Navigation',
                            'Leave Empty' => 'Leave Empty',
                        ),
                        'title' => 'Header Top Right Content',
                        'default' => 'Navigation',
                    ),
                    array (
                        'desc' => 'Select which content displays in the right area of Header 4.',
                        'id' => 'header_v4_content',
                        'type' => 'select',
                        'options' => array (
                            'Tagline' => 'Tagline',
                            'Search' => 'Search',
                            'TaglineAndSearch' => 'Tagline + Search',
                            'Banner' => 'Banner',
                        ),
                        'title' => 'Header Content Area For Header #4',
                        'default' => 'Tagline + Search',
                    ),
                    array (
                        'desc' => 'Add HTML banner code for Header #4. The banner or image will display in Header 4 as long as you have Banner selected for the Header Content Area For Header #4 option above.',
                        'id' => 'header_banner_code',
                        'type' => 'textarea',
                        'title' => 'Banner Code For Header #4',
                    ),
                    array (
                        'desc' => 'Phone number will display in the Contact Info section of your top header.',
                        'id' => 'header_number',
                        'type' => 'text',
                        'title' => 'Header Phone Number',
                        'default' => 'Call Us Today! 1.555.555.555',
                    ),
                    array (
                        'desc' => 'Email address will display in the Contact Info section of your top header.',
                        'id' => 'header_email',
                        'type' => 'text',
                        'title' => 'Header Email Address',
                        'default' => 'info@yourdomain.com',
                    ),
                    array (
                        'desc' => 'Tagline will display on Header 4 as long as you have Tagline selected for the Header Content Area For Header #4 option above.',
                        'id' => 'header_tagline',
                        'type' => 'text',
                        'title' => 'Header Tagline',
                        'default' => 'Insert Any Headline Or Link You Want Here',
                    ),













                    /////////////////////////////////////////////////////////////////////////////////////////
                    array(
                        'id'        => 'opt-textarea',
                        'type'      => 'textarea',
                        'required'  => array('layout', 'equals', '1'),
                        'title'     => __('Tracking Code', 'redux-framework-demo'),
                        'subtitle'  => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'redux-framework-demo'),
                        'validate'  => 'js',
                        'desc'      => 'Validate that it\'s javascript!',
                    ),
                    array(
                        'id'        => 'opt-ace-editor-css',
                        'type'      => 'ace_editor',
                        'title'     => __('CSS Code', 'redux-framework-demo'),
                        'subtitle'  => __('Paste your CSS code here.', 'redux-framework-demo'),
                        'mode'      => 'css',
                        'theme'     => 'monokai',
                        'desc'      => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
                        'default'   => "#header{\nmargin: 0 auto;\n}"
                    ),

                    array(
                        'id'        => 'opt-ace-editor-js',
                        'type'      => 'ace_editor',
                        'title'     => __('JS Code', 'redux-framework-demo'),
                        'subtitle'  => __('Paste your JS code here.', 'redux-framework-demo'),
                        'mode'      => 'javascript',
                        'theme'     => 'chrome',
                        'desc'      => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
                        'default'   => "jQuery(document).ready(function(){\n\n});"
                    ),
                    array(
                        'id'        => 'opt-ace-editor-php',
                        'type'      => 'ace_editor',
                        'title'     => __('PHP Code', 'redux-framework-demo'),
                        'subtitle'  => __('Paste your PHP code here.', 'redux-framework-demo'),
                        'mode'      => 'php',
                        'theme'     => 'chrome',
                        'desc'      => 'Possible modes can be found at <a href="http://ace.c9.io" target="_blank">http://ace.c9.io/</a>.',
                        'default'   => '<?php\nisset ( $redux ) ? true : false;\n?>'
                    ),

                    array(
                        'id'        => 'opt-editor',
                        'type'      => 'editor',
                        'title'     => __('Footer Text', 'redux-framework-demo'),
                        'subtitle'  => __('You can use the following shortcodes in your footer text: [wp-url] [site-url] [theme-url] [login-url] [logout-url] [site-title] [site-tagline] [current-year]', 'redux-framework-demo'),
                        'default'   => 'Powered by Redux Framework.',
                    ),

                    array(
                        'id'        => 'password',
                        'type'      => 'password',
                        'username'  => true,
                        'title'     => 'SMTP Account',
                        //'placeholder' => array('username' => 'Enter your Username')
                    )
                )
            );

            $this->sections[] = array(
                'icon'      => 'el-icon-website',
                'title'     => __('Styling Options', 'redux-framework-demo'),
                'subsection' => true,
                'fields'    => array(
                    array(
                        'id'        => 'opt-select-stylesheet',
                        'type'      => 'select',
                        'title'     => __('Theme Stylesheet', 'redux-framework-demo'),
                        'subtitle'  => __('Select your themes alternative color scheme.', 'redux-framework-demo'),
                        'options'   => array('default.css' => 'default.css', 'color1.css' => 'color1.css'),
                        'default'   => 'default.css',
                    ),
                    array(
                        'id'        => 'opt-color-background',
                        'type'      => 'color',
                        'output'    => array('.site-title'),
                        'title'     => __('Body Background Color', 'redux-framework-demo'),
                        'subtitle'  => __('Pick a background color for the theme (default: #fff).', 'redux-framework-demo'),
                        'default'   => '#FFFFFF',
                        'validate'  => 'color',
                    ),
                    array(
                        'id'        => 'opt-background',
                        'type'      => 'background',
                        'output'    => array('body'),
                        'title'     => __('Body Background', 'redux-framework-demo'),
                        'subtitle'  => __('Body background with image, color, etc.', 'redux-framework-demo'),
                        //'default'   => '#FFFFFF',
                    ),
                    array(
                        'id'        => 'opt-color-footer',
                        'type'      => 'color',
                        'title'     => __('Footer Background Color', 'redux-framework-demo'),
                        'subtitle'  => __('Pick a background color for the footer (default: #dd9933).', 'redux-framework-demo'),
                        'default'   => '#dd9933',
                        'validate'  => 'color',
                    ),
                    array(
                        'id'        => 'opt-color-rgba',
                        'type'      => 'color_rgba',
                        'title'     => __('Color RGBA - BETA', 'redux-framework-demo'),
                        'subtitle'  => __('Gives you the RGBA color. Still quite experimental. Use at your own risk.', 'redux-framework-demo'),
                        'default'   => array('color' => '#dd9933', 'alpha' => '1.0'),
                        'output'    => array('body'),
                        'mode'      => 'background',
                        'validate'  => 'colorrgba',
                    ),
                    array(
                        'id'        => 'opt-color-header',
                        'type'      => 'color_gradient',
                        'title'     => __('Header Gradient Color Option', 'redux-framework-demo'),
                        'subtitle'  => __('Only color validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                        'default'   => array(
                            'from'      => '#1e73be',
                            'to'        => '#00897e'
                        )
                    ),
                    array(
                        'id'        => 'opt-link-color',
                        'type'      => 'link_color',
                        'title'     => __('Links Color Option', 'redux-framework-demo'),
                        'subtitle'  => __('Only color validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                        //'regular'   => false, // Disable Regular Color
                        //'hover'     => false, // Disable Hover Color
                        //'active'    => false, // Disable Active Color
                        //'visited'   => true,  // Enable Visited Color
                        'default'   => array(
                            'regular'   => '#aaa',
                            'hover'     => '#bbb',
                            'active'    => '#ccc',
                        )
                    ),
                    array(
                        'id'        => 'opt-header-border',
                        'type'      => 'border',
                        'title'     => __('Header Border Option', 'redux-framework-demo'),
                        'subtitle'  => __('Only color validation can be done on this field type', 'redux-framework-demo'),
                        'output'    => array('.site-header'), // An array of CSS selectors to apply this font style to
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                        'default'   => array(
                            'border-color'  => '#1e73be',
                            'border-style'  => 'solid',
                            'border-top'    => '3px',
                            'border-right'  => '3px',
                            'border-bottom' => '3px',
                            'border-left'   => '3px'
                        )
                    ),
                    array(
                        'id'            => 'opt-spacing',
                        'type'          => 'spacing',
                        'output'        => array('.site-header'), // An array of CSS selectors to apply this font style to
                        'mode'          => 'margin',    // absolute, padding, margin, defaults to padding
                        'all'           => true,        // Have one field that applies to all
                        //'top'           => false,     // Disable the top
                        //'right'         => false,     // Disable the right
                        //'bottom'        => false,     // Disable the bottom
                        //'left'          => false,     // Disable the left
                        //'units'         => 'em',      // You can specify a unit value. Possible: px, em, %
                        //'units_extended'=> 'true',    // Allow users to select any type of unit
                        //'display_units' => 'false',   // Set to false to hide the units if the units are specified
                        'title'         => __('Padding/Margin Option', 'redux-framework-demo'),
                        'subtitle'      => __('Allow your users to choose the spacing or margin they want.', 'redux-framework-demo'),
                        'desc'          => __('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'redux-framework-demo'),
                        'default'       => array(
                            'margin-top'    => '1px',
                            'margin-right'  => '2px',
                            'margin-bottom' => '3px',
                            'margin-left'   => '4px'
                        )
                    ),
                    array(
                        'id'                => 'opt-dimensions',
                        'type'              => 'dimensions',
                        'units'             => 'em',    // You can specify a unit value. Possible: px, em, %
                        'units_extended'    => 'true',  // Allow users to select any type of unit
                        'title'             => __('Dimensions (Width/Height) Option', 'redux-framework-demo'),
                        'subtitle'          => __('Allow your users to choose width, height, and/or unit.', 'redux-framework-demo'),
                        'desc'              => __('You can enable or disable any piece of this field. Width, Height, or Units.', 'redux-framework-demo'),
                        'default'           => array(
                            'width'     => 200,
                            'height'    => 100,
                        )
                    ),
                    array(
                        'id'        => 'opt-typography-body',
                        'type'      => 'typography',
                        'title'     => __('Body Font', 'redux-framework-demo'),
                        'subtitle'  => __('Specify the body font properties.', 'redux-framework-demo'),
                        'google'    => true,
                        'default'   => array(
                            'color'         => '#dd9933',
                            'font-size'     => '30px',
                            'font-family'   => 'Arial,Helvetica,sans-serif',
                            'font-weight'   => 'Normal',
                        ),
                    ),
                    array(
                        'id'        => 'opt-custom-css',
                        'type'      => 'textarea',
                        'title'     => __('Custom CSS', 'redux-framework-demo'),
                        'subtitle'  => __('Quickly add some CSS to your theme by adding it to this block.', 'redux-framework-demo'),
                        'desc'      => __('This field is even CSS validated!', 'redux-framework-demo'),
                        'validate'  => 'css',
                    ),
                    array(
                        'id'        => 'opt-custom-html',
                        'type'      => 'textarea',
                        'title'     => __('Custom HTML', 'redux-framework-demo'),
                        'subtitle'  => __('Just like a text box widget.', 'redux-framework-demo'),
                        'desc'      => __('This field is even HTML validated!', 'redux-framework-demo'),
                        'validate'  => 'html',
                    ),
                )
            );




            /*




            $this->sections = array (
        array (
            'title' => 'General',
            'fields' => array (
                array (
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(6) {
        ["desc"]=>
        string(442) "Importing demo content will give you sliders, pages, posts, theme options, widgets, sidebars and other settings. This will replicate the live demo.	Please make sure you have the Aione Core, Layer Slider, Revolution Slider and PORTFOLIO plugins installed and activated to receive that portion of the content. WARNING: clicking this button will replace your current theme options, sliders and widgets. It can also take a minute to complete."
        ["id"]=>
        string(9) "demo_data"
        ["btntext"]=>
        string(19) "Import Demo Content"
        ["type"]=>
        string(6) "button"
        ["title"]=>
        string(19) "Import Demo Content"
        ["default"]=>
        string(90) "http://localhost/darlic/wp-admin/themes.php?page=optionsframework&import_data_content=true"
    }
    </pre>',
                    'id' => 'demo_data',
                    'btntext' => 'Import Demo Content',
                    'type' => 'info',
                    'title' => 'Import Demo Content',
                    'default' => 'http://localhost/darlic/wp-admin/themes.php?page=optionsframework&import_data_content=true',
                    'raw_html' => true,
                ),
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
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Header',
            'fields' => array (
                array (
                    'id' => 'header_info',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Header Content Options</h3>',
                ),
                array (
                    'id' => 'header_layout',
                    'type' => 'image_select',
                    'options' => array (
                        'v1' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header1.jpg',
                        'v2' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header2.jpg',
                        'v3' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header3.jpg',
                        'v4' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header4.jpg',
                        'v5' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/header5.jpg',
                    ),
                    'title' => 'Select a Header Layout',
                    'default' => 'v1',
                ),
                array (
                    'desc' => 'Check this box to enable a transparent header that will display your slider behind it.',
                    'id' => 'header_transparent',
                    'type' => 'checkbox',
                    'title' => 'Transparent Header',
                ),
                array (
                    'desc' => 'Select if the slider shows below or above the header. This only works for the slider assigned in page options, not with shortcodes.',
                    'id' => 'slider_position',
                    'type' => 'select',
                    'options' => array (
                        'Below' => 'Below',
                        'Above' => 'Above',
                    ),
                    'title' => 'Slider Position',
                    'default' => 'Below',
                ),
                array (
                    'desc' => 'Select which content displays in the top left area of the header.',
                    'id' => 'header_left_content',
                    'type' => 'select',
                    'options' => array (
                        'Contact Info' => 'Contact Info',
                        'Social Links' => 'Social Links',
                        'Navigation' => 'Navigation',
                        'Leave Empty' => 'Leave Empty',
                    ),
                    'title' => 'Header Top Left Content',
                    'default' => 'Contact Info',
                ),
                array (
                    'desc' => 'Select which content displays in the top right area of the header.',
                    'id' => 'header_right_content',
                    'type' => 'select',
                    'options' => array (
                        'Contact Info' => 'Contact Info',
                        'Social Links' => 'Social Links',
                        'Navigation' => 'Navigation',
                        'Leave Empty' => 'Leave Empty',
                    ),
                    'title' => 'Header Top Right Content',
                    'default' => 'Navigation',
                ),
                array (
                    'desc' => 'Select which content displays in the right area of Header 4.',
                    'id' => 'header_v4_content',
                    'type' => 'select',
                    'options' => array (
                        'Tagline' => 'Tagline',
                        'Search' => 'Search',
                        'TaglineAndSearch' => 'Tagline + Search',
                        'Banner' => 'Banner',
                    ),
                    'title' => 'Header Content Area For Header #4',
                    'default' => 'Tagline + Search',
                ),
                array (
                    'desc' => 'Add HTML banner code for Header #4. The banner or image will display in Header 4 as long as you have Banner selected for the Header Content Area For Header #4 option above.',
                    'id' => 'header_banner_code',
                    'type' => 'textarea',
                    'title' => 'Banner Code For Header #4',
                ),
                array (
                    'desc' => 'Phone number will display in the Contact Info section of your top header.',
                    'id' => 'header_number',
                    'type' => 'text',
                    'title' => 'Header Phone Number',
                    'default' => 'Call Us Today! 1.555.555.555',
                ),
                array (
                    'desc' => 'Email address will display in the Contact Info section of your top header.',
                    'id' => 'header_email',
                    'type' => 'text',
                    'title' => 'Header Email Address',
                    'default' => 'info@yourdomain.com',
                ),
                array (
                    'desc' => 'Tagline will display on Header 4 as long as you have Tagline selected for the Header Content Area For Header #4 option above.',
                    'id' => 'header_tagline',
                    'type' => 'text',
                    'title' => 'Header Tagline',
                    'default' => 'Insert Any Headline Or Link You Want Here',
                ),
                array (
                    'id' => 'header_info',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Header Background</h3>',
                ),
                array (
                    'desc' => 'Select an image or insert an image url to use for the header background.',
                    'id' => 'header_bg_image',
                    'type' => 'media',
                    'title' => 'Background Image For Header Area',
                    'url' => true,
                ),
                array (
                    'desc' => 'Check this box to have the header background image display at 100% in width and height and scale according to the browser size.',
                    'id' => 'header_bg_full',
                    'type' => 'checkbox',
                    'title' => '100% Background Image',
                ),
                array (
                    'desc' => 'Check this box to enable parallax background image when scrolling.',
                    'id' => 'header_bg_parallax',
                    'type' => 'checkbox',
                    'title' => 'Parallax Background Image',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Select how the background image repeats.',
                    'id' => 'header_bg_repeat',
                    'type' => 'select',
                    'options' => array (
                        'repeat' => 'repeat',
                        'repeat-x' => 'repeat-x',
                        'repeat-y' => 'repeat-y',
                        'no-repeat' => 'no-repeat',
                    ),
                    'title' => 'Background Repeat',
                ),
                array (
                    'desc' => 'In pixels, ex: 10px',
                    'id' => 'margin_header_top',
                    'type' => 'text',
                    'title' => 'Header Top Padding',
                    'default' => '0px',
                ),
                array (
                    'desc' => 'In pixels, ex: 10px',
                    'id' => 'margin_header_bottom',
                    'type' => 'text',
                    'title' => 'Header Bottom Padding',
                    'default' => '0px',
                ),
                array (
                    'id' => 'header_info',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Header Social Icons</h3>',
                ),
                array (
                    'desc' => 'Select a custom social icon color.',
                    'id' => 'header_social_links_icon_color',
                    'type' => 'color',
                    'title' => 'Header Social Icons Custom Color',
                    'default' => '#bebdbd',
                ),
                array (
                    'desc' => 'Controls the color of the social icons in the footer.',
                    'id' => 'header_social_links_boxed',
                    'type' => 'select',
                    'options' => array (
                        'No' => 'No',
                        'Yes' => 'Yes',
                    ),
                    'title' => 'Header Social Icons Boxed',
                    'default' => 'No',
                ),
                array (
                    'desc' => 'Select a custom social icon box color.',
                    'id' => 'header_social_links_box_color',
                    'type' => 'color',
                    'title' => 'Header Social Icons Custom Box Color',
                    'default' => '#e8e8e8',
                ),
                array (
                    'desc' => 'Boxradius for the social icons. In pixels, ex: 4px.',
                    'id' => 'header_social_links_boxed_radius',
                    'type' => 'text',
                    'title' => 'Header Social Icons Boxed Radius',
                    'default' => '4px',
                ),
                array (
                    'desc' => 'Controls the tooltip position of the social icons in the footer.',
                    'id' => 'header_social_links_tooltip_placement',
                    'type' => 'select',
                    'options' => array (
                        'Top' => 'Top',
                        'Right' => 'Right',
                        'Bottom' => 'Bottom',
                        'Left' => 'Left',
                        'None' => 'None',
                    ),
                    'title' => 'Header Social Icons Tooltip Position',
                    'default' => 'Bottom',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Sticky Header',
            'fields' => array (
                array (
                    'id' => 'sticky_header_info',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Sticky Header Options</h3>',
                ),
                array (
                    'desc' => 'Check to enable a fixed header when scrolling, uncheck to disable.',
                    'id' => 'header_sticky',
                    'type' => 'checkbox',
                    'title' => 'Enable Sticky Header',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check to enable a fixed header when scrolling on tablets, uncheck to disable.',
                    'id' => 'header_sticky_tablet',
                    'type' => 'checkbox',
                    'title' => 'Enable Sticky Header on Tablets',
                ),
                array (
                    'desc' => 'Check to enable a fixed header when scrolling on mobiles, uncheck to disable.',
                    'id' => 'header_sticky_mobile',
                    'type' => 'checkbox',
                    'title' => 'Enable Sticky Header on Mobiles',
                ),
                array (
                    'desc' => 'Header v2 - v5 only. Set the opacity of background, <br />0.1 (lowest) to 1 (highest).',
                    'id' => 'header_sticky_opacity',
                    'type' => 'text',
                    'title' => 'Sticky Header Opacity',
                    'default' => '0.97',
                ),
                array (
                    'desc' => 'Controls the space between each menu item in the sticky header. Use a number without \'px\', default is 35. ex: 35',
                    'id' => 'header_sticky_nav_padding',
                    'type' => 'text',
                    'title' => 'Sticky Header Menu Item Padding',
                ),
                array (
                    'desc' => 'Controls the font size of the menu items in the sticky header. Use a number without \'px\', default is 14. ex: 14',
                    'id' => 'header_sticky_nav_font_size',
                    'type' => 'text',
                    'title' => 'Sticky Header Navigation Font Size',
                ),
                array (
                    'desc' => 'Controls the max-width of the sticky header logo. If your logo is too large and does not allow the menu to fit on one line, then use this option and insert a smaller width for your logo. ex: 120',
                    'id' => 'header_sticky_logo_max_width',
                    'type' => 'text',
                    'title' => 'Sticky Header Logo Width',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Logo',
            'fields' => array (
                array (
                    'id' => 'header_info',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Logo Options</h3>',
                ),
                array (
                    'desc' => 'Select an image file for your logo.',
                    'id' => 'logo',
                    'type' => 'media',
                    'title' => 'Logo',
                    'default' => array (
                        'url' => 'http://localhost/darlic/wp-content/themes/aione/images/logo.png',
                    ),
                    'url' => true,
                ),
                array (
                    'desc' => 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.',
                    'id' => 'logo_retina',
                    'type' => 'media',
                    'title' => 'Logo (Retina Version @2x)',
                    'url' => true,
                ),
                array (
                    'desc' => 'If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width.',
                    'id' => 'retina_logo_width',
                    'type' => 'text',
                    'title' => 'Standard Logo Width for Retina Logo',
                ),
                array (
                    'desc' => 'If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height.',
                    'id' => 'retina_logo_height',
                    'type' => 'text',
                    'title' => 'Standard Logo Height for Retina Logo',
                ),
                array (
                    'desc' => 'Note: center only works on Header 5.',
                    'id' => 'logo_alignment',
                    'type' => 'select',
                    'options' => array (
                        'Left' => 'Left',
                        'Center' => 'Center',
                        'Right' => 'Right',
                    ),
                    'title' => 'Logo Alignment',
                    'default' => 'Left',
                ),
                array (
                    'desc' => 'In pixels, ex: 10px',
                    'id' => 'margin_logo_left',
                    'type' => 'text',
                    'title' => 'Logo Left Margin',
                    'default' => '0px',
                ),
                array (
                    'desc' => 'In pixels, ex: 10px',
                    'id' => 'margin_logo_right',
                    'type' => 'text',
                    'title' => 'Logo Right Margin',
                    'default' => '0px',
                ),
                array (
                    'desc' => 'In pixels, ex: 10px',
                    'id' => 'margin_logo_top',
                    'type' => 'text',
                    'title' => 'Logo Top Margin',
                    'default' => '31px',
                ),
                array (
                    'desc' => 'In pixels, ex: 10px',
                    'id' => 'margin_logo_bottom',
                    'type' => 'text',
                    'title' => 'Logo Bottom Margin',
                    'default' => '31px',
                ),
                array (
                    'id' => 'favicons',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Favicon Options</h3>',
                ),
                array (
                    'desc' => 'Favicon for your website (16px x 16px).',
                    'id' => 'favicon',
                    'type' => 'media',
                    'title' => 'Favicon',
                    'url' => true,
                ),
                array (
                    'desc' => 'Favicon for Apple iPhone (57px x 57px).',
                    'id' => 'iphone_icon',
                    'type' => 'media',
                    'title' => 'Apple iPhone Icon Upload',
                    'url' => true,
                ),
                array (
                    'desc' => 'Favicon for Apple iPhone Retina Version (114px x 114px).',
                    'id' => 'iphone_icon_retina',
                    'type' => 'media',
                    'title' => 'Apple iPhone Retina Icon Upload',
                    'url' => true,
                ),
                array (
                    'desc' => 'Favicon for Apple iPad (72px x 72px).',
                    'id' => 'ipad_icon',
                    'type' => 'media',
                    'title' => 'Apple iPad Icon Upload',
                    'url' => true,
                ),
                array (
                    'desc' => 'Favicon for Apple iPad Retina Version (144px x 144px).',
                    'id' => 'ipad_icon_retina',
                    'type' => 'media',
                    'title' => 'Apple iPad Retina Icon Upload',
                    'url' => true,
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Menu',
            'fields' => array (
                array (
                    'id' => 'header_info',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Menu Options</h3>',
                ),
                array (
                    'desc' => 'Use a number without \'px\', default is 83. ex: 83',
                    'id' => 'nav_height',
                    'type' => 'text',
                    'title' => 'Main Nav Height',
                    'default' => '83',

                ),
                array (
                    'desc' => 'Use a number without \'px\', default is 35. ex: 35',
                    'id' => 'nav_padding',
                    'type' => 'text',
                    'title' => 'Menu Item Padding',
                    'default' => '35',
                ),
                array (
                    'desc' => 'In pixels, ex: 170px',
                    'id' => 'dropdown_menu_width',
                    'type' => 'text',
                    'title' => 'Main Menu Dropdown Width',
                    'default' => '170px',
                ),
                array (
                    'desc' => 'In pixels, ex: 100px',
                    'id' => 'topmenu_dropwdown_width',
                    'type' => 'text',
                    'title' => 'Top Menu Dropdown Width',
                    'default' => '100px',
                ),
                array (
                    'desc' => 'Set the font size for mega menu column titles (menu 2nd level labels). In pixels, ex: 18px',
                    'id' => 'megamenu_title_size',
                    'type' => 'text',
                    'title' => 'Mega Menu Column Title Size',
                    'default' => '18px',
                ),
                array (
                    'desc' => 'Check to enable the search icon in the menu, uncheck to disable.',
                    'id' => 'main_nav_search_icon',
                    'type' => 'checkbox',
                    'title' => 'Show Search Icon in Main Nav?',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check to enable a circle border on the main menu cart and search icons.',
                    'id' => 'main_nav_icon_circle',
                    'type' => 'checkbox',
                    'title' => 'Enable Circle Border On Menu Icons',
                ),
                array (
                    'desc' => 'Check to group submenu to slideout elements on mobile menu.',
                    'id' => 'mobile_nav_submenu_slideout',
                    'type' => 'checkbox',
                    'title' => 'Mobile Menu Submenu Slide Outs',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Page Title Bar',
            'fields' => array (
                array (
                    'id' => 'header_info',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Page Title Bar Options</h3>',
                ),
                array (
                    'desc' => 'Check the box to show the page title bar. This is a global option for every page or post, and this can be overridden by individual page/post options.',
                    'id' => 'page_title_bar',
                    'type' => 'checkbox',
                    'title' => 'Page Title Bar',
                    'default' => 1,
                ),
                array (
                    'desc' => 'In pixels, ex: 10px',
                    'id' => 'page_title_height',
                    'type' => 'text',
                    'title' => 'Page Title Bar Height',
                    'default' => '87px',
                ),
                array (
                    'desc' => 'Select an image or insert an image url to use for the page title bar background.',
                    'id' => 'page_title_bg',
                    'type' => 'media',
                    'title' => 'Page Title Bar Background',
                    'default' => array (
                        'url' => 'http://localhost/darlic/wp-content/themes/aione/images/page_title_bg.png',
                    ),
                    'url' => true,
                ),
                array (
                    'desc' => 'Select an image or insert an image url to use for the retina page title bar background.',
                    'id' => 'page_title_bg_retina',
                    'type' => 'media',
                    'title' => 'Page Title Bar Background (Retina Version @2x)',
                    'url' => true,
                ),
                array (
                    'desc' => 'Check this box to have the page title bar background image display at 100% in width and height and scale according to the browser size.',
                    'id' => 'page_title_bg_full',
                    'type' => 'checkbox',
                    'title' => '100% Background Image',
                ),
                array (
                    'desc' => 'Check to enable parallax background image when scrolling.',
                    'id' => 'page_title_bg_parallax',
                    'type' => 'checkbox',
                    'title' => 'Parallax Background Image',
                ),
                array (
                    'id' => 'header_info',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Breadcrumb Options</h3>',
                ),
                array (
                    'desc' => 'Check to display the breadcrumbs or search bar in general. Uncheck to hide them.',
                    'id' => 'breadcrumb',
                    'type' => 'checkbox',
                    'title' => 'Display Breadcrumbs/Search Bar',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Choose to display breadcrumbs or search box in the page title bar.',
                    'id' => 'page_title_bar_bs',
                    'options' => array (
                        'Breadcrumbs' => 'Breadcrumbs',
                        'Search Box' => 'Search Box',
                    ),
                    'type' => 'select',
                    'title' => 'Breadcrumbs or Search Box?',
                    'default' => 'Breadcrumbs',
                ),
                array (
                    'desc' => 'Check to display breadcrumbs on mobile devices.',
                    'id' => 'breadcrumb_mobile',
                    'type' => 'checkbox',
                    'title' => 'Breadcrumbs on Mobile Devices',
                ),
                array (
                    'desc' => 'The text before the breadcrumb menu.',
                    'id' => 'breacrumb_prefix',
                    'type' => 'text',
                    'title' => 'Breadcrumb Menu Prefix',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Sliding Bar',
            'fields' => array (
                array (
                    'id' => 'sliding_bar',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Sliding Bar Options</h3>',
                ),
                array (
                    'desc' => 'Check to enable the top Sliding Bar.',
                    'id' => 'slidingbar_widgets',
                    'type' => 'checkbox',
                    'title' => 'Enable Sliding Bar',
                ),
                array (
                    'desc' => 'Check to disable the top Sliding Bar on mobile devices.',
                    'id' => 'mobile_slidingbar_widgets',
                    'type' => 'checkbox',
                    'title' => 'Disable Sliding Bar On Mobile',
                ),
                array (
                    'desc' => 'Check to enable a top border on the Sliding Bar.',
                    'id' => 'slidingbar_top_border',
                    'type' => 'checkbox',
                    'title' => 'Enable Top Border on Sliding Bar',
                ),
                array (
                    'desc' => 'Check the box to enable transparency on the Sliding Bar.',
                    'id' => 'slidingbar_bg_color_transparency',
                    'type' => 'checkbox',
                    'title' => 'Enable Transparency on the Sliding Bar',
                ),
                array (
                    'desc' => 'Check the box to have the sliding bar open when the page loads.',
                    'id' => 'slidingbar_open_on_load',
                    'type' => 'checkbox',
                    'title' => 'Sliding Bar Open On Page Load',
                ),
                array (
                    'desc' => 'Select the number of columns to display in the Sliding Bar.',
                    'id' => 'slidingbar_widgets_columns',
                    'options' => array (
                        1 => '1',
                        2 => '2',
                        3 => '3',
                        4 => '4',
                    ),
                    'type' => 'select',
                    'title' => 'Number of Sliding Bar Columns',
                    'default' => '4',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Footer',
            'fields' => array (
                array (
                    'id' => 'footer_widgets_area_title',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Footer Widgets Area Options</h3>',
                ),
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
                    'desc' => 'Select an image or insert an image url to use for the footer widget area backgroud.',
                    'id' => 'footerw_bg_image',
                    'type' => 'media',
                    'title' => 'Background Image For Footer Area',
                    'url' => true,
                ),
                array (
                    'desc' => 'Check this box to have the footer background image display at 100% in width and height and scale according to the browser size.',
                    'id' => 'footerw_bg_full',
                    'type' => 'checkbox',
                    'title' => '100% Background Image',
                ),
                array (
                    'desc' => 'Check to enable parallax background image when scrolling.',
                    'id' => 'footer_area_bg_parallax',
                    'type' => 'checkbox',
                    'title' => 'Parallax Background Image',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Select how the background image repeats.',
                    'id' => 'footerw_bg_repeat',
                    'type' => 'select',
                    'options' => array (
                        'repeat' => 'repeat',
                        'repeat-x' => 'repeat-x',
                        'repeat-y' => 'repeat-y',
                        'no-repeat' => 'no-repeat',
                    ),
                    'title' => 'Background Repeat',
                ),
                array (
                    'desc' => 'Select the position from where background image starts.',
                    'id' => 'footerw_bg_pos',
                    'type' => 'select',
                    'options' => array (
                        0 => 'top left',
                        1 => 'top center',
                        2 => 'top right',
                        3 => 'center left',
                        4 => 'center center',
                        5 => 'center right',
                        6 => 'bottom left',
                        7 => 'bottom center',
                        8 => 'bottom right',
                    ),
                    'title' => 'Background Position',
                    'default' => 'center center',
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
                ),
                array (
                    'id' => 'copyright_area_title',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Copyright Options</h3>',
                ),
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
                ),
                array (
                    'id' => 'footer_social_icon_title',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Social Icon Options</h3>',
                ),
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
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Background',
            'fields' => array (
                array (
                    'desc' => 'Select boxed or wide layout.',
                    'id' => 'layout',
                    'type' => 'select',
                    'options' => array (
                        'Boxed' => 'Boxed',
                        'Wide' => 'Wide',
                    ),
                    'title' => 'Layout',
                    'default' => 'Wide',
                ),
                array (
                    'id' => 'boxed_mode_only',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Background options below only work in boxed mode</h3>',
                ),
                array (
                    'desc' => 'Select an image or insert an image url to use for the backgroud.',
                    'id' => 'bg_image',
                    'type' => 'media',
                    'title' => 'Background Image For Outer Areas In Boxed Mode',
                    'url' => true,
                ),
                array (
                    'desc' => 'Check this box to have the background image display at 100% in width and height and scale according to the browser size.',
                    'id' => 'bg_full',
                    'type' => 'checkbox',
                    'title' => '100% Background Image',
                ),
                array (
                    'desc' => 'Select how the background image repeats.',
                    'id' => 'bg_repeat',
                    'type' => 'select',
                    'options' => array (
                        'repeat' => 'repeat',
                        'repeat-x' => 'repeat-x',
                        'repeat-y' => 'repeat-y',
                        'no-repeat' => 'no-repeat',
                    ),
                    'title' => 'Background Repeat',
                ),
                array (
                    'desc' => 'Select a background color.',
                    'id' => 'bg_color',
                    'type' => 'color',
                    'title' => 'Background Color For Outer Areas In Boxed Mode',
                    'default' => '#d7d6d6',
                ),
                array (
                    'desc' => 'Check the box to display a pattern in the background. If checked, select the pattern from below.',
                    'id' => 'bg_pattern_option',
                    'type' => 'checkbox',
                    'title' => 'Background Pattern',
                ),
                array (
                    'id' => 'bg_pattern',
                    'type' => 'image_select',
                    'options' => array (
                        'pattern1' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern1.png',
                        'pattern2' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern2.png',
                        'pattern3' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern3.png',
                        'pattern4' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern4.png',
                        'pattern5' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern5.png',
                        'pattern6' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern6.png',
                        'pattern7' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern7.png',
                        'pattern8' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern8.png',
                        'pattern9' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern9.png',
                        'pattern10' => 'http://localhost/darlic/wp-content/themes/aione/images/patterns/pattern10.png',
                    ),
                    'title' => 'Select a Background Pattern',
                    'default' => 'pattern1',
                    'tiles' => true,
                ),
                array (
                    'id' => 'both_modes_only',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Background Options Below Work For Boxed & Wide Mode</h3>',
                ),
                array (
                    'desc' => 'Select an image or insert an image url to use for the main content area backgroud.',
                    'id' => 'content_bg_image',
                    'type' => 'media',
                    'title' => 'Background Image For Main Content Area',
                    'url' => true,
                ),
                array (
                    'desc' => 'Check this box to have the background image display at 100% in width and height and scale according to the browser size.',
                    'id' => 'content_bg_full',
                    'type' => 'checkbox',
                    'title' => '100% Background Image',
                ),
                array (
                    'desc' => 'Select how the background image repeats.',
                    'id' => 'content_bg_repeat',
                    'type' => 'select',
                    'options' => array (
                        'repeat' => 'repeat',
                        'repeat-x' => 'repeat-x',
                        'repeat-y' => 'repeat-y',
                        'no-repeat' => 'no-repeat',
                    ),
                    'title' => 'Background Repeat',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Typography',
            'fields' => array (
                array (
                    'id' => 'custom_heading_font',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Custom Nav / Headings Font',
                    'default' => '<h3 style=\'margin: 0;\'>Custom Font For Menus And Headings.</h3><p style=\'margin-bottom:0;\'>This will override the google / standard font options. All 4 files are required.</p>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(19) "custom_heading_font"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(26) "Custom Nav / Headings Font"
        ["default"]=>
        string(175) "<h3 style=\'margin: 0;\'>Custom Font For Menus And Headings.</h3><p style=\'margin-bottom:0;\'>This will override the google / standard font options. All 4 files are required.</p>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Upload the .woff font file.',
                    'id' => 'custom_font_woff',
                    'type' => 'media',
                    'title' => 'Custom Font .woff',
                    'url' => true,
                ),
                array (
                    'desc' => 'Upload the .ttf font file.',
                    'id' => 'custom_font_ttf',
                    'type' => 'media',
                    'title' => 'Custom Font .ttf',
                    'url' => true,
                ),
                array (
                    'desc' => 'Upload the .svg font file.',
                    'id' => 'custom_font_svg',
                    'type' => 'media',
                    'title' => 'Custom Font .svg',
                    'url' => true,
                ),
                array (
                    'desc' => 'Upload the .eot font file.',
                    'id' => 'custom_font_eot',
                    'type' => 'media',
                    'title' => 'Custom Font .eot',
                    'url' => true,
                ),
                array (
                    'id' => 'custom_heading_font',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Custom Nav / Headings Font',
                    'default' => '<h3 style=\'margin: 0;\'>Custom Font For Menus And Headings.</h3><p style=\'margin-bottom:0;\'>This will override the google / standard font options. All 4 files are required.</p>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(19) "custom_heading_font"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(26) "Custom Nav / Headings Font"
        ["default"]=>
        string(175) "<h3 style=\'margin: 0;\'>Custom Font For Menus And Headings.</h3><p style=\'margin-bottom:0;\'>This will override the google / standard font options. All 4 files are required.</p>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'google_fonts_intro',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Google Fonts',
                    'default' => '<h3 style=\'margin: 0;\'>Google Fonts</h3><p style=\'margin-bottom:0;\'>This will override standard font options.</p>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(18) "google_fonts_intro"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(12) "Google Fonts"
        ["default"]=>
        string(113) "<h3 style=\'margin: 0;\'>Google Fonts</h3><p style=\'margin-bottom:0;\'>This will override standard font options.</p>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Select a font family for body text',
                    'id' => 'google_body',
                    'type' => 'select',
                    'options' => array (
                        'Select Font' => 'Select Font',
                        'ABeeZee' => 'ABeeZee',
                        'Abel' => 'Abel',
                        'Abril Fatface' => 'Abril Fatface',
                        'Aclonica' => 'Aclonica',
                        'Acme' => 'Acme',
                        'Actor' => 'Actor',
                        'Adamina' => 'Adamina',
                        'Advent Pro' => 'Advent Pro',
                        'Aguafina Script' => 'Aguafina Script',
                        'Akronim' => 'Akronim',
                        'Aladin' => 'Aladin',
                        'Aldrich' => 'Aldrich',
                        'Alef' => 'Alef',
                        'Alegreya' => 'Alegreya',
                        'Alegreya SC' => 'Alegreya SC',
                        'Alegreya Sans' => 'Alegreya Sans',
                        'Alegreya Sans SC' => 'Alegreya Sans SC',
                        'Alex Brush' => 'Alex Brush',
                        'Alfa Slab One' => 'Alfa Slab One',
                        'Alice' => 'Alice',
                        'Alike' => 'Alike',
                        'Alike Angular' => 'Alike Angular',
                        'Allan' => 'Allan',
                        'Allerta' => 'Allerta',
                        'Allerta Stencil' => 'Allerta Stencil',
                        'Allura' => 'Allura',
                        'Almendra' => 'Almendra',
                        'Almendra Display' => 'Almendra Display',
                        'Almendra SC' => 'Almendra SC',
                        'Amarante' => 'Amarante',
                        'Amaranth' => 'Amaranth',
                        'Amatic SC' => 'Amatic SC',
                        'Amethysta' => 'Amethysta',
                        'Anaheim' => 'Anaheim',
                        'Andada' => 'Andada',
                        'Andika' => 'Andika',
                        'Angkor' => 'Angkor',
                        'Annie Use Your Telescope' => 'Annie Use Your Telescope',
                        'Anonymous Pro' => 'Anonymous Pro',
                        'Antic' => 'Antic',
                        'Antic Didone' => 'Antic Didone',
                        'Antic Slab' => 'Antic Slab',
                        'Anton' => 'Anton',
                        'Arapey' => 'Arapey',
                        'Arbutus' => 'Arbutus',
                        'Arbutus Slab' => 'Arbutus Slab',
                        'Architects Daughter' => 'Architects Daughter',
                        'Archivo Black' => 'Archivo Black',
                        'Archivo Narrow' => 'Archivo Narrow',
                        'Arimo' => 'Arimo',
                        'Arizonia' => 'Arizonia',
                        'Armata' => 'Armata',
                        'Artifika' => 'Artifika',
                        'Arvo' => 'Arvo',
                        'Asap' => 'Asap',
                        'Asset' => 'Asset',
                        'Astloch' => 'Astloch',
                        'Asul' => 'Asul',
                        'Atomic Age' => 'Atomic Age',
                        'Aubrey' => 'Aubrey',
                        'Audiowide' => 'Audiowide',
                        'Autour One' => 'Autour One',
                        'Average' => 'Average',
                        'Average Sans' => 'Average Sans',
                        'Averia Gruesa Libre' => 'Averia Gruesa Libre',
                        'Averia Libre' => 'Averia Libre',
                        'Averia Sans Libre' => 'Averia Sans Libre',
                        'Averia Serif Libre' => 'Averia Serif Libre',
                        'Bad Script' => 'Bad Script',
                        'Balthazar' => 'Balthazar',
                        'Bangers' => 'Bangers',
                        'Basic' => 'Basic',
                        'Battambang' => 'Battambang',
                        'Baumans' => 'Baumans',
                        'Bayon' => 'Bayon',
                        'Belgrano' => 'Belgrano',
                        'Belleza' => 'Belleza',
                        'BenchNine' => 'BenchNine',
                        'Bentham' => 'Bentham',
                        'Berkshire Swash' => 'Berkshire Swash',
                        'Bevan' => 'Bevan',
                        'Bigelow Rules' => 'Bigelow Rules',
                        'Bigshot One' => 'Bigshot One',
                        'Bilbo' => 'Bilbo',
                        'Bilbo Swash Caps' => 'Bilbo Swash Caps',
                        'Bitter' => 'Bitter',
                        'Black Ops One' => 'Black Ops One',
                        'Bokor' => 'Bokor',
                        'Bonbon' => 'Bonbon',
                        'Boogaloo' => 'Boogaloo',
                        'Bowlby One' => 'Bowlby One',
                        'Bowlby One SC' => 'Bowlby One SC',
                        'Brawler' => 'Brawler',
                        'Bree Serif' => 'Bree Serif',
                        'Bubblegum Sans' => 'Bubblegum Sans',
                        'Bubbler One' => 'Bubbler One',
                        'Buda' => 'Buda',
                        'Buenard' => 'Buenard',
                        'Butcherman' => 'Butcherman',
                        'Butterfly Kids' => 'Butterfly Kids',
                        'Cabin' => 'Cabin',
                        'Cabin Condensed' => 'Cabin Condensed',
                        'Cabin Sketch' => 'Cabin Sketch',
                        'Caesar Dressing' => 'Caesar Dressing',
                        'Cagliostro' => 'Cagliostro',
                        'Calligraffitti' => 'Calligraffitti',
                        'Cambo' => 'Cambo',
                        'Candal' => 'Candal',
                        'Cantarell' => 'Cantarell',
                        'Cantata One' => 'Cantata One',
                        'Cantora One' => 'Cantora One',
                        'Capriola' => 'Capriola',
                        'Cardo' => 'Cardo',
                        'Carme' => 'Carme',
                        'Carrois Gothic' => 'Carrois Gothic',
                        'Carrois Gothic SC' => 'Carrois Gothic SC',
                        'Carter One' => 'Carter One',
                        'Caudex' => 'Caudex',
                        'Cedarville Cursive' => 'Cedarville Cursive',
                        'Ceviche One' => 'Ceviche One',
                        'Changa One' => 'Changa One',
                        'Chango' => 'Chango',
                        'Chau Philomene One' => 'Chau Philomene One',
                        'Chela One' => 'Chela One',
                        'Chelsea Market' => 'Chelsea Market',
                        'Chenla' => 'Chenla',
                        'Cherry Cream Soda' => 'Cherry Cream Soda',
                        'Cherry Swash' => 'Cherry Swash',
                        'Chewy' => 'Chewy',
                        'Chicle' => 'Chicle',
                        'Chivo' => 'Chivo',
                        'Cinzel' => 'Cinzel',
                        'Cinzel Decorative' => 'Cinzel Decorative',
                        'Clicker Script' => 'Clicker Script',
                        'Coda' => 'Coda',
                        'Coda Caption' => 'Coda Caption',
                        'Codystar' => 'Codystar',
                        'Combo' => 'Combo',
                        'Comfortaa' => 'Comfortaa',
                        'Coming Soon' => 'Coming Soon',
                        'Concert One' => 'Concert One',
                        'Condiment' => 'Condiment',
                        'Content' => 'Content',
                        'Contrail One' => 'Contrail One',
                        'Convergence' => 'Convergence',
                        'Cookie' => 'Cookie',
                        'Copse' => 'Copse',
                        'Corben' => 'Corben',
                        'Courgette' => 'Courgette',
                        'Cousine' => 'Cousine',
                        'Coustard' => 'Coustard',
                        'Covered By Your Grace' => 'Covered By Your Grace',
                        'Crafty Girls' => 'Crafty Girls',
                        'Creepster' => 'Creepster',
                        'Crete Round' => 'Crete Round',
                        'Crimson Text' => 'Crimson Text',
                        'Croissant One' => 'Croissant One',
                        'Crushed' => 'Crushed',
                        'Cuprum' => 'Cuprum',
                        'Cutive' => 'Cutive',
                        'Cutive Mono' => 'Cutive Mono',
                        'Damion' => 'Damion',
                        'Dancing Script' => 'Dancing Script',
                        'Dangrek' => 'Dangrek',
                        'Dawning of a New Day' => 'Dawning of a New Day',
                        'Days One' => 'Days One',
                        'Delius' => 'Delius',
                        'Delius Swash Caps' => 'Delius Swash Caps',
                        'Delius Unicase' => 'Delius Unicase',
                        'Della Respira' => 'Della Respira',
                        'Denk One' => 'Denk One',
                        'Devonshire' => 'Devonshire',
                        'Didact Gothic' => 'Didact Gothic',
                        'Diplomata' => 'Diplomata',
                        'Diplomata SC' => 'Diplomata SC',
                        'Domine' => 'Domine',
                        'Donegal One' => 'Donegal One',
                        'Doppio One' => 'Doppio One',
                        'Dorsa' => 'Dorsa',
                        'Dosis' => 'Dosis',
                        'Dr Sugiyama' => 'Dr Sugiyama',
                        'Droid Sans' => 'Droid Sans',
                        'Droid Sans Mono' => 'Droid Sans Mono',
                        'Droid Serif' => 'Droid Serif',
                        'Duru Sans' => 'Duru Sans',
                        'Dynalight' => 'Dynalight',
                        'EB Garamond' => 'EB Garamond',
                        'Eagle Lake' => 'Eagle Lake',
                        'Eater' => 'Eater',
                        'Economica' => 'Economica',
                        'Electrolize' => 'Electrolize',
                        'Elsie' => 'Elsie',
                        'Elsie Swash Caps' => 'Elsie Swash Caps',
                        'Emblema One' => 'Emblema One',
                        'Emilys Candy' => 'Emilys Candy',
                        'Engagement' => 'Engagement',
                        'Englebert' => 'Englebert',
                        'Enriqueta' => 'Enriqueta',
                        'Erica One' => 'Erica One',
                        'Esteban' => 'Esteban',
                        'Euphoria Script' => 'Euphoria Script',
                        'Ewert' => 'Ewert',
                        'Exo' => 'Exo',
                        'Exo 2' => 'Exo 2',
                        'Expletus Sans' => 'Expletus Sans',
                        'Fanwood Text' => 'Fanwood Text',
                        'Fascinate' => 'Fascinate',
                        'Fascinate Inline' => 'Fascinate Inline',
                        'Faster One' => 'Faster One',
                        'Fasthand' => 'Fasthand',
                        'Fauna One' => 'Fauna One',
                        'Federant' => 'Federant',
                        'Federo' => 'Federo',
                        'Felipa' => 'Felipa',
                        'Fenix' => 'Fenix',
                        'Finger Paint' => 'Finger Paint',
                        'Fjalla One' => 'Fjalla One',
                        'Fjord One' => 'Fjord One',
                        'Flamenco' => 'Flamenco',
                        'Flavors' => 'Flavors',
                        'Fondamento' => 'Fondamento',
                        'Fontdiner Swanky' => 'Fontdiner Swanky',
                        'Forum' => 'Forum',
                        'Francois One' => 'Francois One',
                        'Freckle Face' => 'Freckle Face',
                        'Fredericka the Great' => 'Fredericka the Great',
                        'Fredoka One' => 'Fredoka One',
                        'Freehand' => 'Freehand',
                        'Fresca' => 'Fresca',
                        'Frijole' => 'Frijole',
                        'Fruktur' => 'Fruktur',
                        'Fugaz One' => 'Fugaz One',
                        'GFS Didot' => 'GFS Didot',
                        'GFS Neohellenic' => 'GFS Neohellenic',
                        'Gabriela' => 'Gabriela',
                        'Gafata' => 'Gafata',
                        'Galdeano' => 'Galdeano',
                        'Galindo' => 'Galindo',
                        'Gentium Basic' => 'Gentium Basic',
                        'Gentium Book Basic' => 'Gentium Book Basic',
                        'Geo' => 'Geo',
                        'Geostar' => 'Geostar',
                        'Geostar Fill' => 'Geostar Fill',
                        'Germania One' => 'Germania One',
                        'Gilda Display' => 'Gilda Display',
                        'Give You Glory' => 'Give You Glory',
                        'Glass Antiqua' => 'Glass Antiqua',
                        'Glegoo' => 'Glegoo',
                        'Gloria Hallelujah' => 'Gloria Hallelujah',
                        'Goblin One' => 'Goblin One',
                        'Gochi Hand' => 'Gochi Hand',
                        'Gorditas' => 'Gorditas',
                        'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
                        'Graduate' => 'Graduate',
                        'Grand Hotel' => 'Grand Hotel',
                        'Gravitas One' => 'Gravitas One',
                        'Great Vibes' => 'Great Vibes',
                        'Griffy' => 'Griffy',
                        'Gruppo' => 'Gruppo',
                        'Gudea' => 'Gudea',
                        'Habibi' => 'Habibi',
                        'Hammersmith One' => 'Hammersmith One',
                        'Hanalei' => 'Hanalei',
                        'Hanalei Fill' => 'Hanalei Fill',
                        'Handlee' => 'Handlee',
                        'Hanuman' => 'Hanuman',
                        'Happy Monkey' => 'Happy Monkey',
                        'Headland One' => 'Headland One',
                        'Henny Penny' => 'Henny Penny',
                        'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
                        'Holtwood One SC' => 'Holtwood One SC',
                        'Homemade Apple' => 'Homemade Apple',
                        'Homenaje' => 'Homenaje',
                        'IM Fell DW Pica' => 'IM Fell DW Pica',
                        'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
                        'IM Fell Double Pica' => 'IM Fell Double Pica',
                        'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
                        'IM Fell English' => 'IM Fell English',
                        'IM Fell English SC' => 'IM Fell English SC',
                        'IM Fell French Canon' => 'IM Fell French Canon',
                        'IM Fell French Canon SC' => 'IM Fell French Canon SC',
                        'IM Fell Great Primer' => 'IM Fell Great Primer',
                        'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
                        'Iceberg' => 'Iceberg',
                        'Iceland' => 'Iceland',
                        'Imprima' => 'Imprima',
                        'Inconsolata' => 'Inconsolata',
                        'Inder' => 'Inder',
                        'Indie Flower' => 'Indie Flower',
                        'Inika' => 'Inika',
                        'Irish Grover' => 'Irish Grover',
                        'Istok Web' => 'Istok Web',
                        'Italiana' => 'Italiana',
                        'Italianno' => 'Italianno',
                        'Jacques Francois' => 'Jacques Francois',
                        'Jacques Francois Shadow' => 'Jacques Francois Shadow',
                        'Jim Nightshade' => 'Jim Nightshade',
                        'Jockey One' => 'Jockey One',
                        'Jolly Lodger' => 'Jolly Lodger',
                        'Josefin Sans' => 'Josefin Sans',
                        'Josefin Slab' => 'Josefin Slab',
                        'Joti One' => 'Joti One',
                        'Judson' => 'Judson',
                        'Julee' => 'Julee',
                        'Julius Sans One' => 'Julius Sans One',
                        'Junge' => 'Junge',
                        'Jura' => 'Jura',
                        'Just Another Hand' => 'Just Another Hand',
                        'Just Me Again Down Here' => 'Just Me Again Down Here',
                        'Kameron' => 'Kameron',
                        'Kantumruy' => 'Kantumruy',
                        'Karla' => 'Karla',
                        'Kaushan Script' => 'Kaushan Script',
                        'Kavoon' => 'Kavoon',
                        'Kdam Thmor' => 'Kdam Thmor',
                        'Keania One' => 'Keania One',
                        'Kelly Slab' => 'Kelly Slab',
                        'Kenia' => 'Kenia',
                        'Khmer' => 'Khmer',
                        'Kite One' => 'Kite One',
                        'Knewave' => 'Knewave',
                        'Kotta One' => 'Kotta One',
                        'Koulen' => 'Koulen',
                        'Kranky' => 'Kranky',
                        'Kreon' => 'Kreon',
                        'Kristi' => 'Kristi',
                        'Krona One' => 'Krona One',
                        'La Belle Aurore' => 'La Belle Aurore',
                        'Lancelot' => 'Lancelot',
                        'Lato' => 'Lato',
                        'League Script' => 'League Script',
                        'Leckerli One' => 'Leckerli One',
                        'Ledger' => 'Ledger',
                        'Lekton' => 'Lekton',
                        'Lemon' => 'Lemon',
                        'Libre Baskerville' => 'Libre Baskerville',
                        'Life Savers' => 'Life Savers',
                        'Lilita One' => 'Lilita One',
                        'Lily Script One' => 'Lily Script One',
                        'Limelight' => 'Limelight',
                        'Linden Hill' => 'Linden Hill',
                        'Lobster' => 'Lobster',
                        'Lobster Two' => 'Lobster Two',
                        'Londrina Outline' => 'Londrina Outline',
                        'Londrina Shadow' => 'Londrina Shadow',
                        'Londrina Sketch' => 'Londrina Sketch',
                        'Londrina Solid' => 'Londrina Solid',
                        'Lora' => 'Lora',
                        'Love Ya Like A Sister' => 'Love Ya Like A Sister',
                        'Loved by the King' => 'Loved by the King',
                        'Lovers Quarrel' => 'Lovers Quarrel',
                        'Luckiest Guy' => 'Luckiest Guy',
                        'Lusitana' => 'Lusitana',
                        'Lustria' => 'Lustria',
                        'Macondo' => 'Macondo',
                        'Macondo Swash Caps' => 'Macondo Swash Caps',
                        'Magra' => 'Magra',
                        'Maiden Orange' => 'Maiden Orange',
                        'Mako' => 'Mako',
                        'Marcellus' => 'Marcellus',
                        'Marcellus SC' => 'Marcellus SC',
                        'Marck Script' => 'Marck Script',
                        'Margarine' => 'Margarine',
                        'Marko One' => 'Marko One',
                        'Marmelad' => 'Marmelad',
                        'Marvel' => 'Marvel',
                        'Mate' => 'Mate',
                        'Mate SC' => 'Mate SC',
                        'Maven Pro' => 'Maven Pro',
                        'McLaren' => 'McLaren',
                        'Meddon' => 'Meddon',
                        'MedievalSharp' => 'MedievalSharp',
                        'Medula One' => 'Medula One',
                        'Megrim' => 'Megrim',
                        'Meie Script' => 'Meie Script',
                        'Merienda' => 'Merienda',
                        'Merienda One' => 'Merienda One',
                        'Merriweather' => 'Merriweather',
                        'Merriweather Sans' => 'Merriweather Sans',
                        'Metal' => 'Metal',
                        'Metal Mania' => 'Metal Mania',
                        'Metamorphous' => 'Metamorphous',
                        'Metrophobic' => 'Metrophobic',
                        'Michroma' => 'Michroma',
                        'Milonga' => 'Milonga',
                        'Miltonian' => 'Miltonian',
                        'Miltonian Tattoo' => 'Miltonian Tattoo',
                        'Miniver' => 'Miniver',
                        'Miss Fajardose' => 'Miss Fajardose',
                        'Modern Antiqua' => 'Modern Antiqua',
                        'Molengo' => 'Molengo',
                        'Molle' => 'Molle',
                        'Monda' => 'Monda',
                        'Monofett' => 'Monofett',
                        'Monoton' => 'Monoton',
                        'Monsieur La Doulaise' => 'Monsieur La Doulaise',
                        'Montaga' => 'Montaga',
                        'Montez' => 'Montez',
                        'Montserrat' => 'Montserrat',
                        'Montserrat Alternates' => 'Montserrat Alternates',
                        'Montserrat Subrayada' => 'Montserrat Subrayada',
                        'Moul' => 'Moul',
                        'Moulpali' => 'Moulpali',
                        'Mountains of Christmas' => 'Mountains of Christmas',
                        'Mouse Memoirs' => 'Mouse Memoirs',
                        'Mr Bedfort' => 'Mr Bedfort',
                        'Mr Dafoe' => 'Mr Dafoe',
                        'Mr De Haviland' => 'Mr De Haviland',
                        'Mrs Saint Delafield' => 'Mrs Saint Delafield',
                        'Mrs Sheppards' => 'Mrs Sheppards',
                        'Muli' => 'Muli',
                        'Mystery Quest' => 'Mystery Quest',
                        'Neucha' => 'Neucha',
                        'Neuton' => 'Neuton',
                        'New Rocker' => 'New Rocker',
                        'News Cycle' => 'News Cycle',
                        'Niconne' => 'Niconne',
                        'Nixie One' => 'Nixie One',
                        'Nobile' => 'Nobile',
                        'Nokora' => 'Nokora',
                        'Norican' => 'Norican',
                        'Nosifer' => 'Nosifer',
                        'Nothing You Could Do' => 'Nothing You Could Do',
                        'Noticia Text' => 'Noticia Text',
                        'Noto Sans' => 'Noto Sans',
                        'Noto Serif' => 'Noto Serif',
                        'Nova Cut' => 'Nova Cut',
                        'Nova Flat' => 'Nova Flat',
                        'Nova Mono' => 'Nova Mono',
                        'Nova Oval' => 'Nova Oval',
                        'Nova Round' => 'Nova Round',
                        'Nova Script' => 'Nova Script',
                        'Nova Slim' => 'Nova Slim',
                        'Nova Square' => 'Nova Square',
                        'Numans' => 'Numans',
                        'Nunito' => 'Nunito',
                        'Odor Mean Chey' => 'Odor Mean Chey',
                        'Offside' => 'Offside',
                        'Old Standard TT' => 'Old Standard TT',
                        'Oldenburg' => 'Oldenburg',
                        'Oleo Script' => 'Oleo Script',
                        'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
                        'Open Sans' => 'Open Sans',
                        'Open Sans Condensed' => 'Open Sans Condensed',
                        'Oranienbaum' => 'Oranienbaum',
                        'Orbitron' => 'Orbitron',
                        'Oregano' => 'Oregano',
                        'Orienta' => 'Orienta',
                        'Original Surfer' => 'Original Surfer',
                        'Oswald' => 'Oswald',
                        'Over the Rainbow' => 'Over the Rainbow',
                        'Overlock' => 'Overlock',
                        'Overlock SC' => 'Overlock SC',
                        'Ovo' => 'Ovo',
                        'Oxygen' => 'Oxygen',
                        'Oxygen Mono' => 'Oxygen Mono',
                        'PT Mono' => 'PT Mono',
                        'PT Sans' => 'PT Sans',
                        'PT Sans Caption' => 'PT Sans Caption',
                        'PT Sans Narrow' => 'PT Sans Narrow',
                        'PT Serif' => 'PT Serif',
                        'PT Serif Caption' => 'PT Serif Caption',
                        'Pacifico' => 'Pacifico',
                        'Paprika' => 'Paprika',
                        'Parisienne' => 'Parisienne',
                        'Passero One' => 'Passero One',
                        'Passion One' => 'Passion One',
                        'Pathway Gothic One' => 'Pathway Gothic One',
                        'Patrick Hand' => 'Patrick Hand',
                        'Patrick Hand SC' => 'Patrick Hand SC',
                        'Patua One' => 'Patua One',
                        'Paytone One' => 'Paytone One',
                        'Peralta' => 'Peralta',
                        'Permanent Marker' => 'Permanent Marker',
                        'Petit Formal Script' => 'Petit Formal Script',
                        'Petrona' => 'Petrona',
                        'Philosopher' => 'Philosopher',
                        'Piedra' => 'Piedra',
                        'Pinyon Script' => 'Pinyon Script',
                        'Pirata One' => 'Pirata One',
                        'Plaster' => 'Plaster',
                        'Play' => 'Play',
                        'Playball' => 'Playball',
                        'Playfair Display' => 'Playfair Display',
                        'Playfair Display SC' => 'Playfair Display SC',
                        'Podkova' => 'Podkova',
                        'Poiret One' => 'Poiret One',
                        'Poller One' => 'Poller One',
                        'Poly' => 'Poly',
                        'Pompiere' => 'Pompiere',
                        'Pontano Sans' => 'Pontano Sans',
                        'Port Lligat Sans' => 'Port Lligat Sans',
                        'Port Lligat Slab' => 'Port Lligat Slab',
                        'Prata' => 'Prata',
                        'Preahvihear' => 'Preahvihear',
                        'Press Start 2P' => 'Press Start 2P',
                        'Princess Sofia' => 'Princess Sofia',
                        'Prociono' => 'Prociono',
                        'Prosto One' => 'Prosto One',
                        'Puritan' => 'Puritan',
                        'Purple Purse' => 'Purple Purse',
                        'Quando' => 'Quando',
                        'Quantico' => 'Quantico',
                        'Quattrocento' => 'Quattrocento',
                        'Quattrocento Sans' => 'Quattrocento Sans',
                        'Questrial' => 'Questrial',
                        'Quicksand' => 'Quicksand',
                        'Quintessential' => 'Quintessential',
                        'Qwigley' => 'Qwigley',
                        'Racing Sans One' => 'Racing Sans One',
                        'Radley' => 'Radley',
                        'Raleway' => 'Raleway',
                        'Raleway Dots' => 'Raleway Dots',
                        'Rambla' => 'Rambla',
                        'Rammetto One' => 'Rammetto One',
                        'Ranchers' => 'Ranchers',
                        'Rancho' => 'Rancho',
                        'Rationale' => 'Rationale',
                        'Redressed' => 'Redressed',
                        'Reenie Beanie' => 'Reenie Beanie',
                        'Revalia' => 'Revalia',
                        'Ribeye' => 'Ribeye',
                        'Ribeye Marrow' => 'Ribeye Marrow',
                        'Righteous' => 'Righteous',
                        'Risque' => 'Risque',
                        'Roboto' => 'Roboto',
                        'Roboto Condensed' => 'Roboto Condensed',
                        'Roboto Slab' => 'Roboto Slab',
                        'Rochester' => 'Rochester',
                        'Rock Salt' => 'Rock Salt',
                        'Rokkitt' => 'Rokkitt',
                        'Romanesco' => 'Romanesco',
                        'Ropa Sans' => 'Ropa Sans',
                        'Rosario' => 'Rosario',
                        'Rosarivo' => 'Rosarivo',
                        'Rouge Script' => 'Rouge Script',
                        'Rubik Mono One' => 'Rubik Mono One',
                        'Rubik One' => 'Rubik One',
                        'Ruda' => 'Ruda',
                        'Rufina' => 'Rufina',
                        'Ruge Boogie' => 'Ruge Boogie',
                        'Ruluko' => 'Ruluko',
                        'Rum Raisin' => 'Rum Raisin',
                        'Ruslan Display' => 'Ruslan Display',
                        'Russo One' => 'Russo One',
                        'Ruthie' => 'Ruthie',
                        'Rye' => 'Rye',
                        'Sacramento' => 'Sacramento',
                        'Sail' => 'Sail',
                        'Salsa' => 'Salsa',
                        'Sanchez' => 'Sanchez',
                        'Sancreek' => 'Sancreek',
                        'Sansita One' => 'Sansita One',
                        'Sarina' => 'Sarina',
                        'Satisfy' => 'Satisfy',
                        'Scada' => 'Scada',
                        'Schoolbell' => 'Schoolbell',
                        'Seaweed Script' => 'Seaweed Script',
                        'Sevillana' => 'Sevillana',
                        'Seymour One' => 'Seymour One',
                        'Shadows Into Light' => 'Shadows Into Light',
                        'Shadows Into Light Two' => 'Shadows Into Light Two',
                        'Shanti' => 'Shanti',
                        'Share' => 'Share',
                        'Share Tech' => 'Share Tech',
                        'Share Tech Mono' => 'Share Tech Mono',
                        'Shojumaru' => 'Shojumaru',
                        'Short Stack' => 'Short Stack',
                        'Siemreap' => 'Siemreap',
                        'Sigmar One' => 'Sigmar One',
                        'Signika' => 'Signika',
                        'Signika Negative' => 'Signika Negative',
                        'Simonetta' => 'Simonetta',
                        'Sintony' => 'Sintony',
                        'Sirin Stencil' => 'Sirin Stencil',
                        'Six Caps' => 'Six Caps',
                        'Skranji' => 'Skranji',
                        'Slackey' => 'Slackey',
                        'Smokum' => 'Smokum',
                        'Smythe' => 'Smythe',
                        'Sniglet' => 'Sniglet',
                        'Snippet' => 'Snippet',
                        'Snowburst One' => 'Snowburst One',
                        'Sofadi One' => 'Sofadi One',
                        'Sofia' => 'Sofia',
                        'Sonsie One' => 'Sonsie One',
                        'Sorts Mill Goudy' => 'Sorts Mill Goudy',
                        'Source Code Pro' => 'Source Code Pro',
                        'Source Sans Pro' => 'Source Sans Pro',
                        'Special Elite' => 'Special Elite',
                        'Spicy Rice' => 'Spicy Rice',
                        'Spinnaker' => 'Spinnaker',
                        'Spirax' => 'Spirax',
                        'Squada One' => 'Squada One',
                        'Stalemate' => 'Stalemate',
                        'Stalinist One' => 'Stalinist One',
                        'Stardos Stencil' => 'Stardos Stencil',
                        'Stint Ultra Condensed' => 'Stint Ultra Condensed',
                        'Stint Ultra Expanded' => 'Stint Ultra Expanded',
                        'Stoke' => 'Stoke',
                        'Strait' => 'Strait',
                        'Sue Ellen Francisco' => 'Sue Ellen Francisco',
                        'Sunshiney' => 'Sunshiney',
                        'Supermercado One' => 'Supermercado One',
                        'Suwannaphum' => 'Suwannaphum',
                        'Swanky and Moo Moo' => 'Swanky and Moo Moo',
                        'Syncopate' => 'Syncopate',
                        'Tangerine' => 'Tangerine',
                        'Taprom' => 'Taprom',
                        'Tauri' => 'Tauri',
                        'Telex' => 'Telex',
                        'Tenor Sans' => 'Tenor Sans',
                        'Text Me One' => 'Text Me One',
                        'The Girl Next Door' => 'The Girl Next Door',
                        'Tienne' => 'Tienne',
                        'Tinos' => 'Tinos',
                        'Titan One' => 'Titan One',
                        'Titillium Web' => 'Titillium Web',
                        'Trade Winds' => 'Trade Winds',
                        'Trocchi' => 'Trocchi',
                        'Trochut' => 'Trochut',
                        'Trykker' => 'Trykker',
                        'Tulpen One' => 'Tulpen One',
                        'Ubuntu' => 'Ubuntu',
                        'Ubuntu Condensed' => 'Ubuntu Condensed',
                        'Ubuntu Mono' => 'Ubuntu Mono',
                        'Ultra' => 'Ultra',
                        'Uncial Antiqua' => 'Uncial Antiqua',
                        'Underdog' => 'Underdog',
                        'Unica One' => 'Unica One',
                        'UnifrakturCook' => 'UnifrakturCook',
                        'UnifrakturMaguntia' => 'UnifrakturMaguntia',
                        'Unkempt' => 'Unkempt',
                        'Unlock' => 'Unlock',
                        'Unna' => 'Unna',
                        'VT323' => 'VT323',
                        'Vampiro One' => 'Vampiro One',
                        'Varela' => 'Varela',
                        'Varela Round' => 'Varela Round',
                        'Vast Shadow' => 'Vast Shadow',
                        'Vibur' => 'Vibur',
                        'Vidaloka' => 'Vidaloka',
                        'Viga' => 'Viga',
                        'Voces' => 'Voces',
                        'Volkhov' => 'Volkhov',
                        'Vollkorn' => 'Vollkorn',
                        'Voltaire' => 'Voltaire',
                        'Waiting for the Sunrise' => 'Waiting for the Sunrise',
                        'Wallpoet' => 'Wallpoet',
                        'Walter Turncoat' => 'Walter Turncoat',
                        'Warnes' => 'Warnes',
                        'Wellfleet' => 'Wellfleet',
                        'Wendy One' => 'Wendy One',
                        'Wire One' => 'Wire One',
                        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
                        'Yellowtail' => 'Yellowtail',
                        'Yeseva One' => 'Yeseva One',
                        'Yesteryear' => 'Yesteryear',
                        'Zeyada' => 'Zeyada',
                    ),
                    'title' => 'Select Body Font Family',
                    'default' => 'PT Sans',
                ),
                array (
                    'desc' => 'Select a font family for navigation',
                    'id' => 'google_nav',
                    'type' => 'select',
                    'options' => array (
                        'Select Font' => 'Select Font',
                        'ABeeZee' => 'ABeeZee',
                        'Abel' => 'Abel',
                        'Abril Fatface' => 'Abril Fatface',
                        'Aclonica' => 'Aclonica',
                        'Acme' => 'Acme',
                        'Actor' => 'Actor',
                        'Adamina' => 'Adamina',
                        'Advent Pro' => 'Advent Pro',
                        'Aguafina Script' => 'Aguafina Script',
                        'Akronim' => 'Akronim',
                        'Aladin' => 'Aladin',
                        'Aldrich' => 'Aldrich',
                        'Alef' => 'Alef',
                        'Alegreya' => 'Alegreya',
                        'Alegreya SC' => 'Alegreya SC',
                        'Alegreya Sans' => 'Alegreya Sans',
                        'Alegreya Sans SC' => 'Alegreya Sans SC',
                        'Alex Brush' => 'Alex Brush',
                        'Alfa Slab One' => 'Alfa Slab One',
                        'Alice' => 'Alice',
                        'Alike' => 'Alike',
                        'Alike Angular' => 'Alike Angular',
                        'Allan' => 'Allan',
                        'Allerta' => 'Allerta',
                        'Allerta Stencil' => 'Allerta Stencil',
                        'Allura' => 'Allura',
                        'Almendra' => 'Almendra',
                        'Almendra Display' => 'Almendra Display',
                        'Almendra SC' => 'Almendra SC',
                        'Amarante' => 'Amarante',
                        'Amaranth' => 'Amaranth',
                        'Amatic SC' => 'Amatic SC',
                        'Amethysta' => 'Amethysta',
                        'Anaheim' => 'Anaheim',
                        'Andada' => 'Andada',
                        'Andika' => 'Andika',
                        'Angkor' => 'Angkor',
                        'Annie Use Your Telescope' => 'Annie Use Your Telescope',
                        'Anonymous Pro' => 'Anonymous Pro',
                        'Antic' => 'Antic',
                        'Antic Didone' => 'Antic Didone',
                        'Antic Slab' => 'Antic Slab',
                        'Anton' => 'Anton',
                        'Arapey' => 'Arapey',
                        'Arbutus' => 'Arbutus',
                        'Arbutus Slab' => 'Arbutus Slab',
                        'Architects Daughter' => 'Architects Daughter',
                        'Archivo Black' => 'Archivo Black',
                        'Archivo Narrow' => 'Archivo Narrow',
                        'Arimo' => 'Arimo',
                        'Arizonia' => 'Arizonia',
                        'Armata' => 'Armata',
                        'Artifika' => 'Artifika',
                        'Arvo' => 'Arvo',
                        'Asap' => 'Asap',
                        'Asset' => 'Asset',
                        'Astloch' => 'Astloch',
                        'Asul' => 'Asul',
                        'Atomic Age' => 'Atomic Age',
                        'Aubrey' => 'Aubrey',
                        'Audiowide' => 'Audiowide',
                        'Autour One' => 'Autour One',
                        'Average' => 'Average',
                        'Average Sans' => 'Average Sans',
                        'Averia Gruesa Libre' => 'Averia Gruesa Libre',
                        'Averia Libre' => 'Averia Libre',
                        'Averia Sans Libre' => 'Averia Sans Libre',
                        'Averia Serif Libre' => 'Averia Serif Libre',
                        'Bad Script' => 'Bad Script',
                        'Balthazar' => 'Balthazar',
                        'Bangers' => 'Bangers',
                        'Basic' => 'Basic',
                        'Battambang' => 'Battambang',
                        'Baumans' => 'Baumans',
                        'Bayon' => 'Bayon',
                        'Belgrano' => 'Belgrano',
                        'Belleza' => 'Belleza',
                        'BenchNine' => 'BenchNine',
                        'Bentham' => 'Bentham',
                        'Berkshire Swash' => 'Berkshire Swash',
                        'Bevan' => 'Bevan',
                        'Bigelow Rules' => 'Bigelow Rules',
                        'Bigshot One' => 'Bigshot One',
                        'Bilbo' => 'Bilbo',
                        'Bilbo Swash Caps' => 'Bilbo Swash Caps',
                        'Bitter' => 'Bitter',
                        'Black Ops One' => 'Black Ops One',
                        'Bokor' => 'Bokor',
                        'Bonbon' => 'Bonbon',
                        'Boogaloo' => 'Boogaloo',
                        'Bowlby One' => 'Bowlby One',
                        'Bowlby One SC' => 'Bowlby One SC',
                        'Brawler' => 'Brawler',
                        'Bree Serif' => 'Bree Serif',
                        'Bubblegum Sans' => 'Bubblegum Sans',
                        'Bubbler One' => 'Bubbler One',
                        'Buda' => 'Buda',
                        'Buenard' => 'Buenard',
                        'Butcherman' => 'Butcherman',
                        'Butterfly Kids' => 'Butterfly Kids',
                        'Cabin' => 'Cabin',
                        'Cabin Condensed' => 'Cabin Condensed',
                        'Cabin Sketch' => 'Cabin Sketch',
                        'Caesar Dressing' => 'Caesar Dressing',
                        'Cagliostro' => 'Cagliostro',
                        'Calligraffitti' => 'Calligraffitti',
                        'Cambo' => 'Cambo',
                        'Candal' => 'Candal',
                        'Cantarell' => 'Cantarell',
                        'Cantata One' => 'Cantata One',
                        'Cantora One' => 'Cantora One',
                        'Capriola' => 'Capriola',
                        'Cardo' => 'Cardo',
                        'Carme' => 'Carme',
                        'Carrois Gothic' => 'Carrois Gothic',
                        'Carrois Gothic SC' => 'Carrois Gothic SC',
                        'Carter One' => 'Carter One',
                        'Caudex' => 'Caudex',
                        'Cedarville Cursive' => 'Cedarville Cursive',
                        'Ceviche One' => 'Ceviche One',
                        'Changa One' => 'Changa One',
                        'Chango' => 'Chango',
                        'Chau Philomene One' => 'Chau Philomene One',
                        'Chela One' => 'Chela One',
                        'Chelsea Market' => 'Chelsea Market',
                        'Chenla' => 'Chenla',
                        'Cherry Cream Soda' => 'Cherry Cream Soda',
                        'Cherry Swash' => 'Cherry Swash',
                        'Chewy' => 'Chewy',
                        'Chicle' => 'Chicle',
                        'Chivo' => 'Chivo',
                        'Cinzel' => 'Cinzel',
                        'Cinzel Decorative' => 'Cinzel Decorative',
                        'Clicker Script' => 'Clicker Script',
                        'Coda' => 'Coda',
                        'Coda Caption' => 'Coda Caption',
                        'Codystar' => 'Codystar',
                        'Combo' => 'Combo',
                        'Comfortaa' => 'Comfortaa',
                        'Coming Soon' => 'Coming Soon',
                        'Concert One' => 'Concert One',
                        'Condiment' => 'Condiment',
                        'Content' => 'Content',
                        'Contrail One' => 'Contrail One',
                        'Convergence' => 'Convergence',
                        'Cookie' => 'Cookie',
                        'Copse' => 'Copse',
                        'Corben' => 'Corben',
                        'Courgette' => 'Courgette',
                        'Cousine' => 'Cousine',
                        'Coustard' => 'Coustard',
                        'Covered By Your Grace' => 'Covered By Your Grace',
                        'Crafty Girls' => 'Crafty Girls',
                        'Creepster' => 'Creepster',
                        'Crete Round' => 'Crete Round',
                        'Crimson Text' => 'Crimson Text',
                        'Croissant One' => 'Croissant One',
                        'Crushed' => 'Crushed',
                        'Cuprum' => 'Cuprum',
                        'Cutive' => 'Cutive',
                        'Cutive Mono' => 'Cutive Mono',
                        'Damion' => 'Damion',
                        'Dancing Script' => 'Dancing Script',
                        'Dangrek' => 'Dangrek',
                        'Dawning of a New Day' => 'Dawning of a New Day',
                        'Days One' => 'Days One',
                        'Delius' => 'Delius',
                        'Delius Swash Caps' => 'Delius Swash Caps',
                        'Delius Unicase' => 'Delius Unicase',
                        'Della Respira' => 'Della Respira',
                        'Denk One' => 'Denk One',
                        'Devonshire' => 'Devonshire',
                        'Didact Gothic' => 'Didact Gothic',
                        'Diplomata' => 'Diplomata',
                        'Diplomata SC' => 'Diplomata SC',
                        'Domine' => 'Domine',
                        'Donegal One' => 'Donegal One',
                        'Doppio One' => 'Doppio One',
                        'Dorsa' => 'Dorsa',
                        'Dosis' => 'Dosis',
                        'Dr Sugiyama' => 'Dr Sugiyama',
                        'Droid Sans' => 'Droid Sans',
                        'Droid Sans Mono' => 'Droid Sans Mono',
                        'Droid Serif' => 'Droid Serif',
                        'Duru Sans' => 'Duru Sans',
                        'Dynalight' => 'Dynalight',
                        'EB Garamond' => 'EB Garamond',
                        'Eagle Lake' => 'Eagle Lake',
                        'Eater' => 'Eater',
                        'Economica' => 'Economica',
                        'Electrolize' => 'Electrolize',
                        'Elsie' => 'Elsie',
                        'Elsie Swash Caps' => 'Elsie Swash Caps',
                        'Emblema One' => 'Emblema One',
                        'Emilys Candy' => 'Emilys Candy',
                        'Engagement' => 'Engagement',
                        'Englebert' => 'Englebert',
                        'Enriqueta' => 'Enriqueta',
                        'Erica One' => 'Erica One',
                        'Esteban' => 'Esteban',
                        'Euphoria Script' => 'Euphoria Script',
                        'Ewert' => 'Ewert',
                        'Exo' => 'Exo',
                        'Exo 2' => 'Exo 2',
                        'Expletus Sans' => 'Expletus Sans',
                        'Fanwood Text' => 'Fanwood Text',
                        'Fascinate' => 'Fascinate',
                        'Fascinate Inline' => 'Fascinate Inline',
                        'Faster One' => 'Faster One',
                        'Fasthand' => 'Fasthand',
                        'Fauna One' => 'Fauna One',
                        'Federant' => 'Federant',
                        'Federo' => 'Federo',
                        'Felipa' => 'Felipa',
                        'Fenix' => 'Fenix',
                        'Finger Paint' => 'Finger Paint',
                        'Fjalla One' => 'Fjalla One',
                        'Fjord One' => 'Fjord One',
                        'Flamenco' => 'Flamenco',
                        'Flavors' => 'Flavors',
                        'Fondamento' => 'Fondamento',
                        'Fontdiner Swanky' => 'Fontdiner Swanky',
                        'Forum' => 'Forum',
                        'Francois One' => 'Francois One',
                        'Freckle Face' => 'Freckle Face',
                        'Fredericka the Great' => 'Fredericka the Great',
                        'Fredoka One' => 'Fredoka One',
                        'Freehand' => 'Freehand',
                        'Fresca' => 'Fresca',
                        'Frijole' => 'Frijole',
                        'Fruktur' => 'Fruktur',
                        'Fugaz One' => 'Fugaz One',
                        'GFS Didot' => 'GFS Didot',
                        'GFS Neohellenic' => 'GFS Neohellenic',
                        'Gabriela' => 'Gabriela',
                        'Gafata' => 'Gafata',
                        'Galdeano' => 'Galdeano',
                        'Galindo' => 'Galindo',
                        'Gentium Basic' => 'Gentium Basic',
                        'Gentium Book Basic' => 'Gentium Book Basic',
                        'Geo' => 'Geo',
                        'Geostar' => 'Geostar',
                        'Geostar Fill' => 'Geostar Fill',
                        'Germania One' => 'Germania One',
                        'Gilda Display' => 'Gilda Display',
                        'Give You Glory' => 'Give You Glory',
                        'Glass Antiqua' => 'Glass Antiqua',
                        'Glegoo' => 'Glegoo',
                        'Gloria Hallelujah' => 'Gloria Hallelujah',
                        'Goblin One' => 'Goblin One',
                        'Gochi Hand' => 'Gochi Hand',
                        'Gorditas' => 'Gorditas',
                        'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
                        'Graduate' => 'Graduate',
                        'Grand Hotel' => 'Grand Hotel',
                        'Gravitas One' => 'Gravitas One',
                        'Great Vibes' => 'Great Vibes',
                        'Griffy' => 'Griffy',
                        'Gruppo' => 'Gruppo',
                        'Gudea' => 'Gudea',
                        'Habibi' => 'Habibi',
                        'Hammersmith One' => 'Hammersmith One',
                        'Hanalei' => 'Hanalei',
                        'Hanalei Fill' => 'Hanalei Fill',
                        'Handlee' => 'Handlee',
                        'Hanuman' => 'Hanuman',
                        'Happy Monkey' => 'Happy Monkey',
                        'Headland One' => 'Headland One',
                        'Henny Penny' => 'Henny Penny',
                        'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
                        'Holtwood One SC' => 'Holtwood One SC',
                        'Homemade Apple' => 'Homemade Apple',
                        'Homenaje' => 'Homenaje',
                        'IM Fell DW Pica' => 'IM Fell DW Pica',
                        'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
                        'IM Fell Double Pica' => 'IM Fell Double Pica',
                        'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
                        'IM Fell English' => 'IM Fell English',
                        'IM Fell English SC' => 'IM Fell English SC',
                        'IM Fell French Canon' => 'IM Fell French Canon',
                        'IM Fell French Canon SC' => 'IM Fell French Canon SC',
                        'IM Fell Great Primer' => 'IM Fell Great Primer',
                        'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
                        'Iceberg' => 'Iceberg',
                        'Iceland' => 'Iceland',
                        'Imprima' => 'Imprima',
                        'Inconsolata' => 'Inconsolata',
                        'Inder' => 'Inder',
                        'Indie Flower' => 'Indie Flower',
                        'Inika' => 'Inika',
                        'Irish Grover' => 'Irish Grover',
                        'Istok Web' => 'Istok Web',
                        'Italiana' => 'Italiana',
                        'Italianno' => 'Italianno',
                        'Jacques Francois' => 'Jacques Francois',
                        'Jacques Francois Shadow' => 'Jacques Francois Shadow',
                        'Jim Nightshade' => 'Jim Nightshade',
                        'Jockey One' => 'Jockey One',
                        'Jolly Lodger' => 'Jolly Lodger',
                        'Josefin Sans' => 'Josefin Sans',
                        'Josefin Slab' => 'Josefin Slab',
                        'Joti One' => 'Joti One',
                        'Judson' => 'Judson',
                        'Julee' => 'Julee',
                        'Julius Sans One' => 'Julius Sans One',
                        'Junge' => 'Junge',
                        'Jura' => 'Jura',
                        'Just Another Hand' => 'Just Another Hand',
                        'Just Me Again Down Here' => 'Just Me Again Down Here',
                        'Kameron' => 'Kameron',
                        'Kantumruy' => 'Kantumruy',
                        'Karla' => 'Karla',
                        'Kaushan Script' => 'Kaushan Script',
                        'Kavoon' => 'Kavoon',
                        'Kdam Thmor' => 'Kdam Thmor',
                        'Keania One' => 'Keania One',
                        'Kelly Slab' => 'Kelly Slab',
                        'Kenia' => 'Kenia',
                        'Khmer' => 'Khmer',
                        'Kite One' => 'Kite One',
                        'Knewave' => 'Knewave',
                        'Kotta One' => 'Kotta One',
                        'Koulen' => 'Koulen',
                        'Kranky' => 'Kranky',
                        'Kreon' => 'Kreon',
                        'Kristi' => 'Kristi',
                        'Krona One' => 'Krona One',
                        'La Belle Aurore' => 'La Belle Aurore',
                        'Lancelot' => 'Lancelot',
                        'Lato' => 'Lato',
                        'League Script' => 'League Script',
                        'Leckerli One' => 'Leckerli One',
                        'Ledger' => 'Ledger',
                        'Lekton' => 'Lekton',
                        'Lemon' => 'Lemon',
                        'Libre Baskerville' => 'Libre Baskerville',
                        'Life Savers' => 'Life Savers',
                        'Lilita One' => 'Lilita One',
                        'Lily Script One' => 'Lily Script One',
                        'Limelight' => 'Limelight',
                        'Linden Hill' => 'Linden Hill',
                        'Lobster' => 'Lobster',
                        'Lobster Two' => 'Lobster Two',
                        'Londrina Outline' => 'Londrina Outline',
                        'Londrina Shadow' => 'Londrina Shadow',
                        'Londrina Sketch' => 'Londrina Sketch',
                        'Londrina Solid' => 'Londrina Solid',
                        'Lora' => 'Lora',
                        'Love Ya Like A Sister' => 'Love Ya Like A Sister',
                        'Loved by the King' => 'Loved by the King',
                        'Lovers Quarrel' => 'Lovers Quarrel',
                        'Luckiest Guy' => 'Luckiest Guy',
                        'Lusitana' => 'Lusitana',
                        'Lustria' => 'Lustria',
                        'Macondo' => 'Macondo',
                        'Macondo Swash Caps' => 'Macondo Swash Caps',
                        'Magra' => 'Magra',
                        'Maiden Orange' => 'Maiden Orange',
                        'Mako' => 'Mako',
                        'Marcellus' => 'Marcellus',
                        'Marcellus SC' => 'Marcellus SC',
                        'Marck Script' => 'Marck Script',
                        'Margarine' => 'Margarine',
                        'Marko One' => 'Marko One',
                        'Marmelad' => 'Marmelad',
                        'Marvel' => 'Marvel',
                        'Mate' => 'Mate',
                        'Mate SC' => 'Mate SC',
                        'Maven Pro' => 'Maven Pro',
                        'McLaren' => 'McLaren',
                        'Meddon' => 'Meddon',
                        'MedievalSharp' => 'MedievalSharp',
                        'Medula One' => 'Medula One',
                        'Megrim' => 'Megrim',
                        'Meie Script' => 'Meie Script',
                        'Merienda' => 'Merienda',
                        'Merienda One' => 'Merienda One',
                        'Merriweather' => 'Merriweather',
                        'Merriweather Sans' => 'Merriweather Sans',
                        'Metal' => 'Metal',
                        'Metal Mania' => 'Metal Mania',
                        'Metamorphous' => 'Metamorphous',
                        'Metrophobic' => 'Metrophobic',
                        'Michroma' => 'Michroma',
                        'Milonga' => 'Milonga',
                        'Miltonian' => 'Miltonian',
                        'Miltonian Tattoo' => 'Miltonian Tattoo',
                        'Miniver' => 'Miniver',
                        'Miss Fajardose' => 'Miss Fajardose',
                        'Modern Antiqua' => 'Modern Antiqua',
                        'Molengo' => 'Molengo',
                        'Molle' => 'Molle',
                        'Monda' => 'Monda',
                        'Monofett' => 'Monofett',
                        'Monoton' => 'Monoton',
                        'Monsieur La Doulaise' => 'Monsieur La Doulaise',
                        'Montaga' => 'Montaga',
                        'Montez' => 'Montez',
                        'Montserrat' => 'Montserrat',
                        'Montserrat Alternates' => 'Montserrat Alternates',
                        'Montserrat Subrayada' => 'Montserrat Subrayada',
                        'Moul' => 'Moul',
                        'Moulpali' => 'Moulpali',
                        'Mountains of Christmas' => 'Mountains of Christmas',
                        'Mouse Memoirs' => 'Mouse Memoirs',
                        'Mr Bedfort' => 'Mr Bedfort',
                        'Mr Dafoe' => 'Mr Dafoe',
                        'Mr De Haviland' => 'Mr De Haviland',
                        'Mrs Saint Delafield' => 'Mrs Saint Delafield',
                        'Mrs Sheppards' => 'Mrs Sheppards',
                        'Muli' => 'Muli',
                        'Mystery Quest' => 'Mystery Quest',
                        'Neucha' => 'Neucha',
                        'Neuton' => 'Neuton',
                        'New Rocker' => 'New Rocker',
                        'News Cycle' => 'News Cycle',
                        'Niconne' => 'Niconne',
                        'Nixie One' => 'Nixie One',
                        'Nobile' => 'Nobile',
                        'Nokora' => 'Nokora',
                        'Norican' => 'Norican',
                        'Nosifer' => 'Nosifer',
                        'Nothing You Could Do' => 'Nothing You Could Do',
                        'Noticia Text' => 'Noticia Text',
                        'Noto Sans' => 'Noto Sans',
                        'Noto Serif' => 'Noto Serif',
                        'Nova Cut' => 'Nova Cut',
                        'Nova Flat' => 'Nova Flat',
                        'Nova Mono' => 'Nova Mono',
                        'Nova Oval' => 'Nova Oval',
                        'Nova Round' => 'Nova Round',
                        'Nova Script' => 'Nova Script',
                        'Nova Slim' => 'Nova Slim',
                        'Nova Square' => 'Nova Square',
                        'Numans' => 'Numans',
                        'Nunito' => 'Nunito',
                        'Odor Mean Chey' => 'Odor Mean Chey',
                        'Offside' => 'Offside',
                        'Old Standard TT' => 'Old Standard TT',
                        'Oldenburg' => 'Oldenburg',
                        'Oleo Script' => 'Oleo Script',
                        'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
                        'Open Sans' => 'Open Sans',
                        'Open Sans Condensed' => 'Open Sans Condensed',
                        'Oranienbaum' => 'Oranienbaum',
                        'Orbitron' => 'Orbitron',
                        'Oregano' => 'Oregano',
                        'Orienta' => 'Orienta',
                        'Original Surfer' => 'Original Surfer',
                        'Oswald' => 'Oswald',
                        'Over the Rainbow' => 'Over the Rainbow',
                        'Overlock' => 'Overlock',
                        'Overlock SC' => 'Overlock SC',
                        'Ovo' => 'Ovo',
                        'Oxygen' => 'Oxygen',
                        'Oxygen Mono' => 'Oxygen Mono',
                        'PT Mono' => 'PT Mono',
                        'PT Sans' => 'PT Sans',
                        'PT Sans Caption' => 'PT Sans Caption',
                        'PT Sans Narrow' => 'PT Sans Narrow',
                        'PT Serif' => 'PT Serif',
                        'PT Serif Caption' => 'PT Serif Caption',
                        'Pacifico' => 'Pacifico',
                        'Paprika' => 'Paprika',
                        'Parisienne' => 'Parisienne',
                        'Passero One' => 'Passero One',
                        'Passion One' => 'Passion One',
                        'Pathway Gothic One' => 'Pathway Gothic One',
                        'Patrick Hand' => 'Patrick Hand',
                        'Patrick Hand SC' => 'Patrick Hand SC',
                        'Patua One' => 'Patua One',
                        'Paytone One' => 'Paytone One',
                        'Peralta' => 'Peralta',
                        'Permanent Marker' => 'Permanent Marker',
                        'Petit Formal Script' => 'Petit Formal Script',
                        'Petrona' => 'Petrona',
                        'Philosopher' => 'Philosopher',
                        'Piedra' => 'Piedra',
                        'Pinyon Script' => 'Pinyon Script',
                        'Pirata One' => 'Pirata One',
                        'Plaster' => 'Plaster',
                        'Play' => 'Play',
                        'Playball' => 'Playball',
                        'Playfair Display' => 'Playfair Display',
                        'Playfair Display SC' => 'Playfair Display SC',
                        'Podkova' => 'Podkova',
                        'Poiret One' => 'Poiret One',
                        'Poller One' => 'Poller One',
                        'Poly' => 'Poly',
                        'Pompiere' => 'Pompiere',
                        'Pontano Sans' => 'Pontano Sans',
                        'Port Lligat Sans' => 'Port Lligat Sans',
                        'Port Lligat Slab' => 'Port Lligat Slab',
                        'Prata' => 'Prata',
                        'Preahvihear' => 'Preahvihear',
                        'Press Start 2P' => 'Press Start 2P',
                        'Princess Sofia' => 'Princess Sofia',
                        'Prociono' => 'Prociono',
                        'Prosto One' => 'Prosto One',
                        'Puritan' => 'Puritan',
                        'Purple Purse' => 'Purple Purse',
                        'Quando' => 'Quando',
                        'Quantico' => 'Quantico',
                        'Quattrocento' => 'Quattrocento',
                        'Quattrocento Sans' => 'Quattrocento Sans',
                        'Questrial' => 'Questrial',
                        'Quicksand' => 'Quicksand',
                        'Quintessential' => 'Quintessential',
                        'Qwigley' => 'Qwigley',
                        'Racing Sans One' => 'Racing Sans One',
                        'Radley' => 'Radley',
                        'Raleway' => 'Raleway',
                        'Raleway Dots' => 'Raleway Dots',
                        'Rambla' => 'Rambla',
                        'Rammetto One' => 'Rammetto One',
                        'Ranchers' => 'Ranchers',
                        'Rancho' => 'Rancho',
                        'Rationale' => 'Rationale',
                        'Redressed' => 'Redressed',
                        'Reenie Beanie' => 'Reenie Beanie',
                        'Revalia' => 'Revalia',
                        'Ribeye' => 'Ribeye',
                        'Ribeye Marrow' => 'Ribeye Marrow',
                        'Righteous' => 'Righteous',
                        'Risque' => 'Risque',
                        'Roboto' => 'Roboto',
                        'Roboto Condensed' => 'Roboto Condensed',
                        'Roboto Slab' => 'Roboto Slab',
                        'Rochester' => 'Rochester',
                        'Rock Salt' => 'Rock Salt',
                        'Rokkitt' => 'Rokkitt',
                        'Romanesco' => 'Romanesco',
                        'Ropa Sans' => 'Ropa Sans',
                        'Rosario' => 'Rosario',
                        'Rosarivo' => 'Rosarivo',
                        'Rouge Script' => 'Rouge Script',
                        'Rubik Mono One' => 'Rubik Mono One',
                        'Rubik One' => 'Rubik One',
                        'Ruda' => 'Ruda',
                        'Rufina' => 'Rufina',
                        'Ruge Boogie' => 'Ruge Boogie',
                        'Ruluko' => 'Ruluko',
                        'Rum Raisin' => 'Rum Raisin',
                        'Ruslan Display' => 'Ruslan Display',
                        'Russo One' => 'Russo One',
                        'Ruthie' => 'Ruthie',
                        'Rye' => 'Rye',
                        'Sacramento' => 'Sacramento',
                        'Sail' => 'Sail',
                        'Salsa' => 'Salsa',
                        'Sanchez' => 'Sanchez',
                        'Sancreek' => 'Sancreek',
                        'Sansita One' => 'Sansita One',
                        'Sarina' => 'Sarina',
                        'Satisfy' => 'Satisfy',
                        'Scada' => 'Scada',
                        'Schoolbell' => 'Schoolbell',
                        'Seaweed Script' => 'Seaweed Script',
                        'Sevillana' => 'Sevillana',
                        'Seymour One' => 'Seymour One',
                        'Shadows Into Light' => 'Shadows Into Light',
                        'Shadows Into Light Two' => 'Shadows Into Light Two',
                        'Shanti' => 'Shanti',
                        'Share' => 'Share',
                        'Share Tech' => 'Share Tech',
                        'Share Tech Mono' => 'Share Tech Mono',
                        'Shojumaru' => 'Shojumaru',
                        'Short Stack' => 'Short Stack',
                        'Siemreap' => 'Siemreap',
                        'Sigmar One' => 'Sigmar One',
                        'Signika' => 'Signika',
                        'Signika Negative' => 'Signika Negative',
                        'Simonetta' => 'Simonetta',
                        'Sintony' => 'Sintony',
                        'Sirin Stencil' => 'Sirin Stencil',
                        'Six Caps' => 'Six Caps',
                        'Skranji' => 'Skranji',
                        'Slackey' => 'Slackey',
                        'Smokum' => 'Smokum',
                        'Smythe' => 'Smythe',
                        'Sniglet' => 'Sniglet',
                        'Snippet' => 'Snippet',
                        'Snowburst One' => 'Snowburst One',
                        'Sofadi One' => 'Sofadi One',
                        'Sofia' => 'Sofia',
                        'Sonsie One' => 'Sonsie One',
                        'Sorts Mill Goudy' => 'Sorts Mill Goudy',
                        'Source Code Pro' => 'Source Code Pro',
                        'Source Sans Pro' => 'Source Sans Pro',
                        'Special Elite' => 'Special Elite',
                        'Spicy Rice' => 'Spicy Rice',
                        'Spinnaker' => 'Spinnaker',
                        'Spirax' => 'Spirax',
                        'Squada One' => 'Squada One',
                        'Stalemate' => 'Stalemate',
                        'Stalinist One' => 'Stalinist One',
                        'Stardos Stencil' => 'Stardos Stencil',
                        'Stint Ultra Condensed' => 'Stint Ultra Condensed',
                        'Stint Ultra Expanded' => 'Stint Ultra Expanded',
                        'Stoke' => 'Stoke',
                        'Strait' => 'Strait',
                        'Sue Ellen Francisco' => 'Sue Ellen Francisco',
                        'Sunshiney' => 'Sunshiney',
                        'Supermercado One' => 'Supermercado One',
                        'Suwannaphum' => 'Suwannaphum',
                        'Swanky and Moo Moo' => 'Swanky and Moo Moo',
                        'Syncopate' => 'Syncopate',
                        'Tangerine' => 'Tangerine',
                        'Taprom' => 'Taprom',
                        'Tauri' => 'Tauri',
                        'Telex' => 'Telex',
                        'Tenor Sans' => 'Tenor Sans',
                        'Text Me One' => 'Text Me One',
                        'The Girl Next Door' => 'The Girl Next Door',
                        'Tienne' => 'Tienne',
                        'Tinos' => 'Tinos',
                        'Titan One' => 'Titan One',
                        'Titillium Web' => 'Titillium Web',
                        'Trade Winds' => 'Trade Winds',
                        'Trocchi' => 'Trocchi',
                        'Trochut' => 'Trochut',
                        'Trykker' => 'Trykker',
                        'Tulpen One' => 'Tulpen One',
                        'Ubuntu' => 'Ubuntu',
                        'Ubuntu Condensed' => 'Ubuntu Condensed',
                        'Ubuntu Mono' => 'Ubuntu Mono',
                        'Ultra' => 'Ultra',
                        'Uncial Antiqua' => 'Uncial Antiqua',
                        'Underdog' => 'Underdog',
                        'Unica One' => 'Unica One',
                        'UnifrakturCook' => 'UnifrakturCook',
                        'UnifrakturMaguntia' => 'UnifrakturMaguntia',
                        'Unkempt' => 'Unkempt',
                        'Unlock' => 'Unlock',
                        'Unna' => 'Unna',
                        'VT323' => 'VT323',
                        'Vampiro One' => 'Vampiro One',
                        'Varela' => 'Varela',
                        'Varela Round' => 'Varela Round',
                        'Vast Shadow' => 'Vast Shadow',
                        'Vibur' => 'Vibur',
                        'Vidaloka' => 'Vidaloka',
                        'Viga' => 'Viga',
                        'Voces' => 'Voces',
                        'Volkhov' => 'Volkhov',
                        'Vollkorn' => 'Vollkorn',
                        'Voltaire' => 'Voltaire',
                        'Waiting for the Sunrise' => 'Waiting for the Sunrise',
                        'Wallpoet' => 'Wallpoet',
                        'Walter Turncoat' => 'Walter Turncoat',
                        'Warnes' => 'Warnes',
                        'Wellfleet' => 'Wellfleet',
                        'Wendy One' => 'Wendy One',
                        'Wire One' => 'Wire One',
                        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
                        'Yellowtail' => 'Yellowtail',
                        'Yeseva One' => 'Yeseva One',
                        'Yesteryear' => 'Yesteryear',
                        'Zeyada' => 'Zeyada',
                    ),
                    'title' => 'Select Menu Font',
                    'default' => 'Antic Slab',
                ),
                array (
                    'desc' => 'Select a font family for headings',
                    'id' => 'google_headings',
                    'type' => 'select',
                    'options' => array (
                        'Select Font' => 'Select Font',
                        'ABeeZee' => 'ABeeZee',
                        'Abel' => 'Abel',
                        'Abril Fatface' => 'Abril Fatface',
                        'Aclonica' => 'Aclonica',
                        'Acme' => 'Acme',
                        'Actor' => 'Actor',
                        'Adamina' => 'Adamina',
                        'Advent Pro' => 'Advent Pro',
                        'Aguafina Script' => 'Aguafina Script',
                        'Akronim' => 'Akronim',
                        'Aladin' => 'Aladin',
                        'Aldrich' => 'Aldrich',
                        'Alef' => 'Alef',
                        'Alegreya' => 'Alegreya',
                        'Alegreya SC' => 'Alegreya SC',
                        'Alegreya Sans' => 'Alegreya Sans',
                        'Alegreya Sans SC' => 'Alegreya Sans SC',
                        'Alex Brush' => 'Alex Brush',
                        'Alfa Slab One' => 'Alfa Slab One',
                        'Alice' => 'Alice',
                        'Alike' => 'Alike',
                        'Alike Angular' => 'Alike Angular',
                        'Allan' => 'Allan',
                        'Allerta' => 'Allerta',
                        'Allerta Stencil' => 'Allerta Stencil',
                        'Allura' => 'Allura',
                        'Almendra' => 'Almendra',
                        'Almendra Display' => 'Almendra Display',
                        'Almendra SC' => 'Almendra SC',
                        'Amarante' => 'Amarante',
                        'Amaranth' => 'Amaranth',
                        'Amatic SC' => 'Amatic SC',
                        'Amethysta' => 'Amethysta',
                        'Anaheim' => 'Anaheim',
                        'Andada' => 'Andada',
                        'Andika' => 'Andika',
                        'Angkor' => 'Angkor',
                        'Annie Use Your Telescope' => 'Annie Use Your Telescope',
                        'Anonymous Pro' => 'Anonymous Pro',
                        'Antic' => 'Antic',
                        'Antic Didone' => 'Antic Didone',
                        'Antic Slab' => 'Antic Slab',
                        'Anton' => 'Anton',
                        'Arapey' => 'Arapey',
                        'Arbutus' => 'Arbutus',
                        'Arbutus Slab' => 'Arbutus Slab',
                        'Architects Daughter' => 'Architects Daughter',
                        'Archivo Black' => 'Archivo Black',
                        'Archivo Narrow' => 'Archivo Narrow',
                        'Arimo' => 'Arimo',
                        'Arizonia' => 'Arizonia',
                        'Armata' => 'Armata',
                        'Artifika' => 'Artifika',
                        'Arvo' => 'Arvo',
                        'Asap' => 'Asap',
                        'Asset' => 'Asset',
                        'Astloch' => 'Astloch',
                        'Asul' => 'Asul',
                        'Atomic Age' => 'Atomic Age',
                        'Aubrey' => 'Aubrey',
                        'Audiowide' => 'Audiowide',
                        'Autour One' => 'Autour One',
                        'Average' => 'Average',
                        'Average Sans' => 'Average Sans',
                        'Averia Gruesa Libre' => 'Averia Gruesa Libre',
                        'Averia Libre' => 'Averia Libre',
                        'Averia Sans Libre' => 'Averia Sans Libre',
                        'Averia Serif Libre' => 'Averia Serif Libre',
                        'Bad Script' => 'Bad Script',
                        'Balthazar' => 'Balthazar',
                        'Bangers' => 'Bangers',
                        'Basic' => 'Basic',
                        'Battambang' => 'Battambang',
                        'Baumans' => 'Baumans',
                        'Bayon' => 'Bayon',
                        'Belgrano' => 'Belgrano',
                        'Belleza' => 'Belleza',
                        'BenchNine' => 'BenchNine',
                        'Bentham' => 'Bentham',
                        'Berkshire Swash' => 'Berkshire Swash',
                        'Bevan' => 'Bevan',
                        'Bigelow Rules' => 'Bigelow Rules',
                        'Bigshot One' => 'Bigshot One',
                        'Bilbo' => 'Bilbo',
                        'Bilbo Swash Caps' => 'Bilbo Swash Caps',
                        'Bitter' => 'Bitter',
                        'Black Ops One' => 'Black Ops One',
                        'Bokor' => 'Bokor',
                        'Bonbon' => 'Bonbon',
                        'Boogaloo' => 'Boogaloo',
                        'Bowlby One' => 'Bowlby One',
                        'Bowlby One SC' => 'Bowlby One SC',
                        'Brawler' => 'Brawler',
                        'Bree Serif' => 'Bree Serif',
                        'Bubblegum Sans' => 'Bubblegum Sans',
                        'Bubbler One' => 'Bubbler One',
                        'Buda' => 'Buda',
                        'Buenard' => 'Buenard',
                        'Butcherman' => 'Butcherman',
                        'Butterfly Kids' => 'Butterfly Kids',
                        'Cabin' => 'Cabin',
                        'Cabin Condensed' => 'Cabin Condensed',
                        'Cabin Sketch' => 'Cabin Sketch',
                        'Caesar Dressing' => 'Caesar Dressing',
                        'Cagliostro' => 'Cagliostro',
                        'Calligraffitti' => 'Calligraffitti',
                        'Cambo' => 'Cambo',
                        'Candal' => 'Candal',
                        'Cantarell' => 'Cantarell',
                        'Cantata One' => 'Cantata One',
                        'Cantora One' => 'Cantora One',
                        'Capriola' => 'Capriola',
                        'Cardo' => 'Cardo',
                        'Carme' => 'Carme',
                        'Carrois Gothic' => 'Carrois Gothic',
                        'Carrois Gothic SC' => 'Carrois Gothic SC',
                        'Carter One' => 'Carter One',
                        'Caudex' => 'Caudex',
                        'Cedarville Cursive' => 'Cedarville Cursive',
                        'Ceviche One' => 'Ceviche One',
                        'Changa One' => 'Changa One',
                        'Chango' => 'Chango',
                        'Chau Philomene One' => 'Chau Philomene One',
                        'Chela One' => 'Chela One',
                        'Chelsea Market' => 'Chelsea Market',
                        'Chenla' => 'Chenla',
                        'Cherry Cream Soda' => 'Cherry Cream Soda',
                        'Cherry Swash' => 'Cherry Swash',
                        'Chewy' => 'Chewy',
                        'Chicle' => 'Chicle',
                        'Chivo' => 'Chivo',
                        'Cinzel' => 'Cinzel',
                        'Cinzel Decorative' => 'Cinzel Decorative',
                        'Clicker Script' => 'Clicker Script',
                        'Coda' => 'Coda',
                        'Coda Caption' => 'Coda Caption',
                        'Codystar' => 'Codystar',
                        'Combo' => 'Combo',
                        'Comfortaa' => 'Comfortaa',
                        'Coming Soon' => 'Coming Soon',
                        'Concert One' => 'Concert One',
                        'Condiment' => 'Condiment',
                        'Content' => 'Content',
                        'Contrail One' => 'Contrail One',
                        'Convergence' => 'Convergence',
                        'Cookie' => 'Cookie',
                        'Copse' => 'Copse',
                        'Corben' => 'Corben',
                        'Courgette' => 'Courgette',
                        'Cousine' => 'Cousine',
                        'Coustard' => 'Coustard',
                        'Covered By Your Grace' => 'Covered By Your Grace',
                        'Crafty Girls' => 'Crafty Girls',
                        'Creepster' => 'Creepster',
                        'Crete Round' => 'Crete Round',
                        'Crimson Text' => 'Crimson Text',
                        'Croissant One' => 'Croissant One',
                        'Crushed' => 'Crushed',
                        'Cuprum' => 'Cuprum',
                        'Cutive' => 'Cutive',
                        'Cutive Mono' => 'Cutive Mono',
                        'Damion' => 'Damion',
                        'Dancing Script' => 'Dancing Script',
                        'Dangrek' => 'Dangrek',
                        'Dawning of a New Day' => 'Dawning of a New Day',
                        'Days One' => 'Days One',
                        'Delius' => 'Delius',
                        'Delius Swash Caps' => 'Delius Swash Caps',
                        'Delius Unicase' => 'Delius Unicase',
                        'Della Respira' => 'Della Respira',
                        'Denk One' => 'Denk One',
                        'Devonshire' => 'Devonshire',
                        'Didact Gothic' => 'Didact Gothic',
                        'Diplomata' => 'Diplomata',
                        'Diplomata SC' => 'Diplomata SC',
                        'Domine' => 'Domine',
                        'Donegal One' => 'Donegal One',
                        'Doppio One' => 'Doppio One',
                        'Dorsa' => 'Dorsa',
                        'Dosis' => 'Dosis',
                        'Dr Sugiyama' => 'Dr Sugiyama',
                        'Droid Sans' => 'Droid Sans',
                        'Droid Sans Mono' => 'Droid Sans Mono',
                        'Droid Serif' => 'Droid Serif',
                        'Duru Sans' => 'Duru Sans',
                        'Dynalight' => 'Dynalight',
                        'EB Garamond' => 'EB Garamond',
                        'Eagle Lake' => 'Eagle Lake',
                        'Eater' => 'Eater',
                        'Economica' => 'Economica',
                        'Electrolize' => 'Electrolize',
                        'Elsie' => 'Elsie',
                        'Elsie Swash Caps' => 'Elsie Swash Caps',
                        'Emblema One' => 'Emblema One',
                        'Emilys Candy' => 'Emilys Candy',
                        'Engagement' => 'Engagement',
                        'Englebert' => 'Englebert',
                        'Enriqueta' => 'Enriqueta',
                        'Erica One' => 'Erica One',
                        'Esteban' => 'Esteban',
                        'Euphoria Script' => 'Euphoria Script',
                        'Ewert' => 'Ewert',
                        'Exo' => 'Exo',
                        'Exo 2' => 'Exo 2',
                        'Expletus Sans' => 'Expletus Sans',
                        'Fanwood Text' => 'Fanwood Text',
                        'Fascinate' => 'Fascinate',
                        'Fascinate Inline' => 'Fascinate Inline',
                        'Faster One' => 'Faster One',
                        'Fasthand' => 'Fasthand',
                        'Fauna One' => 'Fauna One',
                        'Federant' => 'Federant',
                        'Federo' => 'Federo',
                        'Felipa' => 'Felipa',
                        'Fenix' => 'Fenix',
                        'Finger Paint' => 'Finger Paint',
                        'Fjalla One' => 'Fjalla One',
                        'Fjord One' => 'Fjord One',
                        'Flamenco' => 'Flamenco',
                        'Flavors' => 'Flavors',
                        'Fondamento' => 'Fondamento',
                        'Fontdiner Swanky' => 'Fontdiner Swanky',
                        'Forum' => 'Forum',
                        'Francois One' => 'Francois One',
                        'Freckle Face' => 'Freckle Face',
                        'Fredericka the Great' => 'Fredericka the Great',
                        'Fredoka One' => 'Fredoka One',
                        'Freehand' => 'Freehand',
                        'Fresca' => 'Fresca',
                        'Frijole' => 'Frijole',
                        'Fruktur' => 'Fruktur',
                        'Fugaz One' => 'Fugaz One',
                        'GFS Didot' => 'GFS Didot',
                        'GFS Neohellenic' => 'GFS Neohellenic',
                        'Gabriela' => 'Gabriela',
                        'Gafata' => 'Gafata',
                        'Galdeano' => 'Galdeano',
                        'Galindo' => 'Galindo',
                        'Gentium Basic' => 'Gentium Basic',
                        'Gentium Book Basic' => 'Gentium Book Basic',
                        'Geo' => 'Geo',
                        'Geostar' => 'Geostar',
                        'Geostar Fill' => 'Geostar Fill',
                        'Germania One' => 'Germania One',
                        'Gilda Display' => 'Gilda Display',
                        'Give You Glory' => 'Give You Glory',
                        'Glass Antiqua' => 'Glass Antiqua',
                        'Glegoo' => 'Glegoo',
                        'Gloria Hallelujah' => 'Gloria Hallelujah',
                        'Goblin One' => 'Goblin One',
                        'Gochi Hand' => 'Gochi Hand',
                        'Gorditas' => 'Gorditas',
                        'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
                        'Graduate' => 'Graduate',
                        'Grand Hotel' => 'Grand Hotel',
                        'Gravitas One' => 'Gravitas One',
                        'Great Vibes' => 'Great Vibes',
                        'Griffy' => 'Griffy',
                        'Gruppo' => 'Gruppo',
                        'Gudea' => 'Gudea',
                        'Habibi' => 'Habibi',
                        'Hammersmith One' => 'Hammersmith One',
                        'Hanalei' => 'Hanalei',
                        'Hanalei Fill' => 'Hanalei Fill',
                        'Handlee' => 'Handlee',
                        'Hanuman' => 'Hanuman',
                        'Happy Monkey' => 'Happy Monkey',
                        'Headland One' => 'Headland One',
                        'Henny Penny' => 'Henny Penny',
                        'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
                        'Holtwood One SC' => 'Holtwood One SC',
                        'Homemade Apple' => 'Homemade Apple',
                        'Homenaje' => 'Homenaje',
                        'IM Fell DW Pica' => 'IM Fell DW Pica',
                        'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
                        'IM Fell Double Pica' => 'IM Fell Double Pica',
                        'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
                        'IM Fell English' => 'IM Fell English',
                        'IM Fell English SC' => 'IM Fell English SC',
                        'IM Fell French Canon' => 'IM Fell French Canon',
                        'IM Fell French Canon SC' => 'IM Fell French Canon SC',
                        'IM Fell Great Primer' => 'IM Fell Great Primer',
                        'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
                        'Iceberg' => 'Iceberg',
                        'Iceland' => 'Iceland',
                        'Imprima' => 'Imprima',
                        'Inconsolata' => 'Inconsolata',
                        'Inder' => 'Inder',
                        'Indie Flower' => 'Indie Flower',
                        'Inika' => 'Inika',
                        'Irish Grover' => 'Irish Grover',
                        'Istok Web' => 'Istok Web',
                        'Italiana' => 'Italiana',
                        'Italianno' => 'Italianno',
                        'Jacques Francois' => 'Jacques Francois',
                        'Jacques Francois Shadow' => 'Jacques Francois Shadow',
                        'Jim Nightshade' => 'Jim Nightshade',
                        'Jockey One' => 'Jockey One',
                        'Jolly Lodger' => 'Jolly Lodger',
                        'Josefin Sans' => 'Josefin Sans',
                        'Josefin Slab' => 'Josefin Slab',
                        'Joti One' => 'Joti One',
                        'Judson' => 'Judson',
                        'Julee' => 'Julee',
                        'Julius Sans One' => 'Julius Sans One',
                        'Junge' => 'Junge',
                        'Jura' => 'Jura',
                        'Just Another Hand' => 'Just Another Hand',
                        'Just Me Again Down Here' => 'Just Me Again Down Here',
                        'Kameron' => 'Kameron',
                        'Kantumruy' => 'Kantumruy',
                        'Karla' => 'Karla',
                        'Kaushan Script' => 'Kaushan Script',
                        'Kavoon' => 'Kavoon',
                        'Kdam Thmor' => 'Kdam Thmor',
                        'Keania One' => 'Keania One',
                        'Kelly Slab' => 'Kelly Slab',
                        'Kenia' => 'Kenia',
                        'Khmer' => 'Khmer',
                        'Kite One' => 'Kite One',
                        'Knewave' => 'Knewave',
                        'Kotta One' => 'Kotta One',
                        'Koulen' => 'Koulen',
                        'Kranky' => 'Kranky',
                        'Kreon' => 'Kreon',
                        'Kristi' => 'Kristi',
                        'Krona One' => 'Krona One',
                        'La Belle Aurore' => 'La Belle Aurore',
                        'Lancelot' => 'Lancelot',
                        'Lato' => 'Lato',
                        'League Script' => 'League Script',
                        'Leckerli One' => 'Leckerli One',
                        'Ledger' => 'Ledger',
                        'Lekton' => 'Lekton',
                        'Lemon' => 'Lemon',
                        'Libre Baskerville' => 'Libre Baskerville',
                        'Life Savers' => 'Life Savers',
                        'Lilita One' => 'Lilita One',
                        'Lily Script One' => 'Lily Script One',
                        'Limelight' => 'Limelight',
                        'Linden Hill' => 'Linden Hill',
                        'Lobster' => 'Lobster',
                        'Lobster Two' => 'Lobster Two',
                        'Londrina Outline' => 'Londrina Outline',
                        'Londrina Shadow' => 'Londrina Shadow',
                        'Londrina Sketch' => 'Londrina Sketch',
                        'Londrina Solid' => 'Londrina Solid',
                        'Lora' => 'Lora',
                        'Love Ya Like A Sister' => 'Love Ya Like A Sister',
                        'Loved by the King' => 'Loved by the King',
                        'Lovers Quarrel' => 'Lovers Quarrel',
                        'Luckiest Guy' => 'Luckiest Guy',
                        'Lusitana' => 'Lusitana',
                        'Lustria' => 'Lustria',
                        'Macondo' => 'Macondo',
                        'Macondo Swash Caps' => 'Macondo Swash Caps',
                        'Magra' => 'Magra',
                        'Maiden Orange' => 'Maiden Orange',
                        'Mako' => 'Mako',
                        'Marcellus' => 'Marcellus',
                        'Marcellus SC' => 'Marcellus SC',
                        'Marck Script' => 'Marck Script',
                        'Margarine' => 'Margarine',
                        'Marko One' => 'Marko One',
                        'Marmelad' => 'Marmelad',
                        'Marvel' => 'Marvel',
                        'Mate' => 'Mate',
                        'Mate SC' => 'Mate SC',
                        'Maven Pro' => 'Maven Pro',
                        'McLaren' => 'McLaren',
                        'Meddon' => 'Meddon',
                        'MedievalSharp' => 'MedievalSharp',
                        'Medula One' => 'Medula One',
                        'Megrim' => 'Megrim',
                        'Meie Script' => 'Meie Script',
                        'Merienda' => 'Merienda',
                        'Merienda One' => 'Merienda One',
                        'Merriweather' => 'Merriweather',
                        'Merriweather Sans' => 'Merriweather Sans',
                        'Metal' => 'Metal',
                        'Metal Mania' => 'Metal Mania',
                        'Metamorphous' => 'Metamorphous',
                        'Metrophobic' => 'Metrophobic',
                        'Michroma' => 'Michroma',
                        'Milonga' => 'Milonga',
                        'Miltonian' => 'Miltonian',
                        'Miltonian Tattoo' => 'Miltonian Tattoo',
                        'Miniver' => 'Miniver',
                        'Miss Fajardose' => 'Miss Fajardose',
                        'Modern Antiqua' => 'Modern Antiqua',
                        'Molengo' => 'Molengo',
                        'Molle' => 'Molle',
                        'Monda' => 'Monda',
                        'Monofett' => 'Monofett',
                        'Monoton' => 'Monoton',
                        'Monsieur La Doulaise' => 'Monsieur La Doulaise',
                        'Montaga' => 'Montaga',
                        'Montez' => 'Montez',
                        'Montserrat' => 'Montserrat',
                        'Montserrat Alternates' => 'Montserrat Alternates',
                        'Montserrat Subrayada' => 'Montserrat Subrayada',
                        'Moul' => 'Moul',
                        'Moulpali' => 'Moulpali',
                        'Mountains of Christmas' => 'Mountains of Christmas',
                        'Mouse Memoirs' => 'Mouse Memoirs',
                        'Mr Bedfort' => 'Mr Bedfort',
                        'Mr Dafoe' => 'Mr Dafoe',
                        'Mr De Haviland' => 'Mr De Haviland',
                        'Mrs Saint Delafield' => 'Mrs Saint Delafield',
                        'Mrs Sheppards' => 'Mrs Sheppards',
                        'Muli' => 'Muli',
                        'Mystery Quest' => 'Mystery Quest',
                        'Neucha' => 'Neucha',
                        'Neuton' => 'Neuton',
                        'New Rocker' => 'New Rocker',
                        'News Cycle' => 'News Cycle',
                        'Niconne' => 'Niconne',
                        'Nixie One' => 'Nixie One',
                        'Nobile' => 'Nobile',
                        'Nokora' => 'Nokora',
                        'Norican' => 'Norican',
                        'Nosifer' => 'Nosifer',
                        'Nothing You Could Do' => 'Nothing You Could Do',
                        'Noticia Text' => 'Noticia Text',
                        'Noto Sans' => 'Noto Sans',
                        'Noto Serif' => 'Noto Serif',
                        'Nova Cut' => 'Nova Cut',
                        'Nova Flat' => 'Nova Flat',
                        'Nova Mono' => 'Nova Mono',
                        'Nova Oval' => 'Nova Oval',
                        'Nova Round' => 'Nova Round',
                        'Nova Script' => 'Nova Script',
                        'Nova Slim' => 'Nova Slim',
                        'Nova Square' => 'Nova Square',
                        'Numans' => 'Numans',
                        'Nunito' => 'Nunito',
                        'Odor Mean Chey' => 'Odor Mean Chey',
                        'Offside' => 'Offside',
                        'Old Standard TT' => 'Old Standard TT',
                        'Oldenburg' => 'Oldenburg',
                        'Oleo Script' => 'Oleo Script',
                        'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
                        'Open Sans' => 'Open Sans',
                        'Open Sans Condensed' => 'Open Sans Condensed',
                        'Oranienbaum' => 'Oranienbaum',
                        'Orbitron' => 'Orbitron',
                        'Oregano' => 'Oregano',
                        'Orienta' => 'Orienta',
                        'Original Surfer' => 'Original Surfer',
                        'Oswald' => 'Oswald',
                        'Over the Rainbow' => 'Over the Rainbow',
                        'Overlock' => 'Overlock',
                        'Overlock SC' => 'Overlock SC',
                        'Ovo' => 'Ovo',
                        'Oxygen' => 'Oxygen',
                        'Oxygen Mono' => 'Oxygen Mono',
                        'PT Mono' => 'PT Mono',
                        'PT Sans' => 'PT Sans',
                        'PT Sans Caption' => 'PT Sans Caption',
                        'PT Sans Narrow' => 'PT Sans Narrow',
                        'PT Serif' => 'PT Serif',
                        'PT Serif Caption' => 'PT Serif Caption',
                        'Pacifico' => 'Pacifico',
                        'Paprika' => 'Paprika',
                        'Parisienne' => 'Parisienne',
                        'Passero One' => 'Passero One',
                        'Passion One' => 'Passion One',
                        'Pathway Gothic One' => 'Pathway Gothic One',
                        'Patrick Hand' => 'Patrick Hand',
                        'Patrick Hand SC' => 'Patrick Hand SC',
                        'Patua One' => 'Patua One',
                        'Paytone One' => 'Paytone One',
                        'Peralta' => 'Peralta',
                        'Permanent Marker' => 'Permanent Marker',
                        'Petit Formal Script' => 'Petit Formal Script',
                        'Petrona' => 'Petrona',
                        'Philosopher' => 'Philosopher',
                        'Piedra' => 'Piedra',
                        'Pinyon Script' => 'Pinyon Script',
                        'Pirata One' => 'Pirata One',
                        'Plaster' => 'Plaster',
                        'Play' => 'Play',
                        'Playball' => 'Playball',
                        'Playfair Display' => 'Playfair Display',
                        'Playfair Display SC' => 'Playfair Display SC',
                        'Podkova' => 'Podkova',
                        'Poiret One' => 'Poiret One',
                        'Poller One' => 'Poller One',
                        'Poly' => 'Poly',
                        'Pompiere' => 'Pompiere',
                        'Pontano Sans' => 'Pontano Sans',
                        'Port Lligat Sans' => 'Port Lligat Sans',
                        'Port Lligat Slab' => 'Port Lligat Slab',
                        'Prata' => 'Prata',
                        'Preahvihear' => 'Preahvihear',
                        'Press Start 2P' => 'Press Start 2P',
                        'Princess Sofia' => 'Princess Sofia',
                        'Prociono' => 'Prociono',
                        'Prosto One' => 'Prosto One',
                        'Puritan' => 'Puritan',
                        'Purple Purse' => 'Purple Purse',
                        'Quando' => 'Quando',
                        'Quantico' => 'Quantico',
                        'Quattrocento' => 'Quattrocento',
                        'Quattrocento Sans' => 'Quattrocento Sans',
                        'Questrial' => 'Questrial',
                        'Quicksand' => 'Quicksand',
                        'Quintessential' => 'Quintessential',
                        'Qwigley' => 'Qwigley',
                        'Racing Sans One' => 'Racing Sans One',
                        'Radley' => 'Radley',
                        'Raleway' => 'Raleway',
                        'Raleway Dots' => 'Raleway Dots',
                        'Rambla' => 'Rambla',
                        'Rammetto One' => 'Rammetto One',
                        'Ranchers' => 'Ranchers',
                        'Rancho' => 'Rancho',
                        'Rationale' => 'Rationale',
                        'Redressed' => 'Redressed',
                        'Reenie Beanie' => 'Reenie Beanie',
                        'Revalia' => 'Revalia',
                        'Ribeye' => 'Ribeye',
                        'Ribeye Marrow' => 'Ribeye Marrow',
                        'Righteous' => 'Righteous',
                        'Risque' => 'Risque',
                        'Roboto' => 'Roboto',
                        'Roboto Condensed' => 'Roboto Condensed',
                        'Roboto Slab' => 'Roboto Slab',
                        'Rochester' => 'Rochester',
                        'Rock Salt' => 'Rock Salt',
                        'Rokkitt' => 'Rokkitt',
                        'Romanesco' => 'Romanesco',
                        'Ropa Sans' => 'Ropa Sans',
                        'Rosario' => 'Rosario',
                        'Rosarivo' => 'Rosarivo',
                        'Rouge Script' => 'Rouge Script',
                        'Rubik Mono One' => 'Rubik Mono One',
                        'Rubik One' => 'Rubik One',
                        'Ruda' => 'Ruda',
                        'Rufina' => 'Rufina',
                        'Ruge Boogie' => 'Ruge Boogie',
                        'Ruluko' => 'Ruluko',
                        'Rum Raisin' => 'Rum Raisin',
                        'Ruslan Display' => 'Ruslan Display',
                        'Russo One' => 'Russo One',
                        'Ruthie' => 'Ruthie',
                        'Rye' => 'Rye',
                        'Sacramento' => 'Sacramento',
                        'Sail' => 'Sail',
                        'Salsa' => 'Salsa',
                        'Sanchez' => 'Sanchez',
                        'Sancreek' => 'Sancreek',
                        'Sansita One' => 'Sansita One',
                        'Sarina' => 'Sarina',
                        'Satisfy' => 'Satisfy',
                        'Scada' => 'Scada',
                        'Schoolbell' => 'Schoolbell',
                        'Seaweed Script' => 'Seaweed Script',
                        'Sevillana' => 'Sevillana',
                        'Seymour One' => 'Seymour One',
                        'Shadows Into Light' => 'Shadows Into Light',
                        'Shadows Into Light Two' => 'Shadows Into Light Two',
                        'Shanti' => 'Shanti',
                        'Share' => 'Share',
                        'Share Tech' => 'Share Tech',
                        'Share Tech Mono' => 'Share Tech Mono',
                        'Shojumaru' => 'Shojumaru',
                        'Short Stack' => 'Short Stack',
                        'Siemreap' => 'Siemreap',
                        'Sigmar One' => 'Sigmar One',
                        'Signika' => 'Signika',
                        'Signika Negative' => 'Signika Negative',
                        'Simonetta' => 'Simonetta',
                        'Sintony' => 'Sintony',
                        'Sirin Stencil' => 'Sirin Stencil',
                        'Six Caps' => 'Six Caps',
                        'Skranji' => 'Skranji',
                        'Slackey' => 'Slackey',
                        'Smokum' => 'Smokum',
                        'Smythe' => 'Smythe',
                        'Sniglet' => 'Sniglet',
                        'Snippet' => 'Snippet',
                        'Snowburst One' => 'Snowburst One',
                        'Sofadi One' => 'Sofadi One',
                        'Sofia' => 'Sofia',
                        'Sonsie One' => 'Sonsie One',
                        'Sorts Mill Goudy' => 'Sorts Mill Goudy',
                        'Source Code Pro' => 'Source Code Pro',
                        'Source Sans Pro' => 'Source Sans Pro',
                        'Special Elite' => 'Special Elite',
                        'Spicy Rice' => 'Spicy Rice',
                        'Spinnaker' => 'Spinnaker',
                        'Spirax' => 'Spirax',
                        'Squada One' => 'Squada One',
                        'Stalemate' => 'Stalemate',
                        'Stalinist One' => 'Stalinist One',
                        'Stardos Stencil' => 'Stardos Stencil',
                        'Stint Ultra Condensed' => 'Stint Ultra Condensed',
                        'Stint Ultra Expanded' => 'Stint Ultra Expanded',
                        'Stoke' => 'Stoke',
                        'Strait' => 'Strait',
                        'Sue Ellen Francisco' => 'Sue Ellen Francisco',
                        'Sunshiney' => 'Sunshiney',
                        'Supermercado One' => 'Supermercado One',
                        'Suwannaphum' => 'Suwannaphum',
                        'Swanky and Moo Moo' => 'Swanky and Moo Moo',
                        'Syncopate' => 'Syncopate',
                        'Tangerine' => 'Tangerine',
                        'Taprom' => 'Taprom',
                        'Tauri' => 'Tauri',
                        'Telex' => 'Telex',
                        'Tenor Sans' => 'Tenor Sans',
                        'Text Me One' => 'Text Me One',
                        'The Girl Next Door' => 'The Girl Next Door',
                        'Tienne' => 'Tienne',
                        'Tinos' => 'Tinos',
                        'Titan One' => 'Titan One',
                        'Titillium Web' => 'Titillium Web',
                        'Trade Winds' => 'Trade Winds',
                        'Trocchi' => 'Trocchi',
                        'Trochut' => 'Trochut',
                        'Trykker' => 'Trykker',
                        'Tulpen One' => 'Tulpen One',
                        'Ubuntu' => 'Ubuntu',
                        'Ubuntu Condensed' => 'Ubuntu Condensed',
                        'Ubuntu Mono' => 'Ubuntu Mono',
                        'Ultra' => 'Ultra',
                        'Uncial Antiqua' => 'Uncial Antiqua',
                        'Underdog' => 'Underdog',
                        'Unica One' => 'Unica One',
                        'UnifrakturCook' => 'UnifrakturCook',
                        'UnifrakturMaguntia' => 'UnifrakturMaguntia',
                        'Unkempt' => 'Unkempt',
                        'Unlock' => 'Unlock',
                        'Unna' => 'Unna',
                        'VT323' => 'VT323',
                        'Vampiro One' => 'Vampiro One',
                        'Varela' => 'Varela',
                        'Varela Round' => 'Varela Round',
                        'Vast Shadow' => 'Vast Shadow',
                        'Vibur' => 'Vibur',
                        'Vidaloka' => 'Vidaloka',
                        'Viga' => 'Viga',
                        'Voces' => 'Voces',
                        'Volkhov' => 'Volkhov',
                        'Vollkorn' => 'Vollkorn',
                        'Voltaire' => 'Voltaire',
                        'Waiting for the Sunrise' => 'Waiting for the Sunrise',
                        'Wallpoet' => 'Wallpoet',
                        'Walter Turncoat' => 'Walter Turncoat',
                        'Warnes' => 'Warnes',
                        'Wellfleet' => 'Wellfleet',
                        'Wendy One' => 'Wendy One',
                        'Wire One' => 'Wire One',
                        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
                        'Yellowtail' => 'Yellowtail',
                        'Yeseva One' => 'Yeseva One',
                        'Yesteryear' => 'Yesteryear',
                        'Zeyada' => 'Zeyada',
                    ),
                    'title' => 'Select Headings Font',
                    'default' => 'Antic Slab',
                ),
                array (
                    'desc' => 'Select a font family for footer headings',
                    'id' => 'google_footer_headings',
                    'type' => 'select',
                    'options' => array (
                        'Select Font' => 'Select Font',
                        'ABeeZee' => 'ABeeZee',
                        'Abel' => 'Abel',
                        'Abril Fatface' => 'Abril Fatface',
                        'Aclonica' => 'Aclonica',
                        'Acme' => 'Acme',
                        'Actor' => 'Actor',
                        'Adamina' => 'Adamina',
                        'Advent Pro' => 'Advent Pro',
                        'Aguafina Script' => 'Aguafina Script',
                        'Akronim' => 'Akronim',
                        'Aladin' => 'Aladin',
                        'Aldrich' => 'Aldrich',
                        'Alef' => 'Alef',
                        'Alegreya' => 'Alegreya',
                        'Alegreya SC' => 'Alegreya SC',
                        'Alegreya Sans' => 'Alegreya Sans',
                        'Alegreya Sans SC' => 'Alegreya Sans SC',
                        'Alex Brush' => 'Alex Brush',
                        'Alfa Slab One' => 'Alfa Slab One',
                        'Alice' => 'Alice',
                        'Alike' => 'Alike',
                        'Alike Angular' => 'Alike Angular',
                        'Allan' => 'Allan',
                        'Allerta' => 'Allerta',
                        'Allerta Stencil' => 'Allerta Stencil',
                        'Allura' => 'Allura',
                        'Almendra' => 'Almendra',
                        'Almendra Display' => 'Almendra Display',
                        'Almendra SC' => 'Almendra SC',
                        'Amarante' => 'Amarante',
                        'Amaranth' => 'Amaranth',
                        'Amatic SC' => 'Amatic SC',
                        'Amethysta' => 'Amethysta',
                        'Anaheim' => 'Anaheim',
                        'Andada' => 'Andada',
                        'Andika' => 'Andika',
                        'Angkor' => 'Angkor',
                        'Annie Use Your Telescope' => 'Annie Use Your Telescope',
                        'Anonymous Pro' => 'Anonymous Pro',
                        'Antic' => 'Antic',
                        'Antic Didone' => 'Antic Didone',
                        'Antic Slab' => 'Antic Slab',
                        'Anton' => 'Anton',
                        'Arapey' => 'Arapey',
                        'Arbutus' => 'Arbutus',
                        'Arbutus Slab' => 'Arbutus Slab',
                        'Architects Daughter' => 'Architects Daughter',
                        'Archivo Black' => 'Archivo Black',
                        'Archivo Narrow' => 'Archivo Narrow',
                        'Arimo' => 'Arimo',
                        'Arizonia' => 'Arizonia',
                        'Armata' => 'Armata',
                        'Artifika' => 'Artifika',
                        'Arvo' => 'Arvo',
                        'Asap' => 'Asap',
                        'Asset' => 'Asset',
                        'Astloch' => 'Astloch',
                        'Asul' => 'Asul',
                        'Atomic Age' => 'Atomic Age',
                        'Aubrey' => 'Aubrey',
                        'Audiowide' => 'Audiowide',
                        'Autour One' => 'Autour One',
                        'Average' => 'Average',
                        'Average Sans' => 'Average Sans',
                        'Averia Gruesa Libre' => 'Averia Gruesa Libre',
                        'Averia Libre' => 'Averia Libre',
                        'Averia Sans Libre' => 'Averia Sans Libre',
                        'Averia Serif Libre' => 'Averia Serif Libre',
                        'Bad Script' => 'Bad Script',
                        'Balthazar' => 'Balthazar',
                        'Bangers' => 'Bangers',
                        'Basic' => 'Basic',
                        'Battambang' => 'Battambang',
                        'Baumans' => 'Baumans',
                        'Bayon' => 'Bayon',
                        'Belgrano' => 'Belgrano',
                        'Belleza' => 'Belleza',
                        'BenchNine' => 'BenchNine',
                        'Bentham' => 'Bentham',
                        'Berkshire Swash' => 'Berkshire Swash',
                        'Bevan' => 'Bevan',
                        'Bigelow Rules' => 'Bigelow Rules',
                        'Bigshot One' => 'Bigshot One',
                        'Bilbo' => 'Bilbo',
                        'Bilbo Swash Caps' => 'Bilbo Swash Caps',
                        'Bitter' => 'Bitter',
                        'Black Ops One' => 'Black Ops One',
                        'Bokor' => 'Bokor',
                        'Bonbon' => 'Bonbon',
                        'Boogaloo' => 'Boogaloo',
                        'Bowlby One' => 'Bowlby One',
                        'Bowlby One SC' => 'Bowlby One SC',
                        'Brawler' => 'Brawler',
                        'Bree Serif' => 'Bree Serif',
                        'Bubblegum Sans' => 'Bubblegum Sans',
                        'Bubbler One' => 'Bubbler One',
                        'Buda' => 'Buda',
                        'Buenard' => 'Buenard',
                        'Butcherman' => 'Butcherman',
                        'Butterfly Kids' => 'Butterfly Kids',
                        'Cabin' => 'Cabin',
                        'Cabin Condensed' => 'Cabin Condensed',
                        'Cabin Sketch' => 'Cabin Sketch',
                        'Caesar Dressing' => 'Caesar Dressing',
                        'Cagliostro' => 'Cagliostro',
                        'Calligraffitti' => 'Calligraffitti',
                        'Cambo' => 'Cambo',
                        'Candal' => 'Candal',
                        'Cantarell' => 'Cantarell',
                        'Cantata One' => 'Cantata One',
                        'Cantora One' => 'Cantora One',
                        'Capriola' => 'Capriola',
                        'Cardo' => 'Cardo',
                        'Carme' => 'Carme',
                        'Carrois Gothic' => 'Carrois Gothic',
                        'Carrois Gothic SC' => 'Carrois Gothic SC',
                        'Carter One' => 'Carter One',
                        'Caudex' => 'Caudex',
                        'Cedarville Cursive' => 'Cedarville Cursive',
                        'Ceviche One' => 'Ceviche One',
                        'Changa One' => 'Changa One',
                        'Chango' => 'Chango',
                        'Chau Philomene One' => 'Chau Philomene One',
                        'Chela One' => 'Chela One',
                        'Chelsea Market' => 'Chelsea Market',
                        'Chenla' => 'Chenla',
                        'Cherry Cream Soda' => 'Cherry Cream Soda',
                        'Cherry Swash' => 'Cherry Swash',
                        'Chewy' => 'Chewy',
                        'Chicle' => 'Chicle',
                        'Chivo' => 'Chivo',
                        'Cinzel' => 'Cinzel',
                        'Cinzel Decorative' => 'Cinzel Decorative',
                        'Clicker Script' => 'Clicker Script',
                        'Coda' => 'Coda',
                        'Coda Caption' => 'Coda Caption',
                        'Codystar' => 'Codystar',
                        'Combo' => 'Combo',
                        'Comfortaa' => 'Comfortaa',
                        'Coming Soon' => 'Coming Soon',
                        'Concert One' => 'Concert One',
                        'Condiment' => 'Condiment',
                        'Content' => 'Content',
                        'Contrail One' => 'Contrail One',
                        'Convergence' => 'Convergence',
                        'Cookie' => 'Cookie',
                        'Copse' => 'Copse',
                        'Corben' => 'Corben',
                        'Courgette' => 'Courgette',
                        'Cousine' => 'Cousine',
                        'Coustard' => 'Coustard',
                        'Covered By Your Grace' => 'Covered By Your Grace',
                        'Crafty Girls' => 'Crafty Girls',
                        'Creepster' => 'Creepster',
                        'Crete Round' => 'Crete Round',
                        'Crimson Text' => 'Crimson Text',
                        'Croissant One' => 'Croissant One',
                        'Crushed' => 'Crushed',
                        'Cuprum' => 'Cuprum',
                        'Cutive' => 'Cutive',
                        'Cutive Mono' => 'Cutive Mono',
                        'Damion' => 'Damion',
                        'Dancing Script' => 'Dancing Script',
                        'Dangrek' => 'Dangrek',
                        'Dawning of a New Day' => 'Dawning of a New Day',
                        'Days One' => 'Days One',
                        'Delius' => 'Delius',
                        'Delius Swash Caps' => 'Delius Swash Caps',
                        'Delius Unicase' => 'Delius Unicase',
                        'Della Respira' => 'Della Respira',
                        'Denk One' => 'Denk One',
                        'Devonshire' => 'Devonshire',
                        'Didact Gothic' => 'Didact Gothic',
                        'Diplomata' => 'Diplomata',
                        'Diplomata SC' => 'Diplomata SC',
                        'Domine' => 'Domine',
                        'Donegal One' => 'Donegal One',
                        'Doppio One' => 'Doppio One',
                        'Dorsa' => 'Dorsa',
                        'Dosis' => 'Dosis',
                        'Dr Sugiyama' => 'Dr Sugiyama',
                        'Droid Sans' => 'Droid Sans',
                        'Droid Sans Mono' => 'Droid Sans Mono',
                        'Droid Serif' => 'Droid Serif',
                        'Duru Sans' => 'Duru Sans',
                        'Dynalight' => 'Dynalight',
                        'EB Garamond' => 'EB Garamond',
                        'Eagle Lake' => 'Eagle Lake',
                        'Eater' => 'Eater',
                        'Economica' => 'Economica',
                        'Electrolize' => 'Electrolize',
                        'Elsie' => 'Elsie',
                        'Elsie Swash Caps' => 'Elsie Swash Caps',
                        'Emblema One' => 'Emblema One',
                        'Emilys Candy' => 'Emilys Candy',
                        'Engagement' => 'Engagement',
                        'Englebert' => 'Englebert',
                        'Enriqueta' => 'Enriqueta',
                        'Erica One' => 'Erica One',
                        'Esteban' => 'Esteban',
                        'Euphoria Script' => 'Euphoria Script',
                        'Ewert' => 'Ewert',
                        'Exo' => 'Exo',
                        'Exo 2' => 'Exo 2',
                        'Expletus Sans' => 'Expletus Sans',
                        'Fanwood Text' => 'Fanwood Text',
                        'Fascinate' => 'Fascinate',
                        'Fascinate Inline' => 'Fascinate Inline',
                        'Faster One' => 'Faster One',
                        'Fasthand' => 'Fasthand',
                        'Fauna One' => 'Fauna One',
                        'Federant' => 'Federant',
                        'Federo' => 'Federo',
                        'Felipa' => 'Felipa',
                        'Fenix' => 'Fenix',
                        'Finger Paint' => 'Finger Paint',
                        'Fjalla One' => 'Fjalla One',
                        'Fjord One' => 'Fjord One',
                        'Flamenco' => 'Flamenco',
                        'Flavors' => 'Flavors',
                        'Fondamento' => 'Fondamento',
                        'Fontdiner Swanky' => 'Fontdiner Swanky',
                        'Forum' => 'Forum',
                        'Francois One' => 'Francois One',
                        'Freckle Face' => 'Freckle Face',
                        'Fredericka the Great' => 'Fredericka the Great',
                        'Fredoka One' => 'Fredoka One',
                        'Freehand' => 'Freehand',
                        'Fresca' => 'Fresca',
                        'Frijole' => 'Frijole',
                        'Fruktur' => 'Fruktur',
                        'Fugaz One' => 'Fugaz One',
                        'GFS Didot' => 'GFS Didot',
                        'GFS Neohellenic' => 'GFS Neohellenic',
                        'Gabriela' => 'Gabriela',
                        'Gafata' => 'Gafata',
                        'Galdeano' => 'Galdeano',
                        'Galindo' => 'Galindo',
                        'Gentium Basic' => 'Gentium Basic',
                        'Gentium Book Basic' => 'Gentium Book Basic',
                        'Geo' => 'Geo',
                        'Geostar' => 'Geostar',
                        'Geostar Fill' => 'Geostar Fill',
                        'Germania One' => 'Germania One',
                        'Gilda Display' => 'Gilda Display',
                        'Give You Glory' => 'Give You Glory',
                        'Glass Antiqua' => 'Glass Antiqua',
                        'Glegoo' => 'Glegoo',
                        'Gloria Hallelujah' => 'Gloria Hallelujah',
                        'Goblin One' => 'Goblin One',
                        'Gochi Hand' => 'Gochi Hand',
                        'Gorditas' => 'Gorditas',
                        'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
                        'Graduate' => 'Graduate',
                        'Grand Hotel' => 'Grand Hotel',
                        'Gravitas One' => 'Gravitas One',
                        'Great Vibes' => 'Great Vibes',
                        'Griffy' => 'Griffy',
                        'Gruppo' => 'Gruppo',
                        'Gudea' => 'Gudea',
                        'Habibi' => 'Habibi',
                        'Hammersmith One' => 'Hammersmith One',
                        'Hanalei' => 'Hanalei',
                        'Hanalei Fill' => 'Hanalei Fill',
                        'Handlee' => 'Handlee',
                        'Hanuman' => 'Hanuman',
                        'Happy Monkey' => 'Happy Monkey',
                        'Headland One' => 'Headland One',
                        'Henny Penny' => 'Henny Penny',
                        'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
                        'Holtwood One SC' => 'Holtwood One SC',
                        'Homemade Apple' => 'Homemade Apple',
                        'Homenaje' => 'Homenaje',
                        'IM Fell DW Pica' => 'IM Fell DW Pica',
                        'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
                        'IM Fell Double Pica' => 'IM Fell Double Pica',
                        'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
                        'IM Fell English' => 'IM Fell English',
                        'IM Fell English SC' => 'IM Fell English SC',
                        'IM Fell French Canon' => 'IM Fell French Canon',
                        'IM Fell French Canon SC' => 'IM Fell French Canon SC',
                        'IM Fell Great Primer' => 'IM Fell Great Primer',
                        'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
                        'Iceberg' => 'Iceberg',
                        'Iceland' => 'Iceland',
                        'Imprima' => 'Imprima',
                        'Inconsolata' => 'Inconsolata',
                        'Inder' => 'Inder',
                        'Indie Flower' => 'Indie Flower',
                        'Inika' => 'Inika',
                        'Irish Grover' => 'Irish Grover',
                        'Istok Web' => 'Istok Web',
                        'Italiana' => 'Italiana',
                        'Italianno' => 'Italianno',
                        'Jacques Francois' => 'Jacques Francois',
                        'Jacques Francois Shadow' => 'Jacques Francois Shadow',
                        'Jim Nightshade' => 'Jim Nightshade',
                        'Jockey One' => 'Jockey One',
                        'Jolly Lodger' => 'Jolly Lodger',
                        'Josefin Sans' => 'Josefin Sans',
                        'Josefin Slab' => 'Josefin Slab',
                        'Joti One' => 'Joti One',
                        'Judson' => 'Judson',
                        'Julee' => 'Julee',
                        'Julius Sans One' => 'Julius Sans One',
                        'Junge' => 'Junge',
                        'Jura' => 'Jura',
                        'Just Another Hand' => 'Just Another Hand',
                        'Just Me Again Down Here' => 'Just Me Again Down Here',
                        'Kameron' => 'Kameron',
                        'Kantumruy' => 'Kantumruy',
                        'Karla' => 'Karla',
                        'Kaushan Script' => 'Kaushan Script',
                        'Kavoon' => 'Kavoon',
                        'Kdam Thmor' => 'Kdam Thmor',
                        'Keania One' => 'Keania One',
                        'Kelly Slab' => 'Kelly Slab',
                        'Kenia' => 'Kenia',
                        'Khmer' => 'Khmer',
                        'Kite One' => 'Kite One',
                        'Knewave' => 'Knewave',
                        'Kotta One' => 'Kotta One',
                        'Koulen' => 'Koulen',
                        'Kranky' => 'Kranky',
                        'Kreon' => 'Kreon',
                        'Kristi' => 'Kristi',
                        'Krona One' => 'Krona One',
                        'La Belle Aurore' => 'La Belle Aurore',
                        'Lancelot' => 'Lancelot',
                        'Lato' => 'Lato',
                        'League Script' => 'League Script',
                        'Leckerli One' => 'Leckerli One',
                        'Ledger' => 'Ledger',
                        'Lekton' => 'Lekton',
                        'Lemon' => 'Lemon',
                        'Libre Baskerville' => 'Libre Baskerville',
                        'Life Savers' => 'Life Savers',
                        'Lilita One' => 'Lilita One',
                        'Lily Script One' => 'Lily Script One',
                        'Limelight' => 'Limelight',
                        'Linden Hill' => 'Linden Hill',
                        'Lobster' => 'Lobster',
                        'Lobster Two' => 'Lobster Two',
                        'Londrina Outline' => 'Londrina Outline',
                        'Londrina Shadow' => 'Londrina Shadow',
                        'Londrina Sketch' => 'Londrina Sketch',
                        'Londrina Solid' => 'Londrina Solid',
                        'Lora' => 'Lora',
                        'Love Ya Like A Sister' => 'Love Ya Like A Sister',
                        'Loved by the King' => 'Loved by the King',
                        'Lovers Quarrel' => 'Lovers Quarrel',
                        'Luckiest Guy' => 'Luckiest Guy',
                        'Lusitana' => 'Lusitana',
                        'Lustria' => 'Lustria',
                        'Macondo' => 'Macondo',
                        'Macondo Swash Caps' => 'Macondo Swash Caps',
                        'Magra' => 'Magra',
                        'Maiden Orange' => 'Maiden Orange',
                        'Mako' => 'Mako',
                        'Marcellus' => 'Marcellus',
                        'Marcellus SC' => 'Marcellus SC',
                        'Marck Script' => 'Marck Script',
                        'Margarine' => 'Margarine',
                        'Marko One' => 'Marko One',
                        'Marmelad' => 'Marmelad',
                        'Marvel' => 'Marvel',
                        'Mate' => 'Mate',
                        'Mate SC' => 'Mate SC',
                        'Maven Pro' => 'Maven Pro',
                        'McLaren' => 'McLaren',
                        'Meddon' => 'Meddon',
                        'MedievalSharp' => 'MedievalSharp',
                        'Medula One' => 'Medula One',
                        'Megrim' => 'Megrim',
                        'Meie Script' => 'Meie Script',
                        'Merienda' => 'Merienda',
                        'Merienda One' => 'Merienda One',
                        'Merriweather' => 'Merriweather',
                        'Merriweather Sans' => 'Merriweather Sans',
                        'Metal' => 'Metal',
                        'Metal Mania' => 'Metal Mania',
                        'Metamorphous' => 'Metamorphous',
                        'Metrophobic' => 'Metrophobic',
                        'Michroma' => 'Michroma',
                        'Milonga' => 'Milonga',
                        'Miltonian' => 'Miltonian',
                        'Miltonian Tattoo' => 'Miltonian Tattoo',
                        'Miniver' => 'Miniver',
                        'Miss Fajardose' => 'Miss Fajardose',
                        'Modern Antiqua' => 'Modern Antiqua',
                        'Molengo' => 'Molengo',
                        'Molle' => 'Molle',
                        'Monda' => 'Monda',
                        'Monofett' => 'Monofett',
                        'Monoton' => 'Monoton',
                        'Monsieur La Doulaise' => 'Monsieur La Doulaise',
                        'Montaga' => 'Montaga',
                        'Montez' => 'Montez',
                        'Montserrat' => 'Montserrat',
                        'Montserrat Alternates' => 'Montserrat Alternates',
                        'Montserrat Subrayada' => 'Montserrat Subrayada',
                        'Moul' => 'Moul',
                        'Moulpali' => 'Moulpali',
                        'Mountains of Christmas' => 'Mountains of Christmas',
                        'Mouse Memoirs' => 'Mouse Memoirs',
                        'Mr Bedfort' => 'Mr Bedfort',
                        'Mr Dafoe' => 'Mr Dafoe',
                        'Mr De Haviland' => 'Mr De Haviland',
                        'Mrs Saint Delafield' => 'Mrs Saint Delafield',
                        'Mrs Sheppards' => 'Mrs Sheppards',
                        'Muli' => 'Muli',
                        'Mystery Quest' => 'Mystery Quest',
                        'Neucha' => 'Neucha',
                        'Neuton' => 'Neuton',
                        'New Rocker' => 'New Rocker',
                        'News Cycle' => 'News Cycle',
                        'Niconne' => 'Niconne',
                        'Nixie One' => 'Nixie One',
                        'Nobile' => 'Nobile',
                        'Nokora' => 'Nokora',
                        'Norican' => 'Norican',
                        'Nosifer' => 'Nosifer',
                        'Nothing You Could Do' => 'Nothing You Could Do',
                        'Noticia Text' => 'Noticia Text',
                        'Noto Sans' => 'Noto Sans',
                        'Noto Serif' => 'Noto Serif',
                        'Nova Cut' => 'Nova Cut',
                        'Nova Flat' => 'Nova Flat',
                        'Nova Mono' => 'Nova Mono',
                        'Nova Oval' => 'Nova Oval',
                        'Nova Round' => 'Nova Round',
                        'Nova Script' => 'Nova Script',
                        'Nova Slim' => 'Nova Slim',
                        'Nova Square' => 'Nova Square',
                        'Numans' => 'Numans',
                        'Nunito' => 'Nunito',
                        'Odor Mean Chey' => 'Odor Mean Chey',
                        'Offside' => 'Offside',
                        'Old Standard TT' => 'Old Standard TT',
                        'Oldenburg' => 'Oldenburg',
                        'Oleo Script' => 'Oleo Script',
                        'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
                        'Open Sans' => 'Open Sans',
                        'Open Sans Condensed' => 'Open Sans Condensed',
                        'Oranienbaum' => 'Oranienbaum',
                        'Orbitron' => 'Orbitron',
                        'Oregano' => 'Oregano',
                        'Orienta' => 'Orienta',
                        'Original Surfer' => 'Original Surfer',
                        'Oswald' => 'Oswald',
                        'Over the Rainbow' => 'Over the Rainbow',
                        'Overlock' => 'Overlock',
                        'Overlock SC' => 'Overlock SC',
                        'Ovo' => 'Ovo',
                        'Oxygen' => 'Oxygen',
                        'Oxygen Mono' => 'Oxygen Mono',
                        'PT Mono' => 'PT Mono',
                        'PT Sans' => 'PT Sans',
                        'PT Sans Caption' => 'PT Sans Caption',
                        'PT Sans Narrow' => 'PT Sans Narrow',
                        'PT Serif' => 'PT Serif',
                        'PT Serif Caption' => 'PT Serif Caption',
                        'Pacifico' => 'Pacifico',
                        'Paprika' => 'Paprika',
                        'Parisienne' => 'Parisienne',
                        'Passero One' => 'Passero One',
                        'Passion One' => 'Passion One',
                        'Pathway Gothic One' => 'Pathway Gothic One',
                        'Patrick Hand' => 'Patrick Hand',
                        'Patrick Hand SC' => 'Patrick Hand SC',
                        'Patua One' => 'Patua One',
                        'Paytone One' => 'Paytone One',
                        'Peralta' => 'Peralta',
                        'Permanent Marker' => 'Permanent Marker',
                        'Petit Formal Script' => 'Petit Formal Script',
                        'Petrona' => 'Petrona',
                        'Philosopher' => 'Philosopher',
                        'Piedra' => 'Piedra',
                        'Pinyon Script' => 'Pinyon Script',
                        'Pirata One' => 'Pirata One',
                        'Plaster' => 'Plaster',
                        'Play' => 'Play',
                        'Playball' => 'Playball',
                        'Playfair Display' => 'Playfair Display',
                        'Playfair Display SC' => 'Playfair Display SC',
                        'Podkova' => 'Podkova',
                        'Poiret One' => 'Poiret One',
                        'Poller One' => 'Poller One',
                        'Poly' => 'Poly',
                        'Pompiere' => 'Pompiere',
                        'Pontano Sans' => 'Pontano Sans',
                        'Port Lligat Sans' => 'Port Lligat Sans',
                        'Port Lligat Slab' => 'Port Lligat Slab',
                        'Prata' => 'Prata',
                        'Preahvihear' => 'Preahvihear',
                        'Press Start 2P' => 'Press Start 2P',
                        'Princess Sofia' => 'Princess Sofia',
                        'Prociono' => 'Prociono',
                        'Prosto One' => 'Prosto One',
                        'Puritan' => 'Puritan',
                        'Purple Purse' => 'Purple Purse',
                        'Quando' => 'Quando',
                        'Quantico' => 'Quantico',
                        'Quattrocento' => 'Quattrocento',
                        'Quattrocento Sans' => 'Quattrocento Sans',
                        'Questrial' => 'Questrial',
                        'Quicksand' => 'Quicksand',
                        'Quintessential' => 'Quintessential',
                        'Qwigley' => 'Qwigley',
                        'Racing Sans One' => 'Racing Sans One',
                        'Radley' => 'Radley',
                        'Raleway' => 'Raleway',
                        'Raleway Dots' => 'Raleway Dots',
                        'Rambla' => 'Rambla',
                        'Rammetto One' => 'Rammetto One',
                        'Ranchers' => 'Ranchers',
                        'Rancho' => 'Rancho',
                        'Rationale' => 'Rationale',
                        'Redressed' => 'Redressed',
                        'Reenie Beanie' => 'Reenie Beanie',
                        'Revalia' => 'Revalia',
                        'Ribeye' => 'Ribeye',
                        'Ribeye Marrow' => 'Ribeye Marrow',
                        'Righteous' => 'Righteous',
                        'Risque' => 'Risque',
                        'Roboto' => 'Roboto',
                        'Roboto Condensed' => 'Roboto Condensed',
                        'Roboto Slab' => 'Roboto Slab',
                        'Rochester' => 'Rochester',
                        'Rock Salt' => 'Rock Salt',
                        'Rokkitt' => 'Rokkitt',
                        'Romanesco' => 'Romanesco',
                        'Ropa Sans' => 'Ropa Sans',
                        'Rosario' => 'Rosario',
                        'Rosarivo' => 'Rosarivo',
                        'Rouge Script' => 'Rouge Script',
                        'Rubik Mono One' => 'Rubik Mono One',
                        'Rubik One' => 'Rubik One',
                        'Ruda' => 'Ruda',
                        'Rufina' => 'Rufina',
                        'Ruge Boogie' => 'Ruge Boogie',
                        'Ruluko' => 'Ruluko',
                        'Rum Raisin' => 'Rum Raisin',
                        'Ruslan Display' => 'Ruslan Display',
                        'Russo One' => 'Russo One',
                        'Ruthie' => 'Ruthie',
                        'Rye' => 'Rye',
                        'Sacramento' => 'Sacramento',
                        'Sail' => 'Sail',
                        'Salsa' => 'Salsa',
                        'Sanchez' => 'Sanchez',
                        'Sancreek' => 'Sancreek',
                        'Sansita One' => 'Sansita One',
                        'Sarina' => 'Sarina',
                        'Satisfy' => 'Satisfy',
                        'Scada' => 'Scada',
                        'Schoolbell' => 'Schoolbell',
                        'Seaweed Script' => 'Seaweed Script',
                        'Sevillana' => 'Sevillana',
                        'Seymour One' => 'Seymour One',
                        'Shadows Into Light' => 'Shadows Into Light',
                        'Shadows Into Light Two' => 'Shadows Into Light Two',
                        'Shanti' => 'Shanti',
                        'Share' => 'Share',
                        'Share Tech' => 'Share Tech',
                        'Share Tech Mono' => 'Share Tech Mono',
                        'Shojumaru' => 'Shojumaru',
                        'Short Stack' => 'Short Stack',
                        'Siemreap' => 'Siemreap',
                        'Sigmar One' => 'Sigmar One',
                        'Signika' => 'Signika',
                        'Signika Negative' => 'Signika Negative',
                        'Simonetta' => 'Simonetta',
                        'Sintony' => 'Sintony',
                        'Sirin Stencil' => 'Sirin Stencil',
                        'Six Caps' => 'Six Caps',
                        'Skranji' => 'Skranji',
                        'Slackey' => 'Slackey',
                        'Smokum' => 'Smokum',
                        'Smythe' => 'Smythe',
                        'Sniglet' => 'Sniglet',
                        'Snippet' => 'Snippet',
                        'Snowburst One' => 'Snowburst One',
                        'Sofadi One' => 'Sofadi One',
                        'Sofia' => 'Sofia',
                        'Sonsie One' => 'Sonsie One',
                        'Sorts Mill Goudy' => 'Sorts Mill Goudy',
                        'Source Code Pro' => 'Source Code Pro',
                        'Source Sans Pro' => 'Source Sans Pro',
                        'Special Elite' => 'Special Elite',
                        'Spicy Rice' => 'Spicy Rice',
                        'Spinnaker' => 'Spinnaker',
                        'Spirax' => 'Spirax',
                        'Squada One' => 'Squada One',
                        'Stalemate' => 'Stalemate',
                        'Stalinist One' => 'Stalinist One',
                        'Stardos Stencil' => 'Stardos Stencil',
                        'Stint Ultra Condensed' => 'Stint Ultra Condensed',
                        'Stint Ultra Expanded' => 'Stint Ultra Expanded',
                        'Stoke' => 'Stoke',
                        'Strait' => 'Strait',
                        'Sue Ellen Francisco' => 'Sue Ellen Francisco',
                        'Sunshiney' => 'Sunshiney',
                        'Supermercado One' => 'Supermercado One',
                        'Suwannaphum' => 'Suwannaphum',
                        'Swanky and Moo Moo' => 'Swanky and Moo Moo',
                        'Syncopate' => 'Syncopate',
                        'Tangerine' => 'Tangerine',
                        'Taprom' => 'Taprom',
                        'Tauri' => 'Tauri',
                        'Telex' => 'Telex',
                        'Tenor Sans' => 'Tenor Sans',
                        'Text Me One' => 'Text Me One',
                        'The Girl Next Door' => 'The Girl Next Door',
                        'Tienne' => 'Tienne',
                        'Tinos' => 'Tinos',
                        'Titan One' => 'Titan One',
                        'Titillium Web' => 'Titillium Web',
                        'Trade Winds' => 'Trade Winds',
                        'Trocchi' => 'Trocchi',
                        'Trochut' => 'Trochut',
                        'Trykker' => 'Trykker',
                        'Tulpen One' => 'Tulpen One',
                        'Ubuntu' => 'Ubuntu',
                        'Ubuntu Condensed' => 'Ubuntu Condensed',
                        'Ubuntu Mono' => 'Ubuntu Mono',
                        'Ultra' => 'Ultra',
                        'Uncial Antiqua' => 'Uncial Antiqua',
                        'Underdog' => 'Underdog',
                        'Unica One' => 'Unica One',
                        'UnifrakturCook' => 'UnifrakturCook',
                        'UnifrakturMaguntia' => 'UnifrakturMaguntia',
                        'Unkempt' => 'Unkempt',
                        'Unlock' => 'Unlock',
                        'Unna' => 'Unna',
                        'VT323' => 'VT323',
                        'Vampiro One' => 'Vampiro One',
                        'Varela' => 'Varela',
                        'Varela Round' => 'Varela Round',
                        'Vast Shadow' => 'Vast Shadow',
                        'Vibur' => 'Vibur',
                        'Vidaloka' => 'Vidaloka',
                        'Viga' => 'Viga',
                        'Voces' => 'Voces',
                        'Volkhov' => 'Volkhov',
                        'Vollkorn' => 'Vollkorn',
                        'Voltaire' => 'Voltaire',
                        'Waiting for the Sunrise' => 'Waiting for the Sunrise',
                        'Wallpoet' => 'Wallpoet',
                        'Walter Turncoat' => 'Walter Turncoat',
                        'Warnes' => 'Warnes',
                        'Wellfleet' => 'Wellfleet',
                        'Wendy One' => 'Wendy One',
                        'Wire One' => 'Wire One',
                        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
                        'Yellowtail' => 'Yellowtail',
                        'Yeseva One' => 'Yeseva One',
                        'Yesteryear' => 'Yesteryear',
                        'Zeyada' => 'Zeyada',
                    ),
                    'title' => 'Select Footer Headings Font',
                    'default' => 'Antic Slab',
                ),
                array (
                    'id' => 'google_fonts_intro',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Google Fonts',
                    'default' => '<h3 style=\'margin: 0;\'>Google Fonts</h3><p style=\'margin-bottom:0;\'>This will override standard font options.</p>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(18) "google_fonts_intro"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(12) "Google Fonts"
        ["default"]=>
        string(113) "<h3 style=\'margin: 0;\'>Google Fonts</h3><p style=\'margin-bottom:0;\'>This will override standard font options.</p>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'standard_fonts_intro',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Standard Fonts',
                    'default' => '<h3 style=\'margin: 0;\'>Standards</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(20) "standard_fonts_intro"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(14) "Standard Fonts"
        ["default"]=>
        string(37) "<h3 style=\'margin: 0;\'>Standards</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Select a font family for body text',
                    'id' => 'standard_body',
                    'type' => 'select',
                    'options' => array (
                        0 => 'Select Font',
                        'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
                        '\'Arial Black\', Gadget, sans-serif' => '\'Arial Black\', Gadget, sans-serif',
                        '\'Bookman Old Style\', serif' => '\'Bookman Old Style\', serif',
                        '\'Comic Sans MS\', cursive' => '\'Comic Sans MS\', cursive',
                        'Courier, monospace' => 'Courier, monospace',
                        'Garamond, serif' => 'Garamond, serif',
                        'Georgia, serif' => 'Georgia, serif',
                        'Impact, Charcoal, sans-serif' => 'Impact, Charcoal, sans-serif',
                        '\'Lucida Console\', Monaco, monospace' => '\'Lucida Console\', Monaco, monospace',
                        '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif' => '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif',
                        '\'MS Sans Serif\', Geneva, sans-serif' => '\'MS Sans Serif\', Geneva, sans-serif',
                        '\'MS Serif\', \'New York\', sans-serif' => '\'MS Serif\', \'New York\', sans-serif',
                        '\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif' => '\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif',
                        'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
                        '\'Times New Roman\', Times, serif' => '\'Times New Roman\', Times, serif',
                        '\'Trebuchet MS\', Helvetica, sans-serif' => '\'Trebuchet MS\', Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif' => 'Verdana, Geneva, sans-serif',
                    ),
                    'title' => 'Select Body Font Family',
                ),
                array (
                    'desc' => 'Select a font family for menu / navigation',
                    'id' => 'standard_nav',
                    'type' => 'select',
                    'options' => array (
                        0 => 'Select Font',
                        'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
                        '\'Arial Black\', Gadget, sans-serif' => '\'Arial Black\', Gadget, sans-serif',
                        '\'Bookman Old Style\', serif' => '\'Bookman Old Style\', serif',
                        '\'Comic Sans MS\', cursive' => '\'Comic Sans MS\', cursive',
                        'Courier, monospace' => 'Courier, monospace',
                        'Garamond, serif' => 'Garamond, serif',
                        'Georgia, serif' => 'Georgia, serif',
                        'Impact, Charcoal, sans-serif' => 'Impact, Charcoal, sans-serif',
                        '\'Lucida Console\', Monaco, monospace' => '\'Lucida Console\', Monaco, monospace',
                        '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif' => '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif',
                        '\'MS Sans Serif\', Geneva, sans-serif' => '\'MS Sans Serif\', Geneva, sans-serif',
                        '\'MS Serif\', \'New York\', sans-serif' => '\'MS Serif\', \'New York\', sans-serif',
                        '\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif' => '\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif',
                        'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
                        '\'Times New Roman\', Times, serif' => '\'Times New Roman\', Times, serif',
                        '\'Trebuchet MS\', Helvetica, sans-serif' => '\'Trebuchet MS\', Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif' => 'Verdana, Geneva, sans-serif',
                    ),
                    'title' => 'Select Menu Font Family',
                ),
                array (
                    'desc' => 'Select a font family for headings',
                    'id' => 'standard_headings',
                    'type' => 'select',
                    'options' => array (
                        0 => 'Select Font',
                        'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
                        '\'Arial Black\', Gadget, sans-serif' => '\'Arial Black\', Gadget, sans-serif',
                        '\'Bookman Old Style\', serif' => '\'Bookman Old Style\', serif',
                        '\'Comic Sans MS\', cursive' => '\'Comic Sans MS\', cursive',
                        'Courier, monospace' => 'Courier, monospace',
                        'Garamond, serif' => 'Garamond, serif',
                        'Georgia, serif' => 'Georgia, serif',
                        'Impact, Charcoal, sans-serif' => 'Impact, Charcoal, sans-serif',
                        '\'Lucida Console\', Monaco, monospace' => '\'Lucida Console\', Monaco, monospace',
                        '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif' => '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif',
                        '\'MS Sans Serif\', Geneva, sans-serif' => '\'MS Sans Serif\', Geneva, sans-serif',
                        '\'MS Serif\', \'New York\', sans-serif' => '\'MS Serif\', \'New York\', sans-serif',
                        '\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif' => '\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif',
                        'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
                        '\'Times New Roman\', Times, serif' => '\'Times New Roman\', Times, serif',
                        '\'Trebuchet MS\', Helvetica, sans-serif' => '\'Trebuchet MS\', Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif' => 'Verdana, Geneva, sans-serif',
                    ),
                    'title' => 'Select Headings Font Family',
                ),
                array (
                    'desc' => 'Select a font family for footer headings',
                    'id' => 'standard_footer_headings',
                    'type' => 'select',
                    'options' => array (
                        0 => 'Select Font',
                        'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
                        '\'Arial Black\', Gadget, sans-serif' => '\'Arial Black\', Gadget, sans-serif',
                        '\'Bookman Old Style\', serif' => '\'Bookman Old Style\', serif',
                        '\'Comic Sans MS\', cursive' => '\'Comic Sans MS\', cursive',
                        'Courier, monospace' => 'Courier, monospace',
                        'Garamond, serif' => 'Garamond, serif',
                        'Georgia, serif' => 'Georgia, serif',
                        'Impact, Charcoal, sans-serif' => 'Impact, Charcoal, sans-serif',
                        '\'Lucida Console\', Monaco, monospace' => '\'Lucida Console\', Monaco, monospace',
                        '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif' => '\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif',
                        '\'MS Sans Serif\', Geneva, sans-serif' => '\'MS Sans Serif\', Geneva, sans-serif',
                        '\'MS Serif\', \'New York\', sans-serif' => '\'MS Serif\', \'New York\', sans-serif',
                        '\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif' => '\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif',
                        'Tahoma, Geneva, sans-serif' => 'Tahoma, Geneva, sans-serif',
                        '\'Times New Roman\', Times, serif' => '\'Times New Roman\', Times, serif',
                        '\'Trebuchet MS\', Helvetica, sans-serif' => '\'Trebuchet MS\', Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif' => 'Verdana, Geneva, sans-serif',
                    ),
                    'title' => 'Select Footer Headings Font Family',
                ),
                array (
                    'id' => 'standard_fonts_intro',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Standard Fonts',
                    'default' => '<h3 style=\'margin: 0;\'>Standards</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(20) "standard_fonts_intro"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(14) "Standard Fonts"
        ["default"]=>
        string(37) "<h3 style=\'margin: 0;\'>Standards</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'font_size_intro',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Font Size',
                    'default' => '<h3 style=\'margin: 0;\'>Font Sizes</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(15) "font_size_intro"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(9) "Font Size"
        ["default"]=>
        string(38) "<h3 style=\'margin: 0;\'>Font Sizes</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'In pixels, default is 13',
                    'id' => 'body_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Body Font Size',
                    'default' => '13',
                ),
                array (
                    'desc' => 'In pixels, default is 14',
                    'id' => 'nav_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Main Menu Font Size',
                    'default' => '14',
                ),
                array (
                    'desc' => 'In pixels, default is 13',
                    'id' => 'nav_dropdown_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Main Menu Dropdown Font Size',
                    'default' => '13',
                ),
                array (
                    'desc' => 'In pixels, default is 12',
                    'id' => 'snav_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Secondary Menu & Top Contact Info Font Size',
                    'default' => '12',
                ),
                array (
                    'desc' => 'In pixels, default is 14',
                    'id' => 'side_nav_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Side Menu Font Size',
                    'default' => '14',
                ),
                array (
                    'desc' => 'In pixels, default is 10',
                    'id' => 'breadcrumbs_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Breadcrumbs Font Size',
                    'default' => '10',
                ),
                array (
                    'desc' => 'In pixels, default is 13',
                    'id' => 'sidew_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Sidebar Widget Heading Font Size',
                    'default' => '13',
                ),
                array (
                    'desc' => 'In pixels, default is 13',
                    'id' => 'slidingbar_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Sliding Bar Widget Heading Font Size',
                    'default' => '13',
                ),
                array (
                    'desc' => 'In pixels, default is 13',
                    'id' => 'footw_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Footer Widget Heading Font Size',
                    'default' => '13',
                ),
                array (
                    'desc' => 'In pixels, default is 12',
                    'id' => 'copyright_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Copyright Font Size',
                    'default' => '12',
                ),
                array (
                    'desc' => 'In pixels, default is 32',
                    'id' => 'h1_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Heading Font Size H1',
                    'default' => '32',
                ),
                array (
                    'desc' => 'In pixels, default is 18',
                    'id' => 'h2_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Heading Font Size H2',
                    'default' => '18',
                ),
                array (
                    'desc' => 'In pixels, default is 16',
                    'id' => 'h3_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Heading Font Size H3',
                    'default' => '16',
                ),
                array (
                    'desc' => 'In pixels, default is 13',
                    'id' => 'h4_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Heading Font Size H4',
                    'default' => '13',
                ),
                array (
                    'desc' => 'In pixels, default is 12',
                    'id' => 'h5_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Heading Font Size H5',
                    'default' => '12',
                ),
                array (
                    'desc' => 'In pixels, default is 11',
                    'id' => 'h6_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Heading Font Size H6',
                    'default' => '11',
                ),
                array (
                    'desc' => 'In pixels, default is 16',
                    'id' => 'tagline_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Header Tagline Font Size',
                    'default' => '16',
                ),
                array (
                    'desc' => 'In pixels, default is 12',
                    'id' => 'meta_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Meta Data Font Size',
                    'default' => '12',
                ),
                array (
                    'desc' => 'In pixels, default is 18',
                    'id' => 'page_title_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Page Title Font Size',
                    'default' => '18',
                ),
                array (
                    'desc' => 'In pixels, default is 14',
                    'id' => 'page_title_subheader_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Page Title Subheader Font Size',
                    'default' => '14',
                ),
                array (
                    'desc' => 'In pixels, default is 12',
                    'id' => 'pagination_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Pagination Font Size',
                    'default' => '12',
                ),
                array (
                    'desc' => 'In pixels, default is 12',
                    'id' => 'woo_icon_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'WooCommerce Icon Font Size',
                    'default' => '12',
                ),
                array (
                    'id' => 'font_size_intro',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Font Size',
                    'default' => '<h3 style=\'margin: 0;\'>Font Sizes</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(15) "font_size_intro"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(9) "Font Size"
        ["default"]=>
        string(38) "<h3 style=\'margin: 0;\'>Font Sizes</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'font_line_heights_wrapper',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Font Line Heights',
                    'default' => '<h3 style=\'margin: 0;\'\'>Font Line Heights</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(25) "font_line_heights_wrapper"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(17) "Font Line Heights"
        ["default"]=>
        string(46) "<h3 style=\'margin: 0;\'\'>Font Line Heights</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'In pixels, default is 20',
                    'id' => 'body_font_lh',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Body Font Line Height',
                    'default' => '20',
                ),
                array (
                    'desc' => 'In pixels, default is 48',
                    'id' => 'h1_font_lh',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Heading Font Line Height H1',
                    'default' => '48',
                ),
                array (
                    'desc' => 'In pixels, default is 27',
                    'id' => 'h2_font_lh',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Heading Font Line Height H2',
                    'default' => '27',
                ),
                array (
                    'desc' => 'In pixels, default is 24',
                    'id' => 'h3_font_lh',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Heading Font Line Height H3',
                    'default' => '24',
                ),
                array (
                    'desc' => 'In pixels, default is 20',
                    'id' => 'h4_font_lh',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Heading Font Line Height H4',
                    'default' => '20',
                ),
                array (
                    'desc' => 'In pixels, default is 18',
                    'id' => 'h5_font_lh',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Heading Font Line Height H5',
                    'default' => '18',
                ),
                array (
                    'desc' => 'In pixels, default is 17',
                    'id' => 'h6_font_lh',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Heading Font Line Height H6',
                    'default' => '17',
                ),
                array (
                    'id' => 'font_line_heights_wrapper',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Font Line Heights',
                    'default' => '<h3 style=\'margin: 0;\'\'>Font Line Heights</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(25) "font_line_heights_wrapper"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(17) "Font Line Heights"
        ["default"]=>
        string(46) "<h3 style=\'margin: 0;\'\'>Font Line Heights</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Styling',
            'fields' => array (
                array (
                    'desc' => 'Select a skin, all color options will automatically change to the defined skin.',
                    'id' => 'scheme_type',
                    'type' => 'select',
                    'options' => array (
                        'Light' => 'Light',
                        'Dark' => 'Dark',
                    ),
                    'title' => 'Select Theme Skin',
                    'default' => 'Light',
                ),
                array (
                    'desc' => 'Select a scheme, all color options will automatically change to the defined scheme.',
                    'id' => 'color_scheme',
                    'type' => 'select',
                    'options' => array (
                        'Red' => 'Red',
                        'Light Red' => 'Light Red',
                        'Blue' => 'Blue',
                        'Light Blue' => 'Light Blue',
                        'Green' => 'Green',
                        'Dark Green' => 'Dark Green',
                        'Orange' => 'Orange',
                        'Pink' => 'Pink',
                        'Brown' => 'Brown',
                        'Light Grey' => 'Light Grey',
                    ),
                    'title' => 'Predefined Color Scheme',
                    'default' => 'Green',
                ),
                array (
                    'id' => 'bg_colors_wrapper',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Background Colors',
                    'default' => '<h3 style=\'margin: 0;\'>Background Colors</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(17) "bg_colors_wrapper"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(17) "Background Colors"
        ["default"]=>
        string(45) "<h3 style=\'margin: 0;\'>Background Colors</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls several items, ex: link hovers, highlights, and more.',
                    'id' => 'primary_color',
                    'type' => 'color',
                    'title' => 'Primary Color',
                    'default' => '#a0ce4e',
                ),
                array (
                    'desc' => 'Controls the color of the top sliding bar.',
                    'id' => 'slidingbar_bg_color',
                    'type' => 'color',
                    'title' => 'Sliding Bar Background Color',
                    'default' => '#363839',
                ),
                array (
                    'desc' => 'Controls the background color for the sticky header.',
                    'id' => 'header_sticky_bg_color',
                    'type' => 'color',
                    'title' => 'Sticky Header Background Color',
                    'default' => '#ffffff',
                ),
                array (
                    'desc' => 'Controls the background color for the header.',
                    'id' => 'header_bg_color',
                    'type' => 'color',
                    'title' => 'Header Background Color',
                    'default' => '#ffffff',
                ),
                array (
                    'desc' => 'Controls the border colors for the header.',
                    'id' => 'header_border_color',
                    'type' => 'color',
                    'title' => 'Header Border Color',
                    'default' => '#e5e5e5',
                ),
                array (
                    'desc' => 'Controls the background color of the top header section used in Headers 2-5.',
                    'id' => 'header_top_bg_color',
                    'type' => 'color',
                    'title' => 'Header Top Background Color',
                    'default' => '#a0ce4e',
                ),
                array (
                    'desc' => 'Select a color for the page title bar background.',
                    'id' => 'page_title_bg_color',
                    'type' => 'color',
                    'title' => 'Page Title Bar Background Color',
                    'default' => '#F6F6F6',
                ),
                array (
                    'desc' => 'Select a color for the page title bar borders.',
                    'id' => 'page_title_border_color',
                    'type' => 'color',
                    'title' => 'Page Title Bar Borders Color',
                    'default' => '#d2d3d4',
                ),
                array (
                    'desc' => 'Controls the background color of the main content area.',
                    'id' => 'content_bg_color',
                    'type' => 'color',
                    'title' => 'Content Background Color',
                    'default' => '#ffffff',
                ),
                array (
                    'desc' => 'Controls the background color of the footer.',
                    'id' => 'footer_bg_color',
                    'type' => 'color',
                    'title' => 'Footer Background Color',
                    'default' => '#363839',
                ),
                array (
                    'desc' => 'Controls the border colors for the footer.',
                    'id' => 'footer_border_color',
                    'type' => 'color',
                    'title' => 'Footer Border Color',
                    'default' => '#e9eaee',
                ),
                array (
                    'desc' => 'Controls the background color of the footer copyright.',
                    'id' => 'copyright_bg_color',
                    'type' => 'color',
                    'title' => 'Copyright Background Color',
                    'default' => '#282a2b',
                ),
                array (
                    'desc' => 'Controls the border colors for the footer copyright.',
                    'id' => 'copyright_border_color',
                    'type' => 'color',
                    'title' => 'Copyright Border Color',
                    'default' => '#4b4c4d',
                ),
                array (
                    'id' => 'bg_colors_wrapper',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Background Colors',
                    'default' => '<h3 style=\'margin: 0;\'>Background Colors</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(17) "bg_colors_wrapper"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(17) "Background Colors"
        ["default"]=>
        string(45) "<h3 style=\'margin: 0;\'>Background Colors</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'element_colors_wrapper',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Element Colors',
                    'default' => '<h3 style=\'margin: 0;\'>Element Colors</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(22) "element_colors_wrapper"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(14) "Element Colors"
        ["default"]=>
        string(42) "<h3 style=\'margin: 0;\'>Element Colors</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the top color of the image rollover gradients.',
                    'id' => 'image_gradient_top_color',
                    'type' => 'color',
                    'title' => 'Rollover Image Gradient Top Color',
                    'default' => '#D1E990',
                ),
                array (
                    'desc' => 'Controls the bottom color of the image rollover gradients.',
                    'id' => 'image_gradient_bottom_color',
                    'type' => 'color',
                    'title' => 'Rollover Image Gradient Bottom Color',
                    'default' => '#AAD75B',
                ),
                array (
                    'desc' => 'This option controls the color of image rollover text and the icon circle backgrounds.',
                    'id' => 'image_rollover_text_color',
                    'type' => 'color',
                    'title' => 'Rollover Image Element Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the divider color in the sliding bar.',
                    'id' => 'slidingbar_divider_color',
                    'type' => 'color',
                    'title' => 'Sliding Bar Item Divider Color',
                    'default' => '#282A2B',
                ),
                array (
                    'desc' => 'Controls the divider color in the footer.',

                    'id' => 'footer_divider_color',
                    'type' => 'color',
                    'title' => 'Footer Widget Divider Color',
                    'default' => '#505152',
                ),
                array (
                    'desc' => 'Controls the background color of form fields.',
                    'id' => 'form_bg_color',
                    'type' => 'color',
                    'title' => 'Form Background Color',
                    'default' => '#ffffff',
                ),
                array (
                    'desc' => 'Controls the text color for forms.',
                    'id' => 'form_text_color',
                    'type' => 'color',
                    'title' => 'Form Text Color',
                    'default' => '#aaa9a9',
                ),
                array (
                    'desc' => 'Controls the border color of form fields.',
                    'id' => 'form_border_color',
                    'type' => 'color',
                    'title' => 'Form Border Color',
                    'default' => '#d2d2d2',
                ),
                array (
                    'desc' => 'Controls blog grid, timeline and WooCommerce post box background color.',
                    'id' => 'timeline_bg_color',
                    'type' => 'color',
                    'title' => 'Grid Box Color',
                    'default' => 'transparent',
                ),
                array (
                    'desc' => 'Controls blog grid, timeline and WooCommerce post box border, divider lines, date box and border, timeline dots, timeline icon, timeline arrow.',
                    'id' => 'timeline_color',
                    'type' => 'color',
                    'title' => 'Grid Element Color',
                    'default' => '#ebeaea',
                ),
                array (
                    'desc' => 'Controls the background color of the woocommerce quantity box.',
                    'id' => 'qty_bg_color',
                    'type' => 'color',
                    'title' => 'Woo Quantity Box Background Color',
                    'default' => '#fbfaf9',
                ),
                array (
                    'desc' => 'Controls the hover color of the woocommerce quantity box.',
                    'id' => 'qty_bg_hover_color',
                    'type' => 'color',
                    'title' => 'Woo Quantity Box Hover Background Color',
                    'default' => '#ffffff',
                ),
                array (
                    'desc' => 'Controls the background color for forum header rows.',
                    'id' => 'bbp_forum_header_bg',
                    'type' => 'color',
                    'title' => 'bbPress Forum Header Background Color',
                    'default' => '#ebeaea',
                ),
                array (
                    'desc' => 'Controls the border color for all forum surrounding borders.',
                    'id' => 'bbp_forum_border_color',
                    'type' => 'color',
                    'title' => 'bbPress Forum Border Color',
                    'default' => '#ebeaea',
                ),
                array (
                    'id' => 'element_colors_wrapper',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Element Colors',
                    'default' => '<h3 style=\'margin: 0;\'>Element Colors</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(22) "element_colors_wrapper"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(14) "Element Colors"
        ["default"]=>
        string(42) "<h3 style=\'margin: 0;\'>Element Colors</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'element_options_wrapper',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Layout Options',
                    'default' => '<h3 style=\'margin: 0;\'>Layout Options</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(23) "element_options_wrapper"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(14) "Layout Options"
        ["default"]=>
        string(42) "<h3 style=\'margin: 0;\'>Layout Options</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => '(in pixels ex: 20px)',
                    'id' => 'main_top_padding',
                    'type' => 'text',
                    'title' => 'Page Content Top Padding',
                    'default' => '55px',
                ),
                array (
                    'desc' => '(in pixels ex: 20px)',
                    'id' => 'main_bottom_padding',
                    'type' => 'text',
                    'title' => 'Page Content Bottom Padding',
                    'default' => '40px',
                ),
                array (
                    'desc' => 'Select the left and right padding for the 100% width template main content area. Enter value in px. ex: 20px',
                    'id' => 'hundredp_padding',
                    'type' => 'text',
                    'title' => '100% Width Template Left/Right Padding',
                    'default' => '20px',
                ),
                array (
                    'desc' => 'Check to disable the text shadow in the Sliding Bar.',
                    'id' => 'slidingbar_text_shadow',
                    'type' => 'checkbox',
                    'title' => 'Disable Sliding Bar Text Shadow',
                ),
                array (
                    'desc' => 'Check to disable the text shadow in the footer.',
                    'id' => 'footer_text_shadow',
                    'type' => 'checkbox',
                    'title' => 'Disable Footer Text Shadow',
                ),
                array (
                    'id' => 'element_options_wrapper',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Layout Options',
                    'default' => '<h3 style=\'margin: 0;\'>Layout Options</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(23) "element_options_wrapper"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(14) "Layout Options"
        ["default"]=>
        string(42) "<h3 style=\'margin: 0;\'>Layout Options</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'font_colors_wrapper',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Font Colors',
                    'default' => '<h3 style=\'margin: 0;\'>Font Colors</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(19) "font_colors_wrapper"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(11) "Font Colors"
        ["default"]=>
        string(39) "<h3 style=\'margin: 0;\'>Font Colors</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the text color of the header tagline font.',
                    'id' => 'tagline_font_color',
                    'type' => 'color',
                    'title' => 'Header Tagline Font Color',
                    'default' => '#747474',
                ),
                array (
                    'desc' => 'Controls the text color of the page title font.',
                    'id' => 'page_title_color',
                    'type' => 'color',
                    'title' => 'Page Title Font Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the text color of H1 headings.',
                    'id' => 'h1_color',
                    'type' => 'color',
                    'title' => 'Heading 1 (H1) Font Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the text color of H2 headings.',
                    'id' => 'h2_color',
                    'type' => 'color',
                    'title' => 'Heading 2 (H2) Font Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the text color of H3 headings.',
                    'id' => 'h3_color',
                    'type' => 'color',
                    'title' => 'Heading 3 (H3) Font Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the text color of H4 headings.',
                    'id' => 'h4_color',
                    'type' => 'color',
                    'title' => 'Heading 4 (H4) Font Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the text color of H5 headings.',
                    'id' => 'h5_color',
                    'type' => 'color',
                    'title' => 'Heading 5 (H5) Font Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the text color of H6 headings.',
                    'id' => 'h6_color',
                    'type' => 'color',
                    'title' => 'Heading 6 (H6) Font Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the text color of body font.',
                    'id' => 'body_text_color',
                    'type' => 'color',
                    'title' => 'Body Text Color',
                    'default' => '#747474',
                ),
                array (
                    'desc' => 'Controls the color of all text links as well as the \'>\' in certain areas.',
                    'id' => 'link_color',
                    'type' => 'color',
                    'title' => 'Link Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the text color of the breadcrumb font.',
                    'id' => 'breadcrumbs_text_color',
                    'type' => 'color',
                    'title' => 'Breadcrumbs Text Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the text color of the sliding bar heading font.',
                    'id' => 'slidingbar_headings_color',
                    'type' => 'color',
                    'title' => 'Sliding Bar Headings Color',
                    'default' => '#DDDDDD',
                ),
                array (
                    'desc' => 'Controls the font color of the sliding bar font.',
                    'id' => 'slidingbar_text_color',
                    'type' => 'color',
                    'title' => 'Sliding Bar Font Color',
                    'default' => '#8C8989',
                ),
                array (
                    'desc' => 'Controls the text color of the sliding bar link font.',
                    'id' => 'slidingbar_link_color',
                    'type' => 'color',
                    'title' => 'Sliding Bar Link Color',
                    'default' => '#BFBFBF',
                ),
                array (
                    'desc' => 'Controls the text color of the sidebar widget headings.',
                    'id' => 'sidebar_heading_color',
                    'type' => 'color',
                    'title' => 'Sidebar Widget Headings Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the text color of the footer heading font.',
                    'id' => 'footer_headings_color',
                    'type' => 'color',
                    'title' => 'Footer Headings Color',
                    'default' => '#DDDDDD',
                ),
                array (
                    'desc' => 'Controls the text color of the footer font.',
                    'id' => 'footer_text_color',
                    'type' => 'color',
                    'title' => 'Footer Font Color',
                    'default' => '#8C8989',
                ),
                array (
                    'desc' => 'Controls the text color of the footer link font.',
                    'id' => 'footer_link_color',
                    'type' => 'color',
                    'title' => 'Footer Link Color',
                    'default' => '#BFBFBF',
                ),
                array (
                    'id' => 'font_colors_wrapper',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Font Colors',
                    'default' => '<h3 style=\'margin: 0;\'>Font Colors</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(19) "font_colors_wrapper"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(11) "Font Colors"
        ["default"]=>
        string(39) "<h3 style=\'margin: 0;\'>Font Colors</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'main_menu_colors_wrapper',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Main Menu Colors',
                    'default' => '<h3 style=\'margin: 0;\'>Main Menu Colors</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(24) "main_menu_colors_wrapper"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(16) "Main Menu Colors"
        ["default"]=>
        string(44) "<h3 style=\'margin: 0;\'>Main Menu Colors</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the background color of the menu when using header 4 or 5.',
                    'id' => 'menu_h45_bg_color',
                    'type' => 'color',
                    'title' => 'Main Menu Background Color For Header 4 & 5',
                    'default' => '#FFFFFF',
                ),
                array (
                    'desc' => 'Controls the text color of first level menu items.',
                    'id' => 'menu_first_color',
                    'type' => 'color',
                    'title' => 'Main Menu Font Color - First Level',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the main menu hover, hover border & dropdown border color.',
                    'id' => 'menu_hover_first_color',
                    'type' => 'color',
                    'title' => 'Main Menu Font Hover Color - First Level',
                    'default' => '#a0ce4e',
                ),
                array (
                    'desc' => 'Controls the color of the menu sublevel background.',
                    'id' => 'menu_sub_bg_color',
                    'type' => 'color',
                    'title' => 'Main Menu Background Color - Sublevels',
                    'default' => '#f2efef',
                ),
                array (
                    'desc' => 'Controls the hover color of the menu sublevel background.',
                    'id' => 'menu_bg_hover_color',
                    'type' => 'color',
                    'title' => 'Main Menu Background Hover Color - Sublevels',
                    'default' => '#f8f8f8',
                ),
                array (
                    'desc' => 'Controls the color of the menu font sublevels.',
                    'id' => 'menu_sub_color',
                    'type' => 'color',
                    'title' => 'Main Menu Font Color - Sublevels',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the color of the menu separator sublevels.',
                    'id' => 'menu_sub_sep_color',
                    'type' => 'color',
                    'title' => 'Main Menu Separator - Sublevels',
                    'default' => '#dcdadb',
                ),
                array (
                    'desc' => 'Controls the bottom section background color of the woocommerce cart dropdown.',
                    'id' => 'woo_cart_bg_color',
                    'type' => 'color',
                    'title' => 'Woo Cart Menu Background Color',
                    'default' => '#fafafa',
                ),
                array (
                    'id' => 'main_menu_colors_wrapper',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Main Menu Colors',
                    'default' => '<h3 style=\'margin: 0;\'>Main Menu Colors</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(24) "main_menu_colors_wrapper"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(16) "Main Menu Colors"
        ["default"]=>
        string(44) "<h3 style=\'margin: 0;\'>Main Menu Colors</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'menu_colors_intro',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Secondary Menu Colors',
                    'default' => '<h3 style=\'margin: 0;\'>Secondary Menu Colors</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(17) "menu_colors_intro"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(21) "Secondary Menu Colors"
        ["default"]=>
        string(49) "<h3 style=\'margin: 0;\'>Secondary Menu Colors</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of the secondary menu first level and contact info font.',
                    'id' => 'snav_color',
                    'type' => 'color',
                    'title' => 'Secondary Menu Font Color - First Level & Top Contact Info',
                    'default' => '#747474',
                ),
                array (
                    'desc' => 'Controls the divider color of the first level secondary menu.',
                    'id' => 'header_top_first_border_color',
                    'type' => 'color',
                    'title' => 'Secondary Menu Divider Color - First Level',
                    'default' => '#e5e5e5',
                ),
                array (
                    'desc' => 'Controls the background color of the secondary menu sublevels.',
                    'id' => 'header_top_sub_bg_color',
                    'type' => 'color',
                    'title' => 'Secondary Menu Background Color - Sublevels',
                    'default' => '#ffffff',
                ),
                array (
                    'desc' => 'Controls the text color of the secondary menu font sublevels.',
                    'id' => 'header_top_menu_sub_color',
                    'type' => 'color',
                    'title' => 'Secondary Menu Font Color - Sublevels',
                    'default' => '#747474',
                ),
                array (
                    'desc' => 'Controls the hover color of the secondary menu background sublevels.',
                    'id' => 'header_top_menu_bg_hover_color',
                    'type' => 'color',
                    'title' => 'Secondary Menu Hover Background Color - Sublevels',
                    'default' => '#fafafa',
                ),
                array (
                    'desc' => 'Controls the hover text color of the secondary menu font sublevels.',
                    'id' => 'header_top_menu_sub_hover_color',
                    'type' => 'color',
                    'title' => 'Secondary Menu Hover Font Color - Sublevels',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the border color of the secondary menu sublevels.',
                    'id' => 'header_top_menu_sub_sep_color',
                    'type' => 'color',
                    'title' => 'Secondary Menu Border	- Sublevels',
                    'default' => '#e5e5e5',
                ),
                array (
                    'id' => 'menu_colors_intro',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Secondary Menu Colors',
                    'default' => '<h3 style=\'margin: 0;\'>Secondary Menu Colors</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(17) "menu_colors_intro"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(21) "Secondary Menu Colors"
        ["default"]=>
        string(49) "<h3 style=\'margin: 0;\'>Secondary Menu Colors</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'mobile_menu_colors_wrapper',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Mobile Menu Colors',
                    'default' => '<h3 style=\'margin: 0;\'>Mobile Menu Colors</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(26) "mobile_menu_colors_wrapper"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(18) "Mobile Menu Colors"
        ["default"]=>
        string(46) "<h3 style=\'margin: 0;\'>Mobile Menu Colors</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the background color of the mobile menu box and dropdown.',
                    'id' => 'mobile_menu_background_color',
                    'type' => 'color',
                    'title' => 'Mobile Menu Background Color',
                    'default' => '#f9f9f9',
                ),
                array (
                    'desc' => 'Controls the border, divider and icon colors of the mobile menu.',
                    'id' => 'mobile_menu_border_color',
                    'type' => 'color',
                    'title' => 'Mobile Menu Border Color',
                    'default' => '#dadada',
                ),
                array (
                    'desc' => 'Controls the hover color of the mobile menu items.',
                    'id' => 'mobile_menu_hover_color',
                    'type' => 'color',
                    'title' => 'Mobile Menu Hover Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'id' => 'mobile_menu_colors_wrapper',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Mobile Menu Colors',
                    'default' => '<h3 style=\'margin: 0;\'>Mobile Menu Colors</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(26) "mobile_menu_colors_wrapper"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(18) "Mobile Menu Colors"
        ["default"]=>
        string(46) "<h3 style=\'margin: 0;\'>Mobile Menu Colors</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Shortcode Styling',
            'fields' => array (
                array (
                    'id' => 'accordion_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Accordion Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Accordion Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(19) "accordion_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(19) "Accordion Shortcode"
        ["default"]=>
        string(47) "<h3 style=\'margin: 0;\'>Accordion Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of the inactive boxes behind the \'+\' icons.',
                    'id' => 'accordian_inactive_color',
                    'type' => 'color',
                    'title' => 'Accordion Inactive Box Color',
                    'default' => '#333333',
                ),
                array (
                    'id' => 'accordion_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Accordion Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Accordion Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(19) "accordion_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(19) "Accordion Shortcode"
        ["default"]=>
        string(47) "<h3 style=\'margin: 0;\'>Accordion Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'blog_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Blog Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Blog Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(14) "blog_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(14) "Blog Shortcode"
        ["default"]=>
        string(42) "<h3 style=\'margin: 0;\'>Blog Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of the date box in blog alternate and recent posts layouts.',
                    'id' => 'dates_box_color',
                    'type' => 'color',
                    'title' => 'Blog Date Box Color',
                    'default' => '#eef0f2',
                ),
                array (
                    'id' => 'blog_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Blog Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Blog Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(14) "blog_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(14) "Blog Shortcode"
        ["default"]=>
        string(42) "<h3 style=\'margin: 0;\'>Blog Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'button_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Button Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Button Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(16) "button_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(16) "Button Shortcode"
        ["default"]=>
        string(44) "<h3 style=\'margin: 0;\'>Button Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Select the default button size.',
                    'id' => 'button_size',
                    'type' => 'select',
                    'options' => array (
                        'Small' => 'Small',
                        'Medium' => 'Medium',
                        'Large' => 'Large',
                        'XLarge' => 'XLarge',
                    ),
                    'title' => 'Button Size',
                    'default' => 'Large',
                ),
                array (
                    'desc' => 'Select the default shape for buttons.',
                    'id' => 'button_shape',
                    'type' => 'select',
                    'options' => array (
                        'Square' => 'Square',
                        'Round' => 'Round',
                        'Pill' => 'Pill',
                    ),
                    'title' => 'Button Shape',
                    'default' => 'Round',
                ),
                array (
                    'desc' => 'Select the default button type.',
                    'id' => 'button_type',
                    'type' => 'select',
                    'options' => array (
                        'Flat' => 'Flat',
                        '3d' => '3d',
                    ),
                    'title' => 'Button Type',
                    'default' => 'Flat',
                ),
                array (
                    'desc' => 'Set the top color of the button background.',
                    'id' => 'button_gradient_top_color',
                    'type' => 'color',
                    'title' => 'Button Gradient Top Color',
                    'default' => '#D1E990',
                ),
                array (
                    'desc' => 'Set the bottom color of the button background or leave empty for solid color.',
                    'id' => 'button_gradient_bottom_color',
                    'type' => 'color',
                    'title' => 'Button Gradient Bottom Color',
                    'default' => '#AAD75B',
                ),
                array (
                    'desc' => 'Set the top hover color of the button background.',
                    'id' => 'button_gradient_top_color_hover',
                    'type' => 'color',
                    'title' => 'Button Gradient Top Hover Color',
                    'default' => '#AAD75B',
                ),
                array (
                    'desc' => 'Set the bottom hover color of the button background or leave empty for solid color. ',
                    'id' => 'button_gradient_bottom_color_hover',
                    'type' => 'color',
                    'title' => 'Button Gradient Bottom Hover Color',
                    'default' => '#D1E990',
                ),
                array (
                    'desc' => 'This option controls the color of the button border, divider, text and icon.',
                    'id' => 'button_accent_color',
                    'type' => 'color',
                    'title' => 'Button Accent Color',
                    'default' => '#6e9a1f',
                ),
                array (
                    'desc' => 'This option controls the hover color of the button border, divider, text and icon.',
                    'id' => 'button_accent_hover_color',
                    'type' => 'color',
                    'title' => 'Button Accent Hover Color',
                    'default' => '#638e1a',
                ),
                array (
                    'desc' => 'Controls the default bevel color of the buttons.',
                    'id' => 'button_bevel_color',
                    'type' => 'color',
                    'title' => 'Button Bevel Color (3D Mode only)',
                    'default' => '#54770F',
                ),
                array (
                    'desc' => 'Select the border width for buttons. Enter value in px. ex: 1px',
                    'id' => 'button_border_width',
                    'type' => 'text',
                    'title' => 'Button Border Width',
                    'default' => '1px',
                ),
                array (
                    'desc' => 'Select the box to disable the bottom button shadow and text shadow.',
                    'id' => 'button_text_shadow',
                    'type' => 'checkbox',
                    'title' => 'Button Shadow',
                ),
                array (
                    'id' => 'button_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Button Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Button Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(16) "button_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(16) "Button Shortcode"
        ["default"]=>
        string(44) "<h3 style=\'margin: 0;\'>Button Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'carousel_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Carousel Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Carousel Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(18) "carousel_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(18) "Carousel Shortcode"
        ["default"]=>
        string(46) "<h3 style=\'margin: 0;\'>Carousel Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of the default navigation box for carousel sliders.',
                    'id' => 'carousel_nav_color',
                    'type' => 'color',
                    'title' => 'Carousel Default Nav Box Color',
                    'default' => '#999999',
                ),
                array (
                    'desc' => 'Controls the color of the hover navigation box for carousel sliders.',
                    'id' => 'carousel_hover_color',
                    'type' => 'color',
                    'title' => 'Carousel Hover Nav Box Color',
                    'default' => '#808080',
                ),
                array (
                    'id' => 'carousel_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Carousel Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Carousel Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(18) "carousel_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(18) "Carousel Shortcode"
        ["default"]=>
        string(46) "<h3 style=\'margin: 0;\'>Carousel Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'cb_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Content Box Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Content Box Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(12) "cb_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(21) "Content Box Shortcode"
        ["default"]=>
        string(49) "<h3 style=\'margin: 0;\'>Content Box Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of the background for content boxes. Only use for \'icon-boxed\' style. Leave transparent for other styles.',
                    'id' => 'content_box_bg_color',
                    'type' => 'color',
                    'title' => 'Content Box Background Color',
                    'default' => 'transparent',
                ),
                array (
                    'id' => 'cb_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Content Box Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Content Box Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(12) "cb_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(21) "Content Box Shortcode"
        ["default"]=>
        string(49) "<h3 style=\'margin: 0;\'>Content Box Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'checklist_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Checklist Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Checklist Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(19) "checklist_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(19) "Checklist Shortcode"
        ["default"]=>
        string(47) "<h3 style=\'margin: 0;\'>Checklist Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Check the box if you want to use circles on checklists.',
                    'id' => 'checklist_circle',
                    'type' => 'checkbox',
                    'title' => 'Checklist Circle',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Controls the color of the checklist circle.',
                    'id' => 'checklist_circle_color',
                    'type' => 'color',
                    'title' => 'Checklist Circle Color',
                    'default' => '#a0ce4e',
                ),
                array (
                    'desc' => 'Controls the color of the checklist icon.',
                    'id' => 'checklist_icons_color',
                    'type' => 'color',
                    'title' => 'Checklist Icon Color',
                    'default' => '#ffffff',
                ),
                array (
                    'id' => 'checklist_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Checklist Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Checklist Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(19) "checklist_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(19) "Checklist Shortcode"
        ["default"]=>
        string(47) "<h3 style=\'margin: 0;\'>Checklist Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'cc_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Counter Circle Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Counter Circles Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(12) "cc_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(24) "Counter Circle Shortcode"
        ["default"]=>
        string(53) "<h3 style=\'margin: 0;\'>Counter Circles Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of the counter text and icon.',
                    'id' => 'counter_filled_color',
                    'type' => 'color',
                    'title' => 'Counter Circle Filled Color',
                    'default' => '#a0ce4e',
                ),
                array (
                    'desc' => 'Controls the color of the counter text and icon.',
                    'id' => 'counter_unfilled_color',
                    'type' => 'color',
                    'title' => 'Counter Circle Unfilled Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'id' => 'cc_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Counter Circle Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Counter Circle Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(12) "cc_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(24) "Counter Circle Shortcode"
        ["default"]=>
        string(52) "<h3 style=\'margin: 0;\'>Counter Circle Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'counterb_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Counter Boxes Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Counter Boxes Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(18) "counterb_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(23) "Counter Boxes Shortcode"
        ["default"]=>
        string(51) "<h3 style=\'margin: 0;\'>Counter Boxes Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of the counter text and icon.',
                    'id' => 'counter_box_color',
                    'type' => 'color',
                    'title' => 'Counter Box Text Color',
                    'default' => '#a0ce4e',
                ),
                array (
                    'id' => 'counterb_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Counter Boxes Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Counter Boxes Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(18) "counterb_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(23) "Counter Boxes Shortcode"
        ["default"]=>
        string(51) "<h3 style=\'margin: 0;\'>Counter Boxes Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'dropcap_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Dropcap Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Dropcap Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(17) "dropcap_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(17) "Dropcap Shortcode"
        ["default"]=>
        string(45) "<h3 style=\'margin: 0;\'>Dropcap Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of the dropcap text, or the dropcap box is a box is used.',
                    'id' => 'dropcap_color',
                    'type' => 'color',
                    'title' => 'Dropcap Color',
                    'default' => '#a0ce4e',
                ),
                array (
                    'id' => 'dropcap_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Dropcap Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Dropcap Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(17) "dropcap_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(17) "Dropcap Shortcode"
        ["default"]=>
        string(45) "<h3 style=\'margin: 0;\'>Dropcap Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'flipb_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Flip Boxes Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Flip Boxes Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(15) "flipb_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(20) "Flip Boxes Shortcode"
        ["default"]=>
        string(48) "<h3 style=\'margin: 0;\'>Flip Boxes Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of frontside background color.',
                    'id' => 'flip_boxes_front_bg',
                    'type' => 'color',
                    'title' => 'Flip Box Background Color Frontside',
                    'default' => '#f6f6f6',
                ),
                array (
                    'desc' => 'Controls the color of frontside heading color.',
                    'id' => 'flip_boxes_front_heading',
                    'type' => 'color',
                    'title' => 'Flip Box Heading Color Frontside',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the color of frontside text color.',
                    'id' => 'flip_boxes_front_text',
                    'type' => 'color',
                    'title' => 'Flip Box Text Color Frontside',
                    'default' => '#747474',
                ),
                array (
                    'desc' => 'Controls the color of backside background color.',
                    'id' => 'flip_boxes_back_bg',
                    'type' => 'color',
                    'title' => 'Flip Box Background Color Backside',
                    'default' => '#a0ce4e',
                ),
                array (
                    'desc' => 'Controls the color of backside heading color.',
                    'id' => 'flip_boxes_back_heading',
                    'type' => 'color',
                    'title' => 'Flip Box Heading Color Backside',
                    'default' => '#eeeded',
                ),
                array (
                    'desc' => 'Controls the color of backside text color.',
                    'id' => 'flip_boxes_back_text',
                    'type' => 'color',
                    'title' => 'Flip Box Text Color Backside',
                    'default' => '#ffffff',
                ),
                array (
                    'desc' => 'Controls the border size of flip boxes.',
                    'id' => 'flip_boxes_border_size',
                    'type' => 'text',
                    'title' => 'Flip Box Border Size',
                    'default' => '1px',
                ),
                array (
                    'desc' => 'Controls the border color of flip boxes.',
                    'id' => 'flip_boxes_border_color',
                    'type' => 'color',
                    'title' => 'Flip Box Border Color',
                    'default' => 'transparent',
                ),
                array (
                    'desc' => 'Controls the border radius (roundness) of flip boxes.',
                    'id' => 'flip_boxes_border_radius',
                    'type' => 'text',
                    'title' => 'Flip Box Border Radius',
                    'default' => '4px',
                ),
                array (
                    'id' => 'flipb_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Flip Boxes Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Flip Boxes Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(15) "flipb_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(20) "Flip Boxes Shortcode"
        ["default"]=>
        string(48) "<h3 style=\'margin: 0;\'>Flip Boxes Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'fullwidth_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Full Width Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Full Width Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(19) "fullwidth_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(20) "Full Width Shortcode"
        ["default"]=>
        string(48) "<h3 style=\'margin: 0;\'>Full Width Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the background color of the full width section.',
                    'id' => 'full_width_bg_color',
                    'type' => 'color',
                    'title' => 'Full Width Background Color',
                    'default' => '#ffffff',
                ),
                array (
                    'desc' => 'Controls the border size of the full width section.',
                    'id' => 'full_width_border_size',
                    'type' => 'text',
                    'title' => 'Full Width Border Size',
                    'default' => '0px',
                ),
                array (
                    'desc' => 'Controls the border color of the full width section.',
                    'id' => 'full_width_border_color',
                    'type' => 'color',
                    'title' => 'Full Width Border Color',
                    'default' => '#eae9e9',
                ),
                array (
                    'id' => 'fullwidth_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Full Width Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Full Width Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(19) "fullwidth_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(20) "Full Width Shortcode"
        ["default"]=>
        string(48) "<h3 style=\'margin: 0;\'>Full Width Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'icon_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Icon Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Icon Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(14) "icon_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(14) "Icon Shortcode"
        ["default"]=>
        string(42) "<h3 style=\'margin: 0;\'>Icon Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of the circle when used with icons.',
                    'id' => 'icon_circle_color',
                    'type' => 'color',
                    'title' => 'Icon Circle Background Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the color of the circle border when used with icons.',
                    'id' => 'icon_border_color',
                    'type' => 'color',
                    'title' => 'Icon Circle Border Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the color of the icons.',
                    'id' => 'icon_color',
                    'type' => 'color',
                    'title' => 'Icon Color',
                    'default' => '#ffffff',
                ),
                array (
                    'id' => 'icon_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Icon Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Icon Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(14) "icon_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(14) "Icon Shortcode"
        ["default"]=>
        string(42) "<h3 style=\'margin: 0;\'>Icon Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'imgf_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Image Frame Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Image Frame Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(14) "imgf_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(21) "Image Frame Shortcode"
        ["default"]=>
        string(49) "<h3 style=\'margin: 0;\'>Image Frame Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the border color of the image frame.',
                    'id' => 'imgframe_border_color',
                    'type' => 'color',
                    'title' => 'Image Frame Border Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'desc' => 'Controls the border size of the image.',
                    'id' => 'imageframe_border_size',
                    'type' => 'text',
                    'title' => 'Image Frame Border Size',
                ),
                array (
                    'desc' => 'Controls the style color of the image frame. Only works for glow and dropshadow style.',
                    'id' => 'imgframe_style_color',
                    'type' => 'color',
                    'title' => 'Image Frame Style Color',
                    'default' => '#000000',
                ),
                array (
                    'id' => 'imgf_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Image Frame Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Image Frame Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(14) "imgf_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(21) "Image Frame Shortcode"
        ["default"]=>
        string(49) "<h3 style=\'margin: 0;\'>Image Frame Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'modal_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Modal Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Modal Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(15) "modal_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(15) "Modal Shortcode"
        ["default"]=>
        string(43) "<h3 style=\'margin: 0;\'>Modal Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the background color of the modal popup box',
                    'id' => 'modal_bg_color',
                    'type' => 'color',
                    'title' => 'Modal Background Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'desc' => 'Controls the border color of the modal popup box',
                    'id' => 'modal_border_color',
                    'type' => 'color',
                    'title' => 'Modal Border Color',
                    'default' => '#ebebeb',
                ),
                array (
                    'id' => 'modal_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Modal Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Modal Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(15) "modal_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(15) "Modal Shortcode"
        ["default"]=>
        string(43) "<h3 style=\'margin: 0;\'>Modal Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'person_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Person Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Person Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(16) "person_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(16) "Person Shortcode"
        ["default"]=>
        string(44) "<h3 style=\'margin: 0;\'>Person Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the border size of the image.',
                    'id' => 'person_border_size',
                    'type' => 'text',
                    'title' => 'Person Border Size',
                ),
                array (
                    'desc' => 'Controls the border color of the of the image.',
                    'id' => 'person_border_color',
                    'type' => 'color',
                    'title' => 'Person Border Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'desc' => 'For all style types except border. Controls the style color. ',
                    'id' => 'person_style_color',
                    'type' => 'color',
                    'title' => 'Person Style Color',
                    'default' => '#000000',
                ),
                array (
                    'id' => 'person_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Person Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Person Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(16) "person_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(16) "Person Shortcode"
        ["default"]=>
        string(44) "<h3 style=\'margin: 0;\'>Person Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'popover_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Popover Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Popover Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(17) "popover_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(17) "Popover Shortcode"
        ["default"]=>
        string(45) "<h3 style=\'margin: 0;\'>Popover Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the background color of popover heading area.',
                    'id' => 'popover_heading_bg_color',
                    'type' => 'color',
                    'title' => 'Popover Heading Background Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'desc' => 'Controls the background color of popover content area.',
                    'id' => 'popover_content_bg_color',
                    'type' => 'color',
                    'title' => 'Popover Content Background Color',
                    'default' => '#ffffff',
                ),
                array (
                    'desc' => 'Controls the border color of popover box.',
                    'id' => 'popover_border_color',
                    'type' => 'color',
                    'title' => 'Popover Border Color',
                    'default' => '#ebebeb',
                ),
                array (
                    'desc' => 'Controls the text color inside the popover box. ',
                    'id' => 'popover_text_color',
                    'type' => 'color',
                    'title' => 'Popover Text Color',
                    'default' => '#747474',
                ),
                array (
                    'desc' => 'Controls the position of the popover in reference to the triggering text.',
                    'id' => 'popover_placement',
                    'type' => 'select',
                    'options' => array (
                        'Top' => 'Top',
                        'Right' => 'Right',
                        'Bottom' => 'Bottom',
                        'Left' => 'Left',
                    ),
                    'title' => 'Popover Position',
                    'default' => 'Top',
                ),
                array (
                    'id' => 'popover_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Popover Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Popover Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(17) "popover_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(17) "Popover Shortcode"
        ["default"]=>
        string(45) "<h3 style=\'margin: 0;\'>Popover Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'pricingtable_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Pricing Table Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Pricing Table Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(22) "pricingtable_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(23) "Pricing Table Shortcode"
        ["default"]=>
        string(51) "<h3 style=\'margin: 0;\'>Pricing Table Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the heading color of full boxed pricing tables.',
                    'id' => 'full_boxed_pricing_box_heading_color',
                    'type' => 'color',
                    'title' => 'Pricing Box Style 1 Heading Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the heading color of separate pricing boxes.',
                    'id' => 'sep_pricing_box_heading_color',
                    'type' => 'color',
                    'title' => 'Pricing Box Style 2 Heading Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the color portions of pricing boxes.',
                    'id' => 'pricing_box_color',
                    'type' => 'color',
                    'title' => 'Pricing Box Color',
                    'default' => '#a0ce4e',
                ),
                array (
                    'desc' => 'Controls the color of main background and title background.',
                    'id' => 'pricing_bg_color',
                    'type' => 'color',
                    'title' => 'Pricing Box Bg Color',
                    'default' => '#ffffff',
                ),
                array (
                    'desc' => 'Controls the color of the outer border, pricing row and footer row backgrounds.',
                    'id' => 'pricing_border_color',
                    'type' => 'color',
                    'title' => 'Pricing Box Border Color',
                    'default' => '#f8f8f8',
                ),
                array (
                    'desc' => 'Controls the color of the dividers in-between pricing rows.',
                    'id' => 'pricing_divider_color',
                    'type' => 'color',
                    'title' => 'Pricing Box Divider Color',
                    'default' => '#ededed',
                ),
                array (
                    'id' => 'pricingtable_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Pricing Table Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Pricing Table Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(22) "pricingtable_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(23) "Pricing Table Shortcode"
        ["default"]=>
        string(51) "<h3 style=\'margin: 0;\'>Pricing Table Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'progressbar_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Progress Bar Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Progress Bar Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(21) "progressbar_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(22) "Progress Bar Shortcode"
        ["default"]=>
        string(50) "<h3 style=\'margin: 0;\'>Progress Bar Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of the filled area in progress bars.',
                    'id' => 'progressbar_filled_color',
                    'type' => 'color',
                    'title' => 'Progress Bar Filled Color',
                    'default' => '#a0ce4e',
                ),
                array (
                    'desc' => 'Controls the color of the unfilled area in progress bars.',
                    'id' => 'progressbar_unfilled_color',
                    'type' => 'color',
                    'title' => 'Progress Bar Unfilled Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'desc' => 'Controls the color of the text in progress bars.',
                    'id' => 'progressbar_text_color',
                    'type' => 'color',
                    'title' => 'Progress Bar Text Color',
                    'default' => '#ffffff',
                ),
                array (
                    'id' => 'progressbar_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Progress Bar Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Progress Bar Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(21) "progressbar_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(22) "Progress Bar Shortcode"
        ["default"]=>
        string(50) "<h3 style=\'margin: 0;\'>Progress Bar Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'separator_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Separator Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Separator Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(19) "separator_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(19) "Separator Shortcode"
        ["default"]=>
        string(47) "<h3 style=\'margin: 0;\'>Separator Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of all separators, divider lines and borders for meta, previous & next, filters, category page, boxes around number pagination, sidebar widgets, accordion divider lines, counter boxes and more.',
                    'id' => 'sep_color',
                    'type' => 'color',
                    'title' => 'Separators Color',
                    'default' => '#e0dede',
                ),
                array (
                    'id' => 'separator_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Separator Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Separator Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(19) "separator_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(19) "Separator Shortcode"
        ["default"]=>
        string(47) "<h3 style=\'margin: 0;\'>Separator Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'sectionseparator_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Section Separator Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Section Separator Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(26) "sectionseparator_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(27) "Section Separator Shortcode"
        ["default"]=>
        string(55) "<h3 style=\'margin: 0;\'>Section Separator Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the border size of the section separator.',
                    'id' => 'section_sep_border_size',
                    'type' => 'text',
                    'title' => 'Section Separator Border Size',
                    'default' => '1px',
                ),
                array (
                    'desc' => 'Controls the background color of the divider candy.',
                    'id' => 'section_sep_bg',
                    'type' => 'color',
                    'title' => 'Section Separator Background Color of Divider Candy',
                    'default' => '#f6f6f6',
                ),
                array (
                    'desc' => 'Controls the border color of the separator.',
                    'id' => 'section_sep_border_color',
                    'type' => 'color',
                    'title' => 'Section Separator Border Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'id' => 'sectionseparator_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Section Separator Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Section Separator Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(26) "sectionseparator_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(27) "Section Separator Shortcode"
        ["default"]=>
        string(55) "<h3 style=\'margin: 0;\'>Section Separator Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'sharingbox_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Sharing Box Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Sharing Box Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(20) "sharingbox_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(21) "Sharing Box Shortcode"
        ["default"]=>
        string(49) "<h3 style=\'margin: 0;\'>Sharing Box Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the background color of the sharing box.',
                    'id' => 'sharing_box_bg_color',
                    'type' => 'color',
                    'title' => 'Sharing Box Background Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'desc' => 'Controls the text color of the tagline text.',
                    'id' => 'sharing_box_tagline_text_color',
                    'type' => 'color',
                    'title' => 'Sharing Box Tagline Text Color',
                    'default' => '#333333',
                ),
                array (
                    'id' => 'sharingbox_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Sharing Box Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Sharing Box Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(20) "sharingbox_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(21) "Sharing Box Shortcode"
        ["default"]=>
        string(49) "<h3 style=\'margin: 0;\'>Sharing Box Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'sociallinks_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Social Links Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Social Links Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(21) "sociallinks_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(22) "Social Links Shortcode"
        ["default"]=>
        string(50) "<h3 style=\'margin: 0;\'>Social Links Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Select a custom social icon color.',
                    'id' => 'social_links_icon_color',
                    'type' => 'color',
                    'title' => 'Social Links Custom Icons Color',
                    'default' => '#bebdbd',
                ),
                array (
                    'desc' => 'Controls the color of the social icons in the sharing box.',
                    'id' => 'social_links_boxed',
                    'type' => 'select',
                    'options' => array (
                        'No' => 'No',
                        'Yes' => 'Yes',
                    ),
                    'title' => 'Social Links Icons Boxed',
                    'default' => 'No',
                ),
                array (
                    'desc' => 'Select a custom social icon box color.',
                    'id' => 'social_links_box_color',
                    'type' => 'color',
                    'title' => 'Social Links Icons Custom Box Color',
                    'default' => '#e8e8e8',
                ),
                array (
                    'desc' => 'Boxradius for the social icons. In pixels, ex: 4px.',
                    'id' => 'social_links_boxed_radius',
                    'type' => 'text',
                    'title' => 'Social Links Icons Boxed Radius',
                    'default' => '4px',
                ),
                array (
                    'desc' => 'Controls the tooltip position of the social icons in the sharing box.',
                    'id' => 'social_links_tooltip_placement',
                    'type' => 'select',
                    'options' => array (
                        'Top' => 'Top',
                        'Right' => 'Right',
                        'Bottom' => 'Bottom',
                        'Left' => 'Left',
                        'None' => 'None',
                    ),
                    'title' => 'Social Links Icons Tooltip Position',
                    'default' => 'Top',
                ),
                array (
                    'id' => 'sociallinks_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Social Links Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Social Links Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(21) "sociallinks_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(22) "Social Links Shortcode"
        ["default"]=>
        string(50) "<h3 style=\'margin: 0;\'>Social Links Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'tabs_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Tabs Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Tabs Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(14) "tabs_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(14) "Tabs Shortcode"
        ["default"]=>
        string(42) "<h3 style=\'margin: 0;\'>Tabs Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of the active tab, content background color and tab hover.',
                    'id' => 'tabs_bg_color',
                    'type' => 'color',
                    'title' => 'Tabs Background Color + Hover Color',
                    'default' => '#ffffff',
                ),
                array (
                    'desc' => 'Controls the color of the inactive tabs and the outer tab border.',
                    'id' => 'tabs_inactive_color',
                    'type' => 'color',
                    'title' => 'Tabs Inactive Color',
                    'default' => '#ebeaea',
                ),
                array (
                    'id' => 'tabs_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Tabs Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Tabs Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(14) "tabs_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(14) "Tabs Shortcode"
        ["default"]=>
        string(42) "<h3 style=\'margin: 0;\'>Tabs Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'tagline_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Tagline Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Tagline Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(17) "tagline_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(17) "Tagline Shortcode"
        ["default"]=>
        string(45) "<h3 style=\'margin: 0;\'>Tagline Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the background color of the tagline box.',
                    'id' => 'tagline_bg',
                    'type' => 'color',
                    'title' => 'Tagline Box Background Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'desc' => 'Controls the border color of the tagline box.',
                    'id' => 'tagline_border_color',
                    'type' => 'color',
                    'title' => 'Tagline Box Border Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'id' => 'tagline_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Tagline Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Tagline Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(17) "tagline_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(17) "Tagline Shortcode"
        ["default"]=>
        string(45) "<h3 style=\'margin: 0;\'>Tagline Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'testimonials_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Testimonials Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Testimonials Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(22) "testimonials_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(22) "Testimonials Shortcode"
        ["default"]=>
        string(50) "<h3 style=\'margin: 0;\'>Testimonials Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the background color of the testimonial.',
                    'id' => 'testimonial_bg_color',
                    'type' => 'color',
                    'title' => 'Testimonial Background Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'desc' => 'Controls the text color of the testimonial font.',
                    'id' => 'testimonial_text_color',
                    'type' => 'color',
                    'title' => 'Testimonial Text Color',
                    'default' => '#747474',
                ),
                array (
                    'desc' => 'Select the slideshow speed, 1000 = 1 second.',
                    'id' => 'testimonials_speed',
                    'type' => 'text',
                    'title' => 'Testimonials Speed',
                    'default' => '4000',
                ),
                array (
                    'id' => 'testimonials_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Testimonials Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Testimonials Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(22) "testimonials_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(22) "Testimonials Shortcode"
        ["default"]=>
        string(50) "<h3 style=\'margin: 0;\'>Testimonials Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'title_shortcode',
                    'position' => 'start',
                    'type' => 'info',
                    'title' => 'Title Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Title Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(15) "title_shortcode"
        ["position"]=>
        string(5) "start"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(15) "Title Shortcode"
        ["default"]=>
        string(43) "<h3 style=\'margin: 0;\'>Title Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'desc' => 'Controls the color of the title separators',
                    'id' => 'title_border_color',
                    'type' => 'color',
                    'title' => 'Title Separator Color',
                    'default' => '#e0dede',
                ),
                array (
                    'id' => 'title_shortcode',
                    'position' => 'end',
                    'type' => 'info',
                    'title' => 'Title Shortcode',
                    'default' => '<h3 style=\'margin: 0;\'>Title Shortcode</h3>',
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(5) {
        ["id"]=>
        string(15) "title_shortcode"
        ["position"]=>
        string(3) "end"
        ["type"]=>
        string(9) "accordion"
        ["title"]=>
        string(15) "Title Shortcode"
        ["default"]=>
        string(43) "<h3 style=\'margin: 0;\'>Title Shortcode</h3>"
    }
    </pre>',
                    'raw_html' => true,
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Blog',
            'fields' => array (
                array (
                    'id' => 'blog_single_post',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>General Blog Options</h3>',
                ),
                array (
                    'desc' => 'This text will display in the page title bar of the assigned blog page.',
                    'id' => 'blog_title',
                    'type' => 'text',
                    'title' => 'Blog Page Title',
                    'default' => 'Blog',
                ),
                array (
                    'desc' => 'This text will display as subheading in the page title bar of the assigned blog page.',
                    'id' => 'blog_subtitle',
                    'type' => 'text',
                    'title' => 'Blog Page Subtitle',
                ),
                array (
                    'desc' => 'Select the layout for the assigned blog page in settings > reading.',
                    'id' => 'blog_layout',
                    'type' => 'select',
                    'options' => array (
                        'Large' => 'Large',
                        'Medium' => 'Medium',
                        'Large Alternate' => 'Large Alternate',
                        'Medium Alternate' => 'Medium Alternate',
                        'Grid' => 'Grid',
                        'Timeline' => 'Timeline',
                    ),
                    'title' => 'Blog Layout',
                    'default' => 'Large',
                ),
                array (
                    'desc' => 'Select the sidebar position for the blog pages.',
                    'id' => 'blog_sidebar_position',
                    'type' => 'select',
                    'options' => array (
                        'Right' => 'Right',
                        'Left' => 'Left',
                    ),
                    'title' => 'Blog Sidebar Position',
                    'default' => 'Right',
                ),
                array (
                    'desc' => 'Select the layout for the blog archive/category pages.',
                    'id' => 'blog_archive_layout',
                    'type' => 'select',
                    'options' => array (
                        'Large' => 'Large',
                        'Medium' => 'Medium',
                        'Large Alternate' => 'Large Alternate',
                        'Medium Alternate' => 'Medium Alternate',
                        'Grid' => 'Grid',
                        'Timeline' => 'Timeline',
                    ),
                    'title' => 'Blog Archive/Category Layout',
                    'default' => 'Large',
                ),
                array (
                    'desc' => 'Select the sidebar that will display on the archive/category pages.',
                    'id' => 'blog_archive_sidebar',
                    'type' => 'select',
                    'options' => array (
                        0 => 'None',
                        1 => 'Blog Sidebar',
                        2 => 'Footer Widget 1',
                        3 => 'Footer Widget 2',
                        4 => 'Footer Widget 3',
                        5 => 'Footer Widget 4',
                        6 => 'SlidingBar Widget 1',
                        7 => 'SlidingBar Widget 2',
                        8 => 'SlidingBar Widget 3',
                        9 => 'SlidingBar Widget 4',
                    ),
                    'title' => 'Blog Archive/Author/Category Sidebar',
                    'default' => 'None',
                ),
                array (
                    'desc' => 'Select the pagination type for the assigned blog page in settings > reading.',
                    'id' => 'blog_pagination_type',
                    'type' => 'select',
                    'options' => array (
                        'Pagination' => 'Pagination',
                        'Infinite Scroll' => 'Infinite Scroll',
                    ),
                    'title' => 'Pagination Type',
                    'default' => 'pagination',
                ),
                array (
                    'desc' => 'Select whether to display the grid layout in 2, 3 or 4 columns.',
                    'id' => 'blog_grid_columns',
                    'type' => 'select',
                    'options' => array (
                        2 => '2',
                        3 => '3',
                        4 => '4',
                    ),
                    'title' => 'Grid Layout # of Columns',
                    'default' => '3',
                ),
                array (
                    'desc' => 'Choose to display an excerpt or full content on blog pages.',
                    'id' => 'content_length',
                    'type' => 'select',
                    'options' => array (
                        'Excerpt' => 'Excerpt',
                        'Full Content' => 'Full Content',
                    ),
                    'title' => 'Excerpt or Full Blog Content',
                    'default' => 'Excerpt',
                ),
                array (
                    'desc' => 'Insert the number of words you want to show in the post excerpts.',
                    'id' => 'excerpt_length_blog',
                    'type' => 'text',
                    'title' => 'Excerpt Length',
                    'default' => '55',
                ),
                array (
                    'desc' => 'Check the box if you want to strip HTML from the excerpt content only.',
                    'id' => 'strip_html_excerpt',
                    'type' => 'checkbox',
                    'title' => 'Strip HTML from Excerpt',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to turn the blog into full width with no sidebar.',
                    'id' => 'blog_full_width',
                    'type' => 'checkbox',
                    'title' => 'Full Width',
                ),
                array (
                    'desc' => 'Check the box to turn all single post items to full width with no sidebar.',
                    'id' => 'single_post_full_width',
                    'type' => 'checkbox',
                    'title' => 'Set All Post Items Full Width',
                ),
                array (
                    'desc' => 'Check the box to display featured images on blog archive page.',
                    'id' => 'featured_images',
                    'type' => 'checkbox',
                    'title' => 'Featured Image On Blog Archive Page',
                    'default' => 1,
                ),
                array (
                    'desc' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>',
                    'id' => 'alternate_date_format_month_year',
                    'type' => 'text',
                    'title' => 'Blog Alternate Date Format - Month and Year',
                    'default' => 'm, Y',
                ),
                array (
                    'desc' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>',
                    'id' => 'alternate_date_format_day',
                    'type' => 'text',
                    'title' => 'Blog Alternate Date Format - Day',
                    'default' => 'j',
                ),
                array (
                    'desc' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date</a>',
                    'id' => 'timeline_date_format',
                    'type' => 'text',
                    'title' => 'Blog Timeline Date Format - Timeline Labels',
                    'default' => 'F Y',
                ),
                array (
                    'id' => 'blog_single_post',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Blog Single Post Page Options</h3>',
                ),
                array (
                    'desc' => 'Check the box to display featured images and videos on single post pages.',
                    'id' => 'featured_images_single',
                    'type' => 'checkbox',
                    'title' => 'Featured Image / Video on Single Post Page',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to disable previous/next pagination.',
                    'id' => 'blog_pn_nav',
                    'type' => 'checkbox',
                    'title' => 'Disable Previous/Next Pagination',
                ),
                array (
                    'desc' => 'Check the box to display the post title that goes below the featured images.',
                    'id' => 'blog_post_title',
                    'type' => 'checkbox',
                    'title' => 'Post Title',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to display the author info box below posts.',
                    'id' => 'author_info',
                    'type' => 'checkbox',
                    'title' => 'Author Info Box',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to display the social sharing box.',
                    'id' => 'social_sharing_box',
                    'type' => 'checkbox',
                    'title' => 'Social Sharing Box',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to display related posts.',
                    'id' => 'related_posts',
                    'type' => 'checkbox',
                    'title' => 'Related Posts',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to display comments.',
                    'id' => 'blog_comments',
                    'type' => 'checkbox',
                    'title' => 'Comments',
                    'default' => 1,
                ),
                array (
                    'id' => 'blog_meta',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Blog Meta Options</h3>',
                ),
                array (
                    'desc' => 'Check the box to display post meta on blog posts.',
                    'id' => 'post_meta',
                    'type' => 'checkbox',
                    'title' => 'Post Meta',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to hide the author name from post meta.',
                    'id' => 'post_meta_author',
                    'type' => 'checkbox',
                    'title' => 'Disable Post Meta Author',
                ),
                array (
                    'desc' => 'Check the box to hide the date from post meta.',
                    'id' => 'post_meta_date',
                    'type' => 'checkbox',
                    'title' => 'Disable Post Meta Date',
                ),
                array (
                    'desc' => 'Check the box to hide the categories from post meta.',
                    'id' => 'post_meta_cats',
                    'type' => 'checkbox',
                    'title' => 'Disable Post Meta Categories',
                ),
                array (
                    'desc' => 'Check the box to hide the comments from post meta.',
                    'id' => 'post_meta_comments',
                    'type' => 'checkbox',
                    'title' => 'Disable Post Meta Comments',
                ),
                array (
                    'desc' => 'Check the box to hide the read more link from post meta.',
                    'id' => 'post_meta_read',
                    'type' => 'checkbox',
                    'title' => 'Disable Post Meta Read More Link',
                ),
                array (
                    'desc' => 'Check the box to hide the tags from post meta.',
                    'id' => 'post_meta_tags',
                    'type' => 'checkbox',
                    'title' => 'Disable Post Meta Tags',
                    'default' => 1,
                ),
                array (
                    'desc' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>',
                    'id' => 'date_format',
                    'type' => 'text',
                    'title' => 'Date Format',
                    'default' => 'F jS, Y',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Portfolio',
            'fields' => array (
                array (
                    'id' => 'blog_single_post',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>General Portfolio Options</h3>',
                ),
                array (
                    'desc' => 'Insert the number of posts to display per page.',
                    'id' => 'portfolio_items',
                    'type' => 'text',
                    'title' => 'Number of Portfolio Items Per Page',
                    'default' => '10',
                ),
                array (
                    'desc' => 'Select the layout for only the archive/category pages.',
                    'id' => 'portfolio_archive_layout',
                    'type' => 'select',
                    'options' => array (
                        'Portfolio One Column' => 'Portfolio One Column',
                        'Portfolio Two Column' => 'Portfolio Two Column',
                        'Portfolio Three Column' => 'Portfolio Three Column',
                        'Portfolio Four Column' => 'Portfolio Four Column',
                        'Portfolio One Column Text' => 'Portfolio One Column Text',
                        'Portfolio Two Column Text' => 'Portfolio Two Column Text',
                        'Portfolio Three Column Text' => 'Portfolio Three Column Text',
                        'Portfolio Four Column Text' => 'Portfolio Four Column Text',
                        'Portfolio Grid' => 'Portfolio Grid',
                    ),
                    'title' => 'Portfolio Archive/Category Layout',
                    'default' => 'Portfolio One Column',
                ),
                array (
                    'desc' => 'Select the sidebar that will be added to the archive/category pages.',
                    'id' => 'portfolio_archive_sidebar',
                    'type' => 'select',
                    'options' => array (
                        0 => 'None',
                        1 => 'Blog Sidebar',
                        2 => 'Footer Widget 1',
                        3 => 'Footer Widget 2',
                        4 => 'Footer Widget 3',
                        5 => 'Footer Widget 4',
                        6 => 'SlidingBar Widget 1',
                        7 => 'SlidingBar Widget 2',
                        8 => 'SlidingBar Widget 3',
                        9 => 'SlidingBar Widget 4',
                    ),
                    'title' => 'Portfolio Archive/Category Sidebar',
                    'default' => 'None',
                ),
                array (
                    'desc' => 'Choose to display an excerpt or full portfolio content on archive / portfolio pages. Note: The "Full Content" option will override the page excerpt settings.',
                    'id' => 'portfolio_content_length',
                    'type' => 'select',
                    'options' => array (
                        'Excerpt' => 'Excerpt',
                        'Full Content' => 'Full Content',
                    ),
                    'title' => 'Excerpt or Full Portfolio Content',
                    'default' => 'Excerpt',
                ),
                array (
                    'desc' => 'Insert the number of words you want to show in the post excerpts.',
                    'id' => 'excerpt_length_portfolio',
                    'type' => 'text',
                    'title' => 'Excerpt Length',
                    'default' => '55',
                ),
                array (
                    'desc' => 'Select the pagination type for Portfolio Grid layouts.',
                    'id' => 'grid_pagination_type',
                    'type' => 'select',
                    'options' => array (
                        'Pagination' => 'Pagination',
                        'Infinite Scroll' => 'Infinite Scroll',
                    ),
                    'title' => 'Grid Pagination Type',
                    'default' => 'pagination',
                ),
                array (
                    'desc' => 'Change/Rewrite the permalink when you use the permalink type as %postname%. <strong>Make sure to regenerate permalinks.</strong>',
                    'id' => 'portfolio_slug',
                    'type' => 'text',
                    'title' => 'Portfolio Slug',
                    'default' => 'portfolio-items',
                ),
                array (
                    'id' => 'blog_single_post',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Portfolio Single Post Page Options</h3>',
                ),
                array (
                    'desc' => 'Check the box to display featured images and videos on single post pages.',
                    'id' => 'portfolio_featured_images',
                    'type' => 'checkbox',
                    'title' => 'Featured Image / Video on Single Post Page',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to disable previous/next pagination.',
                    'id' => 'portfolio_pn_nav',
                    'type' => 'checkbox',
                    'title' => 'Disable Previous/Next Pagination',
                ),
                array (
                    'desc' => 'Check the box to enable comments on portfolio items.',
                    'id' => 'portfolio_comments',
                    'type' => 'checkbox',
                    'title' => 'Show Comments',
                ),
                array (
                    'desc' => 'Check the box to enable Author on portfolio items.',
                    'id' => 'portfolio_author',
                    'type' => 'checkbox',
                    'title' => 'Show Author',
                ),
                array (
                    'desc' => 'Check the box to display the social sharing box.',
                    'id' => 'portfolio_social_sharing_box',
                    'type' => 'checkbox',
                    'title' => 'Social Sharing Box',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to display related posts.',
                    'id' => 'portfolio_related_posts',
                    'type' => 'checkbox',
                    'title' => 'Related Posts',
                    'default' => 1,
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Social Sharing Box',
            'fields' => array (
                array (
                    'id' => 'social_share_box_icon_options_title',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Social Share Box Icon Options</h3>',
                ),
                array (
                    'desc' => 'Controls the background color of the social share box.',
                    'id' => 'social_bg_color',
                    'type' => 'color',
                    'title' => 'Social Share Box Background Color',
                    'default' => '#f6f6f6',
                ),
                array (
                    'desc' => 'Select a custom social icon color.',
                    'id' => 'sharing_social_links_icon_color',
                    'type' => 'color',
                    'title' => 'Social Sharing Box Custom Icons Color',
                    'default' => '#bebdbd',
                ),
                array (
                    'desc' => 'Controls the color of the social icons in the sharing box.',
                    'id' => 'sharing_social_links_boxed',
                    'type' => 'select',
                    'options' => array (
                        'No' => 'No',
                        'Yes' => 'Yes',
                    ),
                    'title' => 'Social Sharing Box Icons Boxed',
                    'default' => 'No',
                ),
                array (
                    'desc' => 'Select a custom social icon box color.',
                    'id' => 'sharing_social_links_box_color',
                    'type' => 'color',
                    'title' => 'Social Sharing Box Icons Custom Box Color',
                    'default' => '#e8e8e8',
                ),
                array (
                    'desc' => 'Boxradius for the social icons. In pixels, ex: 4px.',
                    'id' => 'sharing_social_links_boxed_radius',
                    'type' => 'text',
                    'title' => 'Social Sharing Box Icons Boxed Radius',
                    'default' => '4px',
                ),
                array (
                    'desc' => 'Controls the tooltip position of the social icons in the sharing box.',
                    'id' => 'sharing_social_links_tooltip_placement',
                    'type' => 'select',
                    'options' => array (
                        'Top' => 'Top',
                        'Right' => 'Right',
                        'Bottom' => 'Bottom',
                        'Left' => 'Left',
                        'None' => 'None',
                    ),
                    'title' => 'Social Sharing Box Icons Tooltip Position',
                    'default' => 'Top',
                ),
                array (
                    'id' => 'social_share_box_links_title',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Social Share Box Links</h3>',
                ),
                array (
                    'desc' => 'Check the box to show the facebook sharing icon in blog posts.',
                    'id' => 'sharing_facebook',
                    'type' => 'checkbox',
                    'title' => 'Facebook',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show the twitter sharing icon in blog posts.',
                    'id' => 'sharing_twitter',
                    'type' => 'checkbox',
                    'title' => 'Twitter',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show the reddit sharing icon in blog posts.',
                    'id' => 'sharing_reddit',
                    'type' => 'checkbox',
                    'title' => 'Reddit',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show the linkedin sharing icon in blog posts.',
                    'id' => 'sharing_linkedin',
                    'type' => 'checkbox',
                    'title' => 'LinkedIn',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show the g+ sharing icon in blog posts.',
                    'id' => 'sharing_google',
                    'type' => 'checkbox',
                    'title' => 'Google Plus',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show the tumblr sharing icon in blog posts.',
                    'id' => 'sharing_tumblr',
                    'type' => 'checkbox',
                    'title' => 'Tumblr',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show the pinterest sharing icon in blog posts.',
                    'id' => 'sharing_pinterest',
                    'type' => 'checkbox',
                    'title' => 'Pinterest',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show the email sharing icon in blog posts.',
                    'id' => 'sharing_email',
                    'type' => 'checkbox',
                    'title' => 'Email',
                    'default' => 1,
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Social Media',
            'fields' => array (
                array (
                    'id' => 'social_sorter',
                    'type' => 'info',
                    'fields' => array (
                        array (
                            'name' => 'Facebook',
                            'desc' => 'Insert your custom link to show the Facebook icon. Leave blank to hide icon.',
                            'id' => 'facebook_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Flickr',
                            'desc' => 'Insert your custom link to show the Flickr icon. Leave blank to hide icon.',
                            'id' => 'flickr_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'RSS',
                            'desc' => 'Insert your custom link to show the RSS icon. Leave blank to hide icon.',
                            'id' => 'rss_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Twitter',
                            'desc' => 'Insert your custom link to show the Twitter icon. Leave blank to hide icon.',
                            'id' => 'twitter_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Vimeo',
                            'desc' => 'Insert your custom link to show the Vimeo icon. Leave blank to hide icon.',
                            'id' => 'vimeo_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Youtube',
                            'desc' => 'Insert your custom link to show the Youtube icon. Leave blank to hide icon.',
                            'id' => 'youtube_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Instagram',
                            'desc' => 'Insert your custom link to show the Instagram icon. Leave blank to hide icon.',
                            'id' => 'instagram_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Pinterest',
                            'desc' => 'Insert your custom link to show the Pinterest icon. Leave blank to hide icon.',
                            'id' => 'pinterest_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Tumblr',
                            'desc' => 'Insert your custom link to show the Tumblr icon. Leave blank to hide icon.',
                            'id' => 'tumblr_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Google+',
                            'desc' => 'Insert your custom link to show the Google+ icon. Leave blank to hide icon.',
                            'id' => 'google_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Dribbble',
                            'desc' => 'Insert your custom link to show the Dribbble icon. Leave blank to hide icon.',
                            'id' => 'dribbble_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Digg',
                            'desc' => 'Insert your custom link to show the Digg icon. Leave blank to hide icon.',
                            'id' => 'digg_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'LinkedIn',
                            'desc' => 'Insert your custom link to show the LinkedIn icon. Leave blank to hide icon.',
                            'id' => 'linkedin_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Blogger',
                            'desc' => 'Insert your custom link to show the Blogger icon. Leave blank to hide icon.',
                            'id' => 'blogger_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Skype',
                            'desc' => 'Insert your custom link to show the Skype icon. Leave blank to hide icon.',
                            'id' => 'skype_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Forrst',
                            'desc' => 'Insert your custom link to show the Forrst icon. Leave blank to hide icon.',
                            'id' => 'forrst_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Myspace',
                            'desc' => 'Insert your custom link to show the Myspace icon. Leave blank to hide icon.',
                            'id' => 'myspace_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Deviantart',
                            'desc' => 'Insert your custom link to show the Deviantart icon. Leave blank to hide icon.',
                            'id' => 'deviantart_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Yahoo',
                            'desc' => 'Insert your custom link to show the Yahoo icon. Leave blank to hide icon.',
                            'id' => 'yahoo_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Reddit',
                            'desc' => 'Insert your custom link to show the Redditt icon. Leave blank to hide icon.',
                            'id' => 'reddit_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Paypal',
                            'desc' => 'Insert your custom link to show the Paypal icon. Leave blank to hide icon.',
                            'id' => 'paypal_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Dropbox',
                            'desc' => 'Insert your custom link to show the Dropbox icon. Leave blank to hide icon.',
                            'id' => 'dropbox_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Soundclound',
                            'desc' => 'Insert your custom link to show the Soundcloud icon. Leave blank to hide icon.',
                            'id' => 'soundcloud_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'VK',
                            'desc' => 'Insert your custom link to show the VK icon. Leave blank to hide icon.',
                            'id' => 'vk_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                        array (
                            'name' => 'Email Address',
                            'desc' => 'Insert your custom link to show the mail icon. Leave blank to hide icon.',
                            'id' => 'email_link',
                            'std' => '',
                            'type' => 'text',
                        ),
                    ),
                    'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(3) {
        ["id"]=>
        string(13) "social_sorter"
        ["type"]=>
        string(13) "aione_sorter"
        ["fields"]=>array(25) {
            [0]=>array(5) {
                ["name"]=>
                string(8) "Facebook"
                ["desc"]=>
                string(76) "Insert your custom link to show the Facebook icon. Leave blank to hide icon."
                ["id"]=>
                string(13) "facebook_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [1]=>array(5) {
                ["name"]=>
                string(6) "Flickr"
                ["desc"]=>
                string(74) "Insert your custom link to show the Flickr icon. Leave blank to hide icon."
                ["id"]=>
                string(11) "flickr_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [2]=>array(5) {
                ["name"]=>
                string(3) "RSS"
                ["desc"]=>
                string(71) "Insert your custom link to show the RSS icon. Leave blank to hide icon."
                ["id"]=>
                string(8) "rss_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [3]=>array(5) {
                ["name"]=>
                string(7) "Twitter"
                ["desc"]=>
                string(75) "Insert your custom link to show the Twitter icon. Leave blank to hide icon."
                ["id"]=>
                string(12) "twitter_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [4]=>array(5) {
                ["name"]=>
                string(5) "Vimeo"
                ["desc"]=>
                string(73) "Insert your custom link to show the Vimeo icon. Leave blank to hide icon."
                ["id"]=>
                string(10) "vimeo_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [5]=>array(5) {
                ["name"]=>
                string(7) "Youtube"
                ["desc"]=>
                string(75) "Insert your custom link to show the Youtube icon. Leave blank to hide icon."
                ["id"]=>
                string(12) "youtube_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [6]=>array(5) {
                ["name"]=>
                string(9) "Instagram"
                ["desc"]=>
                string(77) "Insert your custom link to show the Instagram icon. Leave blank to hide icon."
                ["id"]=>
                string(14) "instagram_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [7]=>array(5) {
                ["name"]=>
                string(9) "Pinterest"
                ["desc"]=>
                string(77) "Insert your custom link to show the Pinterest icon. Leave blank to hide icon."
                ["id"]=>
                string(14) "pinterest_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [8]=>array(5) {
                ["name"]=>
                string(6) "Tumblr"
                ["desc"]=>
                string(74) "Insert your custom link to show the Tumblr icon. Leave blank to hide icon."
                ["id"]=>
                string(11) "tumblr_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [9]=>array(5) {
                ["name"]=>
                string(7) "Google+"
                ["desc"]=>
                string(75) "Insert your custom link to show the Google+ icon. Leave blank to hide icon."
                ["id"]=>
                string(11) "google_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [10]=>array(5) {
                ["name"]=>
                string(8) "Dribbble"
                ["desc"]=>
                string(76) "Insert your custom link to show the Dribbble icon. Leave blank to hide icon."
                ["id"]=>
                string(13) "dribbble_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [11]=>array(5) {
                ["name"]=>
                string(4) "Digg"
                ["desc"]=>
                string(72) "Insert your custom link to show the Digg icon. Leave blank to hide icon."
                ["id"]=>
                string(9) "digg_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [12]=>array(5) {
                ["name"]=>
                string(8) "LinkedIn"
                ["desc"]=>
                string(76) "Insert your custom link to show the LinkedIn icon. Leave blank to hide icon."
                ["id"]=>
                string(13) "linkedin_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [13]=>array(5) {
                ["name"]=>
                string(7) "Blogger"
                ["desc"]=>
                string(75) "Insert your custom link to show the Blogger icon. Leave blank to hide icon."
                ["id"]=>
                string(12) "blogger_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [14]=>array(5) {
                ["name"]=>
                string(5) "Skype"
                ["desc"]=>
                string(73) "Insert your custom link to show the Skype icon. Leave blank to hide icon."
                ["id"]=>
                string(10) "skype_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [15]=>array(5) {
                ["name"]=>
                string(6) "Forrst"
                ["desc"]=>
                string(74) "Insert your custom link to show the Forrst icon. Leave blank to hide icon."
                ["id"]=>
                string(11) "forrst_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [16]=>array(5) {
                ["name"]=>
                string(7) "Myspace"
                ["desc"]=>
                string(75) "Insert your custom link to show the Myspace icon. Leave blank to hide icon."
                ["id"]=>
                string(12) "myspace_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [17]=>array(5) {
                ["name"]=>
                string(10) "Deviantart"
                ["desc"]=>
                string(78) "Insert your custom link to show the Deviantart icon. Leave blank to hide icon."
                ["id"]=>
                string(15) "deviantart_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [18]=>array(5) {
                ["name"]=>
                string(5) "Yahoo"
                ["desc"]=>
                string(73) "Insert your custom link to show the Yahoo icon. Leave blank to hide icon."
                ["id"]=>
                string(10) "yahoo_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [19]=>array(5) {
                ["name"]=>
                string(6) "Reddit"
                ["desc"]=>
                string(75) "Insert your custom link to show the Redditt icon. Leave blank to hide icon."
                ["id"]=>
                string(11) "reddit_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [20]=>array(5) {
                ["name"]=>
                string(6) "Paypal"
                ["desc"]=>
                string(74) "Insert your custom link to show the Paypal icon. Leave blank to hide icon."
                ["id"]=>
                string(11) "paypal_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [21]=>array(5) {
                ["name"]=>
                string(7) "Dropbox"
                ["desc"]=>
                string(75) "Insert your custom link to show the Dropbox icon. Leave blank to hide icon."
                ["id"]=>
                string(12) "dropbox_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [22]=>array(5) {
                ["name"]=>
                string(11) "Soundclound"
                ["desc"]=>
                string(78) "Insert your custom link to show the Soundcloud icon. Leave blank to hide icon."
                ["id"]=>
                string(15) "soundcloud_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [23]=>array(5) {
                ["name"]=>
                string(2) "VK"
                ["desc"]=>
                string(70) "Insert your custom link to show the VK icon. Leave blank to hide icon."
                ["id"]=>
                string(7) "vk_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [24]=>array(5) {
                ["name"]=>
                string(13) "Email Address"
                ["desc"]=>
                string(72) "Insert your custom link to show the mail icon. Leave blank to hide icon."
                ["id"]=>
                string(10) "email_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
        }
    }
    </pre>',
                    'raw_html' => true,
                ),
                array (
                    'id' => 'custom_color_scheme_element',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Custom Social Icon</h3>',
                ),
                array (
                    'desc' => 'This is the icon name that shows in the hover tooltip.',
                    'id' => 'custom_icon_name',
                    'type' => 'text',
                    'title' => 'Custom Icon Name',
                ),
                array (
                    'desc' => 'Select an image file for your custom icon.',
                    'id' => 'custom_icon_image',
                    'type' => 'media',
                    'title' => 'Custom Icon Image',
                    'url' => true,
                ),
                array (
                    'desc' => 'Select an image file for the retina version of the icon. It should be 2x the size of main icon.',
                    'id' => 'custom_icon_image_retina',
                    'type' => 'media',
                    'title' => 'Custom Icon Image Retina',
                    'url' => true,
                ),
                array (
                    'desc' => 'If retina icon is added, enter the standard icon (1x) version width, do not enter the retina icon width.',
                    'id' => 'retina_icon_width',
                    'type' => 'text',
                    'title' => 'Standard Icon Width for Retina Icon',
                ),
                array (
                    'desc' => 'If retina icon is added, enter the standard icon (1x) version height, do not enter the retina icon height.',
                    'id' => 'retina_icon_height',
                    'type' => 'text',
                    'title' => 'Standard Icon Height for Retina Icon',
                ),
                array (
                    'desc' => 'Insert a link for your custom icon.',
                    'id' => 'custom_icon_link',
                    'type' => 'text',
                    'title' => 'Custom Icon Link',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Slideshows',
            'fields' => array (
                array (
                    'desc' => 'This option controls the number of featured image boxes for blog/portfolio slideshows.',
                    'id' => 'posts_slideshow_number',
                    'type' => 'text',
                    'title' => 'Posts Slideshow Images',
                    'default' => '5',
                ),
                array (
                    'desc' => 'Check the box to autoplay the slideshow.',
                    'id' => 'slideshow_autoplay',
                    'type' => 'checkbox',
                    'title' => 'Autoplay',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to enable smooth height on slideshows when using images with different heights. Please note, smooth height is disabled on blog grid layout.',
                    'id' => 'slideshow_smooth_height',
                    'type' => 'checkbox',
                    'title' => 'Enable Smooth Height',
                ),
                array (
                    'desc' => 'Controls the speed of slideshows for the [slider] shortcode and sliders within posts. ex: 1000 = 1 second.',
                    'id' => 'slideshow_speed',
                    'type' => 'text',
                    'title' => 'Slideshow speed',
                    'default' => '7000',
                ),
                array (
                    'desc' => 'Check the box if you want to show pagination circles below a video slide for the slider shortcode. Leave it unchecked to hide them on video slides.',
                    'id' => 'pagination_video_slide',
                    'type' => 'checkbox',
                    'title' => 'Pagination circles below video slides',
                ),
                array (
                    'desc' => 'Check the box to enable posts slideshow in legacy mode. Only recommended for v.1 users, this option will disable the multiple featured image method.<strong>This option will be removed in next update.</strong>',
                    'id' => 'legacy_posts_slideshow',
                    'type' => 'checkbox',
                    'title' => '<strong>Deprecated</strong>: Legacy Posts Slideshow',
                ),
                array (
                    'desc' => 'Check the box to show post slideshows in blog/portfolio pages. <strong>This option will be removed in next update.</strong>',
                    'id' => 'posts_slideshow',
                    'type' => 'checkbox',
                    'title' => 'Deprecated: Posts Slideshow',
                    'default' => 1,
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Elastic Slider',
            'fields' => array (
                array (
                    'desc' => 'In pixels or percentage, ex: 100% or 100.',
                    'id' => 'tfes_slider_width',
                    'type' => 'text',
                    'title' => 'Slider Width',
                    'default' => '100%',
                ),
                array (
                    'desc' => 'In pixels, ex: 100px.',
                    'id' => 'tfes_slider_height',
                    'type' => 'text',
                    'title' => 'Slider Height',
                    'default' => '400px',
                ),
                array (
                    'desc' => 'Slides animate from sides or center.',
                    'id' => 'tfes_animation',
                    'options' => array (
                        'sides' => 'sides',
                        'center' => 'center',
                    ),
                    'type' => 'select',
                    'title' => 'Animation',
                    'default' => 'sides',
                ),
                array (
                    'desc' => 'Check the box to autoplay the slides.',
                    'id' => 'tfes_autoplay',
                    'type' => 'checkbox',
                    'title' => 'Autoplay',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Select the slideshow speed, 1000 = 1 second.',
                    'id' => 'tfes_interval',
                    'type' => 'text',
                    'title' => 'Slideshow Interval',
                    'default' => '3000',
                ),
                array (
                    'desc' => 'Select the animation speed, 1000 = 1 second.',
                    'id' => 'tfes_speed',
                    'type' => 'text',
                    'title' => 'Sliding Speed',
                    'default' => '800',
                ),
                array (
                    'desc' => 'Enter the width for thumbnail without \'px\' ex: 100.',
                    'id' => 'tfes_width',
                    'type' => 'text',
                    'title' => 'Thumbnail Width',
                    'default' => '150',
                ),
                array (
                    'desc' => 'Default is 42',
                    'id' => 'es_title_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Title Font Size (px)',
                    'default' => '42',
                ),
                array (
                    'desc' => 'Default is 20',
                    'id' => 'es_caption_font_size',
                    'type' => 'select',
                    'options' => array (
                        10 => '10',
                        11 => '11',
                        12 => '12',
                        13 => '13',
                        14 => '14',
                        15 => '15',
                        16 => '16',
                        17 => '17',
                        18 => '18',
                        19 => '19',
                        20 => '20',
                        21 => '21',
                        22 => '22',
                        23 => '23',
                        24 => '24',
                        25 => '25',
                        26 => '26',
                        27 => '27',
                        28 => '28',
                        29 => '29',
                        30 => '30',
                        31 => '31',
                        32 => '32',
                        33 => '33',
                        34 => '34',
                        35 => '35',
                        36 => '36',
                        37 => '37',
                        38 => '38',
                        39 => '39',
                        40 => '40',
                        41 => '41',
                        42 => '42',
                        43 => '43',
                        44 => '44',
                        45 => '45',
                        46 => '46',
                        47 => '47',
                        48 => '48',
                        49 => '49',
                        50 => '50',
                    ),
                    'title' => 'Caption Font Size (px)',
                    'default' => '20',
                ),
                array (
                    'desc' => 'Controls the text color of the title font.',
                    'id' => 'es_title_color',
                    'type' => 'color',
                    'title' => 'Title Color',
                    'default' => '#333333',
                ),
                array (
                    'desc' => 'Controls the text color of the caption font.',
                    'id' => 'es_caption_color',
                    'type' => 'color',
                    'title' => 'Caption Color',
                    'default' => '#747474',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Lightbox',
            'fields' => array (
                array (
                    'desc' => 'Set the speed of the animation.',
                    'id' => 'lightbox_animation_speed',
                    'type' => 'select',
                    'options' => array (
                        'Fast' => 'Fast',
                        'Slow' => 'Slow',
                        'Normal' => 'Normal',
                    ),
                    'title' => 'Animation Speed',
                    'default' => 'fast',
                ),
                array (
                    'desc' => 'Check the box to show the gallery.',
                    'id' => 'lightbox_gallery',
                    'type' => 'checkbox',
                    'title' => 'Show gallery',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to autoplay the lightbox gallery.',
                    'id' => 'lightbox_autoplay',
                    'type' => 'checkbox',
                    'title' => 'Autoplay the Lightbox Gallery',
                ),
                array (
                    'desc' => 'If autoplay is enabled, set the slideshow speed, 1000 = 1 second.',
                    'id' => 'lightbox_slideshow_speed',
                    'type' => 'text',
                    'title' => 'Slideshow Speed',
                    'default' => '5000',
                ),
                array (
                    'desc' => 'Set the opacity of background, <br />0.1 (lowest) to 1 (highest).',
                    'id' => 'lightbox_opacity',
                    'type' => 'text',
                    'title' => 'Background Opacity',
                    'default' => '0.8',
                ),
                array (
                    'desc' => 'Check the box to show the image caption.',
                    'id' => 'lightbox_title',
                    'type' => 'checkbox',
                    'title' => 'Show Caption',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show the image description. The Alternative text field is used for the description.',
                    'id' => 'lightbox_desc',
                    'type' => 'checkbox',
                    'title' => 'Show Description',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show social sharing buttons on lightbox.',
                    'id' => 'lightbox_social',
                    'type' => 'checkbox',
                    'title' => 'Social Sharing',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show post images that are inside the post content area in the lightbox.',
                    'id' => 'lightbox_post_images',
                    'type' => 'checkbox',
                    'title' => 'Show Post Images in Lightbox',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Contact',
            'fields' => array (
                array (
                    'id' => 'google_map',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Google Map Options</h3>',
                ),
                array (
                    'desc' => 'Select the type of google map to show on the contact page.',
                    'id' => 'gmap_type',
                    'options' => array (
                        'roadmap' => 'roadmap',
                        'satellite' => 'satellite',
                        'hybrid' => 'hybrid',
                        'terrain' => 'terrain',
                    ),
                    'type' => 'select',
                    'title' => 'Google Map Type',
                    'default' => 'roadmap',
                ),
                array (
                    'desc' => 'In pixels or percentage, ex: 100% or 100px.',
                    'id' => 'gmap_width',
                    'type' => 'text',
                    'title' => 'Google Map Width',
                    'default' => '100%',
                ),
                array (
                    'desc' => 'In pixels, ex: 100px.',
                    'id' => 'gmap_height',
                    'type' => 'text',
                    'title' => 'Google Map Height',
                    'default' => '415px',
                ),
                array (
                    'desc' => 'This will only be applied to maps that are not 100% width. It controls the distance to menu/page title. In pixels, ex: 100px.',
                    'id' => 'gmap_topmargin',
                    'type' => 'text',
                    'title' => 'Google Map Top Margin',
                    'default' => '55px',
                ),
                array (
                    'desc' => 'Single address ex: 775 New York Ave, Brooklyn, Kings, New York 11203. <br />For multiple markers, separate the addresses with the | symbol.<br /> ex: Address 1|Address 2|Address 3.',
                    'id' => 'gmap_address',
                    'type' => 'textarea',
                    'title' => 'Google Map Address',
                    'default' => '775 New York Ave, Brooklyn, Kings, New York 11203',
                ),
                array (
                    'desc' => 'Enter the email adress the form will be sent to.',
                    'id' => 'email_address',
                    'type' => 'text',
                    'title' => 'Email Address',
                ),
                array (
                    'desc' => 'Higher number will be more zoomed in.',
                    'id' => 'map_zoom_level',
                    'type' => 'text',
                    'title' => 'Map Zoom Level',
                    'default' => '8',
                ),
                array (
                    'desc' => 'Check the box to hide the address pin.',
                    'id' => 'map_pin',
                    'type' => 'checkbox',
                    'title' => 'Hide Address Pin',
                ),
                array (
                    'desc' => 'Check the box to keep the popup graphic with address info hidden when the google map loads. It will only show when the pin on the map is clicked.',
                    'id' => 'map_popup',
                    'type' => 'checkbox',
                    'title' => 'Show Map Popup On Click',
                ),
                array (
                    'desc' => 'Check the box to disable scrollwheel on google maps.',
                    'id' => 'map_scrollwheel',
                    'type' => 'checkbox',
                    'title' => 'Disable Map Scrollwheel',
                ),
                array (
                    'desc' => 'Check the box to disable scale on google maps.',
                    'id' => 'map_scale',
                    'type' => 'checkbox',
                    'title' => 'Disable Map Scale',
                ),
                array (
                    'desc' => 'Check the box to disable zoom control icon and pan control icon on google maps.',
                    'id' => 'map_zoomcontrol',
                    'type' => 'checkbox',
                    'title' => 'Disable Map Zoom & Pan Control Icons',
                ),
                array (
                    'id' => 'google_map',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Google Map Design Styling</h3>',
                ),
                array (
                    'desc' => 'Choose default styling for classic google map styles. Choose theme styling for our custom style. Choose custom styling to make your own with the advanced options below.',
                    'id' => 'map_styling',
                    'options' => array (
                        'default' => 'Default Styling',
                        'theme' => 'Theme Styling',
                        'custom' => 'Custom Styling',
                    ),
                    'type' => 'select',
                    'title' => 'Select the Map Styling',
                    'default' => 'default',
                ),
                array (
                    'desc' => 'Custom styling setting only. Pick an overlaying color for the map. Works best with "roadmap" type.',
                    'id' => 'map_overlay_color',
                    'type' => 'color',
                    'title' => 'Map Overlay Color',
                ),
                array (
                    'desc' => 'Custom styling setting only. Choose between default or custom info box.',
                    'id' => 'map_infobox_styling',
                    'options' => array (
                        'default' => 'Default Infobox',
                        'custom' => 'Custom Infobox',
                    ),
                    'type' => 'select',
                    'title' => 'Info Box Styling',
                    'default' => 'default',
                ),
                array (
                    'desc' => 'Custom styling setting only. Type in custom info box content to replace address string. For multiple addresses, separate info box contents by using the | symbol. ex: InfoBox 1|InfoBox 2|InfoBox 3',
                    'id' => 'map_infobox_content',
                    'type' => 'textarea',
                    'title' => 'Info Box Content',
                ),
                array (
                    'desc' => 'Custom styling setting only. Pick a color for the info box background.',
                    'id' => 'map_infobox_bg_color',
                    'type' => 'color',
                    'title' => 'Info Box Background Color',
                ),
                array (
                    'desc' => 'Custom styling setting only. Pick a color for the info box text.',
                    'id' => 'map_infobox_text_color',
                    'type' => 'color',
                    'title' => 'Info Box Text Color',
                ),
                array (
                    'desc' => 'Custom styling setting only. Use full image urls for custom marker icons or input "theme" for our custom marker. For multiple addresses, separate icons by using the | symbol or use one for all. ex: Icon 1|Icon 2|Icon 3',
                    'id' => 'map_custom_marker_icon',
                    'type' => 'textarea',
                    'title' => 'Custom Marker Icon',
                ),
                array (
                    'id' => 'recaptcha',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>ReCaptcha Spam Options</h3>',
                ),
                array (
                    'desc' => 'Follow the steps in <a href=\'http://oxosolutions.com/aione-doc/pages/setting-up-contact-page/\'> our docs</a> to get key.',
                    'id' => 'recaptcha_public',
                    'type' => 'text',
                    'title' => 'ReCaptcha Public Key',
                ),
                array (
                    'desc' => 'Follow the steps in <a href=\'http://oxosolutions.com/aione-doc/pages/setting-up-contact-page/\'> our docs</a> to get key.',
                    'id' => 'recaptcha_private',
                    'type' => 'text',
                    'title' => 'ReCaptcha Private Key',
                ),
                array (
                    'desc' => 'Select the recaptcha color scheme.',
                    'id' => 'recaptcha_color_scheme',
                    'type' => 'select',
                    'options' => array (
                        'red' => 'red',
                        'blackglass' => 'blackglass',
                        'clean' => 'clean',
                        'white' => 'white',
                    ),
                    'title' => 'ReCaptcha Color Scheme',
                    'default' => 'Clean',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Sidebar',
            'fields' => array (
                array (
                    'desc' => 'Controls the background color of the sidebar.',
                    'id' => 'sidebar_bg_color',
                    'type' => 'color',
                    'title' => 'Sidebar Background Color',
                    'default' => 'transparent',
                ),
                array (
                    'desc' => 'Enter a value (based on percentage) without % sign, ex: 71.',
                    'id' => 'content_width',
                    'type' => 'text',
                    'title' => 'Content Area Width',
                    'default' => '71.1702128',
                ),
                array (
                    'desc' => 'Enter a value (based on percentage) without % sign, ex: 23.',
                    'id' => 'sidebar_width',
                    'type' => 'text',
                    'title' => 'Sidebar Width',
                    'default' => '23.4042553',
                ),
                array (
                    'desc' => 'Enter a value (based on percentage) without % sign, ex: 0.',
                    'id' => 'sidebar_padding',
                    'type' => 'text',
                    'title' => 'Sidebar Padding',
                ),
                array (
                    'id' => 'sidebar_info',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin-top:0;\'>Important Instructions For These Options:</h3><b>1.  100% </b>- Your values added up cannot go over 100% or your sidebar will not show.<br /></br />
    <b>2. PADDING </b>-  Is always multiplied by 2 because it adds left and right padding. So a padding value of 5, actually equals 10.  And you should only use padding if you are using a background color that is different than your main background color.<br /></br />

    <b>3.  UNSEEN SPACE</b> - You need to factor in the space between the Content Width & Sidebar Width. This space does not have a field.<br /></br />

    <b>EXAMPLE 1:</b> Content Width = 65 + Sidebar Width = 30  + Padding = 0
    * this example adds up to 95% which leaves you 5% in between the content and sidebar sections. This is good to use if your sidebar background is the same color as your main background<br /></br />

    <b>EXAMPLE 2:</b> Content Width = 60 + Sidebar Width = 30  + Padding = 2.5
    * this example adds up to 95% which leaves you 5% in between the content and sidebar sections. This is good to use if your sidebar background is a different color than your main background',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Search Page',
            'fields' => array (
                array (
                    'id' => 'search',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Search Options</h3>',
                ),
                array (
                    'desc' => 'Select the layout for the search results page.',
                    'id' => 'search_layout',
                    'type' => 'select',
                    'options' => array (
                        'Large' => 'Large',
                        'Medium' => 'Medium',
                        'Large Alternate' => 'Large Alternate',
                        'Medium Alternate' => 'Medium Alternate',
                        'Grid' => 'Grid',
                        'Timeline' => 'Timeline',
                    ),
                    'title' => 'Search Results Layout',
                    'default' => 'Large',
                ),
                array (
                    'desc' => 'Select the sidebar that will display on the search page.',
                    'id' => 'search_sidebar',
                    'type' => 'select',
                    'options' => array (
                        0 => 'None',
                        1 => 'Blog Sidebar',
                        2 => 'Footer Widget 1',
                        3 => 'Footer Widget 2',
                        4 => 'Footer Widget 3',
                        5 => 'Footer Widget 4',
                        6 => 'SlidingBar Widget 1',
                        7 => 'SlidingBar Widget 2',
                        8 => 'SlidingBar Widget 3',
                        9 => 'SlidingBar Widget 4',
                    ),
                    'title' => 'Search Page Sidebar',
                    'default' => 'None',
                ),
                array (
                    'desc' => 'Select the sidebar position for the search page.',
                    'id' => 'search_sidebar_position',
                    'type' => 'select',
                    'options' => array (
                        'Right' => 'Right',
                        'Left' => 'Left',
                    ),
                    'title' => 'Search Sidebar Position',
                    'default' => 'Right',
                ),
                array (
                    'desc' => 'Select the type of content to display in search results.',
                    'id' => 'search_content',
                    'type' => 'select',
                    'options' => array (
                        'Posts and Pages' => 'Posts and Pages',
                        'Only Posts' => 'Only Posts',
                        'Only Pages' => 'Only Pages',
                    ),
                    'title' => 'Search Results Content',
                    'default' => 'Posts and Pages',
                ),
                array (
                    'desc' => 'Check the box if you want to hide excerpt for search results.',
                    'id' => 'search_excerpt',
                    'type' => 'checkbox',
                    'title' => 'Hide Search Results Excerpt',
                ),
                array (
                    'desc' => 'Set the number of search results per page.',
                    'id' => 'search_results_per_page',
                    'type' => 'text',
                    'title' => 'Number of Search Results Per Page',
                    'default' => '10',
                ),
                array (
                    'desc' => 'Check the box if you want to hide featured images for search results.',
                    'id' => 'search_featured_images',
                    'type' => 'checkbox',
                    'title' => 'Hide Featured Images from Search Results',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Extra',
            'fields' => array (
                array (
                    'id' => 'misc_options',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Miscellaneous Options</h3>',
                ),
                array (
                    'desc' => 'Select the default position of the sidebar. This will take effect for new pages/posts.',
                    'id' => 'default_sidebar_pos',
                    'options' => array (
                        'Right' => 'Right',
                        'Left' => 'Left',
                    ),
                    'type' => 'select',
                    'title' => 'Default Sidebar Position',
                    'default' => 'right',
                ),
                array (
                    'desc' => 'Controls the side navigation animation for child pages, on click or hover.',
                    'id' => 'sidenav_behavior',
                    'options' => array (
                        'Hover' => 'Hover',
                        'Click' => 'Click',
                    ),
                    'type' => 'select',
                    'title' => 'Sidenav Behavior',
                    'default' => 'hover',
                ),
                array (
                    'desc' => 'This option controls the amount of related projects / posts that show up on each single portfolio and blog post. ex: 5',
                    'id' => 'number_related_posts',
                    'type' => 'text',
                    'title' => 'Number of Related Posts / Projects',
                    'default' => '5',
                ),
                array (
                    'desc' => 'Choose if the excerpt length should be based on words or characters.',
                    'id' => 'excerpt_base',
                    'options' => array (
                        'Words' => 'Words',
                        'Characters' => 'Characters',
                    ),
                    'type' => 'select',
                    'title' => 'Basis for Excerpt Length',
                    'default' => 'words',
                ),
                array (
                    'desc' => 'Check the box to disable the read more sign [...] on excerpts throughout the site.',
                    'id' => 'disable_excerpts',
                    'type' => 'checkbox',
                    'title' => 'Disable [...] on Excerpts',
                ),
                array (
                    'desc' => 'Check the box to have the read more sign [...] on excerpts link to single post page.',
                    'id' => 'link_read_more',
                    'type' => 'checkbox',
                    'title' => 'Make [...] Link to Single Post Page',
                ),
                array (
                    'desc' => 'Check the box to allow comments on regular pages.',
                    'id' => 'comments_pages',
                    'type' => 'checkbox',
                    'title' => 'Allow Comments on Pages',
                ),
                array (
                    'desc' => 'Check the box to disable featured images on regular pages.',
                    'id' => 'featured_images_pages',
                    'type' => 'checkbox',
                    'title' => 'Featured Images on Pages',
                ),
                array (
                    'desc' => 'Check the box to show featured images on FAQ archive page.',
                    'id' => 'faq_featured_image',
                    'type' => 'checkbox',
                    'title' => 'FAQ Featured Images',
                ),
                array (
                    'desc' => 'Check the box to add rel="nofollow" attribute to all social links.',
                    'id' => 'nofollow_social_links',
                    'type' => 'checkbox',
                    'title' => 'Add rel="nofollow" to social links',
                ),
                array (
                    'desc' => 'Select the checkbox to allow social icons to open in a new window.',
                    'id' => 'social_icons_new',
                    'type' => 'checkbox',
                    'title' => 'Open Social Icons in a New Window',
                    'default' => 1,
                ),

                array (
                    'id' => 'rollovers',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Image Rollover Options</h3>',
                ),
                array (
                    'desc' => 'Check the box to show the rollover box on images.',
                    'id' => 'image_rollover',
                    'type' => 'checkbox',
                    'title' => 'Image Rollover',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to disable the link icon from image rollovers. Note: This option will override the post settings.',
                    'id' => 'link_image_rollover',
                    'type' => 'checkbox',
                    'title' => 'Disable Link Icon From Image Rollover',
                ),
                array (
                    'desc' => 'Check the box to disable the image icon from image rollovers. Note: This option will override the post settings.',
                    'id' => 'zoom_image_rollover',
                    'type' => 'checkbox',
                    'title' => 'Disable Image Icon From Image Rollover',
                ),
                array (
                    'desc' => 'Check the box to disable the title from image rollovers.',
                    'id' => 'title_image_rollover',
                    'type' => 'checkbox',
                    'title' => 'Disable Title From Image Rollover',
                ),
                array (
                    'desc' => 'Check the box to disable the categories from image rollovers.',
                    'id' => 'cats_image_rollover',
                    'type' => 'checkbox',
                    'title' => 'Disable Categories From Image Rollover',
                ),
                array (
                    'desc' => 'Select the opacity of the rollover. <br />0.1 (lowest) to 1 (highest).',
                    'id' => 'image_rollover_opacity',
                    'type' => 'text',
                    'title' => 'Image Rollover Opacity',
                    'default' => '1',
                ),
                array (
                    'id' => 'bbpress_only',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>BBPress Options</h3>',
                ),
                array (
                    'desc' => 'Check the box if you want to use one global sidebar on all forum pages.',
                    'id' => 'bbpress_global_sidebar',
                    'type' => 'checkbox',
                    'title' => 'BBPress Use Global Sidebar',
                ),
                array (
                    'desc' => 'Select the sidebar that will display on forum pages globally.',
                    'id' => 'ppbress_sidebar',
                    'type' => 'select',
                    'options' => array (
                        0 => 'None',
                        1 => 'Blog Sidebar',
                        2 => 'Footer Widget 1',
                        3 => 'Footer Widget 2',
                        4 => 'Footer Widget 3',
                        5 => 'Footer Widget 4',
                        6 => 'SlidingBar Widget 1',
                        7 => 'SlidingBar Widget 2',
                        8 => 'SlidingBar Widget 3',
                        9 => 'SlidingBar Widget 4',
                    ),
                    'title' => 'BBPress Global Sidebar',
                    'default' => 'None',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Advanced',
            'fields' => array (
                array (
                    'id' => 'enable_disable_heading',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Enable / Disable Theme Features & Plugin Support</h3>',
                ),
                array (
                    'desc' => 'Check to disable the theme\'s mega menu.',
                    'id' => 'disable_megamenu',
                    'type' => 'checkbox',
                    'title' => 'Disable Mega Menu',
                ),
                array (
                    'desc' => 'Check the box to disable the aione styles and use the default Revolution Slider styles.',
                    'id' => 'aione_rev_styles',
                    'type' => 'checkbox',
                    'title' => 'Disable aione Styles For Revolution Slider',
                ),
                array (
                    'desc' => 'Check the box if you are are using UberMenu, this option adds UberMenu support without editing any code.',
                    'id' => 'ubermenu',
                    'type' => 'checkbox',
                    'title' => 'UberMenu Plugin Support',
                ),
                array (
                    'desc' => 'Check the box to disable CSS animations on shortcode items.',
                    'id' => 'use_animate_css',
                    'type' => 'checkbox',
                    'title' => 'Disable CSS Animations',
                ),
                array (
                    'desc' => 'Check the box to disable CSS animations on mobiles only.',
                    'id' => 'disable_mobile_animate_css',
                    'type' => 'checkbox',
                    'title' => 'Disable CSS Animations on Mobiles Only',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to disable Lightbox.',
                    'id' => 'status_lightbox',
                    'type' => 'checkbox',
                    'title' => 'Disable Lightbox',
                ),
                array (
                    'desc' => 'Check the box to disable Lightbox only on single posts and portfolio pages..',
                    'id' => 'status_lightbox_single',
                    'type' => 'checkbox',
                    'title' => 'Disable Lightbox On Single Posts Pages Only',
                ),
                array (
                    'desc' => 'Check the box to disable Youtube API scripts.',
                    'id' => 'status_yt',
                    'type' => 'checkbox',
                    'title' => 'Disable Youtube API Scripts',
                ),
                array (
                    'desc' => 'Check the box to disable Vimeo API scripts.',
                    'id' => 'status_vimeo',
                    'type' => 'checkbox',
                    'title' => 'Disable Vimeo API Scripts',
                ),
                array (
                    'desc' => 'Check the box to disable google map.',
                    'id' => 'status_gmap',
                    'type' => 'checkbox',
                    'title' => 'Disable Google Map Scripts',
                ),
                array (
                    'desc' => 'Check the box to disable the ToTop script which adds the scrolling to top functionality.',
                    'id' => 'status_totop',
                    'type' => 'checkbox',
                    'title' => 'Disable ToTop Script',
                ),
                array (
                    'desc' => 'Check the box to enable the ToTop script on mobile devices.',
                    'id' => 'status_totop_mobile',
                    'type' => 'checkbox',
                    'title' => 'Enable ToTop Script on mobile',
                ),
                array (
                    'desc' => 'Check the box to disable aione slider.',
                    'id' => 'status_aione_slider',
                    'type' => 'checkbox',
                    'title' => 'Disable Aione Slider',
                ),
                array (
                    'desc' => 'Check the box to disable elastic slider.',
                    'id' => 'status_eslider',
                    'type' => 'checkbox',
                    'title' => 'Disable Elastic Slider',
                ),
                array (
                    'desc' => 'Check the box to disable font awesome.',
                    'id' => 'status_fontawesome',
                    'type' => 'checkbox',
                    'title' => 'Disable FontAwesome',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Woocommerce',
            'fields' => array (
                array (
                    'desc' => 'Insert the number of posts to display per page.',
                    'id' => 'woo_items',
                    'type' => 'text',
                    'title' => 'Number of Products per Page',
                    'default' => '12',
                ),
                array (
                    'desc' => 'Select the sidebar that will be added to the archive/category pages.',
                    'id' => 'woocommerce_archive_sidebar',
                    'type' => 'select',
                    'options' => array (
                        0 => 'None',
                        1 => 'Blog Sidebar',
                        2 => 'Footer Widget 1',
                        3 => 'Footer Widget 2',
                        4 => 'Footer Widget 3',
                        5 => 'Footer Widget 4',
                        6 => 'SlidingBar Widget 1',
                        7 => 'SlidingBar Widget 2',
                        8 => 'SlidingBar Widget 3',
                        9 => 'SlidingBar Widget 4',
                    ),
                    'title' => 'Woocommerce Archive/Category Sidebar',
                    'default' => 'None',
                ),
                array (
                    'desc' => 'Check the box to disable the ordering boxes displayed on the shop page.',
                    'id' => 'woocommerce_aione_ordering',
                    'type' => 'checkbox',
                    'title' => 'Disable Woocommerce Shop Page Ordering Boxes',
                ),
                array (
                    'desc' => 'Check the box to use aione\'s one page checkout template.',
                    'id' => 'woocommerce_one_page_checkout',
                    'type' => 'checkbox',
                    'title' => 'Use Woocommerce One Page Checkout',
                ),
                array (
                    'desc' => 'Check the box to show the order notes on the checkout page..',
                    'id' => 'woocommerce_enable_order_notes',
                    'type' => 'checkbox',
                    'title' => 'Show Woocommerce Order Notes on Checkout',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show My Account link, uncheck to disable. Please note this will not show with Ubermenu.',
                    'id' => 'woocommerce_acc_link_top_nav',
                    'type' => 'checkbox',
                    'title' => 'Show Woocommerce My Account Link in Secondary Menu',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show the Cart icon, uncheck to disable. Please note this will not show with Ubermenu.',
                    'id' => 'woocommerce_cart_link_top_nav',
                    'type' => 'checkbox',
                    'title' => 'Show Woocommerce Cart Icon in Secondary Menu',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show My Account link, uncheck to disable. Please note these will not show with Ubermenu.',
                    'id' => 'woocommerce_acc_link_main_nav',
                    'type' => 'checkbox',
                    'title' => 'Show Woocommerce My Account Link in Main Menu',
                ),
                array (
                    'desc' => 'Check the box to show the Cart icon, uncheck to disable. Please note these will not show with Ubermenu.',
                    'id' => 'woocommerce_cart_link_main_nav',
                    'type' => 'checkbox',
                    'title' => 'Show Woocommerce Cart Link in Main Menu',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Check the box to show the social icons on product pages, uncheck to disable.',
                    'id' => 'woocommerce_social_links',
                    'type' => 'checkbox',
                    'title' => 'Show Woocommerce Social Icons',
                    'default' => 1,
                ),
                array (
                    'desc' => 'Insert your text and it will appear in the first message box on the acount page.',
                    'id' => 'woo_acc_msg_1',
                    'type' => 'textarea',
                    'title' => 'Account Area Message 1',
                    'default' => 'Need Assistance? Call customer service at 888-555-5555.',
                ),
                array (
                    'desc' => 'Insert your text and it will appear in the second message box on the acount page.',
                    'id' => 'woo_acc_msg_2',
                    'type' => 'textarea',
                    'title' => 'Account Area Message 2',
                    'default' => 'E-mail them at info@yourshop.com',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Custom CSS',
            'fields' => array (
                array (
                    'id' => 'advanced_css_intro',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Advanced CSS Customizations</h3>',
                ),
                array (
                    'desc' => 'Paste your CSS code, do not include any tags or HTML in thie field. Any custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed.',
                    'id' => 'custom_css',
                    'type' => 'textarea',
                    'title' => 'CSS Code',
                ),
            ),
            'icon' => 'el-icon-cog',
        ),
        array (
            'title' => 'Auto Updates',
            'fields' => array (
                array (
                    'id' => 'theme_updater',
                    'icon' => true,
                    'type' => 'info',
                    'raw' => '<h3 style=\'margin: 0;\'>Enter all 3 required fields below!</h3>',
                ),
                array (
                    'id' => 'tf_username',
                    'type' => 'text',
                    'title' => 'ThemeForest Username',
                ),
                array (
                    'desc' => 'You can create one from ThemeForest\'s user settings page.',
                    'id' => 'tf_api',
                    'type' => 'text',
                    'title' => 'ThemeForest Secret API Key',
                ),
                array (
                    'id' => 'tf_purchase_code',
                    'type' => 'text',
                    'title' => 'ThemeForest Purchase Code',
                ),
            ),
        ),
    );





    */




            $this->sections[] = array(
                'icon'      => 'el-icon-list-alt',
                'title'     => __('Select Fields', 'redux-framework-demo'),
                'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
                'fields'    => array(
                    array(
                        'id'        => 'opt-select',
                        'type'      => 'select',
                        'title'     => __('Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),

                        //Must provide key => value pairs for select options
                        'options'   => array(
                            '1' => 'Opt 1',
                            '2' => 'Opt 2',
                            '3' => 'Opt 3'
                        ),
                        'default'   => '2'
                    ),
                    array(
                        'id'        => 'opt-multi-select',
                        'type'      => 'select',
                        'multi'     => true,
                        'title'     => __('Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),

                        //Must provide key => value pairs for radio options
                        'options'   => array(
                            '1' => 'Opt 1',
                            '2' => 'Opt 2',
                            '3' => 'Opt 3'
                        ),
                        'required'  => array('select', 'equals', array('1', '3')),
                        'default'   => array('2', '3')
                    ),
                    array(
                        'id'        => 'opt-select-image',
                        'type'      => 'select_image',
                        'title'     => __('Select Image', 'redux-framework-demo'),
                        'subtitle'  => __('A preview of the selected image will appear underneath the select box.', 'redux-framework-demo'),
                        'options'   => $sample_patterns,
                        // Alternatively
                        //'options'   => Array(
                        //                'img_name' => 'img_path'
                        //             )
                        'default' => 'tree_bark.png',
                    ),
                    array(
                        'id'    => 'opt-info',
                        'type'  => 'info',
                        'desc'  => __('You can easily add a variety of data from WordPress.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-categories',
                        'type'      => 'select',
                        'data'      => 'categories',
                        'title'     => __('Categories Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-categories-multi',
                        'type'      => 'select',
                        'data'      => 'categories',
                        'multi'     => true,
                        'title'     => __('Categories Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-pages',
                        'type'      => 'select',
                        'data'      => 'pages',
                        'title'     => __('Pages Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-multi-select-pages',
                        'type'      => 'select',
                        'data'      => 'pages',
                        'multi'     => true,
                        'title'     => __('Pages Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-tags',
                        'type'      => 'select',
                        'data'      => 'tags',
                        'title'     => __('Tags Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-multi-select-tags',
                        'type'      => 'select',
                        'data'      => 'tags',
                        'multi'     => true,
                        'title'     => __('Tags Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-menus',
                        'type'      => 'select',
                        'data'      => 'menus',
                        'title'     => __('Menus Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-multi-select-menus',
                        'type'      => 'select',
                        'data'      => 'menu',
                        'multi'     => true,
                        'title'     => __('Menus Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-post-type',
                        'type'      => 'select',
                        'data'      => 'post_type',
                        'title'     => __('Post Type Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-multi-select-post-type',
                        'type'      => 'select',
                        'data'      => 'post_type',
                        'multi'     => true,
                        'title'     => __('Post Type Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-multi-select-sortable',
                        'type'      => 'select',
                        'data'      => 'post_type',
                        'multi'     => true,
                        'sortable'  => true,
                        'title'     => __('Post Type Multi Select Option + Sortable', 'redux-framework-demo'),
                        'subtitle'  => __('This field also has sortable enabled!', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-posts',
                        'type'      => 'select',
                        'data'      => 'post',
                        'title'     => __('Posts Select Option2', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-multi-select-posts',
                        'type'      => 'select',
                        'data'      => 'post',
                        'multi'     => true,
                        'title'     => __('Posts Multi Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-roles',
                        'type'      => 'select',
                        'data'      => 'roles',
                        'title'     => __('User Role Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-capabilities',
                        'type'      => 'select',
                        'data'      => 'capabilities',
                        'multi'     => true,
                        'title'     => __('Capabilities Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-select-elusive',
                        'type'      => 'select',
                        'data'      => 'elusive-icons',
                        'title'     => __('Elusive Icons Select Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('Here\'s a list of all the elusive icons by name and icon.', 'redux-framework-demo'),
                    ),
                )
            );

            $theme_info  = '<div class="redux-framework-section-desc">';
            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', 'redux-framework-demo') . '<a href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __('<strong>Author:</strong> ', 'redux-framework-demo') . $this->theme->get('Author') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __('<strong>Version:</strong> ', 'redux-framework-demo') . $this->theme->get('Version') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';
            $tabs = $this->theme->get('Tags');
            if (!empty($tabs)) {
                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', 'redux-framework-demo') . implode(', ', $tabs) . '</p>';
            }
            $theme_info .= '</div>';

            if (file_exists(dirname(__FILE__) . '/../README.md')) {
                $this->sections['theme_docs'] = array(
                    'icon'      => 'el-icon-list-alt',
                    'title'     => __('Documentation', 'redux-framework-demo'),
                    'fields'    => array(
                        array(
                            'id'        => '17',
                            'type'      => 'raw',
                            'markdown'  => true,
                            'content'   => file_get_contents(dirname(__FILE__) . '/../README.md')
                        ),
                    ),
                );
            }




















































            if (file_exists(dirname(__FILE__) . '/../README.md')) {
                $this->sections['theme_docs'] = array(
                    'icon'      => 'el-icon-list-alt',
                    'title'     => __('Documentation', 'redux-framework-demo'),
                    'fields'    => array(
                        array(
                            'id'        => '17',
                            'type'      => 'raw',
                            'markdown'  => true,
                            'content'   => file_get_contents(dirname(__FILE__) . '/../README.md')
                        ),
                    ),
                );
            }



            // You can append a new section at any time.
            $this->sections[] = array(
                'icon'      => 'el-icon-eye-open',
                'title'     => __('Additional Fields', 'redux-framework-demo'),
                'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
                'fields'    => array(
                    array(
                        'id'        => 'opt-datepicker',
                        'type'      => 'date',
                        'title'     => __('Date Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo')
                    ),
                    array(
                        'id'    => 'opt-divide',
                        'type'  => 'divide'
                    ),
                    array(
                        'id'        => 'opt-button-set',
                        'type'      => 'button_set',
                        'title'     => __('Button Set Option', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),

                        //Must provide key => value pairs for radio options
                        'options'   => array(
                            '1' => 'Opt 1',
                            '2' => 'Opt 2',
                            '3' => 'Opt 3'
                        ),
                        'default'   => '2'
                    ),
                    array(
                        'id'        => 'opt-button-set-multi',
                        'type'      => 'button_set',
                        'title'     => __('Button Set, Multi Select', 'redux-framework-demo'),
                        'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
                        'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                        'multi'     => true,

                        //Must provide key => value pairs for radio options
                        'options'   => array(
                            '1' => 'Opt 1',
                            '2' => 'Opt 2',
                            '3' => 'Opt 3'
                        ),
                        'default'   => array('2', '3')
                    ),
                    array(
                        'id'        => 'opt-info-field',
                        'type'      => 'info',
                        'required'  => array('18', 'equals', array('1', '2')),
                        'desc'      => __('This is the info field, if you want to break sections up.', 'redux-framework-demo')
                    ),
                    array(
                        'id'    => 'opt-info-warning',
                        'type'  => 'info',
                        'style' => 'warning',
                        'title' => __('This is a title.', 'redux-framework-demo'),
                        'desc'  => __('This is an info field with the warning style applied and a header.', 'redux-framework-demo')
                    ),
                    array(
                        'id'    => 'opt-info-success',
                        'type'  => 'info',
                        'style' => 'success',
                        'icon'  => 'el-icon-info-sign',
                        'title' => __('This is a title.', 'redux-framework-demo'),
                        'desc'  => __('This is an info field with the success style applied, a header and an icon.', 'redux-framework-demo')
                    ),
                    array(
                        'id'    => 'opt-info-critical',
                        'type'  => 'info',
                        'style' => 'critical',
                        'icon'  => 'el-icon-info-sign',
                        'title' => __('This is a title.', 'redux-framework-demo'),
                        'desc'  => __('This is an info field with the critical style applied, a header and an icon.', 'redux-framework-demo')
                    ),
                    array(
                        'id'        => 'opt-raw_info',
                        'type'      => 'info',
                        'required'  => array('18', 'equals', array('1', '2')),
                        'raw_html'  => true,
                        'desc'      => $sampleHTML,
                    ),
                    array(
                        'id'        => 'opt-info-normal',
                        'type'      => 'info',
                        'notice'    => true,
                        'title'     => __('This is a title.', 'redux-framework-demo'),
                        'desc'      => __('This is an info notice field with the normal style applied, a header and an icon.', 'redux-framework-demo')
                    ),
                    array(
                        'id'        => 'opt-notice-info',
                        'type'      => 'info',
                        'notice'    => true,
                        'style'     => 'info',
                        'title'     => __('This is a title.', 'redux-framework-demo'),
                        'desc'      => __('This is an info notice field with the info style applied, a header and an icon.', 'redux-framework-demo')
                    ),
                    array(
                        'id'        => 'opt-notice-warning',
                        'type'      => 'info',
                        'notice'    => true,
                        'style'     => 'warning',
                        'icon'      => 'el-icon-info-sign',
                        'title'     => __('This is a title.', 'redux-framework-demo'),
                        'desc'      => __('This is an info notice field with the warning style applied, a header and an icon.', 'redux-framework-demo')
                    ),
                    array(
                        'id'        => 'opt-notice-success',
                        'type'      => 'info',
                        'notice'    => true,
                        'style'     => 'success',
                        'icon'      => 'el-icon-info-sign',
                        'title'     => __('This is a title.', 'redux-framework-demo'),
                        'desc'      => __('This is an info notice field with the success style applied, a header and an icon.', 'redux-framework-demo')
                    ),
                    array(
                        'id'        => 'opt-notice-critical',
                        'type'      => 'info',
                        'notice'    => true,
                        'style'     => 'critical',
                        'icon'      => 'el-icon-info-sign',
                        'title'     => __('This is a title.', 'redux-framework-demo'),
                        'desc'      => __('This is an notice field with the critical style applied, a header and an icon.', 'redux-framework-demo')
                    ),
                    array(
                        'id'        => 'opt-custom-callback',
                        'type'      => 'callback',
                        'title'     => __('Custom Field Callback', 'redux-framework-demo'),
                        'subtitle'  => __('This is a completely unique field type', 'redux-framework-demo'),
                        'desc'      => __('This is created with a callback function, so anything goes in this field. Make sure to define the function though.', 'redux-framework-demo'),
                        'callback'  => 'redux_my_custom_field'
                    ),
                )
            );





            $this->sections[] = array(
                'title'     => __('Import / Export', 'redux-framework-demo'),
                'desc'      => __('Import and Export your Redux Framework settings from file, text or URL.', 'redux-framework-demo'),
                'icon'      => 'el-icon-refresh',
                'fields'    => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'title'         => 'Import Export',
                        'subtitle'      => 'Save and restore your Redux options',
                        'full_width'    => false,
                    ),
                ),
            );

            $this->sections[] = array(
                'type' => 'divide',
            );


            $this->sections[] = array(
                'icon'      => 'el-icon-info-sign',
                'title'     => __('Theme Information', 'redux-framework-demo'),
                'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
                'fields'    => array(
                    array(
                        'id'        => 'opt-raw-info',
                        'type'      => 'raw',
                        'content'   => $item_info,
                    )
                ),
            );


            if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon'      => 'el-icon-book',
                    'title'     => __('Documentation', 'redux-framework-demo'),
                    'content'   => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
                );
            }
        }





        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Information 1', 'redux-framework-demo'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => __('Theme Information 2', 'redux-framework-demo'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo');
        }

        /**

        All the possible arguments for Redux.
        For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                'opt_name' => 'theme_options',
                'display_name' => 'Design Settings',
                'display_version' => '1.0',
                'page_slug' => 'design_settings',
                'page_title' => 'Design Settings',
                'dev_mode' => '1',
                'update_notice' => '1',
                'intro_text' => '<p>This text is displayed above the options panel. It isn\\’t required, but more info is always better! The intro_text field accepts all HTML.</p>’',
                'footer_text' => '<p>This text is displayed below the options panel. It isn\\’t required, but more info is always better! The footer_text field accepts all HTML.</p>',
                'admin_bar' => true,
                'menu_type' => 'menu',
                'menu_title' => 'Design Settings',
                'menu_icon' => 'dashicons-schedule',
                'allow_sub_menu' => true,
                'page_parent_post_type' => 'your_post_type',
                'page_priority' => '58',
                'customizer' => '1',
                'default_show' => '1',
                'default_mark' => ' *',
                'google_api_key' => 'NO_API_USED',
                'class' => 'design-settings',
                'hints' =>
                    array(
                        'icon' => 'el-icon-question-sign',
                        'icon_position' => 'right',
                        'icon_color' => '#0074a2',
                        'icon_size' => 'normal',
                        'tip_style' =>
                            array(
                                'color' => 'blue',
                                'shadow' => '1',
                                'rounded' => '1',
                                'style' => 'cluetip',
                            ),
                        'tip_position' =>
                            array(
                                'my' => 'top left',
                                'at' => 'top right',
                            ),
                        'tip_effect' =>
                            array(
                                'show' =>
                                    array(
                                        'effect' => 'fade',
                                        'duration' => '500',
                                        'event' => 'click',
                                    ),
                                'hide' =>
                                    array(
                                        'effect' => 'fade',
                                        'duration' => '500',
                                        'event' => 'unfocus click',
                                    ),
                            ),
                    ),
                'output' => true,
                'output_tag' => true,
                'compiler' => true,
                'global_variable' => 'dsettings',
                'page_icon' => 'icon-themes',
                'page_permissions' => 'manage_options',
                'save_defaults' => '1',
                'show_import_export' => '1',
                'transient_time' => '3600',
                'network_sites' => '1',
                'system_info' => '1',
            );

            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
                'title' => 'Visit us on GitHub',
                'icon'  => 'el-icon-github'
                //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://twitter.com/reduxframework',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://www.linkedin.com/company/redux-framework',
                'title' => 'Find us on LinkedIn',
                'icon'  => 'el-icon-linkedin'
            );

        }

    }

    global $reduxConfig;
    $reduxConfig = new admin_folder_Redux_Framework_config();
}

/**
Custom function for the callback referenced above
 */
if (!function_exists('admin_folder_my_custom_field')):
    function admin_folder_my_custom_field($field, $value) {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
endif;

/**
Custom function for the callback validation referenced above
 * */
if (!function_exists('admin_folder_validate_callback_function')):
    function admin_folder_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';

        /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }
endif;
