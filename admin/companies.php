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
									<div class="card-title">Customers&nbsp;&nbsp;<button style="padding: 5px 15px 5px 15px;" type="button" class="btn btn-primary btn-round " data-toggle="modal" data-target="#addadminprofile">Add Customer</button></div>
								</div>  
								<div class="card-body">
								    
<div class="table-responsive">
                    <table align="left" id="example" class="table table-bordered table-hover" >
																 <thead bgcolor="#FAFAFA">
                        <tr>
                                <th style="font-weight:bolder;">Customer*</th>
                                <th style="font-weight:bolder;">Type*</th>
                                <th style="font-weight:bolder;">City*</th>
                                <th style="font-weight:bolder;">Website*</th>
                                <th style="font-weight:bolder;">Contact</th>
                                <th style="font-weight:bolder;">Handler*</th>
                            
                                <th style="font-weight:bolder;">Operations</th>
                           
                                
                         
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                    $query= mysqli_query($con, "SELECT * FROM companies");
                    if (mysqli_num_rows($query)!=0){
                    while($row=mysqli_fetch_assoc($query)){
                       $type=$row['type'];
                          
                    $query1= mysqli_query($con, "SELECT * FROM company_type WHERE type_id = '$type';");
                   
                   $row1=mysqli_fetch_assoc($query1);
                      
                    ?>

                    <tr>
                        <td data-toggle="tooltip" data-placement="top" data-html="true" title="Phone: <?php echo $row['phone']; ?><br>Email: <?php echo $row['email']; ?>"><?php echo $row['company_name']; ?>
                       </td> 
                      <td data-toggle="tooltip" data-placement="top" title="GSTN: <?php echo $row['gstn']; ?> ">
                        <?php echo $row1['type']; ?></td>  
                        <td data-toggle="tooltip" data-placement="top" title="Address: <?php echo $row['address']; ?> State: <?php echo $row['state']; ?>, Pin: <?php echo $row['pin']; ?>, Country:  <?php echo $row['country']; ?> ">
                        <?php echo $row['city']; ?></td>  
                        
                        <td data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo $row['website']; ?>">
                        <?php 
                        if (empty($row['website'])){
                            echo"-";
                        } else {
                        ?>
                        <a href="https://<?php echo $row['email']; ?>" target="_blank">View</a><?php } ?></td>
                        
                        <td data-toggle="tooltip" data-placement="top" title="Name: <?php echo $row['contact_1']; ?>, Designation: <?php echo $row['designation_1']; ?>, Phone: <?php echo $row['phone_1']; ?>, Email:  <?php echo $row['email_1']; ?> ">
                        View</td>  
                        
                        <?php
                                    $u_id = $row['user_id'];
                                    $query_2= mysqli_query($con, "SELECT * FROM users WHERE user_id = '$u_id'");
                                    $row_2 = mysqli_fetch_assoc($query_2);
                                    $idd=$row_2['designation_id'];
                                     $query_3= mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$idd'");
                                    $row_3 = mysqli_fetch_assoc($query_3);
                                    ?>
                        
                                <td data-toggle="tooltip" data-placement="top" data-html="true" title="<?php echo "".$row_3['name']." (".$row_3['level'].")<br>Emp. Code - ".$row_2['code'].""; ?>"><?php echo $row_2['name']; ?></td>
                       
   <td><div class="row">
          <form action="company_view.php" method="post">
                    <input type="hidden" name="view_id" value="<?php echo $row['company_id']; ?>">
                    <button  type="submit" style="padding: 5px 10px 5px 10px;" name="view_btn" class="btn btn-link btn-primary btn-lg"><i class="fas fa-eye"></i></button>
                </form>
              
                <form action="edit_company.php" method="post">
                    <input type="hidden" name="view_id" value="<?php echo $row['company_id']; ?>">
                    <button  type="submit" style="padding: 5px 10px 5px 10px;" name="view_btn" class="btn btn-link btn-success btn-lg"><i class="fas fa-pen"></i></button>
                </form>   </div>
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
<h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="code.php" method="POST">

<div class="modal-body">

<div class="form-group">
    <label>Allot Customer to</label>
    <select name="user_id" class="form-control" required>
        <option value="" selected hidden>Choose here...</option>
        <?php
        $sqlv = mysqli_query($con, "SELECT * FROM users WHERE designation_id!=1 ORDER BY designation_id asc");
        while ($rowv = mysqli_fetch_assoc($sqlv)){
             $idb=$rowv['designation_id'];
            $sqlr=mysqli_query($con, "SELECT * FROM designation WHERE designation_id ='$idb'");
            $rowr=mysqli_fetch_assoc($sqlr);
        ?>
        <option value="<?php echo $rowv['user_id']; ?>"><?php echo "".$rowv['name']." (".$rowr['level'].")- Employee Code:".$rowv['code'].""; ?></option>
        <?php    
        }
        ?>
                
    </select>
</div>

<div class="form-group">
    <label>Customer Name</label>
    <input type="text" name="company_name" id="display" class="form-control" placeholder="Enter Customer Name" required>
    </div>
<p class="text-danger" id="danger1" style="display:none;margin-top:-10px;margin-left:10px;"></p>
<p class="text-success" id="success1" style="display:none; margin-top:-10px;margin-left:10px;"></p>

<div class="form-group">
    <label>Customer Type</label>
    <select name="type" class="form-control" required>
        <option value="" selected hidden>Choose here...</option>
        <?php
        $sqla = mysqli_query($con, "SELECT * FROM company_type");
        while ($rowa = mysqli_fetch_assoc($sqla)){
        ?>
        <option value="<?php echo $rowa['type_id']; ?>"><?php echo $rowa['type']; ?></option>
        <?php    
        }
        ?>
                
    </select>
</div>

<div class="form-group">
    <label>GSTN (Optional)</label>
    <input type="text" name="gstn" class="form-control" placeholder="Enter GSTN" >
</div>

<div class="form-group">
    <label>Address </label>
    <textarea name="address" class="form-control" placeholder="Enter address" required></textarea>
</div>


<div>
<label>Country </label><br>
<select name="country" class="countries order-alpha" id="countryId">
    <option value="">Select Country</option>
</select></div><br>

<div>
<label>State </label><br>
<select name="state" class="states order-alpha" id="stateId">
    <option value="">Select State</option>
</select></div><br>

<div class="form-group">
    <label>City </label>
    <input type="text" name="city" class="form-control" placeholder="Enter City" required>
</div>


<div class="form-group">
    <label>ZIP/PIN </label>
    <input type="text" name="pin" class="form-control" placeholder="Enter ZIP/PIN" required>
</div>

<div class="form-group">
    <label>Phone </label>
    <input type="text" name="phone" class="form-control" placeholder="Enter Phone No." required>
</div>

<div class="form-group">
    <label>WhatsApp (Optional)</label>
    <input type="text" name="whatsapp" class="form-control" placeholder="Enter WhatsApp No.">
</div>

<div class="form-group">
    <label>Email </label>
    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
</div>

<div class="form-group">
    <label>Alternate Email (Optional)</label>
    <input type="text" name="alt_email" class="form-control" placeholder="Enter Alternate Email" >
</div>
<div class="form-group">
    <label>Website (Optional)</label>
    <input type="text" name="website" class="form-control" placeholder="eg - www.example.com" >
</div>
<hr>
<h6 style="text-decoration:underline;"><strong>Contact Person 1</strong></h6>
<div class="form-group">
    <label>Name </label>
    <input type="text" name="contact_1" class="form-control" placeholder="Enter Name" required>
</div>

<div class="form-group">
    <label>Designation </label>
    <input type="text" name="designation_1" class="form-control" placeholder="Enter Designation" required>
</div>


<div class="form-group">
    <label>Phone </label>
    <input type="text" name="phone_1" class="form-control" placeholder="Enter Phone" required>
</div>

<div class="form-group">
    <label>WhatsApp (Optional)</label>
    <input type="text" name="whatsapp_1" class="form-control" placeholder="Enter WhatsApp">
</div>


<div class="form-group">
    <label>Email </label>
    <input type="text" name="email_1" class="form-control" placeholder="Enter Email" required>
</div>

<hr>
<h6 style="text-decoration:underline;"><strong>Contact Person 2 (Optional)</strong></h6>
<div class="form-group">
    <label>Name </label>
    <input type="text" name="contact_2" class="form-control" placeholder="Enter Name" >
</div>

<div class="form-group">
    <label>Designation </label>
    <input type="text" name="designation_2" class="form-control" placeholder="Enter Designation" >
</div>


<div class="form-group">
    <label>Phone </label>
    <input type="text" name="phone_2" class="form-control" placeholder="Enter Phone" >
</div>

<div class="form-group">
    <label>WhatsApp </label>
    <input type="text" name="whatsapp_2" class="form-control" placeholder="Enter WhatsApp">
</div>


<div class="form-group">
    <label>Email </label>
    <input type="text" name="email_2" class="form-control" placeholder="Enter Email" >
</div>


            
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button type="submit" name="addcompany" id="addcompany" class="btn btn-primary">Save</button>
</div>
</form>

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
        "order": [[ 0, "asc" ]],
    });
    });
</script>

<script>
                   $(document).on('keyup', '#display', function(){  
        var display= document.getElementById('display').value;
     
            $.ajax({  
                     url:"display3.php",  
                    method: 'POST',
                    data:{display:display},
                    dataType:"text",
                     success:function(data1){  
                       if (data1=="Customer already exists") {
                            var btn = document.querySelector('#addcompany');
        btn.disabled=true;
       
                      document.getElementById("danger1").style.display='block';
                       document.getElementById("success1").style.display='none';
          document.getElementById("danger1").innerHTML=data1;
          $(function() {
setTimeout(function() { $("#danger1").fadeOut(1000); }, 1500)

})           
                       } else {
                                             var btn = document.querySelector('#addcompany');
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