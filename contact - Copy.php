<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php $pagetitle= 'Contact' ; ?>
<?php include("includes/header2.php"); ?>

<?php 
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
?>       

		<h1 style="color:#FFFFFF"; >CONTACT</h1>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-4 margint60"><!-- Sidebar -->
					<div class="luxen-widget news-widget">
						<div class="title">
							<h5>HOTEL INFORMATION</h5>
						</div>
						<p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Lorem ipsumero, a pharetra augue. Lorem ipsum dolor sit amet, consectedui.</p>
					</div>
					<div class="luxen-widget news-widget">
						<div class="title">
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
					</div>
				</div>
				<div class="col-lg-9 col-sm-8"><!-- Contact -->
					<div id="map" class="maps pos-center margint60"><!-- Contact Maps -->
						
					</div>
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