<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//define variables
$status="";
$id="0";

$update=false;

/* import the database connection */
require_once('db/config.php');

/*-------------------------------------------------------------------------------------
CHANGE SESSION INSTANTLY
-------------------------------------------------*/
//change system status when change button is clicked
if(isset($_GET['change'])){
    $id= $_GET['change'];
     $update=true;
    $sql="SELECT * FROM system_status WHERE id=$id";
    $n = (mysqli_query($link,$sql ));
    
    if(count((is_countable($n)?$n:[1]))){
        	$row = mysqli_fetch_array($n);
			$status = $row['status'];  
    }
}//end


//when the validate settings button is clicked
if (isset($_POST['update'])) {
	$id = $_POST['id'];
    $status = $_POST['status'];
    $sql="UPDATE system_status SET status='$status' WHERE id=$id";
	if(mysqli_query($link, $sql)){
     $_SESSION['message'] = "system status has been altered."; 
		header('location: change-status.php');   
    }
    else{
         $_SESSION['err'] = "Update not validated!"; 
		header('location: change-status.php');
    }
	
}  //end



/*
https://www.studentstutorial.com/jsp/jsp-session-implicit-object.php
*/




?>