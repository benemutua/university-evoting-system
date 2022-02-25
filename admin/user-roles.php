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
  <input type="radio" name="tabset" id="tab1"  disabled>
  <label for="tab1">Create Sys Account</label>
  <!-- Tab 2 -->
  <input type="radio" name="tabset" id="tab2" checked>
  <label for="tab2">User Account Roles</label>
  <!-- Tab 3 -->
  <input type="radio" name="tabset" id="tab3" disabled>
  <label for="tab3">Manage Accounts</label>
  
  <div class="tab-panels">
    <section id="registration" class="tab-panel">
/////
  </section>
      
      
      
      
      
      
      
      
      
    <section id="verification" class="tab-panel">
        
            <!--show message after user role is updated insertion-->
        <?php if (isset($_SESSION['message'])): ?>
	<div class="cast">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
        
               <!--show message after user role is reset-->
        <?php if (isset($_SESSION['err'])): ?>
	<div class="err">
		<?php 
			echo $_SESSION['err']; 
			unset($_SESSION['err']);
		?>
	</div>
<?php endif ?>
   
        
   
        
        
        
        
        
        
        
        
<!-- code the search button separately and implement form action for that specific button-->
<?php
            
function filterTable($query){
    $link=mysqli_connect('127.0.0.1','root','1234567','e-voting');
$filter_Result = mysqli_query($link,$query);
    return $filter_Result;
}
                                               
//coding the search button
if(isset($_POST['search'])){
  $valueToSearch= $_POST['valueToSearch'];
$query = "SELECT * FROM users WHERE username LIKE '%$valueToSearch%' OR name LIKE '%$valueToSearch%' OR  role LIKE '%$valueToSearch%' OR 
email LIKE '%$valueToSearch%' ORDER BY id DESC";
    $result = filterTable($query);
  
}
else{
 $query = "SELECT * FROM users ORDER BY id DESC";
    $result= filterTable($query);
}

?>
        
        
<form action="usersdb.php" method="post">
<!--bulk actions-->
<div class="Input-group1">
<input type="text" name="valueToSearch" value="" class="search" placeholder="Type here..">
<button type="submit" formaction="user-roles.php" class="btn"  name="search"><i class="fa fa-search">search</i></button> 
</div>
        

          
          <table class="table table-striped table-advance table-hover" >
          <tr bgcolor="gainsboro">
              <th>#</th>
              <th>USERNAME</th>
              <th>EMAIL</th>
              <th>ROLE</th>
              <th colspan="4">Change Role To</th>
              <th>Action</th>
              </tr>
        
<?php if($result->num_rows>0): ?>        
<?php while ($row = mysqli_fetch_array($result)) { ?>
		<tr>
            <td><input type="checkbox" name="check[]"></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
            <td><?php echo $row['role']; ?></td>
			
            
            
            <!--if user is a voter or admin account, disable-->
            <td>
            <?php if($row['role']=='voter' OR $row['role']=='admin' OR $row['role']=='s_a'): ?>
          <disabled a href="#?voter=<?php echo $row['id']; ?>" class="edit_disabled" ><i class="fa fa-ban">voter</i></a>
            <?php else: ?>
            <a href="usersdb.php?voter=<?php echo $row['id']; ?>" class="edit_btn" ><i class="fa fa-user">Voter</i></a>
            <?php endif; ?>
            </td>
            
            
             <!--if user is a candidate or admin account, disable-->
            <td>
             <?php if($row['role']=='candidate' OR $row['role']=='admin' OR $row['role']=='s_a'): ?>
          <disabled a href="#?cand=<?php echo $row['id']; ?>" class="edit_disabled" ><i class="fa fa-ban">cand</i></a>
            <?php else: ?>
            <a href="usersdb.php?cand=<?php echo $row['id']; ?>" class="edit_btn" ><i class="fa fa-user">cand</i></a>
            <?php endif; ?>
            </td>
            
            
            
            
            <!--if user is a clerk or admin account, disable-->
            <td>
             <?php if($row['role']=='clerk' OR $row['role']=='admin' OR $row['role']=='s_a'): ?>
          <disabled a href="#?clerk=<?php echo $row['id']; ?>" class="edit_disabled" ><i class="fa fa-ban">clerk</i></a>
            <?php else: ?>
            <a href="usersdb.php?clerk=<?php echo $row['id']; ?>" class="edit_btn" ><i class="fa fa-user">clerk</i></a>
            <?php endif; ?>
            </td>
            
            
            
            <!--if user is a management  or admin account, disable-->
            <td>
             <?php if($row['role']=='mngnt' OR $row['role']=='admin' OR $row['role']=='s_a'): ?>
          <disabled a href="#?mngnt=<?php echo $row['id']; ?>" class="edit_disabled" ><i class="fa fa-ban">Mngnt</i></a>
            <?php else: ?>
            <a href="usersdb.php?mngnt=<?php echo $row['id']; ?>" class="edit_btn" ><i class="fa fa-user">Mngnt</i></a>
            <?php endif; ?>
            </td>
            
            
            
                 <!--you can not reset an admin or s_a account-->
              <td>
                  <?php if($row['role']=='admin' OR $row['role']=='s_a'): ?>
          <disabled a href="#?reset=<?php echo $row['id']; ?>" class="del_btn" ><i class="fa fa-ban">reset</i></a>
            <?php else: ?>
            <a href="usersdb.php?reset=<?php echo $row['id']; ?>"
             onclick="return confirm ('Confirm Reseting the account ID <?php echo $row['id'] ?> ?')"
            class="del_btn" ><i class="fa fa-question">Reset</i></a>
                  <?php endif; ?>
            </td>
            
            
            
            
            
            
            
            
            
            
            
            
            

  
            
       

		</tr>
	<?php } ?>
		<?php else: ?>
	<tr><td colspan="10"><i class="fa fa-remove">No matches</i></td></tr>
	<?php endif; ?>
 
          </table>
        
        </form>   
        
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
        
</body>

</html>
