      </div>
      </div>

      <!-- Optional JavaScript -->
      <!-- Jquery JS-->
      <script src="<?php echo base_url('vendor/jquery-3.2.1.min.js'); ?>"></script>
      <!-- Bootstrap JS-->
      <script src="<?php echo base_url('vendor/bootstrap-4.1/popper.min.js'); ?>"></script>
      <script src="<?php echo base_url('vendor/bootstrap-4.1/bootstrap.min.js'); ?>"></script>
      <!-- Vendor JS       -->
      <script src="<?php echo base_url('vendor/slick/slick.min.js'); ?>"></script>
      <script src="<?php echo base_url('vendor/wow/wow.min.js'); ?>"></script>
      <script src="<?php echo base_url('vendor/animsition/animsition.min.js'); ?>"></script>
      <script src="<?php echo base_url('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>"></script>
      <script src="<?php echo base_url('vendor/counter-up/jquery.waypoints.min.js'); ?>"></script>
      <script src="<?php echo base_url('vendor/counter-up/jquery.counterup.min.js'); ?>"></script>
      <script src="<?php echo base_url('vendor/circle-progress/circle-progress.min.js'); ?>"></script>
      <script src="<?php echo base_url('vendor/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
      <script src="<?php echo base_url('vendor/chartjs/Chart.bundle.min.js'); ?>"></script>
      <script src="<?php echo base_url('vendor/select2/select2.min.js'); ?>"></script>

      <!-- Main JS-->
      <script src="<?php echo base_url('js/main.js'); ?>"></script>
      <script src="<?php echo base_url('js/DataTables/datatables.min.js'); ?>"></script>

      <script>
      	$("#zero_config").DataTable();
      </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
      	$(document).ready(function() {
      		$("#productForm").on('submit', function(e) {
      			e.preventDefault();
      			$.ajax({
      				url: '<?php echo site_url('Product/create_new'); ?>',
      				type: 'post',
      				data: $(this).serialize(),
      				success: function(response) {
      					alert(response);
      				},
      				error: function(jqXHR, textStatus, errorThrown) {
      					console.log(textStatus, errorThrown);
      				}
      			});
      		});
      	});
      </script>



      </body>

      </html>