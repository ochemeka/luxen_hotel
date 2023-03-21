<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php 
include("includes/image_upload_functions.php") ?>
<?php include("includes/header2.php"); ?>
<?php
$pagetitle="Register"; ?>


<?php


$validator = new FormValidator();

if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('username','email','address','phone','gender','password');
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
				*/
				$username = stripslashes($_REQUEST['username']);
				$username = mysqli_real_escape_string($connection,$_POST['username']);
				$gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($connection,$_POST['gender']);
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$address = stripslashes($_REQUEST['address']);
				$address = mysqli_real_escape_string($connection,$_POST['address']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$temp_pass = stripslashes($_REQUEST['password']);
				$temp_pass = mysqli_real_escape_string($connection,$_POST['password']);
				$pass = md5($password);
				$passmail = mysqli_real_escape_string($connection,$_POST['password']);
				
				
				
				//$hash = md5( rand(0,1000) );
				// $passport = $db_images;
				/*$country = stripslashes($_REQUEST['country']);
				$country = mysqli_real_escape_string($connection,$_POST['country']);
				$state = stripslashes($_REQUEST['state']);
				$state = mysqli_real_escape_string($connection,$_POST['state']);
				$city = stripslashes($_REQUEST['city']);
				$city = mysqli_real_escape_string($connection,$_POST['city']);
				$address = stripslashes($_REQUEST['address']);
				$address = mysqli_real_escape_string($connection,$_POST['address']);
				$gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($connection,$_POST['gender']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$sec_qst = stripslashes($_REQUEST['sec_qst']);
				$sec_qst = mysqli_real_escape_string($connection,$_POST['sec_qst']);
				$sec_ans = stripslashes($_REQUEST['sec_ans']);
				$sec_ans = mysqli_real_escape_string($connection,$_POST['sec_ans']);
				$time = stripslashes($_REQUEST['time']);
				$time = mysqli_real_escape_string($connection,$_POST['time']);*/
				/*$sec_qst = stripslashes($_REQUEST['sec_qst']);
				$sec_qst = mysqli_real_escape_string($connection,$_POST['sec_qst']);
				$sec_ans = stripslashes($_REQUEST['sec_ans']);
				$sec_ans = mysqli_real_escape_string($connection,$_POST['sec_ans']);
				$hash = md5( rand(0,1000) );*/
				//$sortcode ="BOACC-".time();
				//$securecode ="USHSBACVR-".time();
				
				//Checking the password field against error.
				$validator->addValidation("password","req","Enter a valid password");
				$validator->addValidation("password","minlen=6","Invalid length of password. Length must be above 6 characters");
				$validator->addValidation("password","maxlen=30","Maximum length of password is 30 characters");
				//Checking user full name input field against error.
				$validator->addValidation("email","req","Enter your email");
				$validator->addValidation("email","alnum_s","Enter a valid email");
				$validator->addValidation("email","minlen=6","Invalid email. Length must be above 6 characters");
				$validator->addValidation("email","maxlen=30","Maximum length for name is 30 characters");
				//Checking user full name input field against error.
				$validator->addValidation("phone","req","Enter your phone number");
				$validator->addValidation("phone","alnum_s","Enter a valid phone number");
				$validator->addValidation("phone","minlen=5","Invalid full name. Length must be above 5 characters");
				$validator->addValidation("phone","maxlen=30","Maximum length for phone is 30 characters");
				
			if ($validator->ValidateForm() && empty($errors)) {
				// Perform Inssert
				// Check database to see if username and the hashed password exist there.
			$query = "SELECT * ";
			$query .= "FROM newmember_tbl ";
			$query .= "WHERE email = '{$email}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
			
							// username/password combo was not found in the database
				$errors[] = "Email Already Used";
		
}
	 else {
						
				$query1 = "INSERT INTO newmember_tbl (
						username, email, address, phone, gender, password, temp_pass, image
						) VALUES (
						'{$username}', '{$email}', '{$address}','{$phone}','{$gender}','{$pass}','{$temp_pass}','{$passport}')";

				$result1 = mysqli_query($connection,$query1);
				if ($result1) {
					
				
 	$to = "{$email}";
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
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
		
} // end: if (isset($_POST['submit']))
 ?>
<?php /*?><?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";
								//username,email,address,phone,password								
			$required_fields = array('username','email','address','phone','password');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			include("includes/image_upload_app.php");
			if(strlen($db_images) < 3){ $errors[] = "No image upload"; }
			
			if (empty($errors)) {
				// Perform Inssert

				
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
				
					
				$query = "INSERT INTO newmember_tbl (
						username, email, address, phone, pass, temp_pass, image
						) VALUES (
							'{$username}', '{$email}', '{$address}','{$phone}','{$pass}','{$temp_pass}','{$passport}')";
				$result = mysql_query($query, $connection);
				if ($result) {
					// Success!
					echo "<script type='text/javascript'>alert('Member Account created successfully !')</script>";
					redirect_to('login.php');
				} else {
					// Display error message.
					echo "<p>Account creation failed.</p>";
					echo "<p>" . mysql_error() . "</p>";
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?><?php */?>
		<!--<h1>CONTACT</h1>-->
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
			<div class="row">
            
            <div align="center" class="col-lg-12 col-sm-8"><!-- Contact -->
					<div class="luxen-widget news-widget">
						<div class="title"><br />
						<h1 >Welcome to New Member Secured Login Page</h1>
	<h3>Please fill the required fileds</h3>
						</div>
                   <div class="field-form">
					<div class="contact-form margint60"><!-- Contact Form -->
						<form method="post" action="" enctype="multipart/form-data" id="ajax-contact-form">
							<?php if (!empty($message)) {echo "<p class=\status_report\">" . $message ."</p>";} ?>
						
						<span><input name="username" type="text" class="textbox" placeholder="Enter your Fullname...."/>	</span>	
						<span><input name="email" type="text" class="textbox" placeholder="Enter your Email...."/>	</span>
                       <div align="center" class="col-lg-12">
                         <label for="exampleInputEmail1">Gender:</label>
						 <select type="text" class="form-control"  placeholder="Select Category" name="gender">
                      	<option value="0">Select Gender</option>
                                <option value="Male"> Male</option>
                                <option value="Female"> Female</option>
                                <option value="others">Others</option>
                                
                                    </select>
                        </div>
                        <span><input name="address" type="text" class="textbox" placeholder="Enter your Address...."/>	</span>	
						<span><input name="phone" type="text" class="textbox" placeholder="Enter your Phone No....."/></span>
							<label class="form-label" for="field-1">Student Image</label>
							<span class="desc"></span>
							<input name="file_1" type="file" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
						<br />
                        <span><input name="password" type="text" class="textbox"placeholder="enter your password...."/></span><br />
						
							
								<input class="pull-center margint10" type="submit" name="submit" value="Sign up">
						</form><br /><br />
                        <h2><i>If Already Registered</i><a href="login.php" class="active" onClick="return confrim('Are you Sure?')"></a>                                               <a href="login.php"><strong style="background-color:#003399">Click </strong>here to Login</a><fieldset><legend> </h2></legend></h2>
					
                     <div id="map" class="maps pos-center margint60"><!-- Contact Maps -->
						
					</div>
				</div></div>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				<!--<div class="col-lg-3 col-sm-4 margint60">--><!-- Sidebar -->
					<!--<div class="luxen-widget news-widget">
						<div class="title">
							<h5>HOTEL INFORMATION</h5>
						</div>
						<p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Lorem ipsumero, a pharetra augue. Lorem ipsum dolor sit amet, consectedui.</p>
					</div>-->
					<!--<div class="luxen-widget news-widget">-->
						<!--<div class="title">
							<h5>CONTACT</h5>
						</div>-->
						<!--<ul class="footer-links">
							<li><p><i class="fa fa-map-marker"></i> Lorem ipsum dolor sit amet lorem Victoria 8011 Australia </p></li>
							<li><p><i class="fa fa-phone"></i> +61 3 8376 6284 </p></li>
							<li><p><i class="fa fa-envelope"></i> info@2035themes.com</p></li>
						</ul>-->
					<!--</div>-->
					<!--<div class="luxen-widget news-widget">-->
						<!--<div class="title">
							<h5>SOCIAL MEDIA</h5>
						</div>-->
						<!--<ul class="social-links">
							<li><a href="http://facebook.com/2035themes"><i class="fa fa-facebook"></i></a></li>
							<li><a href="http://twitter.com/2035themes"><i class="fa fa-twitter"></i></a></li>
							<li><a href="http://vine.com/2035themes"><i class="fa fa-vine"></i></a></li>
							<li><a href="http://foursquare.com/2035themes"><i class="fa fa-foursquare"></i></a></li>
							<li><a href="http://instagram.com/2035themes"><i class="fa fa-instagram"></i></a></li>
						</ul>-->
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	<?php include ('includes/footer.php')?>
<!--
<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src='//www.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
-->
</body>
</html>