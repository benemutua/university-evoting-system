<?php require_once('logindb.php'); ?>
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Admin|Home</title>

  <!-- Favicons -->
  <link href="img/vote.png" rel="icon">
  

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  
    <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
 
</head>

<body>


     
    <div class="logincontainer">
    
    
      <center>  <img src="img/vote.png" width="150" height="165" alt="logo">
        <h4> <b>E-VOTING ADMIN LOGIN</b></h4></center>
       
     
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
        <form method="post" action="logindb.php" >       
            
		
            <label> <i class="fa fa-user">Username:</i></label>
            <input type="text" id="wid" name="username" value="" >
		
        
            <label><i class="fa fa-key">Password:</i></label>
            <input type="password" id="wid" name="password" value="" >
           <br>
            <a href="">Forgot password?</a><br>
            <button type="submit" class="btn" name="login"><i class="fa fa-check">Login</i></button>
            <button type="reset" class="btn-reset"><i class="fa fa-remove">Clear Inputs</i></button>
	</form><br>
        </div>