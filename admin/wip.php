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
									<div class="card-title">WIP Prospects</div>
								</div>  
								<div class="card-body">
									<!-- table-head-bg-primary  -->
									<div class="table-responsive">
										<table align="left" id="example" class="table table-bordered table-hover" >
																 <thead bgcolor="#FAFAFA">
                                       <tr>
                                           <th style="font-weight:bolder;">ID</th>
                                            <th style="font-weight:bolder;">Date</th>
                                            <th style="font-weight:bolder;">Company</th>
                                            <th style="font-weight:bolder;">Status</th>
                                            <th style="font-weight:bolder;">Follow Up</th>
                                            
                                            <th style="font-weight:bolder;">Order (Rs.)*</th>
                                            <th style="font-weight:bolder;">Handler*</th>
                                            <th style="font-weight:bolder;">Operations</th>
                                          <!--  <th style="font-weight:bolder;">Edit</th>
                                            
                                            <th style="font-weight:bolder;">Delete</th>-->
                                     
                                    </tr>
                                    </thead>
                                    
                                <?php
                                $open="Work In Progress";
                                $query= mysqli_query($con, "SELECT * FROM prospects WHERE status='$open' ORDER BY `prospects`.`prospect_id` DESC");
                                if (mysqli_num_rows($query)!=0){
                                
                                while($row=mysqli_fetch_assoc($query)){
                                   $company_id= $row['company_id'];
                                    $query_a= mysqli_query($con, "SELECT * FROM companies WHERE company_id='$company_id'");
                                  $row_a=mysqli_fetch_assoc($query_a);
                                  
                                               
                                ?>

                                <tr>
                                      <td><?php echo $row['prospect_id']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row_a['company_name']; ?></td>
                                    <td>
                                    <?php if($row['status']=="Work In Progress"){
                                        echo "WIP";
                                    }
                                    ?></td>
                                    <td><?php echo $row['followup_date']; ?></td>
                                    <td data-toggle="tooltip" data-placement="bottom" title="<?php $n=rtrim($row['requirement'], ", "); echo $n; ?>"><?php echo "Rs.".$row['order_value'].""; ?></td>
                                    <?php
                                      $id=$row['user_id'];
                                     $query_x= mysqli_query($con, "SELECT * FROM users WHERE user_id='$id'");
                                     $row_x=mysqli_fetch_assoc($query_x);
                                     $id1=$row_x['designation_id'];
                                     $query_v= mysqli_query($con, "SELECT * FROM designation WHERE designation_id='$id1'");
                                     $row_v=mysqli_fetch_assoc($query_v);
                                     $id1=$row_x['head'];
                                     $query_n= mysqli_query($con, "SELECT * FROM users WHERE user_id='$id1'");
                                     $row_n=mysqli_fetch_assoc($query_n);
                                     ?>
                                    <td data-toggle="tooltip" data-placement="bottom" title="Designation: <?php echo $row_v['name']; ?>, Email: <?php echo $row_x['email']; ?>, Under: <?php echo $row_n['name']; ?>  ">
  <?php echo $row_x['name']; ?></td>                                                                   <td>
<div class="row">
                                    <form action="view.php" method="post">
                    <input type="hidden" name="view_id" value="<?php echo $row['prospect_id']; ?>">
                    <input type="hidden" name="view_id_1" value="<?php echo $company_id; ?>">
                    <button style="padding: 5px 10px 5px 10px;" type="submit" name="view_btn" class="btn btn-link btn-primary btn-lg"><i class="icon-eye"></i></button>
                </form>
                
                   <form action="prospectedit.php" method="post">
                <input type="hidden" name="view_id" value="<?php echo $row['prospect_id']; ?>">
                    <input type="hidden" name="view_id_1" value="<?php echo $company_id; ?>">
                    <button style="padding: 5px 10px 5px 10px;" type="submit" name="view_btn" class="btn btn-link btn-success btn-lg"><i class="fas fa-pen"></i></button>
                </form>
         
            <button style="padding: 5px 10px 5px 10px;" type="button" data-id1="<?php echo $row['prospect_id']; ?>" id="deleteprospect" class="btn btn-link btn-danger btn-lg"><i class="fas fa-trash-alt"></i></button>
             </div>
         
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


<?php
include 'includes/footer.php';
?>

<script>
    $(document).ready(function() {
    $('#example').DataTable({
        "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
        "order": [[ 0, "desc" ]],
    });

    });

    $(document).on('click', '#deleteprospect', function(){  
        var id=$(this).data("id1"); 
        if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
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