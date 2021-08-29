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
					    			    
						<div class="col-md-6">
						   
							<div class="card">
								<div class="card-header">
									<div class="card-title">Generate Report&nbsp;&nbsp;</div>
								</div>  
								<div class="card-body">
								   
								    <form method="post" action="export.php">
								        
<div class="form-group">
                <label>Person</label>
                <select name="user" class="form-control" id="person" onchange="zero()" >
                <option value="" selected hidden>Choose Here...</option>
                <?php
                $query= mysqli_query($con, "SELECT * FROM users WHERE user_id!=1 ORDER BY designation_id ASC");
             
                                    
                                   
                while ($row = mysqli_fetch_assoc($query)){
                        $d_id = $row['designation_id'];
                    $query_1 = mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d_id'");
                   $row_1 = mysqli_fetch_assoc($query_1);
                ?>
                <option value="<?php echo $row['user_id']; ?>"><?php echo "".$row['name']." (".$row_1['level'].")"; ?></option>
                <?php   
                    
                }
                ?>
                </select>
                </div>
                
                <div class="form-group">
                <label>Team</label>
                <select name="team" class="form-control" id="team" onchange="zeroa()" >
                <option value="" selected hidden>Choose Here...</option>
                <?php
                $query1= mysqli_query($con, "SELECT * FROM users ORDER BY designation_id ASC");
             
                while ($row1 = mysqli_fetch_assoc($query1)){
                        $d_id = $row1['designation_id'];
                    $query_2 = mysqli_query($con, "SELECT * FROM designation WHERE designation_id = '$d_id'");
                   $row_2 = mysqli_fetch_assoc($query_2);
                ?>
                <option value="<?php echo $row1['user_id']; ?>"><?php echo "".$row1['name']." (".$row_2['level'].")"; ?></option>
                <?php   
                    
                }
                ?>
                </select>
                </div>
                
                <?php
                $array1=array();
                $query3a= mysqli_query($con, "SELECT * FROM branch");
                while($rowa=mysqli_fetch_assoc($query3a)){
                    array_push($array1, $rowa['branch_id']);
                    };
                $branch= implode(", ",$array1); 
                
                ?>
                
                <div class="form-group">
                <label>Branch</label>
                <select name="branch" class="form-control" id="branch" onchange="zerob()">
                    <option value="" hidden>Choose Here...</option>
                <option value="<?php echo $branch; ?>" selected>All</option>
                
                <?php
                $query3= mysqli_query($con, "SELECT * FROM branch");
                while ($row3= mysqli_fetch_assoc($query3)){
                       ?>
                <option value="<?php echo $row3['branch_id']; ?>"><?php echo "".$row3['name'].""; ?></option>
                <?php   
                    
                }
                ?>
                </select>
                </div>
                
                <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" id="status" required>
                <option value="'New', 'Open', 'Work in Progress', 'Closed'" selected>All</option>
                <option value="'New'">New</option>
                <option value="'Open'">Open</option>
                <option value="'Wip'">Work In Progress</option>
                <option value="'Closed'">Closed</option>
               </select>
                </div>
                
                 <div class="form-group">
<label>Period</label>
                <div class="row">
     
    <div class="col-md-5">
      <input type="text" id="datepicker" name="from" class="form-control" placeholder="From" required>
    </div><p style="margin-top:5px;">to</p>
    <div class="col-md-5">
      <input type="text" id="datepicker_1" name="to" class="form-control" placeholder="To" required>
     </div>
  </div>
</div>
  
                 <div class="form-group">
				 <button type="submit" class="btn btn-primary" name="export">Generate Report</button>	
				 </div>
								    </form>
								    
								    </div></div>
					</div>
					</div>
				</div>
			</div>
			
			
<?php
include 'includes/footer.php';
?>

<script>
       function zero(){
                       document.getElementById('team').value="";
                       document.getElementById('team').text="";
                       document.getElementById('branch').value="";
                       document.getElementById('branch').text="";
                    }
       function zeroa(){
                       document.getElementById('person').value="";
                       document.getElementById('person').text="";
                       document.getElementById('branch').value="";
                       document.getElementById('branch').text="";
                    } 
                    
       function zerob(){
                       document.getElementById('person').value="";
                       document.getElementById('person').text="";
                       document.getElementById('team').value="";
                       document.getElementById('team').text="";
                    }                       
                    
          $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "yy-mm-dd",
    });
   } );

  $( function() {
    $( "#datepicker_1" ).datepicker({
      dateFormat: "yy-mm-dd",
    });
   } );            
</script>