<?php
session_start();
include 'db.php'; 
if(isset($_POST['insertuser'])){
	$name = $_POST['name'];
	$designation = $_POST['designation'];
	$code = $_POST['code'];
	$branch = $_POST['branch'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$head = $_POST['head'];

	$phone = $_POST['phone'];
	$password1=$_POST['password'];
    $password2 = md5($_POST['password']);
	$date = date("d-m-Y");
	$status="Active";

	$logoname = $_FILES['file']['name'];
	$target_dir = "upload/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
  
	// Select file type
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
	// Valid file extensions
	$extensions_arr = array("jpg","jpeg","png","gif");
  
	// Check extension
	if( in_array($imageFileType,$extensions_arr) ){

		
		$query = "INSERT INTO users VALUES (NULL, '$code', '$branch', '$name', '$designation', '$head', '$phone', '$email', '$password2', '$city', '$date', '$status', '$logoname', '$password1' )";
		$query_run = mysqli_query($con, $query);

}
	
	if ($query_run){
 
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$logoname);
		$_SESSION['SUCCESS'] = "UserAdded";
		header('location: users.php');


	} else {

		$_SESSION['Failure'] = "User Not Added";
		header('location: users.php');
	
	}



}


if(isset($_POST['updateuser'])){
	$id = $_POST['edit_id'];
	$name = $_POST['name'];
	$designation = $_POST['designation'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$default = $_POST['default'];
	$code = $_POST['code'];
	$status = $_POST['status'];
	$branch = $_POST['branch'];
	$head=$_POST['head'];
    
	$logoname = $_FILES['file']['name'];
	if(empty($logoname)){
		$query = "UPDATE users SET code = '$code', name = '$name', designation_id = '$designation', branch = '$branch', status = '$status', city = '$city', phone='$phone', email = '$email', logoname='$default', head='$head' WHERE user_id ='$id'";
		$query_run = mysqli_query($con, $query);
	
			if ($query_run){
	
			$_SESSION['SUCCESS'] = "User Details Updated";
			if ($status="Active"){
			    header('location: users.php');
			} else {
			    header('location: inactive.php');
			}
			
	
		} else {
	
			$_SESSION['Failure'] = "User Details Not Updated";
		    	if ($status="Active"){
			    header('location: users.php');
			} else {
			    header('location: inactive.php');
			}
		
		}
	} else {
		$target_dir = "upload/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
	  
		// Select file type
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	  
		// Valid file extensions
		$extensions_arr = array("jpg","jpeg","png","gif");
	  
		// Check extension
		if( in_array($imageFileType,$extensions_arr) ){
			$query1 = "UPDATE users SET code = '$code', name = '$name', designation_id = '$designation', branch = '$branch', status = '$status', city = '$city', phone='$phone', email = '$email',  logoname='$logoname', head='$head' WHERE user_id ='$id'";
			$query_run1 = mysqli_query($con, $query1);
		
				if ($query_run1){
		        unlink('upload/'.$default);
					move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$logoname);
				$_SESSION['SUCCESS'] = "User Details Updated";
				header('location: users.php');
		
			} else {
		
				$_SESSION['Failure'] = "User Details Not Updated";
				header('location: users.php');
			
			}
		}
	}


}


if(isset($_POST['deleteuser'])){

	$id = $_POST['delete_id'];
$name = $_POST['delete_image'];
	$file_to_delete = 'upload/'.$name.'';
    unlink($file_to_delete);

	$query = "DELETE FROM users WHERE user_id ='$id'";
	$query_run = mysqli_query($con, $query);


	if ($query_run){

		$_SESSION['SUCCESS'] = "User Deleted";
		header('location: users.php');

	} else {

		$_SESSION['Failure'] = "User Not Deleted";
		header('location: users.php');
	
	}
}


if(isset($_POST['insertcity'])){
	$name = $_POST['name'];
	
		$query = "INSERT INTO cities VALUES (NULL, '$name')";
		$query_run = mysqli_query($con, $query);

		if ($query_run){

			$_SESSION['SUCCESS'] = "City Added";
			header('location: cities.php');
	
		} else {
	
			$_SESSION['Failure'] = "City Not Added";
			header('location: cities.php');
		
		}
	}


	if(isset($_POST['updatecity'])){
		$id = $_POST['edit_id'];
		$name = $_POST['name'];
	
		$query = "UPDATE cities SET name = '$name' WHERE city_id ='$id'";
		$query_run = mysqli_query($con, $query);
	
			if ($query_run){
	
			$_SESSION['SUCCESS'] = "City Details Updated";
			header('location: cities.php');
	
		} else {
	
			$_SESSION['Failure'] = "City Details Not Updated";
			header('location: cities.php');
		
		}
	
	}
	




	
if(isset($_POST['insertservice'])){
	$name = $_POST['name'];
	$number = $_POST['number'];
	
		$query = "INSERT INTO services VALUES (NULL, '$number', '$name')";
		$query_run = mysqli_query($con, $query);

		if ($query_run){

			$_SESSION['SUCCESS'] = "Service Added";
			header('location: services.php');
	
		} else {
	
			$_SESSION['Failure'] = "Service Not Added";
			header('location: services.php');
		
		}
	}


	if(isset($_POST['updateservice'])){
		$id = $_POST['edit_id'];
		$name = $_POST['name'];
	
		$query = "UPDATE services SET name = '$name' WHERE service_id ='$id'";
		$query_run = mysqli_query($con, $query);
	
			if ($query_run){
	
			$_SESSION['SUCCESS'] = "Service Details Updated";
			header('location: services.php');
	
		} else {
	
			$_SESSION['Failure'] = "Service Details Not Updated";
			header('location: services.php');
		
		}
	
	}


	if(isset($_POST['loginbtn'])) {
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$l="1";
	
		$query= "SELECT * FROM users WHERE email='$email'";
		$query_run= mysqli_query($con, $query);
	$row= mysqli_fetch_assoc($query_run);

		if ($row['designation_id']==$l AND $row['password']==$password) {
			$_SESSION['adminusername'] = $email;
		
		header('location: overview.php');
		} else {
	
			$_SESSION['status1'] = 'Invalid Email or Password';
			header('location: login.php');      
	
		}
	}

	if(isset($_POST['logout_btn'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}

	if(isset($_POST['changepassword'])){
		$id = $_POST['edit_id'];
		$phone = $_POST['phone'];
		$password1 = $_POST['password'];
		$password2 = md5($_POST['password']);
		$confirmpassword = md5($_POST['confirmpassword']);
		if ($id!=1){
		    	if ($password2==$confirmpassword){
		$query = "UPDATE users SET password = '$password2', unknown = '$password1' WHERE user_id ='$id'";
		$query_run = mysqli_query($con, $query);
		
	}		
	
			if ($query_run){
	
           $_SESSION['SUCCESS'] = "User Password Updated";

			header('location: users.php');
		} else {
	
			$_SESSION['Failure'] = "Passwords Do Not Match";
			header('location: users.php');
		
		}
		} else {
		    	    	if ($password2==$confirmpassword){
		$query = "UPDATE users SET password = '$password2', unknown = '$password1' WHERE user_id ='$id'";
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

	
	}

	if(isset($_POST['inserttype'])){
		$type = $_POST['type'];
		$number = $_POST['number'];
		
			$query = "INSERT INTO company_type VALUES (NULL, '$number', '$type')";
			$query_run = mysqli_query($con, $query);
	
			if ($query_run){
	
				$_SESSION['SUCCESS'] = "Type Added";
				header('location: company_types.php');
		
			} else {
		
				$_SESSION['Failure'] = "Type Not Added";
				header('location: company_types.php');
			
			}
		}
		
			if(isset($_POST['insertbranch'])){
	
		$name = $_POST['name'];
		
			$query = "INSERT INTO branch VALUES (NULL, '$name')";
			$query_run = mysqli_query($con, $query);
	
			if ($query_run){
	
				$_SESSION['SUCCESS'] = "Branch Added";
				header('location: branch.php');
		
			} else {
		
				$_SESSION['Failure'] = "Branch Not Added";
				header('location: branch.php');
			
			}
		}


		if(isset($_POST['insertdesignation'])){
			$name = $_POST['name'];
			$number = $_POST['number'];
			
			if ($number == 'L2'){
			    	$query = "INSERT INTO designation VALUES (2, '$number', '$name')";
				$query_run = mysqli_query($con, $query);
			} else if ($number == 'L3'){
			    	$query = "INSERT INTO designation VALUES (3, '$number', '$name')";
				$query_run = mysqli_query($con, $query);
			} else if ($number == 'L4'){
			    	$query = "INSERT INTO designation VALUES (4, '$number', '$name')";
				$query_run = mysqli_query($con, $query);
			} else if ($number == 'L5'){
			    	$query = "INSERT INTO designation VALUES (5, '$number', '$name')";
				$query_run = mysqli_query($con, $query);
			} else if ($number == 'L6'){
			    	$query = "INSERT INTO designation VALUES (6, '$number', '$name')";
				$query_run = mysqli_query($con, $query);
			}
			
		
				if ($query_run){
		
					$_SESSION['SUCCESS'] = "Designation Added";
					header('location: designation.php');
			
				} else {
			
					$_SESSION['Failure'] = "Designation Not Added";
					header('location: designation.php');
				
				}
			}
			
		if(isset($_POST['transfer'])){
		$id = $_POST['prospect_id'];
		$ida = $_POST['company_id'];
		$idb = $_POST['user_id'];
	
		$query = "UPDATE prospects SET user_id = '$idb' WHERE prospect_id ='$id'";
		$query_run = mysqli_query($con, $query);
		
		$query_1 = "UPDATE companies SET user_id = '$idb' WHERE company_id ='$ida'";
		$query_run_1 = mysqli_query($con, $query_1);
	
			if ($query_run_1){
	
			$_SESSION['SUCCESS'] = "Prospect Tranferred";
			header('location: overview.php');
	
		} else {
	
			$_SESSION['Failure'] = "Prospect Not Tranferred";
			header('location: overview.php');
		
		}
	
	}
	
		if(isset($_POST['transferc'])){

		$ida = $_POST['company_id'];
		$idb = $_POST['user_id'];
	
		$query_1 = "UPDATE companies SET user_id = '$idb' WHERE company_id ='$ida'";
		$query_run_1 = mysqli_query($con, $query_1);
	
			if ($query_run_1){
	
			$_SESSION['SUCCESS'] = "Company Tranferred";
			header('location: companies.php');
	
		} else {
	
			$_SESSION['Failure'] = "Company Not Tranferred";
			header('location: companies.php');
		
		}
	
	}
	
	if(isset($_POST['updateadmin'])){
	$id = $_POST['edit_id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$open = $_POST['open'];
	$close = $_POST['close'];

                         
    $query10= mysqli_query($con, "SELECT * FROM users where user_id='$id'");                                           
                                $row=mysqli_fetch_assoc($query10);
                               ;
                            
                                
                    
	if($email==$row['email']){
		$query1 = "UPDATE users SET name = '$name', phone='$phone', email = '$email' WHERE user_id ='$id'";
		$query_run = mysqli_query($con, $query1);
		
		$query2 = "UPDATE financialyear SET open = '$open', close='$close' WHERE f_id ='1'";
		$query_run2 = mysqli_query($con, $query2);
	
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
		
			$query2 = "UPDATE financialyear SET open = '$open', close='$close' WHERE f_id ='1'";
		$query_run2 = mysqli_query($con, $query2);
			if ($query_run_1){
	
			 session_destroy();
	        	unset($_SESSION['username']);
	        	header('location: profile.php');
			}
	
	}
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
	
		
	
?>

