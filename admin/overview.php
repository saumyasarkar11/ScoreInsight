<?php
include 'db.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>
<?php
            $open="Open";
            $unsure="New";
            $wip="Work in Progress";
            $closed="Closed";
            $total_e=0;
            $total_f=0;
            $date=date('d-m-Y');
            $query_a= mysqli_query($con, "SELECT * FROM prospects WHERE status='$open'");
            $number_a=mysqli_num_rows($query_a);
            $query_b= mysqli_query($con, "SELECT * FROM prospects WHERE status='$unsure'");
            $number_b=mysqli_num_rows($query_b);
            $query_c= mysqli_query($con, "SELECT * FROM prospects WHERE status='$wip'");
            $number_c=mysqli_num_rows($query_c);
            $query_d= mysqli_query($con, "SELECT * FROM prospects WHERE status='$closed'");
            $number_d=mysqli_num_rows($query_d);
           $query_e= mysqli_query($con, "SELECT * FROM prospects WHERE  order_value='0'");
           while ($row_e=mysqli_fetch_assoc($query_e)){
              
                   $total_e += $row_e['prospect_value'];
             
               }
               $query_g= mysqli_query($con, "SELECT * FROM financialyear");
            $rowg=mysqli_fetch_assoc($query_g);
            $op=$rowg['open'];
            $cl=$rowg['close'];
               $query_f= mysqli_query($con, "SELECT * FROM prospects WHERE date2>='$op'");
           while ($row_f=mysqli_fetch_assoc($query_f)){
              
                   $total_f += $row_f['order_value'];
             
               }
                    
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
					<h4 class="page-title">Prospect Overview</h4>
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-primary card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-users"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">New Prospects</p>
												<h4 class="card-title"><?php echo $number_b; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-info card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-interface-6"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Open Prospects</p>
												<h4 class="card-title"><?php echo $number_a; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-success card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-analytics"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">WIP Prospects</p>
												<h4 class="card-title"><?php echo $number_c; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-secondary card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Closed Prospects</p>
												<h4 class="card-title"><?php echo $number_d; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-info bubble-shadow-small">
												<i class="flaticon-interface-6"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Total Prospect Value</p>
												<h4 class="card-title"><?php echo $total_e; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-primary bubble-shadow-small">
												<i class="flaticon-coins"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category">Total Order Value</p>
												<h4 class="card-title"><?php echo $total_f; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								  
								<div class="card-body">
									<!-- table-head-bg-primary  -->
									<div class="table-responsive">
										<table align="left" id="basic-datatables" class="table table-bordered table-hover" >
																 <thead bgcolor="#FAFAFA">
                                    <tr>
                                        <th style="font-weight:bolder;">ID</th>
                                            <th style="font-weight:bolder;">Date</th>
                                            <th style="font-weight:bolder;">Company</th>
                                            <th style="font-weight:bolder;">Status</th>
                                            <th style="font-weight:bolder;">FollowUp</th>
                                            <th style="font-weight:bolder;">Prospect/Order(Rs)*</th>
                                            <th style="font-weight:bolder;">Handler*</th>
                                            <th style="font-weight:bolder;">View</th>
                                      <!--      <th style="font-weight:bolder;">Edit</th>
                                            
                                            <th style="font-weight:bolder;">Delete</th>-->
                                     
                                    </tr>
                                    </thead>
                                    
                                <?php
                                $query= mysqli_query($con, "SELECT * FROM prospects WHERE status !='Closed' ORDER BY `prospects`.`prospect_id` DESC");
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
                                     <td><?php 
                                     if($row['status']=="Work In Progress"){
                                        echo "WIP"; } else {
                                        echo $row['status'];
                                     }
                                     ?></td>
                                     <?php
                                     if ($date >= $row['followup_date']){
                                     ?>
                                     <td  style="color:red; font-weight:bold;"><?php echo $row['followup_date']; ?></td>
                                    <?php
                                     } else {
                                     ?>
                                      <td><?php echo $row['followup_date']; ?></td>
                                     <?php
                                     }
                                     ?>
                                    
                                   <td data-toggle="tooltip" data-placement="bottom" title="<?php $n=rtrim($row['requirement'], ", "); echo $n; ?>"><?php echo "Rs.".$row['prospect_value'].""; ?><?php echo "/ Rs.".$row['order_value'].""; ?></td>
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
  <?php echo $row_x['name']; ?></td>                                                              
                                  <td>
                                    <form action="view.php" method="post">
                    <input type="hidden" name="view_id" value="<?php echo $row['prospect_id']; ?>">
                    <input type="hidden" name="view_id_1" value="<?php echo $company_id; ?>">
                    <button  type="submit" style="padding: 5px 10px 5px 10px;" name="view_btn" class="btn btn-warning"><i class="icon-eye"></i></button>
                </form>
               
            </td>
        <!--      <td>
            <form action="prospectedit.php" method="post">
                <input type="hidden" name="view_id" value="<?php echo $row['prospect_id']; ?>">
                    <input type="hidden" name="view_id_1" value="<?php echo $company_id; ?>">
                    <button  type="submit" name="view_btn" class="btn btn-success"><i class="mdi mdi-border-color"></i></button>
                </form>
            </td>
            <td>
               
            <button type="button" data-id1="<?php echo $row['prospect_id']; ?>" id="deleteprospect" class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
               
            </td>-->
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
    $('#basic-datatables').DataTable({
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