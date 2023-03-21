<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include('../includes/pagination.php'); ?>

<?php
$pagetitle="Manage_Edit Team";
?>
<?php include('includes/header.php'); 
include("../includes/image_upload_functions.php");

//get_allbook($_GET['booking']);
$team = get_team($_GET['team']);
$team_part = mysqli_fetch_array($team);

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
			$required_fields = array('name', 'tdesc');
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
				$name = stripslashes($_REQUEST['name']);
				$name = mysqli_real_escape_string($connection,$_POST['name']);
				$tdesc = stripslashes($_REQUEST['tdesc']);
				$tdesc = mysqli_real_escape_string($connection,$_POST['tdesc']);
				$id = $_GET['team'];
				/*
				$passport = $db_images;
				$name = mysql_prep($_POST['name']);
                $tdesc = mysql_prep($_POST['tdesc']); 
				
				*/
				//$stid = mysql_prep($_GET['pid']);
						


					/*"UPDATE newmember_tbl SET 
							username = '{$username}',
							email = '{$email}',
							phone = '{$phone}',
							address = '{$address}',
							image = '{$passport}'
						WHERE id = {$stid}";
						WHERE  	teamid = '{$id}'
						*/
				$query = 	"UPDATE teamtbl SET 
						 tname  = '{$name }',
						timage = '{$passport}',
						tdesc = '{$tdesc}'
						WHERE  	teamid = '{$id}'
						";	
         
				$result = mysqli_query($connection,$query);
				if ($result) {
				echo "<script type='text/javascript'>alert('Updating Edit Member Successfull !')</script>";			
				redirect_to('manage_team.php');
					
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
															
			$required_fields = array('name', 'tdesc');
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
				$name = mysql_prep($_POST['name']);
                $tdesc = mysql_prep($_POST['tdesc']); 
				

				$query = 	"UPDATE teamtbl SET 
						 tname  = '{$name }',
						timage = '{$passport}',
						tdesc = '{$tdesc}'
						";	
         
				$result = mysql_query($query, $connection);
				if ($result) {
				echo "<script type='text/javascript'>alert('Updating Edit Member Successfull !')</script>";			
				redirect_to('manage_team.php');
					
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
                  <h3 class="box-title">Manage Edit Team </h3>
				                  </div><!-- /.box-header --><br>

			  <div class="box-body"><!-- /.Form Wrapper -->
              
<!-- manage_editblog.php?blog=<?php //echo $_GET["blog"]; ?>    -->         
<form method="post" action="manage_editteam.php?team=<?php echo $_GET["team"]; ?>" enctype="multipart/form-data">

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
					    <label for="exampleInputEmail1">Team Name:</label>
                          <input type="text" value="<?php echo $team_part['tname'];?>" class="form-control" id="field-1" name="name">
                               </div>
                          							               
	                         <div class="form-group">
							 <?php echo $team_part['tdesc'];?><br />				
                             <label for="exampleInputEmail1">Team member Description</label>
	 <input class="form-control" placeholder="Enter New Address" typearea ="text" name="tdesc">						
 						
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
														$img_url = $team_part["timage"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php //echo $team_part['cat_name']; ?>" height="100" width="100" />
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