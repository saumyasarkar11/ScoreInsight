<?php  
include 'db.php';
 $sql = mysqli_query($con, "SELECT * FROM users WHERE code = '".$_POST["code"]."'");  
 $num = mysqli_num_rows($sql);
 if($num!=0)  
 {  
      echo 'Employee Code already exists';  
 } else {
    echo 'Employee Code is available for use';  
 }
 ?>