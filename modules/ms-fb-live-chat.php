<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function ms_live_chat() {
	?>

	<?php
	$enable_chat = get_field( 'ms_enable_fb_live_chat', 'option' );
	$option_selection = get_field( 'ms_fb_chat_display_on', 'option' );
	$match_urls = get_field( 'ms_fb_chat_pages_to_show_on', 'option' );
	$non_match_urls = get_field( 'ms_fb_chat_pages_not_to_show_on', 'option' );
	?>

	<?php if( $enable_chat ) : ?>

		<?php if( $option_selection == 'all' ) : ?>
		
			<div class="fb-customerchat" page_id="<?php the_field('ms_fb_chat_page_id', 'option'); ?>" theme_color="<?php the_field('ms_fb_chat_theme_color', 'option'); ?>" logged_in_greeting="<?php the_field('ms_fb_chat_log_in_greetings', 'option'); ?>" logged_out_greeting="<?php the_field('ms_fb_chat_log_out_greetings', 'option'); ?>"></div>

		<?php endif; ?>

		<?php if( $option_selection == 'selected' ) : ?>
		
			<?php while(has_sub_field('ms_fb_chat_pages_show_on', 'option')): ?>
				<?php 
					global $wp;
					$current_url = home_url(add_query_arg(array(),$wp->request));
					$individual_match = get_sub_field('ms_fb_chat_individual_urls');
					if( $individual_match == $current_url ) :
				?>
					
					<div class="fb-customerchat" page_id="<?php the_field('ms_fb_chat_page_id', 'option'); ?>" theme_color="<?php the_field('ms_fb_chat_theme_color', 'option'); ?>" logged_in_greeting="<?php the_field('ms_fb_chat_log_in_greetings', 'option'); ?>" logged_out_greeting="<?php the_field('ms_fb_chat_log_out_greetings', 'option'); ?>"></div>

				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		
		<?php if( $option_selection == 'not_selected' ) : ?>
		
			<?php while(has_sub_field('ms_fb_chat_pages_not_to_show_on', 'option')): ?>
				
				<?php 
					global $wp;
					$current_url = home_url(add_query_arg(array(),$wp->request));
					$individual_non_match = get_sub_field('ms_fb_chat_individual_urls_not');
					if( $individual_non_match != $current_url ) :
				?>

					<div class="fb-customerchat" page_id="<?php the_field('ms_fb_chat_page_id', 'option'); ?>" theme_color="<?php the_field('ms_fb_chat_theme_color', 'option'); ?>" logged_in_greeting="<?php the_field('ms_fb_chat_log_in_greetings', 'option'); ?>" logged_out_greeting="<?php the_field('ms_fb_chat_log_out_greetings', 'option'); ?>"></div>

				<?php endif; ?>
			<?php endwhile; ?>
		
		<?php endif; ?>

	<?php endif; ?>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '1428478700597094',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.12'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
	<?php
}
add_action( 'wp_footer', 'ms_live_chat' );