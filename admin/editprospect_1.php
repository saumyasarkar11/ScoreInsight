<?php
include 'db.php';
$id = $_POST['id'];
$text = $_POST['text'];
$columnname = $_POST['columnname'];

$sql = "UPDATE prospects SET `".$columnname."`='".$text."' WHERE prospect_id=".$id."";  
$result = mysqli_query($con, $sql);
$error = mysqli_error($con);
if($result)  
{  
     echo 'Data Updated!';
       
}  else  {
     echo 'Something Went Wrong';  
}
?>