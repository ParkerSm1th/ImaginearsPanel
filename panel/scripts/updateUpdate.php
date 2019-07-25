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
$type = $_POST['type'];

if ($type == 1) {
  $query = "UPDATE `panel`.`panel_updates` SET published = '0' WHERE id = '$id'";
  mysqli_query($conn, $query);
  echo 1;
} else if ($type == 2) {
  $query = "UPDATE `panel`.`panel_updates` SET published = '1' WHERE id = '$id'";
  mysqli_query($conn, $query);
  echo 1;
} else if ($type == 3) {
  $query1 = "INSERT INTO `panel`.`deleted_updates` SELECT * FROM `panel`.`panel_updates` WHERE id = '$id'";
  mysqli_query($conn, $query1);
  $query = "DELETE FROM `panel`.`panel_updates` WHERE id = '$id'";
  mysqli_query($conn, $query);
  echo 1;
}

?>
