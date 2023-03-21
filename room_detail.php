<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php");
$pagetitle="Room Details"; ?> 
<?php include("includes/header3.php"); 






$member = get_user_id11();
$member_part = mysqli_fetch_array($member);

$roomy = get_room1($_GET['roomid']);
$roomy_part = mysqli_fetch_array($roomy);

$bookedrm = get_bookedrm();
$bookedrm_part = mysqli_fetch_array($bookedrm);										

 ?>
<?php 

$validator = new FormValidator();

if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";
$rand1 = time();

			$required_fields = array('arrival', 'departure');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("includes/image_upload_app.php");
			//if(strlen($db_images) < 7){ $errors[] = "No image upload"; }


				// Perform Inssert
				//$passport = $db_images;
				$userid = $_SESSION['username'];
				$time = stripslashes($_REQUEST['time']);
				$time = mysqli_real_escape_string($connection,$_POST['time']);
				$description = stripslashes($_REQUEST['description']);
				$description = mysqli_real_escape_string($connection,$_POST['description']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$no_stay = stripslashes($_REQUEST['no_stay']);
				$no_stay = mysqli_real_escape_string($connection,$_POST['no_stay']);
				$price = stripslashes($_REQUEST['price']);
				$price = mysqli_real_escape_string($connection,$_POST['price']);
				$roomid = stripslashes($_REQUEST['roomid']);
				$roomid = mysqli_real_escape_string($connection,$_POST['roomid']);
				$arrival = stripslashes($_REQUEST['arrival']);
				$arrival = mysqli_real_escape_string($connection,$_POST['arrival']);
				$departure = stripslashes($_REQUEST['departure']);
				$departure = mysqli_real_escape_string($connection,$_POST['departure']);
				$roomno = stripslashes($_REQUEST['roomno']);
				$roomno = mysqli_real_escape_string($connection,$_POST['roomno']);
				$adult = stripslashes($_REQUEST['adult']);
				$adult = mysqli_real_escape_string($connection,$_POST['adult']);
				$kids = stripslashes($_REQUEST['kids']);
				$kids = mysqli_real_escape_string($connection,$_POST['kids']);
				
				
				//$hashed_password = md5($password);
				//$passmail = mysqli_real_escape_string($connection,$_POST['password']);
				//$country = stripslashes($_REQUEST['country']);
				//$country = mysqli_real_escape_string($connection,$_POST['country']);
				$arr_explode = explode('-',$arrival);
				$dept_explode = explode('-',$departure);
				$arrival = $arr_explode[0]."-".$arr_explode[1]."-".$arr_explode[2];
				$departure =$dept_explode[0]."-".$dept_explode[1]."-".$dept_explode[2];
				$difference  = timeDiff($arrival,$departure);
				$days = abs(floor($difference/86400));
				$totalamount = $price * $days;        
				/*$gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($connection,$_POST['gender']);
				
				$time = stripslashes($_REQUEST['time']);
				$time = mysqli_real_escape_string($connection,$_POST['time']);*/
				//$hash = md5( rand(0,1000) );
				//$sortcode ="BOACC-".time();
				//$securecode ="USHSBACVR-".time();
				

				
			if ($validator->ValidateForm() && empty($errors)) {
				// Perform Inssert
				// Check database to see if username and the hashed password exist there.
						
				$query1 = "INSERT INTO bookingtbl (
				user_id, checkindate, checkout, booking_description, amount, totalamount, no_stay, phone, room_id, no_room, no_adult, no_child, time
				) VALUES (
	'{$userid}', '{$arrival}', '{$departure}', '{$description}', '{$price}', '{$totalamount}', '{$days}', '{$phone}', '{$roomid}', '{$roomno}', '{$adult}', '{$kids}', '{$time}')";

				$result1 = mysqli_query($connection,$query1);
				if ($result1) {
				$last_id = mysqli_insert_id($connection);
								
	$adm = "ochemeka@gmail.com";			
 	$to = "{$adm}";
	$sitename = SITE_NAME;
	$sitepath = SITE_PATH;
    $subject = $sitename."Room Booking Reservation";
//    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers = 'X-Mailer: PHP/' . phpversion() . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= "From:"."{$username}";
    $message = "Dear Administrator,\r\n\r\n
	Below are the full details of Event quotation request order.
	Your account has been created, you can login with the following credentials after you have activated
	
	--------------------------------
	Firstname: $firstname Lastname: $lastname\r\n
	Customer Email: $email Customer Phone: $phone\r\n<br>
	Event Type: $event Vendor Selected: $vendor\r\n
	Expected Guest: $guest Customer State: $state\r\n<br>
	Date of Event: $date \r\n
	Event Description: $description\r\n<br>
	--------------------------------
	
    Kindly contact the client and connect to the selected vendor for further negotiation \r\n
	\r\n
	
	Best Regards,\r\n
	\r\n
	$sitename\r\n
    $sitepath\r\n
	Administrator
    ";

    mail($to, $subject, $message, $headers);
					// Success!
					//;redirect_to("login.php");
					echo "<script type='text/javascript'>alert('Booking Reservation Place Successfully! Proceed to View Reservation')</script>";
					redirect_to("reserved.php?reserve=".$last_id."&roomid=".$roomid);
					
					
				} else {
					// Display error message.
					echo "<script type='text/javascript'>alert('Booking Reservation Failed!')</script>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}
	 
				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			

} // end: if (isset($_POST['submit']))
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
	 $page_url           = "<?php echo SITE_PATH ; ?>room";
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
$rms = $_GET['roomid'];
$results = $connection->query("SELECT * FROM roomtbl WHERE room_id = '$rms' AND room_status = 1 ORDER BY room_id ASC LIMIT $page_position, $item_per_page");

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
    
				<div class="col-lg-9"><!-- Room Gallery Slider -->
					<div class="room-gallery">
						<div class="margint40 marginb20"><!--<h4>PHOTO GALLERY</h4>--></div>
						<div class="flexslider-thumb falsenav">
							<ul class="slides">
      
	   <?php  
	 $item_per_page      = 10000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>room";
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
$rms = $_GET['roomid'];
$results = $connection->query("SELECT * FROM roomtbl WHERE room_id = '$rms' AND room_status = 1 ORDER BY room_id ASC LIMIT $page_position, $item_per_page");

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
			while($row = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>
            
            <?php 
														$img_url = $row["room_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?> 
		<li data-thumb="<?php echo SITE_PATH ?>uploads/<?php echo $img_url1;  ?>" style="width:900px; height:500px;"><img style="width:900px; height:500px;" alt="<?php //echo $row['room_name'];?>" class="img-responsive" src="<?php echo SITE_PATH ?>uploads/<?php echo $img_url1;  ?>" />	 </li><?php } } ?>
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
              
					<div class="col-lg-3 clearfix col-sm-4">
						<div class="room-services"><br /><!-- Room Services -->
			
 <?php  
	 $item_per_page      = 10000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>room";
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
$rms = $_GET['roomid'];
$results = $connection->query("SELECT * FROM roomtbl WHERE room_id = '$rms' AND room_status = 1 ORDER BY room_id ASC LIMIT $page_position, $item_per_page");

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
        while($row = mysql_fetch_assoc($rs)) {
        $x++
        ?> <?php */?>
                			<h4>SERVICES</h4>
							<ul class="room-services">
								<!--<li><i class="fa fa-calendar"></i> CALENDAR </li>-->
								<li><i class="fa fa-wifi"></i><?php echo $row["internet"];?></li>
								<li><i class="fa fa-home"></i><?php echo $row["balcony"];?></li>
								<li><i class="fa fa-user"></i><?php echo $row["adults"];?></li>
                                <li><i class="fa fa-child"></i><?php echo $row["kids"];?></li>
                                <li><i class="fa fa-bed"></i><?php echo $row["bed"];?></li>
                                 <li><i class="fa fa-coffee"> </i>coffee<?php //echo $row["bed"];?></li>
								<li><i class="fa fa-clock-o"></i><?php echo $row["roomservice"];?></li>
							</ul> <?php } ?>
						</div><div class="room-bottom">
                         
						<h5 style="color:#00F;"><strong>ROOM STATUS:</strong><br />(
                           
						   <?php $confirm = $bookedrm_part["room_id"];
						   $rmd= $roomy_part["room_id"];
							?> 	
						   <?php if ($confirm != $rmd){ ?> 
								 <a style="color:#3F0;"dashboard.php">ROOM AVAILABLE</a>
							 <?php }  elseif ($confirm == $rmd)  {  ?>  
								  <a style="color:#F00;"reservationtb.php">ROOM BOOKED</a>
							 <?php } ?>   )
						 </h5>
                             
                         
                           
                           
                            <br />
                           <br />
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
								<h5><strong>QUICK RESERVATIONS</strong></h5>
								<div class="line"></div>
							</div>
							<div class="reserve-form-area">										
				<form method="post" action="" enctype="multipart/form-data" id="ajax-reservation-form">
                  <input type="hidden" class="form-control"  value="<?php echo time(); ?>" name="time">
                  <input type="hidden" class="form-control"  value="<?php echo $roomy_part["description"]; ?>" name="description">
             <input type="hidden" class="form-control"  value="<?php echo $member_part["phone"]; ?>" name="phone">
              <input type="hidden" class="form-control"  value="<?php echo $roomy_part["price"]; ?>" name="price">
           <input type="hidden" class="form-control"  value="<?php echo $roomy_part["room_id"]; ?>" name="roomid"> 
            
                <?php /*?><input name="username" type="hidden" value="<?php //echo $_SESSION['username']; ?>"  /><?php */?>
                <input name="rm_amount" type="hidden" value="<?php echo $roomy_part['price']; ?>"  />
                <input name="order_desc" type="hidden" value="<?php echo "Booking for Reservation"; ?>"  />
               <input name="rm_name" type="hidden" value="<?php echo $roomy_part['room_name']; ?>"  />
                <input name="roomno" type="hidden" value="<?php echo $roomy_part['room_numb']; ?>"  />															                
           
                              
									<label>ARRIVAL</label>
									<input type="date" id="" name="arrival" class="date-selector" placeholder="&#xf073;" />
									<label>RETURN</label>
									<input type="date" id="" name="departure" class="date-selector" placeholder="&#xf073;" />
									<div class="pull-left children clearfix">
										<label>ROOMS NO.</label>
                                        <input type="text" value="<?php echo $roomy_part["room_numb"]; ?>" name="roomno"  readonly >
										<!--<select name="rooms" class="pretty-select">
											<option selected="selected" value="1" >1</option>
											<option value="2">2</option>
											<option value="3">3</option>			
											<option value="4">4</option>
											<option value="5">5</option>
										</select>-->
									</div>
									<div class="pull-left type clearfix">
										<label>ADULT</label>
                                       <input type="text" value="<?php echo $roomy_part["adults"]; ?>" name="adult"  readonly >
										<!--<select name="adult" class="pretty-select">
											<option selected="selected" value="1" >1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
									</select>-->
									</div>
									<div class="pull-left rooms clearfix">
										<label>CHILDREN</label>
                                        <input type="text" value="<?php echo $roomy_part["kids"]; ?>" name="kids"  readonly >
										<!--<select name="children" class="pretty-select">
											<option selected="selected" value="0" >0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>-->
									</div>
									<div class="pull-left search-button clearfix">
                                    <!--<div class="pull-left"><h4>89$<span class="room-bottom-time">/ Day</span></h4></div>-->
								<br /><div class="pull-left">
                                <?php if(logged_in()){ ?> 
									 <input style="background-color: #F90;" type="submit" name="submit" value="Submit">
                                     <?php } else { ?>
                                     <div class="button-style-1">
                                    
										<a href="login.php">Login to Book</a>
									</div>
                                     <?php } ?>
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
    <div class="about-title pos-center" "><a href="#"><h3>YOU MAY ALSO LIKE </h3></a></div>
				
								<hr>
							</div>
							<div class="flexslider" <?php //echo $cat_part['cat_name'];?>>
								<ul class="slides" style="padding-left:130px;>
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
//$cd = $_GET['cat_id'];
//$rms = $_GET['roomid'];
$results = $connection->query("SELECT * FROM categorytbl WHERE cat_status=1 ORDER BY cat_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.

//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
								
													
		<?php /*?>	 <?php 
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
								<a href=""><li> 
                                    <div class="slider-textbox clearfix">
						<div class="container">
							<div class="row">
                    			<div class="slider-bar pull-left"><a style="color:#FFF;" href="rooms.php?catid=<?php echo $row["cat_id"]; ?>"><?php echo $row['cat_name'];?></a></div>
                    			<div class="slider-triangle pull-left"></div>
							</div>
						</div>
						<div class="container">
							<div class="row">
                    			<div class="slider-bar-under pull-left" ><a style="color:#FFF;" href=""><?php echo $row['cat_description'];?></a></div>
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