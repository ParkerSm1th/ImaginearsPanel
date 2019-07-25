<?php
include("../../scripts/config.php");
$id = $_GET['id'];
$postDetails = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `panel`.`panel_updates` WHERE id = '$id'"));
if ($postDetails == null) {
  ?>
    <script>
      urlRoute.loadPage("Mgmt.Updates");
    </script>
  <?php
  exit();
}
if (!isset($_GET['reloaded'])) {
  ?>
  <script>
    urlRoute.loadPage("Mgmt.EditUpdate?id=<?php echo $id ?>&reloaded=1");
    location.reload(true);
  </script>
  <?php

}
 ?>

<div class="page-title">
    <h3 class="breadcrumb-header">Edit Update</h3>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="panel panel-darkblue">
          <div class="panel-body">
            <div class="viewUpdate">
              <div class="header">
                <br>
                <input type="text" class="form-control titleEditor" name="title" placeholder="Title" id="title" value="<?php echo $postDetails['title']; ?>">
                <h2>by <span tyle="cursor: pointer;" class="profileLink" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $postDetails['author_name'];?>')"><?php echo $postDetails['author_name'] ?></span> on <?php echo $postDetails['date'] ?></h2>
              </div>
              <br>
              <div id="summernote"><?php echo $postDetails['body'] ?></div>
              <br>
              <p>Short description:</p>
              <input type="text" class="form-control descEditor" name="desc" id="desc" placeholder="Short Description" value="<?php echo $postDetails['description']; ?>">
            </div>
            <button onclick="update()" type="button" class="btn btn-info">Update</button>
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
        url: 'scripts/editUpdate.php',
        type:'POST',
        data: {
          id: <?php echo $id ?>,
          title: $("#title").val(),
          desc: $("#desc").val(),
          body: $('#summernote').summernote('code')
        },

        success: function(msg)
        {
            console.log("Done");
            console.log(msg);
            if (msg == 0) {
              console.log("Error");
            } else if (msg == 1) {
              toastr["success"]("The Update post has been edited", "Update Edited")
            }
        }
    });
  }
}
</script>
