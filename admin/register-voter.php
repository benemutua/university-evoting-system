<?php require_once('votersdb.php');?>

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
  <label for="tab1">Register Voter</label>
 
  
  
  <div class="tab-panels">
    <section id="voter" class="tab-panel">
   
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

            
           
<input type="hidden" name="id" value="<?php echo $id; ?>">
             
        
<div class="rowflex">
    <br>
    <font color="darkblue"><b>PERSONAL DETAILS:</b></font><br>
        
        
<div class="colum">
    
 <label>Full names</label>
 <input type="text" id="line"  name="name" value="<?php echo $name; ?>"  >
  
 <label>Email:</label>
<input type="email" id="line" name="email" value="<?php echo $email; ?>" >               
    
    
</div><!--end of column-->

                 <!--start of column-->
<div class="colum">
<label>Admn Number:</label>
<input type="text" id="line" name="admn_no" value="<?php echo $admn_no; ?>" > 

 <label>School:</label>
<select name="school"   id="line" required>
    <option ></option>
     <option value="school of business">School of Business</option>
  <option value="school of education">School of Education</option>
    <option value="school of hospitality & tourism">School of Hospitality and Tourism</option>
    <option value="school of engineering & technology">School of Engineering and Technology</option>
     <option value="school of humanities & health sciences">School of Humanities and Health Sciences</option>
</select>               
                 
</div>
</div> <!--end of row flex-->
             
             
                
<font color="darkblue"><b>ELECTORAL DATA</b></font>  
             
             
<label>Role:</label>
<select name="role" class="dropdown">
     <option value="voter">Voter</option>
  <option disabled value="candidate">Candidate</option>
</select>
            

<label>Position:</label>
<select name="position" class="dropdown">
    <option value="N/A">n/a</option>
     <option disabled value="president">President</option>
  <option disabled value="vice president">Vice President</option>
    <option disabled value="sec general">Sec General</option>
    <option disabled value="finance head">Finance Head</option>
    <option disabled value="ladies rep">Ladies Rep</option>
    <option disabled value="non residents rep">Non Residents Rep</option>
    <option disabled value="rep persons with disabilities">Persons with Disabilities Rep</option>
    <option disabled value="rep school of business">Rep School of Business</option>
    <option disabled value="rep school of education">Rep School of Education</option>
    <option disabled value="rep school of hospitality & tourism">Rep School of Hospitality & Tourism</option>
    <option disabled value="rep school of engineering & technology">Rep School of Engineering & Technology</option>
    <option disabled value="rep school of humanities & health sciences">Rep School of Humanities & Health Sciences</option>
</select>

                           
            

<label>Category:</label>
<select name="category" class="dropdown">
    <option value="N/A">n/a</option>
     <option disabled value="general">General</option>
  <option disabled value="school rep">School Rep</option>
</select>


<label>Status:</label>
<select name="status" class="dropdown">
     <option value="active">Active</option>
  <option disabled value="inactive">Inactive</option>
</select>

            
            
            
            
<div class="input-group1">
<?php if ($update == true): ?>
<button class="btn" type="submit" name="update" ><i class="fa fa-refresh">Update record</i></button>&emsp;
<?php else: ?>
<button class="btn" type="submit" name="save" ><i class="fa fa-check">Register Voter</i></button>&emsp;
<button class="btn-reset" type="reset"><i class="fa fa-close">Clear Fields</i></button>
<?php endif; ?>
</div>
</form>
  
        
        
        
  </section>
 
    
  </div> <!--close the tabpanels-->
  
</div>  <!--close the tabset-->
            
        
          
          
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
