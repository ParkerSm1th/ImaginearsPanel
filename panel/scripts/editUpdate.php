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
$title = mysqli_real_escape_string($conn, $_POST['title']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$body = mysqli_real_escape_string($conn, $_POST['body']);

$query = "UPDATE `panel`.`panel_updates` SET `title` = '$title', `description` = '$desc', `body` = '$body' WHERE id = '$id'";
mysqli_query($conn, $query);
echo "1";



?>
