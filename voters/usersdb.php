<?php
// Initialize the session
session_start();


require_once('db/config.php');




/*--------------------------------------------------------------------------
CREATE SYSTEM USER
----------------------------------------------------------------------------*/
if(isset($_POST['add'])){
        $name = mysqli_real_escape_string($link,$_POST['name']);
		$username = mysqli_real_escape_string($link,$_POST['username']);
		$email = mysqli_real_escape_string($link,$_POST['email']);
		$password = mysqli_real_escape_string($link,$_POST['password']);
    $emptyInput=NULL;
		
		$options = array("cost"=>6);
		$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
    
    
    
     /*-------------------------------------
    Check for duplicate entry
    ----------------------------------------*/
        $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($link, $query);
       if(mysqli_num_rows($result)==1){
         $_SESSION['err'] = "Similar details exist. Login!";  
		header('location: register.php');     
       }
    
    else{
     /*--------------------------------------
  Confirm if passwords match
  ---------------------------------------*/
           
if($_POST["password"] !== $_POST["confirm_pass"]){
           $_SESSION['err'] = "Mismatching passwords";  
		header('location: register.php'); 
        }
 /*---------------------------------------------
        if no duplicate entry, now confirm if all input fields are filled correctly, if not, return error
        IF NO ERROR, register the user
        -------------------------------------------------------*/
    elseif (!($_POST["username"] == $emptyInput or $_POST["email"] == $emptyInput or $_POST["name"] == $emptyInput or $_POST["password"] == $emptyInput)){
   
		$sql = "INSERT INTO users (name, username,email,password) VALUES( '".$name."','".$username."','".$email."','".$hashPassword."')";
		$result = mysqli_query($link, $sql);
		if($result)
		{
         $_SESSION['message'] = "A/c Created! <a href='login.php'>Login Here</a>";  
		header('location: register.php'); 
        }}
    else{
        $_SESSION['err'] = "Not added! All fields are mandatory!";  
		header('location: register.php');
        }
}}




/*---------------------------------------------------------------
login
----------------------------------------------------------------*/


if(isset($_POST['login'])){
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
    $role= trim($_POST['role']);
	
	$sql = "SELECT * FROM users WHERE username = '".$username."' ";
	$rs = mysqli_query($link,$sql);
	$numRows = mysqli_num_rows($rs);
	
	if($numRows  == 1){
		$row = mysqli_fetch_assoc($rs);
        $role = $row['role'];
		if(password_verify($password,$row['password'])){
			
session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["role"] = $role;
                            $_SESSION["username"] = $username;
            
                            
                            // Redirect user to landing page
                            header("location: index.php");
		}
		else{
			$_SESSION['err'] = "Wrong credentials!";  
		header('location: login.php');
		}
	}
	else{
		$_SESSION['err'] = "User does not exist!";  
		header('location: login.php');
	}
}







    
    
    
    
    
    
    













