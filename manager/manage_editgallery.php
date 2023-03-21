<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include('../includes/pagination.php'); ?>

<?php
$pagetitle="Manage_Editgallery";
?>
<?php include('includes/header.php'); 
include("../includes/image_upload_functions.php");


$gallery = get_galleryad($_GET['gallery']);
$gallery_part = mysqli_fetch_array($gallery);

//$gallery = get_gallery1($_GET['gallery']);
//$gallery_part = mysql_fetch_array($gallery);
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
			$required_fields = array('title');
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
				$title = stripslashes($_REQUEST['title']);
				$title = mysqli_real_escape_string($connection,$_POST['title']);
				//$content = stripslashes($_REQUEST['content']);
//				$content = mysqli_real_escape_string($connection,$_POST['content']);
				$id = $_GET['gallery'];
				
				/*$gal_title = mysql_prep($_POST['title']);
//                $content = mysql_prep($_POST['content']); 
						$id = $_GET['gallery'];

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
					*/
				$query = 	"UPDATE gal SET 
						 gal_title  = '{$title }',
						 gal_image = '{$passport}' 
						WHERE gal_id = '{$id}'
						";	
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Updating Editgallery Successfull !')</script>";			
				redirect_to('manage_gallery.php');
					
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

<?php /*?>	<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('title');
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
				$gal_title = mysql_prep($_POST['title']);
//                $content = mysql_prep($_POST['content']); 
						$id = $_GET['gallery'];

				$query = 	"UPDATE gal SET 
						 gal_title  = '{$gal_title }',
						 gal_image = '{$passport}' 
						WHERE gal_id = '{$id}'
						";	
         
				$result = mysql_query($query, $connection);
				if ($result) {
				echo "<script type='text/javascript'>alert('Updating Editgallery Successfull !')</script>";			
				redirect_to('manage_gallery.php');
					
				} else {
					// Display error message.
					echo "<p>Subject creation failed.</p>";
					echo "<p>" . mysql_error() . "</p>";
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?><?php */?>
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
                  <h3 class="box-title">Manage Edit Gallery </h3>
				                  </div><!-- /.box-header --><br>
<?php 
//$showstudent = get_userid($_GET["pid"]);
//$get_student = mysql_fetch_array($showstudent);
?>
			  <div class="box-body"><!-- /.Form Wrapper -->
<form method="post" action="manage_editgallery.php?gallery=<?php echo $_GET["gallery"]; ?>" enctype="multipart/form-data">


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

                                            
                       <div class="form-group">
					    <label for="exampleInputEmail1">Title:</label>
                          <input type="text" value="<?php echo $gallery_part['gal_title'];?>" class="form-control" id="field-1" name="title">
                               </div>
                               
						<!--	               
	                         <div class="form-group">
							 <?php //echo $gallery_part['slide_description'];?><br />
                             <label for="exampleInputEmail1">Slider Description</label>
	 <input class="form-control" placeholder="Enter New Address" typearea ="text" name="content">						
 						
                                                </textarea><br>
                                            </div>
							-->
						<!--					
							<div class="col-xs-6">
						 <label for="exampleInputEmail1">Address:</label>
						  <input class="form-control" placeholder="Enter New Address" type="text" name="address" value="<?php // echo $get_student['address']; ?>">
						</div>				
-->


                                                <div class="row">
                   
						<div class="col-xs-4">
						 <label for="exampleInputEmail1">Current Image:</label><br />
						  <?php 
														$img_url = $gallery_part["gal_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php //echo $row['email']; ?>" height="100" width="100" />
<?php } } ?>   
						</div>
						
				  <div class="row">
                   
						<div class="col-xs-4">
						 <label for="exampleInputEmail1">Select Image:</label>
						 <input name="file_1" type="file" class="form-control" id="file_1"/>
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