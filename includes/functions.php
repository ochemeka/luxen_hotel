<?php


	// This file is the place to store all basic functions
/*	
	function mysqli_prepare($value) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysqli_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes($value); }
			$value = mysqli_real_escape_string($connection,$value );	
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	} */
function Fix($str) { //Clean the fields
	   $str = trim($str);
	 return mysqli_real_escape_string($str);
	    }
		
function check_max_field_lengths($field_length_array) {
	$field_errors = array();
	foreach($field_length_array as $fieldname => $maxlength ) {
		if (strlen(trim(mysqli_prepare($_POST[$fieldname]))) > $maxlength) { $field_errors[] = $fieldname; }
	}
	return $field_errors;
} 

function redirect_to( $location ) {
		echo"<script type=\"text/javascript\">
<!--
   window.location='$location';
//-->
</script>";
		
	}
	
	
	
	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysqli_error($connection));;
		}
	}
	
function get_admin(){
	global $connection;
	$query = "SELECT * 
				FROM admintbl  
				ORDER BY adm_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
		
	}
function get_admin2(){
	global $connection;
	$query = "SELECT * 
				FROM admintbl  
				
				ORDER BY adm_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
		
	}	
	
function get_about(){
	global $connection;
	$query = "SELECT * 
				FROM about     
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_plan1(){
	global $connection;
	$query = "SELECT * 
				FROM plan    
				WHERE status = 1 
				ORDER BY p_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_planid1(){
	global $connection;
	$query = "SELECT * 
				FROM plan    
				WHERE status = 1 
				ORDER BY p_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
	/*function get_admin(){
	global $connection;
	$query = "SELECT * 
				FROM admintbl  
				ORDER BY adm_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}*/
	/*function get_admuser($admuser){
	global $connection;
	$query = "SELECT * 
				FROM admintbl  
				WHERE adm_username = '{$admuser}'   
				ORDER BY adm_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}*/
	
	function get_all_user(){
	global $connection;
	$query = "SELECT * 
				FROM newmember_tbl  
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
		function get_all_listing_user($user,$producttype){
	global $connection;
	$query = "SELECT * 
				FROM equipment_listing
				WHERE user_id =  '{$user}' 
				AND category = '{$producttype}'
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_testimony(){
	global $connection;
	$query = "SELECT * 
				FROM testimonial 
				ORDER BY test_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
function get_quoteall(){
	global $connection;
	$query = "SELECT * 
				FROM quotetbl 
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
function get_tradingkey(){
	global $connection;
	$query = "SELECT * 
				FROM trade_key 
				ORDER BY key_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
function get_all_order_user11(){
	global $connection;
	$query = "SELECT * 
				FROM ordertbl
				WHERE status=0 
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
function get_gal_id($gal){
	global $connection;
	$query = "SELECT * 
				FROM gallery 
				WHERE user_id = '{$gal}'   
				ORDER BY gal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_key_id($username){
	global $connection;
	$query = "SELECT * 
				FROM trade_key 
				WHERE email = '{$username}'   
				ORDER BY key_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_user_id($username){
	global $connection;
	$query = "SELECT * 
				FROM newmember_tbl 
				WHERE email = '{$username}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_loan_status($username){
	global $connection;
	$query = "SELECT * 
				FROM loan_apply 
				WHERE email = '{$username}'   
				ORDER BY l_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_lead_id($username){
	global $connection;
	$query = "SELECT * 
				FROM quotetbl 
				WHERE vendor_id = '{$username}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_ewallet($username){
	global $connection;
	$query = "SELECT * 
				FROM ewallet 
				WHERE email = '{$username}'   
				ORDER BY wal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_loan_byid($loan){
	global $connection;
	$query = "SELECT * 
				FROM loan_apply
				WHERE email = '{$loan}' 
				ORDER BY l_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_allloan_prog($ln){
	global $connection;
	$query = "SELECT * 
				FROM loan_apply
				WHERE l_id = '{$ln}' 
				ORDER BY l_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
		function get_wallet_id($user){
	global $connection;
	$query = "SELECT * 
				FROM ewallet
				WHERE user_id =  '{$user}' 
				ORDER BY wal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_tfwallet_id($id){
	global $connection;
	$query = "SELECT * 
				FROM tfwallet
				WHERE id =  '{$id}' 
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_alltfwallet(){
	global $connection;
	$query = "SELECT * 
				FROM tfwallet 
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_allpayment(){
	global $connection;
	$query = "SELECT * 
				FROM payment 
				ORDER BY p_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_ewallet_id($wal){
	global $connection;
	$query = "SELECT * 
				FROM ewallet 
				WHERE email = '{$wal}'   
				ORDER BY wal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_user_detail($user){
	global $connection;
	$query = "SELECT * 
				FROM newmember_tbl
				WHERE id = '{$user}'       
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_quotedetail($quoteid){
	global $connection;
	$query = "SELECT * 
				FROM newmember_tbl
				WHERE id = '{$quoteid}'       
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_user(){
	global $connection;
	$query = "SELECT * 
				FROM newmember_tbl  
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_user1(){
	global $connection;
	$query = "SELECT * 
				FROM admintbl  
				 
				ORDER BY adm_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_user_i($pid){
	global $connection;
	$query = "SELECT * 
				FROM newmember_tbl 
				WHERE id = '{$pid}'
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_user_id11(){
	global $connection;
	$query = "SELECT * 
				FROM newmember_tbl 
				WHERE id = '{}'
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_comment($cid){
	global $connection;
	$query = "SELECT * 
				FROM comment 
				WHERE blog_id = '{$cid}'    
				ORDER BY c_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_subservices($sub){
	global $connection;
	$query = "SELECT * 
				FROM subservices 
				WHERE sub_id = '{$sub}'    
				ORDER BY sub_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_allcategory(){
	global $connection;
	$query = "SELECT * 
				FROM category     
				ORDER BY cat_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_category($id){
	global $connection;
	$query = "SELECT * 
				FROM category  
				WHERE id = '{$id}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}

	function get_category_id($catid){
	global $connection;
	$query = "SELECT * 
				FROM category  
				WHERE cat_id = '{$catid}'   
				ORDER BY cat_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_event($cat, $state){
	global $connection;
	$query = "SELECT * 
				FROM newmember_tbl
				WHERE category = '{$cat}'
				AND state = '{$state}'     
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	/*new*/
	
	function get_slider1($slider){
	global $connection;
	$query = "SELECT * 
				FROM slidertbl  
				WHERE slide_id = '{$slider}'   
				ORDER BY slide_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	/*function get_blog123($blog){
	global $connection;
	$query = "SELECT * 
				FROM blogtbl  
				WHERE blogid = '{$blog}'   
				ORDER BY blogid ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}*/
	
	function get_room1($room){
	global $connection;
	$query = "SELECT * 
				FROM roomtbl  
				WHERE room_id = '{$room}'   
				ORDER BY room_id ASC";
	$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_room(){
	global $connection;
	$query = "SELECT * 
				FROM roomtbl  
				ORDER BY room_id ASC";
	$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
		function get_category1($cat){
	global $connection;
	$query = "SELECT * 
				FROM categorytbl  
				WHERE cat_id = '{$cat}'   
				ORDER BY cat_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_bookedrm(){
	global $connection;
	$query = "SELECT * 
				FROM bookingtbl
				WHERE pay_confirm = '{1}'  
				ORDER BY book_id ASC";
				
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_testimony1($testimony){
	global $connection;
	$query = "SELECT * 
				FROM testimony  
				WHERE test_id = '{$testimony}'   
				ORDER BY test_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_gallery1($gallery){
	global $connection;
	$query = "SELECT * 
				FROM gal  
				WHERE gal_id = '{$gallery}'   
				ORDER BY gal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
	function get_blog_id($blog){
	global $connection;
	$query = "SELECT * 
				FROM blogtbl  
				WHERE blogid = '{$blog}'   
				ORDER BY blogid ASC";
	$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
	function get_total_comment($comid){
	global $connection;
	$query = "SELECT * 
				FROM comment_tbl
				WHERE blogid = '{$comid}'
				ORDER BY commentid ASC";
	$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
	function get_sliderad($slider){
	global $connection;
	$query = "SELECT * 
				FROM slidertbl
				WHERE slide_id = '{$slider}'
				ORDER BY slide_id ASC";
				
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_galleryad($gallery){
	global $connection;
	$query = "SELECT * 
				FROM gal
				WHERE gal_id = '{$gallery}'
				ORDER BY gal_id ASC";
				
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_categoryad($cat){
	global $connection;
	$query = "SELECT * 
				FROM categorytbl
				WHERE cat_id = '{$cat}'
				ORDER BY cat_id ASC";
				
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	/*function get_teamad($team){
	global $connection;
	$query = "SELECT * 
				FROM teamtbl
				WHERE  	teamid = '{$team}'
				ORDER BY teamid ASC";
				
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}*/
	
	function get_roomad($room){
	global $connection;
	$query = "SELECT * 
				FROM roomtbl
				WHERE room_id = '{$room}'
				ORDER BY room_id ASC";
				
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
	
	function get_team($team){
	global $connection;
	$query = "SELECT * 
				FROM teamtbl  
				WHERE teamid = '{$team}'   
				ORDER BY teamid ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_team22(){
	global $connection;
	$query = "SELECT * 
				FROM teamtbl  
				WHERE teamid = '{}'   
				ORDER BY teamid ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_blog1($blog){
	global $connection;
	$query = "SELECT * 
				FROM blog  
				WHERE id = '{$blog}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_allgallery($gallery){
	global $connection;
	$query = "SELECT * 
				FROM gallery  
				WHERE gal_id = '{$gallery}'   
				ORDER BY gal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_gallery_id($gal){
	global $connection;
	$query = "SELECT * 
				FROM gallery  
				WHERE uploaded_by = '{$gal}'   
				ORDER BY gal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_allbook($book){
	global $connection;
	$query = "SELECT * 
				FROM bookingtbl  
				WHERE book_id = '{$book}'   
				ORDER BY book_id ASC";
		$cat_set =mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_pastor($pastor){
	global $connection;
	$query = "SELECT * 
				FROM pastor  
				WHERE id = '{$pastor}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_pastorhead(){
	global $connection;
	$query = "SELECT * 
				FROM pastor  
				WHERE control = 1   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_prog($prog){
	global $connection;
	$query = "SELECT * 
				FROM program  
				WHERE id = '{$prog}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
		function get_slider123($slider){
	global $connection;
	$query = "SELECT * 
				FROM slider  
				WHERE id = '{$slider}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_model($id){
	global $connection;
	$query = "SELECT * 
				FROM models  
				WHERE id = '{$id}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_sender(){
	global $connection;
	$query = "SELECT * 
				FROM sender  
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_track($id){
	global $connection;
	$query = "SELECT * 
				FROM tracktbl  
				WHERE id = '{$id}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_sitesetting(){
	global $connection;
	$query = "SELECT * 
				FROM setting     
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_userid($user){
	global $connection;
	$query = "SELECT * 
				FROM newmember_tbl  
				WHERE id = '{$user}'   
				ORDER BY user_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
	function timeDiff($firstTime,$lastTime){
   // convert to unix timestamps
   $firstTime=strtotime($firstTime);
   $lastTime=strtotime($lastTime);

   // perform subtraction to get the difference (in seconds) between times
   $timeDiff=$lastTime-$firstTime;

   // return the difference
   return $timeDiff;
}
	

	



	// This file is the place to store all basic functions
/*	
	function mysqli_prepare($value) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysqli_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes($value); }
			$value = mysqli_real_escape_string($connection,$value );	
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	} */
/*function Fix($str) { //Clean the fields
	   $str = trim($str);
	 return mysql_real_escape_string($str);
	    }
		
function check_max_field_lengths($field_length_array) {
	$field_errors = array();
	foreach($field_length_array as $fieldname => $maxlength ) {
		if (strlen(trim(mysqli_prepare($_POST[$fieldname]))) > $maxlength) { $field_errors[] = $fieldname; }
	}
	return $field_errors;
} 

function redirect_to( $location ) {
		echo"<script type=\"text/javascript\">
<!--
   window.location='$location';
//-->
</script>";
		
	}
	
	
	
	



	function get_plan(){
	global $connection;
	$query = "SELECT * 
				FROM plan    
				WHERE p_id = 1 
				ORDER BY p_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_plan2($pid){
	global $connection;
	$query = "SELECT * 
				FROM plan    
				WHERE p_id = {$pid}   
				AND status = 1 
				ORDER BY p_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
	function get_plan1(){
	global $connection;
	$query = "SELECT * 
				FROM plan    
				WHERE status = 1 
				ORDER BY p_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_all_user(){
	global $connection;
	$query = "SELECT * 
				FROM newmember_tbl  
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_slider1($slider){
	global $connection;
	$query = "SELECT * 
				FROM slidertbl  
				WHERE slide_id = '{$slider}'   
				ORDER BY slide_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_blog1($blog){
	global $connection;
	$query = "SELECT * 
				FROM blogtbl  
				WHERE blogid = '{$blog}'   
				ORDER BY blogid ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_room1($room){
	global $connection;
	$query = "SELECT * 
				FROM roomtbl  
				WHERE room_id = '{$room}'   
				ORDER BY room_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
		function get_category1($cat){
	global $connection;
	$query = "SELECT * 
				FROM categorytbl  
				WHERE cat_id = '{$cat}'   
				ORDER BY cat_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_testimony1($testimony){
	global $connection;
	$query = "SELECT * 
				FROM testimony  
				WHERE test_id = '{$cat}'   
				ORDER BY test_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_gallery1($gallery){
	global $connection;
	$query = "SELECT * 
				FROM gal  
				WHERE gal_id = '{$gallery}'   
				ORDER BY gal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
	function get_blog_id($blog){
	global $connection;
	$query = "SELECT * 
				FROM blogtbl  
				WHERE blogid = '{$blog}'   
				ORDER BY blogid ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_total_comment($comid){
	global $connection;
	$query = "SELECT * 
				FROM comment_tbl
				WHERE blogid = '{$comid}'
				ORDER BY commentid ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
function get_admuser($adm){
	global $connection;
	$query = "SELECT * 
				FROM admintbl  
				WHERE adm_username = '{$adm}'   
				ORDER BY adm_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_user_id(){
	global $connection;
	$query = "SELECT * 
				FROM newmember_tbl  
				WHERE email = '{}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_team($team){
	global $connection;
	$query = "SELECT * 
				FROM teamtbl  
				WHERE teamid = '{$team}'   
				ORDER BY teamid ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}

function get_allbook($book){
	global $connection;
	$query = "SELECT * 
				FROM bookingtbl  
				WHERE  book_id = '{$book}'   
				ORDER BY book_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_bookedrm(){
	global $connection;
	$query = "SELECT * 
				FROM bookingtbl
				WHERE pay_confirm = '{1}'  
				ORDER BY book_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_receipt($receipt){
	global $connection;
	$query = "SELECT * 
				FROM receipttbl  
				WHERE  receiptid = '{$receipt}'   
				ORDER BY receiptid ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
	
		function ha_pledge($user){
	global $connection;
	$query = "SELECT * 
				FROM ha_pledge   
				WHERE p_id = '{$user}'   
				ORDER BY p_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
			function ha_pledge_count($user){
	global $connection;
	$query = "SELECT * 
				FROM ha_pledge   
				WHERE user = '{$user}'  
				AND status =0  
				ORDER BY p_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
function timeDiff($firstTime,$lastTime){
   // convert to unix timestamps
   $firstTime=strtotime($firstTime);
   $lastTime=strtotime($lastTime);

   // perform subtraction to get the difference (in seconds) between times
   $timeDiff=$lastTime-$firstTime;

   // return the difference
   return $timeDiff;
}

	
	function get_allmenu_cat(){
	global $connection;
	$query = "SELECT * 
				FROM category 
				WHERE 
				status = 1  
				ORDER BY cat_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_cat_id($user){
	global $connection;
	$query = "SELECT * 
				FROM category   
				WHERE cat_id = '{$user}'   
				ORDER BY cat_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
		function get_userbyid($user){
	global $connection;
	$query = "SELECT * 
				FROM memberstbl  
				WHERE email = '{$user}'   
				ORDER BY user_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_tranxbyid($user){
	global $connection;
	$query = "SELECT * 
				FROM tranx_activity   
				WHERE tranx_user = '{$user}'   
				ORDER BY t_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_ewallet_all($username){
	global $connection;
	$query = "SELECT * 
				FROM ewallet    
				ORDER BY acc_id DESC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
	function get_ewallet_id($username){
	global $connection;
	$query = "SELECT * 
				FROM ewallet    
				WHERE email = '{$username}'   
				ORDER BY wal_id DESC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_shopwallet_all($username){
	global $connection;
	$query = "SELECT * 
				FROM shopwallet     
				ORDER BY acc_id DESC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_shopwallet_id($username){
	global $connection;
	$query = "SELECT * 
				FROM shopwallet     
				WHERE username = '{$username}'   
				ORDER BY acc_id DESC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	
	function get_productbyid($username){
	global $connection;
	$query = "SELECT * 
				FROM products     
				WHERE md5(id)  = '{$username}'   
				ORDER BY id DESC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_product_id($username){
	global $connection;
	$query = "SELECT * 
				FROM products     
				WHERE id  = '{$username}'   
				ORDER BY id DESC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_productbycat($username){
	global $connection;
	$query = "SELECT * 
				FROM products     
				WHERE pr_category  = '{$username}'   
				ORDER BY id DESC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}




function get_orders($username){
	global $connection;
	$query = "SELECT * 
				FROM order_items       
				WHERE order_id  = '{$username}'  
				ORDER BY id DESC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
function get_foreignorders($username){
	global $connection;
	$query = "SELECT * 
				FROM custorder_items       
				WHERE order_id  = '{$username}'  
				ORDER BY id DESC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
function orders($username){
	global $connection;
	$query = "SELECT * 
				FROM orders       
				WHERE id  = '{$username}'  
				ORDER BY id DESC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
*/







/*second*/

	
/*function get_admin(){
	global $connection;
	$query = "SELECT * 
				FROM admintbl  
				ORDER BY adm_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
		//$result_set = mysqli_query($connection,$query);
			//confirm_query($result_set);
			//$found_user = mysqli_fetch_array($connection,$result_set);
      		//return $found_user; 
	}
	
function get_about(){
	global $connection;
	$query = "SELECT * 
				FROM about     
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_plan1(){
	global $connection;
	$query = "SELECT * 
				FROM plan    
				WHERE status = 1 
				ORDER BY p_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_planid1(){
	global $connection;
	$query = "SELECT * 
				FROM plan    
				WHERE status = 1 
				ORDER BY p_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_all_user(){
	global $connection;
	$query = "SELECT * 
				FROM memberstbl  
				ORDER BY user_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
		function get_all_listing_user($user,$producttype){
	global $connection;
	$query = "SELECT * 
				FROM equipment_listing
				WHERE user_id =  '{$user}' 
				AND category = '{$producttype}'
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_testimony(){
	global $connection;
	$query = "SELECT * 
				FROM testimonial 
				ORDER BY test_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
function get_quoteall(){
	global $connection;
	$query = "SELECT * 
				FROM quotetbl 
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
function get_tradingkey(){
	global $connection;
	$query = "SELECT * 
				FROM trade_key 
				ORDER BY key_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
function get_all_order_user11(){
	global $connection;
	$query = "SELECT * 
				FROM ordertbl
				WHERE status=0 
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
function get_gal_id($gal){
	global $connection;
	$query = "SELECT * 
				FROM gallery 
				WHERE user_id = '{$gal}'   
				ORDER BY gal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_key_id($username){
	global $connection;
	$query = "SELECT * 
				FROM trade_key 
				WHERE email = '{$username}'   
				ORDER BY key_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_user_id($username){
	global $connection;
	$query = "SELECT * 
				FROM memberstbl 
				WHERE email = '{$username}'   
				ORDER BY user_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_loan_status($username){
	global $connection;
	$query = "SELECT * 
				FROM loan_apply 
				WHERE email = '{$username}'   
				ORDER BY l_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_lead_id($username){
	global $connection;
	$query = "SELECT * 
				FROM quotetbl 
				WHERE vendor_id = '{$username}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_ewallet($username){
	global $connection;
	$query = "SELECT * 
				FROM ewallet 
				WHERE email = '{$username}'   
				ORDER BY wal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_loan_byid($loan){
	global $connection;
	$query = "SELECT * 
				FROM loan_apply
				WHERE email = '{$loan}' 
				ORDER BY l_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_allloan_prog($ln){
	global $connection;
	$query = "SELECT * 
				FROM loan_apply
				WHERE l_id = '{$ln}' 
				ORDER BY l_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
		function get_wallet_id($user){
	global $connection;
	$query = "SELECT * 
				FROM ewallet
				WHERE user_id =  '{$user}' 
				ORDER BY wal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_tfwallet_id($id){
	global $connection;
	$query = "SELECT * 
				FROM tfwallet
				WHERE id =  '{$id}' 
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_alltfwallet(){
	global $connection;
	$query = "SELECT * 
				FROM tfwallet 
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_allpayment(){
	global $connection;
	$query = "SELECT * 
				FROM payment 
				ORDER BY p_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_ewallet_id($wal){
	global $connection;
	$query = "SELECT * 
				FROM ewallet 
				WHERE email = '{$wal}'   
				ORDER BY wal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_user_detail($user){
	global $connection;
	$query = "SELECT * 
				FROM memberstbl
				WHERE user_id = '{$user}'       
				ORDER BY user_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_quotedetail($quoteid){
	global $connection;
	$query = "SELECT * 
				FROM memberstbl
				WHERE user_id = '{$quoteid}'       
				ORDER BY user_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_user(){
	global $connection;
	$query = "SELECT * 
				FROM memberstbl  
				ORDER BY user_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_comment($cid){
	global $connection;
	$query = "SELECT * 
				FROM comment 
				WHERE blog_id = '{$cid}'    
				ORDER BY c_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_subservices($sub){
	global $connection;
	$query = "SELECT * 
				FROM subservices 
				WHERE sub_id = '{$sub}'    
				ORDER BY sub_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_allcategory(){
	global $connection;
	$query = "SELECT * 
				FROM category     
				ORDER BY cat_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_category($id){
	global $connection;
	$query = "SELECT * 
				FROM category  
				WHERE id = '{$id}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}

	function get_category_id($catid){
	global $connection;
	$query = "SELECT * 
				FROM category  
				WHERE cat_id = '{$catid}'   
				ORDER BY cat_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_category1($cateid){
	global $connection;
	$query = "SELECT * 
				FROM category  
				WHERE cat_id = '{$cateid}'   
				ORDER BY cat_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_event($cat, $state){
	global $connection;
	$query = "SELECT * 
				FROM memberstbl
				WHERE category = '{$cat}'
				AND state = '{$state}'     
				ORDER BY user_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_trackid(){
	global $connection;
	$query = "SELECT * 
				FROM tracktbl     
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_blog($id){
	global $connection;
	$query = "SELECT * 
				FROM blog  
				WHERE b_id = '{$id}'   
				ORDER BY b_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_blog1($blog){
	global $connection;
	$query = "SELECT * 
				FROM blog  
				WHERE id = '{$blog}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_allgallery($gallery){
	global $connection;
	$query = "SELECT * 
				FROM gallery  
				WHERE gal_id = '{$gallery}'   
				ORDER BY gal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_gallery_id($gal){
	global $connection;
	$query = "SELECT * 
				FROM gallery  
				WHERE uploaded_by = '{$gal}'   
				ORDER BY gal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_allbook($book){
	global $connection;
	$query = "SELECT * 
				FROM book  
				WHERE bk_id = '{$book}'   
				ORDER BY bk_id ASC";
		$cat_set =mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_pastor($pastor){
	global $connection;
	$query = "SELECT * 
				FROM pastor  
				WHERE id = '{$pastor}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_pastorhead(){
	global $connection;
	$query = "SELECT * 
				FROM pastor  
				WHERE control = 1   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_prog($prog){
	global $connection;
	$query = "SELECT * 
				FROM program  
				WHERE id = '{$prog}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
		function get_slider1($slider){
	global $connection;
	$query = "SELECT * 
				FROM slider  
				WHERE id = '{$slider}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_user1($user){
	global $connection;
	$query = "SELECT * 
				FROM customer  
				WHERE id = '{$user}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_model($id){
	global $connection;
	$query = "SELECT * 
				FROM models  
				WHERE id = '{$id}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_sender(){
	global $connection;
	$query = "SELECT * 
				FROM sender  
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_track($id){
	global $connection;
	$query = "SELECT * 
				FROM tracktbl  
				WHERE id = '{$id}'   
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_sitesetting(){
	global $connection;
	$query = "SELECT * 
				FROM setting     
				ORDER BY id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	
	function get_userid($user){
	global $connection;
	$query = "SELECT * 
				FROM memberstbl  
				WHERE user_id = '{$user}'   
				ORDER BY user_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}*/
	
	
	
	

	
function GenerateUrl($s) {
  //Convert accented characters, and remove parentheses and apostrophes
  $from = explode (',', "Ã§,Ã¦,Å“,Ã¡,Ã©,Ã­,Ã³,Ãº,Ã ,Ã¨,Ã¬,Ã²,Ã¹,Ã¤,Ã«,Ã¯,Ã¶,Ã¼,Ã¿,Ã¢,Ãª,Ã®,Ã´,Ã»,Ã¥,e,i,Ã¸,u,(,),[,],'");
  $to = explode (',', 'c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u,,,,,,');
  //Do the replacements, and convert all other non-alphanumeric characters to spaces
  $s = preg_replace ('~[^\w\d]+~', '-', str_replace ($from, $to, trim ($s)));
  //Remove a - at the beginning or end and make lowercase
  return strtolower (preg_replace ('/^-/', '', preg_replace ('/-$/', '', $s)));
}

function conversion($amt){

$price1 = intval($amt);
$price = $price1/150;
$price = round($price);

if($price < 30)
{
$price = 15;
}

if($price >30 && $price <= 40)
{
$price = 30;
}

if($price > 40)
{
$price = 40;
}

return $price;
}

function read_file_docx($filename){
		
		$striped_content = '';
		$content = '';
		
		if(!$filename || !file_exists($filename)) return false;
		
		$zip = zip_open($filename);
		
		if (!$zip || is_numeric($zip)) return false;
	
	
		while ($zip_entry = zip_read($zip)) {
			
			if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
			
			if (zip_entry_name($zip_entry) != "word/document.xml") continue;

			$content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
			
			zip_entry_close($zip_entry);
		}// end while
	
		zip_close($zip);
		
		//echo $content;
		//echo "<hr>";
		//file_put_contents('1.xml', $content);		
		
		$content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
		$content = str_replace('</w:r></w:p>', "\r\n\r\n", $content);
		$striped_content = strip_tags($content);

		return $striped_content;
	}

	function get_file_extension($file_name) {
   return end(explode('.',$file_name));
}
function check_required_fields($required_array) {
	$field_errors = array();
	foreach($required_array as $fieldname) {
		if (!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) { 
			$field_errors[] = $fieldname; 
		}
	}
	return $field_errors;
}


function display_errors($error_array) {
	echo "<p class=\"errors\">";
	echo "Please review the following fields:<br />";
	foreach($error_array as $error) {
		echo " - " . $error . "<br />";
	}
	echo "</p>";
}
function delete($postid,$table,$id){
		global $connection;
		$query = "delete from 
						$table 
						WHERE $postid = {$id} ";
				$unfeature = mysqli_query($connection,$query);
				confirm_query($unfeature);
				return $unfeature;
			
	}

	function page_hit($postid){
	global $connection;
		$query = "UPDATE project  
						SET project_views = project_views+1
						where project_id = {$postid} 
						";
				$hit = mysqli_query($connection,$query);
				confirm_query($hit);
				return $hit;
	}
function cleanusern($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\. -]/', '', $string); // Removes special chars.
}
function get_date_2a($unix_time)
{
	if(is_numeric($unix_time))
	{
		$read_in = date("Y-m-d, H:i:s", $unix_time);
		return $read_in;
	}
}
function get_date_2b($unix_time)
{
	if(is_numeric($unix_time))
	{
		$read_in = date("Y-m-d", $unix_time);
		return $read_in;
	}
}

function timeAgo1($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "one minute ago";
        }
        else{
            return "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return "$years years ago";
        }
    }
}

function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
        $input = strip_tags($input);
    }
  
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }
  
    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
  
    //add ellipses (...)
    if ($ellipses) {
        $trimmed_text .= '...';
    }
  
    return $trimmed_text;
}
