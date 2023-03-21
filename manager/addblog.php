<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
$pagetitle = "addblog";
?><?php include('includes/header.php'); ?>
 <?php admin_logged_in(); ?>

<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			//$required_fields = array('fullname','address','phone','email','gender','dob','password');
			$required_fields = array('title','content','upload');
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
				$upload = stripslashes($_REQUEST['upload']);
				$upload = mysqli_real_escape_string($connection,$_POST['upload']);
				$time = stripslashes($_REQUEST['time']);
				$time = mysqli_real_escape_string($connection,$_POST['time']);
				
				
				/*$title = mysql_prep($_POST['title']);
				$content = mysql_prep($_POST['content']);
				$upload = mysql_prep($_POST['upload']);
				$time = mysql_prep($_POST['time']);
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
				$query = "INSERT INTO blogtbl (
						blogtitle ,blogimage ,blogcontent, bloguploadedby, time
						) VALUES (
							'{$title}', '{$passport}', '{$content}', '{$upload}', '{$time}')";
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Blog created successfully !')</script>";
					redirect_to('manage_blog.php');
					
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

    
      <!-- Left side column. contains the logo and sidebar -->
	<?php include('includes/sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Hotel la Blaze
            <small>Add Blog</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Blog</li>
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
                  <h3 class="box-title">Add Blog</h3>
				    
                </div><!-- /.box-header -->
				
			<form method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control"  value="<?php echo time(); ?>" name="time">
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
			  <div class="box-body"><!-- /.Form Wrapper -->
			
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Blog Name:</label>
                      <input type="text" class="form-control"  placeholder="Enter Name" name="title">
                    </div>
					
					 <div class="form-group">
							<label for="exampleInputEmail1">Blog Image:</label>
							<input name="file_1" type="file" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
                   </div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Blog Content:</label>
                      <input type="textarea" class="form-control"  placeholder="Enter Blog Content" name="content">
                    </div>
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Blog Uploaded By:</label>
                      <input type="textarea" class="form-control"  placeholder="Enter Blog Content" name="upload">
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