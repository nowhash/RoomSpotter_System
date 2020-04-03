<?php
session_start();

include_once '../config.php';

if(isset($_POST['submit']))
{
   $email=$_POST['email'];
   $pass=md5($_POST['pass']);

   $sql="UPDATE admin set email='$email', pass='$pass'";

   if($conn->query($sql)==TRUE)
   {
      echo ("<script> alert('Email and Password Updated Successfully')</script>");
      echo("<script>window.location='admin_home.php'</script>");
   }
}

?>