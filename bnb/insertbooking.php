<?php
include ('session.php');
if ($login_session != "admin"){ 
  header('Location: registercustomer.php');
}
?>

<?php
function cleanInput($data) {  
  return htmlspecialchars(stripslashes(trim($data)));
}

include "config.php"; //load in any variables
$DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

//insert DB code from here onwards
//check if the connection was good
if (mysqli_connect_errno()) {
  echo "Error: Unable to connect to MySQL. ".mysqli_connect_error() ;
  exit; //stop processing the page further
}
//prepare the and make provision for the variable data - ? place holders
$query = "INSERT INTO bookings (roomID,roomname,checkinDate,checkoutDate,firstname,lastname,contactnumber,bookingextras,roomreview) 
VALUES (?,?,?,?,?,?,?,?,?)";
$stmt = mysqli_prepare($DBC,$query); //prepare the query
//bind the 3 strings to the valuses from above
//mysqli_stmt_bind_param($stmt, 'ssssssss', $roomname, $checkinDate, $checkoutDate, $firstname, $lastname, $contactnumber, $bookingextras, $roomreview); //associate the ? with variables

//place data into the variables
$roomname = $_POST['roomname'];
$checkinDate = $_POST['checkinDate'];
$checkoutDate = $_POST['checkoutDate'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contactnumber = $_POST['contactnumber'];
$bookingextras = $_POST['bookingextras'];
$roomreview = '';

/*
$query1 = "SELECT roomID FROM room WHERE roomname = ".$roomname;
$result1 = mysqli_query($DBC,$query1);                
$row1 = mysqli_fetch_assoc($result1);  
$roomID = $row1['roomID'];
*/

//give roomID to roomname for bookings field
if($roomname == "Kellie") { $roomID = '1'; }
if($roomname == "Herman") { $roomID = '2'; }
if($roomname == "Scarlett") { $roomID = '3'; }
if($roomname == "Jelani") { $roomID = '4'; }
if($roomname == "Sonya") { $roomID = '5'; }
if($roomname == "Miranda") { $roomID = '6'; }
if($roomname == "Helen") { $roomID = '7'; }
if($roomname == "Octavia") { $roomID = '8'; }
if($roomname == "Gretchen") { $roomID = '9'; }
if($roomname == "Bernard") { $roomID = '10'; }
if($roomname == "Dacey") { $roomID = '11'; }
if($roomname == "Preston") { $roomID = '12'; }
if($roomname == "Dane") { $roomID = '13'; }
if($roomname == "Cole") { $roomID = '14'; }

if ($bookingextras == ''){
  $bookingextras = 'Nothing';
}
echo "roomID = ".$roomID."<br>";
echo "roomname = ". $roomname;echo "<br>";
echo "checkinDate = ". $checkinDate;echo "<br>";
echo "checkoutDate = ". $checkoutDate;echo "<br>";
echo "firstname = ". $firstname;echo "<br>";
echo "lastname = ". $lastname;echo "<br>";
echo "contactnumber = ". $contactnumber;echo "<br>";
echo "bookingextras = ". $bookingextras;echo "<br>";
echo "roomreview = ". $roomreview;

$query = "INSERT INTO bookings (roomID,roomname,checkinDate,checkoutDate,firstname,lastname,contactnumber,bookingextras,roomreview) 
VALUES ('$roomID','$roomname','$checkinDate','$checkoutDate','$firstname','$lastname','$contactnumber','$bookingextras','$roomreview')";
if($DBC->query($query) === TRUE) {
  echo "<br>"."New booking is successful.";
} else {
  echo "<br>"."Error: ".$query."<br>".$DBC->error;
}

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

//prepare a query and send it to the server
$query = "SELECT bookingID,roomname,checkinDate,checkoutDate,firstname,lastname,contactnumber,bookingextras,roomreview FROM bookings WHERE firstname = '$firstname'";
$result = mysqli_query($DBC,$query);
mysqli_free_result($result);

mysqli_close($DBC); //close the connection once done
return;
?>