<?php
/**
 * Add acf option page in every sidebar menu in wordpress backend.
 * Note: You must have ACF first with Option
 **/

/* Change [Name] to your Settings Name and this is show at backend sidebar */
acf_add_options_page( array(
	'page_title' 	=> '[Name] Settings',
	'menu_title' 	=> '[Name] Settings',
	'menu_slug' 	=> '[name]-settings',
	'capability' 	=> 'manage_options',
) );

/* Change [Name] to your Settings Name and this is show under of backend sidebar menu */
acf_add_options_sub_page( array(
	'page_title' 	=> '[Name] Settings',
	'menu_title' 	=> '[Name] Settings',
	'menu_slug' 	=> '[name]-setting',
	'capability' 	=> 'manage_options',
	'parent_slug' 	=> 'edit.php?post_type=[posttype]',
) );