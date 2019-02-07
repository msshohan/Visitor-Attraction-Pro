<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}

	global $post;

	/* MS Popup shortcode */

	function ms_simple_popup_init() {
		echo do_shortcode ('[ms-popup id = '. get_field( 'ms_popup_select_to_use', $post->ID ) .' popup="true"]');
	}
	add_action( 'wp_footer', 'ms_simple_popup_init' );

	function ms_simple_popup_shortcode( $atts, $content ) {
		ob_start();

		$ms_popup_atts = shortcode_atts( array(
			'id'   => '',
			'popup' => ''
		), $atts );
		?>

		<?php
			// Assign global variables
			$plugin_url = WP_PLUGIN_URL . '/visitor-attraction-pro';
		?>

		<!-- MS Popup -->

		<?php /* include the main ms popup file */
			include( dirname(__FILE__) . '/../inc/shortcode-content/ms-popup/ms-popup.php' ); 
		?>

		<?php
		$popup = ob_get_clean();
		return $popup;
	}
	add_shortcode( 'ms-popup', 'ms_simple_popup_shortcode' );