<?php
// src/Admin/Admin_Menu.php
namespace Ecatalogue\Admin;

class Admin_Menu {

    public static function register(): void {
        add_submenu_page(
            'woocommerce',
            __( 'E‑Catalogue', 'ecatalogue' ),
            __( 'E‑Catalogue', 'ecatalogue' ),
            'manage_options',
            'ecatalogue',
            [ self::class, 'render_settings_page' ]
        );
    }

    public static function render_settings_page(): void {
        // The views folder is one level above this file
        include __DIR__ . '/../Views/settings-page.php';
    }
}
