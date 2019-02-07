<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>

<style type="text/css">
    /* style one/modern */
    .ms-notification {
        display: none;
        z-index: 999999999999;
    }
    .ms-notification-container-one {
        position: fixed;
        <?php $position = get_field('ms_notification_position', get_field('ms_notification_select_to_use', get_the_ID() ) );

        ?>

        <?php if( in_array( 'top', $position["ms_notification_enable_position"]) ) : ?>

            top: <?php echo $position["ms_notification_position_top"]; ?>%;

        <?php endif; ?>

        <?php if( in_array( 'left', $position["ms_notification_enable_position"]) ) : ?>

            left: <?php echo $position["ms_notification_position_left"]; ?>%;

        <?php endif; ?>

        <?php if( in_array( 'bottom', $position["ms_notification_enable_position"]) ) : ?>

            bottom: <?php echo $position["ms_notification_position_bottom"]; ?>%;

        <?php endif; ?>

        <?php if( in_array( 'right', $position["ms_notification_enable_position"]) ) : ?>

            right: <?php echo $position["ms_notification_position_right"]; ?>%;

        <?php endif; ?>

        width: 335px;
        min-width: 335px;
        max-width: 335px;
        min-height: 80px;
        color: #4d4d4d;
        font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
        font-size: 14px;
        font-weight: normal;
        cursor: pointer;
    }
    .ms-notification-container-one:hover {
        text-decoration: none;
    }
    .ms-notification-style-one.notification_box_wrap {
        position: relative;
        display: table;
        padding-bottom: 0px;
        min-width: 335px;
        max-width: 335px;
        height: auto;
        vertical-align: top;
        background-color: #fff;
        box-shadow: 0px 0px 7px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        cursor: pointer;
    }
    .ms-notification-style-one .left_area {
        display: table-cell;
        width: 80px;
        min-width: 80px;
        height: 100%;
        min-height: 80px;
        text-align: center;
        float: none;
    }
    .ms-notification-style-one .left_area .ms-notification-image {
        margin: 15px auto 15px auto;
        width: 50px;
        height: auto;
    }
    .ms-notification-style-one .left_area .ms-notification-image {
        width: 50px;
        height: auto;
        border-image: none;
    }
    .ms-notification-style-one .right_area {
        display: table-cell;
        padding-top: 10px;
        padding-left: 0px;
        padding-right: 30px;
        padding-bottom: 10px;
        max-width: 225px;
        width: 225px;
        height: auto;
        vertical-align: top;
        float: none;
        word-wrap: break-word;
    }
    .ms-notification-style-one .right_area .notification_title {
        color: #4d4d4d;
        font-size: 14px;
        line-height: 20px;
        font-weight: bold;
    }
    .ms-notification-style-one .right_area .notification_description {
        color: #4d4d4d;
        font-size: 14px;
        line-height: 20px;
    }
    .ms-notification-style-one .right_area .domain_name {
        margin-top: 4px;
        color: #7f7f7f;
        font-size: 12px;
        line-height: 16px;
    }
    .ms-notification .notification_box_wrap .ms_close_box {
        position: absolute;
        top: 0px;
        right: 0px;
        display: block;
        padding: 0px;
        width: 30px;
        min-width: 30px;
        height: 30px;
        min-height: 30px;
        vertical-align: middle;
        text-align: center;
        background-image: url(<?php echo plugins_url( 'visitor-attraction-pro/assets/images/close_default.png' ); ?>);
        background-repeat: no-repeat;
        background-position: center center;
        cursor: pointer;
        z-index: 99999999999;
    }
    .ms-notification .ms-notification-link {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    /* style two/flat */

    .ms-notification-container-two {
        position: fixed;
        background-color: #ffffff;
        color: #333333;

        <?php if( in_array( 'top', $position["ms_notification_enable_position"]) ) : ?>

            top: <?php echo $position["ms_notification_position_top"]; ?>%;

        <?php endif; ?>

        <?php if( in_array( 'left', $position["ms_notification_enable_position"]) ) : ?>

            left: <?php echo $position["ms_notification_position_left"]; ?>%;

        <?php endif; ?>

        <?php if( in_array( 'bottom', $position["ms_notification_enable_position"]) ) : ?>

            bottom: <?php echo $position["ms_notification_position_bottom"]; ?>%;

        <?php endif; ?>

        <?php if( in_array( 'right', $position["ms_notification_enable_position"]) ) : ?>

            right: <?php echo $position["ms_notification_position_right"]; ?>%;

        <?php endif; ?>

        width: 360px;
        color: #333333;
        font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
        font-size: 12px;
        font-weight: normal;
        cursor: pointer;
        object-position: 100% 50%;
    }
    .ms-notification-style-two.notification_box_wrap {
        position: relative;
        width: 100%;
        height: auto;
        background-color: #ffffff;
        color: #333333;
        box-shadow: 0px 1px 2px rgba(0,0,0,0.2);
        cursor: pointer;
    }
    .ms-notification-style-two .left_area {
        width: 80px;
        height: 100%;
        float: left;
    }
    .ms-notification-style-two .left_area .ms-notification-image {
        width: 80px;
        height: auto;
        border-image: none;
    }
    .ms-notification-style-two .right_area {
        padding-top: 10px;
        padding-left: 15px;
        padding-bottom: 10px;
        width: 260px;
        height: auto;
        float: left;
        word-wrap: break-word;
    }
    .ms-notification-style-two .right_area .notification_title {
        padding-bottom: 4px;
        font-size: 14px;
        line-height: 20px;
    }
    .ms-notification-style-two .right_area .notification_description {
        line-height: 16px;
        word-wrap: break-word;
    }
    .ms-notification-style-two .right_area .domain_name {
        margin-top: 4px;
        color: #7f7f7f;
        font-size: 12px;
        line-height: 16px;
    }

    /* style three/classic */

    .ms-notification-container-three {
        position: fixed;
        background-color: #ffffff;
        color: #333333;

        <?php if( in_array( 'top', $position["ms_notification_enable_position"]) ) : ?>

            top: <?php echo $position["ms_notification_position_top"]; ?>%;

        <?php endif; ?>

        <?php if( in_array( 'left', $position["ms_notification_enable_position"]) ) : ?>

            left: <?php echo $position["ms_notification_position_left"]; ?>%;

        <?php endif; ?>

        <?php if( in_array( 'bottom', $position["ms_notification_enable_position"]) ) : ?>

            bottom: <?php echo $position["ms_notification_position_bottom"]; ?>%;

        <?php endif; ?>

        <?php if( in_array( 'right', $position["ms_notification_enable_position"]) ) : ?>

            right: <?php echo $position["ms_notification_position_right"]; ?>%;

        <?php endif; ?>

        width: 257px;
        color: #212121;
        font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
        font-size: 12px;
        font-weight: normal;
        cursor: pointer;
    }
    .ms-notification-style-three.notification_box_wrap {
        position: relative;
        width: 100%;
        height: auto;
        background-color: #fff;
        box-shadow: 0px 0px 4px rgba(0,0,0,0.2);
        border-radius: 4px;
        cursor: pointer;
    }
    .ms-notification-style-three .left_area {
        width: 62px;
        height: 100%;
        text-align: center;
        float: left;
    }
    .ms-notification-style-three .left_area .ms-notification-image {
        margin: 10px auto 10px auto;
        width: 42px;
        height: auto;
        border: 1px solid #e8e8e8;
    }
    .ms-notification-style-three .right_area {
        padding-top: 8px;
        padding-left: 0px;
        padding-right: 0px;
        padding-bottom: 10px;
        width: 195px;
        height: auto;
        float: left;
        word-wrap: break-word;
    }
    .ms-notification-style-three .right_area .notification_title {
        font-size: 12px;
        line-height: 16px;
        font-weight: bold;
    }
    .ms-notification-style-three .right_area .notification_description {
        padding-right: 30px;
        font-size: 12px;
        line-height: 16px;
    }
    .ms-notification-style-three .right_area .note_area {
        margin-top: 10px;
        clear: both;
    }
    .ms-notification-style-three .right_area .note_area .note_icon_47 {
        background-position: top -68px left -119px;
    }
    .ms-notification-style-three .right_area .note_area .note_icon {
        margin-right: 6px;
        width: 16px;
        height: 16px;
        background-repeat: no-repeat;
    }
    .ms-notification-style-three .right_area .note_area .note_text {
        height: 16px;
        color: #999999;
        font-size: 12px;
        line-height: 16px;
    }
    .ms-notification-style-three .right_area .note_area div {
        float: left;
    }
</style>