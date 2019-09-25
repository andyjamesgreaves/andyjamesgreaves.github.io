<?php
include ('session.php');
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Ongaonga Bed & Breakfast</title>
  <meta name="description" content="Ongaonga Bed & Breakfast" />
  <meta name="keywords" content="Bed & Breakfast" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>
<body>
    <?php
      date_default_timezone_set('NZ');
    //checkUser();
    ?>
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
          <li class="selected"><a style="color: #FFF; background: transparent url(style/transparent_light.png) repeat;" href="index.php">Home</a></li>
          <li><a href="listrooms.php">Rooms</a></li>
          <li><a href="makebooking.php">Bookings</a></li>
          <li><a href="registercustomer.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <h3>Latest News</h3>
        <h4>New Web applicaiton Launched</h4>
        
        <h3>Useful Links</h3>
        <ul>
          <li><a href="https://openpolytechnic.ac.nz">Open Polytechnic</a></li>
          <li><a href="https://openpolytechnic.iqualify.com/local-login">iQualify</a></li>
          <li><a href="#">no link </a></li>
          <li><a href="/bnb/privacy.php">Privacy statement</a></li>
        </ul>
        <h3>Search</h3>
        <form method="post" action="#" id="search_form">
          <p>
            <input class="search" type="text" name="search_field" value="Enter keywords....." />
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
          </p>
        </form>
      </div>
      <div id="content">
        <h1>Hello <?php echo $loggedin; ?></h1>
        <h1>Welcome to the Ongaonga Bed & Breakfast</h1>
        <p>The retired couple Mr and Mrs Smith have a large beautiful homestead in the Ongaonga Region. We live by ourselves have this beautifuly large heritage home which we have turned into a Bed & Breakfast (B&B). 
           Our home is close to Napier, Waipukurau and Tikokino....</p>      
      </div>           
    </div>
    <div id="footer">
      Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
    </div>
  </div>
</body>
</html>
