<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php //include('includes/ps_pagination1.php'); 
include('includes/image_upload_functions.php');

?>
<?php
confirm_logged_in();
$pagetitle="Account Dasboard"; 
?>
<?php 
	$members = get_user_id($_SESSION['username']);
	$member_part = mysqli_fetch_array($members);
	
	//$ewallet = get_ewallet_id($_SESSION['username']);
	//$ewallet_part = mysql_fetch_array($ewallet);
	
	//$bookyrcp = get_allbook($_GET['recpt']);
//$bookyrcp_part = mysql_fetch_array($bookyrcp);

	
 ?>
  <?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('title');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			include("includes/image_upload_app.php");
			if(strlen($db_images) < 7){ $errors[] = "No image upload"; }
			
			if (empty($errors)) {
				// Perform Inssert
				$passport = $db_images;
				$title = mysql_prep($_POST['title']);
                $content = mysql_prep($_POST['content']);
						$id = $_SESSION['username'];
				
				$recpt = $_GET['recpt'];
				$query = 	"UPDATE bookingtbl SET 
					receiptdescription  = '{$title}',
						 receiptimage  = '{$passport}'
						WHERE user_id = '{$id}'
						AND book_id = '{$recpt}'
							LIMIT 1
						";	
				$result = mysql_query($query, $connection);
				if ($result) {
					// Success!
					echo "<script type='text/javascript'>alert('receipt summitted successfully !')</script>";
					redirect_to('reservationtb.php');
				} else {
					// Display error message.
					echo "<p>receipt submittion failed.</p>";
					echo "<p>" . mysql_error() . "</p>";
				}

				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			
			


} // end: if (isset($_POST['submit']))
?>

<?php include('includes/header3.php');?>
 <?php include('includes/headsection.php')?>
    <!-- CONTENT AREA -->
    <div class="content-area">
	
								
								<!-- BREADCRUMBS -->
								<!--  <section class="page-section breadcrumbs text-left">
								<div class="container">
								<div class="page-header">
								<h3>Member Dashbaord</h3>
								</div>
								</div>
								</section>-->
								<!-- /BREADCRUMBS -->

		
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
			<div class="row">
				
				 
					<div class="col-lg-3">
							
								<?php include('includes/sidebarindex.php');?>						
</div>
						<div class="col-lg-8">
						<h4>Dear Customer to serve you better, please fill the required field. </h4>
								
				<form method="post" enctype="multipart/form-data"><br />
			<!-- /.Form Wrapper -->
			
					
				
                      <h4 style="color:#000;"><?php print "Description" ;?></h4>
                      <input type="text" class="form-control"  placeholder="Enter Description" name="title">
                   <br />
					
							 
							<h4 style="color:#000;"><?php print "Upload Image" ;?></h4>
							<input name="file_1" type="file" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
<br />

 <div class="box-footer">
                    <button style="float:right" type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </div>


</form>
				 <p><br></h2>
				
				 
								</div>
									<div class="col-lg-1"><p><?php /*?><?php 
														$img_url = $member_part["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $member_part['email']; ?>" height="100" width="100" />
<?php } } ?>   <?php */?>
</p>
								
								</div>
								<!--<div class="col-lg-9">-->
								
								<!--<div id="collapse1" class="collapse collapse-luxen in">
															<div class="padt20">    	
										<p>Consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Lnia bibendum nulla sedr.Aeum dolor sit amet, consectetur</p>-->
									</div>
								</div>
								</div>
							<?php /*?><div class="panel panel-luxen">
								<div class="panel-style">
								<h4><span class="plus-box"><i class="fa fa-angle-down"></i></span> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2">IT'S ACCORDION TAB</a></h4>
								</div>
								<div id="collapse2" class="collapse collapse-luxen">
									<div class="padt20">    	
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo veniam voluptas repudiandae consectetur est doloribus esse maiores commodi minima ut dignissimos suscipit atre soluta beatae quos molestiae quae velit sed dolores commodi sequi tempora autem sint non obcaecati illo aperiam blanditiis laudantium eius magni pariatur officiis!</p>
									</div>
								</div>
							</div>
							<div class="panel panel-luxen">
								<div class="panel-style">
								<h4><span class="plus-box"><i class="fa fa-angle-down"></i></span> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3">MORE INFO IS HERE</a></h4>
								</div>
								<div id="collapse3" class="collapse collapse-luxen">
									<div class="padt20">    	
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing eo non iure culpa adipisci iste suscipit consequuntur ea id quibusdam esse quia voluptates mollitia quasi itaque assumenda vitae optio eaque qui alias dolorum voluptatibus explicabo.</p>
									</div>
								</div><?php */?>
							</div>
						</div>
					</div>
				</div><br />
				
<?php include('includes/footer2.php');?>