<?php  
include 'db.php';
 $sql = "DELETE FROM branch WHERE branch_id = '".$_POST["id"]."'";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Branch Deleted Successfully!';  
 }  
 ?>