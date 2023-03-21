<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
$pagetitle = "Admin Login";
?><?php include('includes/header.php'); ?>


<?php
	
	if (admin_login()) {
		redirect_to("dashboard.php");
	}

	
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('username', 'password');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		//$fields_with_lengths = array('username' => 30, 'password' => 30);
		//$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));
		/*
		$username = trim(mysql_prep($_POST['username']));
		$password = trim(mysql_prep($_POST['password']));
		$hashed_password = md5($password);
		*/
		
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($connection,$_POST['username']);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($connection,$_POST['password']);
		//$hashed_password = md5($password);
//		$hashed_password = mysqli_real_escape_string($connection,$_POST['password']);
		
		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT adm_id, adm_username, adm_password, adm_status ";
			$query .= "FROM admintbl ";
			$query .= "WHERE adm_username = '{$username}' ";
			$query .= "AND adm_password = '{$password}' ";
			$query .= "AND adm_status = 1 ";
			$query .= " LIMIT 1";
			//$query = ("SELECT adm_id, adm_username,adm_password, adm_status FROM admintbl WHERE adm_username='".$username."' AND adm_password='".$password."' AND adm_status='1', LIMIT 1");
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysqli_fetch_array($connection,$result_set);
				$_SESSION['adm_id'] = 'adm_id';
				$_SESSION['adm_username'] = 'adm_username';
				$_SESSION['adm_status'] = 'adm_status';
				
				// header("Location: dashboard.php");
				redirect_to("dashboard.php");
			} else {
				// username/password combo was not found in the database
				$message = "Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
			}
		} else {
			if (count($errors) == 1) {
			} else {
			}
		}
		
	} else { // Form has not been submitted.
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			$message = "You are now logged out.";
		} 
		$username = "";
		$password = "";
	}
?>

<?php /*?><?php
	
	if (admin_login()) {
		redirect_to("dashboard.php");
	}

	
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('username', 'password');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('username' => 30, 'password' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$username = trim(mysql_prep($_POST['username']));
		$password = trim(mysql_prep($_POST['password']));
		$hashed_password = md5($password);
		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT adm_id, adm_username, status ";
			$query .= "FROM admintbl ";
			$query .= "WHERE adm_username = '{$username}' ";
			$query .= "AND password = '{$password}' ";
			$query .= "AND status = 1 ";
			$query .= " LIMIT 1";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			if (mysql_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysql_fetch_array($result_set);
				$_SESSION['admid'] = $found_user['adm_id'];
				$_SESSION['admuser'] = $found_user['adm_username'];
				
				redirect_to("dashboard.php");
			} else {
				// username/password combo was not found in the database
				$message = "Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
			}
		} else {
			if (count($errors) == 1) {
			} else {
			}
		}
		
	} else { // Form has not been submitted.
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			$message = "You are now logged out.";
		} 
		$username = "";
		$password = "";
	}
?><?php */?>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo ADMIN_PATH; ?>dashboard.php"><b>Hotel la Blaze</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Hotel la Blaze<br>
          <strong>Sign in to start your session</strong></p>
		  <?php if (!empty($message)) {echo "<p class=\"status_report\">" . $message . "</p>";} ?>
            <?php if (!empty($errors)) { display_errors($errors); } ?>
			
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->
      </div>
      <!-- /.login-box-body -->
    </div><!-- /.login-box -->

<?php include('includes/footer.php'); ?>