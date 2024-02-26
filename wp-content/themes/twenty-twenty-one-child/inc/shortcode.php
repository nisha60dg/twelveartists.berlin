<?php


function art_search_form() {
	$search_form = '<form method="get" id="search-form-alt" action="'. esc_url(home_url('/')) .'" class="custom_search">		
		<input type="text" name="s" id="s" placeholder="Search.." class="search_field search-autocomplete" autocomplete="off" > 
		<input type="button" class="search_btn" value="&#xf179" /> 
		<div class="search_result"><ul></ul></div>
	</form>';
	return $search_form;
}
add_shortcode('art_search', 'art_search_form');


function ja_global_enqueues() {

	wp_enqueue_style(
		'jquery-auto-complete',
		'https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css',
		array(),
		'1.0.7'
	);

	wp_enqueue_script(
		'jquery-auto-complete',
		'https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js',
		array( 'jquery' ),
		'1.0.7',
		true
	);

	wp_enqueue_script(
		'global',
		get_stylesheet_directory_uri() . '/js/global.js',
		array( 'jquery' ),
		'1.0.0',
		true
	);

	wp_localize_script(
		'global',
		'global',
		array(
			'ajax' => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'ja_global_enqueues' );

/**
 * Live autocomplete search feature.
 *
 * @since 1.0.0
 */
function ja_ajax_search() {

	$results = new WP_Query( array(
		'post_type'     => array( 'post', 'page' ),
		'post_status'   => 'publish',
		'nopaging'      => true,
		'posts_per_page'=> 100,
		's'             => stripslashes( $_POST['search'] ),
	) );

	$items = array();

	if ( !empty( $results->posts ) ) {
		foreach ( $results->posts as $result ) {
			$items[] = $result->post_title;
		}
	}

	wp_send_json_success( $items );
}
add_action( 'wp_ajax_search_site',        'ja_ajax_search' );
add_action( 'wp_ajax_nopriv_search_site', 'ja_ajax_search' );

?>