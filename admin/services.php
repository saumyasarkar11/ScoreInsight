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
									<div class="card-title">Products / Services&nbsp;&nbsp;<button style="padding: 5px 15px 5px 15px;" type="button" class="btn btn-primary btn-round " data-toggle="modal" data-target="#addadminprofile">Add New</button></div>
								</div>  
								<div class="card-body">
								    
<div class="table-responsive">
                    <table width="50%" align="left" id="example" class="table table-bordered table-hover" >
																 <thead bgcolor="#FAFAFA">
                        <tr>
                        <th style="font-weight:bolder; width:10%;">No.</th>
                                <th style="font-weight:bolder; width:50%;">Product / Service</th>
                           
                                <th style="font-weight:bolder; width:20%;">Edit</th>
                                <th style="font-weight:bolder; width:20%;">Delete</th>
                         
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                    $query= mysqli_query($con, "SELECT * FROM services");
                    if (mysqli_num_rows($query)!=0){
                    while($row=mysqli_fetch_assoc($query)){
                      
                    ?>

                    <tr>
                    <td style="width:10%;" class="number" data-id1="<?php echo $row['service_id']; ?>" contenteditable><?php echo $row['number']; ?></td>
                        <td style="width:50%;"><?php echo $row['name']; ?></td>

                        <td style="width:20%;">
    <form action="service_edit.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['service_id']; ?>">
        <button  type="submit" name="edit_btn" style="padding: 5px 10px 5px 10px;" class="btn btn-success"><i class="fas fa-pen"></i></button>
    </form>
</td>
<td style="width:20%;">
    <button type="button" data-id2="<?php echo $row['service_id']; ?>" id="deleteservice" style="padding: 5px 10px 5px 10px;" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
<h5 class="modal-title" id="exampleModalLabel">Add Product / Service</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="code.php" method="POST">

<div class="modal-body">

<div class="form-group">

<label>Sequence Number</label>
    <input type="text" name="number" class="form-control" placeholder="Enter Sequence Number" required>
</div>

    <div class="form-group">

<label>Name </label>
    <input type="text" name="name" id="display" class="form-control" placeholder="Enter Product / Service Name" required>
</div>
<p class="text-danger" id="danger1" style="display:none;margin-top:-10px;margin-left:10px;"></p>
<p class="text-success" id="success1" style="display:none; margin-top:-10px;margin-left:10px;"></p>
            
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button type="submit" name="insertservice" id="insertservice" class="btn btn-primary">Save</button>
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
        url: 'edit.php',
        method: 'POST',
        data:{id:id, text:text, columnname:columnname},
        dataType:"text",

        success:function(data){
            document.getElementById("success").style.display='block';
          document.getElementById("success").innerHTML=data;
          $(function() {
setTimeout(function() { $("#success").fadeOut(1500); }, 5000)

});

          
          
        }
    });
   
  }

  $(document).on('blur', '.number', function(){
    var id = $(this).data("id1");
    var number = $(this).text();
    edit_data(id, number, "number");
  });
  
  
   $(document).on('click', '#deleteservice', function(){  
        var id=$(this).data("id2"); 
        if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"deleteservice.php",  
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
      
      $(document).on('keyup', '#display', function(){  
        var display= document.getElementById('display').value;
   
            $.ajax({  
                     url:"display5.php",  
                     method:"POST",  
                     data:{display:display},  
                     dataType:"text",  
                     success:function(data){  
                       if (data=="Product/Service already exists") {
                           var btn = document.querySelector('#insertservice');
        btn.disabled=true;
                      document.getElementById("danger1").style.display='block';
                      document.getElementById("success1").style.display='none';
          document.getElementById("danger1").innerHTML=data;
          $(function() {
setTimeout(function() { $("#danger1").fadeOut(1000); }, 3500)

})          
                       } else {
                           var btn = document.querySelector('#insertservice');
        btn.disabled=false;
                        document.getElementById("success1").style.display='block';
                        document.getElementById("danger1").style.display='none';
          document.getElementById("success1").innerHTML=data;
          $(function() {
setTimeout(function() { $("#success1").fadeOut(1000); }, 3500)

})  
                       }            
                     }  
                });  
       
      }); 

</script>