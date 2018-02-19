<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Template Name: Testing */

$var = array(
    'ta' => 'asdd',
    'ta1' => 'asdd',
    'ta2' => 'asdd',
    'ta3' => 'asdd',
    'ta4' => 'asdd',
);

echo "<pre>"; var_dump( $var ); echo "</pre>";

wp_die();