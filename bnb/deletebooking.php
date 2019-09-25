<?php
include ('session.php');
if ($login_session != "admin"){ 
  header('Location: registercustomer.php');
}
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Delete Booking</title>
  <meta name="description" content="Ongaonga Bed & Breakfast" />
  <meta name="keywords" content="Bed & Breakfast" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script> src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--AJAX-->
  <script>
    $(document).ready(function() {
        //get form id
        $("#deletebooking").submit(function(e) {
            e.preventDefault();
            $.ajax( {
            url: "deletebookingDB.php",
            method: "post",
            data: $("form").serialize(),
            dataType: "text",
            success: function(strMessage) {
              alert("Your booking has been successfully deleted.");
              $("#deletebooking")[0].reset();
            }
          });
        });
    });
  </script>
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
          <li><a href="listrooms.php">Rooms</a></li>
          <li><a style="color: #FFF; background: transparent url(style/transparent_light.png) repeat;" href="makebooking.php">Bookings</a></li>
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
        echo "<h2>Invalid Booking ID</h2>"; //simple error feedback
        exit;
        } 

        //prepare a query and send it to the server
        $query = 'SELECT * FROM bookings WHERE bookingID='.$id;
        $result = mysqli_query($DBC,$query);
        $rowcount = mysqli_num_rows($result); 
        ?>
        <h1>Booking preview before deletion</h1>
        <h2><a href='currentbookings.php' style="color: blue;">[Return to the Bookings listing]</a></h2>
        <form id="deletebooking">
        <?php        

        //makes sure we have the booking
        if ($rowcount > 0) {  
        echo "<fieldset><legend><font size = '4em'>Booking detail #$id</legend><dl>"; 
        $row = mysqli_fetch_assoc($result);
        echo "<br><dt><font size = '3em'>&nbsp;Room name:</dt><dd>"."&nbsp;&nbsp;".$row['roomname']."</dd><br>".PHP_EOL;
        echo "<dt>&nbsp;Customer name:</dt><dd>"."&nbsp;&nbsp;".$row['lastname'].", ".$row['firstname']."</dd><br>".PHP_EOL;
        echo "<dt>&nbsp;Checkin Date:</dt><dd>"."&nbsp;&nbsp;".$row['checkinDate']."</dd><br>".PHP_EOL;
        echo "<dt>&nbsp;Checkout Date:</dt><dd>"."&nbsp;&nbsp;".$row['checkoutDate']."</dd><br>".PHP_EOL;
        echo "<dt>&nbsp;Contact number:</dt><dd>"."&nbsp;&nbsp;".$row['contactnumber']."</dd><br>".PHP_EOL;
        echo "<dt>&nbsp;Extras:</dt><dd>"."&nbsp;&nbsp;".$row['bookingextras']."</dd><br>".PHP_EOL;
        echo "<dt>&nbsp;Room review:</dt><dd>"."&nbsp;&nbsp;".$row['roomreview']."</dd><br>".PHP_EOL;
        echo '</dl></fieldset>'.PHP_EOL;
        session_start();
        $_SESSION['id']=$id;
        } else echo "<h2>No booking found!</h2>"; //suitable feedback
        
        mysqli_free_result($result); //free any memory used by the query
        mysqli_close($DBC); //close the connection once done
        ?> 
        <br>
          <b>Are you sure you want to delete this Booking?</b><br><br>
          <input id="submit" type="submit" name="submit" value=" Delete ">&nbsp;&nbsp;
        </form>
        <br>
      </div> <!--content-->    
    </div> <!--site-content-->
    <div id="footer">
      Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
    </div>
  </div>
</body>
</html>