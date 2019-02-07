<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// organize ACF options pages and menus

if(function_exists('acf_add_options_page')) {

	function ms_marketing_submenus() {
		//backend navigation buttons 
		add_menu_page(
			'Visitor Attraction Pro',
			'Visitor Attraction Pro',
			'manage_options',
			'ms-visitor-attraction-pro',
			'ms_visitor_attraction_pro_callback',
			plugins_url( 'visitor-attraction-pro/assets/images/vap-icon.png' )
		);
		add_submenu_page(
			'ms-visitor-attraction-pro',
			'MS Popup',
			'MS Popup',
			'manage_options',
			'edit.php?post_type=ms-simple-popup'
		);
		add_submenu_page(
			'ms-visitor-attraction-pro',
			'MS Notification',
			'Web Notification',
			'manage_options',
			'edit.php?post_type=ms-web-notification'
		);
		add_submenu_page(
			'ms-visitor-attraction-pro',
			'MS Slider',
			'MS slider',
			'manage_options',
			'edit.php?post_type=ms-simple-slider'
		);
	}
	add_action( 'admin_menu', 'ms_marketing_submenus', 10, 2 );

	acf_add_options_sub_page(array(
		'page_title' => 'MS Feedback Tool',
		'menu_title' => 'MS Feedback',
		'parent_slug' => 'ms-visitor-attraction-pro',
		'menu_slug'  => 'ms-feedback-tool',
		'capability' => 'manage_options',
	));
	acf_add_options_sub_page(array(
		'page_title' => 'FB Live Chat',
		'menu_title' => 'FB Live Chat',
		'parent_slug' => 'ms-visitor-attraction-pro',
		'menu_slug'  => 'ms-fb-chat',
		'capability' => 'manage_options',
	));
	acf_add_options_sub_page(array(
		'page_title' => 'Skype Live Chat',
		'menu_title' => 'Skype Live Chat',
		'parent_slug' => 'ms-visitor-attraction-pro',
		'menu_slug'  => 'ms-skype-chat',
		'capability' => 'manage_options',
	));

	function ms_marketing_submissions() {
		add_submenu_page( 
			'ms-visitor-attraction-pro',
			'Submissions',
			'Submissions',
			'manage_options',
			'ms-vap-submissions',
			'ms_vap_callback'
		);
	}
	add_action( 'admin_menu', 'ms_marketing_submissions', 999, 999 );

	// callback for ms-visitor-attraction-pro

	function ms_visitor_attraction_pro_callback() { ?>
		<style type="text/css">
			.notice.is-dismissible.updated.error.acf-notice {
				display: none;
			}
			* {
				box-sizing: border-box;
			}
		</style>

		<div class="clearfix"></div>
		<?php // notification ?>
		<div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
			<strong>Thank you</strong> for using Visitor Attraction Pro. From here, you can navigate to all the Visitor Attraction Pro easily
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<div class="container">
			<div class="row">
				<?php // display image navigations ?>
				<div class="text-center mt-4 mb-4 col-12">
					<h1 class="ms-admin-heading-one">Visitor Attraction Pro</h1>
					<h3>Visitors attraction made easy</h3>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4 mb-4" title="MS Popup Module">
					<a href="<?php echo get_admin_url(); ?>edit.php?post_type=ms-simple-popup" class="ms-d-block">
						<img src="<?php echo plugins_url( '../assets/images/popup.jpg', __FILE__ ); ?>" class="w-100">
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4 mb-4" title="MS Web Notification Module">
					<a href="<?php echo get_admin_url(); ?>edit.php?post_type=ms-web-notification" class="ms-d-block">
						<img src="<?php echo plugins_url( '../assets/images/notification.jpg', __FILE__ ); ?>" class="w-100">
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4 mb-4" title="MS Slider Module">
					<a href="<?php echo get_admin_url(); ?>edit.php?post_type=ms-simple-slider" class="ms-d-block">
						<img src="<?php echo plugins_url( '../assets/images/slider.jpg', __FILE__ ); ?>" class="w-100">
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4 mb-4" title="MS Feedback Tool">
					<a href="<?php echo get_admin_url(); ?>admin.php?page=ms-feedback-tool" class="ms-d-block">
						<img src="<?php echo plugins_url( '../assets/images/feedback.jpg', __FILE__ ); ?>" class="w-100">
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4 mb-4" title="Facebook Live Chat">
					<a href="<?php echo get_admin_url(); ?>admin.php?page=ms-fb-chat" class="ms-d-block">
						<img src="<?php echo plugins_url( '../assets/images/chat.jpg', __FILE__ ); ?>" class="w-100">
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4 mb-4" title="Skype Live Chat">
					<a href="<?php echo get_admin_url(); ?>admin.php?page=ms-skype-chat" class="ms-d-block">
						<img src="<?php echo plugins_url( '../assets/images/skype.jpg', __FILE__ ); ?>" class="w-100">
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4 mb-4" title="Submissions">
					<a href="<?php echo get_admin_url(); ?>admin.php?page=ms-vap-submissions" class="ms-d-block">
						<img src="<?php echo plugins_url( '../assets/images/submissions.jpg', __FILE__ ); ?>" class="w-100">
					</a>
				</div>

			</div>
		</div>
	<?php }

	// callback for the submissions page

	function ms_vap_callback() { ?>

		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center mt-4 mb-4 col-12">
						<h1 class="ms-admin-heading-one">Visitor Attraction Pro Submissions</h1>
						<h3>Here are the submissions/email subscribers</h3>
					</div>
				</div>
			</div>
		</div>

		<nav>
		  	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		    	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Popup</a>
		    	<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Feedback</a>
		  	</div>
		</nav>

		<div class="tab-content" id="nav-tabContent">
		  	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

				<!-- popup submissions -->

				<?php
					global $wpdb;
					$popup_subscribers = $wpdb->prefix . 'ms_popup_submit';
					$feedback_subscribers = $wpdb->prefix . 'ms_feedback_submit';
					$subscribers = $wpdb->get_results( "SELECT * FROM $popup_subscribers" );
					$feedback_subscribers = $wpdb->get_results( "SELECT * FROM $feedback_subscribers" );
				?>

		  		<div class="container">
					<div class="row">
						<div class="col-12 mt-4 ms-pt-4">
							<table id="ms-popup-elist" class="table table-striped table-bordered" cellspacing="0" width="100%">

						        <thead>
						            <tr>
						                <th>ID</th>
						                <th>Name</th>
						                <th>Email</th>
						                <th>Submit Date</th>
						                <th>Sent To</th>
						            </tr>
						        </thead>

						        <tfoot>
						            <tr>
						                <th>ID</th>
						                <th>Name</th>
						                <th>Email</th>
						                <th>Submit Date</th>
						                <th>Sent To</th>
						            </tr>
						        </tfoot>

						        <tbody>
						        	<?php
						        	foreach( $subscribers as $subscriber ) {
						        	?>

						            <tr>
						                <td><?php echo $subscriber->ms_popup_id; ?></td>
						                <td><?php echo $subscriber->ms_popup_name; ?></td>
						                <td><?php echo $subscriber->ms_popup_email; ?></td>
						                <td><?php echo $subscriber->ms_popup_time; ?></td>
						                <td><?php echo $subscriber->ms_popup_mailto; ?></td>
						            </tr>

									<?php } ?>

						        </tbody>

						    </table>
						</div>
					</div>
				</div>

				<!-- popup submissions end -->

		  	</div>

		  	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

				<!-- feedback submissions -->

				<div class="container">
					<div class="row">
						<div class="col-12 mt-4 ms-pt-4">
							<table id="ms-feedback-elist" class="table table-striped table-bordered" cellspacing="0" width="100%">
						        <thead>
						            <tr>
						                <th>ID</th>
						                <th>Emoji</th>
						                <th>Email</th>
						                <th>Feedback</th>
						                <th>Submit Date</th>
						            </tr>
						        </thead>

						        <tfoot>
						            <tr>
						                <th>ID</th>
						                <th>Emoji</th>
						                <th>Email</th>
						                <th>Feedback</th>
						                <th>Submit Date</th>
						            </tr>
						        </tfoot>

							    <tbody>

						        	<?php foreach ( $feedback_subscribers as $feedback_subscriber ) { ?>

						            <tr>
						                <td><?php echo $feedback_subscriber->ms_feedback_id; ?></td>
						                <td><?php echo $feedback_subscriber->ms_feedback_emoji; ?></td>
						                <td><?php echo $feedback_subscriber->ms_feedback_email; ?></td>
						                <td><?php echo $feedback_subscriber->ms_feedback; ?></td>
						                <td><?php echo $feedback_subscriber->ms_feedback_time; ?></td>
						            </tr>

						            <?php } ?>

							    </tbody>
							</table>
						</div>
					</div>
				</div>

			<!-- popup submissions end -->

			</div>
		</div>

	<?php }
}