<?php
//create uploads and put permissions
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file already exists
if (file_exists($target_file)) {
 echo "Sorry, file already exists.";
 $uploadOk = 0;
}
// Check file size bigger than 100 kb
else if ($_FILES["fileToUpload"]["size"] > 100000) {
 echo "Sorry, your file is too large.";
 $uploadOk = 0;
}
// Allow certain file formats: JPG, PNG or TXT
else if($FileType != "jpg" && $FileType != "png" && $FileType != "txt" ) {
 echo "Sorry, only JPG, PNG or TXT files are allowed.";
 $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 echo "\nYour file was not uploaded.";
// if everything is ok, try to upload file
} else {
 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
 echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
 } else {
 echo "Sorry, there was an error uploading your file.";
 }
}
?>