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
									<div class="card-title">Cities</div>
								</div> 
                            <div class="card-body">
<?php
                            if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    
    $sql = "SELECT * FROM cities WHERE city_id = '$id'";
$result = $con->query($sql);

  
    // output data of each row
$row = mysqli_fetch_assoc($result);

         
        ?>

          <form action="code.php" method="POST">

          
                
              <input type="hidden" name="edit_id" value="<?php echo $row['city_id'] ?>" >
              
              <div class="form-group">

<label>Name </label>
    <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" placeholder="Enter Name" required>
</div>



<a style="margin-left:10px;" href="cities.php" class="btn btn-danger" > Cancel  </a>
              <button type="submit" name="updatecity" class="btn btn-primary"> Update </button>

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
            </div>
            
<?php
include 'includes/footer.php';
?>