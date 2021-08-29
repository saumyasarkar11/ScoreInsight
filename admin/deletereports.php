<?php  
include 'db.php';
$sqla= mysqli_query($con, "SELECT * FROM reports WHERE date2 <= '".$_POST["date"]."'");

while ($row=mysqli_fetch_assoc($sqla)){
    
        unlink('../user/reports/'.$row['expense']);
        unlink('../user/reports/'.$row['report']);
    
//    foreach ($row['report'] as $report){
//       unlink('../user/reports/'.$report);
//    }
}
 $sql = "DELETE FROM reports WHERE date2 <= '".$_POST["date"]."'";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Reports Deleted Successfully!';  
 }  
 ?>