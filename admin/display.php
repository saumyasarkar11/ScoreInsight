<?php  
include 'db.php';
 $sql = mysqli_query($con, "SELECT * FROM company_type WHERE type = '".$_POST["display"]."'");  
 $num = mysqli_num_rows($sql);
 if($num!=0)  
 {  
      echo 'Company Type already exists';  
 } else {
    echo 'Company Type is available for use';  
 }
 ?>