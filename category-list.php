<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php $pagetitle= 'Category-List' ; ?>
<?php include("includes/header2.php"); ?>
		<h1 style="color:#FFFFFF"; >CATEGORY LIST</h1>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container margint60">
			<div class="row">
				<div class="col-lg-12 marginb20"><!-- Room Sort -->
					<div class="sortby clearfix">
						<div class="pull-left">
							<select>
								<option selected="selected">ASCENDING</option>
								<option>DESCENDING</option>
							</select>
						</div>
						<div class="pull-right sort-icon">
							<a class="fright" href="category-grid.php"><img src="temp/grid-icon.png" alt=""></a> 
							<a class="fright" href="category-list.php"><img src="temp/list-icon.png" alt=""></a>
						</div>
					</div>	
				</div>
				<div class="col-lg-9"><!-- Explore Rooms -->
					<table>
						<tr class="products-title">
							<td class="table-products-image pos-center"><h6>IMAGE</h6></td>
							<td class="table-products-name pos-center"><h6>ROOM NAME</h6></td>
							<td class="table-products-price pos-center"><h6>PRICE</h6></td>
							<td class="table-products-total pos-center"><h6>PURCHASE</h6></td>
						</tr>
						<tr class="table-products-list pos-center">
							<td class="products-image-table"><img alt="Products Image 1" src="temp/room-image-1.jpg" class="img-responsive"></td>
							<td class="title-table">
								<div class="room-details-list clearfix">
									<div class="pull-left">
										<h5>Suit Room</h5>
									</div>
									<div class="pull-left room-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star inactive"></i></li>
										</ul>
									</div>
								</div>
								<div class="list-room-icons clearfix">
									<ul>
										<li><i class="fa fa-calendar"></i></li>
										<li><i class="fa fa-flask"></i></li>
										<li><i class="fa fa-umbrella"></i></li>
										<li><i class="fa fa-laptop"></i></li>
									</ul>
								</div>
								<p>Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque orla porta felis euismodnean eu at ero <a class="active-color" href="#">[...]</a> </p>
							</td>
							<td><h3>70$</h3></td>
							<td><div class="button-style-1"><a href="#"><i class="fa fa-calendar"></i><span class="mobile-visibility">BOOK NOW</span></a></div></td>
						</tr>
						<tr class="table-products-list pos-center">
							<td class="products-image-table"><img alt="Products Image 2" src="temp/room-image-2.jpg" class="img-responsive"></td>
							<td class="title-table">
								<div class="room-details-list clearfix">
									<div class="pull-left">
										<h5>Suit Room</h5>
									</div>
									<div class="pull-left room-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star inactive"></i></li>
										</ul>
									</div>
								</div>
								<div class="list-room-icons clearfix">
									<ul>
										<li><i class="fa fa-calendar"></i></li>
										<li><i class="fa fa-flask"></i></li>
										<li><i class="fa fa-umbrella"></i></li>
										<li><i class="fa fa-laptop"></i></li>
									</ul>
								</div>
								<p>Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque orla porta felis euismodnean eu at ero <a class="active-color" href="#">[...]</a> </p>
							</td>
							<td><h3>70$</h3></td>
							<td><div class="button-style-1"><a href="#"><i class="fa fa-calendar"></i><span class="mobile-visibility">BOOK NOW</span></a></div></td>
						</tr>
						<tr class="table-products-list pos-center">
							<td class="products-image-table"><img alt="Products Image 1" src="temp/room-image-3.jpg" class="img-responsive"></td>
							<td class="title-table">
								<div class="room-details-list clearfix">
									<div class="pull-left">
										<h5>Suit Room</h5>
									</div>
									<div class="pull-left room-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star inactive"></i></li>
										</ul>
									</div>
								</div>
								<div class="list-room-icons clearfix">
									<ul>
										<li><i class="fa fa-calendar"></i></li>
										<li><i class="fa fa-flask"></i></li>
										<li><i class="fa fa-umbrella"></i></li>
										<li><i class="fa fa-laptop"></i></li>
									</ul>
								</div>
								<p>Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque orla porta felis euismodnean eu at ero <a class="active-color" href="#">[...]</a> </p>
							</td>
							<td><h3>70$</h3></td>
							<td><div class="button-style-1"><a href="#"><i class="fa fa-calendar"></i><span class="mobile-visibility">BOOK NOW</span></a></div></td>
						</tr>
						<tr class="table-products-list pos-center">
							<td class="products-image-table"><img alt="Products Image 2" src="temp/room-image-4.jpg" class="img-responsive"></td>
							<td class="title-table">
								<div class="room-details-list clearfix">
									<div class="pull-left">
										<h5>Suit Room</h5>
									</div>
									<div class="pull-left room-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star inactive"></i></li>
										</ul>
									</div>
								</div>
								<div class="list-room-icons clearfix">
									<ul>
										<li><i class="fa fa-calendar"></i></li>
										<li><i class="fa fa-flask"></i></li>
										<li><i class="fa fa-umbrella"></i></li>
										<li><i class="fa fa-laptop"></i></li>
									</ul>
								</div>
								<p>Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque orla porta felis euismodnean eu at ero <a class="active-color" href="#">[...]</a> </p>
							</td>
							<td><h3>70$</h3></td>
							<td><div class="button-style-1"><a href="#"><i class="fa fa-calendar"></i><span class="mobile-visibility">BOOK NOW</span></a></div></td>
						</tr>
						<tr class="table-products-list pos-center">
							<td class="products-image-table"><img alt="Products Image 1" src="temp/room-image-5.jpg" class="img-responsive"></td>
							<td class="title-table">
								<div class="room-details-list clearfix">
									<div class="pull-left">
										<h5>Suit Room</h5>
									</div>
									<div class="pull-left room-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star inactive"></i></li>
										</ul>
									</div>
								</div>
								<div class="list-room-icons clearfix">
									<ul>
										<li><i class="fa fa-calendar"></i></li>
										<li><i class="fa fa-flask"></i></li>
										<li><i class="fa fa-umbrella"></i></li>
										<li><i class="fa fa-laptop"></i></li>
									</ul>
								</div>
								<p>Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque orla porta felis euismodnean eu at ero <a class="active-color" href="#">[...]</a> </p>
							</td>
							<td><h3>70$</h3></td>
							<td><div class="button-style-1"><a href="#"><i class="fa fa-calendar"></i><span class="mobile-visibility">BOOK NOW</span></a></div></td>
						</tr>
						<tr class="table-products-list pos-center">
							<td class="products-image-table"><img alt="Products Image 2" src="temp/room-image-6.jpg" class="img-responsive"></td>
							<td class="title-table">
								<div class="room-details-list clearfix">
									<div class="pull-left">
										<h5>Suit Room</h5>
									</div>
									<div class="pull-left room-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star inactive"></i></li>
										</ul>
									</div>
								</div>
								<div class="list-room-icons clearfix">
									<ul>
										<li><i class="fa fa-calendar"></i></li>
										<li><i class="fa fa-flask"></i></li>
										<li><i class="fa fa-umbrella"></i></li>
										<li><i class="fa fa-laptop"></i></li>
									</ul>
								</div>
								<p>Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque orla porta felis euismodnean eu at ero <a class="active-color" href="#">[...]</a> </p>
							</td>
							<td><h3>70$</h3></td>
							<td><div class="button-style-1"><a href="#"><i class="fa fa-calendar"></i><span class="mobile-visibility">BOOK NOW</span></a></div></td>
						</tr>
					</table>
				</div>
				<div class="col-lg-3"><!-- Sidebar -->
					<div class="quick-reservation-container">
						<div class="quick-reservation clearfix">
							<div class="title-quick pos-center margint30">
								<h5>QUICK RESERVATIONS</h5>
								<div class="line"></div>
							</div>
							<div class="reserve-form-area">
								<form action="#" method="post" id="ajax-reservation-form">
									<label>ARRIVAL</label>
									<input type="text" id="dpd1" name="dpd1" class="date-selector" placeholder="&#xf073;" />
									<label>RETURN</label>
									<input type="text" id="dpd2" name="dpd2" class="date-selector" placeholder="&#xf073;" />
									<div class="pull-left children clearfix">
										<label>ROOMS</label>
										<select name="rooms" class="pretty-select">
											<option selected="selected" value="1" >1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
									<div class="pull-left type clearfix">
										<label>ADULT</label>
										<select name="adult" class="pretty-select">
											<option selected="selected" value="1" >1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
									</select>
									</div>
									<div class="pull-left rooms clearfix">
										<label>CHILDREN</label>
										<select name="children" class="pretty-select">
											<option selected="selected" value="0" >0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
									<div class="pull-left search-button clearfix">
										<div class="button-style-1">
											<a id="res-submit" href="#">SEARCH</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="luxen-widget news-widget">
						<div class="title-quick marginb20">
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