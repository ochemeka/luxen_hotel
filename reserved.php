<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php include("includes/header3.php"); ?>
<?php 

$member = get_user_id($_SESSION['username']);
	$member_part = mysqli_fetch_array($member);
//
$roomy = get_room1($_GET['roomid']);
$roomy_part = mysqli_fetch_array($roomy);
//
$booky = get_allbook($_GET['reserve']);
$booky_part = mysqli_fetch_array($booky);


 ?>

		<h1 style="color:#FFFFFF" ><?php //echo $post['room_name'];?></h1>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
       <div class="row">
       <br /><br /><br />
        <div class="col-lg-12">
    <div class="about-title pos-center">
   <?php  
	 $item_per_page      = 10000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>roomtbl";
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
$rm = $_GET['roomid'];	
$results = $connection->query("SELECT * FROM roomtbl WHERE room_id = '$rm' AND room_status = 1 ORDER BY room_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
FROM roomtbl 
				WHERE room_id = '{$rm}'
				AND room_status = 1    
				ORDER BY room_id desc";
*/
//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>
		
   
    <?php /*?> <?php
		$rm = $_GET['roomid'];					  
		$sql = "SELECT * 
				FROM roomtbl 
				WHERE room_id = '{$rm}'
				AND room_status = 1    
				ORDER BY room_id desc";
		$pager = new PS_Pagination($connection, $sql, 7, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?> <?php */?>
    <p><h3 style="color:#F60;"><?php echo $row["room_name"];?></h3></p>
    <p>Room Description</h3></p>All Executive rooms are equipt with a personal safe, mini-bar, Working desk.  <?php } ?>
    </div>
    </div></div>
    
				<div class="col-lg-8"><!-- Room Gallery Slider -->
					<div class="room-gallery">
						<div class="margint40 marginb20"><!--<h4>PHOTO GALLERY</h4>--></div>
						<div class="flexslider-thumb falsenav">
							<ul class="slides">
    
     <?php  
	 $item_per_page      = 10000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>roomtbl";
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
$rm = $_GET['roomid'];	
$results = $connection->query("SELECT * FROM roomtbl WHERE room_id = '$rm' AND room_status = 1 ORDER BY room_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
FROM roomtbl 
				WHERE room_id = '{$rm}'
				AND room_status = 1    
				ORDER BY room_id desc";
*/
//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>
    
     <?php /*?><?php
		$rm = $_GET['roomid'];					  
		$sql = "SELECT * 
				FROM roomtbl 
				WHERE room_id = '{$rm}'
				AND room_status = 1    
				ORDER BY room_id desc";
		$pager = new PS_Pagination($connection, $sql, 7, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>
            
            <?php 
														$img_url = $row["room_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?> 
		<li data-thumb="<?php echo SITE_PATH ?>uploads/<?php echo $img_url1;  ?>" style="width:900px; height:500px;"><img style="width:900px; height:500px;" alt="<?php echo $row['room_name'];?>" class="img-responsive" src="<?php echo SITE_PATH ?>uploads/<?php echo $img_url1;  ?>" />	 </li><?php } } ?>
					<?php } ?>
                    
                    			<!--<li data-thumb="temp/room-gallery-image-2.jpg"><img alt="Slider 1" class="img-responsive" src="temp/room-gallery-image-2.jpg"/></li>
								<li data-thumb="temp/room-gallery-image-3.jpg"><img alt="Slider 1" class="img-responsive" src="temp/room-gallery-image-3.jpg"/></li>
								<li data-thumb="temp/room-gallery-image-4.jpg"><img alt="Slider 1" class="img-responsive" src="temp/room-gallery-image-4.jpg"/></li>
								<li data-thumb="temp/room-gallery-image-5.jpg"><img alt="Slider 1" class="img-responsive" src="temp/room-gallery-image-5.jpg"/></li>
                                <li data-thumb="temp/room-gallery-image-5.jpg"><img alt="Slider 1" class="img-responsive" src="temp/room-gallery-image-6.jpg"/></li>
                              -->
								
							</ul>
						</div>
					</div>
				</div>
               <!---->
              
					<div class="col-lg-4 clearfix col-sm-4">
						<div class="room-services"><br /><!-- Room Services -->
				
                			<h4>SERVICES</h4>
							<ul class="room-services">
								<!--<li><i class="fa fa-calendar"></i> CALENDAR </li>-->
								<li><i class="fa fa-wifi"></i><?php echo $roomy_part["internet"];?></li>
								<li><i class="fa fa-home"></i><?php echo $roomy_part["balcony"];?></li>
								<li><i class="fa fa-user"></i><?php echo $roomy_part["adults"];?></li>
                                <li><i class="fa fa-child"></i><?php echo $roomy_part["kids"];?></li>
                                <li><i class="fa fa-bed"></i><?php echo $roomy_part["bed"];?></li>
                                
								<li><i class="fa fa-clock-o"></i><?php echo $roomy_part["roomservice"];?></li>
							</ul>
						</div><div class="room-bottom"><br /><br />
								<!--<div class="pull-left"><h4>89$<span class="room-bottom-time">/ Day</span></h4></div>-->
								<!--<div class="pull-left">
									<div class="button-style-1">
										<a href="#">BOOK NOW</a>
									</div>
								</div>-->
                                
                              <!-- Sidebar -->
					<div class="quick-reservation-container">
						<div class="quick-reservation clearfix">
							<div class="title-quick pos-center margint30">
								<h4>RESERVATIONS SUMMARY</h4>
								<div class="line"></div>
							</div>
							<div class="reserve-form-area">										
				<form method="post" action="" enctype="multipart/form-data" id="ajax-reservation-form">
                  <input type="hidden" class="form-control"  value="<?php echo time(); ?>" name="time">
                  <input type="hidden" class="form-control"  value="<?php echo $roomy_part["description"]; ?>" name="description">
             <input type="hidden" class="form-control"  value="<?php echo $member_part["phone"]; ?>" name="phone">
              <input type="hidden" class="form-control"  value="<?php echo $roomy_part["price"]; ?>" name="price">
           <input type="hidden" class="form-control"  value="<?php echo $roomy_part["room_id"]; ?>" name="roomid">                   
									<label>ARRIVAL</label>
						<input type="text" id="" name="arrival" value="<?php echo $booky_part["checkindate"]; ?>"  readonly />
									<label>RETURN</label>
						<input type="text" id="" name="departure" value="<?php echo $booky_part["checkout"]; ?>" readonly />
						
                             <div class="pull-left children clearfix">
                                <label>DAY(S) OF STAY</label>
                                <input type="text" value="<?php echo $booky_part["no_stay"]; ?>" name="staydays"  readonly >
                          
                           <label>ROOM ID</label>
                               <input type="text" value="<?php echo $booky_part["room_id"]; ?>" name="roomid"  readonly >
                          
                           <label>KIDS.</label>
                               <input type="text" value="<?php echo $booky_part["no_child"]; ?>" name="kids"  readonly >
                            
                             <label>AMOUNT</label>
                               <input type="text" value="<?php echo $booky_part["amount"]; ?>" name="amount"  readonly >   
                                
                          
                           </div>
                            
                            <div class="pull-left type clearfix">
                                                            
                                <label>PHONE</label>
                               <input type="text" value="<?php echo $booky_part["phone"]; ?>" name="phone"  readonly >
                            
                            <label>ROOM NO.</label>
                               <input type="text" value="<?php echo $booky_part["no_room"]; ?>" name="roomno"  readonly >
                               
                               <label>ADULTS</label>
                               <input type="text" value="<?php echo $booky_part["no_adult"]; ?>" name="adults"  readonly >
                               
                                <label>TOTAL AMOUNT</label>
                               <input type="text" value="<?php echo $booky_part["totalamount"]; ?>" name="totalamount"  readonly >
                             </div> 
                            
                  <label></label>		
                        <?php $confirm = $booky_part["pay_confirm"]; ?>
                      <?php if ($confirm == 0){ ?>       
                     <h4 style="color:#FFF;"> RESERVATION STATUS: </h4><p style="color:#F00;">PENDING APPROVAL</p>
                       <?php }  elseif ($confirm == 1)  {  ?>   
                          RESERVATION STATUS: <h3><p style="color: #0F0;">APPROVED</p></h3>   
                              <?php } ?>
                            
                            <div class="pull-left">
                            <div class="button-style-1">
              <?php $confirm = $booky_part["pay_confirm"]; ?>
                             <?php if ($confirm == 0){ ?> 
                                    <a href="paymentgateway.php">PAY NOW</a>
                                  <?php }  elseif ($confirm == 1)  {  ?>     
									<a><strong>PAID</strong></a>
                                    <?php } ?>
                            </div>
                          </div>
                                    
                                     <div class="pull-right">
                            <div class="button-style-1">
                             <?php $confirm = $booky_part["pay_confirm"]; ?>
                             <?php if ($confirm == 0){ ?> 
                                    <a href="dashboard.php">PAY LATER</a>
                               <?php }  elseif ($confirm == 1)  {  ?>  
                                    <a href="reservationtb.php">BACK TO RESERVATION</a>
                               <?php } ?>       
                            </div>
                          </div>
                                    
									<div class="pull-left search-button clearfix">
                                    <!--<div class="pull-left"><h4>89$<span class="room-bottom-time">/ Day</span></h4></div>-->
								<br /><div class="pull-left">
                               <?php /*?> <?php if(logged_in()){ ?> 
									 <input style="background-color: #F90;" type="submit" name="submit" value="Submit">
                                     <?php } else { ?>
                                     <div class="button-style-1">
                                    
										<a href="login.php">Login to Book</a>
									</div>
                                     <?php } ?><?php */?>
								</div>
										<!--<div class="button-style-1">
											<a id="res-submit" href="#">SEARCH</a>
										</div>-->
									</div>
								</form>
							</div>
						</div>
                        
					</div>

							</div>
                            
                            
						<!-- Sidebar -->
								
		
      <!--  
        <div class="room-details">
								<p>Vestibulum id ligula porta felis euismod semper. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Curabitur blandit tibulum at ero[...]</p>
							</div>-->
                            
     
	
   
    </div>   
        
	
    <!---->
    <div class="col-lg-0"><!--sakdjfciosdjfiojweijci--></div>
    
    <!---->
						<div class="col-lg-12"> <br /><br /><br /><br />
							<div class="title-style-1 marginb40">
    <div class="about-title pos-center" "><a href="#"><h3>RELATED CATEGORY</h3></a></div>
				
								<hr>
							</div>
							<div class="flexslider" <?php //echo $cat_part['cat_name'];?>>
								<ul class="slides" style="padding-left:130px;>
	 <?php  
	 $item_per_page      = 10000; //item to display per page
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
//$cd = $_GET['cat_id'];
//$rms = $_GET['roomid'];
$results = $connection->query("SELECT * FROM categorytbl WHERE cat_status = 1 ORDER BY cat_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 							
													
	<?php /*?><?php 
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
			?><?php */?>
								<a href="rooms.php?catid=<?php echo $row["cat_id"]; ?>"><li> 
                                    <div class="slider-textbox clearfix">
						<div class="container">
							<div class="row">
                    			<div class="slider-bar pull-left"><a style="color:#FFF;" href="rooms.php?catid=<?php echo $row["cat_id"]; ?>"><?php echo $row['cat_name'];?></a></div>
                    			<div class="slider-triangle pull-left"></div>
							</div>
						</div>
						<div class="container">
							<div class="row">
                    			<div class="slider-bar-under pull-left" ><a style="color:#FFF;" href="rooms.php?catid=<?php echo $row["cat_id"]; ?>"><?php echo $row['cat_description'];?></a></div>
                    			<div class="slider-triangle-under pull-left"></div>
							</div>
						</div>
					</div>
									
									<?php 
														$img_url = $row["cat_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
				
				<a href="#"><img style="width:900px; height:350px;" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_arr[0];  ?>" alt=""></a><?php } } ?>
				
				
								<?php } ?>
									
									
									
								</ul>
							</div>
                            <div class="col-lg-2"><!--thanksksfjdhfcwiejd--></div>
						</div>
    
    
    </div>
  
 <?php include("includes/footer2.php"); ?>