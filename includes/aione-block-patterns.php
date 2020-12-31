<?php

add_action( 'init', 'aione_register_block_pattern_categories' );

function aione_register_block_pattern_categories(){

	if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

		register_block_pattern_category(
			'hero',
			array( 'label' => __( 'Hero', 'aione' ) )
		);

		register_block_pattern_category(
			'gallery',
			array( 'label' => __( 'Gallery', 'aione' ) )
		);

		register_block_pattern_category(
			'features',
			array( 'label' => __( 'Features', 'aione' ) )
		);

		register_block_pattern_category(
			'services',
			array( 'label' => __( 'Services', 'aione' ) )
		);

		register_block_pattern_category(
			'cta',
			array( 'label' => __( 'Call to Action', 'aione' ) )
		);

	}

}


add_action( 'init', 'aione_register_block_patterns' );

function aione_register_block_patterns() {
	register_block_pattern(
		'aione/services-3col-picture',
		array(
			'title'       => __( 'Services with top Picture', 'aione' ),
			'description' => _x( 'Two horizontal buttons, the left button is filled in, and the right button is outlined.', 
				'Block pattern description', 'aione' ),
			'categories'  => array( 'services'),
			'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"cssid":"section_primary_service","className":"section-primary-service bg-blue-grey bg-lighten-5"} -->
			<section class="wp-block-aione-blocks-aione-section aione-section  section-primary-service bg-blue-grey bg-lighten-5" id="section_primary_service"><div class="wrapper"><!-- wp:heading {"textAlign":"center","className":"mb-0"} -->
			<h2 class="has-text-align-center mb-0">Primary Services</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">We are providing wide range of IT services</p>
			<!-- /wp:paragraph -->

			<!-- wp:aione-blocks/aione-row {"className":"aione-boxes style-overlay"} -->
			<div class="wp-block-aione-blocks-aione-row ar aione-boxes style-overlay"><!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"50","className":"mb-30 animate fadeInUp"} -->
			<div class="wp-block-aione-blocks-aione-column ac l33 m50 s100 mb-30 animate fadeInUp"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"bg-white shadow p-10"} -->
			<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  bg-white shadow p-10"><!-- wp:image {"id":7165,"sizeSlug":"full"} -->
			<figure class="wp-block-image size-full"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/10/airport-center-computing-236093-1.jpg" alt="" class="wp-image-7165"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":5,"className":"mb-10"} -->
			<h5 class="has-text-align-center mb-10">Cloud Computing</h5>
			<!-- /wp:heading --></div>
			<!-- /wp:aione-blocks/aione-wrapper --></div></div>
			<!-- /wp:aione-blocks/aione-column -->

			<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"50","className":"mb-30 animate fadeInUp"} -->
			<div class="wp-block-aione-blocks-aione-column ac l33 m50 s100 mb-30 animate fadeInUp"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"bg-white shadow p-10"} -->
			<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  bg-white shadow p-10"><!-- wp:image {"id":7166,"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/10/cellphone-display-electronics-744464.jpg" alt="" class="wp-image-7166"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":5,"className":"mb-10"} -->
			<h5 class="has-text-align-center mb-10">Mobile Application Development</h5>
			<!-- /wp:heading --></div>
			<!-- /wp:aione-blocks/aione-wrapper --></div></div>
			<!-- /wp:aione-blocks/aione-column -->

			<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"50","className":"mb-30 animate fadeInUp"} -->
			<div class="wp-block-aione-blocks-aione-column ac l33 m50 s100 mb-30 animate fadeInUp"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"bg-white shadow p-10"} -->
			<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  bg-white shadow p-10"><!-- wp:image {"id":7167,"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/10/erp-mobile-600x400-1.jpg" alt="" class="wp-image-7167"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":5,"className":"mb-10"} -->
			<h5 class="has-text-align-center mb-10">Enterprise Resource Planning</h5>
			<!-- /wp:heading --></div>
			<!-- /wp:aione-blocks/aione-wrapper --></div></div>
			<!-- /wp:aione-blocks/aione-column -->

			<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"50","className":"mb-30 animate fadeInUp"} -->
			<div class="wp-block-aione-blocks-aione-column ac l33 m50 s100 mb-30 animate fadeInUp"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"bg-white shadow p-10"} -->
			<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  bg-white shadow p-10"><!-- wp:image {"id":7164,"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/10/adult-businessman-chair-845451.jpg" alt="" class="wp-image-7164"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":5,"className":"mb-10"} -->
			<h5 class="has-text-align-center mb-10">Workforce as a Service</h5>
			<!-- /wp:heading --></div>
			<!-- /wp:aione-blocks/aione-wrapper --></div></div>
			<!-- /wp:aione-blocks/aione-column -->

			<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"50","className":"mb-30 animate fadeInUp"} -->
			<div class="wp-block-aione-blocks-aione-column ac l33 m50 s100 mb-30 animate fadeInUp"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"bg-white shadow p-10"} -->
			<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  bg-white shadow p-10"><!-- wp:image {"id":7163,"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/10/adult-blond-blur-1509426.jpg" alt="" class="wp-image-7163"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":5,"className":"mb-10"} -->
			<h5 class="has-text-align-center mb-10">Human Resource Management </h5>
			<!-- /wp:heading --></div>
			<!-- /wp:aione-blocks/aione-wrapper --></div></div>
			<!-- /wp:aione-blocks/aione-column -->

			<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"50","className":"mb-30 animate fadeInUp"} -->
			<div class="wp-block-aione-blocks-aione-column ac l33 m50 s100 mb-30 animate fadeInUp"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"bg-white shadow p-10"} -->
			<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  bg-white shadow p-10"><!-- wp:image {"id":7162,"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/10/5-1.jpg" alt="" class="wp-image-7162"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":5,"className":"mb-10"} -->
			<h5 class="has-text-align-center mb-10">Data Analytics</h5>
			<!-- /wp:heading --></div>
			<!-- /wp:aione-blocks/aione-wrapper --></div></div>
			<!-- /wp:aione-blocks/aione-column -->

			<!-- wp:paragraph -->
			<p></p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:aione-blocks/aione-row --></div></section>
			<!-- /wp:aione-blocks/aione-section -->',
		)
);
register_block_pattern(
	'aione/services-3col-with-right-picture',
	array(
		'title'       => __( 'Services 3 columns with right Picture', 'aione' ),
		'description' => _x( 'Services 3 columns with right Picture', 'aione' ),
		'categories'  => array( 'services'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 ph-20 bg-grey bg-lighten-4"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 ph-20 bg-grey bg-lighten-4"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:heading {"className":"font-weight-300 mb-5 blue-grey darken-4"} -->
		<h2 class="font-weight-300 mb-5 blue-grey darken-4"> Easy &amp; Perfect Solution for You </h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-25 blue-grey darken-4"} -->
		<p class="font-size-25 blue-grey darken-4">Vivamus viverra vulputate justo a lacinia. Cras sit amet ante felis</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"65"} -->
		<div class="wp-block-aione-blocks-aione-column ac l65 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"mb-40 mt-40"} -->
		<div class="wp-block-aione-blocks-aione-row ar mb-40 mt-40"><!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-row ar mb-20"><!-- wp:aione-blocks/aione-column {"largeScreen":"25"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100"><div class="wrapper"><!-- wp:image {"id":683,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2018/09/sitting.png" alt="" class="wp-image-683"/></figure>
		<!-- /wp:image -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"75"} -->
		<div class="wp-block-aione-blocks-aione-column ac l75 m100 s100"><div class="wrapper"><!-- wp:heading {"level":5,"className":"m-0 blue-grey darken-4"} -->
		<h5 class="m-0 blue-grey darken-4">Technical Simulations</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"m-0 font-size-15 blue-grey darken-4 aione-align-justify"} -->
		<p class="m-0 font-size-15 blue-grey darken-4 aione-align-justify">Phasellus in suscipit quam. Vivamus viverra vulputate justo a lacinia.</p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"25"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100"><div class="wrapper"><!-- wp:image {"id":684,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2018/09/s-search.png" alt="" class="wp-image-684"/></figure>
		<!-- /wp:image --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"75"} -->
		<div class="wp-block-aione-blocks-aione-column ac l75 m100 s100"><div class="wrapper"><!-- wp:heading {"level":5,"className":"m-0 blue-grey darken-4"} -->
		<h5 class="m-0 blue-grey darken-4">Strategy Search</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"m-0 font-size-15 blue-grey darken-4 aione-align-justify"} -->
		<p class="m-0 font-size-15 blue-grey darken-4 aione-align-justify">Phasellus in suscipit quam. Vivamus viverra vulputate justo a lacinia.</p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-row ar mb-20"><!-- wp:aione-blocks/aione-column {"largeScreen":"25"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100"><div class="wrapper"><!-- wp:image {"id":682,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2018/09/seo.png" alt="" class="wp-image-682"/></figure>
		<!-- /wp:image -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"75"} -->
		<div class="wp-block-aione-blocks-aione-column ac l75 m100 s100"><div class="wrapper"><!-- wp:heading {"level":5,"className":"m-0 blue-grey darken-4"} -->
		<h5 class="m-0 blue-grey darken-4">Paid Content Search</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"m-0 font-size-15 blue-grey darken-4 aione-align-justify"} -->
		<p class="m-0 font-size-15 blue-grey darken-4 aione-align-justify">Phasellus in suscipit quam. Vivamus viverra vulputate justo a lacinia.</p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"25"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100"><div class="wrapper"><!-- wp:image {"id":681,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2018/09/search.png" alt="" class="wp-image-681"/></figure>
		<!-- /wp:image --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"75"} -->
		<div class="wp-block-aione-blocks-aione-column ac l75 m100 s100"><div class="wrapper"><!-- wp:heading {"level":5,"className":"m-0 blue-grey darken-4"} -->
		<h5 class="m-0 blue-grey darken-4">Building Content</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"m-0 font-size-15 blue-grey darken-4 aione-align-justify"} -->
		<p class="m-0 font-size-15 blue-grey darken-4 aione-align-justify">Phasellus in suscipit quam. Vivamus viverra vulputate justo a lacinia.</p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"35"} -->
		<div class="wp-block-aione-blocks-aione-column ac l35 m100 s100"><div class="wrapper"><!-- wp:image {"id":679,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2018/09/easy-img.png" alt="" class="wp-image-679"/></figure>
		<!-- /wp:image --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/features-2col',
	array(
		'title'       => __( 'Features displayed in 2 columns', 'aione'),
		'description' => _x( 'Features displayed in 2 columns with title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row {"className":"cards"} -->
		<div class="wp-block-aione-blocks-aione-row ar cards"><!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-10p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-10p"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-10p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-10p"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suit your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-10p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-10p"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one’s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-10p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-10p"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/features-3col',
	array(
		'title'       => __( 'Features displayed in 3 columns', 'aione'),
		'description' => _x( 'Features displayed in 3 columns with title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 bg-grey bg-lighten-4 ph-20"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 bg-grey bg-lighten-4 ph-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row {"className":"align-center cards"} -->
		<div class="wp-block-aione-blocks-aione-row ar align-center cards"><!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suit your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one’s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Secure</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>This is a critical aspect that is incorporated to create a system where data is not compromised and thus saves the user from further financial penalities. We continuously monitor and improve the product security practice in an effective way.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Robust</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The product proves to be an asset as it creates a defence against internal and external, malicious and accidental threats. We understand the potential variations and accordingly taken steps to achieve the robust design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/features-4col',
	array(
		'title'       => __( 'Features displayed in 4 columns', 'aione'),
		'description' => _x( 'Features displayed in 4 columns with title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 ph-20"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 ph-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-row ar align-center"><!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suit your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per the taste of individual, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Secure</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>This is a critical aspect that is incorporated to create a system where data is not compromised and thus saves the user from further financial penalities. We continuously monitor and improve the product security practice in an effective way.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Robust</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The product proves to be an asset as it creates a defence against internal and external, malicious and accidental threats. We understand the potential variations and accordingly taken steps to achieve the robust design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Innovative</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our motive is to respond to the current needs of the customers in an effective manner. The innovation in the product help us to stay ahead of the competition, whatever trends, technology and markets shifts takes place.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Scalable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The capacity and functionalities of the products can be increased based on its users’ demand. Best thing is that the product remains stable while adapting to changes, upgrades, overhauls, and resource reduction.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/features-2col-icon',
	array(
		'title'       => __( 'Features displayed in 2 columns with icons', 'aione'),
		'description' => _x( 'Features displayed in 2 columns with icons, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row {"className":"cards"} -->
		<div class="wp-block-aione-blocks-aione-row ar cards"><!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"l-ph-10p align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  l-ph-10p align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"layers-sharp","iconSize":"aione-icon-large","className":"deep-purple lighten-1 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large deep-purple lighten-1 font-size-70 line-height-65"><ion-icon name="layers-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-10p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-10p"><!-- wp:aione-blocks/aione-icon {"iconName":"wallet-sharp","iconSize":"aione-icon-large","className":"blue lighten-1 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large blue lighten-1 font-size-70 line-height-65"><ion-icon name="wallet-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suit your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-10p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-10p"><!-- wp:aione-blocks/aione-icon {"iconName":"card-sharp","iconSize":"aione-icon-large","className":"teal lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large teal lighten-2 font-size-70 line-height-65"><ion-icon name="card-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one’s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-10p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-10p"><!-- wp:aione-blocks/aione-icon {"iconName":"trail-sign-sharp","iconSize":"aione-icon-large","className":"green lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large green lighten-2 font-size-70 line-height-65"><ion-icon name="trail-sign-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->
		',
	)
);
register_block_pattern(
	'aione/features-3col-icon',
	array(
		'title'       => __( 'Features displayed in 3 columns with icons', 'aione'),
		'description' => _x( 'Features displayed in 3 columns with icons, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 bg-grey bg-lighten-4 ph-20"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 bg-grey bg-lighten-4 ph-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row {"className":"align-center cards"} -->
		<div class="wp-block-aione-blocks-aione-row ar align-center cards"><!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"layers-sharp","iconSize":"aione-icon-large","className":"deep-purple accent-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large deep-purple accent-2 font-size-70 line-height-65"><ion-icon name="layers-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"wallet-sharp","iconSize":"aione-icon-large","className":"blue lighten-1 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large blue lighten-1 font-size-70 line-height-65"><ion-icon name="wallet-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suit your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"card-sharp","iconSize":"aione-icon-large","className":"cyan lighten-1 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large cyan lighten-1 font-size-70 line-height-65"><ion-icon name="card-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one’s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"trail-sign-sharp","iconSize":"aione-icon-large","className":"red lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large red lighten-2 font-size-70 line-height-65"><ion-icon name="trail-sign-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"document-lock-sharp","iconSize":"aione-icon-large","className":"teal lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large teal lighten-2 font-size-70 line-height-65"><ion-icon name="document-lock-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Secure</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>This is a critical aspect that is incorporated to create a system where data is not compromised and thus saves the user from further financial penalities. We continuously monitor and improve the product security practice in an effective way.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"hardware-chip-sharp","iconSize":"aione-icon-large","className":"green lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large green lighten-2 font-size-70 line-height-65"><ion-icon name="hardware-chip-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Robust</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The product proves to be an asset as it creates a defence against internal and external, malicious and accidental threats. We understand the potential variations and accordingly taken steps to achieve the robust design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->
		',
	)
);
register_block_pattern(
	'aione/features-4col-icon',
	array(
		'title'       => __( 'Features displayed in 4 columns with icons', 'aione'),
		'description' => _x( 'Features displayed in 4 columns with icons, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 ph-20"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 ph-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-row ar align-center"><!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"layers-sharp","iconSize":"aione-icon-large","className":"deep-purple accent-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large deep-purple accent-2 font-size-70 line-height-65"><ion-icon name="layers-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"wallet-sharp","iconSize":"aione-icon-large","className":"blue lighten-1 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large blue lighten-1 font-size-70 line-height-65"><ion-icon name="wallet-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suit your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"card-sharp","iconSize":"aione-icon-large","className":"amber lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large amber lighten-2 font-size-70 line-height-65"><ion-icon name="card-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one’s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"trail-sign-sharp","iconSize":"aione-icon-large","className":"red lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large red lighten-2 font-size-70 line-height-65"><ion-icon name="trail-sign-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"business-sharp","iconSize":"aione-icon-large","className":"teal lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large teal lighten-2 font-size-70 line-height-65"><ion-icon name="business-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Secure</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>This is a critical aspect that is incorporated to create a system where data is not compromised and thus saves the user from further financial penalities. We continuously monitor and improve the product security practice in an effective way.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"bar-chart-sharp","iconSize":"aione-icon-large","className":"green lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large green lighten-2 font-size-70 line-height-65"><ion-icon name="bar-chart-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Robust</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The product proves to be an asset as it creates a defence against internal and external, malicious and accidental threats. We understand the potential variations and accordingly taken steps to achieve the robust design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"bag-add-sharp","iconSize":"aione-icon-large","className":"blue font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large blue font-size-70 line-height-65"><ion-icon name="bag-add-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Innovative</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our motive is to respond to the current needs of the customers in an effective manner. The innovation in the product help us to stay ahead of the competition, whatever trends, technology and markets shifts takes place.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:aione-blocks/aione-icon {"iconName":"bar-chart-sharp","iconSize":"aione-icon-large","className":"deep-orange lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large deep-orange lighten-2 font-size-70 line-height-65"><ion-icon name="bar-chart-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Scalable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The capacity and functionalities of the products can be increased based on its users’ demand. Best thing is that the product remains stable while adapting to changes, upgrades, overhauls, and resource reduction.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/features-2col-icon-align-left',
	array(
		'title'       => __( 'Features displayed in 2 columns with icons align left', 'aione'),
		'description' => _x( 'Features displayed in 2 columns with icons align left, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 bg-grey bg-lighten-4 ph-20"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 bg-grey bg-lighten-4 ph-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row {"className":"cards"} -->
		<div class="wp-block-aione-blocks-aione-row ar cards"><!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"layers-sharp","iconSize":"aione-icon-large","className":"deep-purple lighten-1 font-size-70 line-height-65 align-center"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large deep-purple lighten-1 font-size-70 line-height-65 align-center"><ion-icon name="layers-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"wallet-sharp","iconSize":"aione-icon-large","className":"blue lighten-1 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large blue lighten-1 font-size-70 line-height-65"><ion-icon name="wallet-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suits your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"card-sharp","iconSize":"aione-icon-large","className":"teal lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large teal lighten-2 font-size-70 line-height-65"><ion-icon name="card-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"trail-sign-sharp","iconSize":"aione-icon-large","className":"green lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large green lighten-2 font-size-70 line-height-65"><ion-icon name="trail-sign-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/features-3col-icon-align-left',
	array(
		'title'       => __( 'Features displayed in 3 columns with icons align left', 'aione'),
		'description' => _x( 'Features displayed in 3 columns with icons align left, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 ph-20"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 ph-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row {"className":"cards"} -->
		<div class="wp-block-aione-blocks-aione-row ar cards"><!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"layers-sharp","iconSize":"aione-icon-large","className":"deep-purple lighten-1 font-size-45 line-height-65 align-center"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large deep-purple lighten-1 font-size-45 line-height-65 align-center"><ion-icon name="layers-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"wallet-sharp","iconSize":"aione-icon-large","className":"blue lighten-1 font-size-45 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large blue lighten-1 font-size-45 line-height-65"><ion-icon name="wallet-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suits your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"card-sharp","iconSize":"aione-icon-large","className":"teal lighten-2 font-size-45 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large teal lighten-2 font-size-45 line-height-65"><ion-icon name="card-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"trail-sign-sharp","iconSize":"aione-icon-large","className":"green lighten-2 font-size-45 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large green lighten-2 font-size-45 line-height-65"><ion-icon name="trail-sign-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"business-sharp","iconSize":"aione-icon-large","className":"teal lighten-2 font-size-45 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large teal lighten-2 font-size-45 line-height-65"><ion-icon name="business-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Secure</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>This is a critical aspect that is incorporated to create a system where data is not compromised and thus saves the user from further financial penalities. We continuously monitor and improve the product security practice in an effective way.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"trail-sign-sharp","iconSize":"aione-icon-large","className":"red lighten-2 font-size-45 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large red lighten-2 font-size-45 line-height-65"><ion-icon name="trail-sign-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Robust</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The product proves to be an asset as it creates a defence against internal and external, malicious and accidental threats. We understand the potential variations and accordingly taken steps to achieve the robust design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->
		',
	)
);
register_block_pattern(
	'aione/features-3col-one-center-image-align-left',
	array(
		'title'       => __( 'Features displayed in 3 columns with icons one center image align left', 'aione'),
		'description' => _x( 'Features displayed in 3 columns with icons one center image align left, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 ph-20 bg-grey bg-lighten-4"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 ph-20 bg-grey bg-lighten-4"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"34","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l34 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"layers-sharp","iconSize":"aione-icon-large","className":"deep-purple lighten-1 font-size-45 line-height-65 align-center"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large deep-purple lighten-1 font-size-45 line-height-65 align-center"><ion-icon name="layers-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"trail-sign-sharp","iconSize":"aione-icon-large","className":"green lighten-2 font-size-45 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large green lighten-2 font-size-45 line-height-65"><ion-icon name="trail-sign-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"trail-sign-sharp","iconSize":"aione-icon-large","className":"red lighten-2 font-size-45 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large red lighten-2 font-size-45 line-height-65"><ion-icon name="trail-sign-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Secure</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>This is a critical aspect that is incorporated to create a system where data is not compromised and thus saves the user from further financial penalities. We continuously monitor and improve the product security practice in an effective way.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"32","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l32 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:image {"align":"center","id":28791,"sizeSlug":"full","linkDestination":"none","className":"align-center"} -->
		<div class="wp-block-image align-center"><figure class="aligncenter size-full"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/12/mobile.png" alt="" class="wp-image-28791"/></figure></div>
		<!-- /wp:image --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"34","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l34 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"wallet-sharp","iconSize":"aione-icon-large","className":"blue lighten-1 font-size-45 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large blue lighten-1 font-size-45 line-height-65"><ion-icon name="wallet-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suits your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"card-sharp","iconSize":"aione-icon-large","className":"teal lighten-2 font-size-45 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large teal lighten-2 font-size-45 line-height-65"><ion-icon name="card-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"business-sharp","iconSize":"aione-icon-large","className":"teal lighten-2 font-size-45 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large teal lighten-2 font-size-45 line-height-65"><ion-icon name="business-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Robust</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The product proves to be an asset as it creates a defence against internal and external, malicious and accidental threats. We understand the potential variations and accordingly taken steps to achieve the robust design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/features-2col-one-left-image-icon-content',
	array(
		'title'       => __( 'Features displayed in 2 columns with image icon content align left', 'aione'),
		'description' => _x( 'Features displayed in 2 columns with image icon content align left, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 ph-20"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 ph-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"40","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l40 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:image {"align":"center","id":28791,"sizeSlug":"full","linkDestination":"none","className":"align-center"} -->
		<div class="wp-block-image align-center"><figure class="aligncenter size-full"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/12/mobile.png" alt="" class="wp-image-28791"/></figure></div>
		<!-- /wp:image --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"60","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l60 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-row ar mb-20"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"layers-sharp","iconSize":"aione-icon-large","className":"deep-purple lighten-1 font-size-100 line-height-65 align-center"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large deep-purple lighten-1 font-size-100 line-height-65 align-center"><ion-icon name="layers-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:aione-blocks/aione-row {"className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-row ar mb-20"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"wallet-sharp","iconSize":"aione-icon-large","className":"blue lighten-1 font-size-100 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large blue lighten-1 font-size-100 line-height-65"><ion-icon name="wallet-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suits your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:aione-blocks/aione-row {"className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-row ar mb-20"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"card-sharp","iconSize":"aione-icon-large","className":"teal lighten-2 font-size-100 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large teal lighten-2 font-size-100 line-height-65"><ion-icon name="card-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:aione-blocks/aione-row {"className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-row ar mb-20"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"trail-sign-sharp","iconSize":"aione-icon-large","className":"red lighten-2 font-size-100 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large red lighten-2 font-size-100 line-height-65"><ion-icon name="trail-sign-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></section>
		<!-- /wp:aione-blocks/aione-section -->
		',
	)
);
register_block_pattern(
	'aione/features-2col-one-left-image',
	array(
		'title'       => __( 'Features displayed in 2 columns with image content align left', 'aione'),
		'description' => _x( 'Features displayed in 2 columns with image content align left, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 ph-20 bg-grey bg-lighten-4"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 ph-20 bg-grey bg-lighten-4"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:image {"align":"center","id":28791,"sizeSlug":"full","linkDestination":"none","className":"align-center"} -->
		<div class="wp-block-image align-center"><figure class="aligncenter size-full"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/12/mobile.png" alt="" class="wp-image-28791"/></figure></div>
		<!-- /wp:image --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  mb-40"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-wrapper {"className":"mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  mb-40"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suits your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-wrapper {"className":"mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  mb-40"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-wrapper {"className":"mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  mb-40"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/features-2col-one-right-image-icon-content',
	array(
		'title'       => __( 'Features displayed in 2 columns with icon, content and image on right side', 'aione'),
		'description' => _x( 'Features displayed in 2 columns with icon, content and image on right side, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 ph-20"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 ph-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"60","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l60 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-row ar mb-20"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"layers-sharp","iconSize":"aione-icon-large","className":"deep-purple lighten-1 font-size-100 line-height-65 align-center"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large deep-purple lighten-1 font-size-100 line-height-65 align-center"><ion-icon name="layers-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:aione-blocks/aione-row {"className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-row ar mb-20"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"wallet-sharp","iconSize":"aione-icon-large","className":"blue lighten-1 font-size-100 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large blue lighten-1 font-size-100 line-height-65"><ion-icon name="wallet-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suits your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:aione-blocks/aione-row {"className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-row ar mb-20"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"card-sharp","iconSize":"aione-icon-large","className":"teal lighten-2 font-size-100 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large teal lighten-2 font-size-100 line-height-65"><ion-icon name="card-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:aione-blocks/aione-row {"className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-row ar mb-20"><!-- wp:aione-blocks/aione-column {"largeScreen":"20","mediumScreen":"20","smallScreen":"20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l20 m20 s20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:aione-blocks/aione-icon {"iconName":"trail-sign-sharp","iconSize":"aione-icon-large","className":"red lighten-2 font-size-100 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large red lighten-2 font-size-100 line-height-65"><ion-icon name="trail-sign-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"80","mediumScreen":"80","smallScreen":"80"} -->
		<div class="wp-block-aione-blocks-aione-column ac l80 m80 s80"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"40","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l40 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:image {"align":"center","id":28791,"sizeSlug":"full","linkDestination":"none","className":"align-center"} -->
		<div class="wp-block-image align-center"><figure class="aligncenter size-full"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/12/mobile.png" alt="" class="wp-image-28791"/></figure></div>
		<!-- /wp:image --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/features-3col-with-image-centent',
	array(
		'title'       => __( 'Features displayed in 3 columns with image content', 'aione'),
		'description' => _x( 'Features displayed in 3 columns with image content, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 ph-20 bg-grey bg-lighten-4"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 ph-20 bg-grey bg-lighten-4"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row {"className":"cards"} -->
		<div class="wp-block-aione-blocks-aione-row ar cards"><!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"p-20"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  p-20"><!-- wp:image {"id":28888,"sizeSlug":"large","linkDestination":"none","className":"mb-0 rounded"} -->
		<figure class="wp-block-image size-large mb-0 rounded"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/12/blue-1024x662.png" alt="" class="wp-image-28888"/></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"p-20"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  p-20"><!-- wp:image {"id":28889,"sizeSlug":"large","linkDestination":"none","className":"is-style-default mb-0"} -->
		<figure class="wp-block-image size-large is-style-default mb-0"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/12/red-1024x662.png" alt="" class="wp-image-28889"/></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suit your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"p-20"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  p-20"><!-- wp:image {"id":28890,"sizeSlug":"large","linkDestination":"none","className":"is-style-default mb-0"} -->
		<figure class="wp-block-image size-large is-style-default mb-0"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/12/yellow-1024x650.png" alt="" class="wp-image-28890"/></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one’s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/features-2col-with-icon-centent-leftside',
	array(
		'title'       => __( 'Features displayed in 2 columns with icon content left side', 'aione'),
		'description' => _x( 'Features displayed in 2 columns with icon content left side, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 ph-20"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 ph-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"mb-40 ph-15"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  mb-40 ph-15"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-22"} -->
		<p class="font-size-22">The features of the product are designed skilfully, keeping client convenience in mind. We made sure that our standardised product is user-friendly, and ensures seamless experience during its usage. Our transparency in company motives is visible, in the product quality and the customer-service we render.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row {"className":"cards"} -->
		<div class="wp-block-aione-blocks-aione-row ar cards"><!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"l-pr-20p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  l-pr-20p"><!-- wp:aione-blocks/aione-icon {"iconName":"layers-sharp","iconSize":"aione-icon-large","className":"deep-purple lighten-1 font-size-70 line-height-65 align-center"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large deep-purple lighten-1 font-size-70 line-height-65 align-center"><ion-icon name="layers-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"l-pl-20p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  l-pl-20p"><!-- wp:aione-blocks/aione-icon {"iconName":"wallet-sharp","iconSize":"aione-icon-large","className":"blue lighten-1 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large blue lighten-1 font-size-70 line-height-65"><ion-icon name="wallet-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>By no means we created the product to put a strain on your wallet. This means the product is available at the price that suits your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"l-pr-20p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  l-pr-20p"><!-- wp:aione-blocks/aione-icon {"iconName":"card-sharp","iconSize":"aione-icon-large","className":"teal lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large teal lighten-2 font-size-70 line-height-65"><ion-icon name="card-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Customizable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Full access is provided to design the product as per one s taste, it is easy and adaptable for any purpose. This helps in increasing the company profit without spending extra money.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"l-pl-20p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  l-pl-20p"><!-- wp:aione-blocks/aione-icon {"iconName":"trail-sign-sharp","iconSize":"aione-icon-large","className":"green lighten-2 font-size-70 line-height-65"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-large green lighten-2 font-size-70 line-height-65"><ion-icon name="trail-sign-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:heading {"className":"mb-0 font-size-22 font-weight-600"} -->
		<h2 class="mb-0 font-size-22 font-weight-600">Flexible</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Saves you much of the amount, and allows quicker response to customers with increased performance. It is highly responsive for any change in the product design.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/features-2col-content-with-image',
	array(
		'title'       => __( 'Features displayed in 2 columns content with image', 'aione'),
		'description' => _x( 'Features displayed in 2 columns content with image, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'features'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 bg-grey bg-lighten-4"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 bg-grey bg-lighten-4"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center l-ph-20p mb-40"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center l-ph-20p mb-40"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Features</h1>
		<!-- /wp:heading --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:image {"align":"center","id":28915,"width":215,"height":215,"sizeSlug":"large","linkDestination":"none","className":"is-style-default mb-0"} -->
		<div class="wp-block-image is-style-default mb-0"><figure class="aligncenter size-large is-resized"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/12/reliability.png" alt="" class="wp-image-28915" width="215" height="215"/></figure></div>
		<!-- /wp:image --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"l-ph-10p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  l-ph-10p"><!-- wp:heading {"className":"mb-0 font-size-30 font-weight-600"} -->
		<h2 class="mb-0 font-size-30 font-weight-600">Reliable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-22"} -->
		<p class="font-size-22">Our client first approach and quality in products have enabled us to attain the trust in the market. For us regular client feedback is important, to ensure we are providing the needed solutions.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"l-ph-10p"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  l-ph-10p"><!-- wp:heading {"className":"mb-0 font-size-30 font-weight-600"} -->
		<h2 class="mb-0 font-size-30 font-weight-600">Affordable</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-22"} -->
		<p class="font-size-22">By no means we created the product to put a strain on your wallet. This means the product is available at the price that suit your pocket. We guarantee that it is worth your time and investment.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:image {"align":"center","id":28922,"width":215,"height":215,"sizeSlug":"large","linkDestination":"none","className":"is-style-default mb-0"} -->
		<div class="wp-block-image is-style-default mb-0"><figure class="aligncenter size-large is-resized"><img src="https://aione.oxosolutions.in/wp-content/uploads/2020/12/affordable.png" alt="" class="wp-image-28922" width="215" height="215"/></figure></div>
		<!-- /wp:image --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/services-4col-content-with-image-center',
	array(
		'title'       => __( 'Services displayed in 4 columns content with image center', 'aione'),
		'description' => _x( 'Services displayed in 4 columns content with image center, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'services'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 ph-20"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 ph-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"25","mediumScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m50 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block align-center"><!-- wp:image {"id":266,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2019/02/icons8-view-100.png" alt="" class="wp-image-266"/></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"level":5,"className":"blue-grey darken-4 mb-5"} -->
		<h5 class="blue-grey darken-4 mb-5">Process Evaluation</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"blue-grey darken-2 font-size-15"} -->
		<p class="blue-grey darken-2 font-size-15">Testing process is committed to delivering <a href="https://chiefessays.net/how-to-write-a-term-paper/" style="text-decoration: none; color:#333">how to write a reference page for a term paper</a> upscale and unblemished quality for your software.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","mediumScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m50 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block align-center"><!-- wp:image {"id":275,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2019/02/icons8-statistics-100.png" alt="" class="wp-image-275"/></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"level":5,"className":"blue-grey darken-4 mb-5"} -->
		<h5 class="blue-grey darken-4 mb-5">Statistics and Analytics</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"blue-grey darken-2 font-size-15"} -->
		<p class="blue-grey darken-2 font-size-15">Use this feature for keeping your website safe, or for deep competitor research and monitoring.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","mediumScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m50 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block align-center"><!-- wp:image {"id":1922,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2019/02/icons8-star-100.png" alt="" class="wp-image-1922"/></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"level":5,"className":"blue-grey darken-4 mb-5"} -->
		<h5 class="blue-grey darken-4 mb-5">Usability Testing</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"blue-grey darken-2 font-size-15"} -->
		<p class="blue-grey darken-2 font-size-15">Usability testing refers to evaluating a product or service by testing it with representative users.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"25","mediumScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l25 m50 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block align-center"><!-- wp:image {"id":280,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2019/02/icons8-clock-100-1.png" alt="" class="wp-image-280"/></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"level":5,"className":"blue-grey darken-4 mb-5"} -->
		<h5 class="blue-grey darken-4 mb-5">Planning Save Time</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"blue-grey darken-2 font-size-15"} -->
		<p class="blue-grey darken-2 font-size-15">Get a detailed report on <a href="https://theessayclub.com/essay-conclusion-examples/" style="text-decoration: none; color:#333">theessayclub.com</a> how well the particular page is optimized as well as get a list of required fixes.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->
		',
	)
);
register_block_pattern(
	'aione/services-2col-content-with-image-left-side',
	array(
		'title'       => __( 'Services displayed in 2 columns content with image left side', 'aione'),
		'description' => _x( 'Services displayed in 4 columns content with image left side, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'services'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"className":"pv-50 ph-20 bg-grey bg-lighten-4"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section fullwidth pv-50 ph-20 bg-grey bg-lighten-4"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"50","mediumScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m50 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block"><!-- wp:image {"id":296,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2019/02/target-audience-img.png" alt="" class="wp-image-296"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","mediumScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m50 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"mt-35"} -->
		<div class="wp-block-aione-blocks-aione-row ar mt-35"><!-- wp:aione-blocks/aione-column {"largeScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block"><!-- wp:heading {"level":5,"className":"blue-grey darken-4 mb-10"} -->
		<h5 class="blue-grey darken-4 mb-10">Target Audience</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-15 blue-grey darken-2"} -->
		<p class="font-size-15 blue-grey darken-2">Quisque eu tristique nibh, quis commodo ligula. Donec eleifend </p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block"><!-- wp:heading {"level":5,"className":"blue-grey darken-4 mb-10"} -->
		<h5 class="blue-grey darken-4 mb-10">Results Guaranteed</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-15 blue-grey darken-2"} -->
		<p class="font-size-15 blue-grey darken-2">Quisque eu tristique nibh, quis commodo ligula. Donec eleifend </p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block"><!-- wp:heading {"level":5,"className":"blue-grey darken-4 mb-10"} -->
		<h5 class="blue-grey darken-4 mb-10">Creative Process</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-15 blue-grey darken-2"} -->
		<p class="font-size-15 blue-grey darken-2">Quisque eu tristique nibh, quis commodo ligula. Donec eleifend </p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block"><!-- wp:heading {"level":5,"className":"blue-grey darken-4 mb-10"} -->
		<h5 class="blue-grey darken-4 mb-10">Personalized Care</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-15 blue-grey darken-2"} -->
		<p class="font-size-15 blue-grey darken-2">Quisque eu tristique nibh, quis commodo ligula. Donec eleifend </p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column -->
		<div class="wp-block-aione-blocks-aione-column ac l100 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block"><!-- wp:aione-blocks/aione-button {"buttonBGColor":"bg-grey bg-lighten-2  hover-bg-grey hover-bg-lighten-1","buttonTextColor":"blue-grey darken-4","className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-button align-center"><div class="aione-button-container"><a href="#" target="_blank" class="aione-button fullwidth square  bg-grey bg-lighten-2  hover-bg-grey hover-bg-lighten-1 blue-grey darken-4 border-black" rel="noopener">Why we are different ?</a></div></div>
		<!-- /wp:aione-blocks/aione-button --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/services-3col-heading-with-image',
	array(
		'title'       => __( 'Services displayed in 3 columns image with heading', 'aione'),
		'description' => _x( 'Services displayed in 3 columns image with heading, title and descrition', 
			'Block pattern description', 'aione' ),
		'categories'  => array( 'services'),
		'content'     => '<!-- wp:aione-blocks/aione-section -->
		<section class="wp-block-aione-blocks-aione-section aione-section fullwidth"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"pv-50 ph-5p bg-dark"} -->
		<div class="wp-block-aione-blocks-aione-row ar pv-50 ph-5p bg-dark"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block align-center"><!-- wp:heading {"className":"white"} -->
		<h2 class="white">Proin cursus odio odio</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"white font-size-20"} -->
		<p class="white font-size-20">quis pharetra orci congue et. Aenean eget est at metus faucibus interdum.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m50 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block"><!-- wp:image {"id":345,"sizeSlug":"large","linkDestination":"none","className":"bg-white mb-0"} -->
		<figure class="wp-block-image size-large bg-white mb-0"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2019/02/case-image-12-768x591.jpg" alt="" class="wp-image-345"/></figure>
		<!-- /wp:image -->

		<!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block aione-align-center bg-white p-20"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block aione-align-center bg-white p-20"><!-- wp:heading {"level":5,"className":"mb-0 blue-grey darken-4 hover-light-blue hover-darken-3"} -->
		<h5 class="mb-0 blue-grey darken-4 hover-light-blue hover-darken-3">Pay Per Click</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-15 blue-grey darken-2 mb-0"} -->
		<p class="font-size-15 blue-grey darken-2 mb-0">B2B Services, SEO</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m50 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block"><!-- wp:image {"id":1924,"sizeSlug":"large","linkDestination":"none","className":"bg-white mb-0"} -->
		<figure class="wp-block-image size-large bg-white mb-0"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2019/02/case-image-11-650x500.jpg" alt="" class="wp-image-1924"/></figure>
		<!-- /wp:image -->

		<!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block aione-align-center bg-white p-20"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block aione-align-center bg-white p-20"><!-- wp:heading {"level":5,"className":"mb-0 blue-grey darken-4 hover-light-blue hover-darken-3"} -->
		<h5 class="mb-0 blue-grey darken-4 hover-light-blue hover-darken-3">Affiliate Marketing</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-15 blue-grey darken-2 mb-0"} -->
		<p class="font-size-15 blue-grey darken-2 mb-0">B2B Services</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"50"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m50 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block"><!-- wp:image {"id":1925,"sizeSlug":"large","linkDestination":"none","className":"bg-white mb-0"} -->
		<figure class="wp-block-image size-large bg-white mb-0"><img src="https://default.darlic.com/wp-content/uploads/sites/201/2019/02/case-image-10-650x500.jpg" alt="" class="wp-image-1925"/></figure>
		<!-- /wp:image -->

		<!-- wp:aione-blocks/aione-wrapper {"className":"dispaly-block aione-align-center bg-white p-20"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  dispaly-block aione-align-center bg-white p-20"><!-- wp:heading {"level":5,"className":"mb-0 blue-grey darken-4 hover-light-blue hover-darken-3"} -->
		<h5 class="mb-0 blue-grey darken-4 hover-light-blue hover-darken-3">Search Engine Optimisation</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-15 blue-grey darken-2 mb-0"} -->
		<p class="font-size-15 blue-grey darken-2 mb-0">SEO</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/contact-form-2col-with-contact-info',
	array(
		'title'       => __( 'Contact form displayed in 2 columns with Contact info', 'aione'),
		'description' => _x( 'Contact form displayed in 2 columns with Contact info', 'Block pattern description', 'aione' ),
		'categories'  => array( 'cta'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"cssid":"contact_section_contact","className":"contact-section-contact"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section fullwidth contact-section-contact" id="contact_section_contact"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"bg-blue-grey bg-lighten-5 pv-50 ph-6p"} -->
		<div class="wp-block-aione-blocks-aione-row ar bg-blue-grey bg-lighten-5 pv-50 ph-6p"><!-- wp:aione-blocks/aione-column {"largeScreen":"50","mediumScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m50 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"mb-20 p-20 bg-white border-radius-15"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  mb-20 p-20 bg-white border-radius-15"><!-- wp:heading {"level":1,"className":"mb-0 font-size-24 pl-15"} -->
		<h1 class="mb-0 font-size-24 pl-15">Contact Form</h1>
		<!-- /wp:heading -->

		<!-- wp:shortcode -->
		[gravityform id="12" title="false"][/gravityform]
		<!-- /wp:shortcode --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","mediumScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m50 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"mb-20 p-20 bg-white border-radius-15"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  mb-20 p-20 bg-white border-radius-15"><!-- wp:aione-blocks/aione-icon {"iconName":"call-sharp","className":"orange darken-3 float-left pr-10 font-size-42"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-small orange darken-3 float-left pr-10 font-size-42"><ion-icon name="call-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:paragraph {"className":"mb-0"} -->
		<p class="mb-0"><strong>Contact Number</strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"mb-0"} -->
		<p class="mb-0"><a href="tel:215-782-5087">215-782-5087</a></p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-wrapper {"className":"mb-20 p-20 bg-white border-radius-15"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  mb-20 p-20 bg-white border-radius-15"><!-- wp:aione-blocks/aione-icon {"iconName":"mail","className":"orange darken-3 float-left pr-10 font-size-42"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-small orange darken-3 float-left pr-10 font-size-42"><ion-icon name="mail"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:paragraph {"className":"mb-0"} -->
		<p class="mb-0"><strong>Email Address</strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"mb-0"} -->
		<p class="mb-0"><a href="mailto:bjgr40swc4o@temporary-mail.net">bjgr40swc4o@temporary-mail.net</a></p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-wrapper {"className":"mb-20 p-20 bg-white border-radius-15"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  mb-20 p-20 bg-white border-radius-15"><!-- wp:aione-blocks/aione-icon {"iconName":"location-sharp","className":"orange darken-3 float-left pr-10 font-size-42"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-small orange darken-3 float-left pr-10 font-size-42"><ion-icon name="location-sharp"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:paragraph {"className":"mb-0"} -->
		<p class="mb-0"><strong>Address</strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"mb-0"} -->
		<p class="mb-0">2501 Tipple Road Philadelphia PA 19126</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-wrapper {"className":"mb-20 p-20 bg-white border-radius-15"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  mb-20 p-20 bg-white border-radius-15"><!-- wp:aione-blocks/aione-icon {"iconName":"business-outline","className":"orange darken-3 float-left pr-10 font-size-42"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-small orange darken-3 float-left pr-10 font-size-42"><ion-icon name="business-outline"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:paragraph {"className":"mb-0"} -->
		<p class="mb-0"><strong><strong>Company CIN</strong></strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"mb-0"} -->
		<p class="mb-0">U293123456789AAA</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper -->

		<!-- wp:aione-blocks/aione-wrapper {"className":"mb-20 p-20 bg-white border-radius-15"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  mb-20 p-20 bg-white border-radius-15"><!-- wp:aione-blocks/aione-icon {"iconName":"globe-outline","className":"orange darken-3 float-left pr-10 font-size-42"} -->
		<span class="wp-block-aione-blocks-aione-icon  aione-icon aione-icon-small orange darken-3 float-left pr-10 font-size-42"><ion-icon name="globe-outline"></ion-icon></span>
		<!-- /wp:aione-blocks/aione-icon -->

		<!-- wp:paragraph {"className":"mb-0"} -->
		<p class="mb-0"><strong><strong><strong>Website</strong></strong></strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"mb-0"} -->
		<p class="mb-0"><a href="https://darlic.com">https://darlic.com</a>.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->
		',
	)
);
register_block_pattern(
	'aione/services-3col-content-deep-orage',
	array(
		'title'       => __( 'Services displayed in 3 columns content with deep orange', 'aione'),
		'description' => _x( 'Services displayed in 3 columns content with deep orange', 'Block pattern description', 'aione' ),
		'categories'  => array( 'services'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"cssid":"services_section_services","className":"services-section-services"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  services-section-services" id="services_section_services"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"cards pv-50"} -->
		<div class="wp-block-aione-blocks-aione-row ar cards pv-50"><!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m33 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"s-active border p-20 aione-rounded bg-deep-orange bg-lighten-1"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  s-active border p-20 aione-rounded bg-deep-orange bg-lighten-1"><!-- wp:heading {"textAlign":"left","level":5,"className":"mb-10 white"} -->
		<h5 class="has-text-align-left mb-10 white"><strong>Order Quantity</strong></h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-16 white"} -->
		<p class="font-size-16 white">Nulla imperdiet orci vitae semper tincidunt. Integer tincidunt efficitur purus et pulvinar.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m33 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"border p-20 services aione-rounded"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  border p-20 services aione-rounded"><!-- wp:heading {"textAlign":"left","level":5,"className":"mb-10 deep-orange lighten-1"} -->
		<h5 class="has-text-align-left mb-10 deep-orange lighten-1"><strong>Tailored Solution</strong></h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-16"} -->
		<p class="font-size-16">Aenean at orci et odio varius tincidunt. Ut luctus nisl nec elit blandit dictum.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m33 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"s-active border p-20 aione-rounded bg-deep-orange bg-lighten-1"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  s-active border p-20 aione-rounded bg-deep-orange bg-lighten-1"><!-- wp:heading {"textAlign":"left","level":5,"className":"mb-10 white"} -->
		<h5 class="has-text-align-left mb-10 white"><strong>Competitive Price</strong></h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-16 white"} -->
		<p class="font-size-16 white">Suspendisse ultricies sem a quam sollicitudin, et congue dui condimentum. Nunc vehicula massa id lacus porttitor imperdiet</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m33 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"border p-20 services aione-rounded"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  border p-20 services aione-rounded"><!-- wp:heading {"level":5,"className":"mb-10 deep-orange lighten-1"} -->
		<h5 class="mb-10 deep-orange lighten-1"><strong>Fast Delivery</strong></h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-16"} -->
		<p class="font-size-16">Etiam sed erat non eros vestibulum volutpat. Phasellus est tellus, consequat nec lobortis vitae, sagittis et risus.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m33 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"s-active border p-20 aione-rounded bg-deep-orange bg-lighten-1"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  s-active border p-20 aione-rounded bg-deep-orange bg-lighten-1"><!-- wp:heading {"level":5,"className":"mb-10 white"} -->
		<h5 class="mb-10 white"><strong>High Quality &amp; Stability</strong></h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-16 white"} -->
		<p class="font-size-16 white">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;&nbsp;</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","mediumScreen":"33","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m33 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"border p-20 services aione-rounded"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  border p-20 services aione-rounded"><!-- wp:heading {"level":5,"className":"deep-orange lighten-1 mb-10"} -->
		<h5 class="deep-orange lighten-1 mb-10"><strong>Packaging</strong></h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-16"} -->
		<p class="font-size-16">Etiam sed erat non eros vestibulum volutpat. Phasellus est tellus, consequat nec lobortis vitae, sagittis et risus. Donec id</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/services-3col-rounded-content-with-image',
	array(
		'title'       => __( 'Services displayed in 3 columns rounded content with image', 'aione'),
		'description' => _x( 'Services displayed in 3 columns rounded content with image', 'Block pattern description', 'aione' ),
		'categories'  => array( 'services'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"cssid":"home_section_facilities","className":"home-section-facilities"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section fullwidth home-section-facilities" id="home_section_facilities"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"pv-50 ph-6p bg-grey bg-lighten-4"} -->
		<div class="wp-block-aione-blocks-aione-row ar pv-50 ph-6p bg-grey bg-lighten-4"><!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-30"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-30"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center p-20 bg-white border-radius-15 shadow hover-shadow transition"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center p-20 bg-white border-radius-15 shadow hover-shadow transition"><!-- wp:image {"id":2373,"sizeSlug":"large"} -->
		<figure class="wp-block-image size-large"><img src="https://qasmimanufacturing.darlic.com/wp-content/uploads/sites/339/2020/09/icons8-tick-box-50.png" alt="" class="wp-image-2373"/></figure>
		<!-- /wp:image -->

		<!-- wp:paragraph {"className":"mb-10 blue-grey darken-4"} -->
		<p class="mb-10 blue-grey darken-4"><strong>High Quality &amp; Stability</strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"font-size-15"} -->
		<p class="font-size-15">Etiam sed erat non eros vestibulum volutpat. Phasellus est tellus,</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-30"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-30"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center p-20 bg-white border-radius-15 shadow hover-shadow transition"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center p-20 bg-white border-radius-15 shadow hover-shadow transition"><!-- wp:image {"id":2372,"sizeSlug":"large"} -->
		<figure class="wp-block-image size-large"><img src="https://qasmimanufacturing.darlic.com/wp-content/uploads/sites/339/2020/09/icons8-idea-50.png" alt="" class="wp-image-2372"/></figure>
		<!-- /wp:image -->

		<!-- wp:paragraph {"className":"mb-10 blue-grey darken-4"} -->
		<p class="mb-10 blue-grey darken-4"><strong>Tailored Solution</strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"font-size-15"} -->
		<p class="font-size-15">Etiam sed erat non eros vestibulum volutpat. Phasellus est tellus,&nbsp;</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"33","className":"mb-30"} -->
		<div class="wp-block-aione-blocks-aione-column ac l33 m100 s100 mb-30"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center p-20 bg-white border-radius-15 shadow hover-shadow transition"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center p-20 bg-white border-radius-15 shadow hover-shadow transition"><!-- wp:image {"id":2370,"sizeSlug":"large"} -->
		<figure class="wp-block-image size-large"><img src="https://qasmimanufacturing.darlic.com/wp-content/uploads/sites/339/2020/09/icons8-buy-for-cash-50-3.png" alt="" class="wp-image-2370"/></figure>
		<!-- /wp:image -->

		<!-- wp:paragraph {"className":"mb-10 blue-grey darken-4"} -->
		<p class="mb-10 blue-grey darken-4"><strong>Competitive Price</strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"font-size-15"} -->
		<p class="font-size-15">Etiam sed erat non eros vestibulum volutpat. Phasellus est tellus,&nbsp;</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/services-2col-image-leftside-with-content',
	array(
		'title'       => __( 'Services displayed in 2 columns image left side with content', 'aione'),
		'description' => _x( 'Services displayed in 2 columns image left side with right side content', 'Block pattern description', 'aione' ),
		'categories'  => array( 'services'),
		'content'     => '<!-- wp:aione-blocks/aione-section -->
		<section class="wp-block-aione-blocks-aione-section aione-section fullwidth"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"cards pv-40 l-ph-6p"} -->
		<div class="wp-block-aione-blocks-aione-row ar cards pv-40 l-ph-6p"><!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"p-10 bg-white shadow hover-shadow"} -->
		<div class="wp-block-aione-blocks-aione-row ar p-10 bg-white shadow hover-shadow"><!-- wp:aione-blocks/aione-column {"largeScreen":"40","className":"p-0"} -->
		<div class="wp-block-aione-blocks-aione-column ac l40 m100 s100 p-0"><div class="wrapper"><!-- wp:image {"id":2318,"height":180,"sizeSlug":"full","className":"mb-0"} -->
		<figure class="wp-block-image size-full is-resized mb-0"><img src="https://qasmimanufacturing.darlic.com/wp-content/uploads/sites/339/2020/09/product.jpg" alt="" class="wp-image-2318" height="180"/></figure>
		<!-- /wp:image --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"60"} -->
		<div class="wp-block-aione-blocks-aione-column ac l60 m100 s100"><div class="wrapper"><!-- wp:heading {"level":5,"className":"blue-grey darken-4 mb-10 font-size-18 font-weight-600"} -->
		<h5 class="blue-grey darken-4 mb-10 font-size-18 font-weight-600">H86 Large CNC Milling Machine</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"grey darken-4"} -->
		<p class="grey darken-4">Material removal rate is about 1.5 times than conventional CNC..</p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"p-10 bg-white shadow hover-shadow"} -->
		<div class="wp-block-aione-blocks-aione-row ar p-10 bg-white shadow hover-shadow"><!-- wp:aione-blocks/aione-column {"largeScreen":"40","className":"p-0"} -->
		<div class="wp-block-aione-blocks-aione-column ac l40 m100 s100 p-0"><div class="wrapper"><!-- wp:image {"id":2337,"sizeSlug":"large","className":"mb-0"} -->
		<figure class="wp-block-image size-large mb-0"><img src="https://qasmimanufacturing.com/wp-content/uploads/sites/339/2020/09/product-2.jpg" alt="" class="wp-image-2337"/></figure>
		<!-- /wp:image --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"60"} -->
		<div class="wp-block-aione-blocks-aione-column ac l60 m100 s100"><div class="wrapper"><!-- wp:heading {"level":5,"className":"blue-grey darken-4 mb-10 font-size-18 font-weight-600"} -->
		<h5 class="blue-grey darken-4 mb-10 font-size-18 font-weight-600">Vertical Turret Milling Machine</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"grey darken-4"} -->
		<p class="grey darken-4">Suitable for boring, milling, drilling and other high positioning size..</p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"p-10 bg-white shadow hover-shadow"} -->
		<div class="wp-block-aione-blocks-aione-row ar p-10 bg-white shadow hover-shadow"><!-- wp:aione-blocks/aione-column {"largeScreen":"40","className":"p-0"} -->
		<div class="wp-block-aione-blocks-aione-column ac l40 m100 s100 p-0"><div class="wrapper"><!-- wp:image {"id":2343,"sizeSlug":"large","className":"mb-0"} -->
		<figure class="wp-block-image size-large mb-0"><img src="https://qasmimanufacturing.com/wp-content/uploads/sites/339/2020/09/product3-1-1024x628.jpg" alt="" class="wp-image-2343"/></figure>
		<!-- /wp:image --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"60"} -->
		<div class="wp-block-aione-blocks-aione-column ac l60 m100 s100"><div class="wrapper"><!-- wp:heading {"level":5,"className":"blue-grey darken-4 mb-10 font-size-18 font-weight-600"} -->
		<h5 class="blue-grey darken-4 mb-10 font-size-18 font-weight-600">180W Cooling Power VMC Machine</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"grey darken-4"} -->
		<p class="grey darken-4">Reliable interlocking, safety protection and fault diagnosis alarm..</p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"50","className":"mb-20"} -->
		<div class="wp-block-aione-blocks-aione-column ac l50 m100 s100 mb-20"><div class="wrapper"><!-- wp:aione-blocks/aione-row {"className":"p-10 bg-white shadow hover-shadow"} -->
		<div class="wp-block-aione-blocks-aione-row ar p-10 bg-white shadow hover-shadow"><!-- wp:aione-blocks/aione-column {"largeScreen":"40","className":"p-0"} -->
		<div class="wp-block-aione-blocks-aione-column ac l40 m100 s100 p-0"><div class="wrapper"><!-- wp:image {"id":2341,"sizeSlug":"large","className":"mb-0"} -->
		<figure class="wp-block-image size-large mb-0"><img src="https://qasmimanufacturing.com/wp-content/uploads/sites/339/2020/09/product2.jpg" alt="" class="wp-image-2341"/></figure>
		<!-- /wp:image --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"60"} -->
		<div class="wp-block-aione-blocks-aione-column ac l60 m100 s100"><div class="wrapper"><!-- wp:heading {"level":5,"className":"blue-grey darken-4 mb-10 font-size-18 font-weight-600"} -->
		<h5 class="blue-grey darken-4 mb-10 font-size-18 font-weight-600">Customized Voltage Vertical CNC</h5>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"grey darken-4"} -->
		<p class="grey darken-4">For all kinds of high precision, working procedure, shape more..</p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/call-to-action-with-button',
	array(
		'title'       => __( 'Call to action with download button', 'aione'),
		'description' => _x( 'Call to action with download button', 'Block pattern description', 'aione' ),
		'categories'  => array( 'cta'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"className":"bg-grey bg-lighten-5 pv-50"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section fullwidth bg-grey bg-lighten-5 pv-50"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:heading {"level":1,"className":"font-size-36 line-height-46 font-weight-600"} -->
		<h1 class="font-size-36 line-height-46 font-weight-600">Right at the coast of the Semantics, <br>a large language ocean.</h1>
		<!-- /wp:heading -->

		<!-- wp:aione-blocks/aione-button {"buttonSize":"small","buttonStyle":"rounded","buttonOutline":true,"buttonBGColor":"","buttonTextColor":"hover-white","buttonBorderColor":""} -->
		<div class="wp-block-aione-blocks-aione-button"><div class="aione-button-container"><a href="#" target="_blank" class="aione-button small rounded outline  hover-white " rel="noopener">Download</a></div></div>
		<!-- /wp:aione-blocks/aione-button --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/call-to-action-with-button-orage-color',
	array(
		'title'       => __( 'Call to action with download button orange color', 'aione'),
		'description' => _x( 'Call to action with download button orange color', 'Block pattern description', 'aione' ),
		'categories'  => array( 'cta'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"className":"pv-50"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section fullwidth pv-50"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:heading {"level":1,"className":"orange darken-3 font-size-36 line-height-46 font-weight-600"} -->
		<h1 class="orange darken-3 font-size-36 line-height-46 font-weight-600">Right at the coast of the Semantics, <br>a large language ocean.</h1>
		<!-- /wp:heading -->

		<!-- wp:aione-blocks/aione-button {"buttonSize":"small","buttonStyle":"rounded","buttonOutline":true,"buttonBGColor":" hover-bg-orange hover-bg-darken-3","buttonTextColor":"orange darken-3 hover-white","buttonBorderColor":"border-orange border-darken-3","className":"green border-red"} -->
		<div class="wp-block-aione-blocks-aione-button green border-red"><div class="aione-button-container"><a href="#" target="_blank" class="aione-button small rounded outline  hover-bg-orange hover-bg-darken-3 orange darken-3 hover-white border-orange border-darken-3" rel="noopener">Download</a></div></div>
		<!-- /wp:aione-blocks/aione-button --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></section>
		<!-- /wp:aione-blocks/aione-section -->
		',
	)
);
register_block_pattern(
	'aione/cta-title-descrition-with-button',
	array(
		'title'       => __( 'Call to action with title descrition and download button', 'aione'),
		'description' => _x( 'Call to action with title descrition and download button', 'Block pattern description', 'aione' ),
		'categories'  => array( 'cta'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"className":"bg-grey bg-lighten-5 pv-50"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section fullwidth bg-grey bg-lighten-5 pv-50"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Get the Deal</h1>
		<!-- /wp:heading -->

		<!-- wp:heading {"className":"font-size-22 line-height-32 font-weight-400"} -->
		<h2 class="font-size-22 line-height-32 font-weight-400">Right at the coast of the Semantics, <br>a large language ocean.</h2>
		<!-- /wp:heading -->

		<!-- wp:aione-blocks/aione-button {"buttonSize":"small","buttonStyle":"rounded","buttonOutline":true,"buttonBGColor":"","buttonTextColor":"hover-white","buttonBorderColor":""} -->
		<div class="wp-block-aione-blocks-aione-button"><div class="aione-button-container"><a href="#" target="_blank" class="aione-button small rounded outline  hover-white " rel="noopener">Download</a></div></div>
		<!-- /wp:aione-blocks/aione-button --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/cta-2col-title-descrition-with-button',
	array(
		'title'       => __( 'Call to action 2 columns with title descrition and download button', 'aione'),
		'description' => _x( 'Call to action 2 columns with title descrition and download button', 'Block pattern description', 'aione' ),
		'categories'  => array( 'cta'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"className":"pv-50"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section fullwidth pv-50"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"align-center"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  align-center"><!-- wp:heading {"level":1,"className":"mb-0 font-size-44 line-height-66 font-weight-600"} -->
		<h1 class="mb-0 font-size-44 line-height-66 font-weight-600">Solutions</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Solutions we offer</p>
		<!-- /wp:paragraph -->

		<!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"10"} -->
		<div class="wp-block-aione-blocks-aione-column ac l10 m100 s100"><div class="wrapper"></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"35"} -->
		<div class="wp-block-aione-blocks-aione-column ac l35 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"level":3,"className":"mb-0 font-size-22 line-height-32 font-weight-400"} -->
		<h3 class="mb-0 font-size-22 line-height-32 font-weight-400">For Designers</h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"blue-grey darken-1"} -->
		<p class="blue-grey darken-1">Solutions for designers Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts</p>
		<!-- /wp:paragraph -->

		<!-- wp:aione-blocks/aione-button {"buttonSize":"small","buttonStyle":"rounded","buttonOutline":true,"buttonBGColor":"","buttonTextColor":"hover-white","buttonBorderColor":""} -->
		<div class="wp-block-aione-blocks-aione-button"><div class="aione-button-container"><a href="#" target="_blank" class="aione-button small rounded outline  hover-white " rel="noopener">Download</a></div></div>
		<!-- /wp:aione-blocks/aione-button --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"10"} -->
		<div class="wp-block-aione-blocks-aione-column ac l10 m100 s100"><div class="wrapper"></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"35"} -->
		<div class="wp-block-aione-blocks-aione-column ac l35 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:heading {"level":3,"className":"mb-0 font-size-22 line-height-32 font-weight-400"} -->
		<h3 class="mb-0 font-size-22 line-height-32 font-weight-400">For Developers</h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"blue-grey darken-1"} -->
		<p class="blue-grey darken-1">Solutions for designers are available Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
		<!-- /wp:paragraph -->

		<!-- wp:aione-blocks/aione-button {"buttonSize":"small","buttonStyle":"rounded","buttonOutline":true,"buttonBGColor":"","buttonTextColor":"hover-white","buttonBorderColor":""} -->
		<div class="wp-block-aione-blocks-aione-button"><div class="aione-button-container"><a href="#" target="_blank" class="aione-button small rounded outline  hover-white " rel="noopener">Download</a></div></div>
		<!-- /wp:aione-blocks/aione-button --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"10"} -->
		<div class="wp-block-aione-blocks-aione-column ac l10 m100 s100"><div class="wrapper"></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:paragraph {"className":"mb-0 font-size-22 line-height-32 font-weight-400"} -->
		<p class="mb-0 font-size-22 line-height-32 font-weight-400"></p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-row --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/hero-section-2col-with-title-and-form',
	array(
		'title'       => __( 'Hero section 2 columns with title and form', 'aione'),
		'description' => _x( 'Hero section 2 columns with title and form', 'Block pattern description', 'aione' ),
		'categories'  => array( 'hero'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"bg-grey bg-lighten-5 pv-50"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  bg-grey bg-lighten-5 pv-50"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"55"} -->
		<div class="wp-block-aione-blocks-aione-column ac l55 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:paragraph {"className":"font-size-18 mv-20","style":{"color":{"text":"#2c3145"}}} -->
		<p class="font-size-18 mv-20 has-text-color" style="color:#2c3145">Top B2B/B2C eCommerce and Marketplace Experts</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"className":"font-weight-800 font-size-60 line-height-70 mb-10","style":{"color":{"text":"#2c3145"}}} -->
		<h2 class="font-weight-800 font-size-60 line-height-70 mb-10 has-text-color" style="color:#2c3145">We build B2B &amp; B2C online marketplace store and apps</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-18","style":{"color":{"text":"#2c3145"}}} -->
		<p class="font-size-18 has-text-color" style="color:#2c3145">We help both B2B and B2C companies to scale their online business. Enterprises trust us for our cutting-edge marketplace, hyperlocal, and drop shipping solutions. In the last 10 years, we helped 80,000+ companies to scale their online business.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"45"} -->
		<div class="wp-block-aione-blocks-aione-column ac l45 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"l-m-40 p-20 bg-white rounded border"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  l-m-40 p-20 bg-white rounded border"><!-- wp:shortcode -->
		[gravityform id="13" title="false"][/gravityform]
		<!-- /wp:shortcode --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/hero-section2-2col-with-title-and-form',
	array(
		'title'       => __( 'Hero section second 2 columns with title and form', 'aione'),
		'description' => _x( 'Hero section second 2 columns with title and form', 'Block pattern description', 'aione' ),
		'categories'  => array( 'hero'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"55"} -->
		<div class="wp-block-aione-blocks-aione-column ac l55 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block"><!-- wp:paragraph {"className":"font-size-18 mv-20","style":{"color":{"text":"#213b55"}}} -->
		<p class="font-size-18 mv-20 has-text-color" style="color:#213b55">Top B2B/B2C eCommerce and Marketplace Experts</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"className":"font-weight-800 font-size-60 line-height-70 mb-10","style":{"color":{"text":"#213b55"}}} -->
		<h2 class="font-weight-800 font-size-60 line-height-70 mb-10 has-text-color" style="color:#213b55">We build B2B &amp; B2C online marketplace store and apps</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"font-size-18","style":{"color":{"text":"#213b55"}}} -->
		<p class="font-size-18 has-text-color" style="color:#213b55">We help both B2B and B2C companies to scale their online business. Enterprises trust us for our cutting-edge marketplace, hyperlocal, and drop shipping solutions. In the last 10 years, we helped 80,000+ companies to scale their online business.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"45"} -->
		<div class="wp-block-aione-blocks-aione-column ac l45 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"l-m-40 p-20 bg-white rounded border"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  l-m-40 p-20 bg-white rounded border"><!-- wp:shortcode -->
		[gravityform id="13" title="false"][/gravityform]
		<!-- /wp:shortcode --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row -->

		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
register_block_pattern(
	'aione/hero-section3-2col-with-links',
	array(
		'title'       => __( 'Hero section 2 columns with links', 'aione'),
		'description' => _x( 'Hero section 2 columns with links', 'Block pattern description', 'aione' ),
		'categories'  => array( 'hero'),
		'content'     => '<!-- wp:aione-blocks/aione-section {"fullWidth":false,"className":"pv-50 bg-grey bg-lighten-5"} -->
		<section class="wp-block-aione-blocks-aione-section aione-section  pv-50 bg-grey bg-lighten-5"><div class="wrapper"><!-- wp:aione-blocks/aione-row -->
		<div class="wp-block-aione-blocks-aione-row ar"><!-- wp:aione-blocks/aione-column {"largeScreen":"65"} -->
		<div class="wp-block-aione-blocks-aione-column ac l65 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"list"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  list"><!-- wp:list {"className":"font-size-35 font-weight-600"} -->
		<ul class="font-size-35 font-weight-600"><li><a href="#">Features</a></li><li><a href="#">Plans</a></li><li><a href="#">For small business</a></li><li><a href="#">For accountants &amp; bookkeepers</a></li></ul>
		<!-- /wp:list --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column -->

		<!-- wp:aione-blocks/aione-column {"largeScreen":"35"} -->
		<div class="wp-block-aione-blocks-aione-column ac l35 m100 s100"><div class="wrapper"><!-- wp:aione-blocks/aione-wrapper {"className":"list"} -->
		<div class="wp-block-aione-blocks-aione-wrapper aione-wrapper display-block  list"><!-- wp:paragraph {"className":"mb-10","style":{"color":{"text":"#213b55"}}} -->
		<p class="mb-10 has-text-color" style="color:#213b55">Xero for you</p>
		<!-- /wp:paragraph -->

		<!-- wp:list {"className":"font-size-35 font-weight-600"} -->
		<ul class="font-size-35 font-weight-600"><li><a href="#">Educators</a></li><li><a href="#">App developers</a></li><li><a href="#">Investors</a></li><li><a href="#">Media</a></li><li><a href="#">Careers</a></li><li></li></ul>
		<!-- /wp:list --></div>
		<!-- /wp:aione-blocks/aione-wrapper --></div></div>
		<!-- /wp:aione-blocks/aione-column --></div>
		<!-- /wp:aione-blocks/aione-row --></div></section>
		<!-- /wp:aione-blocks/aione-section -->',
	)
);
}

