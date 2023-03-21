<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php //include('includes/image_upload_functions.php');

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
//$db_images = "";

			$required_fields = array('username','email','phone','address');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
           // include("includes/image_upload_app.php");
//			if(strlen($db_images) < 7){ $errors[] = "No image upload"; }
						
			if (empty($errors)) {
				// Perform Update
				/*$user = mysqli_prep($_SESSION['user_id']);
				$passport = $db_images;
				//$passport = $db_images;
				$username = mysqli_real_escape_string($_POST['username']);
				$email = mysql_prep($_POST['email']);
				$address = mysql_prep($_POST['address']);
                $phone = mysql_prep($_POST['phone']);*/
				
				//$passport = $db_images;
				//$user = stripslashes($_SESSION['user_id']);
//				$user = mysqli_real_escape_string($_SESSION['user_id']);
				$username = stripslashes($_REQUEST['username']);
				
				$username = mysqli_real_escape_string($connection,$_POST['username']);
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$username = stripslashes($_REQUEST['username']);
				$username = mysqli_real_escape_string($connection,$_POST['username']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				
//				$email = mysql_prep($_POST['email']);
               //	$pass = md5(mysql_prep($_POST['password']));
				//$temp_pass = mysql_prep($_POST['password']);
				//$user_id = mysql_prep($_POST['user_id']);
	//			$time = mysql_prep($_POST['time']);
	//WHERE user_id = {$_SESSION['user_id']}";
				
			$query = 	"UPDATE newmember_tbl SET 
						username = '{$username}',
						email = '{$email}',
						address = '{$address}',
						phone = '{$phone}',
						
						WHERE id = '{$_SESSION['user_id']}'  
						ORDER BY id DESC";
			$result = mysqli_query($connection,$query);
			if (mysqli_affected_rows($connection) == 1) {


					$url = SITE_PATH.'dashboard.php?status=success';
										echo "<p>" . mysqli_error() . "</p>";

					// Success!
					redirect_to($url);
					
				} else {
					// Display error message.
					//redirect_to("{$postid}/{$postt}");
				}

				} 
			/*else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
									echo "<p>" . mysql_error() . "</p>";

			}*/
			
			


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
				
				 
					<div class="col-lg-4">
							
								<?php include('includes/sidebarindex.php');?>
								
</div>
						<div class="col-lg-4">
						
								
				
										
			<form method="post" enctype="multipart/form-data">
			<?php if (!empty($message)) {echo "<p class=\status_report\">" . $message ."</p>";} ?>
			  <div class="box-body"><!-- /.Form Wrapper -->
			
					
								
					 <div class="form-group">
                      <p for="exampleInputEmail1">(Current fullname: <?php echo $member_part['username']; ?>)</p>
                      <input type="text" class="form-control"  placeholder="Enter FullName"  name="username"  value=" <?php echo $member_part['username']; ?>">
                    </div>
					
					 <div class="form-group">
                      <p for="exampleInputEmail1">(Current email: <?php echo $member_part['email']; ?>)::</p>
                      <input type="text" class="form-control"  placeholder="Enter Email" name="email" value=" <?php echo $member_part['email']; ?>">
                    </div>
				 	
					 <div class="form-group">
							<p for="exampleInputEmail1">Current Passport: <p><?php 
														$img_url = $member_part["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php //echo $row['email']; ?>" height="100" width="80" />
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
                      <p for="exampleInputEmail1">(Current address: <?php echo $member_part['address']; ?>)</p>
                      <input type="text" class="form-control"  placeholder="Enter Address" name="address" value=" <?php echo $member_part['address']; ?>">
                    </div>
				
					
					 <div class="form-group">
                      <p for="exampleInputEmail1">Current phone no: <?php echo $member_part['phone']; ?></p>
                      <input type="text" class="form-control"  placeholder="Enter Phone No." name="phone" value="<?php echo $member_part['phone']; ?>">
                    </div><br /><br />
					
								<div class="form-group">
                      <label for="exampleInputEmail1">Submit</label>
                    <input class="form-control" input type="submit" name="submit" value="submit">
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
				
				
			<div class="footer margint40"><!-- Footer Section -->
		
		<div class="pre-footer">
			<div class="container">
				<div class="row">
					<div class="pull-left"><p> LUXEN HOTELS 2018</p></div>
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
				
				
				
				
				
				
				
				
				<?php /*?><div class="about-services margint60 clearfix"><!-- About Services -->
					<div class="col-lg-4 col-sm-6">
						<img alt="About Services" class="img-responsive" src="temp/otel-info-image-2.jpg" >
						<h5 class="margint20">SPA CENTER</h5>
						<p class="margint20">Duis mollis, est non commodo luctus, nisi erat odio sewd euismod semp, est non nuluis risus eget urna mollis ornare vel eu leo. semper. </p>
					</div>
					<div class="col-lg-4 col-sm-6">
						<img alt="About Services" class="img-responsive" src="temp/otel-info-image-3.jpg" >
						<h5 class="margint20">FITNESS CENTER</h5>
						<p class="margint20">Duis mollis, est non commodo luctus, nisi erat odio sewd euismod semp, est non nuluis risus eget urna mollis ornare vel eu leo. semper. </p>
					</div>
					<div class="col-lg-4 col-sm-6">
						<img alt="About Services" class="img-responsive" src="temp/otel-info-image-4.jpg" >
						<h5 class="margint20">DELICIOUS FOOD</h5>
						<p class="margint20">Duis mollis, est non commodo luctus, nisi erat odio sewd euismod semp, est non nuluis risus eget urna mollis ornare vel eu leo. semper. </p>
					</div>
				</div>
				<div class="about-destination margint40 marginb40 clearfix"><!-- About Destination -->
					<div class="title pos-center marginb40">
						<h2>DESTINATIONS</h2>
						<div class="title-shape"><img alt="Shape" src="img/shape.png"></div>
					</div>
					<div class="col-lg-8 col-sm-12 about-title pos-center">
		                <div class="tab-content">
		                    <div class="tab-pane fade in active" id="tab1">
		                        <img src="temp/maps.jpg" alt="" class="img-responsive" />
		                    </div>
		                    <div class="tab-pane fade" id="tab2">
		                        <img src="temp/maps.jpg" alt="" class="img-responsive" />
		                    </div>
		                    <div class="tab-pane fade" id="tab3">
		                        <img src="temp/maps.jpg" alt="" class="img-responsive" />
		                    </div>
		                </div>
					</div>
					<div class="col-lg-4 col-sm-12 tabbed-area tab-style">
					    <div class="about-destination-box active-tab">
			                <a href="#tab1"><h6>MAP DESTINATION</h6></a>
			                <a href="#tab1"><p class="margint10">Duis mollis, est non commodo luctus, nisi erat odiot urna mollis ornare vel eu leo. semper. </p></a>
					    </div>                    
					    <div class="about-destination-box">
			                <a href="#tab2"><h6>BUS DESTINATION</h6></a>
			                <a href="#tab2"><p class="margint10">Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Integer posuere erat .Do gravida at eget metus.</p></a>
					    </div> 
					    <div class="about-destination-box">
			                <a href="#tab3"><h6>OWN CAR</h6></a>
			                <a href="#tab3"><p class="margint10">Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Integer posuere era at eget metus.</p></a>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer margint40"><!-- Footer Section -->
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
		</div>
	<div class="pre-footer">
			<div class="container">
				<div class="row">
					<div class="pull-left"><p>? LUXEN OTELS 2014</p></div>
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
	<?php */?>