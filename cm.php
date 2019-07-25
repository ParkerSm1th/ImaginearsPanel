<?php
function rankName($value){
switch($value){
case "12":
return "Developer";
case "11":
return "Manager";
case "10":
return "Coordinator";
case "9":
return "CM";
default:
return $value;
}
}
$link = mysqli_connect("198.24.160.26", "root", "A9l0objZudcmslq9!");
if(!$link) {
die('Failed to connect to server: ' . mysqli_error());
}
$db = mysqli_select_db($link, "server");
if(!$db) {
die("Unable to select database");
}
$ranks = array("12", "11", "10", "9");
$total = 0;
foreach ($ranks as $rank) {
$cqry = "SELECT COUNT(rank) FROM player_data WHERE rank='$rank' AND username != 'Cast_Member' AND username != 'Imaginears ClubSecurity'";
$lqry = "SELECT * FROM player_data WHERE rank='$rank' AND username != 'Cast_Member' AND username != 'Imaginears ClubSecurity' ORDER BY `username` ASC";
$cres = mysqli_query($link, $cqry);
if(!$cres){
break;
}
$count = mysqli_fetch_array($cres)['COUNT(rank)'];
$lres = mysqli_query($link, $lqry);
if(!$lres){
break;
}
echo "<br>" . rankName($rank) . " (" . $count . "):

";
while ($row = mysqli_fetch_array($lres)) { //Creates a loop to loop through results
$usr = $row['username'];
echo "
 " . $usr . "
";
$total++;
}
echo "

";
}
echo "<br>We currently have " . $total . " Staff Members!";
?>
