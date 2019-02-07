<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $ms_popup_version;
$ms_popup_version = '1.0';

function ms_popup_mail_list_database() {
	global $wpdb;
	global $ms_popup_version;

	/* popup database */

	global $popup_subscribers;
	$popup_subscribers = $wpdb->prefix . 'ms_popup_submit';
	$feedback_subscribers = $wpdb->prefix . 'ms_feedback_submit';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $popup_subscribers (
		ms_popup_id mediumint(9) NOT NULL AUTO_INCREMENT,
		ms_popup_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		ms_popup_name varchar(100) NOT NULL,
		ms_popup_email varchar(100) NOT NULL,
		ms_popup_mailto varchar(100) DEFAULT '' NOT NULL,
		PRIMARY KEY  (ms_popup_id)
	);";

	$sql2 = "CREATE TABLE $feedback_subscribers (
		ms_feedback_id mediumint(9) NOT NULL AUTO_INCREMENT,
		ms_feedback_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		ms_feedback_emoji varchar(100) NOT NULL,
		ms_feedback_email varchar(100) NOT NULL,
		ms_feedback varchar(100) NOT NULL,
		PRIMARY KEY  (ms_feedback_id)
	);";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	dbDelta( $sql2 );
	add_option( 'ms_popup_version', $ms_popup_version );
}

function ms_popup_deactivation() {

     global $wpdb;
     $popup_subscribers = $wpdb->prefix . 'ms_popup_submit';
     $feedback_subscribers = $wpdb->prefix . 'ms_feedback_submit';
     $sql = "DROP TABLE IF EXISTS $popup_subscribers";
     $sql2 = "DROP TABLE IF EXISTS $feedback_subscribers";
     $wpdb->query($sql);
     $wpdb->query($sql2);

}