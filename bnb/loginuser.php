<?php
session_start(); //starting session
$error = ''; //variable to store error message

//connect to server and select database
include "config.php"; //load in any variables
$DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

//check if the connection was good
if (mysqli_connect_errno()) {
    echo "Error: Unable to connect to MySQL. ".mysqli_connect_error() ;
    exit; //stop processing the page further
}
    
if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $loggedin = '';
}
//to prevent mysql injection
$username = stripcslashes($username);
$password = stripcslashes($password);

echo "username = ".$username."<br>";
echo "password = ".$password."<br>";

//prepare a query and send it to the server
$query = "SELECT * FROM customer WHERE username = '$username'";
$result = mysqli_query($DBC,$query);
$row = mysqli_fetch_array($result);

if ($row["username"] == $username && $row["password"] == $password){
        $firstname = $row['firstname'];
        $loggedin = $firstname;
        echo "Login successful. Welcome ".$loggedin;

        $_SESSION['login_user'] = $username; //initializing session
        header("location: index.php"); //redirect to home page
    }
    else {
        echo "Your username or password is incorrect.";
        $loggedin = '';
        return;
    }
                
mysqli_free_result($result); 
mysqli_close($DBC); //close the connection once done
return $loggedin;
?>