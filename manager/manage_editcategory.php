<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include('../includes/pagination.php'); ?>

<?php
$pagetitle="Manage_Editcategory";
?>
<?php include('includes/header.php'); 
include("../includes/image_upload_functions.php");

$cat = get_categoryad($_GET["cat"]);
$cat_part = mysqli_fetch_array($cat);

?>

    <?php admin_logged_in(); ?>
<?php include('includes/sidebar.php'); ?>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Category Edit</h2>

<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			//$required_fields = array('fullname','address','phone','email','gender','dob','password');
			$required_fields = array('title','cat_description');
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
				$cat_description = stripslashes($_REQUEST['cat_description']);
				$cat_description = mysqli_real_escape_string($connection,$_POST['cat_description']);
				//$bloguploadedby = stripslashes($_REQUEST['bloguploadedby']);
				//$bloguploadedby = mysqli_real_escape_string($connection,$_POST['bloguploadedby']);
				$id = $_GET["cat"];
				
				/*
				
				$title = mysql_prep($_POST['title']);
                $cat_description = mysql_prep($_POST['cat_description']); 
						$id = $_GET["cat"];

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


					/*"UPDATE blogtbl SET 
						 blogtitle  = '{$title }',
						blogimage = '{$passport}',
						blogcontent = '{$blogcontent}',
						bloguploadedby = '{$bloguploadedby}',
						time = '{$time}'
						WHERE blogid = '{$id}'
					*/
				$query = 	"UPDATE categorytbl SET 
						 cat_name  = '{$title }',
						cat_image = '{$passport}',
						cat_description = '{$cat_description}'
						WHERE cat_id = '{$id}'
						";	
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Updating Editcategory Successfull !')</script>";			
				redirect_to('manage_category.php');
					
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
                  <h3 class="box-title">Manage Category Edit </h3>
				                  </div><!-- /.box-header --><br>

			  <div class="box-body"><!-- /.Form Wrapper -->
<form method="post" action="manage_editcategory.php?cat=<?php echo $_GET["cat"]; ?>" enctype="multipart/form-data">

<?php /*?> <input class="form-control"  type="hidden" value="<?php echo time() ; ?>" name="time">	<?php */?>

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
					    <label for="exampleInputEmail1">Cat Name:</label>
                          <input type="text" value="<?php echo $cat_part['cat_name'];?>" class="form-control" id="field-1" name="title">
                               </div>
                          							               
	                         <div class="form-group">
							 <?php echo $cat_part['cat_description'];?><br />				
                             <label for="exampleInputEmail1">Cat Description</label>
	 <input class="form-control" value=" <?php echo $cat_part['cat_description'];?>" placeholder="Enter New Address" typearea ="text" name="cat_description">						
 						
                                                </textarea><br>
                                            </div>
					
							
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
														$img_url = $cat_part["cat_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $cat_part['cat_name']; ?>" height="100" width="100" />
<?php } } ?>   
						</div>
						
				  <div class="row">
                   
						<div class="col-xs-4">
						 <label for="exampleInputEmail1">Select Image:</label>
						 <input name="file_1" type="file" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
						
											
						 <input name="file_2" type="file" class="form-control" id="file_2"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
						
					
						 <input name="file_3" type="file" class="form-control" id="file_3"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
								
                                          
						 <input name="file_4" type="file" class="form-control" id="file_4"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
						
						 <input name="file_5" type="file" class="form-control" id="file_5"/>
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