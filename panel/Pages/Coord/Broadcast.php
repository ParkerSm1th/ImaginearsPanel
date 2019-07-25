<?php
include("../../scripts/config.php");
 ?>
<div class="page-title">
    <h3 class="breadcrumb-header">Broadcast message to server</h3>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-darkblue">
          <div class="panel-heading clearfix">
              <h4 class="panel-title">Broadcast message</h4>
          </div>
          <div class="panel-body">
              <form class="form-inline" action="#">
                <div class="form-group">
                      <label class="col-sm-2 control-label">Prefix</label>
                      <div class="col-sm-10">
                          <select id="sel" class="form-control">
                              <option>INFO »</option>
                              <option>[Mayor] **</option>
                              <option>Announcement »</option>
                          </select>
                      </div>
                  </div>
                <div class="form-group" style="width: 60%;">
                  <label class="sr-only" for="message">Message</label>
                  <input type="text" style="width: 100%;" class="form-control" id="message" placeholder="Message">
                </div>

                  <button id="sub" type="" class="btn btn-danger">Broadcast</button>
                </form>
          </div>
      </div>


  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

// if user is running mozilla then use it's built-in WebSocket
window.WebSocket = window.WebSocket || window.MozWebSocket;

// open connection
var connection = new WebSocket('wss://imaginears.club:4444');

connection.onopen = function () {
  console.log("Connected");
};

connection.onerror = function() {
  console.log("Connection error..");
  toastr["error"]("You will not be able to send broadcasts!", "Socket Error")
};

$("#sub").click(function() {
  event.preventDefault();
  var pr = 0;
  switch($("#sel").val()) {
    case "INFO »":
      pr = 0;
      break;
    case "[Mayor] **":
      pr = 1;
      break;
    case "Announcement »":
      pr = 2;
      break;
    default:
      pr = 0;
      break;
  }
  var obj = {
      time: (new Date()).getTime(),
      type: "broadcast",
      msg: $("#message").val(),
      prefix: pr,
      by: '<?php echo $uuid ?>'
  };
  console.log(JSON.stringify(obj));
  connection.send(JSON.stringify(obj));
  $("#message").val("");
  toastr["success"]("Your message has been broadcasted on the server", "Message sent!")
});

</script>
