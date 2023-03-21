<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php include('includes/image_upload_functions.php');

?>

<?php
confirm_logged_in(); 
$pagetitle="Testimony"
?>

<?php include('includes/header3.php');
	$member = get_user_id($_SESSION['username']);
	$member_part = mysqli_fetch_array($member);
	
	$ewallet = get_ewallet_id($_SESSION['username']);
	$ewallet_part = mysqli_fetch_array($ewallet);
	
	/*$member1 = get_user_id($_GET['username']);
	$member1_part = mysqli_fetch_array($member1);*/
 ?>
 <?php include('includes/headsection.php')?>
<?php


$validator = new FormValidator();

if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('title', 'test_city');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("includes/image_upload_app.php");
			//if(strlen($db_images) < 3){ $errors[] = "No image upload"; }


				// Perform Inssert
				//$passport = $db_images;
				/*
				$username = mysql_prep($_POST['username']);
				$email = mysql_prep($_POST['email']);
				$address = mysql_prep($_POST['address']);
				$phone = mysql_prep($_POST['phone']);
				//$kids = mysql_prep($_POST['kids']);
				$pass = md5(mysql_prep($_POST['password']));
				$temp_pass = mysql_prep($_POST['password']);
				//$pass = mysql_prep($_POST['password']);
				//$desc = mysql_prep($_POST['desc']);
                $passport = $db_images;
				
				$fullname = mysql_prep($_POST['fullname']);
				$title = mysql_prep($_POST['title']);
				$test_city = mysql_prep($_POST['test_city']);
				
				*/

				// $member = get_user_id($_SESSION['username']);
				// $member_part = mysqli_fetch_array($member);

				$query = "SELECT * from newmember_tbl  WHERE status= 1 ORDER by id";
				$result = mysqli_query($connection, $query);
				$cat_set = mysqli_fetch_array($result);
				$cat_set['image'] == $image ;
				//$cat_set = $image//echo $cat_set['room_name'];

								
				
				$fullname = stripslashes($_REQUEST['fullname']);
				$fullname = mysqli_real_escape_string($connection,$_POST['fullname']);
				$title = stripslashes($_REQUEST['title']);
				$title = mysqli_real_escape_string($connection,$_POST['title']);
				
				$test_city = stripslashes($_REQUEST['test_city']);
				$test_city = mysqli_real_escape_string($connection,$_POST['test_city']);

				$image = stripslashes($_REQUEST['image']);
				$image = mysqli_real_escape_string($connection,$_POST['image']);
				
				//Checking the password field against error.
				/*$validator->addValidation("password","req","Enter a valid password");
				$validator->addValidation("password","minlen=6","Invalid length of password. Length must be above 6 characters");
				$validator->addValidation("password","maxlen=30","Maximum length of password is 30 characters");*/
				//Checking user full name input field against error.
				/*$validator->addValidation("email","req","Enter your email");
				$validator->addValidation("email","alnum_s","Enter a valid email");
				$validator->addValidation("email","minlen=6","Invalid email. Length must be above 6 characters");
				$validator->addValidation("email","maxlen=30","Maximum length for name is 30 characters");*/
				//Checking user full name input field against error.
				/*$validator->addValidation("phone","req","Enter your phone number");
				$validator->addValidation("phone","alnum_s","Enter a valid phone number");
				$validator->addValidation("phone","minlen=5","Invalid full name. Length must be above 5 characters");
				$validator->addValidation("phone","maxlen=30","Maximum length for phone is 30 characters");*/
				
			//if ($validator->ValidateForm() && empty($errors)) {
				// Perform Inssert
				// Check database to see if username and the hashed password exist there.
				
				
				
				
				$query1 = "INSERT INTO testimony (
						fullname, image, test_city, test_description
						) VALUES (
							'{$fullname}', '{$image}','{$test_city}', '{$title}')";
							
			$result = mysqli_query($connection,$query1);
			if ($result) {
				// Success!
				echo "<script type='text/javascript'>alert('testimony uploaded successfully !')</script>";
					redirect_to('testimonial.php');
			} else {
				// Display error message.
				echo "<p>Contact submission failed.</p>";
				echo "<p>" . mysqli_error($connection) . "</p>";
			}

			} 
		else {
			// Errors occurred
			/*$message = "There were " . count($errors) . " errors in the form.";*/
		}
		
				
				/*$query1 = "INSERT INTO contact_tbl (
					contact_name, subject, email, text
					) VALUES (
						'{$name}', '{$subject}', '{$email}', '{$content}')";
				
				 						
				
				$result1 = mysqli_query($connection,$query1);
				if ($result1) {
					
					
				// Success!
				echo "<script type='text/javascript'>alert('Contact successfully Submited!')</script>";
				redirect_to("contact.php");
			} else {
				// Display error message.
				echo "<p>Contact submission failed.</p>";
				echo "<p>" . mysqli_error($connection) . "</p>";
			}

			} 
		else {
			// Errors occurred
			$message = "There were " . count($errors) . " errors in the form.";
		
		}*/
				
 	/*$to = "{$email}";
	$sitename = SITE_NAME;
	$sitepath = SITE_PATH;
    $subject = $sitename."Signup | Email Confirmation";
//    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers = 'X-Mailer: PHP/' . phpversion() . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= "From: $sitename<support@lucianoluxuryhotel.com>";
    $message = "Dear $fullname,\r\n\r\n
	Thank you for registering with us, we appreciate your registration
	with us.
	Your account has been created, you can login with the following credentials tp place your reservation
	
	--------------------------------
	Username: $email\r\n
	Password: $passmail\r\n<br>
	Security Question: $sec_qst\r\n<br>
	Security Answer: $sec_ans\r\n<br>
	--------------------------------

	\r\n
	
	Best Regards,\r\n
	\r\n
	$sitename\r\n
    $sitepath\r\n
    ";

    mail($to, $subject, $message, $headers);
					// Success!
					//;redirect_to("login.php");
					echo "<script type='text/javascript'>alert('Account created successfully Login to Place Reservation!')</script>";
					redirect_to(SITE_PATH."login?p=success");
					
					
				} else {
					// Display error message.
					echo "<script type='text/javascript'>alert('Account creation failed!')</script>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}
	  }
			}else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";*/
			
			
		
 // end: if (isset($_POST['submit']))
 ?>

<?php /*?><?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('title', 'test_city');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("../includes/image_upload_app1.php");
			//if(strlen($db_images) < 3){ $errors[] = "No image upload"; }
			
			if (empty($errors)) {
				// Perform Inssert

				$fullname = mysql_prep($_POST['fullname']);
				$title = mysql_prep($_POST['title']);
				$test_city = mysql_prep($_POST['test_city']);
               // $passport = $db_images;							fullname,test_city,title
				
				$query = "INSERT INTO testimony (
						fullname, test_city, test_description
						) VALUES (
							'{$fullname}', '{$test_city}', '{$title}')";
							
				$result = mysql_query($query, $connection);
				if ($result) {
					// Success!
					echo "<script type='text/javascript'>alert('testimony uploaded successfully !')</script>";
					redirect_to('testimonial.php');
				} else {
					// Display error message.
					echo "<p>Slider creation failed.</p>";
					echo "<p>" . mysql_error() . "</p>";
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?><?php */?>

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
       

						<div class="col-lg-8">
					<br  />
			 <form action="" enctype="multipart/form-data"  method="post">
             <input type="hidden" class="form-control"  value="<?php echo time(); ?>" name="time">
             
			     <?php if (!empty($message)) {echo "<p class=\"status_report\">" . $message . "</p>";} ?>
			 <form method="post" enctype="multipart/form-data"><br />
			<!-- /.Form Wrapper -->
																					
                    <label style="color:#000;"><h5>Fullname</h5></label>
                  <input type="text" class="form-control" value="<?php echo $member_part['username']; ?>"  name="fullname">
                    
                    <label style="color:#000;"><h5>Select City</h5></label>
                  	<select type="text" class="form-control"  placeholder="Please Select Your City" name="test_city">
                      <option value="0">Select City</option>
                            <option value="ABIA STATE">ABIA STATE</option>
                            <option value="ABUJA FCT">ABUJA FCT</option>
                            <option value="ADAMAWA STATE">ADAMAWA STATE</option>
                            <option value="AKWA IBOM STATE">AKWA IBOM STATE</option>
                            <option value="ANAMBRA STATE">ANAMBRA STATE</option>
                            <option value="BAUCHI STATE">BAUCHI STATE</option>
                            <option value="BAYELSA STATE">BAYELSA STATE</option>
                            <option value="BENUE STATE">BENUE STATE</option>
                            <option value="BORNO STATE">BORNO STATE</option>
                            <option value="CROSS RIVER">CROSS RIVER STATE</option>
                            <option value="DELTA STATE">DELTA STATE</option>
                            <option value="EBONYI STATE">EBONYI STATE</option>
                            <option value="EDO STATE">EDO STATE</option>
                            <option value="EKITI STATE">EKITI STATE</option>
                            <option value="ENUGU STATE">ENUGU STATE</option>
                            <option value="GOMBE STATE">GOMBE STATE</option>
                            <option value="IMO STATE">IMO STATE</option>
                            <option value="JIGAWA STATE">JIGAWA STATE</option>
                            <option value="KADUNA STATE">KADUNA STATE</option>
                            <option value="KANO STATE">KANO STATE</option>
                            <option value="KATSINA STATE">KATSINA STATE</option>
                            <option value="KEBBI STATE">KEBBI STATE</option>
                            <option value="KOGI STATE">KOGI STATE</option>
                            <option value="KWARA STATE">KWARA STATE</option>
                            <option value="LAGOS STATE">LAGOS STATE</option>
                            <option value="NASSARAWA STATE">NASSARAWA STATE</option>
                            <option value="NIGER STATE">NIGER STATE</option>
                            <option value="OGUN STATE">OGUN STATE</option>
                            <option value="ONDO STATE">ONDO STATE</option>
                            <option value="OSUN STATE">OSUN STATE</option>
                            <option value="OYO STATE">OYO STATE</option>
                            <option value="PLATEAU STATE">PLATEAU STATE</option>
                            <option value="RIVERS STATE">RIVERS STATE</option>
                            <option value="SOKOTO STATE">SOKOTO STATE</option>
                            <option value="TARABA STATE">TARABA STATE</option>
                            <option value="YOBE STATE">YOBE STATE</option>
                            <option value="ZAMFARA STATE">ZAMFARA STATE</option>
                         </select>
                    
                    <br  /> 
                     <label style="color:#000;"><h5>Testimonial Description</h5></label>
                      <input type="textarea" class="form-control"  placeholder="Enter Testimonial" name="title">
                      
					<input class="pull-right margint10" input type="submit" name="submit" value="submit">
						</form>
									
									
				
				  
</p>
						<?php /*?><br  /><br  /><br  />
                         <div class="pull-left">
                           
                 <h2 class="box-title">ALL TESTIMONIES</h2></div>
				   <!----------------------------------------------------------------------------------------------------------->
				   
				    <table id="example" class="display table table-hover table-condensed" cellspacing="50px;" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Test_id </th>
                                                    <th>Fullname </th>
                                                    <th>Test_city</th>
													<th>Test_description</th>
                                                    
                                                    <th></th>
													</tr>
                                            </thead>
								 <?php 
		$uid = $_SESSION['username'];
		$sql = "SELECT * 
				FROM testimony 
				WHERE user_id = '$uid'    
				ORDER BY test_id desc";
		$pager = new PS_Pagination($connection, $sql, 100, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?>
                                                <tr>
												<td><?php echo $post['test_id']; ?></td>
												<td><?php echo $post['fullname']; ?></td>
												<td><?php echo $post['test_city']; ?></td>
												<td><?php echo substr($post['test_description'],0,100) ; ?></td>
												<td><?php  $post['test_status']; ?>
												 <?php if ($test_status == 0){ ?>       
                     <p style="color:#F00;">Pending Approval</p>
                       <?php }  elseif ($test_status == 1)  {  ?>   
                          <p style="color: #3C0;">Approved</p>   
                              <?php } ?></td>  
                                                
                                                </tr>
	<?php

	 }

?>  <?php if(mysql_num_rows($rs) < 1){
}else{ 
  
		 }
	   ?>                                            </thead>

                                            <tbody>  
                                        
                                            </tbody>
                                            
                                            </table><?php */?>	
								</div>
								<!--<div class="col-lg-9">-->
								
								<!--<div id="collapse1" class="collapse collapse-luxen in">
															<div class="padt20">    	
										<p>Consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Lnia bibendum nulla sedr.Aeum dolor sit amet, consectetur</p>-->
									</div>
								</div>
								</div>
						
								<br /><br /><br /><br /><br />		
				
<?php include('includes/footer2.php');?>