<?php

session_start();
include 'lib/captcha/simple-php-captcha.php';
include 'functions/scripts.php';
include 'functions/site.php';
include 'functions/chat.php';
include 'functions/mail.php';

// show admin bar only for admins
if (!current_user_can('manage_options')) {
	add_filter('show_admin_bar', '__return_false');
}

// show admin bar only for admins and editors
if (!current_user_can('edit_posts')) {
	add_filter('show_admin_bar', '__return_false');
}

function open4scrum_wp_mail_from_name($from_name){
	return get_bloginfo('title');
}
add_filter("wp_mail_from_name", "open4scrum_wp_mail_from_name");

function open4scrum_wp_mail_from($email){
	return get_bloginfo('admin_email');
}
add_filter("wp_mail_from", "open4scrum_wp_mail_from");


?>