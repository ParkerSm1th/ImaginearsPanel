<?php
include("config.php");
$userData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`economy` WHERE uuid = '$uuid'"));
$balance = $userData['balance'];
echo $balance;
