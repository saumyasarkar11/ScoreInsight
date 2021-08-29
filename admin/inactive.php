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
									<div class="card-title">Inactive Users&nbsp;&nbsp;<!-- <button style="padding: 5px 15px 5px 15px;" type="button" class="btn btn-primary btn-round " data-toggle="modal" data-target="#addadminprofile">Add User </button>--></div>
								</div>  
								<div class="card-body">
								    
<div class="table-responsive">
                    <table align="left" id="example" class="table table-bordered table-hover" >
																 <thead bgcolor="#FAFAFA">
                                     <tr>
                                        <th style="font-weight:bolder;">Code*</th>
                                            <th style="font-weight:bolder;">Name*</th>
                                            <th style="font-weight:bolder;">Designation</th>
                                            <th style="font-weight:bolder;">Branch*</th>
                                            <th style="font-weight:bolder;">Reported*</th>
                                            <th style="font-weight:bolder;">Image</th>
                                        
                                             <th style="font-weight:bolder;">Access</th>
                                        
                                            <th style="font-weight:bolder;">Operations</th>
                                            
                                          
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                $x="1";
                                $query= mysqli_query($con, "SELECT * FROM users WHERE designation_id != '$x' AND status='Inactive'");
                                if (mysqli_num_rows($query)!=0){
                                while($row=mysqli_fetch_assoc($query)){
                                  
                                ?>
 <tr>
                                    <td data-toggle="tooltip" data-placement="top" data-html="true" title="Joining Date: <?php echo $row['create_date']; ?>"><?php echo $row['code']; ?></td>
                                    <td data-toggle="tooltip" data-placement="top" data-html="true" title="Phone: <?php echo $row['phone']; ?><br>Email: <?php echo $row['email']; ?>"><?php echo $row['name']; ?></td>
                                    <td><?php
                                    $d_id = $row['designation_id'];
                                    $query_1 = mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d_id'");
                                    $row_1 = mysqli_fetch_assoc($query_1);
                                    echo "".$row_1['name']." (".$row_1['level'].")";
                                    ?></td>
                              
                          
                                    <td data-toggle="tooltip" data-placement="top" data-html="true" title="City: <?php echo $row['city']; ?>"><?php
                                    $b_id = $row['branch'];
                                    $query_2 = mysqli_query($con, "SELECT * FROM branch WHERE branch_id = '$b_id'");
                                    $row_2 = mysqli_fetch_assoc($query_2);
                                    echo "".$row_2['name']."";
                                    ?></td>
                                    <?php
                                    $h_id = $row['head'];
                                    $query_2= mysqli_query($con, "SELECT * FROM users WHERE user_id = '$h_id'");
                                    $row_2 = mysqli_fetch_assoc($query_2);
                                    $idd=$row_2['designation_id'];
                                     $query_3= mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$idd'");
                                    $row_3 = mysqli_fetch_assoc($query_3);
                                    ?>
                                     <td align="center" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo "".$row_3['name']." (".$row_3['level'].")"; ?>">
                                    <?php
                                    if ($h_id==1){
                                         ?>
                                         <i class="fas fa-user-shield"></i>
                                          <?php
                                        //echo "".$row_2['name']."";
                                    } else {
                                         echo "".$row_2['name']."";
                                    }
                                    
                                    ?></td>
                                          
                              
                                    <td  align="center"><img src="<?php $image_src2 = $row['logoname']; echo "upload/".$image_src2.""; ?> " height="75px"></td>
                                        
                                   
                                    
                                    <td align="center">
                <form action="../user/code.php" method="post" target="popup">
                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                    <input type="hidden" name="password" value="<?php echo $row['unknown']; ?>">
                    <button  type="submit" style="padding: 5px 10px 5px 10px;" name="loginbtn" class="btn btn-info"><i class="fas fa-sign-in-alt"></i></button>
                </form></td>
                
                            
                                    <td align="center"><div class="row">
                <form action="user_password_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['user_id']; ?>">
                    <button  type="submit" style="padding: 5px 10px 5px 10px;" name="edit_btn" class="btn btn-link btn-primary btn-lg"><i class="fas fa-lock"></i></button>
                </form>
              
                <form action="user_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['user_id']; ?>">
                    <button  type="submit" style="padding: 5px 10px 5px 10px;" name="edit_btn" class="btn btn-link btn-success btn-lg"><i class="fas fa-pen"></i></button>
                </form>
                <!--<div class="col">
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['user_id']; ?>">
                  <input type="hidden" name="delete_image" value="<?php echo $row['logoname']; ?>">
                  <button type="submit" name="deleteuser" class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
                </form> </div>--></div>
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
                                <!--</div>-->
                            </div>

                            </div>
                    </div></div>
                            </div>
                          </div>          

            </div>

            
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Client Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">
            
             <div class="form-group">

            <label>Employee Code</label>
                <input type="text" name="code" class="form-control" placeholder="Enter Employee Code" required>
            </div>

        	    <div class="form-group">

            <label>Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
            </div>
           
           
            <div class="form-group">
                <label>Designation</label>
                <select type="text" id="designation" onchange="change()" name="designation" class="form-control" required>
                <option value="" selected hidden>Choose Here...</option>
                <?php
            $query_2 = mysqli_query($con, "SELECT * FROM designation WHERE designation_id != '1'");
            while ($row_2 = mysqli_fetch_assoc($query_2)){
              ?>
                <option value="<?php echo $row_2['designation_id']; ?>" id="<?php echo $row_2['level']; ?>"><?php echo "".$row_2['name']." (".$row_2['level'].")"; ?></option>
                
                <?php  
            }
            ?>
                </select>
                </div>


                <div class="form-group" style="display:none;" id="level6div">
                <label>Report To</label>
                <select type="text"  name="head1" class="form-control" >
                <option value="" selected hidden>Choose Here...</option>
                <?php
                $a= "5";
                $query_a= mysqli_query($con, "SELECT * FROM users WHERE designation_id = '$a'");
                while ($row_a = mysqli_fetch_assoc($query_a)){
                     $query_a_1= mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$a'");
                   $row_a_1 = mysqli_fetch_assoc($query_a_1);
                ?>
                <option value="<?php echo $row_a['name']; ?>"><?php echo "".$row_a['name']."".$row_a_1['name'].""; ?></option>
                <?php                    
                }
                ?>
                </select>
                </div>

                <div class="form-group" style="display:none;" id="level3div">
                <label>Report To</label>
                <select type="text"  name="head2" class="form-control" >
                <option value="" selected hidden>Choose Here...</option>
                <?php
                $b= "2";
                $query_b= mysqli_query($con, "SELECT * FROM users WHERE designation_id = '$b'");
                while ($row_b = mysqli_fetch_assoc($query_b)){
                     $query_b_1= mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$b'");
                $row_b_1 = mysqli_fetch_assoc($query_b_1);
                ?>
                <option value="<?php echo $row_b['name']; ?>"><?php echo "".$row_b['name'].", ".$row_b_1['name'].""; ?></option>
                <?php                    
                }
                ?>
                </select>
                </div>

                <div class="form-group" style="display:none;" id="level4div">
                <label>Report To</label>
                <select type="text"  name="head3" class="form-control" >
                <option value="" selected hidden>Choose Here...</option>
                <?php
                $c= "3";
                $query_c= mysqli_query($con, "SELECT * FROM users WHERE designation_id = '$c'");
                while ($row_c = mysqli_fetch_assoc($query_c)){
                ?>
                <option value="<?php echo $row_c['name']; ?>"><?php echo $row_c['name']; ?></option>
                <?php                    
                }
                ?>
                </select>
                </div>

                <div class="form-group" style="display:none;" id="level5div">
                <label>Report To</label>
                <select type="text"  name="head4" class="form-control" >
                <option value="" selected hidden>Choose Here...</option>
                <?php
                $d= "4";
                $query_d= mysqli_query($con, "SELECT * FROM users WHERE designation_id = '$d'");
                while ($row_d = mysqli_fetch_assoc($query_d)){
                ?>
                <option value="<?php echo $row_d['name']; ?>"><?php echo $row_d['name']; ?></option>
                <?php                    
                }
                ?>
                </select>
                </div>
                
                     <div class="form-group">
                <label>Branch</label>
                <select name="branch" class="form-control" >
                <option value="" selected hidden>Choose Here...</option>
                <?php
                $query_g= mysqli_query($con, "SELECT * FROM branch ORDER BY name ASC");
                while ($row_g = mysqli_fetch_assoc($query_g)){
                ?>
                <option value="<?php echo $row_g['branch_id']; ?>"><?php echo $row_g['name']; ?></option>
                <?php                    
                }
                ?>
                </select>
                </div>



                <div class="form-group">
                <label>City</label>
                <select name="city" class="form-control" >
                <option value="" selected hidden>Choose Here...</option>
                <?php
                $query_g= mysqli_query($con, "SELECT * FROM cities");
                while ($row_g = mysqli_fetch_assoc($query_g)){
                ?>
                <option value="<?php echo $row_g['name']; ?>"><?php echo $row_g['name']; ?></option>
                <?php                    
                }
                ?>
                </select>
                </div>
             
                
           
                <div class="form-group">
            
                <label>Phone</label>
             <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number"  required>
           </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>
            
            <div class="form-group">
            
                <label>Password</label>
             <input type="password" name="password" class="form-control" placeholder="Enter Password"  required>
           </div>

           <div class="form-group">
    <label for="exampleFormControlFile1">Image Upload (Passport Size)</label>
    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
                        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" name="insertuser" class="btn btn-primary">Save</button>
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
        "order": [[ 1, "asc" ]],
    });
    } );


$(document).ready(function(){
$('#designation').change(function(){

    if($( "option:selected", this ).attr("id")=="L6"){
       $("#level6div").show();
       $("#level3div").hide();  
       $("#level4div").hide();  
       $("#level5div").hide();  
    } else if($( "option:selected", this ).attr("id")=="L3"){
       $("#level3div").show();
       $("#level2div").hide();  
       $("#level5div").hide();  
       $("#level4div").hide(); 
       $("#level6div").hide();
    } else if($( "option:selected", this ).attr("id")=="L4"){
       $("#level4div").show();
       $("#level2div").hide();  
       $("#level5div").hide();  
       $("#level3div").hide();
       $("#level6div").hide();
    } else if($( "option:selected", this ).attr("id")=="L5"){
       $("#level2div").hide();  
       $("#level3div").hide();  
       $("#level4div").hide();
       $("#level6div").hide();
    }


});
});
</script>