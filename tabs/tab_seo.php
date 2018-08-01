<section class="preview">
	<div id="logoGoogle"> 
		<img id="" width="100%" height="100%" class="" src="https://www.portent.com/images/2014/08/google-logo-94x34.jpg" >
	</div>
	<div class="clear"></div>
	<div id="preview_title"></div>
	<div id="preview_link"><?php echo get_permalink(); ?></div>
	<div id="preview_description"></div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$('#pyre_title_tag').on("input", function() {
		  var tInput = this.value;
		  $('#preview_title').text(tInput);
		});
		$('#pyre_meta_description').on("input", function() {
		  var dInput = this.value;
		  $('#preview_description').text(dInput);
		});
	});
</script>
<?php 
printf( '<h3>%s</h3>', __( 'Search Engine Listing:', 'gutenbergtheme' ) );

$this->text(
	'title_tag',
	__( ' Title Tag', 'gutenbergtheme' ),
	__( '<strong>50 and 60 characters </strong> (spaces included)', 'gutenbergtheme' )
);

$this->textarea(
	'meta_description',
	__( 'Meta Description', 'gutenbergtheme' ),
	__( '<strong>70 and 320 characters (spaces included)</strong>', 'gutenbergtheme' )
);

$this->textarea(
	'meta_keywords',
	__( 'Meta Keywords', 'gutenbergtheme' ),
	__( 'Enter a series of keywords relevant to the page with comma sepration.<br/>For eg: Wordpress, Theme, Page, Post', 'gutenbergtheme' )
);

printf( '<h3>%s</h3>', __( 'Social Networks Listing:', 'gutenbergtheme' ) );

$this->text(
	'og_title',
	__( 'Title', 'gutenbergtheme' ),
	__( '', 'gutenbergtheme' )
);

$this->textarea(
	'og_description',
	__( 'Description', 'gutenbergtheme' ),
	__( '', 'gutenbergtheme' )
);

$this->upload(
	'og_image',
	__( 'Image', 'gutenbergtheme' ),
	__( 'Select an image.', 'gutenbergtheme' )
);
$this->text(
	'og_url',
	__( 'URL', 'gutenbergtheme' ),
	__( '', 'gutenbergtheme' )
);

