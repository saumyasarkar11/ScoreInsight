<?php
include 'db.php';
$output="";
$designation = $_POST['designation'];
               
                $query_a= mysqli_query($con, "SELECT * FROM designation WHERE designation_id<'$designation'");
                while ($row_a = mysqli_fetch_assoc($query_a)){
                 
                 $output .= '<option value="'.$row_a['designation_id'].'">'.$row_a['level'].'</option>';
           }
           echo $output; 
              
               ?>