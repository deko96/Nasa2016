<?php
if(!defined("BASEPATH")) {
	die("Direct Access is not allowed.");
}
if($logged_in) {
?>
<!-- footer content -->
<footer>
  <div class="pull-right">
    &copy; <?=date('Y')?> - All rights reserved.</a>
  </div>
  <div class="clearfix"></div>
</footer>
<?php
}
?>
</div>
</div>
	<script src="assets/js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="assets/js/progressbar/bootstrap-progressbar.min.js"></script>
  <!-- icheck -->
  <script src="assets/js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="assets/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="assets/js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="assets/js/chartjs/chart.min.js"></script>
  <!-- sparkline -->
  <script src="assets/js/sparkline/jquery.sparkline.min.js"></script>

  <script src="assets/js/custom.js"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="assets/js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="assets/js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="assets/js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="assets/js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="assets/js/flot/date.js"></script>
  <script type="text/javascript" src="assets/js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="assets/js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="assets/js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="assets/js/flot/jquery.flot.resize.js"></script>
  <!-- pace -->
  <script src="assets/js/pace/pace.min.js"></script>
</body>
</html>
<?php
if(isset($_SESSION['error']) || isset($_SESSION['success'])) {
?>
<script type="text/javascript">
	$(".alert").delay(5000).hide("fast");
</script>
<?php
}
if(isset($_SESSION['error'])) {
	unset($_SESSION['error']);
} else if(isset($_SESSION['success'])) {
	unset($_SESSION['success']);
}
?>