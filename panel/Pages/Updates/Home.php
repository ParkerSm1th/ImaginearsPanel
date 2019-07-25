<?php
include("../../scripts/config.php");
?>
<div class="page-title">
    <h3 class="breadcrumb-header">Hub Updates</h3>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">All Updates</h4>
            </div>
            <div class="panel-body">
              <?php
                $results = mysqli_query($conn, "SELECT * FROM `panel`.`panel_updates` WHERE published = '1' ORDER BY id DESC");
                while($row = mysqli_fetch_array($results)) {
                    ?>
                      <div class="updateArticle">
                        <div class="row">
                          <div class="col-md-9">
                            <a class="web-page" href="Updates.View?id=<?php echo $row['id'] ?>"><h1 style="margin-top: 0px;"><?php echo $row['title'] ?></h1></a>
                            <p class="author">by <span tyle="cursor: pointer;" class="profileLink" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $row['author_name'];?>')"><?php echo $row['author_name'] ?></span></p></span>
                            <p><?php echo $row['description'] ?></p>
                          </div>
                          <div class="col-md-3">
                              <p class="date"><?php echo $row['date'] ?></p>
                          </div>
                        </div>

                      </div>
                    <?php
                  }

                  ?>
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
function viewApplication(id) {
  urlRoute.loadPage("Mgmt.ViewApp?id=" + id);
}


</script>
