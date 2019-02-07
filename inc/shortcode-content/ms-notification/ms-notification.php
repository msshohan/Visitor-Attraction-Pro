<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
?>

<?php

	if( get_field( "ms_notification_box_style", $ms_notification_atts["id"] ) == "classic" ) {
	
		include( dirname(__FILE__) . "/classic.php" );

	} elseif( get_field( "ms_notification_box_style", $ms_notification_atts["id"] ) == "flat" ) {

		include( dirname(__FILE__) . "/flat.php" );

	} else {

		include( dirname(__FILE__) . "/modern.php" );

	}

	include( dirname(__FILE__) . "/ms-notification-style.php" );