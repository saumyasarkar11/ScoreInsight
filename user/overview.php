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
              
            $sql= mysqli_query($con, "SELECT * FROM users WHERE email='$username'");
            $row_1 = mysqli_fetch_assoc($sql);
            $x = $row_1['user_id'];
            $arr=array($x);
            $name = $row_1['user_id'];
            $sql_1 = mysqli_query($con, "SELECT * FROM users WHERE head='$x'");
            while($row_2=mysqli_fetch_assoc($sql_1)){
               array_push($arr, $row_2['user_id']);
               
            $name_1 = $row_2['user_id'];                               
            $sql_3 = mysqli_query($con, "SELECT * FROM users WHERE head='$name_1'");
            while($row_3=mysqli_fetch_assoc($sql_3)){
               array_push($arr, $row_3['user_id']);

            $name_2 = $row_3['user_id'];                               
            $sql_4 = mysqli_query($con, "SELECT * FROM users WHERE head='$name_2'");
            while($row_4=mysqli_fetch_assoc($sql_4)){
            array_push($arr, $row_4['user_id']);

            $name_3 = $row_4['user_id'];                               
            $sql_5 = mysqli_query($con, "SELECT * FROM users WHERE head='$name_3'");
            while($row_5=mysqli_fetch_assoc($sql_5)){
            array_push($arr, $row_5['user_id']);
              }
             } 
            }
           }
           $array = implode(", ",$arr);
           
           $query_a= mysqli_query($con, "SELECT * FROM prospects WHERE user_id IN ($array) AND status='$open'");
           $number_a=mysqli_num_rows($query_a);
           $query_b= mysqli_query($con, "SELECT * FROM prospects WHERE user_id IN ($array) AND status='$unsure'");
           $number_b=mysqli_num_rows($query_b);
           $query_c= mysqli_query($con, "SELECT * FROM prospects WHERE user_id IN ($array) AND status='$wip'");
           $number_c=mysqli_num_rows($query_c);
           $query_d= mysqli_query($con, "SELECT * FROM prospects WHERE user_id IN ($array) AND status='$closed'");
           $number_d=mysqli_num_rows($query_d);
           $query_e= mysqli_query($con, "SELECT * FROM prospects WHERE user_id IN ($array) AND order_value='0'");
           while ($row_e=mysqli_fetch_assoc($query_e)){
              
                   $total_e += $row_e['prospect_value'];
             
               }
               
               $query_g= mysqli_query($con, "SELECT * FROM financialyear");
            $rowg=mysqli_fetch_assoc($query_g);
            $op=$rowg['open'];
            $cl=$rowg['close'];
               $query_f= mysqli_query($con, "SELECT * FROM prospects WHERE date2>='$op' AND user_id IN ($array)");
           while ($row_f=mysqli_fetch_assoc($query_f)){
              
                   $total_f += $row_f['order_value'];
             
               }
                    
            ?>
                                
                           
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
					<h4 class="page-title">Prospect Overview <button style="padding: 5px 15px 5px 15px;" type="button" class="btn btn-primary btn-round " data-toggle="modal" data-target="#addadminprofile">Add Prospect</button></h4>
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
										<table align="left" id="example" class="table table-bordered table-hover" >
																 <thead bgcolor="#FAFAFA">
                                    <tr>
                                         <th style="font-weight:bolder;">ID</th>
                                            <th style="font-weight:bolder;">Date</th>
                                            <th style="font-weight:bolder;">Company Name</th>
                                            <th style="font-weight:bolder;">Status</th>
                                            <th style="font-weight:bolder;">Follow Up</th>
                                            <th style="font-weight:bolder;">Prospect/Order Value*<!--<a style="font-size: 13px;" href="https://www.md5online.org/md5-decrypt.html" target="_blank">  (Decrypt Here)</a>--></th>
                                            
                                            <th style="font-weight:bolder;">Handler*</th>
                                           
                                            <th style="font-weight:bolder;">Operations</th>
                                            
                                     
                                    </tr>
                                    </thead>
                                    
                                <?php
                            
                                
                                $query= mysqli_query($con, "SELECT * FROM prospects WHERE user_id IN ($array) AND status !='Closed' ORDER BY `prospects`.`prospect_id` DESC");
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
                                    <td><?php if($row['status']=='Work In Progress') {echo "WIP";} else {echo $row['status'];} ?></td>
                                    
                                    <?php
                                    $date=date('Y-m-d');
                                    $date1 = DateTime::createFromFormat("d-m-Y", $row['followup_date']);
$y= $date1->format("Y");
$m= $date1->format("m");
$d= $date1->format("d");
$date2="".$y."-".$m."-".$d."";
                                     if ($date >= $date2){
                                     ?>
                                     <td  style="color:red; font-weight:bold;"><?php echo $row['followup_date'];?></td>
                                    <?php
                                     } else {
                                     ?>
                                      <td><?php echo $row['followup_date']; ?></td>
                                     <?php
                                     }
                                     ?>
                                    <td data-toggle="tooltip" data-placement="bottom" title="<?php $n=rtrim($row['requirement'], ", "); echo $n; ?>"><?php echo "Rs.".$row['prospect_value'].""; ?><?php echo "/Rs.".$row['order_value'].""; ?></td>
                                    
                                    
                                    
                                    <?php
                                      $id=$row['user_id'];
                                     $query_x= mysqli_query($con, "SELECT * FROM users WHERE user_id='$id'");
                                     $row_x=mysqli_fetch_assoc($query_x);
                                     $id1=$row_x['designation_id'];
                                     $query_j= mysqli_query($con, "SELECT * FROM designation WHERE designation_id='$id1'");
                                     $row_j=mysqli_fetch_assoc($query_j);
                                   $id1=$row_x['head'];
                                     $query_n= mysqli_query($con, "SELECT * FROM users WHERE user_id='$id1'");
                                     $row_n=mysqli_fetch_assoc($query_n);
                                     ?>
                                    <td data-toggle="tooltip" data-placement="bottom" title="Designation: <?php echo $row_j['name']; ?>, Email: <?php echo $row_x['email']; ?>, Under: <?php echo $row_n['name']; ?>  ">
  <?php echo $row_x['name']; ?></td>    
                                                                                     
                                    <td align="center">
                                        <div class="row">
                                                 <form action="view.php" method="post">
                    <input type="hidden" name="view_id" value="<?php echo $row['prospect_id']; ?>">
                    <input type="hidden" name="view_id_1" value="<?php echo $company_id; ?>">
                    <button style="padding: 5px 10px 5px 10px;" type="submit" name="view_btn" class="btn btn-link btn-primary btn-lg"><i class="icon-eye"></i></button></form>
               
          
           <form action="prospectedit.php" method="post">
                <input type="hidden" name="view_id" value="<?php echo $row['prospect_id']; ?>">
                    <input type="hidden" name="view_id_1" value="<?php echo $company_id; ?>">
                    <button style="padding: 5px 10px 5px 10px;" type="submit" name="view_btn" class="btn btn-link btn-success btn-lg"><i class="fas fa-pen"></i></button>
                </form></div>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Prospect</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        	    <div class="form-group">

                <input type="hidden" name="user_id" value="<?php echo $x; ?>">  

                 <label>Company</label>
                <select name="company" class="form-control" required>
                    <?php
                    $sqla=mysqli_query($con, "SELECT * FROM companies WHERE user_id='$x' ORDER BY company_name asc");
                    while ($rowa=mysqli_fetch_assoc($sqla)){
                    ?>
                    <option value="" selected hidden>Choose here...</option>
                    <option value="<?php echo $rowa['company_id'] ?>"><?php echo $rowa['company_name'] ?></option>
                    <?php
                    }
                    ?>
                    
                </select>
            </div>
           
            <div class="form-group">
            <label>Requirement</label><br>
            <?php
            $sqlb=mysqli_query($con, "SELECT * FROM services ORDER BY `services`.`number` ASC");
            while ($rowb=mysqli_fetch_assoc($sqlb)){
            ?>    
                <input type="checkbox" name="check_list[]" value="<?php echo $rowb['name'] ?>">&nbsp<?php echo $rowb['name'] ?><br>
            <?php 
            } 
            ?>   
            </div>

            <div class="form-group">
                <label>Approx. Prospect Value</label>
                <input type="text" name="prospect_value" class="form-control"  placeholder="Enter Approx. Prospect Value" maxlength="6" required>
            </div>

                     <div class="form-group">
                <label>Follow Up Date</label>
                <input type="text" name="followup_date" id="datepicker" class="form-control"  placeholder="Enter Follow Up Date"  >
            </div>

                     <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                <option value="" selected hidden>Choose here...</option>
                <option value="New" >New</option>
                <option value="Open" >Open</option>
                </select>
            </div>

            <div class="form-group">
                <label>Comments</label>
                <textarea type="text" name="comments" class="form-control" placeholder="Enter any Comment" required></textarea>
            </div>
                      
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" name="addprospect" class="btn btn-primary">Save</button>
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
        "order": [[ 0, "desc" ]],
    });
});
</script>
  <script>
    $(function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "dd-mm-yy",
    });
   } );

  $( function() {
    $( "#datepicker_1" ).datepicker({
      dateFormat: "dd-mm-yy",
    });
   } );
</script>