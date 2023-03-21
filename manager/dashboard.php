<?php require_once("../includes/session.php"); ?>
<?php 
include('../includes/connection.php');
include('../includes/functions.php');
$pagetitle = "Dashboard";
?><?php include('includes/header.php'); ?>
 <?php admin_logged_in(); ?>

      <!-- Left side column. contains the logo and sidebar -->
	<?php include('includes/sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Hotel la Blaze <small></small>          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->


<div class="row">
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>Users</h3>
                  <p> <?php 
					$users = get_user();
				    $total_users=mysqli_num_rows($users);
					echo  $total_users;
				?>
			
			
			</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="manage_members.php" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>                </a>              </div>
            </div><!-- ./col -->
            <!-- ./col -->
            <!-- ./col -->
</div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    

<?php include('includes/footer.php'); ?>