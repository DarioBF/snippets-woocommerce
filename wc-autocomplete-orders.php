<?php
/**
 * Autocompletar pedidos pagados.
 */
function bf_autocomplete_orders() {
	return 'completed';
}
add_filter( 'woocommerce_payment_complete_order_status', 'bf_autocomplete_orders', 9999 );