<?php require_once('usersdb.php');  ?>


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
  <input type="radio" name="tabset" id="tab2" disabled>
  <label for="tab2">User Account Roles</label>
  <!-- Tab 3 -->
  <input type="radio" name="tabset" id="tab3" checked>
  <label for="tab3">Manage Accounts</label>
  
  <div class="tab-panels">
    <section id="registration" class="tab-panel">
/////
  </section>
    <section id="roles" class="tab-panel">
 /////////////////////
    </section>
      

      
      
      
      
    <section id="manage" class="tab-panel">
        
        <!--show message reset insertion-->
        <?php if (isset($_SESSION['message'])): ?>
	<div class="cast">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
        
           <!--show error on bulk delete or bulk reset-->
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
if(isset($_POST['searchbtn'])){
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

        
   
        <form method="post" action="usersdb.php" >
        
        <div class="Input-group1">
        <input type="text" name="valueToSearch" value="" class="search" placeholder="Type here..">
             <button type="submit" class="btn" formaction="manage-user.php" name="searchbtn"><i class="fa fa-search">search</i></button> 
           <button type="submit" class="btn-reset" name="res"><i class="fa fa-refresh">Bulk Reset</i></button> 
        <button type="submit" class="btn-reset" name="deleted"><i class="fa fa-trash">Bulk Delete?</i></button>
            <button type="submit" class="factory_btn" name="print"><i class="fa fa-print">print</i></button>
        </div>

            <!--start of the table -->
            
          <table class="table table-striped table-advance table-hover" >
          <tr bgcolor="gainsboro">
              <th>#</th>
              <th>DATE CREATED</th>
              <th>USERNAME</th>
              <th>EMAIL</th>
              <th>ROLE</th>
              
              <th colspan="3">Actions..</th>
              </tr>
        
  <?php if($result->num_rows>0): ?>      
  <?php while($row = mysqli_fetch_array($result)): ?>
		<tr>
            
            
            <?php if($row['role']=='admin' OR $row['role']=='s_a' ): ?>
            <input type="hidden" name="checkbox[]" value="0">
            <td><disabled input type="checkbox" name="checkbox[]" value="<?php echo $row['id']; ?>"></td>
            <?php else: ?>
            <input type="hidden" name="checkbox[]" value="0">
            <td><input type="checkbox" name="checkbox[]" value="<?php echo $row['id']; ?>"></td>
            <?php endif; ?>
            
            <td><?php echo $row['reg_date']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
            <td><?php echo $row['role']; ?></td>
            
            
            
              <td>
                  <?php if($row['role']=='admin' OR $row['role']=='s_a'): ?>
                   <disabled a href="#?edit_btn=<?php echo $row['id']; ?>" class="edit_btn" ><i class="fa fa-ban">Edit</i></a>
                  <?php else: ?>
            <a href="create-user.php?edit_btn=<?php echo $row['id']; ?>" class="edit_btn" ><i class="fa fa-edit">Edit</i></a>
                  <?php endif; ?>
            </td>
            
            
            
            
            <td>
                  <?php if($row['role']=='admin' OR $row['role']=='s_a'): ?>
                   <disabled a href="#?reset_ac=<?php echo $row['id']; ?>" class="btn-reset" ><i class="fa fa-ban">Reset</i></a>
                  <?php else: ?>
            <a href="usersdb.php?reset_ac=<?php echo $row['id']; ?>"
               onclick="return confirm ('Confirm Reseting the account ID <?php echo $row['id'] ?> ?')"
               class="btn-reset" ><i class="fa fa-question">Reset</i></a>
                  <?php endif; ?>
            </td>
            
            
            
            <td>
                <?php if($row['role']=='admin'): ?>
                   <disabled a href="#?del=<?php echo $row['id']; ?>" class="btn-reset" ><i class="fa fa-ban">Del</i></a>
                  <?php else: ?>
				<a href="usersdb.php?del=<?php echo $row['id']; ?>" 
                  onclick="return confirm ('Confirm Deleting Accountholder ID <?php echo $row['id'] ?> ?')" 
                   class="btn-reset" ><i class="fa fa-trash">del</i></a>
               <?php endif; ?>
            </td>
            
		</tr>
	<?php endwhile; ?>
		<?php else: ?>
	<tr><td colspan="10"><i class="fa fa-remove">No matches</i></td></tr>
	<?php endif; ?>
 
          </table>
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
