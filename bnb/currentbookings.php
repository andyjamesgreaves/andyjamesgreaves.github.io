<?php
include ('session.php');
if ($login_session != "admin"){ 
  header('Location: makebooking.php');
}
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Booking Listing</title>
  <meta name="description" content="Ongaonga Bed & Breakfast" />
  <meta name="keywords" content="Bed & Breakfast" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
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
          <li><a style="color: #FFF; background: transparent url(style/transparent_light.png) repeat;" href="makebooking.php">Bookings</a></li>
          <li><a href="registercustomer.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
  <div id="site_content">
    <?php
    //include "config.php"; //load in any variables
    //$DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

    //check if the connection was good
    if (mysqli_connect_errno()) {
        echo "Error: Unable to connect to MySQL. ".mysqli_connect_error() ;
        exit; //stop processing the page further
    }

    //prepare a query and send it to the server
    $query = 'SELECT * FROM bookings ORDER BY checkinDate';
    $result = mysqli_query($DBC,$query);
    $rowcount = mysqli_num_rows($result); 
    ?>
    <h1><b>Current Bookings Listing<b></h1>
    <h2>Logged in as: <?php echo $login_session ?></h2>
    <h2><a href='makebooking.php' style="color: blue;">[Make a Booking]</a>&nbsp;&nbsp;<a href='roomavailability.php' style="color: blue;">[Search Room Availability]</a></h2>
    <table border="1">
    <tr><th>Booking (room, dates)</th><th>Customer</th><th>Action</th></tr>
    <?php
    //makes sure we have bookings
    if ($rowcount > 0) {  
        while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['bookingID'];	
        echo '<tr><td>'.$row['roomname'].', '.$row['checkinDate'].', '.$row['checkoutDate'].'</td><td>'.$row['lastname'].', '.$row['firstname'].'</td>';
        echo '<td><a href="viewbooking.php? id='.$id.'">[view] </a>';
        echo '<a href="editbooking.php? id='.$id.'">[edit] </a>';
        echo '<a href="editaddreview.php? id='.$id.'">[manage reviews] </a>';
        echo '<a href="deletebooking.php?id='.$id.'">[delete]</a></td>';
        echo '</tr>'.PHP_EOL;
      }
    } else echo "<h2>No bookings found!</h2>"; //suitable feedback

    mysqli_free_result($result); //free any memory used by the query
    mysqli_close($DBC); //close the connection once done
    ?>
  </table>
</div>
<div id="footer">
Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
</div>
</body>
</html>