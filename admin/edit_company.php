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
									<div class="card-title">Edit Customer&nbsp;&nbsp;<button style="padding: 5px 15px 5px 15px;" type="button" class="btn btn-primary btn-round " data-toggle="modal" data-target="#addadminprofile">Transfer Customer</button></div>
								</div>  

	<div class="card-body">
                            <?php
                            if (isset($_POST['view_btn'])){
                                
                                $ida=$_POST['view_id'];
                               
                                
                                $query_a= mysqli_query($con, "SELECT * FROM companies WHERE company_id='$ida'");
                                $row_a=mysqli_fetch_assoc($query_a);
                                $pid=$row_a['type'];
                                $query_b= mysqli_query($con, "SELECT * FROM company_type WHERE type_id='$pid'");
                                $row_b=mysqli_fetch_assoc($query_b);
                            }
                                
                            ?>
                            <div class="row">
                            <table class="table table-bordered table-striped" style="width:50%;">
<thead  bgcolor="#1269DB"><tr><th colspan="2" style=" text-align:center; color:white;">Customer Details</th></tr></thead>
<tbody>
<tr><td><h6>Customer: </td><td class="number" data-id1="<?php echo $ida; ?>" contenteditable><?php echo $row_a['company_name']; ?></td></h6></tr>
<tr><td><h6>Type: </td><td>
  <select class="number50" data-id50="<?php echo $ida; ?>">
    <option value="<?php echo $row_a['type']; ?>" selected hidden><?php echo $row_b['type']; ?></option>
    <?php
      $query_c= mysqli_query($con, "SELECT * FROM company_type ORDER BY number");
      while ($row_c=mysqli_fetch_assoc($query_c)){
    ?>
    <option value="<?php echo $row_c['type_id'] ?>"><?php echo $row_c['type'] ?></option>      
    <?php
      }
    ?>
    
    
</select></h6></td></tr>
<tr><td><h6>GSTN: </td><td class="number18" data-id18="<?php echo $ida; ?>" contenteditable><?php echo $row_a['gstn']; ?></td></h6></tr>
<tr><td><h6>Address: </td><td  class="number2"  data-id2="<?php echo $ida; ?>" contenteditable><?php echo $row_a['address']; ?></h6></td></tr>
<tr><td><h6>City: </td><td  class="number3"  data-id3="<?php echo $ida; ?>" contenteditable><?php echo $row_a['city']; ?></h6></td></tr>
<tr><td><h6>State: </td><td  class="number4"  data-id4="<?php echo $ida; ?>" contenteditable><?php echo $row_a['state']; ?></h6></td></tr>
<tr><td><h6>ZIP/PIN Code: </td><td  class="number5"  data-id5="<?php echo $ida; ?>" contenteditable><?php echo $row_a['pin']; ?></h6></td></tr>
<tr><td><h6>Country: </td><td  class="number6"  data-id6="<?php echo $ida; ?>" contenteditable><?php echo $row_a['country']; ?></h6></td></tr>
<tr><td><h6>Phone: </td><td class="number7" data-id7="<?php echo $ida; ?>" contenteditable><?php echo $row_a['phone']; ?></h6></td></tr>
<tr><td><h6>Whatsapp: </td><td class="number8" data-id8="<?php echo $ida; ?>" contenteditable><?php echo $row_a['whatsapp']; ?></h6></td></tr>
<tr><td><h6>Email: </td><td class="number9" data-id9="<?php echo $ida; ?>" contenteditable><a href="mailto:<?php echo $row_a['email']; ?>"><?php echo $row_a['email']; ?></a></h6></td></tr>
<tr><td><h6>Alt. Email: </td><td class="number9a" data-id9a="<?php echo $ida; ?>" contenteditable><a href="mailto:<?php echo $row_a['alt_email']; ?>"><?php echo $row_a['alt_email']; ?></a></h6></td></tr>
<tr><td><h6>Website: </td><td class="number8a" data-id8a="<?php echo $ida; ?>" contenteditable><?php echo $row_a['website']; ?></h6></td></tr>
</tbody>
</table>

<table class="table table-bordered table-striped" style="width:50%;">
<thead bgcolor="#1269DB"><tr><th colspan="2" style=" text-align:center; color:white;">Primary Contact</th></tr></thead>
<tbody>
<tr><td><h6>Contact Name: </td><td class="number10" data-id10="<?php echo $row_a['company_id']; ?>" contenteditable><?php echo $row_a['contact_1']; ?></h6></td></tr>
<tr><td><h6>Designation: </td><td class="number11" data-id11="<?php echo $row_a['company_id']; ?>" contenteditable><?php echo $row_a['designation_1']; ?></h6></td></tr>
<tr><td><h6>Phone: </td><td class="number12" data-id12="<?php echo $row_a['company_id']; ?>" contenteditable><?php echo $row_a['phone_1']; ?></h6></td></tr>
<tr><td><h6>WhatsApp: </td><td class="number12a" data-id12a="<?php echo $row_a['company_id']; ?>" contenteditable><?php echo $row_a['whatsapp_1']; ?></h6></td></tr>
<tr><td><h6>Email: </td><td class="number13" data-id13="<?php echo $row_a['company_id']; ?>" contenteditable><a href="mailto:<?php echo $row_a['email_1']; ?>"><?php echo $row_a['email_1']; ?></a></h6></td></tr>
</tbody>
<thead bgcolor="#1269DB"><tr><th colspan="2" style=" text-align:center; color:white;">Secondary Contact</th></tr></thead>
<tbody>
<tr><td><h6>Contact Name: </td><td class="number14" data-id14="<?php echo $row_a['company_id']; ?>" contenteditable><?php echo $row_a['contact_2']; ?></h6></td></tr>
<tr><td><h6>Designation: </td><td class="number15" data-id15="<?php echo $row_a['company_id']; ?>" contenteditable><?php echo $row_a['designation_2']; ?></h6></td></tr>
<tr><td><h6>Phone: </td><td class="number16" data-id16="<?php echo $row_a['company_id']; ?>" contenteditable><?php echo $row_a['phone_2']; ?></h6></td></tr>
<tr><td><h6>WhatsApp: </td><td class="number16a" data-id16a="<?php echo $row_a['company_id']; ?>" contenteditable><?php echo $row_a['whatsapp_2']; ?></h6></td></tr>
<tr><td><h6>Email: </td><td class="number17" data-id17="<?php echo $row_a['company_id']; ?>" contenteditable><a href="mailto:<?php echo $row_a['email_2']; ?>"><?php echo $row_a['email_2']; ?></a></h6></td></tr>
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
<h5 class="modal-title" id="exampleModalLabel">Transfer Customer</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>


<div class="modal-body">
    <form action="code.php" method="POST">
        
         <div class="form-group">
    <label>Current Handler for Customer </label>
    <?php
    $idc=$row_a['user_id'];
    $sqla=mysqli_query($con, "SELECT * FROM users where user_id ='$idc'");
    $rowc=mysqli_fetch_assoc($sqla)
    ?>
    <?php
    $idn=$rowc['designation_id'];
            $sqln=mysqli_query($con, "SELECT * FROM designation WHERE designation_id ='$idn'");
            $rown=mysqli_fetch_assoc($sqln);
        ?>
    <input type="text" class="form-control" value="<?php echo "".$rowc['name']." (".$rown['level'].")- Employee Code: ".$rowc['code'].""; ?>" disabled>
</div>
        
        <div class="form-group">
    <label>New Handler for Customer </label>

    <input type="hidden" value="<?php echo $ida; ?>" name="company_id">
    <select type="text" name="user_id" class="form-control" required>
        <option value="" selected hidden>Choose here...</option>
        <?php
        $sqlq=mysqli_query($con, "SELECT * FROM users WHERE designation_id!='1' ORDER BY designation_id asc");
        while ($rowq=mysqli_fetch_assoc($sqlq)){
            $idb=$rowq['designation_id'];
            $sqlr=mysqli_query($con, "SELECT * FROM designation WHERE designation_id ='$idb'");
            $rowr=mysqli_fetch_assoc($sqlr);
        ?>
        <option value="<?php echo $rowq['user_id']; ?>"><?php echo "".$rowq['name']." (".$rowr['level'].")- Employee Code:".$rowq['code'].""; ?></option>
        <?php    
        }
        ?>
    </select>
</div>
   

    </div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button type="submit" name="transferc" class="btn btn-primary">Save</button>
</div>
</form>

</div>
</div>
</div>
            
            <?php
include 'includes/footer.php';
?>
<script>
    function edit_data(id, text, columnname){
    $.ajax({
        url: 'editprospect.php',
        method: 'POST',
        data:{id:id, text:text, columnname:columnname},
        dataType:"text",

        success:function(data){
          document.getElementById("success").style.display='block';
          document.getElementById("success").innerHTML=data;
          $(function() {
setTimeout(function() { $("#success").fadeOut(1500); }, 5000)

})
          
          
        }
    });
   
  }

  $(document).on('blur', '.number', function(){
    var id = $(this).data("id1");
    var number = $(this).text();
    edit_data(id, number, "company_name");
  });

  $(document).on('blur', '.number2', function(){
    var id = $(this).data("id2");
    var number2 = $(this).text();
    edit_data(id, number2, "address");
  });

  $(document).on('blur', '.number3', function(){
    var id = $(this).data("id3");
    var number3 = $(this).text();
    edit_data(id, number3, "city");
  });

  $(document).on('blur', '.number4', function(){
    var id = $(this).data("id4");
    var number4 = $(this).text();
    edit_data(id, number4, "state");
  });

  $(document).on('blur', '.number5', function(){
    var id = $(this).data("id5");
    var number5 = $(this).text();
    edit_data(id, number5, "pin");
  });

  $(document).on('blur', '.number6', function(){
    var id = $(this).data("id6");
    var number6 = $(this).text();
    edit_data(id, number6, "country");
  });

  $(document).on('blur', '.number7', function(){
    var id = $(this).data("id7");
    var number7 = $(this).text();
    edit_data(id, number7, "phone");
  });

  $(document).on('blur', '.number8', function(){
    var id = $(this).data("id8");
    var number8 = $(this).text();
    edit_data(id, number8, "whatsapp");
  });

  $(document).on('blur', '.number9', function(){
    var id = $(this).data("id9");
    var number9 = $(this).text();
    edit_data(id, number9, "email");
  });
  
    $(document).on('blur', '.number8a', function(){
    var id = $(this).data("id8a");
    var number8a = $(this).text();
    edit_data(id, number8a, "website");
  });

  $(document).on('blur', '.number9a', function(){
    var id = $(this).data("id9a");
    var number9a = $(this).text();
    edit_data(id, number9a, "alt_email");
  });

  $(document).on('blur', '.number10', function(){
    var id = $(this).data("id10");
    var number10 = $(this).text();
    edit_data(id, number10, "contact_1");
  });

  $(document).on('blur', '.number11', function(){
    var id = $(this).data("id11");
    var number11 = $(this).text();
    edit_data(id, number11, "designation_1");
  });

  $(document).on('blur', '.number12', function(){
    var id = $(this).data("id12");
    var number12 = $(this).text();
    edit_data(id, number12, "phone_1");
  });
  
    $(document).on('blur', '.number12a', function(){
    var id = $(this).data("id12a");
    var number12a = $(this).text();
    edit_data(id, number12a, "whatsapp_1");
  });

  $(document).on('blur', '.number13', function(){
    var id = $(this).data("id13");
    var number13 = $(this).text();
    edit_data(id, number13, "email_1");
  });

  $(document).on('blur', '.number14', function(){
    var id = $(this).data("id14");
    var number14 = $(this).text();
    edit_data(id, number14, "contact_2");
  });

  $(document).on('blur', '.number15', function(){
    var id = $(this).data("id15");
    var number15 = $(this).text();
    edit_data(id, number15, "designation_2");
  });

  $(document).on('blur', '.number16', function(){
    var id = $(this).data("id16");
    var number16 = $(this).text();
    edit_data(id, number16, "phone_2");
  });
  
    $(document).on('blur', '.number16a', function(){
    var id = $(this).data("id16a");
    var number16a = $(this).text();
    edit_data(id, number16a, "whatsapp_2");
  });

  $(document).on('blur', '.number17', function(){
    var id = $(this).data("id17");
    var number17 = $(this).text();
    edit_data(id, number17, "email_2");
  });
  
  $(document).on('blur', '.number18', function(){
    var id = $(this).data("id18");
    var number18 = $(this).text();
    edit_data(id, number18, "gstn");
  });


  $(document).on('change', '.number50', function(){
    var id = $(this).data("id50");
    var number50 = $(this).find(":selected").val();
    edit_data(id, number50, "type");
  });
  
</script>