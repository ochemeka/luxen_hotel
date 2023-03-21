<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include('../includes/pagination.php'); ?>

<?php
$pagetitle="Manage_editroom";
?>
<?php include('includes/header.php'); 
include("../includes/image_upload_functions.php");


$room = get_roomad($_GET['room']);
$room_part = mysqli_fetch_array($room);
?>
    <?php admin_logged_in(); ?>
<?php include('includes/sidebar.php'); ?>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Basic Info</h2>


<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			//$required_fields = array('fullname','address','phone','email','gender','dob','password');
			$required_fields = array('room_name','room_numb','adults','kids','price','description');
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
				$room_name = stripslashes($_REQUEST['room_name']);
				$room_name = mysqli_real_escape_string($connection,$_POST['room_name']);
				$room_numb = stripslashes($_REQUEST['room_numb']);
				$room_numb = mysqli_real_escape_string($connection,$_POST['room_numb']);
				$adults = stripslashes($_REQUEST['adults']);
				$adults = mysqli_real_escape_string($connection,$_POST['adults']);
				$kids = stripslashes($_REQUEST['kids']);
				$kids = mysqli_real_escape_string($connection,$_POST['kids']);
				$price = stripslashes($_REQUEST['price']);
				$price = mysqli_real_escape_string($connection,$_POST['price']);
				$description = stripslashes($_REQUEST['description']);
				$description = mysqli_real_escape_string($connection,$_POST['description']);
				$id = $_GET['room'];
				
				/*
				$passport = $db_images;
				$room_name = mysql_prep($_POST['room_name']);
				$room_numb = mysql_prep($_POST['room_numb']);
				$adults = mysql_prep($_POST['adults']);
                $kids = mysql_prep($_POST['kids']); 
				$price = mysql_prep($_POST['price']); 
				$description = mysql_prep($_POST['description']); 
				//$time = mysql_prep($_POST['time']); 
						$id = $_GET['room'];

						*/
				/*$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$dob = stripslashes($_REQUEST['dob']);
				$dob = mysqli_real_escape_string($connection,$_POST['dob']);
				$password = stripslashes($_REQUEST['password']);
				$password = md5(mysqli_real_escape_string($connection,$_POST['password']));
				$passmail = mysqli_real_escape_string($connection,$_POST['password']);*/
				//$stid = mysql_prep($_GET['pid']);
						//$stid = $_GET['pid'];


					/*
					'
						
					*/
				$query = 	"UPDATE roomtbl SET 
						 room_name  = '{$room_name }',
						room_image = '{$passport}',
						room_numb = '{$room_numb}',
						adults = '{$adults}',
						kids = '{$kids}',
						price = '{$price}',
						description = '{$description}'
						WHERE room_id = '{$id}'
						";	
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Room Successfully Updated !')</script>";			
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



      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Hotel la Blaze <small></small>          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> </li>
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
                  <h3 class="box-title">Manage Edit Room </h3>
				                  </div><!-- /.box-header --><br>
<?php 
//$showstudent = get_userid($_GET["pid"]);
//$get_student = mysql_fetch_array($showstudent);
?>
			  <div class="box-body"><!-- /.Form Wrapper -->
<form method="post" action="manage_editrooms.php?room=<?php echo $_GET["room"]; ?>" enctype="multipart/form-data">
 <input class="form-control"  type="hidden" value="<?php echo time() ; ?>" name="time">	

                        <!--    </header>-->
                            <div class="form-group">
							
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
                            
                            
                          <div class="col-xs-6">
                            <label for="exampleInputEmail1">Room Name:</label>
   <!-- <input class="form-control" placeholder="<?php echo $room_part['room_name'];?>" typearea ="text" name="room_name">-->			
                            
                      <select type="text" class="form-control"  placeholder="Select Room Name" name="room_name">
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
                            </textarea>
                            
                            </div>
                           <div class="col-xs-6">		
                            <label for="exampleInputEmail1">Room No.</label>
<!--input class="form-control" placeholder=" " typearea ="text" name="room_numb"value="<?php //echo $get_student['room_numb']; ?>-->
                             <select type="text" class="form-control"  placeholder="Enter Room No." name="room_numb">
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
                            
                           <div class="col-xs-6">
                            <label for="exampleInputEmail1">Adults</label>
                             <select type="text" class="form-control"  placeholder="Enter No. of Adults" name="adults">
                      <option value="0">Select No of Adults</option>
                                   <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    </select>
                            </div>
                            
                            <div class="col-xs-6">
                            <label for="exampleInputEmail1">Kids</label>
                             <select type="text" class="form-control"  placeholder="Enter No. of Kids" name="kids">
                      <option value="0">Select No of Kids</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    </select>						
                            </div>
                            
                            <div class="col-xs-6">
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
                            
                             
                            <div class="col-xs-6">
                            <label for="exampleInputEmail1">Room description</label>
                            <input class="form-control" placeholder="Enter Description" value=" <?php echo $room_part['description'];?>" typearea ="text" name="description">						
                            </textarea>
                            </div>
                           
                            
                            
                            <!--					
                            <div class="col-xs-6">
                            <label for="exampleInputEmail1">Address:</label>
                            <input class="form-control" placeholder="Enter New Address" type="text" name="address" value="<?php // echo $get_student['address']; ?>">
                            </div>				
                            -->
                            
                            
                            <div class="row">
                            
                           <div class="col-xs-6">
                            <label for="exampleInputEmail1">Current Image:</label><br />
                            <?php 
                            $img_url = $room_part["room_image"];
                            $img_arr = explode(',', $img_url);
                            foreach($img_arr as $img_url1)		
                            {
                            ?>
                            
                            <?php  if(strlen($img_url1)>4){  ?>
                            <img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $room_part['room_name']; ?>" height="100" width="200" />
                            <?php } } ?>   
                            </div>
                            
                            <div class="row">
                            
                            <div class="col-xs-4">
                            <label for="exampleInputEmail1">Select Image:</label>
                            <input name="file_1" type="file" class="form-control" id="file_1"/>
                            <input name="file_go" type="hidden" id="file_go" value="go" />
                            </div>
                             <div class="col-xs-4">
                            <label for="exampleInputEmail1">Select Image:</label>
                            <input name="file_2" type="file" class="form-control" id="file_2"/>
                            <input name="file_go" type="hidden" id="file_go" value="go" />
                            </div>
                             <div class="col-xs-4">
                            <label for="exampleInputEmail1">Select Image:</label>
                            <input name="file_3" type="file" class="form-control" id="file_3"/>
                            <input name="file_go" type="hidden" id="file_go" value="go" />
                            </div>
                            
                            </div>
                            
                            </div>	
								  <br>

				
								  
              </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </div>
              </div><!-- /.box -->
			  </form>
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
		
		
		
		</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>