<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
$pagetitle = "Register New GH";
?><?php include('includes/header.php'); ?>
 <?php admin_logged_in(); ?>

<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('username','plan');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			if (empty($errors)) {
				// Perform Inssert

				$username = mysql_prep($_POST['username']);
                $plan = mysql_prep($_POST['plan']);
			

				
				$query = "INSERT INTO ha_gh (
						username, planid 
						) VALUES (
							'{$username}', '{$plan}')";
				$result = mysql_query($query, $connection);
				if ($result) {
					// Success!
					$message = "Plan Successfully Added";
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
?>
    
      <!-- Left side column. contains the logo and sidebar -->
	<?php include('includes/sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Help Africa
            <small>New GH</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">New GH</li>
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
                  <h3 class="box-title">Create GH Manually</h3>
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
                      <label for="exampleInputEmail1">Username:</label>
                      <input type="text" class="form-control"  placeholder="Enter Username" name="username">
                    </div>
				 <div class="row">
                   
						<div class="col-xs-6">
						 <label>Level of Study</label>
                      <select class="form-control" name="plan">
                      <?php
	  		$cat_set = get_plan1();
			while ($cat = mysql_fetch_array($cat_set)) {
			

        echo "<option value='" . urlencode($cat["p_id"])."'>&#8358;{$cat["planamt"]}</option>";
		
		}?>
                      </select>
						</div>
					   
				
									   
                   
						
					   
                   

	
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