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
$query = "INSERT INTO customer (firstname,lastname,contactnumber,email,username,password) VALUES (?,?,?,?,?,?)";
$stmt = mysqli_prepare($DBC,$query); //prepare the query
//bind the 3 strings to the valuses from above
mysqli_stmt_bind_param($stmt, 'ssssss', $firstname, $lastname, $contactnumber, $email, $username, $password); //associate the ? with variables
//place data into the variables
$firstname = $_POST['firstname']; //make it obvious to find for now
$lastname = $_POST['lastname'];
$contactnumber = $_POST['contactnumber'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

//prepare a query and send it to the server
$query = "SELECT customerID,firstname,lastname,contactnumber,email,username,password FROM customer WHERE firstname = '$firstname'";
$result = mysqli_query($DBC,$query);
mysqli_free_result($result); 

mysqli_close($DBC); //close the connection once done
return;
?>