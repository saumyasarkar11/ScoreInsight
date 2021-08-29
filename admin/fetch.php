<?php
include 'db.php';
$output="";
$branch = $_POST['branch'];
$random = $_POST['random'];

if ($random=='1'){
    $sql = "SELECT * FROM users WHERE designation_id='$random'";  
} else {
    $sql = "SELECT * FROM users WHERE branch='$branch' AND designation_id='$random'";  
}

$sql1 = mysqli_query($con, "SELECT * FROM designation WHERE designation_id='$random'");
$rowa=mysqli_fetch_assoc($sql1);

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) {
        //$output[] = $row;
        $output .= '<option value="'.$row['user_id'].'">'.$row['name'].'  ('.$rowa['level'].')</option>';
           }
           echo $output; 
} else {
    $output .= '<option selected hidden>Data Not Found</option>';
    echo $output;
}

?>