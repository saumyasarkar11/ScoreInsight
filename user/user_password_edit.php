<?php
include 'db.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>
	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
           
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            	<div class="card-header">
									<div class="card-title">Edit Password</div>
								</div> 
                            <div class="card-body">
<?php
                            if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    $query_g= mysqli_query($con, "SELECT * FROM users where user_id='$id'");
    $row_g = mysqli_fetch_assoc($query_g);
  
    // output data of each row


         
        ?>

          <form action="code.php" method="POST">

          
                
              <input type="hidden" name="edit_id" value="<?php echo $id; ?>" >

              <input type="hidden" name="phone" value="<?php echo $row_g['phone']; ?>" >

              <div class="form-group">

<label>Password </label>
    <input type="text" name="password" id="pass1" class="form-control" onkeyup="disable()" placeholder="Enter Password Here" required>
</div>

<div class="form-group">

<label>Confirm Password</label>
    <input type="password" name="confirmpassword" id="pass2" class="form-control" placeholder="Confirm Password Here" onkeyup="disable()" required>
</div>
<p style="display:none; margin-left:10px;" class="text-danger" id="match_message">Passwords Donot Match!</p>


<a style="margin-left:10px;" href="<?php if ($id==1){echo "profile.php";} else {echo "overview.php";}?>" class="btn btn-danger" > Cancel  </a>
              <button type="submit" id="update" name="changepassword" class="btn btn-primary"> Update </button>

          </form>
    <?php
    
}
?>



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
    function disable(){
        var pass1=document.getElementById('pass1').value;
        var pass2=document.getElementById('pass2').value;
        if(pass1!=pass2){
            document.getElementById('update').disabled=true;
            document.getElementById('match_message').style.display='block';
            
        } else {
            document.getElementById('update').disabled=false;
            document.getElementById('match_message').style.display='none';
        }
    }
</script>