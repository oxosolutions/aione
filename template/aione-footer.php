<?php 
$count=0; 
if ( is_active_sidebar( 'footer-column' ) ) {
	$count++;
} 
if ( is_active_sidebar( 'footer-column-2' ) ) {
	$count++;
} 
if ( is_active_sidebar( 'footer-column-3' ) ) {
	$count++;
} 
if ( is_active_sidebar( 'footer-column-4' ) ) {
	$count++;
} 
if($count > 0):
	$col = 100/$count;
	$col=round($col);
	?>
	<footer id="aione_footer" class="aione-footer">
		<div class="wrapper ar">
			<?php if ( is_active_sidebar( 'footer-column' ) ) : ?>
				<div class="ac s100 l<?php echo $col ?> ">
					<?php dynamic_sidebar( 'footer-column' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-column-2' ) ) : ?>
				<div class="ac s100 l<?php echo $col ?> ">		
					<?php dynamic_sidebar( 'footer-column-2' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-column-3' ) ) : ?>
				<div class="ac s100 l<?php echo $col ?> ">
					<?php dynamic_sidebar( 'footer-column-3' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-column-4' ) ) : ?>
				<div class="ac s100 l<?php echo $col ?> ">
					<?php dynamic_sidebar( 'footer-column-4' ); ?>
				</div>
			<?php endif; ?>
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</footer><!-- .aione-footer -->
<?php endif;