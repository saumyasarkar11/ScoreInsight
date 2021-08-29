<?php

session_start();

if(!$_SESSION['username'])
{
  header('location: user_login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
	<title>Dashboard | SCORE USER</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/favicon.png"/>
	
	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['./assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<style>
		.clock {
    position: absolute;
    top: 50%;
    left: 10%;
    transform: translateX(-50%) translateY(-50%);
    color: #fff;
    font-size: 15px;
    font-family: Lato;
    letter-spacing: 3px;
   
}

tbody{
    padding:0px 0px 0px 0px ;
}

button{
    padding:5px 10px 5px 10px;
}
.my-custom-scrollbar {
position: relative;
height: 420px;
overflow: auto;
}
	</style>

	<!-- CSS Files -->
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/datatables.min.css">
	<link rel="stylesheet" href="./assets/css/atlantis.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="./assets/css/demo.css">
	 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="#" class="logo">
					<img src="./assets/img/score-console-logo.png" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					
					<div id="MyClockDisplay" align="left" class="clock" onload="showTime()"></div>
						<script>
							function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
						</script>
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
						
							<?php
											$username=$_SESSION['username'];
											$sql = mysqli_query($con, "SELECT * FROM users WHERE email='$username'");
											$row=mysqli_fetch_assoc($sql);
											
											?>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									 <img src="<?php $image_src2 = $row['logoname']; echo "../admin/upload/".$image_src2.""; ?> " class="avatar-img rounded-circle" alt="...">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"> <img src="<?php $image_src2 = $row['logoname']; echo "../admin/upload/".$image_src2.""; ?> " class="avatar-img rounded-circle" alt="..."></div>
										
											
											<div class="u-text">
												<h6><?php echo $row['name']; ?></h6>
												<p style="margin-top:-5px;" class="text-muted"><?php echo $username; ?></p><a href="profile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										
									
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select <span class="text-danger">Logout</span> below if you are ready to end your current session.</div>
        <div class="modal-footer">
             <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
            <form action="code.php" method="post">
                <button class="btn btn-primary" type="submit" name="logout_btn" >Logout</button>
            </form>
         
          
        </div>
      </div>
    </div>
  </div>