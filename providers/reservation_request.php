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
         width: 900px;
         margin: 20px auto;
         table-layout: auto;
         border-collapse: collapse;
         box-shadow: 2px 2px 2px 2px #AE9F9C;
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

         <div class="user-homepage-btn">

            <button class="user-homepage active" onclick="location.href='provider_homepage.php';"><i
                  class="fas fa-user-cog"></i>&nbsp;Profile</button>

            <button class="user-homepage" onclick="location.href='accom_info.php';"><i
                  class="fas fa-home"></i>&nbsp;Accommodation info</button>

            <button class="user-homepage" onclick="location.href='pendingRequest.php';"><i
                  class="fas fa-bell"></i>&nbsp;Pending Request</button>

         </div>
         <br><br>
         <center>
            <div class="heading4" style="margin-top:20px; width:900px;">Confirm Accommodation</div>
         </center>
         <center>

         <div class="user_profile">
         <?php
            include_once '../config.php';

            if(isset($_POST['submit']))
            {
               $applicants_id=$_POST['applicants_id'];
               $providers_id=$_POST['providers_id'];
               $reservation_id=$_POST['reservation_id'];

               $sql= "select * from applicants,reservation where applicants_id=".$applicants_id." and reserve_id=".$reservation_id." ";
               $result=mysqli_query($conn,$sql);
               $data=mysqli_fetch_assoc($result);

               $name=$data['fname'].' '.$data['lname'];
               $email=$data['email'];
               $p_contact=$data['p_contact'];
               $e_contact=$data['e_contact'];
               $bcn=$data['bcn'];
               $ssc_reg=$data['ssc_reg'];
               $hsc_reg=$data['hsc_reg'];
               $check_in=$data['check_in'];
               $check_out=$data['check_out'];
               $img=$data['img_dest'];

               
               echo ("
                  <table border='0'>
                  <tr style='align:center;'>	
                  <td style='padding-left:70px; padding-right: 70px;'>
                     <img src='$img' height='200px' width='200px'/>
                  <td  width='700px' style='padding-left:20px;' >
                  <div class='heading4' style='padding-top:10px; padding-bottom:10px;font-size:1.8em; border-left:none; border-right: none;'>Applicant Details</div><br>

                  <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Name:</b>&nbsp;$name</font><hr>

                  <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Email:</b>&nbsp;$email</font><hr>

                  <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Personal Contact No. :</b>&nbsp;$p_contact</font><hr>

                  <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Emergency Contact No. :</b>&nbsp;$e_contact</font><hr>

                  <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Birth Certificate No. :</b>&nbsp;$bcn</font><hr>
                  
                  <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>SSC Registration No. :</b>&nbsp;$ssc_reg</font><hr>

                  <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>HSC Registration No.  :</b>&nbsp;$hsc_reg</font><hr>

                  <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Check In:</b>&nbsp;$check_in</font><hr>

                  <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Check Out:</b>&nbsp;$check_out</font><br/>
                  </td>
                  </tr>

                  <tr>
                  <td colspan='2'>
                    <center> 
                    <form action='confirm_reservation.php' method='POST'>
                     <input type='hidden' name='applicants_id' value='$applicants_id'/>
                     <input type='hidden' name='providers_id' value='$providers_id'/>
                     <input type='hidden' name='reservation_id' value='$reservation_id'/>
                     <br>
                     <input  style=' text-decoration: none; color: #37353B;  height: 50px;
                     line-height: 50px; border-radius: 15px; text-align: center; vertical-align: middle; overflow: hidden; font-weight: bold;  background-image: linear-gradient(#EBFAF8 0%, #849483 100%); text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.66);
                     box-shadow: 0 1px 1px rgba(0, 0, 0, 0.28); font-size:1.02em;' type='submit' name='submit' value='Confirm Reservation'>
                     </form>
                     </form>

                     <form action='cancel_reservation.php' method='POST'>
                     <input type='hidden' name='applicants_id' value='$applicants_id'/>
                     <input type='hidden' name='providers_id' value='$providers_id'/>
                     <input type='hidden' name='reservation_id' value='$reservation_id'/>
                     <br>
                     <input  style=' text-decoration: none; color: #37353B;  height: 50px;
                     line-height: 50px; border-radius: 15px; text-align: center; vertical-align: middle; overflow: hidden; font-weight: bold;  background-image: linear-gradient(#EBFAF8 0%, #849483 100%); text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.66);
                     box-shadow: 0 1px 1px rgba(0, 0, 0, 0.28); font-size:1.02em;' type='submit' name='submit' value='Cancel'>
                     </form>
                     </form>

                     </center>
                  </td>
                  </tr>
                  </table>
         ");
               
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