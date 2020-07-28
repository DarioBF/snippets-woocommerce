<?php
/**
 * Script para permitir la compra de un producto solamente
 * si supera cierta cantidad
 */

/**
 * Controlamos la página de producto
 */
function bf_minimun_quantity_min( $min, $product ) {
	$quantity   = 50;
	$product_id = 243;
	if ( is_product() ) {
		if ( $product_id === $product->get_id() ) {
			$min = ceil( $quantity / $product->get_price() );
		}
	}

	return $min;
}
add_filter( 'woocommerce_quantity_input_min', 'bf_minimun_quantity_min', 9999, 2 );

/**
 * Controlamos el carrito
 */
function bf_quantity_min_cart( $product_quantity, $cart_item_key, $cart_item ) {
	$quantity   = 50;
	$product_id = 243;

	$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

	$min = 0;
	if ( $product_id === $_product->get_id() ) {
		$min = ceil( $quantity / $_product->get_price() );
	}
	$product_quantity = woocommerce_quantity_input(
		array(
			'input_name'   => "cart[{$cart_item_key}][qty]",
			'input_value'  => $cart_item['quantity'],
			'max_value'    => $_product->get_max_purchase_quantity(),
			'min_value'    => $min,
			'product_name' => $_product->get_name(),
		),
		$_product,
		false
	);

	return $product_quantity;
}
add_filter( 'woocommerce_cart_item_quantity', 'bf_quantity_min_cart', 9999, 3 );
