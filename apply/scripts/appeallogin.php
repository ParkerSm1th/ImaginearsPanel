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


$pin = $_POST['pin'];

$sql = mysqli_query($conn, "SELECT * FROM `server`.`bans` WHERE punishid = '$pin' AND active = '1' ORDER BY id");

$array = array();

while($row = mysqli_fetch_assoc($sql)){

    $array[] = $row;



    if ($row['uuid'] != null) {
        if ($row['appealed'] == '1') {
          echo 0.5;
          exit();
        }
        $ign = $row['username'];
        $uuid = $row['uuid'];
        $rank = $row['role'];
        $reason = $row['reason'];
        $date = $row['time'];
        $length = $row['length'];
        $_SESSION['appeal']['ign'] = $ign;
        $_SESSION['appeal']['uuid'] = $uuid;
        $_SESSION['appeal']['rank'] = $rank;
        $_SESSION['appeal']['reason'] = $reason;
        $_SESSION['appeal']['date'] = $date;
        $_SESSION['appeal']['length'] = $length;
        echo 1;
    } else {
        echo 0;
    }

}

?>
