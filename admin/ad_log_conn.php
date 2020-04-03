<?php
session_start();

include_once '../config.php';

if(isset($_POST['submit']))
{
   $email=$_POST['email'];
   $pass=md5($_POST['pass']);

      $query="select * from admin where email='$email' AND pass='$pass'";
      $check=mysqli_query($conn,$query);

      if($check)
      {
         if(mysqli_num_rows($check)>0)
         {
            $data=mysqli_fetch_assoc($check);

            $_SESSION['admin_id']=$data['admin_id'];

            echo"<script language='javascript'>location.href='admin_home.php'; </script>";
         }

         else{
            echo("<script>alert('Login info incorrect..!!');</script>");
            echo("<script>window.location='admin_login.php'</script>");
         }
      }

}

?>