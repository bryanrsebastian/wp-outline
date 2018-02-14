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
        wp_enqueue_style('font_awesome', THEME_URL .'/vendors/font-awesome/css/font-awesome.min.css');
        wp_enqueue_style('bootstrap_css', THEME_URL .'/vendors/bootstrap/dist/css/bootstrap.min.css');
        wp_enqueue_style('sweetalert2_css', THEME_URL .'/vendors/sweetalert2/dist/sweetalert2.min.css');
        
        /* Custom Styles */
        wp_enqueue_style('general_css', THEME_URL .'/assets/style/css/general.css');
        
        /* 
         * Register/Hook Scripts
         */
        
        /* Third Party Script */
        wp_register_script( 'nicescroll', THEME_URL  .'/vendors/nicescroll/jquery.nicescroll.min.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'nicescroll' );
        
        wp_register_script( 'popper_js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'popper_js' );
        
        wp_register_script( 'bootstrap_js', THEME_URL  .'/vendors/bootstrap/dist/js/bootstrap.min.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'bootstrap_js' );

        wp_register_script( 'sweetalert2_js', THEME_URL  .'/vendors/sweetalert2/dist/sweetalert2.min.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'sweetalert2_js' );

        wp_register_script( 'sweetalert2_support_js', '//cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js', array('jquery'), NULL, true );
        wp_enqueue_script( 'sweetalert2_support_js' );

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
            wp_enqueue_style('general_css', THEME_URL .'/assets/style/css/ie.css');
        } 
        elseif( preg_match( '/firefox/i', $u_agent ) ) {
            /**
             * Enqueue your style/script only @ Mozilla Firefox
             */
            wp_enqueue_style('general_css', THEME_URL .'/assets/style/css/firefox.css');
        } 
        elseif( preg_match( '/mac/i', $u_agent ) ) {
            /**
             * Enqueue your style/script only @ Safari
             */
            wp_enqueue_style('general_css', THEME_URL .'/assets/style/css/safari.css');
        } 
        elseif( preg_match( '/chrome/i', $u_agent ) ) {
            /**
             * Enqueue your style/script only @ Google Chrome
             */
            wp_enqueue_style('general_css', THEME_URL .'/assets/style/css/chrome.css');
        } 
        elseif( preg_match( '/Opera/i',$u_agent ) || preg_match( '/OPR/i',$u_agent ) ) {
            /**
             * Enqueue your style/script only @ Opera
             */
            wp_enqueue_style('general_css', THEME_URL .'/assets/style/css/opera.css');
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