<?php 
session_start();

   if(isset($_SESSION['applicants_id']))
   {
      echo"<script language='javascript'>location.href='applicants/applicant_homepage.php'; </script>";
   }

   else if(isset($_SESSION['providers_id'])){
      echo"<script language='javascript'>location.href='providers/provider_homepage.php'; </script>";
   }

   else if(isset($_SESSION['admin_id'])){
      echo"<script language='javascript'>location.href='admin/admin_home.php'; </script>";
   }

   else{
      echo"<script language='javascript'>location.href='index.php'; </script>";
   }
?>


