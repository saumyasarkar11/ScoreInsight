<?php  
include 'db.php';
 $sql = "DELETE FROM prospects WHERE prospect_id = '".$_POST["id"]."'";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Prospect Deleted Successfully!';  
 }  
 ?>