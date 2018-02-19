<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Change the default style font of tinymce
 */
if ( ! function_exists( 'my_theme_add_editor_styles' ) ) {
    add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );
    function my_theme_add_editor_styles() {
        add_editor_style( 'assets/style/css/tinymce.css' );
    }
}

/**
 * Customize mce editor font sizes
 * @param  [array] $init_array [Data of fonts]
 * @return [array]             [Updated data of font size]
 */
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
    add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );
    function wpex_mce_text_sizes( $init_array ) {
        $init_array['fontsize_formats'] = "12px 14px 16px 18px 20px 30px 32px 36px 40px 72px 80px";

        return $init_array;
    }
}

/**
 * Add custom Fonts to the Fonts list
 * @param  [array] $init_array [Data of fonts]
 * @return [array]             [Updated data of fonts family]
 */
if ( ! function_exists( 'wpex_mce_google_fonts_array' ) ) {
    add_filter( 'tiny_mce_before_init', 'wpex_mce_google_fonts_array' );
    function wpex_mce_google_fonts_array( $init_array ) {
        $init_array['font_formats'] = 'Montserrat=Montserrat; OpenSans=Open Sans';

        return $init_array;
    }
}

/**
 * Add font family
 */
if ( ! function_exists( 'wpex_mce_google_fonts_styles' ) ) {
    add_action( 'init', 'wpex_mce_google_fonts_styles' );
    function wpex_mce_google_fonts_styles() {
        $fonts = 'https://fonts.googleapis.com/css?family=Montserrat:100,300,400,700|Open+Sans:400,600';
        
        add_editor_style( str_replace( ',', '%2C', $fonts ) );
    }
}

/**
 * Add customize fonts style
 * @param  [array] $init_array [Data of fonts]
 * @return [array]             [Updated data of fonts style]
 */
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );
function my_mce_before_init_insert_formats( $init_array ) { 
    /* Class name that defined in css file in your 'plugin_mce_css' function */
    $classes = array(
        'thin', 'light', 'regular', 'medium', 'semi-bold', 'bold', 'extra-bold', 'black',
        'montserrat', 'montserrat-thin', 'montserrat-light', 'montserrat-regular', 'montserrat-bold',
        'opensans', 'opensans-regular', 'opensans-semi-bold'
    );
    
    $style_formats = array();

    /* Store the data */
    foreach ( $classes as $class )
    {
        $style_formats[] = array(
            'title'   => $class,
            'inline'  => 'span',
            'classes' => $class
        );
    }

    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
    
    return $init_array; 
}

/**
 * Add custom style
 */
add_filter( 'mce_css', 'plugin_mce_css' );
function plugin_mce_css( $mce_css ) {
    if ( ! empty( $mce_css ) ) {
        $mce_css .= ',';
        $mce_css .= get_bloginfo('template_url').'/assets/style/css/tinymce.css';

        return $mce_css;
    }
}