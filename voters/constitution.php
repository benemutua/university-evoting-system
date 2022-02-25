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

<font color="steelblue"><h3><i class="icon-book"></i>The MKSU Election Constititution</h3></font>    

///////
    

<?php else: ?> 
    <p>Account not verified</p>
    <?php endif; }?>
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

