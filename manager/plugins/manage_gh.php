<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
include('../includes/image_upload_functions.php');
$pagetitle = "Manage GH";
?><?php include('includes/header.php'); ?>
<?php
include('ps_pagination.php');
?>
 <?php admin_logged_in(); 
 
 if (isset($_GET['approve'])) {
	// Success!
					$userid =  $_GET['approve'];
					$query0 = 	"UPDATE memberstbl SET 
						status = 1  
						WHERE user_id 	 = '$userid'";
			$result0 = mysql_query($query0);
			if($result0)
			{ 

redirect_to("manage_members.php?status=asuccess");
}
}

if (isset($_GET['disapprove'])) {
	// Success!
					$userid =  $_GET['disapprove'];
					$query1 = 	"UPDATE memberstbl SET 
						status = 0   
						WHERE user_id 	 = '$userid'";
			$result1 = mysql_query($query1);
			
			if($result1)
			{ 

redirect_to("manage_members.php?status=asuccess");
}
}

if (isset($_GET['delete'])) {
	// Success!
					$userid =  $_GET['delete'];
					$query1 = 	"UPDATE ha_gh SET 
						status = 7    
						WHERE p_id 	 = '$userid'";
			$result2 = mysql_query($query1);
			
			if($result2)
			{ 

redirect_to("manage_gh.php?status=asuccess");
}
}
//URL APPROVALS/ ADMIN PAYOUT


//EXTEND TIME:

if (isset($_GET['extend'])) {

			$p_id =  $_GET['extend'];

	// Success!
			$time=time();
			$p_id =  $_GET['extend'];
			$query1 = 	"UPDATE ha_pledge SET 
			matchcount = $time    
			WHERE p_id 	 = '$p_id'";
			$result1 = mysql_query($query1);
			if($result1)
			{ 
}
} 
//DELETE PH
if (isset($_GET['adelete'])) {
	   $p_id=$_GET['adelete'];
	   //expired
					$sqlpinupd1 = "UPDATE ha_pledge SET hapayer ='',status = 7 WHERE p_id = '$p_id'" ;
					$resultpinupd1 = mysql_query($sqlpinupd1);
					if($resultpinupd1)
					{ 
																
$query = $db->query("SELECT * FROM ha_gh WHERE l_pid='$p_id' ORDER BY p_id ASC LIMIT 10");
    if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){
	$ha_leg = $row['left_leg'];
	if(!empty($ha_leg)){
																
																$sqlpinupd1 = "UPDATE ha_gh SET l_leg_status =NULL,left_leg=NULL,match_order=0,status = 0 WHERE l_pid = '$p_id'" ;
																$resultpinupd1 = mysql_query($sqlpinupd1);
																if($resultpinupd1)
																{ 
																
																}
				}				
				
				
				
				}}//end loop
				
				
				$query = $db->query("SELECT * FROM ha_gh WHERE r_pid='$p_id' ORDER BY p_id ASC LIMIT 10");
    if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){
	$ha_leg = $row['right_leg'];
	if(!empty($ha_leg)){
																
																$sqlpinupd1 = "UPDATE ha_gh SET r_leg_status =NULL,right_leg=NULL,match_order=0,status = 0 WHERE r_pid = '$p_id'" ;
																$resultpinupd1 = mysql_query($sqlpinupd1);
																if($resultpinupd1)
																{ 
																
																}
				}				
				
				
				
				}}//end loop
																
																}
																
																redirect_to("manage_gh.php?status=asuccess");

																}
?>

<!-- Left side column. contains the logo and sidebar -->
	<?php include('includes/sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage GH
            <small>HA</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Pledges</a></li>
            <li class="active">Manage GH</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
          
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of GH</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>USER</th>
                        <th>PLAN</th>
                        <th>LEFT</th>
                        <th>RIGHT</th>
                        <th>Admin Confirm</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
						<?php 
		$sql = "SELECT * 
				FROM ha_gh   
				WHERE status = 0     
				ORDER BY p_id ASC";
		$pager = new PS_Pagination($connection, $sql, 40000000, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
	

			?>
                      <tr>
                        <td>#<?php echo $post['p_id']; ?> <?php echo $post['username']; 
						$member = get_user_id($post['username']);
	$member_part = mysql_fetch_array($member);
						?> <br>
(<?php echo $member_part['fname']; ?>)
						
						
						</td>
                        <td><?php 
						$plan = get_plan2($post['planid']);
	$plan_part = mysql_fetch_array($plan);
						
						echo $plan_part['planname']; ?>,N<?php echo $plan_part['payoutamt']; ?></td>
                        <td>
                                <!-- /////////////////////////////////////////////End Table Hover -->
						
						<?php
						///////////////ADMIN LEFT////////////////////////////////////////////////////////////////////////////
						
	if(!empty($post['left_leg'])){
				
	$plan = get_plan2($post['planid']);
	$plan_part = mysql_fetch_array($plan);
	$ha_pledge_part = get_user_id($post['left_leg']);
	$ha_row = mysql_fetch_array($ha_pledge_part);
	$ha_pledge = ha_pledge($post['l_pid']);
	$pledge_row = mysql_fetch_array($ha_pledge);
								?>
								<strong style="font-size:16px; color: #009933;">Fund Pledge of &#8358;<?php echo $plan_part['payoutamt']; ?> <br>
from <?php echo $ha_row['fname']; ?> (<?php echo $ha_row['phone']; ?>):</strong><br>

                               
										  <?php if($pledge_row['m_confirm']==0){ 
										  ?>
										  <?php if(strlen($pledge_row['img_scan'])>1){ 
											  ?>
						<?php $img_arr = explode(',', $pledge_row["img_scan"]);
						$x=0;
						foreach($img_arr as $img_url1)
						{ 
						
						$x++;
						?>

<?php  if(strlen($img_url1)>4){ ?>		
			Confirmation: <a href="<?php echo SITE_PATH."uploads/".$img_url1; ?>" target="_blank">View Proof</a>  > <?php if($ha_row['m_confirm']==1){ 
										  ?><?php }else{ ?>Awaiting User to Confirm <?php } ?>
										  <hr />
												
	<?php } } ?>									
											  
											  <?php
											  }else{
											  //No Proof Uploaded
											  ?>
											  Waiting For User to Make Payment > 	 
											 
 <?php } ?>
											   
										  
										  <?php
										   }else{ 
										   ////////PAYMENT CONFIRMED, SHOW IMAGE			  
										   ?>
								<?php if(strlen($pledge_row['img_scan'])>1){ 
											  ?>
						<?php $img_arr = explode(',', $pledge_row["img_scan"]);
						$x=0;
						foreach($img_arr as $img_url1)
						{ 
						
						$x++;
						?>

<?php  if(strlen($img_url1)>4){ ?>		
			Confirmation: <a href="<?php echo SITE_PATH."uploads/".$img_url1; ?>" target="_blank">View Proof</a>  >	 You Have Confirmed this Payment	  
										  
		<?php } }}?>							
										   <?php 
										   } 
										   
										   
										   
?>
										 
                                <!-- /////////////////////////////////////////////End Table Hover -->
								
						
						  <br>
 (<a href="manage_gh.php?adelete=<?php echo $pledge_row['p_id']; ?>" onclick="return confirm('Are you sure?');">Delete PH</a>)
<?php }////CLOSE IF STATEMENT ?>
						</td>
                        <td>
						                                <!-- /////////////////////////////////////////////End Table Hover -->
						
						<?php
						///////////////ADMIN RIGHT////////////////////////////////////////////////////////////////////////////
						
	if(!empty($post['right_leg'])){
				
	$plan = get_plan2($post['planid']);
	$plan_part = mysql_fetch_array($plan);
	$ha_pledge_part = get_user_id($post['right_leg']);
	$ha_row = mysql_fetch_array($ha_pledge_part);
	$ha_pledge = ha_pledge($post['r_pid']);
	$pledge_row = mysql_fetch_array($ha_pledge);
								?>
								<strong style="font-size:16px; color: #009933;">Fund Pledge of &#8358;<?php echo $plan_part['payoutamt']; ?> <br>
from <?php echo $ha_row['fname']; ?> (<?php echo $ha_row['phone']; ?>):</strong><br>

                               
										  <?php if($pledge_row['m_confirm']==0){ 
										  ?>
										  <?php if(strlen($pledge_row['img_scan'])>1){ 
											  ?>
						<?php $img_arr = explode(',', $pledge_row["img_scan"]);
						$x=0;
						foreach($img_arr as $img_url1)
						{ 
						
						$x++;
						?>

<?php  if(strlen($img_url1)>4){ ?>		
			Confirmation: <a href="<?php echo SITE_PATH."uploads/".$img_url1; ?>" target="_blank">View Proof</a>  > <?php if($ha_row['m_confirm']==1){ 
										  ?><?php }else{ ?>Awaiting User Confirmation <?php } ?>
										  <hr />
												
	<?php } } ?>									
											  
											  <?php
											  }else{
											  //No Proof Uploaded
											  ?>
											  Waiting For User to Make Payment > 	
											 
 <?php } ?>
											   
										  
										  <?php
										   }else{ 
										   ////////PAYMENT CONFIRMED, SHOW IMAGE			  
										   ?>
								<?php if(strlen($pledge_row['img_scan'])>1){ 
											  ?>
						<?php $img_arr = explode(',', $pledge_row["img_scan"]);
						$x=0;
						foreach($img_arr as $img_url1)
						{ 
						
						$x++;
						?>

<?php  if(strlen($img_url1)>4){ ?>		
			Confirmation: <a href="<?php echo SITE_PATH."uploads/".$img_url1; ?>" target="_blank">View Proof</a>  >	 You Have Confirmed this Payment	  
										  
		<?php } }}?>							
										   <?php 
										   } 
										   
										   
										
?>
										 		 <br>
 (<a href="manage_gh.php?adelete=<?php echo $pledge_row['p_id']; ?>" onclick="return confirm('Are you sure?');">Delete PH</a>)	<?php }////CLOSE IF STATEMENT ?>
                                <!-- /////////////////////////////////////////////End Table Hover -->
						
						</td>
                        <td>
						<?php if($post['status']==1){ 
											  ?>
											  Confirmed
											  <?php
										   }else{ 
										   ////////PAYMENT CONFIRMED, SHOW IMAGE	
										   echo "PENDING";	
										   
										   }	  
										   ?>
						</td>
                        <td>(<a href="manage_gh.php?delete=<?php echo $post['p_id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>)</td>
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