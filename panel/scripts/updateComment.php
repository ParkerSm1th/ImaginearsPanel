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
$comment = $_POST['comment'];
$type = $_POST['type'];

if ($type == 1) {
  $query = "UPDATE `panel`.`applications` SET comments = '$comment' WHERE id = '$id'";
  mysqli_query($conn, $query);
  echo 1;
} else if ($type == 2) {
  $query = "UPDATE `panel`.`applications` SET staff_comments = '$comment' WHERE id = '$id'";
  mysqli_query($conn, $query);
  echo 1;
}

?>
