<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}

	global $post;

	/* MS Notification Popup */

	function ms_notification_init() {
		echo do_shortcode ('[ms-notification id = '. get_field( 'ms_notification_select_to_use', $post->ID ) .' popup="true"]');
	}
	add_action( 'wp_footer', 'ms_notification_init' );

	function ms_notification_shortcode( $atts, $content ) {
		ob_start();

		$ms_notification_atts = shortcode_atts( array(
			'id'   => '',
			'popup' => ''
		), $atts );
		?>

		<!-- MS Notification -->

		<?php /* include the main ms notification file */
			include( dirname(__FILE__) . '/../inc/shortcode-content/ms-notification/ms-notification.php' );
		?>

		<?php
		$notification = ob_get_clean();
		return $notification;
	}
	add_shortcode( 'ms-notification', 'ms_notification_shortcode' );