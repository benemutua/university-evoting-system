<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Home</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/list.css"/>
    
    <link href="css/style.css" rel="stylesheet">
   


   

  </head>

<body>

<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="polling-clerks.php">
				<img src="img/logohead2.png" height="20" width="20">POLLING CLERKS PAGE-MKSU E-VOTING SITE				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
							My Account
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="#"><i class="icon-key"></i>Change password</a></li>
							<li><a href="#"><i class="icon-trash"></i>Delete A/c</a></li>
                            <li><a href="#"><i class="icon-question"></i>Log out</a></li>
						</ul>						
					</li>
			
				
				</ul>

				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">

			<ul class="mainnav">
                
                	<li>					
					<a href="polling-clerks.php">
						<i class="icon-home"></i>
						<span>Home</span>
					</a>  									
				</li>
			
					<li class="dropdown">					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-check"></i>
						<span>Elections</span>
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-check"></i>Cast Vote</a></li>
						<li><a href="#"><i class="icon-share"></i>My history</a></li>
                        <li><a href="#"><i class="icon-book"></i>constitution</a></li>
                       
                    </ul>    				
				</li>
				
				<li class="dropdown">					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bar-chart"></i>
						<span>Elections Results</span>
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-group"></i>Overal </a></li>
						<li><a href="#"><i class="icon-table"></i>Table Analysis</a></li>
                        <li><a href="#"><i class="icon-bar-chart"></i>Graphical Analysis</a></li>
                       
                    </ul>    				
				</li>
				
			
                
                
			
			</ul>

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    

<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      	
					
					<div class="widget-content">
						
						
						
						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li class="active">
						    <a href="#new" data-toggle="tab"><b>NEW VOTER REGISTRATION</b></a>
						  </li>
						  <li  ><a href="#vote-verify" data-toggle="tab"><b>VOTER VERIFICATION</b></a></li>
                            <li  ><a href="#verified" data-toggle="tab"><b>ACTIVE VOTERS</b></a></li>
                              <li  ><a href="#all-voters" data-toggle="tab"><b>REGISTRATION PROCESS</b></a></li>
						</ul>
						
						<br>
						
							<div class="tab-content">
								<div class="tab-pane active" id="new">
								<fieldset>
                                    
                          											
                                         <!--columns layout-->
<button id="sGrid"><i class="icon-list"></i>List View   (default)</button>
<button id="sList"><i class="fa fa-th-large"></i>Grid View</button>                                            


<br><br>
 
<!-- (B2) PRODUCTS WRAPPER -->
<div id="lgDemo">
  <div class="item">
      <form action="db/register-voter.php" method="post">
    
            
                                    <!-- 2 layout container-->
                                  
                                    
                                
                                    
                                    
                                <div class="control-group">											
											<label class="control-label" >Student Name</label>
											<div class="controls">
												<input type="text" class="span5" name="name"  value="" required>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" >Admission Number</label>
											<div class="controls">
												<input type="text" name="admn_no" class="span5"  value="" required>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label">Email Address</label>
											<div class="controls">
												<input type="email" name="email" class="span4"  placeholder="example@x.com" value="" required>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
								
                                    <!-- dropdown selection-->
                                    	<div class="control-group">											
											<label class="control-label" >Select Your School</label>
											<div class="controls">
                                    <select  name="school"  class="span4">
                                        <option value="School of Engineering and technology">School of Engineering and technology</option>
                                 <option value="School of Humanities and health sciences">School of Humanities and health sciences</option>
                                  <option value="School of Hospitality and tourism">School of Hospitality and tourism</option>
                                        <option value="School of Agriculture">School of Agriculture </option>
                                        <option value="School of education">School of education</option>
                                        <option value="School of Business">School of Business</option>
  </select>
                                            </div>
                                    </div>
    <!--end selection-->
											
										
    
    
    
    
    </div>
    <!-- end of colum1 -->
    
  <div class="item">
    <p><font color="brown">You can not edit these fields because you are not an admin</font></p>
    	
	<div class="control-group">	
        <label class="control-label">Role</label>
			
<div class="controls">
<input type="text" disabled class="span4"  value="voter">
	</div> <!-- /controls -->				
	</div> <!-- /control-group -->
      
      <div class="control-group">	
        <label class="control-label">Position</label>
			
<div class="controls">
<input type="text" disabled class="span4"  value="n/a">
	</div> <!-- /controls -->				
	</div> <!-- /control-group -->
      
      
      <div class="control-group">	
        <label class="control-label">Status</label>
			
<div class="controls">
<input type="text" disabled class="span4"  value="active">
	</div> <!-- /controls -->				
	</div> <!-- /control-group -->
      
      <!-- the buttons-->
      <div class="form-actions">
											<button type="submit" class="btn btn-primary"><i class="icon-check"></i>Register</button> 
											<button class="btn" type="reset"><i class="icon-trash"></i>Reset</button>
                                            <button type="submit" class="btn btn-primary disabled"><i class="icon-print"></i>print</button>
										</div> <!-- /form-actions -->
    
    
      </div>
    
    </div>
    </form>
                                            <script>
                                            window.addEventListener("DOMContentLoaded", function(){
                                                
    document.getElementById("sList").addEventListener("click", function(){
    document.getElementById("lgDemo").classList.add("grid");
  });
                                                
document.getElementById("sGrid").addEventListener("click", function(){
    document.getElementById("lgDemo").classList.remove("grid");
  });
  
  
});
                                            </script>
                                    </fieldset></div>
										
								
								<div class="tab-pane" id="vote-verify">
										<fieldset>
       
                                <div class="control-group">											
											<div class="controls">
												<input type="text" class="span3"  placeholder="Search by student Admn no..." value="" >
                                                <button type="submit" class="btn btn-primary"><i class="icon-search"></i>Search status</button>
                                                
                                                     <select  name="status"  class="span3">
                                        <option value="active">Active</option>
                                 <option value="inactive">Inactive</option>
                                                        
                                 
  </select>
                                                <button type="button" class="btn"><i class="icon-verify"></i>Verify & Update</button>
                                                
                                                
                                                
											</div> <!-- /controls -->				
										</div>
										</fieldset>
								</div>
                                
                                	
								<div class="tab-pane" id="verified">
										<fieldset>
											
                                         1111111<br>
                                            11111<br>
                                    1111<br>
										</fieldset>
								</div>
								
                                <div class="tab-pane" id="all-voters">
										<fieldset>
											
                                         22222<br>
                                    11222<br>
                                    11222<br>
										</fieldset>
								</div>
							</div>
						  
						  
						</div>
						
						
						
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span8 -->
	      	
	      	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    
    
    



    
    
<div class="footer">
	
	<div class="footer-inner">
		
		<div class="container">
			
			<div class="row">
				
    			<div class="span12">
    				&copy; 2013 <a href="#">Frankben software developers</a>.
    			</div> <!-- /span12 -->
    			
    		</div> <!-- /row -->
    		
		</div> <!-- /container -->
		
	</div> <!-- /footer-inner -->
	
</div> <!-- /footer -->
    


<script src="js/jquery-1.7.2.min.js"></script>
	
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>


  </body>

</html>
