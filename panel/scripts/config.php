<?php
session_start();
if (!isset($_SESSION['ign'])) {
  header("https://imaginears.club/hub");
  exit();
}
define('DB_USER', 'root');
define('DB_PASSWORD', 'A9l0objZudcmslq9!');
define('DB_HOST', 'localhost');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$conn) {
    die('Could not connect: ' .mysqli_error($conn));
}

include("ranks.php");

$ign = $_SESSION['ign'];
$rank = $_SESSION['rank'];
$uuid = $_SESSION['uuid'];
$prettyrank = prettyRank($rank);
 ?>
