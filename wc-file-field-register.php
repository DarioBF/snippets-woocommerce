<?php
/**
 * Añadir campo de "Subir fichero" al registro de WooCommerce
 */

// 1. Añadimos el input de tipo fichero al formulario de registro.
function bf_add_register_field() {
	?>
	<p class="form-row validate-required" id="image" data-priority=""><label for="image" class="">Image (JPG, PNG, PDF)<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type='file' name='image' accept='image/*,.pdf' required></span></p>
	<?php
}
add_action( 'woocommerce_register_form', 'bf_add_register_field' );

// 2. Validamos el nuevo campo.
function bf_register_fields_validation( $errors, $username, $email ) {
	if ( isset( $_POST['image'] ) && empty( $_POST['image'] ) ) {
		$errors->add( 'image_error', __( 'Please provide a valid image', 'woocommerce' ) );
	}
	return $errors;
}
add_filter( 'woocommerce_registration_errors', 'bf_register_fields_validation', 10, 3 );

// Guardamos la información del nuevo campo.
function bf_save_register_fields( $customer_id ) {
	if ( isset( $_FILES['image'] ) ) {
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );
		$attachment_id = media_handle_upload( 'image', 0 );
		if ( is_wp_error( $attachment_id ) ) {
			update_user_meta( $customer_id, 'image', $_FILES['image'] . ": " . $attachment_id->get_error_message() );
		} else {
			update_user_meta( $customer_id, 'image', $attachment_id );
		}
	}
}
add_action( 'user_register', 'bf_save_register_fields', 1 );

// Añadimos compatibilidad con imágenes
function bf_add_enctype() {
	echo 'enctype="multipart/form-data"';
}
add_action( 'woocommerce_register_form_tag', 'bf_add_enctype' );
