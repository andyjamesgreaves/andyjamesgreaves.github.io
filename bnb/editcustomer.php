<?php
include ('session.php');
if ($login_session != "admin"){ 
  header('Location: registercustomer.php');
}
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Customer Update</title>
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
          <li><a href="index.php">Home</a></li>
          <li><a href="listrooms.php">Rooms</a></li>
          <li><a href="currentbookings.php">Bookings</a></li>
          <li><a style="color: #FFF; background: transparent url(style/transparent_light.png) repeat;" href="registercustomer.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
        <div class="sidebar">
            <h3>Existing Customers</h3>
            <a href="registercustomer.php">New Customer Register</a><br><br>
            <a href="listcustomers.php">Customers List Search by Lastname</a><br><br>
            <a href="listcustomers.php">Customer Details View</a><br><br>
          <a href="deletecustomer.php">Customer Details Delete</a><br><br>
        </div>
        <div id="content">
            <h1>Customer Details Update</h1>
            <h2><a href='listcustomers.php' style="color: blue;">[Return to Customer listing]</a>&nbsp;&nbsp;<a href='/bnb/' style="color: blue;">[Return to main page]</a></h2>
      <br>
      <form method="POST" action="insertcustomer.php">
        <p>
          <label for="fname">First Name: </label>
          <input type="text" id="fname" name="fname" minlength="2" maxlength="50" required value="Forrest"> 
        </p> 
        <p>
          <label for="lname">Last Name: </label>
          <input type="text" id="lname" name="lname" minlength="5" maxlength="50" required> 
        </p>  
        <p>  
          <label for="e">Email: </label>
          <input type="email" id="e" name="e" maxlength="100" size="50" required> 
        </p>        
        <p>  
          <label for="username">Username: </label>
          <input type="text" id="username" name="username" maxlength="100" size="50" required> 
        </p> 
        <p>  
          <label for="password">Password: </label>
          <input type="password" id="password" name="password" maxlength="100" size="50" required> 
        </p>
        <input id="submit" type="submit" name="submit" value=" Update ">&nbsp;&nbsp;
        <input id="logout" type="reset" name="submit" value=" Cancel ">
      </form>
      <br> 
      <?php
            include "config.php"; //load in any variables
            $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

            //insert DB code from here onwards
            //check if the connection was good
            if (mysqli_connect_errno()) {
                echo "Error: Unable to connect to MySQL. ".mysqli_connect_error() ;
                exit; //stop processing the page further
            }

            //simple validation to check if id exists
            $id = $_GET['id'];
            if (empty($id) or !is_numeric($id)) {
            echo "<h2>Invalid Customer ID</h2>"; //simple error feedback
            exit;
            } 

            //preparing a query and send it to the server
            $query = 'SELECT * FROM customer WHERE customerID='.$id;
            $result = mysqli_query($DBC,$query);
            $rowcount = mysqli_num_rows($result); 
            ?>
            <h1>Customer Details</h1>
            <?php        

            //makes sure we have the customer
            if ($rowcount > 0) {  
            echo "<fieldset><legend><font size = '4em'>Customer details ID:$id</legend><dl>"; 
            $row = mysqli_fetch_assoc($result);
            echo "<br><dt><font size = '3em'>&nbsp;First name:</dt><dd>"."&nbsp;&nbsp;".$row['firstname']."</dd><br>".PHP_EOL;
            echo "<dt>&nbsp;Last name:</dt><dd>"."&nbsp;&nbsp;".$row['lastname']."</dd><br>".PHP_EOL;
            echo "<dt>&nbsp;Email:</dt><dd>"."&nbsp;&nbsp;".$row['email']."</dd><br>".PHP_EOL;
            echo "<dt>&nbsp;Username:</dt><dd>"."&nbsp;&nbsp;".$row['username']."</dd><br>".PHP_EOL; 
            echo "<dt>&nbsp;Password:</dt><dd>"."&nbsp;&nbsp;".$row['password']."</dd><br>".PHP_EOL;
            echo '</dl></fieldset>'.PHP_EOL;  
            } else echo "<h2>No customer found!</h2>"; //suitable feedback

            mysqli_free_result($result); //free any memory used by the query
            mysqli_close($DBC); //close the connection once done
          ?>
      </div>
    <div id="footer">
      Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
    </div>
  </div>
</body>
</html>
  
  