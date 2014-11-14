<?php
global $theme_options;
if($theme_options['topbar_email']):
    echo '<div id="topbar-email" class="topbar-item"><a href="mailto:'.$theme_options['topbar_email'].'">'.$theme_options['topbar_email'].'</a></div>';
endif;
?>