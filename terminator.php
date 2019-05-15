<?php
/**
 * Plugin Name:    Terminator
 * Plugin URI:     https://github.com/superbia/Terminator
 * Description:    Disable core WordPress functionality via theme support.
 * Author:         Dylan Nichols, Superbia
 * Author URI:     https://superbia.com.au
 * Text Domain:    terminator
 * Domain Path:    /languages
 * Version:        0.2.0
 * License:        GPL v3
 *
 * @package        Terminator
 */

use Superbia\Terminator\Plugin;

/**
 * Require the Composer autoloader
 * - assumes vendor is packaged with the plugin, or
 * - the autoloader is already present as part of a larger composer managed stack
 */
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * Retrieve the main plugin instance.
 *
 * @since 0.1.0
 *
 * @return Terminator
 */
function terminator() {
	static $instance;

	if ( null === $instance ) {
		$instance = new Plugin();
	}

	return $instance;
}

/**
 * Setup the main plugin instance and load into WordPress
 */
terminator()->set_directory( plugin_dir_path( __FILE__ ) )
			->set_url( plugins_url( '', __FILE__ ) )
			->run();
