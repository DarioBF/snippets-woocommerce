<?php
/**
 * Ocultar otros métodos de envío cuando el envío gratuito está disponible.
 */
function bf_only_free_shipping( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'bf_only_free_shipping', 100 );
