<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
$pagetitle = "Manage Member";
?><?php include('includes/header.php'); ?>
<?php
include('ps_pagination.php');
?>
 <?php admin_logged_in(); 
 
 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query0 = 	"UPDATE withdrawal SET 
						status = 1  
						WHERE id 	 = '$userid'";
			$result0 = mysql_query($query0);
			if($result0)
			{ 
     		$date =  $_GET['time'];
     		$user =  $_GET['user'];
			$userid =  $_GET['approve'];
					$query1 = 	"UPDATE tranx_activity SET 
			tranx_status = 1  
			WHERE tranx_date = '$date' AND tranx_user = '$user'";
			$result1 = mysql_query($query1);
			

redirect_to("manage_withrawals.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE withdrawal SET 
						status = 0  
						WHERE id = '$userid'";
			$result1 = mysql_query($query1);
			
			if($result1)
			{ 

redirect_to("manage_withrawals.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query1 = 	"UPDATE memberstbl SET 
						status = 7    
						WHERE user_id 	 = '$userid'";
			$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("manage_members.php?status=asuccess");
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
            Manage Members
            <small>HA</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Sales</a></li>
            <li class="active">Manage Sales</li>
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
                        <th>Withdrawal Amount</th>
                        <th>Username</th>
                        <th>Comment</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
						<?php 
		$sql = "SELECT * 
				FROM withdrawal  
				WHERE status != 7     
				ORDER BY id DESC";
		$pager = new PS_Pagination($connection, $sql, 40000000, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?>
                      <tr>
                        <td><?php echo $post['amtwithdrw']; ?></td>
                        <td><?php echo $post['username']; ?></td>
                        <td><?php echo $post['comment']; ?></td>
                        <td>(<?php if($post['status']==1){ ?><a href="manage_withrawals.php?disapprove=<?php echo $post['id']; ?>&user=<?php echo $post['username']; ?>&time=<?php echo $post['date']; ?>" onclick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="manage_withrawals.php?approve=<?php echo $post['id']; ?>&user=<?php echo $post['username']; ?>&time=<?php echo $post['date']; ?>" onclick="return confirm('Are you sure?');">Approve</a><?php } ?> )</td>
                      </tr>
					  
					   <?php

	 }

?>		
                      <?php if(mysql_num_rows($rs) < 1){
}else{ 
  
		 }
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