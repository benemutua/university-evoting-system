<!---------------------------------------
import header and the database codes
----------------------------------------->
<?php require_once('votingdb.php'); ?>
<?php require_once('header.php'); ?>

   


<!-----------------------------------------
start of main content
------------------------------------------>    
<div class="main">
<div class="main-inner">

<div class="history-con">
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
<tr>
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
<tr>
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
<tr>
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
<tr>
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
<tr>
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
<tr>
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
   
    
<h4>REP PERSONS WITH DISABILITIES</h4>
<table class="table table-bordered">
<tr>
<th width="40%">Candidate Name:</th>
<th>Votes count:</th>
</tr>
<?php
//rep_disabilities votes tally
$sql="SELECT rep_disabilities, count(rep_disabilities) as rep_disabilities_count FROM votesdata  GROUP by rep_disabilities ORDER BY count(*) DESC; ";
$result= mysqli_query($link, $sql);
while($row=mysqli_fetch_array($result)){
    
echo "<tr><td>". $row['rep_disabilities']. "</td><td>" .$row['rep_disabilities_count']. "</td></tr>";
}
?></table> <!-- end of rep_non_residents table-->    
    
    
    
    
    
    
    
    
    
</div>	<!-- end of history container-->	   
</div> <!-- /widget-content -->
</div><!--main inner-->
    
    

<!-- loading javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.7.2.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>

