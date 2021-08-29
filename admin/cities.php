<?php
include('db.php');
include('includes/header.php');
include('includes/navbar.php');

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
									<div class="card-title">Cities&nbsp;&nbsp;<button style="padding: 5px 15px 5px 15px;" type="button" class="btn btn-primary btn-round " data-toggle="modal" data-target="#addadminprofile">Add City</button></div>
								</div>  
								<div class="card-body">
									<!-- table-head-bg-primary  -->
									<div class="table-responsive">
										<table width="50%" align="left" id="basic-datatables" class="table table-bordered table-hover" >
																 <thead bgcolor="#FAFAFA">
                        <tr>
                                <th>City</th>
                           
                                <th>Edit</th>
                                <th>Delete</th>
                         
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                    $query= mysqli_query($con, "SELECT * FROM cities");
                    if (mysqli_num_rows($query)!=0){
                    while($row=mysqli_fetch_assoc($query)){
                      
                    ?>

                    <tr>
                        <td><?php echo $row['name']; ?></td>

                        <td>
    <form action="city_edit.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['city_id']; ?>">
        <button style="padding: 5px 10px 5px 10px;"  type="submit" name="edit_btn" class="btn btn-success"><i class="fa fa-pen"></i></button>
    </form>
</td>
<td>
   <button type="button" style="padding: 5px 10px 5px 10px;" data-id2="<?php echo $row['city_id']; ?>" id="deletecity" class="btn btn-danger"><i class="fa fa-trash"></i></button>
</td>
                    </tr>

                    <?php
                       }
                    } else {
                        echo "No Result Found!";
                    }
                    ?>
                    </tbody>
                    </table>
									</div>
</div></div>
						</div>
					</div>
				</div>
			</div>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add City</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="code.php" method="POST">

<div class="modal-body">

    <div class="form-group">

<label>Name </label>
    <input type="text" name="name" class="form-control" id="display" placeholder="Enter City Name" required>
</div>
<p class="text-danger" id="danger1" style="display:none;margin-top:-10px;margin-left:10px;"></p>
<p class="text-success" id="success1" style="display:none; margin-top:-10px;margin-left:10px;"></p>
            
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button type="submit" name="insertcity" id="insertcity" class="btn btn-primary">Save</button>
</div>
</form>

</div>
</div>
</div>


<?php
include('includes/footer.php');
?>


<script>

    $(document).ready(function() {
    $('#basic-datatables').DataTable({
       "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
        "order": [[ 0, "asc" ]],
    });
    });
    
       $(document).on('click', '#deletecity', function(){  
        var id=$(this).data("id2"); 
        if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"deletecity.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          location.reload();
                      
                     }  
                });  
           }  
      });
</script>

<script>
                   $(document).on('keyup', '#display', function(){  
        var display= document.getElementById('display').value;
     
            $.ajax({  
                     url:"display1.php",  
                    method: 'POST',
                    data:{display:display},
                    dataType:"text",
                     success:function(data1){  
                       if (data1=="City already exists") {
                            var btn = document.querySelector('#insertcity');
        btn.disabled=true;
       
                      document.getElementById("danger1").style.display='block';
                       document.getElementById("success1").style.display='none';
          document.getElementById("danger1").innerHTML=data1;
          $(function() {
setTimeout(function() { $("#danger1").fadeOut(1000); }, 1500)

})           
                       } else {
                                             var btn = document.querySelector('#insertcity');
        btn.disabled=false;
                        document.getElementById("success1").style.display='block';
                        document.getElementById("danger1").style.display='none';
          document.getElementById("success1").innerHTML=data1;
          $(function() {
setTimeout(function() { $("#success1").fadeOut(1000); }, 1500)

})  
                       }            
                     }  
                }); 
      }); 
</script>