<?php
/**
 * Función que añade imagen de compra segura en el checkout
 */
function bf_trust_image() {
	echo '<img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/na/us/logo-center/9_bdg_secured_by_pp_2line.png" style="margin: 1em auto">';
}
add_action( 'woocommerce_review_order_after_submit', 'bf_trust_image' );
