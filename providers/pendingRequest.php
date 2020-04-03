<?php
session_start();
include_once '../config.php';

if(isset($_SESSION['providers_id']))
{
?>

<html>
<!--Start Head Content-->

<head>
   <?php require_once '../include/head.php' ?>
   <style>
   table {
      width: 600px;
      margin: 0 auto;
      table-layout: auto;
      border-collapse: collapse;
      box-shadow: 2px 2px 2px 2px #AE9F9C;
      padding: 10px;
   }

   th,
   td {
      padding: 10px;
      border: solid 1px #D6C8C5;
      background-color: #f5f5f5;
   }

   .notification {
      margin: 0 auto;
      width: 800px;
      text-align: center;
      background: linear-gradient(white, rgb(247, 247, 255));
      box-shadow: 0 0 5px 15px rgba(221, 199, 199, 0.4);
      padding-top: 30px;
      padding-bottom: 30px;

   }
   </style>
</head>
<!--End Head Content-->

<body>
   <div class="wrapper">
      <!--Start Nav_Banner Area-->
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
      <!--End Nav_Banner Area-->

      <div class="body-content">
         <div class="user-homepage-btn">

            <button class="user-homepage active" onclick="location.href='provider_homepage.php';"><i
                  class="fas fa-user-cog"></i>&nbsp;Profile</button>

            <button class="user-homepage" onclick="location.href='accom_info.php';"><i
                  class="fas fa-home"></i>&nbsp;Accommodation info</button>

            <button class="user-homepage" onclick="location.href='pendingRequest.php';"><i
                  class="fas fa-bell"></i>&nbsp;Pending Request</button>
         </div>
         <div class="content">
            <center>
               <div class="heading4" style='font-size:1.5em; width:580px;'>Accommodation Request</div>
            </center><br>
            <?php
            $providers_id=$_SESSION['providers_id'];

            $sql="select * from providers p,applicants a,reservation r,accom_pro_reservation apr 
            where 
            p.providers_id=apr.providers_id 
            and 
            a.applicants_id=apr.applicants_id 
            and 
            r.reserve_id=apr.reserve_id 
            and 
            p.providers_id=".$providers_id."
            ";

            $result=mysqli_query($conn,$sql);
            //$data=mysqli_fetch_assoc($result);
            while($data=mysqli_fetch_assoc($result)){
               
            $applicants_name=$data['fname'].' '.$data['lname'];
            $applicants_id=$data['applicants_id'];
            $providers_id=$data['providers_id'];
            $reservation_id=$data['reserve_id'];

            if($data['reserve_status']==1)
            {
               echo ("
               <table border='1'><tr><td>
               $applicants_name request for an accommodation....!! <br>
                  <form action='reservation_request.php' method='POST'>
                     <input type='hidden' name='applicants_id' value='$applicants_id'/>
                     <input type='hidden' name='providers_id' value='$providers_id'/>
                     <input type='hidden' name='reservation_id' value='$reservation_id'/>
                     <input style='background-color:#44c767; border-radius:10px; border:1px solid #18ab29; display:inline-block; cursor:pointer; color:#514E56; font-family:Arial; font-size:17px; padding:5px 5px; text-decoration:none; text-shadow:0px 1px 0px #2f6627;' type='submit' name='submit' value='Click for details'/>
                  </form>
               </td>
               </tr>
               </table>
               ");
            }
         }
       ?>
         </div>
         <!--Start Footer Part-->
         <?php include_once '../include/footer.php' ?>
         <!--End Footer Part-->
      </div>
</body>

</html>

<?php }
      else{
         header("Location:../index.php");
      } ?>