<?php
/**
 * Plugin Name: kitpdf pdf viewer and embed pdf for blocks
 * Description: This plugin helps you upload PDF and embed PDF documents to gutenberg blocks quickly and easily.
 * Plugin URI:  http://kitbug.com/
 * Version:     1.0.0
 * License:     GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Author:      KitBug
 * Author URI:  https://profiles.wordpress.org/kitbug/
 * Text Domain: kit-pdf
 */

// Exit if accessed directly.
// KITPDF KitPdf kitpdf kit-pdf

if (!defined('ABSPATH')) {
    exit;
}
define('KITPDF_VERSION', '1.0.0');
define( 'KITPDF_PLUGIN_DIR', dirname( __FILE__ ) . '/' );
if ( ! defined( 'KITPDF_PLUGIN_URI' ) ) {
	define( 'KITPDF_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
}
require_once KITPDF_PLUGIN_DIR  . 'function/kitpdf-scripts.php';
require_once KITPDF_PLUGIN_DIR  . 'function/blocks-cat.php';
require_once KITPDF_PLUGIN_DIR  . 'function/carbon-loader.php';
require_once KITPDF_PLUGIN_DIR  . 'includes/pdf-block/block-kitpdf.php';
