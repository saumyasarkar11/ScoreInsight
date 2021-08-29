<?php  
include 'db.php';
 $sql = mysqli_query($con, "SELECT * FROM cities WHERE name = '".$_POST["display"]."'");  
 $num = mysqli_num_rows($sql);
 if($num!=0)  
 {  
      echo 'City already exists';  
 } else {
    echo 'City available for use';  
 }
 ?>