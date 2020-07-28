<?php
/**
 * Función que prioriza los productos en stock.
 */
function bf_priorize_stock( $args ) {
	$args['orderby']  = 'meta_value';
	$args['order']    = 'ASC';
	$args['meta_key'] = '_stock_status';
	return $args;
}
add_filter( 'woocommerce_get_catalog_ordering_args', 'bf_priorize_stock', 9999 );
