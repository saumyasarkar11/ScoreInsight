<?php
include 'db.php';
$id = $_POST['id'];
$text = $_POST['text'];
$columnname = $_POST['columnname'];

$sql = "UPDATE `company_type` SET `".$columnname."`='".$text."' WHERE `company_type`.type_id=".$id."";  
$result = mysqli_query($con, $sql);
$error = mysqli_error($con);
if($result)  
{  
     echo 'Data Updated';  
}  else  {
     echo 'Something Went Wrong';  
   
}
?>