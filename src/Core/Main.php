<?php
// src/Core/Main.php
namespace Ecatalogue\Core;

// <<<---- IMPORT THE CLASSES (this is the fix) ---->>
use Ecatalogue\Admin\Admin_Menu;          // <‑‑ adds Admin_Menu
use Ecatalogue\Admin\Settings_Page;       // <‑‑ adds Settings_Page
use Ecatalogue\Core\Export_Manager;      // <‑‑ adds Export_Manager

class Main {

    /**
     * Initialise plugin hooks.
     */
    public static function initialize(): void {
        self::load_textdomain();

        // Register menu under WooCommerce
        add_action( 'admin_menu', [ Admin_Menu::class, 'register' ] );
        // Register settings page (no fields yet – stub only)
        add_action( 'admin_init', [ Settings_Page::class, 'register_settings' ] );
        // Export PDF action triggered from the settings page
        add_action( 'ecatalogue_admin_export', [ Export_Manager::class, 'handle_export' ] );
    }

    /**
     * Load the text‑domain for i18n.
     */
    private static function load_textdomain(): void {
        load_plugin_textdomain( 'ecatalogue', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }
}
