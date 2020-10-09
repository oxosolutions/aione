<?php 
global $theme_options; 
global $post;

$draw = false;
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

if( $count > 0 ) :
	$col = 100/$count;
	$col=round( $col );
	//$pyre_footer_widgets = get_aione_page_option( $post->ID,'pyre_footer_widgets' );
	$pyre_footer_widgets = get_aione_page_settings( $post->ID,'aione_per_page_setting','pyre_footer_widgets' );
	$draw = $pyre_footer_widgets == 'yes' ? true 
	: ( $pyre_footer_widgets == 'no' ? false 
		: (( $theme_options['footer_widgets'] == 1 )
			? true
			: false
		)
	);
	
	if( $draw == true ) :
		?>
		<footer id="aione_footer" class="aione-footer <?php echo esc_html( is_fullwidth( $post->ID, 'footer' ) ); ?>">
			<div class="wrapper ar">
				<?php if ( is_active_sidebar( 'footer-column' ) ) : ?>
					<div class="ac s100 l<?php echo esc_html( $col ) ?> ">
						<?php dynamic_sidebar( 'footer-column' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-column-2' ) ) : ?>
					<div class="ac s100 l<?php echo esc_html( $col ) ?> ">		
						<?php dynamic_sidebar( 'footer-column-2' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-column-3' ) ) : ?>
					<div class="ac s100 l<?php echo esc_html( $col ) ?> ">
						<?php dynamic_sidebar( 'footer-column-3' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-column-4' ) ) : ?>
					<div class="ac s100 l<?php echo esc_html( $col ) ?> ">
						<?php dynamic_sidebar( 'footer-column-4' ); ?>
					</div>
				<?php endif; ?>
				<div class="clear"></div><!-- .clear -->
			</div><!-- .wrapper -->
		</footer><!-- .aione-footer -->
		<?php 
	endif;
endif;
