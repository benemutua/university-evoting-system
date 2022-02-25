<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

//define variables
$name="";
$nickname="";
$email="";
$school="";
$role="";
$admn_no="";
$image="";
$status="";
$position="";
$category="";
$error = array();
$title="";
$id="0";

$update=false;

/* import the database connection */
require_once('db/config.php');






/*----------------------------------------------------------------------
VOTERS REGISTRATION AND MANAGEMENT PART
-------------------------------------------------------------------------*/
//register voter when save button is clicked on the registration page

	if (isset($_POST['save'])) {
		$name=mysqli_real_escape_string($link, $_POST['name']);
		$admn_no = mysqli_real_escape_string($link, $_POST['admn_no']);
        $email=mysqli_real_escape_string($link, $_POST['email']);
        $school=mysqli_real_escape_string($link, $_POST['school']);
        $role= mysqli_real_escape_string($link, $_POST['role']);
        $status= mysqli_real_escape_string($link, $_POST['status']);
        $position= mysqli_real_escape_string($link, $_POST['position']);
        $category= mysqli_real_escape_string($link, $_POST['category']);

            /*-------------------------------------
    Check for duplicate entry
    ----------------------------------------*/

        $query = "SELECT * FROM voters WHERE admn_no='$admn_no' OR email='$email' LIMIT 1";
    $result = mysqli_query($link, $query);
       if(mysqli_num_rows($result)==1){
         $_SESSION['err'] = "<i class='fa fa-warning'>A voter with similar email/admn_no already exists!</i>";  
		header('location: register-voter.php');     
       }
    
    else{
        /*---------------------------------------------
        if no duplicate entry, now confirm if all input fields are filled correctly, if not, return error
        IF NO ERROR, register the user
        -------------------------------------------------------*/
        
     $emptyInput = NULL;
    if (!($_POST["name"] == $emptyInput or $_POST["admn_no"] == $emptyInput or $_POST["email"] == $emptyInput)){
		$sql= "INSERT INTO voters (name, admn_no,email,school,role,status,position,category) VALUES ('$name', '$admn_no','$email','$school','$role','$status','$position','$category')";
        
		if(mysqli_query($link,$sql)){
            $_SESSION['message'] = "New voter created"; 
		header('location: register-voter.php');
	
        }}
        else{
             $_SESSION['err'] = "<i class='fa fa-warning'>Not Inserted!Make sure all fields are correctly filled</i>";
            header('location: register-voter.php');
        }
	} } //end


/*-------------------------------------------------
UPDATE AND EDIT voter AS FROM MANAGE-VOTER.PHP
-------------------------------------------------*/
//edit voter when edit button on the manage-voter.php table clicked
if(isset($_GET['edit'])){
    $id= $_GET['edit'];
     $update=true;
    $sql="SELECT * FROM voters WHERE id=$id";
    $record = (mysqli_query($link,$sql));
    
    if(count((is_countable($record)?$record:[1]))){
        	$row = mysqli_fetch_array($record);
			$name = $row['name'];
			$admn_no = $row['admn_no'];
        $email= $row['email'];
         $school = $row['school'];
        $role = $row['role'];
        $status= $row['status'];
       
        
    }
}//end



//update button for voter on registration page when update status =true
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$admn_no = $_POST['admn_no'];
    $email = $_POST['email'];
$sql="UPDATE voters SET name='$name', admn_no='$admn_no', email='$email' WHERE id=$id";
	if(mysqli_query($link, $sql)){
	 $_SESSION['success'] = "Voters data updated succesfully!"; 
		header('location: manage-voter.php');
} } //end



/*-----------------end of voters part-----------------------*/





















/*---------------------------------------------------------------------
CANDIDATES REGISTRATION AND  MANAGEMENT PART
--------------------------------------------------------------------------*/

//candidate registration

if (isset($_POST['add'])) {
		$name=mysqli_real_escape_string($link, $_POST['name']);
        $nickname=mysqli_real_escape_string($link, $_POST['nickname']);
		$admn_no = mysqli_real_escape_string($link, $_POST['admn_no']);
        $email=mysqli_real_escape_string($link, $_POST['email']);
        $school=mysqli_real_escape_string($link, $_POST['school']);
        $role= mysqli_real_escape_string($link, $_POST['role']);
     $position= mysqli_real_escape_string($link, $_POST['position']);
    $category= mysqli_real_escape_string($link, $_POST['category']);
     $status= mysqli_real_escape_string($link, $_POST['status']);
     $image = $_FILES['image']['tmp_name'];    
    $imgContent = addslashes(file_get_contents($image));
    
    
    /*-------------------------------------
    Check for duplicate entry
    ----------------------------------------*/

        $query = "SELECT * FROM voters WHERE admn_no='$admn_no' OR email='$email' LIMIT 1";
    $result = mysqli_query($link, $query);
       if(mysqli_num_rows($result)==1){
         $_SESSION['err'] = "<i class='fa fa-warning'>A voter with similar email/admn_no already exists!</i>";  
		header('location: register-candidate.php');     
       }
    
    else{
        /*---------------------------------------------
        if no duplicate entry, now confirm if all input fields are filled correctly, if not, return error
        IF NO ERROR, register the voter
        -------------------------------------------------------*/
     $emptyInput = NULL;
    if (!($_POST["name"] == $emptyInput or $_POST["admn_no"] == $emptyInput or $_POST["email"] == $emptyInput)){
    
      $sql="INSERT INTO voters (name,nickname, admn_no,email,school,role,position,category,status,image) VALUES ('$name', '$nickname','$admn_no','$email','$school','$role','$position','$category','$status','$imgContent')";
        
		if(mysqli_query($link, $sql)){ 
		 $_SESSION['message'] = "New Candidate profile created"; 
		header('location: register-candidate.php'); 
		
	}}
else{
     $_SESSION['err'] = "<i class='fa fa-warning'>Not Inserted!Make sure all fields are correctly filled</i>";
    header('location: register-candidate.php');
}
}} //end

/*-------------------------------------------------------
EDIT, VIEW AND UPDATE CANDIDATES AS FROM MANAGE-VOTER.PHP
--------------------------------------------------------------*/
//view voter when view voter button on the manage-voter.php table clicked
if(isset($_GET['viewvoter'])){
    $id= $_GET['viewvoter'];
     $update=true;
    $sql="SELECT * FROM voters WHERE id=$id";
    $n = mysqli_query($link, $sql);
    
    if(count((is_countable($n)?$n:[1]))){
        	$row = mysqli_fetch_array($n);
			$name = $row['name'];
            $nickname=$row['nickname'];
			$admn_no = $row['admn_no'];
            $email= $row['email'];
            $school = $row['school'];
            $role = $row['role'];
            $status= $row['status'];
        $position=$row['position'];
        $category=$row['category'];
        $id =$row['id'];
       
        
    }
}//end






//edit candidate when alter button on the manage-voter.php table clicked
if(isset($_GET['alter'])){
    $id= $_GET['alter'];
     $update=true;
    $sql="SELECT * FROM voters WHERE id=$id";
    $n = mysqli_query($link, $sql);
    
    if(count((is_countable($n)?$n:[1]))){
        	$row = mysqli_fetch_array($n);
			$name = $row['name'];
            $nickname=$row['nickname'];
			$admn_no = $row['admn_no'];
            $email= $row['email'];
            $school = $row['school'];
            $role = $row['role'];
            $status= $row['status'];
       
        
    }
}//end

//update button for candidate on registration page when update status =true
if (isset($_POST['update_cand'])) {
	$id = $_POST['id'];
	$name = mysqli_real_escape_string($link, $_POST['name']);
    $nickname=mysqli_real_escape_string($link, $_POST['nickname']);
	$admn_no = mysqli_real_escape_string($link, $_POST['admn_no']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    
$sql="UPDATE voters SET name='$name',nickname='$nickname',email='$email', admn_no='$admn_no', school='$school', role='$role', position='$position', category='$category', status='$status', image='$imgContent'  WHERE id=$id";
	if(mysqli_query($link, $sql)){
	$_SESSION['success'] = "Candidate's data updated succesfully!"; 
		header('location: manage-voter.php');
}}  //end



//when the general role change button is clicked
if(isset($_GET['change_role'])){
    $id= $_GET['change_role'];
     $update=true;
    $sql="SELECT * FROM voters WHERE id=$id";
    $n = mysqli_query($link, $sql);
    
    if(count((is_countable($n)?$n:[1]))){
        	$row = mysqli_fetch_array($n);
			$name = $row['name'];
            $nickname=$row['nickname'];
			$admn_no = $row['admn_no'];
            $email= $row['email'];
            $school = $row['school'];
            $role = $row['role'];
            $status= $row['status'];
       
        
    }
}//end

//when general update button is clicked
if (isset($_POST['role_update'])) {
	$id = $_POST['id'];
	$name = mysqli_real_escape_string($link, $_POST['name']);
    $nickname=mysqli_real_escape_string($link, $_POST['nickname']);
     $email = mysqli_real_escape_string($link, $_POST['email']);
    $admn_no = mysqli_real_escape_string($link, $_POST['admn_no']);
    $school=mysqli_real_escape_string($link, $_POST['school']);
    $role=mysqli_real_escape_string($link, $_POST['role']);
    $position=mysqli_real_escape_string($link, $_POST['position']);
    $category=mysqli_real_escape_string($link, $_POST['category']);
    $status=mysqli_real_escape_string($link, $_POST['status']);
     $image = $_FILES['image']['tmp_name'];    
    $imgContent = addslashes(file_get_contents($image));
	
   
    
$sql="UPDATE voters SET name='$name',nickname='$nickname',email='$email', admn_no='$admn_no', school='$school', role='$role', position='$position', category='$category', status='$status', image='$imgContent'  WHERE id=$id";
	if(mysqli_query($link, $sql)){
	$_SESSION['success'] = "Voter details have been updated!"; 
		header('location: manage-voter.php');
}}  //end



















/*---------------------------------------------------------------
COMON BUTTON DELETE ON MANAGE-VOTER.PHP
----------------------------------------------------------------------*/
//delete button on the manage-voter.php table

if(isset($_GET['delete'])){
    $id= $_GET['delete'];
    $sql="DELETE FROM voters WHERE id=$id";
    if(mysqli_query($link, $sql)){
   	$_SESSION['err'] = "<i class='fa fa-warning'>Voter record deleted!</i>";  
		header('location: manage-voter.php');
}
else{
    echo "not inserted";
}}
//end

/*---------------------------------
END OF MANAGE VOTER.PHP 
-----------------------------------------------*/
















/*-------------------------------------------------------------------
BULK OPTIONS PART
------------------------------------------------------------------------*/
//coding the bulk delete button
if(isset($_POST['bulk_del'])){
    $chkarr= $_POST['checkbox'];

    foreach ((array) $chkarr as $id){
  $sql="DELETE FROM voters WHERE id=$id";
  if(mysqli_query($link, $sql)){
    $_SESSION['err'] = "<i class='fa fa-warning'>Voter(s) record deleted on bulk actions!</i>";   
		header('location: manage-voter.php');  
       }
        else{
          $_SESSION['err'] = "Bulk action not performed";  
		header('location: manage-voter.php');  
        }
    }
}

/*------------------------------------------------
coding the print button
-----------------------------------------------*/
function fetch_data()
{
    $role1= $_POST['role1'];
    $status1= $_POST['status1'];
    $school1=$_POST['school1'];
    $output="";
    
    
    $link=mysqli_connect('127.0.0.1','root','1234567','e-voting');
    $sql="SELECT * FROM voters WHERE
    role= '$role1'  
    
    AND school='$school1' 
    
    AND status= '$status1'   
    
    ORDER BY id DESC   ";
    $result=mysqli_query($link, $sql);
    
    
    while($row=mysqli_fetch_array($result))
    {
        
 $output .='  
 
 <tr>

                       <td>'.$row["name"].'</td>
                       <td>'.$row["admn_no"].'</td>
                       <td>'.$row["role"].'</td>
                       <td>'.$row["status"].'</td>
                       </tr>
                       ';
    }
    return $output;
}
if(isset($_POST["print"]))
{
    $title=$_POST['title'];
    require_once('tcpdf/tcpdf.php'); 
 // create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);





// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('times', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

 
    $content = '';  
    $content .= '


<style>/* --------------------style the results table--------------------------- */
table.timecard {
	margin: auto;
	width: 100%;
	border-collapse: collapse;
	border: 1px solid gray;
	border-style: hidden;
    
}

table.timecard thead th {
	font-size: large;
    height: 30px;
    border-bottom:1px solid blue;
}

table.timecard thead th#thDay {
	width: 40%;	
}

table.timecard thead th#thRegular, table.timecard thead th#thOvertime, table.timecard thead th#thTotal {
	width: 20%;
}



table.timecard td {
    height: 25px;
	border-width: 1px;
	border-left: 1px solid gainsboro;
}


</style>

<h3>MKSU E-VOTING SYSTEM</h3><br>
<h4>TITLE: <b>'.$title.'</b></h4><br>

        
      	<table class="timecard" >
        <tr bgcolor="#99ccff" align="center"><th>VOTER DETAILS</th></tr>
        
           <tr bgcolor="#99ccff">  
          
           		<th width="40%"><b>Name</b></th>
                <th width="20%"><b>Admn no</b></th>
                <th width="20%"><b>Role</b></th>
                <th width="20%"><b>Status</b></th> 
           </tr>  
      ';  
    $content .= fetch_data(); 
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('file.pdf', 'I');

}

/*----------------------------
end of coding print button
-----------------------------*/










/*--------------------------------------------------------------------------------------------
VERIFICATION PART
---------------------------------------------------------------------------------------------*/




/*------------------------------------------------------
Verify candidate details on the verify voter page
----------------------------------------------------------*/
if(isset($_GET['verify_v'])){
    $id= $_GET['verify_v'];
    $sql="UPDATE voters SET status='active' WHERE id=$id";
  if(mysqli_query($link, $sql)){
   	$_SESSION['message'] = "Approve success!";  
		header('location: verify-voter.php');
}}//end






//BULK ACTIONS ON THE VERIFY VOTER PAGE
//coding the bulk approve
if(isset($_POST['bulk_verify_voter'])){
    $chkarr= $_POST['checkbox'];

    foreach ((array) $chkarr as $id){
  $sql="UPDATE voters SET status='active' WHERE id=$id";
  if(mysqli_query($link, $sql)){
    $_SESSION['message'] = "<i class='fa fa-check'>Selected voters have been set to active</i>";   
		header('location: verify-voter.php');  
       }
        else{
          $_SESSION['err'] = "Bulk action not performed";  
		header('location: verify-voter.php');  
        }
    }
}








/*------------------------------------------------------
Verify candidate details on the verify candidates page
----------------------------------------------------------*/
if(isset($_GET['verify_c'])){
    $id= $_GET['verify_c'];
    $sql="UPDATE voters SET status='active' WHERE id=$id";
    if(mysqli_query($link, $sql)){
   	$_SESSION['message'] = "Approve success!";  
		header('location: verify-cand.php');
}}//end



//BULK ACTIONS ON THE VERIFY candidate PAGE
//coding the bulk approve
if(isset($_POST['bulk_verify_cand'])){
    $chkarr= $_POST['checkbox'];

    foreach ((array) $chkarr as $id){
  $sql="UPDATE voters SET status='active' WHERE id=$id";
  if(mysqli_query($link, $sql)){
    $_SESSION['message'] = "<i class='fa fa-check'>Selected candidates have been set to active</i>";   
		header('location: verify-cand.php');  
       }
        else{
          $_SESSION['err'] = "Bulk action not performed";  
		header('location: verify-cand.php');  
        }
    }
}











/*------------------------------------------
election year on the index of admin page
--------------------------------------*/
if(isset($_POST['set_year'])){
$year=$_POST['year'];
$active="1";
$emptyInput = NULL;
  
    /*-------------------------------------
    Check for duplicate entry
    ----------------------------------------*/

        $query = "SELECT * FROM election_year WHERE year='$year' OR active='1' LIMIT 1";
    $result = mysqli_query($link, $query);
       if(mysqli_num_rows($result)==1){
         $_SESSION['err'] = "<i class='fa fa-warning'>Not Inserted. An active year exists, Please contact System super admin!</i>";  
		header('location: index.php');     
       }
    
    else{
        /*---------------------------------------------
        if no duplicate entry, now add
        -----------------------*/
    
if(!($_POST["year"] == $emptyInput)){
$sql= "INSERT INTO election_year (year,active) VALUES ('$year', '1')";
        
if(mysqli_query($link,$sql)){
$_SESSION['message'] = "New election year created"; 
header('location: index.php');
	
        }}
        else{
             $_SESSION['err'] = "<i class='fa fa-warning'>Not Inserted!Form not filled</i>";
            header('location: index.php');
        }}}
/*------------------------------------------
end of election year
--------------------------------------*/          


















 
?>