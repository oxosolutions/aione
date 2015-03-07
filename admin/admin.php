<?php


// Load the TGM init if it exists
if (file_exists(dirname(__FILE__).'/tgm/tgm-init.php')) {
    require_once( dirname(__FILE__).'/tgm/tgm-init.php' );
}

// Load Redux extensions - MUST be loaded before your options are set
if (file_exists(dirname(__FILE__).'/loader.php')) {
    require_once( dirname(__FILE__).'/loader.php' );
}

// Load the embedded Redux Framework
if (file_exists(dirname(__FILE__).'/framework/ReduxCore/framework.php')) {
    require_once( dirname(__FILE__).'/framework/ReduxCore/framework.php' );
}

// Load the theme/plugin options
if (file_exists(dirname(__FILE__).'/framework.php')) {
    require_once( dirname(__FILE__).'/framework.php' );
}



