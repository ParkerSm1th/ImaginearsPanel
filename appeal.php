<!DOCTYPE html>
<?php

 ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="ImaginearsClub Appeal Hub">
        <meta name="keywords" content="cmhub,dashboard">
        <meta name="author" content="imaginears">

        <title>Imaginears Club - Appeal</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Gudea:400,700" rel="stylesheet">
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet">
        <link href="assets/plugins/uniform/css/default.css" rel="stylesheet">
        <link href="assets/css/flatifytheme.min.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">
    </head>
    <body>

        <!-- Page Container -->
        <div class="page-container login-page">

            <!-- Page Content -->
            <div class="page-content">

                <!-- Page Inner -->
                <div class="page-inner">
                <div id="main-wrapper">
                  <div class="panel panel-darkblue login-box" style="margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);">
                      <div class="panel-body">
                          <a href="appeal.php" class="logo-name">Ban Appeal</a>
                          <p class="m-t-md">Please enter your <span style="font-weight: 600;">Punishment ID</span> from the ban message when attempting to login to the server</p>
                          <div id="errorFieldOne" class="alert alert-danger" style="display: none" role="alert">
                            Please fill in all inputs!
                          </div>
                          <div id="errorFieldTwo" class="alert alert-danger" style="display: none" role="alert">
                            Incorrect login details!
                          </div>
                          <div id="errorFieldThree" class="alert alert-danger" style="display: none" role="alert">
                            You have already appealed this ban! You will be contacted when your appeal has been viewed!
                          </div>
                          <div id="successField" class="alert alert-success" style="display: none" role="alert">
                            Your punishment id has been confirmed Logging you in...
                          </div>
                          <form class="m-t-md">
                              <div class="form-group">
                                  <input type="text" name="pin" id="pin" class="password form-control" placeholder="Punishment ID">
                              </div>
                              <button type="submit" class="submitt btn btn-success btn-block">Login</button>
                          </form>
                          <p class="text-center m-t-xs text-sm login-footer">2019 &copy; ImaginearsClub</p>
                      </div>
                  </div>
                </div><!-- Main Wrapper -->
                </div><!-- /Page Inner -->
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->


        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="assets/plugins/pace/pace.min.js"></script>
        <script src="assets/js/flatifytheme.js"></script>
        <script>
        $('.submitt').click(function() {
                    event.preventDefault();
                    $("#errorFieldOne").hide();
                    $("#errorFieldTwo").hide();
                    $("#errorFieldThree").hide();
                    $("#successField").hide();
                    console.log($("#pin").val());
                    var errorrequest = false;
                    if ($("#pin").val().length == 0) {
                        errorrequest = true
                    }
                    if (errorrequest) {
                        $("#errorFieldOne").show();
                        return ""
                    } else {
                      $.ajax({
                          url: 'panel/scripts/appeallogin.php',
                          type:'POST',
                          data:"pin=" + $("#pin").val(),
                          success: function(msg)
                          {
                              if (msg == 0) {
                                  $("#errorFieldTwo").show();
                              } else if (msg == 0.5) {
                                  $("#errorFieldThree").show();
                              } else if (msg == 1) {
                                  $("#successField").show();
                                  setTimeout(function () {
                                     window.location.href = "https://imaginears.club/hub/appeal/Punishments.Appeal";
                                  }, 2000);
                              }
                          }
                      });
                    }
                  });

        	</script>
    </body>
    <?php
    if (isset($_GET['quicklogin'])) {
      if ($_GET['quicklogin'] == 1) {
        ?>
          <script>testLogin('<?php echo $_GET['pin']?>');</script>
        <?php
      }
    }
    ?>
</html>
