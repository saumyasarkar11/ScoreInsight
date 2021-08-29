<?php  
include 'db.php';
 $sql = mysqli_query($con, "SELECT * FROM companies WHERE company_name = '".$_POST["display"]."'");  
 $num = mysqli_num_rows($sql);
 if($num!=0)  
 {  
      echo 'Customer already exists';  
 } else {
    echo 'Customer Name available for use';  
 }
 ?>