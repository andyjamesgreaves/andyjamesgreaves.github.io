<?php
//include ('loginuser.php');

//if(isset($_SESSION['login_user'])) {
//    header("location: profile.php"); //redirect to profile page
//}
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Login</title>
  <meta name="description" content="Ongaonga Bed & Breakfast" />
  <meta name="keywords" content="Bed & Breakfast" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <script type="text/javascript" src="javascript/customerLogin.js"></script>
  <script> src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!--AJAX
  <script>
    $(document).ready(function() {
        $("#loginform").submit(function(e) {
            e.preventDefault();
            //sessions.php calls the PHP file
            
            url: "sessions.php",
            method: "post",
            data: $("form").serialize(),
            dataType: "text",
            alert ("username: " + document.getElementById('username').value + "\n" +
              "password: " + document.getElementById('password').value);
            success: function(strMessage) {
              alert("Your Login has been successful.");
              document.getElementById('loginform').reset();
              $("#loginform")[0].reset();
            }
          });
        });
    });
  </script>-->

</head>
<body>
    <div id="main">
        <div id="header">
        <div id="logo">
            <div id="logo_text">
            <h1><span class="logo_colour">Ongaonga Bed & Breakfast</span></a></h1>
            <h2>Make yourself at home is our slogan. We offer some of the best beds on the east coast. Sleep well and rest well.</h2>
            </div>
        </div>
        <div id="menubar">
            <ul id="menu">
            <li class="selected"><a href="index.php">Home</a></li>
            <li><a href="listrooms.php">Rooms</a></li>
            <li><a href="makebooking.php">Bookings</a></li>
            <li><a href="registercustomer.php">Register</a></li>
            <li><a style="color: #FFF; background: transparent url(style/transparent_light.png) repeat;"  href="login.php">Login</a></li>
            </ul>
        </div>
        <div id="site_content">            
            <div id="content">
                <h1><b>Customer Login<b></h1>
                <form id="loginform" method="POST" action="loginuser.php">
                    <p>
                    <label for="username">Username: </label>
                    <input type="text" id="username" name="username" onfocus="emptyElement('status') minlength="3" maxlength="20" required>
                    </p>
                    <p>
                    <label for="password">Password: </label>
                    <input type="password" id="password" name="password"  onfocus="emptyElement('status') "minlength="4" maxlength="30" required>
                    </p><br>         
                    <input id="submit" type="submit" name="submit" value=" Login ">&nbsp;&nbsp;
                    <input id="logout" type="reset" name="reset" value=" Logout "><br><br>
                    <p id="status"></p><br>
                    <p>Don't have an account? <a href="registercustomer.php">Sign up now</a>.</p>
                    <a href="#">Forgot your password?</a>
                </form>               
            </div><!--content-->
        </div><!--site-content-->
        <div id="footer">
        Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
        </div><!--footer-->
    </div><!--main-->
</body>
</html>
