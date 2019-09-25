<?php
include ('session.php');
if ($login_session != "admin"){ 
  header('Location: listrooms.php');
}
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Room Details Update</title>
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
          <li><a href="makebooking.php">Bookings</a></li>
          <li><a href="registercustomer.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
  <div id="site_content">
    <div id="content">
      <h1>Room Details Update</h1>
      <h2><a style="color: blue;" href='listrooms.php'>[Return to the room Listing]</a>&nbsp;&nbsp;<a style="color: blue;" href='/bnb/'>[Return to the main page]</a></h2>
      <?php
      include "config.php"; //load in any variables
      $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

        $error = 0;

        if (mysqli_connect_errno()) {
          echo "Error: Unable to connect to MySQL. ".mysqli_connect_error() ;
          exit; //stop processing the page further
        }

        //function to clean input but not validate type and content
        function cleanInput($data) {  
          return htmlspecialchars(stripslashes(trim($data)));
        }
        
        //retrieve the roomid from the URL
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET['id'];
            if (empty($id) or !is_numeric($id)) {
                echo "<h2>Invalid room ID</h2>"; //simple error feedback
                exit;
            } 
        }

        $query = 'SELECT * FROM room WHERE roomid='.$id;
        $result = mysqli_query($DBC,$query);
        $rowcount = mysqli_num_rows($result); 
        ?>
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

        //the data was sent using a form therefore we use the $_POST instead of $_GET
        //check if we are saving data first by checking if the submit button exists in the array
        if (isset($_POST['submit']) and !empty($_POST['submit']) and ($_POST['submit'] == 'Update')) { 
        //roomID (sent via a form ti is a string not a number so we try a type conversion!)    
            if (isset($_POST['id']) and !empty($_POST['id']) and is_integer(intval($_POST['id']))) {
              $id = cleanInput($_POST['id']); 
            } else {
              $error++; //bump the error flag
              $msg .= 'Invalid room ID '; //append error message
              $id = 0;  
            }   
        //roomname
              $roomname = cleanInput($_POST['roomname']); 
        //description
              $description = cleanInput($_POST['description']);        
        //roomtype
              $roomtype = cleanInput($_POST['roomtype']);         
        //beds
              $beds = cleanInput($_POST['beds']);         
            
        //save the room data if the error flag is still clear and room id is > 0
            if ($error == 0 and $id > 0) {
                $query = "UPDATE room SET roomname=?,description=?,roomtype=?,beds=? WHERE roomID=?";
                $stmt = mysqli_prepare($DBC,$query); //prepare the query
                mysqli_stmt_bind_param($stmt,'sssi', $roomname, $description, $roomtype, $beds, $id); 
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);    
                echo "<h2>Room details updated.</h2>";     
        //header('Location: http://localhost/bit608/listrooms.php', true, 303);      
            } else { 
              echo "<h2>$msg</h2>".PHP_EOL;
            }      
        }
        //locate the room to edit by using the roomID
        //we also include the room ID in our form for sending it back for saving the data
        $query = 'SELECT roomID,roomname,description,roomtype,beds FROM room WHERE roomid='.$id;
        $result = mysqli_query($DBC,$query);
        $rowcount = mysqli_num_rows($result);
        if ($rowcount > 0) {
          $row = mysqli_fetch_assoc($result);
        }
      ?>
    </div> <!--content-->      
  </div> <!--site-content-->
  <div id="footer">
    Copyright &copy; black_white | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
  </div>
</body>
</html>
