<?php

$chat = new open4scrum_chat();
class open4scrum_chat{

	function __construct() {

		add_action( 'wp_ajax_open4scrum_chat_display', array( &$this, 'ajax' ) );
		add_action( 'wp_ajax_open4scrum_chat_save', array( &$this, 'save' ) );

	}

	function display(){

		?>

		<div class="row-fluid" id="open4scrum_chat_content"></div>

		<form method="POST" id="open4scrum_chat_form" class="well">
			<div class="controls">
				<div class="input-append">
					<textarea id="open4scrum_chat" name="chat" class="span12 autogrow" placeholder="type your message and hit enter..."></textarea>
				</div>
			</div>
			<?php wp_nonce_field('comment'); ?>
		</form>


		<?php

		add_action( 'wp_footer', array( $this, 'footer_focus' ), 20 );

	}

	function ajax(){

		$args = array(
			'number' => '10',
			'order' => 'DESC',
		);
		$comments = get_comments( $args );

		$comments = array_reverse( $comments );

		echo '<ul class="dashboard-list">';

		foreach( $comments as $comment ){

			$seconds = strtotime( current_time('mysql') ) - strtotime( $comment->comment_date );

			?>
			<li>
					<!--img class="dashboard-avatar" alt="Usman" src="http://www.gravatar.com/avatar/f0ea51fa1e4fae92608d8affee12f67b.png?s=50"-->
					<span class="icon icon-blue icon-comment-text"></span>&nbsp;
					<?php if( $seconds < 1000  ) echo '<strong>'; ?>
						<?php echo $comment->comment_content; ?>
					<?php if( $seconds < 1000  ) echo '</strong>'; ?>
					<br>
					<span style="color:#999;"><?php echo $comment->comment_author_email; ?> - <?php echo date( 'Y-m-d H:i', strtotime( $comment->comment_date ) ); ?></span>

			</li>

			<?php
		}

		echo '</ul>';

		die();
	}

	function save(){

		global $post;

		if( isset( $_POST['chat'] ) && !empty( $_POST['chat'] ) && check_admin_referer( 'comment' ) ){

			$chat = esc_html( $_POST['chat'] );

			$user = wp_get_current_user();

			$time = current_time('mysql');

			$data = array(
				'comment_post_ID' => get_the_ID(),
				'comment_author' => $user->user_login,
				'comment_author_email' => $user->user_email,
				'comment_content' => $chat,
				'user_id' => $user->ID,
				'comment_date' => $time,
				'comment_approved' => 1,
			);

			wp_insert_comment($data);


		}

		die();
	}

	function footer_focus(){
		?>
		<script>
			jQuery(document).ready(function ($) {
				$('#open4scrum_chat').autogrow();
				$('#open4scrum_chat').focus();
				$("#open4scrum_chat").keypress(function(e){
					var code = (e.keyCode ? e.keyCode : e.which);
					if (code == 13)	{

						var data = {
							action: 'open4scrum_chat_save',
							chat: $('#open4scrum_chat').val(),
							_wpnonce: '<?php echo wp_create_nonce('comment'); ?>'
						};

						// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
						jQuery.post( '<?php echo admin_url('admin-ajax.php'); ?>', data, function(response) {

							$("#open4scrum_chat_content").load("<?php echo admin_url('admin-ajax.php'); ?>?action=open4scrum_chat_display");
							$('#open4scrum_chat').val('');

						});

					}
				});
				jQuery("#open4scrum_chat_content").load("<?php echo admin_url('admin-ajax.php'); ?>?action=open4scrum_chat_display");
				setInterval('jQuery("#open4scrum_chat_content").load("<?php echo admin_url('admin-ajax.php'); ?>?action=open4scrum_chat_display");', 3000);
			});
		</script>
		<?php
	}

}

?>