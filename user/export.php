<?php  
include('db.php');
$output = '';

    $person=$_POST['user'];
    $team=$_POST['team'];
    $branch=$_POST['branch'];


if ($team==""){
    
    $status=$_POST['status'];
    $from=$_POST['from'];
    $to=$_POST['to'];
  
       $query2 = mysqli_query($con, "SELECT * FROM prospects WHERE user_id ='$person' AND status IN ($status) AND date2<='$to' AND date2>='$from'");
       $num2=mysqli_num_rows($query2);
       
       $query3 = mysqli_query($con, "SELECT * FROM users WHERE user_id ='$person'");
       $row3=mysqli_fetch_assoc($query3);
       
        $stat = str_replace("'", "", $status);
 
 if ($num2 > 0)
 {
  $output .= '
  
                    <table border="1">
												
                   <tr><td colspan="7" style="background-color:yellow;">Sales Report for '.$row3['name'].' (Code: '.$row3['code'].')</td></tr>
                    <tr><td colspan="3" style="background-color:aqua;">Status: '.$stat.'</td>
                    <td colspan="4" style="background-color:aqua;">Period: '.$from.' to '.$to.'</td></tr>
                   
                    <tr align="left">  
                         <th style="background-color:#cecece;">Date</th>  
                         <th style="background-color:#cecece;">Company</th>
                         <th style="background-color:#cecece;">City</th>
                         <th style="background-color:#cecece;">Requirement</th>
                         <th style="background-color:#cecece;">Prospect (Rs.)</th>
                         <th style="background-color:#cecece;">Order (Rs.)</th>
                         <th style="background-color:#cecece;">Closing Date</th>
                        
                    </tr>
                
  ';
  while($row2 = mysqli_fetch_assoc($query2))
 {
      $ida=$row2['company_id'];
       $query_a= mysqli_query($con, "SELECT * FROM companies WHERE company_id='$ida'");
                                $row_a=mysqli_fetch_assoc($query_a);
   $output .= '
   
    <tr align="left">  
                         <td>'.$row2["date"].'</td>
                         <td>'.$row_a["company_name"].'</td>  
                         <td>'.$row_a["city"].'</td>
                         <td>'.$row2["requirement"].'</td>
                         <td>'.$row2["prospect_value"].'</td>
                         <td>'.$row2["order_value"].'</td>  
                         <td>'.$row2["closing_date"].'</td>  
                         
                         
                    </tr>
   
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
  
 }else {
    header( "refresh:3;url=generate.php" );
    ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard | Techworth SLMRS</title>

<link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="css/style.css" />

</head>
<body>
<div id="notfound">
<div class="notfound">
<div class="notfound-404">
<h1>Oops!</h1>
<h2>No Record found!</h2>
</div>
<a href="#">You will be redirected in 3s</a>
</div>
</div>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>
</html>

    <?php
 }
       
 }  else if($person==""){
    
    $status=$_POST['status'];
    $from=$_POST['from'];
    $to=$_POST['to'];
  
   $query = mysqli_query($con, "SELECT * FROM users WHERE head = '$team' OR user_id ='$team'");
    $array1=array();
    
      while($row = mysqli_fetch_assoc($query)){
            array_push($array1, $row['user_id']);
      }
      
      $array2=implode(", ",$array1);

       $query2 = mysqli_query($con, "SELECT * FROM prospects WHERE user_id IN ($array2) AND status IN ($status) AND date2<='$to' AND date2>='$from'");
       $num2=mysqli_num_rows($query2);
       
        $query3 = mysqli_query($con, "SELECT * FROM users WHERE user_id ='$team'");
       $row3=mysqli_fetch_assoc($query3);
       
        $stat = str_replace("'", "", $status);
 
 if ($num2 > 0)
 {
  $output .= '
  
                    <table border="1">
												
                   <tr><td colspan="7" style="background-color:yellow;">Sales Report for Team headed by '.$row3['name'].' (Code: '.$row3['code'].')</td></tr>
                    <tr><td colspan="3" style="background-color:aqua;">Status: '.$stat.'</td>
                    <td colspan="4" style="background-color:aqua;">Period: '.$from.' to '.$to.'</td></tr>
                   
                    <tr align="left">  
                         <th style="background-color:#cecece;">Date</th>  
                         <th style="background-color:#cecece;">Company</th>
                         <th style="background-color:#cecece;">City</th>
                         <th style="background-color:#cecece;">Requirement</th>
                         <th style="background-color:#cecece;">Prospect (Rs.)</th>
                         <th style="background-color:#cecece;">Order (Rs.)</th>
                         <th style="background-color:#cecece;">Closing Date</th>
                        
                    </tr>
  ';
  while($row2 = mysqli_fetch_assoc($query2))
  {
      $ida=$row2['company_id'];
       $query_a= mysqli_query($con, "SELECT * FROM companies WHERE company_id='$ida'");
                                $row_a=mysqli_fetch_assoc($query_a);
   $output .= '
   
    <tr align="left">  
                         <td>'.$row2["date"].'</td>
                         <td>'.$row_a["company_name"].'</td>  
                         <td>'.$row_a["city"].'</td>
                         <td>'.$row2["requirement"].'</td>
                         <td>'.$row2["prospect_value"].'</td>
                         <td>'.$row2["order_value"].'</td>  
                         <td>'.$row2["closing_date"].'</td>  
                         
                         
                    </tr>
   
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
  
 } else {
    header( "refresh:3;url=generate.php" );
    ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard | Techworth SLMRS</title>

<link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="css/style.css" />

</head>
<body>
<div id="notfound">
<div class="notfound">
<div class="notfound-404">
<h1>Oops!</h1>
<h2>No Record found!</h2>
</div>
<a href="#">You will be redirected in 3s</a>
</div>
</div>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>
</html>

    
    <?php
 }
       
 }
?>
