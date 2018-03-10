<?php
if(isset($_POST["submit"]))
{
  $time_marker = fopen("can_set_upload.txt", "w") or die('Cannot open file:  '.$my_file);
  fwrite($time_marker, "1");
  fclose($time_marker);
}
header('Location: upload.html');
?>
