<?php require_once('sessionsdb.php'); ?>

<!--deny access if user not admin-->
<?php
$query="SELECT * FROM users WHERE username= '".$_SESSION['username']."' ";
$results=mysqli_query($link,$query); ?>
<?php while($row=mysqli_fetch_array($results)){ ?>

  <?php  if(($row['role'])=='admin'): ?>
<!--now allow access-->

<?php require_once('header.php'); ?> 
      
   <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
         
            <br>
<div class="castsess">  <br>                       
<table class="table table-bordered" >                                                     
<?php
$sql = "SELECT status FROM system_status";
$result = $link->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    
 
echo "<tr><td>System Status: </td><td>"  . $row["status"] . "</td></tr>";
}
   
echo "</table>";
} else { echo "0 results"; }
$link->close();
?>
</table> 
</div> <br>
          
            <form method="post" action="" >
        			<label>Change to:</label>
<select name="status" class="dropdown">
  <option  value="Registration/verification ongoing">Registration/Verification in process</option>
  <option  value="Voting ongoing">Open For Voting</option>
  <option  value="Closed for counting">Closed For Counting</option>
  <option  value="No elections in progress">Complete Election Process</option>
</select>
                <br><br>

                <label>Date/Time: </label>
    <input type="date" name="date" value=""> Time:     <input type="time" name="time" value="">
                
		
                
              <br><br>
               <button type="button" class="btn"><i class="fa fa-calendar">Confirm & Update</i></button>
          </form>
          
          
          
          
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
        
</body>

</html>
