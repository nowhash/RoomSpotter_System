<?php
session_start();

include_once '../config.php';
if(isset($_SESSION['providers_id']))
{
   $providers_id=$_SESSION['providers_id'];
   if(isset($_POST['submit']))
   {
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $p_contact=$_POST['pNumber'];
      $bcn=$_POST['bcn'];

      $sql="update providers SET fname='$fname',lname='$lname',p_contact='$p_contact',bcn='$bcn' where providers_id='$providers_id'";

      if ($conn->query($sql)==TRUE) {
         echo ("<script> alert('Updated Successfully');</script>");
         echo("<script>window.location='provider_homepage.php'</script>");
      } 
      else {
         echo "Error: " . $sql . "<br>" . $conn->error;
      }

}
   else
   {
      echo("<script>alert('Error');</script>");
      echo("<script>window.location='updateAccomInfo.php'</script>");
   }
}
   
?>