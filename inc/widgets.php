<?php
/**
 * Register widget areas
 *
 * to get the widget just use the dynamic_sidebar
 *
 * @ref https://codex.wordpress.org/Function_Reference/dynamic_sidebar
 **/

if ( ! function_exists( 'custom_widgets' ) ) {
    function custom_widgets() {
        register_sidebar( array(
            'name'          => 'Sidebar Widget',
            'id'            => 'sidebar-widget',
            'description'   => 'Appears in the sidebar section of the site.',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ) ); 

        register_sidebar( array(
            'name'          => 'Header Widget',
            'id'            => 'header-widget',
            'description'   => 'Appears in the header section of the site.',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ) ); 

        register_sidebar( array(
            'name'          => 'Footer Widget',
            'id'            => 'footer-widget',
            'description'   => 'Appears in the footer section of the site.',
            'class'         => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ) ); 
    }
    add_action( 'widgets_init', 'custom_widgets' );
}