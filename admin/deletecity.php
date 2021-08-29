<?php  
include 'db.php';
 $sql = "DELETE FROM cities WHERE city_id = '".$_POST["id"]."'";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'City Deleted Successfully!';  
 }  
 ?>