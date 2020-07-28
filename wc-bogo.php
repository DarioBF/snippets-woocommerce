<?php
/**
 * Técnica BOGO (Buy One Get One) sin plugin en WooCommerce
 */
function bf_bogo_promotion() {
	if ( is_admin() || WC()->cart->is_empty() ) {
		return;
	}

	// Reemplaza por tus los IDs de productos que quieras
	$producto_comprado_id = 32;
	$producto_regalado_id = 57;

	// ¿Producto comprado en el carrito?
	$producto_comprado_carrito_id = WC()->cart->generate_cart_id( $producto_comprado_id );
	$producto_comprado_carrito    = WC()->cart->find_product_in_cart( $producto_comprado_carrito_id );

	// ¿Producto regalado en el carrito?
	$producto_regalado_carrito_id = WC()->cart->generate_cart_id( $producto_regalado_id );
	$producto_regalado_carrito    = WC()->cart->find_product_in_cart( $producto_regalado_carrito_id );

	if ( ! $producto_comprado_carrito ) {
		if ( $producto_regalado_carrito ) {
			WC()->cart->remove_cart_item( $producto_regalado_carrito );
		}
	} else {
		if ( ! $producto_regalado_carrito ) {
			WC()->cart->add_to_cart( $producto_regalado_id );
		}
	}
}
add_action( 'template_redirect', 'bf_bogo_promotion' );
