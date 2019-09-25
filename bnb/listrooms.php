<!DOCTYPE HTML>
<html>
<head>
  <title>Room Listing</title>
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
          <li><a style="color: #FFF; background: transparent url(style/transparent_light.png) repeat;" href="listrooms.php">Rooms</a></li>
          <li><a href="makebooking.php">Bookings</a></li>
          <li><a href="registercustomer.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
    <div class="sidebar">
        <h3>Administration</h3>
        <a href='addroom.php' style="color: blue; font-size: 1.2em;">Add a Room</a>
    </div> 
    <?php
    include "config.php"; //load in any variables
    $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

    //check if the connection was good
    if (mysqli_connect_errno()) {
        echo "Error: Unable to connect to MySQL. ".mysqli_connect_error();
        exit; //stop processing the page further
    }

    //prepare a query and send it to the server
    $query = 'SELECT * FROM room ORDER BY roomID';
    $result = mysqli_query($DBC,$query);
    $rowcount = mysqli_num_rows($result); 
    ?>
    <h1><b>Room Listing<b></h1>
    <h2><a href='roomavailability.php' style="color: blue;">[Search Room Availability]</a></h2>
    <table border="1">
    <thead><tr><th>Room #</th><th>Room Name</th><th>Type</th><th>Beds</th><th>Action</th></tr></thead>    
    <?php
    //makes sure we have rooms
    if ($rowcount > 0) {  
        while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['roomID'];	
        echo '<tr><td>'.$row['roomID'].'</td><td>'.$row['roomname'].'</td><td>'.$row['roomtype'].'</td><td>'.$row['beds'].'</td>';
        echo '<td><a href="viewroom.php? id='.$id.'">[view] </a>';
        echo '<a href="editroom.php? id='.$id.'">[edit] </a>';
        echo '<a href="deleteroom.php? id='.$id.'">[delete]</a></td>';
        echo '</tr>'.PHP_EOL;
      }
    } else echo "<h2>No rooms found!</h2>"; //suitable feedback

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
  