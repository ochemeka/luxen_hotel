<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include('../includes/pagination.php'); ?>

<?php
$pagetitle="Manage Rooms";
?>
<?php include('includes/header.php'); 
include("../includes/image_upload_functions.php");						
?>
    <?php admin_logged_in(); 

 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query0 = 	"UPDATE roomtbl SET 
						room_status = 1  
						WHERE room_id  = '$userid'";
			$result0 = mysqli_query($connection,$query0);
			//$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_rooms.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE roomtbl SET 
						room_status = 0   
						WHERE room_id 	 = '$userid'";
			
			$result1 = mysqli_query($connection,$query1);
			//$result1 = mysql_query($query1);
			
			if($result1)
			{ 

redirect_to("manage_rooms.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query1 = 	"UPDATE roomtbl SET 
						room_status = 7    
						WHERE room_id = '$userid'";
			
			$result2 = mysqli_query($connection,$query1);
			//$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("manage_rooms.php?status=asuccess");
}
}
 
 ?>
<?php 
 if (isset($_GET['set'])) {
	// Success!
					$userid =  $_GET['set'];
					$query0 = 	"UPDATE roomtbl SET 
						room_status = 1  
						WHERE room_id = '$userid'";
			$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_rooms.php?status=asuccess");
}
}

if (isset($_GET['unset'])) {
	// Success!
					$userid =  $_GET['unset'];
					$query1 = 	"UPDATE roomtbl SET 
						room_status = 0   
						WHERE room_id = '$userid'";
			$result1 = mysql_query($query1);
			
			if($result1)
			{ 

redirect_to("manage_rooms.php?status=asuccess");
}
}
?>	
    
    
      <!-- Left side column. contains the logo and sidebar -->
	<?php include('includes/sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Hotel la Blaze
            <small>All Rooms</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Room</li>
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
                  <h3 class="box-title">All Rooms</h3>
				  <!------------------------------------------------------------------------------------------->
 <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
													<th>Room_id</th>
                                        			<th>Cat Id</th>
													<th>Room Name</th>
													<th>Room Numb</th>
													<th>Room Image</th>
													<th>Adults</th>
													<th>Kids </th>
													<th>Price </th>
													<th>description</th>
													<th>Room Status</th>
													<!--<th></th>-->
													</tr>
                                            </thead>

                                            <tbody>
	 <?php  
	 $item_per_page      = 1000; //item to display per page
	 $page_url           = "<?php echo ADMIN_PATH ; ?>room";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM roomtbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM roomtbl ORDER BY room_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
"SELECT * 
FROM roomtbl     
ORDER BY room_id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?>
		
		<?php /*?> <?php 
		$sql = "SELECT * 
				FROM roomtbl     
				ORDER BY room_id desc";
		$pager = new PS_Pagination($connection, $sql, 100, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($row = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>
                                                <tr>
												<td><?php echo $row['room_id']; ?></td>
												<td><?php echo $row['cat_id']; ?></td>
												<td><?php echo $row['room_name']; ?></td>
												<td><?php echo $row['room_numb']; ?></td>
												<td><?php 
														$img_url = $row["room_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $row['room_numb']; ?>" height="100" width="100" />
<?php } } ?>
												
												
												
												
												
												
												</td>
												<td><?php echo $row['adults']; ?></td>
												<td><?php echo $row['kids']; ?></td>
												<td><?php echo $row['price']; ?></td>
											<td><?php echo substr($row['description'],0,100); ?></td>
												<td>(<?php if($row['room_status']==1){ ?><a href="manage_rooms.php?disapprove=<?php echo $row['room_id']; ?>" onClick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="manage_rooms.php?approve=<?php echo $row['room_id']; ?>" onClick="return confirm('Are you sure?');">Approve</a><?php } ?> )&nbsp;(<a href="manage_rooms.php?delete=<?php echo $row['room_id']; ?>" onClick="return confirm('Are you sure?');">Delete</a>)&nbsp;<a href="manage_editrooms.php?room=<?php echo $row['room_id']; ?>">Edit</a></td>
												</tr>
	<?php

	 }

?> <?php  echo '<div align="center">';
// We call the pagination function here.
echo paginate($item_per_page, $page_number, $get_total_rows[0], $total_pages, $page_url);
echo '</div>';
	   ?>
											</tbody>
                                        </table>				  
				  
				  
				  
				  
                </div><!-- /.box-header -->
				
		
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

                 
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
		
		
		
		</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>