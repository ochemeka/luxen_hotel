<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php 
$pagetitle="Rooms"; ?>
<?php include("includes/header2.php"); ?>
<title>
<?php  echo $pagetitle ; ?>
</title>


		<h1 style="color:#FFFFFF"; >ROOMS</h1>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container margint60">
			<div class="row">
				<div class="col-lg-12 marginb20"><!-- Room Sort -->
					<div class="sortby clearfix">
						<!--<div class="pull-left">
							<select>
								<option selected="selected">ASCENDING</option>
								<option>DESCENDING</option>
							</select>
						</div>-->
						<!--<div class="pull-right sort-icon">
							<a class="fright" href="category-grid.php"><img src="temp/grid-icon.png" alt=""></a> 
							<a class="fright" href="category-list.php"><img src="temp/list-icon.png" alt=""></a>
						</div>-->
					</div>	
				</div>
				 <?php /*?><?php
		$catid = $_GET['catid']; 
		$sql = "SELECT * 
				FROM roomtbl
				WHERE cat_id = $catid     
				ORDER BY room_id asc";
		$pager = new PS_Pagination($connection, $sql, 10, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($row = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>
 <?php  
	 $item_per_page      = 10000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>rooms";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM roomtbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
//$cd = get_category_id($_GET['id']);
$cd = $_GET['bw'];
$results = $connection->query("SELECT * FROM roomtbl WHERE cat_id = '$cd' ORDER BY room_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
FROM roomtbl
				WHERE cat_id = $catid     
				ORDER BY room_id asc";
*/
//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>            
				<div class="col-lg-4 col-sm-6 clearfix"><!-- Explore Rooms -->
					<div class="home-room-box clearfix">
					<div class="room-image">
					<?php 
														$img_url = $row["room_image"];
														$img_arr = explode(',', $img_url);
															
						 ?>
<!--to call the image by array use $img_arr[0])>4-->
<?php  if(strlen($img_arr[0])>2){  ?>
						
							<img style="height:300px; width:300px;" alt="Room Images" class="img-responsive" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" />	<?php } ?>
                            
							<div class="home-room-details">
								<h5><?php echo $row["room_name"];?></h5>
								
							</div>
						</div>
						<div class="room-details">
							<p><?php echo $row["description"];?></p>
						</div>
						<div class="room-bottom">
							<div class="pull-left">
								<div class="button-style-1">
									<a href="room_detail.php?<?php echo hash('sha256',($row['description'])); ?><?php echo sha1($row['room_id']); ?>&roomid=4cf2%%%4e3acd47&%%roomid=<?php echo $row["room_id"];?>&<?php echo hash('sha256',($row['room_id'])); ?>&<?php echo sha1($row['room_name']); ?>roomid=><?php echo sha1($row['room_name']); ?>">VIEW ROOM DETAILS</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
					
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
						<div class="pull-left"><p>© LUXEN HOTELS 2018 - <?php echo date("Y") ?></p></div>
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