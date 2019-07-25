<?php
include("../../scripts/config.php");
$id = $_GET['id'];
$postDetails = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `panel`.`panel_updates` WHERE id = '$id'"));
if ($postDetails == null) {
  ?>
    <script>
      urlRoute.loadPage("Updates.Home");
    </script>
  <?php
  exit();
}
 ?>

<div class="page-title">
    <h3 class="breadcrumb-header">View Update</h3>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="panel panel-darkblue">
          <div class="panel-body">
            <div class="viewUpdate">
              <div class="header">
                <h1 style="margin-top: 0px;"><?php echo $postDetails['title']?></h1>
                <h2>by <span tyle="cursor: pointer;" class="profileLink" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $postDetails['author_name'];?>')"><?php echo $postDetails['author_name'] ?></span> on <?php echo $postDetails['date'] ?></h2>
              </div>
              <div><?php echo $postDetails['body'] ?></div>
            </div>
          </div>
      </div>
  </div>
</div>
