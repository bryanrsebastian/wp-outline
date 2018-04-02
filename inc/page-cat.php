<?php
/**
 * Add general category in your page post type
 **/
if ( ! function_exists( 'add_page_category' ) ) {
    add_action( 'init', 'add_page_category' );
    function add_page_category() {  
        register_taxonomy_for_object_type( 'category', 'page' );
    }
}