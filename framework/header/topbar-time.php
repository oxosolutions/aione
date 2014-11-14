<?php
$time_format = get_option('time_format');
$time = current_time( $time_format, $gmt=0 );
echo '<div id="topbar-time" class="topbar-item">'.$time.'</div>';
?>