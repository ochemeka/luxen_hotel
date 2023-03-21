<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include('../includes/pagination.php'); ?>
<?php
$pagetitle="Manage Member";
?>
<?php include('includes/header.php'); ?>

<?php admin_logged_in(); 
	 
 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query = 	"UPDATE newmember_tbl SET 
						status = 1  
						WHERE id 	 = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_members.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE newmember_tbl SET 
						status = 0   
						WHERE id 	 = '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("manage_members.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query2 = 	"UPDATE newmember_tbl SET 
						status = 7    
						WHERE id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("manage_members.php?status=asuccess");
}
}
 
 ?>

<?php /*?> <?php admin_logged_in(); 
 
 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query0 = 	"UPDATE newmember_tbl SET 
						status = 1  
						WHERE id 	 = '$userid'";
			$result = mysqli_query($connection,$query);
			if($result)
			{ 

redirect_to("manage_members.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE newmember_tbl SET 
						status = 0   
						WHERE id 	 = '$userid'";
			$result1 = mysqli_query($connection,$query1);
			
			if($result1)
			{ 

redirect_to("manage_members.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query1 = 	"UPDATE newmember_tbl SET 
						status = 7    
						WHERE id 	 = '$userid'";
			$result2 = mysqli_query($connection,$query2);
			
			if($result2)
			{ 

redirect_to("manage_members.php?status=asuccess");
}
}
 
 ?><?php */?>

<!-- Left side column. contains the logo and sidebar -->
	<?php include('includes/sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Members
            <small>HA</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage Members</a></li>
            <li class="active">Manage Members</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
          
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Members</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Phone</th>
                         <th>Images </th>
                        <th>Address </th>
                        <th>Email</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
	
 <?php  
	 $item_per_page      = 1000; //item to display per page
	 $page_url           = "<?php echo ADMIN_PATH ; ?>manage_member";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM newmember_tbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM newmember_tbl WHERE status !=7 ORDER BY id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
FROM newmember_tbl 
				WHERE status != 7     
				ORDER BY id DESC";
*/

echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?> 

	
	<?php /*?><?php 
		$sql = "SELECT * 
				FROM newmember_tbl 
				WHERE status != 7     
				ORDER BY id DESC";
		$pager = new PS_Pagination($connection, $sql, 40000000, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                         <td>
						 <?php 
														$img_url = $row["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $row['username']; ?>" height="70" width="70" />
<?php } } ?>
											
                         
                         </td>
                        <td><?php echo $row['address']; ?> </td>
                        <td><?php echo $row['email']; ?> (<?php echo $row['temp_pass']; ?>)</td>
                        <td>(<?php if($row['status']==1){ ?><a href="manage_members.php?disapprove=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="manage_members.php?approve=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Approve</a><?php } ?> )&nbsp;(<a href="manage_members.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>)&nbsp;(<a href="manage_edituser.php?pid=<?php echo $row['id']; ?>">Edit</a>)</td>
                      </tr>
					  
					   <?php

	 }

?>		



                      <?php /*if(mysqli_num_rows($rs) < 1){
}else{ 
  
		 }*/
		 echo '<div align="center">';
// We call the pagination function here.
echo paginate($item_per_page, $page_number, $get_total_rows[0], $total_pages, $page_url);
echo '</div>';
		 
	   ?>
					
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>