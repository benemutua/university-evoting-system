<?php require_once('votersdb.php'); ?>

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
         <hr>
<div class="tabset">
 
  <!-- Tab 2 -->
  <input type="radio" name="tabset" id="tab2" checked>
 <div class="tab-panels">
<section id="candidate" class="tab-panel">


                    <!--show success message after approval-->
        <?php if (isset($_SESSION['message'])): ?>
	<div class="cast">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
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
$query = "SELECT * FROM voters WHERE name LIKE '%$valueToSearch%' OR admn_no LIKE '%$valueToSearch%' ORDER BY id DESC";
    $result = filterTable($query);
}
else{
 $query = "SELECT * FROM voters WHERE role='candidate' ORDER BY id DESC ";
    $result= filterTable($query);

}
?>          
          
          
          
<form action="votersdb.php" method="post" >
<div class="Input-group1">
<input type="text"  name="valueToSearch" value="" class="search" placeholder="seach here..">       
<button type="submit" formaction="verify-cand.php" name="searchbtn" class="btn"><i class="fa fa-search">Search</i> </button>             
<button type="submit" name="bulk_verify_cand" class="btn"><i class="fa fa-group">Bulk Verify</i></button>
<button type="submit" name="print_selected" class="btn-reset"><i class="fa fa-print">Print_selected</i></button>       
</div>          
          
          
          <table class="table table-striped table-advance table-hover" >
          <tr bgcolor="gainsboro">
              <th>select</th>
              <th>ADMN NO</th>
              <th>NAME</th>
              <th>STATUS</th>
              <th colspan="2">ACTIONS.</th>
              </tr>
        
<?php if($result->num_rows>0): ?>
    <?php while ($row = mysqli_fetch_array($result)) { ?>
		<tr>
             <input type="hidden" name="checkbox[]" value="0">
            <td><input type="checkbox" name="checkbox[]" value="<?php echo $row['id']; ?>"></td>
			<td><?php echo $row['admn_no']; ?></td>
			<td><?php echo $row['name']; ?></td>
            <td><?php echo $row['status']; ?></td>
			
                
               
          
           
            <td>
                <?php if($row['status']=='active'): ?>
            <disable a href="#?verify_c=<?php echo $row['id']; ?>" class="edit_disabled" ><i class="fa fa-ban">Verified</i></a>
                <?php else: ?>
                <a href="votersdb.php?verify_c=<?php echo $row['id']; ?>"
                   onclick="return confirm ('Verify voter ID <?php echo $row['id'] ?> after having confirmed their details  ?')"
                   class="edit_btn" ><i class="fa fa-check">Verify</i></a>
                <?php endif; ?>
            </td>
             <td>
				<a href="profile-info.php?viewvoter=<?php echo $row['id']; ?>" class="factory_btn" target='_blank'><i class="fa fa-eye">View</i></a>
            </td>

		</tr>
	<?php } ?>
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
