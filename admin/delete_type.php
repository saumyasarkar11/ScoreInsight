<?php  
include 'db.php';
 $sql = "DELETE FROM company_type WHERE type_id = '".$_POST["id"]."'";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Company Type Deleted Successfully!';  
 }  
 ?>