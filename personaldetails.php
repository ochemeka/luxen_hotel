<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php include('includes/image_upload_functions.php');

?>
<?php
confirm_logged_in();
$pagetitle="edituser"; 
?>
<?php 
	$member = get_user_id($_SESSION['username']);
	$member_part = mysqli_fetch_array($member);
	
	 $ewallet = get_ewallet_id($_SESSION['username']);
	$ewallet_part = mysqli_fetch_array($ewallet);
 ?>
<?php	
	if(isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('username','email','phone','address');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
            include("includes/image_upload_app.php");
			if(strlen($db_images) < 7){ $errors[] = "No image upload"; }
						
			if (empty($errors)) {
				// Perform Update
				/*$user = mysqli_real_escape_string($_SESSION['user_id']);
				$passport = $db_images;
				//$passport = $db_images;
				$username = mysql_prep($_POST['username']);
				$email = mysql_prep($_POST['email']);
				$address = mysql_prep($_POST['address']);
                $phone = mysql_prep($_POST['phone']);*/
				
				$user = mysqli_real_escape_string($_SESSION['user_id']);
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$username = stripslashes($_REQUEST['username']);
				$username = mysqli_real_escape_string($connection,$_POST['username']);
				$address = stripslashes($_REQUEST['address']);
				$address = mysqli_real_escape_string($connection,$_POST['address']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				
			$query = 	"UPDATE newmember_tbl SET 
						username = '{$username}',
						email = '{$email}',
						address = '{$address}',
						phone = '{$phone}',
						image = '{$passport}',
						WHERE id = '{$user}'  
						ORDER BY id DESC";
			
			$result = mysqli_query($connection,$query);
			if (mysqli_affected_rows($connection) == 1) {

					$url = SITE_PATH.'dashboard.php?status=success';
								echo "<p>" . mysqli_error($connection) . "</p>";

					// Success!
					redirect_to($url);
					
				} else {
					// Display error message.
					//redirect_to("{$postid}/{$postt}");
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
									echo "<p>" . mysqli_error($connection) . "</p>";

			}
			
			


} // end: if (isset($_POST['submit']))
 ?>
<?php include('includes/header3.php');?>
 <?php include('includes/headsection.php')?>
    <!-- CONTENT AREA -->
    <div class="content-area">
	
								
								<!-- BREADCRUMBS -->
								<!--  <section class="page-section breadcrumbs text-left">
								<div class="container">
								<div class="page-header">
								<h3>Member Dashbaord</h3>
								</div>
								</div>
								</section>-->
								<!-- /BREADCRUMBS -->

		
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
			<div class="row">
				
				 
					<div class="col-lg-3">
							
							<?php include('includes/sidebarindex.php');?>
								
</div>
						<div class="col-lg-4">
						
								
				
										
			<form method="post" enctype="multipart/form-data">
			<?php if (!empty($message)) {echo "<p class=\status_report\">" . $message ."</p>";} ?>
			  <div class="box-body"><!-- /.Form Wrapper -->
			
					
								
					 <div class="form-group">
                      <p for="exampleInputEmail1">Current fullname: <?php //echo $member_part['username']; ?></p>
                      <input type="text" class="form-control"  placeholder="Enter FullName"  name="username"  value=" <?php echo $member_part['username']; ?>" readonly >
                    </div><br /><br />
					
					 <div class="form-group">
                      <p for="exampleInputEmail1">Current email: <?php //echo $member_part['email']; ?></p>
                      <input type="text" class="form-control"  placeholder="Enter Email" name="email" value=" <?php echo $member_part['email']; ?>" readonly >
                    </div>
				 	<br /><br />
					 <div class="form-group">
							<p for="exampleInputEmail1">Current Passport: <p><?php 
														$img_url = $member_part["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php //echo $row['email']; ?>" height="80" width="80" />
<?php } } ?>   
</p></p>
							<!--<input name="file_1" type="file" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />-->
                   </div>
								</div>
								
								
								<!--<div class="col-lg-9">-->
								
								<!--<div id="collapse1" class="collapse collapse-luxen in">
															<div class="padt20">    	
										<p>Consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Lnia bibendum nulla sedr.Aeum dolor sit amet, consectetur</p>-->
									</div>	<div class="col-lg-4">
						
								
				
			
			  <div class="box-body"><!-- /.Form Wrapper -->
			
					
					 <div class="form-group">
                      <p for="exampleInputEmail1">Current address: <?php //echo $member_part['address']; ?></p>
                      <input type="text" class="form-control"  placeholder="Enter Address" name="address" value=" <?php echo $member_part['address']; ?>" readonly >
                    </div><br /><br />
				
					
					 <div class="form-group">
                      <p for="exampleInputEmail1">Current phone no: <?php //echo $member_part['phone']; ?></p>
                      <input type="text" class="form-control"  placeholder="Enter Phone No." name="phone" value="<?php echo $member_part['phone']; ?>" readonly >
                    </div><br /><br />
					
								<div class="form-group">
                      <label for="exampleInputEmail1">Edit</label>
                  <a href="edituser.php" class="list-group-item">Edit Personal Details</a>
                    </div>
				   
					
								
				 
								</div>
								</div>
								</div>
							<?php /*?><div class="panel panel-luxen">
								<div class="panel-style">
								<h4><span class="plus-box"><i class="fa fa-angle-down"></i></span> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2">IT'S ACCORDION TAB</a></h4>
								</div>
								<div id="collapse2" class="collapse collapse-luxen">
									<div class="padt20">    	
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo veniam voluptas repudiandae consectetur est doloribus esse maiores commodi minima ut dignissimos suscipit atre soluta beatae quos molestiae quae velit sed dolores commodi sequi tempora autem sint non obcaecati illo aperiam blanditiis laudantium eius magni pariatur officiis!</p>
									</div>
								</div>
							</div>
							<div class="panel panel-luxen">
								<div class="panel-style">
								<h4><span class="plus-box"><i class="fa fa-angle-down"></i></span> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3">MORE INFO IS HERE</a></h4>
								</div>
								<div id="collapse3" class="collapse collapse-luxen">
									<div class="padt20">    	
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing eo non iure culpa adipisci iste suscipit consequuntur ea id quibusdam esse quia voluptates mollitia quasi itaque assumenda vitae optio eaque qui alias dolorum voluptatibus explicabo.</p>
									</div>
								</div><?php */?>
							</div>
						</div>
					</div>
				</div>
				
				
<?php include('includes/footer2.php');?>