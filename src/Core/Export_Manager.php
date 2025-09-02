<?php
// src/Core/Export_Manager.php
namespace Ecatalogue\Core;

use Ecatalogue\Core\Product_Fetcher;
use Ecatalogue\Core\PDF_Generator;

class Export_Manager {

    public static function handle_export(): void {
        // 1️⃣ Security check
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( __( 'Permission denied', 'ecatalogue' ) );
        }

        // 2️⃣ Optional security nonce validation
        // check_admin_referer( 'ecatalogue_export_action', 'ecatalogue_export_nonce' );

        // 3️⃣ Fetch products (simple + variable)
        $fetcher  = new Product_Fetcher();
        $products = $fetcher->get_products();

        if ( empty( $products ) ) {
            wp_die( __( 'No products found.', 'ecatalogue' ) );
        }

        // 4️⃣ Generate PDF
        $generator = new PDF_Generator();
        $pdf_data  = $generator->generate( $products );

        // 5️⃣ Send as a download
        header( 'Content-Type: application/pdf' );
        header( 'Content-Disposition: attachment; filename="ecatalogue.pdf"' );
        header( 'Cache-Control: no-cache, must-revalidate' );
        header( 'Expires: 0' );
        echo $pdf_data;   // the PDF binary string
        exit;             // stop WordPress further output
    }
}
