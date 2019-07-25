<?php
include("../../scripts/config.php");
$ign = $_SESSION['apply']['ign'];
$uuid = $_SESSION['apply']['uuid'];
$token = $_SESSION['apply']['token'];
$userData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`player_data` WHERE uuid = '$uuid'"));
$rank = $userData['rank'];
$_SESSION['apply']['rank'] = $rank;
$discordData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `panel`.`discord_links` WHERE minecraft_uuid = '$uuid'"));
$discord = $discordData['discord_username'] . "#" . $discordData['discord_identifier'];
$discordID = $discordData['discord_id'];
$_SESSION['apply']['discord'] = $discord;
$_SESSION['apply']['discordID'] = $discordID;
$prettyrank = prettyRank($rank);
$applicationStatus = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `panel`.`global_settings` WHERE name = 'applications'"));
?>
<div class="page-title">
    <h3 class="breadcrumb-header">Application Hub</h3>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Your Applications</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Role Applying For</th>
                                <th>Date</th>
                                <th>Application Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $results = mysqli_query($conn, "SELECT * FROM `panel`.`applications` WHERE uuid = '$uuid'");
                              while($row = mysqli_fetch_array($results)) {
                                $status = $row['status'];
                                $prettyStatus = null;
                                if ($status == 0) {
                                  $prettyStatus = '<button type="button" class="btn btn-info btn-xs btn-xxs m-b-xxs">Pending</button>';
                                }
                                if ($status == 1) {
                                  $prettyStatus = '<button type="button" class="btn btn-success btn-xs btn-xxs m-b-xxs">Accepted</button>';
                                }
                                if ($status == 2) {
                                  $prettyStatus = '<button type="button" class="btn btn-danger btn-xs btn-xxs m-b-xxs">Not accepted at this time</button>';
                                }
                                ?>
                                    <tr id="<?php echo $row['id']; ?>">
                                        <th scope="row"><?php echo $row['a_role']?></th>
                                        <td><?php echo $row['date']?></td>
                                        <td><?php echo $prettyStatus;?></td>
                                        <td><button onclick="viewApplication(<?php echo $row['id'] ?>)" type="button" class="btn btn-info btn-xs btn-xxs m-b-xxs">View</button></td>
                                    </tr>

                                <?php
                                }

                                ?>
                        </tbody>
                    </table>

                </div>
                <?php
                $checkForActive = mysqli_query($conn, "SELECT * FROM `panel`.`applications` WHERE uuid = '$uuid' AND status = '0'");
                if ($applicationStatus['value'] == 1) {
                  if (mysqli_num_rows($checkForActive) == 0) {
                    ?>
                      <h3>You have no pending applications, therefore you can create a new application.</h3>
                      <h3><a href="Applications.New" class="web-page"><button type="button" class="btn btn-info btn-s btn-s m-b-xxs">Create New Application</button></a></h3>
                    <?php
                  }
                } else {
                  ?>
                    <h4>Applications are currently <span class="text-danger">closed</span>!</h4>
                  <?php
                }
                 ?>
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

// if user is running mozilla then use it's built-in WebSocket
window.WebSocket = window.WebSocket || window.MozWebSocket;

// open connection
var connection = new WebSocket('wss://imaginears.club:4444');

connection.onopen = function () {
  console.log("Connected");
};

connection.onerror = function() {
  console.log("Connection error..");
  toastr["error"]("You will not be able to kick players!", "Socket Error")
}

function viewApplication(id) {
  urlRoute.loadPage("Applications.View?id=" + id);
}

function kickPlayer($uuid) {
  var obj = {
      time: (new Date()).getTime(),
      type: "kick",
      reason: "",
      uuid: $uuid,
      by: '<?php echo $uuid ?>'
  };
  console.log(JSON.stringify(obj));
  connection.send(JSON.stringify(obj));
  $("#" + $uuid).fadeOut();
}
</script>
