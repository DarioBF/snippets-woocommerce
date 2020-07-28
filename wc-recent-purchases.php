<?php
/**
 * Función para mostrar contactor de compras recientes.
 */
function bf_purchases_counter() {
	global $product;

	// Todas las compras del último mes.
	$all_orders = wc_get_orders(
		array(
			'limit'      => -1,
			'status'     => array_map( 'wc_get_order_status_name', wc_get_is_paid_statuses() ),
			'date_after' => date( 'Y-m-d', strtotime( '-1 month' ) ),
			'return'     => 'ids',
		)
	);

	// Sumamos todas las unidades compradas
	$count = 0;
	foreach ( $all_orders as $all_order ) {
		$order = wc_get_order( $all_order );
		$items = $order->get_items();
		foreach ( $items as $item ) {
			$product_id = $item->get_product_id();
			if ( $product_id === $product->get_id() ) {
				$count += absint( $item['qty'] );
			}
		}
	}

	if ( $count > 0 ) {
		echo '<p>Compras recientes: $count</p>';
	}
}
add_action( 'woocommerce_single_product_summary', 'bf_purchases_counter', 11 );
