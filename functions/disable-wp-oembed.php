<?php
/**
 * Disable WP Oembed.
 *
 * @package Terminator
 */

namespace Superbia\Terminator;

add_action( 'init', __NAMESPACE__ . '\\disable_wp_oembed' );
add_action( 'admin_init', __NAMESPACE__ . '\\disable_wp_oembed_admin' );

/**
 * Disable WP Oembed.
 *
 * @return void
 */
function disable_wp_oembed() {
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
	add_filter( 'embed_oembed_discover', '__return_false' );
}

/**
 * Disable WP Oembed in the admin.
 *
 * @return void
 */
function disable_wp_oembed_admin() {
	add_filter( 'tiny_mce_plugins', __NAMESPACE__ . '\\disable_tinymce_wp_embed' );
}

/**
 * Disable TinyMCE WP Embed.
 *
 * @param array $plugins An array of TinyMCE plugins.
 *
 * @return array
 */
function disable_tinymce_wp_embed( $plugins ) {
	return array_diff( $plugins, array( 'wpembed' ) );
}
