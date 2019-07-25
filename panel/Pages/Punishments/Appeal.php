<?php
session_start();
include("../../scripts/ranks.php");
$ign = $_SESSION['appeal']['ign'];
$rank = $_SESSION['appeal']['rank'];
$uuid = $_SESSION['appeal']['uuid'];
$reason = $_SESSION['appeal']['reason'];
$length = $_SESSION['appeal']['length'];
$date = $_SESSION['appeal']['date'];
$prettyrank = prettyRank($rank);
if ($length == '0') {
  $length = "Permanent";
}
$mil = $date;
$seconds = $mil / 1000;
$date = date("m-d-Y h:s", $seconds);
 ?>
<div class="page-title">
    <h3 class="breadcrumb-header">Ban Appeal</h3>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="panel panel-darkblue">
          <div class="panel-body">
              <div id="rootwizard">
                  <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>Understanding</a></li>
                      <li role="presentation"><a href="#tab2" data-toggle="tab"><i class="fa fa-bandcamp m-r-xs"></i>Responsibility</a></li>
                      <li role="presentation"><a href="#tab3" data-toggle="tab"><i class="fa fa-truck m-r-xs"></i>Improvement</a></li>
                      <li role="presentation"><a href="#tab4" data-toggle="tab"><i class="fa fa-check m-r-xs"></i>Review</a></li>
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
                                              <label for="banDate">Ban Date</label>
                                              <input type="text" disabled class="form-control" name="banDate" id="banDate" value="<?php echo $date ?>">
                                          </div>
                                          <div class="form-group">
                                              <label for="banDate">Ban Length</label>
                                              <input type="text" disabled class="form-control" name="banDate" id="banDate" value="<?php echo $length ?>">
                                          </div>
                                          <div class="form-group">
                                              <label for="banReason">Ban Reason</label>
                                              <textarea disabled id="console" name="banReason" class="form-control" style="resize: none; " rows="8" value="<?php echo $reason ?>"><?php echo $reason ?></textarea>
                                          </div>
                                          <div class="form-group">
                                              <label for="email">Email Address</label>
                                              <input type="email" class="form-control" name="email" id="email">
                                          </div>

                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <h3 class="m-b-sm">The first step</h3>
                                      <p>Here at ImaginearsClub we believe in a system of taking responsibilty for what we did wrong and improving upon it in the future.</p>
                                      <p>To the left is the reason you were banned from Imaginears and the date, you will be asked to elaborate on this in the next step.</p>
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="tab2">
                              <div class="row">
                                  <div class="col-md-3">
                                    <h3 class="m-b-sm">Responsibility</h3>
                                    <p>This is where you can take responsibilty for your past actions</p>
                                  </div>
                                  <div class="col-md-9">
                                      <div class="form-group col-md-12">
                                          <label for="madeItOk">Why do you feel what you did was ok?</label>
                                          <textarea id="madeItOk" name="madeItOk" class="form-control" style="resize: none; " rows="4"></textarea>
                                      </div>
                                      <div class="form-group col-md-12">
                                          <label for="didWrong">Do you understand what you did wrong?</label>
                                          <textarea id="didWrong" name="didWrong" class="form-control" style="resize: none; " rows="4"></textarea>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="tab3">
                            <div class="row">
                                <div class="col-md-3">
                                  <h3 class="m-b-sm">Improvement</h3>
                                  <p>This is where you start to improve on what you did wrong so that we can avoid this in the future</p>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group col-md-12">
                                        <label for="inFuture">Do you know how you can avoid what you've done wrong in the future?</label>
                                        <textarea id="inFuture" name="inFuture" class="form-control" style="resize: none; " rows="4"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="feelUnbanned">Why do you feel you should be unbanned?</label>
                                        <textarea id="feelUnbanned" name="feelUnbanned" class="form-control" style="resize: none; " rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="tab4">
                              <h3 class="form-wizard-congrats">Alrighty pal!</h3>
                              <div class="alert alert-success m-t-sm m-b-lg" role="alert">
                                  You have finished the ban appeal process, you can go back and review your answers. Once you are ready click the submit button below!
                              </div>
                              <a href="#" class="btn btn-default" style="margin-bottom: 20px;">Submit Appeal</a>
                          </div>
                          <ul class="pager wizard">
                              <li class="previous disabled"><a href="#" class="btn btn-default">Previous</a></li>
                              <li class="next"><a href="#" class="btn btn-default">Next</a></li>
                          </ul>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<script src="../assets/js/pages/form-wizard.js"></script>
