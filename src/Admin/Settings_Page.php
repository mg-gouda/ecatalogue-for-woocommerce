<?php
namespace Ecatalogue\Admin;

class Settings_Page {

    public static function register_settings(): void {
        // In a real plugin, we’d register settings sections & fields here.
        // Leave empty for the moment – the view file handles the form.
        
    }
}
wp_register_style( 'ecatalogue-admin', plugin_dir_url( __FILE__ ) . '../../assets/css/admin.css', [], '1.0' );
wp_enqueue_style( 'ecatalogue-admin' );
