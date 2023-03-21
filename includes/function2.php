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
		//$result_set = mysqli_query($connection,$query);
			//confirm_query($result_set);
			//$found_user = mysqli_fetch_array($connection,$result_set);
      		//return $found_user; 
	}
	function get_roomcategory($email){
	global $connection;
	$query = "SELECT * 
				FROM room_category 
				WHERE cat_uploadedby = '{$email}'  
				ORDER BY catid ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
		function get_blog1($blog){
	global $connection;
	$query = "SELECT * 
				FROM blog  
				WHERE b_id = '{$blog}'   
				ORDER BY b_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
		function get_category1($cateid){
	global $connection;
	$query = "SELECT * 
				FROM room_category  
				WHERE catid = '{$cateid}'   
				ORDER BY catid ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
		function testid($gallery){
	global $connection;
	$query = "SELECT * 
				FROM gallery  
				WHERE gal_id = '{$gallery}'   
				ORDER BY gal_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
			function get_slider1($slider){
	global $connection;
	$query = "SELECT * 
				FROM slider  
				WHERE s_id = '{$slider}'   
				ORDER BY s_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
		function get_roomsbyid($rmid){
	global $connection;
	$query = "SELECT * 
				FROM rooms  
				WHERE rmid = '{$rmid}'   
				ORDER BY rmid ASC";
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
	function get_bookingbyid($id){
	global $connection;
	$query = "SELECT * 
				FROM bookings     
				WHERE b_id  = '{$id}'   
				ORDER BY b_id DESC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_reservation(){
	global $connection;
	$query = "SELECT * 
				FROM bookings    
				ORDER BY b_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
		function get_allcategory(){
	global $connection;
	$query = "SELECT * 
				FROM room_category    
				ORDER BY catid ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_category_id($cat){
	global $connection;
	$query = "SELECT * 
				FROM room_category 
				WHERE catid = '{$cat}'   
				ORDER BY catid ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
		function get_user(){
	global $connection;
	$query = "SELECT * 
				FROM members_tbl    
				ORDER BY user_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
		function get_user_id($username){
	global $connection;
	$query = "SELECT * 
				FROM members_tbl 
				WHERE email = '{$username}'   
				ORDER BY user_id ASC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_roombyid($id){
	global $connection;
	$query = "SELECT * 
				FROM rooms     
				WHERE rmid  = '{$id}'   
				ORDER BY rmid DESC";
		$cat_set = mysqli_query($connection,$query);
		confirm_query($cat_set);
		return $cat_set;
	}
	function get_roombydet($det){
	global $connection;
	$query = "SELECT * 
				FROM rooms     
				WHERE rm_number  = '{$det}'   
				ORDER BY rmid DESC";
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
