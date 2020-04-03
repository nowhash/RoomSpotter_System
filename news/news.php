<?php 
session_start(); 
include_once '../include/head.php';
include_once '../config.php';
?>

<html>
<head>
<style>
      table {
         width: 800px;
         margin: 20px auto;
         table-layout: auto;
         border-collapse: collapse;
         box-shadow: 0px 0px 3px 3px #AE9F9C;
      }
      th,
      td {
         padding: 10px;
         border: solid 1px #D6C8C5;
         background-color: #f5f5f5;

      }
   </style>
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
         <div class="content">
         <div class="heading4">Admission Notice & Circular</div>
         <br>
            <?php
               $sql = "select * from news";
               $display = mysqli_query($conn, $sql);

               while ($row = mysqli_fetch_assoc($display)) {
                  $headline = $row['headline'];
                  $date = $row['date'];
                  $reporter = $row['reporter'];
                  $content = $row['content'];

                  echo "<table border=1 style='border-collapse: collapse;'>
                           <tr>
                           <td>          
                           <center><div class='heading3' style='font-size: 1.5em;'>$headline</div> </center><br>
                           <div style='font-size: 1em;'>
                           Publish Date:&nbsp $date <br>
                           Reporter:&nbsp $reporter
                           </div>
                           </td>
                           </tr>
                           <tr>
                           <td>$content</td>
                           </tr>
                           </table>
                  ";
               }
            ?>
   </div>
      </div>
      <!--End News-->

      <!--Start Footer Part-->
      <?php include_once '../include/footer.php' ?>
      <!--End Footer Part-->
   </div>
</body>

</html>