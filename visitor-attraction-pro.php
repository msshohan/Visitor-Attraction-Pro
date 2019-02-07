<?php

/*
Plugin Name:  Visitor Attraction Pro
Plugin URI:   https://www.mswebarts.com/visitor-attraction-pro
Description:  Visitor attraction pro has extremely powerful and effective modules to attract and turn your visitors into customers. It has popup ( subscriber, social share/follow, coupon code, countdown timer ), slider with or without popup, feedback tool, notification catcher, live chat ( FB, Skype, Intercom ) modules with lots of options.
Version:      1.0
Author:       MS Web Arts
Author URI:   https://www.mswebarts.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  visitor-attraction-pro
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if( !class_exists( 'acf_pro' ) ) {
    require( 'libs/advanced-custom-fields-pro-master/acf.php' );
}

if( class_exists( 'acf_pro' ) ) {
    require_once ( 'acf-import.php' );
}

require_once ( 'modules/ms-simple-popup.php' );
require_once ( 'modules/ms-notification.php' );
require_once ( 'modules/ms-simple-slider.php' );

// live chat loading

require_once ( 'modules/ms-fb-live-chat.php' );

// MS Simple Popup activation hooks

require( dirname(__FILE__) . '/visitor-attraction-pro-activation.php' );
register_activation_hook( __FILE__, 'ms_popup_mail_list_database' );

// MS Simple Popup deactivation hooks

register_deactivation_hook( __FILE__, 'ms_popup_deactivation' );

// load ms feedback tool

require_once( 'modules/backend.php' );
require_once( 'modules/ms-feedback-tool.php' );
require_once( 'modules/ms-skype-chat.php' );

// Assign a global variable

$plugin_url = WP_PLUGIN_URL . 'visitor-attraction-pro';

// Register popup post type

add_action( 'init', 'ms_simple_popup' );

function ms_simple_popup() {
    $labels = array(
        'name'               => _x( 'Edit Popup', 'post type general name', 'visitor-attraction-pro' ),
        'singular_name'      => _x( 'MS Popup', 'post type singular name', 'visitor-attraction-pro' ),
        'menu_name'          => _x( 'MS Popup', 'admin menu', 'ms-simple-popup' ),
        'name_admin_bar'     => _x( 'MS Popup', 'add popup on admin bar', 'visitor-attraction-pro' ),
        'add_new'            => _x( 'Add New Popup', 'Popup', 'visitor-attraction-pro' ),
        'add_new_item'       => __( 'Add New Popup', 'visitor-attraction-pro' ),
        'new_item'           => __( 'New Popup', 'ms-simple-popup' ),
        'edit_item'          => __( 'Edit Popup', 'visitor-attraction-pro' ),
        'view_item'          => __( 'View Popup', 'visitor-attraction-pro' ),
        'all_items'          => __( 'All Popups', 'visitor-attraction-pro' ),
        'search_items'       => __( 'Search Popups', 'visitor-attraction-pro' ),
        'parent_item_colon'  => __( 'Parent Popups:', 'visitor-attraction-pro' ),
        'not_found'          => __( 'No Popups found.', 'visitor-attraction-pro' ),
        'not_found_in_trash' => __( 'No Popups found in Trash.', 'visitor-attraction-pro' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'visitor-attraction-pro' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'ms-popup' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => plugins_url ('/visitor-attraction-pro/assets/images/ms-simple-popup.png' ),
    );
    register_post_type( 'ms-simple-popup', $args );
}

// register MS Slider post type

add_action( 'init', 'ms_slider' );

function ms_slider() {
    $labels = array(
        'name'               => _x( 'Slider', 'post type general name', 'visitor-attraction-pro' ),
        'singular_name'      => _x( 'MS Slider', 'post type singular name', 'visitor-attraction-pro' ),
        'menu_name'          => _x( 'MS Slider', 'admin menu', 'visitor-attraction-pro' ),
        'name_admin_bar'     => _x( 'MS Slider', 'add slider on admin bar', 'visitor-attraction-pro' ),
        'add_new'            => _x( 'Add New Slider', 'Slider', 'visitor-attraction-pro' ),
        'add_new_item'       => __( 'Add New Slider', 'visitor-attraction-pro' ),
        'new_item'           => __( 'New Slider', 'visitor-attraction-pro' ),
        'edit_item'          => __( 'Edit Slider', 'visitor-attraction-pro' ),
        'view_item'          => __( 'View Slider', 'visitor-attraction-pro' ),
        'all_items'          => __( 'All Sliders', 'visitor-attraction-pro' ),
        'search_items'       => __( 'Search Sliders', 'visitor-attraction-pro' ),
        'parent_item_colon'  => __( 'Parent Sliders:', 'visitor-attraction-pro' ),
        'not_found'          => __( 'No Sliders found.', 'visitor-attraction-pro' ),
        'not_found_in_trash' => __( 'No Sliders found in Trash.', 'visitor-attraction-pro' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'visitor-attraction-pro' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'ms-slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
    );

    register_post_type( 'ms-simple-slider', $args );
}

// register MS Web Notification post type

add_action( 'init', 'ms_web_notification' );

function ms_web_notification() {
    $labels = array(
        'name'               => _x( 'Web Notification', 'post type general name', 'visitor-attraction-pro' ),
        'singular_name'      => _x( 'MS Web Notification', 'post type singular name', 'visitor-attraction-pro' ),
        'menu_name'          => _x( 'MS Web Notification', 'admin menu', 'visitor-attraction-pro' ),
        'name_admin_bar'     => _x( 'MS Web Notification', 'add web notification on admin bar', 'visitor-attraction-pro' ),
        'add_new'            => _x( 'Add New Web Notification', 'Web Notification', 'visitor-attraction-pro' ),
        'add_new_item'       => __( 'Add New Web Notification', 'visitor-attraction-pro' ),
        'new_item'           => __( 'New Web Notification', 'visitor-attraction-pro' ),
        'edit_item'          => __( 'Edit Web Notification', 'visitor-attraction-pro' ),
        'view_item'          => __( 'View Web Notification', 'visitor-attraction-pro' ),
        'all_items'          => __( 'All Web Notifications', 'visitor-attraction-pro' ),
        'search_items'       => __( 'Search Web Notifications', 'visitor-attraction-pro' ),
        'parent_item_colon'  => __( 'Parent Web Notifications:', 'visitor-attraction-pro' ),
        'not_found'          => __( 'No Web Notifications found.', 'visitor-attraction-pro' ),
        'not_found_in_trash' => __( 'No Web Notifications found in Trash.', 'visitor-attraction-pro' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'visitor-attraction-pro' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'ms-web-notification' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
    );

    register_post_type( 'ms-web-notification', $args );
}

/* load admin css */

function ms_popup_enqueue_admin_styles() {

    wp_enqueue_style( 'ms_popup_admin_bootstrap', plugins_url( 'visitor-attraction-pro/assets/css/bootstrap.min.css', '', '4.0.0', 'all' ) );
    wp_enqueue_style( 'ms_popup_admin_datatables_css', plugins_url( 'visitor-attraction-pro/assets/css/dataTables.bootstrap.min.css', '', '1.10.12', 'all' ) );
    wp_enqueue_style( 'ms_popup_admin_datatables_buttons_css', plugins_url( 'visitor-attraction-pro/assets/css/buttons.bootstrap.min.css', '', '1.2.2', 'all' ) );
    wp_enqueue_style( 'ms_popup_admin_css', plugins_url('visitor-attraction-pro/assets/css/admin.css'), '', '1.0.0', 'all' );
}
add_action( 'admin_head', 'ms_popup_enqueue_admin_styles' );

function ms_popup_enqueue_admin_js() {

    wp_enqueue_script( 'ms_popup_admin_bootstrap_js', plugin_dir_url( __FILE__ ) . 'assets/js/bootstrap.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'ms_popup_admin_font_awesome_js', plugin_dir_url( __FILE__ ) . 'assets/js/font-awesome-all.js', '', '5.0.7', true );

    /* data tables */

    wp_enqueue_script( 'ms_popup_admin_data_tables', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.dataTables.min.js', array( 'jquery' ), '1.10.17', true );
    wp_enqueue_script( 'ms_popup_admin_data_tables_buttons', plugin_dir_url( __FILE__ ) . 'assets/js/dataTables.buttons.min.js', array( 'jquery' ), '1.2.2', true );
    wp_enqueue_script( 'ms_popup_admin_data_tables_colVis', plugin_dir_url( __FILE__ ) . 'assets/js/buttons.colVis.min.js', array( 'jquery' ), '1.2.2', true );
    wp_enqueue_script( 'ms_popup_admin_data_tables_html5_buttons', plugin_dir_url( __FILE__ ) . 'assets/js/buttons.html5.min.js', array( 'jquery' ), '1.2.2', true );
    wp_enqueue_script( 'ms_popup_admin_data_tables_buttons_print', plugin_dir_url( __FILE__ ) . 'assets/js/buttons.print.min.js', array( 'jquery' ), '1.2.2', true );
    wp_enqueue_script( 'ms_popup_admin_data_tables_bootstrap', plugin_dir_url( __FILE__ ) . 'assets/js/dataTables.bootstrap4.min.js', array( 'jquery' ), '1.10.16', true );
    wp_enqueue_script( 'ms_popup_admin_data_tables_buttons_bootstrap', plugin_dir_url( __FILE__ ) . 'assets/js/buttons.bootstrap4.min.js', array( 'jquery' ), '1.5.1', true );
    wp_enqueue_script( 'ms_popup_admin_data_tables_jszip', plugin_dir_url( __FILE__ ) . 'assets/js/jszip.min.js', array( 'jquery' ), '2.5.0', true );
    wp_enqueue_script( 'ms_popup_admin_js', plugin_dir_url( __FILE__ ) . 'assets/js/admin.js', array( 'jquery' ), '1.0.0', true );

}
add_action( 'admin_enqueue_scripts', 'ms_popup_enqueue_admin_js' );

/* load css files for front end */

function ms_popup_enqueue_styles() {

    wp_enqueue_style( 'ms_popup_bootstrap', plugins_url( 'visitor-attraction-pro/assets/css/ms-bootstrap.css' ), '', '1.1.0', 'all' );
    wp_enqueue_style( 'ms_popup_lightlayer', plugins_url( 'visitor-attraction-pro/assets/css/lightlayer.min.css' ), '', '2.2.2', 'all' );
    wp_enqueue_style( 'ms_popup_animate', plugins_url( 'visitor-attraction-pro/assets/css/animate.css' ), '', '3.5.2', 'all' );
    wp_enqueue_style( 'ms_popup_font_awesome_css', plugins_url( 'visitor-attraction-pro/assets/css/fontawesome-all.css' ), '', '5.0.7', 'all' );
    wp_enqueue_style( 'ms_slider_carousel', plugins_url( 'visitor-attraction-pro/assets/css/owl.carousel.min.css' ), '', '2.2.1', 'all' );
    wp_enqueue_style( 'ms_slider_carousel_theme', plugins_url( 'visitor-attraction-pro/assets/css/owl.theme.default.min.css' ), '', '2.2.1', 'all' );
    wp_enqueue_style( 'ms_popup_style', plugins_url( 'visitor-attraction-pro/assets/css/style.css' ), '', '1.1.2', 'all' );

}
add_action( 'wp_enqueue_scripts', 'ms_popup_enqueue_styles', 23428346, 1 );

/* load required js files */

function ms_popup_enqueue_js() {

    wp_enqueue_script( 'ms_popup_bootstrap_js', plugin_dir_url( __FILE__ ) . 'assets/js/bootstrap.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'ms_popup_popper_js', plugin_dir_url( __FILE__ ) . 'assets/js/popper.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'ms_popup_lightlayer_js', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.lightlayer.min.js', array( 'jquery' ), '2.2.2', true );
    wp_enqueue_script( 'ms_slider_carousel_js', plugin_dir_url( __FILE__ ) . 'assets/js/owl.carousel.min.js', array( 'jquery' ), '2.2.1', true );
    wp_enqueue_script( 'ms_popup_countdown_js', plugin_dir_url( __FILE__ ) . 'assets/js/countdown.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'ms_popup_jquery_validate_js', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.validate.1.15.0.min.js', array( 'jquery' ), '1.15.0', true );
    wp_register_script( 'ms_skype_sdk_js', plugin_dir_url( __FILE__ ) . 'assets/js/skype-sdk.min.js', '', '1.0.0' );
    wp_register_script( 'ms_popup_main_js', plugin_dir_url( __FILE__ ) . 'assets/js/main.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'ms_popup_main_js' );

    $ms_popup_id = get_field('ms_popup_select_to_use', get_the_ID() );
    $ms_notification_id = get_field('ms_notification_select_to_use', get_the_ID() );
    $ms_slider_id = get_field('ms_slider_popup_select_to_use', get_the_ID() );
    $ms_slider_general_settings = get_field( 'ms_slider_general_settings', $ms_slider_id );
    $ms_slider_responsive_settings = get_field( 'ms_slider_responsive_settings', $ms_slider_id );

    $popup_passed_data = array(
        'time' => get_field( 'ms_popup_delay_to_popup', $ms_popup_id ),
        'clock_enabled' => get_field( 'ms_popup_countdown_timer_options', $ms_popup_id ),
        'expire_year' => get_field( 'ms_popup_countdown_expire_year', $ms_popup_id ),
        'expire_month' => get_field( 'ms_popup_countdown_expire_month', $ms_popup_id ),
        'expire_days' => get_field( 'ms_popup_countdown_expire_days', $ms_popup_id ),
        'expire_hours' => get_field( 'ms_popup_countdown_expire_hours', $ms_popup_id ),
        'expire_min' => get_field( 'ms_popup_countdown_expire_min', $ms_popup_id ),
        'expire_sec' => get_field( 'ms_popup_countdown_expire_sec', $ms_popup_id ),
        'layer_background' => get_field( 'ms_popup_background_layer_color', $ms_popup_id ),
        'layer_opacity' => get_field( 'ms_popup_layer_background_opacity', $ms_popup_id ),
        'popup_position' => get_field( 'ms_popup_position', $ms_popup_id ),
        'screen_size' => get_field( 'ms_popup_minimum_screen_size', $ms_popup_id ),

        /* MS Notification data pass */

        'note_custom_id' => get_field( 'ms_notifications_custom_id', $ms_notification_id ),
        'note_delay_type' => get_field( 'ms_notification_display_when', $ms_notification_id ),
        'note_delay_scroll' => get_field( 'ms_notification_display_scroll_down', $ms_notification_id ),
        'note_delay_milli_sec' => get_field( 'ms_notification_display_milli_seconds', $ms_notification_id ),

    );
    wp_localize_script( 'ms_popup_main_js', 'ms_data', $popup_passed_data );
}
add_action( 'wp_enqueue_scripts', 'ms_popup_enqueue_js', 346834324, 1 );