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

if ($status == "deny") {
  $query = "UPDATE `panel`.`applications` SET status = '2' WHERE id = '$id'";
  mysqli_query($conn, $query);
  echo 1;
}

if ($status == "pending") {
  $query = "UPDATE `panel`.`applications` SET status = '0' WHERE id = '$id'";
  mysqli_query($conn, $query);
  echo 1;
}

if ($status == "accept") {
  $query = "UPDATE `panel`.`applications` SET status = '1' WHERE id = '$id'";
  mysqli_query($conn, $query);
  echo 1;
}

if ($status == "delete") {
  $query1 = "INSERT INTO `panel`.`deleted_applications` SELECT * FROM `panel`.`applications` WHERE id = '$id'";
  mysqli_query($conn, $query1);
  $query = "DELETE FROM `panel`.`applications` WHERE id = '$id'";
  mysqli_query($conn, $query);
  echo 1;
}

?>
