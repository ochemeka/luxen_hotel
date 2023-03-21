<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
$pagetitle = "Register New Plan";
?><?php include('includes/header.php'); ?>
 <?php admin_logged_in(); ?>

<?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('planname','planamt','payoutamt','admin_fee','referral_fee');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			if (empty($errors)) {
				// Perform Inssert

				$planname = mysql_prep($_POST['planname']);
                $planamt = mysql_prep($_POST['planamt']);
                $payoutamt = mysql_prep($_POST['payoutamt']);
                $admin_fee = mysql_prep($_POST['admin_fee']);
                $referral_fee = mysql_prep($_POST['referral_fee']);
				
				$query = "INSERT INTO plan (
						planname,planamt,payoutamt,admin_fee,referral_fee
						) VALUES (
							'{$planname}', '{$planamt}','{$payoutamt}','{$admin_fee}','{$referral_fee}')";
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
            <small>Register New Plan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Register New Plan</li>
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
                  <h3 class="box-title">Register New Plan</h3>
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
                      <label for="exampleInputEmail1">Plan Name:</label>
                      <input type="text" class="form-control"  placeholder="Enter Name" name="planname">
                    </div>
                   
			    <div class="form-group">
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