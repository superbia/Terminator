<?php
/**
 * Main plugin class
 *
 * @package Terminator
 */

namespace Superbia\Terminator;

/**
 * The core plugin class.
 */
class Plugin extends AbstractPlugin {
	/**
	 * Register methods with the WordPress plugin API.
	 *
	 * @since 0.1.0
	 */
	public function plugins_loaded() {
		add_action( 'after_setup_theme', array( $this, 'maybe_require_feature_mods' ), 100 );
	}

	/**
	 * Conditionally require feature modifications.
	 *
	 * Checks for theme support before requiring the feature file
	 *
	 * @since 0.1.0
	 */
	public function maybe_require_feature_mods() {

		foreach ( $this->get_features() as $feature ) {

			if ( current_theme_supports( 'terminator-' . $feature ) ) {
				require_once( $this->get_directory() . '/functions/' . $feature . '.php' );
			}
		}
	}

	/**
	 * All feature modifications.
	 *
	 * @since 0.1.0
	 *
	 * @return array An array of features modifications
	 */
	public static function get_features() {
		return array(
			'disable-emoji',
		);
	}

}
