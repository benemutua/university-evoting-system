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
  <title>votes</title>

  <!-- Favicons -->
  <link href="img/vote.png" rel="icon">
  

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  
    <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
    

    </head>
    <body style="font-size:13px; background:url();">

    <hr> 
    
              
<!-- code the search button separately and implement form action for that specific button-->
<?php
function filterTable($query){
$link=mysqli_connect('127.0.0.1', 'root', '1234567', 'e-voting');
$filter_Result = mysqli_query($link,$query);
return $filter_Result;
}
                                               
//coding the search button
if(isset($_POST['searchbtn'])){
  $valueToSearch= $_POST['valueToSearch'];
$query = "SELECT * FROM votesdata WHERE year LIKE '%$valueToSearch%'  ORDER BY id DESC";
    $result = filterTable($query);
}                                               
else{
 $query = "SELECT * FROM votesdata ORDER BY id DESC";
    $result= filterTable($query);

}
                                               

                                               
?>
          
<form action="votes.php" method="post" >  
    
<div class="Input-group1">
     <b>Election Year:</b>
    <select class="ins" name="valueToSearch">
    <option value=""></option>
    <option value="2019/2020">2019/2020</option>
         <option value="2020/2021">2020/2021</option>
         <option value="2021/2022">2021/2022</option>
         <option value="2022/2023">2022/2023</option>
         <option value="2023/2024">2023/2024</option>
         <option value="2024/2025">2024/2025</option>
         <option value="2025/2026">2025/2026</option>
         <option value="2026/2027">2026/2027</option>
         <option value="2027/2028">2027/2028</option>
         <option value="2028/2029">2028/2029</option>
         <option value="2029/2030">2029/2030</option>
         <option value="2030/2031">2030/2031</option>
         <option value="2031/2032">2031/2032</option>
    </select>
    
    
<button type="submit"  name="searchbtn" class="btn"><i class="fa fa-filter">Filter_Search</i> </button> 
<!--this button returns to the most recent opened tab-->
<button type="button" class="btn-reset" onclick="history.back()" ><i class="fa fa-undo">Go Back</i></button>

<b>Total Votes:</b>
<input type="text" name="votes_count" value="">
</div>
        
<table class="table table-bordered" >
<tr bgcolor="whitesmoke">
    <th>V.No:</th>
    <th>President</th>
    <th>Vice-president</th>
    <th>Sec General</th>
    <th>Finance</th>
    <th>Ladies-Rep</th>
    <th>Non-Residents</th>
    <th>Disabilities</th>
    <th>School of business</th>
    <th>School of education</th>
    <th>School of engineering</th>
    <th>School of humanities</th>
    <th>School of hospitality</th>
    <th>El Year</th>
        </tr>
 <?php if($result->num_rows >0): ?>     
<?php while ($row = mysqli_fetch_array($result)) { ?>
 

<tr>
<td><?php echo $row['id']; ?></td>
    <td><?php echo $row['president']; ?></td> 
  <td><?php echo $row['vice_president']; ?></td>
  <td><?php echo $row['sec_general']; ?></td>
  <td><?php echo $row['finance_head']; ?></td>
  <td><?php echo $row['ladies_rep']; ?></td>
  <td><?php echo $row['rep_non_residents']; ?></td>
  <td><?php echo $row['rep_disabilities']; ?></td>
  <td><?php echo $row['school_business']; ?></td>
  <td><?php echo $row['school_education']; ?></td>
  <td><?php echo $row['school_engineering']; ?></td>
  <td><?php echo $row['school_humanities']; ?></td>
  <td><?php echo $row['school_hospitality']; ?></td>
  <td><?php echo $row['year']; ?></td>
</tr>

<?php } ?>
<?php else: ?>
<tr><td colspan="14"><i class="fa fa-remove"></i><b>No matches Found</b></td></tr>

<?php endif; ?>

</table>

 </form>       
  
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