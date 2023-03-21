<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include('../includes/ps_pagination1.php'); ?>

<?php
$pagetitle="Manage Account";
?>
<?php include('includes/header.php'); ?>
    <?php admin_logged_in(); 
	
	 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query0 = 	"UPDATE account SET 
						status = 1  
						WHERE a_id 	 = '$userid'";
			$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_account.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE account SET 
						status = 0   
						WHERE a_id 	 = '$userid'";
			$result1 = mysql_query($query1);
			
			if($result1)
			{ 

redirect_to("manage_account.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query1 = 	"UPDATE account SET 
						status = 7    
						WHERE a_id 	 = '$userid'";
			$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("manage_account.php?status=asuccess");
}
}
 
 ?>
<?php 
 if (isset($_GET['set'])) {
	// Success!
					$userid =  $_GET['set'];
					$query0 = 	"UPDATE account SET 
						status = 1  
						WHERE a_id 	 = '$userid'";
			$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_account.php?status=asuccess");
}
}

if (isset($_GET['unset'])) {
	// Success!
					$userid =  $_GET['unset'];
					$query1 = 	"UPDATE account SET 
						status = 0   
						WHERE a_id 	 = '$userid'";
			$result1 = mysql_query($query1);
			
			if($result1)
			{ 

redirect_to("manage_account.php?status=asuccess");
}
}
?>
<?php include('includes/sidebar.php'); ?>
    
      <!-- Left side column. contains the logo and sidebar -->
		<?php include('includes/sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Hotel la Blaze
            <small>Manage Account Details</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Account Details</li>
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
                  <h3 class="box-title">Manage Account Details</h3>
				  <!------------------------------------------------------------------------------------------->
 <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Blog Id</th>
													<th>Blog Title</th>
													<th>Blog Content</th>
													<th>Blog Image</th>
													<th>Blog Uploaded By</th>
													<th></th>
													</tr>
                                            </thead>

                                            <tbody>
											 <?php 
		$sql = "SELECT * 
				FROM blogtbl     
				ORDER BY blogid desc";
		$pager = new PS_Pagination($connection, $sql, 100, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?>
                                                <tr>
												<td><?php echo $post['blogid']; ?></td>
												<td><?php echo $post['blogtitle']; ?></td>
												<td><?php echo $post['blogimage ']; ?></td>
												<td><?php echo $post['blogcontent ']; ?></td>
												<td><?php echo $post['bloguploadedby ']; ?></td>														
												<td>(<?php if($post['status']==1){ ?><a href="manageslider.php?disapprove=<?php echo $post['id']; ?>" onClick="return confirm('Are you sure?');">Disapprove</a><?php }else{ ?><a href="manageslider.php?approve=<?php echo $post['id']; ?>" onClick="return confirm('Are you sure?');">Approve</a><?php } ?> )&nbsp;(<a href="manageslider.php?delete=<?php echo $post['id']; ?>" onClick="return confirm('Are you sure?');">Delete</a>)&nbsp;<a href="manage_editslider.php?slider=<?php echo $post['id']; ?>">Edit</a></td>
												</tr>
	<?php

	 }

?>  <?php if(mysql_num_rows($rs) < 1){
}else{ 
  
		 }
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