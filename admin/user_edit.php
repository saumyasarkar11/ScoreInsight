<?php
include 'db.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>
<?php
                            if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    
    $sql = "SELECT * FROM users WHERE user_id = '$id'";
$result = $con->query($sql);

  
    // output data of each row
$row = mysqli_fetch_assoc($result);

         
        ?>
        	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
           
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            	<div class="card-header">
								<div class="card-title">Edit User</div>
										<div class="avatar-lg"> <img src="<?php $image_src2 = $row['logoname']; echo "upload/".$image_src2.""; ?> " class="avatar-img rounded-circle" alt="..."></div></div>
							
                            <div class="card-body">


          <form action="code.php" method="POST" enctype="multipart/form-data">

          
                
              <input type="hidden" name="edit_id" value="<?php echo $row['user_id'] ?>" >
              
              <div class="form-group">

<label>Employee Code </label>
    <input type="text" name="code" id="code" class="form-control" value="<?php echo $row['code']; ?>" placeholder="Enter Code" required>
</div>


              <div class="form-group">

<label>Name </label>
    <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" placeholder="Enter Name" required>
</div>

 <div class="form-group">
                <label>Designation</label>
                <select name="designation" class="form-control" >
                 <?php
                 $abc=$row['designation_id'];
                 $query_g_1= mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$abc'");
                 $row_g_1 = mysqli_fetch_assoc($query_g_1);
                 ?>
                <option value="<?php echo $row_g_1['designation_id']; ?>" selected hidden><?php echo "".$row_g_1['name']." (".$row_g_1['level'].")"; ?></option>
                <?php
                $query_g= mysqli_query($con, "SELECT * FROM designation WHERE name != 'Admin'");
                while ($row_g = mysqli_fetch_assoc($query_g)){
                ?>
                <option value="<?php echo $row_g['designation_id']; ?>"><?php echo "".$row_g['name']." (".$row_g['level'].")"; ?></option>
                <?php                    
                }
                ?>
                </select>
                </div>
                <?php
               $head= $row['head'];
                $query_5= mysqli_query($con, "SELECT * FROM users WHERE user_id='$head'");
              $row_5 = mysqli_fetch_assoc($query_5);
              $des=$row_5['designation_id'];
                $query_6= mysqli_query($con, "SELECT * FROM designation WHERE designation_id='$des'");    
                   $row_6 = mysqli_fetch_assoc($query_6);
                ?>
                
                  <div class="form-group" style="display:block;" >
                <label>Report To Level</label>
                <select type="text" id="random" name="random" class="form-control" onchange="zero1()">
               <option value="<?php echo $row_6['designation_id']; ?>" selected hidden><?php echo $row_6['level']; ?></option>
                <?php
               
                $query_a= mysqli_query($con, "SELECT * FROM designation");
                while ($row_a = mysqli_fetch_assoc($query_a)){
                    
                  
                ?>
                <option value="<?php echo $row_a['designation_id']; ?>"><?php echo "".$row_a['level'].""; ?></option>
                <?php                    
                }
                ?>
                </select>
                </div>
                
                <div class="form-group">
                <label>Branch</label>
                <select name="branch" class="form-control" id="branch" onchange="zero()" >
                    <option value="" selected hidden>Choose here...</option>
                <?php
                 $abcd=$row['branch'];
                 $query_n_1= mysqli_query($con, "SELECT * FROM branch WHERE branch_id = '$abcd'");
                 $row_n_1 = mysqli_fetch_assoc($query_n_1);
                 ?>
                <option value="<?php echo $row_n_1['branch_id']; ?>" selected hidden><?php echo $row_n_1['name']; ?></option>
                <?php
                $query_n = mysqli_query($con, "SELECT * FROM branch");
                while ($row_n = mysqli_fetch_assoc($query_n)){
                ?>
                <option value="<?php echo $row_n['branch_id']; ?>"><?php echo $row_n['name']; ?></option>
                <?php                    
                }
                ?>
                </select>
                </div>

                <div class="form-group" id="level6div">
                <label>Report To</label>
                <select type="text" id="fetch" name="head" class="form-control" >
                <option value="<?php echo $row_5['user_id']; ?>" selected hidden><?php echo $row_5['name']; ?></option>
               
                </select>
                </div>

 <script>   
                    function zero1(){
                       document.getElementById('branch').value="";
                       document.getElementById('fetch').value="";
                    }
                </script>
                
                <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" >
                <option value="<?php echo $row['status']; ?>" selected hidden><?php echo $row['status']; ?></option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
               
                </select>
                </div>
                
    <div class="form-group">
                <label>City</label>
                <select name="city" class="form-control" >
                <option value="<?php echo $row['city']; ?>" selected hidden><?php echo $row['city']; ?></option>
                <?php
                $query_g= mysqli_query($con, "SELECT * FROM cities");
                while ($row_g = mysqli_fetch_assoc($query_g)){
                ?>
                <option value="<?php echo $row_g['name']; ?>"><?php echo $row_g['name']; ?></option>
                <?php                    
                }
                ?>
                </select>
                </div>

                <div class="form-group">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" placeholder="Enter Phone Number" required>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" placeholder="Enter Email" required>
</div>

<div class="form-group">
    <label for="exampleFormControlFile1">Image Upload (Passport Size)</label>
    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" >
  </div>

  <input type="text" name="default" value="<?php echo $row['logoname']; ?>" hidden>

              <a  style="margin-left:10px;" href="users.php" class="btn btn-danger" > Cancel  </a>
              <button type="submit" name="updateuser" class="btn btn-primary"> Update </button>

          </form>
    <?php
    
}
?>



                            </div>
                        </div>
                    </div>
                </div>

            </div></div>
<?php
include 'includes/footer.php';
?>

<script>

 function zero(){
                        var branch=document.getElementById('branch').value;
                        var random=document.getElementById('random').value;
                       
                         $.ajax({
        url: 'fetch.php',
        method: 'POST',
        data:{branch:branch, random:random},
        dataType:"text",
        success:function(data){
            $('#fetch').html(data);
          //  document.getElementById('fetch').innerHTML=data;
        }
    });
                    }
            
                    </script>