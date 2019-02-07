<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
?>

<div class="ms-popup ms-shortcode-popup popup_options animated <?php if( get_field('ms_popup_animation', $ms_popup_atts['id'] ) ): ?><?php the_field('ms_popup_animation', $ms_popup_atts['id'] )['value']; ?><?php endif; ?>" id="<?php if( $ms_popup_atts['popup'] == 'true' ) { 
	echo 'popup_options2'; 
} else { 
	echo 'popup_options1'; 
} ?>">

	<?php if( get_field('ms_shortcode_popup', $ms_popup_atts['id'] ) ): ?><?php echo get_field('ms_shortcode_popup', $ms_popup_atts['id'] ); ?><?php endif; ?>

</div>