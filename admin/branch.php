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
						    <div class="alert alert-success" id="success" role="alert" style="display:none;"></div>
							<div class="card">
								<div class="card-header">
									<div class="card-title">Branches&nbsp;&nbsp;<button style="padding: 5px 15px 5px 15px;" type="button" class="btn btn-primary btn-round " data-toggle="modal" data-target="#addadminprofile">Add Branch</button></div>
								</div>  
								<div class="card-body">
								    
<div class="table-responsive">
                    <table width="50%" align="left" id="example" class="table table-bordered table-hover" >
																 <thead bgcolor="#FAFAFA">
                        <tr>
                     
                                <th style="font-weight:bolder; width:50%;">Type</th>
                           
                                <th style="font-weight:bolder; width:20%;">Delete</th>
                         
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                    $query= mysqli_query($con, "SELECT * FROM branch");
                    if (mysqli_num_rows($query)!=0){
                    while($row=mysqli_fetch_assoc($query)){
                      
                    ?>

                    <tr>
                
                    <td class="number2" data-id2="<?php echo $row['branch_id']; ?>" contenteditable><?php echo $row['name']; ?></td>

                       
<td >
<button type="button"  style="padding: 5px 10px 5px 10px;"  data-id3="<?php echo $row['branch_id']; ?>" id="deletetype" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>

   
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
<h5 class="modal-title" id="exampleModalLabel">Add Branch</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="code.php" method="POST">

<div class="modal-body">


    <div class="form-group">

<label>Name </label>
    <input type="text" name="name" id="display" class="form-control" placeholder="Enter Branch Name" required>
</div>

<p class="text-danger" id="danger1" style="display:none;margin-top:-10px;margin-left:10px;"></p>
<p class="text-success" id="success1" style="display:none; margin-top:-10px;margin-left:10px;"></p>
            
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button type="submit" name="insertbranch" id="insertbranch" class="btn btn-primary">Save</button>
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
        url: 'edit_branch.php',
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

  $(document).on('click', '#deletetype', function(){  
        var id=$(this).data("id3"); 
        if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete_branch.php",  
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
                     url:"display2.php",  
                    method: 'POST',
                    data:{display:display},
                    dataType:"text",
                     success:function(data1){  
                       if (data1=="Branch already exists") {
                            var btn = document.querySelector('#insertbranch');
        btn.disabled=true;
       
                      document.getElementById("danger1").style.display='block';
                       document.getElementById("success1").style.display='none';
          document.getElementById("danger1").innerHTML=data1;
          $(function() {
setTimeout(function() { $("#danger1").fadeOut(1000); }, 1500)

})           
                       } else {
                                             var btn = document.querySelector('#insertbranch');
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