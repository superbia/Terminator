<?php
/**
 * Common plugin functionality.
 *
 * @package Terminator
 * @since   0.1.0
 */

namespace Superbia\Terminator;

/**
 * Abstract plugin class.
 *
 * @package Terminator
 * @since   0.1.0
 */
abstract class AbstractPlugin {
	/**
	 * Absolute path to the main plugin directory.
	 *
	 * @since 0.1.0
	 * @var string
	 */
	protected $directory;

	/**
	 * URL to the main plugin directory.
	 *
	 * @since 0.1.0
	 * @var string
	 */
	protected $url;

	/**
	 * Initialise the plugin.
	 *
	 * @return PluginInterface Returns itself for easier method chaining
	 */
	public function run() {
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
		return $this;
	}

	/**
	 * Disable the plugin.
	 *
	 * Allow the T1000 to terminate the Terminator
	 */
	public function disable() {
		removeAction( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
	}

	/**
	 * Get the plugin directory path.
	 *
	 * @since 0.1.0
	 *
	 * @return string Path to the plugin directory
	 */
	public function get_directory() {
		return $this->directory;
	}

	/**
	 * Set the plugin's directory path.
	 *
	 * @since 0.1.0
	 *
	 * @param string $directory Absolute path to the plugin directory.
	 * @return $this Returns itself for easier method chaining
	 */
	public function set_directory( $directory ) {
		$this->directory = $directory;

		return $this;
	}

	/**
	 * Get the plugin's url.
	 *
	 * @since 0.1.0
	 *
	 * @return string
	 */
	public function get_url() {
		return $this->url;
	}

	/**
	 * Set the plugin's url.
	 *
	 * @since 0.1.0
	 *
	 * @param string $url URL to the plugin root directory.
	 * @return $this Returns itself for easier method chaining
	 */
	public function set_url( $url ) {
		$this->url = $url;

		return $this;
	}

	/**
	 * Register methods with the WordPress plugin API.
	 *
	 * @since 0.1.0
	 */
	protected abstract function plugins_loaded();

}
