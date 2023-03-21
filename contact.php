<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php /*?><?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/constants.php"); ?><?php */?>

<?php $pagetitle= 'Contact' ; ?>
<?php include("includes/header2.php"); ?>


<?php


$validator = new FormValidator();

if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			$required_fields = array('name','subject','email','content');
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
				$name = stripslashes($_REQUEST['name']);
				$name = mysqli_real_escape_string($connection,$_POST['name']);
				$subject = stripslashes($_REQUEST['subject']);
				$subject = mysqli_real_escape_string($connection,$_POST['subject']);
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$content = stripslashes($_REQUEST['content']);
				$content = mysqli_real_escape_string($connection,$_POST['content']);
				
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
				
				
				
				
				$query1 = "INSERT INTO contact_tbl (
					contact_name, subject, email, text
					) VALUES (
						'{$name}', '{$subject}', '{$email}', '{$content}')";
			$result = mysqli_query($connection,$query1);
			if ($result) {
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
																		
		$required_fields = array('name','subject','email','content');
		foreach($required_fields as $fieldname) {
			if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
				$errors[] = $fieldname; 
			}
		}
		//include("includes/image_upload_app.php");
		//if(strlen($db_images) < 3){ $errors[] = "No image upload"; }
		
		if (empty($errors)) {
			// Perform Inssert
			//$cmid = $_GET['blogid'];
			//$blog = $blog_part["blogid"];
			$name = mysql_prep($_POST['name']);
			$subject = mysql_prep($_POST['subject']);
			$email = mysql_prep($_POST['email']);
			$content = mysql_prep($_POST['content']);
			//$time = mysql_prep($_POST['time']);
			//$passport = $db_images;
			
			$query = "INSERT INTO contact_tbl (
					contact_name, subject, email, text
					) VALUES (
						'{$name}', '{$subject}', '{$email}', '{$content}')";
			$result = mysql_query($query, $connection);
			if ($result) {
				// Success!
				echo "<script type='text/javascript'>alert('Contact successfully Submited!')</script>";
				redirect_to("contact.php");
			} else {
				// Display error message.
				echo "<p>Contact submission failed.</p>";
				echo "<p>" . mysql_error() . "</p>";
			}

			} 
		else {
			// Errors occurred
			$message = "There were " . count($errors) . " errors in the form.";
		}
		
		


} // end: if (isset($_POST['submit']))
?><?php */?>       

		<h1 style="color:#FFFFFF"; >CONTACT</h1>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-4 margint60"><!-- Sidebar -->
					<!--<div class="luxen-widget news-widget">
						<div class="title">
							<h5>HOTEL INFORMATION</h5>
						</div>
						<p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Lorem ipsumero, a pharetra augue. Lorem ipsum dolor sit amet, consectedui.</p>
					</div>-->
					<!--<div class="luxen-widget news-widget">
						<div class="title">
							<h5>CONTACT</h5>
						</div>
						<ul class="footer-links">
							<li><p><i class="fa fa-map-marker"></i> Lorem ipsum dolor sit amet lorem Victoria 8011 Australia </p></li>
							<li><p><i class="fa fa-phone"></i> +61 3 8376 6284 </p></li>
							<li><p><i class="fa fa-envelope"></i> info@2035themes.com</p></li>
						</ul>
					</div>-->
					<div class="luxen-widget news-widget">
                    <div class="title">
							<h5>HOTEL INFORMATION</h5>
						</div>
                        <p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Lorem ipsumero, a pharetra augue. Lorem ipsum dolor sit amet, consectedui.</p>
						<div class="title">
							<h5>SOCIAL MEDIA</h5>
						</div>
						<ul class="social-links">
							<li><a href="http://facebook.com/2035themes"><i class="fa fa-facebook"></i></a></li>
							<li><a href="http://twitter.com/2035themes"><i class="fa fa-twitter"></i></a></li>
							<li><a href="http://vine.com/2035themes"><i class="fa fa-vine"></i></a></li>
							<li><a href="http://foursquare.com/2035themes"><i class="fa fa-foursquare"></i></a></li>
							<li><a href="http://instagram.com/2035themes"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-9 col-sm-8"><!-- Contact -->
					<?php /*?><div id="map" class="maps pos-center margint60"><!-- Contact Maps -->
						
					</div><?php */?>
					<div class="contact-form margint60"><!-- Contact Form -->
						  <form method="post"  enctype="multipart/form-data">
                           <?php
			// output a list of the fields that had errors
			if (!empty($errors)) {
				echo "<p class=\"errors\">";
				echo "Please review the following fields:<br />";
				foreach($errors as $error) {
					echo " - " . $error . "<br />";
				}
				echo "</p>";
			}
			?>	
            			  <input type="text" name="name" placeholder="YOUR NAME">
                              <input type="text" name="subject" placeholder="SUBJECT">
						      <input type="text" name="email" placeholder="E-MAIL ADDRESS">
							 <textarea placeholder="Type your comment here" name="content"></textarea>
							 <input class="margint10" name="submit" type="submit" value="SUBMIT">
						</form>
                        
                        
                        
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include ('includes/footer2.php')?>
</php>