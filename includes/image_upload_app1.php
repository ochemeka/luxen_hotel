<?php
//Initialise all variables.
$db_images = '';
$k = 1;
if( (isset($_POST['file_go']) && isset($_FILES['file_1']) && strlen($_FILES['file_1']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_2']) && strlen($_FILES['file_2']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_3']) && strlen($_FILES['file_3']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_4']) && strlen($_FILES['file_4']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_5']) && strlen($_FILES['file_5']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_6']) && strlen($_FILES['file_6']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_7']) && strlen($_FILES['file_7']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_8']) && strlen($_FILES['file_8']['name']) > 1) )
{		
		do{
			$field_name = 'file_' . $k;
			if(isset($_FILES[$field_name]) && strlen($_FILES[$field_name]['name']) > 5)
			{
				$position[] = $k;
			}
			$k = $k + 1;
		}while($k <= 8);

		//Check for error on upload
		foreach($position as $j)
		{
			$file = 'file_' . $j;
			$checked = check_image($file);
			if($checked == FALSE)
			{
				$errors[] = 'Images does not meet our specification. Images must be gif, 
						  jpg, jpeg or png and must not exceed 1000KB (1.0MB) in size';
			}
		}
		
		//If no error upload images
		if(!isset($error))
		{
				$db_images = '';
				foreach($position as $w)
				{
					$name = 'file_' . $w;
					$imgurl_x = imageuploader($name, '../uploads');
					if($imgurl_x != FALSE)
					{
						$db_images .= $imgurl_x . ',';
					}else{
						$errors[] = 'Unable to Upload Images';
					}
					sleep(1);
				}
		}
}
