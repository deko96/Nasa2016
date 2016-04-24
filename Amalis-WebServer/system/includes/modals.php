<?php
if(!defined("BASEPATH")) {
	die("Direct Access is not allowed.");
}
?>
<!-- PictureView Modal -->
<div id="pictureView" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="gallery_title">Title</h4>
      </div>
      <div class="modal-body">
        <p style="text-align:center;"><img id="gallery_Image" src="" width="100%" height="100%" /></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>