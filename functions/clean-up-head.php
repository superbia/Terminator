<?php
/**
 * Clean up wp_head().
 *
 * @package Terminator
 */

namespace Superbia\Terminator;

add_action( 'init', __NAMESPACE__ . '\\cleanup_head' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\dequeue_scripts_styles' );

/**
 * Clean up wp_head().
 */
function cleanup_head() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
}

/**
 * Remove enqueued scripts and styles.
 */
function dequeue_scripts_styles() {
	wp_dequeue_style( 'wp-block-library' );
}
