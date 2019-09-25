<!DOCTYPE HTML>
<html>
<head>
  <title>Edit/Add review</title>
  <meta name="description" content="Ongaonga Bed & Breakfast" />
  <meta name="keywords" content="Bed & Breakfast" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <script type="text/javascript" src="javascript/editAddRoomReview.js"></script>
</head>
<body>
    <?php
      date_default_timezone_set('NZ');
    //include "checksession.php";
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
          <li><a href="index.php">Home</a></li>
          <li><a href="listrooms.php">Rooms</a></li>
          <li><a style="color: #FFF; background: transparent url(style/transparent_light.png) repeat;" href="currentbookings.php">Bookings</a></li>
          <li><a href="registercustomer.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
        <div id="content">
        <h1>Edit/Add Room Review</h1>
        <h2><a href='currentbookings.php' style="color: blue;">[Return to the booking listing]</a></h2>
        <form id="editaddreview" onsubmit="return editAddRoomReview()" onreset="return resetForm()" method="POST" action="updateroomreview.php">
          <label for="roomreview">Room Review:</label>  
          <textarea wrap="off" placeholder="nothing" id="roomreview" name="roomreview" type="text" rows="8" cols="40"></textarea><br><br>
          <br>   
          <input id="submit" type="submit" name="delete" value=" Update ">&nbsp;&nbsp;
          <input id="submit" type="reset" name="delete" value=" Clear ">;<br>
        </form>   
      </div> <!--content-->      
    </div> <!--site-content-->
    <div id="footer">
      Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
    </div>
  </div>
</body>
</html>