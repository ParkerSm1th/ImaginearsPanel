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
    <h3 class="breadcrumb-header">Welcome to The Hub!</h3>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">All about you</h4>
            </div>
            <div class="panel-body user-profile-panel">
                <img src="https://crafatar.com/avatars/<?php echo $uuid?>" class="user-profile-image img-circle" alt="">
                <h4 class="text-center m-t-lg"><?php echo $ign ?></h4>
                <p class="text-center"><?php echo $prettyrank ?></p>
                <hr>
                <ul class="list-unstyled text-center">
                    <li><p><i class="fa fa-dollar m-r-xs"></i><span id="balance"><i class="fas fa-circle-notch fa-spin"></i></span></p></li>
                    <span id="online"><li><p><i class="fa fa-circle text-warning m-r-xs"></i><i class="fas fa-circle-notch fa-spin"></i></p></li></span>

                    <li><p>First Join: <?php echo $firstJoin ?></a></p></li>
                </ul>
                <hr>
                <a href="User.LogOut" class="web-page"><button class="btn btn-danger btn-block">Log Out</button></a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-darkblue">
          <div class="panel-heading clearfix">
              <h4 class="panel-title">Quick Links</h4>
          </div>
          <div class="panel-body">
            <a href="User.Friends" class="web-page"><button class="btn btn-info btn-block">Friends</button></a>
            <br>
            <a href="Hub.Events" class="web-page"><button class="btn btn-info btn-block">Upcoming Events</button></a>
            <br>
            <a href="User.RideCounts" class="web-page"><button class="btn btn-info btn-block">Ride Counts</button></a>
            <br>
            <a href="User.Reservations" class="web-page"><button class="btn btn-info btn-block">Hotels & Resorts</button></a>
            <br>
            <a href="User.FastPass" class="web-page"><button class="btn btn-warning btn-block">Fastpass+</button></a>
            <br>
            <a href="Applications.Home" class="web-page"><button class="btn btn-primary btn-block">Applications</button></a>
            <br>
            <a href="http://imaginears.club/bugs"><button class="btn btn-danger btn-block">Report Bug/Request Feature</button></a>
          </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="panel panel-darkblue">
          <div class="panel-heading clearfix">
              <h4 class="panel-title">Recent Transactions</h4>
          </div>
          <div class="panel-body"style="margin-top: -20px;">
            <div id="recentTransactions">
              <h1><i class="fas fa-circle-notch fa-spin"></i></h1>
            </div>
            <a href="Me.Transactions" class="web-page"><button class="btn btn-info btn-block">View All Transactions</button></a>
          </div>
      </div>
    </div>

</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-darkblue">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Recent Hub Updates</h4>
        </div>
        <div class="panel-body" style="margin-top: -20px;">
          <?php
            $results = mysqli_query($conn, "SELECT * FROM `panel`.`panel_updates` WHERE published = '1' ORDER BY id DESC LIMIT 2");
            while($row = mysqli_fetch_array($results)) {
                ?>
                  <div class="updateArticle">
                    <a class="web-page" href="Updates.View?id=<?php echo $row['id'] ?>"><h1><?php echo $row['title'] ?></h1></a>
                    <p class="author">by <span tyle="cursor: pointer;" class="profileLink" data-toggle="modal" data-target=".profileModal" onclick="viewProfile('<?php echo $row['author_name'];?>')"><?php echo $row['author_name'] ?></span> on <?php echo $row['date'] ?></p>
                    <p><?php echo $row['description'] ?></p>

                  </div>
                <?php
              }

              ?>
              <a href="Updates.Home" class="web-page"><button class="btn btn-info btn-block">View All Updates</button></a>
        </div>
    </div>
  </div>
</div>
<script>
$('#online').load('scripts/getOnline.php');
$('#balance').load('scripts/getBalance.php');
$('#players').load('scripts/getOnlinePlayerCount.php');
$('#staff').load('scripts/getOnlineStaffCount.php');
$('#recentTransactions').load('scripts/getRecentTransactions.php');
$('#mostRecent').load('scripts/getMostRecentPunishment.php');
$('#warnings').load('scripts/getWarningPoints.php');
setInterval(function(){
   $('#online').load('scripts/getOnline.php');
   $('#balance').load('scripts/getBalance.php');
   $('#players').load('scripts/getOnlinePlayerCount.php');
   $('#staff').load('scripts/getOnlineStaffCount.php');
   $('#recentTransactions').load('scripts/getRecentTransactions.php');
   $('#mostRecent').load('scripts/getMostRecentPunishment.php');
   $('#warnings').load('scripts/getWarningPoints.php');
}, 5000)
</script>
<script>
</script>
