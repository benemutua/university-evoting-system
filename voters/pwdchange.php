<?php require_once('pwdchangedb.php'); ?>

<?php require_once('header.php'); ?>
      
      
<!--main content start-->
<section id="main-content">
<section class="wrapper site-min-height">
<div class="rowc">
<!----------------------------------------------------------------
Field for reseting/changing pass
------------------------------------------------------------------------>
 <!--show error message if insertion failed-->
<?php if (isset($_SESSION['err'])): ?>
<div class="err">
<?php 
echo $_SESSION['err']; 
unset($_SESSION['err']);
		?>
	</div>
<?php endif ?>   
    
    
    
    
    
    
         
<h4><font color="steelblue">CHANGE ACCOUNT PASSWORD</font></h4>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
           
<div class="control-group">
<label class="control-label">New Password:</label>
<div class="controls">
<input type="password" class="line2" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
<font size="2" color="brown"><?php echo $new_password_err; ?></font>
</div>
</div>
    
<div class="control-group">
<label class="control-label">Confirm Password:</label>
<div class="controls">
<input type="password" class="line2" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
<font size="2" color="brown"><?php echo $confirm_password_err; ?></font>
</div>
</div>
          
<!-- the buttons-->
<button type="submit" class="btn" ><i class="icon-refresh">Change Password</i></button>
<button type="reset" class="btn-reset"><i class="icon-trash">Clear Fields</i></button>          
</form>
    
    
    
    
    
    
       
      </div>  
    </section><!-- /wrapper -->
</section>  <!-- /MAIN CONTENT -->
  
<!-- loading javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.7.2.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
