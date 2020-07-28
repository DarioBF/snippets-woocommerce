<?php
/**
 * Función que añade opción de propia al checkout
 */
function bf_checkout_tips() {
	$product_ids = array( 451, 452, 453 ); // Reemplaza los IDs por los productos de propina
	$in_cart     = false;
	foreach ( WC()->cart->get_cart() as $cart_item ) {
		$product_in_cart = $cart_item['product_id'];
		if ( in_array( $product_in_cart, $product_ids ) ) {
			$in_cart = true;
			break;
		}
	}
	if ( ! $in_cart ) {
		echo '<h4>¿Añadir propia?</h4>';
		echo '<p><a class="button" style="margin-right: 1em; width: auto" href="?add-to-cart=451"> €5 </a><a class="button" style="margin-right: 1em; width: auto" href="?add-to-cart=452"> €20 </a><a class="button" style="width: auto" href="?add-to-cart=453"> €50 </a></p>';
	}
}
add_action( 'woocommerce_review_order_before_submit', 'bf_checkout_tips', 9999 );
