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
						    <div class="alert alert-success" id="success" role="alert" style="display:none;"></div>
							<div class="card">
								<div class="card-header">
									<div class="card-title">Levels & Designations&nbsp;&nbsp;
									  <?php
               $query= mysqli_query($con, "SELECT * FROM designation");
                    if (mysqli_num_rows($query)<5){
            ?>
                	<button style="padding: 5px 15px 5px 15px;" type="button" class="btn btn-primary btn-round " data-toggle="modal" data-target="#addadminprofile">Add Designation</button>
                <?php
                    } else {
                        
                    }
                ?>
								</div>
								</div>  
								<div class="card-body">
								    
<div class="table-responsive">
                    <table width="50%" align="left" id="example" class="table table-bordered table-hover" >
																 <thead bgcolor="#FAFAFA">
                        <tr>
                        <th style="font-weight:bolder" >Level</th>
                                <th style="font-weight:bolder;">Designation</th>
                           
                          
                         
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                 
                    while($row=mysqli_fetch_assoc($query)){
                      
                    ?>

                    <tr>
                    <td class="number1" ><?php echo $row['level']; ?></td>
                    <td class="number2" data-id2="<?php echo $row['designation_id']; ?>" <?php if ($row['designation_id']=="1"){ } else { echo "contenteditable";}?>><?php echo $row['name']; ?></td>

                       

                    </tr>

                    <?php
                       }
                   
                    ?>
                    </tbody>
                    </table>
                    </div>
                </div>
</div>
                </div>
        </div>
                </div>
                        

</div>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Designation</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="code.php" method="POST">

<div class="modal-body">

<?php
$query1= mysqli_query($con, "SELECT * FROM designation ORDER BY designation_id desc LIMIT 1");
$row1 = mysqli_fetch_assoc($query1);
$level=$row1['level'];
$int = (int) filter_var($level, FILTER_SANITIZE_NUMBER_INT);
?>

<div class="form-group">

<label>Level</label>
    <select type="text" name="number" class="form-control" required>
        <option value="" selected hidden>Choose here</option>
        <option value="L<?php echo $int+1; ?>" >L<?php echo $int+1; ?></option>
        
    </select>
</div>

    <div class="form-group">

<label>Designation </label>
    <input type="text" name="name" class="form-control" placeholder="Enter Designation" required>
</div>

            
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button type="submit" name="insertdesignation" class="btn btn-primary">Save</button>
</div>
</form>

</div>
</div>
</div>


<?php
include 'includes/footer.php';
?>


<script>
    $(document).ready(function() {
    $('#example').DataTable({
        "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
        "order": [[ 0, "asc" ]],
    });
    });

    function edit_data(id, text, columnname){
    $.ajax({
        url: 'edit_designation.php',
        method: 'POST',
        data:{id:id, text:text, columnname:columnname},
        dataType:"text",

        success:function(data){
            document.getElementById("success").style.display='block';
          document.getElementById("success").innerHTML=data;
          $(function() {
setTimeout(function() { $("#success").fadeOut(1500); }, 5000)

})
          
          
        }
    });
   
  }

 

  $(document).on('blur', '.number2', function(){
    var id = $(this).data("id2");
    var number2 = $(this).text();
    edit_data(id, number2, "name");
  });



</script>