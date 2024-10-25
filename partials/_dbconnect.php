<!-- Connecting to the Database in php code -->
<?php
$severname = "localhost";
$username = "root";
$password = "";
$database = "idiscuss";

//Crate a Connection 
$conn = mysqli_connect($severname, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect : " . mysqli_connect_error());
 } else {
    // echo "Connected was successful <br>";
 }
 ?>