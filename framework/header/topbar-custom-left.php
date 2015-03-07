<?php
global $theme_options;
if($theme_options['topbar_custom_left']):
    echo '<div id="topbar-custom-left" class="topbar-item">'.do_shortcode($theme_options['topbar_custom_left']).'</div>';
endif; ?>
