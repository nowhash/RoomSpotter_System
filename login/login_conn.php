<?php
session_start();

include_once '../config.php';

if(isset($_POST['submit']))
{
   $email=$_POST['email'];
   $pass=md5($_POST['pass']);
   $userType=$_POST['userType'];

   if($userType=='applicant'){
      $query="select * from applicants where email='$email' AND pass='$pass'";
      $check=mysqli_query($conn,$query);

      if($check)
      {
         if(mysqli_num_rows($check)>0)
         {
            $data=mysqli_fetch_assoc($check);
            $verified=$data['verified'];

            if($verified==1)
            {
            $_SESSION['applicants_id']=$data['applicants_id'];
            
            echo"<script language='javascript'>location.href='../applicants/applicant_homepage.php'; </script>";
            }

            else{
               echo "<script>alert('Your account is not verified...!!'); </script>";
               echo"<script language='javascript'>location.href='../index.php'; </script>";
            }
         }

         else{
            echo("<script>alert('Login info incorrect..!!');</script>");
            echo("<script>window.location='login.php'</script>");
         }
      }
   }
   else if($userType=='provider'){

      $query="select * from providers where email='$email' AND pass='$pass'";
      $check=mysqli_query($conn,$query);

      if($check)
      {
         if(mysqli_num_rows($check)>0)
         {
            $data=mysqli_fetch_assoc($check);

            $verified=$data['verified'];
            if($verified==1)
            {
            $_SESSION['providers_id']=$data['providers_id'];
            echo"<script language='javascript'>location.href='../providers/provider_homepage.php'; </script>";
            }

            else{
               echo "<script>alert('Your account is not verified...!!'); </script>";
               echo"<script language='javascript'>location.href='../index.php'; </script>";
            }
         }

         else{
            echo("<script>alert('Login info incorrect..!!');</script>");
            echo("<script>window.location='login.php'</script>");
         }
      }

   }
}

?>