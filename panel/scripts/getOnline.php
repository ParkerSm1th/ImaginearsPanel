<?php
include("config.php");
$userData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`player_data` WHERE uuid = '$uuid'"));
$online = $userData['online'];
if ($online == 1) {
  ?>
  <li><p><i class="fa fa-circle text-success m-r-xs"></i>Online on <?php echo $userData['last_server'] ?></p></li>
  <?php
} else {
  ?>
  <li><p><i class="fa fa-circle text-danger m-r-xs"></i>Offline last on: <?php echo $userData['last_server'] ?></p></li>
  <?php
}
?>
