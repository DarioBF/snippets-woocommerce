<?php
/**
 * Función que desactiva redirección del checkout cuando
 * el carrito está vacío.
 */
add_filter( 'woocommerce_checkout_redirect_empty_cart', '__return_false' );
add_filter( 'woocommerce_checkout_update_order_review_expired', '__return_false' );
