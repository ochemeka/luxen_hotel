<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php $pagetitle= 'Category' ; ?>
<?php include("includes/header2.php"); ?>

		<h1 style="color:#FFFFFF"; >CATEGORY GRID</h1>
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
		
		$sql = "SELECT * 
				FROM categorytbl
				WHERE cat_status = 1    
				ORDER BY cat_id desc";
		$pager = new PS_Pagination($connection, $sql, 10, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($row = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>
<?php  
	 $item_per_page      = 3; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>category";
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
//$cd = $_GET['bw'];
$results = $connection->query("SELECT * FROM categorytbl  ORDER BY cat_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
FROM categorytbl
				WHERE cat_status = 1    
				ORDER BY cat_id desc";
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
														$img_url = $row["cat_image"];
														$img_arr = explode(',', $img_url);
															
						 ?>
<!--to call the image by array use $img_arr[0])>4-->
<?php  if(strlen($img_arr[0])>2){  ?>
						
							<img alt="Room Images" class="img-responsive" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" />	<?php } ?>
                            
							<div class="home-room-details">
							<a href="rooms.php?cd=<?php echo hash('sha512',($row['cat_image'])); ?>cat_cd=<?php echo hash('sha256',($row['cat_id'])); ?>&&bw=<?php echo $row["cat_id"]; ?><?php echo sha1($row['cat_image']); ?>"></a>	
						<h5><?php echo $row["cat_name"];?></h5>	<!-- <h5><a href="rooms.php?catid=<?php //echo hash('sha256',($row['cat_image'])); ?><?php //echo $row["cat_id"]; ?>"><?php echo $row["cat_name"];?></a></h5> -->
								
							</div>
						</div>
						<div class="room-details">
							<p><?php echo $row["cat_description"];?></p>
						</div>
						<div class="room-bottom">
							<div class="pull-left">
								<div class="button-style-1">
									<a href="rooms.php?cd=<?php echo hash('sha512',($row['cat_image'])); ?>cat_cd=<?php echo hash('sha256',($row['cat_image'])); ?>&&bw=<?php echo $row["cat_id"]; ?><?php echo sha1($row['cat_image']); ?>">VIEW ROOM DETAILS</a>
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
		<?php include ('includes/footer2.php')?>
</php>