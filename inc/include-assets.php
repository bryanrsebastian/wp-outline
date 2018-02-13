<?php
/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) 
	exit;
	
/**
 * Include assets before get_footer()
 * Enqueue Style/Script for specific page
 * 
 * @param  array $filenames collection filename of style/script
 * 
 * @return enqueue your style/script
 *
 * To use this :
 * 
 * if you want to enqueue a style use this line of code then place in your specific php file.
 * 
 * do_action( 'wp_enqueue_scripts', ['filename.css'] )
 * 
 * First argument - a predefined hook of wordpress.
 * Second argument - an array which can you enqueue multiple file in specific page.
 * 
 * If you want to enqueue a javascript use this.
 * 
 * do_action( 'wp_enqueue_scripts', ['filenam.js'], 'jquery', true )
 * 
 * First argument - a predefined hook of wordpress.
 * Second argument - an array which can you enqueue multiple file in specific page.
 * Third argument - use this if you have javascript file that need a jQuery.
 * Fourth argument - use this if you want to place your javascript in footer.
 */
add_action( 'wp_enqueue_scripts', 'include_assets', 10, 3 );
function include_assets( $filenames = array(), $jquery = '', $in_footer = false ) {	
	/* Check if the $filename is empty */
	if ( empty( $filenames ) )
		return;

	foreach ( $filenames as $filename ) {
		/* Get the extension */
		$ext = pathinfo( $filename, PATHINFO_EXTENSION );

		/* Remove the extension */
		$without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);

		/* Target the css under the style folder */
		if( $ext == 'css' )
			$ext = 'style/css';

		$path = get_template_directory(). '/assets/'. $ext .'/'. $filename;
		/* Check if the given path is exist */
		if ( ! file_exists( $path ) ) 
			return;

		$uri = get_template_directory_uri(). '/assets/'. $ext .'/'. $filename;

		if ( $ext == 'js' ) {
			wp_register_script( $without_ext, $uri, array( $jquery ), NULL, $in_footer );
		    wp_enqueue_script( $without_ext );
		} 
		else if( $ext == 'style/css' ) {
			wp_register_style( $without_ext, $uri );
			wp_enqueue_style( $without_ext );
		} 
		else {
			return;
		}
	}
}