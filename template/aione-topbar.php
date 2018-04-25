<?php 
$count=0; 
if ( is_active_sidebar( 'aione-topbar-left' ) ) : 
	$count++;
endif; 
if ( is_active_sidebar( 'aione-topbar-right' ) ) : 
	$count++;
endif;
if($count > 0){
	$aione_topbar_left_class = 'aione-topbar-left';
	$aione_topbar_right_class = 'aione-topbar-right';
	if($count == 1){
		$aione_topbar_left_class = $aione_topbar_right_class = 'aione-topbar-center';
	}
	?>
	<div id="aione_topbar" class="aione-topbar">
		<div class="wrapper">
			<?php 
			if ( is_active_sidebar( 'aione-topbar-left' ) ){
				echo '<div class="'.$aione_topbar_left_class.'">';
					dynamic_sidebar( 'aione-topbar-left' );
				echo '</div>';
			}
			if ( is_active_sidebar( 'aione-topbar-right' ) ){
				echo '<div class="'.$aione_topbar_right_class.'">';
					dynamic_sidebar( 'aione-topbar-right' );
				echo '</div>';
			}
			?>
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-topbar -->
<?php
}