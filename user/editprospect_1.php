<?php
include 'db.php';
$id = $_POST['id'];
$text = $_POST['text'];
if (empty($text)){
    $a="NULL";
} else {
    $a=$text;
}
$columnname = $_POST['columnname'];
$name='';
$unread="Unread";
if ($columnname=='status'){
    $name = "Status";
}
elseif ($columnname=="prospect_value"){
    $name = "Prospect Value";
}
elseif ($columnname=="order_value"){
    $name = "Order Value";
}
elseif ($columnname=="followup_date"){
    $name = "Followup Date";
}
elseif ($columnname=="closing_date"){
    $name = "Closing Date";
}
$sql1=mysqli_query($con, "SELECT `".$columnname."` FROM prospects WHERE prospect_id='$id'");
$row=mysqli_fetch_row($sql1);
$comments="".$name." has been changed from ".$row[0]." to ".$a."";
$sql = "UPDATE prospects SET `".$columnname."`='".$text."' WHERE prospect_id=".$id."";  
$result = mysqli_query($con, $sql);
$query_b = mysqli_query($con, "INSERT INTO converations VALUES (NULL, '$id', '$comments', NULL, '$unread')") ;
if($result)  
{  
     echo 'Data Updated';
       
}  else  {
     echo 'Something Went Wrong';  
}
?>