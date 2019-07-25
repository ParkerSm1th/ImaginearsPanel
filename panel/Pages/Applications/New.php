<?php
include("../../scripts/config.php");
$userData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`player_data` WHERE uuid = '$uuid'"));
$discordData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `panel`.`discord_links` WHERE minecraft_uuid = '$uuid'"));
$discord = $discordData['discord_username'] . "#" . $discordData['discord_identifier'];
$discordID = $discordData['discord_id'];
$checkForActive = mysqli_query($conn, "SELECT * FROM `panel`.`applications` WHERE uuid = '$uuid' AND status = '0'");
if (mysqli_num_rows($checkForActive) != 0) {
  ?>
    <script>
      urlRoute.loadPage("Applications.Home");
    </script>
  <?php
  exit();
}
 ?>
 <style>
.custom-select {
  font-size: 16px;
  height: 100%;
  width: 100%;
  border-radius: 4px;
  box-shadow: none!important;
  border: 1px solid #324462;
  color: #d6d6d6;
  background: #24344d;
  padding: 5px 12px;
  font-size: 16px;
}
 </style>

<div class="page-title">
    <h3 class="breadcrumb-header">New Application</h3>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="panel panel-darkblue">
          <div class="panel-body">
              <div id="rootwizard">
                  <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a style="pointer-events: none; cursor: default;" href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>Details</a></li>
                      <li role="presentation"><a style="pointer-events: none; cursor: default;" href="#tab2" data-toggle="tab"><i class="fa fa-heart m-r-xs"></i>Guest Relations Questions</a></li>
                      <li role="presentation"><a style="pointer-events: none; cursor: default;" href="#tab3" data-toggle="tab" id="tab31"><i class="fa fa-truck m-r-xs"></i>Role Specific</a></li>
                      <li role="presentation"><a style="pointer-events: none; cursor: default;" href="#tab4" data-toggle="tab"><i class="fa fa-check m-r-xs"></i>Submit</a></li>
                  </ul>
                  <div class="progress progress-sm m-t-sm">
                      <div class="progress-bar progress-bar-info active form-wizard-progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                      </div>
                  </div>
                  <form id="wizardForm" novalidate="novalidate">
                      <div class="tab-content">
                          <div class="tab-pane active fade in" id="tab1">
                              <div class="row">
                                  <div class="col-md-6" style="    padding-left: 30px;">
                                      <div class="row">
                                          <div class="form-group">
                                              <label for="banDate">Username</label>
                                              <input type="text" disabled class="form-control" name="banDate" id="banDate" value="<?php echo $ign ?>">
                                          </div>
                                          <div class="form-group">
                                              <label for="banDate">UUID</label>
                                              <input type="text" disabled class="form-control" name="banDate" id="banDate" value="<?php echo $uuid ?>">
                                          </div>
                                          <div class="form-group">
                                              <label for="banReason">Discord</label>
                                              <input type="text" disabled class="form-control" name="banDate" id="banDate" value="<?php echo $discord ?>">
                                          </div>
                                          <div class="form-group">
                                              <label for="banReason">Timezone</label>
                                              <input type="text" disabled class="form-control" name="timezone" id="timezone">
                                          </div>
                                          <div class="form-group">
                                              <label for="workFor">Do you currently work for (or have you recently) any other Theme Park related server? If so, which one? Also, how long ago did you leave?</label>
                                              <input type="text" class="form-control" name="workFor" id="workFor">
                                          </div>
                                          <div class="form-group">
                                              <label for="over16">Are you over 16 years of age? This is REQUIRED for ALL staff as our hiring age is 16+. Applications that contain falsified data will be VOID.</label>
                                              <div class="checkbox">
                                                    <label>
                                                        <div class="checker"><span class=""><input type="checkbox" id="over16"></span></div>Over 16
                                                    </label>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="hours">What is your availability? i.e. How many hours you can commit to the server per week?</label>
                                              <input type="text" class="form-control" name="hours" id="hours">
                                          </div>
                                          <div class="form-group">
                                              <label for="past">Have you worked for any other servers in the past? Please post them and what time you worked for them. If you have not worked for any please put N/A.</label>
                                              <textarea id="past" name="past" class="form-control" style="resize: none; " rows="4"></textarea>
                                          </div>
                                          <div class="form-group">
                                              <label for="parks">What Disney Parks have you visited? Please list all and put N/A if none.</label>
                                              <input type="text" class="form-control" name="parks" id="parks">
                                          </div>
                                          <div class="form-group">
                                              <label for="egs">What does Exceptional Guest Service mean to you?</label>
                                              <textarea id="egs" name="egs" class="form-control" style="resize: none; " rows="4"></textarea>
                                          </div>
                                          <div class="form-group">
                                              <label for="teams">Are you comfortable working in teams?</label>
                                              <select id="teams" class="custom-select form-select-options">
                                                    <option selected>Yes</option>
                                                    <option>No</option>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="role">What role are you applying for?</label>
                                              <select id="role" onchange="updateQuestions()" class="custom-select form-select-options">
                                                    <option selected>Guest Relations</option>
                                                    <option>Imagineer</option>
                                                    <option>Developer</option>
                                                </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <h3 class="m-b-sm">Details</h3>
                                      <p>Some of these details are pulled from our system, if anything here is incorrect please notify a manager.</p>
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="tab2">
                              <div class="row">
                                  <div class="col-md-3">
                                    <h3 class="m-b-sm">Guest Relations</h3>
                                    <p>We require all Cast Members to have guest relations skills.</p>
                                  </div>
                                  <div class="col-md-9">
                                      <div class="form-group col-md-12">
                                          <label for="gr1">A Guest claims that another Guest has sent them an inappropriate book. The Guest has thrown away the book but reports it to you. How do you handle this situation?</label>
                                          <textarea id="gr1" name="gr1" class="form-control" style="resize: none; " rows="4"></textarea>
                                      </div>
                                      <div class="form-group col-md-12">
                                          <label for="gr2">Everyone has been given a deadline for their projects and you see another Cast Member struggling to meet their deadline. How would you assist this Cast Member even if you're not a builder?</label>
                                          <textarea id="gr2" name="gr2" class="form-control" style="resize: none; " rows="4"></textarea>
                                      </div>
                                      <div class="form-group col-md-12">
                                          <label for="gr3">What is your proudest moment?</label>
                                          <textarea id="gr3" name="gr3" class="form-control" style="resize: none; " rows="4"></textarea>
                                      </div>
                                      <div class="form-group col-md-12">
                                          <label for="gr4">There is a Guest who has caused trouble in the past, that is currently swearing at other Guest, How would you handle that situation? </label>
                                          <textarea id="gr4" name="gr4" class="form-control" style="resize: none; " rows="4"></textarea>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="tab3">
                            <div class="row">
                                <div class="col-md-3">
                                  <h3 class="m-b-sm">Role Specific Questions</h3>
                                  <p>These questions are based on the role you chose in the first step.</p>
                                </div>
                                <div class="col-md-9" id="roleSpecificQuestions">
                                  <div class="alert alert-success m-t-sm m-b-lg" role="alert">
                                      No additional Guest Relations questions! You can go to the next step!
                                  </div>
                                </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="tab4">
                              <h3 class="form-wizard-congrats">Alrighty pal!</h3>
                              <div class="alert alert-success m-t-sm m-b-lg" role="alert">
                                  You have finished the application, you can go back and review your answers! Once you are content with your answers click Submit Application below to submit your application.
                              </div>
                              <a href="#" class="btn btn-default" id="submit" style="margin-bottom: 20px;">Submit Application</a>
                          </div>
                          <ul class="pager wizard">
                              <li class="previous disabled"><a href="#" class="btn btn-default" id="backButton">Previous</a></li>
                              <li class="next"><a href="#" class="btn btn-default" id="nextButton">Next</a></li>
                          </ul>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<script src="../assets/js/timezones.js"></script>
<script>
var tz = jstz.determine();
var timezone = tz.name();
$("#timezone").val(timezone);
function updateQuestions() {
  if ($("#role").val() == "Developer") {
    $("#roleSpecificQuestions").html(`
      <div class="form-group">
          <label for="dev1">Please give a description of your development skills</label>
          <textarea id="dev1" name="dev1" class="form-control" style="resize: none; " rows="4"></textarea>
      </div>
      <div class="form-group">
          <label for="dev2">Please provide a link to your github or personal portfolio</label>
          <input type="text" class="form-control" name="dev2" id="dev2">
      </div>
      `);
  } else if ($("#role").val() == "Imagineer") {
    $("#roleSpecificQuestions").html(`
      <div class="form-group">
          <label for="im1">What is your experience with World Edit?</label>
          <select id="im1" class="custom-select form-select-options">
              <option>Beginner</option>
              <option>Intermediate</option>
              <option>Advanced</option>
              <option>Elite</option>
              </option>None</option>
          </select>
      </div>
      <div class="form-group">
          <label for="im2">How much experience in TrainCarts and TCCoasters do you have?</label>
          <select id="im2" class="custom-select form-select-options">
              <option>Beginner</option>
              <option>Intermediate</option>
              <option>Advanced</option>
              <option>Elite</option>
              </option>None</option>
          </select>
      </div>
      <div class="form-group">
          <label for="im3">Do you have any builds to showcase? Please provide an imgur, flickr, youtube link, or if it's on our creative server please let us know that here.</label>
          <input type="text" class="form-control" name="im3" id="im3">
      </div>
      <div class="form-group">
          <label for="im4">Are you comfortable working on large projects with a small team?</label>
          <select id="im4" class="custom-select form-select-options">
              <option>Yes</option>
              <option>No</option>
          </select>
      </div>
      <div class="form-group">
          <label for="im5">Are you comfortable with meeting deadlines?</label>
          <select id="im5" class="custom-select form-select-options">
              <option>Yes</option>
              <option>No</option>
          </select>
      </div>
      <div class="form-group">
          <label for="im6">Are you comfortable with building 1:1 scale?</label>
          <select id="im6" class="custom-select form-select-options">
              <option>Yes</option>
              <option>No</option>
          </select>
      </div>
      `);
  } else if ($("#role").val() == "Guest Relations") {
    $("#roleSpecificQuestions").html(`
      <div class="alert alert-success m-t-sm m-b-lg" role="alert">
          No additional Guest Relations questions! You can go to the next step!
      </div>`);
  }
}
$("#submit").click(function() {
  var $valid = $("#wizardForm").valid();
  if(!$valid) {
      $validator.focusInvalid();
      return true;
  }
  console.log($("#role").val());
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "https://api.imaginears.club:2053/api/imaginears/newApplication/<?php echo $ign ?>/<?php echo $discordData['discord_username'] ?>/<?php echo $discordData['discord_identifier'] ?>/c7738549-7284-43cb-81c5-3a131b564a4d", true);
  xhttp.send();
  if ($("#role").val() == "Guest Relations") {
    console.log("Trying GR");
    $.ajax({
        url: 'scripts/sendApplication.php',
        type:'POST',
        data:"ign=<?php echo $ign ?>" + "&uuid=<?php echo $uuid ?>" + "&discord=<?php echo $discord ?>" + "&discordID=<?php echo $discordID ?>" + "&timezone=" + $("#timezone").val() + "&workFor=" + $("#workFor").val() + "&parks=" + $("#parks").val() + "&over16=" + $("#over16").val() + "&hours=" + $("#hours").val() + "&pastServers=" + $("#past").val() + "&egs=" + $("#egs").val() + "&teams=" + $("#teams").val() + "&gr1=" + $("#gr1").val() + "&gr2=" + $("#gr2").val() + "&gr3=" + $("#gr3").val() + "&gr4=" + $("#gr4").val() + "&applyingrole=0",
        success: function(msg)
        {
            console.log("Done");
            console.log(msg);
            if (msg == 0) {
              console.log("Error");
            } else if (msg == 1) {
                urlRoute.loadPage("Applications.Home");
            }
        }
    });
  } else if ($("#role").val() == "Imagineer") {
    $.ajax({
        url: 'scripts/sendApplication.php',
        type:'POST',
        data:"ign=<?php echo $ign ?>" + "&uuid=<?php echo $uuid ?>" + "&discord=<?php echo $discord ?>" + "&discordID=<?php echo $discordID ?>" + "&timezone=" + $("#timezone").val() + "&workFor=" + $("#workFor").val() + "&parks=" + $("#parks").val() + "&over16=" + $("#over16").val() + "&hours=" + $("#hours").val() + "&pastServers=" + $("#past").val() + "&egs=" + $("#egs").val() + "&teams=" + $("#teams").val() + "&gr1=" + $("#gr1").val() + "&gr2=" + $("#gr2").val() + "&gr3=" + $("#gr3").val() + "&gr4=" + $("#gr4").val() + "&applyingrole=1&i_we=" + $("#im1").val() + "&i_tc=" + $("#im2").val() + "&i_showcase=" + $("#im3").val() + "&i_lpst=" + $("#im4").val() + "&i_deadlines=" + $("#im5").val() + "&i_1to1=" + $("#im6").val(),
        success: function(msg)
        {
          console.log("Done");
          console.log(msg);
          if (msg == 0) {
            console.log("Error");
          } else if (msg == 1) {
              urlRoute.loadPage("Applications.Home");
          }
        }
    });
  } else if ($("#role").val() == "Developer") {
    $.ajax({
        url: 'scripts/sendApplication.php',
        type:'POST',
        data:"ign=<?php echo $ign ?>" + "&uuid=<?php echo $uuid ?>" + "&discord=<?php echo $discord ?>" + "&discordID=<?php echo $discordID ?>" + "&timezone=" + $("#timezone").val() + "&workFor=" + $("#workFor").val() + "&parks=" + $("#parks").val() + "&over16=" + $("#over16").val() + "&hours=" + $("#hours").val() + "&pastServers=" + $("#past").val() + "&egs=" + $("#egs").val() + "&teams=" + $("#teams").val() + "&gr1=" + $("#gr1").val() + "&gr2=" + $("#gr2").val() + "&gr3=" + $("#gr3").val() + "&gr4=" + $("#gr4").val() + "&applyingrole=2&d_desc=" + $("#dev1").val() + "&d_port=" + $("#dev2").val(),
        success: function(msg)
        {
          if (msg == 0) {

          } else if (msg == 1) {
              urlRoute.loadPage("Applications.Home");
          }
        }
    });
  } else {
    console.log("None selected");
    $.ajax({
        url: 'scripts/sendApplication.php',
        type:'POST',
        data:"ign=<?php echo $ign ?>" + "&uuid=<?php echo $uuid ?>" + "&discord=<?php echo $discord ?>" + "&discordID=<?php echo $discordID ?>" + "&timezone=" + $("#timezone").val() + "&workFor=" + $("#workFor").val() + "&parks=" + $("#parks").val() + "&over16=" + $("#over16").val() + "&hours=" + $("#hours").val() + "&pastServers=" + $("#past").val() + "&egs=" + $("#egs").val() + "&teams=" + $("#teams").val() + "&gr1=" + $("#gr1").val() + "&gr2=" + $("#gr2").val() + "&gr3=" + $("#gr3").val() + "&gr4=" + $("#gr4").val() + "&applyingrole=0",
        success: function(msg)
        {
            console.log("Done");
            console.log(msg);
            if (msg == 0) {
              console.log("Error");
            } else if (msg == 1) {
                urlRoute.loadPage("Applications.Home");
            }
        }
    });
  }
});
</script>
<script src="../assets/plugins/jquery/jquery-3.1.0.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
<script src="../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="../assets/plugins/switchery/switchery.min.js"></script>
<script src="../assets/plugins/d3/d3.min.js"></script>
<script src="../assets/plugins/nvd3/nv.d3.min.js"></script>
<script src="../assets/plugins/pace/pace.min.js"></script>
<script src="../assets/js/flatifytheme.min.js"></script> 

<script src="../assets/js/pages/apply.js"></script>
