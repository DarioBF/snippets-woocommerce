<?php
/**
 * Función que elimina producto del carrito automáticamente.
 */
function bf_remove_from_cart_auto() {
	$product_id      = 282; // Modifica el id de producto aquí
	$product_cart_id = WC()->cart->generate_cart_id( $product_id );
	$cart_item_key   = WC()->cart->find_product_in_cart( $product_cart_id );

	if ( $cart_item_key ) {
		WC()->cart->remove_cart_item( $cart_item_key );
	}
}
add_action( 'template_redirect', 'bf_remove_from_cart_auto' );
