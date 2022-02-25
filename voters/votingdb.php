<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
    
require_once('db/config.php');

//define variables
$voter_id="";
$election_year="";
$presient="";
$vice_president="";
$sec_general="";
$finance_head="";
$ladies_rep="";
$rep_non_residents="";
$rep_disabilities="";
 $school_business="";
 $school_education="";
 $school_engineering="";
 $school_hospitality="";
 $school_humanities="";
$election_year="";
$total_values="";
$emptyInput = NULL;


/*-------------------------------------------------------------------------------------------- 
Action when the vote button is clicked
--------------------------------------------------------------------------------------------*/
if(isset($_POST['vote'])){
   $voter_id= $_POST['voter_id'];
    $election_year=$_POST['election_year'];
    $president=$_POST['president'];
    $sec_general=$_POST['sec_general'];
    $ladies_rep = $_POST['ladies_rep'];
    $finance_head = $_POST['finance_head'];
    $vice_president = $_POST['vice_president'];
    $rep_non_residents = $_POST['rep_non_residents'];
    $rep_disabilities = $_POST['rep_disabilities'];

    $school_business = $_POST['school_business'];
    $school_education = $_POST['school_education'];
$school_engineering = $_POST['school_engineering'];
     $school_humanities = $_POST['school_humanities'];
    $school_hospitality = $_POST['school_hospitality'];
   
    /*----------------------------------------------
    first Check if the person has voted or not
    ----------------------------------------------*/

    $query = "SELECT * FROM voters WHERE admn_no='".$_SESSION['username']."'  AND voted='1'  LIMIT 1";
    $result = mysqli_query($link, $query);
       if(mysqli_num_rows($result)==1){
         $_SESSION['err'] = "<i class='icon-warning-sign'>Sorry you cant vote twice! If this is a mistake, please contact system admin</i>";  
		header('location: cast-vote.php');  
        //tryuiop[iuyt
             }
  
    
  
else{
    
    
    /*-------------------------------
    check if the input fields are all filled
    ---------------------------------------*/
    if(!($_POST["president"] == $emptyInput or $_POST["sec_general"] == $emptyInput or $_POST["finance_head"] == $emptyInput  
         or $_POST["vice_president"] == $emptyInput or $_POST["ladies_rep"] == $emptyInput or $_POST["rep_non_residents"] == $emptyInput
          or $_POST["rep_disabilities"] == $emptyInput)){
    
$sql= "INSERT INTO votesdata(voter_id,president,vice_president, sec_general,finance_head,ladies_rep,rep_non_residents,rep_disabilities,school_business, school_education, school_engineering,school_humanities, school_hospitality,year)

VALUES('$voter_id','$president','$vice_president','$sec_general','$finance_head','$ladies_rep','$rep_non_residents','$rep_disabilities','$school_business', '$school_education','$school_engineering','$school_humanities','$school_hospitality','$election_year')";
        
        
    $result=mysqli_query($link,$sql);
    if($result){
        $_SESSION['message']="<i class='icon-check'>Your Vote has been submitted successfully</i>";
        header('location: cast-vote.php');
        //if insertion succeeeds, then also set voted to true on that specific voter on the voters table
        $sql2="UPDATE voters SET voted='1' WHERE admn_no='".$_SESSION['username']."'  ";
        mysqli_query($link,$sql2);
    }}
    else{
      $_SESSION['err']="<i class='icon-warning-sign'>Unselected mandatory fields.Please try again. Thank you</i>";
        header('location: cast-vote.php');
    }
}
}






?>