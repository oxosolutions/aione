<?php $count=0; 
if ( is_active_sidebar( 'footer-column' ) ) : 
	$count++;
endif; 
if ( is_active_sidebar( 'footer-column-2' ) ) : 
	$count++;
endif; 
if ( is_active_sidebar( 'footer-column-3' ) ) : 
	$count++;
endif; 
if ( is_active_sidebar( 'footer-column-4' ) ) : 
	$count++;
endif; 
if($count > 0){
	$col = 100/$count;
}
$col=round($col);
?>


<div id="aione_footer" class="aione-footer">
	<div class="wrapper">
		<div class="ar">
			<?php if ( is_active_sidebar( 'footer-column' ) ) : ?>
				<div class="ac l<?php echo $col ?>">			
					<?php dynamic_sidebar( 'footer-column' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-column-2' ) ) : ?>
				<div class="ac l<?php echo $col ?>">			
					<?php dynamic_sidebar( 'footer-column-2' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-column-3' ) ) : ?>
				<div class="ac l<?php echo $col ?>">			
					<?php dynamic_sidebar( 'footer-column-3' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-column-4' ) ) : ?>
				<div class="ac l<?php echo $col ?>">			
					<?php dynamic_sidebar( 'footer-column-4' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>