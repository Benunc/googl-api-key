<?php
/**
 * For uninstalling and cleaning up after ourselves, like good little developers.
 *
 **/
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

$option_name = 'googl_api_key';

delete_option( $option_name );