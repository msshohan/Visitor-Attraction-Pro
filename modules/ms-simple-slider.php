<?php
function ms_simple_slider_shortcode( $atts, $content ) {
	ob_start();
	$ms_slider_atts = shortcode_atts( array(
			'id'  => ''
		), $atts );
	?>
	<?php 
		$slides = get_field( "ms_slider_slides", $ms_slider_atts['id'] );
	?>

	<?php
		$ms_slider_check = get_field( 'ms_slider_popup_select_to_use', $post->ID );
	?>

	<?php if( !empty( $slides ) ) : ?>

	<style type="text/css">

	<?php

	$ms_slider_general_settings_css = get_field( 'ms_slider_general_settings', $ms_slider_atts['id'] );
	$ms_slider_responsive_settings_css = get_field( 'ms_slider_responsive_settings', $ms_slider_atts['id'] );

	?>

	#<?php echo $ms_slider_general_settings_css['ms_slider_popup_id']; ?> {
		background-color: <?php echo $ms_slider_general_settings_css['ms_slider_popup_background']; ?>;
		background-image: url("<?php echo $ms_slider_general_settings_css['ms_slider_popup_background_img']; ?>");
		background-repeat: no-repeat;
		background-position: top center;
    	background-size: cover;
	}

	<?php if( ms_slider_enable_popup ) : ?>

	.ms-popup-slider {
	    display: none;
	    position: fixed;

	    <?php if( in_array( 'top', $ms_slider_general_settings_css["ms_slider_popup_positioning"] ) ) : ?>
        top: <?php echo $ms_slider_general_settings_css["ms_slider_position_from_top"]; ?>%;
        <?php endif; ?>

        <?php if( in_array( 'left', $ms_slider_general_settings_css["ms_slider_popup_positioning"]) ) : ?>
        left: <?php echo $ms_slider_general_settings_css["ms_slider_position_from_left"]; ?>%;
        <?php endif; ?>

        <?php if( in_array( 'bottom', $ms_slider_general_settings_css["ms_slider_popup_positioning"]) ) : ?>
        bottom: <?php echo $ms_slider_general_settings_css["ms_slider_position_from_bottom"]; ?>%;
        <?php endif; ?>

        <?php if( in_array( 'right', $ms_slider_general_settings_css["ms_slider_popup_positioning"]) ) : ?>
        right: <?php echo $ms_slider_general_settings_css["ms_slider_position_from_right"]; ?>%;
        <?php endif; ?>

	    <?php if( in_array( 'middle', $ms_slider_general_settings_css["ms_slider_popup_positioning"]) ) : ?>
	    	top: 50%;
	    	left: 50%;
    		transform: translate(-50%, -50%);
    	<?php endif; ?>
	    z-index: 99999999999999999999;
	}
	<?php endif; ?>

	<?php if(get_field( "ms_slider_general_settings", $ms_slider_atts['id'] )["ms_slider_enable_popup"] ) : ?>

	@media all and ( min-width: 1024px ) {
		.ms-popup-slider {
			width: <?php echo $ms_slider_responsive_settings_css['ms_slider_width_in_pc']; ?>%;
		}
	}
	@media all and ( max-width: 1024px ) {
		.ms-popup-slider {
			width: <?php echo $ms_slider_responsive_settings_css['ms_slider_width_in_ipad']; ?>%;
		}
	}
	@media all and ( max-width: 768px ) {
		.ms-popup-slider {
			width: <?php echo $ms_slider_responsive_settings_css['ms_slider_slider_width_tab']; ?>%;
		}
	}
	@media all and ( max-width: 400px ) {
		.ms-popup-slider {
			width: <?php echo $ms_slider_responsive_settings_css['ms_slider_slider_width_mbl']; ?>%;
		}
	}

	<?php endif; ?>

	<?php if( ! ( get_field( "ms_slider_general_settings", $ms_slider_atts['id'] )["ms_slider_enable_popup"] ) ) : ?>

		@media all and ( min-width: 1024px ) {
			.ms-popup-slider-container {
				width: <?php echo $ms_slider_responsive_settings_css['ms_slider_width_in_pc']; ?>%;
			}
		}
		@media all and ( max-width: 1024px ) {
			.ms-popup-slider-container {
				width: <?php echo $ms_slider_responsive_settings_css['ms_slider_width_in_ipad']; ?>%;
			}
		}
		@media all and ( max-width: 768px ) {
			.ms-popup-slider-container {
				width: <?php echo $ms_slider_responsive_settings_css['ms_slider_slider_width_tab']; ?>%;
			}
		}
		@media all and ( max-width: 400px ) {
			.ms-popup-slider-container {
				width: <?php echo $ms_slider_responsive_settings_css['ms_slider_slider_width_mbl']; ?>%;
			}
		}
	<?php endif; ?>

	</style>

	<div class="ms-container<?php if( get_field( "ms_slider_general_settings", $ms_slider_atts['id'] )["ms_slider_full_width"] ) { echo "-fluid"; } ?>">
  		<div class="ms-row">
  			<div class="ms-col-12">

  				<!-- popup -->

  				<?php if(get_field( "ms_slider_general_settings", $ms_slider_atts['id'] )["ms_slider_enable_popup"] ) : ?>

  					<div class="ms-popup-slider" id="<?php echo get_field( 'ms_slider_general_settings', $ms_slider_atts['id'] )['ms_slider_popup_id']; ?>">

  				<?php endif; ?>

  				<!-- carousel -->

  					<div class="ms-popup-slider-container" id="ms-popup-slider-container">

  						<?php if(get_field( "ms_slider_general_settings", $ms_slider_atts['id'] )["ms_slider_enable_popup"] ) : ?>

  							<span class="ms-popup-slider-close"><i class="ms-fas ms-fa-times"></i></span>

  						<?php endif; ?>

  						<?php if( !empty( $slides ) ) : ?>

  						<div class="owl-carousel owl-theme animated <?php echo get_field( 'ms_slider_general_settings', $ms_slider_atts['id'] )['ms_slider_popup_animation']; ?>" id="<?php echo get_field( 'ms_slider_general_settings', $ms_slider_atts['id'] )['ms_slider_carousel_id']; ?>">

  							<?php foreach( $slides as $slide ) { ?>

  							<div class="item">

				            	<?php if( get_field("ms-slider_slider_type", $ms_slider_atts['id'] ) == 'image' ) : ?>

				            		<a href="<?php echo $slide['ms-slider_slide']['ms-slider_slide_url_linking']; ?>" target="<?php echo $slide['ms-slider_slide']['ms-slider_slide_open_url_in']; ?>">
				            			<img src="<?php echo $slide['ms-slider_slide']['ms-slider_slide_image']; ?>">
				            		</a>

				              	<?php endif; ?>

				              	<?php if( get_field("ms-slider_slider_type", $ms_slider_atts['id'] ) == 'html' ) : ?>

				            		<div>
				            			<?php echo $slide['ms-slider_slide']['ms-slider_slide_content']; ?>
				            		</div>

				              	<?php endif; ?>

				            </div>

  							<?php } ?>

				        </div>
  					</div>

  				<?php if(get_field( "ms_slider_general_settings", $ms_slider_atts['id'] )["ms_slider_enable_popup"] ) : ?>
  				</div>

  				<?php endif; ?>

  			</div>
  		</div>
  	</div>

  	<?php
	    $ms_slider_general_settings = get_field( 'ms_slider_general_settings', $ms_slider_atts['id'] );
	    $ms_slider_responsive_settings = get_field( 'ms_slider_responsive_settings', $ms_slider_atts['id'] );
	  	wp_enqueue_script( 'ms_popup_main_js', true );

	  	$ms_slider_passed_data = array(

	  		// pass MS Slider data

	        'ms_slider_carousel_id' => $ms_slider_general_settings['ms_slider_carousel_id'],
	        'ms_slider_popup_id' => $ms_slider_general_settings['ms_slider_popup_id'],

	        // general settings ( Popup )

	        'ms_slider_popup_background' => $ms_slider_general_settings['ms_slider_popup_background'],
	        'ms_slider_popup_background_opacity' => $ms_slider_general_settings['ms_slider_popup_background_opacity'],
	        'ms_slider_popup_transition' => $ms_slider_general_settings['ms_slider_popup_transition'],

	        // general settings (MS Slider)

	        'ms_slider_autoplay' => $ms_slider_general_settings['ms_slider_autoplay'],
	        'ms_slider_autoplay_interval' => $ms_slider_general_settings['ms_slider_popup_autoplay_interval'],
	        'ms_slider_stop_hover' => $ms_slider_general_settings['ms_slider_stop_on_hover'],
	        'ms_slider_slides_loop' => $ms_slider_general_settings['ms_slider_loop_slides'],
	        'ms_slider_mouse_drag' => $ms_slider_general_settings['ms_slider_mouse_drag'],
	        'ms_slider_touch_drag' => $ms_slider_general_settings['ms_slider_touch_drag'],
	        'ms_slider_slide_by' => $ms_slider_general_settings['ms_slider_slide_by'],

	        // Responsive settings (MS Slider(mobile))

	        'ms_slider_slides_per_view_in_mobile' => $ms_slider_responsive_settings['ms_slider_slides_per_view_in_mobile'],
	        'ms_slider_nav_button_mbl' => $ms_slider_responsive_settings['ms_slider_nav_button_mbl'],
	        'ms_slider_nav_dots_mbl' => $ms_slider_responsive_settings['ms_slider_nav_dots_mbl'],

	        // Responsive settings (MS Slider(tablet))

	        'ms_slider_slides_per_view_in_tab' => $ms_slider_responsive_settings['ms_slider_slides_per_view_in_tab'],
	        'ms_slider_nav_button_tab' => $ms_slider_responsive_settings['ms_slider_nav_button_tab'],
	        'ms_slider_nav_dots_tab' => $ms_slider_responsive_settings['ms_slider_nav_dots_tab'],

	        // Responsive settings (MS Slider(ipad))

	        'ms_slider_slides_per_view_ipad' => $ms_slider_responsive_settings['ms_slider_slides_per_view_ipad'],
	        'ms_slider_nav_button_ipad' => $ms_slider_responsive_settings['ms_slider_nav_button_ipad'],
	        'ms_slider_nav_dots_ipad' => $ms_slider_responsive_settings['ms_slider_nav_dots_ipad'],

	        // Responsive settings (MS Slider(pc))

	        'ms_slider_slides_per_view_in_pc' => $ms_slider_responsive_settings['ms_slider_slides_per_view_in_pc'],
	        'ms_slider_nav_button_laptop' => $ms_slider_responsive_settings['ms_slider_nav_button_laptop'],
	        'ms_slider_nav_dots_laptop' => $ms_slider_responsive_settings['ms_slider_nav_dots_laptop'],
	    );

	    wp_localize_script( 'ms_popup_main_js', 'ms_slider_data', $ms_slider_passed_data );
  	?>

  	<?php endif; endif; ?>

	<?php
	$ms_slider = ob_get_clean();
	return $ms_slider;
}
add_shortcode( "ms_slider", "ms_simple_slider_shortcode" );

// initialie MS Slider

function init_ms_slider() {
	echo do_shortcode ('[ms_slider id = '. get_field( 'ms_slider_popup_select_to_use', $post->ID ) .']');
	
	if( is_page() == get_option( 'page_on_front' ) ) {
		echo do_shortcode ('[ms_slider id = '. get_field( 'ms_slider_popup_select_to_use', get_option('page_on_front') ) .']');
	}

	if( is_page() == get_option( 'page_for_posts' ) ) {
		echo do_shortcode ('[ms_slider id = '. get_field( 'ms_slider_popup_select_to_use', get_option('page_for_posts') ) .']');
	}
}
add_action( 'wp_footer', 'init_ms_slider' );