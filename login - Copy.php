<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php // include('includes/ps_pagination1.php'); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php
$pagetitle="Member login";
?>
<?php include("includes/header2.php");
 ?>
 <?php include_once("includes/formvalidator.php"); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}


?>
<?php
if (logged_in()) {
		redirect_to(SITE_PATH."dashboard_copy.php");
	}

	
	// START FORM PROCESSING
	if (isset($_POST['login'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('email', 'password');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('email' => 30, 'password' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$email = trim(mysql_prep($_POST['email']));
		$password = trim(mysql_prep($_POST['password']));
		$hashed_password = md5($password);
		
		
		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT id, email, pass ";
			$query .= "FROM newmember_tbl ";
			$query .= "WHERE email = '{$email}' ";
			$query .= "AND pass = '{$hashed_password}' AND status =1 ";
			$query .= "LIMIT 1";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			if (mysql_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysql_fetch_array($result_set);
				$_SESSION['user_id'] = $found_user['id'];
				$_SESSION['username'] = $found_user['email'];
				$_SESSION['status'] = $found_user['status'];
				
				redirect_to("dashboard.php");
			} else {
				// username/password combo was not found in the database
				$message = "Email or Password Incorrect!<br />
					Please make sure your caps lock key is OFF and try again.";
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
		<h1>Member Secured Login Page</h1>
	</div>
	
		<div class="content"><!-- Content Section -->
		<div class="container">
			<div class="row"></div>
				<div class="col-lg-2 col-sm-2 margint60"></div>
				<div class="col-lg-8 col-sm-8"><!-- Contact -->
					<div id="map" class="maps pos-center margint60">
					</div>
					<div class="contact-form margint60"><!-- Contact Form -->
					<h1>Welcome to New Member Secured Login Page</h1>
	<h3>Please fill the required fileds</h3>
	<!-- Sidebar -->
					<div class="luxen-widget news-widget">
						<div class="title">
							
						</div>
				
					<div class="contact-form margint60"><!-- Contact Form -->
						<form method="post" action="" enctype="multipart/form-data" id="ajax-contact-form">
						  <input name="time" type="hidden" value="<?php echo time(); ?>">
                              <?php if (!empty($message)) {echo "<p class=\"status_report\">" . $message . "</p>";} ?>
							  
							<input  type="text" placeholder="Your Email Id " required name="email"/>
						
							<span><label>Password</label></span>
						      <input class="form-control" type="password" autocomplete="on" placeholder="Password" name="password" value="<?php echo htmlentities($password); ?>"/>
							 <?php /*?> <span><label>Password</label></span>
							  <input type="password" placeholder="Password" name="password" value="<?php echo htmlentities($password); ?>"/>
						<?php */?>	<input class="pull-left margint10" <input type="submit" name="login" value="submit">
						</form>	<br /><br />
						
						
						<h1><i>If not Registered</i><a href="registration.php" class="active" onClick="return confrim('Are you Sure?')"></a>                                               <a href="registration.php"><strong>Click here to Register</strong></a><fieldset><legend> </h2></legend></h1>
						
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
				<div class="col-lg-2 col-sm-2 margint60"></div>
			</div>
		</div>
	</div>
	<?php /*?><div class="footer margint40"><!-- Footer Section -->
		<div class="main-footer">
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
								<li><p><i class="fa fa-map-marker"></i> Lorem ipsum dolor sit amet lorem Victoria 8011 Australia </p></li>
								<li><p><i class="fa fa-phone"></i> +61 3 8376 6284 </p></li>
								<li><p><i class="fa fa-envelope"></i> <a href="mailto:info@2035themes.com">info@2035themes.com</a></p></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><?php */?>
		<div class="pre-footer">
			<div class="container">
				<div class="row">
					<div class="pull-left"><p>� LUXEN OTELS 2014</p></div>
					<div class="pull-right">
						<ul>
							<li><p>CONNECT WITH US</p></li>
							<li><a><img alt="Facebook" src="temp/orkut.png" ></a></li>
							<li><a><img alt="Tripadvisor" src="temp/tripadvisor.png" ></a></li>
							<li><a><img alt="Yelp" src="temp/hyves.png" ></a></li>
							<li><a><img alt="Twitter" src="temp/skype.png" ></a></li>
						</ul>
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
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="js/gmaps.js"></script>
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