<?php
/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) 
    exit;
    
/*
* Add custom image size
* add_image_size( string $name, int $width, int $height, bool|array $crop = false )
*/
if ( ! function_exists( 'image_size' ) ) {
    add_action( 'after_setup_theme', 'image_size' );
    function image_size() {
        // Add custom image size
    }
}