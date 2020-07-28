<?php
/**
 * Función que muestra mensaje cuando queda poco stock.
 */
function bf_low_stock( $text, $product ) {
	$stock = $product->get_stock_quantity();
	if (
		$product->is_in_stock() &&
		$product->managing_stock() &&
		$stock <= get_option( 'woocommerce_notify_low_stock_amount' ) ) {
		$text .= '. ¡Cómpralo ahora para evitar una espera de 5 días hasta nuevo stock!';
	}
	return $text;
}
add_filter( 'woocommerce_get_availability_text', 'bf_low_stock', 9999, 2 );
