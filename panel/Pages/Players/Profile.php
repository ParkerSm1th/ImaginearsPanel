<?php
include("../../scripts/config.php");
$searchID = $_GET['id'];
$userData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`player_data` WHERE uuid = '$searchID'"));
$mil = $userData['first_join'];
$online = $userData['online'];
$seconds = $mil / 1000;
$firstJoin = date("m-d-Y", $seconds);
$lastServer = $userData['last_server'];

$economyData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`economy` WHERE uuid = '$searchID'"));
$balance = $economyData['balance'];
?>
<div class="page-title">
    <h3 class="breadcrumb-header"><?php echo $userData['username'] ?>'s Profile</h3>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"><?php echo $userData['username'] ?>'s Profile</h4>
            </div>
            <div class="panel-body user-profile-panel">
                <img src="https://crafatar.com/avatars/<?php echo $searchID?>" class="user-profile-image img-circle" alt="">
                <h4 class="text-center m-t-lg"><?php echo $userData['username'] ?></h4>
                <p class="text-center"><?php echo prettyRank($userData['rank']) ?></p>
                <hr>
                <ul class="list-unstyled text-center">
                    <li><p><i class="fa fa-dollar m-r-xs"></i><span id="balance"><?php echo $balance ?></span></p></li>
                    <span id="online"><li><p><i class="fa fa-circle text-warning m-r-xs"></i>Loading</p></li></span>

                    <li><p>First Join: <?php echo $firstJoin ?></a></p></li>
                </ul>
                <hr>
            </div>
        </div>
    </div>
</div>
