<?php
/**
 * Función que ordena alfabéticamente los productos del carrito
 */
function bf_sort_cart_az() {
	// Recogemos la información de los productos del carrito.
	$products_in_cart = array();
	foreach ( WC()->cart->get_cart_contents() as $key => $item ) {
		$products_in_cart[ $key ] = $item['data']->get_title();
	}
	// Ordenamos los productos por orden alfabético.
	natsort( $products_in_cart );

	// Reasignamos los productos al carrito.
	$cart_contents = array();
	foreach ( $products_in_cart as $cart_key => $product_title ) {
		$cart_contents[ $cart_key ] = WC()->cart->cart_contents[ $cart_key ];
	}
	WC()->cart->cart_contents = $cart_contents;
}
add_action( 'woocommerce_cart_loaded_from_session', 'bf_sort_cart_az' );
