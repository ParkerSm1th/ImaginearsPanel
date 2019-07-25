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


$token = $_POST['token'];

$sql = mysqli_query($conn, "SELECT * FROM `panel`.`application_tokens` WHERE token = '$token' ORDER BY id");

$array = array();

while($row = mysqli_fetch_assoc($sql)){

    $array[] = $row;



    if ($row['uuid'] != null) {
        $ign = $row['username'];
        $uuid = $row['uuid'];
        $token = $row['token'];
        $_SESSION['apply']['ign'] = $ign;
        $_SESSION['apply']['uuid'] = $uuid;
        $_SESSION['apply']['token'] = $token;

        echo 1;
    } else {
        echo 0;
    }

}

?>
