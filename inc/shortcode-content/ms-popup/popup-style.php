<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
?>
<style type="text/css">
	@media all and (max-width: 600px) {
		.lightlayer-popup {
			max-width: 90%;
		}
		.ms-popup {
			width: 90%;
		}
	}
	#lightlayer {
		position: fixed;
	}
	.lightlayer-popup .x-button::before {
		content: '' !important;
		background: url(<?php if( get_field('ms_popup_custom_close_icon', $ms_popup_atts['id'] ) ) { echo get_field('ms_popup_custom_close_icon', $ms_popup_atts['id'] ); } else { echo $plugin_url . '/assets/images/cursor-cross.png'; } ?>);
		z-index: 9999999999999999999;
	}
	.lightlayer {
		cursor: url(<?php if( get_field('ms_popup_bg_layer_hover_icon', $ms_popup_atts['id'] ) ) { echo get_field('ms_popup_bg_layer_hover_icon', $ms_popup_atts['id'] ); } else { echo $plugin_url . '/assets/images/cursor-cross.png'; } ?>) 2 2, auto;
	}
	.ms-popup {
		background-color:  <?php if( get_field('ms_popup_background_color', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_background_color', $ms_popup_atts['id'] ); ?> <?php endif; ?>;
		background-image: url('<?php if( get_field('ms_popup_background_image', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_background_image', $ms_popup_atts['id'] ); ?> <?php endif; ?>');
		background-size: cover;
		background-repeat: no-repeat;
		border-width: <?php if( get_field('ms_popup_border_size', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_border_size', $ms_popup_atts['id'] ); ?> <?php endif; ?>;
		border-style: <?php if( get_field('ms_popup_border_style', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_border_style', $ms_popup_atts['id'] ); ?> <?php endif; ?>;
		border-color: <?php if( get_field('ms_popup_border_color', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_border_color', $ms_popup_atts['id'] ); ?> <?php endif; ?>;
		padding: <?php if( get_field('ms_popup_padding', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_padding', $ms_popup_atts['id'] ); ?> <?php endif; ?>;
		width: <?php if( get_field('ms_popup_width', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_width', $ms_popup_atts['id'] ); ?> <?php endif; ?>;
		<?php if( get_field('ms_types_of_popup', $ms_popup_atts['id'] ) == 'iframe_embed' ): ?>
		height: <?php if( get_field('ms_popup_height', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_height', $ms_popup_atts['id'] ); ?> <?php endif; ?>;
		<?php endif; ?>
	    cursor: context-menu;
	}
	.ms-popup .ms-embed-responsive {
	    height: 100%;
	}
	<?php if( get_field('ms_types_of_popup', $ms_popup_atts['id'] ) == 'iframe_embed' ): ?>

	@media all and (max-width: 768px) {
		.ms-popup {
		    height: calc( <?php if( get_field('ms_popup_height', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_height', $ms_popup_atts['id'] ); ?> <?php endif; ?> / 1.5 );
		}
	}
	@media all and (max-width: 400px) {
		.ms-popup {
		    height: calc( <?php if( get_field('ms_popup_height', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_height', $ms_popup_atts['id'] ); ?> <?php endif; ?> / 3 );
		}
	}

	<?php endif; ?>

	.ms-popup iframe {
		height: <?php if( get_field('ms_popup_height', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_height', $ms_popup_atts['id'] ); ?> <?php endif; ?>;
	}
	.ms-popup-title {
		color: <?php if( get_field('ms_popup_title_color', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_title_color', $ms_popup_atts['id'] ); ?> <?php endif; ?>;
	}
	.ms-popup-description {
		color: <?php if( get_field('ms_popup_description_color', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_description_color', $ms_popup_atts['id'] ); ?> <?php endif; ?>;
	}
	.countDown_interval_basic_cont_description,
	.countDown_cont {
		color: <?php if( get_field('ms_popup_clock_head_color', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_clock_head_color', $ms_popup_atts['id'] ); ?> <?php endif; ?>;
	}

	/* image popup */

	.ms-img-popup-main-img img {
		min-width: 100%;
		max-width: 100%;
		height: auto;
	}

	/* iframe popup */

	.ms-iframe-popup {
		display: none;
	}
	.ms-iframe iframe {
		display: block;
	    width: 100%!important;
	    margin: 0 auto;
	    width: 600px;
	    height: 500px;
	}
	.ms-popup-social-icons i {
	    <?php $ms_popup_social_btn_styles = get_field( 'ms_popup_social_sharing_button_styles', $ms_popup_atts['id'] ); ?>
	    border-radius: <?php
		    if( $ms_popup_social_btn_styles == 'square' ) {
		    	echo '0';
		    } elseif( $ms_popup_social_btn_styles == 'circle' ) {
		    	echo '50%';
		    } else {
		    	echo get_field( 'ms_popup_custom_border_radius', $ms_popup_atts['id'] );
		    }
	    ?>
	}
</style>