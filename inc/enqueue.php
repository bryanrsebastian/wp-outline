<?php
/**
 * Include default scripts and css in frontend
 **/
if ( ! function_exists( 'enqueue_style_script' ) ) {
    add_action('wp_enqueue_scripts','enqueue_style_script');
    function enqueue_style_script() {
        /* 
         * Register/Hook Styles
         */ 
        
        /* Third Party Styles */
        wp_enqueue_style('fontawesome-free-5.0.6', THEME_URL .'/vendors/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.min.css');
        wp_enqueue_style('bootstrap4-beta', THEME_URL .'/vendors/bootstrap4-beta/dist/css/bootstrap.min.css');
        wp_enqueue_style('sweetalert2', THEME_URL .'/vendors/sweetalert2/dist/sweetalert2.min.css');
        
        /* Custom Styles */
        wp_enqueue_style('general', THEME_URL .'/assets/style/css/general.css');
        
        /* 
         * Register/Hook Scripts
         */
        
        /* Third Party Script */
        wp_register_script( 'nicescroll', THEME_URL  .'/vendors/nicescroll/jquery.nicescroll.min.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'nicescroll' );
        
        wp_register_script( 'popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'popper' );
        
        wp_register_script( 'bootstrap4-beta', THEME_URL  .'/vendors/bootstrap4-beta/dist/js/bootstrap.min.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'bootstrap4-beta' );

        wp_register_script( 'sweetalert2', THEME_URL  .'/vendors/sweetalert2/dist/sweetalert2.min.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'sweetalert2' );

        wp_register_script( 'sweetalert2_support', '//cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'sweetalert2_support' );

        /* AJAX Script */
        // wp_register_script( 'function-name', THEME_URL . '/inc/ajax/function-name/function-name.js', array( 'jquery' ), NULL, true );
        // wp_enqueue_script( 'function-name' );
        
        /**
         * Guide on how to name and include your custom script ( PHP )
         *
         * For team project : custom-*.js
         * For individual project : custom.js
         */
        // wp_register_script( 'file-name', THEME_URL . '/assets/js/file-name.js', array( 'jquery' ), NULL, true );
        // wp_enqueue_script( 'file-name' );
        
        wp_register_script( 'common-js', THEME_URL  .'/assets/js/common.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'common-js' );


        /**
         * Browser Compatibility
         */
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        if( preg_match( '/trident/i', $u_agent ) ) {
            /**
             * Enqueue your style/script only @ IE
             */
            wp_enqueue_style('ie', THEME_URL .'/assets/style/css/ie.css');
        } 
        elseif( preg_match( '/firefox/i', $u_agent ) ) {
            /**
             * Enqueue your style/script only @ Mozilla Firefox
             */
            wp_enqueue_style('firefox', THEME_URL .'/assets/style/css/firefox.css');
        } 
        elseif( preg_match( '/mac/i', $u_agent ) ) {
            /**
             * Enqueue your style/script only @ Safari
             */
            wp_enqueue_style('safari', THEME_URL .'/assets/style/css/safari.css');
        } 
        elseif( preg_match( '/chrome/i', $u_agent ) ) {
            /**
             * Enqueue your style/script only @ Google Chrome
             */
            wp_enqueue_style('chrome', THEME_URL .'/assets/style/css/chrome.css');
        } 
        elseif( preg_match( '/Opera/i',$u_agent ) || preg_match( '/OPR/i',$u_agent ) ) {
            /**
             * Enqueue your style/script only @ Opera
             */
            wp_enqueue_style('opera', THEME_URL .'/assets/style/css/opera.css');
        }
    }
}

/**
 * Include default scripts and css in backend
 **/
if ( ! function_exists( 'enqueue_admin_style_script' ) ) {
    add_action( 'admin_enqueue_scripts', 'enqueue_admin_style_script' );
    function enqueue_admin_style_script() {
        /* 
         * Register/Hook Scripts for backend
         */
        wp_register_script( 'backend', THEME_URL .'/assets/js/backend.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'backend' );
    }
}