<?php
/**
 * Disable REST user endpoint.
 *
 * @package Terminator
 */

namespace Superbia\Terminator;

add_action( 'rest_endpoints', __NAMESPACE__ . '\\disable_rest_user_endpoint' );

/**
 * Disable user endpoint.
 *
 * @param array $endpoints The available endpoints.
 * @return array
 */
function disable_rest_user_endpoint( $endpoints ) {
	if ( isset( $endpoints['/wp/v2/users'] ) ) {
		unset( $endpoints['/wp/v2/users'] );
	}

	if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
		unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
	}

	return $endpoints;
}
