<?php
session_start();

include_once '../config.php';

if(isset($_POST['submit']))
{
      $headline=$_POST['headline'];
      $date=$_POST['date'];
      $reporter=$_POST['reporter'];
      $content=$_POST['content'];

      $sql = "INSERT INTO  news(headline,date,reporter,content)
      VALUES ('$headline','$date','$reporter','$content')";

   if ($conn->query($sql) === TRUE) {
      echo("<script>alert('News Updated Successfully')</script>");
      echo"<script language='javascript'>location.href='news_post.php'; </script>";
   } 
   else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }

   $conn->close();
      
}

else{
   echo ("Not Published");
}

?>