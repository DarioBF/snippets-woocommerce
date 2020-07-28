<?php
/**
 * Función para cambiar el número de productos por página
 */
function bf_custom_products_per_page( $per_page ) {
	$per_page = 20;
	return $per_page;
}
add_filter( 'loop_shop_per_page', 'bf_custom_products_per_page', 9999 );
