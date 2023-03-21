<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
confirm_logged_in(); 
$pagetitle="Change Password"

?>
<?php 
	include("includes/header3.php"); 
	$member = get_user_id($_SESSION['username']);
	$member_part = mysqli_fetch_array($member);

	$ewallet = get_ewallet_id($_SESSION['username']);
	$ewallet_part = mysqli_fetch_array($ewallet);
	
?>

<?php




// START FORM PROCESSING
if (isset($_POST['submit'])) { // Form has been submitted.
$errors = array();

		$required_fields = array('password','pass_nw','pass_nw2');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			
		$temp_pass = stripslashes($_REQUEST['password']);
		$temp_pass = mysqli_real_escape_string($connection,$_POST['password']);
		$hashed_pass1 = md5($password);
		
		
		$pass1 = stripslashes($_REQUEST['password']);
		$pass1 = mysqli_real_escape_string($connection,$_POST['password']);
		$hashed_pass1 = md5($pass1);
		$pass2 = stripslashes($_REQUEST['pass_nw']);
		$pass2 = mysqli_real_escape_string($connection,$_POST['pass_nw']);
		$hashed_pass2 = md5($pass2);
		$pass3 = stripslashes($_REQUEST['pass_nw2']);
		$pass3 = mysqli_real_escape_string($connection,$_POST['pass_nw2']);
		$hashed_pass3 = md5($pass3);
		$passmail = mysqli_real_escape_string($connection,$_POST['pass_nw2']);
		if ($pass2 != $pass3){
			echo "<script type='text/javascript'>alert('Confirm Password Do Not Match!')</script>";
			redirect_to(SITE_PATH."changepassword");
			 }else{

		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT * ";
			$query .= "FROM newmember_tbl ";
			$query .= "WHERE password = '{$hashed_pass1}' ";
			$query .= "AND id = '{$_SESSION['user_id']}' ";
			$query .= "LIMIT 1";
			$result_set = mysqli_query($connection,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				
							$query = 	"UPDATE newmember_tbl SET 
							password = '{$hashed_pass3}', 
							temp_pass = '{$passmail}' 
						WHERE id = {$_SESSION['user_id']}";
			$result = mysqli_query($connection,$query);
			if (mysqli_affected_rows($connection) == 1) {
					// Success!
					echo "<script type='text/javascript'>alert('Password Change Successfully!')</script>";
					
					redirect_to(SITE_PATH."dashboard");
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
	}
?> 

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
					
					$pass1 = md5(mysql_prep($_POST['password']));
					$passnw = md5(mysql_prep($_POST['pass_nw']));
					$pass2 = mysql_prep($_POST['pass_nw']);
					
					if ( empty($errors) ) {
					// Check database to see if username and the hashed password exist there.
					$query = "SELECT * ";
					$query .= "FROM newmember_tbl ";
					$query .= "WHERE pass = '{$pass1}' ";
					$query .= "AND id = '{$_SESSION['user_id']}' ";
					$query .= "LIMIT 1";
					$result_set = mysql_query($query);
					confirm_query($result_set);
					if (mysql_num_rows($result_set) == 1) {
					// username/password authenticated
					// and only 1 match
					
							$query = 	"UPDATE newmember_tbl SET 
						 
							temp_pass = '{$pass2}', 
							pass = '{$passnw}' 
						WHERE id = {$_SESSION['user_id']}";
					$result = mysql_query($query);
					if (mysql_affected_rows() == 1) {
					// Success!
				echo "<script type='text/javascript'>alert('Updating Password Successfull !')</script>";

					redirect_to(SITE_PATH."changepassword.php");
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

  

    <!--========== Breadcrumbs v1 ==========-->
  <?php include('includes/headsection.php')?>
    <!--========== End Breadcrumbs v1 ==========-->

       <!--========== PAGE CONTENT ==========-->
  
                <!--========== BLOG SIDEBAR ==========-->
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
						<div class="col-lg-9">
						<br/ >
								
				<!--<h2> <p>Welcome to your dashboard <?php //echo $member_part['username'];?>-->
                   <h3>Change Password</h3>
				 <p>Fill in your credential below.<p><br>
				 <p><br></h2>
				
			
									<form method="post" action="" enctype="multipart/form-data">
									 <?php if (!empty($message)) {echo "<div class='error'>" . $message . "</div>";} ?>
            <?php if (!empty($errors)) { display_errors($errors); } 
			if(isset($_GET['status'])){
			echo $msg="Update Successful";
			}
			?>
									<strong>Old Password:   </strong><?php echo $member_part['temp_pass'];?><br  />
									<input name="password" type="password" value="<?php echo $member_part['temp_pass'];?>" placeholder="Enter Old Password" class="form-control" /><br  />									<strong>New Password:   </strong>
									<input name="pass_nw" type="password" placeholder="Enter New Password" class="form-control"/>
										<br />
                                        <strong>Confirm Password:   </strong>
                                     <input name="pass_nw2" type="password" placeholder="Enter New Password" class="form-control"/>   												<br />
									<!--<input class="pull-center margint10" input type="submit" name="submit" value="submit">
					-->
										 <button type="submit" name="submit">Change Password</button>          
									
								</form>
								</div>
								<!--<div class="col-lg-9">-->
								
								<!--<div id="collapse1" class="collapse collapse-luxen in">
															<div class="padt20">    	
										<p>Consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Lnia bibendum nulla sedr.Aeum dolor sit amet, consectetur</p>-->
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

                <!--========== END BLOG SIDEBAR ==========-->
            
              
				 
				  <!-- Process v3 -->
        <!--<div class="clearfix">
            <div class="row process-v3-border">
                <div class="col-md-4 col-sm-6 md-margin-b-50">
                    <div class="process-v3">
                        <img class="process-v3-element radius-circle" src="assets/img/250x250/14.jpg" alt="">
                        <h3 class="process-v3-title">01. Idea</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 md-margin-b-50">
                    <div class="process-v3">
                        <img class="process-v3-element radius-circle" src="assets/img/250x250/15.jpg" alt="">
                        <h3 class="process-v3-title">02. Planning</h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 sm-margin-b-50">
                    <div class="process-v3">
                        <img class="process-v3-element radius-circle" src="assets/img/250x250/16.jpg" alt="">
                        <h3 class="process-v3-title">03. Create</h3>
                    </div>
                </div>-->
              
            <!--// end row -->
            <!-- End Process v3 -->

                    <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            
								
								</div>
							</div>									
	
			
             
            </div>

        </div>
        <!-- /.row -->
                </p>
				 
				 </p>  
				 
				 
				          </div>
                    </div>
                    <!--// end row -->
                </div>
            </div>
            <!--// end row -->
        </div>
    </div>
    

    <!--========== END PAGE CONTENT ==========-->
		
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
						<div class="pull-left"><p>� LUXEN HOTELS 2018</p></div>
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