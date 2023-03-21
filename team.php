<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>
<?php include("includes/image_upload_functions.php");
$pagetitle= 'Team' ;  ?>
<?php include("includes/header2.php"); ?>

		<h1 style="color:#FFFFFF"; >OUR TEAM</h1>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="container">
       
			<div class="row">
             
            
				<div class="about-services margint40 clearfix"><!-- Team Section -->
				<?php /*?> <?php 
		$sql = "SELECT * 
				FROM teamtbl     
				ORDER BY teamid asc";
		$pager = new PS_Pagination($connection, $sql, 10, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>
 <?php  
	 $item_per_page      = 4; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>team";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM teamtbl "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM teamtbl WHERE status = 1 ORDER BY teamid ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
FROM teamtbl     
				ORDER BY teamid asc";
*/
//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?> 
	
                    <div class="col-lg-3 col-sm-3">
                    
                     <?php 
														$img_url = $row["timage"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?> <img style="height:200px; width:300px;" alt="<?php echo $row["tdesc"];?>" class="img-responsive" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" />	<?php } } ?>
                        
						<h5 class="margint10"><?php echo $row["tname"];?></h5>
						<p class="margint10"><?php echo $row["tdesc"];?></p>
						<ul class="social-links">
							<li><a href="http://facebook.com/2035themes"><i class="fa fa-facebook"></i></a></li>
							<li><a href="http://twitter.com/2035themes"><i class="fa fa-twitter"></i></a></li>
							<li><a href="http://vine.com/2035themes"><i class="fa fa-vine"></i></a></li>
						</ul>
					</div>
					 
					
		<?php } ?>		</div>
			</div>
		</div>
	</div>
    
 
					
					
					
				</div>
			</div>
		</div>
	</div>
 
<?php include("includes/footer2.php"); ?>