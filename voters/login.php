<?php require_once('usersdb.php'); ?>
<?php
// Initialize the session
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Home</title>
      <link href="img/vote.png" rel="icon">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
  </head>

<body>


     
    <div class="reg">
    
    
        <center><img src="img/vote.png" width="150" height="150" alt="logo"></center>
         <h3>LOGIN TO E-VOTING SYSTEM</h3>
        <!--message part-->
                 <?php if (isset($_SESSION['message'])): ?>
	  <div class="messg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	    </div>
      <?php endif ?>
        
            <!--error message on form validation-->
                 <?php if (isset($_SESSION['err'])): ?>
	  <div class="err">
		<?php 
			echo $_SESSION['err']; 
			unset($_SESSION['err']);
		?>
	    </div>
      <?php endif ?>
        
        
       
        <!--user regitrsation panel-->
        <form method="post" action="usersdb.php" >       
            
		<div class="control-group">
			<label>Admn Number:<font color="grey">(Username)</font></label>
			<input type="text" class="span3" name="username" value="" >
		</div>
           <div class="control-group">
            <label>Password:</label>
               <input type="password" class="span3" name="password" value="" >
            </div>
         
          
            
    
			<button type="submit" class="btn btn-primary" name="login"><i class="icon-check">Login</i></button>
        <center>    <h5>Do not have an a/c? <a href="register.php">Sign Up Here..</a></h5></center>
        
	</form>
        </div>