<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function ms_skype_live_chat() {
	?>

	<?php
	$enable_chat = get_field( 'ms_enable_skype_live_chat', 'option' );
	$option_selection = get_field( 'ms_skype_chat_display_on', 'option' );
	$match_urls = get_field( 'ms_skype_chat_pages_to_show_on', 'option' );
	$non_match_urls = get_field( 'ms_skype_chat_pages_not_to_show_on', 'option' );
	?>

	<?php if( $enable_chat ) : ?>

		<?php if( $option_selection == 'all' ) : ?>
		
			<?php require( dirname(__FILE__) . '/../inc/ms-skype-content.php' ); ?>

		<?php endif; ?>

		<?php if( $option_selection == 'selected' ) : ?>
		
			<?php while(has_sub_field('ms_skype_chat_pages_show_on', 'option')): ?>
				<?php 
					global $wp;
					$current_url = home_url(add_query_arg(array(),$wp->request));
					$individual_match = get_sub_field('ms_skype_chat_individual_urls');
					if( $individual_match == $current_url ) :
				?>
					
					<?php require( dirname(__FILE__) . '/../inc/ms-skype-content.php' ); ?>

				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		
		<?php if( $option_selection == 'not_selected' ) : ?>
		
			<?php while(has_sub_field('ms_skype_chat_pages_not_to_show_on', 'option')): ?>
				
				<?php 
					global $wp;
					$current_url = home_url(add_query_arg(array(),$wp->request));
					$individual_non_match = get_sub_field('ms_skype_chat_individual_urls_not');
					if( $individual_non_match != $current_url ) :
				?>

					<?php require( dirname(__FILE__) . '/../inc/ms-skype-content.php' ); ?>

				<?php endif; ?>
			<?php endwhile; ?>
		
		<?php endif; ?>

	<?php endif; ?>

	<?php
}
add_action( 'wp_footer', 'ms_skype_live_chat' );