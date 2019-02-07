<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
?>

<style type="text/css">
	.ms-popup-form form .ms-popup-form-input input,
	.ms-popup-form form .ms-popup-form-input input::placeholder,
	#ms-popup-subscriber-confirmation {
		color: <?php the_field( 'ms_popup_form_input_color', $ms_popup_atts['id'] ); ?> !important;
		background-color: <?php the_field( 'ms_popup_form_input_back_color', $ms_popup_atts['id'] ); ?> !important;
	}
	.ms-popup-form-submit input {
		color: <?php the_field( 'ms_popup_form_submit_text_color', $ms_popup_atts['id'] ); ?> !important;
		background-color: <?php the_field( 'ms_popup_form_submit_background_color', $ms_popup_atts['id'] ); ?> !important;
	}
</style>

<?php

	//coupon code

	if( get_field( 'ms_popup_enable_coupon_code', $ms_popup_atts['id'] ) ) {

		if( get_field( 'ms_popup_use_form_or_anything_custom', $ms_popup_atts['id']  ) ) {

			?>

			<div class="ms-text-center ms-mt-4" id="ms-popup-coupon-code" style="background: rgba(0,0,0,0.2);">
				<span>
					<?php echo get_field( 'ms_popup_the_coupon_code', $ms_popup_atts['id'] ); ?>
				</span>
			</div>

			<?php if( isset( $_POST['ms-popup-form-submit'] ) ) : ?>

				<script type="text/javascript">
					parent.document.getElementById("ms-popup-coupon-code").style.display = "block";
				</script>

			<?php endif; ?>

			<?php
		}
		?>

		<?php
	}
?>

<div class="ms-popup-form ms-mt-4">
	<iframe id="ms-popup-form-iframe" class="ms-d-none" name="ms-popup-form-iframe" no-referrer></iframe>
	<form id="ms-popup-form" action="" method="post" autocomplete="off" target="ms-popup-form-iframe" validate>

		<div class="ms-popup-form-input">
			<input type="text" name="ms-popup-name" placeholder="Your name" required="">
		</div>

		<div class="ms-popup-form-input">
			<input type="email" name="ms-popup-email" placeholder="Your email" required="">
		</div>

		<div class="ms-popup-form-submit">
			<input type="submit" name="ms-popup-form-submit">
		</div>

	</form>

	<h3 class="w-100 ms-mt-0 ms-text-center" id="ms-popup-subscriber-confirmation">
		<?php the_field( 'ms_popup_form_success message', $ms_popup_atts['id'] ); ?>
	</h3>

</div>

<?php

    if ( isset( $_POST['ms-popup-form-submit'] ) ){
        global $wpdb;

        // save the popup data in database

        $popup_subscribers = $wpdb->prefix . 'ms_popup_submit';

        $ms_popup_data=array(
        	'ms_popup_name' => $_POST['ms-popup-name'],
            'ms_popup_email' => $_POST['ms-popup-email'],
            'ms_popup_time' => current_time( mysql )
        );
        $wpdb->insert( $popup_subscribers, $ms_popup_data);

        // Send mail notification

        $popup_name = $_POST['ms-popup-name'];
        $popup_to = $_POST['ms-popup-email'];
        $popup_subject = "Promotion Offer";
        $popup_body = "Hi $popup_name, Thank you for subscribing.";
        $headers = array("Content-Type: text/html; charset = utf-8");

        wp_mail( $popup_to, $popup_subject, $popup_body, $headers );

        ?>

		<?php if( isset( $_POST['ms-popup-form-submit'] ) ) : ?>

        <script type="text/javascript">
			parent.document.getElementById("ms-popup-form").style.display = "none";
			parent.document.getElementById("ms-popup-subscriber-confirmation").style.display = "block";
		</script>

		<?php endif; ?>

		<?php
    }