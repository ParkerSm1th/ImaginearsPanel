<?php
include("config.php");
$ign = $_POST['ign'];
$punishments = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`player_data` WHERE username LIKE '$ign%' OR uuid = '$ign' ORDER BY ID"));
$targetU = $punishments['uuid'];
$discord = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `panel`.`discord_links` WHERE minecraft_uuid = '$targetU' ORDER BY ID"));
$discordFull = $discord['discord_username'] . "#" . $discord['discord_identifier'];
if ($discordFull == "#") {
  $discordFull = "Discord Not Linked";
}
$discordID = $discord['discord_id'];
if ($punishments['id'] != null) {
  $targetUUID = $punishments['uuid'];
  $economyData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`economy` WHERE uuid = '$targetUUID'"));
  $balance = $economyData['balance'];
  $mil = $punishments['first_join'];
  $seconds = $mil / 1000;
  $firstJoin = date("m-d-Y", $seconds);
  $extra = "";
  $dev = "";
  if ($punishments['online'] == 1) {
    $online = "<p><i class=\"fa fa-circle text-success m-r-xs\"></i>Online on " . $punishments['last_server'] . "</p>";
  } else {
    $online = "<p><i class=\"fa fa-circle text-danger m-r-xs\"></i>Offline last on " . $punishments['last_server'] . "</p>";
  }
  if ($rank >= 9) {
    $extra = "<hr>
    <div class='row'>
      <div class='col-md-4'>
      <button class=\"btn btn-info btn-block\" data-dismiss=\"modal\" onclick=\"kicsdskPlayer('". $punishments['uuid'] . "')\">Manage Economy</button>
      </div>
      <div class='col-md-4'>
      <button class=\"btn btn-info btn-block\" data-dismiss=\"modal\" onclick=\"sdsd('". $punishments['uuid'] . "')\">Manage Rank</button>
      </div>
      <div class='col-md-4'>
      <button class=\"btn btn-info btn-block\" data-dismiss=\"modal\" onclick=\"sdsd('". $punishments['uuid'] . "')\">View Punishments</button>
      </div>
    </div>
    <hr>
    <div class='row'>
      <div class='col-md-6'>
        <button class=\"btn btn-danger btn-block\" data-dismiss=\"modal\" onclick=\"kickPlayer('". $punishments['uuid'] . "')\">Kick Player</button>
      </div>
      <div class='col-md-6'>
        <button class=\"btn btn-danger btn-block\" data-dismiss=\"modal\" onclick=\"kickkPlayer('". $punishments['uuid'] . "')\">Ban Player</button>
      </div>
    </div>";
  }

  if ($rank == 12) {
    if ($punishments['panel_beta_access'] == 0) {
      $dev = "<hr><div class='row'>
        <div class='col-md-12' id='betaUserButton'>
          <button class=\"btn btn-info btn-block\" onclick=\"enableBetaUser()\">Enable Beta User</button>
        </div>
      </div>
      <script>
        function disableBetaUser() {
          uuid = '" . $punishments['uuid'] ."';
          $.ajax({
              url: 'scripts/toggleBetaUser.php',
              type:'POST',
              data: {
                id: uuid,
                status: 0
              },
              success: function(msg)
              {
                  console.log('Done');
                  console.log(msg);
                  if (msg == 0) {
                    console.log('Error');
                  } else if (msg == 1) {
                    $('#betaUserButton').html('<button class=\"btn btn-info btn-block\" onclick=\"enableBetaUser()\">Enable Beta User</button>');
                    toastr['success']('That users beta access has been revoked!', 'Beta Updated')
                  }
              }
          });
        }
        function enableBetaUser() {
          uuid = '" . $punishments['uuid'] ."';
          discordid = '" . $discordID . "';
          $.ajax({
              url: 'scripts/toggleBetaUser.php',
              type:'POST',
              data: {
                id: uuid,
                status: 1
              },
              success: function(msg)
              {
                  console.log('Done');
                  console.log(msg);
                  if (msg == 0) {
                    console.log('Error');
                  } else if (msg == 1) {
                    $('#betaUserButton').html('<button class=\"btn btn-danger btn-block\" onclick=\"disableBetaUser()\">Disable Beta User</button>');
                    toastr['success']('That users beta access has been enabled!', 'Beta Updated');
                    var xhttp = new XMLHttpRequest();
                    xhttp.open('POST', 'https://api.imaginears.club:2053/api/imaginears/newBetaUser/' + discordid + '/c7738549-7284-43cb-81c5-3a131b564a4d', true);
                    xhttp.send();
                  }
              }
          });
        }
      </script>";
    } else {
      $dev = "<hr><div class='row'>
        <div class='col-md-12' id='betaUserButton'>
          <button class=\"btn btn-danger btn-block\" onclick=\"disableBetaUser()\">Disable Beta User</button>
        </div>
      </div>
      <script>
        function disableBetaUser() {
          uuid = '" . $punishments['uuid'] ."';
          $.ajax({
              url: 'scripts/toggleBetaUser.php',
              type:'POST',
              data: {
                id: uuid,
                status: 0
              },
              success: function(msg)
              {
                  console.log('Done');
                  console.log(msg);
                  if (msg == 0) {
                    console.log('Error');
                  } else if (msg == 1) {
                    $('#betaUserButton').html('<button class=\"btn btn-info btn-block\" onclick=\"enableBetaUser()\">Enable Beta User</button>');
                    toastr['success']('That users beta access has been revoked!', 'Beta Updated')
                  }
              }
          });
        }
        function enableBetaUser() {
          uuid = '" . $punishments['uuid'] ."';
          discordid = '" . $discordID . "';
          $.ajax({
              url: 'scripts/toggleBetaUser.php',
              type:'POST',
              data: {
                id: uuid,
                status: 1
              },
              success: function(msg)
              {
                  console.log('Done');
                  console.log(msg);
                  if (msg == 0) {
                    console.log('Error');
                  } else if (msg == 1) {
                    $('#betaUserButton').html('<button class=\"btn btn-danger btn-block\" onclick=\"disableBetaUser()\">Disable Beta User</button>');
                    toastr['success']('That users beta access has been enabled!', 'Beta Updated');
                    var xhttp = new XMLHttpRequest();
                    xhttp.open('POST', 'https://api.imaginears.club:2053/api/imaginears/newBetaUser/' + discordid + '/c7738549-7284-43cb-81c5-3a131b564a4d', true);
                    xhttp.send();
                  }
              }
          });
        }
      </script>";
    }
  }
  $profile = "<div class=\"panel panel-darkblue\">
      <div class=\"panel-heading clearfix\">
          <h4 class=\"panel-title\">" . $punishments['username'] . "'s Profile</h4>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
      </div>
      <div class=\"panel-body user-profile-panel\">
          <img src=\"https://crafatar.com/avatars/" . $punishments['uuid'] . "\" class=\"user-profile-image img-circle\">
          <h4 class=\"text-center m-t-lg\">" . $punishments['username'] . "</h4>
          <p class=\"text-center\">" . prettyRank($punishments['rank']) . "</p>
          <h5 class=\"text-center m-t-lg\">" . $discordFull . "</h5>
          <hr>
          <ul class=\"list-unstyled text-center\">
              <li><p><i class=\"fa fa-dollar m-r-xs\"></i><span id=\"Pbalance\">" . $balance . "</span></p></li>
              <span id=\"Ponline\"><li>" . $online . "</li></span>

              <li><p>First Join: " . $firstJoin . "</a></p></li>
          </ul>
          <hr>
          <div class='row'>
            <div class='col-md-4'>
            <button class=\"btn btn-info btn-block\" data-dismiss=\"modal\" onclick=\"kicsdskPlayer('". $punishments['uuid'] . "')\">Send Friend Request</button>
            </div>
            <div class='col-md-4'>
            <button class=\"btn btn-info btn-block\" data-dismiss=\"modal\" onclick=\"sdsd('". $punishments['uuid'] . "')\">View Transactions</button>
            </div>
            <div class='col-md-4'>
            <button class=\"btn btn-info btn-block\" data-dismiss=\"modal\" onclick=\"sdsd('". $punishments['uuid'] . "')\">View Connections</button>
            </div>
          </div>
          ". $extra ."
          ". $dev ."
      </div>
  </div>";
  echo $profile;
} else {
  echo 0;
}
