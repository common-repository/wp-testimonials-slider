<?php
/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function wp_testimonial_add_meta_box() {
	$screens = array( 'testimonial' );
	foreach ( $screens as $screen ) {
		add_meta_box(
			'wp_testimonial_sectionid',
			__( 'Client Details', 'wp_testimonial_slider' ),
			'wp_testimonial_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'wp_testimonial_add_meta_box' );

function wp_testimonial_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'wp_testimonial_meta_box', 'wp_testimonial_meta_box_nonce' );

	$designation = get_post_meta( $post->ID, 'designation', true );
	$company_name = get_post_meta( $post->ID, 'company_name', true );
	$company_url = get_post_meta( $post->ID, 'company_url', true );

	
	echo '<div class="clinet_info"><label for="designation">';
	_e( 'Client Designation', 'wp_testimonial_slider' );
	echo '</label> ';
	echo '<input type="text" id="designation" name="designation" value="' . esc_attr( $designation ) . '" size="25" /></div>';
	
	echo '<div class="clinet_info"><label for="company_name">';
	_e( 'Client Company Name', 'wp_testimonial_slider' );
	echo '</label> ';
	echo '<input type="text" id="company_name" name="company_name" value="' . esc_attr( $company_name ) . '" size="25" /></div>';
	
	echo '<div class="clinet_info"><label for="company_url">';
	_e( 'Client Company URL', 'wp_testimonial_slider' );
	echo '</label> ';
	echo '<input type="text" id="company_url" name="company_url" value="' . esc_attr( $company_url ) . '" size="25" /></div>';
}

function wp_testimonial_save_meta_box_data( $post_id ) {

	// Check if our nonce is set.
	if ( ! isset( $_POST['wp_testimonial_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['wp_testimonial_meta_box_nonce'], 'wp_testimonial_meta_box' ) ) {
		return;
	}

	// Sanitize user input.
	$designation_data = sanitize_text_field( $_POST['designation'] );
	$company_name_data = sanitize_text_field( $_POST['company_name'] );
	$company_url_data = sanitize_text_field( $_POST['company_url'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'designation', $designation_data );
	update_post_meta( $post_id, 'company_name', $company_name_data );
	update_post_meta( $post_id, 'company_url', $company_url_data );
}
add_action( 'save_post', 'wp_testimonial_save_meta_box_data' );