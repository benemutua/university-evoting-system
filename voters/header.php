<!-- session manager-->
<?php
// Initialize the session
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>e-voting system</title>
      <link href="img/vote.png" rel="icon">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
   


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>

<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
                <span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.php">
				<img src="img/vote.png" style="width:40px; height:40px; border-radius:50%;">MKSU E-VOTING PAGE				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="dropdown">						
						<a href="index.php" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
                            <?php if(isset($_SESSION['username'])) : ?> 
                             
                            Hello:   
                    <?php echo $_SESSION['username']; ?> 
                  <?php endif ?>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="pwdchange.php"><i class="icon-key"></i>Change password</a></li>
                            <li><a href="logout.php"><i class="icon-off"></i>Log out</a></li>
						</ul>						
					</li>
			
				
				</ul>

				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">

			<ul class="mainnav">
                
                	<li>					
					<a href="index.php">
						<i class="icon-home"></i>
						Home
					</a>  									
				</li>
			
					<li class="dropdown">					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-check"></i>
						Elections
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
                        <li><a href="cast-vote.php"><i class="icon-check"></i>Cast Vote</a></li>
						<li><a href="my-history.php"><i class="icon-table"></i>My history</a></li>
                        <li><a href="constitution.php"><i class="icon-book"></i>constitution</a></li>
                       
                    </ul>    				
				</li>
				
				<li class="dropdown">					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bar-chart"></i>
						E-Results
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
                        <li><a href="overal.php"><i class="icon-group"></i>Overal </a></li>
						<li><a href="tally.php"><i class="icon-table"></i>Table Results</a></li>
                       
                       
                    </ul>    				
				</li>
				
                
                
			
			</ul>

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->