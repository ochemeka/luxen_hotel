<?php
///////////////////////////////////////////File Uploader ///////////////////////////////////////////////////////////
function getExtension($str) 
{ 
	$i = strrpos($str,".");         
	if (!$i) { return ""; }         
	$l = strlen($str) - $i;         
	$ext = substr($str,$i+1,$l);         
	return $ext; 
}

function imageuploader($file, $location){
		//Note: $file = field name and $location is the folder to store file on

		$MAX_SIZE = 2000;
		//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension
		//This variable is used as a flag. The value is initialized with 0 (meaning no error  found)  
		//and it will be changed to 1 if an errro occures.  
		//If the error occures the file will not be uploaded.
		
		//checks if the form has been submitted
		//reads the name of the file the user submitted for uploading
		$image=$_FILES[$file]['name'];
		//if it is not empty
		if ($image)  	
		{
			//get the original name of the file from the clients machine
			$filename = stripslashes($_FILES[$file]['name']);
			//get the extension of the file in a lower case format

			$extension = getExtension($filename); 		
			$extension = strtolower($extension);
			//if it is not a known extension, we will suppose it is an error and will not  upload the file,  	
			//otherwise we will do more tests
				if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))  		
				{
					//$errormsg = 'Unknown File Extention';
					return FALSE; 		
				} 		
				else 		
				{
					//get the size of the image in bytes 
					//$_FILES['image']['tmp_name'] is the temporary filename of the file 
					//in which the uploaded file was stored on the server

 					$size=filesize($_FILES[$file]['tmp_name']);
 					//compare the size with the maxim size we defined and print error if bigger
 
 					if ($size > $MAX_SIZE*1024)
 					{
						//$errormsg = 'You have exceeded the maximum file size limit';
						return FALSE; 		
 					}
 					//we will give an unique name, for example the time in unix time format
 
 					$image_name=time().'.'.$extension;
 					//the new name will be containing the full path where will be stored (images folder)
 
 					$newname = $location."/".$image_name;
					
 					//we verify if the image has been uploaded, and print error instead
 
 					$copied = copy($_FILES[$file]['tmp_name'], $newname);
					if($copied)
					{ 
						return $image_name; 
					}
 					if (!$copied) {	
  						//$errormsg = 'File Upload was unsucessful';	
						return FALSE; 		
					}
		}
	}
}
///////////////////////////////////////////////////// End of File Upload ///////////////////////////////////////////
function check_image($file){
		$MAX_SIZE = 2000;
		$image = $_FILES[$file]['name'];
		if($image)  	
		{
			$filename = stripslashes($_FILES[$file]['name']);
			$extension = getExtension($filename); 		
			$extension = strtolower($extension);
				if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))  		
				{
					return FALSE; 		
				} 		
				else 		
				{
 					$size=filesize($_FILES[$file]['tmp_name']);
 					if ($size > $MAX_SIZE*1024)
 					{
						return FALSE; 		
 					}
					else{ return TRUE; }
				}
		}
}

//Refine profile link.
function refineProfileImage($url)
{
	if(strlen($url) >= 5)
	{
		$imgurl_arr = explode(',', $url);
		foreach($imgurl_arr as $imgurl)
		{
			if(strlen($imgurl) >= 5)
			{ return $imgurl; }
		}
	}
}

//Get Image ID.
function getImageID($img_url)
{
	$img_arr = explode('.', $img_url);
	if(is_numeric($img_arr[0]))
	{
		return $img_arr[0];
	}
}