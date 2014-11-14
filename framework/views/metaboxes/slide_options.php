<div class='pyre_metabox'>
<?php
$this->select(	'type',
				'Background Type',
				array('image' => 'Image', 'self-hosted-video' => 'Self-Hosted Video', 'youtube' => 'Youtube', 'vimeo' => 'Vimeo'),
				'Select an image or video slide. If using an image, please select the image in the "Featured Image" box on the right hand side.'
			);
?>
<div class="video_settings" style="display: none;">
	<h2>Video Options:</h2>
	<?php
	$this->text(	'youtube_id',
					'Youtube Video ID',
					'For example the Video ID for http://www.youtube.com/LOfeCR7KqUs is LOfeCR7KqUs'
				);
	$this->text(	'vimeo_id',
					'Vimeo Video ID',
					'For example the Video ID for http://vimeo.com/75230326 is 75230326'
				);
	$this->upload( 'webm', 'Video WebM Upload', 'Video must be in a 16:9 aspect ratio. Add your WebM video file. WebM and MP4 format must be included to render your video with cross browser compatibility. OGV is optional.' );
	$this->upload( 'mp4', 'Video MP4 Upload', 'Video must be in a 16:9 aspect ratio. Add your MP4 video file. MP4 and WebM format must be included to render your video with cross browser compatibility. OGV is optional.' );
	$this->upload( 'ogv', 'Video OGV Upload', 'Add your OGV video file. This is optional.' );
	$this->upload( 'preview_image', 'Video Preview Image', 'IMPORTANT: This field must be used for self hosted videos. Self hosted videos do not work correctly on mobile devices. The preview image will be seen in place of your video on older browsers or mobile devices.' );
	$this->text(	'video_bg_color',
					'Video Color Overlay',
					'Select a color to show over the video as an overlay. Hex color code, <strong>ex: #fff</strong>'
				);
	$this->select(	'mute_video',
					'Mute Video',
					array('yes' => 'Yes', 'no' => 'No'),
					''
				);
	$this->select(	'autoplay_video',
					'Autoplay Video',
					array('yes' => 'Yes', 'no' => 'No'),
					''
				);
	$this->select(	'loop_video',
					'Loop Video',
					array('yes' => 'Yes', 'no' => 'No'),
					''
				);
	$this->select(	'hide_video_controls',
					'Hide Video Controls',
					array('yes' => 'Yes', 'no' => 'No'),
					'If this is set to yes, then autoplay must be enabled for the video to work.'
				);
	?>
</div>
<h2>Slider Content Settings:</h2>
<?php
$this->select(	'content_alignment',
				'Content Alignment',
				array('left' => 'Left', 'center' => 'Center', 'right' => 'Right'),
				'Select how the heading, caption and buttons will be aligned.'
			);
$this->text(	'heading',
				'Heading',
				'Enter the text heading for your slide.'
			);
$this->text(	'heading_font_size',
				'Heading Font Size',
				'Enter heading font size without px unit. In pixels, ex: 50 instead of 50px. <strong>Default: 60</strong>'
			);
$this->text(	'heading_color',
				'Heading Color',
				'Select a color for the heading font. Hex color code, ex: #fff. <strong>Default: #fff</strong>'
			);
$this->select(	'heading_bg',
				'Heading Background',
				array('yes' => 'Yes', 'no' => 'No'),
				'Select this option if you would like a semi-transparent background behind your heading.'
			);
$this->text(	'caption',
				'Caption',
				'Enter the text caption for your slide.'
			);
$this->text(	'caption_font_size',
				'Caption Font Size',
				'Enter caption font size without px unit. In pixels, ex: 24 instead of 24px. <strong>Default: 24</strong>'
			);
$this->text(	'caption_color',
				'Caption Color',
				'Select a color for the caption font. Hex color code, ex: #fff. <strong>Default: #fff</strong>'
			);
$this->select(	'caption_bg',
				'Caption Background',
				array('yes' => 'Yes', 'no' => 'No'),
				'Select this option if you would like a semi-transparent background behind your caption.'
			);
?>
<h2>Slide Link Settings:</h2>
<?php
$this->select(	'link_type',
				'Slide Link Type',
				array('button' => 'Button', 'full' => 'Full Slide'),
				'Select how the slide will link.'
			);
$this->text(	'slide_link',
				'Slide Link',
				'Please enter your URL that will be used to link the full slide.'
			);
$this->textarea('button_1',
				'Button #1<br/><a href="http://oxosolutions.com/knowledgebase/aione-shortcode-list/#buttons">Click here to view button option descriptions.</a>',
				'Adjust the button shortcode parameters for the first button.',
				'[button link="" color="default" size="" type="" shape="" target="_self" title="" gradient_colors="|" gradient_hover_colors="|" accent_color="" accent_hover_color="" bevel_color="" border_width="1px" shadow="" icon="" icon_divider="yes" icon_position="left" modal="" animation_type="0" animation_direction="down" animation_speed="0.1" class="" id=""]Button Text[/button]'
			);
$this->textarea('button_2',
				'Button #2<br/><a href="http://oxosolutions.com/knowledgebase/aione-shortcode-list/#buttons">Click here to view button option descriptions.</a>',
				'Adjust the button shortcode parameters for the second button.',
				'[button link="" color="default" size="" type="" shape="" target="_self" title="" gradient_colors="|" gradient_hover_colors="|" accent_color="" accent_hover_color="" bevel_color="" border_width="1px" shadow="" icon="" icon_divider="yes" icon_position="left" modal="" animation_type="0" animation_direction="down" animation_speed="0.1" class="" id=""]Button Text[/button]'
			);
?>
</div>
<div class="clear"></div>