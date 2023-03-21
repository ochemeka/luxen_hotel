<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/constant.php"); ?>

<?php
include('includes/pagination.php');
$pagetitle="Home";
//$member = get_user_id($_SESSION['username']);
//$member_part = mysqli_fetch_array($member);


$member = get_user_id11();
$member_part = mysqli_fetch_array($member);

?>

<?php include("includes/header.php"); ?>


<?php /*?><?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";
																		
		$required_fields = array('email');
		foreach($required_fields as $fieldname) {
			if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
				$errors[] = $fieldname; 
			}
		}
		//include("includes/image_upload_app.php");
		//if(strlen($db_images) < 3){ $errors[] = "No image upload"; }
		
		if (empty($errors)) {
			
			
			$email = mysql_prep($_POST['email']);
			
			
			$query = "INSERT INTO newslettertbl (
					 email
					) VALUES (
						 '{$email}')";
			$result = mysql_query($query, $connection);
			if ($result) {
				// Success!
				echo "<script type='text/javascript'>alert('Newsletter successfully Submited!')</script>";
				redirect_to("index.php");
			} else {
				// Display error message.
				echo "<p>Newsletter submission failed.</p>";
				echo "<p>" . mysqli_error() . "</p>";
			}

			} 
		else {
			// Errors occurred
			$message = "There were " . count($errors) . " errors in the form.";
		}
		
		


} // end: if (isset($_POST['submit']))
?> <?php */?>


						<h2>WELCOME TO PARADISE</h2>
						<div class="title-shape"><img alt="Shape" src="img/shape.png"></div>
						<p>Nullam quis risus eget urna mollis ornare vel eu leo. Cras mattis consectetur purus sit amet fermentum. Praesent <span class="active-color">commodo</span> cursus magna, vel scelerisque nisl .Nulleget urna mattis consectetur purus sit amet fermentum</p>
					</div>
					<div class="otel-info margint60">
 						
                        <div class="col-lg-4 col-sm-12">
							<div class="title-style-1 marginb40">
                           
						<a href="gallery.php"><h5>OUR GALLERY</h5></a>		
								<hr>
							</div>
  
				<div class="flexslider slider-loading falsenav">
            <ul class="slides">
								<?php  
	 $item_per_page      = 10; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>gal";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM gal "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM gal ORDER BY gal_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
//WHERE gal_status=1 ORDER BY gal_id desc

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 									
								
	
            <li>
			<?php 
														$img_url = $row["gal_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
									<img height="250" width="350"
									 src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" />	<?php } } ?> </li>
							

			</li>
		<!---	<li><img src="temp/100208071.jpg"  height="250" width="350" /></li>   --->
             
									
									 </a><?php } ?>
								
								</ul>
							</div>
						</div>
                        
						<div class="col-lg-4 col-sm-6">
							<div class="title-style-1 marginb40">
							<a href="about.php"><h5>ABOUT US</h5></a>	
								<hr>
							</div>
							<!--video start-->
							 <iframe src="temp/br.mp4" width="300" height="250"></iframe>
							 <!--video end-->
							
							 
							<!--<p>Sed posuere consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget laci. Maecenas faucibus mollis interdum.</p>
							<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fer condimentum nibh, ut fermentum massa justo sit amet risus. mentum massa justo sit amet risus.</p>
							<p>Fusce dapibus, tellus ac cursus commodo ut fermentum massa. mentum massa justo sit amet risus.</p>-->
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="title-style-1 marginb40">
							<a href="blog.php"><h5>OUR NEWS</h5></a>	
							</div>
							<div class="home-news">
								<div class="news-box clearfix">
									<div class="news-time pull-left">
										<div class="news-date pos-center"><div class="date-day">20<hr></div>MAY</div>
									</div>
									<div class="news-content pull-left">
										<h6><a href="blog.php">News from us from now</a></h6>
										<p class="margint10">Donec ullamcorper nulla non metus auctor fringilla. Donec sed odio dui <a class="active-color" href="#">[...]</a></p>
									</div>
								</div>
								<div class="news-box clearfix">
									<div class="news-time pull-left">
										<div class="news-date pos-center"><div class="date-day">20<hr></div>MAY</div>
									</div>
									<div class="news-content pull-left">
										<h6><a href="blog.php">News from us from now</a></h6>
										<p class="margint10">Donec ullamcorper nulla non metus auctor fringilla. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue <a class="active-color" href="#">[...]</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="explore-rooms margint30 clearfix"><!-- Explore Rooms Section -->
		<div class="container">
				<div class="row">	
					<div class="title-style-2 marginb40 pos-center">
						<h3>EXPLORE CATEGORIES</h3>
						<hr>
					</div>
                    					
	
  <?php  
	 $item_per_page      = 4; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
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
$results = $connection->query("SELECT * FROM categorytbl WHERE cat_status = 1 ORDER BY cat_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

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
								<div class="home-room-details"><?php //echo md5($row['cat_description']); ?>
									<h5><a href="rooms.php?catid=<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"]; ?></a></h5>
									
								</div>
							</div>
							<div class="room-details">
								<p><?php echo substr($row["cat_description"],5,50); ?></p>
							</div>
							<div class="room-bottom">
								<div class="pull-left">
									<div class="button-style-1">
										<a href="rooms.php?<?php echo md5($row['cat_image']); ?>&bw=<?php echo $row["cat_id"]; ?>x<?php echo md5($row['cat_description']); ?>&r_id<?php echo sha1($row['cat_image']); ?>">VIEW ROOMS</a>
									</div>
								</div>
							</div>
						</div>
					</div>
                    
					<?php } ?>
                    </div></div>
               <!--TESTIMONY -->    
                    <div class="explore-rooms margint30 clearfix"><!-- Explore Rooms Section -->
		<div class="container">
				<div class="row">	
					<div class="title-style-2 marginb40 pos-center">
						<h3>OUR TESTIMONIES</h3>
						<hr>
					</div>
                    					
	<?php /*?><?php 
		$sql = "SELECT * 
				FROM testimony 
				WHERE test_status=1    
				ORDER BY test_id desc";
		$pager = new PS_Pagination($connection, $sql, 3, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($row = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>
            
 <?php  
	 $item_per_page      = 10; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>index";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM testimony "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM testimony WHERE test_status = 1 ORDER BY test_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
//FROM testimony WHERE test_status=1    ORDER BY test_id desc";
//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
            
					<div class="col-lg-4 col-sm-12" >
						<div class="home-room-box">
							<div class="room-image">
                            
                            
                            
                            <?php /*?><img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $member_part['image']; ?>" height="300" width="400" /><?php */?>
                           <?php 
														$img_url = $row["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $member_part['email']; ?>" height="300" width="400" />
<?php } } ?>   
								<div class="home-room-details">
						<h5><?php echo $row["fullname"]; ?></a></h5>
									
								</div>
							</div>
							<div class="room-details">
								<p><?php echo $row["test_description"]; ?></p>
							</div>
							
						</div>
					</div>
                    
					<?php } ?>
				</div>
                    
				</div>
			</div>
            <div class="newsletter-section"><!-- Newsletter Section -->
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
								<form method="post" enctype="multipart/form-data" >
									<input type="text" name="email" placeholder="Enter a e-mail address">
								<input class="pull-center margint10" input type="submit" name="submit" value="submit">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php include("includes/footer.php"); ?>	