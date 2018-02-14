<?php
/** 
 * Register template_name menu
 **/
if ( ! function_exists( 'add_menus' ) ) {
    add_action( 'after_setup_theme', 'add_menus' );
    function add_menus() {
        // Menu locations set in backend
        register_nav_menus( array(
            'main_menu'   => __( 'Main Menu', 'template_name' ),
            //'supporting_menu' => __( 'Additional Menu', 'template_name' ),
        ) );
    }
}

/*
to show specific menu place this code on specific location

$menuargs = array(
    'theme_location'    =>  'Main Menu',
    'menu'              =>  'Main Menu',
    'menu_class'        =>  'main-menu list-inline',
);
wp_nav_menu($menuargs); 
*/