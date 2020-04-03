<?php
session_start();

include_once '../config.php';
if(isset($_SESSION['providers_id']))
{
   $providers_id=$_SESSION['providers_id'];
   if(isset($_POST['submit']))
   {
      $room=$_POST['room'];
      $available_space=$_POST['available_space'];

      $sql="update accommodation SET room_no='$room',available_space='$available_space' where accom_id=$providers_id";

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