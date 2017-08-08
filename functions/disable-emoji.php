<?php
/**
 * Disable Emoji.
 *
 * @package Terminator
 */

namespace Superbia\Terminator;

add_action( 'init', __NAMESPACE__ . '\\disable_emoji' );
add_action( 'admin_init', __NAMESPACE__ . '\\disable_emoji_admin' );
add_filter( 'emoji_svg_url', '__return_false' );

/**
 * Disable Emoji.
 *
 * @return void
 */
function disable_emoji() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}

/**
 * Disable Emoji in WP admin.
 *
 * @return void
 */
function disable_emoji_admin() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	add_filter( 'tiny_mce_plugins', __NAMESPACE__ . '\\disable_tinymce_emoji' );
}

/**
 * Disable TinyMCE Emoji.
 *
 * @param array $plugins An array of TinyMCE plugins.
 *
 * @return array
 */
function disable_tinymce_emoji( $plugins ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
}
