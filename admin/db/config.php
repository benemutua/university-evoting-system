<?php



/* Attempt to connect to MySQL database */
$link = mysqli_connect('127.0.0.1', 'root', '1234567', 'e-voting');
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



?>