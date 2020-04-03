<?php
session_start();

include_once '../config.php';
if(isset($_SESSION['applicants_id']))
{
   $applicants_id=$_SESSION['applicants_id'];
   if(isset($_POST['submit']))
   {
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $p_contact=$_POST['pNumber'];
      $e_contact=$_POST['eNumber'];
      $bcn=$_POST['bcn'];
      $ssc_reg=$_POST['sscReg'];
      $hsc_reg=$_POST['hscReg'];


      $sql="update applicants SET fname='$fname',lname='$lname',p_contact='$p_contact',e_contact='$e_contact',bcn='$bcn',ssc_reg='$ssc_reg',hsc_reg='$hsc_reg' where applicants_id='$applicants_id'";

      if ($conn->query($sql)==TRUE) {
         echo ("<script> alert('Updated Successfully');</script>");
        echo("<script>window.location='applicant_homepage.php'</script>");} 
      else {
         echo "Error: " . $sql . "<br>" . $conn->error;}

   }
   else
   {
      echo("<script>alert('Error');</script>");
      echo("<script>window.location='updateAccomInfo.php'</script>");
   }
}
?>