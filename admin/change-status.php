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
                                                                                              
                                 <?php
   
   $results = mysqli_query($link, "SELECT * FROM system_status "); ?>
          
          <table class="table table-bordered" >
            
          
        
              <?php while ($row = mysqli_fetch_array($results)) { ?>              
		<tr>
            <td><i class="fa fa-info">&emsp;Current Status:</i></td>
		             <td><?php echo $row['status']; ?></td>
            <td>
				<a href="change-status.php?change=<?php echo $row['id']; ?>" class="edit_btn" ><i class="fa fa-edit">Allow_Change</i></a>
                            </td>
              </tr>
              <?php } ?>
                           </table>
                                            </div>  <br>
          
        
          <!--successmessage part-->
                 <?php if (isset($_SESSION['message'])): ?>
	  <div class="cast">
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
          
          
          
          
          
          <form method="post" action="sessionsdb.php" >
         
                
                
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                
                
                

                
			<label>Change to:</label>
<select name="status" class="dropdown">
  <option  value="Registration/verification ongoing">Registration/Verification in process</option>
  <option  value="Voting ongoing">Open For Voting</option>
  <option  value="Closed for counting">Closed For Counting</option>
  <option  value="No elections in progress">Complete Election Process</option>
</select>
 <br><br>
                
                
                <div class="Input-group1">
                <?php if ($update == true): ?>
		<button class="btn" type="submit" name="update" ><i class="fa fa-refresh">Validate Changes</i></button>&emsp;
<?php else: ?>
             
             <button class="btn" type="submit" name="update" disabled><i class="fa fa-refresh">Validate Changes</i></button>       
                    <?php endif; ?>
                    </div>
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
