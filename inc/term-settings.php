<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
* Disable parent term and automatic sorting of term
**/
function get_Walker_Category_No_Parent() {
    class Walker_Category_No_Parent extends Walker_Category_Checklist {
        function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
            if ( (int) $category->parent === 0 ) {
                $this->doing_parent = esc_html( $category->name );
            } 
            else {
                parent::start_el( $output, $category, $depth, $args, $id );
            }
        }

        function end_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
            if ( ! isset( $this->doing_parent ) || empty( $this->doing_parent ) ) {
                parent::end_el( $output, $category, $depth, $args, $id );
            }
        }

        function start_lvl( &$output, $depth = 0, $args = array() ) {
            if ( isset( $this->doing_parent ) && ! empty( $this->doing_parent ) ) {
                $output .= '<li><strong>' . $this->doing_parent . '</strong></li>';
                $this->doing_parent = FALSE;
            }
            parent::start_lvl( $output, $depth = 0, $args );
        }
    }

    return new Walker_Category_No_Parent;
}

if ( ! function_exists( 'wpse_149328_set_walker' ) ) {
    add_filter( 'wp_terms_checklist_args', 'wpse_149328_set_walker' );  
    function wpse_149328_set_walker( $args ) {
        if ( ! empty( $args['taxonomy'] ) && ( $args['taxonomy'] === 'your_taxonomy_slug' ) && ( ! isset( $args['walker'] ) || ! $args['walker'] instanceof Walker ) ) {
            $args['checked_ontop'] = FALSE;
            $args['walker'] = get_Walker_Category_No_Parent();
        }

        return $args;
    }
}