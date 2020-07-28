<?php
/**
 * Aviso de envío gratis en base a umbral de gasto mínimo.
 */
function bf_free_shipping_cart_notice() {
	$umbral = 50; // Reemplaza aquí por tu umbral
	$current = WC()->cart->get_subtotal();
	if ( $current < $umbral ) {
		wc_print_notice( '¡Gasta ' . wc_price( $umbral - $current ) . ' más y el envío será gratis!', 'notice' );
	}
}
add_action( 'woocommerce_before_cart', 'bf_free_shipping_cart_notice' );
