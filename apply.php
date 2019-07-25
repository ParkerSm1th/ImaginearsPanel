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

        <title>Imaginears Club - Apply</title>

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
                          <a href="appeal.php" class="logo-name">Application Center</a>
                          <p class="m-t-md">You must run the command <span style="font-weight: 600;">/apply</span> in-game to get your application login link.</p>
                          <div id="errorFieldOne" class="alert alert-danger" style="display: none" role="alert">
                            Invalid login token! Try running /apply in-game!
                          </div>
                          <div id="successField" class="alert alert-success" style="display: none" role="alert">
                            Your token is valid! Logging into application center!
                          </div>
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
        function testLogin(token) {
          $.ajax({
              url: 'apply/scripts/login.php',
              type:'POST',
              data:"token=" + token,
              success: function(msg)
              {
                  if (msg == 0) {
                      $("#errorFieldOne").show();
                  } else if (msg == 1) {
                      $("#successField").show();
                      setTimeout(function () {
                         window.location.href = "https://imaginears.club/hub/apply/Applications.Hub";
                      }, 2000);
                  }
              }
          });
        }

        	</script>
    </body>
    <?php
    if (isset($_GET['login'])) {
      if ($_GET['login'] == 1) {
        ?>
          <script>testLogin('<?php echo $_GET['token']?>');</script>
        <?php
      }
    }
    ?>
</html>
