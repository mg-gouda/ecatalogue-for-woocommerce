<?php
namespace Ecatalogue\Core;

use WP_Query;

class Product_Fetcher {

    public function get_products( array $args = [] ): array {
        $default_args = [
            'status'  => 'publish',
            'limit'   => -1,   // all products
            'orderby' => 'date',
            'order'   => 'DESC',
        ];

        $args = wp_parse_args( $args, $default_args );

        $query = new WP_Query( array_merge( [ 'post_type' => 'product' ], $args ) );

        return $query->posts ?? [];
    }
}
