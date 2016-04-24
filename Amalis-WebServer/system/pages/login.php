<?php
if(!defined("BASEPATH")) {
  die("Direct Access is not allowed.");
}
?>
<div id="wrapper">
  <div id="login" class="animate form">
    <section class="login_content">
      <form action="system/process.php" method="POST" name="login">
        <h1>Login</h1>
        <div>
          <input type="email" name="email" class="form-control" placeholder="Email" required="" />
        </div>
        <div>
          <input type="password" name="password" class="form-control" placeholder="Password" required="" />
        </div>
        <div class="row">
          <div class="col-lg-12" style="text-align:right;">
            <input type="submit" name="login" value="Log me in" class="btn btn-success submit" style="margin: 0; float:right;"/>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="separator">
          <div class="clearfix"></div>
          <div>
            <p>© <?=date('Y')?> All Rights Reserved</p>
          </div>
        </div>
      </form>
      <!-- form -->
    </section>
    <!-- content -->
  </div>
</div>