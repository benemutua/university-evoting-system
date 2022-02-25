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
          
           <!--show delete message after delete->
        <?php if (isset($_SESSION['message'])): ?>
	<div class="err">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
          
                <!--show success message after edit-->
        <?php if (isset($_SESSION['success'])): ?>
	<div class="cast">
		<?php 
			echo $_SESSION['success']; 
			unset($_SESSION['success']);
		?>
	</div>
<?php endif ?>
                   <!--error message after delete-->
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
$query = "SELECT * FROM voters WHERE name LIKE '%$valueToSearch%' OR admn_no LIKE '%$valueToSearch%' OR email LIKE '%$valueToSearch%' OR school LIKE '%$valueToSearch%' OR position LIKE '%$valueToSearch%' OR status LIKE '%$valueToSearch%' OR role LIKE '%$valueToSearch%' ORDER BY id DESC";
    $result = filterTable($query);
}                                               
else{
 $query = "SELECT * FROM voters ORDER BY id DESC";
    $result= filterTable($query);

}
                                               

                                               
?>
          
<form action="votersdb.php" method="post" >  
    
    
    <!----the things to do to facilitate printing------>
    
    <input type="text"  name="title" value="" placeholder="  *Type the Printout title here...." style="width:100%; height:30px; border-radius:5px;border:1px solid steelblue; font-size:13px;">
    <p>Filter To Print By:</p>
    
    <b>Role:</b>
    <select class="ins" name="role1">
    <option value=""></option>
    <option>Voter</option>
    <option>Candidate</option>
    </select>
    
     <b>School:</b>
    <select class="ins" name="school1">
      <option value=""></option>
     <option value="school of business">School of Business</option>
  <option value="school of education">School of Education</option>
    <option value="school of hospitality & tourism">School of Hospitality and Tourism</option>
    <option value="school of engineering & technology">School of Engineering and Technology</option>
     <option value="school of humanities & health sciences">School of Humanities and Health Sciences</option>
</select>
    
     <b>Status:</b>
    <select class="ins" name="status1">
    <option value=""></option>
    <option>Active</option>
    <option>Inactive</option>
    </select>
   <button type="submit" name="print"  class="btn" onclick= "target = '_blank'"><i class="fa fa-print">Print</i></button>
    
 <br><br>
  <!----after this now print ---------------------->
    
    
    
    
<div class="Input-group1">
<input type="text"  name="valueToSearch" value="" class="search1" placeholder="seach here..">       
<button type="submit" formaction="manage-voter.php" name="searchbtn" class="btn"><i class="fa fa-filter">Filter_Search</i> </button>             
<button type="submit" name="bulk_del" class="btn-reset"><i class="fa fa-trash">Bulk_delete</i></button>       
</div>
        
<div class="row-con">
<table class="table table-striped table-advance table-hover" >            
          <tr bgcolor="gainsboro">
              
              <th>#</th>
              <th>Admn No</th>
              <th>Full Names</th>
              <th>Nickname</th>
              <th>Role</th>
              <th>Status</th>
              <th>Edit v</th>
              <th>Edit c</th>
              <th colspan="3">General Actions</th>
              </tr>
        
<?php if($result->num_rows>0): ?>
<?php while ($row = mysqli_fetch_array($result)) { ?>
		<tr>
             <input type="hidden" name="checkbox[]" value="0">
            <td><input type="checkbox" name="checkbox[]" value="<?php echo $row['id']; ?>"></td>
			<td><?php echo $row['admn_no']; ?></td>
			<td><?php echo $row['name']; ?></td>
            <td><?php echo $row['nickname']; ?></td>
            <td><?php echo $row['role']; ?></td>
             <td><?php echo $row['status']; ?></td>
			
                
               
          
            <td>
               
                <?php if($row['role']=='candidate'): ?>
                <disabled a href="register-voter.php?edit=<?php echo $row['id']; ?>" class="edit_disabled" ><i class="fa fa-ban">voter</i></a>
                <?php else: ?>
				<a href="register-voter.php?edit=<?php echo $row['id']; ?>" class="edit_btn" ><i class="fa fa-edit">voter</i></a>
                <?php endif; ?>
            </td>
            
            
            <td>
                <?php if($row['role']=='voter'): ?>
                <disabled a href="register-candidate.php?alter=<?php echo $row['id']; ?>" class="edit_disabled" ><i class="fa fa-ban">cand</i></a>
                <?php else: ?>
            <a href="register-candidate.php?alter=<?php echo $row['id']; ?>" class="edit_btn" ><i class="fa fa-pencil">cand</i></a>
                <?php endif; ?>
            </td>
            
             <td>
				<a href="register.php?change_role=<?php echo $row['id']; ?>"
                   onclick="return confirm ('Are you sure you want to change  role for <?php echo $row['name'] ?> on Voters database ?')" 
                   class="factory_btn" ><i class="fa fa-edit"></i></a>
            </td>
            
            
            
            <td>
				<a href="votersdb.php?delete=<?php echo $row['id']; ?>"
                   onclick="return confirm ('Confirm Deleting <?php echo $row['name'] ?> from Voters ?')" 
                   class="del_btn" ><i class="fa fa-trash">Del</i></a>
            </td>
            <td>
            <a href="profile-info.php?viewvoter=<?php echo $row['id']; ?> " class="factory_btn" target = '_blank'><i class="fa fa-eye"></i></a>
            </td>

		</tr>
    <?php } ?>
    <?php else: ?>
<tr><td colspan="14"><i class="fa fa-remove"></i>No matches Found!</td></tr>
<?php endif; ?>
 
          </table>
          
            
          
        </div>
       </form>   
          
    </section><!-- /wrapper -->
</section>
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
