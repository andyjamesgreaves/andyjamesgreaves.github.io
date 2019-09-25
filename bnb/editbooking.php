<!DOCTYPE HTML>
<html>
<head>
  <title>Edit Booking</title>
  <meta name="description" content="Ongaonga Bed & Breakfast" />
  <meta name="keywords" content="Bed & Breakfast" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <script type="text/javascript" src="javascript/editBooking.js"></script>
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" /> 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <!--AJAX-->
  <script>
    $(document).ready(function() {
      $("#updatebookingform").submit(function(e) {
          e.preventDefault();
          $.ajax( {
          url: "editbookingDB.php",
          method: "post",
          data: $("form").serialize(),
          dataType: "text",
          success: function(strMessage) {
            alert("Your booking has been successfully updated.");
          } //success
        }); //$.ajax( 
      }); //$("#updatebookingform").submit(function(e)
    }); //$(document).ready(function()
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
      <div id="content">
      <?php
        include_once "config.php"; //load in any variables
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
        $row = mysqli_fetch_assoc($result);        

        session_start();
        $_SESSION['id'] = $id;
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $roomname = $row['roomname'];
        $checkinDate = $row['checkinDate'];
        $checkoutDate = $row['checkoutDate'];        
        $contactnumber = $row['contactnumber'];
        $bookingextras = $row['bookingextras'];
        $roomreview = $row['roomreview']; 
        
        ?>
        <h1><b>Edit Booking<b></h1>
        <h2><a href='currentbookings.php' style="color: blue;">[Return to Bookings listing]</a>&nbsp;&nbsp;<a href="makebooking.php" style="color: blue;">[Return to the make Booking page]</a></h2>
        <p>
        <form id="updatebookingform" onsubmit="return editBooking()" onreset="return resetForm()" method="POST">
        <h4><b>Booking ID: #<?php echo $id."<br>"; ?><b></h4><br>
          <p>First name: <input type="text" id="firstname" name="firstname" maxlength="20" value="<?php echo $firstname; ?>"></p>
          <p>Last name: <input type="text" id="lastname" name="lastname" maxlength="30" value="<?php echo $lastname; ?>"></p>
          <p>            
          <label>Room (Name, Type, Beds): </label>
          <select id="roomname" name="roomname">">
            <option value="<?php echo $roomname ?>"><?php echo $roomname ?></option>
            <option value="Dacey">Dacey, D, 2</option>
            <option value="Gretchen">Gretchen, D, 3</option>
            <option value="Herman">Herman, D, 5</option>
            <option value="Octavia">Octavia, D, 3</option>
            <option value="Preston">Preston, D, 2</option>
            <option value="Scarlette">Scarlette, D, 2</option>
            <option value="Cole">Cole, S, 1</option>
            <option value="Bernard">Bernard, S, 5</option>
            <option value="Dane">Dane, S, 4</option>
            <option value="Helen">Helen, S, 2</option>
            <option value="Jelanie">Jelanie, S, 2</option>
            <option value="Kellie">Kellie, S, 5</option>
            <option value="Miranda">Miranda, S, 4</option>
            <option value="Sonya">Sonya, S, 5</option>
          </select><br>
          </p>          
          <p>Checkin Date: <input type="text" id="checkinDate" name="checkinDate" value="<?php echo $checkinDate; ?>"></p>
          <p>Checkout Date: <input type="text" id="checkoutDate" name="checkoutDate" value="<?php echo $checkoutDate; ?>"></p>
          <p>Contact Number: <input type="number" id="contactnumber" name="contactnumber" minlength="9" maxlength="10" value="<?php echo $contactnumber; ?>"></p>
          <label for="bookingExtras">Booking Extras:</label>            
          <textarea wrap="off" id="bookingextras" name="bookingextras" type="text" rows="8" cols="40" value="<?php echo $bookingextras; ?>"><?php echo $bookingextras ?></textarea><br><br>
          <br>
          <label for="roomreview">Room Review:</label> 
          <textarea wrap="off"  id="roomreview" name="roomreview" type="text" rows="8" cols="40" value="<?php echo $roomreview; ?>"><?php echo $roomreview ?></textarea><br><br>
          <br>        
          <input id="submit" type="submit" name="submit" value=" Submit ">&nbsp;&nbsp;
          <input id="submit" type="reset" name="reset" value=" Cancel ">;
        </form>
        <br><br>
        </p> 
      </div>            
    </div>
    <div id="footer">
      Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
    </div>
  </div>
  
</body>
</html>

<script>
  $(document).ready(function(){
    $(function(){
      $("#checkinDate").datepicker({dateFormat: 'yy-mm-dd', minDate: 0,});
      $("#checkoutDate").datepicker({dateFormat: 'yy-mm-dd', minDate: 0,});
    });
  });
</script>
