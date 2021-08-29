<?php
include 'db.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

       
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
           
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            	<div class="card-header">
									<div class="card-title">Profile</div>
								</div> 
                            <div class="card-body">
                             <?php
                           
                                $query= mysqli_query($con, "SELECT * FROM users where email='$username'");                                           
                                $row=mysqli_fetch_assoc($query);
                               
                                $query1= mysqli_query($con, "SELECT * FROM financialyear where f_id='1'");                                           
                                $row1=mysqli_fetch_assoc($query1);
                            
                                
                            ?>

 <form action="code.php" method="POST">
     
     <input type="hidden" name="edit_id" value="<?php echo $row['user_id']; ?>">
              <div class="form-group">

<label>Name </label>
    <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" placeholder="Enter Name" required>
</div>


              <div class="form-group">

<label>Phone </label>
    <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" placeholder="Enter Name" required>
</div>
    <div class="form-group">
<label>Email </label>
    <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>" placeholder="Enter Email" required>
</div>

    <div class="form-group">
<label>Accounting Period</label>
 <div class="row">
     
    <div class="col-md-5">
      <input type="text" id="datepicker" name="open" class="form-control" placeholder="From" value="<?php echo $row1['open']; ?>">
    </div><p style="margin-top:5px;">to</p>
    <div class="col-md-5">
      <input type="text" id="datepicker_1" name="close" class="form-control" placeholder="To" value="<?php echo $row1['close']; ?>">
    </div>
  </div>
</div>

           <table><tr><td>   <button style="margin-left:10px;" type="submit" name="updateadmin" class="btn btn-success"> Update </button>

          </form></td><td>
          
          <form action="user_password_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['user_id']; ?>">
                    <button type="submit" class="btn btn-primary" name="edit_btn"> Change Password  </button></form></td></tr></table>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
							<div class="card card-profile">
								<div class="card-header" style="background-image: url('./assets/img/blogpost.jpg')">
									<div class="profile-picture">
										<div class="avatar avatar-xl">
										    <img src="<?php $image_src2 = $row['logoname']; echo "upload/".$image_src2.""; ?> " class="avatar-img rounded-circle" alt="...">
											
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="user-profile text-center">
										<div class="name"><?php echo $row['name']; ?></div>
										<div class="job"><?php
                                    $d_id = $row['designation_id'];
                                    $query_1 = mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d_id'");
                                    $row_1 = mysqli_fetch_assoc($query_1);
                                    echo "".$row_1['name']."";
                                    ?></div><br>
										
									<p align="left">Phone: <?php echo $row['phone']; ?></p>
									<p style="margin-top:-15px;" align="left">Email: <?php echo $row['email']; ?></p>
									<!-- <p style="margin-top:-15px;" align="left">Accounting Period: <?php echo $row1['open']; ?> to <?php echo $row1['close']; ?></p>  -->
										
									</div>
								</div>
								<div class="card-footer">
									<div class="row user-stats text-center">
										<div class="col">
											<div class="number"><?php   $query_4 = mysqli_query($con, "SELECT * FROM companies");
											$number3=mysqli_num_rows($query_4);
											echo $number3;?></div>
											<div class="title">Companies</div>
										</div>
										<div class="col">
											<div class="number"><?php   $query_3 = mysqli_query($con, "SELECT * FROM users WHERE designation_id!='1'");
											$number2=mysqli_num_rows($query_3);
											echo $number2;?></div>
											<div class="title">Users</div>
										</div>
										<div class="col">
											<div class="number"><?php   $query_2 = mysqli_query($con, "SELECT * FROM prospects");
											$number1=mysqli_num_rows($query_2);
											echo $number1;?></div>
											<div class="title">Prospects</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
                    
               
<?php
include 'includes/footer.php';
?>

<script>
    $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "yy-mm-dd",
    });
   } );

  $( function() {
    $( "#datepicker_1" ).datepicker({
      dateFormat: "yy-mm-dd",
    });
   } );
</script>