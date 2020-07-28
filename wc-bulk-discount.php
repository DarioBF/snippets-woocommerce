<?php
/**
 * Función para hacer descuento por compra masiva de productos.
 */
function bf_bulk_discount( $cart ) {
	if ( ( is_admin() && ! defined( 'DOING_AJAX' ) ) || did_action( 'woocommerce_before_calculate_totals' ) >= 2 ) {
		return;
	}

	// Define los parámetros de umbral y descuento a aplicar.
	$umbral1    = 101;
	$descuento1 = 0.05;
	$umbral2    = 501;
	$descuento2 = 0.1;

	foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
		if ( $cart_item['quantity'] >= $umbral1 && $cart_item['quantity'] < $umbral2 ) {
			$price = round( $cart_item['data']->get_price() * ( 1 - $descuento1 ), 2 );
			$cart_item['data']->set_price( $price );
		} elseif ( $cart_item['quantity'] >= $umbral2 ) {
			$price = round( $cart_item['data']->get_price() * ( 1 - $descuento2 ), 2 );
			$cart_item['data']->set_price( $price );
		}
	}
}
add_action( 'woocommerce_before_calculate_totals', 'bf_bulk_discount', 9999 );
