<?php
include("../../scripts/config.php");
if (!isset($_GET['reloaded'])) {
  ?>
  <script>
    urlRoute.loadPage("Mgmt.NewUpdate?reloaded=1");
    location.reload(true);
  </script>
  <?php

}
 ?>

<div class="page-title">
    <h3 class="breadcrumb-header">New Update</h3>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="panel panel-darkblue">
          <div class="panel-body">
            <div class="viewUpdate">
              <div class="header">
                <input type="text" class="form-control titleEditor" name="title" placeholder="Title" id="title">
                <h2>by <span tyle="cursor: pointer;" class="profileLink" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $ign;?>')"><?php echo $ign ?></span> on <?php echo date('l jS \of F Y'); ?></h2>
              </div>
              <br>
              <div id="summernote"></div>
              <br>
              <p>Short description:</p>
              <input type="text" class="form-control descEditor" name="desc" id="desc" placeholder="Short Description">
            </div>
            <button onclick="update()" type="button" class="btn btn-info">Create</button>
          </div>
      </div>
  </div>
</div>
<script>
$(document).ready(function() {
  $('#summernote').summernote();
});
function update() {
  console.log($('#summernote').summernote('code'));
  if ($("#title").val() == "" || $("#desc").val() == "") {
    toastr["error"]("You can not leave the Title or description empty!", "Whoops!");
  } else {
    $.ajax({
        url: 'scripts/newUpdate.php',
        type:'POST',
        data: {
          title: $("#title").val(),
          cover: $("#cover").val(),
          desc: $("#desc").val(),
          author: '<?php echo $ign ?>',
          author_id: '<?php echo $uuid ?>',
          body: $('#summernote').summernote('code')
        },

        success: function(msg)
        {
            console.log("Done");
            console.log(msg);
            if (msg == 0) {
              console.log("Error");
            } else {
              toastr["success"]("The Update has been posted", "Posted")
              urlRoute.loadPage("Updates.View?id=" + msg);
            }
        }
    });
  }
}
</script>
