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


$username = $_POST['username'];
$pin = $_POST['pin'];

$sql = mysqli_query($conn, "SELECT * FROM `server`.`panelpins` WHERE pin = '$pin' AND username = '$username' ORDER BY id");

$array = array();

while($row = mysqli_fetch_assoc($sql)){

    $array[] = $row;

    if ($row['username'] != null) {
        $ign = $row['username'];
        $uuid = $row['uuid'];
        $rank = $row['role'];
        $_SESSION['ign'] = $ign;
        $_SESSION['uuid'] = $uuid;
        $_SESSION['rank'] = $rank;
        $sessionid = session_id();
        echo 1;
        $id = $row['id'];
        $query = "DELETE FROM `server`.`panelpins` WHERE id='$id'";
        mysqli_query($conn, $query);
        $query = "DELETE FROM `panel`.`sessions` WHERE uuid='$uuid'";
        mysqli_query($conn, $query);
        $query = "INSERT INTO `panel`.`sessions` (session_id, ign, uuid, role) VALUES ('$sessionid', '$ign', '$uuid', '$rank')";
        mysqli_query($conn, $query);

    } else {
        echo 0;
    }

}

?>
