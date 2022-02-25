<?php require_once('usersdb.php'); ?>

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
             

          
          
          
          
          
          
<div class="tabset">
  <!-- Tab 1 -->
  <input type="radio" name="tabset" id="tab1"  checked>
  <label for="tab1">Create System Account</label>
 
  
  <div class="tab-panels">
    <section id="register" class="tab-panel">

        <!--message part-->
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
        
        
        
        <!--user regitrsation panel-->
        <form method="post" action="usersdb.php" >      
            

            
            <input type="hidden" name="id" value="<?php echo $id; ?>"> 
            
            
         <div class="input-group1">
			<label>Full names:</label>
			<input type="text" name="name" value="<?php echo $name; ?>" >
		</div>
            
		<div class="input-group1">
			<label>Username:</label>
			<input type="text" name="username" value="<?php echo $username; ?>" >
		</div>
		<div class="input-group1">
			<label>Email:</label>
			<input type="email" name="email" value="<?php echo $email; ?>" >
		</div>
            <?php if($update==true): ?>
            <?php else: ?>
           <div class="input-group1">
            <label>Password:(<font color="grey">Default</font>)</label>
               <input type="password" name="password" value="00000" >
            </div>
            
            <?php endif; ?>
           
            
            
           
            
            
            
            
            
            
            
            
            
           <?php if($update==true): ?>
            <label>Change Role to:</label>
            <select name="role" class="dropdown" required>
                <option></option>
              <option value="voter">Voter</option>
                <option value="candidate">Candidate</option>
                <option value="clerk">Polling Clerk</option>
                <option value="mngnt">Management A/c</option>
              </select>
            
            
            <?php else: ?> 
            <label>Role:</label> 
            <select name="role" class="dropdown" >
                
                <option></option>
              <option value="voter">Voter</option>
                <option value="candidate">Candidate</option>
                <option value="clerk">Polling Clerk</option>
                <option value="mngnt">Management A/c</option>
              </select>
            <?php endif; ?>
            
            
            
            
            
		<div class="input-group1">
            <?php if($update==true): ?>
            <button class="btn" type="submit" name="update" ><i class="fa fa-refresh">Update</i></button>&emsp;
            <?php else: ?>
			<button class="btn" type="submit" name="add" ><i class="fa fa-check">Create User</i></button>&emsp;
            <button class="btn-reset" type="reset"><i class="fa fa-close">Clear Fields</i></button>
            <?php endif; ?>
		</div>
	</form>
  
      
      
      
      
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
        
</body>

</html>
