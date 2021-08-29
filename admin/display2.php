<?php  
include 'db.php';
 $sql = mysqli_query($con, "SELECT * FROM branch WHERE name = '".$_POST["display"]."'");  
 $num = mysqli_num_rows($sql);
 if($num!=0)  
 {  
      echo 'Branch already exists';  
 } else {
    echo 'Branch available for use';  
 }
 ?>