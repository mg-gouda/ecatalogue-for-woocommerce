<?php
/**
 * Plugin Name: E‑Catalogue for WooCommerce
 * Plugin URI:  https://github.com/yourname/ecatalogue-for-woocommerce
 * Description: Generate customizable PDF catalogs for WooCommerce products.
 * Version:     0.1.0
 * Author:      Mohamed Gouda
 * Author URI:  https://yourwebsite.com
 * Text Domain: ecatalogue
 * Domain Path: /languages
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 */

defined( 'ABSPATH' ) || exit; // Stop if accessed directly.

require_once __DIR__ . '/vendor/autoload.php'; // Composer autoloader

use Ecatalogue\Core\Main;

// Make sure WooCommerce & PHP 8.3 are available
add_action( 'plugins_loaded', [ Main::class, 'initialize' ] );
