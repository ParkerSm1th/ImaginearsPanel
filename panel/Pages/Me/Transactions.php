<?php
include("../../scripts/config.php");
?>
<div class="page-title">
    <h3 class="breadcrumb-header">All your transactions</h3>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Transactions</h4>
            </div>
            <div class="panel-body">
              <?php
              $results = mysqli_query($conn, "SELECT * FROM `server`.`transactions` WHERE from_uuid = '$uuid' AND amount > 0.0 OR to_uuid = '$uuid' AND amount > 0.0 ORDER BY id DESC");
              while($row = mysqli_fetch_array($results)) {
                if ($row['type'] == "PAY") {
                  if ($row['to_uuid'] == $uuid) {
                    $type = '<span class="btn btn-success btn-block btn-xs">RECEIVE</span>';
                  } else {
                    $type = '<span class="btn btn-danger btn-block btn-xs">PAY</span>';
                  }
                }
                if ($row['type'] == "CHARGE") {
                  $type = '<span class="btn btn-danger btn-block btn-xs">CHARGE</span>';
                }
                if ($row['type'] == "REWARD") {
                  $type = '<span class="btn btn-primary btn-block btn-xs">REWARD</span>';
                }
                $from_uuid = $row['from_uuid'];
                $fromChanged = false;
                $to_uuid = $row['to_uuid'];
                $toChanged = false;
                $fromURL = "http://i.yeetdev.com/up/0eb8b813bdbcebb627ddd3ccedf98d7b.jpg";
                $toURL = "http://i.yeetdev.com/up/0eb8b813bdbcebb627ddd3ccedf98d7b.jpg";
                if (strpos($from_uuid, '-') !== false) {
                  $getUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`player_data` WHERE uuid = '$from_uuid'"));
                  $from_uuid = $getUser['username'];
                  $fromChanged = true;
                  $fromURL = "https://crafatar.com/avatars/" . $row['from_uuid'];
                }
                if (strpos($to_uuid, '-') !== false) {
                  $getUser1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`player_data` WHERE uuid = '$to_uuid'"));
                  $to_uuid = $getUser1['username'];
                  $toChanged = true;
                  $toURL = "https://crafatar.com/avatars/" . $row['to_uuid'];
                }
                  ?>
                  <div class="transactionMain">
                    <div class="row">
                      <div class="col-md-4">
                        <?php echo $type ?>
                        <div class="price">$<?php echo $row['amount'] ?></div>
                      </div>
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-5 userCol">
                            <div class="user">
                              <img onerror="this.src='http://i.yeetdev.com/up/0eb8b813bdbcebb627ddd3ccedf98d7b.jpg'" src="<?php echo $fromURL ?>">
                              <?php if ($fromChanged) {
                                ?>
                                <div tyle="cursor: pointer;" class="profileLink" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $from_uuid;?>')"><?php echo $from_uuid ?></div>
                              <?php } else {
                                ?>
                                <p><?php echo $from_uuid ?></p>
                              <?php } ?>
                            </div>
                          </div>
                          <div class="col-md-2 userCol">
                            <i class="far fa-arrow-alt-circle-right arrow"></i>
                          </div>
                          <div class="col-md-5 userCol">
                            <div class="user">
                              <img onerror="this.src='http://i.yeetdev.com/up/0eb8b813bdbcebb627ddd3ccedf98d7b.jpg'" src="<?php echo $toURL ?>">
                              <?php if ($toChanged) {
                                ?>
                                <div tyle="cursor: pointer;" class="profileLink" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $to_uuid;?>')"><?php echo $to_uuid ?></div>
                              <?php } else {
                                ?>
                                <p><?php echo $to_uuid ?></p>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
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
