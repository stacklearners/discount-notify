<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/stacklearners/discount-notify
 * @since             1.0.0
 * @package           Discount_Notify
 *
 * @wordpress-plugin
 * Plugin Name:       Discount Notify for WooCommerce
 * Plugin URI:        https://github.com/stacklearners/discount-notify
 * Description:       Discount Notify for WooCommerce store, where user can subscribe for product discount. If admin approve customer will get notification email
 * Version:           1.0.0
 * Author:            Stack Learners
 * Author URI:        https://github.com/stacklearners/discount-notify/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       discount-notify
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DISCOUNT_NOTIFY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-discount-notify-activator.php
 */
function activate_discount_notify() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-discount-notify-activator.php';
	Discount_Notify_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-discount-notify-deactivator.php
 */
function deactivate_discount_notify() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-discount-notify-deactivator.php';
	Discount_Notify_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_discount_notify' );
register_deactivation_hook( __FILE__, 'deactivate_discount_notify' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-discount-notify.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_discount_notify() {

	$plugin = new Discount_Notify();
	$plugin->run();

}
run_discount_notify();
