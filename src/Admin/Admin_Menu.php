<?php
namespace Ecatalogue\Admin;

class Admin_Menu {

    public static function register(): void {
        add_submenu_page(
            'woocommerce',            // Parent slug
            __( 'E‑Catalogue', 'ecatalogue' ),
            __( 'E‑Catalogue', 'ecatalogue' ),
            'manage_options',        // Capabilities
            'ecatalogue',            // Menu slug
            [ self::class, 'render_settings_page' ] // Callback
        );
    }

    public static function render_settings_page(): void {
        // Grab the view (HTML form)
        include __DIR__ . '/../Views/settings-page.php';
    }
}
