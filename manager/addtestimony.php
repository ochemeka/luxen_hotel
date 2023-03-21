<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
$pagetitle = "Add Testimony";
?><?php include('includes/header.php'); ?>
 <?php admin_logged_in(); ?>


<?php 

if (isset($_POST['submit'])) {
$errors = array();
//$db_images = "";

			//$required_fields = array('fullname','address','phone','email','gender','dob','password');
			$required_fields = array('title','city','description');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("../includes/image_upload_app1.php");
			//if(strlen($db_images) < 7){ $errors[] = "No image upload"; }

						
			if (empty($errors)) {
				// Perform Inssert
				//$passport = $db_images;
				$title = stripslashes($_REQUEST['title']);
				$title = mysqli_real_escape_string($connection,$_POST['title']);
				$city = stripslashes($_REQUEST['city']);
				$city = mysqli_real_escape_string($connection,$_POST['city']);
				$description = stripslashes($_REQUEST['description']);
				$description = mysqli_real_escape_string($connection,$_POST['description']);
				//$time = stripslashes($_REQUEST['time']);
				//$time = mysqli_real_escape_string($connection,$_POST['time']);
				
				
				/*
				$title = mysql_prep($_POST['title']);
				$city = mysql_prep($_POST['city']);
				$description = mysql_prep($_POST['description']);
						*/
				/*$phone = stripslashes($_REQUEST['phone']);
				$password = stripslashes($_REQUEST['password']);
				$password = md5(mysqli_real_escape_string($connection,$_POST['password']));
				$passmail = mysqli_real_escape_string($connection,$_POST['password']);*/
				//$stid = mysql_prep($_GET['pid']);
						//$stid = $_GET['pid'];


					/*"
					*/
				$query =   "INSERT INTO testimony (
						fullname, test_city , test_description
						) VALUES (
							'{$title}', '{$city}', '{$description}')";
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				
				echo "<script type='text/javascript'>alert('Testimony created successfully !')</script>";
					redirect_to('manage_testimony.php');
					
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
$adm = get_admuser($_SESSION['admuser']); 
	$adm_part = mysql_fetch_array($adm);


if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('title','city','description');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("../includes/image_upload_app1.php");
			//if(strlen($db_images) < 3){ $errors[] = "No image upload"; }
			
			if (empty($errors)) {
				// Perform Inssert

				$title = mysql_prep($_POST['title']);
				$city = mysql_prep($_POST['city']);
				$description = mysql_prep($_POST['description']);
               // $passport = $db_images;
				
				$query = "INSERT INTO testimony (
						fullname, test_city , test_description
						) VALUES (
							'{$title}', '{$city}', '{$description}')";
				
				$result = mysql_query($query, $connection);
				if ($result) {
					// Success!
					echo "<script type='text/javascript'>alert('Testimony created successfully !')</script>";
					redirect_to('manage_testimony.php');
				} else {
					// Display error message.
					echo "<p>Testimony creation failed.</p>";
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
            <small>Add Testimony</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Testimony</li>
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
                  <h3 class="box-title">Add Testimony</h3>
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
			
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Name of Testifier:</label>
                      <input type="text" class="form-control"  placeholder="please enter fullname" value="" name="title">
                    </div>
					
					
							<!-- <div class="form-group">
							<label for="exampleInputEmail1">image:</label>
							<input name="file_1" type="file" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
                   </div>-->
					
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">City:</label>
                      <select type="text" class="form-control"  placeholder="Please Select Your City" name="city">
                       <option value="0">Select City</option>
                            <option value="ABIA STATE">ABIA STATE</option>
                            <option value="ABUJA FCT">ABUJA FCT</option>
                            <option value="ADAMAWA STATE">ADAMAWA STATE</option>
                            <option value="AKWA IBOM STATE">AKWA IBOM STATE</option>
                            <option value="ANAMBRA STATE">ANAMBRA STATE</option>
                            <option value="BAUCHI STATE">BAUCHI STATE</option>
                            <option value="BAYELSA STATE">BAYELSA STATE</option>
                            <option value="BENUE STATE">BENUE STATE</option>
                            <option value="BORNO STATE">BORNO STATE</option>
                            <option value="CROSS RIVER">CROSS RIVER STATE</option>
                            <option value="DELTA STATE">DELTA STATE</option>
                            <option value="EBONYI STATE">EBONYI STATE</option>
                            <option value="EDO STATE">EDO STATE</option>
                            <option value="EKITI STATE">EKITI STATE</option>
                            <option value="ENUGU STATE">ENUGU STATE</option>
                            <option value="GOMBE STATE">GOMBE STATE</option>
                            <option value="IMO STATE">IMO STATE</option>
                            <option value="JIGAWA STATE">JIGAWA STATE</option>
                            <option value="KADUNA STATE">KADUNA STATE</option>
                            <option value="KANO STATE">KANO STATE</option>
                            <option value="KATSINA STATE">KATSINA STATE</option>
                            <option value="KEBBI STATE">KEBBI STATE</option>
                            <option value="KOGI STATE">KOGI STATE</option>
                            <option value="KWARA STATE">KWARA STATE</option>
                            <option value="LAGOS STATE">LAGOS STATE</option>
                            <option value="NASSARAWA STATE">NASSARAWA STATE</option>
                            <option value="NIGER STATE">NIGER STATE</option>
                            <option value="OGUN STATE">OGUN STATE</option>
                            <option value="ONDO STATE">ONDO STATE</option>
                            <option value="OSUN STATE">OSUN STATE</option>
                            <option value="OYO STATE">OYO STATE</option>
                            <option value="PLATEAU STATE">PLATEAU STATE</option>
                            <option value="RIVERS STATE">RIVERS STATE</option>
                            <option value="SOKOTO STATE">SOKOTO STATE</option>
                            <option value="TARABA STATE">TARABA STATE</option>
                            <option value="YOBE STATE">YOBE STATE</option>
                            <option value="ZAMFARA STATE">ZAMFARA STATE</option>
                         </select>
                    </div>
					
										
					 <div class="form-group">
                      <label for="exampleInputEmail1"> Description:</label>
                      <input type="text" class="form-control"  placeholder="Enter description" name="description">
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