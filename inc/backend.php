<?php
/**
 * Change the wp-admin logo
 */
add_action("login_head", "change_my_wp_login_image");
function change_my_wp_login_image() {
    /**
     * Change the [primarycolor] [secondarycolor] [eventsecondarycolor]
     * depends on the color scheme of your project
     */
    echo "
    <style>
        .wp-core-ui {
            background: #fff;
        }
        .wp-core-ui #login h1 a {
            background: url('".get_bloginfo('template_url')."/assets/imgs/logo.png') center no-repeat;
            height: 115px;
            width: 100%; 
            margin-bottom: 10px;
            background-size: contain; 
        }
        .wp-core-ui.login form {
            background: [primarycolor];
            box-shadow: none;
        }
        .wp-core-ui.login form p label {
            color: #fff;
        }
        .wp-core-ui.login form p label input.input:focus,
        .wp-core-ui.login form p label input[type=checkbox]:focus {
            border-color: [secondarycolor];
            box-shadow: none;
        }
        .wp-core-ui.login form p label input[type=checkbox]:checked:before {
            color: [secondarycolor];
        }
        .wp-core-ui #login .button-primary { 
            text-shadow: 0 0 0; 
            color: #fff;
            background: [secondarycolor];
            border: 0;
            box-shadow: none;
        }
        .wp-core-ui #login .button-primary:hover,
        .wp-core-ui #login .button-primary:focus {
            background: [eventsecondarycolor];
        }
    </style>
    ";
}

/**
 * Change the wp-admin logo link
 */
add_filter('login_headerurl','loginpage_custom_link');
function loginpage_custom_link() {
    return site_url();
}

/**
 * Change the wp-admin logo title
 */
add_filter('login_headertitle', 'change_title_on_logo');
function change_title_on_logo() {
    return site_url();
}

/**
 * Hide update notification
 */
add_action( 'admin_head', 'hide_update', 1 );
function hide_update() {
    remove_action( 'admin_notices', 'update_nag', 3 );
}

/**
 * Remove some stuff on backend
 */
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);
function annointed_admin_bar_remove() {
    global $wp_admin_bar;

    /* Remove their stuff */
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
}

/**
 * Remove Rev Slider Metabox
 */
add_action( 'do_meta_boxes', 'remove_revolution_slider_meta_boxes' );
function remove_revolution_slider_meta_boxes() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type ) {
        remove_meta_box( 'mymetabox_revslider_0', $post_type, 'normal' );
    }
}

/**
 * Remove Dashboard Metabox
 */
add_action( 'wp_dashboard_setup', 'function_remove_ataglance' );
function function_remove_ataglance() { 
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); 
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); 
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
} 

/**
 * Hid update notification on footer
 */
// add_filter( 'admin_footer_text', '__return_empty_string', 11 ); 
// add_filter( 'update_footer', '__return_empty_string', 11 );


/**
 * Hide and show backend sidebar
 */
// add_action('admin_menu', 'remove_admin_menus', 102);
function remove_admin_menus() {
    global $submenu;
    // remove_menu_page( 'edit.php?post_type=page' ); // Page
    //remove_menu_page( 'edit.php' );  // Posts
    remove_menu_page( 'link-manager.php' ); // Links
    remove_menu_page( 'edit-comments.php' ); // Comments
    remove_menu_page( 'plugins.php' ); // Plugins
    //remove_menu_page( 'users.php' ); // Users
    // remove_menu_page( 'tools.php' ); // Tools
    //remove_menu_page(‘options-general.php’); // Settings

    remove_submenu_page ( 'index.php', 'update-core.php' ); //Dashboard->Updates
    remove_submenu_page ( 'themes.php', 'themes.php' ); // Appearance-->Themes
    //remove_submenu_page ( 'themes.php', 'widgets.php' ); // Appearance-->Widgets
    remove_submenu_page ( 'themes.php', 'theme-editor.php' ); // Appearance-->Editor
    remove_submenu_page ( 'themes.php', 'customize.php' ); // Appearance-->Editor
    remove_submenu_page ( 'options-general.php', 'options-general.php' ); // Settings->General
    remove_submenu_page ( 'options-general.php', 'options-writing.php' ); // Settings->Writing
    remove_submenu_page ( 'options-general.php', 'options-reading.php' ); // Settings->Reading
    remove_submenu_page ( 'options-general.php', 'options-discussion.php' ); // Settings->Discussion
    remove_submenu_page ( 'options-general.php', 'options-media.php' ); // Settings->Media
    remove_submenu_page ( 'options-general.php', 'options-privacy.php' ); // Settings->Privacy

    remove_submenu_page ( 'plugins.php', 'plugin-editor.php' ); // Plugins->Editor

    remove_submenu_page( 'options-general.php', 'tinymce-advanced' );

    remove_menu_page( 'edit.php?post_type=acf-field-group' );
}

/**
 * Hide the super admin account
 */
// add_action('pre_user_query','yoursite_pre_user_query');
function yoursite_pre_user_query($user_search) {
    global $current_user;
    $username = $current_user->user_login;

    if ( $username != 'icg_acct_dev' ) { 
        global $wpdb;
        $user_search->query_where = str_replace('WHERE 1=1',
        "WHERE 1=1 AND {$wpdb->users}.user_login != 'icg_acct_dev'",$user_search->query_where);
    }
}

// add_filter("views_users", "dt_list_table_views");
function dt_list_table_views($views){
   $users = count_users();
   $admins_num = $users['avail_roles']['administrator'] - 1;
   $all_num = $users['total_users'] - 1;
   $class_adm = ( strpos($views['administrator'], 'current') === false ) ? "" : "current";
   $class_all = ( strpos($views['all'], 'current') === false ) ? "" : "current";
   $views['administrator'] = '<a href="users.php?role=administrator" class="' . $class_adm . '">' . translate_user_role('Administrator') . ' <span class="count">(' . $admins_num . ')</span></a>';
   $views['all'] = '<a href="users.php" class="' . $class_all . '">' . __('All') . ' <span class="count">(' . $all_num . ')</span></a>';
   return $views;
}