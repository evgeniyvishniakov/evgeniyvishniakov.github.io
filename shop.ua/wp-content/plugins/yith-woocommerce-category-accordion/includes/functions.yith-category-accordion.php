<?php
if( !defined( 'ABSPATH' ) ){
    exit;
}

if( !function_exists( 'get_wc_categories' ) ){

    function get_wc_categories( $hide_empty=false ){

        $args = array( 'hide_empty' => $hide_empty );

        $categories_term = get_terms( 'product_cat', $args );

        $categories = array();

        foreach( $categories_term as $category ){

            $categories[ $category->slug ] = '#'. $category->term_id . '-'. $category->name;
        }

        return $categories;

    }

}