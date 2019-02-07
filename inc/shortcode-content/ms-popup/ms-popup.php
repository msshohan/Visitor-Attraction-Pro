<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
?>

<?php if( get_field('ms_types_of_popup', $ms_popup_atts['id'] ) == 'promotion' ): ?>

	<?php include( dirname(__FILE__) . '/promotional.php' ); ?>

<?php endif; ?>

<!-- image popup -->

<?php if( get_field('ms_types_of_popup', $ms_popup_atts['id'] ) == 'image' ): ?>

	<?php include( dirname(__FILE__) . '/image-popup.php' ); ?>

<?php endif; ?>

<!-- Embedded iframe popup -->

<?php if( get_field('ms_types_of_popup', $ms_popup_atts['id'] ) == 'iframe_embed' ): ?>

	<?php include( dirname(__FILE__) . '/iframe-popup.php' ); ?>

<?php endif; ?>

<!-- html popup -->

<?php if( get_field('ms_types_of_popup', $ms_popup_atts['id'] ) == 'html' ): ?>

	<?php include( dirname(__FILE__) . '/html-popup.php' ); ?>

<?php endif; ?>

<!-- shortcode popup -->

<?php if( get_field('ms_types_of_popup', $ms_popup_atts['id'] ) == 'shortcode' ): ?>

	<?php include( dirname(__FILE__) . '/shortcode-popup.php' ); ?>

<?php endif; ?>

<?php include( dirname(__FILE__) . '/popup-style.php' ); ?>