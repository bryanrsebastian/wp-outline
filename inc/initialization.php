<?php
/**
 * Global JS variable
 */
if ( ! function_exists( 'global_js_var' ) ) {
    add_action('wp_head','global_js_var');
    function global_js_var() {
    ?>
        <script>
            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
            var themeurl = '<?php echo get_template_directory_uri(); ?>';
        </script>
    <?php
    }
}

/**
 * Include all the php files inside the given folder
 * @param  [string] $folder_name [name of the folder that you want to include all the files inside of it]
 * @return [void]                [include all the php files inside the given folder]
 */
if ( ! function_exists( 'include_all_php' ) ) {
    function include_all_php( $folder_name ) {
        foreach ( glob( dirname(__FILE__)."/{$folder_name}/*.php" ) as $filename ) 
        {
            include_once( $filename );
        }
    }
}

/**
 * Global checker
 * @param  [string/array] $var  [the function will check this variable]
 * @return [boolean]            [true if not empty, not null, is set, and not equal to '']
 */
if ( ! function_exists( 'checker' ) ) {
    function checker( $var ) {
        return ( $var && $var != '' && ! empty( $var ) && ! is_null( $var ) );
    }
}

/**
 * Check if post is exist via post_title on specific post_type
 * @param  [string] $post_type  [post type]
 * @param  [string] $post_title [post title]
 * @return [array]              [list of post]
 */
function post_checker( $post_type, $post_title ) {
    global $wpdb;
    return $wpdb->get_results(
        $wpdb->prepare( "
            SELECT * 
            FROM $wpdb->posts 
            WHERE post_type = '$post_type'
            AND post_title = %s
            AND post_status = 'publish'
        ", $post_title )
    );
}

/**
 * Rename the function get_template_directory_uri()
 */
define( 'THEME_URL' , get_template_directory_uri() );

/**
 * Change the format of the email into HTML
 */
function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );