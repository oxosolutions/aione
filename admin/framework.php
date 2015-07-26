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
              Used within different fields.
             * */

            function getImageFiles($directory, $thumbnail = false){
                // Background Images Reader
                $thumbnail_directory = '';
                if($thumbnail){ $thumbnail_directory = 'tmb/'; }
                $backgrounds_path = get_template_directory(). '/images/'.$directory.'/'.$thumbnail_directory;
                $backgrounds_url = get_template_directory_uri(). '/images/'.$directory.'/'.$thumbnail_directory;

                if (is_dir($backgrounds_path)) :
                    if ($backgrounds_dir = opendir($backgrounds_path)) :
                        $backgrounds = array();
                        while (( $backgrounds_file = readdir($backgrounds_dir) ) !== false) {
                            if (stristr($backgrounds_file, '.png') !== false || stristr($backgrounds_file, '.jpg') !== false) {
                                $name = explode('.', $backgrounds_file);
                                $name = str_replace('.' . end($name), '', $backgrounds_file);
                                $backgrounds[]  = array('alt' => $name, 'img' => $backgrounds_url . $backgrounds_file);
                            }
                        }
                    endif;
                endif;
                return $backgrounds;
            }


            /**
            Used to generate color presets.
            **/
            function getColorPresets($primary_color, $secondry_color){
                //$preset = array();
                $preset = array(
                    'background_topbar_color'   =>  $primary_color,
                    'topbar_text_color'   =>  $primary_color,
                    'topbar_link_color'   =>  $secondry_color,
                    //'background_topbar_color'   =>  '#dd3333',
                    //'background_topbar_color'   =>  '#dd3333',
                );
                return $preset;
            }


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

            require_once(dirname(__FILE__). '/options/general.php');
            require_once(dirname(__FILE__). '/options/header.php');
            require_once(dirname(__FILE__). '/options/page.php');
            require_once(dirname(__FILE__). '/options/footer.php');
            require_once(dirname(__FILE__). '/options/typography.php');
            require_once(dirname(__FILE__). '/options/color.php');
            require_once(dirname(__FILE__). '/options/backgrounds.php');
            require_once(dirname(__FILE__). '/options/blog.php');
            require_once(dirname(__FILE__). '/options/layout.php');
            require_once(dirname(__FILE__). '/options/security.php');
            require_once(dirname(__FILE__). '/options/seo.php');
            require_once(dirname(__FILE__). '/options/social.php');

            require_once(dirname(__FILE__). '/options/options.php');



			

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
                'title'     => __('Purchase', 'redux-framework-demo'),
                'desc'      => __('Enter your licence kay for auto updates', 'redux-framework-demo'),
                'icon'      => 'el-icon-refresh',
                'fields'    => array(
                    array(
                        'id'=>'edd',
                        'type' => 'edd',
                        'title' => __('Your License Key', 'redux-framework-demo'),
                        'subtitle' => __('Please enter a valid key.', 'redux-framework-demo'),
                    ),
                ),
            );


                    
            $this->sections[] = array(
                'type' => 'divide',
            );

            /*


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
            */
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
                'display_version' => $this->theme->get('Version'),
                'ajax_save' => true,
                'page_slug' => 'design_settings',
                'page_title' => 'Design Settings',
                'dev_mode' => false,
                'update_notice' => '0',
                //'intro_text' => '<p>This text is displayed above the options panel. It isn\\’t required, but more info is always better! The intro_text field accepts all HTML.</p>’',
                'footer_text' => '<style>span.default-mark{ display:inline !important;padding-left:5px;color:#D8D8D8 !important;}</style>',
                'admin_bar' => true,
                'menu_type' => 'menu',
                'menu_title' => 'Design Settings',
                'menu_icon' => 'dashicons-schedule',
                'admin_bar_icon' => 'dashicons-schedule',
                'allow_sub_menu' => true,
                'page_parent_post_type' => 'your_post_type',
                'page_priority' => '58',
                'customizer' => '1',
                'default_show' => '1',
                'default_mark' => '<span class="default-mark"><i class="el-icon-ok-sign"></i></span>',
                'google_api_key' => 'NO_API_USED',
                'class' => 'design-settings',
                'footer_credit'     => get_option( 'admin_footer_text', '<hr /><div style="width: 50%; float: left;">©2014 All Rights reserved. Darlic™ is a registered trademark of <a href="http://oxosolutions.com/" target="_blank">OXO Solutions</a>.</div>
<div style="width: 50%; float: left; text-align: right;"><a href="http://darlic.com/terms-and-conditions/" target="_blank">Terms &amp; Conditions</a> • <a href="http://darlic.com/privacy-policy/" target="_blank">Privacy Policy</a> • Version '.$this->theme->get('Version').'</div>'),
                'hints' =>
                    /*
                     *
                     array(
                        'icon'              => 'icon-question-sign',
                        'icon_position'     => 'right',
                        'icon_color'        => 'lightgray',
                        'icon_size'         => 'normal',

                        'tip_style'         => array(
                            'color'     => 'light',
                            'shadow'    => true,
                            'rounded'   => false,
                            'style'     => '',
                        ),
                        'tip_position'      => array(
                            'my' => 'top left',
                            'at' => 'bottom left',
                        ),
                        'tip_effect' => array(
                            'show' => array(
                                'effect'    => 'slide',
                                'duration'  => '500',
                                'event'     => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'    => 'slide',
                                'duration'  => '500',
                                'event'     => 'click mouseleave',
                            ),
                        ),
                    ),
                    */

                array(
                  'icon' => 'icon-question-sign',
                  'icon_position' => 'right',
                  'icon_color' => '#0074a2',
                  'icon_size' => 'normal',
                  'tip_style' => 
                  array(
                    'color' => 'light',
                    'shadow' => '1',
                    'rounded' => '1',
                    'style' => 'bootstrap',
                  ),
                  'tip_position' => 
                  array(
                    'my' => 'left bottom',
                    'at' => 'right top',
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
                'global_variable' => 'theme_options',
                'page_icon' => 'icon-themes',
                'page_permissions' => 'manage_options',
                'save_defaults' => '1',
                'show_import_export' => '1',
                'transient_time' => '3600',
                'network_sites' => '1',
                'system_info' => '0',
              );

            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/DarlicWeb',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://twitter.com/darlicweb',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
            /*$this->args['share_icons'][] = array(
                'url'   => 'http://www.linkedin.com/',
                'title' => 'Find us on LinkedIn',
                'icon'  => 'el-icon-linkedin'
            );
            */
            $this->args['edd'] = array(
                'mode'            => 'template', // template|plugin
                'path'            => '', // Path to the plugin/template main file
                'remote_api_url'  => 'http://oxosolutions.com/api.org',    // our store URL that is running EDD
                'version'         => "4.3.6",  // current version number
                'item_name'       => "Aione",      // name of this theme
                'author'          => "OXO Solutions",    // author of this theme
                'field_id'        => "edd", // ID of the field used by EDD
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
