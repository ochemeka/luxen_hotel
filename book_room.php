<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php $pagetitle= 'Reservation_form_dark' ; ?>
<?php include("includes/header3.php"); ?>

<div class="col-lg-4">
							
								<h3>SIDEBAR</h3>
								
								<a href="dashboard.php" class="list-group-item">Member Area</a>
								<a href="manage_reservation.php" class="list-group-item">Manage Reservation</a>
								<div class="panel panel-luxen">
									<div class="panel-style">
						<h4><span class="plus-box"><i class="fa fa-angle-down"></i></span> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><strong>Manage Reservation</strong></a></h4>
									</div>
									<div id="collapse2" class="collapse collapse-luxen">
										<div class="padt20">    	
											<a href="book_room.php"><p>book room</p></a>
										</div>
									</div>
								</div>
								<a href="edituser.php" class="list-group-item">Manage Personal Details</a>
								<a href="manage_account_details.php" class="list-group-item">Manage Account Details</a>
								<a href="transaction_history.php" class="list-group-item">Transaction History</a>
								<a href="testimonial.php" class="list-group-item">Testimonial</a>
								<a href="changepass.php" class="list-group-item">Change Password</a>
								<a href="logout.php" class="list-group-item">Logout</a>
								
</div>
		
	<div class="light-book-form margint60 marginb60">
		<div class="container">
			<div class="row pos-center">
				<div class="reserve-form-area">
					<div class="pos-center marginb20">
						<h2>Reservation Form</h2>
						<img src="img/shape.png">
					</div>
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<form action="#" method="post" id="ajax-reservation-form">
							<ul class="clearfix">
								<li class="li-input">
									<label>Arrival</label>
									<input type="text" id="dpd1" name="dpd1" class="date-selector" placeholder="&#xf073;" />
								</li>
								<li class="li-input">
									<label>Departure</label>
									<input type="text" id="dpd2" name="dpd2" class="date-selector" placeholder="&#xf073;" />
								</li>
								<li class="li-select">
									<label>Rooms</label>
									<select name="rooms" class="pretty-select">
										<option selected="selected" value="1" >1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</li>
								<li class="li-select">
									<label>Adult</label>
									<select name="adult" class="pretty-select">
										<option selected="selected" value="1" >1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</li>
								<li class="li-select no-margin">
									<label>Childreen</label>
									<select name="children" class="pretty-select">
										<option selected="selected" value="0" >0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</li>
								<li class="clearfix">
									<div class="button-style-1 clearfix margint70"><br /><br /><br /><br />
										<a id="res-submit" href="#">BOOK RESERVATION</a>
									</div>
								</li>
							</ul>
						</form>
					</div>
					<div class="col-lg-3"></div>
				</div>
			</div>
		</div>
	</div>
	<!--<div id="parallax123" class="parallax parallax-one clearfix">--><!-- Parallax Section -->
		<!--<div class="support-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-sm-4">
						<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
							<div class="flipper">
								<div class="support-box pos-center front">
									<div class="support-box-title"><i class="fa fa-phone"></i></div>
									<h4>NO FEES</h4>
									<p class="margint20">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut ferme fentum</p>
								</div>
								<div class="support-box pos-center back">
									<div class="support-box-title"><i class="fa fa-phone"></i></div>
									<h4>NO FEES</h4>
									<p class="margint20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, et.<br />+61 3 8376 6284</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-4">
						<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
							<div class="flipper">
								<div class="support-box pos-center front">
									<div class="support-box-title"><i class="fa fa-envelope"></i></div>
									<h4>QUICK RESERVATION</h4>
									<p class="margint20">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut ferme fentum</p>
								</div>
								<div class="support-box pos-center back">
									<div class="support-box-title"><i class="fa fa-envelope"></i></div>
									<h4>QUICK RESERVATION</h4>
									<p class="margint20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, et.<br />luxen@2035themes.com</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-4">
						<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
							<div class="flipper">
								<div class="support-box pos-center front">
									<div class="support-box-title"><i class="fa fa-home"></i></div>
									<h4>CALL TO YOU</h4>
									<p class="margint20">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut ferme fentum</p>
								</div>
								<div class="support-box pos-center back">
									<div class="support-box-title"><i class="fa fa-home"></i></div>
									<h4>CALL TO YOU</h4>
									<p class="margint20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, et.<br />+61 3 8376 6284</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="newsletter-section">
		<div class="container">
			<div class="row">
				<div class="newsletter-top pos-center margint30">
					<img alt="Shape Image" src="img/shape.png" >
				</div>
				<div class="newsletter-form margint40 pos-center">
					<div class="newsletter-wrapper">
						<div class="pull-left">
							<h2>Sign up newsletter</h2>
						</div>
						<div class="pull-left">
							<form action="#" method="post" id="ajax-contact-form">
								<input type="text" placeholder="Enter a e-mail address">
								<input type="submit" value="SUBSCRIBE" >
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>--><!-- Newsletter Section -->
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