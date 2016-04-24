<?php
if(!defined("BASEPATH")) {
	die("Direct Access is not allowed.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?=$config['title']?></title>

  <!-- Bootstrap core CSS -->

  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <link href="assets/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="assets/css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="assets/css/icheck/flat/green.css" rel="stylesheet">
  <link href="assets/css/floatexamples.css" rel="stylesheet" />

  <script src="assets/js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body <?=($logged_in) ? 'class="nav-md"' : 'style="background:#F7F7F7;"'?>>
<?php if(isset($_SESSION['error'])) { ?>
<div class="alert alert-danger alert-dismissible fade in" role="alert" style="border-radius:0; -webkit-border-radius:0; -moz-border-radius: 0; margin: 0;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <strong>Error!</strong> <?=$_SESSION['error']?>
</div>
<?php } else if(isset($_SESSION['success'])) { ?>
<div class="alert alert-success alert-dismissible fade in" role="alert" style="border-radius:0; -webkit-border-radius:0; -moz-border-radius: 0; margin: 0;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <strong>Success!</strong> <?=$_SESSION['success']?>
</div>
<?php } ?>
  <div class="container body">
    <div class="main_container">
    <?php
    if($logged_in) { ?>
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title" style="text-align: center;padding: 0;margin: 0;"><img src="assets/images/logo.png" style="width:140px; height:60px;" /></a>
          </div>
          <div class="clearfix"></div>
          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
                <li><a><i class="fa fa-picture-o" aria-hidden="true"></i> Gallery <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="index.php?page=gallery">All Entries</a></li>
                    <li><a href="index.php?page=gallery&add">Add new Entry</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-flag" aria-hidden="true"></i> Missions <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="index.php?page=missions">All Entries</a></li>
                    <li><a href="index.php?page=missions&add">Add new Entry</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-smile-o" aria-hidden="true"></i> Stories <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="index.php?page=stories">All Entries</a>
                    </li>
                    <li><a href="index.php?page=stories&add">Add new Entry</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="assets/images/user.png" alt=""><?=$user[0]['fullname']?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="#"><i class="fa fa-cog pull-right"></i>  Profile</a>
                  </li>
                  <li><a href="index.php?page=logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->
      <?php } ?>