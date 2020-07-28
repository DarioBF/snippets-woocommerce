<?php
/**
 * Añadimos shortcode para mostrar los productos vistos recientemente.
 */
function bf_recent_viewed_products() {

	$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', wp_unslash( $_COOKIE['woocommerce_recently_viewed'] ) ) : array();
	$viewed_products = array_reverse( array_filter( array_map( 'absint', $viewed_products ) ) );

	if ( empty( $viewed_products ) ) {
		return;
	}

	$title       = '<h3>Productos vistos recientemente</h3>';
	$product_ids = implode( ',', $viewed_products );

	return $title . do_shortcode( "[products ids='$product_ids']" );

}
add_shortcode( 'productos_vistos_recientemente', 'bf_recent_viewed_products' );
