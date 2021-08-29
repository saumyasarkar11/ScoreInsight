<?php  
include 'db.php';
 $sql = "DELETE FROM services WHERE service_id = '".$_POST["id"]."'";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Service Deleted Successfully!';  
 }  
 ?>