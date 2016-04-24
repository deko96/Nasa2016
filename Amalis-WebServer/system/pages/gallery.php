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
  $check = $mysql->QueryGetNumRows("SELECT `id` FROM `gallery` WHERE `id` = '{$id}'");
  if($check) {
    $query = $mysql->Query("DELETE FROM `gallery` WHERE `id` = '{$id}'");
    if($query) {
      $_SESSION['success'] = 'Image successfully deleted!';
    } else {
      $_SESSION['error'] = 'Failed to delete selected image. Please try again!';
    }
    header("Location: ../index.php?page=gallery");
    die();
  } else {
    $_SESSION['error'] = 'Content no longer exists.';
    header("Location: ../index.php?page=gallery");
    die();
  }
} else if(isset($_GET['add'])) { ?>
<!-- page content -->
<div class="right_col" role="main">

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Add new Picture</h3>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">URL <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="url" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="url" placeholder="Picture URL" required="required" type="text">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <input type="reset" class="btn btn-primary">
                  <input id="send" type="submit" class="btn btn-success" name="add_gallery" value="Submit" />
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
} else if(isset($_GET['edit'])) {
  $id = $mysql->EscapeString($_GET['edit']);
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
  $check = $mysql->QueryGetNumRows("SELECT `id` FROM `gallery` WHERE `id` = '{$id}'");
  if($check <= 0) {
    $_SESSION['error'] = 'Content no longer exists.';
    header("Location: ../index.php?page=gallery");
    die();
  }
  $data = $mysql->QueryFetchArray("SELECT * FROM `gallery` WHERE `id` = '{$id}'");
?>
<!-- page content -->
<div class="right_col" role="main">

  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Editing Picture #<?=$data['id']?></h3>
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
                  <input id="title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="title" placeholder="Picture title/description" required="required" type="text" value="<?=$data['title']?>">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">URL <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="url" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="url" placeholder="Picture URL" required="required" type="text" value="<?=$data['image']?>" />
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <input type="hidden" name="imageID" value="<?=$data['id']?>" />
                  <input type="reset" class="btn btn-primary">
                  <input id="send" type="submit" class="btn btn-success" name="edit_gallery" value="Submit" />
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
	$gallery = $mysql->QueryFetchArrayAll("SELECT * FROM `gallery` ORDER BY id DESC");
?>
<!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Gallery <small> All Entries</small> </h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_content">
                  <div class="row">
                 		<?php
                 		if($gallery) {
                   		foreach($gallery as $image) {
                   		?>
                    	<!-- Start Box -->
                        <div class="col-md-55">
                          <div class="thumbnail">
                            <div class="image view view-first">
                              <img style="width: 100%; display: block;" src="<?=$image['image']?>" alt="image" />
                              <div class="mask">
                                <div class="tools tools-bottom">
                                  <a href="#" data-toggle="modal" data-target="#pictureView"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                  <a href="index.php?page=gallery&edit=<?=$image['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                  <a href="index.php?page=gallery&delete=<?=$image['id']?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </div>
                              </div>
                            </div>
                            <div class="caption">
                              <p otitle="<?=$image['title']?>"><?=truncate($image['title'], 20) . ".."?></p>
                            </div>
                          </div>
                        </div>
                     	<!-- End Box -->
                     	<?php } 
                      ?>
                      <script type="text/javascript">
                        $("a[data-toggle=modal]").click(function(e) {
                          e.preventDefault();
                          var el = $(this).parent().parent().parent();
                          var title = $(el).next().find('p').attr('otitle');
                          var src = $(el).find('img').attr('src');
                          $("#gallery_title").text(title);
                          $("#gallery_Image").attr('src', src);

                        });
                      </script>
                      <?php
                     } else { ?>
                     <h1 style="text-align:center">No entries were found!</h1>
                     <?php
                 	}
                   	?>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->
<?php
}
?>
