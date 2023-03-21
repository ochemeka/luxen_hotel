<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
include('includes/ps_pagination1.php');
?>
<?php $pagetitle= 'Room Details' ; ?>
<?php include("includes/header2.php"); ?>

		<h1 style="color:#FFFFFF";>Room Details</h1>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-sm-8 blog-post-contents">
		            <div class="blog-post"><!-- Blog Post -->
                        <h3><a href="room_details.php">CRAS JUSTO ODIO, DAPIBUS AC FACILISIS</a></h3>
						<div class="post-materials  clearfix">
                            <ul>                                
                            	<li><h6><a href="#"><i class="fa fa-calendar"></i> 24 MAY 2013</a></h6></li>
                                <li><h6><a href="#"><i class="fa fa-user"></i>ADMIN</a></h6></li>
                                <li><h6><a href="#"><i class="fa fa-comments"></i>13 COMMENTS</a></h6></li>
                                <li><h6><a href="#"><i class="fa fa-tags"></i>DESIGN, WORDPRESS, COMPANY</a></h6></li>
                            </ul>
                        </div>
                        <div class="blog-image marginb40 margint40">
                        <a href="room_details.php">    <img alt="Blog Image 2" class="img-responsive" src="temp/blog-image-1.jpg" ></a>
                        </div>
                        <div class="post-content margint10">
                            <p>Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec id elit non mi porta gravida at eget metus. Sed posuere consectetur est at nulla vre consectetur est at lobortis.</p>
                        </div>
                        <div class="button mini-button button-style-2 margint30"><h6><a href="room_details.php">READ MORE</a></h6></div>
                    </div>
		            <div class="blog-post">
					
                        <h3><a href="blog_details.php">OTHER VIEWS YOU MAY LIKE TO SEE</a></h3>
						<div class="post-materials  clearfix">
                          <!--  <ul>
                                <li><h6><a href="#"><i class="fa fa-calendar"></i> 24 MAY 2013</a></h6></li>
                                <li><h6><a href="#"><i class="fa fa-user"></i>ADMIN</a></h6></li>
                                <li><h6><a href="#"><i class="fa fa-comments"></i>13 COMMENTS</a></h6></li>
                                <li><h6><a href="#"><i class="fa fa-tags"></i>DESIGN, WORDPRESS, COMPANY</a></h6></li>
                            </ul>-->
                        </div>
                        <div class="blog-image marginb20 margint20">
                            <div class="flexslider">
							  <ul class="slides">
							   <?php 
		$sql = "SELECT * 
				FROM slidertbl 
				WHERE slide_status=1    
				ORDER BY slide_id desc";
		$pager = new PS_Pagination($connection, $sql, 100, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?>
							  
							  
							   <li>
												<?php 
												$img_url = $post["slide_image"];
												$img_arr = explode(',', $img_url);
												foreach($img_arr as $img_url1)		
												{
												?>
												
												<?php  if(strlen($img_url1)>4){  ?>
												<img style="width:1000px; height:300px;"  alt="Slider 1" class="img-responsive" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" />	<?php } } ?> </li>
												<?php } ?>
												
							    <!-- <li><img alt="Blog Image 3" class="img-responsive" src="temp/slider-2.jpg"  /></li>
							    <li> <img alt="Blog Image 3" class="img-responsive" src="temp/slider-3.jpg"  /></li>-->
							  </ul>

							</div>
                        </div>
                        <div class="post-content margint10">
                           <!-- <p>Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec id elit non mi porta gravida at eget metus. Sed posuere consectetur est at nulla vre consectetur est at lobortis.</p>-->
                        </div>
                        <div class="button mini-button button-style-2 margint30"><h6><a href="blog-details.php">READ MORE</a></h6></div>
                    </div>
		           				</div>
				<div class="col-lg-3 col-sm-4 margint60"><!-- Sidebar -->
					<div class="luxen-widget news-widget">
						<div class="title">
						<!--<h5>ROOM INFORMATION</h5>-->
						</div>
						<ul class="sidebar-recent">
							<li class="clearfix">
							<!--<p>Donec ullCurabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Lorem ipsumero, a pharetra augue. Lorem ipsum dolor sit amet, consectedui.amcorper nulla non metus auctor Nulla vitae elit libero, a pharetra augue <a class="active-color" href="#">[...]</a></p>-->
								<!--<h6><a href="#">News from us from now</a></h6>-->
								<!--<div class="pull-left blg-img margint20">
									<img src="temp/sidebar-news-image-1.jpg" class="img-responsive" alt="">
								</div>-->
								<!--<div class="pull-left blg-txt">
									
								</div>-->
							</li>
							
						</div>
						<!--saidwyuilqhuiewfheuiwq-->
								<!--<div class="pull-left blg-txt">
									<p>Donec ullamcorper nulla non metus auctor Nulla vitae elit libero, a pharetra augue <a class="active-color" href="#">[...]</a></p>
								</div>-->
							</li>
						</ul>
					</div>
					<div class="luxen-widget news-widget">
						<div class="title"><br /><br /><br /><br /><br /><br />
							<h5>ROOM INFORMATION</h5>
						</div>
						<p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Lorem ipsumero, a pharetra augue. Lorem ipsum dolor sit amet, consectedui.</p>
					</div>
					<div class="luxen-widget news-widget">
						<div class="title">
						<!--	<h5>CONTACT</h5>-->
						</div>
						<!--<ul class="footer-links">
							<li><p><i class="fa fa-map-marker"></i> Lorem ipsum dolor sit amet lorem Victoria 8011 Australia </p></li>
							<li><p><i class="fa fa-phone"></i> +61 3 8376 6284 </p></li>
							<li><p><i class="fa fa-envelope"></i> info@2035themes.com</p></li>
						</ul>--><br /><br /><br /><br /><br /><br /><br />
					</div>
					<div class="luxen-widget news-widget">
						<div class="title"><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
						
						<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec id elit non mi porta gravida at eget metus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec id elit non mi porta gravida at eget metus. Sed posuere consectetur est at nulla vre consectetur est at lobortis.</p>
							<h5>SOCIAL MEDIA</h5>
						</div>
						<ul class="social-links">
							<li><a href="http://facebook.com/2035themes"><i class="fa fa-facebook"></i></a></li>
							<li><a href="http://twitter.com/2035themes"><i class="fa fa-twitter"></i></a></li>
							<li><a href="http://vine.com/2035themes"><i class="fa fa-vine"></i></a></li>
							<li><a href="http://foursquare.com/2035themes"><i class="fa fa-foursquare"></i></a></li>
							<li><a href="http://instagram.com/2035themes"><i class="fa fa-instagram"></i></a></li><br />
							 
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