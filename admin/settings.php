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
									<div class="card-title">Email Configurations&nbsp;&nbsp;</div>
								</div>  

	<div class="card-body">
                            <div class="alert alert-success" id="success" role="alert" style="display:none;"></div>
                            <?php
                           
                                $query= mysqli_query($con, "SELECT * FROM email");                                           
                                $row=mysqli_fetch_assoc($query);
                               ;
                            
                                
                            ?>
                            <div class="row">
                            <table class="table table-bordered table-striped" align="center" style="width:50%;">
<thead  bgcolor="#1269DB"><tr><th colspan="2" style=" text-align:center; color:white;">Mail Configurations</th></tr></thead>
<tbody>
<tr><td><h6>Port: </td><td class="number1" data-id1="<?php echo $row['id']; ?>" contenteditable><?php echo $row['port']; ?></h6></td></tr>
<tr><td><h6>SMTP: </td><td class="number2" data-id2="<?php echo $row['id']; ?>" contenteditable><?php echo $row['smtp']; ?></h6></td></tr>
<tr><td><h6>From: </td><td class="number3" data-id3="<?php echo $row['id']; ?>" contenteditable><?php echo $row['from']; ?></h6></td></tr>
<tr><td><h6>Username: </td><td class="number4" data-id4="<?php echo $row['id']; ?>" contenteditable><?php echo $row['username']; ?></h6></td></tr>
<tr><td><h6>Password: </td><td class="number5" data-id5="<?php echo $row['id']; ?>" contenteditable><?php echo $row['password']; ?></h6></td></tr>


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
    function edit_data(id, text, columnname){
    $.ajax({
        url: 'editmail.php',
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

  $(document).on('blur', '.number1', function(){
    var id = $(this).data("id1");
    var number = $(this).text();
    edit_data(id, number, "port");
  });

  $(document).on('blur', '.number2', function(){
    var id = $(this).data("id2");
    var number2 = $(this).text();
    edit_data(id, number2, "smtp");
  });

  $(document).on('blur', '.number3', function(){
    var id = $(this).data("id3");
    var number3 = $(this).text();
    edit_data(id, number3, "from");
  });
  
   $(document).on('blur', '.number4', function(){
    var id = $(this).data("id4");
    var number4 = $(this).text();
    edit_data(id, number4, "username");
  });
  
   $(document).on('blur', '.number5', function(){
    var id = $(this).data("id5");
    var number5 = $(this).text();
    edit_data(id, number5, "password");
  });

</script>