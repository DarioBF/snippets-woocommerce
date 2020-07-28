<?php
/**
 * Función que realiza descuento si compramos más de 5 productos.
 */
function bf_checkout_bulk_discount() {
	$coupon_code = 'descuentazo'; // Reemplaza por tu cupón
	if ( WC()->cart->get_cart_contents_count() > 5 ) {
		if ( ! WC()->cart->has_discount( $coupon_code ) ) {
			WC()->cart->add_discount( $coupon_code );
		}
	} else {
		if ( WC()->cart->has_discount( $coupon_code ) ) {
			WC()->cart->remove_coupon( $coupon_code );
		}
	}
}
add_action( 'woocommerce_before_cart', 'bf_checkout_bulk_discount' );
