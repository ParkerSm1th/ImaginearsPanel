<?php
include("../../scripts/config.php");
$applicationStatus = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `panel`.`global_settings` WHERE name = 'applications'"));
$open = '';
$closed = '';
if ($applicationStatus['value'] == 1) {
  $open = 'active';
} else {
  $closed = 'active';
}
?>
<style>
  .btn-default:active {
    background: #1b2844 !important;
  }
</style>
<div class="page-title">
    <h3 class="breadcrumb-header">Application Hub</h3>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-darkblue">
        <div class="panel-body">
          <div class="btn-group">
              <button type="button" id="openApp" class="btn btn-default <?php echo $open ?>">Open</button>
              <button type="button" id="closedApp" class="btn btn-default <?php echo $closed ?>">Closed</button>
          </div>
        </div>
      </div>
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Pending Applications</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Role Applying For</th>
                                <th>Date</th>
                                <th>Username</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $results = mysqli_query($conn, "SELECT * FROM `panel`.`applications` WHERE status = '0' ORDER BY `a_role` DESC");
                              while($row = mysqli_fetch_array($results)) {
                                ?>
                                    <tr id="<?php echo $row['id']; ?>">
                                        <th scope="row"><?php echo $row['a_role']?></th>
                                        <td><?php echo $row['date']?></td>
                                        <td><span style="cursor: pointer;" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $row['username'];?>')"><?php echo $row['username'];?></span></td>
                                        <td><button onclick="viewApplication(<?php echo $row['id'] ?>)" type="button" class="btn btn-info btn-xs btn-xxs m-b-xxs">View</button></td>
                                    </tr>

                                <?php
                                }

                                ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Accepted Applications</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Role Applying For</th>
                                <th>Date</th>
                                <th>Username</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $results = mysqli_query($conn, "SELECT * FROM `panel`.`applications` WHERE status = '1'");
                              while($row = mysqli_fetch_array($results)) {
                                ?>
                                    <tr id="<?php echo $row['id']; ?>">
                                        <th scope="row"><?php echo $row['a_role']?></th>
                                        <td><?php echo $row['date']?></td>
                                        <td><span style="cursor: pointer;" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $row['username'];?>')"><?php echo $row['username'];?></span></td>
                                        <td><button onclick="viewApplication(<?php echo $row['id'] ?>)" type="button" class="btn btn-info btn-xs btn-xxs m-b-xxs">View</button></td>
                                    </tr>

                                <?php
                                }

                                ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Denied Applications</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Role Applying For</th>
                                <th>Date</th>
                                <th>Username</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $results = mysqli_query($conn, "SELECT * FROM `panel`.`applications` WHERE status = '2'");
                              while($row = mysqli_fetch_array($results)) {
                                ?>
                                    <tr id="<?php echo $row['id']; ?>">
                                        <th scope="row"><?php echo $row['a_role']?></th>
                                        <td><?php echo $row['date']?></td>
                                        <td><span style="cursor: pointer;" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $row['username'];?>')"><?php echo $row['username'];?></span></td>
                                        <td><button onclick="viewApplication(<?php echo $row['id'] ?>)" type="button" class="btn btn-info btn-xs btn-xxs m-b-xxs">View</button></td>
                                    </tr>

                                <?php
                                }

                                ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
function viewApplication(id) {
  urlRoute.loadPage("Mgmt.ViewApp?id=" + id);
}

$("#closedApp").click(function() {
  $.ajax({
      url: 'scripts/updateSetting.php',
      type:'POST',
      data:"setting=applications&value=0",
      success: function(msg)
      {
          console.log("Done");
          console.log(msg);
          if (msg == 0) {
            console.log("Error");
          } else if (msg == 1) {
            $("#openApp").removeClass('active');
            $("#closedApp").addClass('active');
          }
      }
  });
});

$("#openApp").click(function() {
  $.ajax({
      url: 'scripts/updateSetting.php',
      type:'POST',
      data:"setting=applications&value=1",
      success: function(msg)
      {
          console.log("Done");
          console.log(msg);
          if (msg == 0) {
            console.log("Error");
          } else if (msg == 1) {
            $("#openApp").addClass('active');
            $("#closedApp").removeClass('active');
          }
      }
  });
});


</script>
