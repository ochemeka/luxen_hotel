<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include('includes/ps_pagination1.php');?>
<?php include("includes/header3.php"); ?>
<?php 

$member = get_user_id($_SESSION['username']);
	$member_part = mysql_fetch_array($member);

$roomy = get_room1($_GET['roomid']);
$roomy_part = mysql_fetch_array($roomy);

 ?>
 <?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";
															
		$required_fields = array('arrival','return');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("../includes/image_upload_app1.php");
			//if(strlen($db_images) < 3){ $errors[] = "No image upload"; }
			
			if (empty($errors)) {
				// Perform Inssert

				
				$time = mysql_prep($_POST['time']);
				$description = mysql_prep($_POST['description']);
				$phone = mysql_prep($_POST['phone']);
				$no_stay = mysql_prep($_POST['no_stay']);
				$price = mysql_prep($_POST['price']);
				$roomid = mysql_prep($_POST['roomid']);
				$arrival = mysql_prep($_POST['arrival']);
				$return = mysql_prep($_POST['return']);
				$roomno = mysql_prep($_POST['roomno']);
				$adult = mysql_prep($_POST['adult']);
				$kids = mysql_prep($_POST['kids']);
				
				$arr_explode = explode('-',$arrival);
				$dept_explode = explode('-',$return);
				$arrival = $arr_explode[0]."-".$arr_explode[1]."-".$arr_explode[2];
				$return =$dept_explode[0]."-".$dept_explode[1]."-".$dept_explode[2];
				$difference  = timeDiff($arrival,$return);
				$days = abs(floor($difference/86400));
				
				$totalamount = $price*$day;        
		
		$query = "INSERT INTO bookingtbl (
				checkindate, checkout, booking_description, amount, totalamount, no_stay, phone, room_id, no_room, no_adult, no_child, time
				) VALUES (
	'{$arrival}', '{$return}', '{$description}', '{$price}', '{$totalamount}', '{$days}', '{$phone}', '{$roomid}', '{$roomno}', '{$adult}', '{$kids}', '{$time}')";
		$result = mysql_query($query, $connection);
		if ($result) {
			// Success!
			echo "<script type='text/javascript'>alert('Booking created successfully !')</script>";
			redirect_to('myreservation.php');
		} else {
			// Display error message.
			echo "<p>Booking creation failed.</p>";
			echo "<p>" . mysql_error() . "</p>";
		}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?>

		<h1 style="color:#FFFFFF" ><?php echo $post['room_name'];?></h1>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
       <div class="row">
       <br /><br /><br />
        <div class="col-lg-12">
    <div class="about-title pos-center"><p><h3>ROOM DESCRIPTION</h3></p>All Executive rooms are equipt with a personal safe, mini-bar, Working desk.
    </div>
    </div></div>
    
				<div class="col-lg-9"><!-- Room Gallery Slider -->
					<div class="room-gallery">
						<div class="margint40 marginb20"><!--<h4>PHOTO GALLERY</h4>--></div>
						<div class="flexslider-thumb falsenav">
							<ul class="slides">
                             <?php
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
			?>
            
            <?php 
														$img_url = $post["room_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?> 
		<li data-thumb="<?php echo SITE_PATH ?>uploads/<?php echo $img_url1;  ?>" style="width:900px; height:500px;"><img style="width:900px; height:500px;" alt="<?php echo $post['room_name'];?>" class="img-responsive" src="<?php echo SITE_PATH ?>uploads/<?php echo $img_url1;  ?>" />	 </li><?php } } ?>
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
							<h4>SERVICES</h4>
							<ul class="room-services">
								<!--<li><i class="fa fa-calendar"></i> CALENDAR </li>-->
								<li><i class="fa fa-wifi"></i> 500MB WI-FI/DAY </li>
								<li><i class="fa fa-home"></i> 2 BALCONIES </li>
								<li><i class="fa fa-user"></i> 2 ADULTS </li>
                                <li><i class="fa fa-child"></i> 2 KIDS </li>
                                <li><i class="fa fa-bed"></i> 2 BEDS </li>
                                
								<li><i class="fa fa-clock-o"></i> 7/24 ROOM SERVICE </li>
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
								<h5>QUICK RESERVATIONS</h5>
								<div class="line"></div>
							</div>
							<div class="reserve-form-area">										
				<form method="post" action="" enctype="multipart/form-data" id="ajax-reservation-form">
                  <input type="hidden" class="form-control"  value="<?php echo time(); ?>" name="time">
                  <input type="hidden" class="form-control"  value="<?php echo $roomy_part["description"]; ?>; ?>" name="description">
             <input type="hidden" class="form-control"  value="<?php echo $member_part["phone"]; ?>; ?>" name="phone">
              <input type="hidden" class="form-control"  value="<?php echo $roomy_part["price"]; ?>; ?>" name="price">
           <input type="hidden" class="form-control"  value="<?php echo $roomy_part["room_id"]; ?>; ?>" name="roomid">                   
									<label>ARRIVAL</label>
									<input type="text" id="dpd1" name="arrival" class="date-selector" placeholder="&#xf073;" />
									<label>RETURN</label>
									<input type="text" id="dpd2" name="return" class="date-selector" placeholder="&#xf073;" />
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
    <div class="about-title pos-center" "><a href="#"><h3>RELATED CATEGORY</h3></a></div>
				
								<hr>
							</div>
							<div class="flexslider" <?php //echo $cat_part['cat_name'];?>>
								<ul class="slides" style="padding-left:130px;>
								
													
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
									<a href="services.php?cat=<?php echo $post['cat_id'];?>"><li> 
                                    <div class="slider-textbox clearfix">
						<div class="container">
							<div class="row">
                    			<div class="slider-bar pull-left"><?php echo $post['cat_name'];?></div>
                    			<div class="slider-triangle pull-left"></div>
							</div>
						</div>
						<div class="container">
							<div class="row">
                    			<div class="slider-bar-under pull-left"><?php echo $post['cat_description'];?></div>
                    			<div class="slider-triangle-under pull-left"></div>
							</div>
						</div>
					</div>
									<?php 
														$img_url = $post["cat_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
				<img style="width:900px; height:350px;" alt="<?php echo $post['room_name'];?>" class="img-responsive" src="<?php echo SITE_PATH ?>uploads/<?php echo $img_url1;  ?>" />	</a> </li><?php } } ?>
								<?php } ?>
								</ul>
							</div>
                            <div class="col-lg-2"><!--thanksksfjdhfcwiejd--></div>
						</div>
    
    
    </div>
  
 <?php include("includes/footer2.php"); ?>