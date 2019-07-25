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


$applyingrole = mysqli_real_escape_string($conn, $_POST['applyingrole']);
$ign = mysqli_real_escape_string($conn, $_POST['ign']);
$uuid = mysqli_real_escape_string($conn, $_POST['uuid']);
$discord = mysqli_real_escape_string($conn, $_POST['discord']);
$discordID = mysqli_real_escape_string($conn, $_POST['discordID']);
$timezone = mysqli_real_escape_string($conn, $_POST['timezone']);
$workFor = mysqli_real_escape_string($conn, $_POST['workFor']);
$over16 = mysqli_real_escape_string($conn, $_POST['over16']);
$hours = mysqli_real_escape_string($conn, $_POST['hours']);
$pastServers = mysqli_real_escape_string($conn, $_POST['pastServers']);
$egs = mysqli_real_escape_string($conn, $_POST['egs']);
$teams = mysqli_real_escape_string($conn, $_POST['teams']);
$parks = mysqli_real_escape_string($conn, $_POST['parks']);
$uuid = mysqli_real_escape_string($conn, $_POST['uuid']);
$gr1 = mysqli_real_escape_string($conn, $_POST['gr1']);
$gr2 = mysqli_real_escape_string($conn, $_POST['gr2']);
$gr3 = mysqli_real_escape_string($conn, $_POST['gr3']);
$gr4 = mysqli_real_escape_string($conn, $_POST['gr4']);
$dt = date('l jS \of F Y h:i:s A');

if ($applyingrole == 0) {
  $query = "INSERT INTO `panel`.`applications` (uuid, username, discord, discord_id, timezone, workFor, over16, hours, pastServers, parksVisited, egs, teams, gr1, gr2, gr3, gr4, a_role, status, date) VALUES ('$uuid', '$ign', '$discord', '$discordID', '$timezone', '$workFor', '$over16', '$hours', '$pastServers', '$parks', '$egs', '$teams', '$gr1', '$gr2', '$gr3', '$gr4', 'Guest Relations', '0', '$dt')";
  mysqli_query($conn, $query);
  echo 1;
} else if ($applyingrole == 1) {
  $we = mysqli_real_escape_string($conn, $_POST['i_we']);
  $tc = mysqli_real_escape_string($conn, $_POST['i_tc']);
  $showcase = mysqli_real_escape_string($conn, $_POST['i_showcase']);
  $lpst = mysqli_real_escape_string($conn, $_POST['i_lpst']);
  $deadlines = mysqli_real_escape_string($conn, $_POST['i_deadlines']);
  $i1to1 = mysqli_real_escape_string($conn, $_POST['i_1to1']);
  $query = "INSERT INTO `panel`.`applications` (uuid, username, discord, discord_id, timezone, workFor, over16, hours, pastServers, parksVisited, egs, teams, gr1, gr2, gr3, gr4, i_we, i_tc, i_showcase, i_lpst, i_deadlines, i_1to1, a_role, status, date) VALUES ('$uuid', '$ign', '$discord', '$discordID', '$timezone', '$workFor', '$over16', '$hours', '$pastServers', '$parks', '$egs', '$teams', '$gr1', '$gr2', '$gr3', '$gr4', '$we', '$tc', '$showcase', '$lpst', '$deadlines', '$i1to1', 'Imagineer', '0', '$dt')";
  mysqli_query($conn, $query);
  echo 1;
} else if ($applyingrole == 2) {
  $desc = mysqli_real_escape_string($conn, $_POST['d_desc']);
  $port = mysqli_real_escape_string($conn, $_POST['d_port']);
  $query = "INSERT INTO `panel`.`applications` (uuid, username, discord, discord_id, timezone, workFor, over16, hours, pastServers, parksVisited, egs, teams, gr1, gr2, gr3, gr4, d_desc, d_port, a_role, status, date) VALUES ('$uuid', '$ign', '$discord', '$discordID', '$timezone', '$workFor', '$over16', '$hours', '$pastServers', '$parks', '$egs', '$teams', '$gr1', '$gr2', '$gr3', '$gr4', '$desc', '$port', 'Developer', '0', '$dt')";
  mysqli_query($conn, $query);
  echo 1;
} else {
  echo 0;
}



?>
