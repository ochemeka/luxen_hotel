 <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard Home</span></a></li>
          
		    <li class="treeview">
              <a href="dashboard"><i class="fa fa-user"></i> <span>Manage Account</span> <i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu">
			  <li><a href="manage_members.php">All Member</a></li>
              <li><a href="manage_booking.php">All Bookings</a></li>
             
				</ul>
            </li>
			
			<li class="treeview">
              <a href="dashboard"><i class="fa fa-user"></i> <span>Manage Slider</span> <i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu">
			  <li><a href="manage_slider.php">AllSlider</a></li>
			  <ul><li><a href="addslider.php">Add Slider</a></li></ul>
			   <li><a href="manage_gallery.php">All Gallery</a></li>
			   <ul><li><a href="addgallery.php">Add Gallery</a></li></ul>
				</ul>
            </li>
			
			<li class="treeview">
              <a href="dashboard"><i class="fa fa-user"></i> <span>Manage Blog</span> <i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu">
			  <li>
			  <li><a href="manage_blog.php">All Blog Post</a></li>
			  <li><a href="addblog.php">Add Blog</a></li>
			 </ul>
            </li>
			
			<li class="treeview">
              <a href="dashboard"><i class="fa fa-user"></i> <span>Manage Category</span> <i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu">
			  <li>
			  <li><a href="manage_category.php">All Category</a></li>
			  <li><a href="addcategory.php">Add Category</a></li>
			  <li><a href="manage_rooms.php">All Rooms</a></li>
			  <li><a href="addrooms.php">Add Rooms</a></li>
			 </ul>
            </li>
			<!--
			 <li class="treeview">
              <a href="dashboard"><i class="fa fa-user"></i> <span>Manage Transactions</span> <i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu">
			  <li><a href="manage_account.php">Manage Accout Details</a></li>
			  <li><a href="manage_history.php">Manage GH</a></li>
			 	</ul>
            </li>-->
			
			
			 <li class="treeview">
              <a href="dashboard"><i class="fa fa-user"></i> <span>Manage Testimonials</span> <i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu">
			  <li><a href="manage_testimony.php">All Testimonials</a></li>
			  <li><a href="addtestimony.php">Add Testimonials</a></li>
               <li><a href="manage_addteam.php">Add Team Member</a></li>
              <li><a href="manage_team.php">Team Member</a></li>
			 	</ul>
            </li>
			
			
		    <li class="treeview"><a href="manage_changepass.php"><i class="fa fa-dashboard"></i> <span>Update Password</span></a></li>
		    <li class="treeview"><a href="logout.php"><i class="fa fa-dashboard"></i> <span>Logout</span></a></li>
		  </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>