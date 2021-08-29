<?php
session_start();
?>
<!DOCTYPE html>
<!-- saved from url=(0083)https://themekita.com/demo-atlantis-bootstrap/livepreview/examples/demo1/login.html -->
<html lang="en" class="wf-lato-n4-active wf-lato-n7-active wf-flaticon-n4-inactive wf-simplelineicons-n4-active wf-lato-n3-active wf-lato-n9-active wf-fontawesome5solid-n4-active wf-fontawesome5regular-n4-active wf-fontawesome5brands-n4-active wf-active"><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
	<link rel="icon" href="assets/img/favicon.png">

	<!-- Fonts and icons -->
	<script src="Login_files/webfont.min.js.download"></script>
	<link rel="stylesheet" href="Login_files/css" media="all"><link rel="stylesheet" href="Login_files/fonts.min.css" media="all"><script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
	<!-- CSS Files -->
	<link rel="stylesheet" href="Login_files/bootstrap.min.css">
	<link rel="stylesheet" href="Login_files/atlantis.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login" >
		<div class="container container-login animated fadeIn" style="display: block; margin-top:-50px;">
		<table align="center" style="margin-top:-20px;"><tr><td>
		<img src="assets/img/pi.png" height="" width=""></td><td style="padding-top:8px;"><h1 style="font-family:Montserrat;">&nbsp;</h1>
	</td></tr></table> 
	<table align="center" style="margin-top:10px;"><tr><td>
	<h6>User Login</h6>
	</td></tr></table> 
	
	<form action="code.php" method="POST">
	    	<div class="login-form">
				<div class="form-group form-floating-label">
					<input type="email" id="email" name="email" class="form-control input-border-bottom" required="true">
					<label for="username" class="placeholder">Email</label>
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="password" type="password" class="form-control input-border-bottom" required="true">
					<label for="password" class="placeholder">Password</label>
					<div class="show-password">
						<i class="icon-eye"></i>
					</div>
				</div>
				<div class="form-group"><a href="forgot.php">Forgot Password?</a></div>
				<div class="form-action mb-3">
					<button type="submit" name="loginbtn1" class="btn btn-primary btn-rounded btn-login" style="padding:10px 5px 10px 5px;">Login</button>
				</div>
					</form>
				  <?php
                     
                     if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
                      echo '<p class="text-danger" align="center"> '.$_SESSION['status']. '</p>';
                      unset($_SESSION['status']);
                     }

                     ?>
                     
                     <?php
                     
                     if(isset($_SESSION['status3']) && $_SESSION['status3'] !=''){
                      echo '<p class="text-success" align="center"> '.$_SESSION['status3']. '</p>';
                      unset($_SESSION['status3']);
                     }

                     ?>
				<div class="login-account">
					<small><span class="msg">&#169; <?php echo date("Y"); ?> Copyright | Designed and Developed by <a href="https://saumyasarkar.com" target=_blank>Saumya Sarkar</a></small>				</div>
			</div>

		
		</div>

	
	<script src="./Login_files/jquery.3.2.1.min.js.download"></script>
	<script src="./Login_files/jquery-ui.min.js.download"></script>
	<script src="./Login_files/popper.min.js.download"></script>
	<script src="./Login_files/bootstrap.min.js.download"></script>
	<script src="./Login_files/atlantis.min.js.download"></script>

</body></html>
