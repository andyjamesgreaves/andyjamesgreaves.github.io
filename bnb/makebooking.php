<?php
include ('session.php');
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Make a Booking</title>
  <meta name="description" content="Ongaonga Bed & Breakfast" />
  <meta name="keywords" content="Bed & Breakfast" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" /> 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="javascript/makeBooking.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script> src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--AJAX-->
  <script>
    $(document).ready(function() {
        $("#bookingsform").submit(function(e) {
            e.preventDefault();
            $.ajax( {
            url: "insertbooking.php",
            method: "post",
            data: $("form").serialize(),
            dataType: "text",
            success: function(strMessage) {
              alert("Your booking has been successful.");
              return resetForm();
            }
          });
        });
    });
  </script>
</head>
<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><span class="logo_colour">Ongaonga Bed & Breakfast</span></h1>
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
        <p>Logged in : <?php echo $login_session; ?></p>
      </div>
    </div>
    <div id="site_content">
    <div class="sidebar">
        <h3>Administration</h3>
        <a href='currentbookings.php' style="color: blue; font-size: 1.2em;">Current Bookings</a>
    </div>            
      <div id="content">      
          <h1><b>Make a Booking<b></h1>
          <h2><a href='roomavailability.php' style="color: blue;">[Search Room Availability]</a></h2>
          <!--<iframe name="emptyiframe" style="display: none;"></iframe>-->
          <form id="bookingsform" name="bookingsform" onsubmit="return checkBookingForm()" onsubmit="checkBookingForm()" onreset="return resetForm()">
            <p>
              <label for="roomname">Room (Name, Type, Beds): </label>
              <select type="text" id="roomname" name="roomname">
                <option value="Kellie">Kellie, S, 5</option>
                <option value="Herman">Herman, D, 5</option>
                <option value="Scarlette">Scarlette, D, 2</option>
                <option value="Jelani">Jelani, S, 2</option>
                <option value="Sonya">Sonya, S, 5</option>
                <option value="Miranda">Miranda, S, 4</option>
                <option value="Helen">Helen, S, 2</option>
                <option value="Octavia">Octavia, D, 3</option>
                <option value="Gretchen">Gretchen, D, 3</option>
                <option value="Bernard">Bernard, S, 5</option>
                <option value="Dacey">Dacey, D, 2</option>
                <option value="Preston">Preston, D, 2</option>
                <option value="Dane">Dane, S, 4</option>
                <option value="Cole">Cole, S, 1</option>
						  </select><br>
            </p>
            <p>Checkin Date: <input type="text" name="checkinDate" id="checkinDate" placeholder="dd-mm-yyyy" required></p>
            <p>Checkout Date: <input type="text" name="checkoutDate" id="checkoutDate" placeholder="dd-mm-yyyy" required></p>
            <p>First Name: <input type="text" id="firstname" name="firstname" minlength="3" maxlength="20" required></p>
            <p>Last Name: <input type="text" id="lastname" name="lastname" minlength="3" maxlength="30" required></p>
            <p>Contact Number: <input type="number" id="contactnumber" name="contactnumber" placeholder="(##) ### ####" minlength="9" maxlength="11" required></p>
            <p>
            <label for="bookingextras">Booking Extras:</label>
					  <textarea wrap="off" placeholder="nothing" id="bookingextras" name="bookingextras" type="text" rows="8" cols="40"></textarea><br><br>
            </p>        
            <input id="submit" type="submit" name="submit" value=" Submit ">&nbsp;&nbsp;
            <input id="reset" type="reset" name="reset" value=" Cancel ">
          </form>
          <br><br>    
        </div>
      </div>     
    </div> <!--content-->    
    <div id="footer">
      Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
    </div>
  </div>
</body>
<html>

<script>
  $(document).ready(function(){
    $(function(){
      $("#checkinDate").datepicker({dateFormat: 'yy-mm-dd', minDate: 0,});
      $("#checkoutDate").datepicker({dateFormat: 'yy-mm-dd', minDate: 0,});
    });
  });
</script>
