<?php
/**
 * Función que muestra selector de categoría
 * jQuery required
 */
function bf_dropdown_product_cats() {
	if ( is_product_category() ) {
		wc_product_dropdown_categories();
	}
	wc_enqueue_js(
		"
		$('#product_cat').change(function () {
			location.href = '/categoria-producto/' + $(this).val();
		});
		"
	);
}
add_action( 'woocommerce_before_shop_loop', 'bf_dropdown_product_cats', 31 );
