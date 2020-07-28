<?php
/**
 * Función que nos permite cambiar la forma de ordenar el catálogo de WooCommerce
 */
function bf_catalog_orderby( $sort_by ) {
	/**
	 * Posible values: menu_order, popularity, rating, date, price, price-desc, rand
	 */
	return 'date';
}
add_filter( 'woocommerce_default_catalog_orderby', 'bf_catalog_orderby' );
