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

<!-- -------------------------------------------------------------------
if logged in ac not registered and verified deny vote page
----------------------------------------------------------------------->
<?php
$sql = "SELECT * FROM voters WHERE admn_no= '".$_SESSION['username']."' AND status='active' ";
$results = $link->query($sql); ?>
<?php while($row = $results->fetch_assoc()){ ?>
<?php if ($results->num_rows > 0): ?>    
<!-- if some data found, now make the page visible--> 

    
    
    
    
    
    
<!-- ----------------------------------------------------------------------------------------------
deny access to voting page if the logged in user is not a voter or candidate
---------------------------------------------------------------------------------------------------->
<?php
$query="SELECT * FROM users WHERE username= '".$_SESSION['username']."' ";
$results=mysqli_query($link,$query); ?>
<?php while($row=mysqli_fetch_array($results)){ ?>

  <?php  if(($row['role'])=='admin'): ?>
    <p><i class='icon-warning-sign'>Login as a standard user to be able to fetch data. Thank you</i><br>
    Return to home <a href="index.php">Here</a></p>
 
    
<?php else: ?> <!-- now show the page if the account logged in is not admin/clerk o/management a/c-->
<!-----------------------------------------------------------------------------------------------------
statrt the voting form - each seat is in its own container for clarity
------------------------------------------------------------------------------------------------------>
<!-----------show message after insertion----------------------------------->
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
   
    

    
    
    
    
    
    
    
    
 <!-----------------------------------------start form
-------------------------------------------------------->   
<form method="post" action="votingdb.php" enctype="multipart/form-data">
    
 <span><i class="icon-list"><a href="cast-vote.php">list View</a></i>
           <i class="icon-table"><a href="cast-vote-grid.php">Grid View</a></i></span>   

    <div class="inactivate">
<p><font color="steelblue">This field is system generated and cannot be edited</font></p>
        
<!------------------------------------------------------------
the voters id will be voters username(admn_no)
-------------------------------------------------------------->   
<?php
echo 'VOTERS NUMBER:';
    echo '<input type="text" name="voter_id" value=" '.$_SESSION['username'].' "  class="line2" >';
?>  <br>      
 <!-----------------------------------------------------------------------
the election year is selected from election year table where active =1
------------------------------------------------------------------------->       
        
<?php
$query="SELECT * FROM election_year WHERE active='1' ";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
 $election_year=$row['year'];  
    
echo "ELECTION YEAR:" ; echo "&nbsp;&nbsp;&nbsp;";
    echo '<input type="text" name="election_year" value=" '.$row['year'].' " class="line2" >';
} ?>
</div><br>   <!-- end of the inactive container-->

<p>
       
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!---------------------------------------------------------------
start the position containers
---------------------------------------------------------------->      
<!--president container-->
<div class="ccontainerr">
<font color="steelblue"><h4>President</h4></font><br>
           
   <?php
$query="SELECT * FROM voters WHERE role='candidate' AND position='president' AND status='active'";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];	
    $nickname=$row['nickname'];
 $id=$row['id']; 
    

echo '<input type="radio"  name="president"  value="'.$row['name'].'" >' ;   
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="image" >';                           
echo $name ;
echo "-($nickname)";  ?>   <br> <br>                                      
<?php } ?>   
</div> <!-- end of search for presidential candidates-->
<br>
      

<!--vice president container-->
<div class="ccontainerr">
<font color="steelblue"><h4>Vice President</h4></font><br>
           
   <?php
$query="SELECT * FROM voters WHERE role='candidate' AND position='vice president' AND status='active'";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];	
    $nickname=$row['nickname'];
 $id=$row['id']; 
    

echo '<input type="radio" name="vice_president" value="'.$row['name'].'" >' ;   
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="image" >';                           
echo $name ;?>   <br> <br>                                      
<?php } ?>   
</div> <!-- end of search for vice presidential candidates-->
<br>
      
      
    
    
    

<!--sec gen container-->
<div class="ccontainerr">
<font color="steelblue"> <h4>Secretary General</h4></font><br>
   <?php
$query="SELECT * FROM voters WHERE role='candidate' AND position='sec general' AND status='active' ";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];					

echo '<input type="radio" name="sec_general" value=" '.$row['name'].' " >' ;     
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="image" >';                           
echo $name;?>   <br> <br>                                      
<?php }?>        
</div><!-- end of search for sec gen candidates-->
<br>
      
      
      
 
    
<!--Treasurer/Finance container-->
<div class="ccontainerr">
<font color="steelblue"> <h4>Head of Finance</h4></font><br>
   <?php
$query="SELECT * FROM voters WHERE role='candidate' AND position='finance head' AND status='active' ";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];	
   
   
echo '<input type="radio" name="finance_head" value=" '.$row['name'].' " >' ;     
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="image" >';                           
echo $name;?>   <br> <br>                                      
<?php }?>       
</div><!-- end of search for finance head candidates-->
<br>
    
      
      
      
      
      
<!--ladies rep container-->
<div class="ccontainerr">
<font color="steelblue"> <h4>Ladies Rep</h4></font><br>
   <?php
$query="SELECT * FROM voters WHERE role='candidate' AND position='ladies rep' AND status='active' ";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];					
 
echo '<input type="radio" name="ladies_rep" value=" '.$row['name'].' " >' ;     
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="image" >';                           
echo $name;?>   <br> <br>                                      
<?php }?>        
</div><!-- end of search for ladies rep candidates-->
<br>
    
    
    
    

<!--Non residents rep container-->
<div class="ccontainerr">
<font color="steelblue"> <h4>Non Residents Rep</h4></font><br>
   <?php
$query="SELECT * FROM voters WHERE role='candidate' AND position='non residents rep' AND status='active'";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];					
 
echo '<input type="radio" name="rep_non_residents" value=" '.$row['name'].' " >' ;     
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="image" >';                           
echo $name;?>   <br> <br>                                      
<?php }?>        
</div><!-- end of search for non residents rep candidates-->
<br>
    
    
    

<!--disabilitiesrep container-->
<div class="ccontainerr">
<font color="steelblue"> <h4>Rep Disabilities</h4></font><br>
   <?php
$query="SELECT * FROM voters WHERE role='candidate' AND position='rep persons with disabilities' AND status='active'";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];					
 
echo '<input type="radio" name="rep_disabilities" value=" '.$row['name'].' " >' ;     
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="image" >';                           
echo $name;?>   <br> <br>                                     
<?php }?>        
</div><!-- end of search for disabilities rep candidates-->
<br>    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!--some logics on the school voting so that one can not be allowed voting on else school-->    
<!--eg if you dont belong to school of business then you cannot vote on that school/candidates wont be displayed-->

 <!--rep school of business container-->
<div class="ccontainerr">
<font color="steelblue"> <h4>Rep school of Business</h4></font><br>
    <!--deny access if user not a member of school of business-->
<?php
$query="SELECT * FROM voters WHERE admn_no= '".$_SESSION['username']."' ";
$results=mysqli_query($link,$query); ?>
<?php while($row=mysqli_fetch_array($results)){ ?>

  <?php  if(($row['school'])=='school of business'): ?>
<!--now show results-->
    
<?php
$query="SELECT * FROM voters WHERE role='candidate' AND position='rep school of business' AND status='active'";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];					
 

echo '<input type="radio" name="school_business" value=" '.$row['name'].' " required>' ;     
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="image" >';                           
echo $name;?>   <br> <br>                                     
<?php  }?> 
    
    
<?php else: ?>
<font size="3" color="brown"><i class="icon-info-sign">denied</i></font>    
 <?php endif; }?>   
</div><!-- end of search for school rep candidates-->
<br> 
  
  
    
    
    
    
    
    
<!--rep education container-->
<div class="ccontainerr">
<font color="steelblue"> <h4>Rep school of education</h4></font><br>
    <!--deny access if user not a member of school of education-->
<?php
$query="SELECT * FROM voters WHERE admn_no= '".$_SESSION['username']."' ";
$results=mysqli_query($link,$query); ?>
<?php while($row=mysqli_fetch_array($results)){ ?>

  <?php  if(($row['school'])=='school of education'): ?>
<!--now show results-->
    
    
   <?php
$query="SELECT * FROM voters WHERE role='candidate' AND position='rep school of education' AND status='active'";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];					
 
echo '<input type="radio" name="school_education" value=" '.$row['name'].' " required>' ;     
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="image" >';                           
echo $name;?>   <br> <br>                                     
<?php  }?> 
    
    
<?php else: ?>
<font size="3" color="brown"><i class="icon-info-sign">denied</i></font>    
 <?php endif; }?>        
</div><!-- end of search for school rep candidates-->
<br>
  
    

 
    
    
 <!--rep engineering  container-->
<div class="ccontainerr">
<font color="steelblue"> <h4>Rep Engineering & Technology</h4></font><br>
<!--deny access if user not a member of school of engineering and technology-->
<?php
$query="SELECT * FROM voters WHERE admn_no= '".$_SESSION['username']."' ";
$results=mysqli_query($link,$query); ?>
<?php while($row=mysqli_fetch_array($results)){ ?>

<?php  if(($row['school'])=='school of engineering & technology'): ?>
<!--now show results-->    
    
    
<?php
$query="SELECT * FROM voters WHERE role='candidate' AND position='rep school of engineering & technology' AND status='active'";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];					
 
echo '<input type="radio" name="school_engineering" value=" '.$row['name'].' " required>' ;     
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="image" >';                           
echo $name;?>   <br> <br>                                     
<?php  }?> 
    
    
<?php else: ?>
<font size="3" color="brown"><i class="icon-info-sign">denied</i></font>    
 <?php endif; }?>         
</div><!-- end of search for school rep candidates-->
<br>   
    
 
    
    
    
    
    
    
    
    
<!--rep humanities container-->
<div class="ccontainerr">
<font color="steelblue"> <h4>Rep Humanities & Health sciences</h4></font><br>
<!--deny access if user not a member of school of humanities and health sciences-->
<?php
$query="SELECT * FROM voters WHERE admn_no= '".$_SESSION['username']."' ";
$results=mysqli_query($link,$query); ?>
<?php while($row=mysqli_fetch_array($results)){ ?>

<?php  if(($row['school'])=='school of humanities & health sciences'): ?>
<!--now show results--> 
    
    
<?php
$query="SELECT * FROM voters WHERE role='candidate' AND position='rep school of humanities & health sciences' AND status='active'";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];					
 
echo '<input type="radio" name="school_humanities" value=" '.$row['name'].' " required>' ;     
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="image" >';                           
echo $name;?>   <br> <br>                                     
<?php  }?> 
    
    
<?php else: ?>
<font size="3" color="brown"><i class="icon-info-sign">denied</i></font>   
 <?php endif; }?>       
</div><!-- end of search for school rep candidates-->
<br>    
    
    
    
    
    

    
    
    
    
<!--rep hospitality container-->
<div class="ccontainerr">
<font color="steelblue"> <h4>Rep Hospitality & Tourism</h4></font><br>
<!--deny access if user not a member of school of hospitality and tourism-->
<?php
$query="SELECT * FROM voters WHERE admn_no= '".$_SESSION['username']."' ";
$results=mysqli_query($link,$query); ?>
<?php while($row=mysqli_fetch_array($results)){ ?>

<?php  if(($row['school'])=='school of hospitality & tourism'): ?>
<!--now show results-->    
    
<?php
$query="SELECT * FROM voters WHERE role='candidate' AND position='rep school of hospitality & tourism' AND status='active'";
$result=mysqli_query($link,$query);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];					
 
echo '<input type="radio" name="school_hospitality" value=" '.$row['name'].' " required>' ;     
echo '<img src="data:image;base64, '.base64_encode($row['image']).' " id="image" >';                           
echo $name;?>   <br> <br>                                     
<?php  }?> 
    
    
<?php else: ?>
<font size="3" color="brown"><i class="icon-info-sign">denied</i></font>    
 <?php endif; }?>       
</div><!-- end of search for school rep candidates-->
<br>    
    
    
    
    
<!--the voting buttons-->
<button type="submit" class="btn" name="vote"><i class="icon-ok">CAST MY VOTE</i></button>
<button type="reset" class="btn-reset" ><i class="icon-trash">Clear inputs</i></button>
   
</form><!-------------------------------
end of form inputs
------------------------------------------>
  
  
    
    
    
    
    
 <?php endif; } ?>   

<?php else: ?>
    
    <h1>Not verified</h1>
       
    <?php endif; } ?>
     
    

    
</div><!----------------
end of history container
---------------------------->		

</div> <!-- /widget-content -->
</div><!--main inner-->
    
    

<!-- loading javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.7.2.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>

