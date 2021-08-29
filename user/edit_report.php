<?php
include 'db.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>
<?php
                            if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    
    $sql = "SELECT * FROM reports WHERE report_id = '$id'";
$result = $con->query($sql);

  
    // output data of each row
$row = mysqli_fetch_assoc($result);

}
         
        ?>
        	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
           
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            	<div class="card-header">
								<div class="card-title">Edit Report</div>
									</div>
							
                            <div class="card-body">


          <form action="code.php" method="POST" enctype="multipart/form-data">
              
                  
              <input type="hidden" name="edit_id" value="<?php echo $row['report_id'] ?>" >
              
              
               <div class="form-group">

<label>Date</label>
    <input type="text" name="date" id="datepicker" class="form-control" value="<?php echo $row['date']; ?>" placeholder="Enter Date" required>
</div>

<div class="form-group">
    <label for="exampleFormControlFile1">Upload Expenses (Valid File Types: .docx, .xlsx, .pdf)</label>
    <small>Previously Uploaded File: <?php if (empty($row['expense'])) {echo "None";} else {echo $row['expense'];} ?></small>
    <input type="file" name="expenses" class="form-control-file" id="exampleFormControlFile1" >
  </div>

 <div class="form-group">
    <label for="exampleFormControlFile1">Upload Report (Valid File Types: .docx, .xlsx, .pdf)</label>
     <small>Previously Uploaded File: <?php if (empty($row['report'])) {echo "None";} else {echo $row['report'];} ?></small>
    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" >
  </div>
  
    <input type="text" name="default" value="<?php echo $row['report']; ?>" hidden>
    
    <input type="text" name="default1" value="<?php echo $row['expense']; ?>" hidden>
    

              <a  style="margin-left:10px;" href="report.php" class="btn btn-danger" > Cancel  </a>
              <button type="submit" name="updatereport" class="btn btn-primary"> Update </button>
              
              </form>
              
              

                            </div>
                        </div>
                    </div>
                </div>

            </div></div>
<?php
include 'includes/footer.php';
?>

<script>
      $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "dd-mm-yy",
    });
   } );
</script>
