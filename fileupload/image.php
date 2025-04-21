<?php 
//Bypass using first extension
//the developer is extracting the file extension by looking for the ‘.’ character in the filename, and extracting the string after the dot character.
$filename=$_FILES['fileToUpload']['name'];
if($filename == ""){
		echo "Come on! Please upload Some files to process";
		exit();
	}
$file_array = explode(".", $filename);
if(count($file_array) == 2 && $file_array[1] == "php" || $file_array[1] == "php") {
      echo "PHP not allowed."; //Attempted attack detected
}
elseif(count($file_array) == 2 && $file_array[1] == "jpg" || $file_array[1] == "jpg"){
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
echo "".$file_array[0]." is valid, and was successfully uploaded.\n";
}
}
else{
	echo "invalid file";
}

?>
