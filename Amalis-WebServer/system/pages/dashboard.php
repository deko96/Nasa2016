<?php
if(!defined("BASEPATH")) {
  die("Direct Access is not allowed.");
}
if(!$logged_in) {
  $_SESSION['error'] = "You must be logged in to view this page.";
  header("Location: index.php");
  die();
}
$staffMembers = $mysql->QueryGetNumRows("SELECT `id` FROM `staff`");
$allGallery = $mysql->QueryGetNumRows("SELECT `id` FROM `gallery`");
$galleryData = $mysql->QueryFetchArrayAll("SELECT * FROM `gallery` LIMIT 5");
$allMissions = $mysql->QueryGetNumRows("SELECT `id` FROM `missions`");
$missionsData = $mysql->QueryFetchArrayAll("SELECT * FROM `missions` LIMIT 5");
$allStories = $mysql->QueryGetNumRows("SELECT `id` FROM `stories`");
$storiesData = $mysql->QueryFetchArrayAll("SELECT * FROM `stories` LIMIT 5");
?>
<!-- page content -->
      <div class="right_col" role="main">

        <br />
        <div class="">
          <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="count"><?=$staffMembers?></div>
                <h3>Staff Members</h3>
                <p>Total staff memebers</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-picture-o" aria-hidden="true"></i></i>
                </div>
                <div class="count"><?=$allGallery?></div>

                <h3>Gallery Entries</h3>
                <p>Total number of Gallery Entries</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-flag-o" aria-hidden="true"></i>
                </div>
                <div class="count"><?=$allMissions?></div>

                <h3>Total Missions</h3>
                <p>Total number of Missions</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-smile-o" aria-hidden="true"></i>
                </div>
                <div class="count"><?=$allStories?></div>

                <h3>Total Stories</h3>
                <p>Total number of Stories</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Gallery Pictures<small>Top 5</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <?php
                  if($galleryData) {
                    foreach($galleryData as $row) { ?>
                    <article class="media event">
                      <a class="pull-left" style="text-align:center;">
                        <img src="<?=$row['image']?>" style="max-width: 42px; max-height: 42px;"/>
                      </a>
                      <div class="media-body">
                        <p><?=$row['title']?></p>
                      </div>
                    </article>
                  <?php
                    }
                  } else { ?>
                    <article class="media event" style="text-align: center;">
                      <div class="media-body">
                        <p>No entries were Found.</p>
                      </div>
                    </article>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Missions <small>Top 5</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <?php
                  if($allMissions) {
                    foreach($missionsData as $row) { ?>
                    <article class="media event">
                      <a class="pull-left">
                        <img src="assets/images/user.png" style="max-width: 42px; max-height: 42px;" />
                      </a>
                      <div class="media-body">
                        <a class="title" href="#"><?=$row['title']?></a>
                        <p><?=truncate($row['text'], 30)?></p>
                      </div>
                    </article>
                  <?php
                    }
                  } else { ?>
                    <article class="media event" style="text-align: center;">
                      <div class="media-body">
                        <p>No entries were Found.</p>
                      </div>
                    </article>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Stories <small>Top 5</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <?php
                  if($storiesData) {
                    foreach($storiesData as $row) { ?>
                    <article class="media event">
                      <a class="pull-left">
                        <img src="assets/images/user.png" />
                      </a>
                      <div class="media-body">
                        <a class="title" href="#"><?=$row['title']?></a>
                        <p><?=truncate($row['text'], 30)?></p>
                      </div>
                    </article>
                  <?php
                    }
                  } else { ?>
                    <article class="media event" style="text-align: center;">
                      <div class="media-body">
                        <p>No entries were Found.</p>
                      </div>
                    </article>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->