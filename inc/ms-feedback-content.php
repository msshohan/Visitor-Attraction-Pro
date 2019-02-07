<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<style type="text/css">
        .ms-btn-init {
            margin-left: 3px;
        }
        button.ms-arrow-next,
        input.ms-feedback-submit {
            color: <?php the_field( 'ms_feedback_button_color', 'option' ); ?> !important;
            background-color: <?php the_field( 'ms_feedback_button_background_color', 'option' ); ?> !important;
        }
        button.ms-arrow-next:hover,
        input.ms-feedback-submit:hover {
            color: <?php the_field( 'ms_feedback_button_text_hover', 'option' ); ?> !important;
            background-color: <?php the_field( 'ms_feedback_button_hover_background', 'option' ); ?> !important;
        }
        .ms-step-one-all,
        .ms-feedback-tool.multi-step-form textarea,
        .ms-feedback-tool.multi-step-form input[type="email"] {
            color: <?php the_field( 'ms_feedback_field_color', 'option' ); ?> !important;
            background-color: <?php the_field( 'ms_feedback_field_background_color', 'option' ); ?> !important;
        }
        .ms-feedback-q,
        .ms-feedback-success-msg {
            color: <?php the_field( 'ms_feedback_area_color', 'option' ); ?> !important;
        }
        .ms-feedback-tool {
            background-color: <?php the_field( 'ms_feedback_area_background_color', 'option' ); ?> !important;

            /* positioning settings */

            <?php 
                $ms_feedback_position = get_field('ms_feedback_position', 'option' ); 
                $feedback_left_middle = in_array( 'left-middle', $ms_feedback_position["ms_feedback_enable_positioning_elements"] );
                $feedback_right_middle = in_array( 'right-middle', $ms_feedback_position["ms_feedback_enable_positioning_elements"] );
            ?>

            <?php if( ( in_array( 'top', $ms_feedback_position["ms_feedback_enable_positioning_elements"] ) && ! $feedback_right_middle ) || ( in_array( 'top', $ms_feedback_position["ms_feedback_enable_positioning_elements"] ) && ! $feedback_left_middle ) ) : ?>

                top: <?php echo $ms_feedback_position["ms_feedback_top"]; ?>%;

            <?php endif; ?>

            <?php if( ( in_array( 'left', $ms_feedback_position["ms_feedback_enable_positioning_elements"]) && ! $feedback_left_middle ) && ( in_array( 'left', $ms_feedback_position["ms_feedback_enable_positioning_elements"]) && ! $feedback_right_middle ) ) : ?>

                left: <?php echo $ms_feedback_position["ms_feedback_left"]; ?>%;

            <?php endif; ?>

            <?php if( ( in_array( 'bottom', $ms_feedback_position["ms_feedback_enable_positioning_elements"] ) && ! $feedback_left_middle ) && ( in_array( 'bottom', $ms_feedback_position["ms_feedback_enable_positioning_elements"] ) && ! $feedback_right_middle ) ) : ?>

                bottom: <?php echo $ms_feedback_position["ms_feedback_bottom"]; ?>%;

            <?php endif; ?>

            <?php if( ( in_array( 'right', $ms_feedback_position["ms_feedback_enable_positioning_elements"] ) && ! $feedback_left_middle ) && ( in_array( 'right', $ms_feedback_position["ms_feedback_enable_positioning_elements"] ) && ! $feedback_right_middle ) ) : ?>

                right: <?php echo $ms_feedback_position["ms_feedback_right"]; ?>%;

            <?php endif; ?>

            <?php if( $feedback_left_middle ) : ?>
                left: 0;
                top: 50%;
                transform: translateY( -50% );
            <?php endif; ?>

            <?php if( $feedback_right_middle ) : ?>
                right: 0;
                top: 50%;
                transform: translateY( -50% );
            <?php endif; ?>
        }
        .ms-animated-duration {
            animation-duration: <?php echo get_field('ms_feedback_animation_duration', 'option' ); ?>
        }

        /* tab settings */

        .ms-feedback-tool-init .ms-btn-init,
        .ms-feedback-tool-init *[data-face] .path1:before,
        .ms-feedback-tool-close {
            color: <?php echo get_field('ms_feedback_tab_color', 'option' ); ?>;
        }
        .ms-feedback-tool-init *[data-face] {
            color: <?php echo get_field('ms_feedback_tab_background_color', 'option' ); ?>;
        }
        .ms-feedback-tool-close {
            background-color: <?php echo get_field('ms_feedback_tab_background_color', 'option' ); ?>;
            /*color: ;*/
        }

        <?php if( ( get_field('ms_feedback_tab_position', 'option' )["ms_feedback_tab_enable_positioning"] == 'top' ) || ( get_field('ms_feedback_tab_position', 'option' )["ms_feedback_tab_enable_positioning"] == 'bottom' ) ) : ?>

            .ms-feedback-tool-init div {
                transform: rotate(-90deg);
            }

        <?php endif; ?>

        .ms-feedback-tool-init {
            position: fixed;
            margin-top: 0;
            background-color: <?php echo get_field('ms_feedback_tab_background_color', 'option' ); ?>;
            <?php $ms_feedback__tab_position = get_field('ms_feedback_tab_position', 'option' ); ?>

            <?php if( $ms_feedback__tab_position["ms_feedback_tab_enable_positioning"] == 'left' ) : ?>
                
                left: 0;
                top: <?php echo $ms_feedback__tab_position["ms_feedback_tab_position_in_left"]; ?>%;

            <?php endif; ?>

            <?php if( $ms_feedback__tab_position["ms_feedback_tab_enable_positioning"] == 'left-middle' ) : ?>

                left: 0;
                top: 50%;
                transform: translateY( -50% );
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
                border-top-right-radius: 3px;
                border-bottom-right-radius: 3px;

            <?php endif; ?>

            <?php if( $ms_feedback__tab_position["ms_feedback_tab_enable_positioning"] == 'right' ) : ?>

                right: 0;
                top: <?php echo $ms_feedback__tab_position["ms_feedback_tab_position_in_right"]; ?>%;

            <?php endif; ?>

            <?php if( $ms_feedback__tab_position["ms_feedback_tab_enable_positioning"] == 'right-middle' ) : ?>

                right: 0;
                top: 50%;
                transform: translateY( -50% );

            <?php endif; ?>
        }
    </style>

    <a href="javascript:void" class="ms-feedback-tool-init">
        <span class="ms-btn-init"><?php echo get_field('ms_feedback_tab_text', 'option' ); ?></span><br>
        <div class="d-block">
            <span class="ms-emotion-label radio-custom-label ms-emoticon-small" data-face="happy">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
                <span class="path4"></span>
            </span>
        </div>
    </a>

    <section class="ms-feedback-tool multi-step-form ms-text-center ms-animated-duration animated <?php echo get_field('ms_feedback_animation', 'option' ); ?>">

        <a href="javascript:void" class="ms-feedback-tool-close">
            <i class="ms-fas ms-fa-times"></i>
        </a>

        <iframe name="ms-feedback-frame" class="ms-d-none" no-referrer></iframe>

        <?php //target form to iframe with specific name ?>

        <form action="" method="post" autocomplete="off" id="ms-feedback-tool" target="ms-feedback-frame" enctype="multipart/form-data">

            <fieldset aria-label="Step One" tabindex="-1" id="step-1">
                <p class="ms-feedback-q ms-feedback-text"><?php the_field('intro_text', 'option') ?></p>
                <div class="ms-custom-radio-container">
                    <div class="msSlideInUp ms-delay-1">
                        <input id="radio-1" class="radio-custom" name="radio-group" value="love" type="radio">
                        <label for="radio-1" class="ms-emotion-label radio-custom-label" data-face="love">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </label>
                    </div>
                    <div class="msSlideInUp ms-delay-2">
                        <input id="radio-2" class="radio-custom" name="radio-group" value="hate" type="radio">
                        <label for="radio-2" class="ms-emotion-label radio-custom-label" data-face="hate">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                            <span class="path6"></span>
                        </label>
                    </div>

                    <div class="msSlideInUp ms-delay-3">
                        <input id="radio-3" class="radio-custom" name="radio-group" value="sad" type="radio">
                        <label for="radio-3" class="ms-emotion-label radio-custom-label" data-face="sad">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </label>
                    </div>

                    <div class="msSlideInUp ms-delay-4">
                        <input id="radio-4" class="radio-custom" name="radio-group" value="neutral" type="radio">
                        <label for="radio-4" class="ms-emotion-label radio-custom-label" data-face="neutral">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </label>
                    </div>

                    <div class="msSlideInUp ms-delay-5">
                        <input id="radio-5" class="radio-custom" name="radio-group" value="happy" type="radio">
                        <label for="radio-5" class="ms-emotion-label radio-custom-label" data-face="happy">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </label>
                    </div>
                </div>

                <div class="ms-step-one-all text-left">
                    <textarea class="form-control" rows="5" name="ms-feedback" id="ms-feedback-message" placeholder="<?php the_field('ms_feedback_descripton_placeholder', 'option') ?>" required></textarea>
                </div>

                <div class="ms-feedback-footer">

                    <div class="ms-float-left ms-feedback-text ms-feedback-footer-note">
                        <?php echo get_field( 'ms_feedback_footer_note', 'option' ); ?>
                    </div>

                    <button class="ms-btn ms-btn-default ms-btn-next ms-float-right ms-arrow-next" type="button" aria-controls="step-2" disabled="disabled">
                        <i class="ms-fas ms-fa-arrow-right"></i>
                    </button>

                </div>

            </fieldset>

            <fieldset aria-label="Step Two" tabindex="-1" id="step-2">

                <p class="ms-feedback-q ms-feedback-text"><?php the_field('ms_feedback_email_instructions', 'option') ?></p>
                <p>
                    <input class="form-control ms-text-center" type="email" name="ms-feedback-email-address" id="ms-feedback-email-address" placeholder="<?php the_field('ms_feedback_email_placeholder', 'option') ?>" required>
                </p>

                <p>
                    <input name="submit" class="ms-btn ms-float-right ms-feedback-submit" type="submit">
                </p>

            </fieldset>

        </form>

        <div id="ms-feedback-success-msg"><?php the_field('ms_feedback_success_message', 'option') ?></div>

        <?php

            // Success message after form submission

            if(isset($_POST['submit'])) {
                ?>
                <script type="text/javascript">
                    parent.document.getElementById("ms-feedback-tool").style.display = "none";
                    parent.document.getElementById("ms-feedback-success-msg").style.display = "block";
                </script>
                <?php
            }
        ?>
    </section>
    <?php

        // save the feedback data in database

        if ( isset( $_POST['submit'] ) ){

            global $wpdb;
            $tablename=$wpdb->prefix .'ms_feedback_submit';

            $data=array(
                'ms_feedback_emoji' => $_POST['radio-group'],
                'ms_feedback_email' => $_POST['ms-feedback-email-address'],
                'ms_feedback' => $_POST['ms-feedback'],
                'ms_feedback_time' => current_time( mysql )
            );
            $wpdb->insert( $tablename, $data);
        }