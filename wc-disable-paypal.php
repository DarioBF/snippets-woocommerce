<?php
/**
 * Desactivar PayPal si el importe es superior a 50 euros.
 */
function bf_disable_paypal_above_50( $available_gateways ) {
	$max = 50;
	if ( WC()->cart->total > $max ) {
		unset( $available_gateways['paypal'] );
	}
	return $available_gateways;
}
add_filter( 'woocommerce_available_payment_gateways', 'bf_disable_paypal_above_50' );
