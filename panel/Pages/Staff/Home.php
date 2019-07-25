<?php
include("../../scripts/config.php");
$userData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`player_data` WHERE uuid = '$uuid'"));
$mil = $userData['first_join'];
$online = $userData['online'];
$seconds = $mil / 1000;
$firstJoin = date("m-d-Y", $seconds);
$lastServer = $userData['last_server'];

$economyData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`economy` WHERE uuid = '$uuid'"));
$balance = $economyData['balance'];

 ?>
<div class="page-title">
    <h3 class="breadcrumb-header">Staff Dashboard</h3>
</div>
<div class="row">
  <div class="col-md-4">
      <div class="panel panel-darkblue">
          <div class="panel-heading clearfix">
              <h4 class="panel-title dashboard-title">Online Players<span class="panel-title-small">updated every 30 seconds</span></h4>
          </div>
          <div class="panel-body">
            <h1><span id="players">Loading</span></h1>
          </div>
      </div>
  </div>
  <div class="col-md-4">
      <div class="panel panel-darkblue">
          <div class="panel-heading clearfix">
              <h4 class="panel-title dashboard-title">Online Staff<span class="panel-title-small">updated every 30 seconds</span></h4>
          </div>
          <div class="panel-body">
              <h1><span id="staff">Loading</span></h1>
          </div>
      </div>
  </div>
  <div class="col-md-4">
      <div class="panel panel-darkblue">
          <div class="panel-heading clearfix">
              <h4 class="panel-title dashboard-title">Most recent punishment</h4>
          </div>
          <div class="panel-body">
              <span id="mostRecent"><h1>Loading</h1></span>
          </div>
      </div>
  </div>
</div>
<div class="row">

    <div class="col-md-3">
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Last Server</h4>
            </div>
            <div class="panel-body">
                <button class="btn btn-warning btn-block"><?php echo $lastServer ?></button>
            </div>
        </div>
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Warning Points</h4>
            </div>
            <div class="panel-body">
                <a href="CM.Warnings" class="web-page"><button class="btn btn-success btn-block"><span id="warnings">Loading</span></button></a>
            </div>
        </div>
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Projects</h4>
            </div>
            <div class="panel-body">
                <a href="CM.Projects" class="web-page"><button class="btn btn-danger btn-block">0 complete</button></a>
            </div>
        </div>
    </div>

</div>
<script>
setInterval(function(){
   $('#online').load('scripts/getOnline.php');
   $('#balance').load('scripts/getBalance.php');
   $('#players').load('scripts/getOnlinePlayerCount.php');
   $('#staff').load('scripts/getOnlineStaffCount.php');
   $('#mostRecent').load('scripts/getMostRecentPunishment.php');
   $('#warnings').load('scripts/getWarningPoints.php');
}, 3000)
</script>
<script>

</script>
