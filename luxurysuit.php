<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php $pagetitle= 'luxury Suit' ; 
include('includes/ps_pagination1.php');?>
<?php include("includes/header2.php"); ?>


		<h1 style="color:#FFFFFF" >Luxury Suit</h1>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
			<div class="row">
				<div class="col-lg-10"><!-- Room Gallery Slider -->
					<div class="room-gallery">
						<div class="margint40 marginb20"><!--<h4>PHOTO GALLERY</h4>--></div>
						<div class="flexslider-thumb falsenav">
							<ul class="slides">
								<li data-thumb="temp/room-gallery-image-1.jpg"><img alt="Slider 1" class="img-responsive" src="temp/room-gallery-image-1.jpg"/></li>
								<li data-thumb="temp/room-gallery-image-2.jpg"><img alt="Slider 1" class="img-responsive" src="temp/room-gallery-image-2.jpg"/></li>
								<li data-thumb="temp/room-gallery-image-3.jpg"><img alt="Slider 1" class="img-responsive" src="temp/room-gallery-image-3.jpg"/></li>
								<li data-thumb="temp/room-gallery-image-4.jpg"><img alt="Slider 1" class="img-responsive" src="temp/room-gallery-image-4.jpg"/></li>
								<li data-thumb="temp/room-gallery-image-5.jpg"><img alt="Slider 1" class="img-responsive" src="temp/room-gallery-image-5.jpg"/></li>
                                <li data-thumb="temp/room-gallery-image-5.jpg"><img alt="Slider 1" class="img-responsive" src="temp/room-gallery-image-6.jpg"/></li>
                              
								
							</ul>
						</div>
					</div>
				</div>
                <!---->
               <!-- <div class="col-lg-3"><br /><br /><br /><br />
                <h4>ROOM DESCRIPTION</h4>
						<p class="margint30">Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus nibh Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna. Fusce dapibus, tellus ac blandit Maecenas sed diam eget risus varius blandit sit amet non magna. Fusce dapibus, tellus ac blandit tempus.</p>
                
                </div>-->
                <!---->
              
					<div class="col-lg-2 clearfix col-sm-4">
						<div class="room-services"><br /><br /><br /><!-- Room Services -->
							<h4>SERVICES</h4>
							<ul class="room-services">
								<!--<li><i class="fa fa-calendar"></i> CALENDAR </li>-->
								<li><i class="fa fa-wifi"></i> 500MB WI-FI ACCESS/DAY </li>
								<li><i class="fa fa-home"></i> 2 BALCONIES </li>
								<li><i class="fa fa-user"></i> 2 ADULTS </li>
                                <li><i class="fa fa-child"></i> 2 KIDS </li>
                                <li><i class="fa fa-phone"></i> 2 BEDS </li>
                                
								<li><i class="fa fa-clock-o"></i> 7/24 SERVICE </li>
							</ul>
						</div><div class="room-bottom"><br /><br />
								<!--<div class="pull-left"><h4>89$<span class="room-bottom-time">/ Day</span></h4></div>-->
								<div class="pull-left">
									<div class="button-style-1">
										<a href="#">BOOK NOW</a>
									</div>
								</div>
							</div>
						<!-- Sidebar -->
								
		</div>
        
        <div class="room-details">
								<p>Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Curabitur blandit tibulum at ero[...]</p>
							</div>
        
        
	</div>
    
						<div class="col-lg-6">
							<div class="title-style-1 marginb40">
						<a href="#"><h5>RELATED CATEGORY</h5></a>		
								<hr>
							</div>
							<div class="flexslider">
								<ul class="slides">
								
													
								 <?php 
		$sql = "SELECT * 
				FROM categorytbl 
				WHERE cat_status=1    
				ORDER BY cat_id desc";
		$pager = new PS_Pagination($connection, $sql, 100, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?>
									<li> <a href="blog_details.php">
									<?php 
														$img_url = $post["cat_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
									<img style="width::250px; height:250px;" alt="Slider 1" class="img-responsive" src="<?php echo cat_part; ?>uploads/<?php echo $img_url1;  ?>" />	<?php } } ?></a> </li>
								<?php } ?>
								</ul>
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