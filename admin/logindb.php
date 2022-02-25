<?php
// Initialize the session
session_start();


require_once('db/config.php');




/*---------------------------------------------------------------
admin login
----------------------------------------------------------------*/


if(isset($_POST['login'])){
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
    $role= trim($_POST['role']);
	
	$sql = "SELECT * FROM users WHERE username = '".$username."' AND role='admin' ";
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
			$_SESSION['err'] = "<i class='fa fa-warning'>Wrong credentials!</i>";  
		header('location: login.php');
		}
	}
	else{
		$_SESSION['err'] = "<i class='fa fa-warning'>No matches found. Try again!</i>";  
		header('location: login.php');
	}
}





    
    
    
    
    
    
    













