<?php
	session_start();
	
	function admin_login() {
		return isset($_SESSION['adm_id']);
		return isset($_SESSION['adm_username']);
		return isset($_SESSION['adm_status']);
	}
	
	
	function admin_logged_in() {
		if (!admin_login()) {
			redirect_to(SITE_PATH."manager/index.php");
			exit();
		}
	}
	

	
	
	function logged_in() {
		return isset($_SESSION['user_id']);
		return isset($_SESSION['username']);
		return isset($_SESSION['status']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to(SITE_PATH."login.php");
			exit();
		}
	}
?>
