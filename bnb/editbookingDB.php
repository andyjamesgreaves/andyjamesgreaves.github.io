<?php
    function cleanInput($data) {  
        return htmlspecialchars(stripslashes(trim($data)));
      }
    include "config.php"; //load in any variables
    $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

    session_start();
    $id = $_SESSION['id'];
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $roomname = $_REQUEST['roomname'];
    $checkinDate = $_REQUEST['checkinDate'];
    $checkoutDate = $_REQUEST['checkoutDate'];        
    $contactnumber = $_REQUEST['contactnumber'];
    $bookingextras = $_REQUEST['bookingextras'];
    if($bookingextras == '') {
        $bookingextras = "Nothing";
    }
    $roomreview = $_REQUEST['roomreview'];
    if($roomreview == '') {
        $roomreview = "None";
    }    
    
    $query = "UPDATE bookings 
    SET 
    roomname = '$roomname',     
    checkinDate = '$checkinDate', 
    checkoutDate = '$checkoutDate',
    firstname = '$firstname', 
    lastname = '$lastname', 
    contactnumber = '$contactnumber', 
    bookingextras = '$bookingextras',
    roomreview = '$roomreview'
    WHERE bookingID = '$id'";
    
    mysqli_query($DBC, $query);

    if($DBC->query($query) === TRUE) {
        echo "<br>"."Booking has been successfully updated.";
      } else {
        echo "<br>"."Error: ".$query."<br>".$DBC->error;
      }
        
    mysqli_close($DBC); //close the connection once done
    return;
    
?>