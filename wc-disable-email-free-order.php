<?php
/**
 * Desactivar correos electrónicos para pedidos gratuitos.
 */
function bf_disable_email_free( $recipient, $order ) {
	$page = $_GET['page'] = isset( $_GET['page'] ) ? $_GET['page'] : '';
	if ( 'wc-settings' === $page ) {
		return $recipient;
	}
	if ( (float) $order->get_total() === '0.00' ) {
		$recipient = '';
	}
	return $recipient;
}
add_filter( 'woocommerce_email_recipient_customer_completed_order', 'bf_disable_email_free', 10, 2 );
