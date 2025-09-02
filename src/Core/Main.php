<?php
namespace Ecatalogue\Core;

class Main {

    public static function initialize(): void {
        self::load_textdomain();

        // Hook into WordPress
        add_action( 'admin_menu', [ Admin\Admin_Menu::class, 'register' ] );
        add_action( 'admin_init', [ Admin\Settings_Page::class, 'register_settings' ] );

        // Export action (clicked from settings page)
        add_action( 'ecatalogue_admin_export', [ Export_Manager::class, 'handle_export' ] );
    }

    private static function load_textdomain(): void {
        load_plugin_textdomain( 'ecatalogue', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }
}
