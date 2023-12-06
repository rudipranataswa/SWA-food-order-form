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

      $(document).ready(function(){
          console.log($); // Check if jQuery is loaded
          setTimeout(function() {
              $("#myAlert").remove();
          }, 1000); // remove the alert after 1 second (1000 milliseconds)
      });
    </script>
  </body>
</html>