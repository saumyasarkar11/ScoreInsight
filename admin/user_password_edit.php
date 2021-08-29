<?php
include 'db.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>
<?php
                            if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    $query_g= mysqli_query($con, "SELECT * FROM users where user_id='$id'");
    $row_g = mysqli_fetch_assoc($query_g);
}
    // output data of each row
$d_id = $row_g['designation_id'];
                                    $query_1 = mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d_id'");
                                    $row_1 = mysqli_fetch_assoc($query_1);
        ?>
	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
           
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            	<div class="card-header">
									
								<div class="avatar-lg"> <img src="<?php $image_src2 = $row_g['logoname']; echo "upload/".$image_src2.""; ?> " class="avatar-img rounded-circle" alt="..."></div><div class="card-title"><?php echo "".$row_g['name'].", ".$row_1['name']." (".$row_1['level'].")"; ?></div> </div> 
                            <div class="card-body">

          <form action="code.php" method="POST">

          
                
              <input type="hidden" name="edit_id" value="<?php echo $id; ?>" >

              <input type="hidden" name="phone" value="<?php echo $row_g['phone']; ?>" >

              <div class="form-group">

<label>Password </label>
    <input type="text" name="password" class="form-control" placeholder="Enter Password Here" required>
</div>

<div class="form-group">

<label>Confirm Password</label>
    <input type="text" name="confirmpassword" class="form-control" placeholder="Confirm Password Here" required>
</div>



<a style="margin-left:10px;" href="<?php if ($id==1){echo "profile.php";} else {echo "users.php";}?>" class="btn btn-danger" > Cancel  </a>
              <button type="submit" name="changepassword" class="btn btn-primary"> Update </button>

          </form>




                            </div>
                        </div>
                    </div>
                </div>
</div>
            </div>
<?php
include 'includes/footer.php';
?>