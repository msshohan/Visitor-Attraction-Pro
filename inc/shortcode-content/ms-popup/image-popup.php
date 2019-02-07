<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
?>

<div class="ms-popup ms-img-popup-main-img popup_options animated <?php 
	if( get_field('ms_popup_animation', $ms_popup_atts['id'] ) ): 
?> <?php the_field('ms_popup_animation', $ms_popup_atts['id'] )['value']; ?><?php endif; ?>" id="<?php if( $ms_popup_atts['popup'] == 'true' ) {
		echo 'popup_options2';
	} else {
		echo 'popup_options1';
	}

?>">
	<a target="_blank" href="<?php if( get_field('ms_image_popup_target_url', $ms_popup_atts['id'] ) ): ?><?php the_field('ms_image_popup_target_url', $ms_popup_atts['id'] )['value']; ?><?php endif; ?>">

		<img src="<?php if( get_field('ms_image_popup', $ms_popup_atts['id'] ) ): ?><?php echo get_field('ms_image_popup', $ms_popup_atts['id'] ); ?><?php endif; ?>" />

	</a>
</div>