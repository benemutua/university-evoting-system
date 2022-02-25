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
  
<!-- deny voting if the logged in user is not a voter or candidate-->
<?php
$query="SELECT * FROM users WHERE username= '".$_SESSION['username']."' ";
$result=mysqli_query($link,$query); ?>
<?php while($row=mysqli_fetch_array($result)){ ?>

  <?php  if(($row['role'])=='admin'): ?>
     <div class="solutions">
<p><i class='icon-warning-sign'>Login as a standard user to be able to fetch data. Thank you</i><br>
Return to home <a href="index.php">Here</a></p>
    </div>
 <?php else: ?> <!-- now show the page if the account logged in is not admin/clerk o/management a/c-->    
    
    

    
    
    
    
<?php
$sql="SELECT * FROM votesdata  WHERE voter_id=' ".$_SESSION['username']." ' ORDER BY id DESC ";
$results = mysqli_query($link,$sql) ?>   
<?php while ($row = mysqli_fetch_array($results)) { ?>    

 <table class="table table-bordered">
  <tr>
<th>Election Year</th>
      <th>Position</th>
      <th>Candidate</th>
     </tr>      
        
<tr><td rowspan="12" bgcolor="whitesmoke" width="100px"><font size="3" color="steelblue"><b><?php echo $row['year']; ?></b></font></td>
<td width="250px"><b>President:</b></td>
<td width="700px">
    <?php echo $row['president']; ?></td></tr>

<tr>
<td width="250px"><b>Vice President:</b></td>
<td width="700px"> <?php echo $row['vice_president']; ?></td> </tr>
     
<tr>
<td width="250px"><b>Sec General:</b></td>
<td width="700px">
<?php echo $row['sec_general']; ?></td> </tr>     

<tr>
<td width="250px"><b>Finance Head:</b></td>
<td width="700px"><?php echo $row['finance_head']; ?></td> </tr>
     
<tr>
<td width="250px"><b>Ladies' Rep:</b></td>
<td width="700px"><?php echo $row['ladies_rep']; ?></td> </tr>
     
<tr>
<td width="250px"><b>Rep Non Residents:</b></td>
<td width="700px"><?php echo $row['rep_non_residents']; ?></td> </tr>     
     
<tr>
<td width="250px"><b>Rep Disabilities:</b></td>
<td width="700px"><?php echo $row['rep_disabilities']?></td> </tr>
     
<tr>
<td width="250px"><b>School of Business:</b></td>
<td width="700px"><?php echo $row['school_business']?></td> </tr>
<tr>
<td width="250px"><b>School of education:</b></td>
<td width="700px"><?php echo $row['school_education']?></td> </tr>
<tr>
<td width="250px"><b>School of engineering:</b></td>
<td width="700px"><?php echo $row['school_engineering']?></td> </tr>
<tr>
<td width="250px"><b>School of Humanities:</b></td>
<td width="700px"><?php echo $row['school_humanities']?></td> </tr>
<tr>
<td width="250px"><b>School of Hospitality:</b></td>
<td width="700px"><?php echo $row['school_hospitality']?></td> </tr>     
     
</table>
<?php   } ?>
    
    
    
</div>	<!-- end of history container-->	   
</div> <!-- /widget-content -->
</div><!--main inner-->
    
    

<!-- loading javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.7.2.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>

<?php endif; }?>