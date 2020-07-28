<?php
/**
 * Add CC BCC to WooCommerce email
 */
function bf_add_cc_bcc_email( $headers, $email_id, $order ) {
	if ( 'customer_completed_order' === $email_id ) {
		$headers .= "Cc: Name <your@email.com>\r\n";
		$headers .= "Bcc: Name <your@email.com>\r\n";
	}
	return $headers;
}
add_filter( 'woocommerce_email_headers', 'bf_add_cc_bcc_email', 9999, 3 );
