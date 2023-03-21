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
							
								<h3>SIDEBAR</h3>
								
								<a href="dashboard.php" class="list-group-item">Member Area</a>
								<a href="manage_reservation.php" class="list-group-item">Manage Reservation</a>
								<div class="panel panel-luxen">
									<div class="panel-style">
						<h4><span class="plus-box"><i class="fa fa-angle-down"></i></span> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><strong>Manage Reservation</strong></a></h4>
									</div>
									<div id="collapse2" class="collapse collapse-luxen">
										<div class="padt20">    	
											<a href="book_room.php"><p>book room</p></a>
										</div>
									</div>
								</div>
								<a href="edituser.php" class="list-group-item">Manage Personal Details</a>
								<a href="manage_account_details.php" class="list-group-item">Manage Account Details</a>
								<a href="transaction_history.php" class="list-group-item">Transaction History</a>
								<a href="testimonial.php" class="list-group-item">Testimonial</a>
								<a href="changepassword.php" class="list-group-item">Change Password</a>
								<a href="logout.php" class="list-group-item">Logout</a>
								
</div>
						<div class="col-lg-8">
						<br/ >
								
				<h2> <p>Welcome to your dashboard <?php echo $member_part['username'];?>
				 <p><br></h2>
				
				<?php /*?><p><?php 
				
														$img_url = $member_part["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $row['email']; ?>" height="100" width="100" />
<?php } } ?>   
</p><?php */?>
				 
								</div>
									<div class="col-lg-1"><p><?php 
														$img_url = $member_part["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<img src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" alt="<?php echo $row['email']; ?>" height="100" width="100" />
<?php } } ?>   
</p>
								
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
							</div>
						</div>
					</div>
				</div>