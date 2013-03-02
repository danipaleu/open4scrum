<?php

/**
 * Handles login and create new site
 */
$open4scrumsite = new open4scrum_site();
class open4scrum_site {

	function __construct() {

		add_action( 'init', array( &$this, 'init' ) );

	}

	static function get_blogurl( $user_id ){

		$url = get_bloginfo('url');
		$blogs = get_blogs_of_user( $user_id, true );

		foreach( $blogs as $key => $blog ){
			if ( $key != 1 ){
				$url = $blog->siteurl;
				break;
			}

		}

		return $url;

	}

	function init(){

		//check if login
		if( isset( $_POST['button_login'] ) &&
				isset( $_POST['email'] ) &&
				isset( $_POST['password'] ) ){

			if ( check_admin_referer( 'login-site' ) ){

				$user = wp_authenticate( $_POST['email'], $_POST['password'] );

				if ( get_class( $user ) == 'WP_User' ){

					wp_set_auth_cookie( $user->ID, true );
					do_action( 'wp_login', $user->user_login );

					//redirect to site!
					wp_safe_redirect( $this->get_blogurl( $user->ID ) );

					exit;

				}

			}

		}

	}

	function display_login() {

		if ( isset( $_POST['button_login'] ) ) {
			$this->login_action();
		}

		$this->login_form();

	}

	function login_form() {

		?>
	<form class="form-horizontal" method="POST">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="email">Email Address</label>

				<div class="controls">
					<input class="input-xlarge focused" name="email" id="email" type="text" value="<?php echo $_POST['email']; ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Password</label>

				<div class="controls">
					<input class="input-xlarge focused" name="password" id="password" type="password" value="<?php echo $_POST['password']; ?>">
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary" name="button_login">Login</button>
			</div>
		</fieldset>
		<?php wp_nonce_field( 'login-site' ); ?>
	</form>
	<?php

		add_action( 'wp_footer', array( $this, 'footer_focus' ), 20 );

	}

	function footer_focus() {
		?>
	<script>
		jQuery(document).ready(function ($) {

			$('input[name="email"]').focus();

		});
	</script>
	<?php
	}

	function display_create() {

		if ( isset( $_POST['button_create'] ) ) {
			$this->create_action();
		}

		$this->create_form();

	}

	function create_form() {

		$_SESSION['captcha'] = captcha( array(
			'code'            => '',
			'min_length'      => 6,
			'max_length'      => 6,
			'png_backgrounds' => array( 'default.png' ),
			'fonts'           => array( get_theme_root() . '/open4scrum/lib/captcha/times_new_yorker.ttf' ),
			'characters'      => '0123456789',
			'min_font_size'   => 30,
			'max_font_size'   => 30,
			'color'           => '#999',
			'angle_min'       => 10,
			'angle_max'       => 35,
			'shadow'          => true,
			'shadow_color'    => '#666',
			'shadow_offset_x' => - 2,
			'shadow_offset_y' => 2
		) );

		?>
	<form class="form-horizontal" method="POST">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="company">Company Name</label>

				<div class="controls">
					<input class="input-xlarge focused" name="company" id="company" type="text" value="<?php echo $_POST['company']; ?>" placeholder="a name for all your projects">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Email Address</label>

				<div class="controls">
					<input class="input-xlarge focused" name="email2" id="email2" type="text" value="<?php echo $_POST['email2']; ?>" placeholder="your email address">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Captcha Control</label>

				<div class="controls">
					<input class="input-xlarge span4" name="captcha" id="captcha" type="text" value="" placeholder="captcha code" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>

				<div class="controls">
					<img src="<?php echo $_SESSION['captcha']['image_src']; ?>" alt="captcha" class="span4" />
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary" name="button_create">Create</button>
			</div>
		</fieldset>
		<?php wp_nonce_field( 'create-site' ); ?>
	</form>
	<?php
	}

	function login_action() {

		if ( isset( $_POST['button_login'] ) ){
			?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Not authenticated!</strong> Your logon credentials are wrong!
			</div>
			<?php
		}

	}

	function create_action() {

		global $wpdb;

		if ( $_REQUEST['captcha'] != $_SESSION['captcha']['code'] ) {
			?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Captcha check</strong><br />Captcha control code missing or wrong.<br />Please, try again!
		</div>
		<?php

			return;
		}

		if ( ! check_admin_referer( 'create-site' ) ) {
			?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Security check!</strong> Something didn't validate correct, no site created!
		</div>
		<?php

			return;
		}

		$company      = esc_attr( $_POST['company'] );
		$company_name = esc_attr( $_POST['company'] );

		$company = sanitize_title( $company );

		$email = esc_attr( $_POST['email2'] );
		$email = sanitize_email( $email );

		if ( preg_match( '|^([a-zA-Z0-9-])+$|', $company ) )
			$company = strtolower( $company );

		$subdirectory_reserved_names = apply_filters( 'subdirectory_reserved_names', array( 'page', 'comments', 'blog', 'files', 'feed' ) );

		//fill with blog names
		$sites = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "blogs ORDER BY blog_id" ) );
		foreach ( $sites as $row ) {
			$subdirectory_reserved_names[] = str_replace( '/', '', $row->path );
		}

		if ( in_array( $company, $subdirectory_reserved_names ) ) {
			?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Duplicate</strong><br />The given name could not be used to create a new site!
		</div>
		<?php
			return;
		}

		$user_id = email_exists( $email );
		if ( ! $user_id ) { // Create a new user with a random password
			$password = wp_generate_password( 8, false );
			$user_id  = wp_create_user( $email, $password, $email );
			if ( false == $user_id ) {
				?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>Error!</strong> Unable to create user!
			</div>
			<?php
				return;
			}
			else {
				//wp_new_user_notification( $user_id, $password );
			}
		}

		$domain = get_bloginfo( 'url' );
		$domain = str_replace( 'http://', '', $domain );
		$domain = str_replace( 'https://', '', $domain );

		$path = '/' . $company . '/';

		$wpdb->hide_errors();
		$blog_id = wpmu_create_blog( $domain, $path, $company_name, 1, array( 'public' => 1 ), 1 );
		$wpdb->show_errors();

		if ( $blog_id ) {
			add_user_to_blog( $blog_id, $user_id, 'subscriber' );
		}

		$blog = get_blog_details( $blog_id );

		//echo print_r($blog,true);

		//Now! Send the person a message about the next step!
		$subject = "Welcome to open4scrum!";
		$body    = "<h1>Welcome!</h1>";
		$body 	.= "<p>Your site for <strong>" . $company_name . "</strong> is now created.</p>";
		$body 	.= "<p>You can <a href=\"" . get_bloginfo('url') . "\">login with your email address and password</a> at any time.</p>";

		if ( !empty( $password ) ){
			$body 	.= "<p><strong>Email Address:</strong> " . $email . "<br/>";
			$body 	.= "<p><strong>Password:</strong> " . $password . "</p>";
		}
		else{
			$body 	.= "<p><strong>Use your existing account to login.</p>";
		}

		$body 	.= "<p>Now, login and invite your collegues and try out open4scrum!</p>";
		$body 	.= "<p><strong>See you!</strong></p>";

		$intro = "Introduction to open4scrum.";

		$mail = new open4scrum_mail();
		$mail->subject = $subject;
		$mail->message = $body;
		$mail->preamble = $intro;
		$mail->to = $email;
		$mail->send();

		$prefix = $wpdb->prefix . $blog->blog_id . '_';

		$sql = "DELETE FROM ". $prefix . "posts;";
		//echo $sql;
		$wpdb->query( $sql );
		$sql = "DELETE FROM ". $prefix . "comments;";
		//echo $sql;
		$wpdb->query( $sql );

		switch_to_blog( $blog->blog_id );

		$home_post = array(
			'post_title'    => 'Home',
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_type'			=> 'page'
		);

		// Insert the post into the database
		$startpage_id = wp_insert_post( $home_post );

		update_post_meta($startpage_id, '_wp_page_template', 'dashboard.php');

		//change theme
		$queries = array(
			"UPDATE ". $prefix . "options SET option_value = 'open4scrum' WHERE option_name = 'template';",
			"UPDATE ". $prefix . "options SET option_value = 'open4scrum' WHERE option_name = 'stylesheet';",
			"UPDATE ". $prefix . "options SET option_value = 'open4scrum' WHERE option_name = 'current_theme';",
			"UPDATE ". $prefix . "options SET option_value = '" . $startpage_id . "' WHERE option_name = 'page_on_front';",
			"UPDATE ". $prefix . "options SET option_value = 'page' WHERE option_name = 'show_on_front';"
		);
		foreach ($queries as $query){
			$wpdb->query($query);
		}

		switch_to_blog( 1 );

		?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Congratulations!</strong><br />Site
			<a href="<?php echo get_bloginfo( 'url' ) . $blog->path; ?>" target="_blank"> <?php echo get_bloginfo( 'url' ) . $blog->path; ?></a> created.<br />Please check your email for more info!
		</div>
		<?php

		return;

	}


}