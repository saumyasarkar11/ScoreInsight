<?php  
include 'db.php';
 $sql = mysqli_query($con, "SELECT * FROM users WHERE email = '".$_POST["email"]."'");  
 $num = mysqli_num_rows($sql);
 if($num!=0)  
 {  
      echo 'Email already exists';  
 } else {
    echo 'Email available for use';  
 }
 ?>