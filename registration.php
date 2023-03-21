<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/constants.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php
$pagetitle="registration";
?>
<?php include("includes/header2.php"); 
include("includes/image_upload_functions.php") ?>
	
<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('username','email','address','phone','password');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			include("includes/image_upload_app.php");
			if(strlen($db_images) < 7){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				$passport = $db_images;
				$username = mysql_prep($_POST['username']);
				$email = mysql_prep($_POST['email']);
				$address = mysql_prep($_POST['address']);
                $phone = mysql_prep($_POST['phone']);
//				$email = mysql_prep($_POST['email']);
               	$pass = md5(mysql_prep($_POST['password']));
				$temp_pass = mysql_prep($_POST['password']);
//                $gender = mysql_prep($_POST['gender']);
//				$class = mysql_prep($_POST['class']);
				//$subject1 = mysql_prep($_POST['subject1']);
//				$subject2 = mysql_prep($_POST['subject2']);
//				$subject3 = mysql_prep($_POST['subject3']);
//				$subject4 = mysql_prep($_POST['subject4']);
//				$subject5 = mysql_prep($_POST['subject5']);
//				$subject6 = mysql_prep($_POST['subject6']);
//				$subject7 = mysql_prep($_POST['subject7']);
//				$subject8 = mysql_prep($_POST['subject8']);
//				$subject9 = mysql_prep($_POST['subject9']);
//				$subject10 = mysql_prep($_POST['subject10']);
//				$subject11 = mysql_prep($_POST['subject11']);
//				$subject12 = mysql_prep($_POST['subject12']);
//				$time = mysql_prep($_POST['time']);
				
						
				$query = "INSERT INTO newmember_tbl (
						username, email, address, phone, pass, temp_pass, image
						) VALUES (
							'{$username}', '{$email}', '{$address}', '{$phone}', '{$pass}', '{$temp_pass}', '{$passport}')";

				$result = mysql_query($query,$connection);
				if ($result) {
				
				$last_id=mysql_insert_id($connection);
				$ewallet=100;
				$query1 = "INSERT INTO ewallet (
					ebalance, email, user_id
						) VALUES (
							'{$ewallet}', '{$email}', '{$last_id}'
						)";
				$result1 = mysql_query($query1, $connection);  
				
				if ($result) {
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
			}
			
			


} // end: if (isset($_POST['submit']))
?>

		<div class="content"><!-- Content Section -->
		<div class="container">
			<div class="row"></div>
				<div class="col-lg-2 col-sm-2 margint60"></div>
				<div class="col-lg-8 col-sm-8"><!-- Contact -->
					
					<div class="contact-form margint60"><!-- Contact Form -->
					<h1 >Welcome to New Member Secured Login Page</h1>
	<h3>Please fill the required fileds</h3>
	<!-- Sidebar -->
					<div class="luxen-widget news-widget">
						<div class="title">
							
						</div>
						
					<form method="post" action="" enctype="multipart/form-data" id="ajax-contact-form">
							<?php if (!empty($message)) {echo "<p class=\status_report\">" . $message ."</p>";} ?>
        
        <span><input name="username" type="text" class="textbox" placeholder="Enter your Fullname...."/>	</span>	
        <span><input name="email" type="text" class="textbox" placeholder="Enter your Email...."/>	</span>	
        <span><input name="address" type="text" class="textbox" placeholder="Enter your Address...."/>	</span>	
        <span><input name="phone" type="text" class="textbox" placeholder="Enter your Phone No....."/></span>
            <label class="form-label" for="field-1">Student Image</label>
            <span class="desc"></span>
            <div class="controls"><input name="file_1" type="file" class="form-control" id="file_1"/>
            <input name="file_go" type="hidden" id="file_go" value="go" />
        <span><input name="password" type="password" class="textbox"placeholder="enter your password...."/></span><br />
						
							
								<input class="pull-center margint10" type="submit" name="submit" value="submit">
						</form>
							
						<h2><i>If Already Registered</i><a href="login.php" class="active" onClick="return confrim('Are you Sure?')"></a>                                               <a href="login.php"><strong style="background-color:#003399">Click </strong>here to Login</a><fieldset><legend> </h2></legend></h2>
					</div>
                    <div id="map" class="maps pos-center margint60"><!-- Contact Maps -->
						
					</div>
					<div class="luxen-widget news-widget">
					<!--	<div class="title">
							<h5>CONTACT</h5>
						</div>
						<ul class="footer-links">
							<li><p><i class="fa fa-map-marker"></i> Lorem ipsum dolor sit amet lorem Victoria 8011 Australia </p></li>
							<li><p><i class="fa fa-phone"></i> +61 3 8376 6284 </p></li>
							<li><p><i class="fa fa-envelope"></i> info@2035themes.com</p></li>
						</ul>
					</div>
					<div class="luxen-widget news-widget">
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
					</div>-->
				</div>
	
					
					
				
					
						
					</div>
				</div>
				<div"></div>
			</div>
		</div>
	</div>
	<div class="footer margint40"><!-- Footer Section -->
		<!--<div class="main-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-sm-2 footer-logo">
						<img alt="Logo" src="img/logo.png" class="img-responsive" >
					</div>
					<div class="col-lg-10 col-sm-10">
						<div class="col-lg-3 col-sm-3">
							<h6>TOUCH WITH US</h6>
							<ul class="footer-links">
								<li><a href="#">Facebook</a></li>
								<li><a href="#">Twitter</a></li>
								<li><a href="#">Google +</a></li>
								<li><a href="#">otels.com</a></li>
								<li><a href="#">Tripadvisor</a></li>
							</ul>
						</div>
						<div class="col-lg-3 col-sm-3">
							<h6>ABOUT LUXEN</h6>
							<ul class="footer-links">
								<li><a href="404.php">Error Page</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="blog.php">Blog</a></li>
								<li><a href="blog-details.php">Blog Single</a></li>
								<li><a href="category-grid.php">Category Grid</a></li>
								<li><a href="category-list.php">Category List</a></li>
							</ul>
						</div>
						<div class="col-lg-3 col-sm-3">
							<h6>PAGES SITE</h6>
							<ul class="footer-links">
								<li><a href="contact.php">Contact</a></li>
								<li><a href="gallery.php">Gallery</a></li>
								<li><a href="index-full-screen.php">Home Full Screen</a></li>
								<li><a href="left-sidebar-page.php">Left Sidebar Page</a></li>
								<li><a href="right-sidebar-page.php">Right Sidebar Page</a></li>
								<li><a href="room-single.php">Room Single</a></li>
								<li><a href="under-construction.php">Under Construction</a></li>
							</ul>
						</div>
						<div class="col-lg-3 col-sm-3">
							<h6>CONTACT</h6>
								<ul class="footer-links">
									<li><p><i class="fa fa-map-marker"></i>124 Benin-Sapele Road. Benin City, Edo State</p></li>
									<li><p><i class="fa fa-phone"></i> +234 6 743 2218 </p></li>
									<li><p><i class="fa fa-envelope"></i> <a href="mailto:info@2035themes.com">info@2035themes.com</a></p></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>-->
			<div class="pre-footer">
				<div class="container">
					<div class="row">
						<div class="pull-left"><p>© LUXEN HOTELS 2018</p></div>
						<div class="pull-right">
						<a href="http://www.melvinmultitech.com"><h5 style="color:#9966CC"><strong>Designed by Melvin Multi-Tech Ltd</strong></h5></a>
						
							<!--<ul>
								<li><p>CONNECT WITH US</p></li>
								<li><a><img alt="Facebook" src="temp/orkut.png" ></a></li>
								<li><a><img alt="Tripadvisor" src="temp/tripadvisor.png" ></a></li>
								<li><a><img alt="Yelp" src="temp/hyves.png" ></a></li>
								<li><a><img alt="Twitter" src="temp/skype.png" ></a></li>
							</ul>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- JS FILES -->
<script src="js/vendor/jquery-1.11.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/retina-1.1.0.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/superfish.pack.1.4.1.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/selectordie.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/main.js"></script>
<!--
<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src='//www.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
-->
</body>
</php>