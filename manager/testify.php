<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include('../includes/ps_pagination1.php'); ?>
<?php
$pagetitle="Manage Testimonial";
?>
<?php include('includes/header.php'); ?>
<?php admin_logged_in(); 
	 
 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query0 = 	"UPDATE testimony SET 
						status = 1  
						WHERE test_id 	 = '$userid'";
			$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_testimony.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE testimony SET 
						status = 0   
						WHERE test_id 	 = '$userid'";
			$result1 = mysql_query($query1);
			
			if($result1)
			{ 

redirect_to("manage_testimony.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query1 = 	"UPDATE testimony SET 
						status = 7    
						WHERE test_id 	 = '$userid'";
			$result2 = mysql_query($query1);
			
			if($result2)
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
            <small>Manage Testimony</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="manage_testimony.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="manage_testimony.php">Manage Testimony</a></li>
            <li class="active">Manage Testimony</li>
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
                 <!-------------------------------------------------------------------------->
				
                                        <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
													<th>Fullname</th>
													<th>City</th>
													<th>Testimony</th>
													<th>Status</th> 
													<th></th>
													                 
												 </tr>
                                            </thead>

                                            <tbody>
											 <?php 
		$sql = "SELECT * 
				FROM testimony
				ORDER BY test_id asc";
		$pager = new PS_Pagination($connection, $sql, 100, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?>
                                                <tr>
													<td><?php echo $post['test_id']; ?></td>
													<td><?php echo $post['fullname']; ?></td>
													<td><?php echo $post['city']; ?></td>
													<td><?php echo $post['description']; ?></td>
													<td><?php echo $post['status']; ?></td>  
													<td>(<?php if($post['status']==1){ ?><a href="manage_testimony.php?disapprove=<?php echo $post['test_id']; ?>" onClick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="manage_testimony.php?approve=<?php echo $post['test_id']; ?>" onClick="return confirm('Are you sure?');">Approve</a><?php } ?> )&nbsp;(<a href="manage_testimony.php?delete=<?php echo $post['test_id']; ?>" onClick="return confirm('Are you sure?');">Delete</a>)</td>
													
												
													
												</tr>
	<?php

	 }

?>                     <?php if(mysql_num_rows($rs) < 1){
}else{ 
  
		 }
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