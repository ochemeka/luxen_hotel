<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
$pagetitle = "add room";
?><?php include('includes/header.php'); ?>
 <?php admin_logged_in(); ?>

<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			//$required_fields = array('fullname','address','phone','email','gender','dob','password');
			$required_fields = array('cat_id','roomname','roomnum','adults','kids','price','desc');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			include("../includes/image_upload_app1.php");
			if(strlen($db_images) < 7){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				$passport = $db_images;
				$roomname = stripslashes($_REQUEST['roomname']);
				$roomname = mysqli_real_escape_string($connection,$_POST['roomname']);
				$roomnum = stripslashes($_REQUEST['roomnum']);
				$roomnum = mysqli_real_escape_string($connection,$_POST['roomnum']);
				$adults = stripslashes($_REQUEST['adults']);
				$adults = mysqli_real_escape_string($connection,$_POST['adults']);
				$kids = stripslashes($_REQUEST['kids']);
				$kids = mysqli_real_escape_string($connection,$_POST['kids']);
				$price = stripslashes($_REQUEST['price']);
				$price = mysqli_real_escape_string($connection,$_POST['price']);
				$cat_id = stripslashes($_REQUEST['cat_id']);
				$cat_id = mysqli_real_escape_string($connection,$_POST['cat_id']);
				$desc = stripslashes($_REQUEST['desc']);
				$desc = mysqli_real_escape_string($connection,$_POST['desc']);			
				/*
				$cat_id = mysql_prep($_POST['cat_id']);
				$roomname = mysql_prep($_POST['roomname']);
				$roomnum = mysql_prep($_POST['roomnum']);
				$adults = mysql_prep($_POST['adults']);
				$kids = mysql_prep($_POST['kids']);
				$price = mysql_prep($_POST['price']);
				$desc = mysql_prep($_POST['desc']);
                $passport = $db_images;
						*/
				/*$phone = stripslashes($_REQUEST['phone']);
				$password = stripslashes($_REQUEST['password']);
				$password = md5(mysqli_real_escape_string($connection,$_POST['password']));
				$passmail = mysqli_real_escape_string($connection,$_POST['password']);*/
				//$stid = mysql_prep($_GET['pid']);
						//$stid = $_GET['pid'];


					/*"
					*/
				$query =  "INSERT INTO roomtbl (
						cat_id ,room_name,room_numb,room_image,adults ,kids ,price,description
						) VALUES (
							'{$cat_id}', '{$roomname}', '{$roomnum}','{$passport}','{$adults}','{$kids}','{$price}','{$desc}')";
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Room created successfully !')</script>";
					redirect_to('manage_rooms.php');
					
				} else {
					// Display error message.
					echo "<p>Subject creation failed.</p>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?>

<?php /*?><?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";
																
			$required_fields = array('cat_id','roomname','roomnum','adults','kids','price','desc');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			include("../includes/image_upload_app1.php");
			if(strlen($db_images) < 3){ $errors[] = "No image upload"; }
			
			if (empty($errors)) {
				// Perform Inssert

				
				$cat_id = mysql_prep($_POST['cat_id']);
				$roomname = mysql_prep($_POST['roomname']);
				$roomnum = mysql_prep($_POST['roomnum']);
				$adults = mysql_prep($_POST['adults']);
				$kids = mysql_prep($_POST['kids']);
				$price = mysql_prep($_POST['price']);
				$desc = mysql_prep($_POST['desc']);
                $passport = $db_images;
				
				$query = "INSERT INTO roomtbl (
						cat_id ,room_name,room_numb,room_image,adults ,kids ,price,description
						) VALUES (
							'{$cat_id}', '{$roomname}', '{$roomnum}','{$passport}','{$adults}','{$kids}','{$price}','{$desc}')";
				$result = mysql_query($query, $connection);
				if ($result) {
					// Success!
					echo "<script type='text/javascript'>alert('Room created successfully !')</script>";
					redirect_to('manage_rooms.php');
				} else {
					// Display error message.
					echo "<p>Gallery creation failed.</p>";
					echo "<p>" . mysql_error() . "</p>";
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?><?php */?>
      <!-- Left side column. contains the logo and sidebar -->
	<?php include('includes/sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Hotel la Blaze
            <small>Add Rooms</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Rooms</li>
          </ol>
        </section>

       <!-- Main content -->
        <section class="content">
		
		          <!-- Your Page Content Here -->

          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Rooms</h3>
				    <?php if (!empty($message)) {
				echo "<p class=\"message\">" . $message. "</p>";
			} ?><?php
			// output a list of the fields that had errors
			if (!empty($errors)) {
				echo "<p class=\"errors\">";
				echo "Please review the following fields:<br />";
				foreach($errors as $error) {
					echo " - " . $error . "<br />";
				}
				echo "</p>";
			}
			?>	
                </div><!-- /.box-header -->
				
			<form method="post" enctype="multipart/form-data">
			  <div class="box-body"><!-- /.Form Wrapper -->
			 <?php if (!empty($message)) {
				echo "<p class=\"message\">" . $message. "</p>";
			} ?>
					
										 
					 <div class="form-group">
                      <label for="exampleInputEmail1">Category:</label>
					  <!--To select and interrelate room to Category-->
                      <select type="text" class="form-control"  placeholder="Enter Name" name="cat_id">
					  	<option value="0">Select your category</option>
						<?php  													
						$query = "SELECT * from categorytbl order by cat_id";
						$result = mysqli_query($connection,$query);
						while($cat_set=mysqli_fetch_array($result)) {
						echo "<option value=$cat_set[cat_id]>$cat_set[cat_name]</option>";
						}
						?>
					  </select>
                    </div>														
					<!---------------------------------------->
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Room Name:</label>
                        <select type="text" class="form-control"  placeholder="Select Room Name" name="roomname">
                      <option value="0">Select Room</option>
                        <option value="Executive Flex Suite">Executive Flex Suite </option>
                         <option value="Executive Double bed Suite">Executive Double bed Suite </option>
                        <option value="Grand Deluxe Flex Suite ">Grand Deluxe Flex Suite </option>
                         <option value="Grand Double bed Deluxe Suite">Grand Double bed Deluxe Suite</option>
                        <option value="Royal Flex Suite">Royal Flex Suite</option>
                         <option value="Royal Double bed Suite">Royal Double bed Suite</option>
                        <option value="Standard Flex Suite">Standard Flex Suite</option>
                          <option value="Standard Double bed Suite">Standard Double bed Suite</option>
                        </select>
                      
                    </div><br />
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Room Number:</label>
     <!--  <input type="text" class="form-control"  placeholder="Enter Room Name" name="roomnum">-->
                       <select type="text" class="form-control"  placeholder="Enter No. of Adults" name="roomnum">
                      <option value="0">Select Rooms No.</option>
                                    <option value="Ex-101">Ex-101</option>
                                    <option value="Ex-102">Ex-102</option>
                                    <option value="Ex-103">Ex-103</option>
                                    <option value="Ex-104">Ex-104</option>
                                    <option value="Ex-105">Ex-105</option>
                                    <option value="GRND-101">GRND-101</option>
                                  	<option value="GRND-102">GRND-102</option>
                                  	<option value="GRND-103">GRND-103</option>
                                  	<option value="GRND-104">GRND-104</option>
                                  	<option value="GRND-105">GRND-105</option>
                                    <option value="RR-101">RR-101</option>
                                    <option value="RR-102">RR-102</option>
                                    <option value="RR-103">RR-103</option> 
                                    <option value="RR-104">RR-104</option>
   									<option value="RR-105">RR-105</option>
                                  	<option value="LUX-101">LUX-101</option>
                                  	<option value="LUX-102">LUX-102</option>
                                  	<option value="LUX-103">LUX-103</option>
                                  	<option value="LUX-104">LUX-104</option>
                                  	<option value="LUX-105">LUX-105</option>
                                    <option value="STND-101">STND-101</option>
                                  	<option value="STND-102">STND-102</option>
                                  	<option value="STND-103">STND-103</option>
                                  	<option value="STND-104">STND-104</option>
                                  	<option value="STND-105">STND-105</option>                                 
                                    </select>              
                      
                      
                    </div>
					
					 <div class="form-group">
							<label for="exampleInputEmail1">Room Image:(1024x767)</label>
							<input name="file_1" type="file" width="1024" height="767" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" width="1024" height="767" value="go" />
                   </div>					
					 
                     
					 <div class="form-group">
							<label for="exampleInputEmail1">Room Image:(1024x767)</label>
							<input name="file_1" type="file" width="1024" height="767" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" width="1024" height="767" value="go" />
                   </div>					
					 
                     
					<!-- <div class="form-group">
							<label for="exampleInputEmail1">Room Image:(1024x767)</label>
							<input name="file_1" type="file" width="1024" height="767" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" width="1024" height="767" value="go" />
                   </div>					
					 -->
                     
                     
					 <div class="form-group">
                      <label for="exampleInputEmail1">Adults</label>
                      <select type="text" class="form-control"  placeholder="Enter No. of Adults" name="adults">
                      <option value="0">Select No of Adults</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    </select>
                    </div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Kids</label>
                       <select type="text" class="form-control"  placeholder="Enter No. of Kids" name="kids">
                      <option value="0">Select No of Kids</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    </select>
                    </div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                     
                     <select type="text" class="form-control"  placeholder="Select Price" name="price">
                      <option value="0">Select Price</option>
                                    <option value="$45000">$45000</option>
                                    <option value="$60000">$60000</option>
                                    <option value="$80000">$80000</option>
                                    <option value="$100000">$100000</option>
                                    <option value="$120000">$120000</option>
                                    <option value="$150000">$150000</option>
                                    </select>
                    </div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control"  placeholder="Enter Name" name="desc">
                    </div>
					
							
			   <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Plan Amount:</label>
                      <input type="text" class="form-control"  placeholder="Enter Amount" name="planamt">
                    </div>
                   
			    <div class="form-group">
                      <label for="exampleInputEmail1">Payout Amount:</label>
                      <input type="text" class="form-control"  placeholder="Payout Amount" name="payoutamt">
                    </div>
					   
				
				<div class="form-group">
                      <label for="exampleInputEmail1">Admin FEE:</label>
                      <input type="text" class="form-control"  placeholder="Admin Fee" name="admin_fee">
                    </div>
									   
                   
<div class="form-group">
                      <label for="exampleInputEmail1">Referral FEE:</label>
                      <input type="text" class="form-control"  placeholder="Enter Referral Fee" name="referral_fee">
                    </div>-->	
				</div>	
								  
              </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </div>
			 </form>
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
		
		
		
		</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>