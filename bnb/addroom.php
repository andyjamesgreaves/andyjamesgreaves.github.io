<?php
include ('session.php');
if ($login_session != "admin"){ 
  header('Location: listrooms.php');
}
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Add a Room</title>
  <meta name="description" content="Ongaonga Bed & Breakfast" />
  <meta name="keywords" content="Bed & Breakfast" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
  <script type="text/javascript" src="javascript/addroom.js"></script>
</head>
<body>
  <?php
    date_default_timezone_set('NZ');
  //include "checksession.php";
  //checkUser();
  ?>
  <?php
    //function to clean input but not validate type and content
    function cleanInput($data) {  
      return htmlspecialchars(stripslashes(trim($data)));
    }

    //the data was sent using a formtherefore we use the $_POST instead of $_GET
    //check if we are saving data first by checking if the submit button exists in the array
    if (isset($_POST['submit']) and !empty($_POST['submit']) and ($_POST['submit'] == 'Add')) {
    //if ($_SERVER["REQUEST_METHOD"] == "POST") { //alternative simpler POST test    
        include "config.php"; //load in any variables
        $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

        if (mysqli_connect_errno()) {
            echo "Error: Unable to connect to MySQL. ".mysqli_connect_error() ;
            exit; //stop processing the page further
        };

    //validate incoming data - only the first field is done for you in this example - rest is up to you do
    //roomname
        $error = 0; //clear our error flag
        $msg = 'Error: ';
        if (isset($_POST['roomname']) and !empty($_POST['roomname']) and is_string($_POST['roomname'])) {
          $fn = cleanInput($_POST['roomname']); 
          $roomname = (strlen($fn)>50)?substr($fn,1,50):$fn; //check length and clip if too big
          //we would also do context checking here for contents, etc       
        } else {
          $error++; //bump the error flag
          $msg .= 'Invalid roomname '; //append eror message
          $roomname = '';  
        } 
 
    //description
          $description = cleanInput($_POST['description']);        
    //roomtype
          $roomtype = cleanInput($_POST['roomtype']);            
    //beds    
          $beds = cleanInput($_POST['beds']);        
          
    //save the room data if the error flag is still clear
    if ($error == 0) {
        $query = "INSERT INTO room (roomname,description,roomtype,beds) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($DBC,$query); //prepare the query
        mysqli_stmt_bind_param($stmt,'sssd', $roomname, $description, $roomtype,$beds); 
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);    
        echo "<h2>New room added to the list</h2>";        
    } else { 
      echo "<h2>$msg</h2>".PHP_EOL;
    }      
    mysqli_close($DBC); //close the connection once done
    }
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
          <li><a style="color: #FFF; background: transparent url(style/transparent_light.png) repeat;" href="listrooms.php">Rooms</a></li>
          <li><a href="currentbookings.php">Bookings</a></li>
          <li><a href="registercustomer.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">      
      <div id="content">

<h1>Add a new room</h1>
<h2><a href='listrooms.php' style="color: blue;">[Return to the room listing]</a>&nbsp;&nbsp;<a href='/bnb/' style="color: blue;">[Return to the main page]</a></h2>

<form id="addroom" onsubmit="return addroom()" onreset="return resetForm()" method="POST" action="#">
  <p>
    <label for="roomname">Room name: </label>
    <input type="text" id="roomname" name="roomname" minlength="5" maxlength="50"> 
  </p> 
  <p>
    <label for="description">Description: </label>
    <input type="text" id="description" size="100" name="description" minlength="5" maxlength="200"> 
  </p>  
  <p>  
    <label for="roomtype">Room type: </label>&nbsp;
    <input type="radio" id="roomtype" name="roomtype" value="S"> Single&nbsp; 
    <input type="radio" id="roomtype" name="roomtype" value="D" Checked> Double 
   </p>
  <p>
    <label for="beds">Beds (1-5): </label>
    <input type="number" id="beds" name="beds" min="1" max="5" value="1" required> 
  </p>
  <input id="submit" type="submit" name="submit" value=" Add ">&nbsp;&nbsp;
  <input id="submit" type="reset" name="reset" value=" Cancel ">
 </form>
 </div>
    <div id="footer">
      Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
    </div>
  </div>
</body>
</html>
  