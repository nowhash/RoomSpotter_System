<?php
include_once '../config.php';
   if(isset($_GET['vkey']))
   {
      $vkey=$_GET['vkey'];

      
      $sql="select verified,vkey from providers where vkey='".$vkey."' and verified=0 LIMIT 1";

      $result=mysqli_query($conn,$sql);

      if(mysqli_num_rows($result))
      {
         $update="UPDATE providers SET verified=1 where vkey='".$vkey."' LIMIT 1";

         if($conn->query($update)==TRUE)
         {
            echo ("<script> alert('Your account has been verified.');</script>");
            echo("<script>window.location='../login/login.php'</script>");
         }
      }
      else{
         echo ("<script>alert('The account is invalid or already varified');</script>");
      }

   }

?>