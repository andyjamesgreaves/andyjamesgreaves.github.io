<!DOCTYPE HTML>
<html>
<head>
  <title>Register customer</title>
  <meta name="description" content="Ongaonga Bed & Breakfast" />
  <meta name="keywords" content="Bed & Breakfast" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!--AJAX-->
  <script>
    $(document).ready(function() {
        //get form id
        $("#registercustomer").submit(function(e) {
            e.preventDefault();
            $.ajax( {
            //insertcustomer.php calls the PHP file
            url: "insertcustomer.php",
            method: "post",
            data: $("form").serialize(),
            dataType: "text",
            success: function(strMessage) {
              alert("Your registration has been successful.");
              $("#registercustomer")[0].reset();
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
          <h1><span class="logo_colour">Ongaonga Bed & Breakfast</span></a></h1>
          <h2>Make yourself at home is our slogan. We offer some of the best beds on the east coast. Sleep well and rest well.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
        <li class="selected"><a href="index.php">Home</a></li>
        <li><a href="listrooms.php">Rooms</a></li>
        <li><a href="makebooking.php">Bookings</a></li>
        <li><a style="color: #FFF; background: transparent url(style/transparent_light.png) repeat;" href="registercustomer.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <h3>Administration</h3>
        <a href="listcustomers.php" style="color: blue; font-size: 1.2em;">Customers List Search by Lastname</a><br><br>
        <a href="viewcustomer.php" style="color: blue; font-size: 1.2em;">Customer Details View</a><br><br>
        <a href="editcustomer.php" style="color: blue; font-size: 1.2em;">Customer Details Update</a><br><br>
        <a href="deletecustomer.php" style="color: blue; font-size: 1.2em;">Customer Details Delete</a><br><br>
      </div>      
      <h1><b>New Customer Registration<b></h1>
      <h2><a href='/bnb/' style="color: blue;">[Return to main page]</a></h2>
      <br>
      <iframe name="votar" style="display:none;"></iframe>
      <form id="registercustomer" name="registercustomer" onsubmit="return registerCustomer()" onsubmit="registerCustomer()" onreset="return resetForm()" target="votar">
        <p>
          <label>First Name: </label>
          <input type="text" id="firstname" name="firstname" minlength="2" maxlength="50" required> 
        </p> 
        <p>
          <label>Last Name: </label>
          <input type="text" id="lastname" name="lastname" minlength="5" maxlength="50" required> 
        </p>
        <p>
          <label>Contact Number: </label>
          <input type="number" id="contactnumber" name="contactnumber" minlength="9" maxlength="11" required> 
        </p>   
        <p>  
          <label>Email: </label>
          <input type="email" id="email" name="email" maxlength="100" size="50" required> 
        </p>
        <p>
          <label>Username: </label>
          <input type="text" id="username" name="username" minlength="4" maxlength="20" required> 
        </p>
          <label>Password: </label>
          <input type="password" id="password" name="password" minlength="8" maxlength="32" required> 
        </p><br>         
        <input id="submit" type="submit" name="submit" value=" Register ">&nbsp;&nbsp;
        <input id="logout" type="reset" name="submit" value=" Cancel ">        
      </form>
      <br>    
  </div>    
  <div id="footer">
    Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
  </div>
</body>
</html>

