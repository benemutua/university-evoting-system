<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


//define variables
$username="";
$email="";
$name="";
$role="";

$id="0";


$update=false;

/* import the database connection */
require_once('db/config.php');




/*--------------------------------------------------------------------------
CREATE SYSTEM USER
----------------------------------------------------------------------------*/
//Create user when add button on create-user.php is clicked

if(isset($_POST['add'])){
    $name=mysqli_real_escape_string($link, $_POST['name']);
    	$username=mysqli_real_escape_string($link, $_POST['username']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
        $role=mysqli_real_escape_string($link, $_POST['role']);
    $password=mysqli_real_escape_string($link, $_POST['password']);

$options = array("cost"=>4);
$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

    
    /*-------------------------------------
    Check for duplicate entry
    ----------------------------------------*/
    
    
    
        $query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($link, $query);
       if(mysqli_num_rows($result)==1){
         $_SESSION['err'] = "A user with similar username/Email already exists!";  
		header('location: create-user.php');     
       }
    
    else{
        /*---------------------------------------------
        if no duplicate entry, now confirm if all input fields are filled correctly, if not, return error
        IF NO ERROR, register the user
        -------------------------------------------------------*/
$emptyInput = NULL;
    if (!($_POST["name"] == $emptyInput or $_POST["username"] == $emptyInput or $_POST["email"] == $emptyInput or $_POST["password"] == $emptyInput or $_POST["name"] == $emptyInput)){
    
		$sql= "INSERT INTO users (name, username, email,password,role) VALUES ('".$name."','".$username."','".$email."','".$hashPassword."', '".$role."')";
 if(mysqli_query($link,$sql)){ 
		$_SESSION['message'] = "System account created!";  
		header('location: create-user.php');
        }}
    
        else{
        $_SESSION['err'] = "<i class='fa fa-warning'>Please fill all fields to proceed!</i>";  
		header('location: create-user.php');
        }}
    
}
/*end of user registration */ 
























/* ----------------------------------------------------------------------------
USER ROLES PAGE START
-------------------------------------------------------------------------------*/
//SET TO
//when voter button enabled is clicked
if(isset($_GET['voter'])){
    $id= $_GET['voter'];
    $sql="UPDATE users SET role='voter' WHERE id=$id";
    if(mysqli_query($link, $sql)){
   	$_SESSION['message'] = "<i class='fa fa-check'>Role change ran succesfully You are now a voter</i>";  
		header('location: user-roles.php');
}}//end

//when cand button enabled is clicked
if(isset($_GET['cand'])){
    $id= $_GET['cand'];
    $sql="UPDATE users SET role='candidate' WHERE id=$id";
    if(mysqli_query($link, $sql)){
   	$_SESSION['message'] = "<i class='fa fa-check'>Role change ran succesfully You are now a candidate</i>";  
		header('location: user-roles.php');
}}//end


//when clerk button enabled is clicked
if(isset($_GET['clerk'])){
    $id= $_GET['clerk'];
    $sql="UPDATE users SET role='clerk' WHERE id=$id";
    if(mysqli_query($link, $sql)){
   	$_SESSION['message'] = "<i class='fa fa-check'>Role change ran succesfully You are now a clerk</i>";  
		header('location: user-roles.php');
}}//end

//when clerk button enabled is clicked
if(isset($_GET['mngnt'])){
    $id= $_GET['mngnt'];
    $sql="UPDATE users SET role='mngnt' WHERE id=$id";
    if(mysqli_query($link, $sql)){
   	$_SESSION['message'] = "<i class='fa fa-check'>Role change ran succesfully You are part of management A/cs now</i>";  
		header('location: user-roles.php');
}}//end





if(isset($_GET['reset'])){
    $id= $_GET['reset'];
    $sql="UPDATE users SET role='voter' WHERE id=$id";
    mysqli_query($link, $sql);
   	$_SESSION['err'] = "The account has been reset to default!";  
		header('location: user-roles.php');
}


/* ------------------------------------------------------------------------------
THE End of user roles page
---------------------------------------------------------------------------------*/




















/*----------------------------------------------------------------------------
START OF MANAGE USER PAGE
------------------------------------------------------------------------------*/
//when the edit button is clicked
if(isset($_GET['edit_btn'])){
    $id= $_GET['edit_btn'];
     $update=true;
    $sql="SELECT * FROM users WHERE id=$id";
    $n = mysqli_query($link, $sql);
    
    if(count((is_countable($n)?$n:[1]))){
        	$row = mysqli_fetch_array($n);
			$name = $row['name'];
            $username=$row['username'];
			$email = $row['email'];
            $role = $row['role'];
       
        
    }
}//end






//when the update button is clicked on the create user interface
if (isset($_POST['update'])) {
	$id = $_POST['id'];
    $name=mysqli_real_escape_string($link, $_POST['name']);
    $username=mysqli_real_escape_string($link, $_POST['username']);
    $role=mysqli_real_escape_string($link, $_POST['role']);
    $email=mysqli_real_escape_string($link, $_POST['email']);
    $sql="UPDATE users SET name='$name', email='$email', username='$username', role='$role' WHERE id=$id";
	mysqli_query($link, $sql);
	$_SESSION['message'] = "<i class='fa fa-check'>User details have been altered. Pasword remains the same</i>";  
		header('location: manage-user.php');
}  //end




//when the reset account btnm is clicked
if(isset($_GET['reset_ac'])){
    $id= $_GET['reset_ac'];
    $sql="UPDATE users SET role='voter' WHERE id=$id";
    mysqli_query($link, $sql);
   	$_SESSION['err'] = "The account has been reset to default!";  
		header('location: manage-user.php');
}//end


//delete account button
if(isset($_GET['del'])){
    $id= $_GET['del'];
    $sql="DELETE FROM users WHERE id=$id";
    mysqli_query($link, $sql);
   	$_SESSION['message'] = "Account deleted";  
		header('location: manage-user.php');
}//end


/*-------------------------------------------------------------------------
THE END OF MANAGE USER
---------------------------------------------------------------------*/





/*--------------------------------
BULK OPTIONS
------------------------------*/
//coding the search button
  
   


//coding the bulk reset button
if(isset($_POST['res'])){
    $chkarr= $_POST['checkbox'];

    foreach ((array) $chkarr as $id){
  $sql="UPDATE users SET role='voter' WHERE id=$id";
  if(mysqli_query($link, $sql)){
    $_SESSION['err'] = "Account(s) restored to their fdefault";  
		header('location: manage-user.php');  
       }
        else{
          $_SESSION['err'] = "Bulk action not performed";  
		header('location: manage-user.php');  
        }
    }
}


//coding the bulk delete button
if(isset($_POST['deleted'])){
    $chkarr= $_POST['checkbox'];

    foreach ((array) $chkarr as $id){
  $sql="DELETE FROM users WHERE id=$id";
  if(mysqli_query($link, $sql)){
    $_SESSION['err'] = "Accounts deleted on bulk actions";  
		header('location: manage-user.php');  
       }
        else{
          $_SESSION['err'] = "Bulk action not performed";  
		header('location: manage-user.php');  
        }
    }
}





    
























?>