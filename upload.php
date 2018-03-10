<?php
$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"]))
{
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check === false) {
    echo "No file was sent...";
    $uploadOk = 0;
  } else {
    echo "File is good! - " . $check["mime"] . ".";
    
    $uploadOk = 1;
    
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    chmod($target_file,0644);
    

    $time_marker = fopen("last_upload.txt", "w")  or die('Cannot open file:  '.$my_file);
    fwrite($time_marker, $target_file . "?time=" .time());
    fclose($time_marker);
  }
}
//header('Location: upload.html');
?>
