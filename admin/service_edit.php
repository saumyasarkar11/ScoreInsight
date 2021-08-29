<?php
include 'db.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

       	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<!-- <div class="page-header">
						<h4 class="page-title">Cities</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Cities</a>
							</li>
						<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Basic Tables</a>
							</li>    
						</ul>
					</div>   -->
					<div class="row">
						<div class="col-md-12">
						    
							<div class="card">
								<div class="card-header">
									<div class="card-title">Edit Product/Service&nbsp;&nbsp</div>
								</div>  
								<div class="card-body">
<?php
                            if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    
    $sql = "SELECT * FROM services WHERE service_id = '$id'";
$result = $con->query($sql);

  
    // output data of each row
$row = mysqli_fetch_assoc($result);

         
        ?>

          <form action="code.php" method="POST">

          
                
              <input type="hidden" name="edit_id" value="<?php echo $row['service_id'] ?>" >
              
              <div class="form-group">

<label>Name </label>
    <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" placeholder="Enter Name" required>
</div>



<a href="services.php" class="btn btn-danger" style="margin-left:10px;"> Cancel  </a>
              <button type="submit" name="updateservice" class="btn btn-primary"> Update </button>

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