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


?>