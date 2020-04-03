<?php session_start(); 
include_once '../config.php';
?>

<html>
<!--Start Head Content-->

<head>
<style>
      table {
         width: 800px;
         margin: 20px auto;
         table-layout: auto;
         border-collapse: collapse;
      }

      th,
      td {
         padding: 10px;
         border: solid 1px #D6C8C5;
         background-color: #f5f5f5;

      }
   </style>
   <?php include_once '../include/head.php' ?>
</head>
<!--End Head Content-->

<body>
   <div class="wrapper">
      <!--Start Banner Area-->
      <?php  
         if(isset($_SESSION['applicants_id']))
         {
            include_once '../include/applicants_banner_nav.php';
         }

         else if(isset($_SESSION['providers_id'])){
            include_once '../include/providers_banner_nav.php';
         }

         else if(isset($_SESSION['admin_id'])){
            include '../include/admin_banner_nav.php';
         }

         else{
            include_once '../include/banner_nav.php';
         }
      ?>
      <!--End Banner Area-->

      <!--Start News-->
      <div class="body-content">
      <center>
            <div class="box1" style="width: 800px;">
               <div class="heading3" style="font-size: 2.3em;">Frequently Asked Question....!!</div>
            </div>
         </center>
         <hr style='width:800px;'>
            <?php
   $sql = "select * from faq";
   $display = mysqli_query($conn, $sql);

   while ($row = mysqli_fetch_assoc($display)) {
      $faq_id = $row['faq_id'];
      $question = $row['question'];
      $solution = $row['solution'];

      echo "<table border=1 style='border-collapse: collapse;'>
               <tr>
               <td>          

               <div style='font-size: 1.1em;'>
               <b>#$faq_id:&nbsp;$question</b><br>
               <b>Answer:</b><br>$solution
               </div>
               </td>
               </tr>
               </table>
      ";
   }
   ?>
      </div>
      <!--End News-->

      <!--Start Footer Part-->
      <?php include_once '../include/footer.php' ?>
      <!--End Footer Part-->
   </div>
</body>

</html>