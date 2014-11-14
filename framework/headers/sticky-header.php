<?php global $theme_options,$woocommerce,$main_menu; ?>
<?php
$c_pageID = get_queried_object_id();
$header_sticky_bg_color_hex = aione_hex2rgb($theme_options['header_sticky_bg_color']);
$header_normal_bg_color_hex = aione_hex2rgb($theme_options['header_sticky_bg_color']);
$header_normal_bg_color = $header_sticky_bg_color_hex[0] . ',' . $header_sticky_bg_color_hex[1] . ',' . $header_sticky_bg_color_hex[2] . ',' . $theme_options['header_sticky_opacity'];
if( ( ($theme_options['header_transparent'] && get_post_meta($c_pageID, 'pyre_transparent_header', true) != 'no') ||
		  ( ! $theme_options['header_transparent'] && get_post_meta($c_pageID, 'pyre_transparent_header', true) == 'yes') ) && ! is_404() && ! is_author() && ! is_archive() ) {
	$header_normal_bg_color = 'none'; 
}
?>

<?php if( $theme_options['header_sticky'] ): ?>
<header id="header-sticky" class="sticky-header">
<div class="sticky-shadow">
	<div class="aione-row">
		<div class="logo">
            <a href="<?php bloginfo('url'); ?>">
                <img src="<?php echo $theme_options['logo']['url']; ?>" alt="<?php bloginfo('name'); ?>" data-max-width="<?php echo $theme_options["header_sticky_logo_max_width"]; ?>" class="normal_logo" />
                <?php if($theme_options['logo_retina'] && $theme_options['retina_logo_width'] && $theme_options['retina_logo_height']): ?>
                    <?php
                    $pixels ="";
                    if(is_numeric($theme_options['retina_logo_width']) && is_numeric($theme_options['retina_logo_height'])):
                        $pixels ="px";
                    endif; ?>
                    <img src="<?php echo $theme_options["logo_retina"]['url']; ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo $theme_options["retina_logo_width"].$pixels; ?>;height:<?php echo $theme_options["retina_logo_height"].$pixels; ?>;" data-max-width="<?php echo $theme_options["header_sticky_logo_max_width"]; ?>" class="retina_logo" />
                <?php endif; ?>
            </a>

		</div>
		<nav id="sticky-nav" class="nav-holder">
		<ul class="navigation menu aione-navbar-nav">
			<?php
			if ( has_nav_menu( 'sticky_navigation' ) ) {
				if(! $theme_options['disable_megamenu']) {
					wp_nav_menu(array(
						'theme_location'	=> 'sticky_navigation',
						'depth'				=> 5,
						'container' 		=> false,
						'menu_id' 			=> 'nav',
						'items_wrap' 		=> '%3$s',
						'menu_class'		=> 'nav aione-navbar-nav',
						'fallback_cb'	   => 'AioneCoreFrontendWalker::fallback',
						'walker'			=> new AioneCoreFrontendWalker()
					));
				} else {
					wp_nav_menu(array('theme_location' => 'sticky_navigation', 'depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s'));
				}
			} else {
				echo $main_menu;
			} ?>
			<?php if(class_exists('Woocommerce')): ?>
			<?php if($theme_options['woocommerce_acc_link_main_nav']): ?>
			<li class="my-account">
				<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="my-account-link"><?php _e('My Account', 'Aione'); ?></a>
				<?php if(!is_user_logged_in()): ?>
				<div class="login-box">
					<form action="<?php echo wp_login_url(); ?>" name="loginform" method="post">
						<p>
							<input type="text" class="input-text" name="log" id="username" value="" placeholder="<?php echo __('Username', 'Aione'); ?>" />
						</p>
						<p>
							<input type="password" class="input-text" name="pwd" id="pasword" value="" placeholder="<?php echo __('Password', 'Aione'); ?>" />
						</p>
						<p class="forgetmenot">
							<label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> <?php _e('Remember Me', 'Aione'); ?></label>
						</p>
							<p class="submit">
							<input type="submit" name="wp-submit" id="wp-submit" class="button small default comment-submit" value="<?php _e('Log In', 'Aione'); ?>">
							<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
							<input type="hidden" name="testcookie" value="1">
						</p>
						<div class="clear"></div>
					</form>
				</div>
				<?php else: ?>
				<ul class="sub-menu">
					<li><a href="<?php echo get_permalink(get_option('woocommerce_logout_page_id')); ?>"><?php _e('Logout', 'Aione'); ?></a></li>
				</ul>
				<?php endif; ?>
			</li>
			<?php endif; ?>
			<?php if($theme_options['woocommerce_cart_link_main_nav']): ?>
			<li class="cart">
				<?php if(!$woocommerce->cart->cart_contents_count): ?>
				<a class="my-cart-link" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"></a>
				<?php else: ?>
				<a class="my-cart-link my-cart-link-active" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"></a>
				<div class="cart-contents">
					<?php foreach($woocommerce->cart->cart_contents as $cart_item): //var_dump($cart_item); ?>
					<div class="cart-content">
						<a href="<?php echo get_permalink($cart_item['product_id']); ?>">
						<?php echo get_the_post_thumbnail($cart_item['product_id'], 'recent-works-thumbnail'); ?>
						<div class="cart-desc">
							<span class="cart-title"><?php echo $cart_item['data']->post->post_title; ?></span>
							<span class="product-quantity"><?php echo $cart_item['quantity']; ?> x <?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], 1); ?></span>
						</div>
						</a>
					</div>
					<?php endforeach; ?>
					<div class="cart-checkout">
						<div class="cart-link"><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'Aione'); ?></a></div>
						<div class="checkout-link"><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>"><?php _e('Checkout', 'Aione'); ?></a></div>
					</div>
				</div>
				<?php endif; ?>
			</li>
			<?php endif; ?>
			<?php endif; ?>
			<?php if($theme_options['main_nav_search_icon']): ?>
			<li class="main-nav-search">
				<a id="sticky-nav-search-link" class="search-link"></a>
				<div id="sticky-nav-search-form" class="main-nav-search-form">
					<form role="search" id="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
						<div class="search-table">
							<div class="search-field">
								<input type="text" value="" name="s" id="s" />
							</div>
							<div class="search-button">
								<input type="submit" id="searchsubmit" value="&#xf002;" />
							</div>
						</div>
					</form>
				</div>
			</li>
			<?php endif; ?>
		</ul>
		</nav>
		<?php if(tf_checkIfMenuIsSetByLocation('main_navigation') || tf_checkIfMenuIsSetByLocation('sticky_navigation')): ?>
		<div class="mobile-nav-holder"></div>
		<?php endif; ?>
	</div>
	</div>
</header>
<?php endif; ?>