<?php
include("../../scripts/config.php");
$id = $_GET['id'];
$applicationDetails = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `panel`.`deleted_applications` WHERE id = '$id'"));
if ($applicationDetails == null) {
  ?>
    <script>
      urlRoute.loadPage("Applications.Hub");
    </script>
  <?php
  exit();
}
 ?>

<div class="page-title">
    <h3 class="breadcrumb-header">View Deleted Application</h3>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="panel panel-darkblue">
          <div class="panel-body">
              <div id="rootwizard">
                  <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>Details</a></li>
                      <li role="presentation"><a href="#tab2" data-toggle="tab"><i class="fa fa-heart m-r-xs"></i>Guest Relations Questions</a></li>
                      <li role="presentation"><a href="#tab3" data-toggle="tab" id="tab31"><i class="fa fa-truck m-r-xs"></i>Role Specific</a></li>
                      <li role="presentation"><a href="#tab4" data-toggle="tab"><i class="fa fa-comment m-r-xs"></i>Manage</a></li>
                  </ul>
                  <form id="wizardForm" novalidate="novalidate">
                      <div class="tab-content">
                          <div class="tab-pane active fade in" id="tab1">
                              <div class="row">
                                  <div class="col-md-12" style="    padding-left: 30px;">
                                      <div class="row">
                                          <div class="form-group">
                                              <label for="banDate">Username</label>
                                              <input type="text" disabled class="form-control" name="banDate" id="banDate" value="<?php echo $applicationDetails['username']; ?>">
                                          </div>
                                          <div class="form-group">
                                              <label for="banDate">UUID</label>
                                              <input type="text" disabled class="form-control" name="banDate" id="banDate" value="<?php echo $applicationDetails['uuid'] ?>">
                                          </div>
                                          <div class="form-group">
                                              <label for="banReason">Discord</label>
                                              <input type="text" disabled class="form-control" name="banDate" id="banDate" value="<?php echo $applicationDetails['discord'] ?>">
                                          </div>
                                          <div class="form-group">
                                              <label for="banReason">Timezone</label>
                                              <input type="text" disabled class="form-control" name="timezone" id="timezone" value="<?php echo $applicationDetails['timezone']?>">
                                          </div>
                                          <div class="form-group">
                                              <label for="workFor">Do you currently work for (or have you recently) any other Theme Park related server? If so, which one? Also, how long ago did you leave?</label>
                                              <input disabled type="text" class="form-control" name="workFor" id="workFor" value="<?php echo $applicationDetails['workFor']?>">
                                          </div>
                                          <div class="form-group">
                                              <label for="over16">Are you over 16 years of age? This is REQUIRED for ALL staff as our hiring age is 16+. Applications that contain falsified data will be VOID.</label>
                                              <?php if ($applicationDetails['over16'] == 'on') {

                                              ?>
                                              <div class="checkbox">
                                                    <label>
                                                        <div class="checker"><span class="checked"><input type="checkbox" id="over16" checked disabled></span></div>Over 16
                                                    </label>
                                                </div>
                                              <?php } else { ?>
                                                <div class="checkbox">
                                                      <label>
                                                          <div class="checker"><span class=""><input type="checkbox" id="over16" disabled></span></div>Over 16
                                                      </label>
                                                  </div>
                                              <?php } ?>
                                          </div>
                                          <div class="form-group">
                                              <label for="hours">What is your availability? i.e. How many hours you can commit to the server per week?</label>
                                              <input disabled value="<?php echo $applicationDetails['hours']?>" type="text" class="form-control" name="hours" id="hours">
                                          </div>
                                          <div class="form-group">
                                              <label for="past">Have you worked for any other servers in the past? Please post them and what time you worked for them. If you have not worked for any please put N/A.</label>
                                              <textarea disabled id="past" name="past" class="form-control" style="resize: none; " rows="4"><?php echo $applicationDetails['pastServers']?></textarea>
                                          </div>
                                          <div class="form-group">
                                              <label for="parks">What Disney Parks have you visited? Please list all and put N/A if none.</label>
                                              <input disabled value="<?php echo $applicationDetails['parksVisited']?>" type="text" class="form-control" name="parks" id="parks">
                                          </div>
                                          <div class="form-group">
                                              <label for="egs">What does Exceptional Guest Service mean to you?</label>
                                              <textarea disabled value="" id="egs" name="egs" class="form-control" style="resize: none; " rows="4"><?php echo $applicationDetails['egs']?></textarea>
                                          </div>
                                          <div class="form-group">
                                              <label for="teams">Are you comfortable working in teams?</label>
                                              <input disabled value="<?php echo $applicationDetails['teams']?>" type="text" class="form-control" name="teams" id="teams">
                                          </div>
                                          <div class="form-group">
                                              <label for="role">What role are you applying for?</label>
                                              <input disabled value="<?php echo $applicationDetails['a_role']?>" type="text" class="form-control" name="role" id="role">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="tab2">
                              <div class="row">
                                      <div class="form-group col-md-12">
                                          <label for="gr1">A Guest claims that another Guest has sent them an inappropriate book. The Guest has thrown away the book but reports it to you. How do you handle this situation?</label>
                                          <textarea disabled value="" id="gr1" name="gr1" class="form-control" style="resize: none; " rows="4"><?php echo $applicationDetails['gr1']?></textarea>
                                      </div>
                                      <div class="form-group col-md-12">
                                          <label for="gr2">Everyone has been given a deadline for their projects and you see another Cast Member struggling to meet their deadline. How would you assist this Cast Member even if you're not a builder?</label>
                                          <textarea disabled value="" id="gr2" name="gr2" class="form-control" style="resize: none; " rows="4"><?php echo $applicationDetails['gr2']?></textarea>
                                      </div>
                                      <div class="form-group col-md-12">
                                          <label for="gr3">What is your proudest moment?</label>
                                          <textarea disabled value="" id="gr3" name="gr3" class="form-control" style="resize: none; " rows="4"><?php echo $applicationDetails['gr3']?></textarea>
                                      </div>
                                      <div class="form-group col-md-12">
                                          <label for="gr4">There is a Guest who has caused trouble in the past, that is currently swearing at other Guest, How would you handle that situation? </label>
                                          <textarea disabled value="" id="gr4" name="gr4" class="form-control" style="resize: none; " rows="4"><?php echo $applicationDetails['gr4']?></textarea>
                                      </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="tab3">
                            <div class="row">
                              <div class="col-md-12" id="roleSpecificQuestions">
                                <?php if ($applicationDetails['a_role'] == 'Guest Relations') {

                                ?>

                                  <div class="alert alert-success m-t-sm m-b-lg" role="alert">
                                      No additional Guest Relations questions!
                                  </div>

                              <?php } else if ($applicationDetails['a_role'] == 'Developer') { ?>
                                  <div class="form-group">
                                      <label for="dev1">Please give a description of your development skills</label>
                                      <textarea disabled value="" id="dev1" name="dev1" class="form-control" style="resize: none; " rows="4"><?php echo $applicationDetails['d_desc'] ?></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="dev2">Please provide a link to your github or personal portfolio</label>
                                      <input disabled value="<?php echo $applicationDetails['d_port'] ?>" type="text" class="form-control" name="dev2" id="dev2">
                                  </div>
                                <?php } else if ($applicationDetails['a_role'] == 'Imagineer') { ?>
                                  <div class="form-group">
                                      <label for="im1">What is your experience with World Edit?</label>
                                      <input disabled value="<?php echo $applicationDetails['i_we'] ?>" type="text" class="form-control" name="i1" id="i1">
                                  </div>
                                  <div class="form-group">
                                      <label for="im2">How much experience in TrainCarts and TCCoasters do you have?</label>
                                      <input disabled value="<?php echo $applicationDetails['i_tc'] ?>" type="text" class="form-control" name="i2" id="i2">
                                  </div>
                                  <div class="form-group">
                                      <label for="im3">Do you have any builds to showcase? Please provide an imgur, flickr, youtube link, or if it's on our creative server please let us know that here.</label>
                                      <input disabled value="<?php echo $applicationDetails['i_showcase'] ?>" type="text" class="form-control" name="im3" id="im3">
                                  </div>
                                  <div class="form-group">
                                      <label for="im4">Are you comfortable working on large projects with a small team?</label>
                                      <input disabled value="<?php echo $applicationDetails['i_lpst'] ?>" type="text" class="form-control" name="i4" id="i4">
                                  </div>
                                  <div class="form-group">
                                      <label for="im5">Are you comfortable with meeting deadlines?</label>
                                      <input disabled value="<?php echo $applicationDetails['i_deadlines'] ?>" type="text" class="form-control" name="i4" id="i4">
                                  </div>
                                  <div class="form-group">
                                      <label for="im6">Are you comfortable with building 1:1 scale?</label>
                                      <input disabled value="<?php echo $applicationDetails['i_1to1'] ?>" type="text" class="form-control" name="i4" id="i4">
                                  </div>
                                  <?php } ?>
                                  </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="tab4">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label for="gr4">Current Comments</label>
                                    <textarea disabled value="" id="comment" name="comment" class="form-control" style="resize: none; " rows="4"><?php echo $applicationDetails['comments']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gr4">Staff Comments (Can't be seen by applicant)</label>
                                    <textarea disabled value="" id="staff_comment" name="staff_comment" class="form-control" style="resize: none; " rows="4"><?php echo $applicationDetails['staff_comments']?></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<script src="../assets/js/timezones.js"></script>
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
<script src="../assets/plugins/flot/jquery.flot.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="../assets/plugins/pace/pace.min.js"></script>
<script>
$("#updateComment").click(function() {
  $.ajax({
      url: 'scripts/updateComment.php',
      type:'POST',
      data:"type=1&id=<?php echo $_GET['id'] ?>" + "&comment=" + $("#comment").val(),
      success: function(msg)
      {
          console.log("Done");
          console.log(msg);
          if (msg == 0) {
            console.log("Error");
          } else if (msg == 1) {
            toastr["success"]("The comment has been updated", "Comment Updated")
          }
      }
  });
});
$("#updateStaffComment").click(function() {
  $.ajax({
      url: 'scripts/updateComment.php?type=2',
      type:'POST',
      data:"type=2&id=<?php echo $_GET['id'] ?>" + "&comment=" + $("#staff_comment").val(),
      success: function(msg)
      {
          console.log("Done");
          console.log(msg);
          if (msg == 0) {
            console.log("Error");
          } else if (msg == 1) {
            toastr["success"]("The staff comment has been updated", "Comment Updated")
          }
      }
  });
});
$("#deny").click(function() {
  $.ajax({
      url: 'scripts/updateApp.php',
      type:'POST',
      data:"id=<?php echo $_GET['id'] ?>" + "&status=deny",
      success: function(msg)
      {
          console.log("Done");
          console.log(msg);
          if (msg == 0) {
            console.log("Error");
          } else if (msg == 1) {
            toastr["success"]("This application has been set as denied", "Updated")
          }
      }
  });
});
$("#accept").click(function() {
  $.ajax({
      url: 'scripts/updateApp.php',
      type:'POST',
      data:"id=<?php echo $_GET['id'] ?>" + "&status=accept",
      success: function(msg)
      {
          console.log("Done");
          console.log(msg);
          if (msg == 0) {
            console.log("Error");
          } else if (msg == 1) {
            toastr["success"]("This application has been set as accepted", "Updated")
          }
      }
  });
});

$("#pending").click(function() {
  $.ajax({
      url: 'scripts/updateApp.php',
      type:'POST',
      data:"id=<?php echo $_GET['id'] ?>" + "&status=pending",
      success: function(msg)
      {
          console.log("Done");
          console.log(msg);
          if (msg == 0) {
            console.log("Error");
          } else if (msg == 1) {
            toastr["success"]("This application has been set as pending", "Updated")
          }
      }
  });
});

$("#delete").click(function() {
  $.ajax({
      url: 'scripts/updateApp.php',
      type:'POST',
      data:"id=<?php echo $_GET['id'] ?>" + "&status=delete",
      success: function(msg)
      {
          console.log("Done");
          console.log(msg);
          if (msg == 0) {
            console.log("Error");
          } else if (msg == 1) {
            toastr["success"]("This application has been deleted", "Deleted")
          }
      }
  });
});
</script>
