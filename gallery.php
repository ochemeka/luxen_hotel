<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/pagination.php"); ?>
<?php include_once("includes/formvalidator.php"); ?>

<?php $pagetitle= 'Gallery' ; ?>
<?php include("includes/header2.php"); ?>
<h1 style="color:#FFFFFF";>GALLERY</h1></div>
	<div class="content"><!-- Gallery Section -->
		<div class="container">
			<div class="row">	
				<?php /*?> <?php 
		$sql = "SELECT * 
				FROM gal 
				WHERE gal_status=1    
				ORDER BY gal_id desc";
		$pager = new PS_Pagination($connection, $sql, 6, 10);
	        $pager->setDebug(true);
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
           		$x=0;
			while($post = mysql_fetch_assoc($rs)) {
			$x++
			?><?php */?>
 <?php  
	 $item_per_page      = 7; //item to display per page
	 $page_url           = "<?php echo SITE_PATH ; ?>Gallery";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM gal "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM gal ORDER BY gal_id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
//WHERE gal_status=1 ORDER BY gal_id desc
/*
FROM gal 
				WHERE gal_status=1    
				ORDER BY gal_id desc";

*/
//echo '<ul class="contents">';
//if(!$results) die(mysql_error());
//           		$x=0;
while($row = $results->fetch_assoc()) {
	// $x++
	 ?>             
				<div class="col-lg-4 col-sm-6 gallery-box">
				<?php 
														$img_url = $row["gal_image"];
														$img_arr = explode(',', $img_url);
													foreach($img_arr as $img_url1)		
						{
						 ?>

<?php  if(strlen($img_url1)>4){  ?>
<a href="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" rel="prettyPhoto[pp_gal]"><img style="height:220px; width:458px" alt="<?php echo $row['gal_title']; ?>" class="img-responsive" src="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>"></a>
					<!--<a style="display:none;" href="temp/room-gallery-image-2.jpg" rel="prettyPhoto[pp_gal]"><img alt="Gallery" class="img-responsive" src="temp/room-gallery-image-1.jpg"></a>
					<a style="display:none;" href="temp/room-gallery-image-3.jpg" rel="prettyPhoto[pp_gal]"><img alt="Gallery" class="img-responsive" src="temp/room-gallery-image-1.jpg"></a>-->
					<a href="<?php echo SITE_PATH; ?>uploads/<?php echo $img_url1;  ?>" rel="prettyPhoto[pp_gal]"><h5><?php //echo $row['gal_title']; ?></h5></a>
					<!--<a href="temp/room-gallery-image-1.jpg" rel="prettyPhoto[pp_gal]"><h6>2 PHOTOS</h6></a>-->
					<?php } } ?> 
				</div>
				
				
<?php

	 }

?>

			
			</div>
			<!--to Add Next page to use the below code -->
<?php /*?>Total of <?php echo $pager->total_rows; ?> Entries Found<br />
    
      <?php if(mysqli_num_rows($rs) < 1){
}else{ echo	'<ul class="pagination">'.$pager->renderFullNav().'</ul>'; 
  
		 }
	   ?>		<?php */?>
		</div>
	</div>
	<?php include ('includes/footer2.php')?>
</php>