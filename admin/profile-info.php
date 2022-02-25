<?php require_once('votersdb.php'); ?>

<!--deny access if user not admin-->
<?php
$query="SELECT * FROM users WHERE username= '".$_SESSION['username']."' ";
$results=mysqli_query($link,$query); ?>
<?php while($row=mysqli_fetch_array($results)){ ?>

  <?php  if(($row['role'])=='admin'): ?>
<!--now allow access-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>voter-profile</title>

  <!-- Favicons -->
  <link href="img/vote.png" rel="icon">
  

  
    <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
    </head>
    <body>
        <div id="profilepage">
            <div class="headpart">
      <h2><img src="img/vote.png"  width="40" height="40">VOTER PROFILE INFORMATION:</h2>    
</div>

        
       <div class="rowflex2">
           <h4><font color="grey">PERSONAL INFORMATION</font></h4>
          <div class="colum1">
               <?php
$query="SELECT * FROM voters WHERE id= $id  ";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];	
    $nickname=$row['nickname'];
 $id=$row['id']; 
       
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="myimg" alt="No image">';                                       
} ?>
             
           </div>
          <div class="colum2">
             <br>
              <input type="hidden" value="<?php echo $id; ?>">
              <font color="#66b2ff"><b>Name:</b></font>&emsp;&emsp;&emsp;
              <input type="text" class="theinput" value="<?php echo $name; ?>"><br>
              <font color="#66b2ff"><b>Nick Name:</b></font>&nbsp;&nbsp;
              <input type="text" class="theinput" value="<?php echo $nickname; ?>"><br>
           <font color="#66b2ff"><b>Admn No:</b></font>&emsp;&nbsp;
              <input type="text" class="theinput" value="<?php echo $admn_no; ?>"><br>
            <font color="#66b2ff"><b>Email:</b></font>&emsp;&emsp;&emsp;
              <input type="text" class="theinput" value="<?php echo $email; ?>"><br>
            <font color="#66b2ff"><b>School:</b></font>&emsp;&emsp;&nbsp;
              <input type="text" class="theinput" value="<?php echo $school; ?>"><br>
           
           <br>
           </div>
</div><br><!--end of the rowflex container-->
            
            <div id="otherpart">
                <h4><font color="grey">ELECTORAL INFOR:</font></h4>
        <div class="colx1">
               <label><font color="#66b2ff"><b>Role:</b></font></label>
            <input type="text" id="text1" value="<?php echo $role; ?>">
            <label><font color="#66b2ff"><b>Position:</b></font></label>
            <input type="text" id="text1" value="<?php echo $position; ?>"><br><br>
                </div>
                
                
             <div class="colx2">
               <label><font color="#66b2ff"><b>Status:</b></font></label>
            <input type="text" id="text1" value="<?php echo $status; ?>">
                 <label><font color="#66b2ff"><b>Category:</b></font></label>
            <input type="text" id="text1" value="<?php echo $category; ?>"> <br> <br>
               
                </div> <br><br><br>
               
            </div><br>
            <div id="otherpart">
            <p>Sign & Stamp: _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ </p>
            <div class="footerpart">
            ********** <font color="white">Powered by Frankben software developers</font> **********
                </div></div>
       </div>   
        <br><br>  
          
          
          
 
          
  
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
        
        
</body>

</html>