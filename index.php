<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['uuid'])) {
  header("Location: https://imaginears.club/hub/panel/Staff.Dashboard");
}
 ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CM Hub">
        <meta name="keywords" content="cmhub,dashboard">
        <meta name="author" content="imaginears">

        <title>Imaginears Club - The Hub</title>

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
                <div id="main-wrapper"><div class="row">
                        <div class="col-md-3 col-login-box-alt">
                            <div class="panel panel-darkblue login-box">
                                <div class="panel-body">
                                    <a href="index.php" class="logo-name">The Hub</a>
                                    <p class="m-t-md">Please use /pin to get your pin</p>
                                    <div id="errorFieldOne" class="alert alert-danger" style="display: none" role="alert">
                                      Please fill in all inputs!
                                    </div>
                                    <div id="errorFieldTwo" class="alert alert-danger" style="display: none" role="alert">
                                      Incorrect login details!
                                    </div>
                                    <div id="successField" class="alert alert-success" style="display: none" role="alert">
                                      Your pin has been confirmed Logging you in...
                                    </div>
                                    <div id="successField2" class="alert alert-success" style="display: none" role="alert">
                                      Your discord has been confirmed Logging you in...
                                    </div>
                                    <form class="m-t-md">
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="pin" id="pin" class="password form-control" placeholder="Pin">
                                        </div>
                                        <button type="submit" class="submitt btn btn-success btn-block">Login</button>


                                    </form>
                                    <br>
                                    <a id="discordL" href="https://discordapp.com/api/oauth2/authorize?client_id=575703300800905216&redirect_uri=https%3A%2F%2Fimaginears.club%2Fhub%2F&response_type=token&scope=identify%20email%20connections"><button class="submit btn btn-info btn-block">Login with discord</button></a>
                                    <p class="text-center m-t-xs text-sm login-footer">2019 &copy; ImaginearsClub</p>
                                </div>
                            </div>
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


        function generateRandomString() {
    			const rand = Math.floor(Math.random() * 10);
    			let randStr = '';
    			for (let i = 0; i < 20 + rand; i++) {
    				randStr += String.fromCharCode(33 + Math.floor(Math.random() * 94));
    			}
    			return randStr;
    		}
    		window.onload = () => {
    			const match = window.location.hash.match(/token_type=(.+?)&access_token=(.+?)&expires_in=(.+?)&scope=(.+?)&state=(.+?)(?:&|$)/);
    			if (match) {
    				const [, token_type, access_token, expiresIn, scole, urlState] = match;
    				const stateParameter = localStorage.getItem('stateParameter');
    				if (btoa(stateParameter) !== decodeURIComponent(urlState)) {
    					console.log('You may have been clickjacked!');
    					return;
    				}
    				fetch('https://discordapp.com/api/users/@me', {
    					headers: {
    						authorization: `${token_type} ${access_token}`
    					}
    				})
    					.then(res => res.json())
    					.then(response => {
    						console.log(response);
    						const { username, discriminator, id } = response;
    						console.log(` ${username}#${discriminator} - ${id}`);
                testDiscordLogin(id, username, discriminator);
    					})
    					.catch(console.error);
    			} else {
    				const randStr = generateRandomString();
    				localStorage.setItem('stateParameter', randStr);
    				document.getElementById('discordL').href += `&state=${btoa(randStr)}`;
    			}
    		}

        function testDiscordLogin(id, username, disc) {
          console.log("Logging in..");
          $.ajax({
              url: 'panel/scripts/discordLogin.php',
              type:'POST',
              data:"id=" + id + "&username=" + username + "&disc=" + disc,
              success: function(msg)
              {
                  console.log(msg);
                  if (msg == 0) {
                      $("#errorFieldTwo").show();
                      window.location.hash = "";
                  } else if (msg == 1) {
                      $("#successField2").show();
                      var xhttp = new XMLHttpRequest();
                      $.getJSON('https://json.geoiplookup.io/api?callback=?', function(data) {
                        xhttp.open("POST", "https://api.imaginears.club:2053/api/imaginears/newLogin/" + id + "/" + data.ip + "/c7738549-7284-43cb-81c5-3a131b564a4d", true);
                        xhttp.send();
                      });
                      setTimeout(function () {
                         window.location.href = "https://imaginears.club/hub/panel/Hub.Dashboard";
                      }, 2000);

                  }
              }
          });
        }
        function testLogin(name, pin) {
          $.ajax({
              url: 'panel/scripts/login.php',
              type:'POST',
              data:"username=" + name + "&pin=" + pin,
              success: function(msg)
              {
                  if (msg == 0) {
                      $("#errorFieldTwo").show();
                  } else if (msg == 1) {
                      $("#successField").show();
                      setTimeout(function () {
                         window.location.href = "https://imaginears.club/hub/panel/Hub.Dashboard";
                      }, 2000);
                  }
              }
          });
        }

        $('.submitt').click(function() {
                    event.preventDefault();
                    $("#errorFieldOne").hide();
                    $("#errorFieldTwo").hide();
                    $("#successField").hide();
                    console.log($("#username").val());
                    console.log($("#pin").val());
                    var errorrequest = false;
                    if ($("#username").val().length == 0) {
                        errorrequest = true
                    }
                    if ($("#pin").val().length == 0) {
                        errorrequest = true
                    }
                    if (errorrequest) {
                        $("#errorFieldOne").show();
                        return ""
                    } else {
                      $.ajax({
                          url: 'panel/scripts/login.php',
                          type:'POST',
                          data:"username=" + $("#username").val() + "&pin=" + $("#pin").val(),
                          success: function(msg)
                          {
                              if (msg == 0) {
                                  $("#errorFieldTwo").show();
                              } else if (msg == 1) {
                                  $("#successField").show();
                                  setTimeout(function () {
                                     window.location.href = "https://imaginears.club/hub/panel/Hub.Dashboard";
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
          <script>testLogin('<?php echo $_GET['username']?>', '<?php echo $_GET['pin']?>');</script>
        <?php
      }
    }
    ?>
</html>
