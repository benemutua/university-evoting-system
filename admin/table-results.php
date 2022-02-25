
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
  

  

        
   <font color="steelblue"><b>ELECTION 
<?php
$query="SELECT * FROM election_year WHERE active='1' ";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
 $election_year=$row['year'];  
    
    echo  "<font color='red'> $election_year </font>";
} ?>
     
     TALLY RESULTS</b></font>     
     
     
     
     
    
<h4>PRESIDENT</h4>
<table class="table table-bordered">
<tr bgcolor="whitesmoke">
<th width="40%">Candidate Name:</th>
<th>Votes count:</th>
</tr>
<?php
//president votes tally
$sql="SELECT president, count(president) as president_count FROM votesdata  GROUP by president ORDER BY count(*) DESC;  ";
$result= mysqli_query($link, $sql);
while($row=mysqli_fetch_array($result)){
    
echo "<tr><td>". $row['president']. "</td><td>" .$row['president_count']. "</td></tr>";    

}
?></table><!--end of president table-->   
 

<h4>VICE PRESIDENT</h4>
<table class="table table-bordered">
<tr bgcolor="whitesmoke">
<th width="40%">Candidate Name:</th>
<th>Votes count:</th>
</tr>
<?php    
//vice president votes tally
$sql="SELECT vice_president, count(vice_president) as vice_president_count FROM votesdata  GROUP by vice_president ORDER BY count(*) DESC 
; ";
$result= mysqli_query($link, $sql);
while($row=mysqli_fetch_array($result)){
    
echo "<tr><td>". $row['vice_president']. "</td><td>" .$row['vice_president_count']. "</td></tr>";
}
?></table> <!-- end of sec table--> 
   

    
<h4>SECRETARY GENERAL</h4>
<table class="table table-bordered">
<tr bgcolor="whitesmoke">
<th width="40%">Candidate Name:</th>
<th>Votes count:</th>
</tr>
<?php
//sec general votes tally
$sql="SELECT sec_general, count(sec_general) as sec_general_count FROM votesdata  GROUP by sec_general ORDER BY count(*) DESC; ";
$result= mysqli_query($link, $sql);
while($row=mysqli_fetch_array($result)){
    
echo "<tr><td>". $row['sec_general']. "</td><td>" .$row['sec_general_count']. "</td></tr>";
}
?></table> <!-- end of sec table-->     
    
    
    
<h4>FINANCE HEAD</h4>
<table class="table table-bordered">
<tr bgcolor="whitesmoke">
<th width="40%">Candidate Name:</th>
<th>Votes count:</th>
</tr>
<?php
//finance head votes tally
$sql="SELECT finance_head, count(finance_head) as finance_head_count FROM votesdata  GROUP by finance_head ORDER BY count(*) DESC; ";
$result= mysqli_query($link, $sql);
while($row=mysqli_fetch_array($result)){
    
echo "<tr><td>". $row['finance_head']. "</td><td>" .$row['finance_head_count']. "</td></tr>";
}
?></table> <!-- end of finance head table-->    
    
    
    
<h4>LADIES REP</h4>
<table class="table table-bordered">
<tr bgcolor="whitesmoke">
<th width="40%">Candidate Name:</th>
<th>Votes count:</th>
</tr>
<?php
//ladies rep votes tally
$sql="SELECT ladies_rep, count(ladies_rep) as ladies_rep_count FROM votesdata  GROUP by ladies_rep ORDER BY count(*) DESC; ";
$result= mysqli_query($link, $sql);
while($row=mysqli_fetch_array($result)){
    
echo "<tr><td>". $row['ladies_rep']. "</td><td>" .$row['ladies_rep_count']. "</td></tr>";
}
?></table> <!-- end of ladies rep table-->  
    
    
    
<h4>NON RESIDENTS REP</h4>
<table class="table table-bordered">
<tr bgcolor="whitesmoke">
<th width="40%">Candidate Name:</th>
<th>Votes count:</th>
</tr>
<?php
//rep_non_residents votes tally
$sql="SELECT rep_non_residents, count(rep_non_residents) as rep_non_residents_count FROM votesdata  GROUP by rep_non_residents ORDER BY count(*) DESC; ";
$result= mysqli_query($link, $sql);
while($row=mysqli_fetch_array($result)){
    
echo "<tr><td>". $row['rep_non_residents']. "</td><td>" .$row['rep_non_residents_count']. "</td></tr>";
}
?></table> <!-- end of rep_non_residents table-->        
        
        
        
        

  
            
        
          
          
    </section><!-- /wrapper -->
</section> <!-- /MAIN CONTENT -->
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
