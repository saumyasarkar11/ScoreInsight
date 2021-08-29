<?php
include 'db.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

                            <?php
                            if (isset($_POST['view_btn'])){
                                $id=$_POST['view_id'];
                                $ida=$_POST['view_id_1'];
                                $query= mysqli_query($con, "SELECT * FROM prospects where prospect_id='$id'");                                           
                                $row=mysqli_fetch_assoc($query);
                                $query_a= mysqli_query($con, "SELECT * FROM companies WHERE company_id='$ida'");
                                $row_a=mysqli_fetch_assoc($query_a);
                                
                                $query10 = mysqli_query($con, "UPDATE `converations` SET `status` = 'Read' WHERE `converations`.`prospect_id` = $id");
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
					<div class="row">
						<div class="col-md-12">
						    <div class="alert alert-success" id="success" role="alert" style="display:none;"></div>
							<div class="card">
	<div class="card-header">
									<div class="card-title">View Prospect</div>
								</div>  

	<div class="card-body">
                            
                            <div class="row">
                            <table class="table table-bordered table-striped" style="width:50%;">
<thead  bgcolor="#1269DB"><tr><th colspan="2" style=" text-align:center; color:white;">Company Details</th></tr></thead>
<tbody>
<tr><td><h6>Company: </td><td><?php echo $row_a['company_name']; ?></h6></td></tr>
<tr><td><h6>Address: </td><td><?php echo $row_a['address']; ?></h6></td></tr>
<tr><td><h6>City: </td><td><?php echo $row_a['city']; ?></h6></td></tr>
<tr><td><h6>State: </td><td><?php echo $row_a['state']; ?></h6></td></tr>
<tr><td><h6>ZIP/PIN Code: </td><td><?php echo $row_a['pin']; ?></h6></td></tr>
<tr><td><h6>Country: </td><td><?php echo $row_a['country']; ?></h6></td></tr>
<tr><td><h6>Phone: </td><td><?php echo $row_a['phone']; ?></h6></td></tr>
<tr><td><h6>Whatsapp: </td><td><?php echo $row_a['whatsapp']; ?></h6></td></tr>
<tr><td><h6>Email: </td><td><a href="mailto:<?php echo $row_a['email']; ?>"><?php echo $row_a['email']; ?></a></h6></td></tr>
<tr><td><h6>Alt. Email: </td><td><a href="mailto:<?php echo $row_a['alt_email']; ?>"><?php echo $row_a['alt_email']; ?></a></h6></td></tr>
<tr><td><h6>Website: </td><td class="number8a" data-id8a="<?php echo $ida; ?>" ><?php echo $row_a['website']; ?></h6></td></tr>

</tbody>
</table>

<table class="table table-bordered table-striped" style="width:50%;">
<thead bgcolor="#1269DB"><tr><th colspan="2" style=" text-align:center; color:white;">Primary Contact</th></tr></thead>
<tbody>
<tr><td><h6>Contact Name: </td><td><?php echo $row_a['contact_1']; ?></h6></td></tr>
<tr><td><h6>Designation: </td><td><?php echo $row_a['designation_1']; ?></h6></td></tr>
<tr><td><h6>Phone: </td><td><?php echo $row_a['phone_1']; ?></h6></td></tr>
<tr><td><h6>WhatsApp: </td><td><?php echo $row_a['whatsapp_1']; ?></h6></td></tr>
<tr><td><h6>Email: </td><td><a href="mailto:<?php echo $row_a['email_1']; ?>"><?php echo $row_a['email_1']; ?></a></h6></td></tr>
</tbody>
<thead bgcolor="#1269DB"><tr><th colspan="2" style=" text-align:center; color:white;">Secondary Contact</th></tr></thead>
<tbody>
<tr><td><h6>Contact Name: </td><td><?php echo $row_a['contact_2']; ?></h6></td></tr>
<tr><td><h6>Designation: </td><td><?php echo $row_a['designation_2']; ?></h6></td></tr>
<tr><td><h6>Phone: </td><td><?php echo $row_a['phone_2']; ?></h6></td></tr>
<tr><td><h6>WhatsApp: </td><td><?php echo $row_a['whatsapp_2']; ?></h6></td></tr>
<tr><td><h6>Email: </td><td><a href="mailto:<?php echo $row_a['email_2']; ?>"><?php echo $row_a['email_2']; ?></a></h6></td></tr>
</tbody>
</table>



<table class="table table-bordered table-striped" style="width:50%;">
<thead  bgcolor="#1269DB"><tr><th colspan="2" style=" text-align:center; color:white;">Business Details</th></tr></thead>
<tbody>
<tr><td><h6>Staus: </td><td><?php echo $row['status']; ?></h6></td></tr>
<tr><td><h6>Requirement: </td><td><?php $n=rtrim($row['requirement'], ", "); echo $n; ?></h6></td></tr>
<tr><td><h6>Approx. Prospect Value: </td><td><?php echo $row['prospect_value']; ?></h6></td></tr>
<tr><td><h6>Order Value: </td><td><?php echo $row['order_value']; ?></h6></td></tr>
<tr><td><h6>Follow Up Date: </td><td><?php echo $row['followup_date']; ?></h6></td></tr>
<tr><td><h6>Closing Date: </td><td><?php echo $row['closing_date']; ?></h6></td></tr>

</tbody>
</table>

<div class="table-wrapper-scroll-y my-custom-scrollbar">
<table class="table table-bordered" style="width:490px;">
<thead  bgcolor="#1269DB"><tr><th colspan="2" style=" text-align:center; color:white;">Conversation</th></tr></thead>
<tbody>

<?php
$query_k= mysqli_query($con, "SELECT * FROM converations where prospect_id='$id' ORDER BY `converations`.`conversation_id` DESC");                                           
while ($row_k = mysqli_fetch_assoc($query_k)){
?>

<tr><td><h6><?php echo $row_k['statement']; ?></h6><small style="float:right; font-size:10px;"><?php echo $row_k['time']; ?></small></td></tr> 
<?php }
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
                                    

            </div>


<?php
include 'includes/footer.php';
?>
<!-- <script>
    $(document).ready(function() {
    $('#example').DataTable({
        
        
    });

    });

    </script>
-->
