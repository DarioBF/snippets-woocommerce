<?php
/**
 * Función que añade producto al carrito al visitar página
 */
function bf_auto_add_to_cart() {
	// Qué producto queremos añadir.
	$product_id = 243;

	// Si el carrito está vacío, añadimos el producto.
	if ( is_front_page() && WC()->cart->get_cart_contents_count() === 0 ) {
		WC()->cart->add_to_cart( $product_id );
	}
}
add_action( 'template_redirect', 'bf_auto_add_to_cart' );
