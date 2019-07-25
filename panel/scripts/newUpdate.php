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


$title = mysqli_real_escape_string($conn, $_POST['title']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$body = mysqli_real_escape_string($conn, $_POST['body']);
$date = date('l jS \of F Y');
$author = mysqli_real_escape_string($conn, $_POST['author']);
$authorID = mysqli_real_escape_string($conn, $_POST['author_id']);

$query = "INSERT INTO `panel`.`panel_updates` (title, description, body, date, author, author_name, published) VALUES ('$title', '$desc', '$body', '$date', '$authorID', '$author', '1')";
if (mysqli_query($conn, $query)) {
  $last_id = mysqli_insert_id($conn);
  echo $last_id;
} else {
  echo 0;
}


?>
