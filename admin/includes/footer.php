<footer class="footer">
				<div class="container-fluid">
				
					<div class="copyright ml-auto">
					&#169; <?php echo date("Y"); ?>Copyright | Designed and Developed by <a href="https://saumyasarkar.com" target=_blank>Saumya Sarkar</a>
					</div>				
				</div>
			</footer>
		</div>
		
		
	</div>
	<!--   Core JS Files

			<script src="./assets/js/jquery.js"></script>
	-->
			

	<script src="./assets/js/core/jquery.3.2.1.min.js"></script>
	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script src="./assets/js/core/popper.min.js"></script>
	<script src="./assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="./assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="./assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="./assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Atlantis JS -->
	<script src="./assets/js/atlantis.min.js"></script>

	<script src="./assets/js/datatables.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="./assets/js/setting-demo2.js"></script>
	<script>
		$('#displayNotif').on('click', function(){
			var placementFrom = $('#notify_placement_from option:selected').val();
			var placementAlign = $('#notify_placement_align option:selected').val();
			var state = $('#notify_state option:selected').val();
			var style = $('#notify_style option:selected').val();
			var content = {};

			content.message = 'Turning standard Bootstrap alerts into "notify" like notifications';
			content.title = 'Bootstrap notify';
			if (style == "withicon") {
				content.icon = 'fa fa-bell';
			} else {
				content.icon = 'none';
			}
			content.url = 'index.html';
			content.target = '_blank';

			$.notify(content,{
				type: state,
				placement: {
					from: placementFrom,
					align: placementAlign
				},
				time: 1000,
			});
		});
	</script>
	<script>
$(document).ready(function() {
	// get current URL path and assign 'active' class
  var pathname = window.location.pathname;
  var name = pathname.replace('/admin/', '');
  
 if (name=="users.php"){
     
  $('#user').addClass('active');
  $('.user1').addClass('active');
  $('#charts').addClass('show');

 } else if (name== "inactive.php"){
     
  $('#user').addClass('active');
  $('.user2').addClass('active');
  $('#charts').addClass('show');
  
 } else if (name== "overview.php"){
     
  $('#prospect').addClass('active');
  $('.p1').addClass('active');
  $('#base').addClass('show');
  
 } else if (name== "open.php"){
     
  $('#prospect').addClass('active');
  $('.p3').addClass('active');
  $('#base').addClass('show');
  
 } else if (name== "unsure.php"){
     
  $('#prospect').addClass('active');
  $('.p2').addClass('active');
  $('#base').addClass('show');
  
 } else if (name== "wip.php"){
     
  $('#prospect').addClass('active');
  $('.p4').addClass('active');
  $('#base').addClass('show');
  
 } else if (name== "closed.php"){
     
  $('#prospect').addClass('active');
  $('.p5').addClass('active');
  $('#base').addClass('show');
  
 } else {
     
  $('#nav > li > a[href="'+name+'"]').parent().addClass('active');
}
  });
  
 




</script>

	  <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>
