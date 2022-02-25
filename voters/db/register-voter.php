<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "1234567", "e-voting");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$admn_no = mysqli_real_escape_string($link, $_REQUEST['admn_no']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$school = mysqli_real_escape_string($link, $_REQUEST['school']); 


// Attempt insert query execution
$sql = "INSERT INTO voters (name, admn_no, email,school) VALUES ('$name', '$admn_no', '$email', '$school')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>