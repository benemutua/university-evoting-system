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

 <!-- picture preview when file button is clicked-->
        <script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
    
    <style>
    
    #output_image
{
 max-width:180px;
    border: 1px solid gainsboro;
    border-radius: 5px;
}
    </style>
 
</head>

<body>
  <section id="container">
   
      
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Collapse Menu"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b><img src="img/vote.png" width="40" height="40">E-VOTING ADMIN</b></a>
     
      <!--logo end-->
    
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
             <li>
            <?php  if (isset($_SESSION['username'])) : ?>  
                            Hello:   
                    <?php echo $_SESSION['username']; ?> 
                  <?php endif ?>
							</li>
        </ul>
          
          
      </div>
    </header>
    <!--header end-->
      
      
      
      
      
   
    <!--sidebar menu start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
         <!-- start of side menu items-->
            
            
            
            <!-- dashboard-->
          <li class="mt">
            <a class="active" href="index.php">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
              </a>
          </li>
            
            <!-- system acs-->
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-list"></i>
              <span>System Accounts</span>
              </a>
            <ul class="sub">
                <li><a href="create-user.php"><i class="fa fa-check"></i>Create User</a></li>
              <li><a href="user-roles.php"><i class="fa fa-cog"></i>User Roles</a></li>
                <li><a href="manage-user.php"><i class="fa fa-group"></i>Manage Users</a></li>
            </ul>
          </li>
        
            <!--voters data-->
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-group"></i>
              <span>Voters Data</span>
              </a>
            <ul class="sub">
            
              <li><a href="register-voter.php"><i class="fa fa-save"></i>Register Voter</a></li>
                   <li><a href="register-candidate.php"><i class="fa fa-save"></i>Register Candidate</a></li>
                   <li><a href="manage-voter.php"><i class="fa fa-cogs"></i>Manage Voters</a></li>
                <li><a href="gallery.php"><i class="fa fa-image"></i>Media library</a></li>
              
            </ul>
          </li>
            
                <!--verification part-->
              <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-check"></i>
              <span>Data Verification</span>
              </a>
            <ul class="sub">
            
              <li><a href="verify-voter.php"><i class="fa fa-check"></i>Verify Voter</a></li>
                   <li><a href="verify-cand.php"><i class="fa fa-check"></i>Verify Candidate</a></li>          
            </ul>
          </li>
            
           
            
        
            
            <!-- Reports part-->
              <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-line-chart"></i>
              <span>Analysis/Reports</span>
              </a>
            <ul class="sub">
      
                <li><a href="active-voters.php"><i class="fa fa-list-ul"></i>Active Voters</a></li>
              <li><a href="#"><i class="fa fa-bar-chart"></i>Registration graph</a></li>
                <li><a href="#"><i class="fa fa-bar-chart"></i>Verification graph</a></li>
            </ul>
          </li>
            
             <!--sessions-->
            
              <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>System sessions</span>
              </a>
            <ul class="sub">
            
              <li><a href="change-status.php"><i class="fa fa-edit"></i>Change Session</a></li>
                   <li><a href="schedule-change.php"><i class="fa fa-calendar"></i>Set Update Time</a></li>        
            </ul>
          </li>
            
            
            <!--elections reports-->
                <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-table"></i>
              <span>Elections Results</span>
              </a>
            <ul class="sub">
            
               <li><a href="votes.php"><i class="fa fa-user"></i>All Votes</a></li>
                <li><a href="table-results.php"><i class="fa fa-table"></i>Table results</a></li>
                <li><a href="official-results.php"><i class="fa fa-certificate"></i>Official Results</a></li>
            </ul>
          </li>
        
   <!--Graphs reports-->
                <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bar-chart"></i>
              <span>Graphical Report</span>
              </a>
            <ul class="sub">
              <li><a href="votesgraphs.php"><i class="fa fa-pie-chart"></i>presidential Votes</a></li>
                <li><a href="vice-president.php"><i class="fa fa-pie-chart"></i>Vice President</a></li>
                <li><a href="sec-general.php"><i class="fa fa-pie-chart"></i>Sec General</a></li>
                <li><a href="finance-head.php"><i class="fa fa-pie-chart"></i>Finance Head</a></li>
                <li><a href="ladies-rep.php"><i class="fa fa-pie-chart"></i>Ladies Rep</a></li>
                <li><a href="non-residents.php"><i class="fa fa-pie-chart"></i>Non Residents Rep</a></li>
                <li><a href="disabilities.php"><i class="fa fa-pie-chart"></i>Disabilities Rep</a></li>
            </ul>
          </li>
        <br><br>            
            
            
            
            
            
            <!--admin tools-->
                   <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cog"></i>
              <span>Admin Tools</span>
              </a>
            <ul class="sub">
        
                <li><a href="profile.php"><i class="fa fa-user"></i>My profile</a></li>
                 <li><a href="changepwd.php"><i class="fa fa-book"></i>Change pass</a></li>
                <li><a href="logout.php"><i class="fa fa-question"></i>Log out!</a></li>
                <li><a href="#"><i class="fa fa-book"></i>System logs</a></li>
                <li><a href="#"><i class="fa fa-rss"></i>Online Users</a></li>
            </ul>
          </li>
         
        
          
        <!-- sidebar menu end-->
             </ul>
               </div>
    </aside>
     
    <!--sidebar end-->