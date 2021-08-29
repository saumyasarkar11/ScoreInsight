<?php  
include 'db.php';
 $sql = mysqli_query($con, "SELECT * FROM services WHERE name = '".$_POST["display"]."'");  
 $num = mysqli_num_rows($sql);
 if($num!=0)  
 {  
      echo 'Product/Service already exists';  
 } else {
    echo 'Product/Service available for use';  
 }
 ?>