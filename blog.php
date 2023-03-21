<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>

<?php $pagetitle= 'Blog' ; ?>
<?php include("includes/header2.php"); ?>

		<h1 style="color:#FFFFFF"; >Blogs</h1>
	</div>
	     <!-- <h1>BLOG</h1>-->
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
			<div class="row">
            
           <div class="col-lg-10 col-sm-8 blog-post-contents">
            <?php /*?><?php 
		$sql = "SELECT * 
				FROM blogtbl     
				ORDER BY blogid desc";
		$pager = new PS_Pagination($connection, $sql, 10, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>
<?php  
	 $item_per_page      = 1000; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>blog";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM blogtbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM blogtbl ORDER BY blogid DESC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
FROM blogtbl     
				ORDER BY blogid desc";
*/
//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>

				
		            <div class="blog-post"><!-- Blog Post -->
                        <h3><a href="blog_details.php"><?php echo $row["blogtitle"];?></a></h3>
						<div class="post-materials  clearfix">
                            <ul>                                <!--$blog_part['time'-->
                            <?php /*?>	<li><h6><a href="#"><i class="fa fa-calendar"></i> <!--24 MAY 2013--><?php echo $row["time"] ;?><?php //echo $row["blogtitle"];?></a></h6></li>
                                <li><h6><a href="#"><i class="fa fa-user"></i><!--ADMIN--><?php //echo $row["blogtitle"];?></a></h6></li>
                                <li><h6><a href="#"><i class="fa fa-comments"></i><!--13 COMMENTS--><?php //echo $row["blogtitle"];?></a></h6></li>
                               
                            </ul><?php */?>
                        </div>
                        <div class="blog-image marginb30 margint30">
                        <?php 
														$img_url = $row["blogimage"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
                        
                  <img style="height:500px; width:1200px;" alt="<?php //echo $row["blogtitle"];?>" class="img-responsive" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" />	<?php } } ?>
                       
                       
                       
                        </div>
                        <div class="post-content margint10">
                            <p><?php echo $row["blogcontent"];?></p>
                        </div>
          <div class="button mini-button button-style-2 margint30"><h6><a href="blog_details.php?blogid=<?php echo $row["blogid"]; ?>">READ MORE</a></h6></div>
                    </div>
                     <?php } ?>
		           </div>
                   
                    
				<?php /*?><div class="col-lg-3 col-sm-4 margint60"><!-- Sidebar -->
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
					<div class="luxen-widget news-widget">
						<div class="title">
							<h5>SOCIAL MEDIA</h5>
						</div>
						<ul class="social-links">
							<li><a href="http://facebook.com/2035themes"><i class="fa fa-facebook"></i></a></li>
							<li><a href="http://twitter.com/2035themes"><i class="fa fa-twitter"></i></a></li>
							<li><a href="http://vine.com/2035themes"><i class="fa fa-vine"></i></a></li>
							<li><a href="http://foursquare.com/2035themes"><i class="fa fa-foursquare"></i></a></li>
							<li><a href="http://instagram.com/2035themes"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div><?php */?>
                	 
			</div>
		</div>
	</div>
      <!---->          
     
                
                
			
    
<?php include("includes/footer2.php"); ?>