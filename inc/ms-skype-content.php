<span class="skype-button <?php echo get_field( 'ms_skype_button_style', 'option' ); ?>" data-contact-id="<?php echo get_field( 'ms_skype_id', 'option' ); ?>" data-color="<?php echo get_field( 'ms_button_color', 'option' ); ?>"></span>
<span class="skype-chat" data-color-message="<?php echo get_field( 'ms_skype_message_color', 'option' ); ?>"></span>

<?php wp_enqueue_script( 'ms_skype_sdk_js' ); ?>