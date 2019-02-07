<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    function ms_feedback_frontend_init() {
        if( get_field( 'ms_enable_feedback_tool', 'option' ) ) :
?>

<?php
    $option_selection = get_field( 'ms_feedback_display_on', 'option' );
    $match_urls = get_field( 'ms_feedback_pages_to_show_on', 'option' );
    $non_match_urls = get_field( 'mss_feedback_pages_not_to_show_on', 'option' );
?>

<?php if( $option_selection == 'all' ) : ?>

    <?php require( dirname(__FILE__) . '/../inc/ms-feedback-content.php' ); ?>

<?php endif; ?>

<?php  // show on selected pages only ?>

<?php if( $option_selection == 'selected' ) : ?>

    <?php
        global $wp;
        $current_url = untrailingslashit(trim(home_url(add_query_arg(array(),$wp->request))));
        foreach ($match_urls as $match_url => $match_urls_value ) {
            $ms_match_url_target = untrailingslashit( $match_urls_value["ms_feedback_individual_urls"] );
            
            if( $current_url == $ms_match_url_target ) {
                require( dirname(__FILE__) . '/../inc/ms-feedback-content.php' );
            }
        }
    ?>

<?php endif; ?>

<?php // don't show on selected pages ?>

<?php if( $option_selection == 'not_selected' ) : ?>

    <?php
    global $wp;
    $current_url = untrailingslashit(trim(home_url(add_query_arg(array(),$wp->request))));

    foreach( $non_match_urls as $non_match_url_key ) {

        // check if current url exists in url key

        $check_non_match_url = array_search( $current_url , $non_match_url_key );

        if ( $check_non_match_url ) {
            $check_non_match_url;

            // if any value matches current url create an array

            $non_match_url_vars = array("check_non_match_url");
            $result = compact("non_match", "nothing_here", $non_match_url_vars);
        }
    }

    // now depending on the array created in foreach show the feedback

    if ( ! isset( $result ) && ! ( $result["check_non_match_url"] == "ms_feedback_dont_individual_urls" ) ) {
        require( dirname(__FILE__) . '/../inc/ms-feedback-content.php' );
    }

    ?>

<?php endif; endif; }
add_action( 'wp_footer', 'ms_feedback_frontend_init' );