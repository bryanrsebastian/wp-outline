<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Add rules in existing rule
 * @param  array $rules    existing rule
 * @return array $newrules updated rule
 *
 * Basic guide in regex:
 * [0-9]+ = number
 * [^/]+ = letter
 */
add_filter( 'rewrite_rules_array','new_site_rewrite_rules' );
function new_site_rewrite_rules( $rules ) {
    $newrules = array();
    $newrules['(first_word)/([0-9]+)?$'] = 'index.php/$matches[1]/?[check the wp_query if there is default variable the add to this area]&your_variable=$matches[2]';

    return $newrules + $rules;
}

/**
 * Add your variable in existing variable to check if your variable has beed added
 * write this code
 * 
 * global $wp_query;
 * var_dumpe( $wp_query );
 * 
 * then check query method if your variable has been added.
 * 
 * @param  array $vars list of variables in rules
 * @return aray  $vars updated list of variables in rules
 */
add_filter( 'query_vars','new_site_insert_query_vars' );
function new_site_insert_query_vars( $vars ) {
    array_push($vars, 'your_variable');

    return $vars;
}