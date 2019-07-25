<?php
include("../../scripts/config.php");
$online = mysqli_query($conn, "SELECT * FROM `server`.`player_data` WHERE online = 1");
?>
<div class="page-title">
    <h3 class="breadcrumb-header">Online Players</h3>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-darkblue">
          <div class="panel-heading clearfix">
              <h4 class="panel-title">All Players</h4>
          </div>
          <div class="panel-body">
            <h5>Search all players</h5>
            <div class="input-group button-form-addons">
                  <input id="searchQuery" type="text" placeholder="Username" class="form-control">
                  <span class="input-group-btn">
                      <button class="btn btn-info" id="searchButton" type="button" data-toggle="modal" data-target=".profileModal">Search</button>
                  </span>
              </div>
          </div>
      </div>
        <div class="panel panel-darkblue">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Online Players</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Server</th>
                                <th>View Profile</th>
                                <th>Kick</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $results = mysqli_query($conn, "SELECT * FROM `server`.`player_data` WHERE online = 1");
                              while($row = mysqli_fetch_array($results)) {
                                $prettyrank = prettyRank($row['rank']);
                                ?>
                                    <tr id="<?php echo $row['uuid']; ?>">
                                        <th scope="row"><?php echo $row['username'];?></th>
                                        <td><?php echo $prettyrank?></td>
                                        <td><?php echo $row['last_server'];?></td>
                                        <td><button onclick="viewProfile('<?php echo $row['username'] ?>')" data-toggle="modal" data-target=".profileModal" type="button" class="btn btn-info btn-xs btn-xxs m-b-xxs">Profile</button></td>
                                        <td><button onclick="kickPlayer('<?php echo $row['uuid'] ?>')" type="button" class="btn btn-danger btn-xs btn-xxs m-b-xxs">Kick</button></td>
                                    </tr>

                                <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$('#searchQuery').keypress(function(e){
    if(e.which == 13){
        $('#searchButton').click();
    }
});
$('#searchButton').click(function() {
  if ($('#searchQuery').val() == "") {
    $("#profileModalContent").html(`<div class="modal-header">
        <div class="profileInfo">
          <h4 class="modal-title">No player found with that username!</h4>
        </div>
    </div>
    <div class="modal-body">
        <button type="button" class="btn btn-info profileButton" data-dismiss="modal">Close</button>
    </div>`);
    return;
  }
  $.ajax({
      url: 'scripts/searchPlayers.php',
      type:'POST',
      data:"ign=" + $('#searchQuery').val(),
      success: function(msg)
      {
          console.log("Done search");
          console.log(msg);
          if (msg == 0) {
            $("#profileModalContent").html(`<div class="modal-header">
                <div class="profileInfo">
                  <h4 class="modal-title">No player found with that username!</h4>
                </div>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-info profileButton" data-dismiss="modal">Close</button>
            </div>`);
          } else {
            $("#profileModalContent").html(msg);
          }
      }
  });
});

function viewProfile(username) {
  $.ajax({
      url: 'scripts/searchPlayers.php',
      type:'POST',
      data:"ign=" + username,
      success: function(msg)
      {
          console.log("Done search");
          console.log(msg);
          if (msg == 0) {
            $("#profileModalContent").html(`<div class="modal-header">
                <div class="profileInfo">
                  <h4 class="modal-title">No player found with that username!</h4>
                </div>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-info profileButton" data-dismiss="modal">Close</button>
            </div>`);
          } else {
            $("#profileModalContent").html(msg);
          }
      }
  });
}


// if user is running mozilla then use it's built-in WebSocket
window.WebSocket = window.WebSocket || window.MozWebSocket;

// open connection
var connection = new WebSocket('wss://imaginears.club:4444');

connection.onopen = function () {
  console.log("Connected");
};

connection.onerror = function() {
  console.log("Connection error..");
  toastr["error"]("You will not be able to kick players!", "Socket Error")
}

function kickPlayer($uuid) {
  var obj = {
      time: (new Date()).getTime(),
      type: "kick",
      reason: "",
      uuid: $uuid,
      by: '<?php echo $uuid ?>'
  };
  console.log(JSON.stringify(obj));
  connection.send(JSON.stringify(obj));
  $("#" + $uuid).fadeOut();
}
</script>
