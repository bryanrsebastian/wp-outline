<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Index views.
 * 3. Single views.
 *
 * @param  [array] $classes [A list of existing body class values]
 * @return [array]          [The filtered body class list]
 */
if ( ! function_exists( 'add_body_class' ) ) {
    add_filter( 'body_class', 'add_body_class' );
    function add_body_class( $classes ) {
        if ( is_multi_author() ) 
            $classes[] = 'group-blog';

        if ( is_archive() || is_search() || is_home() )
            $classes[] = 'list-view';

        if ( is_singular() && ! is_front_page() )
            $classes[] = 'singular';

        return $classes;
    }
}