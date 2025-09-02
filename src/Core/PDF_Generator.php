<?php
namespace Ecatalogue\Core;

use TCPDF;
use WC_Product;

class PDF_Generator {

    public function generate( array $products, array $settings = [] ): string {
        // Create a new TCPDF instance
        $pdf = new TCPDF(
            PDF_PAGE_ORIENTATION,
            PDF_UNIT,
            PDF_PAGE_FORMAT,
            true,
            'UTF-8',
            false
        );

        // Page header/footer (plain for now)
        $pdf->setPrintHeader( true );
        $pdf->setPrintFooter( true );
        $pdf->AddPage();

        // Loop over every product
        foreach ( $products as $product ) {
            /** @var WC_Product $product */
            $pdf->SetFont( 'helvetica', 'B', 12 );
            $pdf->Write( 0, $product->get_name(), '', 0, 'L', true, 0, false, false, 0 );
            $pdf->SetFont( 'helvetica', '', 11 );
            $pdf->Write( 0, 'SKU: ' . $product->get_sku(), '', 0, 'L', true, 0, false, false, 0 );
            $pdf->Ln( 4 ); // Line break
        }

        // Return the PDF as a string so we can handle it later
        return $pdf->Output( 'catalog.pdf', 'S' ); // 'S' => String
    }
}
