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
									<div class="card-title">Active Users&nbsp;&nbsp;<button style="padding: 5px 15px 5px 15px;" type="button" class="btn btn-primary btn-round " data-toggle="modal" data-target="#addadminprofile">Add User</button></div>
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
                                            <th style="font-weight:bolder;">Reports*</th>
                                            <th style="font-weight:bolder;">Image</th>
                                        
                                             <th style="font-weight:bolder;">Access</th>
                                        
                                            <th style="font-weight:bolder;">Operations</th>
                                            
                                          
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                $x="1";
                                $query= mysqli_query($con, "SELECT * FROM users WHERE designation_id != '$x' AND status='Active'");
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
                  <input type="hidden" name="delete_id" value="">
                  <input type="hidden" name="delete_image" value="">
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
                            
                            </div>

                            </div>
                    </div>
                            </div>
                                    
</div></div>
            </div>

            
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">
            
             <div class="form-group">

            <label>Employee Code</label>
                <input type="text" id="code" name="code" class="form-control" placeholder="Enter Employee Code" required>
            </div>
<p class="text-danger" id="danger1" style="display:none;margin-top:-10px;margin-left:10px;"></p>
<p class="text-success" id="success1" style="display:none; margin-top:-10px;margin-left:10px;"></p>
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
                
                  <div class="form-group" style="display:block;" >
                <label>Report To Level ( L1 to L5 )</label>
                <select type="text" id="random" name="random" class="form-control" onchange="zero1()">
                <option value="" selected hidden>Choose Here...</option>
                
                </select>
                </div>
                
                <div class="form-group">
                <label>Branch</label>
                <select name="branch" class="form-control" id="branch" onchange="zero()" required>
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

                <div class="form-group" id="level6div">
                <label>Report To ( Person )</label>
                <select type="text" id="fetch" name="head" class="form-control" required>
                <option selected hidden>Choose here...</option>
               
                </select>
                </div>

 <script>   
                    function zero1(){
                       document.getElementById('branch').value="";
                       document.getElementById('fetch').value="";
                    }
                </script>
                
                <div class="form-group">
                <label>City</label>
                <select name="city" class="form-control" required>
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
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
            </div>
            <p class="text-danger" id="danger2" style="display:none;margin-top:-10px;margin-left:10px;"></p>
<p class="text-success" id="success2" style="display:none; margin-top:-10px;margin-left:10px;"></p>
            
            <div class="form-group">
            
                <label>Password</label>
             <input type="password" name="password" class="form-control" placeholder="Enter Password"  required>
           </div>

           <div class="form-group">
    <label for="exampleFormControlFile1">Image Upload (Passport Size)</label>
    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" required>
  </div>
                        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" name="insertuser" id="insertuser" class="btn btn-primary">Save</button>
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
    } );
</script>

<script>

 function zero(){
                        var branch=document.getElementById('branch').value;
                        var random=document.getElementById('random').value;
                         $.ajax({
        url: 'fetch.php',
        method: 'POST',
        data:{branch:branch, random:random},
        dataType:"text",
        success:function(data){
            $('#fetch').html(data);
          //  document.getElementById('fetch').innerHTML=data;
        }
    });
                    }
                    
                     function change(){
                        var designation=document.getElementById('designation').value;
                       
                         $.ajax({
        url: 'fetch1.php',
        method: 'POST',
        data:{designation:designation},
        dataType:"text",
        success:function(data){
            $('#random').html(data);
          //  document.getElementById('fetch').innerHTML=data;
        }
    });
                    }
                   

$(document).on('keyup', '#code', function(){  
        var code= document.getElementById('code').value;
   
            $.ajax({  
                     url:"check.php",  
                     method:"POST",  
                     data:{code:code},  
                     dataType:"text",  
                     success:function(data){  
                       if (data=="Employee Code already exists") {
                           var btn = document.querySelector('#insertuser');
        btn.disabled=true;
                      document.getElementById("danger1").style.display='block';
                      document.getElementById("success1").style.display='none';
          document.getElementById("danger1").innerHTML=data;
          $(function() {
setTimeout(function() { $("#danger1").fadeOut(1000); }, 3500)

})          
                       } else {
                           var btn = document.querySelector('#insertuser');
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


      
      $(document).on('keyup', '#email', function(){  
        var email= document.getElementById('email').value;

            $.ajax({  
                     url:"display4.php",  
                     method:"POST",  
                     data:{email:email},  
                     dataType:"text",  
                     success:function(data1){  
                       if (data1=="Email already exists") {
                           var btn1 = document.querySelector('#insertuser');
        btn1.disabled=true;
                      document.getElementById("danger2").style.display='block';
                       document.getElementById("success2").style.display='none';
          document.getElementById("danger2").innerHTML=data1;
          $(function() {
setTimeout(function() { $("#danger2").fadeOut(1000); }, 3500)

})          
                       } else {
                           var btn1 = document.querySelector('#insertuser');
        btn1.disabled=false;
                        document.getElementById("success2").style.display='block';
                        document.getElementById("danger2").style.display='none';
                        
          document.getElementById("success2").innerHTML=data1;
          $(function() {
setTimeout(function() { $("#success2").fadeOut(1000); }, 3500)

})  
                       }            
                     }  
                });  
       
      });
</script>