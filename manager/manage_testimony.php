<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include('../includes/pagination.php'); ?>
<?php
$pagetitle="Manage Testimonial";
?>																	
<?php include('includes/header.php'); ?>

    <?php admin_logged_in(); 


 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query0 = 	"UPDATE testimony SET 
						test_status = 1  
						WHERE test_id 	 = '$userid'";
			$result0 = mysqli_query($connection,$query0);
			//$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_testimony.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE testimony SET 
						test_status = 0   
						WHERE test_id 	 = '$userid'";
			$result1 = mysqli_query($connection,$query1);
			//$result1 = mysql_query($query1);
			
			if($result1)
			{ 

redirect_to("manage_testimony.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query1 = 	"UPDATE testimony SET 
						test_status = 7    
						WHERE test_id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query1);
			//$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("manage_testimony.php?status=asuccess");
}
}
 
 ?>
<?php 
 if (isset($_GET['set'])) {
	// Success!
					$userid =  $_GET['set'];
					$query0 = 	"UPDATE testimony SET 
						test_status = 1  
						WHERE test_id	 = '$userid'";
			$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_testimony.php?status=asuccess");
}
}

if (isset($_GET['unset'])) {
	// Success!
					$userid =  $_GET['unset'];
					$query1 = 	"UPDATE testimony SET 
						test_status = 0   
						WHERE test_id	 = '$userid'";
			$result1 = mysql_query($query1);
			
			if($result1)
			{ 

redirect_to("manage_testimony.php?status=asuccess");
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
            Manage Testimony
            <small>Testimony</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Sales</a></li>
            <li class="active">Manage Testimony</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
          
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Testimonies</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <!-------------------------------------------------------------------------->
				
                                        <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
													<th>Fullname</th>
													<th> Images  </th>
													<th>City</th>
													<th>Test Description</th>
													<th>Test_Status</th> 
													<th></th>
													                 
												 </tr>
                                            </thead>		

                                            <tbody>
		
		 <?php  
	 $item_per_page      = 1000; //item to display per page
	 $page_url           = "<?php echo ADMIN_PATH ; ?>testimony";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM testimony "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM testimony ORDER BY test_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
"SELECT * 
				FROM testimony     
				ORDER BY test_id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?>
		<?php /*?> <?php 
		$sql = "SELECT * 
				FROM testimony     
				ORDER BY test_id desc";
		$pager = new PS_Pagination($connection, $sql, 100, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>																								
                                                <tr>
												<td><?php echo $row['test_id']; ?></td>
												<td><?php echo $row['fullname']; ?></td>
												<td>
												<?php echo $row['image']; ?>
																									
												</td>
												<td><?php echo $row['test_city']; ?></td>
												<td><?php echo substr($row['test_description'],0,100); ?></td>
												<td>(<?php if($row['test_status']==1){ ?><a href="manage_testimony.php?disapprove=<?php echo $row['test_id']; ?>" onClick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="manage_testimony.php?approve=<?php echo $row['test_id']; ?>" onClick="return confirm('Are you sure?');">Approve</a><?php } ?> )&nbsp;(<a href="manage_testimony.php?delete=<?php echo $row['test_id']; ?>" onClick="return confirm('Are you sure?');">Delete</a>)&nbsp;<a href="manage_edittestimony.php?testimony=<?php echo $row['test_id']; ?>">Edit</a></td>
												</tr>
	<?php

	 }

?>  <?php  echo '<div align="center">';
// We call the pagination function here.
echo paginate($item_per_page, $page_number, $get_total_rows[0], $total_pages, $page_url);
echo '</div>';
	   ?>
												</tbody>
                                        </table>
				<!---------------------------------------------------------------------------->
				
                   
                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>