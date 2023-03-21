<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
$pagetitle = "Manage Member Account";
?>

<?php include('includes/header.php'); ?>
 <?php admin_logged_in(); ?>
 
<?php 
$book = get_allbook($_GET['booking']);
$book_part = mysqli_fetch_array($book);

//$showstudent = get_userid($_GET["pid"]);
//$get_student = mysql_fetch_array($showstudent);

?>
 <?php admin_logged_in(); ?>
<?php include('includes/sidebar.php'); ?>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Member Info</h2>
								
<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			//$required_fields = array('fullname','address','phone','email','gender','dob','password');
			$required_fields = array('username','email','phone','address');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			include("../includes/image_upload_app1.php");
			if(strlen($db_images) < 7){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				$passport = $db_images;
				$username = stripslashes($_REQUEST['username']);
				$username = mysqli_real_escape_string($connection,$_POST['username']);
				$address = stripslashes($_REQUEST['address']);
				$address = mysqli_real_escape_string($connection,$_POST['address']);
				$email= stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				/*$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$dob = stripslashes($_REQUEST['dob']);
				$dob = mysqli_real_escape_string($connection,$_POST['dob']);
				$password = stripslashes($_REQUEST['password']);
				$password = md5(mysqli_real_escape_string($connection,$_POST['password']));
				$passmail = mysqli_real_escape_string($connection,$_POST['password']);*/
				//$stid = mysql_prep($_GET['pid']);
						$stid = $_GET['pid'];


					/*"UPDATE newmember_tbl SET 
							username = '{$username}',
							email = '{$email}',
							phone = '{$phone}',
							address = '{$address}',
							image = '{$passport}'
						WHERE id = {$stid}";*/
				$query = 	"UPDATE newmember_tbl SET 
						 username = '{$username}',
						
							email = '{$email}',
							phone = '{$phone}',
							address = '{$address}',
							
						 image = '{$passport}'
						WHERE id = '{$stid}'
						";	
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Member data Successfully Updated !')</script>";
				redirect_to('manage_members');
					
				} else {
					// Display error message.
					echo "<p>Subject creation failed.</p>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?>
<?php /*?><?php 
$member = get_user_id($_SESSION['username']);
	$member_part = mysql_fetch_array($member);
	

	// make sure the subject id sent is an integer
	if (intval($_GET['pid']) == 0) {
		redirect_to('dashboard.php');
	}
	
if (isset($_POST['submit'])) {
$errors = array();
$rand1 = time();														
$required_fields = array('username','email','phone','address');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			
			include("../includes/image_upload_app1.php");
			if(strlen($db_images) < 7){ $errors[] = "No image upload"; }
			
			if (empty($errors)) {

				// Perform Update
				$stid = mysql_prep($_GET['pid']);
				$passport = $db_images;
				$username = mysql_prep($_POST['username']);
                $email = mysql_prep($_POST['email']);
				$phone = mysql_prep($_POST['phone']);
				$address = mysql_prep($_POST['address']);
				
			$query = 	"UPDATE newmember_tbl SET 
							username = '{$username}',
							email = '{$email}',
							phone = '{$phone}',
							address = '{$address}',
							image = '{$passport}'
						WHERE id = {$stid}";
						
						
						
			$result = mysql_query($query);
			if (mysql_affected_rows() == 1) {
					// Success!
			echo "<script type='text/javascript'>alert('Member data Successfully Updated !')</script>";
					redirect_to("manage_members.php");
				} else {
					// Display error message.
										echo  "<p>" . mysql_error() . "</p>";

				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?><?php */?>
<!-- Left side column. contains the logo and sidebar -->
<?php include('includes/sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Hotel la Blaze <small></small>          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">View Members </li>
          </ol>
        </section>

       <!-- Main content -->
        <section class="content">
		
		          <!-- Your Page Content Here -->

          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit User Account </h3>
				                  </div><!-- /.box-header --><br>
<?php 
//$showstudent = get_userid($_GET["pid"]);
//$get_student = mysql_fetch_array($showstudent);
?>
			  <div class="box-body"><!-- /.Form Wrapper -->
<form method="post" action="manage_edituser.php?booking=<?php echo $_GET["booking"]; ?>" enctype="multipart/form-data">


								
                     
                     <div class="form-group">
                      <label for="exampleInputEmail1">book_id:</label>
                      <input type="text" class="form-control"  placeholder="please enter your username" name="username" value="<?php echo $book_part['book_id']; ?>">
                    </div>
                    																	
					
                <div class="form-group">
                      <label for="exampleInputEmail1">
                     <?php /*?> <?php $rm = $row['room_id'];
											 $query = "SELECT * from roomtbl where room_id = '$rm' order by room_id";
											 $result = mysqli_query($connection, $query);
											 $cat_set = mysqli_fetch_array($result);
											 echo $cat_set['room_name'];
											 ?><?php */?>
                          </label>
                      
                      
                       <input type="text" class="form-control"  placeholder="Phone Number" name="email" value="<?php echo $book_part['room_name']; ?>">
                    </div>												
																			
					 <div class="form-group">
                      <label for="exampleInputEmail1">Phone:</label>
                      <input type="text" class="form-control"  placeholder="Phone Number" name="phone" value="<?php echo $book_part['amount']; ?>">
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputEmail1">Phone:</label>
                      <input type="text" class="form-control"  placeholder="Phone Number" name="phone" value="<?php echo $book_part['room_id']; ?>">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Phone:</label>
                      <input type="text" class="form-control"  placeholder="Phone Number" name="phone" value="<?php echo $book_part['no_room']; ?>">
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputEmail1">image</label>
                      <input type="text" class="form-control"  placeholder="Phone Number" name="phone" value="<?php 
														$img_url = $row["receiptimage"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $row['receiptdescription']; ?>" height="70" width="70" />
<?php } } ?>">
                    </div>
					
				 <div class="row">
                  
						<div class="col-xs-6">
						 <label for="exampleInputEmail1">time:</label>
						  <input class="form-control" placeholder="Enter New Address" type="text" name="address" value="<?php echo timeAgo1(get_date_2a($row['time']));?>">
						</div>
                  
                    
                  </div>
				  <br>
				

				  <div class="row">
                   
						<?php /*?><div class="col-xs-4">
						 <label for="exampleInputEmail1">Current Image:</label><br />
						<?php 
														$img_url = $book_part["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $user_part['image']; ?>" height="70" width="70" />
<?php } } ?>
								
						</div><?php */?>
						
				  <div class="row">
                   
						<div class="col-xs-4">
						 <label for="exampleInputEmail1">Select Image:</label>
						 <input name="file_1" type="file" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
						</div>
						
						
					<?php /*?>   
						<div class="col-xs-4">
                      <label>Select</label>
                      <select class="form-control" name="sex">
                        <option value="Male" <?php if($get_student['sex']=="Male"){ ?> selected="selected" <?php } ?>>Male</option>
                        <option value="Female" <?php if($get_student['sex']=="Female"){ ?> selected="selected" <?php } ?>>Female</option>
                      </select>
                    </div>
					   
                   
						<div class="col-xs-4">
						 <label for="exampleInputEmail1">City</label>
						  <input class="form-control"  type="text" name="city" value="<?php echo $get_student['city']; ?>">
						</div>
<?php */?>

				</div>	
								  <br>

				
								  
              </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </div>
              </div><!-- /.box -->
			  </form>
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
		
		
		
		</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>