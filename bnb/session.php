<?php
include "config.php";

//open new connection to MySQL server
$DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

session_start();

//storing session
$user_check = $_SESSION['login_user'];

//sql query to fetch complete info of user
$query = "SELECT * FROM customer WHERE username = '$user_check'";
$sessioncheck_sql = mysqli_query($DBC, $query);
$row = mysqli_fetch_assoc($sessioncheck_sql);
$login_session = $row['username'];
$loggedin = $row['firstname'];
$msg = '';
?>