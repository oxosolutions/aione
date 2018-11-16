<?php
// Template Name: API

header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');

global $post;
echo do_shortcode($post->post_content);