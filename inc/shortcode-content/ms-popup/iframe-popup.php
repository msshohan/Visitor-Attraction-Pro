<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
?>

<div class="ms-popup ms-iframe-popup popup_options animated <?php if( get_field('ms_popup_animation', $ms_popup_atts['id'] ) ): ?><?php the_field('ms_popup_animation', $ms_popup_atts['id'] )['value']; ?><?php endif; ?>" id="<?php if( $ms_popup_atts['popup'] == 'true' ) {
		echo 'popup_options2';
	} else { 
		echo 'popup_options1'; 
	}
?>">

	<div class="ms-embed-responsive embed-responsive-16by9">
	  	<iframe class="ms-embed-responsive-item" src="<?php if( get_field('ms_iframe_popup', $ms_popup_atts['id'] ) ): ?><?php echo get_field('ms_iframe_popup', $ms_popup_atts['id'] ); ?><?php endif; ?>" no-referrer allowfullscreen></iframe>
	</div>
</div>