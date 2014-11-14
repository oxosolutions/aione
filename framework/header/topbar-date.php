<?php
$date_format = get_option('date_format');
$date = current_time( $date_format, $gmt=0 );
echo '<div id="topbar-date" class="topbar-item">'.$date.'</div>';
?>