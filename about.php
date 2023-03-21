<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php $pagetitle= 'About' ; ?>
<?php include("includes/header2.php"); ?>

		<h1 style="color:#FFFFFF"; >ABOUT THE HOTEL</h1>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
			<div class="row">
				<div class="about-slider margint40"><!-- About Slider -->
					<div class="col-lg-12">
						<div class="flexslider">
							<ul class="slides">
													
		 <?php /*?><?php 
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
			?><?php */?>
 
  <?php  
	 $item_per_page      = 7; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>About";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM slidertbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM slidertbl ORDER BY slide_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
//WHERE gal_status=1 ORDER BY gal_id desc
/*
FROM slidertbl 
				WHERE slide_status=1    
				ORDER BY slide_id desc";

*/
//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>  
    
		
									<li> 
									
									<?php 
														$img_url = $row["slide_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
									<img style="width:2000px; height:400px;"  alt="Slider 1" class="img-responsive" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" />	<?php } } ?> </li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="about-info clearfix"><!-- About Info -->
					<div class="col-lg-8">
						<h3>ABOUT US</h3>
						<p class="margint30">Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur. Aenean lacinia bibendum nulla sed consectetur. </p>
						<p>Lorem ipsum dolor sit amet, consectetur.Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur.Aenean lacinia bibenPraesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur.Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur.Aeum dolor sit amet, consectetur.</p>
						<p>Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur.Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur.Aeum dolor sit amet, consectetur.</p>
					</div>
					<div class="col-lg-4">
						<h3>SIDEBAR</h3>
						<div id="accordion" class="margint30">
							<div class="panel panel-luxen active-panel">
								<div class="panel-style active">
									<h4><span class="plus-box"><i class="fa fa-angle-up"></i></span> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1">SOME GREAT EXAMPLE</a></h4>
								</div>
								<div id="collapse1" class="collapse collapse-luxen in">
									<div class="padt20">    	
										<p>Consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Lnia bibendum nulla sedr.Aeum dolor sit amet, consectetur</p>
									</div>
								</div>
							</div>
							<div class="panel panel-luxen">
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
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="about-services margint60 clearfix"><!-- About Services -->
					
                    <div class="container">
				<div class="row">	
					<div class="title-style-2 marginb40 pos-center">
						<h3>EXPLORE CATEGORIES</h3>
						<hr>
					</div>
                    					
	 <?php /*?><?php 
		$sql = "SELECT * 
				FROM categorytbl 
				WHERE cat_status=1    
				ORDER BY cat_id desc";
		$pager = new PS_Pagination($connection, $sql, 4, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>
 <?php  
	 $item_per_page      = 4; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>About";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM categorytbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM categorytbl ORDER BY cat_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
//WHERE gal_status=1 ORDER BY gal_id desc
/*
FROM categorytbl 
				WHERE cat_status=1    
				ORDER BY cat_id desc";
*/
//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>  
 
           
					<div class="col-lg-3 col-sm-6">
						<div class="home-room-box">
							<div class="room-image">
                            <?php 
														$img_url = $row["cat_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
								<img style="width:300px; height:300px;" alt="Room Images" class="img-responsive" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>">
                                <?php }} ?>
								<div class="home-room-details">
									<h5><a href="rooms.php?catid=<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"]; ?></a></h5>
									
								</div>
							</div>
							<div class="room-details">
								<p><?php echo substr($row["cat_description"],5,50); ?></p>
							</div>
							<div class="room-bottom">
								<div class="pull-left">
									<div class="button-style-1">
										<a href="rooms.php?catid=<?php echo $row["cat_id"]; ?>">VIEW ROOMS</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
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
					<div class="pull-left"><p>© LUXEN HOTELS   <?php echo date("Y") ?> </p></div>
						<div class="pull-right">
						<a href="http://www.linkedin.com/in/emeka-ochei-92b562208"><h5 style="color:#000099"><strong>Designed by Melvin Multi-Tech Ltd</strong></h5></a>
						
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