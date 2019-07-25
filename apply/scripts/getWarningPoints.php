<?php
include("config.php");
  $results = mysqli_query($conn, "SELECT * FROM `panel`.`warnings` WHERE uuid = '$uuid' AND active = 1");
  $count = 0;
  while($row = mysqli_fetch_array($results)) {
    $count = $count + $row['points'];
  }
  echo $count;
  ?>
