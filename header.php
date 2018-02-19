<?php if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!-- HEADER -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>HEADER(header.php) - remove this in production</h1>
                    </div>
                </div>
            </div>
        </header>