<section class="aione-serp-preview">
	<div class="aione-serp-preview-label">SERP Preview</div>
	<!-- <div class="aione-serp-preview-title"><?php //echo esc_html( get_post_meta( get_the_ID(), 'pyre_title_tag', true ) );?></div> -->
	<div class="aione-serp-preview-title"><?php echo esc_html(get_aione_page_settings(get_the_ID(), 'aione_per_page_setting','pyre_title_tag'));?></div>
	<div class="aione-serp-preview-link"><?php echo esc_url( get_permalink() ); ?></div>
	<!-- <div class="aione-serp-preview-description"><?php //echo esc_html( get_post_meta( get_the_ID(), 'pyre_meta_description', true ) );?></div> -->
	<div class="aione-serp-preview-description"><?php echo esc_html( get_aione_page_settings(get_the_ID(), 'aione_per_page_setting','pyre_meta_description') );?></div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$('#pyre_title_tag').on("input", function() {
		  var tInput = this.value;
		  $('.aione-serp-preview-title').text(tInput);
		});
		$('#pyre_meta_description').on("input", function() {
		  var dInput = this.value;
		  $('.aione-serp-preview-description').text(dInput);
		});
	});
</script>
<style>
.aione-serp-preview{
	display: block;
	max-width: 592px;
	padding-bottom: 10px;
	border: 1px solid #e8e8e8;
}
.aione-serp-preview-label{
	color:#595959;
	margin-bottom: 10px;
	font-size:18px;
	font-weight:400;
	line-height:1.6;
    padding-left: 10px;
	border-bottom: 1px solid #e8e8e8;
}
.aione-serp-preview-title{
	color: #1a0dab;
	cursor: pointer;
	display: block;
	font-family: arial, sans-serif;
	font-size: 18px;
	font-weight: 400;
	line-height: 18px;
	padding-left: 10px;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.aione-serp-preview-title:hover{
	text-decoration:underline; 
}
.aione-serp-preview-link{
    color: #006621;
    font-size: 14px;
    padding-top: 2px;
    line-height: 14px;
    padding-bottom: 1px;
    padding-left: 10px;
    font-style: normal;
}
.aione-serp-preview-description{
	color: #545454;
	font-size: 14px;
	line-height: 18px;
	height: 36px;
	overflow: hidden;
	padding-top: 2px;
	padding-left: 10px;
	word-wrap: break-word;
	font-family: arial, sans-serif;
}
</style>
<?php 
printf( '<h3>%s</h3>', esc_html( __( 'Search Engine Listing:', 'aione' ) ) );

$this->text(
	'title_tag',
	__( ' Title Tag', 'aione' ),
	__( '<strong>50 and 60 characters </strong> (spaces included)', 'aione' )
);

$this->textarea(
	'meta_description',
	__( 'Meta Description', 'aione' ),
	__( '<strong>70 and 320 characters (spaces included)</strong>', 'aione' )
);

$this->textarea(
	'meta_keywords',
	__( 'Meta Keywords', 'aione' ),
	__( 'Enter a series of keywords relevant to the page with comma sepration.<br/>For eg: Wordpress, Theme, Page, Post', 'aione' )
);

printf( '<h3>%s</h3>', esc_html( __( 'Social Networks Listing:', 'aione' ) ) );

$this->text(
	'og_title',
	__( 'Title', 'aione' ),
	__( 'Title', 'aione' )
);

$this->textarea(
	'og_description',
	__( 'Description', 'aione' ),
	__( 'Description', 'aione' )
);

$this->upload(
	'og_image',
	__( 'Image', 'aione' ),
	__( 'Select an image.', 'aione' )
);
$this->text(
	'og_url',
	__( 'URL', 'aione' ),
	__( 'Description', 'aione' )
);

