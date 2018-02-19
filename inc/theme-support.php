<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! function_exists( 'theme_support' ) ) {
    add_action( 'after_setup_theme', 'theme_support' );
    function theme_support() {
        /**
         * Enable support for Post Thumbnails, and declare two sizes.
         */
        add_theme_support( 'post-thumbnails' );

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
        ) );

        /**
         * This theme uses its own gallery styles.
         */
        add_filter( 'use_default_gallery_style', '__return_false' );
    }
}

/**
 * Header image
 **/
add_theme_support( 'custom-header', apply_filters( 'custom_header_args', array(
    'default-text-color'     => 'fff',
    'width'                  => 200,
    'flex-width'             => true,
    'height'                 => 200,
    'flex-height'            => true,
) ) );

/**
 * Custom Background
 */
$defaults = array(
    'default-color'          => '',
    'default-image'          => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );

/**
 * Uncomment this function if you want to place your name in footer ( in comment way )
 */
// add_action( 'wp_footer', 'your_function' );
// function your_function()
// {
//  $content = '<!-- Developer of the theme : Bryan Sebastian https://bryan-sebastian.github.io/ -->';
//  echo $content;
// }