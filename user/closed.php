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
									<div class="card-title">Closed Prospects</div>
								</div>  
								<div class="card-body">
									<!-- table-head-bg-primary  -->
									<div class="table-responsive">
										<table align="left" id="example" class="table table-bordered table-hover" >
																 <thead bgcolor="#FAFAFA">
                                    <tr>
                                         <th style="font-weight:bolder;">ID</th>
                                            <th style="font-weight:bolder;">Date</th>
                                            <th style="font-weight:bolder;">Company Name</th>
                                            <th style="font-weight:bolder;">Closed Date</th>
                                            <th style="font-weight:bolder;">Prospect/Order Value*<!--<a style="font-size: 13px;" href="https://www.md5online.org/md5-decrypt.html" target="_blank">  (Decrypt Here)</a>--></th>
                                          
                                            
                                            <th style="font-weight:bolder;">Source*</th>
                                            <th style="font-weight:bolder;">Operations</th>
                                           
                                        
                                     
                                    </tr>
                                    </thead>
                                    
                                <?php
                                 $sql= mysqli_query($con, "SELECT * FROM users WHERE email='$username'");
                                 $row_1 = mysqli_fetch_assoc($sql);
                                 $x = $row_1['user_id'];
                                 $arr=array($x);
                                 $name = $row_1['user_id'];
                                 $sql_1 = mysqli_query($con, "SELECT * FROM users WHERE head='$name'");
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

                                $open = "Closed";
                                
                                $query= mysqli_query($con, "SELECT * FROM prospects WHERE user_id IN ($array) AND status = '$open'");
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
                                     <td><?php echo $row['closing_date']; ?></td>
                                    <td data-toggle="tooltip" data-placement="bottom" title="<?php $n=rtrim($row['requirement'], ", "); echo $n; ?>"><?php echo $row['prospect_value']; ?><?php echo "/".$row['order_value'].""; ?></td>
                                    
                                   
                                    
                                    
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
                                    <td>
                                                        
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
         
                   </div>
            </td>        </tr>

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

      } );

</script>