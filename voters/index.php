<?php require_once('votingdb.php'); ?>
<?php require_once('header.php'); ?> 

<!-- ----------------------------------------------------------------------------------------------
if someone is an admin, redirect them
---------------------------------------------------------------------------------------------------->
<?php
            
$query="SELECT * FROM users WHERE username= '".$_SESSION['username']."' ";
$result=mysqli_query($link,$query); ?>
<?php while($row=mysqli_fetch_array($result)){ ?>
<div id="welcometheme">
  <?php  if(($row['role'])=='admin'): ?>
<p><i class="icon-dashboard">This is an Admin account.Go to <a href="http://127.0.0.1/e-voting/admin">Admin tab..</a></i></p>
   
<?php else: ?>            
            
  <?php endif; } ?>          
     </div> 

<div class="main">
<div class="main-inner">

    <div class="mycon">
<div class="tabz">
  <!-- Tab 1 -->
  <input type="radio" name="tabz" id="tab1"  checked>
  <label for="tab1">Dashboard</label>
  <!-- Tab 2 -->
  <input type="radio" name="tabz" id="tab2" >
  <label for="tab2">Voter Details</label>

  
  <div class="tab-panels">
    <section id="registration" class="tab-panel">

        
<!-- div to show the system status-->        
<div class="castsess"> 
 <br>
<table class="table table-bordered" >
<tr>
 <td><font color="brown"><i class="icon-info-sign"></i>SYSTEM STATUS:</font></td>                                                   
<?php

$sql = "SELECT status FROM system_status";
$result = $link->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { 
echo "<td>"  . $row["status"] . "</td>";
}
   
echo "</table>";
} else { echo "0 results"; }

?>
</tr></table> 
</div>
      
        
<!-- start the two column layout in index-->
<div class="row">
    
    <!--start of column 1--> 
<div class="column">
    
<center><img src="img/logohead2.png" style="width:150px; height:150px;"></center>
    <h2><font color="darkblue">Welcome to Our Secure Online Voting System</font></h2>
    
    <p>Powered by <i class="icon-globe"><a href="#">frankbenz software developers</a></i></p>
    <p><i class="icon-phone">+2547 08 672 495</i></p>
    <p><i class="icon-inbox">marketing@frankbensoft.com</i></p>
    
    
    
        
</div>
 
    
<!--start of column 2-->    
<div class="column">
    
    
     <div class="normal">
         
<u><b><font color="gray" size="5">Contact Us:</font></b></u>          
 <form action="" method="post">

     <div id="contacts">
        <div id="other">
     <label >First Name:</label>
   <input type="text" name="fname" value="" class="line">
            </div>
         <div id="other">
     <label>Last Name:</label>
   <input type="text" name="lname" value="" class="line2">
    </div> </div>
        
        
<label>Email:</label>
<input type="email" name="email" value="" class="line2" placeholder="eg 1@example.com" >
<label>Subject:</label>
<input type="text" name="subject" value="" class="line2"  >     
     
<label>Message</label>
<textarea name="message" id="textarea1" maxlength="400" placeholder="You can report an issue or suggest edit.." ></textarea><br>
<button type="submit" name="submit" class="btn"><i class="icon-share">Submit</i></button><br>
    </form>
     </div> <!--end the normal contact container-->
               
</div><!--end of column 2-->
        </div>  <!--end of row container-->  
        <br>
        
  
  </section>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    <section id="verification" class="tab-panel">
    <table class="table table-bordered">
	
        <?php
/* Attempt to connect to MySQL database */
$link = mysqli_connect("127.0.0.1", "root", "1234567", "e-voting");
        // Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
        
$sql = "SELECT name,admn_no,email,school,role,position,status FROM voters WHERE admn_no= '".$_SESSION['username']."'";
$result = $link->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>Name:</td><td>" . $row["name"]. "</td>
<tr><td>Admn Number:</td><td>" . $row["admn_no"]. "</td>
<tr><td>Email:</td><td>" . $row["email"]. "</td>
<tr><td>School:</td><td>" . $row["school"]. "</td>
<tr><td>Role:</td><td>" . $row["role"]. "</td>
<tr><td>Position:</td><td>" . $row["position"]. "</td>

<tr><td>Status:</td><td>" . $row["status"]. "</td></tr>";



}
echo "</table>";
} else { echo "0 results"; }
$link->close();
?>
    </section>
  </div>
  
</div> 						
	</div>					

    
    
    



    
    </div>
</div>
    


<script src="js/jquery-1.7.2.min.js"></script>
	
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>


  </body>

</html>

