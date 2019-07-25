<?php
include("config.php");
$punishments = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`punishment_log` WHERE active = 1 ORDER BY ID DESC LIMIT 1"));
$username = $punishments['username'];
$type = $punishments['type'];
$typeSpan = "";
switch($type) {
  case "BAN":
    $typeSpan = '<span class="btn btn-danger btn-xs m-b-xxs">Ban</span>';
    break;
  case "KICK":
    $typeSpan = '<span class="btn btn-primary btn-xs m-b-xxs">Kick</span>';
    break;
  case "MUTE":
    $typeSpan = '<span class="btn btn-warning btn-xs m-b-xxs">Mute</span>';
    break;
  case "WARN":
    $typeSpan = '<span class="btn btn-success btn-xs m-b-xxs">Warn</span>';
    break;
  default:
}
echo '<h1>' . $typeSpan . ' ' . $username . '</h1>';
