<?php
/**
 * Función para cambiar el label del botón "Añadir al carrito"
 * si el producto ya ha sido añadido.
 */

/**
 * Modificamos el label en la página de producto.
 */
function bf_add_cart_label_already_single( $label ) {
	foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
		$product = $values['data'];
		if ( get_the_ID() === $product->get_id() ) {
			$label = __( 'Añadido. ¿Añadir otro?', 'woocommerce' );
		}
	}
	return $label;
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'bf_add_cart_label_already_single' );

/**
 * Modificamos el label en el catálogo de productos.
 */
function bf_add_cart_label_already_loop( $label, $product ) {
	if ( $product->get_type() === 'simple' && $product->is_purchasable() && $product->is_in_stock() ) {

		foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
			$_product = $values['data'];
			if ( get_the_ID() === $_product->get_id() ) {
			$label = __( 'Añadido. ¿Añadir otro?', 'woocommerce' );
			}
		}
	}
	return $label;
}
add_filter( 'woocommerce_product_add_to_cart_text', 'bf_add_cart_label_already_loop', 99, 2 );
