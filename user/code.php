<?php
session_start();
include 'db.php'; 
if(isset($_POST['addprospect'])){
	$user_id = $_POST['user_id'];
	$company = $_POST['company'];
	$prospect_value = $_POST['prospect_value'];
	$followup_date = $_POST['followup_date'];
	$status = $_POST['status'];
	$comments = $_POST['comments'];
	$check_list = $_POST['check_list'];
	$date = date("d-m-Y");
	$date2 = date("Y-m-d");
	$check1 = '';
	foreach($check_list as $check) {
		$check1 .= $check.", ";
}

$query = mysqli_query($con, "INSERT INTO prospects VALUES (NULL, '$company', '$user_id', '$status', '$check1', '$prospect_value', '0', '$followup_date', '', '$date', '$date2')") ;
$query_a = mysqli_query($con, "SELECT * FROM prospects WHERE company_id = '$company' AND requirement = '$check1'");
$row = mysqli_fetch_assoc($query_a);
$prospect = $row['prospect_id'];
$unread = "Unread";

$query_b = mysqli_query($con, "INSERT INTO converations VALUES (NULL, '$prospect', '$comments', NULL, '$unread')") ;
 
	$_SESSION['SUCCESS'] = "Prospect Added";
	header('location: overview.php');


}

	if(isset($_POST['loginbtn1'])) {
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$l1="1";
			
		$query= "SELECT * FROM users WHERE email='$email' ";
		$query_run= mysqli_query($con, $query);
	$row= mysqli_fetch_assoc($query_run);

		if ($row['designation_id']!=$l1 AND $row['password'] == $password AND $row['status']!='Inactive') {
			$_SESSION['username'] = $email;
			header('location: overview.php');
		} else {
	
			$_SESSION['status'] = 'Invalid Email or Password';
			header('location: user_login.php');      
	
		}
	}
	
	if(isset($_POST['loginbtn'])) {
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$l1="1";
			
		$query= "SELECT * FROM users WHERE email='$email' ";
		$query_run= mysqli_query($con, $query);
	$row= mysqli_fetch_assoc($query_run);

		if ($row['designation_id']!=$l1 AND $row['password'] == $password ) {
			$_SESSION['username'] = $email;
			header('location: overview.php');
		} else {
	
			$_SESSION['status'] = 'Invalid Email or Password';
			header('location: user_login.php');      
	
		}
	}

	if(isset($_POST['logout_btn'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: user_login.php');
	}

	if(isset($_POST['addcompany'])){
		$user_id = $_POST['user_id'];
		$company_name = $_POST['company_name'];
		$type = $_POST['type'];
		$gstn = $_POST['gstn'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$pin = $_POST['pin'];
		$country = $_POST['country'];
		$phone = $_POST['phone'];
		$whatsapp = $_POST['whatsapp'];
		$email = $_POST['email'];
		$alt_email = $_POST['alt_email'];
		$contact_1 = $_POST['contact_1'];
		$designation_1 = $_POST['designation_1'];
		$phone_1 = $_POST['phone_1'];
		$whatsapp_1 = $_POST['whatsapp_1'];
		$whatsapp_2 = $_POST['whatsapp_2'];
		$website = $_POST['website'];
		$email_1 = $_POST['email_1'];
		$contact_2 = $_POST['contact_2'];
		$designation_2 = $_POST['designation_2'];
		$phone_2 = $_POST['phone_2'];
		$email_2 = $_POST['email_2'];
		
	
	$query = mysqli_query($con, "INSERT INTO companies VALUES (NULL, '$user_id', '$company_name', '$type', '$gstn', '$address', '$city', '$state', '$pin', '$country', '$phone'
	, '$whatsapp', '$email', '$alt_email', '$website','$contact_1', '$designation_1', '$phone_1', '$whatsapp_1', '$email_1', '$contact_2', '$designation_2', '$phone_2', '$whatsapp_2', '$email_2')") ;
	
	if ($query){
	 
		$_SESSION['SUCCESS'] = "Company Added";
		header('location: companies.php');
	
	
	} else {
	
		$_SESSION['Failure'] = "Company Not Added";
		header('location: companies.php');
	
	}
	
	}

	if(isset($_POST['addcomment'])){
		$id = $_POST['id'];
		$statement = $_POST['statement'];
		$unread = "Unread";

		$query = mysqli_query($con, "INSERT INTO converations VALUES (NULL, '$id', '$statement', now(), '$unread')") ;
  
		$_SESSION['SUCCESS'] = "Comment Added";
		header('location: overview.php');

	}

	if(isset($_POST['changepassword'])){
		$id = $_POST['edit_id'];
		$phone = $_POST['phone'];
		$pass=$_POST['password'];
		$password = md5($pass);
		$confirmpassword = md5($_POST['confirmpassword']);
		
		if ($password==$confirmpassword){
			$query = "UPDATE users SET password = '$password', unknown='$pass' WHERE user_id ='$id'";
			$query_run = mysqli_query($con, $query);		
		}		
	
		if ($query_run){
			$_SESSION['SUCCESS'] = "User Password Updated";
			header('location: profile.php');
		} else {
			$_SESSION['Failure'] = "Passwords Do Not Match";
			header('location: profile.php');
		}	
	}
	
	if(isset($_POST['updateadmin'])){
		$id = $_POST['edit_id'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];

		$query10= mysqli_query($con, "SELECT * FROM users where user_id='$id'");                                           
		$row=mysqli_fetch_assoc($query10);                       
                                                                                
		if($email==$row['email']){
			$query1 = "UPDATE users SET name = '$name', phone='$phone', email = '$email' WHERE user_id ='$id'";
			$query_run = mysqli_query($con, $query1);
			if ($query_run){
				$_SESSION['SUCCESS'] = "User Details Updated";
				header('location: profile.php');
			} else {
				$_SESSION['Failure'] = "User Details Not Updated";
				header('location: profile.php');
			}
		} else {
			$query_1 = "UPDATE users SET name = '$name', phone='$phone', email = '$email' WHERE user_id ='$id'";
			$query_run_1 = mysqli_query($con, $query_1);
			if ($query_run_1){
				session_destroy();
				unset($_SESSION['username']);
				header('location: profile.php');
			}
		}
	}
	
	if(isset($_POST['addreport'])){
	$date = $_POST['date'];
	$user_id = $_POST['user_id'];
	$expenses = $_POST['expenses'];
	$logoname = $_FILES['file']['name'];
	$logoname1 = $_FILES['expenses']['name'];
	$target_dir = "reports/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$target_file1 = $target_dir . basename($_FILES["expenses"]["name"]);
	$date2 = date("Y-m-d");

	// Select file type
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    	$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
	// Valid file extensions
	$extensions_arr = array("docx","xlsx","pdf");
  
	// Check extension
	if( in_array($imageFileType,$extensions_arr) AND in_array($imageFileType1,$extensions_arr) ){		
		$query = "INSERT INTO reports VALUES (NULL, '$user_id', '$date', '$logoname', '$logoname1', '$date2')";
		$query_run = mysqli_query($con, $query);
	}
	
	if ($query_run){
        	move_uploaded_file($_FILES['expenses']['tmp_name'],$target_dir.$logoname1);
        	move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$logoname);
		$_SESSION['SUCCESS'] = "Report Added";
		header('location: report.php');
	} else {
		$_SESSION['Failure'] = "Report Not Added";
	   	// header('location: report.php');
	
	}



}


if(isset($_POST['updatereport'])){
	$id = $_POST['edit_id'];
	$date = $_POST['date'];
	$default = $_POST['default'];
	$default1 = $_POST['default1'];
	$logoname = $_FILES['file']['name'];
	$logoname1 = $_FILES['expenses']['name'];
	$target_dir = "reports/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$target_file1 = $target_dir . basename($_FILES["expenses"]["name"]);
  	$extensions_arr = array("docx","xlsx","pdf");
  	
	
	if(empty($logoname) AND empty($logoname1)){
		$query = "UPDATE reports SET date = '$date', expenses='$default1', report='$default' WHERE report_id ='$id'";
		$query_run = mysqli_query($con, $query);
	
			if ($query_run){
	
			$_SESSION['SUCCESS'] = "Report Details Updated";
		    header('location: report.php');
		
	    	} else {
	
			$_SESSION['Failure'] = "Report Details Not Updated";
		    
			    header('location: report.php');
			}
			
	} else if (empty($logoname)){
	
	    $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
	// Valid file extensions

  
	  if( in_array($imageFileType1,$extensions_arr) ){
			$query1 = "UPDATE reports SET date = '$date', expense='$logoname1', report='$default' WHERE report_id ='$id'";
			$query_run1 = mysqli_query($con, $query1);
		
				if ($query_run1){
				    
				    unlink($targetdir.$default1);
				move_uploaded_file($_FILES['expenses']['tmp_name'],$target_dir.$logoname1);
				 
				
				header('location: report.php');
		
			} else {
		
			  header('location: report.php');
			
			}
		}
	} else if (empty($logoname1)){
	    
	         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  
	  if( in_array($imageFileType,$extensions_arr) ){
			$query2 = "UPDATE reports SET date = '$date', expense='$default1', report='$logoname' WHERE report_id ='$id'";
			$query_run2 = mysqli_query($con, $query2);
			
		if ($query_run2){
		    
		    unlink($targetdir.$default);
				move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$logoname);
				 
				
				header('location: report.php');
		
			} else {
		
			
				header('location: report.php');
			
			}
		}
	    
	} else {
	    
	       $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	       
	          $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));

  
	  if( in_array($imageFileType,$extensions_arr) AND in_array($imageFileType1,$extensions_arr)){
			$query3 = "UPDATE reports SET date = '$date', expense='$logoname1', report='$logoname' WHERE report_id ='$id'";
			$query_run3 = mysqli_query($con, $query3);
			
		if ($query_run3){
		    
		    unlink('reports/'.$default);
		    unlink('reports/'.$default1);
		    
				move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$logoname);
				 
				 
				 move_uploaded_file($_FILES['expenses']['tmp_name'],$target_dir.$logoname1);
				 
				
				header('location: report.php');
		
			} else {
		
			
				header('location: report.php');
			
			}
	    
	}


}

}
	?>
