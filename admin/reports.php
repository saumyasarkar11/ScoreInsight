<?php
include 'db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$sql= mysqli_query($con, "SELECT * FROM users WHERE email='$username'");
$row_1 = mysqli_fetch_assoc($sql);
$x = $row_1['user_id'];

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
									<div class="card-title">Records&nbsp;&nbsp;<button style="padding: 5px 15px 5px 15px;" type="button" class="btn btn-primary btn-round " data-toggle="modal" data-target="#addadminprofile">Delete Records</button></div>
								</div>  
								<div class="card-body">
								    
								    
								    
							<div class="table-responsive">
                    <table align="left" id="example" class="table table-bordered table-hover" >
																 <thead bgcolor="#FAFAFA">
                        <tr>
                            <th style="font-weight:bolder;">ID</th>
                                <th style="font-weight:bolder;">Date</th>
                                <th style="font-weight:bolder;">EmpCode</th>
                                <th style="font-weight:bolder;">Name*</th>
             
                                <th style="font-weight:bolder;">Branch*</th>
                                <th style="font-weight:bolder;">Reports*</th>
                                <th style="font-weight:bolder;">Report</th>
                                <th style="font-weight:bolder;">Expense</th>
                             
                          
                                
                         
                        </tr>
                        </thead>	    
								    
							<tbody>
                    <?php
                             
                    $query= mysqli_query($con, "SELECT * FROM reports ORDER BY report_id desc;");
                    if (mysqli_num_rows($query)!=0){
                    while($row=mysqli_fetch_assoc($query)){
                        $a=$row['user_id'];
                        $query1= mysqli_query($con, "SELECT * FROM users WHERE user_id = '$a';");
                 
                    $row1=mysqli_fetch_assoc($query1);
                      
                    ?>

                    <tr>
                        <td>
                            <?php echo $row['report_id']; ?>
                        </td>
                        <td data-toggle="tooltip" data-html="true" data-placement="top" title=" Phone: <?php echo $row['phone']; ?><br>Email: <?php echo $row['email'];?>" ><?php echo $row['date']; ?>
                       </td> 
                        <td>
                            <?php echo $row1['code']; ?>
                        </td>
                        <td data-toggle="tooltip" data-html="true" data-placement="top" title="<?php
                                     $d_id1 = $row1['designation_id'];
                                     $query_j = mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d_id1'");
                                     $row_j = mysqli_fetch_assoc($query_j);
                                     echo "".$row_j['name']." (".$row_j['level'].")";
                                     ?> <br> Phone: <?php echo $row1['phone']; ?>">
                        <?php echo $row1['name']; ?></td>  
                        
                        
                                <td  data-toggle="tooltip" data-html="true" data-placement="top" title="  <?php echo $row1['city']; ?>"><?php
                                    $b_id = $row1['branch'];
                                    $query_2 = mysqli_query($con, "SELECT * FROM branch WHERE branch_id = '$b_id'");
                                    $row_2 = mysqli_fetch_assoc($query_2);
                                    echo "".$row_2['name']."";
                                    ?></td>
                                    
                      <?php
                                    $h_id = $row1['head'];
                                    $query3= mysqli_query($con, "SELECT * FROM users WHERE user_id = '$h_id'");
                                    $row3 = mysqli_fetch_assoc($query3);
                                    $idd=$row3['designation_id'];
                                     $query4= mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$idd'");
                                    $row4 = mysqli_fetch_assoc($query4);
                                    ?>
                                     <td align="center" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo "".$row4['name']." (".$row4['level'].")"; ?>">
                                    <?php
                                    if ($h_id==1){
                                         ?>
                                         <i class="fas fa-user-shield"></i>
                                          <?php
                                        //echo "".$row3['name']."";
                                    } else {
                                         echo "".$row3['name']."";
                                    }
                                    
                                    ?></td>
                                    <td align="center"><a target="_blank" style="padding: 5px 10px 5px 10px;" class="btn btn-primary" href="../user/reports/<?php echo $row['report']; ?>"><i class="fas fa-download"></i></a></td>
                                    
<td align="center"><a target="_blank" style="padding: 5px 10px 5px 10px;" class="btn btn-info" href="../user/reports/<?php echo $row['expense']; ?>"><i class="fas fa-download"></i></a></td>
 
             
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
<h5 class="modal-title" id="exampleModalLabel">Delete Reports</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body">

<div class="form-group">

<label>Delete Records Till This Date</label>
    <input type="text" id="datepicker" class="form-control" placeholder="Enter Date" required>
</div>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
<button type="button" id="delete" class="btn btn-danger">Delete</button>
</div>


</div>
</div>
</div>


<?php
include 'includes/footer.php';
?>


<script src="//geodata.solutions/includes/countrystate.js"></script>

<script>
    $(document).ready(function() {
    $('#example').DataTable({
        "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
             ]
    });
    });
    
    
    $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "yy-mm-dd",
    });
   } );
   
     $(document).on('click', '#delete', function(){  
        var date=document.getElementById('datepicker').value; 
        if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"deletereports.php",  
                     method:"POST",  
                     data:{date:date},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          location.reload();
                      
                     }  
                });  
           }  
      });  
</script>