<!DOCTYPE HTML>
<html>
<head>
  <title>View Room</title>
  <meta name="description" content="Ongaonga Bed & Breakfast" />
  <meta name="keywords" content="Bed & Breakfast" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
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
          <li class="selected"><a href="index.php">Home</a></li>
          <li><a style="color: #FFF; background: transparent url(style/transparent_light.png) repeat;" href="listrooms.php">Rooms</a></li>
          <li><a href="currentbookings.php">Bookings</a></li>
          <li><a href="registercustomer.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">      
      <div id="content" style="font-size: 1em;">
        <?php
        include "config.php"; //load in any variables
        $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

        //insert DB code from here onwards
        //check if the connection was good
        if (mysqli_connect_errno()) {
            echo "Error: Unable to connect to MySQL. ".mysqli_connect_error() ;
            exit; //stop processing the page further
        }

        //do some simple validation to check if id exists
        $id = $_GET['id'];
        if (empty($id) or !is_numeric($id)) {
        echo "<h2>Invalid Room ID</h2>"; //simple error feedback
        exit;
        } 

        $query = 'SELECT * FROM room WHERE roomid='.$id;
        $result = mysqli_query($DBC,$query);
        $rowcount = mysqli_num_rows($result); 
        ?>
        <h1>Room Details View</h1>
        <h2><a href='listrooms.php' style="color: blue;">[Return to the Room listing]</a></h2>
        <?php        

        //makes sure we have the Room
        if ($rowcount > 0) {  
        echo "<fieldset><legend><font size = '4em'>Room detail #$id</legend><dl>"; 
        $row = mysqli_fetch_assoc($result);
        echo "<br><dt><font size = '3em'>&nbsp;Room name:</dt><dd>"."&nbsp;&nbsp;".$row['roomname']."</dd><br>".PHP_EOL;
        echo "<dt>&nbsp;Description:</dt><dd>"."&nbsp;&nbsp;".$row['description']."</dd><br>".PHP_EOL;
        echo "<dt>&nbsp;Room type:</dt><dd>"."&nbsp;&nbsp;".$row['roomtype']."</dd><br>".PHP_EOL;
        echo "<dt>&nbsp;Beds:</dt><dd>"."&nbsp;&nbsp;".$row['beds']."</dd><br>".PHP_EOL; 
        echo '</dl></fieldset>'.PHP_EOL;  
        } else echo "<h2>No Room found!</h2>"; //suitable feedback

        mysqli_free_result($result); //free any memory used by the query
        mysqli_close($DBC); //close the connection once done
        ?> 
        <br>     
      </div> <!--content-->    
    </div> <!--site-content-->
    <div id="footer">
      Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
    </div>
  </div>
</body>
</html>
  