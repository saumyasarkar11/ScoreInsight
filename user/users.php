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
									<div class="card-title">Members&nbsp;&nbsp;</div>
								</div>  
								<div class="card-body">
								    
<div class="table-responsive">
                    <table align="left" id="example" class="table table-bordered table-hover" >
																 <thead bgcolor="#FAFAFA">
                                    <tr>
                                            <th style="font-weight:bolder;">Name*</th>
                                            <th style="font-weight:bolder;">Designation</th>
                                            
                                            <th style="font-weight:bolder;">Branch</th>
                                            
                                             <th style="font-weight:bolder;">Reports</th>
                                              
                                            <th style="font-weight:bolder;">Image</th>
                                            
                                            <th style="font-weight:bolder;">Joining</th>
                                     
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                $sql= mysqli_query($con, "SELECT * FROM users WHERE email='$username'");
                                $row_1 = mysqli_fetch_assoc($sql);
                                $x = $row_1['user_id'];
                                $query= mysqli_query($con, "SELECT * FROM users WHERE head = '$x'");
                               
                                while($row=mysqli_fetch_assoc($query)){
                                  
                                ?>

                                <tr>
                                    <td data-toggle="tooltip" data-placement="top" data-html="true" title="Phone: <?php echo $row['phone']; ?><br> Email:  <?php echo $row['email']; ?> "><?php echo $row['name']; ?></td>
                                    <td><?php
                                     $d_id1 = $row['designation_id'];
                                     $query_j = mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d_id1'");
                                     $row_j = mysqli_fetch_assoc($query_j);
                                     echo "".$row_j['name']." (".$row_j['level'].")";
                                     ?></td>
                                   
                                    
                                 <td><?php
                                    $b_id = $row['branch'];
                                    $query_2 = mysqli_query($con, "SELECT * FROM branch WHERE branch_id = '$b_id'");
                                    $row_2 = mysqli_fetch_assoc($query_2);
                                    echo "".$row_2['name']."";
                                    ?></td>
                                    
                                    <?php 
                $h=$row['head'];
                $sqla= mysqli_query($con, "SELECT * FROM users WHERE user_id = '$h'");
                $rowa=mysqli_fetch_assoc($sqla);
                $d=$rowa['designation_id'];
                $sqlb= mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d'");
                               
                $rowb=mysqli_fetch_assoc($sqlb);
                
                             ?>
                <td data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo "".$rowb['name']." (".$rowb['level'].")"; ?>"><?php echo "".$rowa['name']."";?></td>
                                   
             
                                    
                                    <td align="center"><img src="<?php $image_src2 = $row['logoname']; echo "../admin/upload/".$image_src2.""; ?> " height="75px"></td>
                                    
                                    <td><?php echo $row['create_date']; ?></td>
                                </tr>
                                
                                <?php
                                $name=$row['user_id'];
                                $query_1= mysqli_query($con, "SELECT * FROM users WHERE head = '$name'");
                                while($row_2=mysqli_fetch_assoc($query_1)){
                                ?>

<tr>
                                     <td data-toggle="tooltip" data-placement="top" data-html="true" title="Phone: <?php echo $row_2['phone']; ?><br> Email:  <?php echo $row_2['email']; ?> "><?php echo $row_2['name']; ?></td>
                                    <td><?php
                                    $d_id2 = $row_2['designation_id'];
                                    $query_k = mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d_id2'");
                                    $row_k = mysqli_fetch_assoc($query_k);
                                    echo "".$row_k['name']." (".$row_k['level'].")";
                                    ?></td>
                                    
                                    <td><?php
                                    $b_id1 = $row_2['branch'];
                                    $query_21 = mysqli_query($con, "SELECT * FROM branch WHERE branch_id = '$b_id1'");
                                    $row_21 = mysqli_fetch_assoc($query_21);
                                    echo "".$row_21['name']."";
                                    ?></td>
                                    
                                    
                                    <?php 
                $h1=$row_2['head'];
                $sqla1= mysqli_query($con, "SELECT * FROM users WHERE user_id = '$h1'");
                $rowa1=mysqli_fetch_assoc($sqla1);
                $d1=$rowa1['designation_id'];
                $sqlb1= mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d1'");
                               
                $rowb1=mysqli_fetch_assoc($sqlb1);
                
                             ?>
                <td data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo "".$rowb1['name']." (".$rowb1['level'].")"; ?>"><?php echo "".$rowa1['name']."";?></td>
                                   
                                   
                                    
                                    
                                  
                                 
                   
                                    
                                    <td align="center"><img src="<?php $image_src2 = $row_2['logoname']; echo "../admin/upload/".$image_src2.""; ?> " height="75px"></td>
                                    
                                    <td><?php echo $row_2['create_date']; ?></td>
                                </tr>

                                <?php
                                $name_1=$row_2['user_id'];
                                $query_2= mysqli_query($con, "SELECT * FROM users WHERE head = '$name_1'");
                                while($row_3=mysqli_fetch_assoc($query_2)){
                                ?>


<tr>
                                     <td data-toggle="tooltip" data-placement="top" data-html="true" title="Phone: <?php echo $row_3['phone']; ?><br> Email:  <?php echo $row_3['email']; ?> "><?php echo $row_3['name']; ?></td>
                                    <td>
                                    <td><?php
                                    
                                    $d_id3 = $row_3['designation_id'];
                                    $query_l = mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d_id3'");
                                    $row_l = mysqli_fetch_assoc($query_l);
                                    echo "".$row_l['name']." (".$row_l['level'].")";
                                    ?>
                                    </td>
                                    
                                    <td><?php
                                    $b_id2 = $row_3['branch'];
                                    $query_22 = mysqli_query($con, "SELECT * FROM branch WHERE branch_id = '$b_id2'");
                                    $row_22 = mysqli_fetch_assoc($query_22);
                                    echo "".$row_22['name']."";
                                    ?></td>
                                    
                                    <?php 
                $h2=$row_3['head'];
                $sqla2= mysqli_query($con, "SELECT * FROM users WHERE user_id = '$h2'");
                $rowa2=mysqli_fetch_assoc($sqla2);
                $d2=$rowa2['designation_id'];
                $sqlb2= mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d2'");
                               
                $rowb2=mysqli_fetch_assoc($sqlb2);
                
                             ?>
                <td data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo "".$rowb2['name']." (".$rowb2['level'].")"; ?>"><?php echo "".$rowa2['name']."";?></td>
                                   
                                  
                                    
                              
                                 
                                      
                                    <td align="center"><img src="<?php $image_src2 = $row_3['logoname']; echo "../admin/upload/".$image_src2.""; ?> " height="75px"></td>
                                    
                                    <td><?php echo $row_3['create_date']; ?></td>
                                </tr>

                                <?php
                                $name_2=$row_3['user_id'];
                                $query_3= mysqli_query($con, "SELECT * FROM users WHERE head = '$name_2'");
                                while($row_4=mysqli_fetch_assoc($query_3)){
                                ?>

<tr>
                                     <td data-toggle="tooltip" data-placement="top" data-html="true" title="Phone: <?php echo $row_4['phone']; ?><br> Email:  <?php echo $row_4['email']; ?> "><?php echo $row_4['name']; ?></td>
                                    <td>
                                    <td>
                                    <?php
                                     $d_id4 = $row_4['designation_id'];
                                     $query_m = mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d_id4'");
                                     $row_m = mysqli_fetch_assoc($query_m);
                                     echo "".$row_m['name']." (".$row_m['level'].")";
                                     ?>
                                    </td>
                                    
                                    <td><?php
                                    $b_id3 = $row_4['branch'];
                                    $query_23 = mysqli_query($con, "SELECT * FROM branch WHERE branch_id = '$b_id3'");
                                    $row_23 = mysqli_fetch_assoc($query_23);
                                    echo "".$row_23['name']."";
                                    ?></td>
                                    
                                 
                                        
                                    <?php 
                $h3=$row_4['head'];
                $sqla3= mysqli_query($con, "SELECT * FROM users WHERE user_id = '$h3'");
                $rowa3=mysqli_fetch_assoc($sqla3);
                $d3=$rowa3['designation_id'];
                $sqlb3= mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d3'");
                               
                $rowb3=mysqli_fetch_assoc($sqlb3);
                
                             ?>
                <td data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo "".$rowb3['name']." (".$rowb3['level'].")"; ?>"><?php echo "".$rowa3['name']."";?></td>
                                   
                              
                                    <td align="center"><img src="<?php $image_src2 = $row_4['logoname']; echo "../admin/upload/".$image_src2.""; ?> " height="75px"></td>
                                    
                                    <td><?php echo $row_3['create_date']; ?></td>
                                </tr>

                                <?php

                                        }
                                   }

                                } 

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
        "order": [[ 1, "asc" ]],
    });
    } );


</script>