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
         <br><br>
         <div class="user_profile">
            <?php
            

               $sql="select * from providers p JOIN providers_info pi ON p.providers_id=pi.providers_id JOIN versity v ON v.versity_id=pi.versity_id where p.providers_id='".$_SESSION['providers_id']."'";

               $result=mysqli_query($conn,$sql);
               $data=mysqli_fetch_assoc($result);

               $sql_accom="select * from providers p JOIN providers_accom_info pa ON p.providers_id=pa.providers_id JOIN accommodation a ON a.accom_id=pa.accom_id where p.providers_id='".$_SESSION['providers_id']."'";
               
               $result_accom=mysqli_query($conn,$sql_accom);
               $data_accom=mysqli_fetch_assoc($result_accom);

                
               $id=$data['providers_id'];
               $name=$data['fname'].' '.$data['lname'];
               $email=$data['email'];
               $p_contact=$data['p_contact'];
               $bcn=$data['bcn'];
               $img_dest=$data['img_dest'];
               $versity_name=$data['versity_name'];
               $hall=$data['hall_name'];
               $department=$data['department'];
               $address=$data['loc'];
               $room=$data_accom['room_no'];
               $available_space=$data_accom['available_space']; 

               echo ("
  
               <table border=0 style='border: collapse;' class='user_data'>
               <tr>
               <td>
               <div class='profile_pic' align='center'>
               <img src='$img_dest'/>
               </td>
               <td> 
               <div class='heading1' span style='font-size:2.4em; padding-top:2em; padding-bottom:2em; text-align: center;'>User Information </div> </td>
               <tr/>

               <tr class='tr_one'>
                  <td>Your ID: </td>
                  <td>PRO-$id</td>
               </tr>

               <tr class='tr_two'>
               <td>Name:</td>
               <td>$name</td>
               </tr>

               <tr class='tr_one'>
                  <td>Email: </td>
                  <td>$email</td>
               </tr>

               <tr class='tr_two'>
               <td>Personal Contact No.:</td>
               <td>$p_contact</td>
               </tr>

               <tr class='tr_one'>
               <td>Birth Certificate No.:</td>
               <td>$bcn</td>
               </tr>

               <tr class='tr_two'>
               <td>University Name:</td>
               <td>$versity_name</td>
               </tr>

               
               <tr class='tr_one'>
               <td>Department:</td>
               <td>$department</td>
               </tr>

               <tr class='tr_two'>
               <td>Hall:</td>
               <td>$hall</td>
               </tr>

               <tr class='tr_one'>
               <td>Room No. :</td>
               <td>$room</td>
               </tr>

               <tr class='tr_two'>
               <td>Available Space:</td>
               <td>$available_space</td>
               </tr>

               <tr class='tr_one'>
               <td>Address: </td>
               <td>$address</td>
               </tr>

               </table>
               ");
            ?>
            <center>
               <button class="info_update" onclick="location.href='update_info.php';">Update info</button>
            </center>
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