<?php
/**
 * Función que permite informar de cuándo se enviará el producto
 */
function bf_info_envio() {
	// Viernes, Sábado o Domingo -> Se enviará el lunes.
	if ( date( 'N' ) >= 5 ) {
		$del_day  = date( "l jS F", strtotime( 'next monday' ) );
		$order_by = 'el lunes';
	}

	// De Lunes a Jueves, después de las 3PM -> Se envía mañana.
	elseif ( date( 'H' ) >= 15 ) {
		$del_day  = date( "l jS F", strtotime( 'tomorrow' ) );
		$order_by = 'mañana';
	} 

	// De Lunes a Jueves antes de las 3PM -> Se envía hoy.
	else {
		$del_day  = date( "l jS F", strtotime( 'today' ) );
		$order_by = 'hoy';
	}

	$html = '<br><div class="woocommerce-message" style="clear:both">Pide antes de las 3PM ' . $order_by . ' para que enviemos ' . $del_day . '</div>';

	echo $html;
}
add_action( 'woocommerce_after_add_to_cart_form', 'bf_info_envio' );
