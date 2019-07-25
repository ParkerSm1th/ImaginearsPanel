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
$username = $_POST['username'];
$disc = $_POST['disc'];

$sql = mysqli_query($conn, "SELECT * FROM `panel`.`discord_links` WHERE discord_id = '$id' AND discord_identifier = '$disc' ORDER BY id");

$array = array();
$array2 = array();

while($row = mysqli_fetch_assoc($sql)){

    $array[] = $row;

    if ($row['minecraft_uuid'] != null) {
      $minecraftUUID = $row['minecraft_uuid'];
      $sql2 = mysqli_query($conn, "SELECT * FROM `server`.`player_data` WHERE uuid = '$minecraftUUID' ORDER BY id");
      while($row2 = mysqli_fetch_assoc($sql2)) {
        if ($row2 == null) {
          echo 0;
          exit();
        }
        if ($row2['panel_beta_access'] == '0') {
          if ($row2['rank'] < 9) {
            echo 0;
            exit();
          }
        }
        $array2[] = $row2;
        $ign = $row2['username'];
        $uuid = $row2['uuid'];
        $rank = $row2['rank'];
        $_SESSION['ign'] = $ign;
        $_SESSION['uuid'] = $uuid;
        $_SESSION['rank'] = $rank;
        $sessionid = session_id();
        echo 1;
        $id = $row2['id'];
        $query = "DELETE FROM `server`.`panelpins` WHERE id='$id'";
        mysqli_query($conn, $query);
        $query = "DELETE FROM `panel`.`sessions` WHERE uuid='$uuid'";
        mysqli_query($conn, $query);
        $query = "INSERT INTO `panel`.`sessions` (session_id, ign, uuid, role) VALUES ('$sessionid', '$ign', '$uuid', '$rank')";
        mysqli_query($conn, $query);
      }

    } else {
        echo 0;
    }

}

?>
