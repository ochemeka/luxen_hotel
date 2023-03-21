<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include('../includes/pagination.php'); ?>
<?php
 admin_logged_in(); 
 
$pagetitle="Change Password"

?>
<?php include("includes/header.php"); 
//get_admin2($aduser)
//$adm = get_admin();
$adm = get_admin2();
$adm_part = mysqli_fetch_array($adm);

	/*$member = get_admin($_SESSION['admuser']);
	$member_part = mysql_fetch_array($member);*/

	
	
?>

<?php




// START FORM PROCESSING
if (isset($_POST['submit'])) { // Form has been submitted.
$errors = array();

		$required_fields = array('password','pass_nw','con_password');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			
		$oldpass = stripslashes($_REQUEST['password']);
			$oldpass = mysqli_real_escape_string($connection,$_POST['password']);
			$newpass = stripslashes($_REQUEST['pass_nw']);
			$newpass = mysqli_real_escape_string($connection,$_POST['pass_nw']);
			$con_password = stripslashes($_REQUEST['con_password']);
			$con_password = mysqli_real_escape_string($connection,$_POST['con_password']);
			
		if ($newpass != $con_password){
			echo "<script type='text/javascript'>alert('Confirm Password Do Not Match!')</script>";
			redirect_to(SITE_PATH."change_password.php");
			 }else{

		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			/*$query = "SELECT * ";
			$query .= "FROM newmember_tbl ";
			$query .= "WHERE pass = '{$hashed_pass1}' ";
			$query .= "AND id = '{$_SESSION['user_id']}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match*/
				
			/*$query = "SELECT * ";
			$query .= "FROM admintbl ";
			$query .= "WHERE adm_password = '{$oldpass}' ";
			$query .= "AND adm_id = '{$_SESSION['adm_id']}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {*/
				// username/password authenticated
				// and only 1 match	
				
						/*	$query = 	"UPDATE newmember_tbl SET 
							pass = '{$hashed_pass3}', 
							temp_pass = '{$passmail}' 
						WHERE id = {$_SESSION['user_id']}";*/
				$query = 	"UPDATE admintbl SET 
							adm_password = '{$newpass}' 
						WHERE adm_id = {$_SESSION['adm_id']}";
					
			$result = mysqli_query($connection,$query);
			if (mysqli_affected_rows($connection) == 1) {
					// Success!
					echo "<script type='text/javascript'>alert('Admin Password Updated Successfully!')</script>";
						redirect_to("manage_changepass.php");
					
				} else {
					// Display error message.
					echo "<p>Error.</p>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}


			} else {
				// username/password combo was not found in the database
				echo "<script type='text/javascript'>alert('Incorrect Old Password!')</script>";
			}			
		}

	}
?>

<?php /*?> <?php 
if (isset($_POST['submit'])) {
$errors = array();


			$required_fields = array('password','pass_nw','con_password');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}

			$oldpass = stripslashes($_REQUEST['password']);
			$oldpass = mysqli_real_escape_string($connection,$_POST['password']);
			$newpass = stripslashes($_REQUEST['newpassword']);
			$newpass = mysqli_real_escape_string($connection,$_POST['newpassword']);
			$con_password = stripslashes($_REQUEST['con_password']);
			$con_password = mysqli_real_escape_string($connection,$_POST['con_password']);
			if ($newpass != $con_password){
					echo "<script type='text/javascript'>Alert('confirm password doesnt match')</script>";			
					redirect_to("manage_changepass.php");
			}else{
			}
			if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			//$query = "SELECT * ";
//			$query .= "FROM admintbl ";
//			$query .= "WHERE password = '{$passold}' ";
//			$query .= "AND adm_id = '{$_SESSION['admid']}' ";
//			$query .= "LIMIT 1";
//			$result_set = mysql_query($query);
//			confirm_query($result_set);
			$query = "SELECT * ";
			$query .= "FROM admintbl ";
			$query .= "WHERE adm_password = '{$oldpass}' ";
			$query .= "AND adm_id = '{$_SESSION['admid']}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				
							$query = 	"UPDATE admintbl SET 
							adm_password = '{$passnw}' 
						WHERE adm_id = {$_SESSION['user_id']}";
			$result = mysqli_query($connection,$query);
			if (mysqli_affected_rows($connection) == 1) {
					// Success!
					echo "<script type='text/javascript'>alert('Admin Password Updated Successfully!')</script>";
					redirect_to(SITE_PATH."admin/dashboard.php");
					
				} else {
					// Display error message.
					echo "<p>Error.</p>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}



			} else {
				// username/password combo was not found in the database
				$message = "Wrong Old Password.";
			}			
			}

	}
?><?php */?>

<?php /*?><?php 
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		$errors = array();

		$required_fields = array('password','pass_nw');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			
		$passold = mysql_prep($_POST['password']);
		$passnw = mysql_prep($_POST['pass_nw']);
		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT * ";
			$query .= "FROM admintbl ";
			$query .= "WHERE password = '{$passold}' ";
			$query .= "AND adm_id = '{$_SESSION['admid']}' ";
			$query .= "LIMIT 1";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			if (mysql_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				
							$query = 	"UPDATE admintbl SET 
							 password = '{$passnw}' 
						WHERE adm_id = {$_SESSION['user_id']}";
			$result = mysql_query($query);
			if (mysql_affected_rows() == 1) {
					// Success!
					echo "<script type='text/javascript'>alert('Updating Password Successfull !')</script>";
					redirect_to(SITE_PATH."manager/dashboard.php");
				} else {
					// Display error message.
					echo "<p>Error.</p>";
					echo "<p>" . mysql_error() . "</p>";
				}



			} else {
				// username/password combo was not found in the database
				$message = "Wrong Old Password.";
			}			
			
}
	}
?><?php */?>

 <!-- Left side column. contains the logo and sidebar -->
	<?php include('includes/sidebar.php'); ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Change Password
            <small>Change Password</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Change Password</a></li>
            <li class="active">Change Password</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
          
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><h3>Change Password</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				          
				 <p>Fill in your credential below.<p><br>
				 
			
             <?php if (!empty($message)) {echo "<div class='error'>" . $message . "</div>";} ?>
            <?php if (!empty($errors)) { display_errors($errors); } 
			if(isset($_GET['status'])){
			echo $msg="Update Successful";
			}
			
			?>
						<!--form method="post" action="" enctype="multipart/form-data"-->
								<form action="" method="post" enctype="multipart/form-data">
									
									
                            <label >Old Password:<span style="color:#F00;"> <?php echo $adm_part['adm_password'];?></span></label>
                                <input name="password" type="password" placeholder="Old Password" class="form-control" /><br />
									
						
									
                        <div class="controls"><label>New Password:</label>
										<input name="pass_nw" type="password" placeholder="New Password" class="form-control"/>
										
                                        <br />
                        <label>Confirm Password: </label>
                                <input name="con_password" type="password" placeholder="Old Password" class="form-control" /><br />		                

										 <button type="submit" name="submit" id="signup-submit-btn" class="btn-base-bg btn-base-sm btn-block radius-3 margin-b-30">Change Password</button>          
									  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>