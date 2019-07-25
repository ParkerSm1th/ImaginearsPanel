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

$setting = $_POST['setting'];
$value = $_POST['value'];

$query = "UPDATE `panel`.`global_settings` SET value = '$value' WHERE name = '$setting'";
mysqli_query($conn, $query);
echo 1;
