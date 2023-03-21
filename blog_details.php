<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>

<?php include("includes/image_upload_functions.php");
$pagetitle= 'Blog-Details' ; ?>

<?php include("includes/header2.php"); 
$blog = get_blog_id($_GET['blogid']);
$blog_part = mysqli_fetch_array($blog);
?>


<?php
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";

			$required_fields = array('name','subject','email','content','time');
			foreach($required_fields as $fieldname) {
				if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
					$errors[] = $fieldname; 
				}
			}
			//include("includes/image_upload_app.php");
			//if(strlen($db_images) < 7){ $errors[] = "No image upload"; }


				// Perform Inssert
				//$passport = $db_images;
				
				$cmid = $_GET['blogid'];
				$blog = $blog_part["blogid"];
				$subject = stripslashes($_REQUEST['subject']);
				$subject = mysqli_real_escape_string($connection,$_POST['subject']);
				$content = stripslashes($_REQUEST['content']);
				$content = mysqli_real_escape_string($connection,$_POST['content']);
				$name = stripslashes($_REQUEST['name']);
				$name = mysqli_real_escape_string($connection,$_POST['name']);
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$time = stripslashes($_REQUEST['time']);
				$time = mysqli_real_escape_string($connection,$_POST['time']);
				$passport = $db_images;
				//$userid = $member_part['user_id'];
/*				$bus_desc = stripslashes($_REQUEST['bus_desc']);
				$bus_desc = mysqli_real_escape_string($connection,$_POST['bus_desc']);
				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($connection,$_POST['email']);
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($connection,$_POST['password']);
				$hashed_password = md5($password);
				$passmail = mysqli_real_escape_string($connection,$_POST['password']);
				$country = stripslashes($_REQUEST['country']);
				$country = mysqli_real_escape_string($connection,$_POST['country']);
				$state = stripslashes($_REQUEST['state']);
				$state = mysqli_real_escape_string($connection,$_POST['state']);
				$city = stripslashes($_REQUEST['city']);
				$city = mysqli_real_escape_string($connection,$_POST['city']);
				$address = stripslashes($_REQUEST['address']);
				$address = mysqli_real_escape_string($connection,$_POST['address']);
				$gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($connection,$_POST['gender']);
				$phone = stripslashes($_REQUEST['phone']);
				$phone = mysqli_real_escape_string($connection,$_POST['phone']);
				$hash = md5( rand(0,1000) );*/
				//$sortcode ="BOACC-".time();
				//$securecode ="USHSBACVR-".time();
				
				
			if (empty($errors)) {
				// Perform Inssert
				// Check database to see if username and the hashed password exist there.	

				$query1 = "INSERT INTO comment_tbl (
					blogid, name, subject, image, email, content, time
					) VALUES (
						'{$blog}', '{$name}', '{$subject}', '{$passport}', '{$email}', '{$content}', '{$time}')";
							

				$result1 = mysqli_query($connection,$query1);
				if ($result1) {
					
				/*$last_id= mysqli_insert_id($connection);
				$ewallet=100;
				
			$query2 = "INSERT INTO ewallet (
					ebalance, email, user_id
						) VALUES (
							'{$ewallet}', '{$email}', '{$last_id}'
						)";
				$result2 = mysqli_query($connection,$query2);
				if ($result2) {
				}
			else{
			die( mysqli_error($connection) );
			}			
*/
				
/*				
				
 	$to = "{$email}";
	$sitename = SITE_NAME;
	$sitepath = SITE_PATH;
    $subject = $sitename."Signup | Email Confirmation";
//    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers = 'X-Mailer: PHP/' . phpversion() . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= "From: $sitename<support@eventplace.com>";
    $message = "Dear $fullname,\r\n\r\n
	Thank you for registering with us, we appreciate your registration
	with us.
	Your account has been created, you can login with the following credentials after you have activated
	
	--------------------------------
	Username: $email\r\n
	Password: $passmail\r\n<br>
	--------------------------------
	
    Please click this link to activate your account:
	<?php echo SITE_PATH ?>email_verify.php?email='.$email.'&hash='.$hash.' \r\n
	\r\n
	
	Best Regards,\r\n
	\r\n
	$sitename\r\n
    $sitepath\r\n
    ";

    mail($to, $subject, $message, $headers);*/
					// Success!
					//;redirect_to("login.php");
				echo "<script type='text/javascript'>alert('Comment successfully added!')</script>";
				redirect_to("blog_details.php?blogid=$cmid&p=success");
					
					
				} else {
					// Display error message.
					echo "<script type='text/javascript'>alert('Comment creation failed!')</script>";
					echo "<p>" . mysqli_error($connection) . "</p>";
				}
	 
				} 
			else {
				// Errors occurred
				$message = "There were " . count($errors) . " errors in the form.";
			}
			

} // end: if (isset($_POST['submit']))
 ?>  
<?php /*?><?php 
if (isset($_POST['submit'])) {
$errors = array();
$db_images = "";
																		
		$required_fields = array('name','subject','email','content','time');
		foreach($required_fields as $fieldname) {
			if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
				$errors[] = $fieldname; 
			}
		}
		include("includes/image_upload_app.php");
		if(strlen($db_images) < 3){ $errors[] = "No image upload"; }
		
		if (empty($errors)) {
			// Perform Inssert
			$cmid = $_GET['blogid'];
			$blog = $blog_part["blogid"];
			$name = mysql_prep($_POST['name']);
			$subject = mysql_prep($_POST['subject']);
			$email = mysql_prep($_POST['email']);
			$content = mysql_prep($_POST['content']);
			$time = mysql_prep($_POST['time']);
			$passport = $db_images;
			
			$query = "INSERT INTO comment_tbl (
					blogid, name, subject, image, email, content, time
					) VALUES (
						'{$blog}', '{$name}', '{$subject}', '{$passport}', '{$email}', '{$content}', '{$time}')";
			$result = mysql_query($query, $connection);
			if ($result) {
				// Success!
				echo "<script type='text/javascript'>alert('Comment successfully Updated!')</script>";
				redirect_to("blog_details.php?blogid=$cmid&p=success");
			} else {
				// Display error message.
				echo "<p>Comment creation failed.</p>";
				echo "<p>" . mysql_error() . "</p>";
			}

			} 
		else {
			// Errors occurred
			$message = "There were " . count($errors) . " errors in the form.";
		}
		
		


} // end: if (isset($_POST['submit']))
?><?php */?>       

		<h1 style="color:#FFFFFF";>BLOG DETAILS</h1>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
			<div class="row">
				 <div class="col-lg-9 col-sm-8 blog-post-contents">
             <div class="blog-post"><!-- Blog Post -->
                        <h3><a href="#"><?php echo $blog_part["blogtitle"];?></a></h3>
						<div class="post-materials  clearfix">
                            <ul>                                
                            	<li><h6><a href="#"><i class="fa fa-calendar"></i> <?php echo timeAgo1(get_date_2a($blog_part['time']));?></a></h6></li>
                                <li><h6><a href="#"><i class="fa fa-user"></i><?php echo $blog_part["bloguploadedby"];?></a></h6></li>
                                <li><h6><a href="#"><i class="fa fa-comments"></i><?php  
					$comments = get_total_comment($blog_part["blogid"]);
				     $total_comment=mysqli_num_rows($comments);
					 echo  $total_comment ;
				?></a></h6></li>										
                                <!--<li><h6><a href="#"><i class="fa fa-tags"></i>DESIGN, WORDPRESS, COMPANY</a></h6></li>-->
                            </ul>
                        </div>
                       <div class="blog-image marginb30 margint30">
                        <?php 
														$img_url = $blog_part["blogimage"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
                        
   <img  alt="<?php echo $blog_part["blogtitle"];?>" class="img-responsive" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" />	<?php } } ?>
                  
                        </div>
                        <div class="post-content margint10">
                            <p><?php echo $blog_part["blogcontent"];?></p>
                        </div>
                       <!-- <div class="button mini-button button-style-2 margint30"><h6><a href="room_details.php">READ MORE</a></h6></div>-->  
                       <div class="comment-number clearfix"><!-- Blog Comment Number Section -->
							<div class="pull-left">
								<h3><?php  
					$comments = get_total_comment($blog_part["blogid"]);
				     $total_comment=mysqli_num_rows($comments);
					 echo  $total_comment ;
				?> COMMENTS</h3>
							</div>
							<?php /*?><div class="pull-right write-comment">
								<h5><a href="#write-comment">WRITE COMMENT</a></h5>
							</div><?php */?>
	                    </div>
	                    <div class="comments-container clearfix">
                        <!-- Blog Comments Section -->
	                    	<ul>
   <?php /*?><?php
		$cid = $blog_part["blogid"];				  
		$sql = "SELECT * 
				FROM comment_tbl 
				WHERE blogid = '{$cid}'
				ORDER by commentid asc";
		$pager = new PS_Pagination($connection, $sql, 7, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>
            
 <?php  
	 $item_per_page      = 10; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>comment";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM comment_tbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$cid = $blog_part['blogid'];
$results = $connection->query("SELECT * FROM comment_tbl WHERE blogid = $cid ORDER BY commentid DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
FROM comment_tbl 
				WHERE blogid = '{$cid}'
				ORDER by commentid asc";
*/
//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
		                    	<li class="comment-box clearfix margint40">
		                    		<div class="col-lg-2 comment-author-image">
                                     <?php 
														$img_url = $row["image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?> <img alt="<?php echo $row["content"];?>" class="img-responsive" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" />	<?php } } ?>
</div>
		                    		<div class="col-lg-10">
		                    			<h3><?php echo $row["name"];?></p></h3>
		                    			
		                    			<p> <h4><?php echo $row["subject"];?></h4></p>  <?php echo $row["content"];?>
		                    			<div class="date marginb20"><?php echo timeAgo1(get_date_2a($row['time']));?></div>
		                    		</div>
		                    	</li>
		                    <?php } ?>   	
							
		                    </ul>
	                    </div>
	                    <div class="margint80"><!-- Write Comment -->
            	
                       <div id="write-comment" class="write-comment-box padt60 marginb60 clearfix"><!-- Write Comment Section -->
		                    	<h2>WRITE COMMENTS</h2>
<p class="margint10">Curabitur blandit tempus porttitor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
   
			                    <div class="contact-form margint40">
                                
<form method="post"  enctype="multipart/form-data">
    			<input class="form-control"  type="hidden" value="<?php echo time() ; ?>" name="time">	
                
                <?php
			// output a list of the fields that had errors
			if (!empty($errors)) {
				echo "<p class=\"errors\">";
				echo "Please review the following fields:<br />";
				foreach($errors as $error) {
					echo " - " . $error . "<br />";
				}
				echo "</p>";
			}
			?>
                																				
                
                						
						                <input type="text" name="name" placeholder="YOUR NAME">
                                        
						                <input type="text" name="subject" placeholder="SUBJECT">
						                <input type="text" name="email" placeholder="E-MAIL ADDRESS"><br />
                                    
						                Select Image:
						 <input name="file_1" type="file" class="form-control" id="file_1"/>
						<input name="file_go" type="hidden" id="file_go" value="go" /><br />
                               <textarea placeholder="Type your comment here" name="content"></textarea>
						                <input class="margint10" name="submit" type="submit" value="SEND NOW">
						            </form>			
								</div>
		                    </div>
	                    </div>
                	</div>
				</div>
				<div class="col-lg-3 col-sm-4 margint60"><!-- Sidebar -->
					<div class="luxen-widget news-widget">
						<div class="title">
							<h5>RECENT NEWS</h5>
						</div>
						<ul class="sidebar-recent">
							<li class="clearfix">
								<h6><a href="#">News from us from now</a></h6>
								<div class="pull-left blg-img margint20">
									<img src="temp/sidebar-news-image-1.jpg" class="img-responsive" alt="">
								</div>
								<div class="pull-left blg-txt">
									<p>Donec ullamcorper nulla non metus auctor Nulla vitae elit libero, a pharetra augue <a class="active-color" href="#">[...]</a></p>
								</div>
							</li>
							<li class="clearfix">
								<h6><a href="#">Its Summary for news</a></h6>
								<div class="pull-left blg-img margint20">
									<img src="temp/sidebar-news-image-2.jpg" class="img-responsive" alt="">
								</div>
								<div class="pull-left blg-txt">
									<p>Donec ullamcorper nulla non metus auctor Nulla vitae elit libero, a pharetra augue <a class="active-color" href="#">[...]</a></p>
								</div>
							</li>
						</ul>
					</div>
					<div class="luxen-widget news-widget">
						<div class="title">
							<h5>HOTEL INFORMATION</h5>
						</div>
						<p>Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Lorem ipsumero, a pharetra augue. Lorem ipsum dolor sit amet, consectedui.</p>
					</div>
					<div class="luxen-widget news-widget">
						<div class="title">
							<h5>CONTACT</h5>
						</div>
						<ul class="footer-links">
							<li><p><i class="fa fa-map-marker"></i> Lorem ipsum dolor sit amet lorem Victoria 8011 Australia </p></li>
							<li><p><i class="fa fa-phone"></i> +61 3 8376 6284 </p></li>
							<li><p><i class="fa fa-envelope"></i> info@2035themes.com</p></li>
						</ul>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	 <?php include("includes/footer2.php"); ?>