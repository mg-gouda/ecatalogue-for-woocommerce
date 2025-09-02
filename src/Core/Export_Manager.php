<?php
namespace Ecatalogue\Core;

class Export_Manager {

    public static function handle_export(): void {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( __( 'Permission denied', 'ecatalogue' ) );
        }

        // For a real plugin you’d verify nonce, sanitise inputs, etc.

        // 1️⃣ Get products
        $fetcher  = new Product_Fetcher();
        $products = $fetcher->get_products();

        // 2️⃣ Build PDF
        $generator = new PDF_Generator();
        $pdf_data = $generator->generate( $products );

        // 3️⃣ Send PDF to browser for download
        $file_name = 'ecatalogue-' . date( 'Y-m-d-H-i-s' ) . '.pdf';
        header( 'Content-Type: application/pdf' );
        header( "Content-Disposition: attachment; filename=\"$file_name\"" );
        header( 'Cache-Control: no-cache, must-revalidate' );
        header( 'Expires: 0' );
        echo $pdf_data;
        exit;
    }
}
