<?php
include 'db.php';
$id = $_POST['id'];
$text = $_POST['text'];
$columnname = $_POST['columnname'];

$sql = "UPDATE `services` SET `".$columnname."`='".$text."' WHERE `services`.service_id=".$id."";  
$result = mysqli_query($con, $sql);

if($result)  
{  
     echo 'Data Updated';  
}  else  {
     echo 'Something Went Wrong';  
   
}
?>