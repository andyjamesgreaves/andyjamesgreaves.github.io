
<?php
    include "config.php"; //load in any variables
    $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

    //insert DB code from here onwards
    //check if the connection was good
    if (mysqli_connect_errno()) {
        echo "Error: Unable to connect to MySQL. ".mysqli_connect_error() ;
        exit; //stop processing the page further
    }
    echo "Delete booking.......";
    session_start();
    $id=$_SESSION['id'];
    
    $query = "DELETE FROM bookings WHERE bookingID='$id'";
    if($DBC->query($query) === TRUE) {
        echo "<br>"."Booking has successfuly been deleted.";
        } else {
        echo "<br>"."Error: ".$query."<br>".$DBC->error;
        }

    mysqli_close($DBC); //close the connection once done
    return;
?> 