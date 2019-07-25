<!DOCTYPE html>
<?php
include("scripts/ranks.php");
session_start();
if (!isset($_SESSION['apply']['ign'])) {
  header("Location: https://imaginears.club/hub/apply.php");
  exit;
} else {
  $ign = $_SESSION['apply']['ign'];
  $uuid = $_SESSION['apply']['uuid'];
  $token = $_SESSION['apply']['token'];
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'A9l0objZudcmslq9!');
  define('DB_HOST', 'localhost');

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

  if (!$conn) {
      die('Could not connect: ' .mysqli_error($conn));
  }
  $userData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `server`.`player_data` WHERE uuid = '$uuid'"));
  $rank = $userData['rank'];
  $prettyrank = prettyRank($rank);
}
 ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="ImaginearsClub Appeal">
        <meta name="keywords" content="imaginearsclub,dashboard">
        <meta name="author" content="gatario">
        <title>ImaginearsClub - The Hub</title>

        <link href="https://fonts.googleapis.com/css?family=Gudea:400,700" rel="stylesheet">
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet">
        <link href="../assets/plugins/uniform/css/default.css" rel="stylesheet">
        <link href="../assets/plugins/toastr/toastr.min.css" rel="stylesheet">
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>
        <link href="../assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet">

        <link href="../assets/css/flatifytheme.min.css" rel="stylesheet">
        <link href="../assets/css/custom.css" rel="stylesheet">

    </head>
    <body>

        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar">
                <a class="logo-box web-page" href="Applications.New"><img src="https://imaginears.club/wp-content/uploads/2018/07/logoexexsmallwhite.png"></a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                            <li>
                                <a href="Applications.Hub" class="web-page">
                                    <i class="menu-icon fa fa-star"></i><span>Hub</span>
                                </a>
                            </li>
                            <li>
                                <a href="Applications.LogOut" class="web-page">
                                    <i class="menu-icon fa fa-ban"></i><span>Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content">

                <div class="page-header">
                    <div class="search-form">
                        <form action="#" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <div class="logo-sm">
                                    <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                                    <a href="Applications.Hub" class="web-page logo-box"><span>Imaginears</span></a>
                                </div>
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                      <h1 class="navUsername"><?php echo $prettyrank . " " . $ign ?></h1>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="https://crafatar.com/avatars/<?php echo $uuid?>" alt="" class="img-circle"></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="Applications.LogOut" class="web-page">Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="page-inner">
                    <div id="content">
                    </div>
                </div>
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->


        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/plugins/toastr/toastr.min.js"></script>
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
        <script src="../assets/plugins/chartjs/chart.min.js"></script>
        <script src="../assets/plugins/pace/pace.min.js"></script>
        <script src="../assets/js/flatifytheme.min.js"></script>
        <script src="../assets/js/pages/dashboard.js"></script>
        <script scr="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
        <script type="text/javascript" src="URLRoutingAppeal.js"></script>
        <script>
          urlRoute
            .folderUrl('/hub/apply')
            .setBaseUrl('https://imaginears.club/hub/apply/')
            .checkCurrent('https://imaginears.club/hub/apply/');
        </script>
    </body>
</html>
