<?php require_once('votersdb.php'); ?>

<!--deny access if user not admin-->
<?php
$query="SELECT * FROM users WHERE username= '".$_SESSION['username']."' ";
$results=mysqli_query($link,$query); ?>
<?php while($row=mysqli_fetch_array($results)){ ?>

  <?php  if(($row['role'])=='admin' OR $row['role']=='s_a'): ?>
<!--now allow access-->



 <?php require_once('header.php'); ?>   

<!--main content start-->
<section id="main-content">
<section class="wrapper site-min-height">  
          
        
          
<hr>
    <?php  
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

echo 'IP: '.getUserIpAddr();
?>  &emsp;
    
    
    
<i class="fa fa-dashboard">WELCOME TO ADMIN DASHBOARD</i>  &emsp;&emsp;&emsp;
<i class="fa fa-share">VISIT VOTERS SITE <a href="http://127.0.0.1/e-voting/voters/">Here</a></i>
<div class="row-con">

          <div class="conr">
              <center><font size="4" color="green"><i class="fa fa-rss">Users Online</i></font></center>
    <h1>:</h1>
    </div>
           <div class="conr">
           <center><font size="4" color="steelblue"><i class="fa fa-group">Vote Count</i></font>
               <h1><font color="darkblue">
    <?php
$sql="SELECT * FROM votesdata ";

if ($result=mysqli_query($link,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d ",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

?></font></h1>
               </center>
    </div>
          
      <div class="conr">
           <center><font size="4" color="steelblue"><i class="fa fa-group">Verified Voters</i></font>
               <h1><font color="darkblue">
    <?php
$sql="SELECT * FROM voters ";

if ($result=mysqli_query($link,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d ",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

?></font></h1>
               </center>
    </div>
    
    
    
          
      <div class="conr">
           <center><font size="4" color="brown"><i class="fa fa-certificate">Approved Candidates</i></font>
               <h1><font color="red">
<?php

$sql="SELECT * FROM voters WHERE role='candidate' ";

if ($result=mysqli_query($link,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("%d ",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }
?></font></h1>
</center>
</div>
</div> <!--end of row con-->
          
          
          
          
          
          
 <!------------------------------------------------------------------------------
change election year
-------------------------------------------------------------------------------> 
<div id="row-con">
<font color="brown"><h4>SET THE ELECTION YEAR</font><font color="grey">(Done once per every election year)</font>   </h4>       
          
    <!--show message after insertion-->
        <?php if (isset($_SESSION['message'])): ?>
	<div class="cast">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
        
            <!--show error message if insertion failed-->
        <?php if (isset($_SESSION['err'])): ?>
	<div class="err">
		<?php 
			echo $_SESSION['err']; 
			unset($_SESSION['err']);
		?>
	</div>
<?php endif ?>
          
          
          
<form method="post" action="votersdb.php" >
<div class="input-group1">
<label>Election year::</label>
    <select  name="year" class="dropdown">
    <option value="2019/2020">2019/2020</option>
         <option value="2020/2021">2020/2021</option>
         <option value="2021/2022">2021/2022</option>
         <option value="2022/2023">2022/2023</option>
         <option value="2023/2024">2023/2024</option>
         <option value="2024/2025">2024/2025</option>
         <option value="2025/2026">2025/2026</option>
         <option value="2026/2027">2026/2027</option>
         <option value="2027/2028">2027/2028</option>
         <option value="2028/2029">2028/2029</option>
         <option value="2029/2030">2029/2030</option>
         <option value="2030/2031">2030/2031</option>
         <option value="2031/2032">2031/2032</option>
    </select>
    </div>
<button type="submit" class="btn btn-primary" name="set_year"><i class="fa fa-refresh">SET ELECTION YEAR</i></button>
</form><br>
</div>
<!--------------------------------------------------------------------------------------
end of change election year
---------------------------------------------------------------------------------------->
 
          
          
          
          
          
          
          
          
          
          
          
          
<br>
<div class="tabset">
  <!-- Tab 1 -->
  <input type="radio" name="tabset" id="tab1"  checked>
  <label for="tab1">Registration process</label>
  <!-- Tab 2 -->
  <input type="radio" name="tabset" id="tab2" >
  <label for="tab2">Verification Process</label>
  <!-- Tab 3 -->
  <input type="radio" name="tabset" id="tab3" >
  <label for="tab3">E-Voting Process</label>
  
  <div class="tab-panels">
    <section id="registration" class="tab-panel">
        <b>Select the Election year to see data:</b><select name="year" class="ins">
         <option value="2019/2020">2019/2020</option>
         <option value="2020/2021">2020/2021</option>
         <option value="2021/2022">2021/2022</option>
         <option value="2022/2023">2022/2023</option>
         <option value="2023/2024">2023/2024</option>
         <option value="2024/2025">2024/2025</option>
         <option value="2025/2026">2025/2026</option>
         <option value="2026/2027">2026/2027</option>
         <option value="2027/2028">2027/2028</option>
         <option value="2028/2029">2028/2029</option>
         <option value="2029/2030">2029/2030</option>
         <option value="2030/2031">2030/2031</option>
         <option value="2031/2032">2031/2032</option>
    </select>  
      
                
 
        
        
        
        
        
        
        
        

  </section>
    <section id="verification" class="tab-panel">
 /////////////////////
    </section>
    <section id="voting" class="tab-panel">
 //////////////////////////////////////////////
    </section>
  </div>
  
</div>     
            
        
          
          
    </section><!-- /wrapper -->
    <!-- /MAIN CONTENT -->
    <!--main content end-->
          
  
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>

  <?php else: ?>        
<?php require_once('error.php'); ?>
        <?php endif; }?>