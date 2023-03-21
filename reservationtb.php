<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php 
include('includes/image_upload_functions.php');

?>
<?php
confirm_logged_in();
$pagetitle="Reservation"; 
?>
<?php 
	$member = get_user_id($_SESSION['username']);
	$member_part = mysqli_fetch_array($member);
	
	 //$ewallet = get_ewallet_id($_SESSION['username']);
	//$ewallet_part = mysql_fetch_array($ewallet);

	

$roomy = get_room();
$roomy_part = mysqli_fetch_array($roomy);

$bookedrm = get_bookedrm();
$bookedrm_part = mysqli_fetch_array($bookedrm);	

 ?>
 <?php
	$order_id = rand(0, 1000);
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
				 <div class="pull-left">
                           
                 <h2 class="box-title">ALL BOOKINGS</h2></div>
				   <!----------------------------------------------------------------------------------------------------------->
				   
				    <table id="example" class="display table table-hover table-condensed" cellspacing="50px;" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>book_id </th>
                                                    <th>Room Name</th>
													<th>Amount</th>
                                                    <th>Room Id</th>
                                                    <th>No Room</th>
                                                    <th>Receipt</th>
			                                          <th>Time</th>
                                                    <th>Status</th>
                                                    <th>Screenshot</th>
                                                    <th></th>
													</tr>
                                            </thead>

<?php  
	 $item_per_page      = 1000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>booking";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM bookingtbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$uid = $_SESSION['username'];
$results = $connection->query("SELECT * FROM bookingtbl WHERE user_id = '$uid' ORDER BY book_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
$uid = $_SESSION['username'];
		$sql = "SELECT * 
				FROM bookingtbl 
				WHERE user_id = '$uid'    
				ORDER BY book_id  desc";
*/
//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>
		
		<?php /*?> <?php
		$uid = $_SESSION['username'];
		$sql = "SELECT * 
				FROM bookingtbl 
				WHERE user_id = '$uid'    
				ORDER BY book_id  desc";
		$pager = new PS_Pagination($connection, $sql, 100, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?>  <?php */?>             
                                                    
                                                     <tr>
												
                                                <td><?php echo $row['book_id']; ?></td>
                                             <td><?php $rm = $row['room_id'];
											 $query = "SELECT * from roomtbl where room_id = '$rm' order by room_id";
											 $result = mysqli_query($connection, $query);
											 $cat_set = mysqli_fetch_array($result);
											 echo $cat_set['room_name'];
											 ?></td>
                                             
                                             
                                                
                                                <td><?php echo $row['amount']; ?></td>
                                                <td><?php echo $row['room_id']; ?></td>
                                                <td><?php echo $row['no_room']; ?></td>
                                                <td><?php 
														$img_url = $row["receiptimage"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $row['receiptdescription']; ?>" height="70" width="70" />
<?php } } ?>
                                                 
												</td>
                                               <td><?php echo timeAgo1(get_date_2a($row['time']));?></td>
                                               	
												<td>   <?php $confirm = $row['pay_confirm']; ?>
                      <?php if ($confirm == 0){ ?>       
                     <p style="color:#F00;">Pending Approval</p>
                       <?php }  elseif ($confirm == 1)  {  ?>   
                          <p style="color: #3C0;">Approved</p>   
                              <?php } ?></td>  
                              <td><a href="receipt.php?recpt=<?php echo $row['book_id']; ?>">Click to upload Receipt Screenshot</a> </td>
                              <td><?php $confirm = $row['pay_confirm']; ?>
                      <?php if ($confirm == 0){ ?>       
                    <a href="process.php?order_id=<?php echo $order_id; ?>&room_id=<?php echo $row['room_id']; ?>&total_amt=<?php echo $row['totalamount']; ?>" <p style="color:#F00;">Pay Now</p></a>
                       <?php }  elseif ($confirm == 1)  {  ?>   
                           <p style="color: #3C0;"><a href="<?php echo SITE_PATH; ?>reserved.php?reserve=<?php echo $row["book_id"]; ?>&roomid=<?php echo $row["room_id"]; ?>">View Reservation</a></p> 
                              <?php } ?> </td>
                            
												</tr>
	<?php

	 }

?> <?php 
$item_per_page      = 1000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>booking";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}
?>
                                            </thead>

                                            <tbody>  
                                        
                                            </tbody>
                                            
                                            </table>
</p>
<br /><!--<a><i class="fa fa-arrow-up"></i></a>-->
<!--<h4 style="color:#000;"><?php //print "Upload Receipt" ;?></h4>
<a style="color:#6C0; float:left;" href="receipt.php">Click here to upload Receipt Screenshot</a>
-->


<?php /*?><form method="post" enctype="multipart/form-data">
			<!-- /.Form Wrapper -->
			
					
					 <div class="form-group">
                      <label for="exampleInputEmail1">Receipt Description:</label>
                      <input type="text" class="form-control"  placeholder="Enter Description" name="description">
                    </div>
					
							
							<label for="exampleInputEmail1">Image:</label>
							<input name="file_1" type="file" class="form-control" id="file_1"/>
							<input name="file_go" type="hidden" id="file_go" value="go" />
                

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </div>
			 </form><?php */?>
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
		
		
                               
                               <!--------------------------------END----------------------------------------->
                               	
								
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
			<br />				
				
<?php include('includes/footer2.php');?>