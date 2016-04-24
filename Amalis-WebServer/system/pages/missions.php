<?php
if(!defined("BASEPATH")) {
  die("Direct Access is not allowed.");
}
if(!$logged_in) {
	$_SESSION['error'] = "You must be logged in to view this page.";
  	header("Location: index.php");
  	die();
}
if(isset($_GET['delete'])) {
  $id = $mysql->EscapeString($_GET['delete']);
  if(empty($id)) {
    $_SESSION['error'] = 'Content no longer exists.';
    header("Location: ../index.php?page=gallery");
    die();
  }
  if(!is_numeric($id)) {
    $_SESSION['error'] = 'Please provide a valid ID Number!';
    header("Location: ../index.php?page=gallery");
    die();
  }
  $check = $mysql->QueryGetNumRows("SELECT `id` FROM `missions` WHERE `id` = '{$id}'");
  if($check) {
    $query = $mysql->Query("DELETE FROM `missions` WHERE `id` = '{$id}'");
    if($query) {
      $_SESSION['success'] = 'Content successfully deleted!';
    } else {
      $_SESSION['error'] = 'Failed to delete selected content. Please try again!';
    }
    header("Location: ../index.php?page=missions");
    die();
  } else {
    $_SESSION['error'] = 'Content no longer exists.';
    header("Location: ../index.php?page=missions");
    die();
  }
} else if(isset($_GET['add'])) {
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Add new Mission</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <form class="form-horizontal form-label-left" action="system/process.php" method="POST">
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="title" placeholder="Picture title/description" required="required" type="text">
                </div>
              </div>
             	<div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Mission Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<textarea class="form-control col-md-7 col-xs-12" name="description" id="description" placeholder="Insert your text here in this big textarea!" rows="10"></textarea>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <input type="reset" class="btn btn-primary">
                  <input id="send" type="submit" class="btn btn-success" name="add_mission" value="Submit" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php
} else {
	$data = $mysql->QueryFetchArrayAll("SELECT * FROM `missions` ORDER BY id DESC");
?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Missions</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
		        <div class="x_panel">
		          <div class="x_content">
		            <ul class="list-unstyled timeline">
		            <?php
		            if(!$data) {
		            	echo '<li style="text-align:center;"><h1>No entries found!</h1></li>';
		            } else {
		            	foreach($data as $mission) {
		            ?>
	              	<li>
		                <div class="block">
		                  <div class="tags">
		                    <a href="#" class="tag" style="text-decoration: none; cursor: default;">
		                      <span>#<?=$mission['id']?></span>
		                    </a>
		                  	</div>
		                  	<div class="block_content">
		                    <h2 class="title">
                            	<?=$mission['title']?>
                            </h2>
		                    <p class="excerpt"><?=$mission['text']?></a></p>
		                  </div>
		                </div>
	              	</li>
		             <?php
		         		}
		         	}
		         	?>
		            </ul>

		          </div>
		        </div>
		      </div>
		</div>
  </div>
</div>
<?php
}
?>