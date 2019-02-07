<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
?>

<div class="ms-popup ms-img-popup-main-img popup_options ms-promotion-style-<?php echo get_field( "ms_popup_promotional_style", $ms_popup_atts['id'] ); ?> animated ms-popup-pb-25 ms-popup-pt-25 <?php if( get_field('ms_popup_animation', $ms_popup_atts['id'] ) ): ?> <?php the_field('ms_popup_animation', $ms_popup_atts['id'] )['value']; ?> <?php endif; ?>" id="<?php if( $ms_popup_atts['popup'] == 'true' ) { echo 'popup_options2'; } else { echo 'popup_options1'; } ?>">

	<div class="ms-row">

		<div class="ms-col-xs-12 ms-col-sm-12 ms-col-md-<?php if( ( get_field('ms_popup_promotional_style', $ms_popup_atts['id']) == 12 ) || ( get_field('ms_popup_promotional_style', $ms_popup_atts['id']) == 6 ) ) { echo get_field('ms_popup_promotional_style', $ms_popup_atts['id'] );} else {

			echo '6 ms-order-md-2';

		} ?>">

			<div class="ms-popup-title ms-text-center pt-4">
				<strong><?php if( get_field('ms_popup_promotion_title', $ms_popup_atts['id'] ) ): ?> <?php echo get_field('ms_popup_promotion_title', $ms_popup_atts['id'] ); ?> <?php endif; ?></strong>
			</div>

			<p class="ms-popup-description ms-text-center">
				<?php
				if( get_field('ms_popup_promotion_description', $ms_popup_atts['id'] ) ): ?>
					<?php echo get_field('ms_popup_promotion_description', $ms_popup_atts['id'] ); ?>
				<?php endif; ?>
			</p>

			<?php if( get_field('ms_popup_countdown_timer_options', $ms_popup_atts['id'] ) == true ): ?>

			<div class="ms-clock-container">
				<div class="ms-clock"></div>
			</div>

			<?php endif; ?>
		</div>

		<div class="ms-pt-2 ms-col-xs-12 ms-col-sm-12 ms-col-md-<?php if( ( get_field('ms_popup_promotional_style', $ms_popup_atts['id']) == 12 ) || ( get_field('ms_popup_promotional_style', $ms_popup_atts['id']) == 6 ) ) { echo get_field('ms_popup_promotional_style', $ms_popup_atts['id']);} else {
			echo '6 ms-order-md-1';
		} ?>">

			<?php if( get_field('ms_popup_social_sharing_option', $ms_popup_atts['id'] ) ): ?>

			<div class="ms-popup-social-icons ms-text-center">
				<?php
					$social_sharing_buttons = get_field( 'ms_popup_social_sharing_buttons', $ms_popup_atts['id'] );
					$social_sharing_button_type = get_field( 'ms_popup_social_button_type', $ms_popup_atts['id'] );
					$social_share_page_url = get_field( 'ms_popup_social_page_url', $ms_popup_atts['id'] );
				?>

				<?php if( in_array('facebook', $social_sharing_buttons ) ): ?>

					<a href="<?php if( $social_sharing_button_type == 'share' ): ?>https://www.facebook.com/sharer/sharer.php?u=<?php if( $social_share_page_url ) { echo $social_share_page_url; } ?>%2F&src=sdkpreparse<?php endif; ?><?php if( ( $social_sharing_button_type == 'follow' ) && (get_field('ms_popup_social_page_follow_fb', $ms_popup_atts['id'] ) ) ){ echo get_field('ms_popup_social_page_follow_fb', $ms_popup_atts['id'] ); }?>" target="_blank" class= "ms-popup-sharing-icon">
						<i class="ms-fab ms-fa-facebook ms-popup-social-facebook"></i>
					</a>

				<?php endif; ?>

				<?php if( in_array('google_p', $social_sharing_buttons ) ): ?>

					<a href="<?php if( $social_sharing_button_type == 'share' ): ?>https://plus.google.com/share?app=110&url=<?php if( $social_share_page_url ) { echo $social_share_page_url; } ?>%2F<?php endif; ?><?php if( ( $social_sharing_button_type == 'follow' ) && (get_field('ms_popup_social_page_follow_google_plus', $ms_popup_atts['id'] ) ) ){ echo get_field('ms_popup_social_page_follow_google_plus', $ms_popup_atts['id'] ); }?>" target="_blank" class= "ms-popup-sharing-icon">
						<i class="ms-fab ms-fa-google-plus-g ms-popup-social-google-plus"></i>
					</a>

				<?php endif; ?>

				<?php if( in_array('twitter', $social_sharing_buttons ) ): ?>

					<a href="<?php if( $social_sharing_button_type == 'share' ): ?>https://twitter.com/intent/tweet?text=<?php if( $social_share_page_url ) { echo $social_share_page_url; } ?><?php endif; ?><?php if( ( $social_sharing_button_type == 'follow' ) && (get_field('ms_popup_social_page_follow_twitter', $ms_popup_atts['id'] ) ) ){ echo get_field('ms_popup_social_page_follow_twitter', $ms_popup_atts['id'] ); }?>" target="_blank" class= "ms-popup-sharing-icon">
						<i class="ms-fab ms-fa-twitter ms-popup-social-twitter"></i>
					</a>

				<?php endif; ?>

				<?php if( in_array('pinterest', $social_sharing_buttons ) ): ?>

					<a href="<?php if( $social_sharing_button_type == 'share' ): ?>https://www.pinterest.com/pin/create/button/?url=<?php if( $social_share_page_url ) { echo $social_share_page_url; } ?>&media=<?php if( get_field('ms_popup_social_page_follow_pinterest_media', $ms_popup_atts['id'] ) ) { the_field('ms_popup_social_page_follow_pinterest_media', $ms_popup_atts['id'] ); } ?><?php endif; ?><?php if( ( $social_sharing_button_type == 'follow' ) && (get_field('ms_popup_social_page_follow_pinterest', $ms_popup_atts['id'] ) ) ){ echo get_field('ms_popup_social_page_follow_pinterest', $ms_popup_atts['id'] ); }?>" target="_blank" class= "ms-popup-sharing-icon">
						<i class="ms-fab ms-fa-pinterest-p ms-popup-social-pinterest"></i>
					</a>

				<?php endif; ?>

				<?php if( in_array('blogger', $social_sharing_buttons ) ): ?>

					<a href="<?php if( $social_sharing_button_type == 'share' ): ?>https://www.blogger.com/blog-this.g?u=<?php if( $social_share_page_url ) { echo $social_share_page_url; } ?>&n=This is link&t=I said this is link<?php endif; ?><?php if( ( $social_sharing_button_type == 'follow' ) && (get_field('ms_popup_social_page_follow_blogger', $ms_popup_atts['id'] ) ) ){ echo get_field('ms_popup_social_page_follow_blogger', $ms_popup_atts['id'] ); }?>" target="_blank" class= "ms-popup-sharing-icon">

						<i class="ms-fab ms-fa-blogger-b ms-popup-social-blogger"></i>

					</a>

				<?php endif; ?>

				<?php if( in_array('tumblr', $social_sharing_buttons ) ): ?>

					<a href="<?php if( $social_sharing_button_type == 'share' ): ?>https://www.tumblr.com/widgets/share/tool?posttype=link&canonicalUrl=<?php if( $social_share_page_url ) { echo $social_share_page_url; } ?>%23&shareSource=tumblr_share_button<?php endif; ?><?php if( ( $social_sharing_button_type == 'follow' ) && (get_field('ms_popup_social_page_follow_tumblr', $ms_popup_atts['id'] ) ) ){ echo get_field('ms_popup_social_page_follow_tumblr', $ms_popup_atts['id'] ); }?>" target="_blank" class= "ms-popup-sharing-icon">

						<i class="ms-fab ms-fa-tumblr ms-popup-social-tumblr"></i>

					</a>

				<?php endif; ?>

				<?php if( in_array('linkedin', $social_sharing_buttons ) ): ?>

					<a href="<?php if( $social_sharing_button_type == 'share' ): ?>https://www.linkedin.com/uas/connect/user-signin?session_redirect=https%3A%2F%2Fwww%2Elinkedin%2Ecom%2Fcws%2Fshare%3Fxd_origin_host%3D<?php esc_url( home_url() ); ?>%26original_referer%3D<?php the_permalink(); ?>%26url%3D<?php if( $social_share_page_url ) { echo $social_share_page_url; } ?>%26isFramed%3Dfalse%26token%3D%26lang%3Den_US%26_ts%3D1517981346246%252E9614<?php endif; ?><?php if( ( $social_sharing_button_type == 'follow' ) && (get_field('ms_popup_social_page_follow_linkedin', $ms_popup_atts['id'] ) ) ){ echo get_field('ms_popup_social_page_follow_linkedin', $ms_popup_atts['id'] ); }?>" target="_blank" class= "ms-popup-sharing-icon">
						<i class="ms-fab ms-fa-linkedin-in ms-popup-social-linkedin"></i>
					</a>

				<?php endif; ?>

				<?php if( in_array('reddit', $social_sharing_buttons ) ): ?>

					<a href="<?php if( $social_sharing_button_type == 'share' ): ?>https://www.reddit.com/submit?url=<?php if( $social_share_page_url ) { echo $social_share_page_url; } ?><?php endif; ?><?php if( ( $social_sharing_button_type == 'follow' ) && (get_field('ms_popup_social_page_follow_reddit', $ms_popup_atts['id'] ) ) ){ echo get_field('ms_popup_social_page_follow_reddit', $ms_popup_atts['id'] ); }?>" target="_blank" class= "ms-popup-sharing-icon">
						<i class="ms-fab ms-fa-reddit ms-popup-social-reddit"></i>
					</a>

				<?php endif; ?>

			</div>

			<?php endif; ?>

			<?php

			/// coupon code functionality exists in form.php

			?>

			<?php if( get_field('ms_popup_use_form_or_anything_custom', $ms_popup_atts['id'] ) ): ?>

				<?php
					/* include the main form */
					include( dirname(__FILE__) . '/form.php' );
				?>
			<?php endif; ?>

			<?php if( ! get_field( 'ms_popup_use_form_or_anything_custom', $ms_popup_atts['id'] ) ) : ?>

				<div class="ms-popup-redirect ms-text-center">

					<a href="<?php if( get_field( 'ms_popup_button_redirect_url', $ms_popup_atts['id'] ) ) { echo get_field( 'ms_popup_button_redirect_url', $ms_popup_atts['id'] ); } ?>" class="ms-popup-redirect-button"><?php if( get_field( 'ms_popup_first_button_text', $ms_popup_atts['id'] ) ) { echo get_field( 'ms_popup_first_button_text', $ms_popup_atts['id'] ); } ?></a>

					<a href="#" class="ms-popup-close custom-close" id="ms-popup-close"><?php if( get_field( 'ms_popup_second_button_text', $ms_popup_atts['id'] ) ) { echo get_field( 'ms_popup_second_button_text', $ms_popup_atts['id'] ); } ?></a>

				</div>

			<?php endif; ?>

		</div>
	</div>
</div>