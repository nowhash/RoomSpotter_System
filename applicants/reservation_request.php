<?php 
session_start();
include '../include/head.php';
include_once '../config.php';

if(isset($_SESSION['applicants_id']))
{
?>

<html>
<!--Start Head Content-->

<head>
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
      <!--Start Banner_Nav Area-->
      <?php  
         if(isset($_SESSION['applicants_id']))
         {
            include '../include/applicants_banner_nav.php';
         }
         else if(isset($_SESSION['providers_id'])){
            include '../include/providers_banner_nav.php';
         }
         else{
            include'../include/banner_nav.php';
         }
      ?>
      <!--End Banner-Nav Area-->

      <div class="body-content">
         <div class="user-homepage-btn">
            <button class="user-homepage" onclick="location.href='applicant_homepage.php';">
            <i class="fas fa-user-cog"></i>&nbsp;Profile</button>

            <button class="user-homepage active" onclick="location.href='available_accommodation.php';">
            <i class="fas fa-home"></i>&nbsp;Available Accommodation</button>
         </div>
         
         <center>
            <div class="heading4" style="margin-top:20px; width:900px;">Confirm Accommodation</div>
         
         </center>
      <?php
         if(isset($_POST['submit']))
            {
               $applicants_id=$_POST['applicants_id'];
               $providers_id=$_POST['providers_id'];

               $sql1="select * from providers p,providers_info pi,versity v where
               p.providers_id=pi.providers_id and v.versity_id=pi.versity_id and p.providers_id=".$providers_id."";

               $result=mysqli_query($conn,$sql1);
               $data1=mysqli_fetch_assoc($result);

               $name=$data1['fname'].' '.$data1['lname'];
               $email=$data1['email'];
               $p_contact=$data1['p_contact'];
               $bcn=$data1['bcn'];
               $varsity=$data1['versity_name'];
               $hall=$data1['hall_name'];
               $address=$data1['loc'];
               $img=$data1['img_dest'];
               $dept=$data1['department'];
               
               echo ("
                  <table border='0'>
                  <tr style='align:center;'>	

                     <td style='padding-left:70px; padding-right: 70px;'>
                        <img src='$img' height='250px' width='200px'/>
                     <td width='700px' style='padding-left:20px;' >
                        <div class='heading4' style='padding-top:10px; padding-bottom:10px;font-size:1.8em; border-left:none; border-right: none;'>Provider Details</div><br>

                        <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Name:</b>&nbsp;$name</font><hr>

                        <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Email:</b>&nbsp;$email</font><hr>

                        <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Contact No. :</b>&nbsp;$p_contact</font><hr>

                        <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Birth Certificate No. :</b>&nbsp;$bcn</font><hr>
                     
                        <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>University:</b>&nbsp;$varsity</font><hr>

                        <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Department:</b>&nbsp;$dept</font><hr>

                        <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Hall:</b>&nbsp;$hall</font><hr>

                        <font style='font: 1.2em times, Times New Roman, times-roman, georgia, serif; color: #2B272A;'><b>Address:</b>&nbsp;$address</font><br/>

                     </td>
                  </tr>

                  <tr>
                     <td colspan='2'>
                     <center> <form action='reservation_conn.php' method='POST'>
                        <input type='hidden' name='applicants_id' value='$applicants_id'/>
                        <input type='hidden' name='providers_id' value='$providers_id'/>
                        Check In:&nbsp; <input style='height:30px; font-size:1em;'type='date' name='checkIn'/>&nbsp;
                        Check Out:&nbsp; <input style='height:30px; font-size:1em;'type='date' name='checkOut'/>
                        <br>
                        <br>
                        <input  style=' text-decoration: none; color: #37353B;  height: 50px;
                        line-height: 50px; border-radius: 15px; text-align: center; vertical-align: middle; overflow: hidden; font-weight: bold;  background-image: linear-gradient(#EBFAF8 0%, #849483 100%); text-shadow: 1px 1px 1px rgba(255, 255, 255, 0.66);
                        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.28); font-size:1.02em;' type='submit' name='submit' value='Send Reservation Request'>
                        </form>
                        </form>
                  </td>
                  </tr>
                  </table>
         ");
            }
      ?>
      </div>

      <!--Start Footer Part-->
      <?php include '../include/footer.php' ?>
      <!--End Footer Part-->
   </div>
</body>

</html>

<?php }
      else{
         header("Location:../index.php");
      } ?>