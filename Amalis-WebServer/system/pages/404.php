<?php
if(!defined("BASEPATH")) {
	die("Direct Access is not allowed.");
}
?>
<div class="container body">
    <div class="main_container">
      <!-- page content -->
      <div class="col-md-12">
        <div class="col-middle">
          <div class="text-center text-center">
            <h1 class="error-number">404</h1>
            <h2>Sorry but we couldnt find this page</h2>
            <p>This page you are looking for does not exist</p>
            <p><button type="button" name="back" class="btn btn-default btn-sm">&laquo; Take me Back</button></p>
          </div>
        </div>
      </div>
      <!-- /page content -->
    </div>
    <script type="text/javascript">
    $("button[name=back]").click(function() {
    	$(location).attr('href', 'index.php');
    });
    </script>
  </div>