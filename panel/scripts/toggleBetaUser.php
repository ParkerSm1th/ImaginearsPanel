<?php
@ob_start();
session_start();
?>
<?php
define('DB_NAME', 'server');
define('DB_USER', 'root');
define('DB_PASSWORD', 'A9l0objZudcmslq9!');
define('DB_HOST', 'localhost');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$conn) {
    die('Could not connect: ' .mysqli_error($conn));
}

$id = $_POST['id'];
$status = $_POST['status'];

if ($status == "1") {
  $query = "UPDATE `server`.`player_data` SET panel_beta_access = '1' WHERE uuid = '$id'";
  mysqli_query($conn, $query);
  echo 1;
}

if ($status == "0") {
  $query = "UPDATE `server`.`player_data` SET panel_beta_access = '0' WHERE uuid = '$id'";
  mysqli_query($conn, $query);
  echo 1;
}


?>
