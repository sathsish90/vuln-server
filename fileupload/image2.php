<?php
//Bypass File content verification
//imageinfo =getimagesize($_FILES['userfile']['tmp_name']);
// Add payload inside content 
$imageinfo = "";

if($_FILES['fileToUpload']['tmp_name'] != "")
	{
		$imageinfo = getimagesize($_FILES['fileToUpload']['tmp_name']);	
		if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') 
			{
				print image_type_to_mime_type($imageinfo[2]);
				echo "Sorry, we only accept GIF and JPEG images\n";
				exit;
			}
		$uploaddir = 'uploads/';
		$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);
		if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) 
			{ echo "File is valid, and was successfully uploaded.\n"; } 
		else { echo "File uploading failed.\n"; }
	}
	else { echo "Come on! Please upload Some files to process";	}


?>
