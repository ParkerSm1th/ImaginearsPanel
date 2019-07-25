<!DOCTYPE html>
<?php
session_start();
include("scripts/ranks.php");
if (!isset($_SESSION['ign'])) {
  if (!isset($_SESSION['appeal']['uuid'])) {
    header("Location: https://imaginears.club/hub");
    exit;
  }
} else {
  $ign = $_SESSION['ign'];
  $rank = $_SESSION['rank'];
  $uuid = $_SESSION['uuid'];
  $prettyrank = prettyRank($rank);
}
 ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="phantom-themes">
        <title>ImaginearsClub - The Hub</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">



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
                <a class="logo-box web-page" href="Hub.Dashboard"><img src="https://imaginears.club/wp-content/uploads/2018/07/logoexexsmallwhite.png"></a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                          <?php if ($rank >= 0) {
                            ?>
                            <li class="active-page">
                                <a href="Hub.Dashboard" class="web-page">
                                    <i class="menu-icon fa fa-home"></i><span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fas fa-archway"></i><span>Hub</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="Updates.Home" class="web-page">Updates</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fas fa-user"></i><span>Me</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="Me.Transactions" class="web-page">All Transactions</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fas fa-scroll"></i><span>Applications</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="Applications.Home" class="web-page">My Applications</a></li>
                                </ul>
                            </li>
                          <?php }
                          if ($rank >= 9) {
                            ?>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fas fa-id-badge"></i><span>Staff</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="Staff.Home" class="web-page">Home</a></li>
                                    <li><a href="Staff.Home" class="web-page">Warnings</a></li>
                                    <li><a href="Staff.Home" class="web-page">Projects</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-address-book"></i><span>Players</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="Players.List" class="web-page">Player List</a></li>
                                    <li><a href="Players.Economy" class="web-page">Economy</a></li>
                                    <li><a href="Players.Rides" class="web-page">Ride Counts</a></li>
                                    <li><a href="Players.Autographs" class="web-page">Autographs</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-briefcase"></i><span>Punishments</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="Punishments.Search" class="web-page">Search Player</a></li>
                                    <li><a href="Punishments.Bans" class="web-page">Bans</a></li>
                                    <li><a href="Punishments.Kicks" class="web-page">Kicks</a></li>
                                    <li><a href="Punishments.Mutes" class="web-page">Mutes</a></li>
                                    <li><a href="Punishments.Warnings" class="web-page">Warnings</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-eye"></i><span>Cast Member</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="CM.Warnings" class="web-page">Warnings</a></li>
                                    <li><a href="CM.Projects" class="web-page">Assigned Projects</a></li>
                                    <li><a href="CM.Handbook" class="web-page">Handbook</a></li>
                                    <li><a href="CM.Rules" class="web-page">Rules</a></li>
                                    <li><a href="CM.PostAway" class="web-page">Post Away</a></li>
                                </ul>
                            </li>
                            <?php
                          }
                          ?>
                          <?php if ($rank >= 9.5) {
                            ?>
                          <li>
                              <a href="javascript:void(0)">
                                  <i class="menu-icon fa fa-gavel"></i><span>Imagineers</span><i class="accordion-icon fa fa-angle-left"></i>
                              </a>
                              <ul class="sub-menu">
                                  <li><a href="Imag.Tools" class="web-page">Tools</a></li>
                                  <li><a href="Imag.Tutorials" class="web-page">Tutorials</a></li>
                                  <li><a href="Imag.Progress" class="web-page">Progress</a></li>
                              </ul>
                          </li>
                          <?php
                        }
                        ?>
                            <?php if ($rank >= 10) {
                              ?>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-binoculars"></i><span>Coordinator</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="Coord.Warn" class="web-page">Warn CM</a></li>
                                    <li><a href="Coord.PostAway" class="web-page">Post Away Requests</a></li>
                                    <li><a href="Coord.Links" class="web-page">Update Links</a></li>
                                    <li><a href="Coord.Broadcast" class="web-page">Broadcast Message</a></li>
                                </ul>
                            </li>
                            <?php
                          }
                          ?>
                            <?php if ($rank >= 11) {
                              ?>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-key"></i><span>Manager</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="Mgmt.Warn" class="web-page">Warn Coordinator</a></li>
                                    <li><a href="Mgmt.Applications" class="web-page">Applications</a></li>
                                    <li><a href="Mgmt.ArchivedApps" class="web-page">Archived Applications</a></li>
                                    <li><a href="Mgmt.Pins" class="web-page">Manage Pins</a></li>
                                    <li><a href="Mgmt.Discord" class="web-page">Discord Management</a></li>
                                    <li><a href="Mgmt.Updates" class="web-page">Manage Updates</a></li>
                                </ul>
                            </li>
                              <?php
                            }
                            ?>
                            <?php if ($rank >= 12) {
                              ?>
                              <li>
                                  <a href="javascript:void(0)">
                                      <i class="menu-icon fa fa-code"></i><span>Developer</span><i class="accordion-icon fa fa-angle-left"></i>
                                  </a>
                                  <ul class="sub-menu">
                                      <li><a href="Dev.Sessions" class="web-page">Manage Sessions</a></li>
                                      <li><a href="https://parkersmith.canny.io" target="_blank">Canny</a></li>
                                  </ul>
                              </li>
                              <?php
                            }
                            ?>
                            <li class="menu-divider"></li>
                            <li>
                                <a href="User.LogOut" class="web-page">
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
                                    <a href="Hub.Dashboard" class="web-page logo-box"><span>Imaginears</span></a>
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
                                            <li><a href="User.Settions" class="web-page">Account Settings</a></li>
                                            <li><a href="User.LogOut" class="web-page">Log Out</a></li>
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

        <div class="modal fade profileModal" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-md">
                <div class="modal-content" id="profileModalContent">
                    <div class="modal-header">
                        <img src="#" alt="" class="profileImg">
                        <h4 class="modal-title" id="mySmallModalLabel"><i class="fas fa-circle-notch fa-spin"></i></h4>
                    </div>
                    <div class="modal-body">
                        <button type="button" class="btn btn-info profileButton" data-dismiss="modal">View Profile</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/plugins/toastr/toastr.min.js"></script>
        <script src="../assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
        <script type="text/javascript" src="URLRouting.js"></script>
        <!-- Download Canny SDK -->
        

        <!-- Use the Canny SDK to identify the current user of your website -->

        <script>
          setInterval(function(){
            $.ajax({
                url: 'scripts/checkLoggedIn.php',
                type:'POST',
                success: function(msg)
                {
                  if (msg == 0) {
                    window.location.href = "https://imaginears.club/hub";
                  }
                }
            });
          },5000);
          urlRoute
            .folderUrl('/hub/panel')
            .setBaseUrl('https://imaginears.club/hub/panel/')
            .checkCurrent('https://imaginears.club/hub/panel/');
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
            // Prevent jQuery UI dialog from blocking focusin
            $(document).on('focusin', function(e) {
              if ($(e.target).closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
                e.stopImmediatePropagation();
              }
            });

            function runCodeInit() {
              setTimeout(function () {
                tinymce.init({
                  selector:'#postB',
                  plugins: "image link table",
                  body_class: 'overridecolor',
                  content_css: '../assets/css/custom.css'
                });
                tinymce.init({
                  selector: '#title',
                  inline: true
                });
                tinymce.init({
                  selector: '#desc',
                  inline: true
                });
                console.log("Run!")
              }, 3000);
            }
        </script>
    </body>
</html>
