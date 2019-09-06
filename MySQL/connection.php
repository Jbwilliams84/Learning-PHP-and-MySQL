<?php

$server         = "localhost";
$username       = "root";
$password       = "root";
$db             = "my_first_database";



//CREATE A CONNECTION

$conn = mysqli_connect($server, $username, $password, $db);

// //  CHECK CONNECTION

// if(!$conn) {
//     die("Connection Failed: " . mysqli_connect_error());
// }

// echo "Connected successfully!";

?>