<?php
session_start();

include_once '../config.php';

if(isset($_POST['submit']))
{
      $question=$_POST['question'];
      $solution=$_POST['solution'];


      $sql = "INSERT INTO  faq(question,solution)
      VALUES ('$question','$solution')";

   if ($conn->query($sql) === TRUE) {
      echo("<script>alert('FAQ Published Successfully')</script>");
      echo"<script language='javascript'>location.href='faq_post.php'; </script>";
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